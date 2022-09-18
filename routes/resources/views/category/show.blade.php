@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>Category title</h2>
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary m-1">Edit</a>
                            <a href="" class="btn btn-danger m-1">Delete</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $category->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ $category->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Parent category</th>
                                        <td>{{ $category->parent_id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Image</th>
                                        <td>{{ $category->title_image }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{{ $category->description }}</td>
                                    </tr>
                                    <tr>
                                        <th>Products count</th>
                                        <td>0</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
