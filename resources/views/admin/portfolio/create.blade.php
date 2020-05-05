

@extends('layouts.admin')
@section('content')
   
    <section class="content-header">
      <h1>
      Create A Portfolio
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active"></li>
      </ol>
    </section>

    {!! Form::open(['method' =>'POST','action'=> 'PortfolioController@store','style'=>' padding:20px','files' => true]) !!}
    
    <div class="form-group">
        {!! Form::label('title','Title')!!}
        {!! Form::text('title',null,['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('service_id','Service')!!}
        {!! Form::select('service_id',[''=>'Choose service']+$services ,null,['class' => 'form-control'])!!}
    </div>

    <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id',null,['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group">
        
        {!! Form::submit('Create Portfolio',['class'=>'btn btn-primary'])!!}
    </div>
{!! Form::close() !!}

 <div class="row" style="padding:20px"> @include('inc.errorMsg')</div>
    @endsection

