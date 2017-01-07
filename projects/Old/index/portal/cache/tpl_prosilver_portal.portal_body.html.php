<?php $this->_tpldata['DEFINE']['.']['S_IN_PORTAL'] = 1; $this->_tpl_include('overall_header.html'); ?><!-- $Id: portal_body.html,v 1.1 2008/02/09 08:18:16 angelside Exp $ //-->
<style type="text/css">
<!--
.topiclist dd.posts_portal {
	float:left;
	text-align:left;
	font-size: 1.1em;
	padding:6px 5px 6px 5px;
}

ul.topiclist dt {
	float:left;
	width: 90%;
	font-size: 1em;
}

.gensmall {
	margin: 1px 1px;
	font-size: 10px;
}

small, .small {
	font-size:10px; 
	font-weight:bold;
	font-family:Arial, Helvetica, sans-serif;
}

/* Container for sub-navigation list */
#navigation {
	padding-top: 0px;
	font-size: 1.1em;
}

/* Link styles for the sub-section links */
#navigation a {
	color: #105289;
	font-weight: normal;
	padding: 2px;
	background: #ecf1f3 none repeat-y 100% 0;
}

#navigation a:hover {
	background-color: #F9F9F9;
	color: #d31141;
}

/* News listing */
ul.news {
	border-top: 1px solid #FFFFFF;
	list-style: none;
	margin-left: 0;
}
ul.news li {
	padding: 5px 0 4px 0;
	border-bottom: 1px solid #CCCCCC;
}
ul.news li.last {
	border-bottom: none;
}
ul.news {
	border-top: none;
}
ul.news li {
	padding: 0 0 4px 0;
	margin-bottom: 5px;
	margin-left: 0;
	border-bottom-color: #E0E0E0;
}

.postbody_portal {
	width: 100%;
}
//-->
</style>

<table cellpadding="0" cellspacing="0" border="0" width="100%" align="center">
<tr>
<!-- [+] left block area -->
	<td width="<?php echo (isset($this->_rootref['PORTAL_LEFT_COLLUMN'])) ? $this->_rootref['PORTAL_LEFT_COLLUMN'] : ''; ?>" valign="top" style="padding-right:6px;">
	
		<?php $this->_tpl_include('portal/block/main_menu.html'); if ($this->_rootref['S_DISPLAY_SEARCH']) {  $this->_tpl_include('portal/block/search.html'); } if ($this->_rootref['S_ADS_SMALL']) {  $this->_tpl_include('portal/block/ads_small.html'); } if ($this->_rootref['S_DISPLAY_CHANGE_STYLE']) {  $this->_tpl_include('portal/block/change_style.html'); } if ($this->_rootref['S_DISPLAY_PAY_S']) {  $this->_tpl_include('portal/block/donation/donation_small.html'); } if ($this->_rootref['S_DISPLAY_LATEST_MEMBERS']) {  $this->_tpl_include('portal/block/latest_members.html'); } if ($this->_rootref['S_DISPLAY_TOP_POSTERS']) {  $this->_tpl_include('portal/block/top_poster.html'); } if ($this->_rootref['S_DISPLAY_RANDOM_MEMBER']) {  $this->_tpl_include('portal/block/random_member.html'); } if ($this->_rootref['S_DISPLAY_CLOCK']) {  $this->_tpl_include('portal/block/clock.html'); } if ($this->_rootref['S_DISPLAY_MINICAL']) {  $this->_tpl_include('portal/block/mini_calendar.html'); } if ($this->_rootref['S_DISPLAY_LINK_US']) {  $this->_tpl_include('portal/block/link_us.html'); } if ($this->_rootref['S_DISPLAY_LINKS']) {  $this->_tpl_include('portal/block/links.html'); } if ($this->_rootref['S_DISPLAY_LAST_BOTS'] && $this->_rootref['S_LAST_VISITED_BOTS']) {  $this->_tpl_include('portal/block/latest_bots.html'); } if ($this->_rootref['S_DISPLAY_BIRTHDAY_LIST'] && $this->_rootref['BIRTHDAY_LIST']) {  $this->_tpl_include('portal/block/birthday_list.html'); } ?>

	</td>
<!-- [-] left block area -->
	<td width="4" valign="top"></td>

