
@extends('layouts.admin')

@section('content')

           

<div class="container" style="padding:15px;">
    <div class="row">
        <div class="col-sm-6 ">
            <img src="{{$user->photo ? $user->photo->file : '/images/noimage.jpg'}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;" >
            <h2>{{ $user->name }}'s Profile</h2><br>
            <small><b> Email:</b>  :{{ $user->email }} </small><br>
            <small><b> Role        :</b> {{ $user->role->name }}</small><br>
            <small><b> Date Jointed:</b> {{ $user->created_at->diffForHumans() }}</small><br>
        </div>
     
        <div class="col-sm-6 ">
            

        </div>

    </div>
</div>
@endsection