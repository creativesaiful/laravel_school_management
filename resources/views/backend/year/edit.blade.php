@extends('backend.layout.master')

@section('title', 'Class list')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Year</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post" action="{{ route('update.year') }}">
                        @csrf
                        <!-- text input -->

                        <input type="hidden" name="id" value="{{$yearinfo->id}}" >
                        <div class="form-group">
                            <label>Year</label>
                            <input type="text" class="form-control" name="year" value="{{$yearinfo->year}}">

                            @error('year')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">

                            <input type="submit" class="btn btn-success" value='update Year'>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
