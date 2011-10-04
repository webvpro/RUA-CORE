<?php
    
    class Member_auth extends CI_Model {  
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
      
       function getAuthUsers()  
          {  
               //Query the data table for every record and row  
               $query = $this->db->get('member_auth');  
     
               if ($query->num_rows() > 0)  
               {  
                   return NULL; 
               }else{  
                   return $query->result();  
               }  
           }  
		    function getMember($id) {  
               //Query the data table for every record and row  
               $query = $this->db->get_where('member_auth',array('member_id' => $id));  
     		  	return $query->result();  
                 
           }
		   function getMemberByAlias($alias) {  
               //Query the data table for every record and row  
               $params= array('member_name' => $alias);
               $query = $this->db->get_where('member_auth',$params);  
               return $query->result();  
                 
           }
		function newMemberInsert($data){
		
				$id = $this->db->insert('member_auth', $data); 
				return $id;
				
		}
			  
     	function getFacebookMember($id) {  
               $query = $this->db->get_where('member_auth',array('member_id' => $id));  
               return $query->result();  
                 
           } 
		function getTwitterMember($id) {  
               //Query the data table for every record and row  
               $query = $this->db->get_where('member_auth',array('member_id' => $id));  
     			return $query->result();  
                 
           }
		function getGoogleMember($id) {
               	  
               $query = $this->db->get_where('member_auth',array('member_id' => $id));  
     		   return $query->result();  
                 
           }   
   }  
