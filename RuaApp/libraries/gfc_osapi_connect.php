<?php
//include(APPPATH.'libraries/opensocial/osapi/osapi.php');



class Gfc_osapi_connect {
  
        private $_obj;
        private $_osapi;
		private $site_id		= NULL;
		private $consumer_key	= NULL;
		private $consumer_secret	= NULL;
		private $consumer_secret	= NULL;
		private $storage= NULL;
		public 	$user 			= NULL;
		public 	$user_id 		= FALSE;
		
		public $osapi;
		public $client;
		
		function gfc_osapi_connect()
		{
			//$this->_obj =& get_instance();

echo "xxx";
			//$this->_obj->load->config('APIKeys');
			//$this->_obj->load->library('session');
			
			//$this->storage= new osapiFileStorage('/tmp/osapi');
			
		}
  
} 