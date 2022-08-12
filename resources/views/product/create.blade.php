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
                    <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="POST">
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
                            <!-- Gallery (переделать с dropzone) -->
                            <div class="form-group">
                                <label for="image">Product gallery</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="gallery[]" id="image">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="gallery[]" id="image">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="gallery[]" id="image">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="gallery[]" id="image">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="gallery[]" id="image">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="gallery[]" id="image">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title">Category</label>
                                <select class="form-control" name="category_id">
                                    {!! $categories !!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tag</label>
                                <select class="select2bs4" multiple="multiple" name="tags[]" data-placeholder="Select a State"
                                        style="width: 100%;">
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Colors</label>
                                <select class="select2bs4" multiple="multiple" name="colors[]" data-placeholder="Select a State"
                                        style="width: 100%;">
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sizes</label>
                                <select class="select2bs4" multiple="multiple" name="sizes[]" data-placeholder="Select a State"
                                        style="width: 100%;">
                                    <option style="background-color: red">Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
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
