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

                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:(0);">Home page Section</a></li>
                            <li class="breadcrumb-item active">Slider</li>
                          </ul>


                    </div>
                </div>
            </div>


            <div class="row">
              <div class="col-sm-12">
                <h5 class="page-title">Home Page Sections</h5>

              </div><br><br>
              <div class="col-sm-2" style="margin-top:30px;">
                     <a href="{{route('slider.index')}}" type="" class="btn btn-md btn-primary " class="" style="width:145px; border-radius:16px;">Slider Section</a><br>
                 <br>

                      <a href="{{route('benifit.index')}}" type="" class="btn btn-md btn-primary " class="" style="width:145px; border-radius:16px;">Benifit Section</a><br>

                  <br>
                      <a href="{{route('feature.index')}}" type="" class="btn btn-md btn-primary " class="" style="width:145px; border-radius:16px;">Features Sections</a><br><br>
                   <br>

                     <a href="{{route('backend-home.index')}}" type="" class="btn btn-md btn-primary " class="" style="width:145px; border-radius:16px;">
                            Download</a><br>

                      <br>
                   <br>

              </div>
          <div class="col-sm-10">
            <div class="card" id="appear1" style="">

              <div class="card-header">
                   @include('validate')
                  <div class="d-flex justify-content-between align-items-center">
                      <h3 class="card-title">Slider Section</h3>
                     <h4 class="float-left d-inline"><a href="#add_slider" class="btn btn-info" data-toggle="modal">Add Slider</a></h4>

                  </div>
              </div>
              <div class="card-body">

                <section class="section work-area ptb_100">
                    <div class="container">
                    <!-- Work Slider Wrapper -->
                    <div class="work-wrapper d-none d-md-block">
                        <div class="work-slider-wrapper" data-aos="zoom-in">
                            <!-- Work Slider -->

                          <ul class="work-slider owl-carousel">
                            @foreach($all_data as $data)
                              <li class="slide-item">
                                  <img src="{{$data->image}}" alt="{{$data->alt_tag}}"><br>

                              </li>

                            @endforeach

                          </ul>
                        </div>
                    </div>



                        <!-- Work Content -->
                        <div class="row justify-content-end justify-content-lg-between work-content" id="work-slider-pager">
                              @foreach($all_data as $data)
                            <div class="col-12 col-sm-6">
                                <a href="#" class="pager-item active">
                                    <!-- Single Work -->
                                    <div class="single-work d-inline-block text-center p-4">
                                        <h3 class="mb-2">{{$data->title}}</h3>
                                        <p>{{$data->description}}</p>


                                        <div class="actions">

                                         <a href="{{ route('slider.edit',$data->id) }}"  class=" float-left bg-primary-light" style="padding-top:3px;margin-right: 4px;"  data-toggle="tooltip modal" data-toggle="modal" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>


                                        </div>

                                        <div class="status-toggle float-right" >
                                      <?php if($data->status == '1'){ ?>

                                            <a href="{{url('/slider-status-change',$data->id)}}" class=" btn-sm btn-info"style="border-radius:29px;border-solid:1px;backgroung-color:red;">Active</a>

                                            <?php }else{ ?>

                                              <a href="{{url('/slider-status-change',$data->id)}}" class="btn-sm btn-success" style="border-radius:29px;border-solid:1px;backgroung-color:red;">Inactive</a>

                                            <?php } ?>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            @endforeach
                        </div>
                    </div>
                </section>

              </div>
            </div>
          </div>
            </div>
            <!-- Add Modal -->
    <div class="modal fade" id="add_slider" aria-hidden="true" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Slider</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row form-row">
                <div class="col-12 col-sm-6">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control">
                  </div>
                </div>

                <div class="col-12 col-sm-12">
                  <div class="form-group">
                    <label >Description</label>

                        <textarea rows="5"  cols="5" id=""  class="form-control" name="description" placeholder="Enter text here">{{ old('description') }}</textarea>

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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('.del_button').click(function(e){
  var form=$(this).document('form');
  var dataId=$(this).data('id');
  e.preventDefault();
  swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
      form.submit(),
    swal("Poof! Your imaginary file has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your imaginary file is safe!");
  }
});

});

</script>


<script src="{{asset('admin/assets/ckfinder/ckfinder.js')}}"></script>
 <script src="{{asset('admin/assets/ckeditor/ckeditor.js')}}"></script>
<script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
var editor = CKEDITOR.replace( 'editor' );
CKFinder.setupCKEditor( editor );

</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endsection
