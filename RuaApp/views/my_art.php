	<div class="line"></div>
    	<article id="article1">
        	<h2>Viewing My Art</h2>
            <div class="line"></div>
            <div id="view-items" title="My Art" style="">
            	<ul id ="my-art-list">
         <?php
		 	foreach ($art_items as $art) {
				echo '<li class="my-list-item">'.$art->id.'</li>';
			}
		 ?>
		 		</ul>
		</article>