<!-- Content Wrapper. Contains page content -->
<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb bg-white">
		<div class="row align-items-center">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title text-uppercase">My Orders</h4>
			</div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<div class="d-md-flex">
					<ol class="breadcrumb ms-auto">
						<li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}" class="fw-normal">Home</a></li>
						<li class="breadcrumb-item active"><a href="{{ route('user.order') }}" class="fw-normal ">My Orders</a>
						</li>
					</ol>
					{{-- <a href="https://www.wrappixel.com/templates/ampleadmin/" target="_blank"
                                class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Upgrade
                                to Pro</a> --}}
				</div>
			</div>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- ============================================================== -->
	<!-- End Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->

	<!-- Main content -->
	<div class="container-fluid">
		<!-- ============================================================== -->
		<!-- Start Page Content -->
		<!-- ============================================================== -->
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					@if (Session::has('message'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<h5><i class="icon fas fa-check"></i> Product Added!</h5>{{ Session::get('message') }}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					@endif
					@if (Session::has('del_message'))
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<h5><i class="icon fas fa-check"></i> Product Deleted!</h5>{{ Session::get('del_message') }}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					@endif
					@if (Session::has('up_message'))
						<div class="alert alert-info alert-dismissible fade show" role="alert">
							<h5><i class="icon fas fa-check"></i> Product Updated!</h5>{{ Session::get('up_message') }}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					@endif
					

					{{-- <p class="text-muted">Add class <code>.table</code></p> --}}

					<div class="table-responsive">

						<table class="table text-nowrap table-hover">
							<thead>
								<tr>
									<th class="border-top-0">#</th>
									<th class="border-top-0">SubTotal</th>
									<th class="border-top-0">Discount</th>
									<th class="border-top-0">Tax</th>
									<th class="border-top-0">Total</th>
									<th class="border-top-0">First Name</th>
									<th class="border-top-0">Last Name</th>
									<th class="border-top-0">Mobile</th>
									<th class="border-top-0">Email</th>
									<th class="border-top-0">Zipcode</th>
									<th class="border-top-0">Status</th>
									<th class="border-top-0">Order Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($orders as $order)
									<tr>
										<td>{{ $order->id }} </rd>
                                        <td>${{ $order->subtotal }} </rd>
                                        <td>${{ $order->discount }} </rd>
                                        <td>${{ $order->tax }} </rd>
                                        <td>${{ $order->total }} </rd>
                                        <td>{{ $order->firstname }} </rd>
                                        <td>{{ $order->lastname }} </rd>
                                        <td>{{ $order->mobile }} </rd>
                                        <td>{{ $order->email }} </rd>
                                        <td>{{ $order->zipcode }} </rd>
                                        <td>{{ $order->status }} </rd>
                                        <td>{{ $order->created_at }} </rd>
										<td><a href="{{ route('user.orderdetail',['order_id'=>$order->id]) }}"  class="btn btn-info btn-sm">Details</a></td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- End PAge Content -->
		<!-- ============================================================== -->
	</div>
	<!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->

