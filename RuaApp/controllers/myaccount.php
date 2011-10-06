<?php

class Myaccount extends CI_Controller {
    
  function __construct()
	{
			parent::__construct();
			$this->config->load('JavaScriptPaths');
   			$this->load->helper('url');
			$this->load->helper('url');
			$this->load->library('security');
			$this->lang->load('tank_auth');
			$this->load->model('user_model');
			//vars configs 
   			
		
    		
		
	}
	
	
	function index()
	{
			$data['is_logged_in']=FALSE;
			if ($this->tank_auth->is_logged_in()) {
				$data['is_logged_in']=TRUE;
			}		
			
			if($data['is_logged_in']){
				$data['user']=$this->user_model->get_user($this->tank_auth->get_user_id()); 
				$data['current_page']="/myaccount";
				$data['css']="";
				$data['src']="";
				$data['footer_src']="";
				$this->load->view('include/header_main',$data);
				$this->load->view('include/main_nav',$data);
				//$this->load->view('home', $data);
				$this->load->view('include/footer_main',$data);
			} else {
				redirect('');
			}
    }
    function update()
    {
    	$data['is_logged_in']=FALSE;
		if ($this->tank_auth->is_logged_in()) {
			$data['is_logged_in']=TRUE;
		}	
    	if($data['is_logged_in']){
	  	 	$data['current_page']="/myaccount";
			$data['css']="";
			$data['src']="";
			$data['footer_src']="";
			$this->load->view('include/header_main',$data);
			$this->load->view('include/main_nav',$data);
	   		//$this->load->view('home', $data);
			$this->load->view('include/footer_main',$data);
  	 	} else {
			redirect('');
		}
    }
}