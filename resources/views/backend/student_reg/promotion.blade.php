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

        <input type="submit" class="btn btn-success ml-3" value='Add Student'>
    </div>

</form>








@endsection

