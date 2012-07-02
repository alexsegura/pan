<div class="alert alert-info">
{if $category->id == 1 OR $nb_products == 0}{l s='There are no products.'}
{else}
	{if $nb_products == 1}{l s='There is'}{else}{l s='There are'}{/if}
	{$nb_products}
	{if $nb_products == 1}{l s='product.'}{else}{l s='products.'}{/if}
{/if}
</div>