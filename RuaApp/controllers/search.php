<?php

class Search extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();	
	}
	
	function index()
	{
	  // config
	$this->config->load('JavaScriptPaths');
   	$this->load->helper(array('form', 'url'));
	$this->load->library('form_validation');
	$this->load->model('country_model');
	$this->load->model('user_model');
	$this->load->model('art_model');
	//vars configs 
   $data['is_logged_in']=FALSE;
		if ($this->tank_auth->is_logged_in()) {
			$data['is_logged_in']=TRUE;
		}	
		
    $data['current_page']="/home";
	$data['css']='<link rel="stylesheet" type="text/css" href="/theme/all/css/art.results.css" />';
	$data['src']="";
	$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0"); 
	$this->output->set_header("Pragma: no-cache");
	$this->load->view('include/header_main',$data);
	$this->load->view('include/main_nav',$data);
	$search_type = $this->input->post('search_type',TRUE);
	//var_dump($_POST);
	if(isset($search_type)){
		switch ($search_type) {
			case 'quick':
				
				$price_range=explode("-", $this->input->post('search_price_range',TRUE));
				$resued_percent_range=explode("-", $this->input->post('search_percent_range',TRUE));
				
				$params =array('search_type'=>'quick'
								,'price_range_low'=>trim($price_range[0])
								,'price_range_high'=>trim($price_range[1])
								,'resued_percent_range_low'=>trim($resued_percent_range[0])
								,'resued_percent_range_high'=>trim($resued_percent_range[1])
								,'primary_materials'=>$this->input->post('search_material_ids',TRUE)
								,'keywords'=>$this->input->post('search_keyword_ids',TRUE));
				break;
			default:
				$params =array();
				break;
		}
		$data['art_items']= (object) $this->art_model->get_full_art($params);
		
	}
	
    $this->load->view('art_search', $data);
	
	$this->load->view('include/footer_main',$data);
	}
	
} 

/* End of file home.php */
/* Location: ./system/application/controllers/home.php */
?>