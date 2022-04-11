<!-- Content Wrapper. Contains page content -->
<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb bg-white">
		<div class="row align-items-center">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title text-uppercase">Order Details</h4>
			</div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<div class="d-md-flex">
					<ol class="breadcrumb ms-auto">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="fw-normal">Home</a></li>
						<li class="breadcrumb-item active"><a href="{{ route('admin.order') }}" class="fw-normal ">Orders</a>
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
		<!-- Start ORDERED DETAILS Page Content -->
		<!-- ============================================================== -->
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<div class="table-responsive">
						<div class="row col-sm-12">
							<div class="col-sm-6">
								<h4 class="page-title text-uppercase">Ordered Details</h4>
							</div>
							<div class="col-sm-6"><a href="{{ route('admin.order') }}" class="btn btn-primary float-end"><i
										class="fas fa-list mr-2"></i> Back to Orders</a> </div>
						</div>
						<table class="table">
							<tr>
								<th class="border-top-0">Order Id</th>
								<td class="border-top-0">{{ $order->id }}</td>
								<th class="border-top-0">Order Date</th>
								<td class="border-top-0">{{ $order->created_at }}</td>
								<th class="border-top-0">Status</th>
								<td class="border-top-0">{{ $order->status }}</td>
								@if ($order->status == 'delivered')
									<th class="border-top-0">Delivered Date</th>
									<td class="border-top-0">{{ $order->delivered_date }}</td>
								@elseif ($order->status == 'canceled')
									<th class="border-top-0">Cancelation Date</th>
									<td class="border-top-0">{{ $order->canceled_date }}</td>
								@endif
							</tr>
						</table>
					</div>

				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- End ORDERED DETAILS Pge Content -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Start ORDERED Items Page Content -->
		<!-- ============================================================== -->
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<div class="table-responsive">
						<h4 class="page-title text-uppercase">Ordered Items</h4>
						<table class="table text-nowrap">
							<thead>
								<tr>
									<th class="border-top-0">#</th>
									<th class="border-top-0">Image</th>
									<th class="border-top-0">Name</th>
									<th class="border-top-0">Price</th>
									<th class="border-top-0">Quantity</th>
									<th class="border-top-0">Amount</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($orderItems as $item)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td><img class="round" src="{{ asset('assets/images/product') }}/{{ $item->product->image }}"
												width="100" alt=""></rd>
										<td>{{ $item->product->name }}</rd>
										<td>${{ $item->product->regulary_price }}</td>
										<td>{{ $item->quantity }}</td>
										<td>${{ $item->product->regulary_price * $item->quantity }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="col-md-12 order-md-last">
						<h4 class="d-flex justify-content-between align-items-center mb-3">
							<span class="my-0">Order Summary</span>
						</h4>
						<ul class="list-group list-group-flush mb-3">
							<li class="list-group-item d-flex justify-content-between">
								<div>
									<h6 class="my-0">Subtotal</h6>
								</div>
								<strong>${{ $order->subtotal }}</strong>
							</li>

							<li class="list-group-item d-flex justify-content-between">
								<div>
									<h6 class="my-0">Tax</h6>
								</div>
								<strong>${{ $order->tax }}</strong>
							</li>

							<li class="list-group-item d-flex justify-content-between">
								<div>
									<h6 class="my-0">Shipping</h6>
								</div>
								<strong>Free Shipping</strong>
							</li>

							<li class="list-group-item d-flex justify-content-between">
								<span>Total (USD)</span>
								<strong>${{ $order->total }}</strong>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- End ORDERED Items Pge Content -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Start Billing Details Page Content -->
		<!-- ============================================================== -->
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<div class="table-responsive">
						<h4 class="page-title text-uppercase">Billing Details</h4>
						<table class="table text-nowrap table-sm">
							<tr>
								<th class="border-top-0">First Name</th>
								<td class="border-top-0">{{ $order->firstname }}</td>
								<th class="border-top-0">Last Name</th>
								<td class="border-top-0">{{ $order->firstname }}</td>
							</tr>
							<tr>
								<th class="border-top-0">Phone</th>
								<td class="border-top-0">{{ $order->mobile }}</td>
								<th class="border-top-0">Email</th>
								<td class="border-top-0">{{ $order->email }}</td>
							</tr>
							<tr>
								<th class="border-top-0">Line1</th>
								<td class="border-top-0">{{ $order->line1 }}</td>
								<th class="border-top-0">Line2</th>
								<td class="border-top-0">{{ $order->line2 }}</td>
							</tr>
							<tr>
								<th class="border-top-0">City</th>
								<td class="border-top-0">{{ $order->city }}</td>
								<th class="border-top-0">Provine</th>
								<td class="border-top-0">{{ $order->province }}</td>
							</tr>
							<tr>
								<th class="border-top-0">Country</th>
								<td class="border-top-0">{{ $order->country }}</td>
								<th class="border-top-0">c</th>
								<td class="border-top-0">{{ $order->zipcode }}</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- End Billing Details Page Content -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Start Shipping Details Page Content -->
		<!-- ============================================================== -->
		@if ($order->is_shipping_different)
			<div class="row">
				<div class="col-sm-12">
					<div class="white-box">
						<div class="table-responsive">
							<h4 class="page-title text-uppercase">Shipping Details</h4>
							<table class="table text-nowrap table-sm">
								<tr>
									<th class="border-top-0">First Name</th>
									<td class="border-top-0">{{ $order->shipping->firstname }}</td>
									<th class="border-top-0">Last Name</th>
									<td class="border-top-0">{{ $order->shipping->firstname }}</td>
								</tr>
								<tr>
									<th class="border-top-0">Phone</th>
									<td class="border-top-0">{{ $order->shipping->mobile }}</td>
									<th class="border-top-0">Email</th>
									<td class="border-top-0">{{ $order->shipping->email }}</td>
								</tr>
								<tr>
									<th class="border-top-0">Line1</th>
									<td class="border-top-0">{{ $order->shipping->line1 }}</td>
									<th class="border-top-0">Line2</th>
									<td class="border-top-0">{{ $order->shipping->line2 }}</td>
								</tr>
								<tr>
									<th class="border-top-0">City</th>
									<td class="border-top-0">{{ $order->shipping->city }}</td>
									<th class="border-top-0">Provine</th>
									<td class="border-top-0">{{ $order->shipping->province }}</td>
								</tr>
								<tr>
									<th class="border-top-0">Country</th>
									<td class="border-top-0">{{ $order->shipping->country }}</td>
									<th class="border-top-0">c</th>
									<td class="border-top-0">{{ $order->shipping->zipcode }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		@endif
		<!-- ============================================================== -->
		<!-- End Shipping Details Page Content -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Start Transaction Details Page Content -->
		<!-- ============================================================== -->
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<div class="table-responsive">
						<h4 class="page-title text-uppercase">Transaction</h4>
						<table class="table text-nowrap table-sm">
							<tr>
								<th class="border-top-0">Transaction Mode</th>
								<td class="border-top-0">{{ $order->transaction->mode }}</td>
							</tr>
							<tr>
								<th class="border-top-0">Status</th>
								<td class="border-top-0">{{ $order->transaction->status }}</td>
							</tr>
							<tr>
								<th class="border-top-0">Transactino Date</th>
								<td class="border-top-0">{{ $order->transaction->created_at }}</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- End Transaction Page Content -->
		<!-- ============================================================== -->
	</div>
	<!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->
