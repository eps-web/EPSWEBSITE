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
      <div class="div">
       <h4 class="float-right d-inline"><a href="{{ route('menu.index') }}" class="btn btn-info" >All Menu</a></h4>
      </div>
      <br><br>
      <div class="row">

              <div class="col-md-10">
                  <div class="card flex-fill">
                      <div class="card-header">

                          <h4 class="card-title">Create Menu</h4>
                      </div>
                      <div class="card-body">
                          <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                              @csrf

                              <div class="form-group row">
                                  <label class="col-lg-3 col-form-label">Menu Name</label>
                                  <div class="col-lg-9">
                                      <input type="text" name="name" class="form-control">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-lg-3 col-form-label">Url</label>
                                  <div class="col-lg-9">
                                      <input type="text" name="url" class="form-control">
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label class="col-lg-3 col-form-label">Create Submenu</label>
                                  <div class="col-lg-9">
                                      <h4 type="submit" class="float-left d-inline"><a href="{{ route('submenu.create') }}" class="btn btn-info">Create Submenu</a></h4>
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
