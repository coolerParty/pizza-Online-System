<div>
    <style>
        .wish-product {
            background: rgb(39, 174, 96) !important;
            color: white !important;
        }

        .green-wish-box {
            border: 1px solid rgb(39, 174, 96) !important;
        }
    </style>
    <!-- home section starts  -->

    @livewire('home-slider-component')

    <!-- home section ends -->

    <!-- dishes section starts  -->

    <section class="dishes" id="dishes">

        <h3 class="sub-heading"> our dishes </h3>
        <h1 class="heading"> popular dishes </h1>

        <div class="box-container">

            @foreach ($products as $product)
            <div class="box @if($witems->contains($product->id)) green-wish-box @endif md:max-w-xl lg:max-w-md mx-auto">
                @if ($witems->contains($product->id))
                <a href="#" class="fas fa-heart wish-product"
                    wire:click.prevent="removeFromWishlist({{ $product->id }})"></a>
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
                <span>${{ number_format($product->regulary_price,2) }}</span>
                <a href="#" class="btn"
                    wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}',{{ $product->regulary_price }})">add
                    to
                    cart</a>
            </div>
            @endforeach

        </div>

    </section>

    <!-- dishes section ends -->

    <!-- about section starts  -->

    @livewire('about-component')

    <!-- about section ends -->

    <!-- menu section starts  -->

    <section class="menu" id="menu">

        <h3 class="sub-heading"> our menu </h3>
        <h1 class="heading"> today's speciality </h1>

        <div class="box-container">

            @foreach ($featuredProducts as $fproduct)
            <div class="box @if($witems->contains($fproduct->id)) green-wish-box @endif">
                <div class="image">
                    <img src="{{ asset('assets/images/product') }}/{{ $fproduct->image }}" alt="">
                    @if ($witems->contains($fproduct->id))
                    <a href="#" class="fas fa-heart wish-product"
                        wire:click.prevent="removeFromWishlist({{ $fproduct->id }})"></a>
                    @else
                    <a href="#" class="fas fa-heart"
                        wire:click.prevent="addToWishlist({{ $fproduct->id }}, '{{ $fproduct->name }}',{{ $fproduct->regulary_price }})"></a>
                    @endif
                </div>
                <div class="content">
                    <div class="stars" style="font-size: 1.6rem!important;">
                        <style>
                            .color-gray{
                                color:rgb(173, 173, 173)!important;
                            }

                        </style>
                        @php
                            $avgrating = 0;
                            $totalReview = 0;
                            $totalReview = $fproduct->orderItems->where('rstatus',1)->count();
                        @endphp
                        @foreach($fproduct->orderItems->where('rstatus',1) as $orderItem)
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
                        <span>({{ $fproduct->orderItems->where('rstatus',1)->count() }}) review</span>
                    </div>
                    <h3>{{ $fproduct->name }}</h3>
                    <p>{{ $fproduct->short_description }}</p>
                    <a href="#" class="btn"
                        wire:click.prevent="store({{ $fproduct->id }}, '{{ $fproduct->name }}',{{ $fproduct->regulary_price }})">add
                        to cart</a>
                    <span class="price">${{ number_format($fproduct->regulary_price,2) }}</span>
                </div>
            </div>
            @endforeach

        </div>

    </section>

    <!-- menu section ends -->

    <!-- review section starts  -->

    <section class="review" id="review">

        <h3 class="sub-heading"> customer's review </h3>
        <h1 class="heading"> what they say </h1>

        <div class="swiper-container review-slider" wire:ignore>

            <div class="swiper-wrapper">
                @forelse($orderItems as $orderItem)
                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        @if($orderItem->order->user->profile->image)
                        <img src="{{ asset('assets/images/profile/cover') }}/{{ $orderItem->order->user->profile->image }}" alt="">
                        @else
                        <img src="{{ asset('images/pic-1.png') }}" alt="">
                        @endif
                        <div class="user-info">
                            <h3>{{ $orderItem->order->user->name }}</h3>
                            <div class="stars" style="font-size: 1.6rem!important;">
                                <style>
                                    .color-gray{
                                        color:rgb(173, 173, 173)!important;
                                    }

                                </style>

                                @for($i=1;$i<=5;$i++)
                                    @if($i<=$orderItem->review->rating)
                                    <i class="fas fa-star"></i>
                                    @else
                                    <i class="fas fa-star color-gray"></i>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold">{{ $orderItem->review->title }}</h3>
                    <p>{{ $orderItem->review->comment }}</p>
                </div>
                @empty

                    <h1 class="sub-heading w-full m-12"> No Review Yet! </h1>
                @endforelse

            </div>

        </div>

    </section>

    <!-- review section ends -->
    @livewire('contact-component')

</div>
