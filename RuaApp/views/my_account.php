	<div class="line"></div>
    	<article id="article1">
        	<h2>Viewing My <?=$user->username?> Account</h2>
            <div class="line"></div>
            <?php
		 echo validation_errors();
		 echo form_open('myaccount/update',array('id' => 'change-account-form','class' => 'account-form','style' => 'float:left')); 
		 ?>
		<fieldset style="">
			<legend>My Profile</legend>
			<ul>
				<li>
					<label for="last-name">First Name:</label>
					<input id="first-name" name="first_name" type="text" placeholder="Your First Name" value="<?=set_value('first_name',$user->first_name)?>" maxlength="50">
				</li>
				<li>
					<label for="last-name">Last Name:</label>
					<input id="last-name" name="last_name" type="text" placeholder="Your Last Name" value="<?=set_value('last_name',$user->last_name)?>" maxlength="50">
				</li>
				<li>
					<label for="last-name">Address 1:</label>
					<input id="address-1" name="address_1" type="text" placeholder="Address  here" value="<?=set_value('address_1',$user->address_1)?>" maxlength="50">
				</li>
				<li>
					<label for="last-name">Address 2:</label>
					<input id="address-2" name="address_2" type="text" placeholder="Address  here" value="<?=set_value('address_2',$user->address_2)?>" maxlength="50">
				</li>
				<li>
					<label for="last-name">Country:</label>
					<?php
						$opts = 'id="country-code"';
						$ccode= $user->country_code == '' ? 'US' : $user->country_code;
						echo form_dropdown('country_code', $countries, $ccode,$opts);
					?>
				</li>
				<li>
					<label for="last-name">City:</label>
					<input id="city" name="city" type="text" placeholder="Address  here" value="<?=set_value('city',$user->city)?>" maxlength="50">
				</li>
				<li>
					<label for="last-name">State/Province:</label>
					<input id="state-province" name="state_province" type="text" placeholder="State or Province" value="<?=set_value('state_province',$user->state)?>" maxlength="50">
				</li>
				<li>
					<label for="last-name">Zip/Postal Code:</label>
					<input id="postal-code" name="postal_code" type="text" placeholder="Code Here" value="<?=set_value('state_province',$user->postal_code)?>" size="8" maxlength="8" >
				</li>
			</ul>
		</fieldset>
		<fieldset style="">
			<legend>My Bio</legend>
			<ul>
				<li>
					<textarea id="bio-text" name="bio_text" style="width:28em;height:5.5em;"><?=set_value('bio_text',$user->bio)?></textarea>
				</li>
			</ul>
		 </fieldset>
		<input id="info-submit" type="submit" style="display: none" />
		</form>
		<form id="bio-pic" class="account-form" style="float: right;">
		<fieldset style="">
			<legend>My Photo</legend>
			<ul>
				<li style="text-align: center">
					<img id="my-profile-pic" src="/images/uploaded/profile/profile_<?=$this->tank_auth->get_user_id()?>.jpg?<?=gettimeofday(true)?>" height="150" width="150" />
					<p style="margin: 0.5em"><input id="change-my-pic" type="button" value="Change" /></p>
				</li>
			</ul>
		 </fieldset>
		 
		 
		</form> 
		
		<div style="clear:both;"></div>
		<div id="button-bar" style="margin:1em;"><input id="save-changes" type="button" value="Save" /></div>
</article>
<div id="upload-dialog">
	<div id="fileupload">
		<?php
		//echo form_open_multipart('uploadimg',array('id' => 'account-pic-form','class' => '','style' => '')); 
		 ?>
		
					<form id="uploadForm" enctype="multipart/form-data" method="POST" action="uploadimg">
						<input type="hidden" value="100000" name="MAX_FILE_SIZE" />
						<input type="hidden" name="img_type" value="profile" />
						File:
						<input type="file" name="userfile" />
						
						<input type="submit" value="Submit" />
						</form>
						<p>
						<label>Output:</label>
						</p>
						<div id="uploadOutput"></div>
		</div> 
</div>
<script src="/javascript/script.js"></script>
		<script>
			$(function() {
				$("a#sell-my-art").click(function(e){
					location.href=$('#'+e.target.id).attr('href');
					//alert('xx')
				});
			});
		</script>
