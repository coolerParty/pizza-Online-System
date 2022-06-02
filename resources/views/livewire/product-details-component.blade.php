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
    <!-- dishes section starts  -->
    <section class="menu" id="menu" style="margin: 100px auto; background: #fff!important;">
        <h3 class="sub-heading"> our dishes </h3>
        <h1 class="heading"> popular dishes </h1>
        @if (Session::has('cart_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h1 class="sub-heading"><i class="icon fas fa-check"></i> {{ Session::get('cart_message') }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="box-container">
            <div class="bg-white">
                <div class="pt-6 max-w-screen-lg mx-auto lg:max-w-screen-lg" >
                    <!-- Image gallery -->
                    <div class="mt-6 max-w-screen-md mx-auto">
                        <div class="aspect-w-3 aspect-h-4 rounded-lg overflow-hidden lg:block">
                            <img src="{{ asset('assets/images/product') }}/{{ $product->image }}"
                                alt=""
                                class="w-full h-full object-center object-cover">
                        </div>
                    </div>

                    <!-- Product info -->
                    <div
                        class="max-w-screen-lg mx-auto pt-10 pb-16 px-4 sm:px-6  lg:pt-16 lg:pb-24 lg:px-8 lg:grid lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8">
                        <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                            <h1 class="text-2xl font-extrabold tracking-tight text-gray-900">{{
                                $product->name
                                }}</h1>
                        </div>

                        <!-- Options -->
                        <div class="mt-4 lg:mt-0 lg:row-span-3">
                            <h2 class="sr-only">Product information</h2>
                            <p class="text-4xl text-gray-900">${{ $product->regulary_price }}</p>

                            <!-- Reviews -->
                            <div class="mt-6">
                                <h3 class="sr-only">Reviews</h3>
                                <div class="flex items-center">
                                    <div class="flex items-center">
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
                                        @for($i=1;$i<=5;$i++) @if($totalReview <> 0 && $i<=($avgrating /$totalReview))
                                                <svg class="text-gray-900 h-10 w-10 flex-shrink-0"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                                @else
                                                <svg class="text-gray-200 h-10 w-10 flex-shrink-0"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                                @endif
                                                @endfor
                                    </div>
                                    <p class="sr-only">4 out of 5 stars</p>
                                    <a href="#"
                                        class="ml-3 text-2xl font-medium text-indigo-600 hover:text-indigo-500">{{
                                        $product->orderItems->where('rstatus',1)->count() }} reviews</a>
                                </div>
                            </div>

                            <div class="mt-10">
                                @if ($witems->contains($product->id))
                                <a href="#" wire:click.prevent="removeFromWishlist({{ $product->id }})"
                                    class="text-2xl mt-10 w-full bg-green-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Remove
                                    from Wishlist</a>
                                @else
                                <a href="#"
                                    wire:click.prevent="addToWishlist({{ $product->id }}, '{{ $product->name }}',{{ $product->regulary_price }})"
                                    class=" text-2xl mt-10 w-full bg-green-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add
                                    to Wishlist</a>
                                @endif

                                <a href="#"
                                    wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}',{{ $product->regulary_price }})"
                                    class="text-2xl mt-2 w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add
                                    to Cart</a>
                            </div>
                        </div>

                        <div
                            class="py-10 lg:pt-6 lg:pb-16 lg:col-start-1 lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                            <!-- Description and details -->
                            <div>
                                <h3 class="sr-only">Description</h3>
                                <div class="space-y-6">
                                    <p class="text-base text-gray-900" style="font-size: 1.5rem!important;">{{ $product->short_description }}</p>
                                </div>
                                <div class="space-y-6 mt-6">
                                    <d class="text-gray-900" style="font-size: 1.3em!important;">{!! $product->description !!}</d>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-container">

            <!-- For the slider to work add these links in your header :
          <link href="https://npmcdn.com/flickity@2/dist/flickity.css" rel="stylesheet" />
           -->
            <div class="py-12 px-4 md:px-6 2xl:px-0 2xl:container 2xl:mx-auto flex justify-center items-center">
                <div class="flex flex-col justify-start items-start w-full space-y-8">
                    <div class="flex justify-start items-start">
                        <p
                            class="text-3xl lg:text-4xl font-semibold leading-7 lg:leading-9 text-gray-800 dark:text-white ">
                            Reviews</p>
                    </div>
                    @forelse($product->orderitems->where('rstatus',1) as $orderItem)
                    <div class="w-full flex justify-start items-start flex-col bg-gray-50 dark:bg-gray-800 p-8">
                        <div class="flex flex-col md:flex-row justify-between w-full">
                            <div class="flex flex-row justify-between items-start">
                                <p class="text-xl md:text-2xl font-bold leading-normal text-gray-800 dark:text-white">
                                    {{ $orderItem->review->title}}</p>

                            </div>
                            <div class="cursor-pointer mt-2 md:mt-0">
                                <div class="flex items-center">
                                    @for($i=1;$i<=5;$i++)
                                        @if($i<=$orderItem->review->rating)
                                        <svg class="text-gray-900 h-10 w-10 flex-shrink-0"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        @else
                                        <svg class="text-gray-200 h-10 w-10 flex-shrink-0"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div id="menu" class="md:block">
                            <p
                                class="mt-3 text-2xl leading-normal text-gray-600 dark:text-white w-full md:w-9/12 xl:w-5/6">
                                {{ $orderItem->review->comment}}</p>
                            <div class="mt-6 flex justify-start items-center flex-row space-x-2.5">
                                <div>
                                    @if($orderItem->order->user->profile->image)
                                    <img class="rounded-full" src="{{ asset('assets/images/profile/cover') }}/{{ $orderItem->order->user->profile->image }}" alt="" width="60" />
                                    @else
                                    <img class="rounded-full" src="{{ asset('images/pic-1.png') }}" alt="" width="60" />
                                    @endif
                                </div>
                                <div class="flex flex-col justify-start items-start space-y-2">
                                    <p class="text-xl font-bold leading-none text-gray-800 dark:text-white">{{
                                        $orderItem->order->user->name }}</p>
                                    <p class="text-xl leading-none text-gray-600 dark:text-white">{{
                                        Carbon\Carbon::parse($orderItem->review->created_at)->format('d F Y g:i A') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="w-full flex justify-start items-start flex-col bg-gray-50 dark:bg-gray-800 p-8">
                        <div class="flex flex-col md:flex-row justify-between w-full">
                            <div class="flex flex-row justify-between items-start">
                                <p class="text-xl md:text-2xl font-medium leading-normal text-gray-800 dark:text-white">
                                    No Review</p>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
            <style>
                .carousel-cell {
                    width: 150px;
                    height: 150px;

                    margin-right: 24px;
                    counter-increment: carousel-cell;
                }

                .carousel-cell:before {
                    display: block;
                    width: 20%;
                }

                .flickity-slider {
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    left: -260px !important;
                }

                .flickity-button {
                    position: absolute !important;
                    inset: 0 !important;
                    top: 50% !important;
                    left: 80% !important;
                    background: white;
                    border: 0px;
                    color: #27272a;
                }

                .flickity-prev-next-button:hover {
                    background-color: #27272a;
                    color: white;
                }

                .flickity-prev-next-button.previous {
                    visibility: hidden;
                }

                .flickity-prev-next-button.next {
                    margin-left: 50px;
                    width: 48px;
                    height: 48px;
                    visibility: hidden;
                }

                .flickity-enabled.is-draggable .flickity-viewport {
                    cursor: none;
                    cursor: default;
                }

                .flickity-prev-next-button .flickity-button-icon {
                    margin-left: 2px;
                    margin-top: 2px;
                    width: 24px;
                    height: 24px;
                }
            </style>



        </div>
    </section>
    <!-- dishes section ends -->


</div>
