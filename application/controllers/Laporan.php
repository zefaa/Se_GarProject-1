<?php 
/**
 * 
 */
class Laporan extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('laporan_model');
		$this->load->model('Seminaris_model');
		$this->load->model('Histori');
		error_reporting(0);
	}
	public function index()
	{
		$data['judul']='E-Keuangan';
		$data['laporan']= $this->laporan_model->getAllLaporan();
		$this->load->view('templates/header',$data);
		$this->load->view('laporan/laporanUser',$data);
		$this->load->view('templates/footer');
	
	}
	function get_autocomplete(){
		if (isset($_GET['term'])) {
		  	$result = $this->laporan_model->search_blog($_GET['term']);
		   	if (count($result) > 0) {
		    foreach ($result as $row)
		     	$arr_result[] = array(
					'label'			=> $row->nama,
					'description'	=> $row->kelas,
				);
		     	echo json_encode($arr_result);
		   	}
		}
	}
	function tambah() {
		$this->laporan_model->inputData();
		redirect('laporan');
	}
	
	function rekap($nama) {
		$key= preg_replace('/[1-20]/', "" , $nama);
		$new = str_replace('%', ' ', $key);
		
		$data['histori']='';
		$kls = '';
		$kelas = $this->Seminaris_model->getSeminarisNama($new);
		
		foreach ($kelas as $key) {
			$kls = $key['kelas'];		
		}
		if($kls == 10) {
			$data['histori'] = $this->Histori->getHistoriX($new);
		}elseif ($kls == 11) {
			$data['histori'] = $this->Histori->getHistoriXi($new);
		}elseif ($kls == 12) {
			$data['histori'] = $this->Histori->getHistoriXii($new);
		}
 		$data['diri'] = $this->Seminaris_model->getSeminarisNama($new);
 		
		$data['judul']='history';

		$data['user'] = $this->db->get_where('account',['userNames'=> $this->session->userdata('userNames')])->row_array();
		$this->load->view('templates/header',$data);
		$this->load->view('admin/history',$data);
	}
	
}

 ?>