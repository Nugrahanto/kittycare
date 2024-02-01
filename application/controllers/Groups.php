<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groups extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view']	= 'groups';

			// load library pagination								
			$this->load->library('pagination');
			// konfigurasi library pagination
			$config['base_url'] = base_url().'groups/page';
			$config['total_rows'] = $this->user_model->total_records_group();
			$config['per_page'] = 4;  // jml data yang ditampilkan per page
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
			$config['next_tag_open'] = '<li><a href="#">Next';
			$config['next_tag_close'] = '</a></li>';
			//$config['prev_link'] = '&lt;';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			
			$this->pagination->initialize($config);
			$start = $this->uri->segment(3, 0);
			
			$rows = $this->user_model->get_group($config['per_page'],$start);

			$data['group'] = $rows;
			$data['pagination'] = $this->pagination->create_links();
			$data['start'] = $start;
			$this->load->view('template', $data);
		} else {
			redirect('login','refresh');
		}
	}

	public function page()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view']	= 'groups';

			// load library pagination								
			$this->load->library('pagination');
			// konfigurasi library pagination
			$config['base_url'] = base_url().'groups/page';
			$config['total_rows'] = $this->user_model->total_records_group();
			$config['per_page'] = 4;  // jml data yang ditampilkan per page
			$config['uri_segment'] = 3;
			//$config['num_links'] = 3;
			$config['full_tag_open'] = '<ul class="pagination post-pagination">';
			$config['full_tag_close'] = '</ul>';
			//$config['first_link'] = 'First';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';


			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</li>';

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
			
			$rows = $this->user_model->get_group($config['per_page'],$start);

			$data['group'] = $rows;
			$data['pagination'] = $this->pagination->create_links();
			$data['start'] = $start;
			$this->load->view('template', $data);
		} else {
			redirect('login','refresh');
		}
	}

	public function me(){
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view']	= 'my_groups';
			$data['my_group'] = $this->user_model->get_my_group();
			$this->load->view('template', $data);
		} else {
			redirect('login','refresh');
		}
	}

	public function detail()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$id_group = $this->uri->segment(3);
			// $id_group = $_GET[md5('id_group')];
			$store_all_id = array();

			$data['main_view']	= 'det_groups';
			$data['oth_group'] = $this->user_model->get_other_group($id_group);
			$data['mbr_group'] = $this->user_model->get_member_group($id_group);
			$data['det_group'] = $this->user_model->get_det_group($id_group);
			$data['comment_group'] = $this->user_model->get_comment($id_group);
			$data['comments'] = $this->show_tree($id_group);
			$this->load->view('template', $data);
		} else {
			redirect('login','refresh');
		}
	}

	public function join()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->input->post("submit")) {
				$id_group = $this->uri->segment(3);
				if ($this->user_model->join($id_group) == TRUE) {
					redirect('groups/detail/'.$id_group.'','refresh');
				} 
			}
			else if ($this->input->post("unjoin")) {
				$id_group = $this->uri->segment(3);
				if ($this->user_model->unjoin($id_group) == TRUE) {
					redirect('groups/detail/'.$id_group.'','refresh');
				} 
			}
		} else {
			redirect('login','refresh');
		}
	}

	public function add_comment()
	{
		$id_group = $this->uri->segment(3);
		$data['det_group'] = $this->user_model->get_det_group($id_group);

		if ($this->input->post("submit")) {

			if ($this->user_model->add_comment($id_group) == TRUE) {
				redirect('groups/detail/'.$id_group.'','refresh');
			} else{
				$this->session->set_flashdata('error_msg', validation_errors());
				redirect('groups/detail/'.$id_group.'','refresh');
			}
		}
	}

	function show_tree($id_group)
    {
        // create array to store all comments ids
        $store_all_id = array();
        // get all parent comments ids by using news id
        $id_result = $this->user_model->tree_all($id_group);
        // loop through all comments to save parent ids $store_all_id array
        foreach ($id_result as $id_comment) {
            array_push($store_all_id, $id_comment['comment_parent']);
        }
        // return all hierarchical tree data from in_parent by sending
        //  initiate parameters 0 is the main parent,news id, all parent ids

        return  $this->in_parent(0,$id_group, $store_all_id);
    }


    /* recursive function to loop
       through all comments and retrieve it
    */
    function in_parent($comment_parent,$id_group,$store_all_id) {
        // this variable to save all concatenated html
        $html = "";
        // build hierarchy  html structure based on ul li (parent-child) nodes
        if (in_array($comment_parent,$store_all_id)) {
            $result = $this->user_model->tree_by_parent($id_group,$comment_parent);
            $html .=  $comment_parent == 0 ? "<ul class='media-list comments-list m-bot-50 clearlist'>" : "<ul>";
            foreach ($result as $re) {
            	date_default_timezone_set("Asia/Bangkok");
            	$at = "at";
                $tgl = date("M d, Y, H:i", strtotime($re['comment_created']));
                $html .= " <li class='media comment_box'>
                <a class='pull-left' href='#''>
					<img class='media-object comment-avatar' src='".base_url()."assets/images/user.png' alt='' width='50' height='50'>
		        </a>
		        <div class='media-body'>

		            <div class='comment-info'>
		                <h4 class='comment-author'>
		                    <a href=''>".$re['first_name']." ".$re['last_name']."</a>
		                </h4>
		                <time>".$tgl."</time>
		                <a class='comment-button reply' onclick='prepareComment(".$re['id_comment'].")' href='#comment_reply'><i class='tf-ion-chatbubbles'></i>Reply</a>
		            </div>

		            <div class='comment-body'>
		                ".$re['comment_body']."
		            </div>

		        </div>
            ";
                $html .=$this->in_parent($re['id_comment'],$id_group, $store_all_id);
                $html .= "</li>";
            }
            $html .=  "</ul>";
        }

        return $html;
    }

}

/* End of file Groups.php */
/* Location: ./application/controllers/Groups.php */