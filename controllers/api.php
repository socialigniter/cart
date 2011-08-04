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
	
		if ($new_insert = $this->cart->insert($insert))
		{
            $message = array('status' => 'success', 'message' => 'Success item added to cart', 'data' => array('items' => $this->cart->total_items(), 'total' => $this->cart->total()));		
		}
		else
		{
            $message = array('status' => 'error', 'message' => 'Could not find any classes');
		}

        $this->response($message, 200);		
	}
	
	// Update Item
	function add_get()
	{
		$data = array(
			'rowid'	=> $this->get('id'),
			'qty' 	=> $this->get('quantity')
		);
		
		$add = $this->cart->update($data);

		if ($add)
		{
            $message = array('status' => 'success', 'message' => 'Yay, your item was added to cart');		
		}
		else
		{
            $message = array('status' => 'error', 'message' => 'Could not find any classes');
		}
		
        $this->response($message, 200);	
	}

	function update_get()
	{		
		if ($update = $this->cart->update(array('rowid'	=> $this->get('id'), 'qty' => $this->get('quantity'))))
		{
            $message = array('status' => 'success', 'message' => 'Yah, your cart was updated');		
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
		if ($update = $this->cart->update(array('rowid' => $this->get('id'), 'qty' => 0)))
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
		$this->cart->destroy();
        $message = array('status' => 'success', 'message' => 'Your cart has been emptied');		
        $this->response($message, 200);
	}
	
}