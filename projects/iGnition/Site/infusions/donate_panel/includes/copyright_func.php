<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2010 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: copyright_func.php
| Author: Fangee Productions & Hobbysites
| Developers: Fangree_Craig & Hobbyman
| Sites: http://www.fangree.co.uk & http://php-fusion.hobbysites.net/
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
// Please do not remove copyright info
//change FP to your Siter Initials (eg. HS) for http://php-fusion.hobbysites.net/
function showDPcopyright() {
	global $settings;
	if (file_exists(INFUSIONS."donate_panel/locale/".$settings['locale'].".php")) {
		include INFUSIONS."donate_panel/locale/".$settings['locale'].".php";
	} else {
		include INFUSIONS."donate_panel/locale/English.php";
	}
	//Infusion title
	$title = $locale['don001'];
	//Gets Infusion version change 'your_panel' to the folder of the infusion
	$data_version = dbarray(dbquery("SELECT inf_version FROM ".DB_INFUSIONS." WHERE inf_folder = 'donate_panel'"));
	$version = $data_version['inf_version'];
	//Copyright Output
	return "<br /><div class='small' align='right'>".$title." v".$version."  ".$locale['copyrightfp1']." ".date("Y")."<br /></div>\n";
	// End copyright info
}
?>