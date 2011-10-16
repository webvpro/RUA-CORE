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
				
				$data['user']= (object) $user_record[0];
				//var_dump($data['user']);
				$data['countries']= new ArrayObject;
				foreach($this->country_model->get_countries() as $row)
				{
				  $data['countries'][$row->code] = $row->country;
				}  
				$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0"); 
				$this->output->set_header("Pragma: no-cache");
				$data['current_page']="/myaccount";
				$data['css']='<link rel="stylesheet" type="text/css" href="/theme/all/css/forms.css" /><link rel="stylesheet" type="text/css" href="/theme/all/css/myaccount.css"/>';
				$data['src']='<script src="/javascript/jquery/jqueryform/jquery.form-2.86.js"></script>
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
	  	 	$update =array('first_name'=>$this->input->post('first_name',TRUE)
	  	 					,'last_name'=>$this->input->post('last_name',TRUE)
	  	 					,'address_1'=>$this->input->post('address_1',TRUE)
							,'address_2'=>$this->input->post('address_2',TRUE)
							,'city'=>$this->input->post('city',TRUE)
							,'state'=>$this->input->post('state_province',TRUE)
							,'country_code'=>$this->input->post('country_code',TRUE)
							,'postal_code'=>$this->input->post('postal_code',TRUE)
							,'bio'=>$this->input->post('bio_text',TRUE));
			$update_user=$this->user_model->update_user_profile($this->tank_auth->get_user_id(),$update); 
			echo json_encode($update);
  	 	} else {
			echo 'no login';
		}
    }
}