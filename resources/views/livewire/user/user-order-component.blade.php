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
        <h1 class="heading"> Orders History </h1>
        <div class="box-container-cart">
            <table class="history">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>SubTotal</th>
                        <th>Discount</th>
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
                        <td>${{ $order->subtotal }} </td>
                        <td>${{ $order->discount }} </td>
                        <td>${{ $order->tax }} </td>
                        <td>${{ $order->total }} </td>
                        <td>{{ $order->status }} </td>
                        <td>{{ $order->created_at }} </td>
                        <td><a href="{{ route('user.orderdetail',['order_id'=>$order->id]) }}"  class="btn btn-info btn-sm">Details</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="p-4">{!! $orders->links() !!}</div>

        </div>
    </section>
    <!-- dishes section ends -->
</div>
