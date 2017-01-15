<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/
class File {
	function DisplayFile($id, $userId) {
			require_once('post.php');
			$post = new Post();
			$sql = "SELECT * FROM ".MYSQL_PREFIX."_download_files WHERE f_id ='".$post->Int($id)."'";
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			if ($link = mysql_fetch_array($query)) {
				/* get the users name */
				$sql = "SELECT u_name FROM ".MYSQL_PREFIX."_users WHERE u_id ='".$post->Int($link['u_id'])."'";
				$query = mysql_query($sql, CONNECT) or die(mysql_error());
				$name = mysql_fetch_assoc($query);
				$link['u_name'] = $name['u_name'];
				if (empty($userId) && empty($link['f_public'])) {				
					$link['f_loc'] = "#";
				}
			}
			return $link;
	}


	function DownloadFile($id, $userId)	{
			// $id = files id
			require_once('post.php');
			$post = new Post();
			
			$sql = "SELECT `f_loc`, `f_public` FROM ".MYSQL_PREFIX."_download_files WHERE f_id='".$post->Int($id)."'";
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			$row = mysql_fetch_assoc($query);
			if (!empty($userId) || $row['f_public'] > 0) {
				// Update the download counter
				$sql = "UPDATE ".MYSQL_PREFIX."_download_files SET f_down = f_down + 1  WHERE f_id ='".$post->Int($id)."'";
				$query = mysql_query($sql, CONNECT) or die(mysql_error());
				// give the user the download
				header("Location: ".$row['f_loc']);
			}			
	}
	
	/*function FolderName($id) {
		$sql = "SELECT d_name FROM ".MYSQL_PREFIX."_download WHERE d_id = '".$id."'";
		$query = mysql_query($sql, CONNECT);
		$row = mysql_fetch_assoc($query);
		return $row['d_name'];
	}*/
	function DisplayFolder($id) {
		require_once('post.php');
		$post = new Post();
		
		$sql = "SELECT * FROM ".MYSQL_PREFIX."_download WHERE d_id = '".$post->Int($id)."'";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		return mysql_fetch_assoc($query);
	}
	
	function BacktrackFolder($id) {
		require_once('post.php');
		$post = new Post();
			
		$links = array();
		while($id != '') {
			if (!empty($id)) {
				$sql = "SELECT `d_name`,`d_pos` FROM ".MYSQL_PREFIX."_download WHERE d_id = '".$post->Int($id)."'";
				$query = mysql_query($sql, CONNECT) or die(mysql_error());
				$row = mysql_fetch_assoc($query);
				$folder['name'] = $row['d_name'];
				$folder['id'] = $id;
				$links[] = $folder;
				$id = $row['d_pos'];
			} else {
				return array_reverse($links);
			}
		}
		return array_reverse($links);
	}

	function ListFiles($id, $userId) {
		$links[] = array();
		if (empty($id)) $id = 0;
		require_once('post.php');
		$post = new Post();
		
		/* Ping the list of folders */
		if (!empty($userId)) {
			$sql = "SELECT `d_id`,`d_name`,`d_desc` FROM ".MYSQL_PREFIX."_download WHERE `d_pos` ='".$post->Int($id)."'";
		} else {
			$sql = "SELECT `d_id`,`d_name`,`d_desc` FROM ".MYSQL_PREFIX."_download WHERE `d_public`='1' AND `d_pos` ='".$post->Int($id)."'";
		}
		$query = mysql_query($sql, CONNECT) or die(mysql_error());		
		while ($link = mysql_fetch_assoc($query)) $links[] = $link; 
		
		if (!empty($id)) {	/* is in folder */
	
			if (!empty($userId)) {
				$sql = "SELECT * FROM ".MYSQL_PREFIX."_download_files WHERE `d_id` ='".$post->Int($id)."'";
			} else {
				$sql = "SELECT * FROM ".MYSQL_PREFIX."_download_files WHERE `f_public`='1' AND `d_id` ='".$post->Int($id)."'";
			}
			
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
		
			while ($link = mysql_fetch_assoc($query)) $links[] = $link; 		
		} else { /* not in folder */
		
			if (!empty($userId)) {
				$sql = "SELECT * FROM ".MYSQL_PREFIX."_download_files WHERE `d_id` IS NULL";
			} else {
				$sql = "SELECT * FROM ".MYSQL_PREFIX."_download_files WHERE `f_public` = '1' AND `d_id` IS NULL";
			}
			
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			while ($link = mysql_fetch_assoc($query)) $links[] = $link; 
		}
		return $links;
	}

