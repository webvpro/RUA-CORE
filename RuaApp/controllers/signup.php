<?php
parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
class Signup extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->alias = $this->input->post('member_name');
		$this->data = array('message'=>NULL,'success'=>FALSE);	
		$this->user = $this->session->userdata('app_session');
	}
	
	function index()
	{
	
		$mem = $this->Member_auth->getMemberByAlias($this->alias);
		
		if(count($mem) == 0){
			$this->data['message']='This Tag is Available';
			$this->data['success']=TRUE;
		} else {
			$this->data['message']='This Tag Has Been Taken';
			$this->data['success']=FALSE;
		}	
		$this->load->view('ajax/user_message',$this->data);
	}
	function create(){
		$mem = $this->Member_auth->getMemberByAlias($this->alias);
		if(count($mem) == 0){
			$this->data['message']='Saving Tag';
			$this->data['success']=TRUE;
			$param = array();
			$param['member_name']=$this->alias;
			switch ($this->user['auth_type'])
			{
			case 'Facebook':
			   $param['facebook_id']=$this->user['user_id'];
			   $member_id= $this->Member_auth->newMemberInsert($param); 
			   $member = $this->Member_auth->getFacebookMember($this->user['user_id']);
			   break;
			case 'Google':
			 	$param['google_id']=$this->user['user_id'];
				$member_id= $this->Member_auth->newMemberInsert($param);
				$member = $this->Member_auth->getGoogleMember($this->user['user_id']); 
			 	break;
			case 'Twitter':
			 	$param['twitter_id']=$this->user['user_id'];
				$member_id= $this->Member_auth->newMemberInsert($param);
				$member = $this->Member_auth->getTwitterMember($this->user['user_id']); 
			 	break;
				
			default:
				 $param['twitter_id']=$this->user['user_id'];
				 $this->Member_auth->newMemberInsert($param); 
				 $member = $this->Member_auth->getTwitterMember($this->user['user_id']);
				 
				 
				 break;	
				
				
			}
			
				var_dump($member);
		} else {
			$this->data['message']='This Tag Has Been Taken';
			$this->data['success']=FALSE;
		}	
		$this->load->view('ajax/user_message',$this->data);
	}
}

/* End of file signup.php */
/* Location: ./system/application/controllers/welcome.php */