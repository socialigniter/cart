<div id="cart_progress">
	<div class="cart_progress progress_done">
		<div class="progress_icon icon_cart_done"></div>
		<h3>Your Cart</h3>
	</div>
	<div class="cart_progress progress_<?= $registration_progress ?>">
		<div class="progress_icon icon_registration_<?= $registration_progress ?>"></div>
		<h3>Registration</h3>
	</div>			
	<div class="cart_progress progress_<?= $payment_progress ?>">
		<div class="progress_icon icon_payment_<?= $payment_progress ?>"></div>
		<h3>Payment</h3>
	</div>	
	<div class="cart_progress progress_<?= $complete_progress ?>">
		<div class="progress_icon icon_complete_<?= $complete_progress ?>"></div>	
		<h3>Complete</h3>
	</div>	
</div>