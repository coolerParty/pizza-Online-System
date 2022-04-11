<div class="page-wrapper">
	<div class="page-breadcrumb bg-white">
		<div class="row align-items-center">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title text-uppercase">Coupon</h4>
			</div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<div class="d-md-flex">
					<ol class="breadcrumb ms-auto">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="fw-normal">Home</a></li>
						<li class="breadcrumb-item"><a href="{{ route('admin.coupon') }}" class="fw-normal ">Coupon</a></li>
						<li class="breadcrumb-item active"><a href="#" class="fw-normal ">Edit</a></li>
					</ol>
				</div>
			</div>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- ============================================================== -->
	<!-- End Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Container fluid  -->
	<!-- ============================================================== -->
	<div class="container-fluid">
		<!-- ============================================================== -->
		<!-- Start Page Content -->
		<!-- ============================================================== -->
		<div class="row">
			<div class="col-md-8 col-sm-8">
				<div class="white-box">
					@if (Session::has('message'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<h5><i class="icon fas fa-check"></i> Coupon Updated!</h5>{{ Session::get('message') }}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					@endif
					<div class="row">
						<div class="col">
							<h3 class="box-title">Coupon Edit</h3>
						</div>
						<div class="col"><a href="{{ route('admin.coupon') }}" class="btn btn-primary float-end"><i
									class="fas fa-list mr-2"></i> Back to Coupon</a> </div>
					</div>
					<!-- form start -->
					<form wire:submit.prevent="updateCoupon" class="form-horzontal form-material">
						<div class="card-body">
							<div class="form-group">
								<label for="code">Coupon Code</label>
								<input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code"
									placeholder="Enter coupon" wire:model="code">
								@error('code')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
                            <div class="form-group">
								<label for="type">Coupon Type</label>
								<select name="type" id="type"  class="form-control @error('type') is-invalid @enderror" wire:model="type">
                                    <option value="">Select</option>
                                    <option value="fixed">fixed</option>
                                    <option value="percent">percent</option>
                                </select>
								@error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
                            <div class="form-group">
								<label for="value">Coupon value</label>
								<input type="number" class="form-control @error('value') is-invalid @enderror" id="value" name="value"
									placeholder="Enter coupon value" wire:model="value">
								@error('value')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
                            <div class="form-group">
								<label for="cart_value">Cart Value</label>
								<input type="number" class="form-control @error('cart_value') is-invalid @enderror" id="cart_value" name="cart_value"
									placeholder="Enter cart value" wire:model="cart_value">
								@error('cart_value')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
							<div class="form-group" wire:ignore>
								<label for="expiry_date">Expiry Date</label>
								<input type="date" class="form-control @error('expiry_date') is-invalid @enderror" id="expiry_date" name="expiry_date"
									placeholder="Enter Expiry Date" wire:model="expiry_date">
								@error('expiry_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>

						</div>
						<button type="submit" class="btn btn-success"><i class="fas fa-plus-circle mr-2"></i> Update</button>
					</form>
				</div>
			</div>


		</div>
		<!-- ============================================================== -->
		<!-- End PAge Content -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Right sidebar -->
		<!-- ============================================================== -->
		<!-- .right-sidebar -->
		<!-- ============================================================== -->
		<!-- End Right sidebar -->
		<!-- ============================================================== -->
	</div>

</div>
