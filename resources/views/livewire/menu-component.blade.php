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
			@foreach ($products as $product)
				<div class="box @if($witems->contains($product->id)) green-wish-box @endif">
					@if ($witems->contains($product->id))
						<a href="#" class="fas fa-heart wish-product" wire:click.prevent="removeFromWishlist({{ $product->id }})"></a>
					@else
						<a href="#" class="fas fa-heart"
							wire:click.prevent="addToWishlist({{ $product->id }}, '{{ $product->name }}',{{ $product->regulary_price }})"></a>
					@endif
					<a href="#" class="fas fa-eye"></a>
					<img src="{{ asset('assets/images/product') }}/{{ $product->image }}" alt="">
					<h3>{{ $product->name }}</h3>
					<div class="stars">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star-half-alt"></i>
					</div>
					<span>${{ $product->regulary_price }}</span>
					<a href="#" class="btn"
						wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}',{{ $product->regulary_price }})">add
						to
						cart</a>
				</div>
			@endforeach
		</div>
	</section>
	<!-- dishes section ends -->
</div>