	function PostFolder($folderId='') {
		require_once("post.php");
		$post = new Post;
		if (empty($_POST['public'])) $_POST['public']=0;
		if(!empty($folderId)) {
			// edit folder
			$sql = "UPDATE ".MYSQL_PREFIX."_download set d_name ='".$post->Text($_POST['name'])."', d_desc ='".$post->Text($_POST['description'])."', d_public ='".$post->Int($_POST['public'])."' WHERE d_id = '".$post->Int($folderId)."'";
			mysql_query($sql, CONNECT) or die(mysql_error());
		} else {
			// add folder
			$sql = "INSERT INTO ".MYSQL_PREFIX."_download (`d_id`, `d_name`, `d_desc`, `d_pos`, `d_public`) VALUES (NULL, '".$post->Text($_POST['name'])."','".$post->Text($_POST['description'])."', '".$post->Int($_POST['folder'])."','".$post->Int($_POST['public'])."')";
			mysql_query($sql, CONNECT) or die(mysql_error());	
		}
	}

	function PostFile($userId, $fileId='') {
		require_once('post.php');
		$post = new Post;
		$previewlocation = '';
		if (empty($_POST['folder'])) {
			$_POST['folder'] = 'NULL';
		} else {
			$_POST['folder'] = "'".$post->Int($_POST['folder'])."'";
		}
		
		if (empty($_POST['public'])) $_POST['public'] = 0;
		/* Get the default location to place downloads into */
			$sql = "SELECT s_value FROM ".MYSQL_PREFIX."_config WHERE s_name='filedirectory'";
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			$row = mysql_fetch_assoc($query);
			$directory = $row['s_value'];
		
			
		if ($fileId !='') { // EDIT A FILE
			$editing = true; // Use this to tell if the file is being edited
			$sql = "UPDATE ".MYSQL_PREFIX."_download_files set `f_name` = '".$post->Text($_POST['name'])."', `f_desc` = '".$post->Text($_POST['description'])."', `f_size`='".$post->Int($_POST['websize'])."', `f_public` ='".$post->Int($_POST['public'])."' WHERE f_id = '".$post->Int($fileId)."'";
			mysql_query($sql, CONNECT) or die(mysql_error());
		} else { // ADD A FILE
			$editing = false; // Use this to tell if the file is being edited
			if (!empty($_POST['name'])) {
				if (!empty($_FILES['upload']['name']) || !empty($_POST['weblink'])) {
					/* first check that a file has been given. */
						if(!empty($_FILES['upload']['name'])) {
							/* file is being uploaded */
							if ($_FILES['upload']['error'] > 0) {
								/* problem with upload */
								return 'fileerror';
							}
	
							$size = $_FILES['upload']['size']/1024;					
							$location = $directory.$_FILES['upload']['name'];
							/* no problem with upload, copying the file to the files folder */
							copy($_FILES['upload']['tmp_name'], $location);
						} else {
							/* File is a weblink */
							$location = 'http://'.$_POST['weblink'];
							$size = $_POST['websize'];
						}
						
						
						
						$sql = "SHOW TABLE STATUS LIKE '".MYSQL_PREFIX."_download_files'";
						$query = mysql_query($sql, CONNECT) or die(mysql_error());
						$row = mysql_fetch_assoc($query);
						$fileId = $row['Auto_increment']; // Get this event's id before its created
					
						$sql = "INSERT INTO ".MYSQL_PREFIX."_download_files (`d_id`, `f_name`, `f_img`, `f_loc`, `f_desc`, `u_id`, `f_date`, `f_size`, `f_public`) VALUES (".$_POST['folder']/* -- Int checking is performed above -- */.",'".$post->Text($_POST['name'])."', NULL,'".$post->Text($location)."', '".$post->Text($_POST['description'])."', '".$post->Int($userId)."', NOW(), '".$post->Int(round($size))."', '".$post->Int($_POST['public'])."')";
						mysql_query($sql, CONNECT) or die(mysql_error());	
					} else {
						return 'emptyerror';
					}
				} else {
					return 'nonameerror';
				}
			}
			
			// Upload the preview image if there is one
			$previewlocation = $post->Image($_FILES['preview'], 'files/', $fileId);
			
			if (strstr($previewlocation, 'error:') && $previewlocation != 'error:empty') { 
				if (!$editing) {
					$sql = "SELECT `s_value` FROM ".MYSQL_PREFIX."_config WHERE `s_name` ='photodefault'";
					$query = mysql_query($sql, CONNECT) or die(mysql_error());
					$row = mysql_fetch_assoc($query);
					$sql = "UPDATE ".MYSQL_PREFIX."_download_files SET `f_img`='".$row['s_value']."' WHERE `f_id`='".$post->Int($fileId)."'";
					mysql_query($sql, CONNECT) or die(mysql_error());
				}
				return $previewlocation;
			} else {				
				if ($previewlocation == 'error:empty') {	
					if (!empty($_POST['previewlink'])) {
						$sql = "UPDATE ".MYSQL_PREFIX."_download_files SET `f_img`='".$post->Text($_POST['previewlink'])."' WHERE `f_id`='".$post->Int($fileId)."'";
						mysql_query($sql, CONNECT) or die(mysql_error());
					}
					if (!$editing) {	
						$sql = "SELECT `s_value` FROM ".MYSQL_PREFIX."_config WHERE `s_name` ='photodefault'";
						$query = mysql_query($sql, CONNECT) or die(mysql_error());
						$row = mysql_fetch_assoc($query);
						$sql = "UPDATE ".MYSQL_PREFIX."_download_files SET `f_img`='".$row['s_value']."' WHERE `f_id`='".$post->Int($fileId)."'";
						mysql_query($sql, CONNECT) or die(mysql_error());
					}
				} else {	
					$sql = "UPDATE ".MYSQL_PREFIX."_download_files SET `f_img`='".$previewlocation."' WHERE `f_id`='".$post->Int($fileId)."'";
					mysql_query($sql, CONNECT) or die(mysql_error());
				}
			}
	}

