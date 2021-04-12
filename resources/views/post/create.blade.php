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
                                    <input class="form-control" type="text" name="title" id="title" placeholder="Enter Title">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" type="text" name="description" id="description" placeholder="Enter description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input class="form-control" type="file" name="image" id="image">
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                   <select class="form-control" name="category" id="category">
                                        <option value=""> ---select--- </option>
                                        @if (count($categories))
                                            @foreach ($categories as $key => $category)
                                                <option value="{{ $key+1 }}">{{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                   </select>
                                </div>
                                <div class="form-group">
                                    <label for="tags">Tag</label>
                                   <select class="js-example-basic-single form-control" name="tag[]" id="tags">
                                        <option value=""> ----select---- </option>
                                        @if (count($tags))
                                            @foreach ($tags as $key=>$tag)
                                                <option value="{{ $key+1 }}">{{ $tag->name }}</option>
                                            @endforeach
                                        @endif
                                   </select>
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
@push('custom-js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('#category').select2();
});
</script>
@endpush