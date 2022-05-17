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
        }

        .h_table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* .carts tr:hover {
            background-color: #ddd;
        } */

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
    <div class="box-container-cart">
        <h1 class="heading"> Order Details </h1>
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
                    <td><a href="{{ route('user.order') }}" class="btn btn-primary float-end m-1"><i
                                class="fas fa-list mr-2"></i> Back to My Orders</a>
                        @if ($order->status == 'ordered')
                        <a href="#" class="btn btn-warning float-end m-1" wire:click.prevent="cancelOrder"><i
                                class="fas fa-list mr-2"></i>
                            Cancel Order</a>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- ============================================================= = -->
        <!-- End ORDERED DETAILS Page Content -->
        <!-- ============================================================= = -->
        <!-- ============================================================= = -->
        <!-- Start ORDERED ITEMS Page Content -->
        <!-- ============================================================= = -->

        <h1 class="box-title mt-5">Ordered Items</h1>
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
                    <td><img class="round" src="{{ asset('assets/images/product') }}/{{ $item->product->image }}"
                            width="100" alt=""></rd>
                    <td>{{ $item->product->name }}</rd>
                    <td>${{ $item->product->regulary_price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ $item->product->regulary_price * $item->quantity }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h1 class="box-title mt-2">Order Summary</h1>
        <table class="h_table">
            <tbody>
                <tr>
                    <td class="flex-space-between">
                        <span>Subtotal</span>
                        <strong>${{ $order->subtotal }}</strong>
                    </td>
                </tr>
                <tr>
                    <td class="flex-space-between">
                        <span>Tax</span>
                        <strong>${{ $order->tax }}</strong>
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
                        <strong>${{ $order->total }}</strong>
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
        <h1 class="box-title mt-5">Billing Details</h1>
        <table class="h_table">
            <thead>
            <tbody>
                <tr>
                    <th>First Name</th>
                    <td>{{ $order->firstname }}</td>
                    <th>Last Name</th>
                    <td>{{ $order->firstname }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $order->mobile }}</td>
                    <th>Email</th>
                    <td>{{ $order->email }}</td>
                </tr>
                <tr>
                    <th>Line1</th>
                    <td>{{ $order->line1 }}</td>
                    <th>Line2</th>
                    <td>{{ $order->line2 }}</td>
                </tr>
                <tr>
                    <th>City</th>
                    <td>{{ $order->city }}</td>
                    <th>Provine</th>
                    <td>{{ $order->province }}</td>
                </tr>
                <tr>
                    <th>Country</th>
                    <td>{{ $order->country }}</td>
                    <th>c</th>
                    <td>{{ $order->zipcode }}</td>
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
        <h1 class="box-title mt-5">Shipping Details</h1>
        <table class="h_table">
            <thead>
            <tbody>
                <tr>
                    <th>First Name</th>
                    <td>{{ $order->shipping->firstname }}</td>
                    <th>Last Name</th>
                    <td>{{ $order->shipping->firstname }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $order->shipping->mobile }}</td>
                    <th>Email</th>
                    <td>{{ $order->shipping->email }}</td>
                </tr>
                <tr>
                    <th>Line1</th>
                    <td>{{ $order->shipping->line1 }}</td>
                    <th>Line2</th>
                    <td>{{ $order->shipping->line2 }}</td>
                </tr>
                <tr>
                    <th>City</th>
                    <td>{{ $order->shipping->city }}</td>
                    <th>Provine</th>
                    <td>{{ $order->shipping->province }}</td>
                </tr>
                <tr>
                    <th>Country</th>
                    <td>{{ $order->shipping->country }}</td>
                    <th>c</th>
                    <td>{{ $order->shipping->zipcode }}</td>
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
        <h1 class="box-title mt-5">Transaction</h1>
        <table class="h_table">
            <tr>
                <th>Transaction Mode</th>
                <td>{{ $order->transaction->mode }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $order->transaction->status }}</td>
            </tr>
            <tr>
                <th>Transactino Date</th>
                <td>{{ $order->transaction->created_at }}</td>
            </tr>
        </table>
        <!-- ============================================================= = -->
        <!-- End Transaction Details Page Content -->
        <!-- ============================================================= = -->
    </div>

</div>







