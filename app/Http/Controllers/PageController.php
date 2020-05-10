<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Portfolio;
use App\Service;
use App\Category;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
  
        
        $portfolios= Portfolio::orderBy('created_at', 'DESC')->paginate(6);
         $posts = Post::orderBy('created_at', 'DESC')->paginate(6);
        //return view('index', compact('posts'));
        return view('index')->with(['posts' => $posts, 'portfolios' => $portfolios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $post= Post::find($id);
        $posts=Post::paginate(5);
        $services = Service::paginate(10);
        $categories = Category::paginate(10);
        $commentPaginator = $post->comments()->orderBy('created_at', 'DESC')->paginate(5);
        return view('blog-single')->with(['post' => $post, 'posts'=>$posts,'commentPaginator' => $commentPaginator,'services'=>$services,'categories'=>$categories]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
