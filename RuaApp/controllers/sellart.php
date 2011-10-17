<?php

class Sellart extends CI_Controller {
		
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->lang->load('tank_auth');
		$this->load->model('Art_model');
		$this->load->model('material_model');
			
	}
	
	public function index()
	{
	  // config
	    $data['is_logged_in']=FALSE;
		$data['username']=$this->tank_auth->get_username();
		$data['categories']= new ArrayObject;
			foreach($this->Art_model->get_art_categories() as $row)
				{
				  $data['categories'][$row->id] = $row->category;
				}  
		if ($this->tank_auth->is_logged_in()) {	
			$data['materials']=$this->material_model->get_materials();
			$data['is_logged_in']=TRUE;
			$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0"); 
			$this->output->set_header("Pragma: no-cache");
		    $data['current_page']="/home";
			$data['css']='<link href="/theme/all/css/rua_form.css" type="text/css" rel="stylesheet"></link><link href="/theme/all/css/editart.css" type="text/css" rel="stylesheet"></link>';
			$data['src']='<script type="text/javascript" language="javascript" src="/javascript/jquery/alphanumeric/jquery.alphanumeric.pack.js"></script>';
			$this->load->view('include/header_main',$data);
			echo "<flushhack />";
			$this->load->view('include/main_nav',$data);
		    $this->load->view('sell_art', $data);
			$this->load->view('include/footer_main',$data);
			
		} else {
			redirect('/auth/login');
		}
	}
	
	public function createitem()
	{
		$data['is_logged_in']=FALSE;
		
		if ($this->tank_auth->is_logged_in())
		{	
			$data['is_logged_in']=TRUE;
			$data['username']=$this->tank_auth->get_username();
			$data['member_id']=$this->tank_auth->get_user_id();
			$this->form_validation->set_rules('item_name', 'Item Name', 'required');
			$this->form_validation->set_rules('item_reuse_percent', 'ReUse %', 'required');
			$this->form_validation->set_rules('item_price', 'Item Price', 'required');
			$this->form_validation->set_rules('item_quanity', 'Item Quanity', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$data['is_logged_in']=TRUE;
				$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0"); 
				$this->output->set_header("Pragma: no-cache");
		     	$data['current_page']="/home";
			 	$data['css']='<link rel="stylesheet" type="text/css" src="/theme/all/css/editart.css"/>';
		     	$data['src']='<script type="text/javascript" language="javascript" src="/javascript/jquery/alphanumeric/jquery.alphanumeric.pack.js"></script>';
				$this->load->view('include/header_main',$data);
				$this->load->view('include/main_nav',$data);
		    	$this->load->view('sell_art', $data);
				$this->load->view('include/footer_main',$data);
			 
			} else {
				$add=array('artist_id'=>$data['member_id']
						   ,'name'=>$this->input->post('item_name',TRUE)
						   ,'description'=>$this->input->post('item_description',TRUE)
						   ,'reuse_percentage'=>$this->input->post('item_reuse_percent',TRUE)
						   ,'price'=>$this->input->post('item_price',TRUE)
						   ,'quanity'=>$this->input->post('item_quanity',TRUE)
						   ,'height'=>$this->input->post('item_height',TRUE)
						   ,'width'=>$this->input->post('item_width',TRUE)
						   ,'depth'=>$this->input->post('item_depth',TRUE)
						   ,'dim_uom'=>$this->input->post('dim_uom',TRUE)
						   ,'weight'=>$this->input->post('item_weight',TRUE)
						   ,'weight_uom'=>$this->input->post('weight_uom',TRUE)
				 );
	
				$art_id= $this->Art_model->add_art($add);
				$tagParam= array(array('art_id'=>$art_id,'type'=>'primary','val'=>$this->input->post('primary_material_ids',TRUE))
							 	 ,array('art_id'=>$art_id,'type'=>'secondary','val'=>$this->input->post('secondary_material_ids',TRUE))
								 ,array('art_id'=>$art_id,'val'=>$this->input->post('other_material_ids',TRUE)));
				$this->_perpareTags($tagParam);	
				redirect('/editart/'.$art_id, 'refresh'); 
				
			}// eof no error
		}else{
			redirect('/auth/login');
		}// eof if login
	}// eof add
	private function _perpareTags($param)
	{
		
		foreach ($param as $key) {
			$valAry= explode(",", $key['val']);
			
			for($i = 0; $i < count($valAry); $i++){
				if(! is_numeric($valAry[$i]) && ! isset($key['type']))
				{
					$id=$this->material_model->make_tag(array('material'=>$valAry[$i]));
					$tag=array('art_id'=>$key['art_id'],'material_id'=>$id);
				}
				elseif(! is_numeric($valAry[$i]))
				{
					$id=$this->material_model->make_tag(array('material'=>$valAry[$i]));
					$tag=array('art_id'=>$key['art_id'],'material_id'=>$id,'is_'.$key['type']=>1);
				}
				elseif(is_numeric($valAry[$i]) && ! isset($key['type']))
				{
					$tag=array('art_id'=>$key['art_id'],'material_id'=>$valAry[$i]);
				}
				elseif(is_numeric($valAry[$i]))
				{
					$tag=array('art_id'=>$key['art_id'],'material_id'=>$valAry[$i],'is_'.$key['type']=>1);
				}
				$this->material_model->tag_it($tag);
			}
			
		} 
		return;
	}//eof _prepareTags
} 

