<?php
include(APPPATH.'libraries/OAuth/library/OAuthStore.php');
include(APPPATH.'libraries/OAuth/library/OAuthRequester.php');


class OAuthClient_gfc {
  
        private $_obj;
		private $_site_id		= NULL;
		private $_consumer_key	= NULL;
		private $_consumer_secret	= NULL;
		public 	$user 			= NULL;
		public 	$user_id 		= FALSE;
		
		public $fb;
		public $client;
		
		function OAuthClient_gfc()
		{
			$this->_obj =& get_instance();

			$this->_obj->load->config('APIKeys');
			$this->_obj->load->library('session');
		}
  
}  