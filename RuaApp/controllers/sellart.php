<?php

class Sellart extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->library('security');
			$this->lang->load('tank_auth');
			$this->load->model('Art_model');
			$this->load->model('material_model');
			
	}
	
	function index()
	{
	  // config
	    $data['is_logged_in']=FALSE;
		$data['username']=$this->tank_auth->get_username();
		$data['categories']= new ArrayObject;
			foreach($this->Art_model->get_art_categories() as $row)
				{
				  $data['categories'][$row->id] = $row->category;
				}  
		if ($this->tank_auth->is_logged_in()) {	
		 $data['materials']=$this->material_model->get_materials();
		
		 $data['is_logged_in']=TRUE;
		 $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0"); 
			$this->output->set_header("Pragma: no-cache");
	     $data['current_page']="/home";
		  $data['css']='<link href="/theme/all/css/rua_form.css" type="text/css" rel="stylesheet"></link><link href="/theme/all/css/editart.css" type="text/css" rel="stylesheet"></link>';
		 $data['src']='<script type="text/javascript" language="javascript" src="/javascript/jquery/alphanumeric/jquery.alphanumeric.pack.js"></script>';
		
		$this->load->view('include/header_main',$data);
		echo "<flushhack />";
		$this->load->view('include/main_nav',$data);
	    $this->load->view('sell_art', $data);
		$this->load->view('include/footer_main',$data);
		} else {
			redirect('/auth/login');
		}
	}
	
	function createitem()
	{
		$data['is_logged_in']=FALSE;
		
		if ($this->tank_auth->is_logged_in()) {	
			$data['is_logged_in']=TRUE;
			$data['username']=$this->tank_auth->get_username();
			$data['member_id']=$this->tank_auth->get_user_id();
			$this->form_validation->set_rules('item_name', 'Item Name', 'required');
			$this->form_validation->set_rules('item_reuse_percent', 'ReUse %', 'required');
			$this->form_validation->set_rules('item_price', 'Item Price', 'required');
			if ($this->form_validation->run() == FALSE)
			{
			$data['is_logged_in']=TRUE;
			$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0"); 
			$this->output->set_header("Pragma: no-cache");
	     	$data['current_page']="/home";
		 	$data['css']='<link rel="stylesheet" type="text/css" src="/theme/all/css/editart.css"/>';
	     	$data['src']='</script><script type="text/javascript" language="javascript" src="/javascript/jquery/alphanumeric/jquery.alphanumeric.pack.js"></script>
	    				<script>
	    					$("#item-name").alphanumeric({allow:"._-"});
	    					$("#item-description").alphanumeric({allow:".,  -_"});
							$("#item-resue-percent").numeric({allow:"."});
							$("#item-price").numeric({allow:"."});
	    				</script>';
			$this->load->view('include/header_main',$data);
			$this->load->view('include/main_nav',$data);
	    	$this->load->view('sell_art', $data);
			$this->load->view('include/footer_main',$data);
			} else {
				
				$rs= $this->Art_model->add_art(array('artist_id' => $data['member_id'],
														'name'=>$_REQUEST['item_name'],
														'description'=>$_REQUEST['item_description'],
														'reuse_percentage'=>$_REQUEST['item_reuse_percent'],
														'price'=>$_REQUEST['item_price'] ));
				
														
				redirect('/editart/'.$rs, 'refresh');
			}
		}else{
			redirect('/auth/login');
		}
	}
	
} 

