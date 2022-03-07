<?php

namespace App\Http\Controllers;
use DB;

use App\Models\HomePage;
use Illuminate\Http\Request;

class HomePagemanagement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
       $this->middleware('auth');
     }
    public function index()
    {

       // $all_data = Features::all();
       $all_data = HomePage::orderBy('id','DESC')->limit(1)->get();

          return view('backend.homepage.index',compact('all_data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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

          'link_apple' => 'required',
          'link_ggogle' => 'required',



      ]);
  $post= HomePage::create([
          'link_apple' => $request->link_apple,
          'link_ggogle' => $request->link_ggogle,


      ]);



// dd($request->all());
      // return redirect()->back();
          return redirect()->back()->with('success',' save successfully');
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

    function benifit_section($id)
    {
      //get product status with the help of product ID
      $benifit = DB::table('home_pages')
            ->select('section')
	->where('id','=',$id)
            ->first();

      //Check user status
      if($benifit->section == 'benifit'){
        $section = 'slider';
      }else{
        $section = 'benifit';
      }

      //update product status
      $values = array('section' => $section );
      DB::table('home_pages')->where('id',$id)->update($values);
      //
      // session()->flash('msg','Product status has been updated successfully.');
      return redirect()->route('benifit.index');
    }
}
