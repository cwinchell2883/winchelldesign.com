<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/


ini_set('arg_separator.output','&amp;');  // Need this to make sure the PHP Sessions are w3c valid
if (!session_is_registered('auth')) session_start();			/* Start sessions */
header("Cache-control: private");  	/* IE 6 fix */

/* check if config file exists */

if (file_exists('configure.php') || file_exists('includes/configure.php')) {  // Small fix for certain users who get
	 		require_once('configure.php');   // errors while trying to get configure.php to load.
	 		$address = constant('MYSQL_ADDRESS');
	 		$username = constant('MYSQL_USERNAME');
	 		$database = constant('MYSQL_DATABASE');
	 		if (empty($address) || empty($username) || empty($database)) {
	 			header("Location: install/index.php");
	 			return;
	 		}
	 		$address = $username = $database = 0;
} else {
	 		header("Location: install/index.php");
	 		return;
}


if (!defined('CONNECT')) {  // work around for logging in 
		/* CONNECT TO MYSQL */
		$connect = mysql_connect(MYSQL_ADDRESS, MYSQL_USERNAME, MYSQL_PASSWORD) or die(mysql_error());
		/* Define the mysql connect */
		define("CONNECT", $connect);
		/* select mysql database */
		mysql_select_db(MYSQL_DATABASE, CONNECT);
}



$row = 0;
// Work around for unix and windows machines that can't find smarty..
if (!defined('SMARTY_DIR')) define('SMARTY_DIR', str_replace("\\","/",getcwd()).'/includes/libs/');

// load smarty libary's
require_once(SMARTY_DIR . 'Smarty.class.php');
$smarty = new Smarty();
// define the smarty theme directory
$sql = "SELECT `s_dir` FROM ".MYSQL_PREFIX."_style WHERE `s_used`='1' LIMIT 1";
$query = mysql_query($sql, CONNECT) or die(mysql_error());
if ($row = mysql_fetch_assoc($query)) {
			$g_theme_dir = $row['s_dir'];
} else {
			$g_theme_dir = 'default';
}


$smarty->assign('g_theme_dir', $g_theme_dir);

$smarty->template_dir = './theme/'.$g_theme_dir;
$smarty->compile_dir = SMARTY_DIR.'/compiled/';

$smarty->config_dir = ''; // this should point to the language pack.
$smarty->cache_dir = SMARTY_DIR.'/cache/'; 

		// LOAD CONFIG DATA INTO SMARTY
		$sql = "SELECT * FROM ".MYSQL_PREFIX."_config";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		while($row = mysql_fetch_array($query)) $links[$row['s_name']] = $row['s_value'];
		$smarty->assign('g_site_config', $links);
		
		require_once('includes/chat.php');
		$chat = new Chat();
		$smarty->assign('g_site_chat', $chat->displayChat());
		

		/* INCLUDE THE LANGUAGE FILE */
		$sql = "SELECT s_value FROM ".MYSQL_PREFIX."_config WHERE s_name = 'language' LIMIT 1";
		$query = mysql_query($sql);
		$row = mysql_fetch_array($query);
		require("./lang/".$row['s_value'].".php");
		
		

		// GET PUBLIC MENU     AND STRCMP(LOWER(".MYSQL_PREFIX."_menu.l_link), LOWER('".$_SERVER['PHP_SELF']."'))
		$sql = "SELECT ".MYSQL_PREFIX."_menu.l_name AS name, ".MYSQL_PREFIX."_menu.l_link AS link FROM ".MYSQL_PREFIX."_menu LEFT JOIN ".MYSQL_PREFIX."_modules ON ".MYSQL_PREFIX."_menu.m_id=".MYSQL_PREFIX."_modules.m_id WHERE l_type = '2' AND (".MYSQL_PREFIX."_modules.m_status = '1' OR ".MYSQL_PREFIX."_menu.m_id IS NULL) ORDER BY l_id ASC";
		$query = mysql_query($sql) or die(mysql_error());
		$links = array();
		while ($link = mysql_fetch_assoc($query)) $links[] = $link; 
		$smarty->assign('g_menu_public', $links);
		
		// REPORT THE MODULES STATUS
		$sql = "SELECT * FROM ".MYSQL_PREFIX."_modules";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		$links = array();
		while ($link = mysql_fetch_assoc($query)) $links[$link['m_id']] = $link;
		$smarty->assign('g_modules', $links);

if (!empty($user)) $smarty->assign_by_ref('g_user', $user);
		
require_once("user.php");
if (empty($user))
{
			$user = new User();
			$user->CheckUser();
			$smarty->assign_by_ref('g_user', $user);
}

if (!empty($user->m_user_rank_sort)) {
		$sql = "SELECT ".MYSQL_PREFIX."_menu.l_name AS name, ".MYSQL_PREFIX."_menu.l_link AS link, ".MYSQL_PREFIX."_menu.m_id FROM ".MYSQL_PREFIX."_menu LEFT JOIN ".MYSQL_PREFIX."_modules ON ".MYSQL_PREFIX."_menu.m_id=".MYSQL_PREFIX."_modules.m_id WHERE l_type = '1' AND (".MYSQL_PREFIX."_modules.m_status = '1' OR ".MYSQL_PREFIX."_menu.m_id IS NULL) ORDER BY l_id ASC";
		$query = mysql_query($sql) or die(mysql_error());
		$links = array();
		while ($link = mysql_fetch_assoc($query)) $links[] = $link; 
		$smarty->assign('g_menu_private', $links);
}
		
?>
