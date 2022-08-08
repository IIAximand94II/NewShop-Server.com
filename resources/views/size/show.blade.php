@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>Size title</h2>
                            <a href="{{ route('size.edit', $size->id) }}" class="btn btn-primary m-1">Edit</a>
                            <a href="" class="btn btn-danger m-1">Delete</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $size->id  }}</td>
                                    </tr>
                                    <tr>
                                        <th>Size</th>
                                        <td>{{ $size->size }}</td>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
                                        <td>{{ $size->category_id }}</td>
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
