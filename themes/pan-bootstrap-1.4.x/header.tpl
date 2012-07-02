<!DOCTYPE html>
<html lang="{$lang_iso}">
	<head>
		<title>{$meta_title|escape:'htmlall':'UTF-8'}</title>
		{if isset($meta_description) AND $meta_description}
		<meta name="description" content="{$meta_description|escape:html:'UTF-8'}" />
		{/if}
		{if isset($meta_keywords) AND $meta_keywords}
		<meta name="keywords" content="{$meta_keywords|escape:html:'UTF-8'}" />
		{/if}
		<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
		<meta name="generator" content="PrestaShop" />
		<meta name="robots" content="{if isset($nobots)}no{/if}index,follow" />
		<link rel="icon" type="image/vnd.microsoft.icon" href="{$img_ps_dir}favicon.ico?{$img_update_time}" />
		<link rel="shortcut icon" type="image/x-icon" href="{$img_ps_dir}favicon.ico?{$img_update_time}" />
		<script type="text/javascript">
			var baseDir = '{$content_dir}';
			var static_token = '{$static_token}';
			var token = '{$token}';
			var priceDisplayPrecision = {$priceDisplayPrecision*$currency->decimals};
			var priceDisplayMethod = {$priceDisplay};
			var roundMode = {$roundMode};
		</script>
		{*
		{if isset($css_files)}
		{foreach from=$css_files key=css_uri item=media}
		<link href="{$css_uri}" rel="stylesheet" type="text/css" media="{$media}" />
		{/foreach}
		{/if}
		*}
		
		<script type="text/javascript" src="{$js_dir}jquery-1.7.2.min.js"></script>
		{if isset($js_files)}
		{foreach from=$js_files item=js_uri}
		{if false === strpos($js_uri, '/js/jquery/jquery-1.4.4.min.js')}
		<script type="text/javascript" src="{$js_uri}"></script>
		{/if}
		{/foreach}
		{/if}
				
		{*
		{$HOOK_HEADER}
		*}
		
		<link type="text/css" href="{$css_dir}bootstrap/bootstrap.min.css" rel="stylesheet" media="screen" />
		<link type="text/css" href="{$css_dir}bootstrap/bootstrap-responsive.min.css" rel="stylesheet" media="screen" />
		
		<script type="text/javascript" src="{$css_dir}bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="{$css_dir}bootstrap/bootstrap-dropdown.js"></script>
		<script type="text/javascript" src="{$css_dir}bootstrap/bootstrap-tab.js"></script>
		<script type="text/javascript" src="{$css_dir}bootstrap/bootstrap-popover.js"></script>
		<script type="text/javascript" src="{$css_dir}bootstrap/bootstrap-scrollspy.js"></script>
		<script type="text/javascript" src="{$css_dir}bootstrap/bootstrap-alert.js"></script>
		<script type="text/javascript" src="{$css_dir}bootstrap/bootstrap-collapse.js"></script>
		
	</head>
	
	<body {if $page_name}id="{$page_name|escape:'htmlall':'UTF-8'}"{/if}>
	{if !$content_only}
	
		{if isset($restricted_country_mode) && $restricted_country_mode}
		<div id="restricted-country">
			<p>{l s='You cannot place a new order from your country.'} <span class="bold">{$geolocation_country}</span></p>
		</div>
		{/if}
		
		
		
		
		<div class="container-fluid">
		
			{*
			<!-- Header -->
			<div id="header">
				<a id="header_logo" href="{$link->getPageLink('index.php')}" title="{$shop_name|escape:'htmlall':'UTF-8'}">
					<img class="logo" src="{$img_ps_dir}logo.jpg?{$img_update_time}" alt="{$shop_name|escape:'htmlall':'UTF-8'}" {if $logo_image_width}width="{$logo_image_width}"{/if} {if $logo_image_height}height="{$logo_image_height}" {/if} />
				</a>
				<div id="header_right">
					{$HOOK_TOP}
				</div>
			</div>
			*}
			
			<div class="navbar">
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
						</a>
						<a class="brand" href="#">Project name</a>
						<div class="nav-collapse">
							<ul class="nav">
								<li class="active"><a href="#">Home</a></li>
								<li><a href="#">My account</a></li>
							</ul>
							{ps_hook hook='leftColumn' mod='blockcart' view='navbar'}
					        {ps_hook hook='leftColumn' mod='blockcategories' view='navbar'}
						</div>
					</div>
				</div>
			</div>
			
			<script>
			$(document).ready(function() {
				$('.dropdown-toggle').dropdown();
			});
			</script>
			
			<div class="row">
				<div id="left_column" class="span2">
					{ps_hook hook='leftColumn' mod='blockcategories'}
					{ps_hook hook='leftColumn' mod='blockcms' view='left-column'}
					{*
					{$HOOK_LEFT_COLUMN}
					*}
				</div>
				<div id="center_column" class="span8">
	{/if}
