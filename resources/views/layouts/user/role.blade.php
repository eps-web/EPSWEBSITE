
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
                   <h4 class="float-left d-inline"><a href="#add_user" class="btn btn-info" data-toggle="modal">Add User</a></h4>

                </div>
            </div><br>


                        @if ((Auth::user()->user_role == 'superadmin'))
                        <div class="row">
                          <div class="col-md-8">
                            <div class=" schedule-widget mb-0">
                           <!-- Schedule Nav -->
                           <div class="schedule-nav">
                             <ul class="nav nav-tabs nav-justified">

                                 <div class="card-body" id="appear" style="display:none;">

                              <!-- <li class="nav-item">
                                <button type ="submit"class="btn btn-lg btn-danger " name ="superadmin"value="superadmin" id="order">Super Admin</buton>
                                </li> -->

                                 </div>



                               <li class="nav-item">

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
   <div class="card-body">
     @foreach ($users as $item)
                        <a>{{$item->name}}</a>
                       @endforeach
                       hlws
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
