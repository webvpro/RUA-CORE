<?php
parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->view('welcome_message');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */