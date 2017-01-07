<?
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

$location .= " > <a href=\"games.php\">Games</a> > <b>Cheats</b>";

require_once("global.php");

?>

<?
// Get Game Info
if (isset($_REQUEST['id'])) {
   $result = $db->Execute("SELECT * FROM `sp_games` WHERE `id` = '$_REQUEST[id]' LIMIT 1");
   while ($row = $result->FetchNextObject()) {

      do_header();
      require_once("templates/cheats_header.inc.php");

      $cheats = $db->Execute("SELECT id,gameid,title,cheat FROM `sp_cheats` WHERE `gameid` = '{$_REQUEST['id']}' ORDER BY `title`");
      while ($cheat = $cheats->FetchNextObject())
      {

      	// CHEAT HTML
      	echo "<b>" . clean($cheat->TITLE) . "</b><br />
      			" . stripslashes($cheat->CHEAT) . "<br /><br />";
      	// END CHEAT HTML

      }

      do_footer();

   }
} else {
   do_header();
   echo "<b>System Error Message</b><br />";
   echo "You cannot access this page directly, please go back and select a game.<br />";
   echo "If the problem persists, please contact the webmaster.";
   do_footer();
}
?>