<!-- $Id: announcements_compact.html,v 1.1 2008/02/09 08:18:15 angelside Exp $ //-->

<div class="panel">
	<div class="inner">
		<span class="corners-top"><span></span></span>
			<h3><?php echo ((isset($this->_rootref['L_LATEST_ANNOUNCEMENTS'])) ? $this->_rootref['L_LATEST_ANNOUNCEMENTS'] : ((isset($user->lang['LATEST_ANNOUNCEMENTS'])) ? $user->lang['LATEST_ANNOUNCEMENTS'] : '{ LATEST_ANNOUNCEMENTS }')); ?></h3>
				<ul class="news">
					<?php $_announcements_row_count = (isset($this->_tpldata['announcements_row'])) ? sizeof($this->_tpldata['announcements_row']) : 0;if ($_announcements_row_count) {for ($_announcements_row_i = 0; $_announcements_row_i < $_announcements_row_count; ++$_announcements_row_i){$_announcements_row_val = &$this->_tpldata['announcements_row'][$_announcements_row_i]; if ($_announcements_row_val['S_NO_TOPICS']) {  ?>
					<center><span class="gensmall"><strong><?php echo ((isset($this->_rootref['L_NO_ANNOUNCEMENTS'])) ? $this->_rootref['L_NO_ANNOUNCEMENTS'] : ((isset($user->lang['NO_ANNOUNCEMENTS'])) ? $user->lang['NO_ANNOUNCEMENTS'] : '{ NO_ANNOUNCEMENTS }')); ?></strong></span></center>
					<?php } else { ?>
					<li>
						<img src="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/images/arrow_right.gif" /> 
						<a href="<?php echo $_announcements_row_val['U_VIEW_COMMENTS']; ?>"><strong style="font-size:1.1em;"><?php echo $_announcements_row_val['TITLE']; ?></strong></a>
						<br style="clear:both" />
						<span style="float: left;">
							<a href="<?php echo $_announcements_row_val['U_VIEW_COMMENTS']; ?>" title="<?php echo ((isset($this->_rootref['L_VIEW_COMMENTS'])) ? $this->_rootref['L_VIEW_COMMENTS'] : ((isset($user->lang['VIEW_COMMENTS'])) ? $user->lang['VIEW_COMMENTS'] : '{ VIEW_COMMENTS }')); ?>"><span style="font-size:0.9em;"><em><?php echo ((isset($this->_rootref['L_COMMENTS'])) ? $this->_rootref['L_COMMENTS'] : ((isset($user->lang['COMMENTS'])) ? $user->lang['COMMENTS'] : '{ COMMENTS }')); ?>: <?php echo $_announcements_row_val['REPLIES']; ?></em></span></a>
							<span style="font-size:0.9em;"><em><?php echo ((isset($this->_rootref['L_TOPIC_VIEWS'])) ? $this->_rootref['L_TOPIC_VIEWS'] : ((isset($user->lang['TOPIC_VIEWS'])) ? $user->lang['TOPIC_VIEWS'] : '{ TOPIC_VIEWS }')); ?>: <?php echo $_announcements_row_val['TOPIC_VIEWS']; ?></em></span>
						</span>
						<span style="float: right;"><?php echo $_announcements_row_val['TIME']; ?></span>
						<br />
					</li>
					<?php } }} ?>	
				</ul>
		<span class="corners-bottom"><span></span></span>
	</div>
</div>
<br style="clear:both" />