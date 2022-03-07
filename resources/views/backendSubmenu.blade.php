@extends('layouts.app')

@section('main-content')

 <div class="page-wrapper">

  <div class="content container-fluid">
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


<head>
    <title>Create Drag and Droppable Datatables Using jQuery UI Sortable in Laravel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- this is for drop and drog in this arrange of wish order (need) -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

  <!-- Page Header -->
  <h4 class="float-left d-inline"><a href="#add_cat" class="btn btn-info" data-toggle="modal">Add Menu</a></h4>
  <h4 class="float-right d-inline"><a href="#add_sub" class="btn btn-info" data-toggle="modal">Add Sub Menu</a></h4>
<br>

  <!-- /Page Header -->
    <div class="row mt-5">
        <div class="col-md-8 offset-md-1">
            <h3 class="text-center mb-4"> </h3>
            <table id="table" class="table table-bordered">
              <thead>
                <tr>
                  <th width="30px">#</th>
                  <th>Title</th>
                  <th>Url</th>
                  <th>Status</th>
                  <th>Action</th>
                  <th>Created At</th>

                </tr>
              </thead>
              <!-- <tbody id="tablecontents"> -->
              <tbody id="">
              <!-- get all data from Table by Controller -->
                @foreach($menus as $post)
    	            <tr class="row1" data-id="{{ $post->id }}">
    	              <td class="pl-3"><i class="fa fa-sort"></i></td>
                    @if (count($post->submenus)>0 )
                    <td class="" data-id="{{$post->id}}">{{ $post->title }}</td>
                   @else
                       <td class="hide" data-id="{{$post->id}}">{{ $post->title }}</td>
                       @endif
                  <!-- @if (count($post->submenus)>0 )
    	              <td><button class="btn btn-lg " id="order">{{ $post->title }}</buton></td>
                      @else
    	              <td><button class="btn btn-lg " id="close">{{ $post->title }}</buton></td>
                      @endif -->
    	              <td>{{ $post->url }}</td>
    	              <td>
                      <?php if($post->status == '1'){ ?>

                     <a href="{{url('/menu-status',$post->id)}}" class="btn btn-sm btn-success">Active</a>

                     <?php }else{ ?>

                       <a href="{{url('/menu-status',$post->id)}}" class="btn btn-sm btn-danger">Inactive</a>

                     <?php } ?>

                    </td>
    	              <td>
                      <a class="btn btn-sm bg-success-light" edit_id="{{ $post->id }}" data-toggle="modal" href="#edit_specialities_details">
                        <i class="fe fe-pencil"></i> Edit
                      </a>
                          <form action="{{ route('menu.destroy', $post->id) }}" method="POST" class="d-inline">

                                    @csrf
                            <button class=" btn btn-sm del_button" data-toggle="tooltip" title="Delete"><i class="fa fa-window-close" aria-hidden="true"></i></button>
                            </form>
                      </td>

                      <td>{{ date('d-m-Y h:m:s',strtotime($post->created_at)) }}</td>
                      <!-- <td><button class="btn btn-danger" id="order">Submenus</button></td> -->
    	            </tr>

              @endforeach

              </tbody>

            </table>
  <hr>
            <h5><button class="btn btn-success btn-sm" onclick="window.location.reload()">REFRESH</button> </h5>
    	</div>


        <div class="col-md-2 offset-md-1">
            <h3 class="text-center mb-4"> </h3>
            <table id="table1" class="table table-bordered">
              <thead>
                <tr>
                  <th width="30px">#</th>
                  <th>Title</th>

                </tr>
              </thead>
              <!-- <tbody id="tablecontents1"> -->
              <tbody id="tablecontents1">

                @if (count($post->submenus)>0 )
                @foreach($post->submenus as $submenu )
                  <tr class="row2" data-id="{{ $submenu->id }}" id="post-submenu-{{$post->id}}">
                   <td class="pl-3"><i class="fa fa-sort"></i></td>
                    <td >

                  {{$submenu->name}}
                </td>
                        <!-- <li class="row2" data-id="{{ $post->id }}" style=" list-style: "><a class="dropdown-item" href="{{$submenu->url}}">{{$submenu->name}}</a></li> -->

                      </tr>

                      @endforeach



                    @endif

                </tbody>

            </table>

    	</div>


      <div class="col-md-2 offset-md-1">

          @foreach ($menus as $item)
          @if (count($item->submenus)>0 )
          <li class="nav-item dropdown" style="list-style:none;">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-2" role="button" data-toggle="dropdown">
              {{$item->title}}
            </a>
            <div class="dropdown-menu mega-menu blog-menu px-3 py-md-3">
              <div class="row">
                <div class="col-12">
                  <ul class="single-menu">
                    @foreach($item->submenus as $submenu )
                    <li style="list-style:none;"><a class="dropdown-item" href="{{$submenu->url}}">{{$submenu->name}}</a></li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </li>

          @endif
          @endforeach







        <!-- // MOdel for Menu Create!-->
          <div class="modal fade" id="add_cat">
              <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4>Add Menu</h4>
                          <button class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                          <form action="{{route('menu.store')}}" method="POST"  class="form-group">
                              @csrf
                                <input type="text" name="title" class="form-control" placeholder="Menu Name"><br>
                                <input type="text" name="url" class="form-control" placeholder="Url"><br>

                              <!-- <input class="form-control" type="text" name="cat_name" placeholder="Category Name"><br> -->
                              <div class="form-group row">
                                  <label class="col-lg-3 col-form-label">Select Type</label>
                              <div class="col-lg-9">
                                <select class="form-control" name="type" id="menu">

                                  <option value="" selected style="display:none;">Select Type</option>
                                  <option value="dynamic" {{old('type')=='dynamic'? 'slected':''}}>
                                  Dynamic
                                  </option>
                                  <option value="custome" {{old('type')=='custome'? 'slected':''}}>
                                  Static
                                  </option>



                                </select>
                              </div>
                              </div>
                              <br>
                              <input class="btn btn-sm btn-info float-right" type="submit">
                          </form>
                      </div>
                      <div class="modal-footer"></div>
                  </div>
              </div>
          </div>
          <div class="modal fade" id="edit_specialities_details" aria-hidden="true" role="dialog">
    				<div class="modal-dialog modal-dialog-centered" role="document" >
    					<div class="modal-content">
    						<div class="modal-header">
    							<h5 class="modal-title">Edit Menus</h5>
    							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    								<span aria-hidden="true">&times;</span>
    							</button>
    						</div>
    						<div class="modal-body">
                  <form action="{{ route('menu.update',$post->id) }}" method="POST"  class="form-group">
                      @csrf
    								<div class="row form-row">
    									<div class="col-12 col-sm-6">
    										<div class="form-group">
    											<label>Menu</label>
    											<input type="text" class="form-control" name="title" value="{{$post->title}}">
    										</div>
    									</div>
    									<div class="col-12 col-sm-6">
    										<div class="form-group">
    											<label>Url</label>
    											<input type="text" class="form-control" name="url" value="{{$post->title}}">
    										</div>
    									</div>


    								</div>
    								<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
    							</form>
    						</div>
    					</div>
    				</div>
    			</div>

          <!-- // MOdel for Sub Menu Create!-->
      <div class="modal fade" id="add_sub">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4>Add Sub Menu</h4>
                      <button class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      <form action="{{ route('submenu.store') }}" method="POST"  class="form-group">
                          @csrf
                            <input type="text" name="name" class="form-control" placeholder="Sub Menu Name"><br>
                            <input type="text" name="url" class="form-control" placeholder="Url"><br>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label"> Main Menu</label>
                                <div class="col-lg-9">
                                  <select class="form-control"  name="menu_id" id="menu">
                                    @foreach($menus as $item)
                                    <option value="" selected style="display:none;">Select Main Menu</option>
                                    <option value="{{$item->id}}">
                                      {{$item->title}}
                                    </option>
                                    @endforeach

                                 </select>

                                </div>
                            </div>

                          <!-- <input class="form-control" type="text" name="cat_name" placeholder="Category Name"><br> -->
                          <input class="btn btn-sm btn-info float-right" type="submit">
                      </form>
                  </div>
                  <div class="modal-footer"></div>
              </div>
          </div>
      </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
    $(function(){
      $('.seesubmenu').click(function(){
        $('#post-submenu-'+$(this).data('id')).toggleClass('d-none');
      });
    });
    </script>

    <script>
        $("#order").click(function()
        {
            $("#appear").show();
         });


    </script>
    <script>
    $("#close").click(function()
    {
        $("#appeard").show();
     });
    </script>
    <script type="text/javascript">
      $(function () {
        $("#table").DataTable();
// this is need to Move Ordera accordin user wish Arrangement
        $( "#tablecontents" ).sortable({
          items: "tr",
          cursor: 'move',
          opacity: 0.6,
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
//Drag and drop for submenu
<script type="text/javascript">
  $(function () {
    $("#table1").DataTable();
// this is need to Move Ordera accordin user wish Arrangement
    $( "#tablecontents1" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 0.6,
      update: function() {
          sendOrderToServer();
      }
    });

    function sendOrderToServer() {
      var order = [];
      var token = $('meta[name="csrf-token"]').attr('content');
    //   by this function User can Update hisOrders or Move to top or under
      $('tr.row2').each(function(index,element) {
        order.push({
          id: $(this).attr('data-id'),
          position: index+1
        });
      });
// the Ajax Post update
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('Custom-sortable-submenu') }}",
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.del_button').click(function(e){
      var form=$(this).document('form');
      var dataId=$(this).data('id');
      e.preventDefault();
      swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
          form.submit(),
        swal("Poof! Your imaginary file has been deleted!", {
          icon: "success",
        });
      } else {
        swal("Your imaginary file is safe!");
      }
    });

    });

    </script>
</div>
</div>
@endsection
