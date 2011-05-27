<form name="settings_update" id="settings_update" method="post" action="<?= base_url() ?>api/settings/modify" enctype="multipart/form-data">

<div class="content_wrap_inner">
	
	<div class="content_inner_top_right">
		<h3>Module</h3>
		<p><?= form_dropdown('enabled', config_item('enable_disable'), $settings['cart']['enabled']) ?></p>
	</div>	
	
	<h3>Permissions</h3>

	<p>Create
	<?= form_dropdown('create_permission', config_item('users_levels'), $settings['cart']['create_permission']) ?>
	</p>

	<p>Publish
	<?= form_dropdown('publish_permission', config_item('users_levels'), $settings['cart']['publish_permission']) ?>	
	</p>

	<p>Manage All
	<?= form_dropdown('manage_permission', config_item('users_levels'), $settings['cart']['manage_permission']) ?>	
	</p>
		
</div>

<span class="item_separator"></span>

<div class="content_wrap_inner">		
	
	<h3>Products</h3>

	<p>Ratings
	<?= form_dropdown('ratings_allow', config_item('yes_or_no'), $settings['cart']['ratings_allow']) ?>
	</p>

	<p>Display Categories
	<?= form_dropdown('categories_display', config_item('yes_or_no'), $settings['cart']['categories_display']) ?>
	</p>

	<p>Display Tags
	<?= form_dropdown('tags_display', config_item('yes_or_no'), $settings['cart']['tags_display']) ?>
	</p>	

	<p>URL
	<?= form_dropdown('url_style', config_item('url_style_products'), $settings['cart']['url_style']) ?>
	</p>

	<p>Abbreviate
	<?= form_dropdown('abbreviate_description', config_item('yes_or_no'), $settings['cart']['abbreviate_description']) ?>
	<input type="text" size="4" name="abbreviate_length" value="<?= $settings['cart']['abbreviate_length'] ?>" /> characters
	</p>

	<p>Products Per-Page
	<?= form_dropdown('products_per_page', config_item('amount_increments_all'), $settings['cart']['products_per_page']) ?>
	</p>
		
</div>

<span class="item_separator"></span>

<div class="content_wrap_inner">
		
	<h3>Comments</h3>	

	<p>Allow
	<?= form_dropdown('comments_allow', config_item('yes_or_no'), $settings['cart']['comments_allow']) ?>
	</p>

	<p>Comments Per-Page
	<?= form_dropdown('comments_per_page', config_item('amount_increments_five'), $settings['cart']['comments_per_page']) ?>
	</p>
	
	<input type="hidden" name="module" value="cart">	

	<p><input type="submit" name="save" value="Save" /></p>

</div>

</form>

<?= $shared_ajax ?>