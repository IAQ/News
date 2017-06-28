<?php
class rss_model extends CI_Model {

	
	public function __construct()
	{
		$this->load->database();
	}

	public function get_rss($tag)
	{
		$this->db->select('url');
		$this->db->from('RSS');
		$this->db->where('tag', $tag);
		$query = $this->db->get();
		return $query->row();
	}
}