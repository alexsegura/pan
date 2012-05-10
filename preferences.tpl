<script type="text/javascript" src="../js/jquery/treeview/jquery.treeview.js"></script>
<script type="text/javascript" src="../js/jquery/treeview/jquery.treeview.async.js"></script>
<script type="text/javascript" src="../js/jquery/treeview/jquery.treeview.edit.js"></script>
<link type="text/css" rel="stylesheet" href="../css/jquery.treeview.css">


<style>
	
	#left-col {
		float: left;
		width: 160px;
	}
	
	#right-col {
		margin-left: 170px;
	}

</style>

<div class="path_bar">
	{foreach from=$directory->getAncestors() item=ancestor name=ancestors}
	<a href="#">{$ancestor->getName()}</a> &gt; 
	{/foreach}
	<a href="#">{$directory->getName()}</a>
</div>

<div id="left-col">

	<ul class="filetree treeview">

	{foreach from=$root->getBranch() item=node name=root}
	
		{assign var=isLast value=$node->hasParent() and $node->getParent()->getLastChild() === $node}
		{assign var=liClass value=array()}
		
		{if $node->isRoot()}
			{append var=liClass value='static'}
		{/if}
		{if $node->isRoot() || $isLast}
			{append var=liClass value='last'}
		{/if}
		
		{assign var=liClass value=implode($liClass, ' ')}
		
		<li class="{$liClass}">
		
			<span class="folder">
			{if $directory->getIdTemplateDirectory() == $node->getIdTemplateDirectory()}<strong>{/if}
			&nbsp;<a href="{$baseURL}&id_template_directory={$node->getIdTemplateDirectory()}">{$node->getName()}</a>
			{if $directory->getIdTemplateDirectory() == $node->getIdTemplateDirectory()}</strong>{/if}
			</span>
			
		{if $node->hasChildren()}<ul>{else}</li>{/if}
		
		
		
		{if $isLast && !$node->hasChildren()}</ul>{/if}
		
	{/foreach}
	
	</ul>
	
</div>

<div id="right-col">

	{$screen_content}

</div>
<div class="clearfix"></div>