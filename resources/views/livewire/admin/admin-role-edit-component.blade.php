<div class="page-wrapper">
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase">Role</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="fw-normal">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.role') }}" class="fw-normal ">Role</a></li>
                        <li class="breadcrumb-item active"><a href="#"
                                class="fw-normal ">Edit</a></li>
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
                        <h5><i class="icon fas fa-check"></i> Role Added!</h5>{{ Session::get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            <h3 class="box-title">Role Edit</h3>
                        </div>
                        <div class="col"><a href="{{ route('admin.role') }}" class="btn btn-primary float-end"><i
                                    class="fas fa-list mr-2"></i> Back to Role</a> </div>
                    </div>
                    <!-- form start -->
                    <form wire:submit.prevent="addRole" class="form-horzontal form-material">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" placeholder="Enter Category" wire:model="name">
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                @error('selected_permissions')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <div class="py-4"><strong>Permission:</strong></div>
                                <div class="grid gap-1 md:grid-cols-4">
                                    @foreach($permissions as $key => $value)
                                    <div class="px-2 py-1 rounded border border-gray-400 bg-slate-100 hover:bg-slate-400">
                                        <label><input type='checkbox' value='{{ $value->name }}' name='selected_permissions[]'
                                                class='{{ $value->name }} rounded border-gray-300 text-indigo-600  shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-indigo-300  hover:bg-indigo-900'  wire:model='selected_permissions.{{ $key }}' {{ in_array($value->id , $selected_permissions) ? 'checked' : '' }}>
                                            {{ $value->name }}
                                        </label>
                                    </div>
                                    @endforeach

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
