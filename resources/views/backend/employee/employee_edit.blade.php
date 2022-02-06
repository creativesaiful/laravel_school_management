@extends('backend.layout.master')

@section('title', 'Employee Edit')
@section('content')


<div class="">
    <h4 class="box-title">Edit Employee</h4>
</div>


<form method="post" enctype="multipart/form-data" action="{{ route('update.employee', $employee_infos->id) }}">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-light">Employee Name <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" name="name" value="{{$employee_infos->name}}" required>

                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="text-light">Father's Name <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" name="fname" value="{{$employee_infos->fname}}" required>

                @error('fname')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">

            <!-- text input -->
            <div class="form-group">
                <label class="text-light">Mother's Name <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" name="mname" value="{{$employee_infos->mname}}" required>

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
                <input type="text" class="form-control" name="phone" value="{{$employee_infos->phone}}" required>

                @error('phone')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Address<span class="text-danger">*</span> </label>
                <input type="text" class="form-control" name="address" value="{{$employee_infos->address}}" required>

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
                    <option value="male" {{$employee_infos->gender=='male' ? 'selected' : ''}}>Male</option>
                    <option value="female" {{$employee_infos->gender=='female' ? 'selected' : ''}} >Female</option>
                    <option value="other" {{$employee_infos->gender=='other' ? 'selected' : ''}} >Other</option>
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
                    <option value="islam" {{$employee_infos->religion=='islam' ? 'selected' : ''}} >Islam</option>
                    <option value="hindu" {{$employee_infos->religion=='hindu' ? 'selected' : ''}} >Hindu</option>
                    <option value="christian" {{$employee_infos->religion=='Christian ' ? 'selected' : ''}} >christian </option>
                    <option value="other" {{$employee_infos->religion=='other ' ? 'selected' : ''}} >Other</option>

                </select>

                @error('religion')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Date Of Birth <span class="text-danger">*</span> </label>
                <input type="date" class="form-control" name="dob" required value="{{$employee_infos->dob}}">

                @error('dob')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Joining Date<span class="text-danger">*</span> </label>
                <input type="date" class="form-control" name="join_date" value="{{$employee_infos->join_date}}" required>

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

                    @foreach ($designation_infos as $desigInfo)
                    <option value="{{ $desigInfo->id }}"  {{$employee_infos->designation_id==$desigInfo->id  ? 'selected' : ''}} >{{ $desigInfo->name }}</option>
                    @endforeach
                </select>

                @error('designation_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>



        <div class="col-md-4">
            <div class="form-group">
                <label>Email<span class="text-danger">*</span> </label>
                <input type="email" class="form-control" name="email" value="{{$employee_infos->email}}" required>

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
                <input type="file" name="img" class="form-control" onchange="preview()">

                @error('img')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <img width="200px" src="{{asset('storage/'.$employee_infos->image)}}" id="showImg" alt="">
            </div>
        </div>

    </div>

    {{-- Fifth Row End --}}

    <div class="form-group">

        <input type="submit" class="btn btn-success ml-3" value='Update'>
    </div>

</form>




<script>
    function preview() {
        showImg.src=URL.createObjectURL(event.target.files[0]);
}
</script>





@endsection
