
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
        <div class="col-sm-6">
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

                            @include('inc.errorMsg')

                    </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="box">
                <div class="box-header">
                <h3 class="box-title">Display</h3>
                </div>
        
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Date Created</th>
                            <th>Date Updated</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            </tr>

                            </thead>
                            <tbody>

                            @if($categories)

                                @foreach($categories as $category)
                            <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->created_at ? $category->created_at->diffForHumans(): 'No date'}}</td>
                            <td>{{$category->updated_at ? $category->updated_at->diffForHumans(): 'No date'}}</td>

                            <td><a href="{{route('admin.category.edit' , $category->id)}}" title="Edit"><button  style="width:80px;height:30px;background:#93268f;border:none;padding: 10px;" class="btn btn-primary btn-sm"><i class="fa fa-edit 2x " style="color:#fff;"></i></button></a></td>
                            <td><a href="{{route('admin.category.edit' , $category->id)}}" title="Delete"><button  style="width:80px;height:30px;background:red;border:none;padding: 10px;" class="btn btn-danger btn-sm"><i class="fa fa-times 2x " style="color:#fff;"></i></button></a></td>
                            </tr>

                            </tr>
                                @endforeach

                                {{$categories->links()}}
                            @endif
                            </tbody>
                                                        <tfoot>
                           <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Date Created</th>
                            <th>Date Updated</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            
                            </tfoot>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</section>      

    @endsection

