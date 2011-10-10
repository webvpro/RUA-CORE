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
		if ($this->tank_auth->is_logged_in()) {	
		
			$config['upload_path'] = FCPATH.'images/uploaded/'.$_REQUEST['img_type'].'/';
			//var_dump($config['upload_path']);
			$config['allowed_types'] = 'jpg';
			$config['max_size'] = '36000';
			$config['max_width'] = '10240';
			$config['max_height'] = '76800';
			$config['overwrite'] = TRUE;
			$name = $_FILES['userfile']['name']; // get file name from form
		$fileNameParts   = explode( '.', $name ); // explode file name to two part
		
		$fileExtension   = end( $fileNameParts ); // give extension
		//var_dump($fileExtension);
		$fileExtension   = strtolower( $fileExtension ); // convert to lower case
		$encripted_pic_name   = 'profile_'.$data['member_id'];  // new file name
		$config['file_name'] = $encripted_pic_name; //set file name
		$this->load->library('upload', $config);
		
			header('Content-type: application/json');
			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
				echo json_encode($error);
				
			}
			else
			{
				$upload_data = $this->upload->data();
				$config = array(
			 	'source_image' => $upload_data['full_path'],
			 	'new_image' => $config['upload_path'] . '/thumbs',
				'maintain_ration' => true,
				'width' => 50,
				'height' => 50
				);
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$config = array(
			 	'source_image' => $upload_data['full_path'],
			 	'maintain_ration' => true,
				'width' => 150,
				'height' => 150,
				);
				$this->image_lib->resize();
				//echo '{"name":"'.$upload_data['file_name'].'","type":"'.$upload_data['file_type'].'","size":"'.$upload_data['file_size'].'"}';
				echo json_encode(array(array(
				    'name' => $upload_data['file_name'],
				    'type' => $upload_data['file_type'],
				    'size' => $upload_data['file_size'],
				    'url' => '/images/uploaded/'.$_REQUEST['img_type'].'/'.$upload_data['file_name'],
				    'thumbnail_url' => '/images/uploaded/'.$_REQUEST['img_type'].'/'.$upload_data['file_name'].'?'.gettimeofday(true)
				)));
			}
			
			
		
		} else {
			redirect('/auth/login');
		}
	}
	
	
	
} 

