{pan}
=====

{pan} is a tool / theme framework for PrestaShop 1.4.x

It aims to simplify theme development by providing simple, clean, easy to use **Smarty plugins**

It is largely inspired by the Java Server Pages Tag Libraries

Requirements
------------

{pan} requires **Smarty 3** and **PDO MySQL**. 

Installation
----------------

{pan} is a standard PrestaShop module. 

Use the "ZIP" button above to get the source tree, unzip it in prestashop/modules/pan, install it in the admin panel, and start using it. 

NEW ! Base theme
----------------

To demonstrate how it works, {pan} now comes with a theme, based on [Twitter Bootstap](http://twitter.github.com/bootstrap/)

A live demo of the theme can be seen [here](http://www.zktk.org/pan/)

More than a demo, this theme aims to become a community-driven template

**Share your best practices**

Template streams
================

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

The **db://** stream allows to include template which source is **stored in database**.

{pan} comes with a (basic) web-based template explorer and a template editor, 
to create and organize templates, for example :

```

    Templates
    |-- ads
    |   |-- block01      <= /ads/block01
    |   |-- block02      <= /ads/block02
    |   `-- block03      <= /ads/block03
    |-- various
    |   |-- special-link <= /various/special-link
    |   `-- faq          <= /various/faq
    `-- foo              <= /foo

```

For easy usage, templates can then be expressed with their materialized path. 

**Fork this project and help improve the template editor !**

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

Smarty function plugins
=======================

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

Smarty block plugins
====================

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

{handlebars [templateName=string tagName=string]}
---------------------------------------

{handlebars} is a Smarty block plugin will wrap its content inside a [Handlebars](http://handlebarsjs.com/)

```smarty
    {handlebars templateName='say-hello'}
	I'm a handlebars template
	{/handlebars}
```

```html
    <script type="text/x-handlebars" data-template-name="say-hello">
    I'm a handlebars template
    </script>
```

Smarty modifier plugins
=======================

json
----

The *json* modifier will convert the input into its JSON representation. 

Useful to convert PHP objects into JavaScript objects ! 

```smarty
	<script type="text/javascript">
    var productObj = {$product|json};
    console.log(product.name);
    </script>
```

mustache
--------

The *mustache* modifier will wrap the input in a [mustache](http://mustache.github.com/)

Useful to avoid too many curly braces when using mustache within Smarty 

```smarty
	{'user.name'|mustache}
	{* Equivalent *}
	{'{{user.name}}'}
```




    