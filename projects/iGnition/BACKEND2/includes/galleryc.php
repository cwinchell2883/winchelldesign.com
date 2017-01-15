<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

class Gallery {
	
	
	function Delete($type, $id) {
		require_once('post.php');
		$post = new Post();
		if ($type == "photo") {
			$sql = "SELECT `p_loc` FROM ".MYSQL_PREFIX."_gallery_photos WHERE p_id='".$post->Int($id)."'";
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			$row = mysql_fetch_assoc($query);
				
			$sql = "SELECT `s_value` FROM ".MYSQL_PREFIX."_config WHERE `s_name`='photodefault' LIMIT 1";
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			$default = mysql_fetch_assoc($query);
			if ($row['p_loc'] != $default['s_value']) {
				// is not the default preview image
				if (file_exists($row['p_loc'])) {
					unlink($row['p_loc']);
				}
			}

			$sql = "DELETE FROM ".MYSQL_PREFIX."_gallery_photos WHERE `p_id` ='".$post->Int($id)."'";
			mysql_query($sql, CONNECT) or die(mysql_error());
		}
		if ($type == "folder") {
			// Delete any existing folders inside
			$sql = "SELECT `g_id` FROM ".MYSQL_PREFIX."_gallery WHERE g_pos='".$post->Int($id)."'";
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			while ($row = mysql_fetch_array($query)) {
				$this->Delete('folder', $row['g_id']);
			}
			// Delete any existing files inside
			$sql = "SELECT `p_id` FROM ".MYSQL_PREFIX."_gallery_photos WHERE g_id ='".$post->Int($id)."'";
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			while ($row = mysql_fetch_array($query)) {
				$this->Delete('photo', $row['p_id']);
			}
			$sql = "DELETE FROM ".MYSQL_PREFIX."_gallery WHERE g_id = '".$post->Int($id)."'";
			mysql_query($sql, CONNECT) or die(mysql_error());
		}
		$this->OptimizeTables();
	}
	
	function PostFolder($id='') {
		require_once('post.php');
		$post = new Post();
		
		if (!empty($id)) {
			
		} else {
			require_once('post.php');
			$post = new Post();
			if (!empty($_POST['name'])) {
				if (empty($_POST['public'])) $_POST['public'] = 0;
				$sql = "INSERT INTO ".MYSQL_PREFIX."_gallery (`g_id`, `g_name`, `g_desc`, `g_pos`, `g_public`) VALUES (NULL,'".$post->Text($_POST['name'])."', '".$post->Text($_POST['description'])."', '".$post->Int($_POST['folder'])."', '".$post->Int($_POST['public'])."')";
				mysql_query($sql, CONNECT) or die(mysql_error());
			}
		}
	}
		
	
	function PostPhoto($userId, $id='') {
		require_once('post.php');
		$post = new Post();
		if (empty($_POST['public'])) $_POST['public'] = 0;
		
		if (!empty($_POST['name'])) {	
			if(!empty($id)) {
			 	
			} else {
				$sql = "SHOW TABLE STATUS LIKE '".MYSQL_PREFIX."_gallery_photos'";
				$query = mysql_query($sql, CONNECT) or die(mysql_error());
				$row = mysql_fetch_assoc($query);
				$url = $post->Image($_FILES['image'], 'gallery/', $row['Auto_increment']);
				if (strstr($url, 'error:')) { 
					if (!empty($_POST['weblink'])) {
						if (strstr($_POST['weblink'], 'http://')) {
							$url = $_POST['weblink'];
						} else {
							$url = 'http://'.$_POST['weblink'];
						}
					} else {
						return $url;
					}
				}		
				$sql = "INSERT INTO ".MYSQL_PREFIX."_gallery_photos (`p_id`, `g_id`, `p_name`, `p_desc`, `p_date`, `u_id`, `p_loc`, `p_view`, `p_public`) VALUES (NULL, '".$post->Int($_POST['folder'])."', '".$post->Text($_POST['name'])."', '".$post->Text($_POST['description'])."', NOW(), '".$post->Int($userId)."', '".$post->Text($url)."', '0', '".$post->Int($_POST['public'])."')";
				mysql_query($sql, CONNECT) or die(mysql_error());		 
		}	}
	}
	
