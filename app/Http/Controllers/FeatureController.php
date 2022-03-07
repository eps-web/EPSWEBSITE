<?php

namespace App\Http\Controllers;
use App\Models\Features;
use DB;
use Illuminate\Http\Request;

class FeatureController extends Controller
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
        $all_data =Features::orderBy('created_at', 'DESC')->paginate(20);


        return view('backend.feature.index',compact('all_data'));

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
'alt_tag'=>'required',
          'image'=>'required|image',

      ]);
  $post= Features::create([
          'title' => $request->title,
          'alt_tag' => $request->alt_tag,
          'card_title' => $request->card_title,

          'descriptions' => $request->descriptions,
          'card_descriptions' => $request->card_descriptions,
          'image'=>'image.png',

      ]);

      if($request->has('image')){
        $image=$request->image;
        $image_new_name = time().'.'.$image->getClientOriginalName();
        // return $image_new_name;
        $image->move('storage/features/',$image_new_name);
        $post->image='/storage/features/'.$image_new_name;
        $post->save();
      }

      // dd($request->all());
        return redirect()->back()->with('success','Features save successfully');
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
      $all_data = Features::find($id);
        return view('backend.feature.update',compact('all_data'));
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
     $user = Features::find($edit_id);

      $user-> title = $request->title;
      $user-> descriptions = $request->descriptions;
      $user-> card_title = $request->card_title;
      $user-> card_descriptions = $request->card_descriptions;


      // $menu -> url = $request->url;
      if($request->hasFile('image')){
            $image=$request->image;
            $image_new_name = time().'.'.$image->getClientOriginalName();
            // return $image_new_name;
            $image->move('storage/feature/',$image_new_name);
            $user->image='/storage/feature/'.$image_new_name;
            $user->save();
          }


          // dd($request->all());
      $user ->update();
         // }

          //  return back();
          return redirect()->route('feature.index')->with('success','Feature updated successfully');
      }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user_del= Features::find($id);
      $user_del ->delete();

        return redirect()->back()->with('delete','Data Deleted Successfully');
    }

    function feature_status_change($id)
    {

      	//get product status with the help of product ID
      	$all_data = DB::table('features')
      				->select('status')
      				->where('id','=',$id)
      				->first();

      	//Check user status
      	if($all_data->status == '1'){
      		$status = '0';
      	}else{
      		$status = '1';
      	}

      	//update product status
      	$values = array('status' => $status );
      	DB::table('features')->where('id',$id)->update($values);
        //
      	// session()->flash('msg','Product status has been updated successfully.');
        return redirect()->route('feature.index');


      }
      //get product status with the help of product ID

}
