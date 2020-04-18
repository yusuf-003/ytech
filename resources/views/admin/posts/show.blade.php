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
                    <img class="img-circle img-bordered-sm" src="{{$posts->user->photo ? $posts->user->photo->file : '/images/noimage.jpg'}}" alt="User Image">
                        <span class="username">
                          <a href="#">{{$posts->user->name}}</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">{{$posts->created_at->diffForHumans()}}</span>
                  </div>
                  <!-- /.user-block -->
                  <div class="row margin-bottom">
                    <div class="col-sm-6">
                      <img class="img-responsive" src="{{$posts->photo ? $posts->photo->file : '/images/noimage.jpg'}}" alt="Photo">
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <h2>{{$posts->title}}</h2>
                      <small>{{$posts->category ? $posts->category->name : 'Uncategorized'}}</small>
                      <br>
                      <br>
                      <br>
                      <p>
                      {{$posts->body}}
                      </p>

                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>

                  <form class="form-horizontal">
                    <div class="form-group margin-bottom-none">
                      <div class="col-sm-9">
                        <input class="form-control input-sm" placeholder="Response">
                      </div>
                      <div class="col-sm-3">
                        <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                      </div>
                    </div>
                  </form>

                  

                    <br>
                  <div class="timeline-item">
                  <a class="btn btn-warning btn-flat btn-xs">View previous comment</a>
                      <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        
                      </div>
                    </div>
                </div>
        </div>
    </div>
</section>    


    @endsection
