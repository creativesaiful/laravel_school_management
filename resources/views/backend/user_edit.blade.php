

@extends('backend.layout.master')

@section('title', 'Edit User')

@section('content')
<div class="row">
    <div class="col-6">

<form method="POST" action="{{route('user.update')}}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-transparent text-white"><i
                        class="ti-user"></i></span>
            </div>
            <input type="text"
                class="form-control pl-15 bg-transparent text-white plc-white"
                placeholder="Full Name" id="name" name="name" value="{{ $userData->name}}"
                >

                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
        </div>
    </div>
    <div class="form-group">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-transparent text-white"><i
                        class="ti-email"></i></span>
            </div>
            <input type="email"
                class="form-control pl-15 bg-transparent text-white plc-white"
                placeholder="Email" name="email" id="email" value="{{ $userData->email}}"
                >
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
        </div>
    </div>


    <div class="form-group">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-transparent text-white"><i
                        class="ti-mobile"></i></span>
            </div>
            <input type="text"
                class="form-control pl-15 bg-transparent text-white plc-white"
                placeholder="Phone" name="phone" id="phone" value="{{ $userData->phone}}"
                >

                @error('phone')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-transparent text-white"><i
                        class="ti-file"></i></span>
            </div>



            <input type="file"
                class="form-control pl-15 bg-transparent text-white plc-white"
                 name="profile_pic" id="profile_pic" onchange="previewimg()"
                >

                @error('profile_pic')
                <span class="text-danger">{{$message}}</span>
            @enderror


        </div>

        <div class="form-group">
            <div class="input-group mb-3 ">
                <img  style="width: 150px; margin-left:50px" id="pro_img" src="{{ !empty($userData->profile_photo_url) ? url($userData->profile_photo_url): url('backend/images/avatar/1.jpg') }}" alt="">
            </div>
        </div>


    </div>









        <!-- /.col -->
        <div class="">

            <input type="submit" class="btn btn-info btn-rounded margin-top-10" value="Update">
           
        </div>
        <!-- /.col -->

</form>
    </div>
</div>


<script>
    function previewimg() {
        pro_img.src=URL.createObjectURL(event.target.files[0]);
}
</script>
@endsection
