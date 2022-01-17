@extends('backend.layout.master')

@section('title', 'Password Update');

@section('content')

<div class="row ">
    <div class="col-6">

<form action="{{route('user.update.password')}}" method="post">
    @csrf
    <div class="form-group">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text  bg-transparent text-white"><i
                        class="ti-lock"></i></span>
            </div>
            <input type="password"
                class="form-control pl-15 bg-transparent text-white plc-white"
                placeholder="Old Password" name="old_password" id="old_password">
        </div>

        @error('old_password')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text  bg-transparent text-white"><i
                        class="ti-lock"></i></span>
            </div>
            <input type="password"
                class="form-control pl-15 bg-transparent text-white plc-white"
                placeholder="New Password" name="new_password" id="new-password">
        </div>

        @error('new_password')
        <span class="text-danger">{{$message}}</span>
    @enderror
    </div>

    <div class="form-group">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text  bg-transparent text-white"><i
                        class="ti-lock"></i></span>
            </div>
            <input type="password"
                class="form-control pl-15 bg-transparent text-white plc-white"
                placeholder="Retype Password" name="password_confirmation" id="password_confirmation">
        </div>

        @error('password_confirmation')
        <span class="text-danger">{{$message}}</span>
    @enderror
    </div>

    <div class="form-group">
        <div class="input-group mb-3">

            <input type="submit"
                class="form-control btn btn-primary" >
        </div>
    </div>


</form>
    </div>
</div>


@endsection
