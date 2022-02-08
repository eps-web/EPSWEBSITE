@extends('frontend.layout.app')
@section('title')
EPS | Easy Payment System
@endsection

@section('metadescription')
Easy Payment System (EPS) is an innovative payment solution permitted by Bangladesh Bank as a Payment System Operator (PSO). EPS eases the transaction providing services
 including fund transfer, merchant payment, bill payment, balance enquiry, mobile top-up, etc.
@endsection

@section('main-content')

            <!-- ***** Breadcrumb Area Start ***** -->
            <section class="section breadcrumb-area d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- Breamcrumb Content -->
                            <div class="breadcrumb-content d-flex flex-column align-items-center text-center">
                                <h3>Contact Us</h3>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-uppercase" href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active">Contact Us</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ***** Breadcrumb Area End ***** -->

            <!-- ***** Maintenance Area Start ***** -->
    <section class="section faq-area bg-gray ptb_100">
        <div class="maintenance-area">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-12 col-md-8 order-2 order-md-1">
                        <!-- Maintenance Content -->
                        <div class="maintenance-content my-5 my-md-0">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-10 col-lg-6">
                                        <!-- Section Heading -->
                                        <div class="section-heading text-center" style="margin-bottom: 35px;">
                                            <h2 style="font-size: 20px">Send us a message</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Contact Box -->
                                        <div class="contact-box text-center">
                                            <!-- Contact Form -->
                                            <form id="contact-form" action="http://eps.com.bd/contact">
                                                <input type="hidden" name="_token" value="2E8E76TDmSNo3kqDuoNe6bz7eG0ezBNxiIiIqYpZ">                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="message" id="message" placeholder="Message" required="required"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button class="btn btn-bordered mt-3 mt-sm-4" style="font-size: 15px" type="submit">Send Message</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-10 col-md-4 order-1 order-md-2 mx-auto pt-4 pt-md-0">
                        <div class="address-bar">
                            <p><i class="fas fa-map-marker-alt" style="color: green"></i> 38, Sonargaon Janapath Road,</p>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;Sector-11, Uttara, Dhaka-1230,</p>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;Bangladesh</p>
                            <p><i class="fas fa-envelope" style="color: blue"></i> info@eps.com.bd</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Maintenance Area End ***** -->

@endsection
