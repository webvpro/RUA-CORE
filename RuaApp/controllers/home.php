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
   	$this->config->load('APIKeys');
	$this->load->helper('url');
	  //libs
    $this->load->library('gfc_connect');
    $this->load->library('twitter');
    $this->load->library('facebook_connect');
    //models
   $this->load->model('Member_auth');  
     
    //vars configs 
   
		
    $data['current_page']="/home";
	$this->load->view('include/header_main',$data);
    $this->load->view('include/main_nav',$data);
	$this->load->view('include/footer_main',$data);
	}
	
} 

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>