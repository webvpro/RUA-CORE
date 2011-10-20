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
		
		$data['primary_material_labels']= $this->make_tag_label_array($data['primary-materials']);
		$data['secondary_material_labels']= $this->make_tag_label_array($data['secondary-materials']);
		$data['other_material_labels']= $this->make_tag_label_array($data['other-materials']);
		if (! isset($_POST['item_name'])){
		  $_POST['item_name'] = $this->input->post('item_name',TRUE);
		  $_POST['item_description'] = $this->input->post('item_description',TRUE);
		  $_POST['item_reuse_percent'] = $this->input->post('item_reuse_percent',TRUE);
		  setlocale(LC_MONETARY, 'en_US');
		  $_POST['item_price'] = sprintf("%01.2f",$this->input->post('item_price',TRUE));
		  $_POST['gallery'] ='';
		  $_POST['item_quanity'] =$this->input->post('item_quanity',TRUE);
		  $_POST['item_height'] =$this->input->post('item_height',TRUE);
		  $_POST['item_width'] =$this->input->post('item_width',TRUE);
		  $_POST['item_depth'] =$this->input->post('item_depth',TRUE);
		  $_POST['dim_uom'] =$this->input->post('dim_uom',TRUE);
		  $_POST['item_weight'] =$this->input->post('item_weight',TRUE);
		  $_POST['weight_uom'] =$this->input->post('weight_uom',TRUE);
		  $_POST['primary_material_ids'] =$this->input->post('primary_material_ids',TRUE);
		  $_POST['secondary_material_ids'] =$this->input->post('primary_material_ids',TRUE);
		  $_POST['other_material_ids']  =$this->input->post('primary_material_ids',TRUE);
		 
		}

		$data['categories']= new ArrayObject;
			foreach($this->Art_model->get_art_categories() as $row)
				{
				  $data['categories'][$row->id] = $row->category;
				}  
		if(is_null($data['art'])){
			redirect('/myaccount');
			
		}
			$data['is_logged_in']=TRUE;
			$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0"); 
			$this->output->set_header("Pragma: no-cache");
			$data['current_page']="/editart";
			$data['css']='<link href="/theme/all/css/rua_form.css" type="text/css" rel="stylesheet"></link><link href="/theme/all/css/editart.css" type="text/css" rel="stylesheet"></link>';
			$data['src']='<script type="text/javascript" language="javascript" src="/javascript/jquery/alphanumeric/jquery.alphanumeric.pack.js"></script><script src="/javascript/apps/editart.js"></script>';
			$this->load->view('include/header_main',$data);
			$this->load->view('include/main_nav',$data);
		    $this->load->view('edit_art', $data);
			$this->load->view('include/footer_main',$data);
		} else {
			redirect('/auth/login');
		}
	}
	function updateitem()
	{
	  // config
	  
	    $data['is_logged_in']=FALSE;
		$data['username']=$this->tank_auth->get_username();
		if ($this->tank_auth->is_logged_in()) {
		$data['member_id']=$this->tank_auth->get_user_id();
		$this->form_validation->set_rules('item_name', 'Item Name', 'required');
			$this->form_validation->set_rules('item_reuse_percent', 'ReUse %', 'required');
			$this->form_validation->set_rules('item_price', 'Item Price', 'required');
			$this->form_validation->set_rules('item_quanity', 'Item Quanity', 'required');
			if ($this->form_validation->run() == FALSE)
			{
					
						
				$_POST['item_name'] = $data['art']->name;
				$_POST['item_description'] = $data['art']->description;
				$_POST['item_reuse_percent'] = $data['art']->reuse_percentage;
				setlocale(LC_MONETARY, 'en_US');
				$_POST['item_price'] = sprintf("%01.2f",$data['art']->price);
				$_POST['gallery'] ='';
				$_POST['item_quanity'] =$data['art']->quanity;
				$_POST['item_height'] =$data['art']->height;
				$_POST['item_width'] =$data['art']->width;
				$_POST['item_depth'] =$data['art']->depth;
				$_POST['dim_uom'] =$data['art']->dim_uom;
				$_POST['item_weight'] =$data['art']->weight;
				$_POST['weight_uom'] =$data['art']->weight_uom;
				$_POST['primary_material_ids'] =$this->make_tag_id_list($data['primary-materials']);
				$_POST['secondary_material_ids'] =$this->make_tag_id_list($data['secondary-materials']);
				$_POST['other_material_ids']  =$this->make_tag_id_list($data['other-materials']);
				
				
			}
		$data['art']= $this->Art_model->get_my_item($this->art_id,$data['member_id']);
		$data['primary-materials']=$this->material_model->get_art_primary_materials($data['art']->id);
		$data['secondary-materials']=$this->material_model->get_art_secondary_materials($data['art']->id);
		$data['other-materials']=$this->material_model->get_art_other_materials($data['art']->id);
		
		$data['primary_material_labels']= $this->make_tag_label_array($data['primary-materials']);
		$data['secondary_material_labels']= $this->make_tag_label_array($data['secondary-materials']);
		$data['other_material_labels']= $this->make_tag_label_array($data['other-materials']);
		if (! isset($_POST['item_name'])){
		  $_POST['item_name'] = $data['art']->name;
		  $_POST['item_description'] = $data['art']->description;
		  $_POST['item_reuse_percent'] = $data['art']->reuse_percentage;
		  setlocale(LC_MONETARY, 'en_US');
		  $_POST['item_price'] = sprintf("%01.2f",$data['art']->price);
		  $_POST['gallery'] ='';
		  $_POST['item_quanity'] =$data['art']->quanity;
		  $_POST['item_height'] =$data['art']->height;
		  $_POST['item_width'] =$data['art']->width;
		  $_POST['item_depth'] =$data['art']->depth;
		  $_POST['dim_uom'] =$data['art']->dim_uom;
		  $_POST['item_weight'] =$data['art']->weight;
		  $_POST['weight_uom'] =$data['art']->weight_uom;
		  $_POST['primary_material_ids'] =$this->make_tag_id_list($data['primary-materials']);
		  $_POST['secondary_material_ids'] =$this->make_tag_id_list($data['secondary-materials']);
		  $_POST['other_material_ids']  =$this->make_tag_id_list($data['other-materials']);
		 
		}

		$data['categories']= new ArrayObject;
			foreach($this->Art_model->get_art_categories() as $row)
				{
				  $data['categories'][$row->id] = $row->category;
				}  
		if(is_null($data['art'])){
			redirect('/myaccount');
			
		}
			$data['is_logged_in']=TRUE;
			$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0"); 
			$this->output->set_header("Pragma: no-cache");
			$data['current_page']="/editart";
			$data['css']='<link href="/theme/all/css/rua_form.css" type="text/css" rel="stylesheet"></link><link href="/theme/all/css/editart.css" type="text/css" rel="stylesheet"></link>';
			$data['src']='<script type="text/javascript" language="javascript" src="/javascript/jquery/alphanumeric/jquery.alphanumeric.pack.js"></script><script src="/javascript/apps/editart.js"></script>';
			$this->load->view('include/header_main',$data);
			$this->load->view('include/main_nav',$data);
		    $this->load->view('edit_art', $data);
			$this->load->view('include/footer_main',$data);
		} else {
			redirect('/auth/login');
		}
	}
	
	public function make_tag_id_list($tags=null){
		$rids = '';
		
		if(! is_null($tags)){
			$rids = array();
			foreach ($tags as $tag)
			{
			    $rids[] = $tag->tag_id;
			}
		    
		    return implode(',', $rids);

			
		}
		return $rids ;
		
	}
	public function make_tag_label_array($tags=null){
		$rids = '';
		
		if(! is_null($tags)){
			$rids = array();
			foreach ($tags as $tag)
			{
			    $rids[] = array('id'=>$tag->tag_id,'label'=>$tag->material);
			}
		}
		return $rids ;
		
	}
	public function make_raw_label_array($list=null){
		$rids = '';
		$items = explode(',', $list);
		if(! is_null($items)){
			$rids = array();
			
			foreach ($items as $tag)
			{
			    if(is_numeric($tag)){
			    	$mtag = $this->material_model->get_materials(array('id'=>$tag));
					
			    	$rids[] = array('id'=>$mtag->tag_id,'label'=>$mtag->material);
			    }else{
			    	$rids[] = array('id'=>'','label'=>$tag);
			    }
			}
		}
		return $rids ;
		
	}
	
} 

