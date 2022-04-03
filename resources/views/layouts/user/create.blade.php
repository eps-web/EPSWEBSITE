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
                        <li class="breadcrumb-item active"><a href="index.html">Dashboard</a></li>

                        <li class="breadcrumb-item"><a href="{{route('user.index')}}">User</a></li>
                        <li class="breadcrumb-item active">Create User</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">

                <div class="col-md-8">
                    <div class="card flex-fill">
                        <div class="card-header">

                            <h4 class="card-title">Create  User</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Name</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="name"  class="form-control">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Email</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="email"  class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Phone</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="phone"  class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Image</label>
                                    <div class="col-lg-9">
                                      <input class="form-control" type="file" name="image" id="fimg" style="">
                                      <img src="" alt="" id="feather_img" style="max-width:30%;display:block">
                                      <label for="fimg" style="display: none;margin-bottom: 15px" id="second"><span class="btn btn-primary mt-2 "> Change Image</span></label>
                                    </div>
                                </div>


                                <div class="form-group row">
                                      <label class="col-form-label col-md-3">User Role</label>
                                      <div class="col-md-9">

                                        <select name="role" id="" class="form-control">
                                            <option value="" style="display: none" selected>Select Role</option>

                                            @foreach($role as $c)
                                            @if ((Auth::user()->user_role == 'superadmin'))

                                                <option value="{{ $c->slug }}"> {{ $c->slug }} </option>
                                            @else
                                            <option value="{{ $c->slug }}"> {{ $c->slug }} </option>
                                            @endif
                                            @endforeach
                                        </select>

                                      </div>
                                  </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Password</label>
                                    <div class="col-lg-9">
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Confirm Password</label>
                                    <div class="col-lg-9">
                                        <input type="password" name="conf_password" class="form-control">
                                    </div>
                                </div>



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
