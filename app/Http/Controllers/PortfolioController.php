<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Service;
use App\Photo;
use App\Portfolio;
use App\Http\Requests\PortfolioRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $services = Service::lists('name','id')->all();
        return view('admin.portfolio.create',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioRequest $request)
    {
        $input = $request->all();
         //$user = Auth::user();
         if($file= $request->file('photo_id')){

            $name = time().$file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
         }

         Portfolio::create($input);

         return redirect('/admin/portfolio');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $portfolio= Portfolio::find($id);
        return view('admin.portfolio.show')->with(['portfolio' => $portfolio]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::lists('name','id')->all();
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.edit',compact('service','portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PortfolioRequest $request, $id)
    {
        $input = $request->all();
        if($file = $request->file('photo_id')){

            $name= time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        Portfolio::whereId($id)->first()->update($input);
       
        return redirect('/admin/portfolio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrfail($id);
        unlink(public_path() .$portfolio->photo->file);

       $portfolio->delete();
       Session::flash('deleted_portpolio','The portfolio has been deleted');
        return redirect('/admin/portfolio');
    }
}
