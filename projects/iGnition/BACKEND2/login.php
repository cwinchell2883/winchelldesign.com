<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

/* What i have done here is put the mysql connect and smarty code from application_top into here
so that when the user logs in there is no need to reload the screen to show the private menu. */
require_once('includes/user.php');
require_once('includes/configure.php');


/* CONNECT TO MYSQL */
$connect = mysql_connect(MYSQL_ADDRESS, MYSQL_USERNAME, MYSQL_PASSWORD) or die(ERROR_DB.mysql_error());
/* Define the mysql connect */
define ("CONNECT", $connect);
/* select mysql database */
mysql_select_db(MYSQL_DATABASE);

/* Had to change this all around so that when the user logs in it instantly displays the private menu. */
$user = new User();
require_once("includes/application_top.php");

if(empty($_POST['cookies'])) $_POST['cookies'] = 0;
	if (!empty($_POST['login']) && !empty($_POST['password'])) $user->Login($_POST['login'], $_POST['password'], $_POST['cookies']);
/* Put this first so it logs the user in */

$user->CheckUser();
if (!empty($user->m_user_rank) && !empty($user->m_user_rank_sort) && !empty($user->m_user_id) && !empty($user->m_user_name)) {
			$smarty->assign('g_user_member', 'true');
} else {
			$smarty->assign('g_user_member', 'false');
}
			
$smarty->assign('g_user_id',$user->m_user_id);
			
if (!empty($user->m_user_rank_sort)) {
		$sql = "SELECT ".MYSQL_PREFIX."_menu.l_name AS name, ".MYSQL_PREFIX."_menu.l_link AS link, ".MYSQL_PREFIX."_menu.m_id FROM ".MYSQL_PREFIX."_menu LEFT JOIN ".MYSQL_PREFIX."_modules ON ".MYSQL_PREFIX."_menu.m_id=".MYSQL_PREFIX."_modules.m_id WHERE l_type = '1' AND (".MYSQL_PREFIX."_modules.m_status = '1' OR ".MYSQL_PREFIX."_menu.m_id IS NULL) ORDER BY l_id ASC";
		$query = mysql_query($sql) or die(mysql_error());
		$links = array();
		while ($link = mysql_fetch_assoc($query)) $links[] = $link; 
		$smarty->assign('g_menu_private', $links);
}

require_once('index.php');
?>
