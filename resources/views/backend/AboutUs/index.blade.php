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
              <h4 class="float-left d-inline"><a href="#add_cat" class="btn btn-info" data-toggle="modal">Add New</a></h4>

            </div>
            <br><br>
            <div class="row">

                <div class="card col-md-8">
                    @include('validate')
                    <div class="card-header">
                        <h4 class="card-title">About Us</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0" id="post_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Image</th>

                                        <th>Status</th>
                                        <th>Action</th>



                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($abouts as $data)


                                    <tr>
                                        <td>{{ $loop -> index+1 }}</td>

                                        <td>{{ $data->tittle}}</td>
                                        <td>
                                          <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar avatar-sm mr-2">
                                              <img class="avatar-img" src="{{$data->image}}" alt="{{$data->alt_tag}}">
                                            </a>

                                          </h2>
                                        </td>


                                        <td>

                                          <?php if($data->status == '1'){ ?>

                                                <a href="{{url('/about-status',$data->id)}}" class="btn btn-sm btn-success">Active</a>

                                                <?php }else{ ?>

                                                  <a href="{{url('/about-status',$data->id)}}" class="btn btn-sm btn-danger">Inactive</a>

                                                <?php } ?>
                                          </td>


                                        <td>

                                              <a href="#" edit_id="{{ $data->id }}" data-toggle="modal" class="btn btn-sm  update_cat" data-toggle="tooltip modal" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                            <form action="{{ route('about.destroy', $data->id) }}" method="POST" class="d-inline">

                                                @method('delete')
                                                    @csrf
                                            <button class=" btn btn-sm  del_button" data-toggle="tooltip" title="Delete"><i class="fas fa-window-close" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- // MOdel for Menu Create!-->
      <div class="modal fade" id="add_cat">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4>Create About Us</h4>
                      <button class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="row form-row">
                        <div class="col-12 col-sm-6">
                          <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="tittle" class="form-control">
                          </div>
                        </div>

                        <div class="col-12 col-sm-6">
                          <div class="form-group">
                            <label class="col-form-label col-md-3">Description</label>
                            <div class="col-md-9">
                                <textarea rows="5" cols="5" id=""  class="form-control" name="descriptions" placeholder="Enter text here">{{ old('description') }}</textarea>
                            </div>
                          </div>
                        </div>


                        <div class="col-12 col-sm-6">
                          <div class="form-group">
                            <label>Image</label>

                            <input class="form-control" type="file" name="image" id="fimg" style="">
                            <img src="" alt="" id="feather_img" style="max-width:30%;display:block">
                            <label for="fimg" style="display: none;margin-bottom: 15px" id="second"><span class="btn btn-primary mt-2 "> Change Image</span></label>

                          </div>
                        </div>
                        <div class="col-12 col-sm-6">
                          <div class="form-group">
                            <label>Image Alt_Tag</label>
                            <input type="text" name="alt_tag" class="form-control">
                          </div>
                        </div>

                      </div>
                      <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                    </form>
                  </div>
                  <div class="modal-footer"></div>
              </div>
          </div>
      </div>

    <!--Edit MENU model!-->
    <div class="modal fade" id="edit_cat_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Update About Us</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('about.update',1) }}" method="POST"  class="form-group">
                        @csrf
                        @method('PUT')

                        <input class="form-control" type="text" name="title" placeholder="Tittle"><br>

                        <input class="form-control" type="hidden" name="cat_id" placeholder="Category id">
                        <input class="btn btn-sm btn-info float-right" type="submit" value="Update">
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
@endsection
