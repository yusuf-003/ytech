

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
                            
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                            <th>id</th>
                            <th>User</th>
                            <th>category</th>
                            <th>photo</th>
                            <th>Title</th>
                            <th>body</th>
                            <th>Date Created</th>
                            <th>Date Updated</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if($posts)

                                @foreach($posts as $post)
                            <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->user->name}}</td>
                            <td>{{$post->category_id}}</td>
                            <td>{{$post->photo_id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->body}}</td>
                            <td>{{$post->created_at->diffForHumans()}}</td>
                            <td>{{$post->updated_at->diffForHumans()}}</td>
                      
                            </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                           <tr>
                            <th>id</th>
                            <th>User</th>
                            <th>category</th>
                            <th>photo</th>
                            <th>Title</th>
                            <th>body</th>
                            <th>Date Created</th>
                            <th>Date Updated</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</section>      

    @endsection

