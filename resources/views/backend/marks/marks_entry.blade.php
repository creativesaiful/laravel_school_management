@extends('backend.layout.master')

@section('title', 'Marks Entry')
@section('content')

<div class="">
    <h4 class="box-title">Marks Entry</h4>
</div>

<form action="" method="post">
    @csrf
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label>Year <span class="text-danger">*</span> </label>

                <select name="year_id" id="year_id" class="form-control">
                    <option disabled selected>Select Year</option>

                    @foreach ($stuInfo as $stu)
                    <option value="{{ $stu->year_id }}">{{ $stu['student_year']['year'] }}</option>
                    @endforeach
                </select>

                @error('year_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label>Class <span class="text-danger">*</span> </label>


                <select name="class_id" id="class_id" class="form-control">
                    <option disabled selected>Select Class</option>

                    @foreach ($stuInfo as $stu)
                    <option value="{{ $stu->class_id }}">{{ $stu['student_class']['class_name'] }}</option>
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

                    @foreach ($stuInfo as $stu)
                    <option value="{{ $stu->group_id }}">{{ $stu['student_group']['group_name'] }}</option>
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

                    @foreach ($stuInfo as $stu)
                    <option value="{{ $stu->shift_id }}">{{ $stu['student_shift']['shift_name'] }}</option>
                    @endforeach
                </select>


                @error('shift_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <div class="col-md-2">
            <div class="form-group">
                <label>Subject <span class="text-danger">*</span> </label>


                <select name="subject_id" id="subject_id" class="form-control">
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


        <div class="col-md-2">
            <div class="form-group">

                <br>
                <h4 class="btn btn-primary btn-sm btn-rounded mt-2" id="search">Search</h4>





            </div>
        </div>



    </div>

    <hr>
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

            success: function(result){
             alert(result);
          }

    });


    })
});
</script>

<script>
    // $(document).ready(function () {

    //     $('#search').on('click', function () {
    //         //e.preventDefault();

    //         var yearId = $('#year_id').val();
    //         // var classId = $('#class_id').val();
    //         // var gorupId = $('#group_id').val();
    //         // var shiftId = $('#shift_id').val();
    //         // var subjectId = $('#subject_id').val();
    //         alert(yearId);


    //     // $.ajax({
    //     //     method: 'post',
    //     //         url: "{{ url('mark/search') }}",
    //     //         data: {
    //     //             yearId: yearId,
    //     //             classId: classId,
    //     //             gorupId:gorupId,
    //     //             shiftId:shiftId
    //     //             },

    //     //             success: function(result){
    //     //              alert(result);
    //     //           }

    //     // });

    // });





</script>
@endsection
