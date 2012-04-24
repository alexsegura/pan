{pan}
=====

{pan} is a tool / theme framework for PrestaShop 1.4.x

It aims to simplify theme development by providing simple, clean, easy to use Smarty plugins. 

Template streams
----------------

{pan} registers PHP streams for Smarty to resolve templates for different sources. 

Right now there is the **theme://** stream, that allows to include templates for other themes. 

Useful if you don't need to override all the templates and want to fallback to default theme. 

    {* Displays breadcrumb.tpl from default theme *}
    {include file="theme:breadcrumb@prestashop"}
			
    {* Displays breadcrumb.tpl from current theme *}
    {include file="theme:breadcrumb"}

{ps_show includes=mixed excludes=mixed}
---------

{ps_show} is a Smarty block plugin that allows to show/hide content based on the page name.

Useful to display columns only on certain pages. 

    {ps_show includes='index'}
    <p>I'm displayed only on home page</p>
    {/ps_show}

    {ps_show excludes='category|cms'}
    <p>I'm not displayed on category and cms pages</p>
    {/ps_show}

