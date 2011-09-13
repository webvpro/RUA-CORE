/**
 * @author mike
 * ** app.listmagnet,js
 * 
 */
var api_key = '54392d1e20540325f9f7b8c0bbe77954'; 
var channel_path = 'xd_receiver.html'; 
var blockParams = {message:'<h1 id="loading-ajax">Loading ...</h1>'
		,css: { 
        padding:0, 
        margin:0, 
        width:'30%', 
        top:'40%', 
        left:'35%', 
        textAlign:'center', 
        color:'#000', 
        border:'3px solid #aaa', 
        backgroundColor:'#fff', 
        cursor:'pointer' 
    	}
    	,overlayCSS:{backgroundColor:'#000',opacity:'0.6',cursor:'pointer'}
    };




//FB.init(api_key, channel_path);
function loggedInUser() {
	$('#main-center-login-message').hide();
	$('#main-center-fridge').show();
	
	if (!isInFrame()) {
		$('#fb-profile-pic').show();
		$('#fb-profile-pic').html('<div><fb:profile-pic uid=loggedinuser facebook-logo="true"></fb:profile-pic></div><a href-"#" class="logout-txt" title="Facebook Logout">Logout</a>');
		$('a.logout-txt').click(function(e){
			fbLogout();
		});
		$('#RES_ID_fb_login').hide();
	    $('#gf-login-link').hide();
	}
	
	FB.XFBML.Host.parseDomTree();
	$.unblockUI();
} 

function notloggedInUser() {
	$('#fb-profile-pic').html('');
	$('#main-center-fridge').hide();
	$('#fb-profile-pic').hide();
	$('#main-center-login-message').show();
	 FB.XFBML.Host.parseDomTree();
	 $.unblockUI();
}

function fbLogout(){
	FB.ensureInit(function() {
		FB.Connect.logout(function(){
			location.reload();
		});
	});

}

function isInFrame(){
	if (top === self) { 
		return false
	} else { 
		return true					
	}
}

FB_RequireFeatures(["Connect"], function() {
    FB.init(api_key, channel_path,{ "ifUserConnected": loggedInUser
									 ,"ifUserNotConnected" :notloggedInUser});
    //FB.Connect.showPermissionDialog("publish_stream,create_event,rsvp_event,email");
    FB.Connect.requireSession();
	
});


// jQuery 
(function($) {
	$.blockUI.defaults.overlayCSS.cursor = 'pointer';
	function blockIt(){
		$.blockUI(window.blockParams);
	}
	blockIt();
	$('#main-center-view-list').hide();
	$('#main-center-fridge').hide();
	$('#main-center-login-message').hide();
	$('#fb-profile-pic').hide();
	
	// dialogs
	$("#add-item-dialog").dialog({
		bgiframe: true,
		autoOpen: false,
		height: 300,
		modal: true,
		buttons: {
			'Add Item': function() {
				$(this).dialog('close');
				
			},
			Cancel: function() {
				$(this).dialog('close');
			}
		},
		close: function() {
			
		}
	});

	
	
	$(document).ready(function(){
		$('#test-ajax').click(function(e){
			$.ajax({
				type:"POST",
					url: "/services/service.facebook.php",
				data:{'service':'getcurrentuser'},
				dataType:'json',
					success: function(json){
			    alert( json[0].first_name);
			   }
			})
		});
		
		//portlets
		$(".column").sortable({
			connectWith: '.column'
		});

		$(".portlet").addClass("ui-widget ui-widget-content ui-helper-clearfix ui-corner-all")
			.find(".portlet-header")
				.addClass("ui-widget-header ui-corner-all")
				.prepend('<span class="ui-icon ui-icon-refresh"></span>')
				.end()
				.find(".portlet-content");
		$(".portlet").find(".portlet-header-no-icon")
			.addClass("ui-widget-header ui-corner-all")
			.end()
			.find(".portlet-content");
		$(".portlet-header .ui-icon").click(function() {
			$(this).toggleClass("ui-icon-minusthick");
			$(this).parents(".portlet:first").find(".portlet-content").toggle();
		});

		$(".column").disableSelection();
		//eof portlets
		
		// create list button
		$('button#create-new-list-button').hover(
			function(){ 
				$(this).addClass("ui-state-hover"); 
			},
			function(){ 
				$(this).removeClass("ui-state-hover"); 
			}
		);
		$('button#create-new-list-button').click(function(e){
			e.preventDefault();
			$('#main-center-fridge').toggle();
			$('#main-center-view-list').toggle();
		});
		
		$('button#goto-fridge-button').hover(
			function(){ 
				$(this).addClass("ui-state-hover"); 
			},
			function(){ 
				$(this).removeClass("ui-state-hover"); 
			}
		);
		$('button#goto-fridge-button').click(function(e){
			e.preventDefault();
			$('#main-center-view-list').toggle();
			$('#main-center-fridge').toggle();
			
		});		
		$('#add-list-item-button').click(function(e){
			e.preventDefault();
			$('#add-item-dialog').dialog('open');
		});		
		
	});//eof ready
	$(".lm-button").hover(
		function(){ 
			$(this).addClass("ui-state-hover"); 
		},
		function(){ 
			$(this).removeClass("ui-state-hover");
		}
	)
	var qs =$.parseQuery();
	if(qs.viewList != undefined){
		//alert(qs.viewList)
	}
	
})(jQuery);
