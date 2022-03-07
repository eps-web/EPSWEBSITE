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
                <li class="breadcrumb-item "><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item "><a href="index.html">Settings</a></li>
                <li class="breadcrumb-item active">Logo</li>
            </ul>
        </div>
    </div>
</div>
<!-- /Page Header -->

<div class="card-header">
     @include('validate')
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="card-title">Eps Logo</h4>
       <h4 class="float-left d-inline"><a href="#add_logo" class="btn btn-info" data-toggle="modal">Add Logo</a></h4>

    </div>
</div><br>


<div class="body">
  <div class="row">
    @foreach($logos as $data)
    <div class="card col-md-3">

      <div class="feature-icon">
           <td>{{ $loop -> index+1 }}</td>
        <img class="rounded-circle" src="{{ asset($data->image) }}" width="70" alt="{{$data->alt_tag}}">

          <a> alt_tag="{{$data->alt_tag}}"</a> &
          <a>Published On {{ $data->created_at->format('d M, Y') }}</a>
      </div><br>
      <td><div class="status-toggle float-right d-inline" >
    <?php if($data->status == '1'){ ?>

          <a href="{{url('/feature-status-change',$data->id)}}" class=" btn-sm btn-info"style="border-radius:29px;border-solid:1px;backgroung-color:red;">Active</a>

          <?php }else{ ?>

            <a href="{{url('/feature-status-change',$data->id)}}" class="btn-sm btn-success" style="border-radius:29px;border-solid:1px;backgroung-color:red;">Inactive</a>

          <?php } ?>
      </div>
       </td>
      <td class="text-left">
        <div class="actions">

         <a href=""  class=" float-right d-inline bg-primary-light" style="padding-top:5px; border-radius:5px;"  data-toggle="tooltip modal" data-toggle="modal" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i>Edit</a>


          <form action="" method="POST" class="float-right d-inline">
      @include('validate')
              @method('delete')
                  @csrf
          <button style="border-radius:8px; background-color:#218838;color:#fff;margin-right: 5px;" class="  del_button" data-toggle="tooltip" title="Delete" ><i class="fas fa-window-close"></i></button>
          </form>
        </div>
      </td>


  </div>
  @endforeach
 </div>
</div>

<!-- Add Modal -->
    <div class="modal fade" id="add_logo" aria-hidden="true" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Logo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('settings-logo.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row form-row">


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
        </div>
      </div>
    </div>
    <!-- /ADD Modal -->
@endsection
