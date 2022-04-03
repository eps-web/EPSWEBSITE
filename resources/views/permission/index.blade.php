
@extends('layouts.app')
@section('title')
permission
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
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->

                    <div class="col-sm-10">
                      <div class="card" id="appear1" style="">

                        <div class="card-header">
                             @include('validate')
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Permission </h3>
                                  @can('Permission create')
                               <h4 class="float-left d-inline"><a href="{{route('permission.create')}}" class="btn btn-info" data-toggle="">Add Permission</a></h4>
                                @endcan
                            </div>
                        </div>
                  <div class="bg-white shadow-md rounded my-6">
                    <table class="text-left w-full border-collapse">
                      <thead>
                        <tr>
                          <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Permission Name</th>

                          <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>

                        @can('Permission access')
                          @foreach($permissions as $permission)
                          <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">{{ $permission->name }}</td>
                            <td class="py-4 px-6 border-b border-grey-light text-right">
                              @can('Permission edit')
                              <a href="{{route('permission.edit',$permission->id)}}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
                              @endcan

                              @can('Permission delete')
                              <form action="{{ route('permission.destroy', $permission->id) }}" method="POST" class="inline">
                                  @csrf
                                  @method('delete')
                                  <button class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark text-red-400">Delete</button>
                              </form>
                              @endcan
                            </td>
                          </tr>
                          @endforeach
                        @endcan

                      </tbody>
                    </table>
                  </div>

                </div>

</div>
</div>
</div>

@endsection
