<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Cart Igniter Library
*
* @package		Cart Igniter
* @subpackage	Cart Igniter Library
* @author		Brennan Novak
* @link			http://social-igniter.com/pages/modules/cart
*
*
*/
class Cart_igniter
{
	function __construct()
	{
		$this->ci =& get_instance();
		
		// Configs
		$this->ci->load->config('cart');

		// Models
		$this->ci->load->model('cart_model');

		// Libraries
        $this->ci->load->library('cart');

		// Variables
		$this->deed_categories	= $this->ci->config->item('name');
		$this->site_id			= $this->ci->config->item('site_id');
	}	
	
	
	// MASHUPS
	function get_mashup($mashup)
	{
		return $this->ci->cart_model->get_mashup($mashup);
	}

	
	// CLASSES
	function get_class($key, $value)
	{
		return $this->ci->cart_model->get_class($key, $value);
	}
	
	function get_classes($limit)
	{
		return $this->ci->cart_model->get_classes($limit);
	}
	
	function get_classes_category($category_id, $select='*')
	{
		return $this->ci->cart_model->get_classes_category($category_id, $select);
	}


	// CATEGORIES
	function get_categories()
	{
		return $this->ci->cart_model->get_categories();
	}
	
	function get_category_type($region, $category)
	{
		return $this->ci->cart_model->get_category_type($region, $category);
	}	


	// EVENTS
	function get_event($key, $value)
	{
		return $this->ci->cart_model->get_event($key, $value);
	}
	
	function get_class_events($class_id)
	{
		return $this->ci->cart_model->get_class_events($class_id);
	}

	function get_classes_category_events($classes_object)
	{
		$classes_ids = array();
	
		foreach ($classes_object as $class)
		{
			$classes_ids[] = $class->class_id;
		}
	
		return $this->ci->cart_model->get_classes_category_events($classes_ids);
	}
	
	// CLASSES
	function get_locations()
	{
		return $this->ci->cart_model->get_locations();
	}	
	

	// SPECIALS
	function get_specials()
	{
		return $this->ci->cart_model->get_specials();
	}	
	

	// RENDER THINGS
	function render_product_events($events, $time_segment)
	{		
		$this->data['week'] 	 = NULL;
		$this->data['table']	 = NULL;
		$this->data['paragraph'] = NULL;
		$view_table				 = NULL;
		$view_paragraphs 		 = NULL;
		
		$time_segment_array = $this->make_time_segment_array($events, 'DAY');

		// Loop through all time segments
		foreach ($time_segment_array as $time_key => $time_value)
		{
			$time = $time_key + 1;
		
			$this->data['week']			= $time_segment.' '.$time;
			$this->data['table']  		= $this->render_product_category_table($events, $time_value, $time_segment, 'li');
			$this->data['paragraph']	= $this->render_product_category_paragraph($events, $time_value, $time_segment, 'li');
			
			$view_table			.= $this->ci->load->view('/partials/category_events_table', $this->data, true);
			$view_paragraphs	.= $this->ci->load->view('/partials/category_events_paragraphs', $this->data, true);
		}
		
		return array('table' => $view_table, 'paragraphs' => $view_paragraphs);
	}	

	function render_time_segment($time_segment, $time_segment_count, $this_time)
	{
		$result = NULL;
	
		foreach ($time_segment_count as $time_key => $time_value)
		{
			if ($time_value == $this_time)				
			{
				$time = $time_key + 1;
						
				$result	= $time_segment.' '.$time;
				break;
			}
		}

		return $result;			
	}
		
	function render_product_category_table($events, $time_value, $time_segment, $tag)
	{
		$result = NULL;
		
		foreach ($events as $event)
		{
			$this_time = date_parser($time_segment, mysql_to_unix($event->date_start));
			
			if ($time_value == $this_time)
			{
				$result	.= '<'.$tag.'><b>Ages</b> '.$event->age_range.' <a href="'.$event->title_url.'">'.character_limiter($event->title, 45).'</a> '.human_date('SIMPLE', mysql_to_unix($event->date_start)).'</'.$tag.'>';
			}
		}
	
		return $result;
	}	


	function render_product_category_paragraph($events, $time_value, $time_segment, $tag)
	{
		$result = NULL;
		
		foreach ($events as $event)
		{
			$this_time = date_parser($time_segment, mysql_to_unix($event->date_start));
			
			if ($time_value == $this_time)
			{
				$result	.= '<'.$tag.'><b>Ages</b> '.$event->event_price.' '.$event->age_range.' '.human_date('SIMPLE_TIME', mysql_to_unix($event->date_start)).'</'.$tag.'>';
			}
		}
	
		return $result;
	}
	
	
	function render_sidebar_cart()
	{
		$this->data['cart_contents'] = $this->ci->cart->contents();

		return $this->ci->load->view('partials/sidebar_cart', $this->data, true);
	}
	
	
	function render_widget_quad()
	{
		$this->data = '';
	
		return $this->ci->load->view('partials/widget_quad', $this->data, true);
	}

	
	// Makes Week 1 or Day 1 segment from object of events
	function make_time_segment_array($events, $time_segment)
	{
		$periods		= array();
		$this_period	= NULL;
		
		foreach ($events as $event)
		{		
			$this_period = date_parser($time_segment, mysql_to_unix($event->date_start));
			
			if (!in_array($this_period, $periods))
			{
				$periods[] = $this_period;
			}
		}
					
		return $periods;	
	}
	
}