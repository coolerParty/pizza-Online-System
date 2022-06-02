<div class="page-wrapper">
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase">About</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="fw-normal">Home</a>
                        </li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.about') }}"
                                class="fw-normal ">About</a></li>
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
                        <h5><i class="icon fas fa-check"></i> About Update!</h5>{{ Session::get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            <h3 class="box-title">About</h3>
                        </div>
                    </div>
                    <!-- form start -->
                    <form wire:submit.prevent="update" class="form-horzontal form-material">
                        <div class="card-body">
                            <div class="form-group mb-4">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                    name="title" placeholder="Enter title" wire:model="title">
                                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group mb-4" wire:ignore>
                                <label for="body">Description</label>
                                <textarea type="text" class="form-control @error('body') is-invalid @enderror" id="body"
                                    name="body" placeholder="Enter body" wire:model="body"></textarea>
                                @error('body')<div class="invalid-feedback">{{ $message }}</div>@enderror
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

@push('scripts')
<script>
    $(function () {
        tinymce.init({
            selector: '#body',
            setup: function (editor) {
                editor.on('Change', function (e) {
                    tinyMCE.triggerSave();
                    var sd_data = $('#body').val();
                    @this.set('body', sd_data);
                })
            }
        });
    });
</script>
@endpush
