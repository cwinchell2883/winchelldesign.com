<!-- $Id: latest_bots.html,v 1.1 2008/02/09 08:18:15 angelside Exp $ //-->
<div class="panel">
	<div class="inner">
		<span class="corners-top"><span></span></span>
			<h3><?php echo (isset($this->_rootref['LAST_VISITED_BOTS'])) ? $this->_rootref['LAST_VISITED_BOTS'] : ''; ?></h3>
			<?php $_last_visited_bots_count = (isset($this->_tpldata['last_visited_bots'])) ? sizeof($this->_tpldata['last_visited_bots']) : 0;if ($_last_visited_bots_count) {for ($_last_visited_bots_i = 0; $_last_visited_bots_i < $_last_visited_bots_count; ++$_last_visited_bots_i){$_last_visited_bots_val = &$this->_tpldata['last_visited_bots'][$_last_visited_bots_i]; ?>
				<span class="genmed"><?php echo $_last_visited_bots_val['BOT_NAME']; ?></span> <br /> <span class="gensmall"><?php echo $_last_visited_bots_val['LAST_VISIT_DATE']; ?></span><hr />
			<?php }} ?>
		<span class="corners-bottom"><span></span></span>
	</div>
</div>
<br style="clear:both" />