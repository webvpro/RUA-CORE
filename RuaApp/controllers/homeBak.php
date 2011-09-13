<?php
parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	function index()
	{
	  // config
	$this->config->load('JavaScriptPaths');
   	$this->config->load('APIKeys');
	$this->load->helper('url');
	  //libs
    $this->load->library('gfc_connect');
    $this->load->library('twitter');
    $this->load->library('facebook_connect');
    //models
    $this->load->model('Lm_lists_model');  
     
    //vars configs 
   
		$twitter_consumer_key = '';
    $twitter_consumer_key_secret = '';
    
    
    $tokens['twitter_access_token'] = NULL;
    $tokens['twitter_access_token_secret'] = NULL;
    
		//$this->output->cache(1);
		
      
        $data['logged_in']=FALSE;
    	if($this->session->userdata('logged_in')){
    		$data['logged_in']=TRUE;
    	}
   
    $data['twitter_api_key']=$this->config->item('twitter_api_key');
		$data['title']="ListMagnet: Home";
		$data['lists']=$this->Lm_lists_model->getLmLists();
		$data['homelink']='current';
		$data['mylistslink']='';
		$data['gallery']='';
    $data['jQueryPath']=$this->config->item('jQueryPath');
    $data['jQueryUiPath']=$this->config->item('jQueryUiPath');
    $data['fbConnectPath']=$this->config->item('fbConnectPath');
    $data['fbcKey']=$this->config->item('facebook_api_key');
    $data['gfcKey']=$this->config->item('gfc_api_key');
    $data['current_page']="/home";
		$this->load->view('include/header_main',$data);
    $this->load->view('include/main_nav',$data);
		
		
		
		$this->load->view('home',$data);
		$this->load->view('include/footer_main',$data);
	}
	
} 

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>