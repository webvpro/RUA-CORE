<?php

class Uploadimg extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->library('security');
			$this->lang->load('tank_auth');
			
	}
	
	function index()
	{
	  // config
	    $data['is_logged_in']=FALSE;
		$data['username']=$this->tank_auth->get_username();
		$data['member_id']=$this->tank_auth->get_user_id();
		if ($this->tank_auth->is_logged_in()) {	
		
		$config['upload_path'] =  $_SERVER['DOCUMENT_ROOT'].'/images/uploaded/'.$_REQUEST['img_type'];
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '200';
		$config['max_height']  = '200';
		
		$name = $_FILES['files']['name']; // get file name from form
		$fileNameParts   = explode( '.', $name ); // explode file name to two part
		
		$fileExtension   = end( $fileNameParts ); // give extension
		//var_dump($fileExtension);
		$fileExtension   = strtolower( $fileExtension ); // convert to lower case
		$encripted_pic_name   = md5($data['member_id']).'.'.$fileExtension;  // new file name
		$config['file_name'] = $encripted_pic_name; //set file name
		
		$this->load->library('upload', $config);
		$this->upload->do_upload();
		$image_data = $this->upload->data();
		
		$config = array(
			'source_image' => $image_data['full_path'],
			'new_image' => $config['upload_path'] . '/thumbs',
			'maintain_ration' => true,
			'width' => 45,
			'height' => 65
		);
		
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
		
		 header('Content-type: application/json');
		 echo json_encode($image_data);
		
		} else {
			redirect('/auth/login');
		}
	}
	
	function art()
	{
			
			var_dump($_POST);
		//$file = $this->input->post('filearray');
		//$data['json'] = json_decode($file);
		//var_dump($data);
		
	   echo 'added';
		
		
	}
	
} 

