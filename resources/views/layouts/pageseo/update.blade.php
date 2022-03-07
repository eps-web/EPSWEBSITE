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

            <div class="col-md-8 card " style="margin-left:15px">
                <i class="bi bi-globe"><a href="#" style="color:black">https://eps.com.bd/<span id="page" style="text-transform:lowercase">{{Str::slug($seo->page_name)  }}</span></a></i>
                <h3 style="color:blueviolet; font-size:24px"><span id="titledes">{{ $seo ->title }} </span><span id="sep"> {{ $seo ->separator }} </span><span id="subtitle">{{ $seo ->sub_title }}</span></h3>
                <p id="metades" style="margin-top:-10px" >{{ $seo ->meta_description }}</p>

            </div>

            <div class="col-md-8">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h4 class="card-title">Page SEO Metrics</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pageseo.update',$seo ->id) }}" method="POST">
                            @csrf
                            @method('PUT')


                            <div class="form-group row">
                                <label class="col-form-label col-md-3">Select Pages</label>
                                <div class="col-md-9">

                                    <select class="form-control post_tag_select"  name="page" id="pages" >
                                        <option  value="{{ $seo ->page_name }}">{{ $seo ->page_name }}</option>
                                        <option  value="Home">Home</option>
                                        <option value="About Us">About US</option>
                                        <option  value="Faq">Faq</option>
                                        <option  value=" Balance Enquiry">Balance Enquiry</option>
                                        <option  value="Privacy Policy">Privacy Policy</option>
                                        <option  value="Sitemap">Sitemap</option>


                                    </select>




                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Page Title</label>
                                <div class="col-lg-9">
                                    <input type="text" id="titlearea" value="{{ $seo ->title }}" name="ptitle" maxlength="60" class="form-control">
                                    <span id="titlearea_feedback" style="float:right"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-3" >Separator</label>
                                <div class="col-md-9">

                                    <select class="form-control post_tag_select"   name="separator" id="separator">
                                        <option value="{{ $seo ->separator }}">{{ $seo ->separator }}</option>
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
                                    <input type="text" id="subtitlearea" name="site_title" Value="{{ $seo ->sub_title }}" class="form-control">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-form-label col-md-3">Meta Description</label>
                                <div class="col-md-9">
                                    <textarea rows="5" cols="5" id="textarea" maxlength="160" name="content"  class="form-control" {{-- id="ckeditor" --}} placeholder="Enter text here">{{ $seo ->meta_description }}</textarea>
                                    <span id="textarea_feedback" style="float:right"></span>
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
                                        <input type="text" name="can_url" Value="{{ $seo ->Canonical_Url }}" class="form-control">
                                    </div>
                                </div>


                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection


