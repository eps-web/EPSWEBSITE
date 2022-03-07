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
                  <li class="breadcrumb-item active">Down-load</li>
                </ul>


          </div>
      </div>
  </div>
  <div class="card-header">
       @include('validate')
      <div class="d-flex justify-content-between align-items-center">
          <h3 class="card-title">Download Section</h3>
         <h4 class="float-left d-inline"><a href="#add_down" class="btn btn-info" data-toggle="modal">Add Section</a></h4>

      </div>
  </div><br>
  <div class="body">
    <div class="row">
      <div class="col-sm-12">
        <h5 class="page-title">Home Page Sections</h5>

      </div><br>
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
<div class="card col-sm-9">

    <section class="section download-area ptb_100">
        <!-- Shapes Container -->
        <div class="shapes-container d-none d-sm-block">
            <div class="shape-2"></div>
            <div class="shape-3"></div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <!-- Download Text -->
                    <div class="download-text text-center">
                        <h2>Download EPS</h2>


                        <div class="button-group store-buttons">
                           @foreach($all_data as $data)
                            <a href="{{$data->link_ggogle}}" data-toggle="" data-target="#modal-default"  class="btn btn-bordered">
                                <i class="icofont icofont-brand-android-robot dsp-tc"></i>
                                <p class="dsp-tc">GET IT ON
                                    <br> <span>Google Play</span></p>
                            </a>
                            <a href="{{$data->link_apple}}" data-toggle="" data-target="#modal-default"  class="btn btn-bordered">
                              <i class="icofont icofont-brand-apple dsp-tc"></i>
                              <p class="dsp-tc">AVAILABLE ON
                                <br> <span>Apple Store</span></p>
                              </a>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
</div>

</div>
</div>

<!-- Add Modal -->
    <div class="modal fade" id="add_down" aria-hidden="true" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Section</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('backend-home.store') }}" method="POST" enctype="multipart/form-data">
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
                        <input type="text" name="description" class="form-control">

                    </div>
                    </div>



                    <div class="row form-row">
                      <div class="col-12 col-sm-12" >
                        <div class="form-group">
                          <label> Google Play Store Link</label>
                          <input type="link" name="link_ggogle" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-12 col-sm-12" >
                        <div class="form-group">
                          <label> Apple Play Store Link</label>
                          <input type="link" name="link_apple" class="form-control">
                        </div>
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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(function(){
  $('.see').click(function(){
    $('#post-submenu-'+$(this).data('id')).toggleClass('d-none');
  });
});
</script>

<!--script for benifit show!-->
<script>
$("#order0").click(function()
{
  $("#appear0").show();
});


</script>
<script>
$("#close").click(function()
{
  $("#appear").hide();
});


</script>
<!--script for About show!-->
<script>
$("#order1").click(function()
{
  $("#appear1").show();
});
</script>
<script>
$("#close1").click(function()
{
  $("#appear1").hide();
});
</script>

<!--script for App show!-->
<script>
$("#order2").click(function()
{
  $("#appear2").show();
});
</script>
<script>
$("#close2").click(function()
{
  $("#appear2").hide();
});
</script>
@endsection
