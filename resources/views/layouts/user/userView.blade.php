@extends('layouts.app')
@section('title')
{{$category->name}}
@endsection
@section('main-content')

 <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome {{ Auth::user()->name }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item "><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item "><a href="{{route('user.index')}}">User</a></li>
                              <li class="breadcrumb-item active">{{$category->name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
               <div class="div">

               </div>
               <br><br>

                <div class="card col-md-12">
                    @include('validate')
                    <div class="card-header">
                        <h4 class="card-title">{{$category->name}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                              <div class="row">
                            @foreach($career as $data)
                            <div class=" col-md-6 ">
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
                                </div>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>






@endsection
