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
                        <li class="breadcrumb-item"><a href="{{route('backend-home.index')}}">Feature</a></li>
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

                            <h4 class="card-title">Update Feature</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('feature.update',$all_data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Heading</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="title" value="{{ $all_data->title }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Descriptions</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="descriptions" value="{{ $all_data->descriptions }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Side Title</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="card_title" value="{{ $all_data->card_title }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Side Descriptions</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="card_descriptions " value="{{ $all_data->card_descriptions}}" class="form-control">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-form-label col-md-4">feature image</label>
                                    <div class="col-md-4">

                                        <input class="form-control" type="file" name="image" id="fimg" style="display: ">
                                        <img src="{{$all_data->image}}" alt="" id="feather_img" style="max-width:30%;display:block">
                                      <label for="fimg" style="display: none;margin-bottom: 15px" id="second"><span class="btn btn-primary mt-2 "> Change Image</span></label>
                                    </div>
                                </div>




                                <div class="text-left">
                                    <button type="submit" class="btn btn-sm btn-primary" style="background-color:#0DB4F;">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>

    </div>
</div>

@endsection
