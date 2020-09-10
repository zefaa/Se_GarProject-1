<?php
class Blog_model extends CI_Model{

	function get_all_blog(){
		$result=$this->db->get('dataseminaris');
		return $result;
	}

	function search_blog($title){
		$this->db->like('nama', $title , 'both');
		$this->db->order_by('nama', 'ASC');
		$this->db->limit(10);
		return $this->db->get('dataseminaris')->result();
	}

}