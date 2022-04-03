
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

            <h3 class="card-title">User Panel</h3>
            @include('validate')
          <br>
            <div class="card-tools">

              @can('Role create')
              <a class="float-right d-inline btn btn-primary" href="{{ route('role.create') }}" ><i class="fas fa-plus-circle"></i> Create new Role</a>
              @endcan
                @can('User create')
                <a href="{{ route('user.create') }}" class="float-right d-inline btn btn-primary"><i class="fas fa-plus-circle"></i> Add new User</a>
                @endcan
            </div>

            <div class="body">

              @if ((Auth::user()->user_role == ['user_id=1','superadmin']))
              <div class="row">
                <div class="col-md-12">

                  @foreach($role as $data)


            <a href="{{url('role-view/'.$data->slug)}}" class="btn btn-md btn-primary float-left d-inline"
            style="background-color: #00d0f1;
            border: 1px solid #00d0f1;
            margin: 2px;
            border-radius: 10px;
            width: 106px;"value="">
            {{ $data->name}}</a>
            @endforeach

        </div>

              </div>
                @endif
                <div class="row">
                  <div class="col-md-12">
                @foreach($role as $data)
              @if ((Auth::user()->user_role == 'admin'))




                      <a href="{{url('role-view/'.$data->slug)}}" class="btn btn-md btn-primary float-left d-inline"
                      style="background-color: #00d0f1;
                      border: 1px solid #00d0f1;
                      margin: 2px;
                      border-radius: 10px;
                      width: 106px;">
                      {{ $data->name}}</a>

            @else
            <a href="{{url('role-view/'.$data->slug)}}" class="btn btn-md btn-primary float-left d-inline"
            style="background-color: #00d0f1;
            border: 1px solid #00d0f1;
            margin: 2px;
            border-radius: 10px;
            width: 106px;">
            {{ $data->name}}</a>
            @endif
            @endforeach

          </div>

        </div>
  <br><br>
  <div class="row">
                <div class="col-md-6">
                <section class="comp-section comp-cards">
                  <div class="row">
                   @foreach ($all_data as $data)
                   <div class=" col-md-6 ">
                     <div class="card flex-fill">
                       <img alt="Card Image" src="{{ asset($data->image) }}" class="card-img-top">
                       <div class="card-header">
                         <h5 class="card-title mb-0">{{ $data->name }}</h5>
                         <h5 class="card-title mb-0">{{ $data->super_name }}</h5>
                         <p class="card-text">{{ $data->user_role}}</p>
                                          <a class="card-link " href="https://webmail.gigared.com/"><i class="fa fa-google"></i></a>
                       </div>
                       <div class="card-body">
                         <a class="card-link" href="#"></a>

                         <div class="actions">
                           <!-- <a href="#edit_users_details"class="float-right d-inline" edit_id="{{ $data->id }}" data-toggle="modal" class="btn btn-sm  update_cat" data-toggle="tooltip modal" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a> -->
                           <form action="{{ route('user.destroy', [$data->id]) }}" class="mr-1" method="POST">
                             @method('DELETE')
                             @csrf
                             <!-- <button type="submit" class="btn btn-sm btn-info float-right d-inline" style="margin-right:5px;"> <i class="fas fa-window-close"></i> </button> -->
                             <button type="submit" class="  btn-sm btn- float-right d-inline" style="padding-right:px; " >
                               <i class="fas fa-window-close "style=""aria-hidden="true"></i></button>

                             </form>
                             <a href="{{ route('user.edit',$data->id) }}"  class="btn-sm  float-right d-inline" style="padding-top:5px;" data-toggle="tooltip" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                           </div>
                           <div class="status-toggle float-right" >
                             <?php if($data->status == '1'){ ?>

                               <a href="{{url('/status-change',$data->id)}}" class="btn btn-sm btn-success">Active</a>

                             <?php }else{ ?>

                               <a href="{{url('/status-change',$data->id)}}" class="btn btn-sm btn-danger">Inactive</a>

                             <?php } ?>
                           </div>
                         </div>
                       </div>
                     </div>
                     @endforeach
                  </section>
                </div>
                </div>

            <div class="col-md-5">
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
                                    <input type="text" name="super_name"  class="form-control">
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




                              <div class="col-6 col-sm-6" >
                                <div class="form-group">
                                    <label>  Role</label>
                                    <select name="role" id="" class="form-control">
                                        <option value="" style="display: none" selected>Select Role</option>
                                        @foreach($role as $c)
                                        <option value="{{ $c->id }}"> {{ $c->name }} </option>
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
</div>
@endsection
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script>
          $("#order").click(function()
          {
              $("#appear").show();
           });


      </script>
