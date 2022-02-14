@extends('backend.layout.master')

@section('title', 'Employee Edit')
@section('content')


<div class="">
    <h4 class="box-title">Edit Attendence</h4>
</div>


<form method="post" enctype="multipart/form-data" action="{{ route('employee.attendence.update', $employees[0]['date'])  }}">
    @csrf


    {{-- First Row End --}}


    <div class="row">
        <div class="col-md-12">

            <!-- text input -->
            <div class="form-group">
                <label class="text-light"> Date <span class="text-danger">*</span> </label>
                <input type="date" class="form-control" name="date" value="{{$employees[0]['date']}}" disable>

                @error('date')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


        </div>



    </div>

    {{-- Second Row End --}}

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table striped">
               <thead>
                <tr>
                    <th  rowspan="2" width='8%'>Sl</th>
                    <th rowspan="2" class="text-center" >Employee List</th>
                    <th colspan="3" class="text-center" width='30%' >Attendence Status</th>
                </tr>
                <tr>
                    <th>Present</th>
                    <th>Leave</th>
                    <th>Absent</th>
                </tr>
               </thead>

               <tbody>

                @foreach ($employees as $key=> $employee)
                <tr class="div{{$employee->id}}">
                    <td>{{$key+1}}</td>
                    <td>{{$employee['UserData']['name']}}</td>
                    <td colspan="3">

                        <input type="text" name="employee_id[]" value="{{$employee->id}}">
                     <div class="switch-toggle switch-3 switch-candy">
                         <input name="attend_status{{$key}}" type="radio" id="present{{$key}}" {{$employee->attend_status=='Present' ? 'checked' : ''}} value="Present" checked />
                         <label for="present{{$key}}">Present</label>

                         <input name="attend_status{{$key}}" type="radio" id="leave{{$key}}" value="Leave" {{$employee->attend_status=='Leave' ? 'checked' : ''}} />
                         <label for="leave{{$key}}">Leave</label>

                         <input name="attend_status{{$key}}" type="radio" id="absent{{$key}}" value="Absent" {{$employee->attend_status=='Absent' ? 'checked' : ''}} />
                         <label for="absent{{$key}}">Absent</label>

                     </div>


                    </td>
                </tr>
                @endforeach

               </tbody>
            </table>
        </div>
    </div>



    <div class="form-group">

        <input type="submit" class="btn btn-success" value='Update'>
    </div>

</form>





@endsection
