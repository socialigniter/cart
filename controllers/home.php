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

	function basic()
	{
		// Load Models, Queries, Libraries, Etc.		
		if (($this->uri->segment(3) == 'manage') && ($this->uri->segment(4)))
		{
			// Need is valid & access and such
			$product		= $this->social_igniter->get_content($this->uri->segment(4));
			$product_meta	= $this->social_igniter->get_meta_content($product->content_id);
				
			// Non Form Fields
			$this->data['sub_title']		= $product->title;
			$this->data['form_url']			= base_url().'api/content/modify/id/'.$this->uri->segment(4);
			
			// Form Fields
			$this->data['title'] 			= $product->title;
			$this->data['title_url'] 		= $product->title_url;
			$this->data['wysiwyg_value']	= $product->content;
			$this->data['category_id']		= $product->category_id;
			$this->data['access']			= $product->access;
			$this->data['comments_allow']	= $product->comments_allow;
			$this->data['status']			= display_content_status($product->status, $product->approval);

			// Meta Content
			$this->data['excerpt']			= $this->social_igniter->find_meta_content_value('excerpt', $product_meta);	
			$this->data['price']			= $this->social_igniter->find_meta_content_value('price', $product_meta);					
		}
		else
		{		
			// Non Form Fields
			$this->data['sub_title']		= 'Write';
			$this->data['form_url']			= base_url().'api/content/create';
			
			// Form Fields
			$this->data['title'] 			= '';
			$this->data['title_url']		= '';
			$this->data['wysiwyg_value']	= $this->input->post('content');
			$this->data['category_id']		= '';
			$this->data['access']			= 'E';
			$this->data['comments_allow']	= '';
			$this->data['status']			= display_content_status('U');
			
			// Meta Content
			$this->data['excerpt']			= '';	
			$this->data['price']			= '';				
		}		

		$this->data['wysiwyg_name']			= 'content';
		$this->data['wysiwyg_id']			= 'wysiwyg_content';
		$this->data['wysiwyg_class']		= 'wysiwyg_norm_full';
		$this->data['wysiwyg_width']		= 640;
		$this->data['wysiwyg_height']		= 300;
		$this->data['wysiwyg_resize']		= TRUE;
		$this->data['wysiwyg_media']		= FALSE;			
		$this->data['wysiwyg']	 			= $this->load->view($this->config->item('dashboard_theme').'/partials/wysiwyg', $this->data, true);
		$this->data['categories'] 			= $this->social_tools->make_categories_dropdown('module', 'cart', $this->session->userdata('user_id'), $this->session->userdata('user_level_id'));

		$this->data['form_module']			= 'cart';
		$this->data['form_type']			= 'product';		
		$this->data['form_name']			= 'product_editor';
		$this->data['toolbar_steps']		= $this->load->view('../modules/cart/views/partials/toolbar_steps', $this->data, true);
	 	$this->data['content_publisher'] 	= $this->social_igniter->make_content_publisher($this->data, 'form');

 		$this->render('dashboard_wide');
	}
	
	function media()
	{
		// If Not Class Exists
		if (!$this->uri->segment(4)) redirect('home/cart/create', 'refresh');
		$product = $this->social_igniter->get_content($this->uri->segment(4));
		if (!$product) redirect('home/cart/create', 'refresh');
		$product_meta = $this->social_igniter->get_meta_content($product->content_id);

		// Gets Gallery Category
		$category = $this->classes_igniter->get_class_image_album();

		// Gets Media Gallery
		if ($media_gallery = json_decode($this->social_igniter->find_meta_content_value('media_gallery', $product_meta)))
		{	
			if (property_exists($media_gallery, 'gallery'))
			{
				$this->data['media_gallery']	= $media_gallery->gallery;
			}
			else
			{
				$this->data['media_gallery']	= '';
			}
		}
		else
		{
			$this->data['media_gallery']	= NULL;
		}
				
		// Non Form Fields
		$this->data['sub_title']			= 'Media';		
		$this->data['class']				= $product;
		$this->data['form_url']				= base_url().'api/cart/media/id/'.$this->uri->segment(4);
		$this->data['category_id']			= $category->category_id;

		$this->data['status']				= display_content_status($product->status, $product->approval);
		$this->data['toolbar_steps']		= $this->load->view('../modules/classes/views/partials/toolbar_steps', $this->data, true);	
	 	$this->data['content_publisher'] 	= $this->social_igniter->make_content_publisher($this->data, 'button', $this->uri->segment(4));
	
		$this->render('dashboard_wide');
	}

	
	function details()
	{
		if (!$this->uri->segment(4)) redirect('home/cart/create', 'refresh');

		// Need to check content is valid & access and such
		$product			= $this->social_igniter->get_content($this->uri->segment(4));
		$product_meta 	= $this->social_igniter->get_meta_content($product->content_id);

		// Non Form Fields
		$this->data['sub_title']			= 'Details';
		$this->data['class']				= $this->social_igniter->get_content($this->uri->segment(4));
		$this->data['form_url']				= base_url().'api/classes/details/id/'.$this->uri->segment(4);
		
		// Key Details
		$this->data['wysiwyg_name']			= 'key_details';
		$this->data['wysiwyg_id']			= 'wysiwyg_key';
		$this->data['wysiwyg_class']		= 'wysiwyg_norm_full';
		$this->data['wysiwyg_width']		= 625;
		$this->data['wysiwyg_height']		= 225;
		$this->data['wysiwyg_resize']		= TRUE;
		$this->data['wysiwyg_media']		= FALSE;
		$this->data['wysiwyg_value']		= $this->social_igniter->find_meta_content_value('key_details', $product_meta);
		$this->data['wysiwyg_key_details']	= $this->load->view($this->config->item('dashboard_theme').'/partials/wysiwyg', $this->data, true);

		// Deliverables
		$this->data['deliverables']			= $this->social_igniter->find_meta_content_value('deliverables', $product_meta);
				
		$this->data['status']				= display_content_status($product->status, $product->approval);
		$this->data['toolbar_steps']		= $this->load->view('../modules/cart/views/partials/toolbar_steps', $this->data, true);	
	 	$this->data['content_publisher'] 	= $this->social_igniter->make_content_publisher($this->data, 'button', $this->uri->segment(4));

		$this->render('dashboard_wide');
	
	}
	
	function purchases()
	{
	
		$this->render();
	}	
	
	
}