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

switch($_REQUEST['do']) {
   case 'search_games':
      $location .= " > <a href=\"search.php\">Advanced Search</a> > <b>Search Results</b>";
      break;
   default:
      $location .= " > <b>Advanced Search</b>";
      break;
   }

require_once("global.php");


do_header();

if (!isset($_REQUEST['do'])) 
{
	include("templates/search_main.inc.php");
}

if ($_REQUEST['do'] == 'search_games') {
   // Cache section names
   $sections = FetchSections('sp_games_sections');
   // Cache companies
   $companies = FetchCompanies();
   // Field validation
   if (empty($_REQUEST['keywords'])) {
      echo "Error: No keywords entered.<br />";
      } else {
      if ($_REQUEST['platform'] != 'all') {
         $platform = "`section` = '" . $_REQUEST['platform'] . "' ";
         } else {
         $platform = "`section` LIKE '%' ";
         }
      if ($_REQUEST['exact'] == '1') {
         $title = "`title` = '".$_REQUEST['keywords']."' ";
         } else {
         $title = "`title` LIKE '%".$_REQUEST['keywords']."%' ";
         }
      $result = $db->Execute("SELECT id,title,section,publisher,developer FROM `sp_games` WHERE $title AND $platform AND `published` = '1' ORDER BY `title`");
      while ($row = $result->FetchNextObject()) {

         include("templates/search_gamebit.inc.php");

      }
   }
}

do_footer();

?>