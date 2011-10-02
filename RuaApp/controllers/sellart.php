<?php

class Sellart extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->lang->load('tank_auth');
	}
	
	function index()
	{
	  // config
		if ($this->tank_auth->is_logged_in()) {	
		
			
	    $data['current_page']="/sellart";
		$this->load->view('include/header_main',$data);
		$this->load->view('include/main_nav',$data);
	    $this->load->view('sell_art', $data);
		$this->load->view('include/footer_main',$data);
		} else {
			redirect('/auth/login');
		}
	}
	
} 

?>