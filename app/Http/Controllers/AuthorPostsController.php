<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Photo;
use App\Category;
use App\User;

use App\Http\Requests\PostsCreateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AuthorPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user()->id;
        $posts = Post::where("user_id", "=", $user)->orderBy('created_at', 'DESC')->paginate(5);
        return view('author.posts.index', compact('posts'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::lists('name','id')->all();
        return view('author.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        $input = $request->all();
         $user = Auth::user();
         
         if($file= $request->file('photo_id')){

            $name = time().$file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
         }

         $user->posts()->create($input);

         return redirect('/author/posts');

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
        $post= Post::find($id);
        $commentPaginator = $post->comments()->orderBy('created_at', 'DESC')->paginate(5);
        return view('author.posts.show')->with(['post' => $post, 'commentPaginator' => $commentPaginator]);


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
        $categories = Category::lists('name','id')->all();
        $post = Post::findOrFail($id);
        return view('author.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsCreateRequest $request, $id)
    {
        //
        $input = $request->all();
        if($file = $request->file('photo_id')){

            $name= time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        Auth::user()->posts()->whereId($id)->first()->update($input);
       
        //$input['password'] = bcrypt($request->password);
        //$user->update($input);
        //return $request->all();
        return redirect('/author/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrfail($id);
        unlink(public_path() .$post->photo->file);

        $post->delete();

      
        Session::flash('deleted_post','The post has been deleted');
        return redirect('/author/posts');
    }
        
    
}
