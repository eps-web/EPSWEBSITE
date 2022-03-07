<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $abouts= AboutUs::orderBy('created_at', 'DESC')->paginate(20);
    return view('layouts.AboutUs.index',compact('abouts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $abouts =  Menu::orderby('id','DESC')->first();
    // $menus = Menu::all();

      return view('layouts.AboutUs.index',compact('abouts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this -> validate($request,[

          'tittle' => 'required',


      ]);
    $about = AboutUs::create([
          "tittle" =>$request->tittle,
        // "url"=>$request->url,
      ]);
        return redirect()->route('about.index')->with('success','data save successfully');
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
        //
    }

    function about_status_update($id)
  {
  	//get product status with the help of product ID
  	$abouts = DB::table('about_us')
  				->select('status')
  				->where('id','=',$id)
  				->first();

  	//Check user status
  	if($abouts->status == '1'){
  		$status = '0';
  	}else{
  		$status = '1';
  	}

  	//update product status
  	$values = array('status' => $status );
  	DB::table('about_us')->where('id',$id)->update($values);
    //
  	// session()->flash('msg','Product status has been updated successfully.');
    return redirect()->route('about.index');
  }
}
