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
      <div class="body">
        <div class="row">
          <div class="col-md-6 d-flex">

            <!-- Feed Activity -->
            <div class="card  card-table flex-fill">
              <div class="card-header">
                <h4 class="card-title">Nav Menus</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-center mb-0">

                    <tbody>
                      <tr>
                        <td>
                          <h2 class="table-avatar">
                            <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient1.jpg" alt="User Image"></a>
                            <a href="profile.html">Charlene Reed </a>
                          </h2>
                        </td>
                        <td>8286329170</td>
                        <td>20 Oct 2019</td>
                        <td class="text-right">$100.00</td>
                      </tr>
                      <tr>
                        <td>
                          <h2 class="table-avatar">
                            <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient2.jpg" alt="User Image"></a>
                            <a href="profile.html">Travis Trimble </a>
                          </h2>
                        </td>
                        <td>2077299974</td>
                        <td>22 Oct 2019</td>
                        <td class="text-right">$200.00</td>
                      </tr>
                      <tr>
                        <td>
                          <h2 class="table-avatar">
                            <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient3.jpg" alt="User Image"></a>
                            <a href="profile.html">Carl Kelly</a>
                          </h2>
                        </td>
                        <td>2607247769</td>
                        <td>21 Oct 2019</td>
                        <td class="text-right">$250.00</td>
                      </tr>
                      <tr>
                        <td>
                          <h2 class="table-avatar">
                            <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient4.jpg" alt="User Image"></a>
                            <a href="profile.html"> Michelle Fairfax</a>
                          </h2>
                        </td>
                        <td>5043686874</td>
                        <td>21 Sep 2019</td>
                        <td class="text-right">$150.00</td>
                      </tr>
                      <tr>
                        <td>
                          <h2 class="table-avatar">
                            <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient5.jpg" alt="User Image"></a>
                            <a href="profile.html">Gina Moore</a>
                          </h2>
                        </td>
                        <td>9548207887</td>
                        <td>18 Sep 2019</td>
                        <td class="text-right">$350.00</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /Feed Activity -->

          </div>
          <div class="col-md-6 d-flex">

            <!-- Feed Activity -->
            <div class="card  card-table flex-fill">
              <div class="card-header">
                <h4 class="card-title">Sub menus</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-center mb-0">

                    <tbody>
                      @foreach($submenus as $post)
                        <tr class="row1" data-id="{{ $post->id }}">
                          <td class="pl-3"><i class="fa fa-sort"></i></td>

                          <td>{{ $post->title }}</td>
                          <td>{{ $post->url }}</td>
                          <td>
                            <?php if($post->status == '1'){ ?>

                           <a href="{{url('/menu-status',$post->id)}}" class="btn btn-sm btn-success">Active</a>

                           <?php }else{ ?>

                             <a href="{{url('/menu-status',$post->id)}}" class="btn btn-sm btn-danger">Inactive</a>

                           <?php } ?>

                          </td>


                            <!-- <td><button class="btn btn-danger" id="order">Submenus</button></td> -->
                        </tr>

                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /Feed Activity -->

          </div>
        </div>
        <!-- Feed Activity -->

      </div>
</div>









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

          <!-- // MOdel for Sub Menu Create!-->
      <div class="modal fade" id="add_sub">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4>Add Sub Menu</h4>
                      <button class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      <form action="" method="POST"  class="form-group">
                          @csrf
                            <input type="text" name="ntitle" class="form-control" placeholder="Sub Menu Name"><br>
                            <input type="text" name="url" class="form-control" placeholder="Url"><br>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label"> Main Menu</label>
                                <div class="col-lg-9">
                                  <select class="form-control"  name="menu_id" id="menu">
                                    @foreach($submenus as $item)
                                    <option value="" selected style="display:none;">Select Main Menu</option>
                                    <option value="{{$item->id}}">
                                      {{$item->name}}
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
