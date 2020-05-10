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

        
            <!-- Post -->
            <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{$post->user->photo ? $post->user->photo->file : '/images/noimage.jpg'}}" alt="User Image">
                        <span class="username">
                          <a href="#">{{$post->user->name}}</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">{{$post->created_at->diffForHumans()}}</span>
                  </div>
                  <!-- /.user-block -->
                  <div class="row margin-bottom">
                    <div class="col-sm-6">
                      <img class="img-responsive" src="{{$post->photo ? $post->photo->file : '/images/noimage.jpg'}}" alt="Photo">
 
                     <span style="color:#eee;"> {{$user = Auth::user()->id}} </span>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <h2>{{$post->title}}</h2>
                      <small>{{$post->category ? $post->category->name : 'Uncategorized'}}</small>
                      <br>
                      <br>
                      <br>
                      <p>
                      {{$post->body}}
                      </p>

                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <ul class="list-inline">
                   <!-- <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    -->
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> {{$post->comments->count()}}
                        </a></li>
                  </ul>
                    
                  <div class="card">
                      <div class='card-block'>

                        <form method = 'POST' action="/posts/{{$post->id}}/{{$user}}/comments">

                          {{csrf_field()}}
                          <div class="form-group green-border-focus">
                          <textarea  name='body'  placeholder='your comment here' class="form-control" id="exampleFormControlTextarea5" rows="3"></textarea>
                          </div>
                          <div class='form-group'>
                            <button name='submit'  class= 'btn btn-primary'>Add Comment
                            </button>
                          </div>

                        </form>

                      </div>

                  </div>


                    <div  class="row" style=""> @include('inc.errorMsg')</div>
                    <br>

                    

                            <a class="btn btn-warning btn-flat btn-xs">previous comment</a><br><br>
                            @if(count($post->comments) > 0)
                                @foreach($post->comments as $comment)

                            <div class="box-body chat" id="chat-box" style='border:1px solid #ccc;'>
                              <!-- chat item -->
                             
                              <div class="item">
                                <img src="{{$comment->user->photo ? $comment->user->photo->file : '/images/noimage.jpg'}}" alt="user image" class="online">

                                <p class="message">
                                  
                                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> {{$comment->created_at->diffForHumans()}}</small>
                                    {{$comment->user->name}}
                                    <br>
                                    <small style="color:#aaa;">{{$comment->user->role->name}}</small>
                                   <br>
                                  {{$comment->body}}
                                
                                </p>


                            </div>
                            
              
              <!--add delete button here -->


                    
              
            </div>
            @if(Session::has("deleted_comment"))
                    <p class="bg-danger" style="padding:10px: ">{{session('deleted_comment')}}</p>
                     @endif
            </br>
              @endforeach
              {{ $commentPaginator->links() }}
              @else
            <p>No comment Found</p>
            @endif
        </div>
        
    </div>
  </section>    
@endsection
