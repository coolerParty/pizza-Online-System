<!DOCTYPE html>
<html dir="ltr" lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords"
			content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
		<meta name="description"
			content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
		<meta name="robots" content="noindex,nofollow">
		<title>Ample Admin Lite Template by WrapPixel</title>
		{{-- bootstrap --}}
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
		<!-- Favicon icon -->
		<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/plugins/images/favicon.png') }}">
		<!-- Custom CSS -->
		<link href="{{ asset('admin/plugins/bower_components/chartist/dist/chartist.min.css') }}" rel="stylesheet">
		<link rel="stylesheet"
			href="{{ asset('admin/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css') }}">
		<!-- Custom CSS -->
		<link href="{{ asset('admin/css/style.min.css') }}" rel="stylesheet">
		@livewireStyles
	</head>

	<body>
		<!-- ============================================================== -->
		<!-- Preloader - style you can find in spinners.css -->
		<!-- ============================================================== -->
		<div class="preloader">
			<div class="lds-ripple">
				<div class="lds-pos"></div>
				<div class="lds-pos"></div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- Main wrapper - style you can find in pages.scss -->
		<!-- ============================================================== -->
		<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
			data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
			<!-- ============================================================== -->
			<!-- Topbar header - style you can find in pages.scss -->
			<!-- ============================================================== -->
			<header class="topbar" data-navbarbg="skin5">
				<nav class="navbar top-navbar navbar-expand-md navbar-dark">
					<div class="navbar-header" data-logobg="skin6">
						<!-- ============================================================== -->
						<!-- Logo -->
						<!-- ============================================================== -->
						@if (Route::has('login'))
							@can('admin-access')
								<a class="navbar-brand" href="{{ route('admin.dashboard') }}">
									<!-- Logo icon -->
									<b class="logo-icon">
										<!-- Dark Logo icon -->
										<img src="{{ asset('admin/plugins/images/logo-icon.png') }}" alt="homepage" />
									</b>
									<!--End Logo icon -->
									<!-- Logo text -->
									<span class="logo-text">
										<!-- dark Logo text -->
										<img src="{{ asset('admin/plugins/images/logo-text.png') }}" alt="homepage" />
									</span>
								</a>
							@endif
						@endif
						<!-- ============================================================== -->
						<!-- End Logo -->
						<!-- ============================================================== -->
						<!-- ============================================================== -->
						<!-- toggle and nav items -->
						<!-- ============================================================== -->
						<a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)"><i
								class="ti-menu ti-close"></i></a>
					</div>
					<!-- ============================================================== -->
					<!-- End Logo -->
					<!-- ============================================================== -->
					<div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
						<!-- ============================================================== -->
						<!-- Right side toggle and nav items -->
						<!-- ============================================================== -->
						<ul class="navbar-nav ms-auto d-flex align-items-center">

							<!-- ============================================================== -->
							<!-- Search -->
							<!-- ============================================================== -->
							<li class=" in">
								<form role="search" class="app-search d-none d-md-block me-3">
									<input type="text" placeholder="Search..." class="form-control mt-0">
									<a href="" class="active">
										<i class="fa fa-search"></i>
									</a>
								</form>
							</li>
							<!-- ============================================================== -->
							<!-- User profile and search -->
							<!-- ============================================================== -->
							@auth
								<li>
									{{-- <a class="profile-pic" href="#">
												<img src="{{ asset('assets/images/profile_thumbnail') }}/{{ Auth::user()->profile->image }}"
													alt="user-img" width="36" class="img-circle"><span
													class="text-white font-medium">{{ Auth::user()->name }}</span></a> --}}
									<a class="profile-pic" href="#">
										<span class="text-white font-medium">{{ Auth::user()->name }}</span></a>
								</li>
							@else
								<li>
									<a class="profile-pic" href="{{ route('login') }}"><span class="text-white font-medium">Login</span></a>
								</li>
							@endif

							<!-- ============================================================== -->
							<!-- User profile and search -->
							<!-- ============================================================== -->
						</ul>
					</div>
				</nav>
			</header>
			<!-- ============================================================== -->
			<!-- End Topbar header -->
			<!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- Left Sidebar - style you can find in sidebar.scss  -->
			<!-- ============================================================== -->
			<aside class="left-sidebar" data-sidebarbg="skin6">
				<!-- Sidebar scroll-->
				<div class="scroll-sidebar">
					<!-- Sidebar navigation-->
					<nav class="sidebar-nav">
						<ul id="sidebarnav">
							@auth
								<!-- Admin Menu -->
								@can ('admin-access')
									<li class="sidebar-item pt-2">
										<a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.dashboard') }}"
											aria-expanded="false">
											<i class="far fa-clock" aria-hidden="true"></i>
											<span class="hide-menu">Dashboard</span>
										</a>
									</li>
									<li class="sidebar-item">
										<a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.category') }}"
											aria-expanded="false">
											<i class="fas fa-dot-circle" aria-hidden="true"></i>
											<span class="hide-menu">Category</span>
										</a>
									</li>
									<li class="sidebar-item">
										<a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.product') }}"
											aria-expanded="false">
											<i class="fab fa-product-hunt" aria-hidden="true"></i>
											<span class="hide-menu">Product</span>
										</a>
									</li>
									<li class="sidebar-item">
										<a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.coupon') }}"
											aria-expanded="false">
											<i class="far fa-lightbulb" aria-hidden="true"></i>
											<span class="hide-menu">Coupon

											</span>
										</a>
									</li>
									<li class="sidebar-item">
										<a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.order') }}"
											aria-expanded="false">
											<i class="fas fa-shopping-basket" aria-hidden="true"></i>
											<span class="hide-menu">Order</span>
										</a>
									</li>
									<li class="sidebar-item">
										<a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.contact') }}"
											aria-expanded="false">
											<i class="fas fa-shopping-basket" aria-hidden="true"></i>
											<span class="hide-menu">Contact</span>
										</a>
									</li>
								<!-- Admin Menu End -->
								@endif

								<li class="sidebar-item">
									<a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
										<i class="far fa-list-alt" aria-hidden="true"></i>
										<span class="hide-menu">Task</span>
									</a>
								</li>

								<li class="sidebar-item">
									<a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
										<i class="fa fa-user" aria-hidden="true"></i>
										<span class="hide-menu">Profile</span>
									</a>
								</li>

								<li class="sidebar-item">
									<a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('user.changepassword') }}" aria-expanded="false">
										<i class="fa fa-user" aria-hidden="true"></i>
										<span class="hide-menu">Change Password</span>
									</a>
								</li>

								<li class="sidebar-item">
									<a class="sidebar-link waves-effect waves-dark sidebar-link" href="/" aria-expanded="false">
										<i class="fa fa-user" aria-hidden="true"></i>
										<span class="hide-menu">Home</span>
									</a>
								</li>

								<li class="sidebar-item">
									<a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('logout') }}"
										onclick="event.preventDefault(); document.getElementById('logout-form').submit();" aria-expanded="false">
										<i class="fas fa-sign-out-alt" aria-hidden="true"></i>
										<span class="hide-menu">Logout</span>
									</a>
								</li>
								<form id="logout-form" method="POST" action="{{ route('logout') }}">
									@csrf
								</form>

							@else
								<div><a href="{{ route('login') }}"><span style="color: black">Sign In</span></a></div>
							@endif

						</ul>
					</nav>
					<!-- End Sidebar navigation -->
				</div>
				<!-- End Sidebar scroll-->
			</aside>
			<!-- ============================================================== -->
			<!-- End Left Sidebar - style you can find in sidebar.scss  -->
			<!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- Page wrapper  -->
			<!-- ============================================================== -->


			<!-- ============================================================== -->
			<!-- Container fluid  -->
			<!-- ============================================================== -->

			{{ $slot }}

			<!-- ============================================================== -->
			<!-- End Container fluid  -->
			<!-- ============================================================== -->
			<div class="page-wrapper">
				<!-- ============================================================== -->
				<!-- footer -->
				<!-- ============================================================== -->
				<footer class="footer text-center"> 2021 © Ample Admin brought to you by <a
						href="https://www.wrappixel.com/">wrappixel.com</a>
				</footer>
				<!-- ============================================================== -->
				<!-- End footer -->
				<!-- ============================================================== -->
			</div>
			<!-- ============================================================== -->
			<!-- End Page wrapper  -->
			<!-- ============================================================== -->
		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

			<!-- ============================================================== -->
			<!-- All Jquery -->
			<!-- ============================================================== -->
			<script src="{{ asset('admin/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
			<!-- Bootstrap tether Core JavaScript -->
			{{-- <script src="{{ asset('admin/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script> --}}
			<script src="{{ asset('admin/js/app-style-switcher.js') }}"></script>
			<script src="{{ asset('admin/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
			<!--Wave Effects -->
			<script src="{{ asset('admin/js/waves.js') }}"></script>
			<!--Menu sidebar -->
			<script src="{{ asset('admin/js/sidebarmenu.js') }}"></script>
			<!--Custom JavaScript -->
			<script src="{{ asset('admin/js/custom.js') }}"></script>
			<!--This page JavaScript -->
			<!--chartis chart-->
			<script src="{{ asset('admin/plugins/bower_components/chartist/dist/chartist.min.js') }}"></script>
			<script
			   src="{{ asset('admin/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}">
			</script>
			<script src="{{ asset('admin/js/pages/dashboards/dashboard1.js') }}"></script>

			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
			   integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
			</script>
			<script src="https://cdn.tiny.cloud/1/titz4ckhqw932u1vyzq8h8vclq1w1ktdcf51mjftxeebmo3p/tinymce/5/tinymce.min.js"
			   referrerpolicy="origin"></script>

			@livewireScripts

			@stack('scripts')
	</body>

</html>
