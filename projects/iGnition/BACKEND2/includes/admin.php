<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/
class Admin {
	function GetAdminPrefs() {
			
			$links = array();
		
			$sql = "SELECT `s_id`,`s_name`,`s_used` FROM ".MYSQL_PREFIX."_style";
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			while($row = mysql_fetch_assoc($query)) $link[] = $row;
			$links['themes'] = $link;
			
			$link = array();
			$sql = "SELECT `s_name`,`s_value` FROM ".MYSQL_PREFIX."_config";
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			while($row = mysql_fetch_assoc($query)) $link[] = $row;
			$links['config'] = $link;
			
			$link = array();
			$sql = "SELECT `m_id`,`m_subject`,`m_text` FROM ".MYSQL_PREFIX."_email";
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			while($row = mysql_fetch_assoc($query)) $link[] = $row;
			$links['email'] = $link;
			
			$link = array();
			$dir = opendir('theme');
			while ($file = readdir($dir))  {
				if (!strstr($file, '.')) { // get rid of everything but folders in the directory
					$sql = "SELECT `s_id` FROM ".MYSQL_PREFIX."_style WHERE `s_dir` ='".$file."'";
					$query = mysql_query($sql, CONNECT) or die(mysql_error());
					if (mysql_num_rows($query) == 0) {
						if(include('theme/'.$file.'/index.php')) {							
									$row['s_dir'] = $file;	
									if (!empty($style_name)) $row['s_name'] = $style_name;
									if (!empty($style_description)) $row['s_desc'] = $style_description;
											
						}
						if (!empty($row)) $link[] = $row;
						$style_name = '';
						$style_description = '';
						$file = '';
						$row = array();
					}
				}
			}
			$links['newstyle'] = $link;

			$link = array();
			$sql = "SELECT `l_id`, `l_name`, `l_link`, `l_type`, `m_id` FROM ".MYSQL_PREFIX."_menu ORDER BY `l_id`";
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			while ($row = mysql_fetch_assoc($query)) $link[] = $row;
			$links['menu'] = $link;
			
			$link = array();
			$sql = "SELECT `m_id`, `m_name`, `m_status` FROM ".MYSQL_PREFIX."_modules ORDER BY `m_id`";
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			while ($row = mysql_fetch_assoc($query)) $link[$row['m_id']] = $row;
			$links['modules'] = $link;
			
			return $links;
			
						
	}
	
	function GetMenuPrefs($id) {
		$sql = "SELECT * FROM ".MYSQL_PREFIX."_menu WHERE l_id ='".$id."'";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		return mysql_fetch_assoc($query);
	}
	
	function GetConfigPrefs($id) {
		$sql = "SELECT s_value FROM ".MYSQL_PREFIX."_config WHERE s_name ='".$id."'";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		return $row['s_value'];
	}
	
	function GetEmailPrefs($id) {
		$sql = "SELECT * FROM ".MYSQL_PREFIX."_email WHERE m_id='".$id."'";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		return mysql_fetch_assoc($query);
	}
		
	function EditMenu($id, $name, $link, $type) {
		require_once('post.php');
		$post = new Post();
		if ($type == 4) {
			$sql = "DELETE FROM ".MYSQL_PREFIX."_menu WHERE `l_id`='".$id."'";
			mysql_query($sql, CONNECT) or die(mysql_error());
		} else {
			$sql = "UPDATE ".MYSQL_PREFIX."_menu SET `l_name`='".$post->Text($name)."', `l_link`='".$post->Text($link)."', `l_type`='".$post->Int($type)."' WHERE `l_id`='".$post->Int($id)."'";
			mysql_query($sql, CONNECT) or die(mysql_error());
			$sql = "OPTIMIZE TABLE `".MYSQL_PREFIX."_menu`";
			mysql_query($sql, CONNECT) or die(mysql_error());
		}
		
	}
	
	function EditEmail($id, $subject, $text) {
		require_once('post.php');
		$post = new Post();
		$sql = "UPDATE ".MYSQL_PREFIX."_email SET `m_subject` = '".$post->Text($subject)."', `m_text` = '".$post->Text($text)."' WHERE `m_id`='".$post->Int($id)."'";
		mysql_query($sql, CONNECT) or die(mysql_error());
	}
	
	function EditConfig($id, $value) {
		require_once('post.php');
		$post = new Post();
		$sql = "UPDATE ".MYSQL_PREFIX."_config SET `s_value`='".$post->Text($value)."' WHERE `s_name`='".$post->Text($id)."'";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
	}
	
	function EditStyle($id) {
		require_once('post.php');
		$post = new Post();
		$sql = "UPDATE ".MYSQL_PREFIX."_style SET `s_used`='0'";
		mysql_query($sql, CONNECT) or die(mysql_error());
		$sql = "UPDATE ".MYSQL_PREFIX."_style SET `s_used`='1' WHERE `s_id`='".$post->Int($id)."'";
		mysql_query($sql, CONNECT) or die(mysql_error());
	}
	
	function AddMenu($name, $link, $type) {
		require_once('post.php');
		$post = new Post();
		$sql = "INSERT INTO ".MYSQL_PREFIX."_menu (`l_id`, `l_name`, `l_link`, `l_type`, `m_id`) VALUES (NULL, '".$post->Text($name)."', '".$post->Text($link)."', '".$post->Int($type)."', NULL)";
		mysql_query($sql, CONNECT) or die(mysql_error());
	}
	
	function AddStyle($id) {
		require_once('post.php');
		$post = new Post();
		require_once('theme/'.$id.'/index.php');
		$sql = "INSERT INTO ".MYSQL_PREFIX."_style (`s_name`, `s_dir`, `s_used`) VALUES ('".$post->Text($style_name)."', '".$post->Text($id)."', '0')";
		mysql_query($sql, CONNECT) or die(mysql_error());
	}
}
?>