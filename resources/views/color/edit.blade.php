@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add color</h3>
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
                    <form action="{{ route('color.update', $color->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" value="{{ $color->title??old('title') }}" name="title" class="form-control" id="title" placeholder="Enter title">
                            </div>
                            <div class="form-group">
                                <input type="color" id="color" name="hex"
                                       value="{{ $color->hex??old('hex') }}">
                                <label for="color">Color</label>
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
