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
	
} 

