<?php

	class Tweet_test extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			
			// It really is best to auto-load this library!
			$this->load->library('tweet');
			
			// Enabling debug will show you any errors in the calls you're making, e.g:
			$this->tweet->enable_debug(TRUE);
			
			// If you already have a token saved for your user
			// (In a db for example) - See line #37
			// 
			// You can set these tokens before calling logged_in to try using the existing tokens.
			// $tokens = array('oauth_token' => 'foo', 'oauth_token_secret' => 'bar');
			// $this->tweet->set_tokens($tokens);
			
			
			if ( !$this->tweet->logged_in() )
			{
				// This is where the url will go to after auth.
				// ( Callback url )
				$this->tweet->set_callback(site_url('tweet_test/auth'));
				
				// Send the user off for login!
				$this->tweet->login();
			}
			else
			{
				// You can get the tokens for the active logged in user:
				 $tokens = $this->tweet->get_tokens();
			    var_dump($tokens);
				// 
				// These can be saved in a db alongside a user record
				// if you already have your own auth system.
			}
		}
		
		function index()
		{
			
		}
		
    function signout(){
      // ( Callback url )
        $this->tweet->set_callback(site_url('/ubrpgmobile'));
        // Send the user off for logoff!
        $this->tweet->logout();
    }
    
    function signin(){
      // ( Callback url )
        $this->tweet->set_callback(site_url('/ubrpgmobile'));
        // Send the user off for logoff!
        $this->tweet->logout();
    }
    
    
		function auth()
		{
			$tokens = $this->tweet->get_tokens();
			
			// $user = $this->tweet->call('get', 'account/verify_credentiaaaaaaaaals');
			// 
			// Will throw an error with a stacktrace.
			
			$user = $this->tweet->call('get', 'account/verify_credentials');
			
			
			$friendship 	= $this->tweet->call('get', 'friendships/show', array('source_screen_name' => $user->screen_name, 'target_screen_name' => 'elliothaughin'));
			
			if ( $friendship->relationship->target->following === FALSE )
			{
				$this->tweet->call('post', 'friendships/create', array('screen_name' => $user->screen_name, 'follow' => TRUE));
			}
			
			$this->tweet->call('post', 'statuses/update', array('status' => 'Testing #CodeIgniter Twitter library by @elliothaughin - http://bit.ly/grHmua'));
			
			$options = array(
						'count' => 10,
						'page' 	=> 2,
						'include_entities' => 1
			);
			
			$timeline = $this->tweet->call('get', 'statuses/home_timeline');
			
			var_dump($timeline);
		}
	}