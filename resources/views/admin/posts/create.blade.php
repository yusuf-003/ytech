

@extends('layouts.admin')
@section('content')
   
    <section class="content-header">
      <h1>
      Create Post
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active"></li>
      </ol>
    </section>

    {!! Form::open(['method' =>'POST','action'=> 'AdminPostsController@store','style'=>' padding:20px','files' => true]) !!}
    
    <div class="form-group">
        {!! Form::label('title','Title')!!}
        {!! Form::text('title',null,['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id','Category')!!}
        {!! Form::select('category_id', array(''=>'Options'),null,['class' => 'form-control'])!!}
    </div>

    <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id',null,['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::label('body','Description')!!}
        {!! Form::textarea('body',null,['class'=>'form-control','placehoder'=>'your description here...'])!!}
    </div>
  
    
    <div class="form-group">
        
        {!! Form::submit('Create Post',['class'=>'btn btn-primary'])!!}
    </div>
{!! Form::close() !!}

 <div class="row" style="padding:20px"> @include('inc.errorMsg')</div>
    @endsection

