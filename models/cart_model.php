<?php

class Cart_model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }
    
    // MASHUPS
    function get_mashup($mashup='earth')
    {
 		$this->db->select('mashups.*, categories.category, categories.category_url, categories.region AS category_region, categories.short AS category_short, classes.title, classes.title_url, classes.category_id AS class_category_id, classes.region AS class_region, classes.snippet');
 		$this->db->from('mashups'); 
		$this->db->join('categories', 'categories.category_id = mashups.featured_category_id');
		$this->db->join('classes', 'classes.class_id = mashups.featured_class_id');
 		$this->db->where('mashup', $mashup);
		$this->db->limit(1);
 		return $this->db->get()->row();
    }
    

	// CATEGORIES
    function get_categories()
    {
 		$this->db->select('*');
 		$this->db->from('categories');    
 		$this->db->order_by('category_id', 'desc'); 
 		$result = $this->db->get();
 		return $result->result();	      
    }

    function get_category_type($region, $category)
    {
 		$this->db->select('*');
 		$this->db->from('categories'); 
 		$this->db->where('region', $region);
 		$this->db->where('category_url', $category);
		$this->db->limit(1);
 		return $this->db->get()->row();
    }


	// CLASSES 
	function get_class($key, $value)
	{
 		$this->db->select('*');
 		$this->db->from('classes');    
 		$this->db->join('categories', 'categories.category_id = classes.category_id'); 
 		$this->db->join('specials', 'specials.special_id = classes.special_id');
 		$this->db->where($key, $value);				
		$this->db->limit(1);    
 		return $this->db->get()->row();	
	}
	
	function get_classes($limit)
	{		
 		$this->db->select('*');
 		$this->db->from('classes');    
 		$this->db->join('categories', 'categories.category_id = classes.category_id'); 				
 		$this->db->order_by('classes.title', 'desc'); 
		$this->db->limit($limit);    
 		$result = $this->db->get();	
 		return $result->result();		 
	}
	
	function get_classes_category($category_id, $select)
	{
 		$this->db->select($select);
 		$this->db->from('classes');
 		$this->db->where('category_id', $category_id);
 		// NEEDS TO BE CHANGED TO 'A'
 		$this->db->where('status', 'Available');
 		$this->db->order_by('age_range', 'asc');
 		$result = $this->db->get();	
 		return $result->result();
	}

	// EVENTS
	function get_event($content_id)
	{
 		$this->db->select('*');
 		$this->db->from('events'); 
 		$this->db->where($key, $value);
		$this->db->limit(1);
 		return $this->db->get()->row();
	}

	function get_class_events($class_id)
	{		
 		$this->db->select('*');
 		$this->db->from('events');    
 		$this->db->join('geolocations', 'geolocations.geolocation_id = events.geolocation_id');
 		$this->db->where('class_id', $class_id); 				
 		$this->db->order_by('events.date_start', 'asc'); 
 		$this->db->order_by('events.age_range', 'asc'); 
 		$result = $this->db->get();	
 		return $result->result();		 
	}	
	
	function get_classes_category_events($classes_ids)
	{
 		$this->db->select('classes.title, classes.title_url, events.class_id, events.date_start, events.date_end, events.event_price, events.age_range');
 		$this->db->from('events');    
 		$this->db->join('classes', 'classes.class_id = events.class_id');
 		$this->db->where('events.date_start >=', unix_to_mysql(now()));	
		$this->db->where_in('events.class_id', $classes_ids);
 		$this->db->order_by('events.date_start', 'asc'); 
 		$this->db->order_by('events.age_range', 'asc');
 		$result = $this->db->get();
 		return $result->result();
	}
	
	// LOCATIONS
	function get_locations()
	{		
 		$this->db->select('*');
 		$this->db->from('geolocations');    
 		$result = $this->db->get();	
 		return $result->result();		 
	}		
	
	// SPECIALS
	function get_specials()
	{
 		$this->db->select('*');
 		$this->db->from('specials');
 		$this->db->where('status', 'Active');
 		$this->db->order_by('special_id', 'asc'); 
 		$result = $this->db->get();
		return $result->result();
	}
    
    
}