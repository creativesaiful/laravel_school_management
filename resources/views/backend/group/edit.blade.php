@extends('backend.layout.master')

@section('title', 'Class list')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Group</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post" action="{{ route('update.group') }}">
                        @csrf
                        <!-- text input -->

                        <input type="hidden" name="id" value="{{$groupInfo->id}}" >
                        <div class="form-group">
                            <label>Class Name</label>
                            <input type="text" class="form-control" name="group_name" value="{{$groupInfo->group_name}}">

                            @error('group_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">

                            <input type="submit" class="btn btn-success" value='update group'>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
