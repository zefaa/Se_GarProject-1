<?php

/**
 * 
 */
class Laporan_model extends Ci_Model
{
	function index() {

	}

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
	function getAllLaporan() {
		return $this->db->get('laporan')->result_array();
	}
	function cetakLaporanKelas() {
		$kelas = $this->input->post('kelas');

		if ($kelas==10) {
			return $this->db->get_where('laporan', ['kelas' => 10 ])->result_array();
		}elseif ($kelas==11) {
			return $this->db->get_where('laporan', ['kelas' => 11 ])->result_array();
		}elseif ($kelas==12) {
			return $this->db->get_where('laporan', ['kelas' => 10 ])->result_array();
		}else{
			return null;
		}
		
	}
	function inputData() {
		$tanggal = date("Y-m-d H:i:s");
		$a=substr($this->input->post('simpan'), 3);
		$b=substr($this->input->post('pinjam'), 3);
		$angka1 = str_replace(".", "", $a);
		$angka2 = str_replace(".", "", $b);
		$total = $angka1-$angka2;
		$nama = $this->input->post('nama');
		$user = $this->db->get_where('laporan',['nama'=>$nama])->row_array();
		
		$kelas = $this->input->post('kelas');
		

		if($user) {
			$saldo = $user['saldo'];
			$total =  $saldo + $angka1 - $angka2; 
			$data = array(
				'simpan' => $this->input->post('simpan'),
				'ambil' => $this->input->post('pinjam'),
				'saldo' => $total,
				'tanggal' => $tanggal, ); 
			$histori = array (
				'nama' => $nama,
				'simpan' => $this->input->post('simpan'),
				'ambil' => $this->input->post('pinjam'),
				'saldo' => $total,
				'tanggal' => $tanggal,
			);
			
			if($kelas == 10) {
				$this->db->insert('historix',$histori);
			}elseif($kelas ==11 ) {
				$this->db->insert('historixi',$histori);
			}elseif($kelas == 12){
				$this->db->insert('historixi',$histori);
			}
			$this->db->where(['nama'=> $nama]);
			$this->db->update('laporan',$data);

		}else{
			$data = array(
				'nama' => $this->input->post('nama'),
				'simpan' => $this->input->post('simpan'),
				'ambil' => $this->input->post('pinjam'),
				'saldo' => $total,
				'kelas' => $this->input->post('kelas'),
				'tanggal' => $tanggal,	 );		
			$this->db->insert('laporan', $data);

			$histori = array(
				'nama' => $this->input->post('nama'),
				'simpan' => $this->input->post('simpan'),
				'ambil' => $this->input->post('pinjam'),
				'saldo' => $total,
				'tanggal' => $tanggal,	 );		
			if($kelas == 10) {
				$this->db->insert('historix',$histori);
			}elseif($kelas ==11 ) {
				$this->db->insert('historixi',$histori);
			}elseif($kelas == 12){
				$this->db->insert('historixi',$histori);
			}
		}

		
		
		
	}
	function getRekap() {
		$sql = "SELECT sum(if(kelas='11',saldo,NULL)) as saldo11, sum(if(kelas='10',saldo,null)) as saldo10, sum(if(kelas='12',saldo,null)) as saldo12 FROM laporan";
		$result = $this->db->query($sql);
		return $result->row();
	}
	function search($key) {
		$this->db->like('nama', $key);
		$this->db->like('simpan', $key);
		$this->db->like('pinjam', $key);
		$this->db->like('saldo', $key);
		$this->db->like('kelas', $key);
		$this->db->like('tanggal', $key);

		$return = $this->db->get('laporan')->result();
		return $result;
	}
}