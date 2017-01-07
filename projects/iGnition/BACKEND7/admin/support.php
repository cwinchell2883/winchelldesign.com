<?php
/*
##############################################################
 iGaming CMS Content Management System
 Copyright (C) 2004  Joshua Kimbrel

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
##############################################################
*/

error_reporting(E_ALL ^ E_NOTICE);

include "global.php";

$cp->header();

do_module_header('iGaming Support Center');

echo "<font style='font-size: 12px; font-family: Verdana;'>";

if (file_exists("../sources/docs/".$_REQUEST['id'].".php"))
{
	require_once("../sources/docs/$_REQUEST[id].php");
} else {
	echo "<b>The resource you specified could not be located.</b>";
}

echo "<br /><br />
	  <b>Still need help?</b><br />
	  <a href=\"http://forum.vortexportal.net/\" target=\"_blank\">Visit the support forums</a>";

$cp->footer();
?>