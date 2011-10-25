/**
 * @author mlstanley
 */


$(function() {  
	'use strict';
	var picURL = $('#my-profile-pic').attr('src');
	$("div#upload-dialog").dialog({ autoOpen: false, width:'auto',modal:true,close: function(event, ui) {
		 var currentTime = new Date();
	     $('#my-profile-pic').attr('src',picURL+currentTime.getHours()+currentTime.getMinutes()+currentTime.getSeconds());	
	}});


     $('#my-profile-pic').error(function() {
		 $('#my-profile-pic').attr('src','/images/no-profile-pic.jpg')
	});
    // Initialize the jQuery File Upload :
    $('#uploadForm').ajaxForm({iframe:true,
        beforeSubmit: function(a,f,o) {
            o.dataType = 'json';
            $('#uploadOutput').html('Submitting...');
        },
        success: function(data) {
            var $out = $('#uploadOutput');
            $out.html('Form success handler received: <strong>' + typeof data + '</strong>');
            if (typeof data == 'object' && data.nodeType)
                data = elementToString(data.documentElement, true);
            else if (typeof data == 'object')
            	data = objToString(data);
            $out.append('<div><pre>'+ data +'</pre></div>');
        }
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