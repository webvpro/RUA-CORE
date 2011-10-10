<?php
    
    class country_model extends CI_Model {  
      public $member_id   = '';
      public $facebook_id   = '';
	  public $twitter_id ='';
	  public $google_id   = '';
      public $content = '';
      public $date    = '';
	  public $auth_type ='';
	  public $member_name='';
	  
     function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
    }
     function get_countries(){
			$query = $this->db->get('countries');
			return $query->result();
		}
	 
	  function get_country_by_code($code) {  
           $query = $this->db->get_where('countries',array('code' => $code));  
 		  	return $query->result();  
       } 
	  
         
   }  