	function DisplayPictures($id, $userId) {
		require_once('post.php');
		$post = new Post();
		if (!empty($userId)) {
			$sql = "UPDATE ".MYSQL_PREFIX."_gallery_photos SET `p_view`=`p_view`+1 WHERE `p_id` ='".$post->Int($id)."'";
		} else {
			$sql = "UPDATE ".MYSQL_PREFIX."_gallery_photos SET `p_view`=`p_view`+1 WHERE `p_public`='1' AND `p_id` ='".$post->Int($id)."'";
		}
		$query = mysql_query($sql, CONNECT);
		
		if (!empty($userId)) {
			$sql = "SELECT `p_loc` FROM ".MYSQL_PREFIX."_gallery_photos WHERE `p_id` ='".$post->Int($id)."'";
		} else {
			$sql = "SELECT `p_loc` FROM ".MYSQL_PREFIX."_gallery_photos WHERE `p_public`='1' AND `p_id` ='".$post->Int($id)."'";
		}
		
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		while ($link = mysql_fetch_assoc($query)) $links[] = $link; 
		return $links;	
	}

	function BacktrackFolder($id) {
		require_once('post.php');
		$post = new Post();
		$links = array();
		while($id != '') {
			if (!empty($id)) {
				$sql = "SELECT `g_name`,`g_pos` FROM ".MYSQL_PREFIX."_gallery WHERE g_id = '".$post->Int($id)."'";
				$query = mysql_query($sql, CONNECT) or die(mysql_error());
				$row = mysql_fetch_assoc($query);
				$folder['name'] = $row['g_name'];
				$folder['id'] = $id;
				$links[] = $folder;
				$id = $row['g_pos'];
			} else {
				return array_reverse($links);
			}
		}
		return array_reverse($links);
	}

	function ListPictures($folderId, $userId) {

		$links = array();
		require_once('post.php');
		$post = new Post();
		
		// Get a list all users so we don't have to keep calling up the database
		$sql = "SELECT `u_id`, `u_name` FROM `".MYSQL_PREFIX."_users` GROUP BY u_id ASC";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		while ($user = mysql_fetch_assoc($query)) $users[$user['u_id']] = $user['u_name'];
		
		if (!empty($folderId)) {
			if (!empty($userId)) {
				$sql = "SELECT `g_id`,`g_name`,`g_desc` FROM ".MYSQL_PREFIX."_gallery WHERE `g_pos`='".$post->Int($folderId)."'";
				$folderId = "='".$post->Int($folderId)."'";
			} else {
				$sql = "SELECT `g_id`,`g_name`,`g_desc` FROM ".MYSQL_PREFIX."_gallery WHERE `g_public`='1' AND `g_pos`='".$post->Int($folderId)."'";
				$folderId = "='".$post->Int($folderId)."' AND `p_public` = '1'";
			}
		} else {
			if (!empty($userId)) {
				$sql = "SELECT `g_id`,`g_name`,`g_desc` FROM ".MYSQL_PREFIX."_gallery WHERE `g_pos` IS NULL OR `g_pos`='0'";
				$folderId = "IS NULL OR `g_id`='0'";
			} else {
				$sql = "SELECT `g_id`,`g_name`,`g_desc` FROM ".MYSQL_PREFIX."_gallery WHERE `g_public`='1' AND (`g_pos` IS NULL OR `g_pos`='0')";
				$folderId = "IS NULL OR `g_id`='0' AND `p_public`='1'";
			}	
		}
		
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		while ($link = mysql_fetch_assoc($query)) $links[] = $link;
		
		
		$sql = "SELECT * FROM ".MYSQL_PREFIX."_gallery_photos WHERE `g_id` ".$folderId; /* int checking performed above */
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		while ($link = mysql_fetch_assoc($query)) {
			$link['u_name'] = $users[$link['u_id']];
			$links[] = $link; 
		}
			
		if (empty($links)) $links = 'NULL';
		return $links;
	}
	
	function OptimizeTables() {
		$sql = "OPTIMIZE TABLE `pcm_gallery`";
		mysql_query($sql, CONNECT) or die(mysql_error());
		$sql = "OPTIMIZE TABLE `pcm_gallery_photos`";
		mysql_query($sql, CONNECT) or die(mysql_error());
	}
		 
}