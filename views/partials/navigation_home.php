<h2 class="content_title"><img src="<?= $modules_assets ?>cart_32.png"> Cart</h2>
<ul class="content_navigation">
	<?= navigation_list_btn('home/cart', 'Recent') ?>
	<?= navigation_list_btn('home/cart/purchases', 'Purchases') ?>
	<?= navigation_list_btn('home/cart/products', 'Products') ?>
	<?php if ($level <= 2) echo navigation_list_btn('home/cart/create', 'Create') ?>
</ul>