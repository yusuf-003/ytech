

@extends('layouts.admin')
@section('content')
   
    <section class="content-header">
      <h1>
      View Portfolio
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
                @if(Session::has("deleted_portpolio"))

<p class="bg-danger" style="padding:10px: ">{{session('deleted_portpolio')}}</p>

@endif
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                            <th>id</th>
                            <th>photo</th>
                            <th>Service</th>
                            
                            <th>Title</th>
                            <th>Date Created</th>
                            <th>Date Updated</th>
                            <th>view</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            </tr>

                            </thead>
                            <tbody>

                            @if($portfolios)

                                @foreach($portfolios as $portfolio)
                            <tr>
                            <td>{{$portfolio->id}}</td>
                            <td><img  height='50px' src="{{$portfolio->photo ? $portfolio->photo->file : '/images/noimage.jpg'}}" ></td>
                            <td>{{$portfolio->service ? $portfolio->service->name : 'Uncategorized'}}</td>
                            <td>{{$portfolio->title}}</td>
                            <td>{{$portfolio->created_at->diffForHumans()}}</td>
                            <td>{{$portfolio->updated_at->diffForHumans()}}</td>
                            <td><a href="{{route('admin.portfolio.show' , $portfolio->id)}}" title="view Detail post"><button  style="width:80px;height:30px;background:green;border:none;padding: 10px;" class="btn btn-default btn-sm"><i class="fa fa-check-square 2x " style="color:#fff;"></i></button></a></td>
                            <td><a href="{{route('admin.portfolio.edit' , $portfolio->id)}}" title="Edit"><button  style="width:80px;height:30px;background:#93268f;border:none;padding: 10px;" class="btn btn-primary btn-sm"><i class="fa fa-edit 2x " style="color:#fff;"></i></button></a></td>
                            <td>
                            {!! Form::open(['method'=>'DELETE','action' => ['PortfolioController@destroy', $portfolio->id]]) !!}
                                    <div class="form-group" >
                                        {!! Form::Submit('Delete Portfolio', ['class'=>"btn btn-danger "]) !!}
                                    </div>
                                    {!! Form::close() !!}
                            </td>
                            </tr>
                                @endforeach
                                {{$portfolios->links()}}
                            @endif
                            </tbody>
                            <tfoot>
                           <tr>
                            <th>id</th>
                            <th>photo</th>
                           
                            <th>Service</th>
                            
                            <th>Title</th>
            
                            <th>Date Created</th>
                            <th>Date Updated</th>
                            <th>View</th>
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

