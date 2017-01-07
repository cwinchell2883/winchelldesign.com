<!-- $Id: link_us.html,v 1.1 2008/02/09 08:18:15 angelside Exp $ //-->
<div class="panel">
	<div class="inner">
		<span class="corners-top"><span></span></span>
			<h3><?php echo ((isset($this->_rootref['L_LINK_US'])) ? $this->_rootref['L_LINK_US'] : ((isset($user->lang['LINK_US'])) ? $user->lang['LINK_US'] : '{ LINK_US }')); ?></h3>
			<?php echo (isset($this->_rootref['LINK_US_TXT'])) ? $this->_rootref['LINK_US_TXT'] : ''; ?><br /><br />
			<input type="text" tabindex="1" size="28" value="<?php echo (isset($this->_rootref['U_LINK_US'])) ? $this->_rootref['U_LINK_US'] : ''; ?>" class="inputbox autowidth" /><br /> 
		<span class="corners-bottom"><span></span></span>
	</div>
</div>
<br style="clear:both" />