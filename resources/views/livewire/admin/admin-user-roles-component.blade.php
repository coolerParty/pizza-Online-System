<!-- Content Wrapper. Contains page content -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase">User Settings</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="fw-normal">Home</a>
                        </li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.role') }}"
                                class="fw-normal ">User Settings</a>
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
                        <h5><i class="icon fas fa-check"></i> User Settings Added!</h5>{{ Session::get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (Session::has('del_message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h5><i class="icon fas fa-check"></i> User Settings Deleted!</h5>{{ Session::get('del_message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (Session::has('up_message'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <h5><i class="icon fas fa-check"></i> User Settings Updated!</h5>{{ Session::get('up_message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            <h3 class="box-title">User Settings</h3>
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
                                    <th class="border-top-0">Email</th>
                                    <th class="border-top-0">Roles</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <div class="flex flex-wrap gap-1">
                                            @foreach($user->roles as $role)
                                            <div class="px-3 py-1 rounded space-x-1 bg-indigo-500 text-white"> {{
                                                $role->name }}</div>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>
                                        @can('role-edit')
                                        <a href="{{ route('admin.edituserrole', ['user_id' => $user->id]) }}"
                                            class="btn btn-primary btn-sm text-light"><i class="fas fa-edit mr-2"></i>
                                            Edit</a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="p-1">
                            {{ $users->links() }}
                        </div>
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
