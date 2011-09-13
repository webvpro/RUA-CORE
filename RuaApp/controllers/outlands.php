<?php
parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);

class Outlands extends Controller {

  function Outlands()
  {
    parent::Controller();
  }

  function index()
  {
    $this->load->view('outlands_home');
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/outlands.php */