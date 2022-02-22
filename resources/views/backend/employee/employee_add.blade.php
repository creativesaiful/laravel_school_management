@extends('backend.layout.master')

@section('title', 'Employee Add')
@section('content')


<div class="">
    <h4 class="box-title">Add Employee</h4>
</div>


<form method="post" enctype="multipart/form-data" action="{{ route('store.employee') }}">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-light">Employee Name <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" name="name" required>

                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="text-light">Father's Name <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" name="fname" required>

                @error('fname')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">

            <!-- text input -->
            <div class="form-group">
                <label class="text-light">Mother's Name <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" name="mname" required>

                @error('mname')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


        </div>

    </div>

    {{-- First Row End --}}


    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Phone Number <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" name="phone" required>

                @error('phone')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Address<span class="text-danger">*</span> </label>
                <input type="text" class="form-control" name="address" required>

                @error('address')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Gender<span class="text-danger">*</span> </label>

                <select name="gender" id="" class="form-control" required>
                    <option disabled selected>Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="male">Other</option>
                </select>

                @error('gender')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    {{-- Second Row End --}}

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Religion <span class="text-danger" >*</span> </label>

                <select name="religion" id="" class="form-control" required>
                    <option disabled selected>Select Religion</option>
                    <option value="islam">Islam</option>
                    <option value="hindu">Hindu</option>
                    <option value="other">Other</option>

                </select>

                @error('religion')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Date Of Birth <span class="text-danger">*</span> </label>
                <input type="date" class="form-control" name="dob" required>

                @error('dob')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Joining Date<span class="text-danger">*</span> </label>
                <input type="date" class="form-control" name="join_date" required>

                @error('join_date')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    {{-- Third Row End --}}

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Designation <span class="text-danger">*</span> </label>

                <select name="designation_id" id="" class="form-control" required>
                    <option disabled selected>Select Year</option>

                    @foreach ($desigInfo as $desigInfo)
                    <option value="{{ $desigInfo->id }}">{{ $desigInfo->name }}</option>
                    @endforeach
                </select>

                @error('designation_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Salay<span class="text-danger">*</span> </label>
                <input type="text" class="form-control" name="salary" required>

                @error('salary')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Email<span class="text-danger">*</span> </label>
                <input type="email" class="form-control" name="email" required>

                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>





    </div>
    {{-- Fourth Row End --}}


    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <label>Profile Image<span class="text-danger">*</span> </label>
                <input type="file" name="img" class="form-control" required onchange="preview()">

                @error('img')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <img width="200px" src="" id="showImg" alt="">
            </div>
        </div>

    </div>

    {{-- Fifth Row End --}}

    <div class="form-group">

        <input type="submit" class="btn btn-success ml-3" value='Add Employee'>
    </div>

</form>




<script>
    function preview() {
        showImg.src=URL.createObjectURL(event.target.files[0]);
}
</script>





@endsection
