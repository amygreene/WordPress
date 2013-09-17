
<?php 
$kt =& get_instance();

if ($kt->config->item('show_twitter', 'layout') == 'true' && trim($kt->config->item('twitter_account', 'layout')) !== '') :
	
?>
<div id="topbox" class="subcontainer"> 
	<div id="twitter" class="subcontainer fleft">
		<h2 class="htwit mainhead">Twitter Update</h2>
		<div class="tweet fleft">
			<div class="twitter_text">			
				<?php //if($feusional_notwitter == "false") { ?>
					<ul id="twitter_update_list"></ul>
				<?php //} else echo "";?>
			</div>
		</div>
	</div>
<br class="clear" />
</div>

<?php endif;

	
