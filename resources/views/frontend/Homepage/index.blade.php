@extends('frontend.layout.app')

@section('main-content')

            <!-- ***** Welcome Area Start ***** -->
            <section id="home" class="section welcome-area d-flex align-items-center">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Welcome Intro Start -->
                        <div class="col-12 col-md-7 col-lg-6">
                            <div class="welcome-intro">
                                <h1>EPS</h1>
                                <h3 class="fw-3 mt-2 mt-sm-3">Easy Payment System</h3>
                                <p class="my-3">Easy Payment System (EPS) is an innovative payment solution permitted by Bangladesh Bank as a Payment System Operator (PSO). EPS eases the transaction providing services including fund transfer, merchant payment, bill payment, balance enquiry, mobile top-up, etc.</p>
                                <div class="button-group">
                                    <a href="#" data-toggle="modal" data-target="#modal-default" class="btn btn-bordered"><span>Download</span></a>
                                    <a href="#" data-toggle="modal" data-target="#modal-default"  class="btn btn-bordered d-none d-sm-inline-block">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-5 col-lg-6">
                            <!-- Welcome Thumb -->
                            <div class="welcome-thumb text-center" data-aos="fade-left" data-aos-delay="500" data-aos-duration="1000">
                                <img src="{{ URL::to('') }}/frontend/images/welcome-mockup-2.png" alt="">
                            </div>
                            <!-- Video Icon -->
                            <div class="video-icon d-none d-lg-block">
                                <a class="play-btn" data-fancybox href="https://www.youtube.com/watch?v=v46UFjnlm7c">
                                    <i class="icofont-ui-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ***** Welcome Area End ***** -->

            <!-- ***** Benifits Area Start ***** -->
            <section id="benifits" class="section benifits-area ptb_100">
                <div class="container">
                    <div class="row">
                        <!-- Benifits Item -->
                                        <div class="col-12 col-sm-6 col-md-4 col-lg-3" data-aos="fade-up">
                            <div class="benifits-item text-center p-3">
                                <div class="feature-icon">
                                    <img src="{{ URL::to('') }}/frontend/images/1640852164.png" alt="">
                                </div>
                                <!-- Benifits Text -->
                                <div class="benifits-text">
                                    <h3 class="mb-2">User Friendly</h3>
                                    <p>User friendly interface will be ensuring an optimum interaction between users and services.</p>
                                </div>
                            </div>
                        </div>
                                        <div class="col-12 col-sm-6 col-md-4 col-lg-3" data-aos="fade-up">
                            <div class="benifits-item text-center p-3">
                                <div class="feature-icon">
                                    <img src="{{ URL::to('') }}/frontend/images/1640852391.png" alt="">
                                </div>
                                <!-- Benifits Text -->
                                <div class="benifits-text">
                                    <h3 class="mb-2">Instant Notification</h3>
                                    <p>Instant Transaction Notification will be provided through SMS and E-mail.</p>
                                </div>
                            </div>
                        </div>
                                        <div class="col-12 col-sm-6 col-md-4 col-lg-3" data-aos="fade-up">
                            <div class="benifits-item text-center p-3">
                                <div class="feature-icon">
                                    <img src="{{ URL::to('') }}/frontend/images/1640852623.png" alt="">
                                </div>
                                <!-- Benifits Text -->
                                <div class="benifits-text">
                                    <h3 class="mb-2">Anti-fraud measures</h3>
                                    <p>EPS will ensure strong measurement to protect database of each and every parties regarding the
        services.</p>
                                </div>
                            </div>
                        </div>
                                        <div class="col-12 col-sm-6 col-md-4 col-lg-3" data-aos="fade-up">
                            <div class="benifits-item text-center p-3">
                                <div class="feature-icon">
                                    <img src="{{ URL::to('') }}/frontend/images/1640852907.png" alt="">
                                </div>
                                <!-- Benifits Text -->
                                <div class="benifits-text">
                                    <h3 class="mb-2">24/7 Support</h3>
                                    <p>EPS is designed to provide 24/7 customer support, any issue will be resolved no matter what day or time it is.</p>
                                </div>
                            </div>
                        </div>
                                    </div>
                </div>
            </section>
            <!-- ***** Benifits Area End ***** -->

            <!-- ***** About App Area Start ***** -->
            <section class="section about-app-area ptb_100">
                <div class="shapes-container">
                    <div class="shape-1"></div>
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-6">
                            <!-- About Text -->
                            <div class="about-text">
                                <!-- Headings -->
                                <div class="headings d-flex align-items-center mb-4">
                                    <span class="text-uppercase d-none d-sm-block">About</span>
                                    <h2 class="text-capitalize">Easy To Manage All Your Transaction Using EPS App</h2>
                                </div>
                                <p class="my-3"><p class="my-3" style="margin-right: 0px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 1.8; color: rgb(119, 119, 119); font-family: Poppins, sans-serif;">EPS strives to make digital transaction effortless by enabling mass people with an easy and instant payment system. Easy Payment System (EPS) is an innovative payment solution permitted by Bangladesh Bank as a Payment System Operator (PSO). EPS eases the transaction providing services including fund transfer, merchant payment, bill payment, balance enquiry, mobile top-up, etc.</p><p class="d-none d-sm-block my-3" style="margin-right: 0px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 1.8; color: rgb(119, 119, 119); font-family: Poppins, sans-serif;">EPS is developed by Optimum Solution and Services Ltd. (OSSL), a global technology solution provider.</p></p>
                                <!-- Store Buttons -->
                                <div class="button-group store-buttons">
                                    <a href="#" data-toggle="modal" data-target="#modal-default"  class="btn btn-bordered">
                                        <i class="icofont icofont-brand-android-robot dsp-tc"></i>
                                        <p class="dsp-tc">GET IT ON
                                            <br> <span>Google Play</span></p>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#modal-default"  class="btn btn-bordered">
                                        <i class="icofont icofont-brand-apple dsp-tc"></i>
                                        <p class="dsp-tc">AVAILABLE ON
                                            <br> <span>Apple Store</span></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <!-- About Thumb -->
                            <div class="about-thumb text-center d-none d-lg-block">
                                <img src="{{ URL::to('') }}/frontend/images/1641362531.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ***** About App Area End ***** -->

            <!-- ***** Work Area Start ***** -->
            <section class="section work-area ptb_100">
                <!-- Work Slider Wrapper -->
                <div class="work-wrapper d-none d-md-block">
                    <div class="work-slider-wrapper" data-aos="zoom-in">
                        <!-- Work Slider -->
                        <ul class="work-slider owl-carousel">
                            <li class="slide-item">
                                <img src="{{ URL::to('') }}/frontend/assets/img/screenshots/1.png" alt="">
                            </li>
                            <li class="slide-item">
                                <img src="{{ URL::to('') }}/frontend/assets/img/screenshots/2.png" alt="">
                            </li>
                            <li class="slide-item">
                                <img src="{{ URL::to('') }}/frontend/assets/img/screenshots/3.png" alt="">
                            </li>
                            <li class="slide-item">
                                <img src="{{ URL::to('') }}/frontend/assets/img/screenshots/4.png" alt="">
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="container">
                    <div class="row justify-content-center d-md-none">
                        <!-- Section Heading -->
                        <div class="col-12 col-md-10 col-lg-6">
                            <!-- Section Heading -->
                            <div class="section-heading text-center">
                                <h2 class="text-capitalize">Few steps to Setup</h2>
                                <p class="d-none d-sm-block mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.</p>
                                <p class="d-block d-sm-none mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Work Content -->
                    <div class="row justify-content-end justify-content-lg-between work-content" id="work-slider-pager">
                        <div class="col-12 col-sm-6">
                            <a href="#" class="pager-item active">
                                <!-- Single Work -->
                                <div class="single-work d-inline-block text-center p-4">
                                    <h3 class="mb-2">Balance Transfer</h3>
                                    <p>Under this service, an account holder in a bank/MFS/e-wallet can send money from his/her account to a receiver’s bank/MFS/e-wallet account using EPS.</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-sm-6">
                            <a href="#" class="pager-item">
                                <!-- Single Work -->
                                <div class="single-work d-inline-block text-center p-4">
                                    <h3 class="mb-2">Bill and Fee Payment</h3>
                                    <p>Using EPS App, the registered user will be able to pay bills and fees.</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-sm-6">
                            <a href="#" class="pager-item">
                                <!-- Single Work -->
                                <div class="single-work d-inline-block text-center p-4">
                                    <h3 class="mb-2">Merchant Payment</h3>
                                    <p>Any offline merchant can use EPS to receive the payment into his/her bank/MFS/e-wallet account from a walking customer’s bank/MFS/e-wallet account.</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-sm-6">
                            <a href="#" class="pager-item">
                                <!-- Single Work -->
                                <div class="single-work d-inline-block text-center p-4">
                                    <h3 class="mb-2">Corporate Services</h3>
                                    <p>EPS will provide one-stop solution for the corporate clients dealing with large number of transactions. Easy Wage Disbursement is one of such services to be availed from EPS.</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ***** Work Area End ***** -->

            <!-- ***** Features Area Start ***** -->
            <section id="features" class="section features-area ptb_100">
                <div class="shapes-container">
                    <div class="shape bg-shape"></div>
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="features-text">
                                <!-- Headings -->
                                <div class="headings d-flex align-items-center mb-4">
                                    <span class="text-uppercase d-none d-sm-block">Features</span>
                                    <h2 class="text-capitalize">EPS Is The Only All In One Payment System To Do Any Kind Of Transaction</h2>
                                </div>
                                <p class="my-3">VISION To accelerate the transformation to achieve a sustainable digital financial eco-system. MISSION To minimize the barriers of digital transaction, and support financial institutions by facilitating their customers/clients with digital payment services.</p>
                                <!-- Counter List -->
                                <!--<div class="counter-list">
                                    <ul>
                                        <li>

                                            <div class="single-counter px-4 py-3 text-center">

                                                <div class="counter-icon">
                                                    <i class="icofont-repair"></i>
                                                </div>

                                                <div class="counter-text">
                                                    <span class="counter d-inline-block mt-3 mb-2">2350</span>
                                                    <h5>Users</h5>
                                                </div>
                                            </div>
                                        </li>
                                        <li>

                                            <div class="single-counter px-4 py-3 text-center">

                                                <div class="counter-icon">
                                                    <i class="icofont-heart-alt"></i>
                                                </div>

                                                <div class="counter-text">
                                                    <span class="counter d-inline-block mt-3 mb-2">1895</span>
                                                    <h5>Acounts</h5>
                                                </div>
                                            </div>
                                        </li>
                                        <li>

                                            <div class="single-counter px-4 py-3 text-center">

                                                <div class="counter-icon">
                                                    <i class="icofont-beard"></i>
                                                </div>

                                                <div class="counter-text">
                                                    <span class="counter d-inline-block mt-3 mb-2">1580</span>
                                                    <h5>Developers</h5>
                                                </div>
                                            </div>
                                        </li>
                                        <li>

                                            <div class="single-counter px-4 py-3 text-center">

                                                <div class="counter-icon">
                                                    <i class="icofont-safety"></i>
                                                </div>

                                                <div class="counter-text">
                                                    <span class="counter d-inline-block mt-3 mb-2">1358</span>
                                                    <h5>Download</h5>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>-->
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-5 offset-lg-1">
                            <!-- Featured Items -->
                            <div class="featured-items">
                                <ul>
                                    <li>
                                        <!-- Single Features Item -->
                                        <div class="single-features media p-3">
                                            <!-- Features Title -->
                                            <div class="features-title mr-3">
                                                <img src="{{ URL::to('') }}/frontend/assets/img/icon/icon-1.svg" alt="">
                                            </div>
                                            <!-- Features Text -->
                                            <div class="features-text media-body">
                                                <h3>Fast Transaction</h3>
                                                <p>EPS aims to enable its users with an obstacle free transaction.</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <!-- Single Features Item -->
                                        <div class="single-features media p-3">
                                            <!-- Features Title -->
                                            <div class="features-title mr-3">
                                                <img src="{{ URL::to('') }}/frontend/assets/img/icon/icon-2.svg" alt="">
                                            </div>
                                            <!-- Features Text -->
                                            <div class="features-text media-body">
                                                <h3>Instant Banking service</h3>
                                                <p>Multiple banking services will be integrated into a single payment system.</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <!-- Single Features Item -->
                                        <div class="single-features media p-3">
                                            <!-- Features Title -->
                                            <div class="features-title mr-3">
                                                <img src="{{ URL::to('') }}/frontend/assets/img/icon/icon-3.svg" alt="">
                                            </div>
                                            <!-- Features Text -->
                                            <div class="features-text media-body">
                                                <h3>Balance Inquiry</h3>
                                                <p>Users can check available balance& transaction history from anywhere, any time.</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <!-- Single Features Item -->
                                        <div class="single-features media p-3">
                                            <!-- Features Title -->
                                            <div class="features-title mr-3">
                                                <img src="{{ URL::to('') }}/frontend/assets/img/icon/icon-4.svg" alt="">
                                            </div>
                                            <!-- Features Text -->
                                            <div class="features-text media-body">
                                                <h3>Mobile Top-up</h3>
                                                <p>Hassle free Mobile Recharge will be in your hand.</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ***** Features Area End ***** -->

            <!-- ***** Screenshots Area Start ***** -->
            <section id="screenshots" class="section screenshots-area ptb_100">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- App Screenshot Slider Area -->
                            <div class="app-screenshots">
                                <!-- Single Screenshot Item -->
                                <div class="single-screenshot">
                                    <img src="{{ URL::to('') }}/frontend/assets/img/screenshots/1.png" alt="">
                                    <!-- Screenshots Overlay -->
                                    <div class="screenshots-overlay">
                                        <a href="{{ URL::to('') }}/frontend/assets/img/screenshots/1.png" data-fancybox="{{ URL::to('') }}/frontend/"><i class="icofont-image"></i></a>
                                    </div>
                                </div>
                                <!-- Single Screenshot Item -->
                                <div class="single-screenshot">
                                    <img src="{{ URL::to('') }}/frontend/assets/img/screenshots/2.png" alt="">
                                    <!-- Screenshots Overlay -->
                                    <div class="screenshots-overlay">
                                        <a href="{{ URL::to('') }}/frontend/assets/img/screenshots/2.png" data-fancybox="{{ URL::to('') }}/frontend/"><i class="icofont-image"></i></a>
                                    </div>
                                </div>
                                <!-- Single Screenshot Item -->
                                <div class="single-screenshot">
                                    <img src="{{ URL::to('') }}/frontend/assets/img/screenshots/3.png" alt="">
                                    <!-- Screenshots Overlay -->
                                    <div class="screenshots-overlay">
                                        <a href="{{ URL::to('') }}/frontend/assets/img/screenshots/3.png" data-fancybox="{{ URL::to('') }}/frontend/"><i class="icofont-image"></i></a>
                                    </div>
                                </div>
                                <!-- Single Screenshot Item -->
                                <div class="single-screenshot">
                                    <img src="{{ URL::to('') }}/frontend/assets/img/screenshots/4.png" alt="">
                                    <!-- Screenshots Overlay -->
                                    <div class="screenshots-overlay">
                                        <a href="{{ URL::to('') }}/frontend/assets/img/screenshots/4.png" data-fancybox="{{ URL::to('') }}/frontend/"><i class="icofont-image"></i></a>
                                    </div>
                                </div>
                                <!-- Single Screenshot Item -->
                                <div class="single-screenshot">
                                    <img src="{{ URL::to('') }}/frontend/assets/img/screenshots/5.png" alt="">
                                    <!-- Screenshots Overlay -->
                                    <div class="screenshots-overlay">
                                        <a href="{{ URL::to('') }}/frontend/assets/img/screenshots/5.png" data-fancybox="{{ URL::to('') }}/frontend/"><i class="icofont-image"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ***** Screenshots Area End ***** -->




            <!-- ***** Start Free Area Start ***** -->
            <section class="start-free-area">
                <div class="container">
                    <div class="col-12">
                        <!-- Start Free Content -->
                        <div class="start-free-content d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between shadow-lg" data-aos="fade-up">
                            <!-- Start Free Content -->
                            <div class="start-free-text">
                                <h2 class="mb-2">One-stop Merchant Payment solution</h2>
                                <span>Easy Payment System</span>
                            </div>
                            <!-- Start Free Button -->
                            <div class="start-free-btn mt-4 mt-lg-0">
                                <a href="#" data-toggle="modal" data-target="#modal-default" class="btn btn-bordered"><span>Try EPS Now</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ***** Start Free Area End ***** -->



            <!-- ***** Download Area Start ***** -->
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
                                <p class="my-3">Easy Payment System (EPS) is an innovative payment solution permitted by Bangladesh Bank as a Payment System Operator (PSO). EPS eases the transaction providing services including fund transfer, merchant payment, bill payment, balance enquiry, mobile top-up, etc.</p>
                                <p class="d-none d-sm-block my-3">EPS strives to make digital transaction effortless by enabling mass people with an easy and instant payment system.</p>
                                <!-- Store Buttons -->
                                <div class="button-group store-buttons">
                                    <a href="#" data-toggle="modal" data-target="#modal-default"  class="btn btn-bordered">
                                        <i class="icofont icofont-brand-android-robot dsp-tc"></i>
                                        <p class="dsp-tc">GET IT ON
                                            <br> <span>Google Play</span></p>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#modal-default"  class="btn btn-bordered">
                                        <i class="icofont icofont-brand-apple dsp-tc"></i>
                                        <p class="dsp-tc">AVAILABLE ON
                                            <br> <span>Apple Store</span></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ***** Download Area End ***** -->



            <!-- ***** Blog Area Start ***** -->
            <section id="blog" class="section blog-area ptb_100">
                <div class="container">
                    <div class="row justify-content-center">
                        <!-- Section Heading -->
                        <div class="col-12 col-md-10 col-lg-6">
                            <!-- Section Heading -->
                            <div class="section-heading text-center">
                                <h2 class="text-capitalize">Financial News</h2>
                                <p class="d-none d-sm-block mt-4">Online payment gateways cannot accept money directly from a bank account if it is not connected with debit-credit card/internet banking.</p>
                                <p class="d-block d-sm-none mt-4">Current online banking system is highly dependent on NPSB by Bangladesh Bank (Not all the banks are connected yet)</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4">
                            <!-- Single Blog -->
                            <div class="single-blog wow fadeIn res-margin" data-wow-duration="2s">
                                <!-- Blog Thumb -->
                                <div class="blog-thumb">
                                    <a href="#"><img src="{{ URL::to('') }}/frontend/assets/img/blog/blog-1.jpg" alt=""></a>
                                </div>
                                <!-- Blog Content -->
                                <div class="blog-content p-4">
                                    <!-- Meta Info -->
                                    <ul class="meta-info d-flex justify-content-between">
                                        <li>By <a href="#">EPS</a></li>
                                        <li><a href="#">Nov 05, 2021</a></li>
                                    </ul>
                                    <!-- Blog Title -->
                                    <h3 class="blog-title my-3"><a href="#">Instant Fund transfer between bank to bank is Limited</a></h3>
                                    <p>Under this service, an account holder in a bank/MFS/e-wallet can send money from his/her account to a receiver’s bank/MFS/e-wallet account using EPS.</p>
                                    <a href="#" class="blog-btn mt-3">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <!-- Single Blog -->
                            <div class="single-blog wow fadeIn res-margin" data-wow-duration="2s" data-wow-delay="0.2s">
                                <!-- Blog Thumb -->
                                <div class="blog-thumb">
                                    <a href="#"><img src="{{ URL::to('') }}/frontend/assets/img/blog/blog-2.jpg" alt=""></a>
                                </div>
                                <!-- Blog Content -->
                                <div class="blog-content p-4">
                                    <!-- Meta Info -->
                                    <ul class="meta-info d-flex justify-content-between">
                                        <li>By <a href="#">EPS</a></li>
                                        <li><a href="#">Nov 01, 2021</a></li>
                                    </ul>
                                    <!-- Blog Title -->
                                    <h3 class="blog-title my-3"><a href="#">Balance transfer, bill payment, etc. could be more cost effective</a></h3>
                                    <p>Bill and Fee Payment: Using EPS App, the registered user will be able to pay bills and fees.</p>
                                    <a href="#" class="blog-btn mt-3">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <!-- Single Blog -->
                            <div class="single-blog wow fadeIn" data-wow-duration="2s" data-wow-delay="0.4s">
                                <!-- Blog Thumb -->
                                <div class="blog-thumb">
                                    <a href="#"><img src="{{ URL::to('') }}/frontend/assets/img/blog/blog-3.jpg" alt=""></a>
                                </div>
                                <!-- Blog Content -->
                                <div class="blog-content p-4">
                                    <!-- Meta Info -->
                                    <ul class="meta-info d-flex justify-content-between">
                                        <li>By <a href="#">EPS</a></li>
                                        <li><a href="#">Oct 25, 2021</a></li>
                                    </ul>
                                    <!-- Blog Title -->
                                    <h3 class="blog-title my-3"><a href="#">Current online banking system is highly dependent on NPSB</a></h3>
                                    <p>EPS will provide one-stop solution for the corporate clients dealing with large number of transactions. Easy Wage Disbursement is one of such services to be availed from EPS.</p>
                                    <a href="#" class="blog-btn mt-3">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ***** Blog Area End ***** -->



            <!--====== Contact Area Start ======-->
            <section id="contact" class="contact-area bg-gray ptb_100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-6">
                            <!-- Section Heading -->
                            <div class="section-heading text-center">
                                <h2 class="text-capitalize">Google Map</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- Contact Box -->
                            <div class="contact-box text-center">
                                <!-- Contact Form -->
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7296.864314685775!2d90.38540015334223!3d23.87428970530401!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c511c384e35b%3A0xd35fc861ef0c04ba!2sEPS%20-%20Easy%20Payment%20System!5e0!3m2!1sen!2sbd!4v1642668716700!5m2!1sen!2sbd" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

@endsection
