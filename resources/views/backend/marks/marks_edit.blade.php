@extends('backend.layout.master')

@section('title', 'Marks Edit')
@section('content')

<div class="">
    <h4 class="box-title">Marks Edit</h4>
</div>

<form action="{{route('marks.update')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>Year <span class="text-danger">*</span> </label>

                <select name="year_id" id="year_id" class="form-control">
                    <option disabled selected>Select Year</option>

                    @foreach ($year as $year)
                    <option value="{{ $year->year_id }}">{{ $year['yearInfo']['year'] }}</option>
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
                    <option value="{{ $allclass->class_id }}">{{ $allclass['classInfo']['class_name'] }}</option>
                    @endforeach
                </select>


                @error('class_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label>Subject <span class="text-danger">*</span> </label>


                <select name="subject_id" id="subject_id" class="form-control" required>
                    <option selected disabled>Select Subject</option>

                    @foreach ($subject as $subject)
                    <option value="{{ $subject->assign_subject_id }}">{{ $subject['subjectInfo']['subject'] }}</option>
                    @endforeach
                </select>


                @error('subject_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <div class="col-md-2">
            <div class="form-group">
                <label>Exam <span class="text-danger">*</span> </label>


                <select name="exam_id" id="exam_id" class="form-control" required>
                    <option selected disabled>Select Exam</option>

                    @foreach ($exam as $exam)
                    <option value="{{ $exam->exam_id }}">{{ $exam['examInfo']['exam_name'] }}</option>
                    @endforeach
                </select>


                @error('exam_id')
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

        <input type="submit" value="Update" id="add_mark" class="btn btn-primary d-none">
    </div>

</form>



<script>
    $(document).ready(function () {
    $('#search').on('click', function () {

        var yearId = $('#year_id').val();
        var classId = $('#class_id').val();
        var examId = $('#exam_id').val();
        var subjectId = $('#subject_id').val();

    $.ajax({
       method: 'get',
           url: "{{ url('mark/edit/search') }}",
           dataType: 'json',
           data: {
               yearId: yearId,
                 classId: classId,
               examId:examId,
               subjectId:subjectId
               },

            success: function(data){
             if(data){

// empty service table befor load
                $('#tbody').empty();


                $.each(data, function (i, item) {

                        $('<tr>').html(
                            "<td> " + (i+1) + "</td>" +
                            "<td> " + item.student_info.id_no + "</td>" +
                            "<td> "+item.assignstu.roll +" </td>" +
                            "<td>  " + item.student_info.name + " </td>" +
                            "<td>  " + item.student_info.fname+ " </td>" +
                            "<td>  " + item.student_info.mname + " </td>" +
                            "<td> "+

                    "<input type='number' name='marks[]' value='"+item.marks+"' required>"+
                    "<input type='hidden' name='student_id[]' value='"+item.student_id+"'>"+
                    "<input type='hidden' name='id_no[]' value='"+item.student_info.id_no +"'>"+

                             "</td>"
                        ).appendTo('#tbody');
                        });

                        $("#add_mark").removeClass('d-none');

             }else{
                 alert ("Please select year,class, subject and exam");
             }
          }

    });


    })
});
</script>


@endsection
