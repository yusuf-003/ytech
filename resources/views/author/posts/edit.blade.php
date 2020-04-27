

@extends('layouts.admin')
@section('content')
   
    <section class="content-header">
      <h1>
      Edit Post
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active"></li>
      </ol>
    </section>

    {!! Form::model($post, ['method'=>'PATCH','action'=> ['AuthorPostsController@update', $post->id],'style'=>' padding:20px','files' => true]) !!}
    
    
    <div class="form-group">
        {!! Form::label('title','Title')!!}
        {!! Form::text('title',null,['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id','Category Categories')!!}
        {!! Form::select('category_id', $categories ,null,['class' => 'form-control'])!!}
    </div>

    <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id',null,['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::label('body','Description')!!}
        {!! Form::textarea('body',null,['id'=>'article-ckeditor','class'=>'form-control','placehoder'=>'your description here...'])!!}
    </div>
  
    
    <div class="form-group">
        
        {!! Form::submit('Update Post',['class'=>'btn btn-primary col-sm-6'])!!}
    </div>
{!! Form::close() !!}

{!! Form::open(['method'=>'DELETE','action' => ['AuthorPostsController@destroy', $post->id]]) !!}

<div class="form-group" style="margin-top:-45px;">

    {!! Form::Submit('Delete  Post', ['class'=>"btn btn-danger col-sm-6 pull-right"]) !!}
</div>

{!! Form::close() !!}

 <div class="row" style="padding:20px"> @include('inc.errorMsg')</div>
    @endsection

