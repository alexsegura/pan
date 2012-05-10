<form method="post">
	
	<input type="hidden" name="action" value="save-directory" />
	<input type="hidden" name="id_parent_template_directory" value="{$parent->getIdTemplateDirectory()}" />
	
	<fieldset>
		
		<legend>{l s='Directory' mod='pan'}</legend>
	
		<label>{l s='Name' mod='pan'}</label>
		<div class="margin-form">
			<input type="text" name="name" value="" />
		</div>
		
		<div class="margin-form">
			<input type="submit" class="button" />
		</div>
		
	</fieldset>
</form>