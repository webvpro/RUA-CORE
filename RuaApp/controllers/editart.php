<?php

class Editart extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->library('security');
			$this->load->model('Art_model');
	 		$this->art_id = $this->uri->segment(2, 0);
			$this->edit_mode = $this->uri->segment(3, 0);
			$this->load->model('user_model');
		    $this->load->model('material_model');
		
		
	}
	
	function index()
	{
	  // config
 
		if(! is_numeric($this->edit_mode)){
		  	if($this->edit_mode == 'added' || $this->edit_mode == 'updated'){
				$data['status_msg']='Your Item has been saved.';
			}
		} else{
		  	$data['status_msg']=FALSE;
		}
		
		
	    $data['is_logged_in']=FALSE;
		$data['username']=$this->tank_auth->get_username();
		if ($this->tank_auth->is_logged_in()) {
			$data['member_id']=$this->tank_auth->get_user_id();
			$tmpArt=$this->Art_model->get_full_art(array('ai.id'=>$this->art_id,'ai.artist_id'=>$data['member_id']));
			$data['art']= $tmpArt[0];
		
			if(is_null($data['art'])){
				redirect('/myart');
			}
			$data['primary_material_labels']= $this->make_tag_label_array($data['art']->primary_materials);
			$data['secondary_material_labels']= $this->make_tag_label_array($data['art']->secondary_materials);
			$data['other_material_labels']= $this->make_tag_label_array($data['art']->other_materials);
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
			}
				
				$data['categories']= new ArrayObject;
			foreach($this->Art_model->get_art_categories() as $row)
			{
				$data['categories'][$row->id] = $row->category;
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
	   $this->art_id= $this->input->post('art_id',TRUE);
	    $data['is_logged_in']=FALSE;
		$data['username']=$this->tank_auth->get_username();
		if ($this->tank_auth->is_logged_in()) {
		$data['member_id']=$this->tank_auth->get_user_id();
		$data['art']= $this->Art_model->get_my_item($this->art_id,$data['member_id']);
		if(is_null($data['art'])){
			redirect('/myart');
		}
			$this->form_validation->set_rules('item_name', 'Item Name', 'required');
			$this->form_validation->set_rules('item_reuse_percent', 'ReUse %', 'required');
			$this->form_validation->set_rules('item_price', 'Item Price', 'required');
			$this->form_validation->set_rules('item_quanity', 'Item Quanity', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$data['primary_material_labels']= $this->make_raw_label_array($this->input->post('primary_material_ids',TRUE));
				$data['secondary_material_labels']= $this->make_raw_label_array($this->input->post('secondary_material_ids',TRUE));
				$data['other_material_labels']= $this->make_raw_label_array($this->input->post('other_material_ids',TRUE));
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
				
			} else{
						
		          $update=array('name'=>$this->input->post('item_name',TRUE)
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
				 $art_id= $this->Art_model->update_art($update,$this->art_id);
				 $this->material_model->wipe_art_materials($art_id);
				$tagParam= array(array('art_id'=>$art_id,'type'=>'primary','val'=>$this->input->post('primary_material_ids',TRUE))
							 	 ,array('art_id'=>$art_id,'type'=>'secondary','val'=>$this->input->post('secondary_material_ids',TRUE))
								 ,array('art_id'=>$art_id,'val'=>$this->input->post('other_material_ids',TRUE)));
				$this->_perpareTags($tagParam);	
				redirect('/editart/'.$art_id.'/updated', 'refresh'); 
			}// eof validation if
		
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
	public function make_tag_label_array($list=NULL){
		$rids = array();
		if(! $list == ''){
			
			$tags= explode(",", $list);
			foreach ($tags as $tag)
			{
			    $val=explode(":", $tag);
			    $rids[] = array('id'=>$val[0],'label'=>$val[1]);
			}
		}
		return $rids ;
		
	}
	public function make_raw_label_array($list=null){
		$rids = array();
		$items = explode(',', $list);
		if(! $list == ''){
			
			foreach ($items as $tag)
			{
			    if(is_numeric($tag)){
			    	$mtag = $this->material_model->get_materials(array('id'=>$tag));
					
			    	$rids[] = array('id'=>$mtag[0]->id,'label'=>$mtag[0]->material);
			    }else{
			    	$rids[] = array('id'=>'','label'=>$tag);
			    }
			}
			
		}
		
		return $rids ;
		
	}
	
	private function _perpareTags($param, $save=TRUE)
	{
		$valAry[]= null;
		foreach ($param as $key) {
			if(! $key['val'] == ''){
				$valAry= explode(",", $key['val']);
				$tag ='';
				for($i = 0; $i < count($valAry); $i++){
					if(! is_numeric($valAry[$i]) && ! isset($key['type']))
					{
						if($save){
						$id=$this->material_model->make_tag(array('material'=>$valAry[$i]));
						$tag=array('art_id'=>$key['art_id'],'material_id'=>$id);
						}else{
							$tag=array('art_id'=>'','material_id'=>$id);
						}
					}
					elseif(! is_numeric($valAry[$i]))
					{
						if($save){
							$id=$this->material_model->make_tag(array('material'=>$valAry[$i]));
							$tag=array('art_id'=>$key['art_id'],'material_id'=>$id,'is_'.$key['type']=>1);
						}else{
							$tag=array('art_id'=>'','material_id'=>$id);
						}
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
				
			}// eof if key['val']
		}//eof foreach 
		return true;
	}//eof _prepareTags
	
} 

