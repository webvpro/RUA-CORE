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
	   
	  function get_country($parms=NULL,$limit=NULL,$offset=NULL)
	 {
	 	$this->db->select('*');
		$this->db->from('countries');
		
		if(isset($parms['country_like']))
		{
	 		$this->db->like('country', $parms['country_like'],'after'); 
	 	}else{
	 		$this->db->where($parms);
	 	}
	 	
	 	if(!is_null($limit))
	 	{
			$this->db->limit($limit);
		}
		
		if(!is_null($offset))
		{
			$this->db->offset($offset);
		}
			
        $query = $this->db->get();  
     	return $query->result();  
     }
	 
	 function get_state($parms=NULL,$limit=NULL,$offset=NULL)
	 {
	 	$this->db->select('*');
		$this->db->from('state_province');
		
		if(isset($parms['state_name_like']) && isset($parms['country_code']))
		{
	 		$this->db->where('stat_cty_iso_3166_2',$parms['country_code'])->like('stat_short_name', $parms['state_name_like'],'after'); 
			
	 	}elseif(isset($parms['state_name_like']))
		{
	 		$this->db->like('stat_short_name', $parms['state_name_like'],'after'); 
	 	}else{
	 		$this->db->where($parms);
	 	}
	 	
	 	if(!is_null($limit))
	 	{
			$this->db->limit($limit);
		}
		
		if(!is_null($offset))
		{
			$this->db->offset($offset);
		}
			
        $query = $this->db->get();  
     	return $query->result();  
     }
         
   }  

