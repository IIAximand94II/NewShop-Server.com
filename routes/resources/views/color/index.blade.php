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
                                    <th>Actions</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($colors as $color)
                                    <tr>
                                        <td>{{ $color->id }}</td>
                                        <td>{{ $color->title }}</td>
                                        <td><div style="width: 20px; height: 20px; background: {{ $color->hex }}" ></div> </td>
                                        <th>{{ $color->hex }}</th>
                                        <td>1</td>
                                        <td class="justify-content-center">
                                            <a class="btn btn-secondary m-1" href="{{ route('color.show', $color->id) }}"><i class="fas fa-book"> Show</i></a>

                                            <a class="btn btn-primary m-1" href="{{ route('color.edit', $color->id) }}"><i class="fas fa-edit"> Edit</i></a>


                                        </td>
                                        <td>
                                            <form action="{{ route('color.delete', $color->id) }}" method="POST">
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
