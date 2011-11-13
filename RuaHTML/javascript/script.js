$(document).ready(function(){
	/* This code is executed after the DOM has been completely loaded */

	$('nav a,footer a.up').click(function(e){

		// If a link has been clicked, scroll the page to the link's hash target:

		$.scrollTo( this.hash || 0, 1500);
		e.preventDefault();
	});
	
	$('#static-left-menu ul li').stop().animate({'marginLeft':'-100px'},1000);

    $('#static-left-menu ul li').hover(
       function (e) {
           $(this).stop().animate({'marginLeft':'0px'},160);
           
        },
        function (e) {
        	if(!$(this).hasClass('open')){
        		$(this).stop().animate({'marginLeft':'-100px'},160);
        	}
        	return;
        }
    );
                
 });
