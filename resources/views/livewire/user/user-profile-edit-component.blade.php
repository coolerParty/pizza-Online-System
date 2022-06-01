<div class="content">
    <style>
        .content {
            margin: 0;
        }

        .order {
            padding: 10rem 5rem;
        }

        .text-danger,
        .is-invalid {
            color: red !Important;
        }
        .flex-end {
            display: flex;
            justify-content: flex-end;
        }
        .flex-center {
            display: flex;
            justify-content: center;
        }
    </style>
    <!-- order section starts  -->
    <section class="order" id="order">
        <h3 class="sub-heading"> User's Profile </h3>
        <h1 class="heading"> {{ $lastname }}, {{ $name }} </h1>
        <form wire:submit.prevent="update">
            <div class="billing-address">
                <div class="flex-center p-10">
                    @if($image)
                    <img class="rounded-full"
                                src="{{ asset('assets/images/profile/cover') }}/{{ $image }}" width="50%" alt="">
                    @else
                    <img class="rounded-full"
                                src="{{ asset('assets/images/profile/cover') }}/pic-1.png" width="50%" alt="">
                    @endif
                </div>
                <div class="inputBox">
                    <h1 class="heading">User Information</h1>
                </div>
                <div class="inputBox">
                    <div class="input">
                        <span>firstname</span>
                        <input class="@error('name') is-invalid @enderror" type="text" placeholder="enter your name"
                            name="name" wire:model="name">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="input">
                        <span>lastname</span>
                        <input class="@error('lastname') is-invalid @enderror" type="text"
                            placeholder="enter your lastname" name="lastname" wire:model="lastname">
                        @error('lastname') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="inputBox">
                    <div class="input">
                        <span>mobile</span>
                        <input class="@error('mobile') is-invalid @enderror" type="text"
                            placeholder="enter your mobile number" name="mobile" wire:model="mobile">
                        @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="input">
                        <span>email</span>
                        <input class="@error('email') is-invalid @enderror" type="email"
                            placeholder="enter your email address" name="email" wire:model="email">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="inputBox">
                    <div class="input">
                        <span>line1</span>
                        <textarea class="@error('line1') is-invalid @enderror" type="text"
                            placeholder="enter your address" name="line1" cols="30" rows="10"
                            wire:model="line1"></textarea>
                        @error('line1') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="input">
                        <span>line2</span>
                        <textarea class="@error('line2') is-invalid @enderror" type="text"
                            placeholder="enter your second address" name="line2" cols="30" rows="10"
                            wire:model="line2"></textarea>
                        @error('line2') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="inputBox">
                    <div class="input">
                        <span>city</span>
                        <input class="@error('city') is-invalid @enderror" type="text" placeholder="enter your city"
                            name="city" wire:model="city">
                        @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="input">
                        <span>province</span>
                        <input class="@error('province') is-invalid @enderror" type="text"
                            placeholder="enter your province" name="province" wire:model="province">
                        @error('province') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="inputBox">
                    <div class="input">
                        <span>country</span>
                        <input class="@error('country') is-invalid @enderror" type="text"
                            placeholder="enter your country" name="country" wire:model="country">
                        @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="input">
                        <span>zipcode</span>
                        <input class="@error('zipcode') is-invalid @enderror" type="text"
                            placeholder="enter your zipcode" name="zipcode" wire:model="zipcode">
                        @error('zipcode') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="inputBox">
                    <div class="input">
                        <span>newimage</span>
                        <input class="@error('newimage') is-invalid @enderror" type="file"
                            placeholder="enter your newimage" name="newimage" wire:model="newimage">
                        @error('newimage') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn w-full" style="background: #04AA6D;">Update</button>
        </form>
    </section>
    <!-- order section ends -->
</div>
