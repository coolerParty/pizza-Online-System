<div>
	<style>
		.wish-product {
			background: rgb(39, 174, 96) !important;
			color: white !important;
		}
		.green-wish-box{
			border: 1px solid rgb(39, 174, 96) !important;
		}

	</style>
	<!-- dishes section starts  -->
	<section class="dishes" id="dishes" style="margin: 100px auto;">
		<h3 class="sub-heading"> our dishes </h3>
		<h1 class="heading"> popular dishes </h1>
		@if (Session::has('cart_message'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<h1 class="sub-heading"><i class="icon fas fa-check"></i> {{ Session::get('cart_message') }}</h1>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		@endif
		<div class="box-container">
			@foreach (Cart::instance('wishlist')->content() as $witem)
				<div class="box green-wish-box">
						<a href="#" class="fas fa-heart wish-product" wire:click.prevent="removeFromWishlist({{ $witem->model->id }})"></a>
					<a href="#" class="fas fa-eye"></a>
					<img src="{{ asset('assets/images/product') }}/{{ $witem->model->image }}" alt="">
					<h3>{{ $witem->model->name }}</h3>
					<div class="stars">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star-half-alt"></i>
					</div>
					<span>${{ $witem->model->regulary_price }}</span>
					<a href="#" class="btn"
						wire:click.prevent="moveMenuFromWishlistToCart('{{ $witem->rowId }}')">add
						to
						cart</a>
				</div>
			@endforeach
		</div>
	</section>
	<!-- dishes section ends -->
</div>
