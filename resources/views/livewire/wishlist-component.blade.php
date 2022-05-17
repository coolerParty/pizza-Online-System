<div>
    <style>
        .content {
            margin: 0;
            padding: 10rem 5rem;
        }

        /* table  Start */
        .carts {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 2rem;
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

        /* table  Start */
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
        <h1 class="heading"> Wishlist </h1>
        <div class="box-container-cart">
            @if (Session::has('wishlist_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h1 class="sub-heading"><i class="icon fas fa-check"></i> {{ Session::get('wishlist_message') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <table class="carts">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse (Cart::instance('wishlist')->content() as $item)
                    <tr>
                        <td>
                            <figure class="flex justify-center">
                                <img src="{{ asset('assets/images/product') }}/{{ $item->model->image }}" width="100"
                                    alt="">
                            </figure>
                        </td>
                        <td>
                            <a class="text-center" href="#">{{ $item->model->name }}</a>
                        </td>
                        <td>
                            <p class="text-right">${{ number_format($item->model->regulary_price, 2) }}</p>
                        </td>
                        <td>
                            <div class="text-right">
                                <a href="#" class="btn"
                                    wire:click.prevent="moveMenuFromWishlistToCart('{{ $item->rowId }}')">add
                                    to
                                    cart</a>
                                <a href="#" wire:click.prevent="removeFromWishlist({{ $item->model->id }})"
                                    class="btn btn-delete" title="">
                                    <span>Remove</span>
                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td></td>
                        <td class="text-center">
                            <h1 class="sub-heading"><strong>No item on wishlist!</strong></h1>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            @if(Cart::instance('wishlist')->content()->count() > 0)
            <div class="clearcart text-right">
                <a href="#" wire:click.prevent="destroyAll()" class="btn btn-delete" title="">
                    <span>Clear Shopping Cart</span>
                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                </a>
            </div>
            @endif
        </div>
    </section>
    <!-- dishes section ends -->
</div>
