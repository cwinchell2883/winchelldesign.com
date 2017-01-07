<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2010 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: infusion_db.php
| Version: 1.00
| Author: Fangree Productions
| Developers: Fangree_Craig 
| Site: http://www.fangree.co.uk
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

if (!defined("DB_DONATE_TABLE")) {
	define("DB_DONATE_TABLE", DB_PREFIX."donate_table");
}
?>