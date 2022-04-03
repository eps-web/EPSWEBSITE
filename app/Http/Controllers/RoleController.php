<?php

namespace App\Http\Controllers;
use App\Models\user;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Str;
use Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


      function __construct()
      {
          $this->middleware('role_or_permission:Role access|Role create|Role edit|Role delete', ['only' => ['index','create']]);
          $this->middleware('role_or_permission:Role create', ['only' => ['create','store']]);
          $this->middleware('role_or_permission:Role edit', ['only' => ['edit','update']]);
          $this->middleware('role_or_permission:Role delete', ['only' => ['destroy']]);
      }

      /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index()
      {
          $role= Role::latest()->paginate(7);

          return view('role.index',['roles'=>$role]);
      }

      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
          $permissions = Permission::get();
          return view('role.create',['permissions'=>$permissions]);
      }

      /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function store(Request $request)
      {
          $request->validate(['name'=>'required']);

          $role = Role::create([
            'name'=>$request->name,
             'slug' =>Str::slug($request->name),
        ]);

          $role->syncPermissions($request->permissions);

        return redirect()->route('role.index')->with('success','role add successfully');
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
      public function edit(Role $role)
      {
          $permission = Permission::get();
          $role->permissions;
         return view('role.edit',['role'=>$role,'permissions' => $permission]);
      }

      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request, Role $role)
      {
          $role->update(['name'=>$request->name]);
          $role->syncPermissions($request->permissions);
            return redirect()->route('role.index')->with('success','role updated successfully');
      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy(Role $role)
      {
          $role->delete();
          return redirect()->back()->withSuccess('Role deleted !!!');
      }
      function roleview($slug)
      {
        if(Role::where('slug',$slug)->exists())
        {

          $category=Role::where('slug',$slug)->first();
              $career=user::where('user_role',$category->name)->get();
              return view('layouts.user.userView',compact('category','career'));
        }


      }
      function adminview($slug)
      {
        if(Role::where('slug',$slug)->exists())
        {

          $category=Role::where('slug',$slug)->first();
              $career=user::where('user_role',$category->name)->get();
              return view('layouts.user.userView',compact('category','career'));
        }


      }
}
