<?php
   class Getmaterialtags extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->model('material_model');
	}
	
	function index()
	{
		$term = $this->input->post('term',TRUE);
		echo json_encode($this->material_model->get_materials(array('material_like'=>$term)));
	}
  }