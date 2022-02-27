@extends('frontend.layout.app')
{{-- Start Search Engine Optimization Section --}}

@php
   $page = "Home";
   $info = App\Models\PageSeo::where('page_name',$page)->first();

@endphp

@include('frontend.layout.partials.seoMetrics')

{{-- End  Optimization Section  --}}

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
                        <li class="breadcrumb-item active">{{ $info ->page_name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Breadcrumb Area End ***** -->

@endsection
