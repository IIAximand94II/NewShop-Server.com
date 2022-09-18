@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Breadcrumbs -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Simple Tables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Simple Tables</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="card mt-2">
                        <div class="card-header">
                            <h3 class="card-title">Size</h3>
                            <a href="{{ route('size.create') }}" class="btn btn-secondary fa-pull-right">Create size</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Size</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sizes as $size)
                                    <tr>
                                        <td>{{ $size->id }}</td>
                                        <td>{{ $size->size }}</td>
                                        <td>{{ $size->category_id }}</td>
                                        <td>
                                            <a class="btn btn-secondary m-1" href="{{ route('size.show', $size->id) }}"><i class="fas fa-book"> Show</i></a>

                                            <a class="btn btn-primary m-1" href="{{ route('size.edit', $size->id) }}"><i class="fas fa-edit"> Edit</i></a>
                                        </td>
                                        <td>
                                            <form action="{{ route('size.delete', $size->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger m-1" ><i class="fas fa-trash-alt"> Delete</i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
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
