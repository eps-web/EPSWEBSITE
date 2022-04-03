
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
          <h3 class="card-title">Add new Role</h3>
          <div class="card-tools">
              <a href="{{ route('role.index') }}" class="btn btn-danger"><i class="fas fa-shield-alt"></i> See all Roles</a>
              <a href="{{ route('permission.create') }}" class="btn btn-danger"><i class="fas fa-shield-alt"></i> Create New Permission</a>
          </div>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('role.store')}}">
                 @csrf
                 @method('post')
               <div class="flex flex-col space-y-2">
                 <label for="role_name" class="text-gray-700 select-none font-medium">Role Name</label>
                 <input
                   id="role_name"
                   type="text"
                   name="name"
                   value="{{ old('name') }}"
                   placeholder="Enter role"
                   class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                 />
               </div>

               <h3 class="text-xl my-4 text-gray-600">Permissions</h3>
               <div class="grid grid-cols-3 gap-4">
                 @foreach($permissions as $permission)
                     <div class="flex flex-col justify-cente">
                         <div class="flex flex-col">
                             <label class="inline-flex items-center mt-3">
                                 <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="permissions[]" value="{{$permission->id}}"
                                 ><span class="ml-2 text-gray-700">{{ $permission->name }}</span>
                             </label>
                         </div>
                     </div>
                 @endforeach
               </div>
               <div class="text-center mt-16">
                 <button type="submit" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Submit</button>
               </div>
          </form>
      </div>
  </div>
</div>
</div>

@endsection
