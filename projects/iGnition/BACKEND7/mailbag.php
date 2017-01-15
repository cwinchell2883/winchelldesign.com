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

error_reporting(E_ALL & ~E_NOTICE);
@set_magic_quotes_runtime(0);

$location = " > <b>Mailbag</b>";

require_once("global.php");
switch ($_REQUEST['do']) {

   default:
      mailbag_main();
      break;

   }

function mailbag_main() {

   global $db;
   do_header();

   include("templates/mailbag_header.inc.php");

   $result = $db->Execute("SELECT * FROM `sp_mailbag` ORDER BY `id` DESC");
   while ($row = $result->FetchNextObject())
   {

      include("templates/mailbag_bit.inc.php");

   }

   include("templates/mailbag_footer.inc.php");

   do_footer();
   }
?>