<!-- $Id: links.html,v 1.1 2008/02/09 08:18:15 angelside Exp $ //-->
<style type="text/css">
<!--
.ul-link {
	list-style: none;
	margin: 0px 0px 0px 0;
	padding: 0px 0px 0 0px;
}
.ul-link li{
	margin: 0;
	padding: 0 0 2px 15px;
	background: url(portal/images/link.png) no-repeat left center;
}
.ul-link a {
	padding: 0 0 0 4px;
}
//-->
</style>

<div class="panel">
	<div class="inner">
		<span class="corners-top"><span></span></span>
			<h3><?php echo ((isset($this->_rootref['L_LINKS'])) ? $this->_rootref['L_LINKS'] : ((isset($user->lang['LINKS'])) ? $user->lang['LINKS'] : '{ LINKS }')); ?></h3>
			<ul class="ul-link">
				<li><a href="http://www.phpbb3portal.com" title="phpBB3 Portal" onclick="this.target='_blank'">phpBB3 Portal</a></li>
				<li><a href="http://www.phpbbturkiye.net" title="phpBB Türkiye" onclick="this.target='_blank'">phpBB</a> Türkiye</li>
				<li><a href="http://www.phpbb3seo.com" title="phpBB3 seo" onclick="this.target='_blank'">phpBB3 seo</a></li>
				<li><a href="http://www.canversoft.net" title="phpbb forum kurulum, güncelleme, seo, güvenlik, destek ve web hizmetleri" onclick="this.target='_blank'">Canver Software</a></li>
				<li><a href="http://www.virtualtuning.org" title="Virtual Tuning" onclick="this.target='_blank'">Virtual Tuning</a></li>
			</ul>
		<span class="corners-bottom"><span></span></span>
	</div>
</div>
<br style="clear:both" />