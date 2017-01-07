<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: zwar_header.php
| Author: ZEZoar
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

define("ADMIN_PANEL", true);
require_once INCLUDES."output_handling_include.php";
require_once THEME."theme.php";

if ($settings['maintenance'] == "1" && !iADMIN) { redirect(BASEDIR."maintenance.php"); }
if (iMEMBER) { $result = dbquery("UPDATE ".DB_USERS." SET user_lastvisit='".time()."', user_ip='".USER_IP."' WHERE user_id='".$userdata['user_id']."'"); }

echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>\n";
echo "<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='".$locale['xml_lang']."' lang='".$locale['xml_lang']."'>\n";
echo "<head>\n<title>".$settings['sitename']."</title>\n";
echo "<meta http-equiv='Content-Type' content='text/html; charset=".$locale['charset']."' />\n";
echo "<meta name='description' content='".$settings['description']."' />\n";
echo "<meta name='keywords' content='".$settings['keywords']."' />\n";
echo "<link rel='stylesheet' href='".THEME."styles.css' type='text/css' media='Screen' />\n";
echo "<link rel='shortcut icon' href='".IMAGES."favicon.ico' />\n";
if (function_exists("get_head_tags")) { echo get_head_tags(); }
echo "<script type='text/javascript' src='".INCLUDES."jscript.js'></script>\n";
echo "<script type='text/javascript' src='".INCLUDES."jquery.js'></script>\n";
echo "</head>\n<body>\n";

$script_url = explode("/", $_SERVER['PHP_SELF'].(FUSION_QUERY ? "?".FUSION_QUERY : ""));
$url_count = count($script_url);
$base_url_count = substr_count(BASEDIR, "/") + 1;
$start_page = "";
while ($base_url_count != 0) {
	$current = $url_count - $base_url_count;
	$start_page .= "/".$script_url[$current];
	$base_url_count--;
}

define("START_PAGE", substr($start_page, 1));

if (checkrights("ZWAR")) {
	ob_start();
	openside($locale['zwar_0028']);
	echo"<div class='side-label'><strong>&nbsp;&nbsp; zWar</strong></div>
	".THEME_BULLET."<a class='side' href='".FUSION_SELF.$aidlink."&amp;pagefile=overview'>".$locale['zwar_0029']."</a><br/>
	".THEME_BULLET."<a class='side' href='".FUSION_SELF.$aidlink."&amp;pagefile=challenge'>".$locale['zwar_0030']."</a><br/>
	".THEME_BULLET."<a class='side' href='".FUSION_SELF.$aidlink."&amp;pagefile=joinus'>".$locale['zwar_0063']."</a><br/>
	".THEME_BULLET."<a class='side' href='".FUSION_SELF.$aidlink."&amp;pagefile=settings'>".$locale['zwar_0043']."</a><br/>
	<div class='side-label'><strong>&nbsp;&nbsp;".$locale['zwar_0027']."</strong></div>
	".THEME_BULLET."<a class='side' href='".FUSION_SELF.$aidlink."&amp;pagefile=members'>".$locale['zwar_0046']."</a><br/>
	".THEME_BULLET."<a class='side' href='".FUSION_SELF.$aidlink."&amp;pagefile=memberlist'>".$locale['zwar_0044']."</a><br/>
	".THEME_BULLET."<a class='side' href='".FUSION_SELF.$aidlink."&amp;pagefile=squads'>".$locale['zwar_0045']."</a><br/>
	<div class='side-label'><strong>&nbsp;&nbsp;".$locale['zwar_0031']."</strong></div>
	".THEME_BULLET."<a class='side' href='".FUSION_SELF.$aidlink."&amp;pagefile=editwars&amp;action=add'>".$locale['zwar_0032']."</a><br/>
	".THEME_BULLET."<a class='side' href='".FUSION_SELF.$aidlink."&amp;pagefile=warlist'>".$locale['zwar_0033']."</a><br/>
	<hr class='side-hr'>
	".THEME_BULLET."<a class='side' href='".FUSION_SELF.$aidlink."&amp;pagefile=editopps'>".$locale['zwar_0034']."</a><br/>
	".THEME_BULLET."<a class='side' href='".FUSION_SELF.$aidlink."&amp;pagefile=editservers'>".$locale['zwar_0035']."</a><br/>
	<div class='side-label'><strong>&nbsp;&nbsp;".$locale['zwar_0048']."</strong></div>
	".THEME_BULLET."<a class='side' href='".FUSION_SELF.$aidlink."&amp;pagefile=editgames'>".$locale['zwar_0036']."</a><br/>
	".THEME_BULLET."<a class='side' href='".FUSION_SELF.$aidlink."&amp;pagefile=editgametypes'>".$locale['zwar_0037']."</a><br/>
	".THEME_BULLET."<a class='side' href='".FUSION_SELF.$aidlink."&amp;pagefile=editmatchtypes'>".$locale['zwar_0038']."</a><br/>
	<div class='side-label'><strong>&nbsp;&nbsp;".$locale['zwar_0039']."</strong></div>
	".THEME_BULLET."<a class='side' href='".FUSION_SELF.$aidlink."&amp;pagefile=editlocs'>".$locale['zwar_0040']."</a><br/>";
	closeside();
	require_once ADMIN."navigation.php";
	define("LEFT", ob_get_contents());
	ob_end_clean();
	$main_style = " side-left";
} else {
	define("LEFT", "");
	$main_style = "";
}
define("RIGHT", "");
define("U_CENTER", "");
define("L_CENTER", "");

ob_start();
?>