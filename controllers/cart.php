<?php
class Cart extends Site_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->helper('cart');
        $this->load->library('cart_igniter');
        		
		$this->data['ratings_allow']		= config_item('cart_ratings_allow');
		$this->data['categories_display']	= config_item('cart_categories_display');
		$this->data['tags_display']			= config_item('cart_tags_display');
		$this->data['url_style'] 			= config_item('cart_url_style');

		$this->data['date_style']			= config_item('cart_date_style');
		$this->data['abbreviate_post']		= config_item('cart_abbreviate_post');
		$this->data['abbreviate_length']	= config_item('cart_abbreviate_length');
		$this->data['posts_per_page']		= config_item('cart_posts_per_page');
		$this->data['comments_allow']		= config_item('cart_comments_allow');		

		$this->data['modules_sidebar']	   .= $this->cart_igniter->render_sidebar_cart();
    }
	
	/* Checkout Steps */
	function index()
	{
		$this->data['registration_progress']	= 'notdone';
		$this->data['payment_progress'] 		= 'notdone';
		$this->data['complete_progress']		= 'notdone';
		$this->data['cart_progress']			= $this->load->view('partials/cart_progress', $this->data, true);
		$this->data['contents'] 				= $this->cart->contents();
		$this->data['page_title'] 				= 'Your Cart';
		
		$this->render('site_wide');
	}
		
	function registration()
	{
		$this->data['registration_progress']	= 'done';
		$this->data['payment_progress'] 		= 'notdone';
		$this->data['complete_progress']		= 'notdone';
		$this->data['cart_progress']			= $this->load->view('partials/cart_progress', $this->data, true);
		$this->data['page_title'] 				= 'Registration';
		
		$this->render('site_wide');
	}
	
	function payment()
	{
		$this->data['registration_progress']	= 'done';
		$this->data['payment_progress'] 		= 'done';
		$this->data['complete_progress']		= 'notdone';
		$this->data['cart_progress']			= $this->load->view('partials/cart_progress', $this->data, true);
		$this->data['page_title'] 				= 'Payment';
		
		$this->render('site_wide');
	}
	
	function complete()
	{
		$this->data['registration_progress']	= 'done';
		$this->data['payment_progress'] 		= 'done';
		$this->data['complete_progress']		= 'done';
		$this->data['cart_progress']			= $this->load->view('partials/cart_progress', $this->data, true);
		$this->data['page_title'] 				= 'Complete';
		
		$this->render('site_wide');
	}
		
	
}
