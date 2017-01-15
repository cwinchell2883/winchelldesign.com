<!-- $Id: birthday_list.html,v 1.1 2008/02/09 08:18:15 angelside Exp $ //-->
<div class="panel">
	<div class="inner">
		<span class="corners-top"><span></span></span>
			<h3><?php echo ((isset($this->_rootref['L_BIRTHDAYS'])) ? $this->_rootref['L_BIRTHDAYS'] : ((isset($user->lang['BIRTHDAYS'])) ? $user->lang['BIRTHDAYS'] : '{ BIRTHDAYS }')); ?></h3>
			<?php if ($this->_rootref['BIRTHDAY_LIST']) {  ?>
			<?php echo ((isset($this->_rootref['L_CONGRATULATIONS'])) ? $this->_rootref['L_CONGRATULATIONS'] : ((isset($user->lang['CONGRATULATIONS'])) ? $user->lang['CONGRATULATIONS'] : '{ CONGRATULATIONS }')); ?>: <?php echo (isset($this->_rootref['BIRTHDAY_LIST'])) ? $this->_rootref['BIRTHDAY_LIST'] : ''; ?>
			<?php } else { ?>
			<?php echo ((isset($this->_rootref['L_NO_BIRTHDAYS'])) ? $this->_rootref['L_NO_BIRTHDAYS'] : ((isset($user->lang['NO_BIRTHDAYS'])) ? $user->lang['NO_BIRTHDAYS'] : '{ NO_BIRTHDAYS }')); ?>
			<?php } ?>
		<span class="corners-bottom"><span></span></span>
	</div>
</div>
<br style="clear:both" />