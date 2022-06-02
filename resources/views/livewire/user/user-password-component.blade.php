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

        <h3 class="sub-heading"> Customer's Info </h3>
        <h1 class="heading"> Change Password </h1>
        @if (Session::has('password_success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h1 class="sub-heading"><i class="icon fas fa-check"></i> {{ Session::get('password_success') }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (Session::has('password_error'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h1 class="sub-heading"><i class="icon fas fa-check"></i> {{ Session::get('password_error') }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form wire:submit.prevent="changePassword">

            <div class="inputBox">
                <div class="input">
                    <span>current password</span>
                    <input type="password" placeholder="enter your current password"
                        class="@error('current_password') err_input @enderror" id="current_password"
                        name="current_password" wire:model="current_password">
                    @error('current_password')<div class="err_feedback">{{ $message }}</div>@enderror
                </div>
                <div class="input">
                    <span></span>
                </div>
            </div>
            <div class="inputBox mb-10">
                <div class="input">
                    <span>new password</span>
                    <input type="password" placeholder="enter your password"
                        class="@error('password') err_input @enderror" id="password" name="password"
                        wire:model="password">
                    @error('password')<div class="err_feedback">{{ $message }}</div>@enderror
                </div>
                <div class="input">
                    <span>password confirmation</span>
                    <input type="password" placeholder="enter your password confirmation"
                        class="@error('password_confirmation') err_input @enderror" id="password_confirmation"
                        name="password_confirmation" wire:model="password_confirmation">
                    @error('password_confirmation')<div class="err_feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <input type="submit" value="Submit" class="btn" style="background: #04AA6D; width: 100%;">
        </form>
    </section>
    <!-- order section ends -->
</div>
