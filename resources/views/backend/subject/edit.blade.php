@extends('backend.layout.master')

@section('title', 'Class list')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Subject</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post" action="{{ route('subject.update',$subInfo->id) }}">
                        @csrf
                        @method('PUT')
                        <!-- text input -->


                        <div class="form-group">
                            <label>Subject Name</label>
                            <input type="text" class="form-control" name="subject" value="{{$subInfo->subject}}" required>

                            @error('subject')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Full Mark</label>
                            <input type="text" class="form-control" name="full_mark" value="{{$subInfo->full_mark}}" required>

                            @error('full_mark')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Pass Mark</label>
                            <input type="text" class="form-control" name="pass_mark" value="{{$subInfo->pass_mark}}" required>

                            @error('pass_mark')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Subjective Mark</label>
                            <input type="text" class="form-control" name="subjective_mark" value="{{$subInfo->subjective_mark}}" required>

                            @error('subjective_mark')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">

                            <input type="submit" class="btn btn-success" value='update'>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
