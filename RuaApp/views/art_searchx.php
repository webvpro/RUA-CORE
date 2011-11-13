	<div class="line"></div>
    	<article id="article1">
        	<h2>Art Search Results</h2>
            <div class="line"></div>
            <div id="action-bar" style="text-align: right;"><a id="sell-link" href="/sellart">Add Art</a></div>
            <div id="view-items" title="My Art" style="">
            	<ul id ="art-result-list">
         <?php
		 	foreach ($art_items as $art) {
		 		$p_mat= explode("-", $art->primary_materials);
				$mstr='';
				foreach ($m_items as $mat) {
					$ma=explode(":", $mat);
					$mstr.='<span mid="'.$ma[1].'" class="matTag">'.$ma[1].'</span>';
				}
				
				echo '<li class="list-item" art_id="'.$art->id.'">
					    <a href="/images/uploaded/art/full/art_'.$art->artist_id.'_'.$art->id.'_1.jpg" class="preview"><img class="item-art-thumb" src="/images/uploaded/art/thumbs/art_'.$art->artist_id.'_'.$art->id.'_1.jpg" /></a>
					    <ul class="art-item-summary"><li>'.$art->name.'</li>
					    <li>Price: '.$art->price.'</li>
					    <li>Reuse %: '.$art->reuse_percentage.'</li>
					     <li>Primary Materials: '.$mstr.'</li>
					     
					    </ul></li>';
			}
		 ?>
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