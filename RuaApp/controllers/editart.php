<?php

class Editart extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
		$this->load->library('security');
		$this->lang->load('tank_auth');
		$this->load->model('Art_model');
 		$this->art_id = $this->uri->segment(2, 0);
		$this->load->model('user_model');
	    $this->load->model('material_model');
		
		
	}
	
	function index()
	{
	  // config
	  
	    $data['is_logged_in']=FALSE;
		$data['username']=$this->tank_auth->get_username();
		if ($this->tank_auth->is_logged_in()) {
		$data['member_id']=$this->tank_auth->get_user_id();
		$data['art']= $this->Art_model->get_my_item($this->art_id,$data['member_id']);
		$data['primary-materials']=$this->material_model->get_art_primary_materials($data['art']->id);
		$data['secondary-materials']=$this->material_model->get_art_secondary_materials($data['art']->id);
		$data['other-materials']=$this->material_model->get_art_other_materials($data['art']->id);
		if (! isset($_POST['item_name'])){
			var_dump($data['art']);
		  $_POST['item_name'] = $data['art']->name;
		  $_POST['item_description'] = $data['art']->description;
		  $_POST['item_reuse_percent'] = $data['art']->reuse_percentage;
		  setlocale(LC_MONETARY, 'en_US');
		  $_POST['item_price'] = money_format('',$data['art']->price);
		  $_POST['gallery'] ='';
		  $_POST['item_quanity'] ='';
		  $_POST['item_height'] ='';
		  $_POST['item_width'] ='';
		  $_POST['item_depth'] ='';
		  $_POST['dim_uom'] ='';
		  $_POST['item_weight'] ='';
		  $_POST['weight_uom'] ='';
		  $_POST['primary_material_ids'] ='';
		  $_POST['secondary_material_ids'] ='';
		  $_POST['other_material_ids'] ='';
		}

		$data['categories']= new ArrayObject;
			foreach($this->Art_model->get_art_categories() as $row)
				{
				  $data['categories'][$row->id] = $row->category;
				}  
		if(is_null($data['art'])){
			redirect('/myaccount');
			
		}
			var_dump($data['art']->name);	
			$data['is_logged_in']=TRUE;
			$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0"); 
			$this->output->set_header("Pragma: no-cache");
			echo "<flushhack></flushhack>";
			
		    $data['current_page']="/editart";
			$data['css']='<link href="/theme/all/css/rua_form.css" type="text/css" rel="stylesheet"></link>';
			$data['src']='<script type="text/javascript" language="javascript" src="/javascript/jquery/alphanumeric/jquery.alphanumeric.pack.js"></script>';
			$this->load->view('include/header_main',$data);
			$this->load->view('include/main_nav',$data);
		    $this->load->view('edit_art', $data);
			$this->load->view('include/footer_main',$data);
		} else {
			redirect('/auth/login');
		}
	}
	
	
	
} 

