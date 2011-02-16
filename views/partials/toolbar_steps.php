<h3>Steps</h3>

<div class="create_stage">
	<div class="stage_marker<?= navigation_create_stages(config_item('cart_create_stages'), $this->uri->segment(3), 'create') ?>"><span>1</span></div>
	<a href="<?= navigation_sidebar_link_basic('cart', $this->uri->segment(3), $this->uri->segment(4)) ?>">Basics</a>
</div>

<div class="create_stage">
	<div class="stage_marker<?= navigation_create_stages(config_item('cart_create_stages'), $this->uri->segment(3), 'media') ?>"><span>2</span></div>
	<a href="<?= base_url() ?>home/cart/media/<?= $this->uri->segment(4); ?>">Media</a>
</div>

<div class="create_stage">
	<div class="stage_marker<?= navigation_create_stages(config_item('cart_create_stages'), $this->uri->segment(3), 'details') ?>"><span>3</span></div>
	<a href="<?= base_url() ?>home/cart/details/<?= $this->uri->segment(4); ?>">Details</a>	
</div>

<div class="clear"></div>