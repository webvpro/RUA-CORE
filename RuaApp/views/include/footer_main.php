<div id="search-form-panel">
	<h2>Search</h2>
	<form id="art-search" action="/search" method="post" accept-charset="utf-8">
		<input type="hidden" name="search_type" value="quick" />
		<label for="find-resuse-percent-range">Resuse % Range:</label>
		<input type="text" id="find-resuse-percent-range" size="7" name="search_percent_range" value="<?=set_value('search_percent_range')?>"/>
		<div id="slider-percent-range" class="ui-picker"></div>
		<label for="find-price-range">Price Range:</label>
		<input type="text" id="find-resuse-price-range" size="9" name="search_price_range" value="<?=set_value('search_price_range')?>"/>
		<div id="slider-price-range" class="ui-picker"></div>
		<label for="find-item-primary-material">Primary Materials:</label>
		<div id="find-primary-material" class="tagWrap ui-helper-clearfix">
				<? /*foreach ($find_material_labels as $key) {
					echo '<span id="'.$key['id'].'">'.$key['label'].'<a class="remove" href="javascript:" title="Remove steel">x</a></span>';
				} */?>
			<input id="find-hidden-primary-material" name="search_material_ids" type="hidden" value="<?=set_value('search_material_ids')?>" />
			<input id="find-item-primary-material" class="taginput" name="find_item_primary_material" type="text" placeholder="" maxlength="20" style="width:40px" value=""  />
		</div>
		<label for="find-item-keywords">Keywords:</label>
		<div id="find-keywords" class="tagWrap ui-helper-clearfix">
				<? /*foreach ($find_keyword_labels as $key) {
					echo '<span id="'.$key['id'].'">'.$key['label'].'<a class="remove" href="javascript:" title="Remove steel">x</a></span>';
				} */?>
			<input id="find-hidden-words" name="search_keyword_ids" type="hidden" value="<?=set_value('search_keyword_ids')?>" />
			<input id="find-item-keywords" class="taginput" name="find_item_keywords" type="text" placeholder="" maxlength="20" style="width:40px" value=""  />
		</div>
		<fieldset>
			<legend>Location</legend>
			<div class="ui-widget">
				<label for="find-country">Country:</label>
				<input type="hidden" id="find-country-code" name="search_country_code" value="<?=set_value('search_country_code')?>"/>
				<input type="text" id="find-country" name="search_country" value="<?=set_value('search_country')?>"/>
			</div>
			<div class="ui-widget">
				<label for="find-state">State/Province:</label>
				<input type="hidden" id="find-state-code" name="search_state_code" value="<?=set_value('search_state_code')?>"/>
				<input type="text" id="find-state" name="search_state" value="<?=set_value('search_state')?>"/>
			</div>
		</fieldset>
		<input type="submit" value="Search" />
	</form>
</div>
<script type="text/javascript">var switchTo5x=true;</script><script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script><script type="text/javascript">stLight.options({publisher:'02dffc56-bc66-4747-b83b-00eb047b76b9',onhover: false
});</script>
<script type="text/javascript" src="/javascript/apps/popin.search.form.js"></script>
</body>

</html>