	<div class="line"></div>
    	<article id="article1">
        	<h2>Viewing My Art</h2>
            <div class="line"></div>
            <div id="action-bar" style="text-align: right;"><a id="sell-link" href="/sellart">Add Art</a></div>
            <div id="view-items" title="My Art" style="">
            	<ul id ="my-art-list">
         <?php
		 	foreach ($art_items as $art) {
				echo '<li class="my-list-item" art_id="'.$art->id.'">
					    <a href="/images/uploaded/art/full/art_'.$art->artist_id.'_'.$art->id.'_1.jpg" class="preview"><img class="item-art-thumb" src="/images/uploaded/art/thumbs/art_'.$art->artist_id.'_'.$art->id.'_1.jpg" /></a><ul class="art-item-summary"><li>'.$art->name.
					   '</li></ul></li>';
			}
		 ?>
		 		</ul>
		</article>
		<script type='text/javascript' src='/javascript/apps/img.preview.js'></script>
		<script type='text/javascript' src='/javascript/apps/myart.js'></script>