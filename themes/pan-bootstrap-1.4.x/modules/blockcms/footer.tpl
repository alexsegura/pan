<ul class="nav nav-pills" id="block_various_links_footer">
	{if !$PS_CATALOG_MODE}<li class="first_item"><a href="{$link->getPageLink('prices-drop.php')}" title="{l s='Specials' mod='blockcms'}">{l s='Specials' mod='blockcms'}</a></li>{/if}
	<li class="{if $PS_CATALOG_MODE}first_{/if}item"><a href="{$link->getPageLink('new-products.php')}" title="{l s='New products' mod='blockcms'}">{l s='New products' mod='blockcms'}</a></li>
	{if !$PS_CATALOG_MODE}<li class="item"><a href="{$link->getPageLink('best-sales.php')}" title="{l s='Top sellers' mod='blockcms'}">{l s='Top sellers' mod='blockcms'}</a></li>{/if}
	{if $display_stores_footer}<li class="item"><a href="{$link->getPageLink('stores.php')}" title="{l s='Our stores' mod='blockcms'}">{l s='Our stores' mod='blockcms'}</a></li>{/if}
	<li class="item"><a href="{$link->getPageLink('contact-form.php', true)}" title="{l s='Contact us' mod='blockcms'}">{l s='Contact us' mod='blockcms'}</a></li>
	{foreach from=$cmslinks item=cmslink}
		{if $cmslink.meta_title != ''}
			<li class="item"><a href="{$cmslink.link|addslashes}" title="{$cmslink.meta_title|escape:'htmlall':'UTF-8'}">{$cmslink.meta_title|escape:'htmlall':'UTF-8'}</a></li>
		{/if}
	{/foreach}
	{if $display_poweredby}
	<li class="last_item"><a href="http://www.prestashop.com">{l s='Powered by' mod='blockcms'} PrestaShop &trade;</a></li>
{/if}
</ul>