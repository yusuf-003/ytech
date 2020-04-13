

@extends('layouts.admin')
@section('content')
   
    <section class="content-header">
      <h1>
      View Post
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
                @if(Session::has("deleted_post"))

<p class="bg-danger" style="padding:10px: ">{{session('deleted_post')}}</p>

@endif
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                            <th>id</th>
                            <th>photo</th>
                            <th>User</th>
                            <th>category</th>
                            
                            <th>Title</th>
                            <th>body</th>
                            <th>Date Created</th>
                            <th>Date Updated</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            </tr>

                            </thead>
                            <tbody>

                            @if($posts)

                                @foreach($posts as $post)
                            <tr>
                            <td>{{$post->id}}</td>
                            <td><img  height='50px' src="{{$post->photo ? $post->photo->file : '/images/noimage.jpg'}}" ></td>
                            <td>{{$post->user->name}}</td>
                            <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{Str_limit($post->body, 30)}}</td>
                            <td>{{$post->created_at->diffForHumans()}}</td>
                            <td>{{$post->updated_at->diffForHumans()}}</td>
                            <td><a href="{{route('admin.posts.edit' , $post->id)}}" title="Edit"><button  style="width:80px;height:30px;background:#93268f;border:none;padding: 10px;" class="btn btn-primary btn-sm"><i class="fa fa-edit 2x " style="color:#fff;"></i></button></a></td>
                             <td><a href="{{route('admin.posts.edit' , $post->id)}}" title="Delete"><button  style="width:80px;height:30px;background:red;border:none;padding: 10px;" class="btn btn-danger btn-sm"><i class="fa fa-times 2x " style="color:#fff;"></i></button></a></td>
                            </tr>
                      
                            </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                           <tr>
                            <th>id</th>
                            <th>photo</th>
                            <th>User</th>
                            <th>category</th>
                            
                            <th>Title</th>
                            <th>body</th>
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

