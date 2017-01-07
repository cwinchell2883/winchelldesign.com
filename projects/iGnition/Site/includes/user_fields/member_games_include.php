<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: member_games_include.php
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

if (file_exists(INFUSIONS."zwar_warscript/locale/".$settings['locale'].".php")) {
	include_once INFUSIONS."zwar_warscript/locale/".$settings['locale'].".php";
} else {
	include_once INFUSIONS."zwar_warscript/locale/German.php";
}

if ($profile_method == "input") {
	if (!defined("DB_ZWAR_GAMES")) {
		define("DB_ZWAR_GAMES", DB_PREFIX."zwar_games");
	}
	$gameresult=dbquery("SELECT game_id, game_name FROM ".DB_ZWAR_GAMES." ORDER BY game_name");
	$gameboxes="";
	if (dbrows($gameresult)) {
		while ($gamedata=dbarray($gameresult)) {
			$checked=(isset($user_data) && preg_match("(^".$gamedata['game_id']."$|^".$gamedata['game_id']."\.|\.".$gamedata['game_id']."\.|\.".$gamedata['game_id']."$)", $user_data['member_games']) ? "checked" : "");
			$gameboxes.="<input type='checkbox' name='membergames_array[]' value='".$gamedata['game_id']."' $checked>".$gamedata['game_name']."<br>";
		}
	}
	echo "<tr>\n";
	echo "<td class='tbl' valign='top'>".$locale['zwar_4001'].":</td>\n";
	echo "<td class='tbl'>$gameboxes</td>\n";
	echo "</tr>\n";
} elseif ($profile_method == "display" && $user_data['member_games'] != "") {
	require_once INFUSIONS."zwar_warscript/zwar_functions.php";
	echo "<tr>\n";
	echo "<td width='1%' class='tbl1' style='white-space:nowrap' valign='top'>".$locale['zwar_4001']."</td>\n";
	echo "<td align='right' class='tbl1'>".display_zwar_games($user_data['member_games'], true, false)."</td>\n";
	echo "</tr>\n";
} elseif ($profile_method == "validate_insert") {
	$membergames_array = isset($_POST['membergames_array']) ? implode('.',$_POST['membergames_array']) : "";
	if (preg_match("/^[0-9\.]+$/i", $membergames_array)) {
		$db_fields .= ", member_games";
		$db_values .= ", '".$membergames_array."'";
	}
} elseif ($profile_method == "validate_update") {
	$membergames_array = isset($_POST['membergames_array']) ? implode('.',$_POST['membergames_array']) : "";
	if (!preg_match("/^[0-9\.]+$/i", $membergames_array)) { $membergames_array = ""; }
	$db_values .= ", member_games='".$membergames_array."'";
}
?>