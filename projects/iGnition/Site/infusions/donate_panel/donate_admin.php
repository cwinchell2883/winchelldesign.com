<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2010 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: donate_admin.php
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
require_once "../../maincore.php";
require_once THEMES."templates/admin_header.php";
include INFUSIONS."donate_panel/infusion_db.php";
if (!defined("IN_FUSION")) { die("Access Denied"); }
if (!checkrights("DPP") || !defined("iAUTH") || $_GET['aid'] != iAUTH) { redirect("../index.php"); }

if (file_exists(INFUSIONS."donate_panel/locale/".$settings['locale'].".php")) {
	include INFUSIONS."donate_panel/locale/".$settings['locale'].".php";
} else {
	include INFUSIONS."donate_panel/locale/English.php";
}

if (isset($_POST['do_save'])) {
	$error = false;
	$result = dbquery("UPDATE ".DB_DONATE_TABLE." SET donate_desc='".addslashes($_POST['donate_desc'])."'");
		if (!$result) { $error = 1; }

	$result = dbquery("UPDATE ".DB_DONATE_TABLE." SET donate_desc2='".addslashes($_POST['donate_desc2'])."'");
		if (!$result) { $error = 2; }
			$result = dbquery("UPDATE ".DB_DONATE_TABLE." SET donate_site_desc='".addslashes($_POST['donate_site_desc'])."'");
		if (!$result) { $error = 3; }

	$result = dbquery("UPDATE ".DB_DONATE_TABLE." SET donate_email_address='".addslashes($_POST['donate_email_address'])."'");
	
	if (!$result) { $error = 4; }
	
	if ($error) {
		redirect(FUSION_SELF.$aidlink."&error=".$error);
	}
}

$data = dbarray(dbquery("SELECT donate_desc, donate_email_address, donate_desc2,donate_site_desc FROM ".DB_DONATE_TABLE));

$donate_desc = stripslashes($data['donate_desc']);
$donate_desc2 = stripslashes($data['donate_desc2']);
$donate_site_desc = stripslashes($data['donate_site_desc']);
$donate_email_address = stripslashes($data['donate_email_address']);
opentable($locale['don001']);

if (isset($_GET['saved'])) {
	echo "<div class='admin-message'>".$locale['do_saved']."</div>\n";
}

echo "<form name='do_form' method='post' action='".FUSION_SELF.$aidlink."'>\n";
echo "<table width='80%' align='center'>\n";
echo "<tr>\n";
echo "<td valign='top'>".$locale['don031']."<br /><span class='small2'><em></em></span></td><td><textarea rows='5' class='textbox' name='donate_desc' value='".$locale['don007']."' style='width:500px'>".$donate_desc."</textarea></td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td valign='top'>".$locale['don032']."<br /><span class='small2'><em></em></span></td><td><textarea rows='5' class='textbox' name='donate_desc2' value='".$locale['don007']."' style='width:500px'>".$donate_desc2."</textarea></td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td valign='top'>".$locale['don033']."<br /><span class='small2'><em></em></span></td><td><textarea rows='5' class='textbox' name='donate_site_desc' value='".$locale['don007']."' style='width:500px'>".$donate_site_desc."</textarea></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td valign='top'>".$locale['don034']."<br /><span class='small2'><em></em></span></td><td><input type='text' name='donate_email_address' value='".$donate_email_address."' maxlength='100' class='textbox' style='width:500px;' /></td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td colspan='2' align='center'><input type='submit' class='button' name='do_save' value='".$locale['do_save']."' />";
echo "</td></tr>\n";
echo "</table>\n";
echo "</form>\n";

// Please do not remove copyright info
include INFUSIONS."donate_panel/includes/copyright_func.php";
echo "".showDPcopyright()."";
// End copyright info
closetable();

require_once THEMES."templates/footer.php";

?> 