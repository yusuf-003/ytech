

@extends('layouts.admin')


@section('content')


   
    <section class="content-header">
      <h1>
      Upload Media
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active"></li>
      </ol>
    </section>

    {!! Form::open(['method' =>'POST','action'=> 'AdminMediaController@store','class'=>'dropzone','files' => true]) !!}
    

    {!! Form::close() !!}





    @endsection

