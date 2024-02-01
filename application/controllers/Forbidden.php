<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forbidden extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$this->load->view('forbidden');
	}

}

/* End of file Forbidden.php */
/* Location: ./application/controllers/Forbidden.php */