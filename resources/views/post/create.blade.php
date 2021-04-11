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
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae atque doloremque recusandae delectus deleniti magni accusamus libero modi. Totam maiores sit ex fuga dolores, hic repellat vel impedit sint autem.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection