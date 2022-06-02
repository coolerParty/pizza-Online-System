<div class="page-wrapper">
	<div class="page-breadcrumb bg-white">
		<div class="row align-items-center">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title text-uppercase">Info</h4>
			</div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<div class="d-md-flex">
					<ol class="breadcrumb ms-auto">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="fw-normal">Home</a></li>
						<li class="breadcrumb-item"><a href="{{ route('admin.info') }}" class="fw-normal ">Info</a></li>
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
							<h5><i class="icon fas fa-check"></i> Info Update!</h5>{{ Session::get('message') }}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					@endif
					<div class="row">
						<div class="col">
							<h3 class="box-title">info Edit</h3>
						</div>
						<div class="col"><a href="{{ route('admin.info') }}" class="btn btn-primary float-end"><i
									class="fas fa-list mr-2"></i> Back to Info</a> </div>
					</div>
					<!-- form start -->
					<form wire:submit.prevent="updateInfo" class="form-horzontal form-material">
						<div class="card-body">
							<div class="form-group mb-4">
								<label for="name">Name</label>
								<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
									placeholder="Enter product" wire:model="name">
								@error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
                            <div class="form-group mb-4">
								<label for="link">Link</label>
								<input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link"
									placeholder="Enter link" wire:model="link">
								@error('link')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
                            <div class="form-group mb-4">
                                <label for="type">type</label>
                                <div class="border-bottom">
                                    <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" wire:model="type" wire:ignore>
                                        <option value="">Select Type</option>
                                        <option value="1">Country</option>
                                        <option value="2">Contact</option>
                                        <option value="3">Social Media</option>
                                    </select>
                                    @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
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
