<?php

namespace App\Http\Controllers;
use App\Models\user;
use DB;
use Illuminate\Http\Request;

class UserManagement extends Controller
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

//       $authorizedRoles = ['super_admin', 'admin', 'hr'];
//
// $users = user::whereHas('users', static function ($query) use ($authorizedRoles) {
//                     return $query->whereIn('name', $authorizedRoles);
//                 })->get();
// User::whereHas("roles", function($q){ $q->where("name", "Member"); })->get()
$rolesWithUserCount = user::query('user')->get();
        $all_data =user::orderBy('created_at', 'DESC')->paginate(20);
        // $all_data =user::orderBy('created_at', 'DESC')->paginate(20);
        return view('layouts.user.users.index',compact('all_data','rolesWithUserCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $all_data =user::all();
        return view('layouts.user.create',compact('all_data'));
    }
    public function role()
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

            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
              'image'=>'required|image',
            'role' => 'required',
            'password' => 'required',
            'conf_password' =>'required'
        ]);
// dd($request->all());

        if($request->password == $request->conf_password )
        {
            $user= user::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' =>$request->phone,
                  'image'=>'image.png',
                'user_role'=>$request->role,
                'password' =>bcrypt($request->password)
            ]);

            if($request->hasFile('image')){
                  $image=$request->image;
                  $image_new_name = time().'.'.$image->getClientOriginalName();
                  // return $image_new_name;
                  $image->move('storage/user/',$image_new_name);
                  $user->image='/storage/user/'.$image_new_name;
                  $user->save();
                }
// dd($request->all());
            // return redirect()->route('user.index') ->with('success','User Create successfully');
        }


        else{
            // return redirect()->route('user.create') ->with('warning','Password Not Matched');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

            // $all_data = user::find($id);
              // return view('layouts.user.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $all_data = user::find($id);
        return view('layouts.user.update',compact('all_data'));



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
          'user_role' => 'required',


      ]);
      $edit_id = $id;
     $user = user::find($edit_id);
      $user-> name = $request->name;
      $user-> user_role = $request->user_role;
      // $menu -> url = $request->url;
      if($request->hasFile('image')){
            $image=$request->image;
            $image_new_name = time().'.'.$image->getClientOriginalName();
            // return $image_new_name;
            $image->move('storage/user/',$image_new_name);
            $user->image='/storage/user/'.$image_new_name;
            $user->save();
          }


      $user ->update();
         // }

          //  return back();
          // dd($request->all());
          return redirect()->route('user.index')->with('success','user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_del= user::find($id);
        $user_del ->delete();

          return redirect()->back()->with('delete','Data Deleted Successfully');
    }
    function status_change($id)
    {
    	//get product status with the help of product ID
    	$all_data = DB::table('users')
    				->select('status')
    				->where('id','=',$id)
    				->first();

    	//Check user status
    	if($all_data->status == 'active'){
    		$status = 'inactive';
    	}else{
    		$status = 'active';
    	}

    	//update product status
    	$values = array('status' => $status );
    	DB::table('users')->where('id',$id)->update($values);
      //
    	// session()->flash('msg','Product status has been updated successfully.');
      return redirect()->route('user.index');


    }
}
