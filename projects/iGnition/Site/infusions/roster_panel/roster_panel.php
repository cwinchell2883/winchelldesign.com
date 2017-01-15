<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2010 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: roster_panel.php
| Author: Chris Winchell (SiLK)
| Roster Panel with JS Tabbing
| Developers: SiLK
| Support: http://www.winchelldesign.com/
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

if (file_exists(INFUSIONS."roster_panel/locale/".$settings['locale'].".php")) {
	include INFUSIONS."roster_panel/locale/".$settings['locale'].".php";
} else {
	include INFUSIONS."roster_panel/locale/English.php";
}

add_to_head("<link rel='stylesheet' href='".INFUSIONS."roster_panel/roster_panel.css' type='text/css' />\n");

opentable($locale['rp100']);
echo "<ol id='toc'>\n";
echo "<li><a href='#CSS'> CSS </li>\n";
echo "<li><a href='#COD'> COD </li>\n";
echo "<li><a href='#TF2'> TF2 </li>\n";
echo "</ol>\n\n";

// CSS Section...
echo "<div class='content' id='CSS'>";
echo "<div>";
echo "<img src='' alt='1' />";
echo "<img src='' alt='2' />";
echo "<img src='' alt='3' />";
echo "<img src='' alt='4' />";
echo "</div>\n<div>";
echo "<img src='' alt='5' />";
echo "<img src='' alt='6' />";
echo "<img src='' alt='7' />";
echo "<img src='' alt='8' />";
echo "</div>";
echo "</div>";

// COD Section...
echo "<div class='content' id='COD'>";
echo "<div>";
echo "<img src='' alt='1' />";
echo "<img src='' alt='2' />";
echo "<img src='' alt='3' />";
echo "<img src='' alt='4' />";
echo "</div>\n<div>";
echo "<img src='' alt='5' />";
echo "<img src='' alt='6' />";
echo "<img src='' alt='7' />";
echo "<img src='' alt='8' />";
echo "</div>";
echo "</div>";

// CTF2 Section...
echo "<div class='content' id='TF2'>";
echo "<div>";
echo "<img src='' alt='1' />";
echo "<img src='' alt='2' />";
echo "<img src='' alt='3' />";
echo "<img src='' alt='4' />";
echo "</div>\n<div>";
echo "<img src='' alt='5' />";
echo "<img src='' alt='6' />";
echo "<img src='' alt='7' />";
echo "<img src='' alt='8' />";
echo "</div>";
echo "</div>";

echo "<script src='".INFUSIONS."roster_panel/roster_panel.js' type='text/javascript'></script>";
echo "<script type='text/javascript'>";
echo "activatables('section', ['CSS', 'COD', 'TF2'])";
echo "</script>\n";

closetable();
?>