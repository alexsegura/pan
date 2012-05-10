<form method="post">
	
	<input type="hidden" name="action" value="save-template" />
	<input type="hidden" name="id_template_directory" value="{$directory->getIdTemplateDirectory()}" />
	{if isset($template)}
	<input type="hidden" name="id_template" value="{$template->getIdTemplate()}" />
	{/if}
	
	
	<fieldset>
		
		<legend>{l s='Template' mod='pan'}</legend>
	
		<label>{l s='Name' mod='pan'}</label>
		<div class="margin-form">
			<input type="text" name="name" value="{if isset($template)}{$template->getName()}{/if}" />
		</div>
		
		<label>{l s='Content' mod='pan'}</label>
		<div class="margin-form">
			<textarea name="content" rows="16" cols="70">{if isset($template)}{$template->getContent()}{/if}</textarea>
		</div>
		
		<div class="margin-form">
			<input type="submit" class="button" />
		</div>
		
	</fieldset>
</form>