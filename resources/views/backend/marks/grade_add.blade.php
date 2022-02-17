@extends('backend.layout.master')

@section('title', 'Add Grade')
@section('content')


<div class="">
    <h4 class="box-title">Add Grade</h4>
</div>


<form method="post" enctype="multipart/form-data" action="{{ route('grade.store') }}">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-light">Grade Name <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" name="grade_name" required>

                @error('grade_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="text-light">Grade Point <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" name="grade_point" required>

                @error('grade_point')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">

            <!-- text input -->
            <div class="form-group">
                <label class="text-light">Start Mark <span class="text-danger">*</span> </label>
                <input type="number" class="form-control" name="start_mark" required>

                @error('start_mark')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


        </div>

    </div>

    {{-- First Row End --}}


    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label  class="text-light">End Mark <span class="text-danger">*</span> </label>
                <input type="number" class="form-control" name="end_mark" required>

                @error('end_mark')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label  class="text-light">Start Point<span class="text-danger">*</span> </label>
                <input type="text" class="form-control" name="start_point" required>

                @error('start_point')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label  class="text-light">End Point<span class="text-danger">*</span> </label>
                <input type="text" class="form-control" name="end_point" required>

                @error('end_point')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>

    </div>




    {{-- Second Row End --}}
 <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label  class="text-light">Remark <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" name="remark" required>

                @error('remark')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>



    </div>


    {{-- Fifth Row End --}}

    <div class="form-group">

        <input type="submit" class="btn btn-success" value='Add Student'>
    </div>

</form>




@endsection
