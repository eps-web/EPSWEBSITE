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
      <div class="div">
       <h4 class="float-left d-inline"><a href="{{ route('submenu.index') }}" class="btn btn-info" >All SubMenu</a></h4>
      </div>
      <br><br>
      <div class="row">

              <div class="col-md-10">
                  <div class="card flex-fill">
                      <div class="card-header">

                          <h4 class="card-title">Create Sub Menu</h4>
                      </div>
                      <div class="card-body">
                          <form action="{{ route('submenu.store') }}" method="POST" enctype="multipart/form-data">
                              @csrf

                              <div class="form-group row">
                                  <label class="col-lg-3 col-form-label"> Sub Menu Name</label>
                                  <div class="col-lg-9">
                                      <input type="text" name="name" class="form-control">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-lg-3 col-form-label"> Main Menu</label>
                                  <div class="col-lg-9">
                                    <select class="form-control"  name="menu_id" id="menu">
                                      @foreach($menus as $item)
                                      <option value="" selected style="display:none;">Select Main Menu</option>
                                      <option value="{{$item->id}}">
                                        {{$item->name}}
                                      </option>
                                      @endforeach

                                   </select>
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label class="col-lg-3 col-form-label">Url</label>
                                  <div class="col-lg-9">
                                      <input type="text" name="url" class="form-control">
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
