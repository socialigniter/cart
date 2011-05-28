<?php if ($cart_contents): ?>
	<div id="widget_cart">
		<h3>Your Cart</h3>
		<div id="widget_cart_contents">
			<h4 id="widget_cart_items"><span id="widget_cart_items_count"><?= $this->cart->total_items(); ?></span> Items</h4>
			<h4 id="widget_cart_total">$<span id="widget_cart_price_count"><?= $this->cart->format_number($this->cart->total()); ?></span></h4>	
			<p><a class="submit_button btn_small" href="<?= base_url() ?>cart/view">View Cart</a></p>
		</div>	
	</div>
<?php endif; ?>