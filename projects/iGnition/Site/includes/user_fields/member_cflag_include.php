<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: member_cflag_include.php
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
	include_once INFUSIONS."zwar_warscript/locale/English.php";
}

if ($profile_method == "input") {
	require_once INFUSIONS."zwar_warscript/zwar_functions.php";
	require_once INFUSIONS."zwar_warscript/locale/ccodes.php";
	$member_cflag_files = makefilelist(INFUSIONS."zwar_warscript/locale/flags/", ".|..|index.php|Unknown.gif", true);
	$member_cflag_list = "";
	$member_cflag = isset($user_data['member_cflag']) ? $user_data['member_cflag'] : "";
	$sel="";
	for ($i = 0; $i < count($member_cflag_files); $i++) {
		$ccode = preg_replace("/\.gif$/","",$member_cflag_files[$i]);
		$cflag_sortarray[$i]['file'] = $member_cflag_files[$i];
		$cflag_sortarray[$i]['name'] = isset($zwar_countrycodes_array[strtoupper($ccode)]) ? $zwar_countrycodes_array[strtoupper($ccode)] : $ccode;
	}
	usort($cflag_sortarray, 'sort_cflagarray');
	for ($i = 0; $i < count($cflag_sortarray); $i++) {
		$sel = ($member_cflag == $cflag_sortarray[$i]['file'] ? " selected='selected'" : "");
		$member_cflag_list .= "<option value='".$cflag_sortarray[$i]['file']."'$sel>".$cflag_sortarray[$i]['name']."</option>\n";
	}
	echo "<tr>\n";
	echo "<td class='tbl' valign='top'>".$locale['zwar_4133']."</td>\n";
	echo "<td class='tbl'><select name='member_cflag' class='textbox' style='width:150px;' onchange=\"zwar_show_cflag();\">
	<option value=''>---</option>".$member_cflag_list."</select>
	<img id='member_cflag_img' src='".INFUSIONS."zwar_warscript/locale/flags/".($member_cflag != "" ? $member_cflag : "Unknown.gif")."' alt='zwar-image'/></td>\n";
	echo "</tr>\n";
	$replacestring = "<script type=\"text/javascript\">
	function zwar_show_cflag() {
		imgsrc = document.inputform.member_cflag.value;
		document.images[\"member_cflag_img\"].src = \"".INFUSIONS."zwar_warscript/locale/flags/\" + imgsrc;
	}
	</script>";
	replace_in_output("</body>", "</body>\n".$replacestring."\n");
} elseif ($profile_method == "display") {
	require_once INFUSIONS."zwar_warscript/zwar_functions.php";
	echo "<tr>\n";
	echo "<td width='1%' class='tbl1' style='white-space:nowrap' valign='top'>".$locale['zwar_4133'].":</td>\n";
	echo "<td align='right' class='tbl1'>".display_zwar_flag($user_data['member_cflag'])."</td>\n";
	echo "</tr>\n";
} elseif ($profile_method == "validate_insert") {
	$db_fields .= ", member_cflag";
	$db_values .= ", '".(isset($_POST['member_cflag']) && file_exists(INFUSIONS."zwar_warscript/locale/flags/".$_POST['member_cflag'])? $_POST['member_cflag'] : "")."'";
} elseif ($profile_method == "validate_update") {
	$db_values .= ", member_cflag='".(isset($_POST['member_cflag']) && file_exists(INFUSIONS."zwar_warscript/locale/flags/".$_POST['member_cflag'])? $_POST['member_cflag'] : "")."'";
}
?>