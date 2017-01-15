<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

require("includes/application_top.php");
require('includes/event.php');
$event = new Event();


if (!empty($_POST['add']) && $user->m_user_access['EVENTADD'] > 0) {
	switch($event->PostEvent($user->m_user_id)) {
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

if (isset($_POST['edit']) && $user->m_user_access['EVENTEDIT'] > 0) {
	switch($event->PostEvent($user->m_user_id, $_POST['edit'])) {
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

if (isset($_GET['delete']) && $user->m_user_access['EVENTDEL'] > 0) {
	$event->Delete($_GET['delete']);
}


if (isset($_GET['edit']) && $user->m_user_access['EVENTEDIT'] > 0) {
		$smarty->assign('m_events_edit', $event->DisplayEvent($_GET['edit'], $user));
} else {
	if (!empty($_GET['add']) && $user->m_user_access['EVENTADD'] > 0) {
		$smarty->assign('m_events_add', '1');
	} else {
		if (isset($_GET['event'])) {
			$smarty->assign('m_events_display', $event->DisplayEvent($_GET['event'], $user));
		} else {
			/* Get all events that have reports */
			$smarty->assign('m_events_list', $event->getEventList($user));
		}
	}
}
$smarty->assign('g_content_area', $smarty->fetch('events.tpl'));
$smarty->Display('main.tpl');
?>