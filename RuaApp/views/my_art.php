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
					    <img class="item-art-thumb" src="/images/uploaded/art/'.$art->id.'_thumb.jpg" /><ul class="art-item-summary"><li>'.$art->name.
					   '</li></ul></li>';
			}
		 ?>
		 		</ul>
		</article>
		<script type='text/javascript' src='/javascript/apps/myart.js'></script>