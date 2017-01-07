<!-- $Id: donation_small.html,v 1.1 2008/02/09 08:18:16 angelside Exp $ //-->
<div class="panel">
	<div class="inner">
		<span class="corners-top"><span></span></span>
			<h3><?php echo ((isset($this->_rootref['L_DONATION'])) ? $this->_rootref['L_DONATION'] : ((isset($user->lang['DONATION'])) ? $user->lang['DONATION'] : '{ DONATION }')); ?></h3>
			<?php $this->_tpl_include('portal/block/donation/paypal.html'); ?>
		<span class="corners-bottom"><span></span></span>
	</div>
</div>
<br style="clear:both" />