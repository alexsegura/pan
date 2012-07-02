				{if !$content_only}
				</div>
				<div id="right_column" class="span2">
					{*
					{$HOOK_RIGHT_COLUMN}
					*}
					{ps_hook hook='rightColumn' mod='blockcart'}
				</div>
				
			</div>
			
			<hr />
			
			<div class="row">
				{*
				<div id="footer" class="span12">{$HOOK_FOOTER}</div>
				*}
				<div class="span12">
				{ps_hook hook='footer' mod='blockcms' view='footer'}
				</div>
			</div>
		</div>
	{/if}
	</body>
</html>
