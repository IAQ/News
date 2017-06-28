<?php
class users_tag extends CI_Model {

	
	public function __construct()
	{
		$this->load->database();
	}

	public function init($id)
	{
		$data = array(
			'id' => $id, 
			);
		$this->db->insert('user_tag',$data);

	}

	public function getTag($id)
	{
		$this->db->select('*');
		$this->db->from('user_tag');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}


	public function update($user)
	{
		$this->db->set('head',$user['head']);
		$this->db->set('native',$user['native']);
		$this->db->set('world',$user['world']);
		$this->db->set('eco',$user['eco']);
		$this->db->set('sports',$user['sports']);
		$this->db->set('ent',$user['ent']);
		$this->db->set('war',$user['war']);
		$this->db->set('car',$user['car']);
		$this->db->set('tech',$user['tech']);
		$this->db->set('society',$user['society']);

		$this->db->where('id',$user['id']);
		$this->db->update('user_tag');

	}

}