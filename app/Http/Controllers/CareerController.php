<?php

namespace App\Http\Controllers;
use App\Models\Career;
use App\Models\CareerCategory;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Spatie\Permission\Models\Permission;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     function __construct(Permission $permission)
         {

             $this->middleware('role_or_permission:Permission access|Permission create|Permission edit|Permission delete', ['only' => ['index','create']]);
             $this->middleware('role_or_permission:Permission create', ['only' => ['create','store']]);
             $this->middleware('role_or_permission:Permission edit', ['only' => ['edit','update']]);
             $this->middleware('role_or_permission:Permission delete', ['only' => ['destroy']]);
         }
    public function index()
    {
      $all_data = Career::orderBy('id','DESC')->paginate(4);
      $post_cat= CareerCategory::all();


      // $careers =  Career::orderby('id','DESC')->first();
     return view('backend.career.index',compact('all_data','post_cat'));
    // $careers =  Career::orderby('id','DESC')->first();
    //     return view('backend.career.index',compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // $careers =  Career::orderby('id','DESC')->first();
    // $careers = Career::all();
    //
    //   return view('backend.career.index',compact('careers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request->all());
      $this -> validate($request,[

        'title' => 'required',
        // 'vacancy' => 'required',
        // 'title' => 'required|string',
        'image'=>'required|image',
        'alt_tag'=>'required',

      ]);
    $post=   Career::create([
             "title" =>$request->title,
             'vacancy' =>$request->vacancy,
             'job_responsibilities' =>$request->job_responsibilities,
             'employment_status' =>$request->employment_status,
             'workplace' =>$request->workplace,
             'educational_requirements' =>$request->educational_requirements,
             'experience_requirements' =>$request->experience_requirements,
             'additional_requirements' =>$request->additional_requirements,
             'job_location' =>$request->job_location,
             'category' =>$request->category,
             'deadline' =>$request->deadline,
             'salary' =>$request->salary,
             'alt_tag' => $request->alt_tag,
             'image'=>'image.jpg',

             'compensation_other_benefits' =>$request->compensation_other_benefits,
             'published_at'=>Carbon::now(),

         ]);


         if($request->has('image')){
         $image=$request->image;
         $image_new_name = time().'.'.$image->getClientOriginalName();
         // return $image_new_name;
         $image->move('storage/benifits/',$image_new_name);
         $post->image='/storage/benifits/'.$image_new_name;
         $post->save();
         }
            // return redirect()->back();
         // return view('backend.career.index',compact('careers'));
            // dd($request->all());
           return redirect()->route('backend-career.index')->with('success','data save successfully');
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
      $all_data =  Career::find($id);
        return view('backend.career.update',compact('all_data'));
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



     ]);
       // dd($request->all());
     $edit_id = $id;
    $user = Career::find($edit_id);

    $user-> title = $request->title;
  $user->  vacancy =$request->vacancy;
  $user->  job_responsibilities =$request->job_responsibilities;
  $user->  employment_status =$request->employment_status;
  $user->  workplace =$request->workplace;
  $user->  educational_requirements =$request->educational_requirements;
  $user->  experience_requirements =$request->experience_requirements;
  $user->  additional_requirements =$request->additional_requirements;
  $user->  job_location =$request->job_location;
  $user->  deadline =$request->deadline;

  $user->  salary =$request->salary;



  $user->   compensation_other_benefits =$request->compensation_other_benefits;



     // $menu -> url = $request->url;
     if($request->hasFile('image')){
           $image=$request->image;
           $image_new_name = time().'.'.$image->getClientOriginalName();
           // return $image_new_name;
           $image->move('storage/career/',$image_new_name);
           $user->image='/storage/career/'.$image_new_name;
           $user->save();
         }


         // dd($request->all());
     $user ->update();
        // }

         //  return back();
         return redirect()->route('backend-career.index')->with('success','Career updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user_del= Career::find($id);
      $user_del ->delete();

        return redirect()->back()->with('delete','Data Deleted Successfully');
    }
    public function careerviewcategory($slug)
    {
      if(CareerCategory::where('slug',$slug)->exists())
      {

        $category=CareerCategory::where('slug',$slug)->first();
            $career=Career::where('category',$category->id)->get();
            return view('backend.career.catView',compact('category','career'));
      }
      else
      {
         return redirect()->back()->with('success','slug not!!');
      }

    }
    public function careerview($id)
    {
        return view('backend.career.View');

    }

}
