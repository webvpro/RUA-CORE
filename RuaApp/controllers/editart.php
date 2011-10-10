<?php

class Editart extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
		$this->load->library('security');
		$this->lang->load('tank_auth');
		$this->load->model('Art_model');
 		$this->art_id = $this->uri->segment(2, 0);
		$this->load->model('user_model');
		
		
	}
	
	function index()
	{
	  // config
	  
	    $data['is_logged_in']=FALSE;
		$data['username']=$this->tank_auth->get_username();
		if ($this->tank_auth->is_logged_in()) {
		$data['member_id']=$this->tank_auth->get_user_id();
		$data['art']= $this->Art_model->get_my_item($this->art_id,$data['member_id']);	
		if(is_null($data['art'])){
			redirect('/myaccount');
			
		}
		$_REQUEST['item_id']=$data['art'][0]->id;
		$_REQUEST['item_name']=$data['art'][0]->name;
		$_REQUEST['item_description']=$data['art'][0]->description;
		$_REQUEST['item_reuse_percent']=$data['art'][0]->reuse_percentage;
		$_REQUEST['item_price']=$data['art'][0]->price;
		
		 $data['is_logged_in']=TRUE;
	     $data['current_page']="/home";
		 $data['css']='<link rel="stylesheet" type="text/css" src="/javascript/jquery/uploadify/uploadify.css"/>';
	     $data['src']='<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script><script type="text/javascript" language="javascript" src="/javascript/jquery/alphanumeric/jquery.alphanumeric.pack.js"></script>
	    				<script>
	    					$("#item-name").alphanumeric({allow:"._-"});
	    					$("#item-description").alphanumeric({allow:".,  -_"});
							$("#item-resued-percent").numeric({allow:"."});
							$("#item-price").numeric({allow:"."});
	    				</script>';
		$this->load->view('include/header_main',$data);
		$this->load->view('include/main_nav',$data);
	    $this->load->view('edit_art', $data);
		$this->load->view('include/footer_main',$data);
		} else {
			redirect('/auth/login');
		}
	}
	
	
	
} 

