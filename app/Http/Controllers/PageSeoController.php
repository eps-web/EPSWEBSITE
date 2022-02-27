<?php

namespace App\Http\Controllers;

use App\Models\PageSeo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageSeoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PageSeo::all();
        return view('layouts.pageseo.index',[
            'all_data' => $data,
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.pageseo.create');
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

            'page' => 'required|unique:page_seos,page_name',
            'ptitle' =>'required',
            'separator' =>'required',
            'content' =>'required',


        ]);


        $seo = PageSeo::create([
            "page_name" => $request->page,
            "title" => $request->ptitle,
            "slug" => Str::slug($request->ptitle),
            "separator" => $request->separator,
            "sub_title" => $request->site_title,
            "meta_description" => $request->content,
            "Canonical_Url" => $request->can_url,
            "posted_by" => Auth::user()->id,

        ]);

        return redirect()->route('pageseo.index') ->with('success','Page SEO Metrics Added successfully');

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
        $p= PageSeo::find($id);
        return view('layouts.pageseo.update',[
            'seo' => $p,
        ]);
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
        $edit_id = $id;
        $edit_data=PageSeo::find($edit_id);
        $edit_data -> page_name = $request->page;
        $edit_data -> title = $request->ptitle;
        $edit_data -> separator = $request->separator;
        $edit_data -> sub_title = $request->site_title;
        $edit_data -> meta_description = $request->content;
        $edit_data -> Canonical_Url = $request->can_url;

        $edit_data ->update();
        return redirect()->route('pageseo.index') ->with('success','Page SEO Metrics Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     */
    public function destroy($id)
    {
        //
    }
}
