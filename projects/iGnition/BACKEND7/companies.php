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

$location .= " > <b>Company Profiles</b>";

include "global.php";
include "sources/companies.class.php";

$module = new Module;

switch ($_REQUEST['do'])
{
   case 'view':
      $module->view();
      break;
   default:
      $module->main();
      break;
}

function view_company() {
   global $db;
   $company = $db->Execute("SELECT * FROM `sp_companies` WHERE `id` = '$_REQUEST[id]'");

   $title = clean($company->fields['title']);
   $description = clean($company->fields['description']);
   $homepage = clean($company->fields['homepage']);
   $logo = clean($company->fields['logo']);

   $result = $db->Execute("SELECT id,title,section FROM `sp_games` WHERE `developer` = '" . $company->fields['id'] . "' ORDER BY `title`");
   if ($result->RecordCount() > 0) {

      echo "<ul><b>Developer</b>";
      while ($row = $result->FetchNextObject()) {
         echo '<li> <a href="gamedetails.php?id=', $row->ID, '">', clean($row->TITLE), '</a>';
         }
      echo "</ul>";
      }

   $result = $db->Execute("SELECT id,title,section FROM `sp_games` WHERE `publisher` = '" . $company->fields['id'] . "' ORDER BY `title`");
   if ($result->RecordCount() > 0) {
      echo "<ul><b>Publisher</b>";
      while ($row = $result->FetchNextObject()) {
         echo '<li> <a href="gamedetails.php?id=', $row->ID, '">', clean($row->TITLE), '</a>';
         }
      echo "</ul>";
      }

   build_matrix('companies',$company->fields['id']);
   do_footer();

   }
?>