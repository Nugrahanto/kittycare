<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'profile';
			$data['home_group'] = $this->user_model->get_home_group();
			$this->load->view('template', $data);	
		} else {
			redirect('login','refresh');
		}	
	}

}

/* End of file Member.php */
/* Location: ./application/controllers/Member.php */