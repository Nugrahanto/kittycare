<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_user') == 0) {
			$data['main_view'] = 'admin/user';
			$data['user'] = $this->admin_model->get_user();
			$this->load->view('admin/template', $data);	
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_user') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
	}

	public function detail()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_user') == 0) {
			$id_user = $this->uri->segment(4);

			$data['main_view'] = 'admin/detail_user';
			$data['det_user'] = $this->admin_model->get_user_detail($id_user);
			$data['det_user_pets'] = $this->admin_model->get_user_detail_pets($id_user);
			$data['det_user_history'] = $this->admin_model->get_user_detail_history($id_user);
			$this->load->view('admin/template', $data);
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_user') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
	}

	public function detail_history()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_user') == 0) {
			$id_history = $this->uri->segment(4);

			// $data['main_view'] = 'admin/detail_consul';
			// $this->load->view($data);
			$data['det_konsul'] = $this->admin_model->get_det_history($id_history);
			$data['gejala_history'] = $this->admin_model->get_history_gejala($id_history);
			$data['gejala_penyakit_history'] = $this->admin_model->get_history_penyakit($id_history);
			$this->load->view('admin/detail_consul', $data);
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_user') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
	}

	public function delete()
	{
	    if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_user') == 0) {
			$id_user = $this->uri->segment(4);
			if ($this->admin_model->delete_user($id_user) == TRUE) {
				redirect('admin/user','refresh');		
			} else {
				redirect('admin/user','refresh');
			}
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_user') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
	}

}

/* End of file User.php */
/* Location: ./application/controllers/Admin/User.php */