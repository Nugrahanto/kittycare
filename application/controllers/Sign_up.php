<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sign_up extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('cek');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') != TRUE) {
			$this->load->view('sign_up');
		} else {
			redirect('login','refresh');
		}
	}

	public function verify()
	{
		// if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->input->post("submit")) {

				if ($this->cek->register() == TRUE) {
					$data = $this->input->post('form-email');
					$this->load->view('verified', $data); 
				} else{
					$data['notifError'] = 'Pendaftaran gagal';
					$this->load->view('sign_up', $data);	
				}
			}
		// } else {
		// 	$data['notifError'] = 'Pendaftaran gagal';
		// 	$this->load->view('sign_up', $data);
		// 	// $data['notifError'] = 'Email Already exists!';
		// 	// $this->load->view('sign_up', $data);
		// }

	}

}

/* End of file Sign_up.php */
/* Location: ./application/controllers/Sign_up.php */