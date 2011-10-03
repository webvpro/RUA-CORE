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
   	$this->load->helper('url');
	
	
	//vars configs 
   $data['is_logged_in']=FALSE;
		if ($this->tank_auth->is_logged_in()) {
			$data['is_logged_in']=TRUE;
		}	
		
    $data['current_page']="/home";
	$data['css']="";
	$data['src']="";
	$this->load->view('include/header_main',$data);
	$this->load->view('include/main_nav',$data);
    $this->load->view('home', $data);
	$this->load->view('include/footer_main',$data);
	}
	
} 

/* End of file home.php */
/* Location: ./system/application/controllers/home.php */
?>