<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: infusion.php
| Author: Max "Matonor" Toball
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

include INFUSIONS."forum_extension_panel/infusion_db.php";

if (file_exists($dir."locale/".$settings['locale'].".php")) {
	include $dir."locale/".$settings['locale'].".php";
} else {
	include $dir."locale/English.php";
}

// Infusion general information
$inf_title = $locale['forum_ext_title'];
$inf_description = $locale['forum_ext_desc'];
$inf_version = "1.8";
$inf_developer = 'Max "Matonor" Toball';
$inf_email = "matonor@gmail.com";
$inf_weburl = "http://matonor.com";

$inf_folder = "forum_extension_panel";

// Delete any items not required below.
$inf_newtable[1] = DB_FORUM_EXT_PANEL." (
`options` VARCHAR( 255 ) NOT NULL ,
`stats` VARCHAR( 255 ) NOT NULL
) ENGINE = MYISAM;";

$inf_newtable[2] = DB_FORUM_OBSERVER." (
`user_id` VARCHAR( 64 ) NOT NULL ,
`forum_id` MEDIUMINT UNSIGNED NOT NULL ,
`thread_id` MEDIUMINT UNSIGNED NOT NULL ,
`age` INT( 10 ) UNSIGNED NOT NULL ,
PRIMARY KEY ( `user_id` )
) ENGINE = MYISAM;";

$inf_insertdbrow[1] = DB_FORUM_EXT_PANEL." SET options='1|1|1|1|1|1|1|1|1', stats='0:0'";
$inf_insertdbrow[2] = DB_PANELS." SET panel_name='".$locale['forum_ext_title']."', panel_filename='".$inf_folder."', panel_side=3, panel_order='99', panel_type='file', panel_access='0', panel_display='1', panel_status='1' ";

$inf_droptable[1] = DB_FORUM_EXT_PANEL;
$inf_droptable[2] = DB_FORUM_OBSERVER;

$inf_deldbrow[1] = DB_PANELS." WHERE panel_filename='$inf_folder'";


$inf_adminpanel[1] = array(
	"title" => $locale['forum_ext_admin'],
	"image" => "image.gif",
	"panel" => "forum_extension_admin.php",
	"rights" => "FEXP"
);

?>