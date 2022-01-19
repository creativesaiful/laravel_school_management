@extends('backend.layout.master')

@section('title', 'Class list')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Exam</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post" action="{{ route('exam.update',$examInfo->id) }}">
                        @csrf
                        @method('PUT')
                        <!-- text input -->

                        <input type="hidden" name="id" value="{{$examInfo->id}}" >
                        <div class="form-group">
                            <label>Exam Name</label>
                            <input type="text" class="form-control" name="exam_name" value="{{$examInfo->exam_name}}">

                            @error('exam_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">

                            <input type="submit" class="btn btn-success" value='update exam'>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
