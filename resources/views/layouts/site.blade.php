<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GetInked @yield('title', 'home')</title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/flexslider.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/chosen.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/color-01.css') }}?{{ md5(time()) }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    @livewireStyles
</head>
<body class="home-page home-01 ">

	<!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

	<!--header-->
	<header id="header" class="header header-style-1">
		<div class="container-fluid">
			<div class="row">
				<div class="topbar-menu-area">
					<div class="container">
						<div class="topbar-menu left-menu">
							<ul>
								<li class="menu-item" >
									<a title="(012) 065 0045" href="#" ><span class="icon label-before fa fa-phone"></span>Hotline: (012) 065 0045</a>
								</li>
								<li class="menu-item" >
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</li>
								<li class="menu-item" >
									<a title="Whatsapp +27 76 959 2717" href="#" ><span class="icon label-before fa fa-whatsapp"></span> +27 76 959 2717</a>
								</li>
							</ul>
						</div>
						<div class="topbar-menu right-menu">
							<ul>
                                @auth
                                <li class="menu-item menu-item-has-children parent" >
									<a title="{{ Auth::user()->name }}" href="#">My Account({{ Auth::user()->name }})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="submenu curency" >
                                        @if (Auth::user()->is_admin == 1)
                                            <li class="menu-item" >
                                                <a title="Dashboard" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                            </li>
                                        @else
                                            <li class="menu-item" >
                                                <a title="Dashboard" href="{{ route('user.dashboard') }}">Dashboard</a>
                                            </li>
                                        @endif
                                        <li class="menu-item" >
                                            <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                @else
                                    <li class="menu-item" ><a title="Register or Login" href="{{ route('login') }}">Login</a></li>
                                    <li class="menu-item" ><a title="Register or Login" href="{{ route('register') }}">Register</a></li>
                                @endauth
							</ul>
						</div>
					</div>
				</div>

				<div class="container">
					<div class="mid-section main-info-area">
						<div class="wrap-logo-top left-section">
							<a href="/" class="link-to-home"><img src="{{ asset('images/logo-top-1.png') }}" alt="mercado"></a>
						</div>

                        @livewire('header-search-component')

						<div class="wrap-icon right-section">
							<div class="wrap-icon-section minicart">
								<a href="/cart" class="link-direction">
									<i class="fa fa-shopping-basket" aria-hidden="true"></i>
									<div class="left-info">
                                        @livewire('cart-total')
										<span class="title">CART</span>
									</div>
								</a>
							</div>
							<div class="wrap-icon-section show-up-after-1024">
								<a href="#" class="mobile-navigation">
									<span></span>
									<span></span>
									<span></span>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="nav-section header-sticky">
					<div class="header-nav-section">
						<div class="container">
							<ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info" >
								<li class="menu-item"><a href="#" class="link-term">Discontinued</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Featured</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">In Stock</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Out Fo Stock</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Specials</a><span class="nav-label hot-label">hot</span></li>
							</ul>
						</div>
					</div>
					<div class="primary-nav-section">
						<div class="container">
							<ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
								<li class="menu-item {{request()->is('/') ? 'home-icon' : ''}}">
									<a href="/" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
								</li>
								<li class="menu-item {{request()->is('about-us') ? 'home-icon' : ''}}">
									<a href="/about-us" class="link-term mercado-item-title">About Us</a>
								</li>
								<li class="menu-item {{request()->is('shop*') ? 'home-icon' : ''}}">
									<a href="/shop" class="link-term mercado-item-title">Shop</a>
								</li>
								<li class="menu-item {{request()->is('cart') ? 'home-icon' : ''}}">
									<a href="/cart" class="link-term mercado-item-title">Cart</a>
								</li>
								<li class="menu-item {{request()->is('checkout') ? 'home-icon' : ''}}">
									<a href="/checkout" class="link-term mercado-item-title">Checkout</a>
								</li>
								<li class="menu-item {{request()->is('contact-us') ? 'home-icon' : ''}}">
									<a href="/contact-us" class="link-term mercado-item-title">Contact Us</a>
								</li>
								<li class="menu-item {{request()->is('expired-items') ? 'home-icon' : ''}}">
									<a href="/expired-items" class="link-term mercado-item-title">Expired Items</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

 @yield('content')

    </main>

	<footer id="footer">
		<div class="wrap-footer-content footer-style-1">

			<div class="wrap-function-info">
				<div class="container">
					<ul>
						<li class="fc-info-item">
							<i class="fa fa-truck" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Free Shipping</h4>
								<p class="fc-desc">Free On Oder Over R3000</p>
							</div>
						</li>
						<li class="fc-info-item">
							<i class="fa fa-recycle" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Guarantee</h4>
								<p class="fc-desc">7 Days Money Back</p>
							</div>
						</li>
						<li class="fc-info-item">
							<i class="fa fa-credit-card-alt" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Safe Payment</h4>
								<p class="fc-desc">Safe your online payment</p>
							</div>
						</li>
						<li class="fc-info-item">
							<i class="fa fa-life-ring" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Online Suport</h4>
								<p class="fc-desc">We Have Support 24/7</p>
							</div>

						</li>
					</ul>
				</div>
			</div>
			<!--End function info-->

			<div class="main-footer-content">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<div class="wrap-footer-item">
								<h3 class="item-header">Contact Details</h3>
								<div class="item-content">
									<div class="wrap-contact-detail">
										<ul>
											<li>
												<i class="fa fa-map-marker" aria-hidden="true"></i>
												<p class="contact-txt">844 Haarhoff Street, Pretoria, Gauteng, South Africa</p>
											</li>
											<li>
												<i class="fa fa-phone" aria-hidden="true"></i>
												<p class="contact-txt">(012) 065 0045</p>
											</li>
											<li>
												<i class="fa fa-whatsapp" aria-hidden="true"></i>
												<p class="contact-txt">+27 76 959 2717</p>
											</li>
											<li>
												<i class="fa fa-envelope" aria-hidden="true"></i>
												<p class="contact-txt">sales@getinked.co.za</p>
											</li>
										</ul>
									</div>
								</div>
							</div>
                            <div class="wrap-footer-item">
								<h3 class="item-header">We Using Safe Payments:</h3>
								<div class="item-content">
									<div class="wrap-list-item wrap-gallery">
										<img src="{{ asset('images/payment.png') }}" style="max-width: 260px;">
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<div class="wrap-footer-item">
								<h3 class="item-header">Hot Line</h3>
								<div class="item-content">
									<div class="wrap-hotline-footer">
										<span class="desc">Call Us</span>
										<b class="phone-number">(012) 065 0045</b>
									</div>
									<div class="wrap-hotline-footer">
										<span class="desc">WhatsApp Us</span>
										<b class="phone-number">+27 76 959 2717</b>
									</div>
								</div>
							</div>
							<div class="wrap-footer-item footer-item-second">
								<h3 class="item-header">Sign up for newsletter</h3>
								<div class="item-content">
									<div class="wrap-newletter-footer">
										<form action="#" class="frm-newletter" id="frm-newletter">
											<input type="email" class="input-email" name="email" value="" placeholder="Enter your email address">
											<button class="btn-submit">Subscribe</button>
										</form>
									</div>
								</div>
							</div>

						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 box-twin-content ">
							<div class="row">
								<div class="wrap-footer-item twin-item">
									<h3 class="item-header">My Account</h3>
									<div class="item-content">
										<div class="wrap-vertical-nav">
											<ul>
												<li class="menu-item"><a href="#" class="link-term">My Account</a></li>
												<li class="menu-item"><a href="#" class="link-term">Order History</a></li>
												<li class="menu-item"><a href="#" class="link-term">Gift Certificates</a></li>
												<li class="menu-item"><a href="#" class="link-term">Affiliates</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="wrap-footer-item twin-item">
									<h3 class="item-header">Infomation</h3>
									<div class="item-content">
										<div class="wrap-vertical-nav">
											<ul>
												<li class="menu-item"><a href="#" class="link-term">Contact Us</a></li>
												<li class="menu-item"><a href="#" class="link-term">Brands</a></li>
												<li class="menu-item"><a href="#" class="link-term">Returns</a></li>
												<li class="menu-item"><a href="#" class="link-term">Specials</a></li>
											</ul>
										</div>
									</div>
								</div>
                                <div class="wrap-footer-item" style="float: right">
                                    <h3 class="item-header">Social network</h3>
                                    <div class="item-content">
                                        <div class="wrap-list-item social-network">
                                            <ul>
                                                <li><a href="#" class="link-to-item" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                <li><a href="#" class="link-to-item" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                <li><a href="#" class="link-to-item" title="pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                                <li><a href="#" class="link-to-item" title="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
            <div class="clearfix">&nbsp;</div>
			<div class="coppy-right-box">
				<div class="container">
					<div class="coppy-right-item item-left">
						<p class="coppy-right-text">Copyright ?? 2020 Surfside Media. All rights reserved</p>
					</div>
					<div class="coppy-right-item item-right">
						<div class="wrap-nav horizontal-nav">
							<ul>
								<li class="menu-item"><a href="/about-us" class="link-term">About us</a></li>
								<li class="menu-item"><a href="/privacy-policy" class="link-term">Privacy Policy</a></li>
								<li class="menu-item"><a href="/terms-conditions" class="link-term">Terms & Conditions</a></li>
								<li class="menu-item"><a href="/return-policy" class="link-term">Return Policy</a></li>
							</ul>
						</div>
					</div>
					<div class="clearfix">&nbsp;</div>
				</div>
			</div>
		</div>
	</footer>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
	<script src="{{ asset('js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/jquery.flexslider.js') }}"></script>
	<script src="{{ asset('js/chosen.jquery.min.js') }}"></script>
	<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
	<script src="{{ asset('js/jquery.sticky.js') }}"></script>
	<script src="{{ asset('js/functions.js') }}?{{ time() }}"></script>
    @livewireScripts
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
	window.addEventListener('alert', event => {
		toastr[event.detail.type](event.detail.message, event.detail.title ?? '')
		toastr.options = {
			"closeButton": true,
			"progressBar": true,
		}
	})
 </script>
</body>
</html>
