<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: member_realname_include.php
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
	echo "<tr>\n";
	echo "<td class='tbl'>".$locale['zwar_4041'].":</td>\n";
	echo "<td class='tbl'><input type='text' name='member_realname' value='".(isset($user_data['member_realname']) ? $user_data['member_realname'] : "")."' maxlength='100' class='textbox' style='width:200px;' /></td>\n";
	echo "</tr>\n";
} elseif ($profile_method == "display" && $user_data['member_realname'] != "") {
	echo "<tr>\n";
	echo "<td width='1%' class='tbl1' style='white-space:nowrap' valign='top'>".$locale['zwar_4041']."</td>\n";
	echo "<td align='right' class='tbl1'>".$user_data['member_realname']."</td>\n";
	echo "</tr>\n";
} elseif ($profile_method == "validate_insert") {
	$db_fields .= ", member_realname";
	$db_values .= ", '".(isset($_POST['member_realname']) ? stripinput(trim($_POST['member_realname'])) : "")."'";
} elseif ($profile_method == "validate_update") {
	$db_values .= ", member_realname='".(isset($_POST['member_realname']) ? stripinput(trim($_POST['member_realname'])) : "")."'";
}
?>