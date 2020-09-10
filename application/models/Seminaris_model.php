<?php 

/**
 * 
 */
class Seminaris_model extends CI_Model
{
	
	public function getAllDataSeminaris()
	{
		return $this->db->get('dataseminaris')->result_array();

	}
	public function getSeminarisNama($new) {
		
		
		return $this->db->get_where('dataseminaris',['nama'=>$new])->result_array();
		
	}
	public function tambahDataSeminaris()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"paroki" => $this->input->post('paroki',true),
			"ttl" => $this->input->post('ttl',true),
			"kelas" => $this->input->post('kelas',true),
		];

		$this->db->insert('dataseminaris',$data);
	}

	public function hapusDataSeminaris($nama) 
	{
		
		$this->db->where('nama',$nama);
		$this->db->delete('dataseminaris');
	}
}
 ?>