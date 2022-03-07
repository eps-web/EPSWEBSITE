<?php

namespace App\Http\Controllers;
use App\Models\Benifit;
use  DB;
use Illuminate\Http\Request;

class BenifitController extends Controller
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

      $all_data = Benifit::orderBy('id','DESC')->paginate(4);
        return view('backend.benifits.index',compact('all_data'));


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

          'title' => 'required',
          'image'=>'required|image',
          'alt_tag'=>'required',

      ]);
  $post= Benifit::create([
          'title' => $request->title,
          'descriptions' => $request->descriptions,
          'alt_tag' => $request->alt_tag,
          'image'=>'image.png',

      ]);

      if($request->has('image')){
        $image=$request->image;
        $image_new_name = time().'.'.$image->getClientOriginalName();
        // return $image_new_name;
        $image->move('storage/benifits/',$image_new_name);
        $post->image='/storage/benifits/'.$image_new_name;
        $post->save();
      }

      // return redirect()->back();
          return redirect()->back()->with('success','benifits save successfully');
        // dd($request->all());
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
      $all_data = Benifit::find($id);
        return view('backend.benifits.update',compact('all_data'));
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
      $edit_id = $id;
     $user = Benifit::find($edit_id);
      $user-> title = $request->title;
      $user-> descriptions = $request->descriptions;


      // $menu -> url = $request->url;
      if($request->hasFile('image')){
            $image=$request->image;
            $image_new_name = time().'.'.$image->getClientOriginalName();
            // return $image_new_name;
            $image->move('admin/storage/benifit/',$image_new_name);
            $user->image='/admin/storage/benifit/'.$image_new_name;
            $user->save();
          }


      $user ->update();
         // }

          //  return back();
          // dd($request->all());
          return redirect()->route('benifit.index')->with('success','Benifit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user_del= Benifit::find($id);
      $user_del ->delete();

        return redirect()->back()->with('delete','Data Deleted Successfully');
    }

    function benifit_status_change($id)
    {
      //get product status with the help of product ID
      $benifit = DB::table('benifits')
            ->select('status')
            ->where('id','=',$id)
            ->first();

      //Check user status
      if($benifit->status == '1'){
        $status = '0';
      }else{
        $status = '1';
      }

      //update product status
      $values = array('status' => $status );
      DB::table('benifits')->where('id',$id)->update($values);
      //
      // session()->flash('msg','Product status has been updated successfully.');
      return redirect()->route('benifit.index');


    }
}
