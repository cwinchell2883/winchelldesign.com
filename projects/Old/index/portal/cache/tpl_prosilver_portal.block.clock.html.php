<!-- $Id: clock.html,v 1.1 2008/02/09 08:18:15 angelside Exp $ //-->
<div class="panel">
	<div class="inner">
		<span class="corners-top"><span></span></span>
			<h3><?php echo ((isset($this->_rootref['L_CLOCK'])) ? $this->_rootref['L_CLOCK'] : ((isset($user->lang['CLOCK'])) ? $user->lang['CLOCK'] : '{ CLOCK }')); ?></h3>
			<div align="center">
				<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" height="70" width="170">
				<param name="wmode" value="transparent">
				<param name="movie" value="portal/images/clock.swf">
				<param name="quality" value="high">
				<embed src="portal/images/clock.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" height="70" width="170" wmode="transparent"></object>
			</div>
			<br />
		<span class="corners-bottom"><span></span></span>
	</div>
</div>
<br style="clear:both" />