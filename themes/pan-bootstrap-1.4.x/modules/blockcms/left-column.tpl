<div class="well">
	{foreach from=$cms_titles key=cms_key item=cms_title}
		<h4>{if !empty($cms_title.name)}{$cms_title.name}{else}{$cms_title.category_name}{/if}</h4>
		<ul class="nav nav-list">
			{foreach from=$cms_title.categories item=cms_page}
				{if isset($cms_page.link)}<li class="bullet"><b style="margin-left:2em;">
				<a href="{$cms_page.link}" title="{$cms_page.name|escape:html:'UTF-8'}">{$cms_page.name|escape:html:'UTF-8'}</a>
				</b></li>{/if}
			{/foreach}
			{foreach from=$cms_title.cms item=cms_page}
				{if isset($cms_page.link)}<li><a href="{$cms_page.link}" title="{$cms_page.meta_title|escape:html:'UTF-8'}">{$cms_page.meta_title|escape:html:'UTF-8'}</a></li>{/if}
			{/foreach}
			{if $cms_title.display_store}<li><a href="{$link->getPageLink('stores.php')}" title="{l s='Our stores' mod='blockcms'}">{l s='Our stores' mod='blockcms'}</a></li>{/if}
		</ul>
	{/foreach}
</div>