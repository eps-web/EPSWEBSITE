<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
  function __construct(Permission $permission)
      {

          $this->middleware('role_or_permission:Permission access|Permission create|Permission edit|Permission delete', ['only' => ['index','create']]);
          $this->middleware('role_or_permission:Permission create', ['only' => ['create','store']]);
          $this->middleware('role_or_permission:Permission edit', ['only' => ['edit','update']]);
          $this->middleware('role_or_permission:Permission delete', ['only' => ['destroy']]);
      }

      /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index()
      {
          $permission= Permission::latest()->get();
           $roles = Role::latest()->get();
          return view('permission.index',['permissions'=>$permission]);
      }

      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
        $roles = Role::get();
          return view('permission.create',compact('roles'));
      }

      /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function store(Request $request)
      {
          // validation
          $request->validate([
              'name'=>'required',
          ]);
          $permission = Permission::create(['name'=>$request->name]);
          return redirect()->route('permission.index')->with('success','permission save successfully');
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
      public function edit(Permission $permission)
      {
         return view('permission.edit',['permission' => $permission]);
      }

      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request, Permission $permission)
      {
          $permission->update(['name'=>$request->name]);
          return redirect()->route('permission.index')->with('success','permission updated successfully');

      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy(Permission $permission)
      {
          $permission->delete();
          return redirect()->back()->withSuccess('Permission deleted !!!');
      }
}
