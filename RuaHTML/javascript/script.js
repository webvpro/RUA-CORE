$(document).ready(function(){
	/* This code is executed after the DOM has been completely loaded */

	$('nav a,footer a.up').click(function(e){

		// If a link has been clicked, scroll the page to the link's hash target:

		$.scrollTo( this.hash || 0, 1500);
		e.preventDefault();
	});
	
	$('#left-nav-slide-in a').stop().animate({'marginLeft':'-325px'},1000);

                $('ul#left-nav-slide-in > li').hover(
                    function () {
                        $('a',$(this)).stop().animate({'marginLeft':'-2px'},200);
                    },
                    function () {
                        $('a',$(this)).stop().animate({'marginLeft':'-325px'},200);
                    }
                );
                
  

});
