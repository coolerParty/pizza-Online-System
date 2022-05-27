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

	</style>
	<!-- order section starts  -->
	<section class="order" id="order">
		<h3 class="sub-heading"> order now </h3>
		<h1 class="heading"> free and fast </h1>
		<form wire:submit.prevent="placeOrder">
			<div class="billing-address">
				<div class="inputBox">
					<h1 class="heading">Billing Address</h1>
				</div>
				<div class="inputBox">
					<div class="input">
						<span>firstname</span>
						<input class="@error('firstname') is-invalid @enderror" type="text" placeholder="enter your firstname"
							name="firstname" wire:model="firstname">
						@error('firstname') <span class="text-danger">{{ $message }}</span> @enderror
					</div>
					<div class="input">
						<span>lastname</span>
						<input class="@error('lastname') is-invalid @enderror" type="text" placeholder="enter your lastname"
							name="lastname" wire:model="lastname">
						@error('lastname') <span class="text-danger">{{ $message }}</span> @enderror
					</div>
				</div>
				<div class="inputBox">
					<div class="input">
						<span>mobile</span>
						<input class="@error('mobile') is-invalid @enderror" type="text" placeholder="enter your mobile number"
							name="mobile" wire:model="mobile">
						@error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
					</div>
					<div class="input">
						<span>email</span>
						<input class="@error('email') is-invalid @enderror" type="email" placeholder="enter your email address"
							name="email" wire:model="email">
						@error('email') <span class="text-danger">{{ $message }}</span> @enderror
					</div>
				</div>
				<div class="inputBox">
					<div class="input">
						<span>line1</span>
						<textarea class="@error('line1') is-invalid @enderror" type="text" placeholder="enter your address" name="line1"
							cols="30" rows="10" wire:model="line1"></textarea>
						@error('line1') <span class="text-danger">{{ $message }}</span> @enderror
					</div>
					<div class="input">
						<span>line2</span>
						<textarea class="@error('line2') is-invalid @enderror" type="text" placeholder="enter your second address"
							name="line2" cols="30" rows="10" wire:model="line2"></textarea>
						@error('line2') <span class="text-danger">{{ $message }}</span> @enderror
					</div>
				</div>
				<div class="inputBox">
					<div class="input">
						<span>city</span>
						<input class="@error('city') is-invalid @enderror" type="text" placeholder="enter your city" name="city"
							wire:model="city">
						@error('city') <span class="text-danger">{{ $message }}</span> @enderror
					</div>
					<div class="input">
						<span>province</span>
						<input class="@error('province') is-invalid @enderror" type="text" placeholder="enter your province"
							name="province" wire:model="province">
						@error('province') <span class="text-danger">{{ $message }}</span> @enderror
					</div>
				</div>
				<div class="inputBox">
					<div class="input">
						<span>country</span>
						<input class="@error('country') is-invalid @enderror" type="text" placeholder="enter your country" name="country"
							wire:model="country">
						@error('country') <span class="text-danger">{{ $message }}</span> @enderror
					</div>
					<div class="input">
						<span>zipcode</span>
						<input class="@error('zipcode') is-invalid @enderror" type="text" placeholder="enter your zipcode" name="zipcode"
							wire:model="zipcode">
						@error('zipcode') <span class="text-danger">{{ $message }}</span> @enderror
					</div>
				</div>
			</div>
			<div class="inputBox">
				<div class="input">
					<div>
						<label for="different-add"><span>Change Shipping Address?</span>
							<input id="different-add" name="different-add" value="1" type="checkbox" wire:model="ship_to_different">
						</label>
					</div>
				</div>
			</div>
			@if ($ship_to_different)
				<div class="shipping-address bg-gray-100 px-4  py-6 rounded border">
					<div class="inputBox">
						<h1 class="heading">Shipping Address</h1>
					</div>
					<div class="inputBox">
						<div class="input">
							<span>firstname</span>
							<input class="@error('s_firstname') is-invalid @enderror" type="text" placeholder="enter your firstname"
								name="s_firstname" wire:model="s_firstname">
							@error('s_firstname') <span class="text-danger">{{ $message }}</span> @enderror
						</div>
						<div class="input">
							<span>lastname</span>
							<input class="@error('s_lastname') is-invalid @enderror" type="text" placeholder="enter your lastname"
								name="s_lastname" wire:model="s_lastname">
							@error('s_lastname') <span class="text-danger">{{ $message }}</span> @enderror
						</div>
					</div>
					<div class="inputBox">
						<div class="input">
							<span>mobile</span>
							<input class="@error('s_mobile') is-invalid @enderror" type="text" placeholder="enter your mobile number"
								name="s_mobile" wire:model="s_mobile">
							@error('s_mobile') <span class="text-danger">{{ $message }}</span> @enderror
						</div>
						<div class="input">
							<span>email</span>
							<input class="@error('s_email') is-invalid @enderror" type="email" placeholder="enter your email address"
								name="s_email" wire:model="s_email">
							@error('s_email') <span class="text-danger">{{ $message }}</span> @enderror
						</div>
					</div>
					<div class="inputBox">
						<div class="input">
							<span>line1</span>
							<textarea class="@error('s_line1') is-invalid @enderror" type="text" placeholder="enter your address"
								name="s_line1" cols="30" rows="10" wire:model="s_line1"></textarea>
							@error('s_line1') <span class="text-danger">{{ $message }}</span> @enderror
						</div>
						<div class="input">
							<span>line2</span>
							<textarea class="@error('s_line2') is-invalid @enderror" type="text" placeholder="enter your second address"
								name="s_line2" cols="30" rows="10" wire:model="s_line2"></textarea>
							@error('s_line2') <span class="text-danger">{{ $message }}</span> @enderror
						</div>
					</div>
					<div class="inputBox">
						<div class="input">
							<span>city</span>
							<input class="@error('s_city') is-invalid @enderror" type="text" placeholder="enter your city" name="s_city"
								wire:model="s_city">
							@error('s_city') <span class="text-danger">{{ $message }}</span> @enderror
						</div>
						<div class="input">
							<span>province</span>
							<input class="@error('s_province') is-invalid @enderror" type="text" placeholder="enter your province"
								name="s_province" wire:model="s_province">
							@error('s_province') <span class="text-danger">{{ $message }}</span> @enderror
						</div>
					</div>
					<div class="inputBox">
						<div class="input">
							<span>country</span>
							<input class="@error('s_country') is-invalid @enderror" type="text" placeholder="enter your country"
								name="s_country" wire:model="s_country">
							@error('s_country') <span class="text-danger">{{ $message }}</span> @enderror
						</div>
						<div class="input">
							<span>zipcode</span>
							<input class="@error('s_zipcode') is-invalid @enderror" type="text" placeholder="enter your zipcode"
								name="s_zipcode" wire:model="s_zipcode">
							@error('s_zipcode') <span class="text-danger">{{ $message }}</span> @enderror
						</div>
					</div>

				</div>
			@endif
			<div class="inputBox">
				<div class="input">
					<h1 class="sub-heading">Payment Method </h1>
					@if ($paymentmode === "card")
					<div class="inputBox bg-gray-100 px-3 py-6 border rounded">
						@if (Session::has('stripe_error'))
							<span class="text-danger">{{ Session::get('stripe_error') }}</span>

						@endif
						<div class="input">
							<span>Card Number:</span>
							<input class="@error('card_no') is-invalid @enderror" type="text" placeholder="enter your card number"
								name="card-no" wire:model="card_no">
							@error('card_no') <span class="text-danger">{{ $message }}</span> @enderror
						</div>
						<div class="input">
							<span>CVC:</span>
							<input class="@error('cvc') is-invalid @enderror" type="password" placeholder="enter your CVC" name="cvc"
								wire:model="cvc">
							@error('cvc') <span class="text-danger">{{ $message }}</span> @enderror
						</div>
						<div class="input">
							<span>Expiry Month:</span>
							<input class="@error('exp_month') is-invalid @enderror" type="text" placeholder="enter your expiry month"
								name="exp_month" wire:model="exp_month">
							@error('exp_month') <span class="text-danger">{{ $message }}</span> @enderror
						</div>
						<div class="input">
							<span>Expiry Year:</span>
							<input class="@error('exp_year') is-invalid @enderror" type="text" placeholder="enter your expiry year"
								name="exp-year" wire:model="exp_year">
							@error('exp_year') <span class="text-danger">{{ $message }}</span> @enderror
						</div>
					</div>
					@endif
					<div class="inputBox">
						<div class="input">
							<label for="cod"><span>Cash on Delivery
									<div class="input">
										<input id="cod" value="cod" type="radio" name="payment-method" wire:model="paymentmode">
									</div>
									@if ($paymentmode == 'cod')<b style="color: green;">( Order Pay on Delivery )</b>@endif
								</span></label>
						</div>

						<div class="input">
							<label for="card"><span>Debit / Credit Card
									<div class="input">
										<input id="card" value="card" type="radio" name="payment-method" wire:model="paymentmode">
									</div>
									@if ($paymentmode == 'card')<b style="color: green;">( Paid by Card )</b> @endif
								</span></label>
						</div>
					</div>
					@error('paymentmode') <span class="text-danger">{{ $message }}</span> @enderror
				</div>

				<div class="input">
					<h1 class="sub-heading">Shipping Method</h1>
					<span>Discount Codes</span>
					<input type="text" placeholder="enter coupon code">
				</div>

			</div>

			<div class="inputBox">
				@if (Session::has('checkout'))
					<div style="margin-bottom: 1.2rem;">
						<h1 class="heading">Grand Total: <b>${{ Session::get('checkout')['total'] }}</b></h1>
					</div>
				@endif
			</div>

			<button type="submit" class="btn w-full" style="background: #04AA6D;">Place Order Now</button>
		</form>
	</section>
	<!-- order section ends -->
</div>
