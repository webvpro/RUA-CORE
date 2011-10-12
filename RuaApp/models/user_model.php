<?php

class user_model extends CI_Model 
{
	// get user by their social media id
	function get_user_by_sm($data, $sm_id)
	{
		$this->db->select("u.*, up." . $sm_id);
		$this->db->from("users AS u");
		$this->db->join("user_profiles AS up", "u.id=up.user_id");
		$this->db->where($data);
		$query = $this->db->get();
		return $query->result();
	}

	// Returns user by its email
	function get_user_by_email($email)
	{
		$query = $this->db->query("SELECT * FROM users u, user_profiles up WHERE u.email='$email' and u.id = up.user_id");
		return $query->result();
	}
	
	// a generic update method for user profile
	function update_user_profile($user_id, $data)
	{
		$this->db->where('user_id', $user_id);
		$this->db->update('user_profiles', $data); 
		
	}

	// return the user given the id
	function get_user($user_id)
	{
		$this->db->select("u.*, up.*,countries.country");
		$this->db->from("users AS u");
		$this->db->join("user_profiles AS up", "u.id=up.user_id","right");
		$this->db->join("countries","up.country_code=countries.code", "left");
		$this->db->where(array('u.id'=>$user_id));
		$query = $this->db->get();
		return $query->result();
		
	}
	function get_sellers()
	{
		$params['is_seller']=1;
		$query = $this->db->get_where('user_profiles', $params);
		return $query->result();
		
	}
}
?>