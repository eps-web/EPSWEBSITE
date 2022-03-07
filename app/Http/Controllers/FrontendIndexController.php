<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
class FrontendIndexController extends Controller
{
  public function home()
  {
 $menus = Menu::all();
   $menus = Menu::where('status','1')->get();
  return view('frontend.layout.Menu.menu',compact('menus'));
 }


}
