<!-- $Id: ads_center.html,v 1.1 2008/02/09 08:18:15 angelside Exp $ //-->
<div class="panel">
	<div class="inner">
		<span class="corners-top"><span></span></span>
			<h3><?php echo ((isset($this->_rootref['L_SPONSOR'])) ? $this->_rootref['L_SPONSOR'] : ((isset($user->lang['SPONSOR'])) ? $user->lang['SPONSOR'] : '{ SPONSOR }')); ?></h3>
			<div align="center">
				<?php echo (isset($this->_rootref['ADS_CENTER_BOX'])) ? $this->_rootref['ADS_CENTER_BOX'] : ''; ?>	
			</div>
			<br />
		<span class="corners-bottom"><span></span></span>
	</div>
</div>
<br style="clear:both" />