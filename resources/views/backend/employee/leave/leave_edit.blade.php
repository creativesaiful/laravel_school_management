@extends('backend.layout.master')

@section('title', 'Employee Add')
@section('content')


<div class="">
    <h4 class="box-title">Edit Leave</h4>
</div>


<form method="post" enctype="multipart/form-data" action="{{ route('employee.leave.update',$singleleave->id ) }}">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-light">Employee Name <span class="text-danger">*</span> </label>

                <h2>{{$singleleave['UserInfo']['name']}}</h2>

                @error('employee_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="text-light">Leave Reason <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" name="leave_purpose" value="{{$singleleave->leave_purpose}}" required>

                @error('leave_purpose')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>



    </div>

    {{-- First Row End --}}


    <div class="row">
        <div class="col-md-6">

            <!-- text input -->
            <div class="form-group">
                <label class="text-light">Start Date <span class="text-danger">*</span> </label>
                <input type="date" class="form-control" name="start_date" value="{{$singleleave->start_date}}" required>

                @error('start_date')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>End Date<span class="text-danger">*</span> </label>
                <input type="date" class="form-control" name="end_date"  value="{{$singleleave->end_date}}" required>

                @error('end_date')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>


    </div>

    {{-- Second Row End --}}




    <div class="form-group">

        <input type="submit" class="btn btn-success" value='Update Leave'>
    </div>

</form>





@endsection
