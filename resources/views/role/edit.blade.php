
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
              <form method="POST" action="{{ route('role.update',$role->id)}}">
                               @csrf
                               @method('put')
                             <div class="flex flex-col space-y-2">
                               <label for="role_name" class="text-gray-700 select-none font-medium">Role Name</label>
                               <input
                                 id="role_name"
                                 type="text"
                                 name="name"
                                 value="{{ old('name',$role->name) }}"
                                 placeholder="Placeholder"
                                 class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                               />
                             </div>

                             <h3 class="text-xl my-4 text-gray-600">Permissions</h3>
                             <div class="grid grid-cols-3 gap-4">
                               @foreach($permissions as $permission)
                                   <div class="flex flex-col justify-cente">
                                       <div class="flex flex-col">
                                           <label class="inline-flex items-center mt-3">
                                               <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="permissions[]" value="{{$permission->id}}"  @if(count($role->permissions->where('id',$permission->id)))
                                                   checked
                                                 @endif
                                               ><span class="ml-2 text-gray-700">{{ $permission->name }}</span>
                                           </label>
                                       </div>
                                   </div>
                               @endforeach
                             </div>
                             <div class="text-center mt-16">
                               <button type="submit" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Update</button>
                             </div>

            </div>
        </main>
    </div>
</div>
</div>


@endsection
