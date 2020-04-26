@extends('layouts.admin')
@section('content')
    
<div class="row" style='margin: 5px auto'>
    <div class="col-sm-4">
        <img src="{{$user->photo ? $user->photo->file : '/images/noimage.jpg'}}" alt="" class="img-responsive img-rounded" style="margin:15px;"> 
    </div>

<div class="col-sm-4 ">
    
    <h2>{{ $user->name }}'s Profile</h2><br>
    <small><b> Email:</b>  :{{ $user->email }} </small><br>
    <small><b> Role        :</b> {{ $user->role->name }}</small><br>
    <small><b> Date Jointed:</b> {{ $user->created_at->diffForHumans() }}</small><br>
</div>
<div class="col-sm-4">
<h3>Edit Profile</h3>
{!! Form::model($user, ['method'=>'PUT','action' => ['ProfileController@update', $user->id], 'files' => true]) !!}
    
    <div class="form-group">
        {!! Form::label('Name','name')!!}
        {!! Form::text('name',null,['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('Email','email')!!}
        {!! Form::email('email',null,['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id',['class' => 'form-control']) !!}
            </div>
    <div class="form-group">
        
        {!! Form::submit('Update',['class'=>'btn btn-primary col-sm-6'])!!}
    </div>
{!! Form::close() !!}


</div>

</div>
<div class="row">@include('inc.errorMsg')</div>  
     
@endsection