<div>
    <!-- order section starts  -->
    <style>
        .err_input {
            border: 1px solid red !important;
        }

        .err_feedback {
            color: red;
        }
    </style>

    <section class="order" id="order" style="margin: 100px auto 50px auto; background: #fff!important;">

        <h1 class="heading"> Customer Review </h1>

        @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h1 class="sub-heading"><i class="icon fas fa-check"></i> {{ Session::get('message') }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form wire:submit.prevent="addReview">
            <div class="inputBox">
                <div class="input">
                    <span>Product</span>
                    <span style="border-bottom: 1px solid rgb(5, 155, 0); padding: 10px;"><b>{{
                            $orderItem->product->name }}</b></span>
                    <span>Price</span>
                    <span style="border-bottom: 1px solid rgb(5, 155, 0); padding: 10px;"><b>${{
                            number_format($orderItem->product->regulary_price,2) }}</b></span>
                </div>
                <div class="input">
                    <span>Title</span>
                    @error('title')<div class="err_feedback">{{ $message }}</div>@enderror
                    <input name="title" placeholder="enter your title" class="@error('title') err_input @enderror"
                        id="title"  wire:model="title">
                    <span>Rate</span>
                    <div class="stars" style="font-size: 1.6rem!important;">
                        <div class="flex flex-row space-x-1">
                            <span><input style="@if(1 <= $rating) border: 1px solid green!important; @endif" type="radio" id="rated-1" name="rating" value="1" wire:model="rating"></span>
                            <span><input style="@if(2 <= $rating) border: 1px solid green!important; @endif" type="radio" id="rated-2" name="rating" value="2" wire:model="rating"></span>
                            <span><input style="@if(3 <= $rating) border: 1px solid green!important; @endif" type="radio" id="rated-3" name="rating" value="3" wire:model="rating"></span>
                            <span><input style="@if(4 <= $rating) border: 1px solid green!important; @endif" type="radio" id="rated-4" name="rating" value="4" wire:model="rating"></span>
                            <span><input style="@if(5 <= $rating) border: 1px solid green!important; @endif" type="radio" id="rated-5" name="rating" value="5" checked="checked"
                                    wire:model="rating"></span>
                        </div>
                    </div>
                    @error('rating')<div class="err_feedback">{{ $message }}</div>@enderror

                </div>
            </div>
            <div class="inputBox">
                <div class="input">
                    <span>Image</span>
                    <div class="image">
                        <img src="{{ asset('assets/images/product') }}/{{ $orderItem->product->image }}" alt=""
                            width="100%" style="height: 200px; object-fit: cover;" class="rounded-md">
                    </div>
                </div>
                <div class="input">
                    <span>Comment</span>
                    @error('comment')<div class="err_feedback">{{ $message }}</div>@enderror
                    <textarea name="" placeholder="enter your comment" class="@error('comment') err_input @enderror"
                        id="" cols="30" rows="15" wire:model="comment"></textarea>
                </div>
            </div>
            <input type="submit" value="Submit" class="btn" style="background: #04AA6D; width: 100%;">
        </form>
    </section>
    <!-- order section ends -->
</div>
