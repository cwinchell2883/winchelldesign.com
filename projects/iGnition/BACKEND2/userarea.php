<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

require_once("includes/application_top.php");


if (!empty($user->m_user_id)) {
	
		if (!empty($_GET['action'])) {
			switch($_GET['action']) {
				case 'logout':
						$user->Logout();
						header('Location: index.php');
						return;
				break;			
			}
		}
		
		
		if (!empty($_GET['page'])) {
			switch($_GET['page']) {
				case 'editpic':
						$smarty->assign('m_user', $user->EditUserBio());
						$smarty->assign('m_panel_select', 'userbio');
				break;
				case 'editpass':
						$smarty->assign('m_panel_select','userpass');
				break;
				default:
						$smarty->assign('m_panel_menu', '1');
				break;
			}
			$smarty->assign('g_content_area', $smarty->fetch('user.tpl'));
		} else {
			$smarty->assign('g_content_area', $smarty->fetch('control_panel.tpl'));
		}
}
$smarty->Display('main.tpl');


?>