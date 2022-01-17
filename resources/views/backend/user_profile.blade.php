@extends('backend.layout.master')
@section('title');
@section('content')


<div class="row">
    <div class="col-md-2">
        <img style="width: 150px; height:150px; border-radius:25%" src=" {{!empty( Auth::user()->profile_photo_url)? url(Auth::user()->profile_photo_url):url('backend/images/avatar/1.jpg') }} " alt="">


    </div>

    <div class="col-md-10">
            <h3>Name : {{$userData->name}}</h3>
            <h3>Email : {{$userData->email}}</h3>
            <h3>Phone : {{$userData->phone}}</h3>

                @if ($userData->role=="0")
                    <h3>Role : Admin</h3>
                 @elseif ($userData->role=="1")
                    <h3>Role : Editor</h3>
                @elseif ($userData->role=="2")
                 <h3>Role : Modarator</h3>
                 @elseif ($userData->role=="3")
                 <h3>Role : User</h3>
                @endif

    </div>
</div>



@endsection
