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
                            <a href="{{ route('color.edit', $color->id) }}" class="btn btn-primary m-1">Edit</a>
                            <a href="" class="btn btn-danger m-1">Delete</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $color->id  }}</td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ $color->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Color</th>
                                        <td>
                                            <div style="width: 25px; height: 25px; background: {{ $color->hex }}" ></div>
                                        </td>
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
