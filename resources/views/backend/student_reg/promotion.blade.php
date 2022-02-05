@extends('backend.layout.master')

@section('title', 'Student Promotion')
@section('content')


<div class="">
    <h4 class="box-title">Promote Student</h4>
</div>


<form method="post" action="{{route("student.promote",$stuInfo->student_id)}}">
    @csrf



    {{-- First Row End --}}



    {{-- Second Row End --}}


    {{-- Third Row End --}}

    <div class="row">
       <div class="col-md-4">
           <img width="100px" height="100px" src="{{url('storage/'.$stuInfo['student']['image'])}}" alt="">
       </div>
    </div>
<br>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Student Name </label>
                <h4 class="text-light">{{$stuInfo['student']['name']}}</h4>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Father's Name </label>
                <h4 class="text-light">{{$stuInfo['student']['fname']}}</h4>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Mother's Name </label>
                <h4 class="text-light">{{$stuInfo['student']['mname']}}</h4>
            </div>
        </div>
    </div>

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
                    <option disabled >Select group</option>

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
                <label>Roll<span class="text-danger">*</span> </label>





                    <input type="number" class="form-control" name="roll" value="{{$stuInfo->roll}}">



                @error('shift_id')
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

    {{-- Fifth Row End --}}

    <div class="form-group">

        <input type="submit" class="btn btn-success" value='Promote Student'>
    </div>

</form>








@endsection

