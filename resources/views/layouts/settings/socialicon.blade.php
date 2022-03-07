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
                <li class="breadcrumb-item "><a href="index.html">Settings</a></li>
                <li class="breadcrumb-item active">Map</li>
            </ul>
        </div>
    </div>
</div>
<!-- /Page Header -->

<div class="card-header">
     @include('validate')
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="card-title">Eps Locations</h4>


    </div>
</div><br>


<div class="body">


    <!--====== Contact Area Start ======-->
             <section id="contact" class="bg-gray ptb_00">
                 <div class=" " >



                 <!-- Contact Box -->

                 <!-- Contact Form -->
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7296.864314685775!2d90.38540015334223!3d23.87428970530401!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c511c384e35b%3A0xd35fc861ef0c04ba!2sEPS%20-%20Easy%20Payment%20System!5e0!3m2!1sen!2sbd!4v1642668716700!5m2!1sen!2sbd" width="100%" height="400" style="border:0px;" allowfullscreen=true loading="lazy"></iframe>



                 </div>
             </section><br>

      <td class="text-left">
        <div class="actions">

         <a href=""  class=" float-right d-inline bg-primary-light" style="padding-top:5px; border-radius:5px;"  data-toggle="tooltip modal" data-toggle="modal" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i>Edit</a>


          <form action="" method="POST" class="float-right d-inline">
      @include('validate')
              @method('delete')
                  @csrf
          <button style="border-radius:8px; background-color:#218838;color:#fff;margin-right: 5px;" class="  del_button" data-toggle="tooltip" title="Delete" ><i class="fas fa-window-close"></i></button>
          </form>
        </div>
      </td>



 </div>
</div>

@endsection
