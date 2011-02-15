<?php
class Settings extends Dashboard_Controller 
{

    function __construct() 
    {
        parent::__construct();

		$this->load->library('cart_igniter');

		$this->data['page_title']	= 'Settings';
    }

	function index()
	{
		if ($this->data['level'] > 1) redirect('home');

		$this->data['sub_title'] = 'Cart';
		$this->render();
	}

}