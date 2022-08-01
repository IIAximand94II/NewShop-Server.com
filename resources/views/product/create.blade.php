@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" value="{{ old('title') }}" name="title" class="form-control" id="title" placeholder="Enter title">
                            </div>
                            <div class="form-group">
                                <label for="content">Description</label>
                                <textarea type="text" class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Product title image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="title_image" id="image">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content">Product gallery</label>
                            </div>
                            <div class="form-group">
                                <label for="title">Category</label>
                                <select class="form-control" name="category_id">
                                    <option value="1">Category 1</option>
                                    <option value="2">Category 2</option>
                                    <option value="3">Category 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Tags</label>
                                <select class="form-control" multiple name="tags[]">
                                    <option value="1">Tag 1</option>
                                    <option value="2">Tag 2</option>
                                    <option value="3">Tag 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Colors</label>
                                <select class="form-control" multiple name="colors[]">
                                    <option value="1">Color 1</option>
                                    <option value="2">Color 2</option>
                                    <option value="3">Color 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Sizes</label>
                                <select class="form-control" multiple name="sizes[]">
                                    <option value="1">Size 1</option>
                                    <option value="2">Size 2</option>
                                    <option value="3">Size 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Gender</label>
                                <select class="form-control" name="gender">
                                    <option value="0">Female</option>
                                    <option value="1">Male</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Status</label>
                                <select class="form-control" name="gender">
                                    <option value="0">In Stock</option>
                                    <option value="1">On Order</option>
                                    <option value="2">Not</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Price</label>
                                <input type="number" value="{{ old('price') }}" name="price" class="form-control" id="title">
                            </div>
                            <div class="form-group">
                                <label for="title">Quantity</label>
                                <input type="number" value="{{ old('quantity') }}" name="price" class="form-control" id="title">
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" name="sale" id="sale" type="checkbox">
                                    <label class="form-check-label" for="sale">Sale</label>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
