<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

class Module {
	function getModuleList() {
		$link = array();
		$links = array();
		$sql = "SELECT * FROM ".MYSQL_PREFIX."_modules ORDER BY `m_id`";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		while($row = mysql_fetch_assoc($query)) $link[] = $row;
		$links['modules'] = $link;
		$link = '';
		
		$dir = opendir('mods');
		while ($file = readdir($dir))  {
			if (!strstr($file, '.')) { // get rid of everything but folders in the directory
				$sql = "SELECT `m_id` FROM ".MYSQL_PREFIX."_modules WHERE `m_dir` ='".$file."'";
				$query = mysql_query($sql, CONNECT) or die(mysql_error());
				if (mysql_num_rows($query) == 0) {
					if(include('mods/'.$file.'/install.php')) {							
								$row['m_dir'] = $file;	
								if (!empty($module_name)) $row['m_name'] = $module_name;
								if (!empty($module_description)) $row['m_desc'] = $module_description;
								if (!empty($module_version)) $row['m_version'] = $module_version;
								if (!empty($module_author)) $row['m_author'] = $module_author;
					}
					if (!empty($row)) $link[] = $row;
					$file = '';
					$module_name = '';
					$module_description = '';
					$module_version = '';
					$module_author = '';
					$row = array();
				}
			}
		}
		$links['newmodules'] = $link;
		return $links;
	}
	
	function disable($id) {
		require_once('post.php');
		$post = new Post();
		if ($id > 4) {
			$sql = "UPDATE ".MYSQL_PREFIX."_modules SET `m_status` = '0' WHERE `m_id`='".$post->Int($id)."'";
			mysql_query($sql, CONNECT) or die(mysql_error());
		}
	}
	
	function enable($id) {
		require_once('post.php');
		$post = new Post();
		$sql = "UPDATE ".MYSQL_PREFIX."_modules SET `m_status` = '1' WHERE `m_id`='".$post->Int($id)."'";
		mysql_query($sql, CONNECT) or die(mysql_error());
	}
}

?>