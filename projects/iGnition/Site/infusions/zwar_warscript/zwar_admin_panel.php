<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: zwar_admin_panel.php
| Author: Zezoar
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
if (file_exists(INFUSIONS."zwar_warscript/locale/".$settings['locale'].".php")) {
	include_once INFUSIONS."zwar_warscript/locale/".$settings['locale'].".php";
} else {
	include_once INFUSIONS."zwar_warscript/locale/English.php";
}
require_once INFUSIONS."zwar_warscript/admin/zwar_header.php";
require_once INFUSIONS."zwar_warscript/zwar_functions.php";
add_handler("check_copy");
add_to_title("&nbsp;-&nbsp;".$locale['zwar_0068']);

$admin_page = isset($_GET['pagefile']) ? $_GET['pagefile'] : "overview";
if (isset($_GET['action']) && !preg_match("/^[0-9a-z]+$/i", $_GET['action'])) { redirect(FUSION_SELF.$aidlink); }
if (!zwar_CheckAccess($admin_page)) { redirect(BASEDIR."index.php"); }

define("ZWARCOPY", "<br/><div align='center'><a href='http://www.zoffclan.de/zoffdev/' target='_blank'>ZWar</a> - &copy; 2008 by ZEZoar</div>"); 

$zwar_admin_path = INFUSIONS."zwar_warscript/admin/";

if (file_exists($zwar_admin_path.$admin_page.".php")) {
require_once($zwar_admin_path.$admin_page.".php");
} else {
require_once(INFUSIONS."zwar_warscript/admin/overview.php");
}

echo ZWARCOPY;
require_once THEMES."templates/footer.php";
?>