<div class="page-wrapper">
	<div class="page-breadcrumb bg-white">
		<div class="row align-items-center">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title text-uppercase">Change Password</h4>
			</div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<div class="d-md-flex">
					<ol class="breadcrumb ms-auto">
						<li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}" class="fw-normal">Home</a></li>
						<li class="breadcrumb-item active"><a href="#" class="fw-normal ">Change Password</a></li>
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
					@if (Session::has('password_success'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<h5><i class="icon fas fa-check"></i> Change Password!</h5>{{ Session::get('password_success') }}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					@endif
                    @if (Session::has('password_error'))
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<h5><i class="icon fas fa-check"></i> Change Password!</h5>{{ Session::get('password_error') }}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					@endif
					<div class="row">
						<div class="col">
							<h3 class="box-title">Change Password</h3>
						</div>
                        @if (Auth::user()->utype === 'ADM')
						<div class="col"><a href="{{ route('admin.dashboard') }}" class="btn btn-primary float-end"><i
									class="fas fa-list mr-2"></i> Back to Dashboard</a> </div>
                                    @elseif (Auth::user()->utype === 'USR')
                                    <div class="col"><a href="{{ route('user.dashboard') }}" class="btn btn-primary float-end"><i
                                        class="fas fa-list mr-2"></i> Back to Dashboard</a> </div>
                                    @endif
					</div>
					<!-- form start -->
					<form wire:submit.prevent="changePassword" class="form-horzontal form-material">
						<div class="card-body">
							<div class="form-group mb-4">
								<label for="current_password">Current Password</label>
								<input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password"
									placeholder="Current Password" wire:model="current_password">
								@error('current_password')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
                            <div class="form-group mb-4">
								<label for="password">New Password</label>
								<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
									placeholder="New Password" wire:model="password">
								@error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
                            <div class="form-group mb-4">
								<label for="password_confirmation">Confirm Password</label>
								<input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation"
									placeholder="Confirm Password" wire:model="password_confirmation">
								@error('password_confirmation')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
                            

						</div>
						<button type="submit" class="btn btn-success"><i class="fas fa-plus-circle mr-2"></i> Submit</button>
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

