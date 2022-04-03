
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
            <div class="card">
              <div class="card-header">
                   @include('validate')

              </div>
              <form method="POST" action="{{ route('permission.update',$permission->id)}}">
                  @csrf
                  @method('put')
                <div class="flex flex-col space-y-2">
                  <label for="role_name" class="text-gray-700 select-none font-medium">Permission Name</label>
                  <input
                    id="role_name"
                    type="text"
                    name="name"
                    value="{{ old('name',$permission->name) }}"
                    placeholder="Enter permission"
                    class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                  />
                </div>
                <div class="text-center mt-16">
                  <button type="submit" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Update</button>
                </div>
              </form>
            </div>
        </main>
    </div>
</div>
</div>


@endsection
