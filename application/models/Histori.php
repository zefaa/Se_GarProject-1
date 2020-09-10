<?php 

/**
 * 
 */
class Histori extends CI_Model
{

	function getHistoriX($new) {
		return $this->db->get_where('historix',['nama'=>$new])->result_Array();
	}
	function getHistoriXi($new) {
		return $this->db->get_where('historixi',['nama' => $new])->result_Array();
	}
	function getHistoriXii($new) {
		return $this->db->get_where('historixii',['nama' => $new])->result_Array();
	}
	function get10() {
		return $this->db->get('histori')->result_Array();
	}
}

 ?>