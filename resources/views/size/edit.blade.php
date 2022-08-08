@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create size</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- errors -->
                    <div class="m-3">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <h2 class="text-center">Errors!</h2>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <!-- /.errors -->
                    <!-- form start -->
                    <form action="{{ route('size.update', $size->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Select category</label>
                                <select class="form-control" name="category_id">
                                    {!! $categories !!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Size</label>
                                <input type="text" value="{{ $size->size }}" name="size" class="form-control" id="title" placeholder="Enter size">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
