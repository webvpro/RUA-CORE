	<div class="line"></div>
    	<article id="article1">
        	<h2>Art Search Results</h2>
            <div class="line"></div>
            <div id="action-bar" style="text-align: right;"><a id="sell-link" href="/sellart">Add Art</a></div>
            <div id="view-items" title="My Art" style="">
            	<ul id ="art-reuslt-list">
         			<li class="">No Art Found</li>
		 		</ul>
		</article>
		<script type='text/javascript' src='/javascript/apps/img.preview.js'></script>
		<script src="/javascript/script.js"></script>
	<script>
	
	
	
	$(function() {
		
		
		
		$("a#sell-my-art").click(function(e){
			location.href=$('#'+e.target.id).attr('href');
			//alert('xx')
		});
		
	});
	</script>