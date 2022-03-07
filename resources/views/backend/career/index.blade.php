@extends('layouts.app')

@section('main-content')

 <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome {{ Auth::user()->name }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
  <h5 style="text-align:center;">Eps Job Circular</h5>

  <!-- Outline Buttons -->

<br>
    <div class="body">
      <div class="row">
        <div class="col-md-12">
        <button type="button" class="btn btn-md btn-primary float-left d-inline " class="see" style="width:145px; border-radius:16px;margin-right:5px;">All</button>


        <button type="" class="btn btn-md btn-primary float-left d-inline" class=" nav-link active" id="order" style="width:145px; border-radius:16px;margin-right:5px;">
        Tecnical
         </button>

        <button type="" class="btn btn-md btn-primary float-left d-inline" class=" nav-link active" id="order" style="width:145px; border-radius:16px;margin-right:5px;">
      Management
         </button>
      <?php
         $mang = App\Models\CareerCategory::where('id','title')
      ?>
        <button type="submit" class="btn btn-md btn-primary float-left d-inline" class=" nav-link active" id="order" style="width:145px; border-radius:16px;margin-right:5px;">
    Accounts
         </button>



</div>
      </div>



    <br><br>

    <h4 class="float-center d-inline"><a href="#add_cat" class="btn btn-info" data-toggle="modal">Add New</a></h4>
    <h4 class="float-center d-inline"><a href="{{route('careerCategory.index')}}" class="btn btn-info" data-toggle="">Add New Category</a></h4>
  <br>
  <br>
    <div class="row">
@foreach($all_data as $data)
    <div class="col-md-10">
    <div class="profile-header"style="background-color:#FFFDE8;	border: 1px solid #F7E0A3; margin-right:12px;margin-bottom:10px;border-radius:12px;">
      <div class="row align-items-center">
        <div class="col ml-md-n2 profile-user-info" >

          <div class="feature-icon float-right d-inline" >

            <img class="rounded-circle" src="{{ asset($data->image) }}" width="3" height="2px;" alt="{{$data->alt_tag}}">
          </div>
          <h6 class="text-muted"style="font-size: 16px;color:#0D6B4F;">{{$data->title }}</h6>
          <hp class="text-muted">Easy Payment System</hp>
          <div class="about-text"><i i class="fa fa-map-marker" aria-hidden="true"style="padding-right:4px;color: #6565;"></i>{{$data->job_location }}</div>
          <div class="about-text"><i class="fa fa-graduation-cap "style="padding-right:4px;color: #6565;"></i>{{$data->educational_requirements }}</div>
          <div class="about-text"><i class="fas fa-user-alt "style="padding-right:4px;color: #6565;"></i>{{$data->additional_requirements}}</div>

      <div class="about-text float-right "><i class="fa fa-graduation-cap"style="padding-right:4px;color: #6565;"></i>{{ $data->created_at->format('d M, Y') }}</div>

    </div>


      </div>
    </div>
    <div class="actions">

     <a href="{{ route('backend-career.edit',$data->id) }}"  class="d-inline bg-primary-light" style="padding-top:5px;"  data-toggle="tooltip modal" data-toggle="modal" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i>Edit</a>


      <form action="{{ route('backend-career.destroy', $data->id) }}" method="POST" class=" d-inline">
  @include('validate')
          @method('delete')
              @csrf
      <button style="border-radius:12px; background-color:#218838;color:#fff" class="  del_button" data-toggle="tooltip" title="" ><i class="fas fa-times-circle"></i>Delete</button>
      </form>
    </div>

    </div>
@endforeach
    </div>
  </div>
    <!-- // MOdel for Menu Create!-->
      <div class="modal fade" id="add_cat">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4>Add Job Post</h4>
                      <button class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      <form action="{{ route('backend-career.store') }}" method="POST"  class="form-group" enctype="multipart/form-data">
                          @csrf
                            <input type="text" name="title" class="form-control" placeholder="Job Title"><br>
                            <input type="text" name="vacancy" class="form-control" placeholder="Vacancy"><br>
                            <input type="text" name="job_responsibilities" class="form-control" placeholder="Job Responsibility"><br>
                            <input type="text" name="employment_status" class="form-control" placeholder="Employment Status"><br>
                            <input type="text" name="educational_requirements" class="form-control" placeholder="Educational Requirements"><br>
                            <input type="text" name="experience_requirements" class="form-control" placeholder="Experience Requirements"><br>
                            <input type="text" name="additional_requirements" class="form-control" placeholder="Additional Requirements"><br>
                            <input type="text" name="job_location" class="form-control" placeholder="Job Location"><br>
                            <input type="text" name="salary" class="form-control" placeholder="Salary"><br>
                            <input type="text" name="workplace" class="form-control" placeholder="workplace"><br>
                            <input type="text" name="compensation_other_benefits" class="form-control" placeholder="Compensation & Other Benefits"><br>
                            <div class="col-12 col-sm-6">
                              <div class="form-group">
                                <label>Image</label>

                                <input class="form-control" type="file" name="image" id="fimg" style="">
                                <img src="" alt="" id="feather_img" style="max-width:30%;display:block">
                                <label for="fimg" style="display: none;margin-bottom: 15px" id="second"><span class="btn btn-primary mt-2 "> Change Image</span></label>

                              </div>
                            </div>
                            <div class="col-12 col-sm-6">
                              <div class="form-group">
                                <label>Image Alt_Tag</label>
                                <input type="text" name="alt_tag" class="form-control">
                              </div>
                            </div>
                            <div class="col-12 col-sm-6">
                            <select class="form-control post_tag_select"  name="cat">

                                @foreach ($post_cat as $p_cat )
                                category->name
                                <option  value= {{ $p_cat->id  }}>{{ $p_cat->name }}</option>
                                @endforeach


                            </select>
                          </div>
                          <!-- <input class="form-control" type="text" name="cat_name" placeholder="Category Name"><br> -->
                          <input class="btn btn-sm btn-info float-right" type="submit">

                      </form>
                  </div>
                  <div class="modal-footer"></div>
              </div>
          </div>
      </div>
    <!-- // MOdel for Sub Menu Create!-->
</div>
</div>
@endsection
