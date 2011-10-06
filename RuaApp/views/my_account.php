	<div class="line"></div>
    	<article id="article1">
        	<h2>Sell Art for <?=$username?></h2>
            <div class="line"></div>
            <div id="create-item-form" title="Sell My Art" style="">
		 <?php
		 	echo validation_errors();
		 	echo form_open('sellart/createitem',array('id' => 'my-account-form')); 
		 ?>
		 	</form>
        </article>