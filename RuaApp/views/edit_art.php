
<!-- Article 1 start -->



<!-- Article 1 end -->
<div class="line"></div>
                <article id="article1">
                    <h2>Edit Art for <?=$username?></h2>
                    
                    <div class="line"></div>
                    
                    <div id="create-item-form" title="Sell My Art" style="">
	<p class="validateTips">All form fields are required.</p>

	
		<?php 
		// $attr=array('id' => 'new-item-form');
		 echo validation_errors();
		 echo form_open_multipart('editart/update',array('id' => 'new-item-form')); 
		 
		 ?>
		<fieldset>
			<legend>Item details</legend>
			<ul>
				<li>
					<label for="item-name">Item Name:</label>
					<input id="item-name" name="item_name" type="text" placeholder="Name of the item you are selling" value="<?=$_REQUEST['item_name']?>" maxlength="50" required>
				</li>
				<li>
					<label for="item-description">Description:</label>
					<textarea id="item-description" name="item_description" placeholder="Describe the item you are selling"><?=$_REQUEST['item_description']?></textarea>
				</li>
				<li>
					<label for="item-resued-percent">ReUse %:</label>
					<input type="text" id="item-resue-percent" name="item_reuse_percent" style="" placeholder="99.99" maxlength="5" value="<?=$_REQUEST['item_reuse_percent']?>" required/>
					<p><div id="slider-range-min" style=""></div></p>
				</li>
				<li>
					<label for="item-price">Price:</label>
					<input id="item-name" name="item_price" type="text" placeholder="9999.99" maxlength="7" value="<?=$_REQUEST['item_price']?>"  required>
				</li>
			</ul>
	</fieldset>
	<fieldset>
			<legend>Item Photos</legend>
			<ul>
				<li>
			<?php
				echo form_upload(array('name'=>'filedata','id'=>'uploadifyit'));
			   ?>
		
			</li>
			<li>
				<input id="submit-art-button" type="button" onclick="javascript:$('#uploadifyit').uploadifyUpload()" value="Sell Art" />
			</li>
			</ul>
	</fieldset>
	
	<?php echo form_close(); ?>
	</form>
	<div id="fileinfotarget">
	</div>
</div>
                </article>
               
		<footer> <!-- Marking the footer section -->

			<div class="line"></div>

			<p>Copyright 2011 - reuseart.com</p> <!-- Change the copyright notice -->
			<a href="#" class="up">Go UP</a>
			

		</footer>

	</section> <!-- Closing the #page section -->


	<script src="/javascript/script.js"></script>
	
	<script type="text/javascript" language="javascript">
			$(document).ready(function()
			{
				$("#uploadifyit").uploadify({
							uploader: '/javascript/jquery/uploadify/uploadify.swf',
							script: '/javascript/jquery/uploadify/uploadify.php',
							cancelImg: '/javascript/jquery/uploadify/cancel.png',
							folder: '/images/uploaded/art/tmp/',
							fileExt: '*.jpg;*.gif;*.png',
							scriptAccess: 'always',
							method:'post',
							queueSizeLimit : 5,
							scriptData: {'member_id':'<?=$this->tank_auth->get_user_id()?>','art_id':'<?=$_REQUEST['item_id']?>'},
							multi: true,
							'onError' : function(a, b, c, d){
								if(d.status=404)
									alert('Could not find upload script');
								else if(d.type === "HTTP")
									alert('error'+d.type+": "+d.info);
								else if(d.type === "File Size")
									alert(c.name+' '+d.type+' Limit: '+Math.round(d.sizeLimit/1024)+'KB');
								else
									alert('error'+d.type+": "+d.text);
							},
							'onComplete' : function(event,queueID,fileObj,response,data){
									//$.post('<?php echo site_url('sellart/createitem/'); ?>',{filearray: response},function(info){ $("#fileinfotarget").append(info);});
							},
							'onAllComplete' : function(event,data){
								
							}
					
					
					
				});
			});
	
</script>


	
