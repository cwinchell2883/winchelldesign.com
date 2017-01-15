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

$location .= " > <a href=\"games.php\">Games</a> > <b>Game Info</b>";

require_once("global.php");

// Get Game Info
if (isset($_REQUEST['id'])) {
   $result = $db->Execute("SELECT * FROM `sp_games` WHERE `id` = '$_REQUEST[id]' LIMIT 1");
   while ($row = $result->FetchNextObject()) {

      if (!empty($row->DEVELOPER))
      {
         $developer = $db->Execute("SELECT * FROM `sp_companies` WHERE `id` = '$row->DEVELOPER' LIMIT 1");
      }

      if (!empty($row->PUBLISHER))
      {
         $publisher = $db->Execute("SELECT * FROM `sp_companies` WHERE `id` = '$row->PUBLISHER' LIMIT 1");
      }

      if (!empty($row->SECTION))
      {
         $section = $db->Execute("SELECT * FROM `sp_games_sections` WHERE `id` = '$row->SECTION' LIMIT 1");
      }


	$cheats = $db->Execute("SELECT id,gameid FROM `sp_cheats` WHERE gameid = $_REQUEST[id] LIMIT 1");
	if ($cheats->RecordCount() >= 1)
	{
		$cheat_link = "<a href=\"cheats.php?id=$row->ID\">Cheats</a>";
	} else {
		$cheat_link = "Cheats";
	}

	$downloads = $db->Execute("SELECT * FROM sp_downloads WHERE gameid = $_REQUEST[id] LIMIT 1;") or die($db->ErrorMsg());
	if ($downloads->RecordCount() > 0)
	{
		$download_link = "<a href=\"downloads.php?id=$row->ID\">Downloads</a>";
	} else {
		$download_link = "Downloads";
	}

$getfields = $db->Execute("SELECT * FROM sp_customfields WHERE module = 'games' ORDER BY title");
while ($field = $getfields->FetchNextObject())
{
   $getvalue = $db->Execute("SELECT * FROM sp_games_customdata WHERE gameid = $_REQUEST[id] AND fieldid = $field->ID;");

   if ($getvalue->fields['value'] != '')
   {
   $customfields .= "<tr><td><b>";
   $customfields .= stripslashes($field->TITLE) . "</b>: ";
   $customfields .= stripslashes($getvalue->fields['value']) . "</td></tr>";
   }
}


      do_header();
      require_once("templates/games_details.inc.php");
      do_footer();
      $views = $row->VIEWS + 1;
      $db->Execute("UPDATE `sp_games` SET `views` = '$views' WHERE `id` = '$row->ID'");
   }
} else {
   do_header();
   echo "<b>System Error Message</b><br />";
   echo "You cannot access this page directly, please go back and select a game.<br />";
   echo "If the problem persists, please contact the webmaster.";
   do_footer();
}
?>