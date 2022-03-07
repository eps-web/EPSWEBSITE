<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Superadmin;
class AdminController extends Controller
{
    public function superadmin()
    {
      return view('layouts.app');
    }
}
