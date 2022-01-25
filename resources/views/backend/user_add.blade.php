@extends('backend.layout.master')

@section('title', 'user add')

@section('content')
    <form method="POST" action="{{ route('add.user') }}">
        @csrf

        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-transparent text-white"><i class="ti-user"></i></span>
                </div>
                <input type="text" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Full Name"
                    id="name" name="name" value="{{ old('name') }}">
            </div>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-transparent text-white"><i class="ti-email"></i></span>
                </div>
                <input type="email" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Email"
                    name="email" id="email" value="{{ old('name') }}">
            </div>

            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-transparent text-white"><i class="ti-mobile"></i></span>
                </div>
                <input type="text" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Phone"
                    name="phone" id="phone" value="{{ old('phone') }}">
            </div>

            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror


        </div>



        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-transparent text-white"><i class="ti-hand-point-up"></i></span>
                </div>

                <select name="role" id="" class="form-control">
                    <option selected disabled>Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="operator">Operator</option>
                    <option value="user">User</option>


                </select>



            </div>

            @error('role')
                <span class="text-danger">{{ $message }}</span>
            @enderror


        </div>






        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-transparent text-white"><i class="ti-lock"></i></span>
                </div>
                <input type="password" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Password"
                    name="password" id="password">
            </div>

            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-transparent text-white"><i class="ti-lock"></i></span>
                </div>
                <input type="password" class="form-control pl-15 bg-transparent text-white plc-white"
                    placeholder="Retype Password" id="password_confirmation" name="password_confirmation">
            </div>

            @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
            @enderror

        </div>
        <div class="row">

            <!-- /.col -->
            <div class="col-12 text-center">

                <input type="submit" class="btn btn-info btn-rounded margin-top-10" value="Add User">


            </div>
            <!-- /.col -->
        </div>
    </form>
@endsection
