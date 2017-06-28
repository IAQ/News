<?php
class users_model extends CI_Model {

	
	public function __construct()
	{
		$this->load->database();
	}

	public function checkid($id)
	{
		$this->db->select('id');
		$this->db->from('user');
		$this->db->where('id',$id);
		$query = $this->db->get();

		if(empty($query->row()))
			return false;
		else
			return true;
	}

	public function checkpsd($id,$psd)
	{
		$this->db->select('id');
		$this->db->from('user');
		$this->db->where('id',$id);
		$this->db->where('password',$psd);
		$query = $this->db->get();

		if(empty($query->row()))
			return false;
		else
			return true;
	}

	public function save($id,$psd,$email)
	{
		$data = array(
			'id' => $id, 
			'password' => $psd,
			'email' => $email
			);
		$this->db->insert('user',$data);
	}

	public function getEmail($id)
	{
		$this->db->select('email');
		$this->db->from('user');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function checkemail($email)
	{
		$this->db->select('id');
		$this->db->from('user');
		$this->db->where('email',$email);
		$query = $this->db->get();

		if(empty($query->row()))
			return true;
		else
			return false;

	}

	public function updateP($id,$password)
	{
		$this->db->set('password',$password);
		$this->db->where('id',$id);
		$this->db->update('user');

	}

	public function updateEAndP($id,$password,$email)
	{
		$this->db->set('password',$password);
		$this->db->set('email',$email);
		$this->db->where('id',$id);
		$this->db->update('user');

	}

	public function updateE($id,$email)
	{
		$this->db->set('email',$email);
		$this->db->where('id',$id);
		$this->db->update('user');

	}

}