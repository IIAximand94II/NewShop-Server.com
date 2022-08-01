@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="card mt-2">
                        <div class="card-header">
                            <h3 class="card-title">Color</h3>
                            <a href="{{ route('color.create') }}" class="btn btn-secondary fa-pull-right">Create color</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Color</th>
                                    <th>HEX</th>
                                    <th>Product count</th>
                                    <th>Action</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Red</td>
                                    <td><div style="width: 15px; height: 15px; background: red" ></div> </td>
                                    <th>#123er4</th>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
