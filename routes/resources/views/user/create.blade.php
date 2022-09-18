@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create user</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="name" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="login">Login</label>
                                <input type="text" value="{{ old('login') }}" name="login" class="form-control" id="login" placeholder="Enter login">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" value="{{ old('email') }}" name="email" class="form-control" id="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="email">Gender</label>
                                <select name="gender" class="form-control">
                                    <option {{ old('gender')==0 ? 'selected': ''}} value="0">Female</option>
                                    <option {{ old('gender')==1 ? 'selected': ''}} value="1">Male</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Role</label>
                                <select name="gender" class="form-control">
                                    <option {{ old('role')==0 ? 'selected': ''}} value="0">User</option>
                                    <option {{ old('role')==1 ? 'selected': ''}} value="1">Admin</option>
                                </select>
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
