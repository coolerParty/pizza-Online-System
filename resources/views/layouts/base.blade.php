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
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

	@livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>

	<!-- header section starts      -->
	<header>
		<a href="#" class="logo"><i class="fas fa-utensils"></i>resto.</a>
		<nav class="navbar">
			<a class="@if(url()->current() == route('home.index')) active @endif" href="/">home</a>
			<a class="@if(url()->current() == route('menu.index')) active @endif" href="{{ route('menu.index') }}">dishes</a>
            @auth
                <a class="@if(url()->current() == route('user.order')) active @endif" href="{{ route('user.order') }}">order</a>
				@can ('admin-access')
					<a href="{{ route('admin.dashboard') }}">dashboard</a>
				@endcan
                <a class="@if(url()->current() == route('user.profile')) active @endif"  href="{{ route('user.profile') }}">Profile</a>
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


    @livewire('search-bar-component')

    {{ $slot }}

    <!-- footer section starts  -->

    @livewire('footer-component')

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
