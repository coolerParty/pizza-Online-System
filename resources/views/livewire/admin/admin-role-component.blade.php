<!-- Content Wrapper. Contains page content -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
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
                        <li class="breadcrumb-item active"><a href="{{ route('admin.role') }}"
                                class="fw-normal ">Role</a>
                        </li>
                    </ol>
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
                        <h5><i class="icon fas fa-check"></i> Permission Added!</h5>{{ Session::get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (Session::has('del_message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h5><i class="icon fas fa-check"></i> Permission Deleted!</h5>{{ Session::get('del_message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (Session::has('up_message'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <h5><i class="icon fas fa-check"></i> Permission Updated!</h5>{{ Session::get('up_message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            <h3 class="box-title">Role</h3>
                        </div>
                        <div class="col"><a href="{{ route('admin.addrole') }}" class="btn btn-success float-end"><i
                                    class="fas fa-plus-circle mr-2"></i> Add
                                New</a> </div>

                    </div>

                    <div class="table-responsive">

                        <table class="table text-nowrap table-hover">
                            <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Name</th>
                                    <th class="border-top-0">Permissions</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <div class="flex flex-wrap gap-1">
                                            @foreach($rolePermissions as $permission)
                                            @if($role->id == $permission->rid)
                                            <div class="px-3 py-1 rounded space-x-1 bg-indigo-500 text-white"> {{
                                                $permission->pname }}</div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>
                                        @can('role-edit')
                                        <a href="{{ route('admin.editrole', ['role_id' => $role->id]) }}"
                                            class="btn btn-primary btn-sm text-light"><i class="fas fa-edit mr-2"></i>
                                            Edit</a>
                                        @endcan
                                        @can('role-delete')
                                        <a href="#" class="btn btn-danger btn-sm text-light"
                                            onclick="confirm('Are you sure, You want to delete this role?') || event.stopImmediatePropagation()"
                                            wire:click.prevent="deleteRole({{ $role->id }})"><i
                                                class="fas fa-trash mr-2"></i> Delete</a>
                                        @endcan
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
