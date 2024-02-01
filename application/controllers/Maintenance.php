<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$this->load->view('maintenance');
	}

}

/* End of file Maintenance.php */
/* Location: ./application/controllers/Maintenance.php */