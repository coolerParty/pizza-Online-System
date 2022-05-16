<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Complete Responsive Food Website Design Tutorial</title>

	<link rel="stylesheet" href="{{ asset('assets/swiper/swiper-bundle.min.css') }}" />
	{{-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" /> --}}

	<!-- font awesome cdn link  -->
	<link rel="stylesheet" href="{{ asset('assets/font-awesome/all.min.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

	<!-- custom css file link  -->
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	@livewireStyles
</head>

<body>

	<!-- header section starts      -->
	<header>
		<a href="#" class="logo"><i class="fas fa-utensils"></i>resto.</a>
		<nav class="navbar">
			<a class="@if(url()->current() == route('home.index')) active @endif" href="/">home</a>
			<a class="@if(url()->current() == route('menu.index')) active @endif" href="{{ route('menu.index') }}">dishes</a>
			<a href="#about">about</a>
			<a href="#review">review</a>
            <a class="@if(url()->current() == route('cart.index')) active @endif" href="{{ route('cart.index') }}">order</a>
            <a class="@if(url()->current() == route('contact')) active @endif" href="{{ route('contact') }}">Contact</a>
			@auth
				@can ('admin-access')
					<a href="{{ route('admin.dashboard') }}">dashboard</a>
				@else
					<a href="{{ route('user.dashboard') }}">dashboard</a>
				@endcan
				<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
					aria-expanded="false">
					<i class="fas fa-sign-out-alt" aria-hidden="true"></i>
					<span class="hide-menu">Logout</span>
				</a>
				<form id="logout-form" method="POST" action="{{ route('logout') }}">
					@csrf
				</form>
			@else
				<a href="{{ route('login') }}">login</a>
				<a href="{{ route('register') }}">register</a>
			@endif

		</nav>

        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <i class="fas fa-search" id="search-icon"></i>
            @livewire('wishlist-count-component')
            @livewire('cart-count-component')
        </div>
    </header>
    <!-- header section ends-->

    <!-- search form  -->

    <form action="" id="search-form">
        <input type="search" placeholder="search here..." name="" id="search-box">
        <label for="search-box" class="fas fa-search"></label>
        <i class="fas fa-times" id="close"></i>
    </form>

    {{ $slot }}

    <!-- footer section starts  -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>locations</h3>
                <a href="#">india</a>
                <a href="#">japan</a>
                <a href="#">russia</a>
                <a href="#">USA</a>
                <a href="#">france</a>
            </div>

            <div class="box">
                <h3>quick links</h3>
                <a href="#">home</a>
                <a href="#">dishes</a>
                <a href="#">about</a>
                <a href="#">menu</a>
                <a href="#">reivew</a>
                <a href="#">order</a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#">+123-456-7890</a>
                <a href="#">+111-222-3333</a>
                <a href="#">shaikhanas@gmail.com</a>
                <a href="#">anasbhai@gmail.com</a>
                <a href="#">mumbai, india - 400104</a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="#">facebook</a>
                <a href="#">twitter</a>
                <a href="#">instagram</a>
                <a href="#">linkedin</a>
            </div>

        </div>

        <div class="credit"> copyright @ 2021 by <span>mr. web designer</span> </div>

    </section>

    <!-- footer section ends -->

    <!-- loader part  -->
    <div class="loader-container">
        <img src="{{ asset('images/loader.gif') }}" alt="">
    </div>

    <script src="{{ asset('assets/swiper/swiper-bundle.min.js') }}"></script>
    {{-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> --}}

    <!-- custom js file link  -->
    <script src="{{ asset('js/script.js') }}"></script>

    @livewireScripts

    @stack('scripts')

</body>

</html>
