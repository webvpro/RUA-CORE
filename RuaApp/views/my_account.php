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
					<input id="first-name" name="first_name" type="text" placeholder="Your First Name" value="<?=set_value('first_name')?>" maxlength="50" required>
				</li>
				<li>
					<label for="last-name">Last Name:</label>
					<input id="last-name" name="last_name" type="text" placeholder="Your Last Name" value="<?=set_value('last_name')?>" maxlength="50" required>
				</li>
				<li>
					<label for="last-name">Address 1:</label>
					<input id="address-1" name="address_1" type="text" placeholder="Address  here" value="<?=set_value('address_1')?>" maxlength="50" required>
				</li>
				<li>
					<label for="last-name">Address 2:</label>
					<input id="address-2" name="address_2" type="text" placeholder="Address  here" value="<?=set_value('address_2')?>" maxlength="50" required>
				</li>
				<li>
					<label for="last-name">Country:</label>
					<?php
						$opts = 'id="country-code"';
						echo form_dropdown('country_code', $countries, 'US',$opts);
					?>
				</li>
				<li>
					<label for="last-name">City:</label>
					<input id="city" name="city" type="text" placeholder="Address  here" value="<?=set_value('city')?>" maxlength="50" required>
				</li>
				<li>
					<label for="last-name">State/Province:</label>
					<input id="state-province" name="state_province" type="text" placeholder="State or Province" value="<?=set_value('state_province')?>" maxlength="50" required>
				</li>
				<li>
					<label for="last-name">Zip/Postal Code:</label>
					<input id="postal-code" name="postal_code" type="text" placeholder="Code Here" value="<?=set_value('state_province')?>" size="8" maxlength="8" required>
				</li>
			</ul>
		</fieldset>
		</form>
		<form id="bio-pic" class="account-form" style="float: right;">
		<fieldset style="">
			<legend>My Photo</legend>
			<ul>
				<li style="text-align: center">
					<img id="my-profile-pic" src="/images/uploaded/profile/profile_<?=$this->tank_auth->get_user_id()?>.jpg?<?=gettimeofday(true)?>" height="150" width="150" />
					<p><input id="change-my-pic" type="button" value="Change" /></p>
				</li>
			</ul>
		 </fieldset>
		 
		 <fieldset style="">
			<legend>My Bio</legend>
			<ul>
				<li>
					<textarea style="width:28.5em;height:23.5em;"></textarea>
				</li>
			</ul>
		 </fieldset>
		</form> 
		
		<div style="clear:both;"></div>
</article>
<div id="upload-dialog">
	<div id="fileupload">
		<?php
		echo form_open_multipart('uploadimg',array('id' => 'account-pic-form','class' => '','style' => '')); 
		 ?>
		
					<div class="fileupload-buttonbar">
		                <label class="fileinput-button">
		                    <span>Add file...</span>
		                    <input type="hidden" name="img_type" value="profile" />
		                    <input type="file" name="userfile" multiple>
		                </label>
		                <button type="submit" class="start">Start upload</button>
		               </div>
		            <div class="fileupload-content">
				        <table class="files"></table>
				        <div class="fileupload-progressbar"></div>
				    </div>
				
		 </form>
		 
</div>


		 <script id="template-upload" type="text/x-jquery-tmpl">
    <tr class="template-upload{{if error}} ui-state-error{{/if}}">
        <td class="preview"></td>
        <td class="name">${name}</td>
        <td class="size">${sizef}</td>
        {{if error}}
            <td class="error" colspan="2">Error:
                {{if error === 'maxFileSize'}}File is too big
                {{else error === 'minFileSize'}}File is too small
                {{else error === 'acceptFileTypes'}}Filetype not allowed
                {{else error === 'maxNumberOfFiles'}}Max number of files exceeded
                {{else}}${error}
                {{/if}}
            </td>
        {{else}}
            <td class="progress"><div></div></td>
            <td class="start"><button>Start</button></td>
        {{/if}}
        <td class="cancel"><button>Cancel</button></td>
    </tr>
</script>
<script id="template-download" type="text/x-jquery-tmpl">
    <tr class="template-download{{if error}} ui-state-error{{/if}}">
        {{if error}}
            <td></td>
            <td class="name">${name}</td>
            <td class="size">${sizef}</td>
            <td class="error" colspan="2">Error:
                {{if error === 1}}File exceeds upload_max_filesize (php.ini directive)
                {{else error === 2}}File exceeds MAX_FILE_SIZE (HTML form directive)
                {{else error === 3}}File was only partially uploaded
                {{else error === 4}}No File was uploaded
                {{else error === 5}}Missing a temporary folder
                {{else error === 6}}Failed to write file to disk
                {{else error === 7}}File upload stopped by extension
                {{else error === 'maxFileSize'}}File is too big
                {{else error === 'minFileSize'}}File is too small
                {{else error === 'acceptFileTypes'}}Filetype not allowed
                {{else error === 'maxNumberOfFiles'}}Max number of files exceeded
                {{else error === 'uploadedBytes'}}Uploaded bytes exceed file size
                {{else error === 'emptyResult'}}Empty file upload result
                {{else}}${error}
                {{/if}}
            </td>
        {{else}}
            <td class="preview">
                {{if thumbnail_url}}
                    <a href="${url}" target="_blank"><img src="${thumbnail_url}" height="60" width="80"></a>
                {{/if}}
            </td>
            <td class="name">
                <a href="${url}"{{if thumbnail_url}} target="_blank"{{/if}}>${name}</a>
            </td>
            <td class="size">${sizef}</td>
            <td colspan="2"></td>
        {{/if}}
        <td class="delete">
            <button data-type="${delete_type}" data-url="${delete_url}">Delete</button>
        </td>
    </tr>
</script>