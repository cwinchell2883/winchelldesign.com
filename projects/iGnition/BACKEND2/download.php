<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

require("includes/application_top.php");
require("includes/filec.php");

$file = new File;

if (isset($_GET['delete']) && $user->m_user_access['FILEDEL'] > 0) {
	$file->Delete($_GET['delete'], $_GET['id']);
	$file->OptimizeTables();
}

if (!empty($_POST['add']) && $user->m_user_access['FILEADD'] > 0) {
	if ($_POST['add'] == 'file') {
		switch($file->PostFile($user->m_user_id)) {
			case 'fileerror':
					$smarty->assign('g_error', $smarty->get_template_vars('g_lang_file_error'));
			break;
			case 'emptyerror':
					$smarty->assign('g_error', $smarty->get_template_vars('g_lang_file_missing'));
			break;
			case 'nonameerror':
					$smarty->assign('g_error', $smarty->get_template_vars('g_lang_file_noname'));
			break;
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
	} else {
		$file->PostFolder(); // add new folder
	}
}

if (isset($_POST['edit']) && $user->m_user_access['FILEEDIT'] > 0) {
	if ($_POST['edit'] == 'file') {
		switch($file->PostFile($user->m_user_id, $_POST['id'])) {
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
	} else {
		$file->PostFolder($_POST['id']);
	}
}

if (isset($_GET['fo'])) $smarty->assign('m_folder_list', $file->BacktrackFolder($_GET['fo']));

if (isset($_GET['edit']) && $user->m_user_access['FILEEDIT'] > 0) {
		if ($_GET['edit'] == 'file') {
			$smarty->assign('m_file_edit', $file->DisplayFile($_GET['id'], $user->m_user_id));
		} else {
			$smarty->assign('m_folder_edit', $file->DisplayFolder($_GET['id']));
		}
	
} else {
		if (!empty($_GET['add']) && $user->m_user_access['FILEADD'] > 0) {
				if ($_GET['add'] == 'file') {
					$smarty->assign('m_file_add', '1');
				} else {
					$smarty->assign('m_folder_add', '1');
				}
		} else {
				if (isset($_GET['f']))	{
						$file->DownloadFile($_GET['f'], $user->m_user_id); 
				}
				if (isset($_GET['d'])) {
						$smarty->assign('m_file_display', $file->DisplayFile($_GET['d'], $user->m_user_id));		
				} else {
						if (!isset($_GET['fo'])) $_GET['fo'] = 0;
						$smarty->assign('m_file_list', $file->ListFiles($_GET['fo'], $user->m_user_id));
				}
		}
}
	

$smarty->assign('g_content_area', $smarty->fetch('files.tpl'));
$smarty->Display('main.tpl');

?>

