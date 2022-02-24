@extends('backend.layout.master')

@section('title', 'Marksheet Generate')
@section('content')

<div class="">
    <h4 class="box-title">Marksheet Generate</h4>
</div>

<form action="{{route("marksheet.search")}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>Year <span class="text-danger">*</span> </label>

                <select name="year_id" id="year_id" class="form-control" required>
                    <option disabled selected>Select Year</option>

                    @foreach ($yearList as $year)
                    <option value="{{ $year->year_id }}">{{ $year['yearinfo']['year'] }}</option>
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


                <select name="class_id" id="class_id" class="form-control" required>
                    <option disabled selected>Select Class</option>

                    @foreach ($classList as $allclass)
                    <option value="{{ $allclass->class_id }}">{{ $allclass['classinfo']['class_name'] }}</option>
                    @endforeach
                </select>


                @error('class_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label>Exam Type <span class="text-danger">*</span> </label>


                <select name="exam_id" id="exam_id" class="form-control" required>
                    <option disabled selected>Select Exam Type</option>

                    @foreach ($examList as $exam)
                    <option value="{{ $exam->exam_id }}">{{ $exam['examinfo']['exam_name']}}</option>
                    @endforeach
                </select>


                @error('exam_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label>Id No <span class="text-danger">*</span> </label>


                <input type="text" class="form-control" name="id_no" id="id_no" required >

                @error('id_no')
                    <span class="text-danger">{{ $message }}</span>
                @enderror



            </div>
        </div>









        <div class="col-md-2">
            <div class="form-group">

                <br>


                <input type="submit" class="btn btn-primary" value="Search">


            </div>
        </div>



    </div>
<hr>




</form>



@endsection
