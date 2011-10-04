<?php
    
    class Art_model extends CI_Model {  
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
     function add_art($data){
			$this->db->insert('rua_art_items', $data);
			$id = $this->db->insert_id(); 
			return  $id;
		}
	 
	  function get_art($id) {  
               $query = $this->db->get_where('rua_art_items',array('id' => $id));  
     		  	return $query->result();  
                 
           } 
         
   }  

