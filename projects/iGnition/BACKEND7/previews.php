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

$location .= " > <b>Previews</b>";

require_once("global.php");
require_once("templates/preview_module.php");
$title .= " > Previews";

if (empty($_REQUEST['do'])) {
   do_header();

   // ALPHA NAV BOX

   $alpha = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
   foreach ($alpha AS $key => $value) {
      $alphanav .= do_alpha_link($value);
   }

   do_alpha_nav();

   // END ALPHA NAV BOX

   $sections = array();
   $sql = $db->Execute("SELECT * FROM `sp_previews_sections` ORDER BY `title`");
   while ($row = $sql->FetchNextObject()) {
      $sections["$row->ID"] = stripslashes($row->TITLE);
   }

   $specialdata = "<b>Preview Sections</b><br />";
   foreach ($sections AS $key => $value) {
      $specialdata .= "&nbsp;<a href=\"previews.php?section=$key\">$value</a><br />";
   }
   $specialdata .= "<br />";

   if (isset($_REQUEST['browse'])) {

      $sql = $db->Execute("SELECT id,title,section FROM `sp_previews`
      WHERE `title` LIKE '".$_REQUEST['browse']."%'
      ORDER BY `title`");

   } else {

      $sql = $db->Execute("SELECT id,title,section FROM `sp_previews` ORDER BY `id` DESC LIMIT 15");

   }

   while ($row = $sql->FetchNextObject()) {

      $preview_rows .= do_preview_row($row->ID,stripslashes($row->TITLE),$sections["$row->SECTION"]);

   }

   do_preview_results();



   do_footer();
}

if ( $_REQUEST['do'] == 'view' ) {
   do_header();

   $preview = $db->Execute("SELECT * FROM `sp_previews` WHERE `id` = '$_REQUEST[id]'");
   $word_count = count(preg_split('/\W+/', $preview->fields['text'], -1, PREG_SPLIT_NO_EMPTY)) + count(preg_split('/\W+/', $preview->fields['intro'], -1, PREG_SPLIT_NO_EMPTY));
   echo '<b>', clean($preview->fields['title']), '</b>
         <br /><br />
         ', clean($preview->fields['intro']), '
         <br /><br />
         ', clean($preview->fields['text']), $start_table, 'Word Count: ', $word_count, $end_table;

   build_matrix('previews',$preview->fields['id']);

   do_footer();

}
?>