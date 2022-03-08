@extends('layouts.app')

@section('main-content')

<div class="page-wrapper">

    <div class="content container-fluid">
@include('validate')
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Welcome {{ Auth::user()->name }}</h3>
                    <ul class="breadcrumb">

                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('backend-home.index')}}">Benifit</a></li>
                        <li class="breadcrumb-item active">Update</li>
                      </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">

                <div class="col-md-10">
                    <div class="card flex-fill">
                        <div class="card-header">

                            <h4 class="card-title">Update Career</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend-career.update',$all_data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Title</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="title" value="{{ $all_data->title }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">vacancy</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="vacancy" value="{{ $all_data->vacancy }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">job_responsibilities</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="job_responsibilities" value="{{ $all_data->job_responsibilities }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">employment_status</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="employment_status" value="{{ $all_data->employment_status }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">employment_status</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="employment_status" value="{{ $all_data->employment_status }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">workplace</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="workplace" value="{{ $all_data->workplace }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">educational_requirements</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="educational_requirements" value="{{ $all_data->educational_requirements }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">experience_requirements</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="experience_requirements" value="{{ $all_data->experience_requirements }}" class="form-control">
                                    </div>
                                </div>
                              
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">additional_requirements</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="additional_requirements" value="{{ $all_data->additional_requirements }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">job_location</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="job_location" value="{{ $all_data->job_location }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">salary</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="salary" value="{{ $all_data->salary }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">compensation_other_benefits</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="compensation_other_benefits" value="{{ $all_data->compensation_other_benefits }}" class="form-control">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-form-label col-md-4">Logo</label>
                                    <div class="col-md-4">

                                        <input class="form-control" type="file" name="image" id="fimg" style="display: ">
                                        <img src="{{$all_data->image}}" alt="" id="feather_img" style="max-width:30%;display:block">
                   <label for="fimg" style="display: none;margin-bottom: 15px" id="second"><span class="btn btn-primary mt-2 "> Change Image</span></label>
                                    </div>
                                </div>




                                <div class="text-left">
                                    <button type="submit" class="float-left  btn-sm btn-primary" style="background-color:#0DB4F;">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>

    </div>
</div>

@endsection
