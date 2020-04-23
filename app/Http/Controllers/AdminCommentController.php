<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;
use App\Post;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Session;

class AdminCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // $comments = Comment::all();
       // return view('admin.posts.show', compact('comments'));

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
    //public function store(CommentRequest $request)
    //{
        
       
   
       // $input = $request->all();
       // $input['user_id'] = auth()->user()->id;
       // Comment::create($input);
       // return back();
    
    //}
        public function store(Post $post, $user){

            Comment::create([
                'body'=> request('body'),
                'user_id'=>$user,
                'post_id'=> $post->id,
               
            ]);
            return back();

        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $comment = Comment::findOrfail($id);
        $comment->delete();

        Session::flash('deleted_comment','The comment has been deleted');
        return back();
        //
    }
}
