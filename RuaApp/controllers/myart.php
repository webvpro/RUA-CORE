<?php

class Myart extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->library('security');
			$this->load->model('Art_model');
 			$this->load->model('user_model');
		
		
	}
	
	function index()
	{
	  // config
	  
	    $data['is_logged_in']=FALSE;
		//var_dump($this->Art_model->get_full_art());
		if ($this->tank_auth->is_logged_in()) {
		$data['member_id']=$this->tank_auth->get_user_id();
		$data['username']=$this->tank_auth->get_username();	
		$data['art_items']= (object) $this->Art_model->get_full_art(array('ai.artist_id'=>$data['member_id']));
		
		$data['is_logged_in']=TRUE;
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0"); 
		$this->output->set_header("Pragma: no-cache");
	    $data['current_page']="/myart";
		$data['css']='<link rel="stylesheet" type="text/css" href="/theme/all/css/myart.css"/>';
	    $data['src']='<script src="/javascript/jquery/jqueryform/jquery.form-2.86.js"></script>
				<script type="text/javascript" language="javascript" src="/javascript/apps/myart.js"></script>';
		$this->load->view('include/header_main',$data);
		$this->load->view('include/main_nav',$data);
	    $this->load->view('my_art', $data);
		$this->load->view('include/footer_main',$data);
		} else {
			redirect('/auth/login');
		}
	}
	
	
	
} 

