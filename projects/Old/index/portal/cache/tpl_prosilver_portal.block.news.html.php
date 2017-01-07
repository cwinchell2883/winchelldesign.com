<!-- $Id: news.html,v 1.1 2008/02/09 08:18:16 angelside Exp $ //-->

<h3><?php echo ((isset($this->_rootref['L_LATEST_NEWS'])) ? $this->_rootref['L_LATEST_NEWS'] : ((isset($user->lang['LATEST_NEWS'])) ? $user->lang['LATEST_NEWS'] : '{ LATEST_NEWS }')); ?></h3>

<?php $_news_row_count = (isset($this->_tpldata['news_row'])) ? sizeof($this->_tpldata['news_row']) : 0;if ($_news_row_count) {for ($_news_row_i = 0; $_news_row_i < $_news_row_count; ++$_news_row_i){$_news_row_val = &$this->_tpldata['news_row'][$_news_row_i]; if ($_news_row_val['S_NO_TOPICS']) {  ?>
	<center><span class="gensmall"><strong><?php echo ((isset($this->_rootref['L_NO_NEWS'])) ? $this->_rootref['L_NO_NEWS'] : ((isset($user->lang['NO_NEWS'])) ? $user->lang['NO_NEWS'] : '{ NO_NEWS }')); ?></strong></span></center>
<?php } else { ?>
<div class="post bg2">
	<div class="inner"><span class="corners-top"><span></span></span>
	<div class="postbody postbody_portal">
		<h4 class="first"><?php echo $_news_row_val['ATTACH_ICON_IMG']; if ($_news_row_val['S_POLL']) {  ?> <strong><?php echo ((isset($this->_rootref['L_POLL'])) ? $this->_rootref['L_POLL'] : ((isset($user->lang['POLL'])) ? $user->lang['POLL'] : '{ POLL }')); ?>: </strong><?php } ?><a href="<?php echo $_news_row_val['U_VIEW_COMMENTS']; ?>"><strong><?php echo $_news_row_val['TITLE']; ?></strong></a></h4>
		<ul class="linklist">
			<li><?php echo ((isset($this->_rootref['L_POSTED_BY'])) ? $this->_rootref['L_POSTED_BY'] : ((isset($user->lang['POSTED_BY'])) ? $user->lang['POSTED_BY'] : '{ POSTED_BY }')); ?>: <strong><a href="<?php echo $_news_row_val['U_USER_PROFILE']; ?>"><?php echo $_news_row_val['POSTER']; ?></a></strong></li>
			<li class="rightside"><?php echo $_news_row_val['TIME']; ?></li>
		</ul>		
		<br />
		<div class="content"><?php echo $_news_row_val['TEXT']; ?></div><br />		
		<span style="float: left;"><?php echo ((isset($this->_rootref['L_TOPIC_VIEWS'])) ? $this->_rootref['L_TOPIC_VIEWS'] : ((isset($user->lang['TOPIC_VIEWS'])) ? $user->lang['TOPIC_VIEWS'] : '{ TOPIC_VIEWS }')); ?>: <?php echo $_news_row_val['TOPIC_VIEWS']; ?> &nbsp;&bull;&nbsp; <a href="<?php echo $_news_row_val['U_VIEW_COMMENTS']; ?>" title="<?php echo ((isset($this->_rootref['L_VIEW_COMMENTS'])) ? $this->_rootref['L_VIEW_COMMENTS'] : ((isset($user->lang['VIEW_COMMENTS'])) ? $user->lang['VIEW_COMMENTS'] : '{ VIEW_COMMENTS }')); ?>"><?php echo ((isset($this->_rootref['L_COMMENTS'])) ? $this->_rootref['L_COMMENTS'] : ((isset($user->lang['COMMENTS'])) ? $user->lang['COMMENTS'] : '{ COMMENTS }')); ?>: <?php echo $_news_row_val['REPLIES']; ?></a> &nbsp;&bull;&nbsp; <a href="<?php echo $_news_row_val['U_POST_COMMENT']; ?>"><?php echo ((isset($this->_rootref['L_POST_REPLY'])) ? $this->_rootref['L_POST_REPLY'] : ((isset($user->lang['POST_REPLY'])) ? $user->lang['POST_REPLY'] : '{ POST_REPLY }')); ?></a></span>
		<span style="float: right;"><?php echo $_news_row_val['OPEN']; ?><a href="<?php echo $_news_row_val['U_READ_FULL']; ?>"><?php echo $_news_row_val['L_READ_FULL']; ?></a><?php echo $_news_row_val['CLOSE']; ?></span>
	</div>
	<div class="back2top"><a href="#wrap" class="top" title="<?php echo ((isset($this->_rootref['L_BACK_TO_TOP'])) ? $this->_rootref['L_BACK_TO_TOP'] : ((isset($user->lang['BACK_TO_TOP'])) ? $user->lang['BACK_TO_TOP'] : '{ BACK_TO_TOP }')); ?>"><?php echo ((isset($this->_rootref['L_BACK_TO_TOP'])) ? $this->_rootref['L_BACK_TO_TOP'] : ((isset($user->lang['BACK_TO_TOP'])) ? $user->lang['BACK_TO_TOP'] : '{ BACK_TO_TOP }')); ?></a></div>
	<span class="corners-bottom"><span></span></span></div>
</div>

<hr class="divider" />
<?php } if ($_news_row_val['S_NOT_LAST']) {  ?><!--<br />--><?php } }} ?>