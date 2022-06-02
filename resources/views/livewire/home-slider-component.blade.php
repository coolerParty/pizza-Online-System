<section class="home" id="home">

    <div class="swiper-container home-slider">

        <div class="swiper-wrapper wrapper">
            @foreach($sliders as $slider)
            <div class="swiper-slide slide">
                <div class="content">
                    <span>{{ $slider->subtitle }}</span>
                    <h3>{{ $slider->title }}</h3>
                    <p>{{ $slider->short_description }}</p>
                    <a href="{{ route('menu.details',['product_id'=>$slider->product->id,'slug'=>$slider->product->slug]) }}"
                        class="btn">order now</a>
                </div>
                <div class="image">
                    <img src="{{ asset('assets/images/slider') }}/{{ $slider->image }}" alt="">
                </div>
            </div>
            @endforeach
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
