
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

                </div>
            </div><br>
            @if ((Auth::user()->user_role == 'superadmin'))
            <div class="row">
              <div class="card col-md-8">
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

            @endif

            @if ((Auth::user()->user_role == 'admin'))
            <div class="body">
                  <div class="row">
                    <div class="col-md-12">
                    <button type="button" id="order" class="btn btn-md btn-primary float-left d-inline " class="see" style="width:145px; border-radius:16px;margin-right:5px;">Admin</button>


                    <button type="" class="btn btn-md btn-primary float-left d-inline" class=" nav-link active" id="order" style="width:145px; border-radius:16px;margin-right:5px;">
                    Editor
                     </button>

                    <button type="" class="btn btn-md btn-primary float-left d-inline" class=" nav-link active" id="order" style="width:145px; border-radius:16px;margin-right:5px;">
                Viwer
                     </button>

                    <button type="submit" class="btn btn-md btn-primary float-left d-inline" class=" nav-link active" id="order" style="width:145px; border-radius:16px;margin-right:5px;">
                Hr
                     </button>



            </div>
                  </div>

            @endif
  <br><br>
                <div class="col-md-12">
                <section class="comp-section comp-cards">
                  <div class="row">
                   @foreach ($all_data as $data)
                   <div class=" col-md-3 ">
                     <div class="card flex-fill">
                       <img alt="Card Image" src="{{ asset($data->image) }}" class="card-img-top">
                       <div class="card-header">
                         <h5 class="card-title mb-0">{{ $data->name }}</h5>
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
</div>

<div id="appear" style="display:">
              <?php
              $rolesWithUserCount = App\Models\user::query('hr')->get();
              ?>
              @foreach ($rolesWithUserCount as  $item)
              {{ $item->name }}

              @endforeach
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
