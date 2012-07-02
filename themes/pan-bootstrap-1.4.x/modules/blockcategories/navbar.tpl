<ul class="nav">
	<li class="dropdown" id="navbar-categories">
		<a href="#navbar-categories" class="dropdown-toggle" data-toggle="dropdown">{l s='Categories' mod='blockcategories'} <b class="caret"></b></a>
		<ul class="dropdown-menu">
		{foreach from=$blockCategTree.children item=node}
		{include file='theme:modules/blockcategories/node' node=$node}
		{/foreach}
        </ul>
	</li>
</ul>
