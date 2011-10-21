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
	 
	 function update_art($data,$id){
	 		$this->db->where('id', $id);
			$this->db->update('rua_art_items', $data);
			
			return  $id;
		}
	 
	  function get_art($id) {  
               $query = $this->db->get_where('rua_art_items',array('id' => $id));  
     		  	return $query->result();  
                 
           }
	  function get_full_art($params=NULL,$offset=NULL,$limit=NULL) {
	  	
		// params must be in ai.id like format
	  	  $this->db->select("ai.*, (SELECT GROUP_CONCAT(am.material_id,':',mt.material) 
			  FROM art_materials am RIGHT JOIN material_tags mt
			  ON am.material_id = mt.id
 			  WHERE am.art_id = ai.id AND am.is_primary = 1) as primary_materials,
 			  (SELECT GROUP_CONCAT(am.material_id,':',mt.material) 
			  FROM art_materials am RIGHT JOIN material_tags mt
			  ON am.material_id = mt.id
 			  WHERE am.art_id = ai.id AND am.is_secondary = 1) as secondary_materials,
 			  (SELECT GROUP_CONCAT(am.material_id,':',mt.material) 
			  FROM art_materials am RIGHT JOIN material_tags mt
			  ON am.material_id = mt.id
 			  WHERE am.art_id = ai.id AND am.is_secondary = 0 AND am.is_primary = 0) as other_materials,
 			  (SELECT mem.username FROM users mem WHERE mem.id = ai.artist_id) as artist", FALSE);
    		$this->db->from('rua_art_items ai',FALSE);
			if (!is_null($params)){
            	$this->db->where($params,FALSE);
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
	  function get_my_item($id,$member_id) {  
               $query = $this->db->get_where('rua_art_items',array('id' => $id,'artist_id'=>$member_id));  
			   //$query->result();
     		  	return $query->row();  
                 
           } 
	  function get_art_categories() {
	  			$this->db->select('*');
				$this->db->from('rua_categories');
				$this->db->order_by("category", "asc");    
                $query = $this->db->get();
     		  	return $query->result();  
                 
           } 
	  function get_member_art($id) {  
               $query = $this->db->get_where('rua_art_items',array('artist_id' => $id));  
     		  	return $query->result();  
                 
           } 
         
   }  

