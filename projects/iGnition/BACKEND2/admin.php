<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

require("includes/application_top.php");

if ($user->m_user_access['ADMIN'] > 0) {
	require_once("includes/admin.php");
	$admin = new Admin;
	
	if (!empty($_POST['style'])) {
		$smarty->clear_compiled_tpl(); // Very important, to clear out the compiler dir otherwise the site will look all messed up
		$smarty->clear_all_cache(); 
		$admin->EditStyle($_POST['style']);
		header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/admin.php');
		exit();
	}
	
	if (!empty($_POST['editmenu'])) {
		$admin->EditMenu($_POST['editmenu'], $_POST['name'], $_POST['link'], $_POST['type']);
		header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/admin.php');
		exit();
	}
	
	if (!empty($_POST['addmenu'])) {
		$admin->AddMenu($_POST['name'], $_POST['link'], $_POST['type']);
		header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/admin.php');
		exit();
	}
	
	if (!empty($_GET['addstyle'])) {
		$admin->AddStyle($_GET['addstyle']);
		header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/admin.php');
	}

	if (!empty($_POST['editemail'])) {
		$admin->EditEmail($_POST['editemail'], $_POST['subject'], $_POST['text']);
		header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/admin.php');
	}
	
	if (!empty($_POST['editconfig'])) {
			$admin->EditConfig($_POST['editconfig'], $_POST['value']);
			header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/admin.php');
	}
	
	if (!empty($_GET['emailedit'])) {
			$smarty->assign('m_admin_edit_email', $admin->GetEmailPrefs($_GET['emailedit']));
	} else {
		
		if (!empty($_GET['configedit'])) {
				$smarty->assign('m_admin_edit_config' , $admin->GetConfigPrefs($_GET['configedit']));
		}
		
		if (!empty($_GET['menuedit'])) {
			$smarty->assign('m_admin_edit_menu', $admin->GetMenuPrefs($_GET['menuedit']));
		}
		
		if ($user->m_user_access['ADMIN'] > 0) {
			$smarty->assign('m_admin_options', $admin->GetAdminPrefs());
		}
	}
	
	if (!empty($user->m_user_id)) {
		$smarty->assign('g_content_area', $smarty->fetch('admin.tpl'));		
	}
}
$smarty->Display('main.tpl');
?>