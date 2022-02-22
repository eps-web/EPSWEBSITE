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
                <h4 class="float-right d-inline"><a href="{{ route('pageseo.create') }}" class="btn btn-info" >Add a Page for SEO</a></h4>
               </div>
               <br><br>

                <div class="card col-md-12">
                    @include('validate')
                    <div class="card-header">
                        <h4 class="card-title">Pages SEO Elements</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0" id="post_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Page Name</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Mata Description</th>
                                        <th>Action</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($all_data as $data) --}}


                                    <tr>
                                        <td>1</td>
                                        <td>Home</td>
                                        <td>EPS|Easy Payment System</td>
                                        <td>easy-payment-system</td>
                                        <td>Easy Payment System (EPS) is an innovative payment </td>




                                        <td>

                                            <a href=""  class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-telegram" aria-hidden="true"> EDIT </i></a>

                                        </td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>







@endsection


