<?php
   class Getstate extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->model('country_model');
	}
	
	function index()
	{
		$term = $this->input->post('term',TRUE);
		$country_code = $this->input->post('country_code',TRUE);
		
		echo json_encode($this->country_model->get_state(array('country_code'=>strtoupper($country_code),'state_name_like'=>ucfirst($term))));
	}
  }