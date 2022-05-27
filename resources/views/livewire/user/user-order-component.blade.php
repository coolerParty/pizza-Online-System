<div>
    <style>
        .content {
            margin: 0;
            padding: 10rem 5rem;
        }

        /* history table  Start */
        .history {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 1.4rem;
        }

        .history td,
        .history th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .history tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* .carts tr:hover {
            background-color: #ddd;
        } */

        .history th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        /* history table  Start */
        .wish-product {
            background: rgb(39, 174, 96) !important;
            color: white !important;
        }

        .green-wish-box {
            border: 1px solid rgb(39, 174, 96) !important;
        }
    </style>
    <!-- dishes section starts  -->
    <section class="dishes" id="dishes" style="margin: 100px auto; background: #fff!important;">
        <h1 class="heading"> Current Orders </h1>
        <div class="box-container-cart mb-5">
            @if($orders->count() > 0)
            <table class="history">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Discount</th>
                        <th>SubTotal</th>
                        <th>Tax</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Order Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }} </td>
                        <td>{{ $order->firstname }} {{ $order->lastname }}</td>
                        <td>{{ $order->email }} </td>
                        <td>${{ number_format($order->discount, 2) }} </td>
                        <td>${{ number_format($order->subtotal, 2) }} </td>
                        <td>${{ number_format($order->tax, 2) }} </td>
                        <td>${{ number_format($order->total, 2) }} </td>
                        <td class="text-center text-white">
                            @if( $order->status == 'ordered')
                            <span class="bg-blue-600 py-2 px-4  rounded-full">{{ $order->status }}</span>
                            @elseif( $order->status == 'canceled')
                            <span class="bg-gray-600 py-2 px-4 rounded-full">{{ $order->status }}</span>
                            @elseif( $order->status == 'delivered')
                            <span class="bg-green-800 py-2 px-4  rounded-full">{{ $order->status }}</span>
                            @endif

                        </td>
                        <td>{{ $order->created_at }} </td>
                        <td><a href="{{ route('user.orderdetail',['order_id'=>$order->id]) }}"
                                class="btn btn-info btn-sm">Details</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <table class="history">
                <tbody>
                    <tr>
                        <td class="text-center">
                            <h1 class="sub-heading"><strong>You have no current order!!</strong></h1>
                            <p>Add Dishes to it now</p>
                            <a href="{{ route('menu.index') }}" class="btn btn-success">Shop Now!</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            @endif
        </div>
        <h1 class="heading"> Orders History </h1>
        <div class="box-container-cart">
            @if($prevOrders->count() > 0)
            <table class="history">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Discount</th>
                        <th>SubTotal</th>
                        <th>Tax</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Order Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prevOrders as $prevOrder)
                    <tr>
                        <td>{{ $prevOrder->id }} </td>
                        <td>{{ $prevOrder->firstname }} {{ $prevOrder->lastname }}</td>
                        <td>{{ $prevOrder->email }} </td>
                        <td>${{ number_format($prevOrder->discount, 2) }} </td>
                        <td>${{ number_format($prevOrder->subtotal, 2) }} </td>
                        <td>${{ number_format($prevOrder->tax, 2) }} </td>
                        <td>${{ number_format($prevOrder->total, 2) }} </td>
                        <td class="text-center text-white">
                            @if( $prevOrder->status == 'ordered')
                            <span class="bg-blue-600 py-2 px-4  rounded-full">{{ $prevOrder->status }}</span>
                            @elseif( $prevOrder->status == 'canceled')
                            <span class="bg-gray-600 py-2 px-4 rounded-full">{{ $prevOrder->status }}</span>
                            @elseif( $prevOrder->status == 'delivered')
                            <span class="bg-green-800 py-2 px-4  rounded-full">{{ $prevOrder->status }}</span>
                            @endif

                        </td>
                        <td>{{ $prevOrder->created_at }} </td>
                        <td><a href="{{ route('user.orderdetail',['order_id'=>$prevOrder->id]) }}"
                                class="btn btn-info btn-sm">Details</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-4">{!! $prevOrders->links() !!}</div>
            @else
            <table class="history">
                <tbody>
                    <tr>
                        <td class="text-center">
                            <h1 class="sub-heading"><strong>You have no previous order!!</strong></h1>
                            <p>Add Dishes to it now</p>
                            <a href="{{ route('menu.index') }}" class="btn btn-success">Shop Now!</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            @endif
        </div>
    </section>
    <!-- dishes section ends -->
</div>
