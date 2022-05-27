<div class="content">
    <style>
        .content {
            margin: 0;
            padding: 10rem 5rem;
        }

        /* carts table  Start */
        .carts {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 1.4rem;
        }

        .carts td,
        .carts th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .carts tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* .carts tr:hover {
            background-color: #ddd;
        } */

        .carts th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        /* carts table  Start */


        .box-container-cart {
            margin: 10px auto;
        }

        .flex-space-between {
            display: flex;
            justify-content: space-between;
        }

        .products-cart {
            margin-top: 40px;
        }

        .pr-cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .img-product,
        .det-product {
            display: flex;
            justify-content: space-evenly;
            column-gap: 10px;
        }

        .img-product {
            align-items: center;
        }

        .det-product {
            align-items: baseline;
        }

        .box-title,
        .product-name,
        .price-field,
        .quantity,
        .quantity-input {
            font-size: 2rem;
        }

        .product-quantity {
            padding: 4px;
            border: 1px solid #000;
            ratio: 5px;
            max-width: 70px;
        }

        .coupon-input {
            padding: 4px;
            border: 1px solid #000;
            ratio: 5px;
            max-width: 200px;
            font-size: 1.5rem;
        }

        .clearcart {
            display: flex;
            justify-content: flex-end;
        }
    </style>
    @if (Cart::instance('cart')->count() > 0)

    <div class="box-container-cart">
        @if (Session::has('cart_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h1 class="sub-heading"><i class="icon fas fa-check"></i> {{ Session::get('cart_message') }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <h1 class="box-title">Cart List</h1>
        <table class="carts">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach (Cart::instance('cart')->content() as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <figure class="flex justify-center">
                            <img class="rounded-full"
                                src="{{ asset('assets/images/product') }}/{{ $item->model->image }}" width="60" alt="">
                        </figure>
                    </td>
                    <td>
                        <a class="text-center" href="#">{{ $item->model->name }}</a>
                    </td>
                    <td>
                        <p class="text-right">${{ number_format($item->model->regulary_price, 2) }}</p>
                    </td>
                    <td>
                        <div class="inputBox text-center">
                            <div class="input">
                                <input type="text" name="product-quantity" class="quantity product-quantity"
                                    value="{{ $item->qty }}" data-max="120" pattern="[0-9]*">
                                <a class="btn btn-reduce" href="#"
                                    wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')">-</a>
                                <a class="btn btn-increase" href="#"
                                    wire:click.prevent="increaseQuantity('{{ $item->rowId }}')">+</a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-right">${{ number_format($item->subtotal,2) }}</p>
                    </td>
                    <td>
                        <div class="text-right">
                            <a href="#" class="btn" wire:click.prevent="switchToSaveForLater('{{ $item->rowId }}')">Save
                                for Later</a>
                            <a href="#" wire:click.prevent="destroy('{{ $item->rowId }}')" class="btn btn-delete"
                                title="">
                                <span>Remove</span>
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="clearcart">
            <a href="#" wire:click.prevent="destroyAll()" class="btn btn-delete" title="">
                <span>Clear Shopping Cart</span>
                <i class="fa fa-times-circle" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    {{-- Order Summart Start --}}
    <div class="box-container-cart">
        <h1 class="box-title">Order Summary</h1>
        <table class="carts">
            <tbody>
                @if (!Session::has('coupon'))
                <tr>
                    <td class="flex-space-between">
                        <div class="inputBox">
                            <div class="input">
                                <input class="frm-input " name="have-code" id="have-code" value="1" type="checkbox"
                                    wire:model="haveCouponCode">
                                <label for="have-code">Enter your coupon code</label>
                            </div>
                        </div>
                        @if ($haveCouponCode == 1)

                        <div class="inputBox text-right">
                            <div class="input">
                                <form wire:submit.prevent="applyCouponCode">
                                    @if (Session::has('coupon_message'))
                                    <div class="alert alert-danger" role="danger">{{ Session::get('coupon_message') }}
                                    </div>
                                    @endif
                                    <input type="text" placeholder="Enter your coupon code" name="couponCode"
                                        class="quantity coupon-input" wire:model="couponCode">
                                    <button type="submit" class="btn btn-checkout"
                                        style="background: #04AA6D;">Apply</button>
                                </form>
                            </div>
                        </div>

                        @endif
                    </td>
                </tr>
                @endif
                <tr>
                    <td class="flex-space-between">
                        <span>Subtotal</span>
                        <strong>${{ Cart::instance('cart')->subtotal() }}</strong>
                    </td>
                </tr>

                @if (Session::has('coupon'))

                <tr>
                    <td class="flex-space-between">
                        <span>Discount ({{ Session::get('coupon')['code'] }})
                            <a href="#" wire:click.prevent="removeCoupon">
                                <i class="fa fa-times text-danger"></i>
                            </a>
                        </span>
                        <strong>-${{ number_format($discount, 2) }}</strong>
                    </td>
                </tr>
                <tr>
                    <td class="flex-space-between">
                        <span>Subtotal with Discount ({{ config('cart.tax') }}%)</span>
                        <strong>${{ number_format($subtotalAfterDiscount, 2) }}</strong>
                    </td>
                </tr>
                <tr>
                    <td class="flex-space-between">
                        <span>Tax ({{ config('cart.tax') }}%)</span>
                        <strong>${{ number_format($taxAfterDiscount, 2) }}</strong>
                    </td>
                </tr>
                <tr>
                    <td class="flex-space-between">
                        <span>Total</span>
                        <strong>${{ number_format($totalAfterDiscount, 2) }}</strong>
                    </td>
                </tr>

                @else

                <tr>
                    <td class="flex-space-between">
                        <span>Tax</span>
                        <strong>${{ Cart::instance('cart')->tax() }}</strong>
                    </td>
                </tr>
                <tr>
                    <td class="flex-space-between">
                        <span>Total</span>
                        <strong>${{ Cart::instance('cart')->total() }}</strong>
                    </td>
                </tr>

                @endif
            </tbody>
        </table>
        @if (Session::has('checkout_message'))
        <div class="clearcart">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h1 class="sub-heading" style="color:red;"><i class="icon fas fa-check"></i> {{ Session::get('checkout_message') }}</h1>
            </div>
        </div>
        @endif
        <div class="clearcart">
            <a class="btn btn-checkout" href="#" wire:click.prevent="checkout">Check out</a>
        </div>

    </div>
    @else
    <div class="box-container-cart">
        <table class="carts">
            <tbody>
                <tr>
                    <td class="text-center">
                        <h1 class="sub-heading"><strong>No Dishes from your cart!!</strong></h1>
                        <p>Add Dishes to it now</p>
                        <a href="{{ route('menu.index') }}" class="btn btn-success">Shop Now!</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif
    {{-- Order Summart End --}}
    {{-- Save for Later Start --}}
    <div class="box-container-cart" style="padding-top: 30px;">
        @if (Session::has('saveforlater_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h1 class="sub-heading"><i class="icon fas fa-check"></i> {{ Session::get('saveforlater_message') }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (Cart::instance('saveForLater')->count() > 0)
        <h1 class="box-title">{{ Cart::instance('saveForLater')->count() }} Item(s) Saved For Later</h1>
        <table class="carts">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach (Cart::instance('saveForLater')->content() as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <figure class="flex justify-center">
                            <img class="rounded-full"
                                src="{{ asset('assets/images/product') }}/{{ $item->model->image }}" width="60" alt="">
                        </figure>
                    </td>
                    <td>
                        <a class="link-to-product" href="#">{{ $item->model->name }}</a>
                    </td>
                    <td>
                        <p class="text-right">${{ number_format($item->model->regulary_price, 2) }}</p>
                    </td>
                    <td class="delete text-right">
                        <a href="#" class="btn" wire:click.prevent="switchToCart('{{ $item->rowId }}')">Add to Cart</a>
                        <a href="#" wire:click.prevent="destroySaveForLater('{{ $item->rowId }}')"
                            class="btn btn-delete" title="">
                            <span>Remove</span>
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="clearcart">
            <a href="#" wire:click.prevent="destroyAllSavedForLater()" class="btn btn-delete" title="">
                <span>Clear Save For Later</span>
                <i class="fa fa-times-circle" aria-hidden="true"></i>
            </a>
        </div>
        @elseif(Cart::instance('cart')->count() > 0)
        <table class="carts">
            <tbody>
                <tr>
                    <td class="text-center">
                        <h1 class="sub-heading"><strong>No item from your save for later!</strong></h1>
                    </td>
                </tr>
            </tbody>
        </table>
        @endif
    </div>
    {{-- Save for Later End --}}
    <div class="clearcart">
        <a class="btn btn-checkout" href="{{ route('user.order') }}">View Orders</a>
    </div>
</div>
