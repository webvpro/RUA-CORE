/**
 * @author mlstanley
 */


$(function() {  
	'use strict';
$("div#upload-dialog").dialog({ autoOpen: false, width:'600' });
var picURL = $('#my-profile-pic').attr('src');
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

    // Load existing files:
    /*$.getJSON($('#fileupload form').prop('action'), function (files) {
        var fu = $('#fileupload').data('fileupload');
        fu._adjustMaxNumberOfFiles(-files.length);
        fu._renderDownload(files)
            .appendTo($('#fileupload .files'))
            .fadeIn(function () {
                // Fix for IE7 and lower:
                $(this).show();
            });
    });*/

    // Open download dialogs via iframes,
    // to prevent aborting current uploads:
    $('#fileupload .files a:not([target^=_blank])').live('click', function (e) {
        e.preventDefault();
        $('<iframe style="display:none;"></iframe>')
            .prop('src', this.href)
            .appendTo('body');
    });
	
    $('#save-changes').button();
    $('#change-my-pic').button().click(function() {
    	$("div#upload-dialog").dialog('open');
    });;
    $('#cancel').button().click(function() {
    	    location.href='/myaccount';
    });
   
    
});  