<?php

class Myaccount extends CI_Controller {
    
  function __construct()
	{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->library('security');
			$this->lang->load('tank_auth');
			$this->load->model('user_model');
			$this->load->model('country_model');
			//vars configs 
   			
		
    		
		
	}
	
	
	function index()
	{
			$data['is_logged_in']=FALSE;
			if ($this->tank_auth->is_logged_in()) {
				$data['is_logged_in']=TRUE;
			}		
			
			if($data['is_logged_in']){
				
				$user_record=$this->user_model->get_user($this->tank_auth->get_user_id()); 
				//var_dump($user_record);
				$data['user']= (object) $user_record[0];
				$data['countries']= new ArrayObject;
				foreach($this->country_model->get_countries() as $row)
				{
				  $data['countries'][$row->code] = $row->country;
				}  
				$data['current_page']="/myaccount";
				$data['css']='<link rel="stylesheet" type="text/css" href="/theme/all/css/myaccount.css"/><link rel="stylesheet" href="/javascript/jquery/blueimp-file-upload/jquery.fileupload-ui.css">';
				$data['src']='<script src="//ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>
				<script src="/javascript/jquery/blueimp-file-upload/jquery.iframe-transport.js"></script>
				<script src="/javascript/jquery/blueimp-file-upload/jquery.fileupload.js"></script>
				<script src="/javascript/jquery/blueimp-file-upload/jquery.fileupload-ui.js"></script>
				<script type="text/javascript" language="javascript" src="/javascript/apps/myaccount.js"></script>';
				$data['footer_src']="";
				$this->load->view('include/header_main',$data);
				$this->load->view('include/main_nav',$data);
				$this->load->view('my_account', $data);
				$this->load->view('include/footer_main',$data);
			} else {
				redirect('');
			}
    }
    function update()
    {
    	$data['is_logged_in']=FALSE;
		if ($this->tank_auth->is_logged_in()) {
			$data['is_logged_in']=TRUE;
		}	
    	if($data['is_logged_in']){
	  	 	$data['current_page']="/myaccount";
			$data['css']="";
			$data['src']="";
			$data['footer_src']="";
			$this->load->view('include/header_main',$data);
			$this->load->view('include/main_nav',$data);
	   		//$this->load->view('home', $data);
			$this->load->view('include/footer_main',$data);
  	 	} else {
			redirect('');
		}
    }
}