<!-- [+] center block area -->
	<td valign="top">

		<?php if ($this->_rootref['S_DISPLAY_WELCOME']) {  $this->_tpl_include('portal/block/welcome.html'); } if ($this->_rootref['S_ADS_CENTER']) {  $this->_tpl_include('portal/block/ads_center.html'); } if ($this->_rootref['S_DISPLAY_PAY_C']) {  $this->_tpl_include('portal/block/donation/donation.html'); } if ($this->_rootref['S_DISPLAY_RECENT']) {  $this->_tpl_include('portal/block/recent.html'); } if ($this->_rootref['S_DISPLAY_POLL']) {  $this->_tpl_include('portal/block/poll.html'); } if ($this->_rootref['S_DISPLAY_ANNOUNCEMENTS']) {  if ($this->_rootref['S_ANNOUNCE_COMPACT']) {  $this->_tpl_include('portal/block/announcements_compact.html'); } else { $this->_tpl_include('portal/block/announcements.html'); } } if ($this->_rootref['S_DISPLAY_NEWS']) {  if ($this->_rootref['S_NEWS_COMPACT']) {  $this->_tpl_include('portal/block/news_compact.html'); } else { $this->_tpl_include('portal/block/news.html'); } } if ($this->_rootref['S_DISPLAY_WORDGRAPH']) {  $this->_tpl_include('portal/block/wordgraph.html'); } if ($this->_rootref['S_DISPLAY_JUMPBOX']) {  $this->_tpl_include('portal/block/jumpbox.html'); } ?>	

	</td>
<!-- [-] center block area -->
	<td width="4" valign="top"></td>

<!-- [+] right block area -->
	<td width="<?php echo (isset($this->_rootref['PORTAL_RIGHT_COLLUMN'])) ? $this->_rootref['PORTAL_RIGHT_COLLUMN'] : ''; ?>" valign="top" style="padding-left:6px;">
	
	<!--// [+] latest files => only for site version
		<div class="panel">
			<div class="inner">
				<span class="corners-top"><span></span></span>
					<h3>Latest Files</h3>
					<span style="font-weight: bold">Latest version:</span> 1.1.0b<br />
					<span style="font-weight: bold">Released:</span> 2007-08-01<br /><br />
					<span style="font-weight: bold">Download:</span><br /> 
					<a href="http://www.phpbb3portal.com/viewtopic.php?f=4&t=9">phpbb3-portal.110b.tar.gz</a><br /><br />
					<span style="font-weight: bold">Development:</span><br /> 
					<a href="http://www.phppbb3ortal.com">phpbb3portal.com</a><br />
					<a href="http://sourceforge.net/projects/canverportal/" rel="nofollow">SourceForge Project</a>
				<span class="corners-bottom"><span></span></span>
			</div>
		</div>
		<br clear="all" />
[-] latest files => only for site version //-->

		<?php if (! $this->_rootref['S_USER_LOGGED_IN']) {  $this->_tpl_include('portal/block/login_box.html'); } if ($this->_rootref['S_USER_LOGGED_IN']) {  $this->_tpl_include('portal/block/user_menu.html'); } if ($this->_rootref['S_DISPLAY_FRIENDS'] && $this->_rootref['S_ZEBRA_ENABLED'] && $this->_rootref['S_USER_LOGGED_IN']) {  $this->_tpl_include('portal/block/online_friends.html'); } if ($this->_rootref['S_DISPLAY_ADVANCED_STAT']) {  $this->_tpl_include('portal/block/statistics.html'); } if ($this->_rootref['S_DISPLAY_ONLINE_LIST']) {  $this->_tpl_include('portal/block/whois_online.html'); } if ($this->_rootref['S_DISPLAY_LEADERS']) {  $this->_tpl_include('portal/block/leaders.html'); } if (! $this->_rootref['S_IS_BOT'] && $this->_rootref['S_USER_LOGGED_IN'] && $this->_rootref['S_DISPLAY_ATTACHMENTS']) {  $this->_tpl_include('portal/block/attachments.html'); } if ($this->_rootref['S_DISPLAY_ACTIVE_TOPIC']) {  ?>
		<!--INCLUDE portal/block/active.html-->
		<?php } ?>
		
		<!--INCLUDE portal/block/_sample_block_design.html-->

	</td>
<!-- [-] right block area -->
</tr>
</table>
<!--// phpBB3 Portal by Sevdin Filiz, www.phpbb3portal.com //-->
<?php $this->_tpl_include('overall_footer.html'); ?>