<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Photo;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UsersRequest;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $roles = Role::lists('name','id')->all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
       //return view('admin.users.index');
       //User::create($request->all());

       //return redirect('/admin/users');
       //return $request->all();
       $input = $request->all();

       if($file = $request->file('photo_id')){
           $name = time().$file->getClientOriginalName();
            $file->move('images',$name);
            
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
           //return "photo exist";

          
          
       }
       $input['password'] = bcrypt($request->password);
       User::create($input);
       return redirect('/admin/users');
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
        return view('admin.users.show');
        
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
        return view('admin.users.edit');
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
        User::findOrfail($id)->delete();
        Session::flash('deleted_user','The user has been deleted');
        return redirect('/admin/users');
    }
}
