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
        <h1 class="heading"> {{ $user->lastname }}, {{ $user->name }} </h1>
        <form>
            <div class="billing-address">
                <div class="p-10">

                    @if($userProfile->image)
                    <img class="rounded-full  max-w-md mx-auto"
                                src="{{ asset('assets/images/profile/cover') }}/{{ $userProfile->image }}" width="50%" alt="">
                    @else
                    <img class="rounded-full max-w-md mx-auto"
                                src="{{ asset('assets/images/profile/cover') }}/pic-1.png" width="50%" alt="">
                    @endif
                </div>
                <div class="inputBox">
                    <h1 class="heading">User Information</h1>
                </div>
                <div class="inputBox">
                    <div class="input">
                        <span>firstname</span>
                        <span
                            style="border-bottom: 1px solid rgb(5, 155, 0); padding: 10px;"><b>{{ $user->name }}</b></span>
                    </div>
                    <div class="input">
                        <span>lastname</span>
                        <span
                            style="border-bottom: 1px solid rgb(5, 155, 0); padding: 10px;"><b>{{ $user->lastname }}</b></span>
                    </div>
                </div>
                <div class="inputBox">
                    <div class="input">
                        <span>mobile</span>
                        <span
                            style="border-bottom: 1px solid rgb(5, 155, 0); padding: 10px;"><b>{{ $userProfile->mobile }}</b></span>
                    </div>
                    <div class="input">
                        <span>email</span>
                        <span
                            style="border-bottom: 1px solid rgb(5, 155, 0); padding: 10px;"><b>{{ $user->email }}</b></span>
                    </div>
                </div>
                <div class="inputBox">
                    <div class="input">
                        <span>line1</span>
                        <span
                            style="border-bottom: 1px solid rgb(5, 155, 0); padding: 10px;"><b>{{ $userProfile->line1 }}</b></span>
                    </div>
                    <div class="input">
                        <span>line2</span>
                        <span
                            style="border-bottom: 1px solid rgb(5, 155, 0); padding: 10px;"><b>{{ $userProfile->line2 }}</b></span>
                    </div>
                </div>
                <div class="inputBox">
                    <div class="input">
                        <span>city</span>
                        <span
                            style="border-bottom: 1px solid rgb(5, 155, 0); padding: 10px;"><b>{{ $userProfile->city }}</b></span>
                    </div>
                    <div class="input">
                        <span>province</span>
                        <span
                            style="border-bottom: 1px solid rgb(5, 155, 0); padding: 10px;"><b>{{ $userProfile->province }}</b></span>
                    </div>
                </div>
                <div class="inputBox">
                    <div class="input">
                        <span>country</span>
                        <span
                            style="border-bottom: 1px solid rgb(5, 155, 0); padding: 10px;"><b>{{ $userProfile->country }}</b></span>
                    </div>
                    <div class="input">
                        <span>zipcode</span>
                        <span
                            style="border-bottom: 1px solid rgb(5, 155, 0); padding: 10px;"><b>{{ $userProfile->zipcode }}</b></span>
                    </div>
                </div>
            </div>

            <div class="mt-10 mb-28">
                <a class="btn btn-checkout float-left" href="{{ route('user.changepassword') }}">Change Password</a>
                <a class="btn btn-checkout float-right" href="{{ route('user.profileedit') }}">Edit Info</a>
            </div>
        </form>

    </section>
    <!-- order section ends -->
</div>
