<form id="new-list-form-dialog" class="ui-state-focus">
<fieldset class="dialog-form">
	<legend class="hidden-legend">Start New List</legend>
	<label for="list-label">List Label</label>
	<input id="list-label" type="text" class="ui-state-focus text-input" name="list_label" maxlength="255" value="" />
	<fieldset class="ui-state-focus option-set">
	<legend class="option-set">List Options</legend>
		<label for="gallery"><input id="gallery" type="radio" class="ui-state-highlight option-set" value="gallery"  name="start_list" checked/>Gallery Wizard</label>
		<label class="inline-option-label" for="custom"><input id="custom" type="radio" class="ui-state-highlight option-set" name="start_list" value="custom" />Custom List</label>
		<div classs="ui-helper-clearfix">
	</fieldset>
</fieldset>
</form>