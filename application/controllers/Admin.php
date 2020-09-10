<?php 


class Admin extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('laporan_model');
		$this->load->model('Seminaris_model');
		$this->load->model('Histori');
		$this->load->model('user_model');
		$this->load->library('session');
		error_reporting(0);
	}
	public function index()
	{
		$data['user'] = $this->db->get_where('account',['userNames'=> $this->session->userdata('userNames')])->row_array();

		$data['judul']='E-Keuangan';
		$this->load->view('templates/admin_header',$data);
		$this->load->view('admin/dashboard');
		$this->load->view('templates/admin_footer');

	}
	function pedoman() {
		$data['user'] = $this->db->get_where('account',['userNames'=> $this->session->userdata('userNames')])->row_array();
		$data['judul']='E-Keuangan';
		$this->load->view('templates/admin_header',$data);
		$this->load->view('admin/pedoman');
		$this->load->view('templates/admin_footer');
	}
	function inputData() {
		$data['user'] = $this->db->get_where('account',['userNames'=> $this->session->userdata('userNames')])->row_array();
		$data['judul']='Input Laporan';
		$data['laporan']= $this->laporan_model->getAllLaporan();
		$this->load->view('templates/admin_header',$data);
		$this->load->view('admin/inputLaporan',$data);
	
	}
	function rekapitulasi() {
		$data['user'] = $this->db->get_where('account',['userNames'=> $this->session->userdata('userNames')])->row_array();
		$data['judul']='E-Keuangan';
		$data['total']= $this->laporan_model->getRekap();
		
		$this->load->view('templates/admin_header',$data);
		$this->load->view('admin/rekapitulasi',$data);

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
		redirect('admin/inputData');
	}
	function print() {
		$data['laporan']= $this->laporan_model->getAllLaporan();
		$this->load->view('admin/printLaporan',$data);
	}
	function pdf() {
		$this->load->library('mypdf');
		$data['kelas'] = $this->input->post('kelas');
		$data['laporan']= $this->laporan_model->cetakLaporanKelas();
		$this->mypdf->generate('admin/pdf',$data,'laporan-seminaris','A4','landscape');
	}
	function history($nama) {
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
		$this->load->view('templates/admin_header',$data);
		$this->load->view('admin/history',$data);
	}
	function user() {
		$data['judul'] = 'Pengguna';
		$data['user'] = $this->db->get_where('account',['userNames'=> $this->session->userdata('userNames')])->row_array();
		$data['status']= $this->user_model->getAllUser();

		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/user', $data);
		$this->load->view('templates/admin_footer');

	}
	function edit_user() {
		$id = $this->input->post('id');
		$userNames = $this->input->post('userNames');
		$password = $this->input->post('password');
		$nama = $this->input->post('nama');

		$this->user_model->edit_user($id,$userNames,$password,$nama);
	
		redirect ('Admin/user');
	}
	
}
?>