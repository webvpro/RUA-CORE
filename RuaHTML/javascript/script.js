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
        	$(this).stop().animate({'marginLeft':'-100px'},160);
        }
    );
                
  $(".search-trigger").click(function(){
		$("#search-form-panel").toggle("fast");
		$(this).toggleClass("active");
		return false;
	});
   $( "#slider-percent-range" ).slider({
			range: true,
			min: 0,
			max: 100,
			values: [ 0, 100 ],
			slide: function( event, ui ) {
				$( "#find-resuse-percent-range" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
			}
		});
		$( "#find-resuse-percent-range" ).val( $( "#slider-percent-range" ).slider( "values", 0 ) +	" - " + $( "#slider-percent-range" ).slider( "values", 1 ) );
});
