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
                            <li class="breadcrumb-item "><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item "><a href="{{route('backend-career.index')}}">Career</a></li>
                              <li class="breadcrumb-item active">Category</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
               <div class="div">
                <h4 class="float-right d-inline"><a href="#add_cat" class="btn btn-info" data-toggle="modal">Add Category</a></h4>
               </div>
               <br><br>

                <div class="card col-md-12">
                    @include('validate')
                    <div class="card-header">
                        <h4 class="card-title">Category Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>

                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $cate)

                                    <tr>
                                        <td>{{ $loop -> index+1 }}</td>

                                        <td>{{ $cate->name}}</td>
                                        <td>
                                          <a href="{{url('view-category/'.$cate->slug)}}" class="btn btn-sm btn-success">{{ $cate->name}}
                                             </a>
                                            <a href="#" edit_id="{{ $cate->id }}" data-toggle="modal" class="btn btn-sm btn-warning update_cat" data-toggle="tooltip modal" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                            <form action="{{ route('postCategory.destroy', $cate->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
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

    // MOdel for Post Create

    <div class="modal fade" id="add_cat">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Add Category</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('careerCategory.store') }}" method="POST"  class="form-group">
                        @csrf
                        <input class="form-control" type="text" name="cat_name" placeholder="Category Name"><br>
                        <input class="btn btn-sm btn-info float-right" type="submit">
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="edit_cat_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Update Category</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('postCategory.update',1) }}" method="POST"  class="form-group">
                        @csrf
                        @method('PUT')

                        <input class="form-control" type="text" name="cat_name" placeholder="Category Name"><br>
                        <input class="form-control" type="hidden" name="cat_id" placeholder="Category id">
                        <input class="btn btn-sm btn-info float-right" type="submit" value="Update">
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>

@endsection
