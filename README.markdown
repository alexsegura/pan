{pan}
=====

{pan} is a tool / theme framework for PrestaShop 1.4.x

It aims to simplify theme development by providing simple, clean, easy to use **Smarty plugins**

It is largely inspired by the Java Server Pages Tag Libraries

Requirements
------------

{pan} requires Smarty 3. 

Installation
----------------

{pan} is a standard PrestaShop module. 

Use the "ZIP" button above to get the source tree, unzip it in prestashop/modules/pan, and start coding. 

Template streams
----------------

{pan} registers PHP streams for Smarty to resolve templates from different sources. 

Right now there is the **theme://** stream, that allows to include templates for other themes. 

**A database stream is in the roadmap !**

Useful if you don't need to override all the templates and want to fallback to default theme. 

```smarty
    {* Displays breadcrumb.tpl from default theme *}
    {include file="theme:breadcrumb@prestashop"}
			
    {* Displays breadcrumb.tpl from current theme *}
    {include file="theme:breadcrumb"}
```

{ps_show includes=mixed excludes=mixed}
---------------------------------------

{ps_show} is a Smarty block plugin that allows to show/hide content based on the page name.

Useful to display columns only on certain pages. 

```smarty
    {ps_show includes='index'}
    <p>I'm displayed only on home page</p>
    {/ps_show}

    {ps_show excludes='category|cms'}
    <p>I'm not displayed on category and cms pages</p>
    {/ps_show}
```

{ps_hook mod=string hook=string}
--------------------------------

{ps_hook} allows to invoke any (callable & registered) hook of any module... anywhere. 

Useful for non-standard layouts :

```smarty
    {ps_hook mod='blocklanguages' hook='top'}
```
    
{ps_url ...}
------------

{ps_url} is a versatile shorthand for the Link class methods. 

It accepts model representations in any form (object, array, int) and accepts an arbitrary number of
additional parameters. 

Here are some examples :

```smarty
	{* Builds a product array and prints link *}
    {append var='product' index='id_product' value=8}
    {append var='product' index='link_rewrite' value='product_8'}
    {ps_url product=$product foo='bar'}
    
    {* Equivalent to above with integer *}
    {ps_url product=8 content_only='1'}
    
    {* CMS, Categories... *}
    {ps_url cms=4}
    {ps_url category=$category}
 ```
    