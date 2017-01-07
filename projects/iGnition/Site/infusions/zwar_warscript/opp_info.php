<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: opp_info.php
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
if (!isset($_GET['oppid']) || !isNum($_GET['oppid'])) { redirect( BASEDIR.'index.php' ); }

$result=dbquery("SELECT * FROM ".DB_ZWAR_OPPONENTS." WHERE opp_id='".$_GET['oppid']."'");
if (dbrows($result)) {
	$data=dbarray($result);
	opentable($locale['zwar_0351']);
	add_to_title("&nbsp;-&nbsp;".$locale['zwar_0351']);
	render_opp_info($data);	
} else {
	redirect(BASEDIR."index.php");
}

closetable();
?>