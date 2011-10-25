$(function() {  
'use strict';
 $('#sell-link').button();
	
	$("img.item-art-thumb").each(function(idx) {
        $(this).error(function() {
            $(this).attr('src','/images/no_image_found.jpg');     
        });
        $(this).attr("src", $(this).attr("src"));
  });    
	imagePreview();
	$('li.my-list-item').hover(function(e){
		$(this).addClass('item-highlight');
	},function(e){
	   $(this).removeClass('item-highlight')
	}).click(function(e){
		location.href='/editart/'+$(this).attr('art_id')
	});	
	
	
	

});