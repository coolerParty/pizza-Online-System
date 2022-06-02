<section class="about" id="about">

    <h3 class="sub-heading"> about us </h3>
    <h1 class="heading"> why choose us? </h1>

    <div class="row">
        <div class="image">
            <img src="{{ asset('images/about-img.png') }}" alt="">
        </div>
        <div class="content">
            <h3>{{ $about->title }}</h3>
            <div>{!! $about->body !!}</div>
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
            <!-- <a href="#" class="btn">learn more</a> -->
        </div>
    </div>

</section>
