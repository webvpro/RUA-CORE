
<!-- Article 1 start -->



<!-- Article 1 end -->
<div class="line"></div>
                <article id="article1">
                    <h2>Sell Art</h2>
                    
                    <div class="line"></div>
                    
                    <div id="create-item-form" title="Sell My Art" style="">
	<p class="validateTips">All form fields are required.</p>

	
		<?php 
		// $attr=array('id' => 'new-item-form');
		 
		 echo form_open_multipart('sellart/additem',array('id' => 'new-item-form')); 
		 
		 ?>
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
			<p>
			
			<?php
				echo form_upload(array('name'=>'Filedata','id'=>'uploadifyit'));
			   ?>
			<a href="javascript:$('#uploadifyit').uploadifyUpload();">Upload File(s)</a>
			</p>
	</fieldset>
	<input type="submit" />
	<?php form_close(); ?>
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
							folder: '/images/uploads/art/',
							scriptAccess: 'always',
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
									$.post('<?php echo site_url('sellart/additem'); ?>',{filearray: response},function(info){ $("#fileinfotarget").append(info);});
							},
							'onAllComplete' : function(event,data){
								
							}
					
					
					
				});
			});
	
</script>


	
