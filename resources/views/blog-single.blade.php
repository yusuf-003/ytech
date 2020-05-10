@extends('layouts.main')

@section('content')

        

  <!--/ Intro Skew Star /-->
  <div class="intro intro-single route bg-image" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <h2 class="intro-title mb-4">Blog Details</h2>
          <ol class="breadcrumb d-flex justify-content-center">
            <li class="breadcrumb-item">
              <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item">
              <a href="#">Library</a>
            </li>
            <li class="breadcrumb-item active">Data</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->


  <!--/ Section Blog-Single Star /-->
  <section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="post-box">
            <div class="post-thumb">
              <img src="{{$post->photo ? $post->photo->file : '/images/noimage.jpg'}}" class="img-fluid" alt="">
            </div>
            <div class="post-meta">
              <h1 class="article-title">{{$post->title}}</h1>
              <ul>
                <li>
                  <span class="ion-ios-person"></span>
                  <a href="#">{{$post->user->name}}</a>
                </li>
                <li>
                  <span class="ion-pricetag"></span>
                  <a href="#">{{$post->category ? $post->category->name : 'Uncategorized'}}</a>
                </li>
                <li>
                  <span class="ion-chatbox"></span>
                  <a href="#">{{$post->comments->count()}}</a>
                </li>
              </ul>
            </div>
            <div class="article-content">
              <p>
              {{$post->body}}
              </p>
            </div>
            
          </div>
          <div class="box-comments">
            <div class="title-box-2">
              <h4 class="title-comments title-left">Comments ({{$post->comments->count()}})</h4>
            </div>
            
            <div class='card-block'>

                        <form method = 'POST' action="/posts/{{$post->id}}/null/comments">

                          {{csrf_field()}}
                          <div class="form-group green-border-focus">
                          <textarea  name='body' placeholder='your comment here' class="form-control" id="exampleFormControlTextarea5" rows="3" required></textarea>
                          </div>
                          <div class='form-group'>
                            <button name='submit'  class= 'btn  btnD '>Add Comment
                            </button>
                          </div>

                        </form>

                      </div>

            <ul class="list-comments">
            @if(count($post->comments) > 0)
                                @foreach($post->comments as $comment)

              <li>
                <div class="comment-avatar">
                  <img src="{{$comment->user->photo ? $comment->user->photo->file : '/images/noimage.jpg'}}" alt="">
                </div>
                <div class="comment-details">
                  <h4 class="comment-author">{{$comment->user->name}}</h4>
                  <span>{{$comment->created_at->diffForHumans()}}</span>
                  <p>
                  {{$comment->body}}
                  </p>
                  <!--  <a href="3">Reply</a> -->
                </div>
              </li>
              @endforeach
              
            </ul>
            {{ $commentPaginator->links() }}
              @else
            <p>be the first to react</p>
            @endif
          </div>

          

        </div>
        <div class="col-md-4">
          <div class="widget-sidebar sidebar-search">
            <h5 class="sidebar-title">Search</h5>
            <div class="sidebar-content">
              <form action="/searchResult" method="POST" role="search">
              {{ csrf_field() }}
                <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="Search for..." aria-label="Search for...">
                  <span class="input-group-btn">
                    <button  type="submit" class="btn btn-secondary btn-search" type="button">
                      <span class="ion-android-search"></span>
                    </button>
                  </span>
                </div>
              </form>
            </div>
          </div>
          <div class="widget-sidebar">
            <h5 class="sidebar-title">Recent Post</h5>
            <div class="sidebar-content">
              <ul class="list-sidebar">

              @if($posts)
                @foreach($posts as $post)
                <li>
                  <a href="{{ url('/blog-single',$post->id) }}">{{$post->title}}</a>
                </li>

                @endforeach
              </ul>
              
              {{$posts->links()}}
                  
                  @endif
            </div>
          </div>
         
          <div class="widget-sidebar widget-tags">
            <h5 class="sidebar-title">Tags</h5>
            <div class="sidebar-content">
              <ul>
              @if($categories)
                @foreach($categories as $category)
                <li>
                  <a href="">{{$category->name}}</a>
                </li>
                @endforeach
                     
                
              </ul>
              {{$categories->links()}}
                      @endif
              <ul>
              @if($services)
                @foreach($services as $service)
                <li>
                  <a href="">{{$service->name}}</a>
                </li>
                @endforeach
              </ul>
              {{$services->links()}}
                          @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Section Blog-Single End /-->

  <!--/ Section Contact-Footer Star /-->
 


@endsection
