<!-- Content Wrapper. Contains page content -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
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
                        <li class="breadcrumb-item active"><a href="{{ route('admin.homeslider') }}"
                                class="fw-normal ">Home Slider</a>
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
                        <h5><i class="icon fas fa-check"></i> Slider Added!</h5>{{ Session::get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (Session::has('del_message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h5><i class="icon fas fa-check"></i> Slider Deleted!</h5>{{ Session::get('del_message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (Session::has('up_message'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <h5><i class="icon fas fa-check"></i> Slider Updated!</h5>{{ Session::get('up_message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            <h3 class="box-title">Home Slider</h3>
                        </div>
                        <div class="col"><a href="{{ route('admin.addhomeslider') }}"
                                class="btn btn-success float-end"><i class="fas fa-plus-circle mr-2"></i> Add
                                Slide</a> </div>

                    </div>

                    {{-- <p class="text-muted">Add class <code>.table</code></p> --}}

                    <div class="table-responsive">

                        <table class="table text-nowrap table-hover">
                            <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Image</th>
                                    <th class="border-top-0">Title</th>
                                    <th class="border-top-0">subtitle</th>
                                    <th class="border-top-0">Short Description</th>
                                    <th class="border-top-0">Product</th>
                                    <th class="border-top-0">Status</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img class="round"
                                            src="{{ asset('assets/images/slider') }}/{{ $slider->image }}" width="120"
                                            alt=""></td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->subtitle }}</td>
                                    <td>{{ $slider->short_description }}</td>
                                    <td>{{ $slider->product->name }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-success btn-sm dropdown-toggle" type="button"
                                                id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                @if($slider->status == false)
                                                No
                                                @else
                                                Yes
                                                @endif
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                @if($slider->status == false)
                                                <li><a class="dropdown-item" href="#"
                                                        wire:click.prevent="updateStatus({{ $slider->id }},'1')">Yes</a>
                                                </li>
                                                @else
                                                <li><a class="dropdown-item" href="#"
                                                        wire:click.prevent="updateStatus({{ $slider->id }},'0')">No</a>
                                                </li>
                                                @endif
                                            </ul>

                                        </div>
                                    </td>
                                    <td>{{ Carbon\Carbon::parse($slider->created_at)->format('m/d/Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.edithomeslider', ['homeslider_id' => $slider->id]) }}"
                                            class="btn btn-primary btn-sm text-light"><i class="fas fa-edit mr-2"></i>
                                            Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm text-light"
                                            onclick="confirm('Are you sure, You want to delete this slider?') || event.stopImmediatePropagation()"
                                            wire:click.prevent="deleteSlider({{ $slider->id }})"><i
                                                class="fas fa-trash mr-2"></i> Delete</a>
                                    </td>
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
