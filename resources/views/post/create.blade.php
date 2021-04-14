@extends('layouts.app')
@push('custom-css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="">Post</div>
                        <div class="">
                            <a href="{{ route('app.post.index') }}" class="btn btn-success btn-sm">all post</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="rom">
                        <div class="col-8 offset-2">
                            <form action="{{ route('app.post.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input class="form-control" value="{{ old('title') }}" type="text" name="title" id="title" placeholder="Enter Title">
                                    @if ($errors->any('title'))
                                        <span class="text-danger">{{ $errors->first('title')  }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control"  type="text" name="description" id="description" placeholder="Enter description">{{ old('description') }}</textarea>
                                    @if ($errors->any('description'))
                                        <span class="text-danger">{{ $errors->first('description')  }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input class="form-control" value="{{ old('image') }}" type="file" name="image" id="image">
                                    @if ($errors->any('image'))
                                        <span class="text-danger">{{ $errors->first('image')  }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="category">Category :</label>
                                    <select class="form-control" id="category" name="category">
                                      <option value="">Select Category</option>
              
                                      @if(count($categories))
                                        @foreach($categories as $category)
                                           <option value="{{$category->id}}"  {{(old('category') && old('category')==$category->id )?'selected':''}}  >{{$category->name}}</option>
                                        @endforeach
                                      @endif
                                      
                                    </select>
                                  @if($errors->any('category'))
                                      <span class="text-danger"> {{$errors->first('category')}}</span>
                                    @endif
                                  </div>
                                  <div class="form-group">
                                    <label for="tags">Tags :</label>
                                    <select class="form-control" id="tags" name="tags[]" >
                                      <option value="">Select Tags</option>
                                        @if(count($tags))
                                        @foreach($tags as $tag)
                                           <option value="{{$tag->id}}" 
              {{(old('tags') && in_array($tag->id,old('tags')) )?'selected':''}} 
                                           >{{$tag->name}}</option>
                                        @endforeach
                                      @endif
                                    </select>
                                             @if($errors->any('tags'))
                                      <span class="text-danger"> {{$errors->first('tags')}}</span>
                                    @endif
                                  </div>
                                <button type="submit" class="btn btn-primary btn-sm">save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $("#category").select2({
       placeholder: "Select a category",
       allowClear: true
     });
     $("#tags").select2({
       placeholder: "Select tags",
       allowClear: true
     });
   </script>
@endpush