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
                            </select>
                            <label for="keyword">&nbsp;&nbsp;</label>
                            <input type="text" class="form-control" name="keyword" placeholder="Enter keyword" id="keyword">
                            <span>&nbsp;</span>
                            <span>&nbsp;</span>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary btn-sm">search</button>
                                <a href="" class="btn btn-info btn-sm">clear</a>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Last</th>
                                <th scope="col">Last</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>Otto</td>
                                <td>Otto</td>
                                <td style="width: 200px">
                                    <div class="btn-group" role="group">
                                        <a href="" class="btn btn-success btn-sm">view</a>
                                        <a href="" class="btn btn-primary btn-sm">edit</a>
                                        <a href="" class="btn btn-danger btn-sm">delete</a>
                                    </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
