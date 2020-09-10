<?php 
/**
 * 
 */
class Auth extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
		
	}
	public function index() {
		$this->form_validation->set_rules('userName','User Name','required');

		$this->form_validation->set_rules('password','password','required');
		
		if($this->form_validation->run() ==  false) {
			$this->load->view('auth/index');
		}
		else{
			$this->_login();
		}
		

	}
	private function _login() 
	{
		$userName = $this->input->post('userName');
		$password = $this->input->post('password');

		$user = $this->db->get_where('account', ['userNames'=> $userName] )->result();
		$nama = $user['nama'];
		
		
		if($user) {
			
			if($password == $user['password']) {
				

				$this->session->set_userdata('userNames', $user['userNames']);
				if ($user['userNames'] == "admin") {
					redirect('admin');
				}else{
					redirect('home');
				}
				

			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password ora valid bro</div>');
				redirect('auth');
			}
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">User Name ora valid bro</div>');
			redirect('auth');
		}

	}

}

?>