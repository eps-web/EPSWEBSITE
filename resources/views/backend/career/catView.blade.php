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
                            <li class="breadcrumb-item "><a href="{{route('backend-career.index')}}">Category</a></li>
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
                                <div class="col-md-10">
                                <div class="profile-header"style="background-color:#FFFDE8;	border: 1px solid #F7E0A3; margin-right:12px;margin-bottom:10px;border-radius:12px;">
                                  <div class="row align-items-center">
                                    <div class="col ml-md-n2 profile-user-info" >

                                      <div class="feature-icon float-right d-inline" >

                                        <img class="rounded-circle" src="{{ asset($data->image) }}" width="3" height="2px;" alt="{{$data->alt_tag}}">
                                      </div>

                                      <h6 class="text-muted"style="font-size: 16px;color:#0D6B4F;">{{$data->title }}</h6>
                                      <hp class="text-muted">Easy Payment System</hp>
                                      <div class="about-text"><i i class="fa fa-map-marker" aria-hidden="true"style="padding-right:4px;color: #6565;"></i>{{$data->job_location }}</div>
                                      <div class="about-text"><i class="fa fa-graduation-cap "style="padding-right:4px;color: #6565;"></i>{{$data->educational_requirements }}</div>
                                      <div class="about-text"><i class="fas fa-user-alt "style="padding-right:4px;color: #6565;"></i>{{$data->additional_requirements}}</div>

                                  <div class="about-text float-right "><i class="fa fa-graduation-cap"style="padding-right:4px;color: #6565;"></i>{{ $data->created_at->format('d M, Y') }}</div>

                                </div>


                                  </div>
                                </div>
                                <div class="actions">

                                 @can('career edit')
                                 <a href="{{ route('backend-career.edit',$data->id) }}"  class="d-inline bg-primary-light" style="padding-top:5px;"  data-toggle="tooltip modal" data-toggle="modal" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i>Edit</a>
                            @endcan
                            @can('career delete')
                                  <form action="{{ route('backend-career.destroy', $data->id) }}" method="POST" class=" d-inline">
                              @include('validate')
                                      @method('delete')
                                          @csrf
                                  <button style="border-radius:4px; background-color:#218838;color:#fff" class="  del_button" data-toggle="tooltip" title="" ><i class="fas fa-times-circle"></i>Delete</button>
                                  </form>
                                  @endcan
                                </div>
                            <br><br>
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
