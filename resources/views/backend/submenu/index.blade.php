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
               <div class="div">
                <h4 class="float-right d-inline"><a href="{{ route('submenu.create') }}" class="btn btn-info" >Add SubMenu</a></h4>
               </div>
               <br><br>

                <div class="card col-md-12">
                    @include('validate')
                    <div class="card-header">
                        <h4 class="card-title">Post Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0" id="post_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Main Menu</th>
                                        <th>Url</th>
                                        <th>Action</th>



                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($submenus as $data)


                                    <tr>
                                        <td>{{ $loop -> index+1 }}</td>

                                        <td>{{ $data->name}}</td>
                                        <td>{{ $data->menu->name}}</td>
                                        <td>{{ $data->url}}</td>



                                        <td>

                                            <a href="{{ route('menu.edit',$data->id) }}"  class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-telegram" aria-hidden="true"></i></a>
                                            <form action="{{ route('menu.destroy', $data->id) }}" method="POST" class="d-inline">

                                                @method('delete')
                                                    @csrf
                                            <button class=" btn btn-sm btn-danger del_button" data-toggle="tooltip" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
