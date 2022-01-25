@extends('backend.layout.master')

@section('title', 'Student Registraion')
@section('content')


<div class="">
    <h4 class="box-title">Add Student</h4>
</div>

<hr>
    <form method="post" action="{{ route('student.store') }}">
        @csrf
        <div class="row">



            <div class="col-md-4">


                <!-- /.box-header -->


                    <!-- text input -->
                    <div class="form-group">
                        <label>Student Name <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" name="shift_name" required>

                        @error('shift_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Mobile Number <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" name="phone" required>

                        @error('shift_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Religion <span class="text-danger">*</span> </label>

                        <select name="religion" id="" class="form-control">
                            <option disabled selected>Select Religion</option>
                            <option value="islam">Islam</option>
                            <option value="hindu">Hindu</option>

                        </select>

                        @error('shift_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Year <span class="text-danger">*</span> </label>

                        <select name="year" id="" class="form-control">
                            <option disabled selected>Select Year</option>

                            @foreach ($year as $year)
                                <option value="{{$year->id}}">{{$year->year}}</option>
                            @endforeach
                        </select>

                        @error('shift_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Shift<span class="text-danger">*</span> </label>

                        <select name="shift_name" id="" class="form-control">
                            <option disabled selected>Select Year</option>

                            @foreach ($shift as $shift)
                                <option value="{{$shift->id}}">{{$shift->shift_name}}</option>
                            @endforeach
                        </select>

                        @error('shift_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>





            </div>

            <div class="col-md-4">


                <!-- /.box-header -->


                    <!-- text input -->
                    <div class="form-group">
                        <label>Father's Name <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" name="shift_name" required>

                        @error('shift_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Address<span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" name="shift_name" required>

                        @error('shift_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Date Of Birth <span class="text-danger">*</span> </label>
                        <input type="date" class="form-control" name="dob" required>

                        @error('shift_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Class <span class="text-danger">*</span> </label>


                        <select name="class" id="" class="form-control">
                            <option disabled selected>Select Class</option>

                            @foreach ($allclass as $allclass)
                                <option value="{{$allclass->id}}">{{$allclass->class_name}}</option>
                            @endforeach
                        </select>


                        @error('shift_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Profile Image<span class="text-danger">*</span> </label>
                        <input type="file" class="form-control"  required>

                        @error('shift_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>





            </div>

            <div class="col-md-4">


                <!-- /.box-header -->


                    <!-- text input -->
                    <div class="form-group">
                        <label>Mother's Name <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" name="shift_name" required>

                        @error('shift_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Gender<span class="text-danger">*</span> </label>

                        <select name="gender" id="" class="form-control">
                            <option disabled selected>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="male">Other</option>
                        </select>

                        @error('shift_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Discount <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" name="shift_name" >

                        @error('shift_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Group <span class="text-danger">*</span> </label>


                          <select name="group" id="" class="form-control">
                            <option disabled selected>Select group</option>

                            @foreach ($group as $group)
                                <option value="{{$group->id}}">{{$group->group_name}}</option>
                            @endforeach
                        </select>


                        @error('shift_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <img src="" alt="">
                    </div>





            </div>



            <div class="form-group">

                <input type="submit" class="btn btn-success ml-3" value='Add Student'>
            </div>



        </div>

    </form>



@endsection


