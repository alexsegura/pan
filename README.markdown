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

**theme://**

The **theme://** stream is a shorthand to include templates from the current theme, 
and even from other themes. 

Useful if you don't need to override all the templates and want to fallback to default theme. 

```smarty
    {* Displays breadcrumb.tpl from default theme *}
    {include file="theme:breadcrumb@prestashop"}
			
    {* Displays breadcrumb.tpl from current theme *}
    {include file="theme:breadcrumb"}
```

**db://**

The **db://** stream allows to include template which source is stored in database.

{pan} ships with a preferences page allowing to author templates, and organize them 
in a tree structure (just like folders). **Currently in development, come and help finalize it**

Templates can then be expressed with their materialized path. 

```smarty
    {* Displays the template named block1, stored in folder /ads in database *}
    {include file="db:/ads/block1"}
			
    {* Displays the template named foo, located at the root of the templates *}
    {include file="db:/foo"}
```

**Database schema**

<pre>

mysql> desc ps_template_directory;
+-----------------------+-------------+------+-----+---------+----------------+
| Field                 | Type        | Null | Key | Default | Extra          |
+-----------------------+-------------+------+-----+---------+----------------+
| id_template_directory | int(11)     | NO   | PRI | NULL    | auto_increment |
| node_level            | int(11)     | NO   |     | NULL    |                |
| node_left             | int(11)     | NO   |     | NULL    |                |
| node_right            | int(11)     | NO   |     | NULL    |                |
| name                  | varchar(64) | YES  |     | NULL    |                |
+-----------------------+-------------+------+-----+---------+----------------+

mysql> desc ps_template;
+-----------------------+-------------+------+-----+---------+----------------+
| Field                 | Type        | Null | Key | Default | Extra          |
+-----------------------+-------------+------+-----+---------+----------------+
| id_template           | int(11)     | NO   | PRI | NULL    | auto_increment |
| id_template_directory | int(11)     | NO   |     | NULL    |                |
| name                  | varchar(64) | NO   |     | NULL    |                |
| content               | text        | YES  |     | NULL    |                |
+-----------------------+-------------+------+-----+---------+----------------+

</pre>

{ps_hook mod=string hook=string [view=string]}
--------------------------------

{ps_hook} allows to invoke any (callable & registered) hook of any module... anywhere. 

Useful for non-standard layouts, and to "widgetize" your theme :

```smarty
    {ps_hook mod='blocklanguages' hook='top'}
```
{ps_hook} also fixes a common problem : how to use a module that was not designed to work with another hook. 

You can invoke the hook method and override the view that will be displayed. 

All the view variables for the standard hook will be available. 

```smarty
	{* Invokes blocklanguages :: hookTop(), *}
	{* but displays the view modules/blocklanguages/footer.tpl *}
	{* under the current theme *}
    {ps_hook mod='blocklanguages' hook='top' view='footer'}
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
    