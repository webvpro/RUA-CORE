<?php
parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);

class Check_alias_availability extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->alias = $this->input('member_name');
		$this->data = array('message'=>NULL,'success'=>FALSE);
		
    }

	function index()
	{
		$memCheck=$this->Member_auth->getMemberByAlias($this->alias);
		if($memCheck === NULL){
			$this->data = array('message'=>'This Alias is Available','success'=>TRUE);
		}else{
			$this->data = array('message'=>'This Alias Has Beenn Taken','success'=>FALSE);
		}
		var_dump($this->data);			
		$this->load->view('/ajax/available_message',$this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */