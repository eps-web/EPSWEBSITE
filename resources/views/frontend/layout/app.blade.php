<!doctype html>
<html class="no-js" lang="en">

<head>
<title>@yield ('title') </title>
@include('frontend.layout.partials.header')
<meta name="description" content="@yield('metadescription')">
@include('frontend.layout.partials.style')

</head>

<body class="miami">


    <!--====== Scroll To Top Area Start ======-->
    <div id="scrollUp" title="Scroll To Top">
        <i class="icofont-bubble-up"></i>
    </div>
    <!--====== Scroll To Top Area End ======-->

    <div class="all-area">

<!-- ***** Menu Start ***** -->
@include('frontend.layout.Menu.menu')
<!-- ***** Menu End ***** -->



@section('main-content')
 @show




        <!--====== Footer Area Start ======-->
@include('frontend.layout.Footer.footer')
<!--====== Footer Area End ======-->
    </div>

    @include('frontend.layout.partials.script')
    </body>



</html>
