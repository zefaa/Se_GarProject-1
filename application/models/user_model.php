<?php 

/**
 * 
 */
class user_model extends CI_Model
{
	
	function getAllUser() {
		return $this->db->get('account')->result_Array();
	}
	function edit_user($id,$userNames,$password,$nama){
		$edit=$this->db->query("UPDATE account SET userNames='$userNames',password='$password',nama='$nama' WHERE id='$id'");
        return $edit;
	}
}
 ?>