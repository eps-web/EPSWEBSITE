
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
                 <h3 class="card-title">Permission Table</h3>

                 <div class="card-tools">
                     @can('Role create')
                     <a href="{{ route('role.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create new Role</a>
                       @endcan
                 </div>
             </div>

                 <table id="example" class="display" style="width:100%">
                     <thead>
                       <tr>
                         <th >Role Name</th>
                         <th>Permissions</th>
                         <th>Actions</th>
                       </tr>
                     </thead>
                     <tbody>
                       @can('Role access')
                         @foreach($roles as $role)
                         <tr >
                           <td >{{ $role->name }}</td>

                           <td>
                               @foreach($role->permissions as $permission)
                                 <span style="background:gray;color:white;border-radius:10px;" class="">{{ $permission->name }}</span>
                               @endforeach
                           </td>

                           <td class="">

                             @can('Role edit')
                             <a href="{{route('role.edit',$role->id)}}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
                             @endcan

                             @can('Role delete')
                             <form action="{{ route('role.destroy', $role->id) }}" method="POST" class="inline">
                                 @csrf
                                 @method('delete')
                                 <button class="btn btn-sm bg-danger-light" style="border-radius:5px;">Delete</button>
                             </form>
                             @endcan

                           </td>
                         </tr>
                         @endforeach
                       @endcan
                     </tbody>


                 </table>

                <div class="card-body table-responsive p-0">
               <table class="table table-hover" id="example">
                  <thead>
                    <tr>
                      <th >Role Name</th>
                      <th>Permissions</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @can('Role access')
                      @foreach($roles as $role)
                      <tr >
                        <td >{{ $role->name }}</td>

                        <td class="py-4 px-6 border-b border-grey-light">
                            @foreach($role->permissions as $permission)
                              <span style="background:gray;color:white;border-radius:15px;" class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-gray-500 rounded-full">{{ $permission->name }}</span>
                            @endforeach
                        </td>

                        <td class="py-4 px-6 border-b border-grey-light text-right">

                          @can('Role edit')
                          <a href="{{route('role.edit',$role->id)}}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
                          @endcan

                          @can('Role delete')
                          <form action="{{ route('role.destroy', $role->id) }}" method="POST" class="inline">
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
                <div class="row">
                  {{$roles->links()}}
                </div>
              </div>

            </div>
        </main>
    </div>
</div>
</div>
<script  src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script  src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
/* Custom filtering function which will search data in column four between two values */
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#min').val(), 10 );
        var max = parseInt( $('#max').val(), 10 );
        var age = parseFloat( data[3] ) || 0; // use data for the age column

        if ( ( isNaN( min ) && isNaN( max ) ) ||
             ( isNaN( min ) && age <= max ) ||
             ( min <= age   && isNaN( max ) ) ||
             ( min <= age   && age <= max ) )
        {
            return true;
        }
        return false;
    }
);

$(document).ready(function() {
    var table = $('#example').DataTable();

    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').keyup( function() {
        table.draw();
    } );
} );
</script>

@endsection
