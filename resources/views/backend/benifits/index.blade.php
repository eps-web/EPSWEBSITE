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
                            <li class="breadcrumb-item "><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item "><a href="index.html">Home Page Sections</a></li>
                            <li class="breadcrumb-item active">Benifit Section</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

          <div class="card-header">
               @include('validate')
              <div class="d-flex justify-content-between align-items-center">
                  <h3 class="card-title">Benifit Section</h3>
                 <h4 class="float-left d-inline"><a href="#add_benifit" class="btn btn-info" data-toggle="modal">Add Benifit</a></h4>

              </div>
          </div><br>
  <!-- Outline Buttons -->


<div class="body">
  <div class="row">
    <div class="col-sm-12">
      <h5 class="page-title">Home Page Sections</h5>

    </div><br>

    <div class="col-sm-2" style="margin-top:;">
           <a href="{{route('slider.index')}}" type="" class="btn btn-md btn-primary " class="" style="width:145px; border-radius:16px;">Slider Section</a><br>
       <br>

            <a href="{{route('benifit.index')}}" type="" class="btn btn-md btn-primary " class="" style="width:145px; border-radius:16px;">Benifit Section</a><br>

        <br>
            <a href="{{route('feature.index')}}" type="" class="btn btn-md btn-primary " class="" style="width:145px; border-radius:16px;">Features Sections</a><br><br>
         <br>

         <a href="{{route('backend-home.index')}}" type="" class="btn btn-md btn-primary " class="" style="width:145px; border-radius:16px;">Download</a><br>


    </div>

         <div class=" col-sm-9" style="margin-left:12px;">
           <section id="benifits" class="section benifits-area ptb_100">

                   <div class="row">
                       <!-- Benifits Item -->
                       @foreach($all_data as $data)

                           <div class="col-12 col-sm-7 col-md-5 col-lg-4" data-aos="">

                           <div class="benifits-item text-center p-3">

                               <div class="feature-icon">
                                   <img src="{{$data->image}}" alt="{{$data->alt_tag}}">
                               </div>
                               <!-- Benifits Text -->
                               <div class="benifits-text">
                                   <h3 class="mb-2">{{$data->title}}</h3>
                                   <p>{!!$data->descriptions!!}</p>

                               </div>
                               <div class="actions">

                                   <!-- <a href="#edit_cat_modal" edit_id="{{ $data->id }}" data-toggle="modal" class="btn btn-sm btn-warning update_cat" data-toggle="tooltip modal" title="Edit"><i class="fa fa-telegram" aria-hidden="true"></i></a> -->
                                   <form action="{{ route('benifit.destroy',$data->id) }}" method="POST" class="mr-1" class="d-inline">

                                       @method('delete')
                                       @csrf


                                   <button outline="none"class="    float-left d-inline  del_button" type="" title=""><i class="fas fa-times-circle"></i></button>
                                   </form>

                                    <a href="{{ route('benifit.edit',$data->id) }}" style="margin-left:4px;" class=" float-left d-inline" style="padding-top:5px;"  data-toggle="tooltip modal" data-toggle="tooltip" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>


                               </div>
                               <td><div class="status-toggle float-right" >
                             <?php if($data->status == '1'){ ?>

                                   <a href="{{url('/benifit-status-change',$data->id)}}" class=" btn-sm btn-info"style="border-radius:29px;border-solid:1px;backgroung-color:red;">Active</a>

                                   <?php }else{ ?>

                                     <a href="{{url('/benifit-status-change',$data->id)}}" class="btn-sm btn-success" style="border-radius:29px;border-solid:1px;backgroung-color:red;">Inactive</a>

                                   <?php } ?>
                               </div>
                                </td>

                           </div>


                       </div>
                       @endforeach


               </div>

           </section>
           <!-- ***** Benifits Area End ***** -->

        </div>


  </div>



</div>
    <!-- // MOdel for Menu Create!-->
    <!-- Add Modal -->
        <div class="modal fade" id="add_benifit" aria-hidden="true" role="dialog">
          <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Benifits</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ route('benifit.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row form-row">
                    <div class="col-6 col-sm-6" >
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control">
                      </div>
                    </div>

                   <div class="form-group">
                        <label class="col-12 col-sm-12">Description</label>
                        <div class="form-group">
                            <input type="text" name="descriptions" class="form-control">

                        </div>
                        </div>



                        <div class="col-12 col-sm-6">
                          <div class="form-group">
                            <label>Image</label>

                            <input class="form-control" type="file" name="image" id="fimg" style="">
                            <img src="" alt="" id="feather_img" style="max-width:30%;display:block">
                            <label for="fimg" style="display: none;margin-bottom: 15px" id="second"><span class="btn btn-primary mt-2 "> Change Image</span></label>

                          </div>
                        </div>
                        <div class="col-12 col-sm-6">
                          <div class="form-group">
                            <label>Image Alt_Tag</label>
                            <input type="text" name="alt_tag" class="form-control">
                          </div>
                        </div>

                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /ADD Modal -->

</div>
</div>


<script src="{{asset('admin/assets/ckfinder/ckfinder.js')}}"></script>
 <script src="{{asset('admin/assets/ckeditor/ckeditor.js')}}"></script>
<script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
var editor = CKEDITOR.replace( 'editor' );
CKFinder.setupCKEditor( editor );

</script>
@endsection
