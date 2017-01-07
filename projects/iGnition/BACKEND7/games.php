<?php
/*
##############################################################
 Sector Portal Content Management System
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

$location .= " > <b>Games</b>";

require_once("global.php");

if (empty($_REQUEST['do'])) {

   $sql = "SELECT `id`,`title`,`section`,`genre`,`developer`,`publisher`,`release_date` FROM `sp_games` ";

   if (!empty($_REQUEST['title'])) {

      $sql .= "WHERE `title` LIKE '$_REQUEST[title]%' ";

      if (!empty($_REQUEST['section'])) {

         $sql .= " AND `section` = '$_REQUEST[section]' ";

      }

      $sql .= " AND `published` = '1' ";

   } else {

      if (!empty($_REQUEST['section'])) {

        $sql .= "WHERE `section` = '$_REQUEST[section]' AND `published` = '1' ";

      } else {

      	$sql .= "WHERE `published` = '1' ";

      }
   }

   if (isset($_REQUEST[order])) {
      $sql .= " ORDER BY `$_REQUEST[order]` ";
   } else {
      $sql .= " ORDER BY `title` ";
   }

   switch($_REQUEST['sort']) {

      case 'asc':
         $sql .= " ASC ";
         break;
      case 'desc':
         $sql .= " DESC ";
         break;
      default:
         $sql .= " ASC ";
         break;
   }

   if ($sql == "SELECT `id`,`title`,`section`,`genre`,`developer`,`publisher`,`release_date` FROM `sp_games` WHERE `published` = '1' ORDER BY `title` ASC") {

      $sql .= " LIMIT 0,20 ";

   }

   $sections = array();
   $sql2 = $db->Execute("SELECT * FROM `sp_games_sections` ORDER BY `title`");
   while ($srow = $sql2->FetchNextObject()) {
      $sections["$srow->ID"] = stripslashes($srow->TITLE);
   }

   $specialdata = "<b>Game Sections</b><br />";
   foreach ($sections AS $key => $value) {
      $specialdata .= "&nbsp;<a href=\"games.php?section=$key\">$value</a><br />";
   }
   $specialdata .= "<br />";

   $companies = array();
   $company_sql = $db->Execute("SELECT * FROM `sp_companies` ORDER BY `title`");
   while ($crow = $company_sql->FetchNextObject()) {
      $companies["$crow->ID"] = stripslashes($crow->TITLE);
   }

   do_header();

   switch ($_REQUEST['sort']) {
      case 'asc':
         $arrowlink = '<a href="games.php?sort=desc&section='.$_REQUEST[section].'&order='.$_REQUEST[order].'"><img src="images/arrow-down.png" border="0"></a>';
         break;
      case 'desc':
         $arrowlink = '<a href="games.php?sort=asc&section='.$_REQUEST[section].'&order='.$_REQUEST[order].'"><img src="images/arrow-up.png" border="0"></a>';
         break;
      default:
         $arrowlink = '<a href="games.php?sort=desc&section='.$_REQUEST[section].'&order='.$_REQUEST[order].'"><img src="images/arrow-down.png" border="0"></a>';
         break;
   }

   if ($_REQUEST['order'] == 'title') {
      $label_title = 'Title ' . $arrowlink;
   } else {
      $label_title = '<a href="games.php?order=title&section='.$_REQUEST[section].'&sort='.$_REQUEST[sort].'">Title</a>';
   }

   if ($_REQUEST['order'] == 'genre') {
      $label_genre = 'Genre ' . $arrowlink;
   } else {
      $label_genre = '<a href="games.php?order=genre&section='.$_REQUEST[section].'&sort='.$_REQUEST[sort].'">Genre</a>';
   }

   if ($_REQUEST['order'] == 'publisher') {
      $label_publisher = 'Publisher ' . $arrowlink;
   } else {
      $label_publisher = '<a href="games.php?order=publisher&section='.$_REQUEST[section].'&sort='.$_REQUEST[sort].'">Publisher</a>';
   }

   if ($_REQUEST['order'] == 'developer') {
      $label_developer = 'Developer ' . $arrowlink;
   } else {
      $label_developer = '<a href="games.php?order=developer&section='.$_REQUEST[section].'&sort='.$_REQUEST[sort].'">Developer</a>';
   }

   if ($_REQUEST['order'] == 'release') {
      $label_release = 'Release Date ' . $arrowlink;
   } else {
      $label_release = '<a href="games.php?order=release&section='.$_REQUEST[section].'&sort='.$_REQUEST[sort].'">Release Date</a>';
   }

   if ($_REQUEST['order'] == 'section') {
      $label_section = 'Platform ' . $arrowlink;
   } else {
      $label_section = '<a href="games.php?order=section&section='.$_REQUEST[section].'&sort='.$_REQUEST[sort].'">Platform</a>';
   }

   include("templates/games_listheader.inc.php");

   $result = $db->Execute($sql) or die($db->ErrorMsg());
   while ($row = $result->FetchNextObject()) {
      $bgcolor = ($bgcolor == "#FFFFFF" ? "#E9E9E9" : "#FFFFFF");
      $section = stripslashes($sections["$row->SECTION"]);
      $publisher = stripslashes($companies["$row->PUBLISHER"]);
      $developer = stripslashes($companies["$row->DEVELOPER"]);
      include("templates/games_listbit.inc.php");
      }

   include("templates/games_listfooter.inc.php");

   do_footer();

   }

?>
