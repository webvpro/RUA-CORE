	<!-- footer starts here-->		
	<div id="footer-wrap">
	
		<div id="footer-columns">
			<div class="col3">
				<h2>Featured Lists</h2>
				<ul>
					<li><a href="/list/1">Holiday Gift</a></li>
					<li><a href="/list/1">Pumpkin Pie</a></li>
					<li><a href="/list/1">Thanksgving</a></li>
					<li><a href="/list/1">Santa's</a></li>
					<li><a href="/list/1">Christmas Party</a></li>
				</ul>
			</div>
			<div class="col3-center">
				<h2>Most Used Lists</h2>
				<ul>
					<li><a href="/list/1">Todo</a></li>
					<li><a href="/list/1">Project Task</a></li>
					<li><a href="/list/1">In Order</a></li>
					<li><a href="/list/1">Grocery</a></li>
					<li><a href="/list/1">Basic</a></li>
				</ul>
			</div>
			<div class="col3">
				<h2>Newest Lists</h2>
				<ul>
					<li><a href="/list/1">Timed Item</a></li>
					<li><a href="/list/1">Master</a></li>
					<li><a href="/list/1">Ranked</a></li>
					<li><a href="/list/1">Guest</a></li>
					<li><a href="/list/1">US Passport</a></li>					
				</ul>
			</div>
		<!-- footer-columns ends -->
		</div>	
	
		<div id="footer-bottom">		
			<p>
			&copy; 2010 <strong>WebVersatile</strong> | 
			Design by: <a href="http://www.styleshout.com/">styleshout</a> | 
			Valid <a href="http://validator.w3.org/check?uri=referer">XHTML</a> | 
			<a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
			
   		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
			<a href="index.html">Home</a>&nbsp;|&nbsp;
   		<a href="index.html">About</a>&nbsp;|&nbsp;
	   	<a href="index.html">RSS Feed</a>
	  		</p>		
		</div>	

<!-- footer ends-->
</div>
<div id="new-list-dialog" title="">
  <p class="ui-state-highlight">Test</p>
</div>
<div id="sign-in-dialog" title="Sign ">
  <div id="sign-in-content">
     <div id="sign-in-network-buttons">
     	<button id="twitter-sign-in">Twitter</button>
     	<button id="fb-sign-in">Facebook</button>
     	<button id="gfc-sign-in">Google</button>
     	<button id="linked-in-sign-in">Google</button>
     </div>
     <form id="sign-in-lm" name="sign_in_form" method="POST" action="#">
     <fieldset id="sing-in-dialog-set" class="dialog-set">
     	<legend class="dialog-form">Member Sign In</legend>
     	<label>Account Email Address:</label>
     	<input id="account-email" class= "dialog-input" name="account_email" style="width:342px" maxlength="65" value="" />
     	<label>Password:</label>
     	<input id="account-password" class= "dialog-input" name="account_password" style="width:342px" maxlength="65" value="" />
     	<div id="sign-in-lm-dialog-buttons" class="dialog-set-buttons">
     		<button class="dialog-set-button" id="sign-in-lm-button">Sign In</button>
     		<button class="dialog-set-button" id="forgot-button">Forgot</button>
     	</div>
     </fieldset>
     </form>
  </div>
</div>
<script src="<?=$jQueryPath?>"></script>
<script src="<?=$jQueryUiPath?>"></script>
<script type="text/javascript" src="/javascript/jquery/qtip/jquery.qtip-1.0.0.js"></script> 

<!-- Load the Google AJAX API Loader -->
<script type="text/javascript" src="http://www.google.com/jsapi"></script>

<!-- Load the Google Friend Connect javascript library. -->
<script type="text/javascript">
google.load('friendconnect', '0.8');
</script>

<!-- Initialize the Google Friend Connect OpenSocial API. -->
<script type="text/javascript">
google.friendconnect.container.setParentUrl('/' /* location of rpc_relay.html and canvas.html */);
google.friendconnect.container.initOpenSocialApi({
  site: '09000285409227200618',
  onload: function(securityToken) { 
    google.friendconnect.renderSignInButton({ 'id': 'gfc-sign-in', 'style': 'long' });
  }
});
 
</script>

<script src="<?=$fbConnectPath?>"></script>
<script>
// Load jQuery
//
gApiKey='<?=$gfcKey?>';

// twitter
  twttr.anywhere(function (T) {
    T("#twitter-sign-in").connectButton();
  });


// facebook

 FB.init({appId: '<?=$fbcKey?>', status: true, cookie: true, xfbml: true});


      // fetch the status on load
      FB.getLoginStatus(handleSessionResponse);

      $('#fb-sign-in').bind('click', function() {
        FB.login(handleSessionResponse);
      });

      $('#logout').bind('click', function() {
        FB.logout(handleSessionResponse);
      });

      $('#disconnect').bind('click', function() {
        FB.api({ method: 'Auth.revokeAuthorization' }, function(response) {
          clearDisplay();
        });
      });

      // no user, clear display
      function clearDisplay() {
        $('#user-info').hide('fast');
      }

      // handle a session response from any of the auth related calls
      function handleSessionResponse(response) {
        // if we dont have a session, just hide the user info
        if (!response.session) {
          clearDisplay();
          return;
        }

        // if we have a session, query for the user's profile picture and name
        FB.api(
          {
            method: 'fql.query',
            query: 'SELECT name, pic FROM profile WHERE id=' + FB.getSession().uid
          },
          function(response) {
            var user = response[0];
            $('#user-info').html('<img class="user-profile-img-sm" src="' + user.pic + '">' + user.name).show('fast');
            
          }
        );
      }

$(document).ready(function(){
/*
$.ajax({ url: "/ajax/fbconnect"
                    ,context: document.body
                    ,dataType:'html'
                    ,success: function(data){
                      //
                     }
            });*/
            

    $('#new-list-dialog').dialog({
		autoOpen: false,
		resizable: false,
		width:423,
		modal: true,
		buttons: {
			"Next": function() {
				$( this ).dialog( "close" );
			},
			Cancel: function() {
				$( this ).dialog( "close" );
			}
		}
	
	});
	 $('#sign-in-dialog').dialog({
		autoOpen: false,
		resizable: false,
		width:423,
		modal: true,
		buttons: {
			"Next": function() {
				$( this ).dialog( "close" );
			},
			Cancel: function() {
				$( this ).dialog( "close" );
			}
		}
	
	});
	// google.friendconnect.renderSignInButton({ 'id': 'gfc-sign-in', 'style': 'long' });
   // $('button').button();
    
	$('.new-list-button').click(function(e){
		e.preventDefault();
		$(e.target).button('refresh').removeClass('ui-state-focus');
		$.ajax({
			  url: '/ajax/new_list_dialog',
			  success: function(data) {
			    $('#form-dialog').html(data);
			    //alert('Load was performed.');
			  }
			});
		$('#new-list-dialog').dialog('open');
	});

	$('#header-sign-in-link').click(function(e){
		e.preventDefault();
		$('#sign-in-dialog').dialog('open');
		
	})
	
});



</script>
</body>
</html>
