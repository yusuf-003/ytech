@extends('layouts.main')

    @section('content')
    
    <!--/ Intro Skew Star /-->
  <div id="home" class="intro route bg-image" style="background-image: url(img/intro-bg.jpg)">
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <!--<p class="display-6 color-d">Hello, world!</p>-->
          <h1 class="intro-title mb-4">I am Yusuf Aliyu</h1>
          <p class="intro-subtitle"><span class="text-slider-items">CEO Ytech,Web Developer,Web Designer,Photograpy,Graphic Designer,Network Engineer, </span><strong class="text-slider"></strong></p>
          <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->

  <section class = "container">
    <div class= 'row'>
            <div class="col-sm-12">
                @if(isset($details))
                    <h5> The Search results for your Key Input  <b> {{ $query }} </b> are :</h5>
                <h2>Here is/are search result</h2>
                
                <table id="example2" class="table table-bordered">
                            <thead>
                            <tr>
                            <th>id</th>
                            <th>photo</th>
                            <th>Created by</th>
                            <th>category</th>
                            
                            <th>Title</th>
                            <th>body</th>
                            <th>Date Created</th>
                           
                            <th>view</th>
                            
                            </tr>

                            </thead>
                            <tbody>


                                @foreach($details as $post)

                            <tr>

                            <td>{{$post->id}}</td>
                            <td><img  height='50px' src="{{$post->photo ? $post->photo->file : '/images/noimage.jpg'}}" ></td>
                            <td>{{$post->user->name}}</td>
                            <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{Str_limit($post->body, 30)}}</td>
                            <td>{{$post->created_at->diffForHumans()}}</td>
                           
                            <td><a href="{{ url('/blog-single',$post->id) }}" title="view Detail post"><button  style="width:80px;height:30px;background:green;border:none;padding: 10px;" class="btn btn-default btn-sm"><i class="fa fa-check-square 2x " style="color:#fff;"></i></button></a></td>
                            
                            </tr>
                      
                            </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                         
                            
                            
                            </tfoot>
                        </table>

                
                @endif
            </div>
    </div>

  </section>

  @endsection



