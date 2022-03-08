<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\menu;
use App\Models\Submenu;
class SubMenuController extends Controller
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
      // $submenus =  Submenu::all();
       $submenus= Submenu::orderBy('created_at','DESC')->get();
$menus = menu::all();
        return view('backend.menu.backendmenu',compact('submenus','menus'));
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

      ]);
      // dd($request->all());
   Submenu::create([
     'title'=>$request->title,
        'menu_id'=>$request->menu_id,
        'url'=>$request->url,

      ]);
            return redirect()->back()->with('success','benifits save successfully');
      // return redirect()->route('submenu.index')->with('success','submenu save successfully');
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

    public function update_drag_drop_submenu(Request $request)
    {
        $post= Submenu::all();

        foreach ($post as $submenu) {
            foreach ($request->order as $order) {
                if ($order['id'] == $submenu->id) {
                    $submenu->update(['order' => $order['position']]);
                }
            }
        }

        return response('Update Successfully.', 200);
    }

    function submenu_status_change($id)
    {
      //get product status with the help of product ID
      $submenu = DB::table('submenus')
            ->select('status')
            ->where('id','=',$id)
            ->first();

      //Check user status
      if($submenu->status == '1'){
        $status = '0';
      }else{
        $status = '1';
      }

      //update product status
      $values = array('status' => $status );
      DB::table('submenus')->where('id',$id)->update($values);
      //
      // session()->flash('msg','Product status has been updated successfully.');
      return redirect()->route('submenu.index');


    }
}
