<!-- $Id: news_compact.html,v 1.1 2008/02/09 08:18:16 angelside Exp $ //-->

<div class="panel">
	<div class="inner">
		<span class="corners-top"><span></span></span>
			<h3><?php echo ((isset($this->_rootref['L_LATEST_NEWS'])) ? $this->_rootref['L_LATEST_NEWS'] : ((isset($user->lang['LATEST_NEWS'])) ? $user->lang['LATEST_NEWS'] : '{ LATEST_NEWS }')); ?></h3>
				<ul class="news">
					<?php $_news_row_count = (isset($this->_tpldata['news_row'])) ? sizeof($this->_tpldata['news_row']) : 0;if ($_news_row_count) {for ($_news_row_i = 0; $_news_row_i < $_news_row_count; ++$_news_row_i){$_news_row_val = &$this->_tpldata['news_row'][$_news_row_i]; if ($_news_row_val['S_NO_TOPICS']) {  ?>
					<center><span class="gensmall"><strong><?php echo ((isset($this->_rootref['L_NO_NEWS'])) ? $this->_rootref['L_NO_NEWS'] : ((isset($user->lang['NO_NEWS'])) ? $user->lang['NO_NEWS'] : '{ NO_NEWS }')); ?></strong></span></center>
					<?php } else { ?>
					<li>
						<img src="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/images/arrow_right.gif" /> 
						<a href="<?php echo $_news_row_val['U_VIEW_COMMENTS']; ?>"><strong style="font-size:1.1em;"><?php echo $_news_row_val['TITLE']; ?></strong></a>
						<br style="clear:both" />
						<span style="float: left;">
							<a href="<?php echo $_news_row_val['U_VIEW_COMMENTS']; ?>" title="<?php echo ((isset($this->_rootref['L_VIEW_COMMENTS'])) ? $this->_rootref['L_VIEW_COMMENTS'] : ((isset($user->lang['VIEW_COMMENTS'])) ? $user->lang['VIEW_COMMENTS'] : '{ VIEW_COMMENTS }')); ?>"><span style="font-size:0.9em;"><em><?php echo ((isset($this->_rootref['L_COMMENTS'])) ? $this->_rootref['L_COMMENTS'] : ((isset($user->lang['COMMENTS'])) ? $user->lang['COMMENTS'] : '{ COMMENTS }')); ?>: <?php echo $_news_row_val['REPLIES']; ?></em></span></a>
							<span style="font-size:0.9em;"><em><?php echo ((isset($this->_rootref['L_TOPIC_VIEWS'])) ? $this->_rootref['L_TOPIC_VIEWS'] : ((isset($user->lang['TOPIC_VIEWS'])) ? $user->lang['TOPIC_VIEWS'] : '{ TOPIC_VIEWS }')); ?>: <?php echo $_news_row_val['TOPIC_VIEWS']; ?></em></span>
						</span>
						<span style="float: right;"><?php echo $_news_row_val['TIME']; ?></span>
						<br />
					</li>
					<?php } }} ?>	
				</ul>
		<span class="corners-bottom"><span></span></span>
	</div>
</div>
<br style="clear:both" />