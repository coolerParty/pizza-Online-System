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
	<section class="dishes" id="dishes" style="margin: 100px auto; background: #fff!important;">
		<h3 class="sub-heading"> our dishes </h3>
        @if (Session::has('cart_message'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<h1 class="sub-heading"><i class="icon fas fa-check"></i> {{ Session::get('cart_message') }}</h1>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		@endif
        @foreach($categories as $category)
		<h1 class="heading"> {{ $category->name }} </h1>

		<div class="box-container mb-20">
			@foreach ($products as $product)
                @if($product->category_id == $category->id)
				<div class="box @if($witems->contains($product->id)) green-wish-box @endif md:max-w-xl lg:max-w-md mx-auto">
					@if ($witems->contains($product->id))
						<a href="#" class="fas fa-heart wish-product" wire:click.prevent="removeFromWishlist({{ $product->id }})"></a>
					@else
						<a href="#" class="fas fa-heart"
							wire:click.prevent="addToWishlist({{ $product->id }}, '{{ $product->name }}',{{ $product->regulary_price }})"></a>
					@endif
					<a href="{{ route('menu.details',['product_id'=>$product->id,'slug'=>$product->slug]) }}" class="fas fa-eye"></a>
					<img src="{{ asset('assets/images/product') }}/{{ $product->image }}" alt="" style="width: 100%;">
					<h3>{{ $product->name }}</h3>
					<div class="stars" style="font-size: 1.6rem!important;">
                        <style>
                            .color-gray{
                                color:rgb(173, 173, 173)!important;
                            }

                        </style>
                        @php
                            $avgrating = 0;
                            $totalReview = 0;
                            $totalReview = $product->orderItems->where('rstatus',1)->count();
                        @endphp
                        @foreach($product->orderItems->where('rstatus',1) as $orderItem)
                            @php
                                $avgrating = $avgrating + $orderItem->review->rating;
                            @endphp
                        @endforeach
                        @for($i=1;$i<=5;$i++)
                            @if($totalReview <> 0 && $i<=($avgrating/$totalReview))
                            <i class="fas fa-star"></i>
                            @else
                            <i class="fas fa-star color-gray"></i>
                            @endif
                        @endfor
                        <!-- <i class="fas fa-star-half-alt"></i> -->
                    </div>
					<span>${{ number_format($product->regulary_price, 2) }}</span>
					<a href="#" class="btn"
						wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}',{{ $product->regulary_price }})">add
						to
						cart</a>
				</div>
                @endif
			@endforeach
		</div>
        @endforeach
	</section>
	<!-- dishes section ends -->
</div>
