<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['categories'] = Category::orderBy('id', 'DESC')->get();
        $post_query = Post::where('user_id', Auth::user()->id);
        if ($request->category) {
            $post_query->whereHas('category', function ($qb) use ($request) {
                $qb->where('name', $request->category);
            });
        }
        if ($request->keyword) {
            $post_query->where('title', 'LIKE', '%' . $request->keyword . '%');
        }
        $data['posts'] = $post_query->orderBy('id', 'DESC')->paginate(2);
        return view('post.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::orderBy('id', 'DESC')->get();
        $data['tags'] = Tag::orderBy('id', 'DESC')->get();
        return view('post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:png,jpg',
            'category' => 'required',
            'tags' => 'required',
        ], [
            'category.required' => 'please select a category',
            'tags.required' => 'please select a tags',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->extension();
            $image->move(public_path('posts_images'), $image_name);
        }
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image_name,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category,
        ]);

        $post->tags()->sync($request->tags);
        return redirect()->route('app.post.index')->with('success', 'post successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
