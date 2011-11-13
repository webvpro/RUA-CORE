<?php
   class Getcountries extends CI_Controller {
		
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
		echo json_encode($this->country_model->get_country(array('country_like'=>ucfirst($term))));
	}
  }