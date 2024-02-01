<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pets extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'pets';
			$data['cat'] = $this->user_model->get_cat();
			$this->load->view('template', $data);
		} else {
			redirect('login', 'refresh');
		}
	}

	public function add()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->user_model->add_cat() == TRUE) {
				$data['main_view'] = 'pets';
				$this->load->view('template', $data);
				redirect('pets', 'refresh');
			} else{
				$data['notifError'] = 'Failed to upload data!';
				$data['main_view'] = 'pets';
				$this->load->view('template', $data); 
			}
		} else {
			redirect('login','refresh');
		}
	}

}

/* End of file Pets.php */
/* Location: ./application/controllers/Pets.php */