@extends('layouts.admin')
@section('content')
   
    <section class="content-header">
      <h1>
      Detail Fortpolio
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
      <div class="col-sm-8">
           <h3>{{$portfolio->service->name}}</h3> 
          
           <p>Rounded Corners</p> 

          <img src="{{$portfolio->photo ? $portfolio->photo->file : '/images/noimage.jpg'}}" 
              class="img-rounded img-responsive" alt="Responsive Image" />         
           
      </div>
        
    </div>
  </section>    
@endsection
