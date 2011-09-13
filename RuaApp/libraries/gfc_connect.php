<?php
/**
 * CodeIgniter GFC Connect Library 
 * 
 * Author: Michael Stanley but I based this off of this->
 * 
 * Elliot Haughin (http://www.haughin.com), elliot@haughin.com
 * 
 * VERSION: 1.0 (2011-02-11)
 * LICENSE: GNU GENERAL PUBLIC LICENSE - Version 2, June 1991
 * 
 **/


	include(APPPATH.'libraries/opensocial/osapi/osapi.php');

	class Gfc_connect {

		private $_obj;
		private $_api_key		= NULL;
		private $_secret_key	= NULL;
		public 	$user 			= NULL;
		public 	$user_id 		= FALSE;
		
		public $storage = NULL;
		public $client= NULL;
	    public $gfcCookie = NULL;
		public $cookieName= NULL;
	    public $osapi = NULL;
	    public $userObj = NULL;
		public $auth = NULL;
		public $provider = NULL;
	    public $self_request_params =array(
	      'userId' => '@me',              // Person we are fetching.
	      'groupId' => '@self',
	      'fields' => '@all',  
	       'count'=>'1',
	       'startIndex'=>'1'   // Which profile fields to request.
	      );
		function gfc_connect()
		{
			$this->_obj =& get_instance();
			$this->_obj->load->config('APIKeys');
			$this->_obj->load->helper('cookie');
			//$storage = new osapiFileStorage('/tmp/osapi');
			
			$this->cookieName="fcauth" . $this->_obj->config->item('gfc_site_id');
			$this->gfcCookie=get_cookie($this->cookieName);
            $this->_manage_session();
			
			
			
		}

		private function _manage_session()
		{
			$user = $this->_obj->session->userdata('app_session');

			if ( $user === FALSE && $this->gfcCookie !== FALSE )
			{
				$this->auth = new osapiFCAuth($this->gfcCookie);
		        $this->provider = new osapiFriendConnectProvider();
		        $this->osapi = new osapi($this->provider, $this->auth);
				$batch = $this->osapi->newBatch();
    			$batch->add($this->osapi->people->get($this->self_request_params));
    			$result = $batch->execute();
				$this->userObj=$result['null'];
				$this->user_id=$this->userObj->id;
        
		        $user= array(
		                   'auth_type'  => 'Google',
		                   'user'    => $this->userObj->displayName,
            			   'user_id' => $this->userObj->id,
            			   'pic' => $this->userObj->thumbnailUrl,
		                   'logged_in' => TRUE,
		                   'member_id' => NULL,
		                   'tag'=>NULL
		               );
				$this->_obj->session->set_userdata('app_session', $user);
			}
			elseif ( $user !== FALSE && $this->gfcCookie === NULL )
			{
				// Need to destroy session
				$this->_obj->session->sess_destroy();
			}

			if ( $user !== FALSE )
			{
				$this->user = $user;
			}
		}
			
	}