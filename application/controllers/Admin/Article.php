<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_user') == 0) {
				$data['main_view'] = 'admin/article';
				$data['article'] = $this->admin_model->get_article();
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
				$data['main_view'] = 'admin/article_add';
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

			$config['upload_path'] = './uploads/article';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']  = '10000';
			
			$this->load->library('upload', $config);
			
			// get_instance()->load->library('upload', $this->config);
			
			if ($this->upload->do_upload('file_name')){
				if ($this->admin_model->add_article($this->upload->data()) == TRUE) {
					redirect('admin/article','refresh');
				}
				else {
					redirect('admin/article/add','refresh');
				}
			}
			else{
				$this->session->set_flashdata('notif', $this->upload->display_errors());
				redirect('admin/article/add','refresh');
			}
		}

		// if ($this->input->post('submit')) {
		// 	if ($this->admin_model->add_article() == TRUE)  {
		// 		if ($this->session->userdata('id_user') == 0) {
		// 			redirect('admin/article','refresh');
		// 		} else {
		// 			$data['main_view'] = 'admin/article_add';
		// 			$this->load->view('template', $data);
		// 		}
		// 	}
		// }
	}

	public function detail()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_user') == 0) {
			$id_article = $this->uri->segment(4);

			$data['main_view'] = 'admin/detail_article';
			$data['det_article'] = $this->admin_model->get_det_article($id_article);
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
			$id_article = $this->uri->segment(4);

			$data['main_view'] = 'admin/edit_article';
			$data['det_article'] = $this->admin_model->get_det_article($id_article);
			$this->load->view('admin/template', $data);
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_user') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
	}

	public function do_edit()
	{		
		$id_article = $this->input->post('id_article');
		if ($this->input->post('submit')) {
			if ($this->admin_model->edit_article($id_article) == TRUE)  {
				if ($this->session->userdata('id_user') == 0) {
					redirect('admin/article/detail/'.$id_article.'','refresh');
				} else {
					redirect('admin/article','refresh');
				}
			}
		}
	}
	
	public function delete()
	{
	    if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_user') == 0) {
			$id_article = $this->uri->segment(4);
			if ($this->admin_model->delete_article($id_article) == TRUE) {
				redirect('admin/article','refresh');		
			} else {
				redirect('admin/article','refresh');
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