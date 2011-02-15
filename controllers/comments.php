<?php
class Comments extends Dashboard_Controller
{

	function __construct()
	{
		parent::__construct();	

		$this->load->library('social_tools');
//		$this->load->library('cart_igniter');
		
		$this->data['page_title']		= 'Comments';	
			
	}
	
	function index() 
	{	

		$this->data['sub_title'] 	= 'Cart';
		$this->data['comments']		= $this->social_tools->get_comments('cart');
		
		$this->render();
		
	}


}