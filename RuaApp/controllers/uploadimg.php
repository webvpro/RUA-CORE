<?php

class Uploadimg extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->library('security');
			$this->lang->load('tank_auth');
			if(! isset($_REQUEST['img_type'])){
			 $_REQUEST['img_type']='';
			}
			
	}
	
	function index()
	{
	  // config
	    $data['is_logged_in']=FALSE;
		$data['username']=$this->tank_auth->get_username();
		$data['member_id']=$this->tank_auth->get_user_id();
		$config['upload_path'] = FCPATH.'images/uploaded/'.$_REQUEST['img_type'].'/';
		if ($this->tank_auth->is_logged_in()) {	
		
			
			
			$config['allowed_types'] = 'jpg';
			$config['max_size'] = '2048';
			$config['max_width'] = '10240';
			$config['max_height'] = '76800';
			$config['overwrite'] = TRUE;
			$name = $_FILES['userfile']['name']; // get file name from form
			$fileNameParts   = explode( '.', $name ); // explode file name to two part
			
			$fileExtension   = end( $fileNameParts ); // give extension
			//var_dump($fileExtension);
			$fileExtension   = strtolower( $fileExtension ); // convert to lower case
			if ($_REQUEST['img_type'] == 'art'){
				$encripted_pic_name   = $_REQUEST['img_id'];  // new file name
			} else if ($_REQUEST['img_type'] == 'profile') {
				$encripted_pic_name   = 'profile_'.$data['member_id'];  // new file name
			}
			
			$config['file_name'] = $encripted_pic_name; //set file name
			$this->load->library('upload', $config);
		
			header('Content-type: text/plain');
			
			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
				echo json_encode($error);
				
			}
			else
			{
				$upload_data = $this->upload->data();
				
				//thumb
				$configImg = array(
				 	'source_image' => $upload_data['full_path'],
				 	'new_image' => $config['upload_path'] . 'thumbs/'.$encripted_pic_name.'.'.$fileExtension,
					'maintain_ration' => FALSE,
					'width' => 75,
					'height' => 75
				);
				$this->load->library('image_lib', $configImg);
				$this->image_lib->resize();
				
				
				
				// full art only
				if($_REQUEST['img_type'] == 'art'){
					
					 $configImg = array(
				 	'source_image' => $upload_data['full_path'],
				 	'new_image' => FCPATH.'images/uploaded/art/full/'.$encripted_pic_name.'.'.$fileExtension,
				 	'maintain_ration' => FALSE,
					'width' => 570,
					'height' => 428,
					);
					$this->image_lib->initialize($configImg); 
					$this->image_lib->resize();					
				}
				
				//mid
				if($_REQUEST['img_type'] == 'art'){
					 $configImg = array(
				 	'source_image' => $upload_data['full_path'],
				 	'new_image' => FCPATH.'images/uploaded/art/'.$encripted_pic_name.'.'.$fileExtension,
				 	'maintain_ration' => FALSE,
					'width' => 170,
					'height' => 135,
					);
				} else {
					 $configImg = array(
				 	'source_image' => $upload_data['full_path'],
				 	'new_image' => FCPATH.'images/uploaded/profile.'.$encripted_pic_name.'.'.$fileExtension,
				 	'maintain_ration' => False,
					'width' => 160,
					'height' => 235,
					);
				}
				$this->image_lib->initialize($configImg); 
				$this->image_lib->resize();
				//echo '{"name":"'.$upload_data['file_name'].'","type":"'.$upload_data['file_type'].'","size":"'.$upload_data['file_size'].'"}';
				echo json_encode(array(
				    'name' => $upload_data['file_name'],
				    'type' => $upload_data['file_type'],
				    'size' => $upload_data['file_size'],
				    'url' => '/images/uploaded/'.$_REQUEST['img_type'].'/'.$upload_data['file_name'],
				    'thumbnail_url' => '/images/uploaded/'.$_REQUEST['img_type'].'/'.$upload_data['file_name'].'?'.gettimeofday(true)
				));
			}
			
			
		
		} else {
			echo "nope";
		}
	}
	
	
	
} 

