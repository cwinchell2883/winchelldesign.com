<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

require_once('includes/application_top.php');
require_once('includes/rank.php');
$rank = new Rank();

if (!empty($_POST['add']) && $user->m_user_access['RANKADD'] > 0) {
	switch($rank->PostRank()) { 
		case 'error:format':
	 		$smarty->assign('g_error', $smarty->get_template_vars('g_lang_image_wrong_type'));
	 	break;
	 	case 'error:size':
	 		$smarty->assign('g_error', $smarty->get_template_vars('g_lang_image_size'));
	 	break;
	 	case 'error:copy':
	 		$smarty->assign('g_error', $smarty->get_template_vars('g_lang_image_error'));
	 	break;
	}	
	
}
if (!empty($_POST['edit']) && $user->m_user_access['RANKEDIT'] > 0) {
	switch($rank->PostRank($_POST['edit'])) { 
		case 'error:format':
			$smarty->assign('g_error', $smarty->get_template_vars('g_lang_image_wrong_type'));
	 	break;
	 	case 'error:size':
	 		$smarty->assign('g_error', $smarty->get_template_vars('g_lang_image_size'));
	 	break;
	 	case 'error:copy':
	 		$smarty->assign('g_error', $smarty->get_template_vars('g_lang_image_error'));
	 	break;
	}
}
if (!empty($_GET['delete']) && $user->m_user_access['RANKDEL'] > 0) $rank->Delete($_GET['delete']);



if (!empty($_GET['edit']) && $user->m_user_access['RANKEDIT'] > 0) {
	$smarty->assign('m_rank_edit', $rank->getRankVars($_GET['edit']));
	$smarty->assign('m_rank_vars', $rank->ListRankVars());
} else {
	if (!empty($_GET['add']) && $user->m_user_access['RANKADD'] > 0) {
		$smarty->assign('m_rank_add', '1');
		$smarty->assign('m_rank_vars', $rank->ListRankVars());	
	} else {
		$smarty->assign('m_rank_list', $rank->ListRanks());
	}
}

$smarty->assign('g_content_area', $smarty->fetch('rank.tpl'));
$smarty->Display('main.tpl');
?>