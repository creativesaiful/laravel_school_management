@extends('backend.layout.master')

@section('title', 'Class list')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Shift</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post" action="{{ route('shift.update',$shiftInfo->id) }}">
                        @csrf
                        @method('PUT')
                        <!-- text input -->

                        <input type="hidden" name="id" value="{{$shiftInfo->id}}" >
                        <div class="form-group">
                            <label>Shift Name</label>
                            <input type="text" class="form-control" name="shift_name" value="{{$shiftInfo->shift_name}}">

                            @error('shift_name')
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
