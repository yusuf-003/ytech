<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Photo;

use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminMediaController extends Controller
{
    //

    public function index(){

        $photos = Photo::paginate(5);

        return view('admin.media.index',compact('photos'));
    }

    public function create()
    {
        
       



       return view('admin.media.create');
        
    }

    public function store(Request $request){

        $file = $request->file('file');

        $name = time().$file->getClientOriginalName();
        $file->move('images',$name);
        Photo::create(['file'=>$name]);
    }

    public function destroy($id)
    {
        //
       $photo = Photo::findOrfail($id);
        unlink(public_path() .$photo->file);

       $photo->delete();

      
        Session::flash('deleted_photo','The picture has been deleted');
        return redirect('/admin/media');
    }

}
