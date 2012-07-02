{if isset($products)}
	<!-- Products list -->
	<ul id="product_list" class="thumbnails">
	{foreach from=$products item=product name=products}
		<li class="span4">
			<div class="thumbnail">
				{if isset($comparator_max_item) && $comparator_max_item}
					<label class="checkbox" for="comparator_item_{$product.id_product}">
						{l s='Select to compare'} <input type="checkbox" class="comparator" id="comparator_item_{$product.id_product}" value="comparator_item_{$product.id_product}" {if isset($compareProducts) && in_array($product.id_product, $compareProducts)}checked="checked"{/if} />
					</label>
				{/if}
				<div class="center_block">
					<a href="{$product.link|escape:'htmlall':'UTF-8'}" class="product_img_link" title="{$product.name|escape:'htmlall':'UTF-8'}">
						<img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'large')}" 
							alt="{$product.legend|escape:'htmlall':'UTF-8'}" />
					</a>
					<h3>
						<a href="{$product.link|escape:'htmlall':'UTF-8'}" 
							title="{$product.name|escape:'htmlall':'UTF-8'}">{$product.name|truncate:35:'...'|escape:'htmlall':'UTF-8'}</a> 
							{if isset($product.new) && $product.new == 1}
								<span class="label label-success">{l s='New'}</span>
							{/if}
					</h3>
					<p class="product_desc"><a href="{$product.link|escape:'htmlall':'UTF-8'}" title="{$product.description_short|strip_tags:'UTF-8'|truncate:360:'...'}" >{$product.description_short|truncate:360:'...'|strip_tags:'UTF-8'}</a></p>
				</div>
				<div class="right_block">
					{if isset($product.on_sale) && $product.on_sale && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}<span class="on_sale">{l s='On sale!'}</span>
					{elseif isset($product.reduction) && $product.reduction && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}<span class="discount">{l s='Reduced price!'}</span>{/if}
					{if (!$PS_CATALOG_MODE AND ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
					<div class="content_price">
						{if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}<span class="price" style="display: inline;">{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}</span><br />{/if}
						{if isset($product.available_for_order) && $product.available_for_order && !isset($restricted_country_mode)}<span class="availability">{if ($product.allow_oosp || $product.quantity > 0)}{l s='Available'}{elseif (isset($product.quantity_all_versions) && $product.quantity_all_versions > 0)}{l s='Product available with different options'}{else}{l s='Out of stock'}{/if}</span>{/if}
					</div>
					{if isset($product.online_only) && $product.online_only}<span class="online_only">{l s='Online only!'}</span>{/if}
					{/if}
					{if ($product.id_product_attribute == 0 || (isset($add_prod_display) && ($add_prod_display == 1))) && $product.available_for_order && !isset($restricted_country_mode) && $product.minimal_quantity <= 1 && $product.customizable != 2 && !$PS_CATALOG_MODE}
						{if ($product.allow_oosp || $product.quantity > 0)}
							{if isset($static_token)}
								<a class="btn btn-success ajax_add_to_cart_button" rel="ajax_id_product_{$product.id_product|intval}" href="{$link->getPageLink('cart',false, NULL, "add&amp;id_product={$product.id_product|intval}&amp;token={$static_token}", true)}" title="{l s='Add to cart'}">{l s='Add to cart'}</a>
							{else}
								<a class="btn btn-success ajax_add_to_cart_button" rel="ajax_id_product_{$product.id_product|intval}" href="{$link->getPageLink('cart',false, NULL, "add&amp;id_product={$product.id_product|intval}", true)} title="{l s='Add to cart'}">{l s='Add to cart'}</a>
							{/if}						
						{else}
							<a class="btn btn-warning">{l s='Add to cart'}</a>
						{/if}
					{/if}
					<a class="btn btn-primary" href="{$product.link|escape:'htmlall':'UTF-8'}" title="{l s='View'}">{l s='View'}</a>
				</div>
			</div>
		</li>
	{/foreach}
	</ul>
	<!-- /Products list -->
{/if}
