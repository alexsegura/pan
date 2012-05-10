<table class="table" cellpadding="0" cellspacing="0" style="width: 100%;">

	<th>{l s='Name' mod='pan'}</th>
	<th>{l s='Path' mod='pan'}</th>
	<th>{l s='Content' mod='pan'}</th>
	<th>{l s='Actions' mod='pan'}</th>

	{foreach from=$templates item=template}
	<tr>
		<td>{$template->getName()}</td>
		<td>{$template->getMaterializedPath()}</td>
		<td>{$template->getContent()}</td>
		<td><a href="{$baseURL}&action=edit-template&id_template={$template->getIdTemplate()}&id_template_directory={$directory->getIdTemplateDirectory()}">
			<img src="../img/admin/edit.gif" alt="{l s='Edit' mod='pan'}" title="{l s='Edit' mod='pan'}">
		</a></td>
	</tr>
	{/foreach}
	
</table>

<hr />

<a href="{$baseURL}&action=add-directory&id_template_directory={$directory->getIdTemplateDirectory()}" class="button">{l s='Add subdirectory' mod='pan'}</a>
<a href="{$baseURL}&action=edit-template&id_template_directory={$directory->getIdTemplateDirectory()}" class="button">{l s='Add template' mod='pan'}</a>