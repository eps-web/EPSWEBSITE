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
            <div class="row">
              <div class="col-md-6 d-flex">
                <button type="button" class="btn btn-md btn-primary" id="order2" style="width:300px; border-radius:16px;">

                  Wordpress Admin Dashboard
                </button>

               </div>
            </div><br>
            <div class="row">

          <div class="card col-md-6 d-flex"style="margin-right: 40px;"><br>

  							<!-- Feed Activity -->
  							<div class=" card card-table flex-fill" >

  								<div class="card-body">
  									<div class="table-responsive">
  										<table class="table table-hover table-center mb-0">
  											<thead style="display:none;">
  												<tr>
  													<th>Patient Name</th>

  												</tr>
  											</thead>
  											<tbody id="tablecontents">
                          @foreach($menus as $post)
                            <tr class="row1" data-id="{{ $post->id }}" style="border:1px solid #F7E0A3;">

  													<td >
  														<h2 class="table-avatar">

  															<li href="profile.html" >{{ $post->title }} </li>
  														</h2>
  													</td>
  												</tr>

                          @endforeach

  											</tbody>
  										</table>
  									</div>
  								</div>
  							</div>
  							<!-- /Feed Activity -->
  						</div>
              <div class="card col-md-4 d-flex"><br>

                   <!-- Feed Activity -->
                   <div class=" card card-table flex-fill">

                     <div class="card-body">
                       <div class="table-responsive">
                         <table class="table table-hover table-center mb-0">
                           <thead style="display:none;">
                             <tr>
                               <th>Patient Name</th>

                             </tr>
                           </thead>
                           <tbody id="tablecontents1">
                             @if (count($post->submenus)>0 )
                             @foreach($post->submenus as $submenu )
                                <tr class="row1" data-id="{{ $post->id }}" style="border:1px solid #F7E0A3;">

                               <td >

                                 <li class="nav-item dropdown" style="list-style:none;">
                                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-2" role="button" data-toggle="dropdown">
                                     {{$post->title}}
                                   </a>
                                   <div class="dropdown-menu mega-menu blog-menu px-3 py-md-3">
                                     <div class="row">
                                       <div class="col-12">
                                         <ul class="single-menu">
                                           @foreach($post->submenus as $submenu )
                                           <li style="list-style:none;"><a class="dropdown-item" href="{{$submenu->url}}">{{$submenu->name}}</a></li>
                                           @endforeach
                                         </ul>
                                       </div>
                                     </div>
                                   </div>
                                 </li>
                               </td>
                             </tr>

                              @endforeach
                           @endif
                           </tbody>
                         </table>
                       </div>
                     </div>
                   </div>
                   <!-- /Feed Activity -->


                 </div>


  					</div>

  <div class="row">



      <div class="card col-md-6">
      @include('validate')
      @foreach($menus as $post)
<p class="posttable" style=" border:2px; border-color:red;">{{ $post->title }}</p>
@endforeach
    </div>
      <div class="card col-md-4">
      @include('validate')
<p>hhh</p>
    </div>
    </div>

     <!-- /.content-header -->
     <!-- Main content -->


         </div>

     </div>




<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  $(function () {
    $("#table").DataTable();
// this is need to Move Ordera accordin user wish Arrangement
    $( "#tablecontents" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 200,
      update: function() {
          sendOrderToServer();
      }
    });

    function sendOrderToServer() {
      var order = [];
      var token = $('meta[name="csrf-token"]').attr('content');
    //   by this function User can Update hisOrders or Move to top or under
      $('tr.row1').each(function(index,element) {
        order.push({
          id: $(this).attr('data-id'),
          position: index+1
        });
      });
// the Ajax Post update
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('Custom-sortable') }}",
            data: {
          order: order,
          _token: token
        },
        success: function(response) {
            if (response.status == "success") {
              console.log(response);
            } else {
              console.log(response);
            }
        }
      });
    }
  });
</script>
<script>
               // Simple list
   Sortable.create(posttable, { /* options */ });

   // List with handle
   Sortable.create(listWithHandle, {
     handle: '.glyphicon-move',
     animation: 150
   });
 </script>
@endsection
