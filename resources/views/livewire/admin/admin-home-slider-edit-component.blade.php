<div class="page-wrapper">
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase">Home Slider</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="fw-normal">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.homeslider') }}" class="fw-normal ">Home
                                Slider</a></li>
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
                        <h5><i class="icon fas fa-check"></i> Slide Updated!</h5>{{ Session::get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            <h3 class="box-title">Slide Edit</h3>
                        </div>
                        <div class="col"><a href="{{ route('admin.homeslider') }}" class="btn btn-primary float-end"><i
                                    class="fas fa-list mr-2"></i> Back to Home Slider</a> </div>
                    </div>
                    <!-- form start -->
                    <form wire:submit.prevent="updateSlider" class="form-horzontal form-material">
                        <div class="card-body">
                            <div class="form-group mb-4">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                    name="title" placeholder="Enter title" wire:model="title">
                                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="subtitle">subtitle</label>
                                <input type="text" class="form-control @error('subtitle') is-invalid @enderror"
                                    id="subtitle" name="subtitle" placeholder="Enter subtitle" wire:model="subtitle">
                                @error('subtitle')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group mb-4" wire:ignore>
                                <label for="short_description">Short Description</label>
                                <textarea type="text"
                                    class="form-control @error('short_description') is-invalid @enderror"
                                    id="short_description" name="short_description"
                                    placeholder="Enter Short Description" wire:model="short_description"></textarea>
                                @error('short_description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="product_id">Select Product</label>
                                <div class="border-bottom">
                                    <select class="form-select @error('product_id') is-invalid @enderror"
                                        id="product_id" name="product_id" wire:model="product_id" wire:ignore>
                                        <option value="">Select Country</option>
                                        @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('product_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="control-label">Slide Image</label>
                                <input type="file" class="form-control mb-1" wire:model="newimage">
                                @if ($newimage)
                                <img src="{{ $newimage->temporaryUrl() }}" width="515" alt="">
                                @elseif($image)
                                <img src="{{ asset('assets/images/slider') }}/{{ $image }}" width="515" alt="">
                                @endif
                                @error('newimage') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="status">Status</label>
                                <div class="border-bottom">
                                    <select class="form-select @error('status') is-invalid @enderror" id="status"
                                        name="status" wire:model="status" wire:ignore>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                    @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-plus-circle mr-2"></i>
                            Submit</button>
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
