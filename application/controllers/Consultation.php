<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consultation extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('kitty');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view']	= 'consul';
			$this->load->view('template', $data);
		} else {
			redirect('login', 'refresh');
		}			
	}

	public function check()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if (($res = $this->user_model->check()) != 0) {
				$data['main_view']	= 'consul';
				$this->load->view('template', $data);	
				redirect('consultation/result?'.md5('id_history').'='.$res, 'refresh');
			} else{
				$data['notif'] = 'Failed to upload data!';
				$data['main_view'] = 'consul';
				$this->load->view('template', $data); 
			}
		} else {
			redirect('login','refresh');
		}
	}

	public function result()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			// $id_history = $this->uri->segment(3);
			$id_history = $_GET[md5('id_history')];	

			$var = $this->kitty->initialize([
				'total'			=> $this->user_model->get_total_penyakit(),
				'm'				=> $this->user_model->get_total_gejala(),
				'penyakit'		=> $this->user_model->get_penyakit(),
				'all_gejala'	=> $this->user_model->get_gejala_penyakit(),
				'cur'			=> $this->user_model->get_history_gejala($id_history)
			]);
			$data['main_view'] = 'result';
			$data['det_konsul'] = $this->user_model->get_det_history($id_history);
			$data['gejala_history'] = $this->user_model->get_history_gejala($id_history);
			$data['gejala_penyakit_history'] = array_filter($this->user_model->get_history_penyakit($id_history));
			$data['penyakit'] = $this->user_model->get_penyakit();
			$data['hitungan'] = $this->kitty->count();

			$det_konsul = $this->user_model->get_det_history($id_history);
			$gejala_history = $this->user_model->get_history_gejala($id_history);
			$gejala_penyakit_history = array_filter($this->user_model->get_history_penyakit($id_history));
			$penyakit = $this->user_model->get_penyakit();
			$hitungan = $this->kitty->count();

			$tempHitungan = [];
				foreach ($hitungan as $key => $value) {
					$tempHitungan[$key] = $value;
				}
				arsort($tempHitungan);
				$temp = 0; $hasil = [];
				foreach ($tempHitungan as $key => $value) {
					if ($temp > $value) {
						break;
					}
					$temp = $value;
					$hasil[] = $key;
				}

				// if (count($hasil) == 1) {
				// 	echo $hasil[0];
				// 	// $this->db->query("UPDATE det_history set id_penyakit_1 = ".$hasil[0].", id_penyakit_2 = ".$p->id_penyakit[1]." where id_history = ".$id_history."");
				// }
				// else if (count($hasil) == 2) {
				// 	echo $hasil[0];
				// 	echo $hasil[1];
				// }

				for ($i=0; $i = count($hasil); $i++) { 
					if ($i == 1) {
						$this->db->query("UPDATE det_history set id_penyakit_1 = ".$hasil[0]." where id_history = ".$id_history."");
						break;
					} else if ($i == 2) {
						$this->db->query("UPDATE det_history set id_penyakit_1 = ".$hasil[1].", id_penyakit_2 = ".$hasil[0]." where id_history = ".$id_history."");
						break;
					} else if ($i == 3) {
						$this->db->query("UPDATE det_history set id_penyakit_1 = ".$hasil[2].", id_penyakit_2 = ".$hasil[1].", id_penyakit_3 = ".$hasil[0]." where id_history = ".$id_history."");
						break;
					} else if ($i == 4) {
						$this->db->query("UPDATE det_history set id_penyakit_1 = ".$hasil[3].", id_penyakit_2 = ".$hasil[2].", id_penyakit_3 = ".$hasil[1].", id_penyakit_4 = ".$hasil[0]." where id_history = ".$id_history."");
						break;
					} else if ($i == 5) {
						$this->db->query("UPDATE det_history set id_penyakit_1 = ".$hasil[4].", id_penyakit_2 = ".$hasil[3].", id_penyakit_3 = ".$hasil[2].", id_penyakit_4 = ".$hasil[1].", id_penyakit_5 = ".$hasil[0]." where id_history = ".$id_history."");
						break;
					} 
				}

				// if (is_array($gejala_penyakit_history) && $gejala_penyakit_history) {
				if (is_array($hasil) && $hasil) {
	            	$no = 1;
					// foreach ($gejala_penyakit_history as $data) {
					foreach ($penyakit as $p) {
						foreach ($hasil as $tmp) {
							if ($tmp == $p->id_penyakit) {
								// echo $p->id_penyakit[0];
								// $this->db->query("UPDATE det_history set id_penyakit_1 = ".$p->id_penyakit[0].", id_penyakit_2 = ".$p->id_penyakit[1]." where id_history = ".$id_history."");
							}
						}
					}
				}
			$this->load->view('template', $data);
		} else {
			redirect('login', 'refresh');
		}
	}

	public function history()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view']	= 'history';

			// load library pagination								
			$this->load->library('pagination');
			// konfigurasi library pagination
			$config['base_url'] = base_url().'consultation/history';
			$config['total_rows'] = $this->user_model->total_records_history();
			$config['per_page'] = 6;  // jml data yang ditampilkan per page
			$config['uri_segment'] = 3;
			//$config['num_links'] = 3;
			$config['full_tag_open'] = '<ul class="pagination post-pagination">';
			$config['full_tag_close'] = '</ul>';
			//$config['first_link'] = 'First';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';


			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';

			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			//$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			//$config['next_link'] = '&gt;';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			//$config['prev_link'] = '&lt;';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			
			$this->pagination->initialize($config);
			$start = $this->uri->segment(3, 0);
			
			$rows = $this->user_model->get_history($config['per_page'],$start);

			$data['history'] = $rows;
			$data['pagination'] = $this->pagination->create_links();
			$data['start'] = $start;
			$this->load->view('template', $data);
		} else {
			redirect('login', 'refresh');
		}
	}

	public function detail_history()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			// $id_history = $this->uri->segment(3);
			$id_history = $_GET[md5('id_history')];

			$var = $this->kitty->initialize([
				'total'			=> $this->user_model->get_total_penyakit(),
				'm'				=> $this->user_model->get_total_gejala(),
				'penyakit'		=> $this->user_model->get_penyakit(),
				'all_gejala'	=> $this->user_model->get_gejala_penyakit(),
				'cur'			=> $this->user_model->get_history_gejala($id_history)
			]);
			$data['main_view'] = 'det_history';
			$data['det_history'] = $this->user_model->get_det_history($id_history);
			$data['gejala_history'] = $this->user_model->get_history_gejala($id_history);
			$data['gejala_penyakit_history'] = array_filter($this->user_model->get_history_penyakit($id_history));
			$data['penyakit'] = $this->user_model->get_penyakit();
			$data['hitungan'] = $this->kitty->count();
			$this->load->view('template', $data);	
			// echo json_encode($this->user_model->get_history_penyakit($id_history));
		} else {
			redirect('login','refresh');
		}
	}

}

/* End of file Consultation.php */
/* Location: ./application/controllers/Consultation.php */