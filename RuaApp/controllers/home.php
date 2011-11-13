<?php

class Home extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();	
	}
	
	function index()
	{
	  // config
	$this->config->load('JavaScriptPaths');
   	$this->load->helper(array('form', 'url'));
	$this->load->model('user_model');
	
	//vars configs 
   $data['is_logged_in']=FALSE;
		if ($this->tank_auth->is_logged_in()) {
			$data['is_logged_in']=TRUE;
		}	
		
    $data['current_page']="/home";
	$data['css']="";
	$data['src']="";
	$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0"); 
	$this->output->set_header("Pragma: no-cache");
	$this->load->view('include/header_main',$data);
	$this->load->view('include/main_nav',$data);
    $this->load->view('home', $data);
	$this->load->view('include/footer_main',$data);
	}
	
} 

/* End of file home.php */
/* Location: ./system/application/controllers/home.php */
?>