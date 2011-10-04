
<div class="line"></div>
                <article id="article1">
                    <h2>Sell Art for <?=$username?></h2>
                    
                    <div class="line"></div>
                    
                    <div id="create-item-form" title="Sell My Art" style="">
	<p class="validateTips">All form fields are required.</p>

	
		 <?php
		 echo validation_errors();
		 echo form_open('sellart/createitem',array('id' => 'new-item-form')); 
		 ?>
		<fieldset>
			<legend>Item details</legend>
			<ul>
				<li>
					<label for="item-name">Item Name:</label>
					<input id="item-name" name="item_name" type="text" placeholder="Name of the item you are selling" value="<?=set_value('item_name')?>" maxlength="50" required>
				</li>
				<li>
					<label for="item-description">Description:</label>
					<textarea id="item-description" name="item_description" placeholder="Describe the item you are selling"><?=set_value('item_description')?></textarea>
				</li>
				<li>
					<label for="item-resued-percent">ReUse %:</label>
					<input type="text" id="item-resue-percent" name="item_reuse_percent" style="" placeholder="99.99" maxlength="5" value="<?=set_value('reused_percent')?>" required/>
					<p><div id="slider-range-min" style=""></div></p>
				</li>
				<li>
					<label for="item-price">Price:</label>
					<input id="item-name" name="item_price" type="text" placeholder="9999.99" maxlength="7" value="<?=set_value('reused_percent')?>"  required>
				</li>
			</ul>
	</fieldset>
	
	
	
	</form>
	<input id="submit-art-button" type="submit" value="Sell Art" />
</div>
</article>
               
		<footer> <!-- Marking the footer section -->

			<div class="line"></div>

			<p>Copyright 2011 - reuseart.com</p> <!-- Change the copyright notice -->
			<a href="#" class="up">Go UP</a>
			

		</footer>

	</section> <!-- Closing the #page section -->


	<script src="/javascript/script.js"></script>
	

	
