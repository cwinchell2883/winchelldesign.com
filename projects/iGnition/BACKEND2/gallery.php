<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

require("includes/application_top.php");
require("includes/galleryc.php");

if (empty($_GET['fo'])) $_GET['fo'] = 0;
$gallery = new Gallery;

if (!empty($_POST['add']) && $user->m_user_access['SCRNADD'] > 0) {
	if ($_POST['add'] == 'photo') {
		switch($gallery->PostPhoto($user->m_user_id)) {
			case 'error:format':
	 			$smarty->assign('g_error', $smarty->get_template_vars('g_lang_image_wrong_type'));
	 		break;
	 		case 'error:size':
	 			$smarty->assign('g_error', $smarty->get_template_vars('g_lang_image_size'));
	 		break;
	 		case 'error:copy':
	 			$smarty->assign('g_error', $smarty->get_template_vars('g_lang_image_error'));
	 		break;
	 		case 'error:empty':
	 			$smarty->assign('g_error', $smarty->get_template_vars('g_lang_image_none'));
	 		break;
		}
	} else {
		$gallery->PostFolder();
	}
}

if (isset($_GET['delete']) && $user->m_user_access['SCRNDEL'] > 0) {
	if ($_GET['delete'] == 'photo') {
		$gallery->Delete('photo', $_GET['id']);
	} else {
		$gallery->Delete('folder', $_GET['id']);
	}
}

if (!empty($_GET['add']) && $user->m_user_access['SCRNADD'] > 0) {
	if ($_GET['add'] == 'photo') {	
		$smarty->assign('m_photo_add','1');
	} else {
		$smarty->assign('m_folder_add', '1');
	}
} else {
	if (isset($_GET['p'])) { 
			$smarty->assign('m_gallery_display', $gallery->DisplayPictures($_GET['p'], $user->m_user_id));
	} else {
			$smarty->assign('m_gallery_list', $gallery->ListPictures($_GET['fo'], $user->m_user_id));
	}
}

$smarty->assign('m_folder_list', $gallery->BacktrackFolder($_GET['fo']));
$smarty->assign('g_content_area', $smarty->fetch('gallery.tpl'));
$smarty->Display('main.tpl');

?>