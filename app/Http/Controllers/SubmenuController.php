<?php
namespace App\Http\Controllers;
use App\Models\Menu;
use App\Http\Controllers\Controller;
// use DB;
use App\Models\Submenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SubmenuController extends Controller


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
       $submenus= Submenu::orderBy('order','ASC')->get();
// $menus = Menu::all();
        return view('backendmenu',compact('submenus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();

        return view('backend.submenu.create',compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // $this -> validate($request,[
      //
      //     'name' => 'required',
      //     'menu' => 'required',
      // ]);
      // dd($request->all());
   Submenu::create([
     'name'=>$request->name,
        'menu_id'=>$request->menu_id,
        'url'=>$request->url,

      ]);
        // dd($request->all());
      return redirect()->route('menu.index')->with('success','submenu save successfully');
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
}
