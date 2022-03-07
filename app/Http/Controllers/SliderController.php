<?php

namespace App\Http\Controllers;
use App\Models\SliderSections;
use Illuminate\Http\Request;
use DB;

class SliderController extends Controller
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
      $all_data =SliderSections::orderBy('created_at', 'DESC')->limit(2)->get();


      return view('backend.slider.index',compact('all_data'));


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
      $this -> validate($request,[

          'title' => 'required',
          'description' => 'required',

          'alt_tag'=>'required',

      ]);
  $post= SliderSections::create([
          'title' => $request->title,
          'description' => $request->description,
          'image'=>'image.png',
          'alt_tag'=>$request->alt_tag,

      ]);
      // dd($request->all());

      if($request->has('image')){
        $image=$request->image;
        $image_new_name = time().'.'.$image->getClientOriginalName();
        // return $image_new_name;
        $image->move('storage/slider/',$image_new_name);
        $post->image='/storage/slider/'.$image_new_name;
        $post->save();
      }
// dd($request->all());
      // return redirect()->back();
          return redirect()->back()->with('success','slider save successfully');
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
      $all_data = SliderSections::find($id);
        return view('backend.slider.update',compact('all_data'));
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
      $this -> validate($request,[

         // 'name' => 'required',
         'title' => 'required',



     ]);
       // dd($request->all());
     $edit_id = $id;
    $user = SliderSections::find($edit_id);

     $user-> title = $request->title;
     $user-> description = $request->description;
     $user-> alt_tag = $request->alt_tag;



     // $menu -> url = $request->url;
     if($request->hasFile('image')){
           $image=$request->image;
           $image_new_name = time().'.'.$image->getClientOriginalName();
           // return $image_new_name;
           $image->move('storage/slider/',$image_new_name);
           $user->image='/storage/slider/'.$image_new_name;
           $user->save();
         }


     $user ->update();
     // dd($request->all());
        // }

         return redirect()->route('slider.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user_del= SliderSections::find($id);
      $user_del ->delete();
// dd($request->all());
        return redirect()->back()->with('delete','Data Deleted Successfully');
    }


    function slider_status_change($id)
    {
      //get product status with the help of product ID
      $slider = DB::table('slider_sections')
            ->select('status')
            ->where('id','=',$id)
            ->first();

      //Check user status
      if($slider->status == '1'){
        $status = '0';
      }else{
        $status = '1';
      }

      //update product status
      $values = array('status' => $status );
      DB::table('slider_sections')->where('id',$id)->update($values);
      //
      // session()->flash('msg','Product status has been updated successfully.');
      return redirect()->route('slider.index');


    }
}
