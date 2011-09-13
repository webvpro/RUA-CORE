<?php
parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);

class ubrpgmobile extends CI_Controller {
  var $facebook_user_id=FALSE;
  var $twitter_user_id=FALSE;
  var $google_user_id=FALSE;
  var $member_id=FALSE;
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
		$this->data=array(
		   'member_id'=>NULL,
           'user'    => FALSE,
            'user_id' => FALSE,
            'page_title' => 'Sign In',
            'auth_type' => FALSE,
            'current_page' => '/ubrpgmoblie',
            'logged_in' => FALSE,
            'facebook_api_key'=>$this->config->item('facebook_api_key'),
            'gfc_site_id'=>$this->config->item('gfc_site_id'),
            'tweet_consumer_key'=>$this->config->item('tweet_consumer_key')
          );
		  
		  if(base_url() === 'http://myfb.ci/'){
		  	$this->data = array_merge($this->data,array(
		            'user'    =>    'Localhost',
		            'user_id' =>    '7777',
		            'pic' => 		'',
		            'auth_type' =>  'facebook',
		            'logged_in' =>  FALSE,
		            'memeber_id'=>  NULL
		          ));
		  }
		  
		  if($this->user !== FALSE){
				
		 		$this->data = array_merge($this->data,array(
		            'user'    =>    $this->user['user'],
		            'user_id' =>    $this->user['user_id'],
		            'pic' => 		$this->user['pic'],
		            'auth_type' =>  $this->user['auth_type'],
		            'logged_in' =>  $this->user['logged_in'],
		            'memeber_id'=>  $this->user['member_id']
		          ));
	  		}
		
		
  }

  function index()
  {
  	var_dump($this->user);	
		$this->load->view('ubrpgmobile_home',$this->data);
	  
	  }
  
	function signout(){
	       if($this->user['auth_type'] === 'Google'){
		   	  $this->load->view('signout',$this->data);
		   } elseif($this->user['auth_type'] === 'Facebook'){
		   		header("Location: /ubrpgmobile");
		   }else{
		   	$this->tweet->set_callback('/ubrpgmobile');
		   	$this->tweet->logout();
			header("Location: /ubrpgmobile");
		   }
	    }
	
	function signup(){
			$name= $this->input->post('member_name');
			$insert= array();
			switch ($this->user['auth_type'])
			{
			case 'Facebook':
			  $insert['facebook_id']=$this->user['user_id'];
			  break;
			case 'Google':
			 $insert['google_id']=$this->user['user_id'];
			 break;
			case 'Twitter':
			$insert['google_id']=$this->user['user_id'];
				break;
			case 'localhost':
			$insert['google_id']=$this->user['user_id'];
				break;
			} 
			
	    }
	function signin(){
		$this->tweet->set_callback('http://listmagnet.webversatile.com/ubrpgmobile');
		   	$this->tweet->login();
			//header("Location: /ubrpgmobile");
			
	}
    private function _get_appication_user(){
    	
    }
	private function _create_appication_user(){
    	
    }
}
