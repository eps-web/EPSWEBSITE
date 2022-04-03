
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
            <div class="card card-primary">
      <div class="card-header">
          <h3 class="card-title">Add new permission</h3>
          <div class="card-tools">
              <a href="{{ route('permission.index') }}" class="btn btn-danger"><i class="fas fa-shield-alt"></i> See all Permissions</a>
          </div>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('permission.store')}}">
            @csrf
            @method('post')
          <div class="flex flex-col space-y-2">
            <label for="permission_name" class="text-gray-700 select-none font-medium">Permission Name</label>
            <input
              id="permission_name"
              type="text"
              name="name"
              value="{{ old('name') }}"
              placeholder="Enter permission"
              class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
            />
          </div>
          <div class="text-center mt-16">
            <button type="submit" class="btn btn-sm btn-primary ">Submit</button>
          </div>
        </form>
      </div>
  </div>
</div>
</div>

@endsection
