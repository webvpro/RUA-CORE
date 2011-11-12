<!-- Article 1 start -->



<!-- Article 1 end -->
<div class="line"></div>
                <article id="article1">
                    <h2>Artists</h2>
                    
                    <div class="line"></div>
                    
                    <div class="articleBody clear">
                    	<?
                    	//var_dump($this->user_model->get_sellers());
                    	 foreach ($this->user_model->get_sellers() as $row) {
							 echo '<div class="blocks">
							<img src="/images/uploaded/profile/profile_'.$row->user_id.'.jpg" alt="thumb" height="125" width="150" />
							<p>'.$row->first_name.' '.$row->last_name.'</p>
							</div>';
						 }
                    	?>
                    	</div>
                </article>
                <article id="article2">
                    <h2>Sweet Poppin Boxes</h2>
                    
                    <div class="line"></div>
                    
                    <div class="articleBody clear">
                    	<figure>
	                    	<a href="#"><img src="/theme/all/images/temp.jpg" width="620" height="340" /></a>
                        </figure>
                        
                        <p>Here we are making Text.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer luctus quam quis nibh fringilla sit amet consectetur lectus malesuada. Sed nec libero erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mi nisi, rhoncus ut vestibulum ac, sollicitudin quis lorem. Duis felis dui, vulputate nec adipiscing nec, interdum vel tortor. Sed gravida, erat nec rutrum tincidunt, metus mauris imperdiet nunc, et elementum tortor nunc at eros. Donec malesuada congue molestie. Suspendisse potenti. Vestibulum cursus congue sem et feugiat. Morbi quis elit odio. </p>
                    </div>
                </article>
		<footer> <!-- Marking the footer section -->

			<div class="line"></div>

			<p>Copyright 2010 - YourSite.com</p> <!-- Change the copyright notice -->
			<a href="#" class="up">Go UP</a>
			

		</footer>

	</section> <!-- Closing the #page section -->

</div>
	<!-- JavaScript Includes -->
	
	
<!-- Insert the navbar element somewhere in the HTML page -->


	
	
		<script src="/javascript/script.js"></script>
		<script>
			$(function() {
				$("a#sell-my-art").click(function(e){
					location.href=$('#'+e.target.id).attr('href');
					//alert('xx')
				});
			});
		</script>

	</body>

</html>
