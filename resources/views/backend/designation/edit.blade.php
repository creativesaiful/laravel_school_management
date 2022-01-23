@extends('backend.layout.master')

@section('title', 'Designation list')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Designation</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post" action="{{ route('designation.update',$desigInfo->id) }}">
                        @csrf
                        @method('PUT')
                        <!-- text input -->


                        <div class="form-group">
                            <label>Designation Name</label>
                            <input type="text" class="form-control" name="name" value="{{$desigInfo->name}}">

                            @error('name')
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
