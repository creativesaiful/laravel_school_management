@extends('backend.layout.master')

@section('title', 'Class list')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Fees Category</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post" action="{{ route('feecata.update',$feecateInfo->id) }}">
                        @csrf
                        @method('PUT')
                        <!-- text input -->

                        <input type="hidden" name="id" value="{{$feecateInfo->id}}" >
                        <div class="form-group">
                            <label>Shift Name</label>
                            <input type="text" class="form-control" name="fee_cata_name" value="{{$feecateInfo->fee_cata_name}}">

                            @error('fee_cata_name')
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
