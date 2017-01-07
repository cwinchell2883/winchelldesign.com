<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: infusion_db.php
| Author: Matonor
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

$dir = INFUSIONS."forum_extension_panel/";

if (!defined("DB_FORUM_EXT_PANEL")) {
	define("DB_FORUM_EXT_PANEL", DB_PREFIX."forum_ext_panel");
}
if (!defined("DB_FORUM_OBSERVER")) {
	define("DB_FORUM_OBSERVER", DB_PREFIX."forum_observer");
}
?>