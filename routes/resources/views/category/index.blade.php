@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="card mt-2">
                        <div class="card-header">
                            <h3 class="card-title">Category</h3>
                            <a href="{{ route('category.create') }}" class="btn btn-secondary fa-pull-right">Create category</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Parent category</th>
                                    <th>Product count</th>
                                    <th>Actions</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->title }}</td>
                                        <td>{{ $category->title_image }}</td>
                                        <td>{{ $category->parent_id }}</td>
                                        <td> 0</td>
                                        <td class="justify-content-center">
                                            <a class="btn btn-secondary m-1" href="{{ route('category.show', $category->id) }}"><i class="fas fa-book"> Show</i></a>

                                            <a class="btn btn-primary m-1" href="{{ route('category.edit', $category->id) }}"><i class="fas fa-edit"> Edit</i></a>


                                        </td>
                                        <td>
                                            <form action="{{ route('category.delete', $category->id) }}" method="POST">
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

                <div class="col-12">
                    <div class="card mt-2">
                        <div class="card-header">
                            <h3 class="card-title"> tree</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control">
                                    <option value="0">Independent Category</option>
                                    {!! $categoriesTree !!}
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
