<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

class Event {
	function getEventList($user) {
		if (!empty($user->m_user_id) && $user->m_user_access['EVENTVIEW'] > 0) {
			$sql = "SELECT * FROM ".MYSQL_PREFIX."_events ORDER BY `e_date` DESC";
		} else {
			$sql = "SELECT * FROM ".MYSQL_PREFIX."_events WHERE `e_public`='1' ORDER BY `e_date` DESC";
		}
		
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		while ($row = mysql_fetch_assoc($query)) $links[] = $row;
		if (empty($links)) $links = 'NULL';
		return $links;
	}
	
	function DisplayEvent($id, $user) {
		require_once('post.php');
		$post = new Post();
		if (!empty($user->m_user_id) && $user->m_user_access['EVENTVIEW'] > 0) {
			$sql = "SELECT * FROM ".MYSQL_PREFIX."_events WHERE `e_id`= '".$post->Int($id)."'";
		} else {
			$sql = "SELECT * FROM ".MYSQL_PREFIX."_events WHERE `e_public`='1' AND `e_id`= '".$post->Int($id)."'";
		}
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		return mysql_fetch_assoc($query);
	}
	
	function PostEvent($userId, $eventId='') {
		if (!empty($userId) && !empty($_POST['startdate']) && !empty($_POST['name']) && !empty($_POST['description'])) {		
			require_once('post.php');
			$post = new Post();
			$date = explode("-",$_POST['startdate']);
			if (empty($_POST['public'])) $_POST['public']=0;
			
			
			
			if ($eventId != '') {
				// edit event
				$sql = "UPDATE ".MYSQL_PREFIX."_events SET `e_name`='".$post->Text($_POST['name'])."', `e_desc`='".$post->Text($_POST['description'])."', `e_date`='".$post->Int($date[2])."-".$post->Int($date[1])."-".$post->Int($date[0])." 00:00:00', `e_public` = '".$post->Int($_POST['public'])."', `e_report`='".$post->Text($_POST['report'])."' WHERE `e_id`='".$post->Int($eventId)."'";
			} else {
				// add new event
				$sql = "SHOW TABLE STATUS LIKE '".MYSQL_PREFIX."_events'";
				$query = mysql_query($sql, CONNECT) or die(mysql_error());
				$row = mysql_fetch_assoc($query);
				$eventId = $row['Auto_increment']; // Get this event's id before its created
				$sql = "INSERT INTO ".MYSQL_PREFIX."_events (`e_name`, `e_desc`, `e_date`, `e_img`, `u_id`, `e_report`, `e_public`) VALUES ('".$post->Text($_POST['name'])."', '".$post->Text($_POST['description'])."',  '".$post->Int($date[2])."-".$post->Int($date[1])."-".$post->Int($date[0])." 00:00:00', NULL,'".$post->Int($userId)."', NULL, '".$post->Int($_POST['public'])."')";		
			}
			mysql_query($sql, CONNECT) or die(mysql_error());

			$image = $post->Image($_FILES['image'], 'events/', $eventId);	
			if (strstr($image, 'error:') && $image != 'error:empty') { 
				return $image;
			}
			if ($image == 'error:empty' && !empty($_POST['weblink'])) {
				$image = $_POST['weblink'];
			}
			
			if (!empty($image) && $image != 'error:empty') {
				$sql = "UPDATE ".MYSQL_PREFIX."_events SET `e_img`='".$post->Text($image)."' WHERE `e_id`='".$post->Int($eventId)."'";
			} else {
				$sql = "SELECT `s_value` FROM ".MYSQL_PREFIX."_config WHERE `s_name`='photodefault'";
				$query = mysql_query($sql, CONNECT) or die(mysql_error());
				$row = mysql_fetch_array($query);
				$sql = "UPDATE ".MYSQL_PREFIX."_events SET `e_img`='".$row['s_value']."' WHERE `e_id`='".$post->Int($eventId)."'";
			}
			mysql_query($sql, CONNECT) or die(mysql_error());
		}
	}
	
	function Delete($id) {
		require_once('post.php');
		$post = new Post();
		$sql = "DELETE FROM ".MYSQL_PREFIX."_events WHERE `e_id`='".$post->Int($id)."'";
		mysql_query($sql, CONNECT) or die(mysql_error());
		$this->Optimize();
	}
	
	function Optimize() {
		$sql = "OPTIMIZE TABLE `pcm_events`";
		mysql_query($sql, CONNECT) or die(mysql_error());
	}
}
?>