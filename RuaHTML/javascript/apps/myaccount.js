/**
 * @author mlstanley
 */


$(function() {  
	'use strict';
var picURL = $('#my-profile-pic').attr('src');
$("div#upload-dialog").dialog({ autoOpen: false, width:'600',close: function(event, ui) {
	 var currentTime = new Date();
     $('#my-profile-pic').attr('src',picURL+currentTime.getHours()+currentTime.getMinutes()+currentTime.getSeconds());	
}});


$('#my-profile-pic').error(function() {
		 $('#my-profile-pic').attr('src','/images/no-profile-pic.jpg')
	});
    // Initialize the jQuery File Upload widget:
    
    $('#fileupload').fileupload({maxNumberOfFiles:'1'}).bind('fileuploaddone', function (e, data) {
    	
    	 $.each(data.files, function (index, file) {
       		 var currentTime = new Date();
       		 
       		 $('#my-profile-pic').attr('src',picURL+currentTime.getHours()+currentTime.getMinutes()+currentTime.getSeconds());
       		 
    		});
    	});


 
    $('#fileupload .files a:not([target^=_blank])').live('click', function (e) {
        e.preventDefault();
        $('<iframe style="display:none;"></iframe>')
            .prop('src', this.href)
            .appendTo('body');
    });
    //form ajax
     $('#change-account-form').ajaxForm({ 
        success: function(data){
        	alert($.param(data))
        },
 		type:'post', 
        dataType:'json'
     }); 
	
    $('#save-changes').button().click(function(){
    	$('#info-submit').trigger('click')
    });
    $('#change-my-pic').button().click(function() {
    	$("div#upload-dialog").dialog('open');
    });;
    $('#cancel').button().click(function() {
    	    location.href='/myaccount';
    });
   
    
});  