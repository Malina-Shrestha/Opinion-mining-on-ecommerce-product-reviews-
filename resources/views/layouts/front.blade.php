<!doctype html>
<html lang="en">
<head>
    <base href="{{ url('/') }}">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>e-com</title>

    <link rel="stylesheet" href="{{ url('public/css/front/app.css') }}">
</head>
<body>
<div class="container-fluid">
    <header class="row">
        <!-- Top Nav -->
        <div class="col-12 bg-dark py-2 d-md-block d-none">
            <div class="row">
                <div class="col-auto mr-auto">
                    <ul class="top-nav">
                        <li>
                            <a href="tel:+123-456-7890"><i class="fa fa-phone-square mr-2"></i>+977-9981234901</a>
                        </li>
                        <li>
                            <a href="mailto:mail@ecom.com"><i class="fa fa-envelope mr-2"></i>mail@ecom.com</a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <ul class="top-nav">
                        @guest()
                        <li>
                            <a href="{{ route('login') }}">Login</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}">Register</a>
                        </li>
                        @else
                        <li>
                            <a href="{{ route('user.index') }}">{{ auth('web')->user()->name }}</a>
                        </li>
                        <li>
                           {{ Form::open(['method' => 'post', 'route' => 'logout', 'id' => 'logout-form', 'class' => 'd-none']) }}
                            {{ Form::close() }}
                            <a href="#" id="logout-link">Logout</a>
                        </li>
                        @endguest
                      </ul>
                </div>
            </div>
        </div>
        <!-- Top Nav -->

        <!-- Header -->
        <div class="col-12 bg-white pt-4">
            <div class="row">
                <div class="col-lg-auto">
                    <div class="logo text-center text-lg-left">
                        <a href="{{ url('/') }}"><img src="{{ url('public/images/logo.png') }}"></a>
                    </div>
                </div>
                <div class="col-lg-5 mx-auto mt-4 mt-lg-0">
                    {{ Form::open(['method' => 'get', 'route' => 'front.search']) }}
                        <div class="form-group">
                            <div class="input-group">
                                <input name="term" type="search" class="form-control border-dark" placeholder="Search..." required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-dark" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
                <div class="col-lg-auto text-center text-lg-left header-item-holder">
                    <a href="#" class="header-item">
                        <i class="fas fa-heart mr-2"></i><span id="header-favorite">0</span>
                    </a>
                    @php
                        $items = 0;
                        $total = 0;

                        if(request()->hasCookie('cart')) {
                            $cart = request()->cookie('cart');
                            $cart = json_decode($cart, true);
                            foreach($cart as $item) {
                                $items += $item['qty'];
                                $total += $item['amount'];
                            }
                         }
                    @endphp
                    <a href="{{ route('front.cart') }}" class="header-item">
                        <i class="fas fa-shopping-bag mr-2"></i><span id="header-qty" class="mr-3">{{ $items }}</span>
                        <i class="fas fa-money-bill-wave mr-2"></i><span id="header-price">Rs. {{ number_format($total) }}</span>
                    </a>
                </div>
            </div>

            @include('front.includes.nav')

        </div>
        <!-- Header -->

    </header>

    @yield('content')

    <!-- Footer -->
    <footer class="row">
        <div class="col-12 bg-dark text-white pb-3 pt-5">
            <div class="row">
                <div class="col-lg-2 col-sm-2 text-center text-sm-left mb-sm-0 mb-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="footer-logo">
                                <a href="{{ url('/') }}"><img src="{{ url('public/images/logo.png') }}"></a>
                            </div>
                        </div>
                        <div class="col-12">
                            <address>
                                Tahachal Marg-13<br>
                                Kathmandu
                            </address>
                         </div>
                        <div class="col-12">
                            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-pinterest-p"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-8 text-center text-sm-left mb-sm-0 mb-3">
                    <div class="row">
                        <div class="col-12 text-uppercase">
                            <h4>Who are we?</h4>
                        </div>
                        <div class="col-12 text-justify">
                            <p>We believe in providing relaible products. To make customers happy and satisfied is our prime duty.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3 col-5 ml-lg-auto ml-sm-0 ml-auto mb-sm-0 mb-3">
                    <div class="row">
                        <div class="col-12 text-uppercase">
                            <h4>Quick Links</h4>
                        </div>
                        <div class="col-12">
                            <ul class="footer-nav">
                                <li>
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li>
                                    <a href="#">Contact Us</a>
                                </li>
                                <li>
                                    <a href="{{ route('front.about') }}">About Us</a>
                                </li>
                                <li>
                                    <a href="#">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="#">Terms & Conditions</a>
                                </li>
                             </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 text-center text-sm-left mb-sm-0 mb-3">
                    <div class="row">
                        <div class="col-12 text-uppercase">
                            <h4>Location</h4>
                        </div>
                        <div class="mapouter"><div class="gmap_canvas"><iframe width="448" height="262" id="gmap_canvas" src="https://maps.google.com/maps?q=tahachal%20marg&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net">embedgooglemap.net</a></div><style>.mapouter{position:relative;text-align:right;height:169px;width:310px;}.gmap_canvas {overflow:hidden;background:none!important;height:169px;width:310px;}</style></div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 text-center text-sm-left">
                    <div class="row">
                        <div class="col-12 text-uppercase">
                            <h4>Newsletter</h4>
                        </div>
                        <div class="col-12">
                            <form action="#">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter your email..." required>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-outline-light text-uppercase">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer -->

</div>

@include('front.includes.messages')

<script type="text/javascript" src="{{ url('public/js/front/app.js') }}"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5cf8e04c267b2e5785312078/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
