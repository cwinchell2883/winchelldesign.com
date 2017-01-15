<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: infusion_db.php
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

if (!defined("DB_ZWAR_WARS")) {
	define("DB_ZWAR_WARS", DB_PREFIX."zwar_wars");
}
if (!defined("DB_ZWAR_PARTS")) {
	define("DB_ZWAR_PARTS", DB_PREFIX."zwar_parts");
}
if (!defined("DB_ZWAR_SETTINGS")) {
	define("DB_ZWAR_SETTINGS", DB_PREFIX."zwar_settings");
}
if (!defined("DB_ZWAR_CHALLENGES")) {
	define("DB_ZWAR_CHALLENGES", DB_PREFIX."zwar_challenges");
}
if (!defined("DB_ZWAR_GAMES")) {
	define("DB_ZWAR_GAMES", DB_PREFIX."zwar_games");
}
if (!defined("DB_ZWAR_GAMETYPES")) {
	define("DB_ZWAR_GAMETYPES", DB_PREFIX."zwar_gametypes");
}
if (!defined("DB_ZWAR_MATCHTYPES")) {
	define("DB_ZWAR_MATCHTYPES", DB_PREFIX."zwar_matchtypes");
}
if (!defined("DB_ZWAR_LOCS")) {
	define("DB_ZWAR_LOCS", DB_PREFIX."zwar_locs");
}
if (!defined("DB_ZWAR_SCORES")) {
	define("DB_ZWAR_SCORES", DB_PREFIX."zwar_scores");
}
if (!defined("DB_ZWAR_OPPONENTS")) {
	define("DB_ZWAR_OPPONENTS", DB_PREFIX."zwar_opponents");
}
if (!defined("DB_ZWAR_SERVERS")) {
	define("DB_ZWAR_SERVERS", DB_PREFIX."zwar_servers");
}
if (!defined("DB_ZWAR_SQUADS")) {
	define("DB_ZWAR_SQUADS", DB_PREFIX."zwar_squads");
}
if (!defined("DB_ZWAR_SQUADS_PLAYERS")) {
	define("DB_ZWAR_SQUADS_PLAYERS", DB_PREFIX."zwar_squads_players");
}
if (!defined("DB_ZWAR_MEMBER_LIST")) {
	define("DB_ZWAR_MEMBER_LIST", DB_PREFIX."zwar_member_list");
}
if (!defined("DB_ZWAR_JOINUS")) {
	define("DB_ZWAR_JOINUS", DB_PREFIX."zwar_joinus");
}
if (!defined("DB_ZWAR_MATCH_UPLOADS")) {
	define("DB_ZWAR_MATCH_UPLOADS", DB_PREFIX."zwar_match_uploads");
}

$zwsresult = dbquery("SHOW TABLES LIKE '".DB_ZWAR_SETTINGS."'");
if (dbrows($zwsresult)) {
	$zwsresult2 = dbquery("SELECT * FROM ".DB_ZWAR_SETTINGS);
	$zwar_settings_array = dbarray($zwsresult2);
}
?>