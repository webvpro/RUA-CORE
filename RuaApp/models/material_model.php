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
	 
	 function get_art_primary_materials($id)
	 {
	 	
		$this->db->select('art_materials.id AS am_id, material_tags.id AS tag_id, material_tags.material AS material');
    	$this->db->from('art_materials');
    	$this->db->join('material_tags', 'art_materials.material_id = material_tags.id','left');
		$this->db->where(array('art_materials.art_id'=>$id,'art_materials.is_primary'=>1));
		$query = $this->db->get();
		return $query->result();  
                 
     }
	 function wipe_art_materials($id)
	 {
	 	$this->db->where('art_id', $id);
		$this->db->delete('art_materials'); 
	    return true;
     }
	 function get_art_secondary_materials($id)
	 {
	 	$this->db->select('art_materials.id AS am_id, material_tags.id AS tag_id, material_tags.material AS material');
    	$this->db->from('art_materials');
    	$this->db->join('material_tags', 'art_materials.material_id = material_tags.id','left');
		$this->db->where(array('art_materials.art_id'=>$id,'art_materials.is_secondary'=>1));
		$query = $this->db->get();
	    return $query->result();  
     }
	 
	 function get_art_other_materials($id)
	 {
	 		
	 	$this->db->select('art_materials.id AS am_id, material_tags.id AS tag_id, material_tags.material AS material');
    	$this->db->from('art_materials');
    	$this->db->join('material_tags', 'art_materials.material_id = material_tags.id','left');
		$this->db->where(array('art_materials.art_id'=>$id,'art_materials.is_primary'=>0,'art_materials.is_secondary'=>0));
		$query = $this->db->get();
	    return $query->result();  
                 
     }
	 
	 function get_materials($parms=NULL,$limit=NULL,$offset=NULL)
	 {
	 	$this->db->select('*');
		$this->db->from('material_tags');
		
		if(isset($parms['material_like']))
		{
	 		$this->db->like('material', $parms['material_like'],'after'); 
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