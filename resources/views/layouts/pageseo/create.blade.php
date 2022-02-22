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
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">

                <div class="col-md-8">
                    <div class="card flex-fill">
                        <div class="card-header">

                            <h4 class="card-title">Add SEO Infomation for Rank your Pages</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf


                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Select Pages</label>
                                    <div class="col-md-9">

                                        <select class="form-control post_tag_select"  name="cat">
                                            <option value="">---- Select Page ----</option>
                                            <option value="">Home</option>
                                            <option value="">About US</option>
                                            <option value="">Faq</option>
                                            <option value="">Balance Enquiry</option>
                                            <option value="">Privacy Policy}</option>
                                            <option value="">Sitemap</option>


                                        </select>




                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Page Title</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Separator</label>
                                    <div class="col-md-9">

                                        <select class="form-control post_tag_select"  name="cat">
                                            <option value="">---- Select Separator ----</option>
                                            <option value="-"> - </option>
                                            <option value="|"> | </option>
                                            <option value="%"> % </option>
                                            <option value="~"> ~ </option>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Site Title</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="title" Value="EPS - Easy Payment System" class="form-control">
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Meta Description</label>
                                    <div class="col-md-9">
                                        <textarea rows="5" cols="5" name="content"  class="form-control" {{-- id="ckeditor" --}} placeholder="Enter text here"></textarea>
                                    </div>
                                </div>

                                   {{--  <div class="form-group row">
                                        <label class="col-form-label col-md-3">Featured image</label>
                                        <div class="col-md-9">
                                            <label for="fimg" id="first"><img src="{{ URL::to('admin/assets/img/camera.jpg') }}" style="width:100px;cursor: pointer"/></label>
                                            <input class="form-control" type="file" name="image" id="fimg" style="display: none">
                                            <img src="" alt="" id="feather_img" style="max-width:30%;display:block">
                                            <label for="fimg" style="display: none;margin-bottom: 15px" id="second"><span class="btn btn-primary mt-2 "> Change Image</span></label>
                                        </div>
                                    </div> --}}


                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Canonical Url</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="title" Value="" class="form-control">
                                        </div>
                                    </div>


                                    {{-- Schema Markup  --}}


                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Schema Markup</label>

                                        <div class="col-md-9">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Schema </h4>
                                                </div>
                                                <div class="card-body">
                                                    <ul class="nav nav-tabs">
                                                        <li class="nav-item"><a class="nav-link" href="#basictab1" data-toggle="tab">Home</a></li>
                                                        <li class="nav-item"><a class="nav-link active" href="#basictab2" data-toggle="tab">Profile</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="#basictab3" data-toggle="tab">Messages</a></li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane show" id="basictab1">
                                                            Tab content 1
                                                        </div>
                                                        <div class="tab-pane active" id="basictab2">
                                                            Tab content 2
                                                        </div>
                                                        <div class="tab-pane" id="basictab3">
                                                            Tab content 3
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>











                                    {{-- end schema markup --}}










                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>

    </div>
</div>

@endsection


