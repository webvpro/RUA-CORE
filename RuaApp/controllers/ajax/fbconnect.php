<?php
parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);

class Fbconnect extends Controller {

	function Fbconnect()
	{
		parent::Controller();
	}

	function index()
	{
	  $this->config->load('APIKeys');
    $this->load->helper('cookie');
	  $data= array();
   
    
    

    function get_facebook_cookie($app_id, $application_secret) {
      $args = array();
      //$args['fb-key']=$app_id;
     $fb_cookie=get_cookie('fbs_' . $app_id,TRUE);
     parse_str(trim($fb_cookie, '\\"'), $args);
     
      ksort($args);
     /* $payload = '';
      foreach ($args as $key => $value) {
        if ($key != 'sig') {
          $payload .= $key . '=' . $value;
        }
      }
      if (md5($payload . $application_secret) != $args['sig']) {
        return null;
      }*/
      return $args;
    }
   
     $data['fb_cookie']=get_facebook_cookie($this->config->item('fb_appid'), $this->config->item('fb_secret'));
     var_dump($data);
     $this->load->view('ajax/fbconnect',$data);
    
	}
}

