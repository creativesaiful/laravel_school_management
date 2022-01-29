@extends('backend.layout.master')

@section('title', 'Student Edit')
@section('content')


<div class="">
    <h4 class="box-title">Edit Student</h4>
</div>


<form method="post" enctype="multipart/form-data" action="{{route("student.update",$stuInfo->student_id)}}">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-light">Student Name <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" name="name" value="{{$stuInfo['student']['name']}}" required>

                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="text-light">Father's Name <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" name="fname" value="{{$stuInfo['student']['fname']}}" required>

                @error('fname')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">

            <!-- text input -->
            <div class="form-group">
                <label class="text-light">Mother's Name <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" name="mname" value="{{$stuInfo['student']['mname']}}" required>

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
                <input type="text" class="form-control" name="phone" value="{{$stuInfo['student']['phone']}}" required>

                @error('phone')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Address<span class="text-danger">*</span> </label>
                <input type="text" class="form-control" name="address" value="{{$stuInfo['student']['address']}}" required>

                @error('address')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Gender<span class="text-danger">*</span> </label>

                <select name="gender" id="" class="form-control">
                    <option disabled selected>Select Gender</option>
                    <option value="male" {{$stuInfo['student']['gender'] =='male' ? 'selected' :''}}>Male</option>
                    <option value="female" {{$stuInfo['student']['gender'] =='female' ? 'selected' :''}}>Female</option>
                    <option value="male" {{$stuInfo['student']['gender'] =='other' ? 'selected' :''}}>Other</option>
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
                <label>Religion <span class="text-danger">*</span> </label>

                <select name="religion" id="" class="form-control">
                    <option disabled selected>Select Religion</option>
                    <option value="islam" {{$stuInfo['student']['religion'] =='islam' ? 'selected' :''}}>Islam</option>
                    <option value="hindu" {{$stuInfo['student']['religion'] =='hindu' ? 'selected' :''}}>Hindu</option>
                    <option value="hindu" {{$stuInfo['student']['religion'] =='other' ? 'selected' :''}}>Other</option>

                </select>

                @error('religion')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Date Of Birth <span class="text-danger">*</span> </label>
                <input type="date" class="form-control" name="dob" value="{{$stuInfo['student']['dob']}}" required>

                @error('dob')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">

                <input type="hidden" name='id' value="{{$stuInfo->id}}">
                <label>Discount <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" name="discount" value="{{$stuInfo['discount_info']['discount']}}">

                @error('discount')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    {{-- Third Row End --}}

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Year <span class="text-danger">*</span> </label>

                <select name="year_id" id="" class="form-control">
                    <option disabled selected>Select Year</option>

                    @foreach ($year as $year)
                    <option value="{{ $year->id }}" {{ @$stuInfo['student_year']['id'] == $year->id ? "selected" :'' }} >{{ $year->year }}</option>
                    @endforeach
                </select>

                @error('year_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Class <span class="text-danger">*</span> </label>


                <select name="class_id" id="" class="form-control">
                    <option disabled selected>Select Class</option>

                    @foreach ($allclass as $allclass)
                    <option value="{{ $allclass->id }}" {{ @$stuInfo['student_class']['id'] == $allclass->id  ? "selected" :'' }}>{{ $allclass->class_name }}</option>
                    @endforeach
                </select>


                @error('class_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Group <span class="text-danger">*</span> </label>


                <select name="group_id" id="" class="form-control">
                    <option selected>Select group</option>

                    @foreach ($group as $group)
                    <option value="{{ $group->id }}" {{ @$stuInfo['student_group']['id'] == $group->id  ? "selected" :'' }}>{{ $group->group_name }}</option>
                    @endforeach
                </select>


                @error('group_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    {{-- Fourth Row End --}}


    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Shift<span class="text-danger">*</span> </label>

                <select name="shift_id" id="" class="form-control">
                    <option disabled selected>Select Shift</option>

                    @foreach ($shift as $shift)
                    <option value="{{ $shift->id }}" {{ @$stuInfo['student_shift']['id'] == $shift->id  ? "selected" :'' }}>{{ $shift->shift_name }}</option>
                    @endforeach
                </select>

                @error('shift_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Profile Image<span class="text-danger">*</span> </label> <br>

                <img src="{{ url('storage/'.$stuInfo['student']['image'])}}" width="200px" alt="student Image">


                <input type="file" name="img" class="form-control">




                @error('img')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">

        </div>
    </div>

    {{-- Fifth Row End --}}

    <div class="form-group">

        <input type="submit" class="btn btn-success ml-3" value='Add Student'>
    </div>

</form>





















@endsection

