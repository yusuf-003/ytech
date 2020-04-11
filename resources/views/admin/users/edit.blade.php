@extends('layouts.admin')
@section('content')
    <h1>Edit User</h1>
<div class="row" style='margin: 5px auto'>
    <div class="col-sm-2">
        <img src="{{$user->photo ? $user->photo->file : '/images/noimage.jpg'}}" alt="" class="img-responsive img-rounded" style="margin:15px;"> 
    </div>
<div class="col-sm-10">
{!! Form::model($user, ['method'=>'PUT','action' => ['AdminUsersController@update', $user->id], 'files' => true]) !!}
    
    <div class="form-group">
        {!! Form::label('Name','name')!!}
        {!! Form::text('name',null,['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('Email','email')!!}
        {!! Form::email('email',null,['class'=>'form-control'])!!}
    </div>
    
    <div class="form-group">

                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id', $roles,null, ['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active', array(1=>'active',0=>'not Active'),null,['class' => 'form-control']) !!}
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
        
        {!! Form::submit('Update',['class'=>'btn btn-primary'])!!}
    </div>
{!! Form::close() !!}
@include('inc.errorMsg')
</div>

</div>
       

     
@endsection