<?php
parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);

class ubrpgtools extends CI_Controller {
  var $user = FALSE;
  var $data = NULL;
	function __construct()
	{
		parent::__construct();
		$this->config->load('JavaScriptPaths');
  		$this->config->load('APIKeys');
		$this->config->load('tweet');
		$this->user = $this->session->userdata('app_session');
		$this->is_local = FALSE;
		
		
  }

  function index()
  {
  		if(is_null($this->user) || is_null($this->user['member_id'])){
  			header("Location: /ubrpgmobile");
  		}
  		//var_dump($this->user);
  		$this->load->view('ubrpgtools',$this->data);
	  
	  }
  
	
}
