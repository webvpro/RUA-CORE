<?php
parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
class Gfc extends CI_Controller {
    
    function __construct()
    {
        
        parent:__construct();
  }
  
  function index()
  {
    $this->config->load('JavaScriptPaths');
        $this->config->load('APIKeys');
        $this->load->helper('url');
    
     $data = array(
            'user'    => $this->facebook_connect->user,
            'user_id' => $this->facebook_connect->user_id,
            'current_page' => $this->uri->uri_string()
          );
   
  }
  
  function signout(){
        
        
        
        
  }
  
}
