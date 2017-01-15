<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

require_once("includes/application_top.php");

if (!empty($_POST['changepass']) && !empty($user->m_user_id)) {
			switch ($user->EditPassword()) {
				case 1:
					$smarty->assign('g_error', $smarty->get_template_vars('g_lang_pass_wrong'));
					$_GET['page'] = 'editpass';
				break;
				case 2:
					$smarty->assign('g_error', $smarty->get_template_vars('g_lang_pass_nomatch'));
					$_GET['page'] = 'editpass';
				break;
				case 3:
					$smarty->assign('g_error', $smarty->get_template_vars('g_lang_pass_format'));
					$_GET['page'] = 'editpass';
				break;
			}
			require('userarea.php');
			exit;
}


if (!empty($_POST['userbio']) && !empty($user->m_user_id)) {
	 switch($user->EditProfile()) {
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
	 $_GET['page'] = 'editpic';
	 require("userarea.php");
	 exit;
}

if (!empty($_POST['newpass'])) {
	if ($user->m_user_access['USEREDIT'] > 0) {
		switch ($result = $user->GeneratePassword($_POST['newpass'])) {
			case 'mailerr':
				$smarty->assign('g_error', $smarty->get_template_vars('g_lang_email_error'));
			break;
			case 'mailsyn':
				$smarty->assign('g_error', $smarty->get_template_vars('g_lang_email_wrong'));
			break;
			default:
				$smarty->assign('g_error', $smarty->get_template_vars('g_lang_pass_changed').'&nbsp;'.$result);
			break;
		}
	}
}

if (!empty($_POST['changerank'])) {
		if ($user->m_user_access['USEREDIT'] > 0) {
			switch($user->PromoteUser($_POST['changerank'], $_POST['rank'])) {
				case 'toohigh':
					$smarty->assign('g_error', $smarty->get_template_vars('g_lang_user_toohigh'));
				break;
				case 'toolow':
					$smarty->assign('g_error', $smarty->get_template_vars('g_lang_user_toolow'));
				break;
			}
		}
}

if (!empty($_GET['delete']) && $user->m_user_access['USERDEL'] > 0) $user->DeleteUser($_GET['delete']); 
if (!empty($_POST['add']) && $user->m_user_access['USERADD'] > 0) {
	$result = $user->AddUser();
	switch ($result) {
		case 'mailerr':
				$smarty->assign('g_error', $smarty->get_template_vars('g_lang_email_error'));
		break;
		case 'mailsyn':
				$smarty->assign('g_error', $smarty->get_template_vars('g_lang_email_wrong'));
		break;
		case 'empty':
				$smarty->assign('g_error', $smarty->get_template_vars('g_lang_form_unfilled'));
		break;
		case 'invalid':
				$smarty->assign('g_error', $smarty->get_template_vars('g_lang_user_invalid'));
		break;
		case 'exists':
				$smarty->assign('g_error', $smarty->get_template_vars('g_lang_user_exists'));
		break;
		default:
				$smarty->assign('g_error', $smarty->get_template_vars('g_lang_user_created').'&nbsp;'.$result);
		break;
	}
}

if (empty($_GET['user'])) {	
		if (!empty($_GET['add'])) {
			if ($user->m_user_access['USERADD'] > 0) $smarty->assign('m_user_add', '1');		
		} else {
			if (!empty($_GET['edit'])) {
				if ($user->m_user_access['USEREDIT'] > 0) {
					$smarty->assign('m_user_edit', $user->UserInfo($_GET['edit']));
					$smarty->assign('m_user_edit_rank', $user->ListRanks());
				}
			} else {	
				$smarty->assign('m_user_list', $user->ListUsers());
			}
		}
} else {
	$smarty->assign('m_user_bio', $user->UserInfo($_GET['user']));
}
$smarty->assign('g_content_area', $smarty->fetch('user.tpl'));
$smarty->Display('main.tpl');
?>