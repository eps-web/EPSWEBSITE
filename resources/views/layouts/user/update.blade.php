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

                <div class="col-md-10">
                    <div class="card flex-fill">
                        <div class="card-header">

                            <h4 class="card-title">Update User</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.update',$all_data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">User Name</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="name" value="{{ $all_data->name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">User Role</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="user_role" value="{{ $all_data->user_role }}" class="form-control">
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label class="col-form-label col-md-4">User image</label>
                                    <div class="col-md-4">
                                        <label for="fimg" id="first"><img src="{{ URL::to('admin/assets/img/camera.jpg') }}" style="width:100px;cursor: pointer"/></label>
                                        <input class="form-control" type="file" name="image" id="fimg" style="display: none">
                                        <img src="" alt="" id="feather_img" style="max-width:30%;display:block">
                                        <label for="fimg" style="display: none;margin-bottom: 15px" id="second"><span class="btn btn-primary mt-2 "> Change Image</span></label>
                                    </div>
                                </div>


                                <div class="text-left">
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
