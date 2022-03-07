<?php

namespace App\Http\Controllers;

use App\Models\settings;
use App\Models\logo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SettingsManagement extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function settingsView(){

        $st= settings::find(1);
        return view('layouts.settings.contact',[
            'sitt' =>$st,
        ]);
    }

    public function settingsViewUpdate(Request $request){
      $edit_data=settings::find(1);
      $edit_data ->address = $request ->address;
      $edit_data ->email = $request ->email;
      $edit_data ->Contact = $request ->contact;
      $edit_data ->Maps =$request->map;

      $social=[
        'facebook' => $request->fb,
        'linkedin' => $request->ln,
        'twitter' => $request->tw,
        'youtube' =>$request->yu,
    ];

    $edit_data-> social= json_encode($social);




      $edit_data ->update();
      // dd($request->all());
      return redirect()->back() ->with('success','data updated successfully');
    }

    public function eps_map()
    {
      $map = logo::orderBy('id','DESC')->paginate(4);
        return view('layouts.settings.socialicon',compact('map'));
    }

    public function settingsLogo(){
      $logos = logo::orderBy('id','DESC')->paginate(4);
        return view('layouts.settings.logo',compact('logos'));

    }
    public function store(Request $request)
    {
      $this -> validate($request,[

          'image'=>'required|image',
          'alt_tag'=>'required',

      ]);
    $post=  logo::create([

              'alt_tag' => $request->alt_tag,
              'image'=>'image.png',
               'published_at'=>Carbon::now(),

          ]);

                if($request->has('image')){
                  $image=$request->image;
                  $image_new_name = time().'.'.$image->getClientOriginalName();
                  // return $image_new_name;
                  $image->move('storage/benifits/',$image_new_name);
                  $post->image='/storage/benifits/'.$image_new_name;
                  $post->save();

      return redirect()->back() ->with('success','data updated successfully');
    }
  }
}
