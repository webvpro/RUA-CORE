<?php
   class Sellart extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->model('Art_model');
	}
	
	function index()
	{
	}
  }