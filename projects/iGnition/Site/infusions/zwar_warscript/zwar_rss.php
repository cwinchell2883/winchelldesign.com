<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: zwar_rss.php
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
require_once "../../maincore.php";
require_once INCLUDES."output_handling_include.php";
if (file_exists(INFUSIONS."zwar_warscript/locale/".$settings['locale'].".php")) {
	include_once INFUSIONS."zwar_warscript/locale/".$settings['locale'].".php";
} else {
	include_once INFUSIONS."zwar_warscript/locale/German.php";
}
require_once INFUSIONS."zwar_warscript/zwar_functions.php";
if ($settings['maintenance'] == "1" && !iADMIN) { die("Access Denied"); }
$showlimit = 10;

if (isset($_GET['type']) && $_GET['type'] == "mine") {
	if (!iMEMBER) { die("<center>".$locale['zwar_2300']."<br/><a href='".BASEDIR."index.php'>".$locale['zwar_0054']."</a></center>"); }
header("Content-Type: text/xml");
echo "<?xml version='1.0' encoding='".$locale['charset']."'?>

<rss version='2.0'>
<channel>
  <title>".$userdata['user_name']." - ".$locale['zwar_2301']."</title>
  <link>".$settings['siteurl']."zwar.php</link>
  <description>".sprintf($locale['zwar_2302'], $showlimit)." ".$userdata['user_name']."</description>
  <language>".$locale['xml_lang']."</language>
  <copyright>Copyright - ".date("Y").", ".$settings['siteusername']."</copyright>\n";
  
$result = dbquery("SELECT * FROM (((((((".DB_ZWAR_WARS." AS zw LEFT JOIN ".DB_ZWAR_OPPONENTS." AS zop ON zw.war_opp_id=zop.opp_id) LEFT JOIN ".DB_ZWAR_SERVERS." AS zse ON zw.war_server_id=zse.server_id) LEFT JOIN ".DB_ZWAR_GAMES." AS zga ON zw.war_game_id=zga.game_id) LEFT JOIN ".DB_ZWAR_GAMETYPES." AS zgt ON zw.war_gametype_id=zgt.gametype_id) LEFT JOIN ".DB_ZWAR_MATCHTYPES." AS zmt ON zw.war_matchtype_id=zmt.matchtype_id) LEFT JOIN ".DB_USERS." AS u ON zw.war_added_by=u.user_id) LEFT JOIN ".DB_ZWAR_SQUADS." AS cmg ON zw.war_squad=cmg.group_id) WHERE zw.war_date>='".time()."' ORDER BY zw.war_date ASC LIMIT 0,$showlimit");
if (dbrows($result)) {
	while ($data = dbarray($result)) {
		$gametype = isset($data['gametype_name']) ? $data['gametype_name'] : "";
		$matchtype = isset($data['matchtype_name']) ? " (".$data['matchtype_name'].") " : "";
		$title = $data['war_squad'] ? $data['group_name'] : $zwar_settings_array['zwar_clantag']." - ".$data['game_name_short'];
		$title .= " vs ".($data['opp_name'] != "" ? $data['opp_name'] : $locale['zwar_2305']);
  echo "<item>
    <title>".date("d M Y", $data['war_date'])." - ".$title."</title>
    <link>".$settings['siteurl']."zwar.php?page=war_details&amp;warid=".$data['war_id']."</link>
    <description>&lt;b&gt;".$locale['zwar_0014']."&lt;/b&gt; ".date("H:i:s", $data['war_date'])."&lt;br /&gt;&lt;b&gt;".$locale['zwar_2303'].":&lt;/b&gt; ".$gametype.$matchtype."&lt;br /&gt;&lt;b&gt;".$locale['zwar_2304'].":&lt;/b&gt; ".($data['war_info']!= "" ? $data['war_info'] : "-----")."</description>
    <pubDate>".date("D, d M Y H:i:s T", $data['war_date_add'])."</pubDate>
    <guid>".$data['war_id']."</guid>
  </item>";
	}
}

echo "</channel>
</rss>";
} else {
header("Content-Type: text/xml");
echo "<?xml version='1.0' encoding='".$locale['charset']."'?>

<rss version='2.0'>
<channel>
  <title>".$zwar_settings_array['zwar_clantag']." - ".$locale['zwar_2301']."</title>
  <link>".$settings['siteurl']."zwar.php</link>
  <description>".sprintf($locale['zwar_2302'], $showlimit)." ".$zwar_settings_array['zwar_clantag']."</description>
  <language>".$locale['xml_lang']."</language>
  <copyright>Copyright - ".date("Y").", ".$settings['siteusername']."</copyright>\n";
  
$result = dbquery("SELECT * FROM (((((((".DB_ZWAR_WARS." AS zw LEFT JOIN ".DB_ZWAR_OPPONENTS." AS zop ON zw.war_opp_id=zop.opp_id) LEFT JOIN ".DB_ZWAR_SERVERS." AS zse ON zw.war_server_id=zse.server_id) LEFT JOIN ".DB_ZWAR_GAMES." AS zga ON zw.war_game_id=zga.game_id) LEFT JOIN ".DB_ZWAR_GAMETYPES." AS zgt ON zw.war_gametype_id=zgt.gametype_id) LEFT JOIN ".DB_ZWAR_MATCHTYPES." AS zmt ON zw.war_matchtype_id=zmt.matchtype_id) LEFT JOIN ".DB_USERS." AS u ON zw.war_added_by=u.user_id) LEFT JOIN ".DB_ZWAR_SQUADS." AS cmg ON zw.war_squad=cmg.group_id) WHERE zw.war_date>='".time()."' ORDER BY zw.war_date ASC LIMIT 0,$showlimit");
if (dbrows($result)) {
	while ($data = dbarray($result)) {
		$gametype = isset($data['gametype_name']) ? $data['gametype_name'] : "";
		$matchtype = isset($data['matchtype_name']) ? " (".$data['matchtype_name'].") " : "";
		$title = $data['war_squad'] ? $data['group_name'] : $zwar_settings_array['zwar_clantag']." - ".$data['game_name_short'];
		$title .= " vs ".($data['opp_name'] != "" ? $data['opp_name'] : $locale['zwar_2305']);
  echo "<item>
    <title>".date("d M Y", $data['war_date'])." - ".$title."</title>
    <link>".$settings['siteurl']."zwar.php?page=war_details&amp;warid=".$data['war_id']."</link>
    <description>&lt;b&gt;".$locale['zwar_0014']."&lt;/b&gt; ".date("H:i:s", $data['war_date'])."&lt;br /&gt;&lt;b&gt;".$locale['zwar_2303'].":&lt;/b&gt; ".$gametype.$matchtype."&lt;br /&gt;&lt;b&gt;".$locale['zwar_2304'].":&lt;/b&gt; ".($data['war_info']!= "" ? $data['war_info'] : "-----")."</description>
    <pubDate>".date("D, d M Y H:i:s T", $data['war_date_add'])."</pubDate>
    <guid>".$data['war_id']."</guid>
  </item>";
	}
}

echo "</channel>
</rss>";
}
if (iADMIN) {
	$result = dbquery("DELETE FROM ".DB_FLOOD_CONTROL." WHERE flood_timestamp < '".(time()-360)."'");
	$result = dbquery("DELETE FROM ".DB_THREAD_NOTIFY." WHERE notify_datestamp < '".(time()-1209600)."'");
	$result = dbquery("DELETE FROM ".DB_CAPTCHA." WHERE captcha_datestamp < '".(time()-360)."'");
	$result = dbquery("DELETE FROM ".DB_NEW_USERS." WHERE user_datestamp < '".(time()-86400)."'");
}
mysql_close();
?>