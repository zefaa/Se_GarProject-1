<?php 

/**
 * 
 */
class DataSeminaris extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Seminaris_model');
		

	}
	public function index()
	{
		
		$data['judul'] = 'Daftar Seminaris';
		$data['seminaris'] = $this->Seminaris_model->getAllDataSeminaris();
		$data['user'] = $this->db->get_where('account',['userNames'=> $this->session->userdata('userNames')])->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('dataSeminaris/index',$data);
		$this->load->view('templates/admin_footer');
	}
	function home() {
		$data['judul'] = 'Daftar Seminaris';
		$data['seminaris'] = $this->Seminaris_model->getAllDataSeminaris();
		$this->load->view('templates/header', $data);
		$this->load->view('dataSeminaris/index',$data);
		$this->load->view('templates/footer');

	}

	public function tambah() 
	{	
		$data['judul'] = 'Tambah Data';
		
		$this->form_validation->set_rules('nama',
			'Nama','required');
		$this->form_validation->set_rules('paroki',
			'Paroki','required');
		$this->form_validation->set_rules('ttl',
			'tempat tanggal lahir','required');

		if ($this->form_validation->run() == FALSE)
                {
                       $this->load->view('templates/header', $data);
		$this->load->view('dataSeminaris/tambah',$data);
		$this->load->view('templates/footer');	
                }
                else
                {
                        echo "suskse";;
                }
    }

    public function hapus($nama) 
    {
    	$this->Seminaris_model->hapusDataSeminaris($nama);
    	$this->session->set_flashdata('flas','Dihapus');
    	redirect('dataSeminaris');
    }
    
}
 ?>