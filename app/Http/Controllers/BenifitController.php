<?php

namespace App\Http\Controllers;
use App\Models\Benifit;
use  DB;
use  Image;
use Illuminate\Support\Facades\File;
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
          'image'=>'required|image|mimes:jpg,jpeg,png',
          'alt_tag'=>'required',

      ]);


      if($request->hasFile('image'))
      {

        $file=$request->file('image');
        $extention = $file->getClientOriginalName();
        $filename = time().'.'.$extention;
        // return $image_new_name;
        $file->move('storage/benifits/',$filename);
        $resizedImage =Image::make(public_path('storage/benifits/'.$filename))
        ->fit(86,80)->save();
      }
  $post= Benifit::create([
          'title' => $request->title,
          'descriptions' => $request->descriptions,
          'alt_tag' => $request->alt_tag,
          'image'=>'storage/benifits/'.$filename,

      ]);



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

        'image'=>'required|image|mimes:jpg,jpeg,png',

       ]);
       $edit_id = $id;
      $all_data = Benifit::find($edit_id);
       if($request->hasFile('image'))
       {

        $destination =$all_data->image;
             if(File::exists($destination))
             {
                 File::delete($destination);
             }
         $file=$request->file('image');
         $extention = $file->getClientOriginalName();
         $filename = time().'.'.$extention;
         // return $image_new_name;
         $file->move('storage/benifits/',$filename);
         $resizedImage =Image::make(public_path('storage/benifits/'.$filename))
         ->fit(84,80)->save();

       }

       $edit_id = $id;
      $all_data = Benifit::find($edit_id);

       $all_data-> title = $request->title;
       $all_data-> descriptions = $request->descriptions;
       $all_data-> image ='storage/benifits/'.$filename;

       $all_data ->update();

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
        $destination =$user_del->image;
       if(File::exists($destination))
       {
           File::delete($destination);
       }
       $user_del->delete();

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
