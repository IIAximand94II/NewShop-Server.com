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
                    <!-- form start -->
                    <form action="{{ route('size.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Select category</label>
                                <select name="category_id" class="form-control">
                                    <option value="0">Category 1<option>
                                    <option value="1">Category 2</option>
                                    <option value="2">Category 3</option>
                                    <option value="3">Category 4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Size</label>
                                <input type="text" value="{{ old('size') }}" name="size" class="form-control" id="title" placeholder="Enter size">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
