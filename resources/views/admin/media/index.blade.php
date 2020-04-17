
@extends('layouts.admin')
@section('content')
   
    <section class="content-header">
      <h1>
      Media
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
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                <h3 class="box-title">Hover Data Table</h3>
                </div>
                @if(Session::has("deleted_photo"))

<p class="bg-danger" style="padding:10px: ">{{session('deleted_photo')}}</p>

@endif
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Date Created</th>
                            <th>Delete</th>
                            </tr>

                            </thead>
                            <tbody>

                            @if($photos)

                                @foreach($photos as $photo)
                            <tr>
                            <td>{{$photo->id}}</td>
                            <td>{{$photo->file}}</td>
                            <td><img  height='50px' src="{{$photo->file}}" ></td>
                        <!--<td><img  height='50px' src="{{$photo->photo ? $photo->photo->file : '/images/noimage.jpg'}}" ></td> -->
                            <td>{{$photo->created_at ? $photo->created_at->diffForHumans(): 'No date'}}</td>

                             <td>  
                             {!! Form::model($photo, ['method'=>'DELETE','action'=> ['AdminMediaController@destroy', $photo->id],'files' => true]) !!}
                        
                                <div class="form-group">
                                    
                                    {!! Form::submit('Delete',['class'=>'btn btn-danger'])!!}
                                </div>
                            {!! Form::close() !!}
                             
                              </td>
                            </tr>
                      
                            </tr>
                                @endforeach
                                {{$photos->links()}}
                            @endif
                            </tbody>
                            <tfoot>
                           <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>file</th>
                            <th>Date Created</th> 
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

