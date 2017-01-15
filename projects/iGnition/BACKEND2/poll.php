<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

require("includes/application_top.php");
require("includes/pollc.php");
$poll = new Poll;


if (isset($_GET['delete'])) {
	if ($user->m_user_access['POLLDEL'] > 0) {
		$poll->DeletePoll($_GET['delete']);
	}
}

if (!empty($_POST['add'])) {
		if ($user->m_user_access['POLLADD'] > 0) {
			$poll->PostPoll($user->m_user_id);
		}
}

if (empty($_GET['add'])) {
	if (isset($_POST['poll'])) {
			if (!empty($user->m_user_id) || $poll->isPublic($_POST['poll'])) {
					$poll->PollAddVote($_POST['poll'], $user);
			} 
			$smarty->assign('m_poll_view', $poll->PollView($_POST['poll'],$user));	
	} else {
			if (isset($_GET['view'])) {
							$smarty->assign('m_poll_view', $poll->PollView($_GET['view'], $user));
			} else {
							if (isset($_GET['poll'])) {
									if (!empty($user->m_user_id) || $poll->isPublic($_GET['poll']))
									{
											$smarty->assign('m_poll_vote', $poll->PollView($_GET['poll'], $user));
									} else {
											$smarty->assign('m_poll_view', $poll->PollView($_GET['poll'], $user));
									}
							} else {
									$smarty->assign('m_poll_list', $poll->PollList($user));
							}
			}
	}
} else {
	if ($user->m_user_access['POLLADD'] > 0) {
		$smarty->assign('m_poll_add', '1');
	}
}

$smarty->assign('g_content_area', $smarty->fetch('poll.tpl'));
$smarty->Display('main.tpl');
?>