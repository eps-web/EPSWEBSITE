<header class="section header-area">
    <div id="appo-header" class="header sticky">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <a class="navbar-brand" href="index.html">
                    <img class="logo" src="{{ URL::to('') }}/frontend/assets/img/logo/logo.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#appo-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Appo Menu -->
                <div class="collapse navbar-collapse" id="appo-menu">
                    <!-- Header Items -->
                    <ul class="navbar-nav header-items ml-auto">

                        <li class="nav-item">
                            <a class="nav-link scroll" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-2" role="button" data-toggle="dropdown">
                                Services
                            </a>
                            <div class="dropdown-menu mega-menu blog-menu px-3 py-md-3">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="single-menu">
                                            <li><a class="dropdown-item" href="{{ route('frontend.balance_transfer') }}">Balance Transfer</a></li>
                                            <li><a class="dropdown-item" href="{{ route('frontend.billandfee') }}">Bill and Fee Payment</a></li>
                                            <li><a class="dropdown-item" href="{{ route('frontend.marchent-payment') }}">Merchant Payment</a></li>
                                            <li><a class="dropdown-item" href="{{ route('frontend.balance-enquiry') }}">Balance Enquiry</a></li>
                                            <li><a class="dropdown-item" href="{{ route('frontend.mobile-top-up') }}">Mobile Top-up</a></li>
                                            <li><a class="dropdown-item" href="{{ route('frontend.corporate-service') }}">Corporate Services</a></li>
                                            <li><a class="dropdown-item" href="{{ route('frontend.enhance-Banking') }}">Enhancing Banking Services</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>

                     {{--    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-2" role="button" data-toggle="dropdown">
                                Registration
                            </a>
                            <div class="dropdown-menu mega-menu blog-menu px-3 py-md-3">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="single-menu">
                                            <li><a class="dropdown-item" href="merchant-registration.html">Merchant Registration</a></li>
                                            <li><a class="dropdown-item" href="user-registration.html">User Registration</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li> --}}

                        <li class="nav-item">
                            <a class="nav-link scroll" href="https://blog.eps.com.bd/">blog</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link scroll" href="{{ route('frontend.faq') }}">FAQ</a>
                        </li>



                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('frontend.contact') }}">Contact us</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<!--script for fixed menu!-->
<script>
window.onscroll = function() {myFunction()};
var header = document.getElementById("appo-header");
var sticky = header.offsetTop;
function myFunction(){
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}

</script>
