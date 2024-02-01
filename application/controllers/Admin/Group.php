<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_user') == 0) {
				$data['main_view'] = 'admin/group';
				$data['group'] = $this->admin_model->get_group();
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
				$data['main_view'] = 'admin/group_add';
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
			if ($this->admin_model->add_group() == TRUE)  {
				if ($this->session->userdata('id_user') == 0) {
					redirect('admin/group','refresh');
				} else {
					$data['main_view'] = 'admin/group_add';
					$this->load->view('template', $data);
				}
			}
		}
	}

	public function detail()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_user') == 0) {
			$id_group = $this->uri->segment(4);

			$data['main_view'] = 'admin/detail_group';
			$data['mbr_group'] = $this->admin_model->get_member_group($id_group);
			$data['det_group'] = $this->admin_model->get_det_group($id_group);
			$this->load->view('admin/template', $data);
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_user') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
	}

	public function edit()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_user') == 0) {
			$id_group = $this->uri->segment(4);

			$data['main_view'] = 'admin/edit_group';
			$data['det_group'] = $this->admin_model->get_det_group($id_group);
			$this->load->view('admin/template', $data);
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_user') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
	}

	public function do_edit()
	{		
		$id_group = $this->input->post('id_group');
		if ($this->input->post('submit')) {
			if ($this->admin_model->edit_group($id_group) == TRUE)  {
				if ($this->session->userdata('id_user') == 0) {
					redirect('admin/group/detail/'.$id_group.'','refresh');
				} else {
					redirect('admin/group','refresh');
				}
			}
		}
	}
	
	public function delete()
	{
	    if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_user') == 0) {
			$id_group = $this->uri->segment(4);
			if ($this->admin_model->delete_group($id_group) == TRUE) {
				redirect('admin/group','refresh');
			} else {
				redirect('admin/group','refresh');
			}
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_user') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
	}

}

/* End of file group.php */
/* Location: ./application/controllers/Admin/group.php */