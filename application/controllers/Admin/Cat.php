<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_user') == 0) {
				$data['main_view'] = 'admin/cat';
				$data['cat'] = $this->admin_model->get_cat();
				$this->load->view('admin/template', $data);
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_user') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
	}

	public function add()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_user') == 0) {
			if ($this->input->post('submit')) {
    			if ($this->admin_model->add_category() == TRUE) {
    				redirect('admin/cat','refresh');
    			} else {
    				redirect('admin/cat','refresh');
    			}
    		}
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_user') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
	}
	
	public function remove()
	{
	    if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_user') == 0) {
			$id_jenis = $this->uri->segment(4);
			if ($this->admin_model->delete_category($id_jenis) == TRUE) {
				redirect('admin/cat','refresh');		
			} else {
				redirect('admin/cat','refresh');
			}
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_user') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
	}

}

/* End of file Cat.php */
/* Location: ./application/controllers/Admin/Cat.php */