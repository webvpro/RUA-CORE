<?php

class Myart extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
		$this->load->library('security');
		$this->lang->load('tank_auth');
		$this->load->model('Art_model');
 		$this->load->model('user_model');
		
		
	}
	
	function index()
	{
	  // config
	  
	    $data['is_logged_in']=FALSE;
		
		if ($this->tank_auth->is_logged_in()) {
		$data['member_id']=$this->tank_auth->get_user_id();
		$data['username']=$this->tank_auth->get_username();	
		$data['art_items']= (object) $this->Art_model->get_member_art($data['member_id']);
		
		$data['is_logged_in']=TRUE;
	    $data['current_page']="/home";
		$data['css']='<link rel="stylesheet" type="text/css" href="/theme/all/css/myart.css"/>';
	    $data['src']='';
		$this->load->view('include/header_main',$data);
		$this->load->view('include/main_nav',$data);
	    $this->load->view('my_art', $data);
		$this->load->view('include/footer_main',$data);
		} else {
			redirect('/auth/login');
		}
	}
	
	
	
} 

