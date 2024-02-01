<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indication extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_user') == 0) {
			$data['main_view'] = 'admin/indication';
			$data['disease'] = $this->admin_model->get_disease();
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
			$id_penyakit = $this->uri->segment(4);

			$data['main_view'] = 'admin/detail_disease';
			$data['det_disease'] = $this->admin_model->get_det_disease($id_penyakit);
			$data['indication_disease'] = $this->admin_model->get_indication_disease($id_penyakit);
			$this->load->view('admin/template', $data);
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_user') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
	}

	public function do_add()
	{
		if ($this->input->post('submit')) {
			if (($res = $this->admin_model->add_indication()) != 0)  {
				if ($this->session->userdata('id_user') == 0) {
					redirect('admin/indication/detail/'.$res.'','refresh');
				} else {
					$data['main_view'] = 'admin/dashboard';
					$this->load->view('template', $data);
				}
			}
		}
	}

	public function edit()
	{		
		$id_gejala = $this->input->post('id_gejala');
		if ($this->input->post('submit')) {
			if ($this->admin_model->edit_indication($id_gejala) == TRUE)  {
				if ($this->session->userdata('id_user') == 0) {
					redirect('admin/indication','refresh');
				} else {
					$data['main_view'] = 'admin/dashboard';
					$this->load->view('template', $data);
				}
			}
		}
	}

	public function delete()
	{
	    if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_user') == 0) {
			$id_gejala = $this->uri->segment(4);
			if ($this->admin_model->delete_indication($id_gejala) == TRUE) {
				redirect('admin/indication','refresh');
			} else {
				redirect('admin/indication','refresh');
			}
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_user') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/Admin/dashboard.php */