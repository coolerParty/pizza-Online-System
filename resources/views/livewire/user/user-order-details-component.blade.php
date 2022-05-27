<div class="content">
    <style>
        .content {
            margin: 0;
            padding: 10rem 5rem;
        }



        /* h_table table  Start */
        .h_table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 1.4rem;
        }

        .h_table td,
        .h_table th {
            border: 1px solid #ddd;
            padding: 8px;
            background-color: #fcfcfc;

        }

        .h_table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .carts tr:hover {
            background-color: #ddd;
        }

        .h_table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        .box-container-cart {
            margin: 10px auto;
        }

        .box-title {
            font-size: 2rem;
        }

        .flex-space-between {
            display: flex;
            justify-content: space-between;
        }

        /* history table  Start */
    </style>
    <!-- ============================================================= = -->
    <!-- Start ORDERED DETAILS Page Content -->
    <!--   ============================================================= = -->
    <div class="box-container-cart bg-gray-100 p-5">
        <h1 class="heading mt-7"> Order Details </h1>
        <div class="clearcart flex-space-between">
            <a href="{{ route('user.order') }}" class="btn btn-primary float-end m-1"><i
                class="fas fa-list mr-2"></i> Back to My Orders</a>
            @if ($order->status == 'ordered')
            <a href="#" class="btn btn-warning float-end m-1" wire:click.prevent="cancelOrder"><i
                    class="fas fa-ban mr-2"></i>
                Cancel Order</a>
            @endif
        </div>
        <table class="h_table">
            <tbody>
                <tr>
                    <td><strong>Order Id : </strong> {{ $order->id }}</td>
                    <td><strong>Order Date : </strong> {{ $order->created_at }}</td>
                    <td><strong>Status: </strong> {{ $order->status }}</td>
                    @if ($order->status == 'delivered')
                    <td><strong>Delivered Date: </strong> {{ $order->delivered_date }}</td>
                    @elseif ($order->status == 'canceled')
                    <td><strong>Cancelation Date: </strong> {{ $order->canceled_date }}</td>
                    @endif
                </tr>
            </tbody>
        </table>

        <!-- ============================================================= = -->
        <!-- End ORDERED DETAILS Page Content -->
        <!-- ============================================================= = -->
        <!-- ============================================================= = -->
        <!-- Start ORDERED ITEMS Page Content -->
        <!-- ============================================================= = -->

        <h1 class="box-title mt-7">Ordered Items</h1>
        <table class="h_table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderItems as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img class="rounded-full" src="{{ asset('assets/images/product') }}/{{ $item->product->image }}"
                            width="60px" alt=""></td>
                    <td>{{ $item->product->name }}</rd>
                    <td>${{ $item->product->regulary_price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td class="text-right">${{ number_format($item->product->regulary_price * $item->quantity, 2) }}</td>
                </tr>
                @endforeach
                <tr style="background: rgb(196, 196, 196);">
                    <td>Total:</rd>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-right">
                        ${{
                            number_format(
                                $orderItems->sum(function ($id) {
                                    return $id['price'] * $id['quantity'];
                                })
                            , 2)
                        }}
                    </td>
                </tr>
            </tbody>
        </table>
        <h1 class="box-title mt-4">Order Summary</h1>
        <table class="h_table">
            <tbody>
                <tr>
                    <td class="flex-space-between">
                        <span>Discount</span>
                        <strong>${{ number_format($order->discount, 2) }}</strong>
                    </td>
                </tr>
                <tr>
                    <td class="flex-space-between">
                        <span>Subtotal</span>
                        <strong>${{ number_format($order->subtotal, 2) }}</strong>
                    </td>
                </tr>
                <tr>
                    <td class="flex-space-between">
                        <span>Tax</span>
                        <strong>${{ number_format($order->tax, 2) }}</strong>
                    </td>
                </tr>
                <tr>
                    <td class="flex-space-between">
                        <span>Shipping</span>
                        <strong>Free Shipping</strong>
                    </td>
                </tr>
                <tr>
                    <td class="flex-space-between">
                        <span>Total (USD)</span>
                        <strong>${{ number_format($order->total, 2) }}</strong>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- ============================================================= = -->
        <!-- End ORDERED ITEMS Page Content -->
        <!-- ============================================================= = -->
        <!-- ============================================================= = -->
        <!-- Start Billing Details Page Content -->
        <!--   ============================================================= = -->
        <h1 class="box-title mt-7">Billing Details</h1>
        <table class="h_table">
            <tbody>
                <tr>
                    <td>
                        <strong>First Name :</strong>
                        <span>{{ $order->firstname }}</span>
                    </td>
                    <td>
                        <strong>Last Name :</strong>
                        <span>{{ $order->lastname }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Phone :</strong>
                        <span>{{ $order->mobile }}</span>
                    </td>
                    <td>
                        <strong>Email :</strong>
                        <span>{{ $order->email }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Line1 :</strong>
                        <span>{{ $order->line1 }}</span>
                    </td>
                    <td>
                        <strong>Line2 :</strong>
                        <span>{{ $order->line2 }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>City :</strong>
                        <span>{{ $order->city }}</span>
                    </td>
                    <td>
                        <strong>Provine :</strong>
                        <span>{{ $order->province }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Country :</strong>
                        <span>{{ $order->country }}</span>
                    </td>
                    <td>
                        <strong>Zipcode :</strong>
                        <span>{{ $order->zipcode }}</span>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- ============================================================= = -->
        <!-- End Billing Details Page Content -->
        <!-- ============================================================= = -->
        <!-- ============================================================= = -->
        <!-- Start Shipping Details Page Content -->
        <!-- ============================================================= = -->
        @if ($order->is_shipping_different)
        <h1 class="box-title mt-7">Shipping Details</h1>
        <table class="h_table">
            <thead>
            <tbody>
                <tr>
                    <td>
                        <strong>First Name :</strong>
                        {{ $order->shipping->firstname }}
                    </td>
                    <td>
                        <strong>Last Name :</strong>
                        {{ $order->shipping->firstname }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Phone :</strong>
                        {{ $order->shipping->mobile }}
                    </td>
                    <td>
                        <strong>Email :</strong>
                        {{ $order->shipping->email }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Line1 :</strong>
                        {{ $order->shipping->line1 }}
                    </td>
                    <td>
                        <strong>Line2 :</strong>
                        {{ $order->shipping->line2 }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>City :</strong>
                        {{ $order->shipping->city }}
                    </td>
                    <td>
                        <strong>Provine :</strong>
                        {{ $order->shipping->province }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Country :</strong>
                        {{ $order->shipping->country }}
                    </td>
                    <td>
                        <strong>Zipcode :</strong>
                        {{ $order->shipping->zipcode }}
                    </td>
                </tr>
            </tbody>
        </table>
        @endif
        <!-- ============================================================= = -->
        <!-- End Shipping Details Page Content -->
        <!-- ============================================================= = -->
        <!-- ============================================================= = -->
        <!-- Start Transaction Details Page Content -->
        <!--   ============================================================= = -->
        <h1 class="box-title mt-7">Transaction</h1>
        <table class="h_table">
            <thead>
                <tr>
                    <th>Transaction Mode</th>
                    <th>Status</th>
                    <th>Transaction Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order->transaction->mode }}</td>
                    <td>{{ $order->transaction->status }}</td>
                    <td>{{ $order->transaction->created_at }}</td>
                </tr>
            </tbody>

        </table>
        <!-- ============================================================= = -->
        <!-- End Transaction Details Page Content -->
        <!-- ============================================================= = -->
    </div>

</div>
