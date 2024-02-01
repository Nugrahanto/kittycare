<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('cek');
	}

	public function index()
	{
		$this->load->view('sign_up');
	}

	public function register()
	{
		if ($this->input->post("submit")) {

			if ($this->cek->registered() == TRUE) {
				redirect('signup/success','refresh');
			} else {
				$data['notifError'] = 'Pendaftaran gagal';
					$this->load->view('sign_up', $data);
			} 
		}
	}

	public function success()
	{
		$this->load->view('success');
	}

	public function verify()
	{
		if ($this->input->post("submit")) {

			if ($this->cek->register() == TRUE) {
				
				$from = "no-reply@kittycare.tk";
                
                $a = $this->input->post('form-email');
                $to = $a;
                 
                $subject = "Confirm e-mail registration";
                 
                $message = "New user registration.\r\n To complete your the sign-up process, please follow this link :\r\n http://www.kittycare.tk/signup/verified?hash=".$this->input->post('form-hash')."";
                 
                $headers = "From:" . $from;
				
				if (mail($to,$subject,$message, $headers)) {
					$data = $this->input->post('form-email');
					$this->load->view('verified', $data);
				} else {
					$data['notifError'] = 'Pendaftaran gagal';
					$this->load->view('sign_up', $data);	
				}
			} else{
				$data['notifError'] = 'Email Already exists!';
				$this->load->view('sign_up', $data);
			}
		}
	}
	
	public function verified()
	{
		$hash = $_GET['hash'];
		$data['hash'] = $this->cek->update_activate($hash);
		$this->load->view('verifiedtrue', $data);
	}

}

/* End of file Sign_up.php */
/* Location: ./application/controllers/Sign_up.php */