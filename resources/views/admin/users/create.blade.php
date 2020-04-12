@extends('layouts.admin')
@section('content')
<h1>Create User</h1>
<div class="row" style='margin: 5px auto'>
<div class="col-sm-10">
{!! Form::open(['method' =>'POST','action'=> 'AdminUsersController@store','style'=>'margin:20px','files' => true]) !!}
    
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
                {!! Form::select('role_id', [''=>'Choose option']+$roles,null, ['class' => 'form-control']) !!}
            </div>
    
    <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active', array(1=>'Active',0=>'not Active'),0,['class' => 'form-control']) !!}
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
        
        {!! Form::submit('Create user',['class'=>'btn btn-primary'])!!}
    </div>
{!! Form::close() !!}
@include('inc.errorMsg')
</div>

</div>
       

     
@endsection