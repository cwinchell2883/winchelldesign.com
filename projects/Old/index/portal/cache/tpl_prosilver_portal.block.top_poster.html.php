<!-- $Id: top_poster.html,v 1.1 2008/02/09 08:18:16 angelside Exp $ //-->
<div class="panel">
	<div class="inner">
		<span class="corners-top"><span></span></span>
			<h3><?php echo ((isset($this->_rootref['L_TOP_POSTER'])) ? $this->_rootref['L_TOP_POSTER'] : ((isset($user->lang['TOP_POSTER'])) ? $user->lang['TOP_POSTER'] : '{ TOP_POSTER }')); ?></h3>
			<span style="float:left;"><strong><?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?></strong></span>
			<span style="float:right;padding-right:10px;"><strong><?php echo ((isset($this->_rootref['L_POSTS'])) ? $this->_rootref['L_POSTS'] : ((isset($user->lang['POSTS'])) ? $user->lang['POSTS'] : '{ POSTS }')); ?></strong></span><br />
			<?php $_top_poster_count = (isset($this->_tpldata['top_poster'])) ? sizeof($this->_tpldata['top_poster']) : 0;if ($_top_poster_count) {for ($_top_poster_i = 0; $_top_poster_i < $_top_poster_count; ++$_top_poster_i){$_top_poster_val = &$this->_tpldata['top_poster'][$_top_poster_i]; ?>
			<span style="float:left;"><img src="portal/images/member.gif" height="15" width="15" /> <a href="<?php echo $_top_poster_val['U_USERNAME']; ?>"><span<?php if ($_top_poster_val['USERNAME_COLOR']) {  echo $_top_poster_val['USERNAME_COLOR']; } ?>><?php echo $_top_poster_val['USERNAME']; ?></span></a></span>
			<span style="float:right;padding-right:10px;"><a href="<?php echo $_top_poster_val['S_SEARCH_ACTION']; ?>"><?php echo $_top_poster_val['POSTER_POSTS']; ?></a></span><br style="clear:both" />
			<?php }} ?>		
		<span class="corners-bottom"><span></span></span>
	</div>
</div>
<br style="clear:both" />