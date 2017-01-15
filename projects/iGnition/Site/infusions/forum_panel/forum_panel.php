<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2010 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: forum_panel.php
| Author: Nick Jones (Digitanium)
| Ajax Forum Panel by Fangree Productions 
| Developers: Fangree_Craig, Barspin,  Dallas & SiteMaster
| Support: http://www.fangree.co.uk
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/
if (!defined("IN_FUSION")) { die("Access Denied"); }

if (file_exists(INFUSIONS."forum_panel/locale/".$settings['locale'].".php")) {
	include INFUSIONS."forum_panel/locale/".$settings['locale'].".php";
} else {
	include INFUSIONS."forum_panel/locale/English.php";
}
add_to_head("<script src='".INFUSIONS."forum_panel/inc/ui.core.js' type='text/javascript'></script>\n");
add_to_head("<script src='".INFUSIONS."forum_panel/inc/ui.tabs.js' type='text/javascript'></script>\n");
add_to_head("<script type='text/javascript'>
	$(function() {
		$('#ajax-tabs > ul').tabs();
	});
</script>\n");
add_to_head("<link rel='stylesheet' href='".INFUSIONS."forum_panel/inc/ui.tabs.css' type='text/css' media='print, projection, screen' />\n");

opentable($locale['fp100']);
echo "<div id='ajax-tabs'>\n";
echo "	<ul>\n";
echo "		<li><a href='".INFUSIONS."forum_panel/tabs/last_active.php' title='".$locale['fp101']."'><span>".$locale['fp101']."</span></a></li>\n";
echo "		<li><a href='".INFUSIONS."forum_panel/tabs/unanswered.php' title='".$locale['fp102']."'><span>".$locale['fp102']."</span></a></li>\n";
echo "		<li><a href='".INFUSIONS."forum_panel/tabs/sticky.php' title='".$locale['fp103']."'><span>".$locale['fp103']."</span></a></li>\n";
echo "	</ul>\n";
echo "</div>\n";

if (iMEMBER) {
	echo "<div class='tbl1' style='text-align:center'><a href='".INFUSIONS."forum_panel/my_threads.php'>".$locale['global_041']."</a> ::\n";
	echo "<a href='".INFUSIONS."forum_panel/my_posts.php'>".$locale['global_042']."</a> ::\n";
	echo "<a href='".INFUSIONS."forum_panel/new_posts.php'>".$locale['global_043']."</a>";
	
	if($settings['thread_notify']) {
		echo " ::\n<a href='".INFUSIONS."forum_panel/my_tracked_threads.php'>".$locale['global_056']."</a>";
	}
	echo "</div>\n";
}
closetable();
?>