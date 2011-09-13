<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">


<head>

<meta name="Description" content="Shopping Lists, Todo Lists, Bucket Lists." />
<meta name="Keywords" content="your, keywords" />
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="Distribution" content="Global" />
<meta name="Author" content="Michael Stanley - webversatile@gmail.com" />
<meta name="Robots" content="index,follow" />		

<link rel="stylesheet" href="/theme/bluepigment/BluePigment.css" type="text/css" />
<link rel="stylesheet" href="/theme/custom-theme/jquery-ui-1.8.6.custom.css" type="text/css" />

<script src="http://platform.twitter.com/anywhere.js?id=<?=$twitter_api_key?>" type="text/javascript"></script>

<title><?= $title; ?></title>
<style>
 #fb-root, #user-info{
	float:right;
       width:200px;
}
.user-profile-img-sm{
	height:'100px';
	width:'100px';
}
</style>
</head>

	<body>

	<!-- header starts here -->
	<div id="header"><div id="header-content">	
		
		<h1 id="logo-text"><a href="index.html" title="">List<span>Magnet</span></a></h1>	
		<h2 id="slogan">Because life needs a big fridge magnet...</h2>		
		
		<div id="header-links">
		 <?if($logged_in){?>
			<p id="member-links" style="display:none;">
				<a id="header-home-link" href="/mylists">My Fridge</a> | 
				<a id="header-account-link" href="/myaccount">My Account</a> | 
				<a id="header-sign-out-link" href="#">Sign Out</a>			
			</p>
		 <?} else {?>
			<p id="non-member">
				<a id="header-sign-in-link" href="#">Sign In</a> | 
				<a id="header-home-link" href="/home">Home</a>			
		 	</p>
		 <?}?>
<fb:login-button onlogin="window.location='<?=uri_string()?>'"></fb:login-button>
	    </div>
	    <div id="user-info" style="display: none;"></div>
		<div id="fb-root"></div>
		<div style="clear:both"></div>
</div></div></div>	
	
