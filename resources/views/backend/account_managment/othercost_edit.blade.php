@extends('backend.layout.master')

@section('title', 'Cost Edit')
@section('content')


    <div class="row">



        <div class="col-md-8">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Cost</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="post" enctype="multipart/form-data" action="{{ route('othercost.update',$costInfo->id ) }}">
                        @csrf
                        <!-- text input -->
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" class="form-control" name="date" value="{{$costInfo->date}}">

                            @error('date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" name="description"  value="{{$costInfo->description}}">

                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" class="form-control" name="amount"  value="{{$costInfo->amount}}">

                            @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>Vouchure</label>

                            <br>
                            <img width="300px" src="{{ url('storage/' . $costInfo->image) }}" alt="" id="mainThmb">
                            <br> <br>
                            <input type="file" class="form-control" name="image" onChange="mainThamUrl(this)" >

                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">

                            <input type="submit" class="btn btn-success" value='Update'>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function mainThamUrl(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#mainThmb').attr('src',e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection



