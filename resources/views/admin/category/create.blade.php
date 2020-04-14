

@extends('layouts.admin')
@section('content')
   
    <section class="content-header">
      <h1>
      Categories
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active"></li>
      </ol>
    </section>

<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                <h3 class="box-title">Create</h3>
                </div>
        
                    <div class="box-body">
                            {!! Form::open(['method' =>'POST','action'=> 'AdminCategoriesController@store','style'=>' padding:20px','files' => true]) !!}
                                
                                <div class="form-group">
                                    {!! Form::label('name','Name')!!}
                                    {!! Form::text('name',null,['class'=>'form-control'])!!}
                                </div>
                                
                                <div class="form-group">
                                    
                                    {!! Form::submit('Create Category',['class'=>'btn btn-primary'])!!}
                                </div>
                            {!! Form::close() !!}

                    </div>
            </div>
        </div>

    </div>
</section>      

    @endsection

