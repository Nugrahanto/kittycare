<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {

			$data['main_view'] = 'profile';
			$data['user'] = $this->user_model->get_user();
			$this->load->view('template', $data);	
		} else {
			redirect('login','refresh');
		}	
	}

	public function user()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			// $id_user = $this->uri->segment(3);
			$id_user = $_GET[md5('id_user')];

			$data['main_view'] = 'profile';
			$data['user'] = $this->user_model->get_member($id_user);
			$this->load->view('template', $data);	
		} else {
			redirect('login','refresh');
		}	
	}
	
	public function ganti_foto()
	{
		if ($this->input->post('submit')) {
			$config['upload_path'] = './uploads/foto_profil';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']  = '5000';
			
			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('foto')){
				if ($this->user_model->change_photo($this->upload->data()) == TRUE) {
					redirect('profile','refresh');
				}
				else {
					$this->session->set_flashdata('notif', 'Gagal Upload Gambar!');
					redirect('profile', 'refresh');	
				}
			}
			else{
				$this->session->set_flashdata('notif', $this->upload->display_errors());
				redirect('profile', 'refresh');	
			}
		}
	}

	public function edit_profile()
	{
		if ($this->input->post('submit')) {
			if ($this->input->post('foto') == "") {
				if ($this->user_model->edit_user() == TRUE)  {
					redirect('profile','refresh');
				} 
			} 
		} else {
			$config['upload_path'] = './uploads/foto_profil';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']  = '5000';
			
			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('foto')){
				if ($this->user_model->change_photo($this->upload->data()) == TRUE) {
					redirect('profile','refresh');
				}
				else {
					$this->session->set_flashdata('notif', 'Gagal Upload Gambar!');
					redirect('groups', 'refresh');	
				}
			}
			else{
				$this->session->set_flashdata('notif', $this->upload->display_errors());
				redirect('article', 'refresh');	
			}
		}
	}

}

/* End of file Member.php */
/* Location: ./application/controllers/Member.php */