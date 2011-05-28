<?php
class Cart extends Site_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->helper('cart');
        $this->load->library('cart_igniter');
    }
    
    function index()
    {
    	$this->data['products']		= $this->social_igniter->get_content_view('module', 'cart');
    	$this->data['page_title']	= 'Cart';
    
    	$this->render();
    }
	
	/* Checkout Steps */
	function checkout()
	{
		$this->data['registration_progress']	= 'notdone';
		$this->data['payment_progress'] 		= 'notdone';
		$this->data['complete_progress']		= 'notdone';
		$this->data['cart_progress']			= $this->load->view('partials/cart_progress', $this->data, true);
		$this->data['contents'] 				= $this->cart->contents();
		$this->data['page_title'] 				= 'Your Cart';
		
		$this->render('wide');
	}
		
	function registration()
	{
		$this->data['registration_progress']	= 'done';
		$this->data['payment_progress'] 		= 'notdone';
		$this->data['complete_progress']		= 'notdone';
		$this->data['cart_progress']			= $this->load->view('partials/cart_progress', $this->data, true);
		$this->data['page_title'] 				= 'Registration';
		
		$this->render('wide');
	}
	
	function payment()
	{
		$this->data['registration_progress']	= 'done';
		$this->data['payment_progress'] 		= 'done';
		$this->data['complete_progress']		= 'notdone';
		$this->data['cart_progress']			= $this->load->view('partials/cart_progress', $this->data, true);
		$this->data['page_title'] 				= 'Payment';
		
		$this->render('wide');
	}
	
	function complete()
	{
		$this->data['registration_progress']	= 'done';
		$this->data['payment_progress'] 		= 'done';
		$this->data['complete_progress']		= 'done';
		$this->data['cart_progress']			= $this->load->view('partials/cart_progress', $this->data, true);
		$this->data['page_title'] 				= 'Complete';
		
		$this->render('wide');
	}
		
	/* Widgets */
	function widgets_your_cart()
	{
		$this->data['cart_contents'] = $this->cart->contents();
		
		$this->load->view('widgets/your_cart', $this->data);
	}
	
}
