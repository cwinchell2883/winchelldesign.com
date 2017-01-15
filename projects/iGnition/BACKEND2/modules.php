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
	require('includes/modulec.php');
	$module = new Module();
	
	if (!empty($_GET['disable'])) {
		$module->disable($_GET['disable']);
		require("includes/application_top.php");
	}
	
	if (!empty($_GET['enable'])) {
		$module->enable($_GET['enable']);
		require("includes/application_top.php");
	}
	
	$smarty->assign('m_module_list', $module->getModuleList());
	$smarty->assign('g_content_area', $smarty->fetch('modules.tpl'));
}
$smarty->Display('main.tpl');

?>