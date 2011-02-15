<?php
class Home extends Dashboard_Controller
{
    function __construct()
    {
        parent::__construct();

		$this->data['page_title'] = 'Cart';

		$this->load->library('social_tools');		
		$this->load->library('cart_igniter');
		$this->load->helper('cart');
	
	}
	
	function index()
	{		
		redirect('home');
	}

	function create()
	{
		// Load Models, Queries, Libraries, Etc.
		$this->data['categories']	= $this->social_tools->get_categories_type('blog');				
		
		// Define Variables, Flags, Etc...	
	   	$user_id					= $this->session->userdata('user_id');	
 	
 		// Validation Rules
	   	$this->form_validation->set_rules('title', 'Title', 'required');	
	   	$this->form_validation->set_rules('content', 'Content', 'required');
	   	$this->form_validation->set_rules('comments_allow', 'Comments', 'required');
	
		// Passes Validation
        if ($this->form_validation->run() == true)
        {		
        	$post_data = array(				
				'parent_id'			=> 0,
				'category_id'		=> $this->input->post('category_id'),
				'module'			=> 'core',
				'type'				=> 'status',
				'source'			=> '',
				'order'				=> 0,
				'user_id'			=> $this->session->userdata('user_id'),
				'title'				=> $this->input->post('title'),
				'title_url'			=> url_username($this->input->post('title'), 'dash', TRUE), 
				'content'			=> $this->input->post('content'),
				'details'			=> '',
				'access'			=> 'E',
				'comments_allow'	=> 'Y',
				'geo_lat'			=> $this->input->post('geo_lat'),
				'geo_long'			=> $this->input->post('geo_long'),
				'geo_accuracy'		=> $this->input->post('geo_accuracy'),				
				'status'			=> form_submit_publish($this->input->post('publish'), $this->input->post('save_draft'))  			
        	);		
        									
			// Insert        		
		    $post = $this->social_igniter->add_content($post_data);
		    
		    // Tags
		    $this->social_tools->process_tags($this->input->post('tags'), $post->content_id);
		    
		    // Activity
			$info = array(
				'site_id'		=> config_item('site_id'),
				'user_id'		=> $this->session->userdata('user_id'),
				'verb'			=> 'post',
				'module'		=> 'blog',
				'type'			=> 'article'
			);
			$data = array(
				'content_id'	=> $post->content_id,
				'title'			=> $this->input->post('title'),
				'url'			=> base_url().'blog/view/'.$post->content_id,
				'description' 	=> character_limiter(strip_tags($this->input->post('content'), ''), config_item('home_description_length'))
			);
		
			$activity = $this->social_igniter->add_activity($info, $data);
		    
		    // Redirect
			redirect(base_url().'home/#item_'.$activity->activity_id);				
		}
		// Does Not Pass Validation
		else 
		{			 			 				
			$this->data['sub_title']		= 'Write';
			$this->data['message']			= validation_errors();
			$this->data['title']			= $this->input->post('title');
			$this->data['price']			= $this->input->post('price');
			
			$this->data['wysiwyg_name']		= 'content';
			$this->data['wysiwyg_id']		= 'wysiwyg';
			$this->data['wysiwyg_class']	= 'wysiwyg_norm_full';
			$this->data['wysiwyg_width']	= 640;
			$this->data['wysiwyg_height']	= 225;
			$this->data['wysiwyg_resize']	= TRUE;
			$this->data['wysiwyg_media']	= FALSE;
			$this->data['wysiwyg_value']	= $this->input->post('content');
			$this->data['wysiwyg']	 		= $this->load->view($this->config->item('dashboard_theme').'/partials/wysiwyg', $this->data, true);

			$this->data['wysiwyg_name']		= 'details';
			$this->data['wysiwyg_id']		= 'wysiwyg_details';
			$this->data['wysiwyg_class']	= 'wysiwyg_norm_full';
			$this->data['wysiwyg_width']	= 640;
			$this->data['wysiwyg_height']	= 200;
			$this->data['wysiwyg_resize']	= TRUE;
			$this->data['wysiwyg_media']	= FALSE;
			$this->data['wysiwyg_value']	= $this->input->post('details');
			$this->data['wysiwyg_details']	= $this->load->view($this->config->item('dashboard_theme').'/partials/wysiwyg', $this->data, true);


			$this->data['comments']			= $this->input->post('comments');
			$this->data['region']			= '';		
								
	 		$this->render();
		}

	}
	
	function events()
	{
	
	
		$this->render();
	}

	
	function products()
	{
	
		$this->render('dashboard_wide');
	}
	
	function purchases()
	{
	
		$this->render();
	}	
	
	
}