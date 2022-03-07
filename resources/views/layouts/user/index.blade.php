
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
            <div class="card-header">
                 @include('validate')
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title">User panel</h3>
                   <h4 class="float-left d-inline"><a href="{{ route('user.create') }}" class="btn btn-info" data-toggle="">Add User</a></h4>
                   <h4 class="float-left d-inline"><a href="{{ route('role.index') }}" class="btn btn-info" data-toggle="">User Role</a></h4>

                </div>
            </div><br>
            @if ((Auth::user()->user_role == 'superadmin'))
            <div class="row">
              <div class="col-md-8">
                <div class=" schedule-widget mb-0">
               <!-- Schedule Nav -->
               <div class="schedule-nav">
                 <ul class="nav nav-tabs nav-justified">
                   <li class="nav-item">
                     <a class="nav-link active" id="order" style="background-color:#138496;color:#fff;" data-toggle="tab" href="#slot_monday">Super Admin</a>
                   </li>
<button class="btn btn-sm btn-primary" type="submit" id="order">Super admin</button>
                   <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#slot_tuesday">Admin</a>
                   </li>
                   <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#slot_tuesday">Hr</a>
                   </li>
                   <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#slot_wednesday">Editor</a>
                   </li>
                   <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#slot_thursday">Viewer</a>
                   </li>
                 </ul>
               </div>
               <!-- /Schedule Nav -->

             </div>
             </div>
             </div>
             <div id="appear" style="display:">
               <?php
               $rolesWithUserCount = App\Models\user::query('superadmin')->get();
               ?>
               @foreach ($rolesWithUserCount as  $item)
               {{ $item->name }}

               @endforeach
             </div>
            @endif

            @if ((Auth::user()->user_role == 'admin'))
            <div class="row">
              <div class="col-md-8">
                <div class=" schedule-widget mb-0">
               <!-- Schedule Nav -->
               <div class="schedule-nav">
                 <ul class="nav nav-tabs nav-justified">
                   <li class="nav-item">
                     <a class="nav-link active" style="background-color:#138496;color:#fff;" data-toggle="tab" href="#slot_monday"> Admin</a>
                   </li>

                   <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#slot_tuesday">Hr</a>
                   </li>
                   <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#slot_wednesday">Editor</a>
                   </li>
                   <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#slot_thursday">Viewer</a>
                   </li>
                 </ul>
               </div>
               <!-- /Schedule Nav -->

             </div>
             </div>
             </div>
            @endif
<br>
<div class=" col-lg-8">
<div class="row">

<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Search">
  <div class="input-group-append">
    <button class="btn btn-success" type="submit">Go</button>
  </div>
</div>
   </div>
   </div>
   <br>




<div class="row">
 <div class="col-md-12">
    <div class="col-md-12">
    <section class="comp-section comp-cards">
      <div class="row">
       @foreach ($all_data as $data)
       <div class=" col-md-3 ">
         <div class="card flex-fill">
           <img alt="Card Image" src="{{ asset($data->image) }}" class="card-img-top">
           <div class="card-header">
             <h5 class="card-title mb-0">{{ $data->name }}</h5>
           </div>
           <div class="card-body">
             <p class="card-text">{{ $data->user_role}}</p>
             <a class="card-link" href="#">{{ $data->email}}</a>
             <a class="card-link" href="https://webmail.gigared.com/"><i class="fa fa-google"></i></a>
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
                 <?php if($data->status == 'active'){ ?>

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
    <div class="modal fade" id="add_user" aria-hidden="true" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Users</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
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
                      <label class="col-form-label col-md-4">User image</label>
                      <div class="col-md-7">
                          <label for="fimg" id="first"><img src="{{ URL::to('admin/assets/img/camera.jpg') }}" style="width:100px;cursor: pointer"/></label>
                          <input class="form-control" type="file" name="image" id="fimg" style="display: none">
                          <img src="" alt="" id="feather_img" style="max-width:30%;display:block">
                          <label for="fimg" style="display: none;margin-bottom: 15px" id="second"><span class="btn btn-primary mt-2 "> Change Image</span></label>
                      </div>
                  </div>

                  <div class="form-group row">
                      <label class="col-lg-6 col-form-label">User Role</label>
                      <div class="col-md-6">

                    <select class="form-control user_select" name="role">


                  <option   value="">Role</option>
                  <option   value="editor">Editor</option>
                  <option   value="viewer">Viewer</option>
                  <option  value="commentor">HR</option>
                  <option  value="admin">Admin</option>
                      @if ((Auth::user()->user_role == 'superadmin'))
                  <option  value="superadmin">Super Admin</option>
                          @endif
                    </select>


                      </div>
                  </div>

                  <div class="form-group row">
                      <label class="col-lg-6 col-form-label">Password</label>
                      <div class="col-lg-6">
                          <input type="password" name="password" class="form-control">
                      </div>
                  </div>

                  <div class="form-group row">
                      <label class="col-lg-6 col-form-label">Confirm Password</label>
                      <div class="col-lg-6">
                          <input type="password" name="conf_password" class="form-control">
                      </div>
                  </div>

                  <div class="text-right">
                      <button type="submit" class="btn btn-primary">Add User</button>
                  </div>
              </form>
          </div>
      </div>
      </div>
      </div>

    </div>
</div>

</div>
</div>
    <!--new code!-->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            $("#order").click(function()
            {
                $("#appear").show();
             });


        </script>
<script>

$superadmin = User::whereHas(
'user_role', function($q){
$q->where('name', 'superadmin');
}
)->get()
</script>

@endsection
