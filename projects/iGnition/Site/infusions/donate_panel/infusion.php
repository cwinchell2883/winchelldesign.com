<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2010 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: infusion.php
| Version: 1.00
| Author: Fangree Productions
| Developers: Fangree_Craig 
| Site: http://www.fangree.co.uk
+--------------------------------------------------------+
+--------------------------------------------------------+
| Other Credits: 
| Special Thanks to Barspin for Assisting with admin and infusion.php
| Thanks to Paypal API.
| Testing  by Nostradamus
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

include INFUSIONS."donate_panel/infusion_db.php";

if (file_exists(INFUSIONS."donate_panel/locale/".$settings['locale'].".php")) {
	include INFUSIONS."donate_panel/locale/".$settings['locale'].".php";
} else {
	include INFUSIONS."donate_panel/locale/English.php";
}

// Infusion general information
$inf_title = $locale['don001'];
$inf_description = $locale['don001'];
$inf_version = "1.00";
$inf_developer = "Fangree Productions (Special thanks to Barspin for the assistance)";
$inf_email = "admin@fangree.co.uk";
$inf_weburl = "http://www.fangree.co.uk";

$inf_folder = "donate_panel";

$inf_newtable[1] = DB_DONATE_TABLE." (
donate_desc text NOT NULL,
donate_email_address varchar(100) NOT NULL default '',
donate_desc2 text NOT NULL,
donate_site_desc text NOT NULL
) TYPE=MyISAM;";

$inf_insertdbrow[1] = DB_DONATE_TABLE."(donate_desc,donate_email_address,donate_desc2,donate_site_desc) VALUES('".$locale['don036']."','".$locale['don039']."','".$locale['don037']."','".$locale['don038']."')";

$inf_droptable[1] = DB_DONATE_TABLE;

$inf_adminpanel[1] = array(
	"title" => $locale['don001'],
	"image" => "image.gif",
	"panel" => "donate_admin.php",
	"rights" => "DPP"
);


?>