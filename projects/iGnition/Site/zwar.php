<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: zwar.php
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
require_once "maincore.php";
require_once THEMES."templates/header.php";
if (file_exists(INFUSIONS."zwar_warscript/locale/".$settings['locale'].".php")) {
	include_once INFUSIONS."zwar_warscript/locale/".$settings['locale'].".php";
} else {
	include_once INFUSIONS."zwar_warscript/locale/English.php";
}

require_once INFUSIONS."zwar_warscript/zwar_functions.php";
add_handler("check_copy");

if (isset($_GET['page']) && !preg_match("/^[_a-z]+$/i", $_GET['page'])) { redirect( BASEDIR.'index.php' ); }
define("ZWARCOPY", "<br/><div align='center'><a href='http://www.zoffclan.de/zoffdev/' target='_blank'>ZWar</a> - &copy; 2008 by ZEZoar</div>"); 

if (isset($_GET['page']) && file_exists(INFUSIONS."zwar_warscript/".$_GET['page'].".php")) {
	require_once(INFUSIONS."zwar_warscript/".$_GET['page'].".php");
} elseif(file_exists(INFUSIONS."zwar_warscript/".$zwar_settings_array['zwar_default_page'].".php")) {
	require_once(INFUSIONS."zwar_warscript/".$zwar_settings_array['zwar_default_page'].".php");
} else {
	require_once(INFUSIONS."zwar_warscript/members.php");
}

echo ZWARCOPY;

require_once THEMES."templates/footer.php";
?>