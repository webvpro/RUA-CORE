<?php

class Gallery extends Controller {

	function Gallery()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$data['title']='ListMagnet: :List Gallery';
		$data['homelink']='';
		$data['mylistslink']='';
		$data['gallery']='current';
		$this->load->view('include/header_main',$data);
		$this->load->view('include/main_nav',$data);
		$this->load->view('gallery');
		$this->load->view('include/footer_main');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */