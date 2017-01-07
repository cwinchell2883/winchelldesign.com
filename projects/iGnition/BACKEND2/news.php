<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

require("includes/application_top.php");
require("includes/news.php");
$news = new News();


if (isset($_POST['edit']) && $user->m_user_access['NEWSEDIT'] > 0) {
		$news->Post($user->m_user_id,$_POST['edit']);
}
	
if (!empty($_POST['add']) && $user->m_user_access['NEWSADD'] > 0) {	
	$news->Post($user->m_user_id); 
}

if (isset($_GET['delete']) && $user->m_user_access['NEWSDEL'] > 0) {
	$news->Delete($_GET['delete']);
}

	
if (isset($_GET['news']) && $_GET['news'] != 'add') {	
	$smarty->assign('m_news_archive', $news->NewsDisplay($_GET['news']));
} else {
	if (isset($_GET['edit']) && $user->m_user_access['NEWSEDIT'] > 0) {
			$smarty->assign('m_news_edit', $news->Edit($_GET['edit'])); // Show the news editing page
	} else {
		if (!empty($_GET['news']) && $_GET['news'] == 'add' && $user->m_user_access['NEWSADD'] > 0) {
					$smarty->assign('m_news_add', '1'); // Show the news add page
		} else {
			$smarty->assign('m_news_list', $news->NewsList());
		}
	}
}

$smarty->assign('g_content_area', $smarty->fetch('news.tpl'));
$smarty->Display('main.tpl');
?>