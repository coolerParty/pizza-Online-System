<div>
	<!-- order section starts  -->
    <style>
        .err_input{
            border: 1px solid red!important;
        }
        .err_feedback{
            color: red;
        }
    </style>

	<section class="order" id="order" style="margin: 100px auto 50px auto; background: #fff!important;">

		{{-- <h3 class="sub-heading"> order now </h3> --}}
		<h1 class="heading"> Contact Us </h1>
        @if (Session::has('message'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<h1 class="sub-heading"><i class="icon fas fa-check"></i> {{ Session::get('message') }}</h1>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		@endif

		<form wire:submit.prevent="sendMessage">

			<div class="inputBox">
				<div class="input">
					<span>your name</span>
                    @error('name')<div class="err_feedback">{{ $message }}</div>@enderror
					<input type="text" placeholder="enter your name" class="@error('name') err_input @enderror" wire:model="name">

				</div>
				<div class="input">
                    <span>Website</span>
					<span style="border-bottom: 1px solid rgb(5, 155, 0); padding: 10px;"><b>www.pizzaorderingOnline.com</b></span>
				</div>
			</div>
            <div class="inputBox">
				<div class="input">
					<span>your number</span>
                    @error('phone')<div class="err_feedback">{{ $message }}</div>@enderror
					<input type="number" placeholder="enter your number" class="@error('phone') err_input @enderror" wire:model="phone">
				</div>
				<div class="input">
					<span>Phone</span>
					<span style="border-bottom: 1px solid rgb(5, 155, 0); padding: 10px;"><b>+9999-999-9999</b></span>
				</div>
			</div>
			<div class="inputBox">
				<div class="input">
					<span>your email</span>
                    @error('email')<div class="err_feedback">{{ $message }}</div>@enderror
					<input type="email" placeholder="enter your email" class="@error('email') err_input @enderror" wire:model="email">
				</div>
				<div class="input">
					<span>Email</span>
                    <span style="border-bottom: 1px solid rgb(5, 155, 0); padding: 10px;"><b>admin@admin.com</b></span>
				</div>
			</div>
			<div class="inputBox">
				<div class="input">
					<span>Comment</span>
                    @error('comment')<div class="err_feedback">{{ $message }}</div>@enderror
					<textarea name="" placeholder="enter your comment" class="@error('comment') err_input @enderror" id="" cols="30" rows="10" wire:model="comment"></textarea>
				</div>
				<div class="input">
					<span>Map</span>
					<iframe
						src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15583.404443060974!2d124.642039!3d12.4596346!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xac6eec83dc56cd7!2sPizza%20Hut!5e0!3m2!1sen!2sph!4v1646988089959!5m2!1sen!2sph"
						width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				</div>
			</div>


			<input type="submit" value="order now" class="btn" style="background: #04AA6D; width: 100%;">

		</form>

	</section>

	<!-- order section ends -->


</div>
