<!-- $Id: statistics.html,v 1.1 2008/02/09 08:18:16 angelside Exp $ //-->
<div class="panel">
	<div class="inner">
		<span class="corners-top"><span></span></span>
		<h3><?php echo ((isset($this->_rootref['L_STATISTICS'])) ? $this->_rootref['L_STATISTICS'] : ((isset($user->lang['STATISTICS'])) ? $user->lang['STATISTICS'] : '{ STATISTICS }')); ?></h3>
		<?php if ($this->_rootref['S_USER_LOGGED_IN']) {  ?>
		<!--
		<strong><?php echo ((isset($this->_rootref['L_ST_NEW'])) ? $this->_rootref['L_ST_NEW'] : ((isset($user->lang['ST_NEW'])) ? $user->lang['ST_NEW'] : '{ ST_NEW }')); ?></strong><br />
		<?php echo ((isset($this->_rootref['L_ST_NEW_POSTS'])) ? $this->_rootref['L_ST_NEW_POSTS'] : ((isset($user->lang['ST_NEW_POSTS'])) ? $user->lang['ST_NEW_POSTS'] : '{ ST_NEW_POSTS }')); ?> <strong><?php echo (isset($this->_rootref['S_NEW_POSTS'])) ? $this->_rootref['S_NEW_POSTS'] : ''; ?></strong><br />
		<?php echo ((isset($this->_rootref['L_ST_NEW_TOPICS'])) ? $this->_rootref['L_ST_NEW_TOPICS'] : ((isset($user->lang['ST_NEW_TOPICS'])) ? $user->lang['ST_NEW_TOPICS'] : '{ ST_NEW_TOPICS }')); ?> <strong><?php echo (isset($this->_rootref['S_NEW_TOPIC'])) ? $this->_rootref['S_NEW_TOPIC'] : ''; ?></strong><br />
		<?php echo ((isset($this->_rootref['L_ST_NEW_ANNS'])) ? $this->_rootref['L_ST_NEW_ANNS'] : ((isset($user->lang['ST_NEW_ANNS'])) ? $user->lang['ST_NEW_ANNS'] : '{ ST_NEW_ANNS }')); ?> <strong><?php echo (isset($this->_rootref['S_NEW_ANN'])) ? $this->_rootref['S_NEW_ANN'] : ''; ?></strong><br />
		<?php echo ((isset($this->_rootref['L_ST_NEW_STICKYS'])) ? $this->_rootref['L_ST_NEW_STICKYS'] : ((isset($user->lang['ST_NEW_STICKYS'])) ? $user->lang['ST_NEW_STICKYS'] : '{ ST_NEW_STICKYS }')); ?> <strong><?php echo (isset($this->_rootref['S_NEW_SCT'])) ? $this->_rootref['S_NEW_SCT'] : ''; ?></strong><br /><br />
		-->
		<?php } ?>
		<strong><?php echo ((isset($this->_rootref['L_ST_TOP'])) ? $this->_rootref['L_ST_TOP'] : ((isset($user->lang['ST_TOP'])) ? $user->lang['ST_TOP'] : '{ ST_TOP }')); ?></strong><br />
		<?php echo (isset($this->_rootref['TOTAL_POSTS'])) ? $this->_rootref['TOTAL_POSTS'] : ''; ?><br />
		<?php echo (isset($this->_rootref['TOTAL_TOPICS'])) ? $this->_rootref['TOTAL_TOPICS'] : ''; ?><br />
		<?php echo ((isset($this->_rootref['L_ST_TOP_ANNS'])) ? $this->_rootref['L_ST_TOP_ANNS'] : ((isset($user->lang['ST_TOP_ANNS'])) ? $user->lang['ST_TOP_ANNS'] : '{ ST_TOP_ANNS }')); ?> <strong><?php echo (isset($this->_rootref['S_ANN'])) ? $this->_rootref['S_ANN'] : ''; ?></strong><br />
		<?php echo ((isset($this->_rootref['L_ST_TOP_STICKYS'])) ? $this->_rootref['L_ST_TOP_STICKYS'] : ((isset($user->lang['ST_TOP_STICKYS'])) ? $user->lang['ST_TOP_STICKYS'] : '{ ST_TOP_STICKYS }')); ?> <strong><?php echo (isset($this->_rootref['S_SCT'])) ? $this->_rootref['S_SCT'] : ''; ?></strong><br />
		<?php echo ((isset($this->_rootref['L_ST_TOT_ATTACH'])) ? $this->_rootref['L_ST_TOT_ATTACH'] : ((isset($user->lang['ST_TOT_ATTACH'])) ? $user->lang['ST_TOT_ATTACH'] : '{ ST_TOT_ATTACH }')); ?> <strong><?php echo (isset($this->_rootref['S_TOT_ATTACH'])) ? $this->_rootref['S_TOT_ATTACH'] : ''; ?></strong><br />
		
		<hr align="left" width="85%" />
		<?php echo (isset($this->_rootref['TOPICS_PER_DAY'])) ? $this->_rootref['TOPICS_PER_DAY'] : ''; ?><br />
		<?php echo (isset($this->_rootref['POSTS_PER_DAY'])) ? $this->_rootref['POSTS_PER_DAY'] : ''; ?><br />
		<?php echo (isset($this->_rootref['USERS_PER_DAY'])) ? $this->_rootref['USERS_PER_DAY'] : ''; ?><br />
		<?php echo (isset($this->_rootref['TOPICS_PER_USER'])) ? $this->_rootref['TOPICS_PER_USER'] : ''; ?><br />
		<?php echo (isset($this->_rootref['POSTS_PER_USER'])) ? $this->_rootref['POSTS_PER_USER'] : ''; ?><br />
		<?php echo (isset($this->_rootref['POSTS_PER_TOPIC'])) ? $this->_rootref['POSTS_PER_TOPIC'] : ''; ?><br />
		<hr align="left" width="85%" />
		
		<?php echo (isset($this->_rootref['TOTAL_USERS'])) ? $this->_rootref['TOTAL_USERS'] : ''; ?><br />
		<?php echo (isset($this->_rootref['NEWEST_USER'])) ? $this->_rootref['NEWEST_USER'] : ''; ?>
		<span class="corners-bottom"><span></span></span>
	</div>
</div>
<br style="clear:both" />