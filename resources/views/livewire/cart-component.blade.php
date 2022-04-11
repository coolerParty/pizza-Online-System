<div class="content">
	<style>
		.content {
			margin: 0;
			padding: 10rem 5rem;
		}

		.box-container-cart {
			margin: 10px auto;
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
			<ul class="products-cart">
				@foreach (Cart::instance('cart')->content() as $item)
					<li class="pr-cart-item">
						<div class="img-product">
							<div class="product-image">
								<figure><img src="{{ asset('assets/images/product') }}/{{ $item->model->image }}" width="100" alt="">
								</figure>
							</div>
							<div class="product-name">
								<a class="link-to-product" href="#">{{ $item->model->name }}</a>
							</div>
						</div>
						<div class="det-product">
							<div class="price-field product-price">
								<p class="price">${{ $item->model->regulary_price }}</p>
							</div>
							<div class="inputBox">
								<div class="input">
									<input type="text" name="product-quantity" class="quantity product-quantity" value="{{ $item->qty }}"
										data-max="120" pattern="[0-9]*">
									<a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')">-</a>
									<a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity('{{ $item->rowId }}')">+</a>
								</div>
							</div>
							<div class="price-field sub-total">
								<p class="price">${{ $item->subtotal }}</p>
							</div>
							<div class="input">
								<p class="text-center"><a href="#" class="btn"
										wire:click.prevent="switchToSaveForLater('{{ $item->rowId }}')">Save
										for later</a></p>
							</div>
							<div class="delete">
								<a href="#" wire:click.prevent="destroy('{{ $item->rowId }}')" class="btn btn-delete" title="">
									<span>remove</span>
									<i class="fa fa-times-circle" aria-hidden="true"></i>
								</a>
							</div>
						</div>
					</li>
				@endforeach
			</ul>
			<div class="clearcart">
				<a href="#" wire:click.prevent="destroyAll()" class="btn btn-delete" title="">
					<span>Clear Shopping Cart</span>
					<i class="fa fa-times-circle" aria-hidden="true"></i>
				</a>
			</div>
		</div>
		<div class="box-container-cart">
			<h1 class="box-title">Order Summary</h1>
			<ul class="products-cart">
				@if (!Session::has('coupon'))
					<li class="pr-cart-item">
						<div class="inputBox">
							<div class="input">
								<input class="frm-input " name="have-code" id="have-code" value="1" type="checkbox"
									wire:model="haveCouponCode">
								<label for="have-code">Enter your coupon code</label>
							</div>
						</div>
						@if ($haveCouponCode == 1)
							<div class="inputBox">
								<div class="input">
									<form wire:submit.prevent="applyCouponCode">
										@if (Session::has('coupon_message'))
											<div class="alert alert-danger" role="danger">{{ Session::get('coupon_message') }}</div>
										@endif
										<input type="text" placeholder="Enter your coupon code" name="couponCode" class="quantity coupon-input"
											wire:model="couponCode">
										<button type="submit" class="btn btn-small">Apply</button>
									</form>
								</div>
							</div>
						@endif
					</li>
				@endif
				<br>
				<li class="pr-cart-item">
					<div class="product-name">
						<p class="link-to-product">Subtotal</p>
					</div>
					<div class="price-field product-price">
						<p class="price">${{ Cart::instance('cart')->subtotal() }}</p>
					</div>
				</li>
				@if (Session::has('coupon'))
					<li class="pr-cart-item">
						<div class="product-name">
							<p class="link-to-product">Discount ({{ Session::get('coupon')['code'] }}) <a href="#"
									wire:click.prevent="removeCoupon"><i class="fa fa-times text-danger"></i></a></span><b class="index">
							</p>
						</div>
						<div class="price-field product-price">
							<p class="price">-${{ number_format($discount, 2) }}</p>
						</div>
					</li>
					<li class="pr-cart-item">
						<div class="product-name">
							<p class="link-to-product">Subtotal with Discount ({{ config('cart.tax') }}%) </span><b
									class="index"></p>
						</div>
						<div class="price-field product-price">
							<p class="price">${{ number_format($subtotalAfterDiscount, 2) }}</p>
						</div>
					</li>
					<li class="pr-cart-item">
						<div class="product-name">
							<p class="link-to-product">Tax ({{ config('cart.tax') }}%)</span><b class="index"></p>
						</div>
						<div class="price-field product-price">
							<p class="price">${{ number_format($taxAfterDiscount, 2) }}</p>
						</div>
					</li>
					<li class="pr-cart-item">
						<div class="product-name">
							<p class="link-to-product">Total</p>
						</div>
						<div class="price-field product-price">
							<p class="price">${{ number_format($totalAfterDiscount, 2) }}</p>
						</div>
					</li>
				@else
					<li class="pr-cart-item">
						<div class="product-name">
							<p class="link-to-product">Tax</p>
						</div>
						<div class="price-field product-price">
							<p class="price">${{ Cart::instance('cart')->tax() }}</p>
						</div>
					</li>
					<li class="pr-cart-item">
						<div class="product-name">
							<p class="link-to-product">Total</p>
						</div>
						<div class="price-field product-price">
							<p class="price">${{ Cart::instance('cart')->total() }}</p>
						</div>
					</li>
				@endif

			</ul>
			<div class="clearcart">
				<a class="btn btn-checkout" href="#" wire:click.prevent="checkout">Check out</a>
			</div>
		</div>
	@else
		<div class="box-container-cart">
			<h1>No Dishes from your cart!!</h1>
			<p>Add Dishes to it now</p>
			<a href="{{ route('menu.index') }}" class="btn btn-success">Shop Now!</a>
		</div>
	@endif
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
			<ul class="products-cart">
				@foreach (Cart::instance('saveForLater')->content() as $item)
					<li class="pr-cart-item">
						<div class="img-product">
							<div class="product-image">
								<figure><img src="{{ asset('assets/images/product') }}/{{ $item->model->image }}" width="100" alt="">
								</figure>
							</div>
							<div class="product-name">
								<a class="link-to-product" href="#">{{ $item->model->name }}</a>
							</div>
						</div>
						<div class="det-product">
							<div class="price-field product-price">
								<p class="price">${{ $item->model->regulary_price }}</p>
							</div>
							<div class="input">
								<p class="text-center"><a href="#" class="btn"
										wire:click.prevent="switchToCart('{{ $item->rowId }}')">Add To Cart</a></p>
							</div>
							<div class="delete">
								<a href="#" wire:click.prevent="destroySaveForLater('{{ $item->rowId }}')" class="btn btn-delete" title="">
									<span>remove</span>
									<i class="fa fa-times-circle" aria-hidden="true"></i>
								</a>
							</div>
						</div>
					</li>
				@endforeach
			</ul>
			<div class="clearcart">
				<a href="#" wire:click.prevent="destroyAllSavedForLater()" class="btn btn-delete" title="">
					<span>Clear Save For Later</span>
					<i class="fa fa-times-circle" aria-hidden="true"></i>
				</a>
			</div>
		@else
			<h1>No item from your save for later!</h1>
		@endif
	</div>
	{{-- Save for Later End --}}

</div>
