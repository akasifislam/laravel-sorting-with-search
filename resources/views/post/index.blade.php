@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="">Post</div>
                        <div class="">
                            <a href="{{ route('app.post.create') }}" class="btn btn-success btn-sm">add post</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="mb-2">
                        <form class="form-inline" action="">
                            <label for="category_filter">Filter By Category &nbsp;</label>
                            <select class="form-control" name="category" id="category_filter">
                                <option value="">Select Category</option>
                                @if(count($categories))
                                    @foreach($categories as $category)
<option value="{{$category->name}}" {{ (Request::query('category') && Request::query('category')== $category->name )? 'selected':'' }}  >{{$category->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <label for="keyword">&nbsp;&nbsp;</label>
                            <input type="text" class="form-control" name="keyword" placeholder="Enter keyword" id="keyword_filter">
                            <span>&nbsp;</span>
                            <span>&nbsp;</span>
                            <div class="btn-group" role="group">
                                <button type="button" onclick="search_post()" class="btn btn-primary btn-sm">search</button>
                                @if (Request::query('category') || Request::query('keyword'))
                                <a href="{{ route('app.post.index') }}" class="btn btn-info btn-sm">clear</a>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">CreatedBY</th>
                                <th scope="col">Category</th>
                                <th scope="col">Total Comments</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @if(count($posts))
                                    @foreach($posts as $key=>$post)
                                    <tr>
                                        <th class="bg-info" scope="row">{{ $key+1 }}</th>
                                        <td>{{ $post->title }}</td>
                                        <td style="width: 400px" class="text-center">{{ $post->user->name }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ $post->comments_count+2 }}</td>
                                        <td style="width: 200px">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('app.post.show',$post->id) }}" class="btn btn-success btn-sm">view</a>
                                                <a href="{{ route('app.post.edit',$post->id) }}" class="btn btn-primary btn-sm">edit</a>
                                                <a href="" class="btn btn-danger btn-sm">delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td class="text-center text-white bg-danger" colspan="6">No post found</td>
                                    </tr>
                                @endif
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script type="text/javascript">
        var query=<?php echo json_encode((object)Request::query()); ?>;
        function search_post() {
            Object.assign(query,{'category': $('#category_filter').val()})
            Object.assign(query,{'keyword': $('#keyword_filter').val()})

            window.location.href = "{{ route('app.post.index') }}?"+$.param(query);
        }
    </script>
@endpush
