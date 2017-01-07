<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/
class Chat {
		function displayChat() {
		/* This function needs a home :( */
		$username = array();
		$sql = "SELECT `u_id`, `u_name` FROM `".MYSQL_PREFIX."_users` GROUP BY `u_id` ASC";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		while($user = mysql_fetch_assoc($query)) $username[$user['u_id']] = $user['u_name'];
	
		$link = array();
		$sql = "SELECT * FROM `".MYSQL_PREFIX."_chat` ORDER BY `c_date` ASC";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		while($row = mysql_fetch_assoc($query)) {
			if (!empty($row['u_id'])) $row['u_name'] = $username[$row['u_id']];
			$link[] = $row;
		}
		return $link;
	}
	
	function postChat($text, $user) {
		require_once('post.php');
		$post = new Post();
		
		$sql = "SELECT `s_value` FROM ".MYSQL_PREFIX."_config WHERE `s_name`='chatlength'";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		$chatlength = $row['s_value'];
		
		$sql = "SELECT * FROM `".MYSQL_PREFIX."_chat`";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		$numrow = mysql_num_rows($query) + 1;
		if ($numrow > $chatlength) {
			$sql = "DELETE FROM `".MYSQL_PREFIX."_chat` ORDER BY `c_date` ASC LIMIT ".($numrow-$chatlength)."";
			mysql_query($sql, CONNECT) or die(mysql_error());
		}
		
		
		if (!empty($user->m_user_id)) {
			$userId = "'".$post->Int($user->m_user_id)."'";
			$ip = 'NULL';
		} else {
				$userId = 'NULL';
				// get the users ip.
				if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
					if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
							 $proxy = $_SERVER["HTTP_CLIENT_IP"];
					} else {
					   		 $proxy = $_SERVER["REMOTE_ADDR"];
					}
					$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
				} else {
						if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
						   $ip = $_SERVER["HTTP_CLIENT_IP"];
						} else {
						   $ip = $_SERVER["REMOTE_ADDR"];
						}
				}
				if (!empty($proxy)) $ip = $proxy;
				$ip = "'".$ip."'";
		}
		$sql = "INSERT INTO ".MYSQL_PREFIX."_chat (`c_text`, `u_id`, `u_ip`, `c_date`) VALUES ('".$post->Text($text)."', ".$userId.", ".$ip.", NOW())"; // Int checking is done above
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		
	}
}
?>