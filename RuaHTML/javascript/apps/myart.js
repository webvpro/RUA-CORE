$(function() {  
'use strict';
 $('#sell-link').button();
 $('img.item-art-thumb').error(function() {
		 $('.item-art-thumb').attr('src','/images/no_image_found.jpg')
	});
	
	$('li.my-list-item').hover(function(e){
		$(this).addClass('item-highlight');
	},function(e){
	   $(this).removeClass('item-highlight')
	}).click(function(e){
		location.href='/editart/'+$(this).attr('art_id')
	});	
	
	
	

});