
<div class="line"></div>
                <article id="article1">
                    <h2>Editing Item </h2>
                    
                    <div class="line"></div>
                    
                    <div id="create-item-form" title="Edit Art" class="" style= "width:55em; margin: 0 auto;">
                    <div id="form-wrapper">
                    
	

	
		 <?php
		 echo validation_errors();
		 echo form_open('sellart/createitem',array('id' => 'edit-item-form','style'=>'width:auto;')); 
		 ?>
		<fieldset>
			<legend>Item details</legend>
			<ul>
				<li>
					<label for="item-name">Name:</label>
					<input id="item-name" name="item_name" type="text" placeholder="" value="<?=set_value('item_name')?>" maxlength="50" />
				</li>
				<li>
					<label for="item-description">Description:</label>
					<textarea id="item-description" name="item_description" placeholder="(Describe the item you are selling)" cols="50" rows="5"><?=set_value('item_description')?></textarea>
				</li>
				<li>
					<label for="item-resued-percent">ReUse %:</label>
					<?php
						$opts = 'id="item-resued-percent"';
						$percentOps =array('5'=>'5%','10'=>'10%','15'=>'15%','20'=>'20%','25'=>'25%','30'=>'30%','35'=>'35%','40'=>'40%','45'=>'45%','50'=>'50%','55'=>'55%'
											,'60'=>'60%','65'=>'65%','70'=>'70%','75'=>'75%','80'=>'85%','90'=>'90%','95'=>'95%','100'=>'100%');
						echo form_dropdown('item_reuse_percent', $percentOps, '5',$opts);
					?>
				</li>
				<li>
					<label for="item-price">Price:</label>
					<input id="item-price" name="item_price" type="text" placeholder="" maxlength="7" value="<?=set_value('item_price')?>"  />
				</li>
				<li>
					<label for="item-quanity">Quanity:</label>
					<input id="item-quanity" name="item_quanity" type="text" placeholder="" maxlength="4" value="<?=set_value('item_quanity')?>"  />
				</li>
				<li>
					<label for="item-dim-h">Size (Height-Width-Depth):</label>
					<input id="item-dim-h" class="dim-input" name="item_height" type="text" maxlength="4" size="3" value="<?=set_value('item_height')?>" style="width: 50px; margin:0.2em; display: inline-block;" />
					<input id="item-dim-w" class="dim-input" name="item_width" type="text" maxlength="4" size="3" value="<?=set_value('item_height')?>"  style="width: 50px; margin:0.2em; display: inline-block;" />
					<input id="item-dim-d" class="dim-input" name="item_depth" type="text" maxlength="4" size="3" value="<?=set_value('item_height')?>"  style="width: 50px; margin:0.2em; display: inline-block;" />
					<?php
						echo form_dropdown('dim_uom',array('inch'=>'inch','ft'=>'ft','cm'=>'cm','m'=>'m') , 'inch','id="dim-uom" style="width: 50px; margin:0.2em;display: inline-block;"');
					?>
				</li>
				<li>
					<label for="item-weight">Weight:</label>
					<input id="item-weight" class="dim-input" name="item_weight" type="text" placeholder="" maxlength="7" value="<?=set_value('reused_percent')?>" style="width: 100px; margin:0.2em; display: inline-block;"  />
					<?php
						echo form_dropdown('weight_uom',array('oz'=>'oz','lbs'=>'lbs','gram'=>'gram','kilo'=>'kilo') , 'oz','id="dim-uom" style="width: 50px; margin:0.2em;display: inline-block;"');
					?>
				</li>
				<li>
					<label for="item-price">Gallery:</label>
					<?php
						$opts = 'id="categories"';
						echo form_dropdown('categories', $categories, '10',$opts);
					?>
				</li>
				<li>
					<label for="item-primary-material">Primary Materials:</label>
					<div id="primary-material" class="tagWrap ui-helper-clearfix">
					<input id="hidden-primary-material" name="primary_material_ids" type="hidden" value="<?=set_value('primary_material_ids')?>" />
					<input id="item-primary-material" class="taginput" name="item_primary_material" type="text" placeholder="" maxlength="200" value=""  />
					</div>
				</li>
				<li>
					<label for="item-secondary-material">Secondary Materials:</label>
					<div id="secondary-material" class="tagWrap ui-helper-clearfix">
					<input id="hidden-secondary-material" name="secondary_material_ids" type="hidden" value="<?=set_value('secondary_material_ids')?>" />
					<input id="item-secondary-material" class="taginput" name="item_secondary_material" type="text" placeholder="" maxlength="200" value="" />
					</div>
				</li>
				<li>
					<label for="item-other-material">Other Materials:</label>
					<div id="other-material" class="tagWrap ui-helper-clearfix">
						<input id="hidden-other-material" name="other_material_ids" type="hidden" value="<?=set_value('other_material_ids')?>" />
					<input id="item-other-material" class="taginput" name="item_other_material" type="text" placeholder="" maxlength="200" value="" />
					</div>
				</li>
				
			</ul>
	</fieldset>
	
	
	
	</form>
	 <div id="item-photo-wrapper" title="Edit Art" class="" style= "height:100%;width: 10.3em; display: inline-block; vertical-align: top; background-color:#246024; ">
 	<p>test</p>
 </div>
 </div>

<p style="margin: 1em;"><input id="submit-art-button" type="button" value="Submit" /></p>

</article>
               
		<footer> <!-- Marking the footer section -->

			<div class="line"></div>

			<p>Copyright 2011 - reuseart.com</p> <!-- Change the copyright notice -->
			<a href="#" class="up">Go UP</a>
			

		</footer>

	</section> <!-- Closing the #page section -->


	<script src="/javascript/script.js"></script>
	<script src="/javascript/apps/editart.js"></script>

	
