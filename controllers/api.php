<?php defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * Cart API : Module : Social-Igniter
 *
 */
class Api extends Oauth_Controller
{
    function __construct()
    {
        parent::__construct(); 
        
        $this->load->helper('cart');
        $this->load->library('cart_igniter');               
	}
	
	// Add Item
	function add_to_cart_post()
	{

		$event	 = $this->cart_igniter->get_event('event_id', $this->input->post('event_id'));
		$product = $this->cart_igniter->get_class('class_id', $event->class_id);
		
		$insert = array(
			'id'		=> $event->event_id,
			'qty'		=> $this->input->post('quantity'),
			'price'		=> $this->cart->format_number(product_price($product)),
			'name'		=> $product->title,
			'options'	=> array(
				'title_url'			=> $product->title_url,
				'time_session'		=> $this->input->post('time_session'),
				'age_range'			=> $this->input->post('age_range'),
				'location_id'		=> $this->input->post('location_id'),
				'category_id'		=> $product->category_id,
				'date_start'		=> $event->date_start
			)
		);
		
		$new_insert = $this->cart->insert($insert);
	
		if ($new_insert)
		{
            $message = array('status' => 'success', 'message' => 'Success ');		
		}
		else
		{
            $message = array('status' => 'error', 'message' => 'Could not find any classes');
		}

        $this->response($message, 200);		
	}
	
	// Update Item
	function add()
	{
		$data = array(
			'rowid'	=> $this->uri->segment(3),
			'qty' 	=> $this->uri->segment(4)
		);
		
		$add = $this->cart->update($data);

		if ($add)
		{
            $message = array('status' => 'success', 'message' => 'Success ');		
		}
		else
		{
            $message = array('status' => 'error', 'message' => 'Could not find any classes');
		}
		
        $this->response($message, 200);	
	}

	function update()
	{
		$data = array(
			'rowid' => 'ceaa6bc378827d07d5a035d6d3687e81',
			'qty' => '2'
		);
		
		if ($this->cart->update($data))
		{
            $message = array('status' => 'success', 'message' => 'Success ');		
		}
        else
        {
            $message = array('status' => 'error', 'message' => 'Could not find any classes');
        }
		

        $this->response($message, 200);
	}
		
	// Removes Item
	function remove_get()
	{
		$update = $this->cart->update(array('rowid' => $this->uri->segment(3), 'qty' => 0));
		
		if ($update)
		{
            $message = array('status' => 'success', 'message' => 'Success');
		}
        else
        {
            $message = array('status' => 'error', 'message' => 'Could not find any classes');
        }

        $this->response($message, 200);		
	}
	
	// Emptys Cart
	function destroy_get()
	{
		$destroy = $this->cart->destroy();

		if ($destroy)
		{
            $message = array('status' => 'success', 'message' => 'Success ');		
		}
		else
		{
            $message = array('status' => 'error', 'message' => 'Could not find any classes');
		}
		
        $this->response($message, 200);		
	}
	
}