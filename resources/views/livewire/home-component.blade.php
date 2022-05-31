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

    <section class="home" id="home">

        <div class="swiper-container home-slider">

            <div class="swiper-wrapper wrapper">

                <div class="swiper-slide slide">
                    <div class="content">
                        <span>our special dish</span>
                        <h3>spicy noodles</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit natus dolor cumque?</p>
                        <a href="#" class="btn">order now</a>
                    </div>
                    <div class="image">
                        <img src="{{ asset('images/home-img-1.png') }}" alt="">
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="content">
                        <span>our special dish</span>
                        <h3>fried chicken</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit natus dolor cumque?</p>
                        <a href="#" class="btn">order now</a>
                    </div>
                    <div class="image">
                        <img src="{{ asset('images/home-img-2.png') }}" alt="">
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="content">
                        <span>our special dish</span>
                        <h3>hot pizza</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit natus dolor cumque?</p>
                        <a href="#" class="btn">order now</a>
                    </div>
                    <div class="image">
                        <img src="{{ asset('images/home-img-3.png') }}" alt="">
                    </div>
                </div>

            </div>

            <div class="swiper-pagination"></div>

        </div>

    </section>

    <!-- home section ends -->

    <!-- dishes section starts  -->

    <section class="dishes" id="dishes">

        <h3 class="sub-heading"> our dishes </h3>
        <h1 class="heading"> popular dishes </h1>

        <div class="box-container">

            @foreach ($products as $product)
            <div class="box @if($witems->contains($product->id)) green-wish-box @endif">
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

    <section class="about" id="about">

        <h3 class="sub-heading"> about us </h3>
        <h1 class="heading"> why choose us? </h1>

        <div class="row">

            <div class="image">
                <img src="{{ asset('images/about-img.png') }}" alt="">
            </div>

            <div class="content">
                <h3>best food in the country</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, sequi corrupti corporis quaerat
                    voluptatem ipsam neque labore modi autem, saepe numquam quod reprehenderit rem? Tempora aut soluta
                    odio corporis nihil!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, nemo. Sit porro illo eos cumque
                    deleniti iste alias, eum natus.</p>
                <div class="icons-container">
                    <div class="icons">
                        <i class="fas fa-shipping-fast"></i>
                        <span>free delivery</span>
                    </div>
                    <div class="icons">
                        <i class="fas fa-dollar-sign"></i>
                        <span>easy payments</span>
                    </div>
                    <div class="icons">
                        <i class="fas fa-headset"></i>
                        <span>24/7 service</span>
                    </div>
                </div>
                <a href="#" class="btn">learn more</a>
            </div>

        </div>

    </section>

    <!-- about section ends -->

    <!-- menu section starts  -->

    <section class="menu" id="menu">

        <h3 class="sub-heading"> our menu </h3>
        <h1 class="heading"> today's speciality </h1>

        <div class="box-container">

            @foreach ($products as $product)
            <div class="box @if($witems->contains($product->id)) green-wish-box @endif">
                <div class="image">
                    <img src="{{ asset('assets/images/product') }}/{{ $product->image }}" alt="">
                    @if ($witems->contains($product->id))
                    <a href="#" class="fas fa-heart wish-product"
                        wire:click.prevent="removeFromWishlist({{ $product->id }})"></a>
                    @else
                    <a href="#" class="fas fa-heart"
                        wire:click.prevent="addToWishlist({{ $product->id }}, '{{ $product->name }}',{{ $product->regulary_price }})"></a>
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
                        <span>({{ $product->orderItems->where('rstatus',1)->count() }}) review</span>
                    </div>
                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->short_description }}</p>
                    <a href="#" class="btn"
                        wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}',{{ $product->regulary_price }})">add
                        to cart</a>
                    <span class="price">${{ number_format($product->regulary_price,2) }}</span>
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

        <div class="swiper-container review-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="{{ asset('images/pic-1.png') }}" alt="">
                        <div class="user-info">
                            <h3>john deo</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus
                        aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis
                        laborum aspernatur quibusdam. Ipsum, magni.</p>
                </div>

                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="{{ asset('images/pic-2.png') }}" alt="">
                        <div class="user-info">
                            <h3>john deo</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus
                        aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis
                        laborum aspernatur quibusdam. Ipsum, magni.</p>
                </div>

                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="{{ asset('images/pic-3.png') }}" alt="">
                        <div class="user-info">
                            <h3>john deo</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus
                        aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis
                        laborum aspernatur quibusdam. Ipsum, magni.</p>
                </div>

                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="{{ asset('images/pic-4.png') }}" alt="">
                        <div class="user-info">
                            <h3>john deo</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus
                        aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis
                        laborum aspernatur quibusdam. Ipsum, magni.</p>
                </div>

            </div>

        </div>

    </section>

    <!-- review section ends -->
    @livewire('contact-component')

</div>
