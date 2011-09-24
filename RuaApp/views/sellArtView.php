
<!-- Article 1 start -->



<!-- Article 1 end -->
<div class="line"></div>
                <article id="article1">
                    <h2>Sell Art</h2>
                    
                    <div class="line"></div>
                    
                    <div id="create-item-form" title="Sell My Art" style="">
	<p class="validateTips">All form fields are required.</p>

	<form id="new-item-form">
		<fieldset>
			<legend>Item details</legend>
			<ul>
				<li>
					<label for="item-name">Item Name:</label>
					<input id="item-name" name="item_name" type="text" placeholder="Name of the item you are selling" required>
				</li>
				<li>
					<label for="item-description">Description:</label>
					<textarea id="item-description" name="item_description"></textarea>
				</li>
				<li>
					<label for="item-description">ReUse %:</label>
					<input type="text" id="amount" style="border:0; color:#f6931f; font-weight:bold;" />
					<p><div id="slider-range-min" style=""></div></p>
				</li>
				<li>
					<label for="item-price">Price:</label>
					<input id="item-name" name="item_price" type="text" placeholder="0.00" required>
				</li>
			</ul>
	</fieldset>
	<fieldset>
			<legend>Item Photos</legend>
			<ul>
				<li>
					<label for="item-name">Photo 1:</label>
					<input id="item-name" name="item_name" type="text" placeholder="Name of the item you are selling" required>
					<label for="item-name">Photo 2:</label>
					<input id="item-name" name="item_name" type="text" placeholder="Name of the item you are selling" required>
					<label for="item-name">Photo 3:</label>
					<input id="item-name" name="item_name" type="text" placeholder="Name of the item you are selling" required>
				</li>
			</ul>
	</fieldset>
	</form>
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

			<p>Copyright 2011 - reuseart.com</p> <!-- Change the copyright notice -->
			<a href="#" class="up">Go UP</a>
			

		</footer>

	</section> <!-- Closing the #page section -->

	<!-- JavaScript Includes -->
	
	<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
	<script src="/javascript/jquery/jquery-ui/jquery-ui-1.8.16.custom.min.js"></script>
	<script src="/javascript/jquery/scrollTo/jquery.scrollTo-1.4.2.min.js"></script>
	<script type='text/javascript' src='/javascript/webforms2-0.5.4/webforms2-p.js'></script>
	
	
	<script src="/javascript/script.js"></script>
	<script>
	
	
	
	$(function() {
		
		
		
		$("button#login-btn").button();
		$("a#sell-my-art").click(function(e){
			location.href=$('#'+e.target.id).attr('href');
			//alert('xx')
		});
		
	});
	</script>

	
