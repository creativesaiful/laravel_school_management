@extends('backend.layout.master')

@section('title', 'Marks Entry')
@section('content')

<div class="">
    <h4 class="box-title">Marks Entry</h4>
</div>

<form action="{{route("marks.store")}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>Year <span class="text-danger">*</span> </label>

                <select name="year_id" id="year_id" class="form-control">
                    <option disabled selected>Select Year</option>

                    @foreach ($year as $year)
                    <option value="{{ $year->year_id }}">{{ $year['student_year']['year'] }}</option>
                    @endforeach
                </select>

                @error('year_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>Class <span class="text-danger">*</span> </label>


                <select name="class_id" id="class_id" class="form-control">
                    <option disabled selected>Select Class</option>

                    @foreach ($allclass as $allclass)
                    <option value="{{ $allclass->class_id }}">{{ $allclass['student_class']['class_name'] }}</option>
                    @endforeach
                </select>


                @error('class_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label>Group <span class="text-danger">*</span> </label>


                <select name="group_id" id="group_id" class="form-control">
                    <option selected disabled>Select group</option>

                    @foreach ($group as $group)
                    <option value="{{ $group->group_id }}">{{ $group['student_group']['group_name'] }}</option>
                    @endforeach
                </select>


                @error('group_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label>Shift <span class="text-danger">*</span> </label>


                <select name="shift_id" id="shift_id" class="form-control">
                    <option selected disabled>Select Shift</option>

                    @foreach ($shift as $shift)
                    <option value="{{ $shift->shift_id }}">{{ $shift['student_shift']['shift_name'] }}</option>
                    @endforeach
                </select>


                @error('shift_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>





        <div class="col-md-2">
            <div class="form-group">

                <br>
                <h4 class="btn btn-primary btn-sm btn-rounded mt-2" id="search">Search</h4>





            </div>
        </div>



    </div>

    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Subject <span class="text-danger">*</span> </label>


                <select name="subject_id" id="subject_id" class="form-control" required>
                    <option selected disabled>Select Subject</option>

                    @foreach ($subject as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
                    @endforeach
                </select>


                @error('subject_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label>Exam <span class="text-danger">*</span> </label>


                <select name="exam_id" id="exam_id" class="form-control" required>
                    <option selected disabled>Select Exam</option>

                    @foreach ($exam as $exam)
                    <option value="{{ $exam->id }}">{{ $exam->exam_name }}</option>
                    @endforeach
                </select>


                @error('exam_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

    </div>

    <hr>


<h2>Student List</h2>

    <div class="table-responsive">
        <table id="" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Id No</th>
                    <th>Roll No</th>
                    <th>Name</th>
                    <th>Father's Name</th>
                    <th>Mother's Name</th>
                    <th>Mark</th>



                </tr>
            </thead>
            <tbody id="tbody">



            </tbody>

        </table>

        <input type="submit" value="Submit" id="add_mark" class="btn btn-primary d-none">
    </div>

</form>



<script>
    $(document).ready(function () {
    $('#search').on('click', function () {

        var yearId = $('#year_id').val();
        var classId = $('#class_id').val();
        var gorupId = $('#group_id').val();
        var shiftId = $('#shift_id').val();
        var subjectId = $('#subject_id').val();

    $.ajax({
       method: 'get',
           url: "{{ url('mark/search') }}",
           dataType: 'json',
           data: {
               yearId: yearId,
            classId: classId,
               gorupId:gorupId,
               shiftId:shiftId
               },

            success: function(data){
             if(data){

// empty service table befor load
                $('#tbody').empty();


                $.each(data, function (i, item) {

                        $('<tr>').html(
                            "<td> " + (i+1) + "</td>" +
                            "<td> " + item.id_no + "</td>" +
                            "<td>" + item.roll + "</td>" +
                            "<td>  " + item.name + " </td>" +
                            "<td>  " + item.fname + " </td>" +
                            "<td>  " + item.mname + " </td>" +
                            "<td> "+

                    "<input type='number' name='marks[]' required>"+
                    "<input type='hidden' name='student_id[]' value='"+data[i].student_id+"'>"+
                    "<input type='hidden' name='id_no[]' value='"+data[i].id_no+"'>"+

                             "</td>"
                        ).appendTo('#tbody');
                        });

                        $("#add_mark").removeClass('d-none');

             }else{
                 alert ("Please select year,class, group and shift");
             }
          }

    });


    })
});
</script>


@endsection


