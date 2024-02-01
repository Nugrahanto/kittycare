<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function get_user(){
		return $this->db->order_by('id_user', 'ASC')
						->where('id_user !=', 0)
				 		->get('users')
				 		->result();
	}

	public function get_user_detail($id_user){
		return $this->db->where('users.id_user', $id_user)
						->get('users')
						->row();
	}

	public function get_user_detail_pets($id_user){
		return $this->db->where('id_user', $id_user)
						->join('jenis_kucing', 'jenis_kucing.id_jenis = kucing.id_jenis')
						->get('kucing')
						->result();
	}

	public function get_user_detail_history($id_user){
		return $this->db->order_by('id_history', 'DESC')
						->where('history.id_user', $id_user)
						->join('kucing', 'kucing.id_kucing = history.id_kucing')
						->join('jenis_kucing', 'jenis_kucing.id_jenis = kucing.id_jenis')
						->get('history')
						->result();
	}

	public function delete_user($id_user){
		$this->db->where('id_user', $id_user)
				 ->delete('users');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_group(){
		return $this->db->order_by('id_group', 'DESC')
				 		->get('groups')
				 		->result();
	}

	public function get_det_history($id_history){
		return $this->db->where('history.id_history', $id_history)
						->join('det_history', 'det_history.id_history = history.id_history')
						->join('kucing','kucing.id_kucing = history.id_kucing')
						->join('users', 'users.id_user = kucing.id_user')
						->join('jenis_kucing', 'jenis_kucing.id_jenis = kucing.id_jenis')
				 		->get('history')
				 		->row();
	}

	public function get_cat(){
		return $this->db->order_by('id_jenis', 'ASC')
				 		->get('jenis_kucing')
				 		->result();
	}

	public function add_category(){
		$name = $this->input->post('nama_jenis');

		$data = array(
			'id_jenis' 		=> NULL, 
			'nama_jenis'	=> $name,
			);
		$this->db->insert('jenis_kucing', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function delete_category($id_jenis){
		$this->db->where('id_jenis', $id_jenis)
				 ->delete('jenis_kucing');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}


	public function get_history_gejala($id_history)
	{
		return $this->db->where('id_history', $id_history)
						->join('gejala', 'gejala.id_gejala = det_history.id_gejala')
						->get('det_history')
						->result();
	}

	public function get_history_penyakit($id_history)
	{
		$this->db->select('*');
		$this->db->from('history AS h');
		$this->db->join('det_history AS dh', 'dh.id_history = h.id_history', 'left');
		$this->db->join('gejala_penyakit AS gp', 'gp.id_gejala = dh.id_gejala', 'left');
		$this->db->where('h.id_history', $id_history);
		$result = $this->db->get();
		$this->db->select('*');
		$this->db->from('history AS h');
		$this->db->join('det_history AS dh', 'dh.id_history = h.id_history', 'left');
		$this->db->join('gejala_penyakit AS gp', 'gp.id_gejala = dh.id_gejala', 'left');
		$this->db->where('h.id_history', $id_history);
		$this->db->group_by('gp.id_penyakit');
		$group = $this->db->get();
		$row = $result->num_rows();
		$penyakit = [];
		foreach ($group->result() as $g) {
			$gejala = $this->db->where('id_penyakit', $g->id_penyakit)->get('gejala_penyakit')->result();
			$res = $result->result();
			$index = 1; $count = 0;
			foreach ($res as $res) {
				if ($res->id_penyakit == $g->id_penyakit) {
					$count += $this->db->where('id_penyakit', $g->id_penyakit)->where('id_gejala', $res->id_gejala)->get('gejala_penyakit')->num_rows();
				}
				if ($index == $row) {
					if ($count == count($gejala)) {
						$penyakit[] = $g->id_penyakit;
					}
					continue;
				}
				$index += 1;
			}
		}
		$result = [];
		foreach ($penyakit as $p) {
			$result[] = $this->db->where('id_penyakit', $p)->get('penyakit')->row();
		}
		return $result;
	}

	public function get_member_group($id_group){
		$id_user = $this->session->userdata('id_user');
		return $this->db->order_by('user_groups.id_user','ASC')
						->where('user_groups.id_group', $id_group)
						->join('users','users.id_user = user_groups.id_user')
						->get('user_groups')
						->result();
	}

	public function get_det_group($id_group){
		return $this->db->where('id_group', $id_group)
				 		->get('groups')
				 		->row();
	}

	public function add_group(){
		$title = $this->input->post('title');
		$desc = $this->input->post('description');

		$data = array(
			'id_group' 		=> NULL, 
			'name'			=> $title,
			'description'	=> $desc
			);
		$this->db->insert('groups', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function edit_group($id_group){
		$name = $this->input->post('title_group');
		$desc = $this->input->post('description');

		$data = array( 
			'name'			=> $name,
			'description'	=> $desc
			);
		$this->db->where('id_group', $id_group)
				 ->update('groups', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function delete_group($id_group){
		$this->db->where('id_group', $id_group)
				 ->delete('groups');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_disease(){
		return $this->db->group_by('id_penyakit')
						->get('penyakit')
						->result();
	}

	public function get_det_disease($id_penyakit){
		return $this->db->where('id_penyakit', $id_penyakit)
				 		->get('penyakit')
				 		->row();
	}

	public function get_indication_disease($id_penyakit){
		return $this->db->where('id_penyakit', $id_penyakit)
						->join('gejala', 'gejala.id_gejala = gejala_penyakit.id_gejala')
				 		->get('gejala_penyakit')
				 		->result();
	}

	public function add_indication()
	{
		$id_penyakit = $this->input->post('id_penyakit');
		$nama_gejala = $this->input->post('nama_gejala');

		$data = array(
			'id_gejala' 		=> NULL, 
			'nama_gejala'		=> $nama_gejala
			);
		$this->db->insert('gejala', $data);
		$lastId = $this->db->insert_id();

				$datadet = array(
					'id_gejala_penyakit'=> NULL,
					'id_penyakit'		=> $id_penyakit,
					'id_gejala'			=> $lastId,
					'priority'			=> 1
				);
				$this->db->insert('gejala_penyakit', $datadet);

		if ($this->db->affected_rows() > 0) {
			return $id_penyakit;
		}else{
			return FALSE;
		}
	}

	public function edit_indication($id_gejala)
	{
		$nama_gejala = $this->input->post('nama_gejala');

		$data = array(
			'nama_gejala'		=> $nama_gejala
			);
		$this->db->where('id_gejala', $id_gejala)
				 ->update('gejala', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function delete_indication($id_gejala){
		$this->db->where('id_gejala', $id_gejala)
				 ->delete('gejala');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function get_article(){
		return $this->db->order_by('id_article', 'DESC')
				 		->get('article')
				 		->result();
	}

	public function get_det_article($id_article){
		return $this->db->where('id_article', $id_article)
				 		->get('article')
				 		->row();
	}

	public function add_article($file_name){
		$title = $this->input->post('title_article');
		$desc = $this->input->post('desc_article');
		date_default_timezone_set("Asia/Bangkok");
		$tgl = date("Y-m-d");

		$data = array(
			'id_article' 		=> NULL, 
			'title_article'		=> $title,
			'date_post'			=> $tgl,
			'desc_article'		=> $desc,
			'picture_article'	=> $file_name['file_name']
			);
		$this->db->insert('article', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function edit_article($id_article){
		$title = $this->input->post('title_article');
		$desc = $this->input->post('desc_article');
		date_default_timezone_set("Asia/Bangkok");
		$tgl = date("Y-m-d");

		$data = array( 
			'title_article'		=> $title,
			'date_post'			=> $tgl,
			'desc_article'		=> $desc
			);
		$this->db->where('id_article', $id_article)
				 ->update('article', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function delete_article($id_article){
		$this->db->where('id_article', $id_article)
				 ->delete('article');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */