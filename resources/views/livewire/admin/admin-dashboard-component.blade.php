<!-- Content Wrapper. Contains page content -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}"
                                class="fw-normal">Dashboard</a></li>
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
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Three charts -->
        <!-- ============================================================== -->
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Total Order</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li>
                            <div id="sparklinedash"><canvas width="67" height="30"
                                    style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </li>
                        <li class="ms-auto"><span class="counter text-success">{{ $orderTotal }}</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Total Delivered</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li>
                            <div id="sparklinedash2"><canvas width="67" height="30"
                                    style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </li>
                        <li class="ms-auto">
                            <span class="counter text-purple">
                                @if($orderTotal <> 0)
                                    {{ number_format(($orderDelivered/$orderTotal)*100,0) }}%
                                @endif
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Total Users</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li>
                            <div id="sparklinedash3"><canvas width="67" height="30"
                                    style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </li>
                        <li class="ms-auto"><span class="counter text-info">{{ $userTotal }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- PRODUCTS YEARLY SALES -->
        <!-- ============================================================== -->
        <!-- <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">Products Yearly Sales</h3>
                    <div class="d-md-flex">
                        <ul class="list-inline d-flex ms-auto">
                            <li class="ps-3">
                                <h5><i class="fa fa-circle me-1 text-info"></i>Mac</h5>
                            </li>
                            <li class="ps-3">
                                <h5><i class="fa fa-circle me-1 text-inverse"></i>Windows</h5>
                            </li>
                        </ul>
                    </div>
                    <div id="ct-visits" style="height: 405px;">
                        <div class="chartist-tooltip" style="top: -17px; left: -12px;"><span
                                class="chartist-tooltip-value">6</span>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- ============================================================== -->
        <!-- RECENT Orders -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <div class="d-md-flex mb-3">
                        <h3 class="box-title mb-0">Recent Orders</h3>
                        <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                            <select class="form-select shadow-none row border-top">
                                <option>March 2021</option>
                                <option>April 2021</option>
                                <option>May 2021</option>
                                <option>June 2021</option>
                                <option>July 2021</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table no-wrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Name</th>
                                    <th class="border-top-0">Date</th>
                                    <th class="border-top-0">Price</th>
                                    <th class="border-top-0">Status</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentOrders as $recentOrder)
                                <tr>
                                    <td>{{ $recentOrder->id }}</td>
                                    <td class="txt-oflo">{{ $recentOrder->user->name }}</td>
                                    <td class="txt-oflo">{{ Carbon\Carbon::parse($recentOrder->created_at)->format('d F Y g:i A') }}</td>
                                    <td><span>${{ $recentOrder->total }}</span></td>
                                    <td class="text-gray-200">
                                        @if( $recentOrder->status == 'ordered')
                                            <span class="btn btn-primary btn-sm">Ordered</span>
                                        @elseif( $recentOrder->status == 'canceled')
                                            <span class="btn btn-danger btn-sm">Canceled</span>
                                        @elseif( $recentOrder->status == 'delivered')
                                            <span class="btn btn-success btn-sm">Delivered</span>
                                        @endif
                                    </td>
                                    <td><a href="{{ route('admin.orderdetail', ['order_id' => $recentOrder->id]) }}"
                                        class="btn btn-info btn-sm">Details</a></td>
                                </tr>
                                @empty
                                <tr>
                                    <td></td>
                                    <td class="txt-oflo">No Recent Orders</td>
                                    <td></td>
                                    <td class="txt-oflo"></td>
                                    <td><span class="text-info"></span></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Product STocks -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <div class="d-md-flex mb-3">
                        <h3 class="box-title mb-0">Product Stocks</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table no-wrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Id</th>
                                    <th class="border-top-0">Name</th>
                                    <th class="border-top-0">Price</th>
                                    <th class="border-top-0">Quantity</th>
                                    <th class="border-top-0">Status</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($productStocks as $productStock)
                                <tr>
                                    <td>{{ $productStock->id }}</td>
                                    <td class="txt-oflo">{{ $productStock->name }}</td>
                                    <td><span>${{ $productStock->regulary_price }}</span></td>
                                    <td class="txt-oflo font-bold text-white">
                                        @if($productStock->quantity == 0)
                                            <span class="bg-red-500 py-2 px-3">{{ $productStock->quantity }}</span>
                                        @elseif($productStock->quantity <= 10)
                                            <span  class="bg-orange-500  py-2 px-3">{{ $productStock->quantity }}</span>
                                        @else
                                            <span class="bg-lime-500  py-2 px-3">{{ $productStock->quantity }}</span>
                                        @endif
                                    </td>
                                    <td class="text-gray-200">
                                        @if( $productStock->stock_status == 'instock')
                                            <span class="btn btn-success btn-sm">instock</span>
                                        @else
                                            <span class="btn btn-secondary btn-sm">out of stock</span>
                                        @endif
                                    </td>
                                    <td><a href="{{ route('admin.orderdetail', ['order_id' => $productStock->id]) }}"
                                        class="btn btn-info btn-sm">Details</a></td>
                                </tr>
                                @empty
                                <tr>
                                    <td></td>
                                    <td class="txt-oflo">No products out of stock</td>
                                    <td></td>
                                    <td class="txt-oflo"></td>
                                    <td><span class="text-info"></span></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Recent Comments -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- .col -->
            <div class="col-md-12 col-lg-8 col-sm-12">
                <div class="card white-box p-0">
                    <div class="card-body">
                        <h3 class="box-title mb-0">Recent Reviews</h3>
                    </div>
                    <div class="comment-widgets">
                        <!-- Comment Row -->
                        @forelse($recentReviews as $recentReview)
                        <div class="d-flex flex-row comment-row p-3 mt-0">
                            <div class="p-2">
                                    @if($recentReview->orderItem->order->user->profile->image)
                                    <img src="{{ asset('assets/images/profile/cover') }}/{{ $recentReview->orderItem->order->user->profile->image }}" alt="user" width="50"
                                    class="rounded-circle">
                                    @else
                                    <img src="{{ asset('images/pic-1.png') }}" alt="user" width="50"
                                    class="rounded-circle">
                                    @endif

                                </div>
                            <div class="comment-text ps-2 ps-md-3 w-100">
                                <h5 class="font-medium">{{ $recentReview->orderItem->order->user->name }}</h5>
                                <span class="mb-3 d-block">{{ $recentReview->comment }}</span>
                                <div class="comment-footer d-md-flex align-items-center">
                                    <span class="badge rounded"><div class="flex items-center">
                                        @for($i=1;$i<=5;$i++)
                                            @if($i<=$recentReview->rating)
                                            <svg class="text-primary h-4 w-4 flex-shrink-0"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            @else
                                            <svg class="text-gray-200 h-4 w-4 flex-shrink-0"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            @endif
                                        @endfor
                                    </div>
                                </span>

                                    <div class="text-muted fs-2 ms-auto mt-2 mt-md-0">{{ Carbon\Carbon::parse($recentReview->created_at)->format('d F Y g:i A') }}</div>
                                </div>
                            </div>
                        </div>
                        @empty
                            <div class="d-flex flex-row comment-row p-3 mt-0">
                                <div class="comment-text ps-2 ps-md-3 w-100">
                                    <h5 class="font-medium">No Recent Reviews</h5>
                                </div>
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card white-box p-0">
                    <div class="card-heading">
                        <h3 class="box-title mb-0">Chat Listing</h3>
                    </div>
                    <div class="card-body">
                        <ul class="chatonline">
                            <li>
                                <div class="call-chat">
                                    <button class="btn btn-success text-white btn-circle btn" type="button">
                                        <i class="fas fa-phone"></i>
                                    </button>
                                    <button class="btn btn-info btn-circle btn" type="button">
                                        <i class="far fa-comments text-white"></i>
                                    </button>
                                </div>
                                <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                        src="plugins/images/users/varun.jpg" alt="user-img" class="img-circle">
                                    <div class="ms-2">
                                        <span class="text-dark">Varun Dhavan <small
                                                class="d-block text-success d-block">online</small></span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="call-chat">
                                    <button class="btn btn-success text-white btn-circle btn" type="button">
                                        <i class="fas fa-phone"></i>
                                    </button>
                                    <button class="btn btn-info btn-circle btn" type="button">
                                        <i class="far fa-comments text-white"></i>
                                    </button>
                                </div>
                                <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                        src="plugins/images/users/genu.jpg" alt="user-img" class="img-circle">
                                    <div class="ms-2">
                                        <span class="text-dark">Genelia
                                            Deshmukh <small class="d-block text-warning">Away</small></span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="call-chat">
                                    <button class="btn btn-success text-white btn-circle btn" type="button">
                                        <i class="fas fa-phone"></i>
                                    </button>
                                    <button class="btn btn-info btn-circle btn" type="button">
                                        <i class="far fa-comments text-white"></i>
                                    </button>
                                </div>
                                <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                        src="plugins/images/users/ritesh.jpg" alt="user-img" class="img-circle">
                                    <div class="ms-2">
                                        <span class="text-dark">Ritesh
                                            Deshmukh <small class="d-block text-danger">Busy</small></span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="call-chat">
                                    <button class="btn btn-success text-white btn-circle btn" type="button">
                                        <i class="fas fa-phone"></i>
                                    </button>
                                    <button class="btn btn-info btn-circle btn" type="button">
                                        <i class="far fa-comments text-white"></i>
                                    </button>
                                </div>
                                <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                        src="plugins/images/users/arijit.jpg" alt="user-img" class="img-circle">
                                    <div class="ms-2">
                                        <span class="text-dark">Arijit
                                            Sinh <small class="d-block text-muted">Offline</small></span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="call-chat">
                                    <button class="btn btn-success text-white btn-circle btn" type="button">
                                        <i class="fas fa-phone"></i>
                                    </button>
                                    <button class="btn btn-info btn-circle btn" type="button">
                                        <i class="far fa-comments text-white"></i>
                                    </button>
                                </div>
                                <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                        src="plugins/images/users/govinda.jpg" alt="user-img" class="img-circle">
                                    <div class="ms-2">
                                        <span class="text-dark">Govinda
                                            Star <small class="d-block text-success">online</small></span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="call-chat">
                                    <button class="btn btn-success text-white btn-circle btn" type="button">
                                        <i class="fas fa-phone"></i>
                                    </button>
                                    <button class="btn btn-info btn-circle btn" type="button">
                                        <i class="far fa-comments text-white"></i>
                                    </button>
                                </div>
                                <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                        src="plugins/images/users/hritik.jpg" alt="user-img" class="img-circle">
                                    <div class="ms-2">
                                        <span class="text-dark">John
                                            Abraham<small class="d-block text-success">online</small></span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- /.content-wrapper -->
