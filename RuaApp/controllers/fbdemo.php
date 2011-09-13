<?php

  class Fbdemo extends CI_Controller {

	function __construct()
	{
		parent::__construct();
      
      $this->load->helper('url');
    }
    
    function index()
    {
      //$this->load->library('facebook_connect');
      
      $data = array(
            'user'    => $this->facebook_connect->user,
            'user_id' => $this->facebook_connect->user_id,
            'current_page' => $this->uri->uri_string()
          );
      $user = $this->session->userdata('app_session');
      var_dump($user);
      // This is how to call a client API methods
      //
      // $this->facebook_connect->client->feed_registerTemplateBundle($one_line_story_templates, $short_story_templates, $full_story_template);
      // $this->facebook_connect->client->events_get($data['user_id']);

      $this->load->view('fbdemo', $data);
    }
  }
  
  ?>