<?php
class Temp_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

		// FOR TEMPORARY
		$this->db_village = $this->load->database('village', TRUE);        
    }
    
    
    // MASHUPS
    function get_mashup($mashup='earth')
    {
 		$this->db_village->select('mashups.*, categories.category, categories.category_url, categories.region AS category_region, categories.short AS category_short, classes.title, classes.title_url, classes.category_id AS class_category_id, classes.region AS class_region, classes.snippet');
 		$this->db_village->from('mashups'); 
		$this->db_village->join('categories', 'categories.category_id = mashups.featured_category_id');
		$this->db_village->join('classes', 'classes.class_id = mashups.featured_class_id');
 		$this->db_village->where('mashup', $mashup);
		$this->db_village->limit(1);
 		return $this->db_village->get()->row();
    }
    

	// CATEGORIES
    function get_categories()
    {
 		$this->db_village->select('*');
 		$this->db_village->from('categories');    
 		$this->db_village->order_by('category_id', 'desc'); 
 		$result = $this->db_village->get();
 		return $result->result();	      
    }

    function get_category_type($region, $category)
    {
 		$this->db_village->select('*');
 		$this->db_village->from('categories'); 
 		$this->db_village->where('region', $region);
 		$this->db_village->where('category_url', $category);
		$this->db_village->limit(1);
 		return $this->db_village->get()->row();
    }


	// CLASSES 
	function get_class($key, $value)
	{
 		$this->db_village->select('*');
 		$this->db_village->from('classes');    
 		$this->db_village->join('categories', 'categories.category_id = classes.category_id'); 
 		$this->db_village->join('specials', 'specials.special_id = classes.special_id');
 		$this->db_village->where($key, $value);				
		$this->db_village->limit(1);    
 		return $this->db_village->get()->row();	
	}
	
	function get_classes($limit)
	{		
 		$this->db_village->select('*');
 		$this->db_village->from('classes');    
 		$this->db_village->join('categories', 'categories.category_id = classes.category_id'); 				
 		$this->db_village->order_by('classes.title', 'desc'); 
		$this->db_village->limit($limit);    
 		$result = $this->db_village->get();	
 		return $result->result();		 
	}
	
	function get_classes_category($category_id, $select)
	{
 		$this->db_village->select($select);
 		$this->db_village->from('classes');
 		$this->db_village->where('category_id', $category_id);
 		// NEEDS TO BE CHANGED TO 'A'
 		$this->db_village->where('status', 'Available');
 		$this->db_village->order_by('age_range', 'asc');
 		$result = $this->db_village->get();	
 		return $result->result();
	}

	// EVENTS
	function get_event($key, $value)
	{
 		$this->db_village->select('*');
 		$this->db_village->from('events'); 
 		$this->db_village->where($key, $value);
		$this->db_village->limit(1);
 		return $this->db_village->get()->row();
	}

	function get_class_events($class_id)
	{		
 		$this->db_village->select('*');
 		$this->db_village->from('events');    
 		$this->db_village->join('geolocations', 'geolocations.geolocation_id = events.geolocation_id');
 		$this->db_village->where('class_id', $class_id); 				
 		$this->db_village->order_by('events.date_start', 'asc'); 
 		$this->db_village->order_by('events.age_range', 'asc'); 
 		$result = $this->db_village->get();	
 		return $result->result();		 
	}	
	
	function get_classes_category_events($classes_ids)
	{
 		$this->db_village->select('classes.title, classes.title_url, events.class_id, events.date_start, events.date_end, events.event_price, events.age_range');
 		$this->db_village->from('events');    
 		$this->db_village->join('classes', 'classes.class_id = events.class_id');
 		$this->db_village->where('events.date_start >=', unix_to_mysql(now()));	
		$this->db_village->where_in('events.class_id', $classes_ids);
 		$this->db_village->order_by('events.date_start', 'asc'); 
 		$this->db_village->order_by('events.age_range', 'asc');
 		$result = $this->db_village->get();
 		return $result->result();
	}
	
	// LOCATIONS
	function get_locations()
	{		
 		$this->db_village->select('*');
 		$this->db_village->from('geolocations');    
 		$result = $this->db_village->get();	
 		return $result->result();		 
	}		
	
	// SPECIALS
	function get_specials()
	{
 		$this->db_village->select('*');
 		$this->db_village->from('specials');
 		$this->db_village->where('status', 'Active');
 		$this->db_village->order_by('special_id', 'asc'); 
 		$result = $this->db_village->get();
		return $result->result();
	}

	

}