	function Delete($type, $id) {
		require_once('post.php');
		$post = new Post();
		
		if ($type == "file") {
			$sql = "SELECT f_img, f_loc FROM ".MYSQL_PREFIX."_download_files WHERE f_id='".$post->Int($id)."'";
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			$row = mysql_fetch_assoc($query);
			if (file_exists($row['f_loc'])) {
				// file exists 
				unlink($row['f_loc']);
			}
				
			$sql = "SELECT s_value FROM ".MYSQL_PREFIX."_config WHERE s_name='photodefault' LIMIT 1";
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			$default = mysql_fetch_assoc($query);
			if ($row['f_img'] != $default['s_value']) {
				// is not the default preview image
				if (file_exists($row['f_img'])) {
					unlink($row['f_img']);
				}
			}

			$sql = "DELETE FROM ".MYSQL_PREFIX."_download_files WHERE f_id ='".$post->Int($id)."'";
			mysql_query($sql, CONNECT) or die(mysql_error());
		}
		if ($type == "folder") {
			// Delete any existing folders inside
			$sql = "SELECT d_id FROM ".MYSQL_PREFIX."_download WHERE d_pos='".$post->Int($id)."'";
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			while ($row = mysql_fetch_array($query)) {
				$this->Delete('folder', $row['d_id']);
			}
			// Delete any existing files inside
			$sql = "SELECT f_id FROM ".MYSQL_PREFIX."_download_files WHERE d_id ='".$post->Int($id)."'";
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			while ($row = mysql_fetch_array($query)) {
				$this->Delete('file', $row['f_id']);
			}
			$sql = "DELETE FROM ".MYSQL_PREFIX."_download WHERE d_id = '".$post->Int($id)."'";
			mysql_query($sql, CONNECT) or die(mysql_error());
		}
		
	}
	
	function OptimizeTables() {
		$sql = "OPTIMIZE TABLE `".MYSQL_PREFIX."_download_files`";
		mysql_query($sql, CONNECT) or die(mysql_error());
		$sql = "OPTIMIZE TABLE `".MYSQL_PREFIX."_download`";
		mysql_query($sql, CONNECT) or die(mysql_error());
	}
}
?>