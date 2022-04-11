<div class="page-wrapper">
	<div class="page-breadcrumb bg-white">
		<div class="row align-items-center">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title text-uppercase">Product</h4>
			</div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<div class="d-md-flex">
					<ol class="breadcrumb ms-auto">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="fw-normal">Home</a></li>
						<li class="breadcrumb-item"><a href="{{ route('admin.product') }}" class="fw-normal ">Product</a></li>
						<li class="breadcrumb-item active"><a href="{{ route('admin.addproduct') }}" class="fw-normal ">Add</a></li>
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
							<h5><i class="icon fas fa-check"></i> Product Added!</h5>{{ Session::get('message') }}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					@endif
					<div class="row">
						<div class="col">
							<h3 class="box-title">Product Entry</h3>
						</div>
						<div class="col"><a href="{{ route('admin.product') }}" class="btn btn-primary float-end"><i
									class="fas fa-list mr-2"></i> Back to Product</a> </div>
					</div>
					<!-- form start -->
					<form wire:submit.prevent="addProduct" class="form-horzontal form-material">
						<div class="card-body">
							<div class="form-group mb-4">
								<label for="name">Name</label>
								<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
									placeholder="Enter product" wire:model="name">
								@error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
                            <div class="form-group mb-4" wire:ignore>
								<label for="short_description">Short Description</label>
								<textarea type="text" class="form-control @error('short_description') is-invalid @enderror" id="short_description" name="short_description"
									placeholder="Enter Short Description" wire:model="short_description"></textarea>
								@error('short_description')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
                            <div class="form-group mb-4">
								<label for="regulary_price">Regulary Price</label>
								<input type="decimal" class="form-control @error('regulary_price') is-invalid @enderror" id="regulary_price" name="regulary_price"
									placeholder="Enter Regulary Price" wire:model="regulary_price">
								@error('regulary_price')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
                            <div class="form-group mb-4">
								<label for="sale_price">Sale Price</label>
								<input type="decimal" class="form-control @error('sale_price') is-invalid @enderror" id="sale_price" name="sale_price"
									placeholder="Enter Sale Price" wire:model="sale_price">
								@error('sale_price')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
                            <div class="form-group mb-4">
                                <label for="category_id">Select Category</label>
                                <div class="border-bottom">
                                    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" wire:model="category_id" wire:ignore>
                                        <option value="">Select Country</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="stock_status">Select stock_status</label>
                                <div class="border-bottom">
                                    <select class="form-select @error('stock_status') is-invalid @enderror" id="stock_status" name="stock_status" wire:model="stock_status" wire:ignore>
                                        <option value="instock">Instock</option>
                                        <option value="outofstock">Out of stock</option>
                                    </select>
                                    @error('stock_status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
								<label for="quantity">Quantity</label>
								<input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity"
									placeholder="Enter Regulary Price" wire:model="quantity">
								@error('quantity')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
                            <div class="form-group mb-4">
                                <label class="control-label">Product Image</label>
                                    <input type="file" class="form-control mb-1" wire:model="image">
                                    @if ($image)
                                        <img src="{{ $image->temporaryUrl() }}" width="515" alt="">
                                    @endif
                                    @error('image') <p class="text-danger">{{ $message }}</p> @enderror
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

@push('scripts')
	<script>
	 $(function() {
	  tinymce.init({
	   selector: '#short_description',
	   setup: function(editor) {
	    editor.on('Change', function(e) {
	     tinyMCE.triggerSave();
	     var sd_data = $('#short_description').val();
	     @this.set('short_description', sd_data);
	    })
	   }
	  });
    });
    </script>
@endpush
