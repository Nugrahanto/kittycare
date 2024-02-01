<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function get_home_group(){
		return $this->db->order_by('id_group','DESC')
						->get('groups', 2)
						->result();
	}
	
	public function get_home_article(){
		return $this->db->order_by('id_article','DESC')
						->get('article')
						->result();
	}

	public function add_cat(){

		$tgl = date("Y-m-d", strtotime($this->input->post('tgl_lahir')));
		$id_user = $this->session->userdata('id_user');

		$data = array(
			'id_kucing'			=> NULL,
			'id_user'			=> $id_user,
			'id_jenis'			=> $this->input->post('id_jenis'),
			'nama_kucing'		=> $this->input->post('nama_kucing'),
			'tgl_lahir'			=> $tgl,
			'jenis_kelamin'		=> $this->input->post('jenis_kelamin')
		);
		
		$this->db->insert('kucing', $data);
		
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function get_cat(){
		$id_user = $this->session->userdata('id_user');
		return $this->db->order_by('id_kucing','ASC')
						->where('kucing.id_user', $id_user)
						->join('users','users.id_user = kucing.id_user')
						->join('jenis_kucing','jenis_kucing.id_jenis = kucing.id_jenis')
						->get('kucing')
						->result();
	}
	
	public function total_records_article(){
		return $this->db->from('article')
						->count_all_results();
	}

	public function get_article($limit, $start){
		return $this->db->limit($limit, $start)
						->order_by('id_article','ASC')
						->get('article')
						->result();
	}

	public function get_det_article($id_article){
		return $this->db->where('id_article', $id_article)
				 		->get('article')
				 		->row();
	}

	public function total_records_group(){
		return $this->db->from('groups')
						->count_all_results();
	}

	public function get_group($limit, $start){
		return $this->db->limit($limit, $start)
						->order_by('id_group','ASC')
						->get('groups')
						->result();
	}

	public function get_my_group(){
		$id_user = $this->session->userdata('id_user');
		return $this->db->order_by('user_groups.id_group','ASC')
						->where('user_groups.id_user', $id_user)
						->join('groups','groups.id_group = user_groups.id_group')
						->get('user_groups')
						->result();
	}

	public function get_det_group($id_group){
		return $this->db->where('id_group', $id_group)
				 		->get('groups')
				 		->row();
	}

	public function join($id_group){
		$id_user = $this->session->userdata('id_user');

		$data = array(
			'id_group'			=> $id_group,
			'id_user'			=> $id_user,
		);

		$check = $this->db->where('id_group', $id_group)
						 ->where('id_user', $id_user)
						 ->count_all_results('user_groups');

		if ($check === 0) {
			$this->db->insert('user_groups', $data);
		}

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function unjoin($id_group){
		$id_user = $this->session->userdata('id_user');

		$this->db->where('id_group', $id_group)
				 ->where('id_user', $id_user)
	  	     	 ->delete('user_groups');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_member_group($id_group){
		$id_user = $this->session->userdata('id_user');
		return $this->db->order_by('user_groups.id_user','ASC')
						->where('user_groups.id_group', $id_group)
						->join('users','users.id_user = user_groups.id_user')
						->get('user_groups')
						->result();
	}

	public function get_other_group($id_group){
		return $this->db->order_by('id_group','ASC')
						->where('id_group !=', $id_group)
						->get('groups')
						->result();
	}

	public function check(){
		date_default_timezone_set("Asia/Bangkok");
		$tgl = date("Y-m-d");
		$id_user = $this->session->userdata('id_user');
		$gejalas = $this->input->post('gejala');

			$data = array(
				'id_kucing'			=> $this->input->post('id_kucing'),
				'id_user'			=> $id_user,
				'tgl_konsultasi'	=> $tgl
			);

		$this->db->insert('history', $data);
		$lastId = $this->db->insert_id();
		if ($gejalas) {
			foreach ($gejalas as $gejala) {

				$datadet = array(
					'id_history'		=> $lastId,
					'id_gejala'			=> $gejala,
					'id_penyakit_1'		=> null,
					'id_penyakit_2'		=> null,
					'id_penyakit_3'		=> null,
					'id_penyakit_4'		=> null,
					'id_penyakit_5'		=> null
				);
				$this->db->insert('det_history', $datadet);

			}
		}

		if ($this->db->affected_rows() > 0) {
			return $lastId;
		}else{
			return FALSE;
		}
	}

	public function get_user(){
		$id_user = $this->session->userdata('id_user');
		return $this->db->where('id_user', $id_user)
				 		->get('users')
				 		->row();
	}
	
	public function change_photo($file_name){
		$id_user = $this->session->userdata('id_user');

		$data = array(
			'foto' => $file_name['file_name']
			);

		$this->db->where('id_user', $id_user)
				 ->update('users', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function edit_user(){

		$id_user = $this->session->userdata('id_user');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$phone = $this->input->post('phone');

		$data = array(
			'first_name'	=> $first_name,
			'last_name'		=> $last_name,
			'phone'			=> $phone
			);

		$this->db->where('id_user', $id_user)
				 ->update('users', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else{
			return FALSE;
		}
	}

	public function edit_userfoto($file_name){

		$id_user = $this->session->userdata('id_user');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$phone = $this->input->post('phone');

		$data = array(
			'first_name'	=> $first_name,
			'last_name'		=> $last_name,
			'phone'			=> $phone,
			'foto' 			=> $file_name['file_name']
			);
		$this->db->where('id_user', $id_user)
				 ->update('users', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_member($id_user){
		return $this->db->where('id_user', $id_user)
				 		->get('users')
				 		->row();
	}

	public function get_history($limit, $start)
	{
		$id_user = $this->session->userdata('id_user');
		return $this->db->limit($limit, $start)
						->order_by('id_history','DESC')
						->where('history.id_user', $id_user)
						->join('kucing','kucing.id_kucing = history.id_kucing')
						->get('history')
						->result();
	}

	public function total_records_history(){
		return $this->db->from('history')
						->count_all_results();
	}

	public function get_det_history($id_history){
		return $this->db->where('history.id_history', $id_history)
						->join('det_history', 'det_history.id_history = history.id_history', 'left')
						->join('kucing','kucing.id_kucing = history.id_kucing')
						->join('users', 'users.id_user = kucing.id_user')
						->join('jenis_kucing', 'jenis_kucing.id_jenis = kucing.id_jenis')
				 		->get('history')
				 		->row();
	}

	public function add_comment($id_group){
		$id_user = $this->session->userdata('id_user');
		date_default_timezone_set("Asia/Bangkok");
		$stmp = date("Y-m-d H:i:s");

		$data = array(
			'id_comment'		=> NULL,
			'id_group'			=> $id_group,
			'id_user'			=> $id_user,
			'comment_parent'	=> $this->input->post('comment_parent'),
			'comment_body'		=> $this->input->post('comment_body'),
			'comment_created'	=> $stmp
		);

		$this->db->insert('comment', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_comment($id_group){
		return $this->db->where('id_group', $id_group)
						->join('users', 'users.id_user = comment.id_user')
						->get('comment')
						->result();
	}

	function tree_all($id_group) {
        $result = $this->db->where('id_group', $id_group)
						->join('users', 'users.id_user = comment.id_user')
						->get('comment')
						->result_array();
        $data = [];
        foreach ($result as $row) {
            $data[] = $row;
        }
        return $data;
    }

    function tree_by_parent($id_group,$comment_parent) {
        $result =  $this->db->where('id_group', $id_group)
        				->where('comment_parent', $comment_parent)
						->join('users', 'users.id_user = comment.id_user')
						->get('comment')
						->result_array();
        // $this->db->query("SELECT * FROM comment where comment_parent = $comment_parent AND  id_group = $id_group")->result_array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        return $data;
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
			$gejala = $this->db->where('id_penyakit', $g->id_penyakit)->where('priority', 1)->get('gejala_penyakit')->result();
			$res = $result->result();
			$index = 1; $count = 0;
			foreach ($res as $res) {
				if ($res->id_penyakit == $g->id_penyakit) {
					$count += $this->db->where('id_penyakit', $g->id_penyakit)->where('id_gejala', $res->id_gejala)->where('priority', 1)->get('gejala_penyakit')->num_rows();
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

	public function get_penyakit() {
		return $this->db->group_by('id_penyakit')->get('penyakit')->result();
	}

	public function get_total_penyakit() {
		return $this->db->group_by('id_penyakit')->get('penyakit')->num_rows();
	}

	public function get_total_gejala() {
		return $this->db->group_by('id_gejala')->get('gejala')->num_rows();
	}

	public function get_gejala_penyakit() {
		return $this->db->group_by('id_gejala_penyakit')->get('gejala_penyakit')->result();
	}

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */