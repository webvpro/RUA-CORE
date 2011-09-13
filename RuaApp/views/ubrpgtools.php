<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
  <title>Underbridge RPG Mobile Tools</title> 
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.css" />
  <link rel="stylesheet" href="/theme/all/css/all.css" />
   <script src="http://code.jquery.com/jquery-latest.min.js"></script>
   <script src="http://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php" type="text/javascript"></script>
   <script type="text/javascript" src="http://www.google.com/jsapi"></script>
	 <script type="text/javascript">
	    google.load('friendconnect', '0.8');
	 </script>
	<script src="http://platform.twitter.com/anywhere.js?id=<?=$tweet_consumer_key?>&v=1" type="text/javascript"></script>
<script>
	// configs
  	var gfc_site_id ='<?=$gfc_site_id?>';
  	var facebook_api_key='<?=$facebook_api_key?>';
</script>
  <script src="/javascript/apps/ubrpg/app.ubrpg.js"></script>
  <script src="http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.js"></script>
  <script>
  	$.mobile.pageLoading();
  </script>
</head> 
<body> 
<div data-role="page" id="home" data-theme="b">

  <div data-role="header" data-position="fixed" data-theme="a">
    <h1>UBRPG Tools</h1>
    <?php if($user_id): ?>
    	<a id="sign-out-button" href="#" class="ui-btn-right" auth_type="<?=$auth_type?>" data-icon="delete" data-theme="e">Sign Out</a>
    <? endif; ?>
  </div><!-- /header -->

  <div id="main-content" data-role="content"> 
    
    <?php if ( !$user_id ): ?>
    <p>Here is the place to see  RPG Moblie tools</p>    
    <p><a href="#more">About this Project..</a></p> 
		<h2>Sign In</h2>
			<div class="ui-bar-e" style="margin-left:auto;margin-right:auto; width:269px; padding:1em;">
		      <p style="text-align: center"><fb:login-button onlogin="window.location='/ubrpgmobile'"></fb:login-button></p>
			  <p style="text-align: center"><span id="twitter-login-button"></span></p>
			  <p style="text-align: center"><div id="gfc-button" style="width:210px;margin-left:auto;margin-right:auto;margin-bottom:10px;"></div></p>
			</div>
			
	<?php elseif ($member_id != NULL): ?>
		<div>
			<h2>Hello, <?=$tag?></h2>
			<p></p>
			<img class="profile_square" src="<?=$pic?>" />
		</div>
	<?php else: ?>
		<h2>Thank You For Signing In</h2>
		 <p><?=$user_name?>, just one more thing to do please enter a UBRPG Tag <span>(Minimum 4 characters.)</span></p>
		 <form id="new-user-form" action="#" method="">		 
		 <div data-role="fieldcontain">
		 	<div id="form-message" class="message-area"></div>
			<label for="name">Tag:</label>
    		<input type="text" name="member_name" id="member-name-input" maxlength="25" value="<?=str_replace(" ","_",$user_name)?>"  />
		</div>
		<div style="text-align:right;">
			<a href="#" id="submit-button" data-role="button" data-theme="e">Submit</a>
		</div>
		</form>
	

	<?php endif; ?>
   <div id="fb-root"></div>
  </div><!-- /content -->

 <div data-role="footer" data-position="fixed" data-theme="a">
    <h4>Play RPGs</h4>
  </div><!-- /footer -->
</div><!-- /page -->


<!-- Start of second page -->
<div data-role="page" id="more">

  <div data-role="header">
    <h1>UPRPG Project</h1>
  </div><!-- /header -->

  <div data-role="content"> 
    <p>Put more stuff about the game here.</p>    
    <p><a href="#home">Back to Home</a></p> 
  </div><!-- /content -->

  <div data-role="footer" data-position="fixed">
    <h4>Play RPG</h4>
  </div><!-- /footer -->
</div><!-- /page -->
<div data-role="page" id="tool-menu">

  <div data-role="header">
    <h1>UBRPG Tools</h1>
  </div><!-- /header -->

  <div data-role="content"> 
   <p><a href="/outlands/" data-role="button" rel="external"  data-icon="grid" data-theme="e">Outlands</a></p>
   <p><a href="index.html" data-role="button" data-icon="grid" data-theme="e">Neveral</a></p>
   <p><a href="index.html" data-role="button" data-icon="grid" data-theme="e">Create New</a></p>
  </div><!-- /content -->

  
</div><!-- /page -->
	<script type="text/javascript">
		FB.init(facebook_api_key, "/xd_receiver.htm");
		<?php if(!$user_id): ?>
			google.friendconnect.renderSignInButton({ 'id': 'gfc-button', 'style': 'long' });
		<?php endif; ?>
		$.mobile.pageLoading( true );
		
	</script>
</body>
</html>