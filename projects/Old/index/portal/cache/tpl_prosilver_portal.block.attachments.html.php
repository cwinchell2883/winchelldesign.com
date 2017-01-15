<!-- $Id: attachments.html,v 1.1 2008/02/09 08:18:15 angelside Exp $ //-->
<div class="panel">
	<div class="inner">
		<span class="corners-top"><span></span></span>
			<h3><?php echo ((isset($this->_rootref['L_ATTACHMENTS'])) ? $this->_rootref['L_ATTACHMENTS'] : ((isset($user->lang['ATTACHMENTS'])) ? $user->lang['ATTACHMENTS'] : '{ ATTACHMENTS }')); ?></h3>
			
			<span style="float:left;"><strong><?php echo ((isset($this->_rootref['L_FILENAME'])) ? $this->_rootref['L_FILENAME'] : ((isset($user->lang['FILENAME'])) ? $user->lang['FILENAME'] : '{ FILENAME }')); ?></strong></span> 
			<span style="float:right;padding-right:10px;"><strong><?php echo ((isset($this->_rootref['L_FILESIZE'])) ? $this->_rootref['L_FILESIZE'] : ((isset($user->lang['FILESIZE'])) ? $user->lang['FILESIZE'] : '{ FILESIZE }')); ?></strong></span><br />
            <?php $_attach_count = (isset($this->_tpldata['attach'])) ? sizeof($this->_tpldata['attach']) : 0;if ($_attach_count) {for ($_attach_i = 0; $_attach_i < $_attach_count; ++$_attach_i){$_attach_val = &$this->_tpldata['attach'][$_attach_i]; ?>
            <span style="float:left;" class="gensmall"><img src="portal/images/icon_topic_attach.gif" /><a href="<?php echo $_attach_val['U_FILE']; ?>" target="_blank"><?php echo $_attach_val['REAL_FILENAME']; ?></a></span> 
			<span style="float:right;padding-right:10px;" class="gensmall"><?php echo $_attach_val['FILESIZE']; ?></span><br style="clear:both" />
            <?php }} ?>

		<span class="corners-bottom"><span></span></span>
	</div>
</div>
<br style="clear:both" />