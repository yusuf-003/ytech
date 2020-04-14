
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
                <h3 class="box-title">Update and Delete</h3>
                </div>
        
                    <div class="box-body">
                    {!! Form::model($category, ['method'=>'PATCH','action'=> ['AdminCategoriesController@update', $category->id],'style'=>' padding:20px','files' => true]) !!}
                                
                                <div class="form-group">
                                    {!! Form::label('name','Name')!!}
                                    {!! Form::text('name',null,['class'=>'form-control'])!!}
                                </div>
                                
                                <div class="form-group">
                                    
                                    {!! Form::submit('Update Category',['class'=>'btn btn-primary col-sm-6'])!!}
                                </div>
                            {!! Form::close() !!}

                            {!! Form::open(['method'=>'DELETE','action' => ['AdminCategoriesController@destroy', $category->id]]) !!}

                            <div class="form-group" style="margin-top:-45px;">

                                {!! Form::Submit('Delete  Category', ['class'=>"btn btn-danger col-sm-6 pull-right"]) !!}
                            </div>

                            {!! Form::close() !!}
                            
                    </div>
                    <div class="row" style="padding:20px"> @include('inc.errorMsg')</div>
            </div>
        </div>
    </div>
</section>      

    @endsection

