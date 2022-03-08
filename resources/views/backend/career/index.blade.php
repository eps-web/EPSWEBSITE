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
        <div class="col-sm-12">
        <button type="button" class="btn btn-md btn-primary float-left d-inline " class="see" style="width:125px;height:45px; border-radius:12px;margin-right:5px;padding-top: 12px;
        padding-left: 24px;">All</button>


        <button type="" class="btn btn-md btn-primary float-left d-inline" class=" nav-link active" id="order" style="width:125px;height:45px; border-radius:12px;margin-right:5px;padding-top: 12px;
        padding-left: 24px;">
        Tecnical
         </button>

        <button type="" class="btn btn-md btn-primary float-left d-inline" class=" nav-link active" id="order" style="width:135px;height:45px; border-radius:12px;margin-right:5px;padding-top: 12px;
        padding-left: 24px;">
      Management
    </button>

      <?php
         $mang = App\Models\CareerCategory::where('id','title')
      ?>
        <button type="submit" class="btn btn-md btn-primary float-left d-inline" class=" nav-link active" id="order" style="width:125px;height:45px; border-radius:12px;margin-right:5px;padding-top: 12px;
        padding-left: 24px;">
    Accounts
         </button>



</div>
      </div>



    <br><br>


    <h4 class="float-center d-inline"><a href="#add_career" class="btn btn-info" style="border-radius: 12px;" data-toggle="modal">Add New</a></h4>
    <h4 class="float-center d-inline"><a href="{{route('careerCategory.index')}}" class="btn btn-info" style="border-radius: 12px;" data-toggle="">Add New Category</a></h4>
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
      <button style="border-radius:4px; background-color:#218838;color:#fff" class="  del_button" data-toggle="tooltip" title="" ><i class="fas fa-times-circle"></i>Delete</button>
      </form>
    </div>
<br><br>
    </div>
@endforeach
    </div>
  </div>
    <!-- // MOdel for Menu Create!-->
    <!-- Add Modal -->
        <div class="modal fade" id="add_career" aria-hidden="true" role="dialog">
          <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Job Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ route('backend-career.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row form-row">
                    <div class="col-6 col-sm-6" >
                      <div class="form-group">
                        <label>Job Title</label>
                        <input type="text" name="title" class="form-control">
                      </div>
                    </div>

                   <div class="form-group">
                        <label class="col-12 col-sm-12">vacancy</label>
                        <div class="form-group">
                            <input type="text" name="vacancy" class="form-control">

                        </div>
                        </div>

                        <div class="col-6 col-sm-6" >
                          <div class="form-group">
                            <label>job_responsibilities</label>
                            <input type="text" name="job_responsibilities" class="form-control">
                          </div>
                        </div>
                        <div class="col-6 col-sm-6" >
                          <div class="form-group">
                            <label>employment_status</label>
                            <input type="text" name="employment_status" class="form-control">
                          </div>
                        </div>

                        <div class="col-12 col-sm-6">
                          <div class="form-group">
                            <label>Logo</label>

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
                        <div class="col-6 col-sm-6" >
                          <div class="form-group">
                            <label>educational_requirements</label>
                            <input type="text" name="educational_requirements" class="form-control">
                          </div>
                        </div>
                        <div class="col-6 col-sm-6" >
                          <div class="form-group">
                            <label>  experience_requirements</label>
                            <input type="text" name="  experience_requirements" class="form-control">
                          </div>
                        </div>
                        <div class="col-6 col-sm-6" >
                          <div class="form-group">
                            <label>    additional_requirements</label>
                            <input type="text" name="    additional_requirements" class="form-control">
                          </div>
                        </div>
                        <div class="col-6 col-sm-6" >
                          <div class="form-group">
                            <label> compensation_other_benefits</label>
                            <input type="text" name=" compensation_other_benefits" class="form-control">
                          </div>
                        </div>
                        <div class="col-6 col-sm-6" >
                          <div class="form-group">
                            <label>     job_location</label>
                            <input type="text" name="     job_location" class="form-control">
                          </div>
                        </div>
                        <div class="col-6 col-sm-6" >
                          <div class="form-group">
                            <label>workplace</label>
                            <input type="text" name="workplace" class="form-control">
                          </div>
                        </div>
                        <div class="col-6 col-sm-6" >
                          <div class="form-group">
                            <label>  salary</label>
                            <input type="text" name="  salary" class="form-control">
                          </div>
                        </div>





                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /ADD Modal -->

    <!-- // MOdel for Sub Menu Create!-->
</div>
</div>
@endsection
