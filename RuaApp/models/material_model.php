<?php
    
    class material_model extends CI_Model {  
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
	
	 function get_all_materials()
	 {  
     	$query = $this->db->get('material_tags');  
     	return $query->result();  
                 
     }
	 function get_materials($parms=NULL,$limit=NULL,$offset=NULL)
	 {
	 	$this->db->select('*');
		$this->db->from('material_tags');
		
		if(isset($parms['material_like']))
		{
	 		$this->db->like('material', $parms['material_like'],'after'); 
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
	 
	 function tag_it($param)
	 {
	 	$this->db->insert('art_materials', $param);
		return $this->db->insert_id(); 
	 }
	 function make_tag($param)
	 {
	 	$this->db->insert('material_tags', $param);
		return $this->db->insert_id(); 
		
		
	 }
	
}