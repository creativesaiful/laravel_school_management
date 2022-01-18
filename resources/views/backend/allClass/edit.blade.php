@extends('backend.layout.master')

@section('title', 'Class list')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Class</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post" action="{{ route('update.class') }}">
                        @csrf
                        <!-- text input -->

                        <input type="hidden" name="id" value="{{$classInfo->id}}" >
                        <div class="form-group">
                            <label>Class Name</label>
                            <input type="text" class="form-control" name="class_name" value="{{$classInfo->class_name}}">

                            @error('class_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">

                            <input type="submit" class="btn btn-success" value='update class'>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
