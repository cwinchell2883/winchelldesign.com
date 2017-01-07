<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

class News
{
	
	function NewsHeadline() {
		
		$username = array();
		/* Get a list of user names */
		$sql = "SELECT `u_id`, `u_name`, `u_pic` FROM `".MYSQL_PREFIX."_users` GROUP BY `u_id` ASC";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		while ($user = mysql_fetch_assoc($query)) {
			$username[$user['u_id']] = $user['u_name'];
			$userimage[$user['u_id']] = $user['u_pic'];
		}
		
		/* Get how many news posts are allowed */
		$sql = "SELECT s_value FROM ".MYSQL_PREFIX."_config WHERE s_name = 'newsposts' LIMIT 1";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		$row = mysql_fetch_array($query);
		
		/* GET THE NEWS POSTS AND ADD USER NAME INFORMATION */
		$sql = "SELECT `n_title`, `n_pic`, `n_text`, `u_id`, `n_date`, `n_veiw` FROM `".MYSQL_PREFIX."_news` GROUP BY `n_date` DESC LIMIT ".$row['s_value']."";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		while ($link = mysql_fetch_assoc($query)) {
			$link['u_name'] = $username[$link['u_id']];
			$link['u_pic'] = $userimage[$link['u_id']];
			$links[] = $link; 
		}
		if (empty($links)) $links = "NULL";
		return $links;
	}

	function NewsDisplay($newsId)	{
		require_once('post.php');
		$post = new Post();
		
		/* Get a list of user names */
		$sql = "SELECT `u_id`, `u_name`, `u_pic` FROM `".MYSQL_PREFIX."_users` GROUP BY u_id ASC";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		while ($user = mysql_fetch_assoc($query)) {
			$username[$user['u_id']] = $user['u_name'];
			$userimage[$user['u_id']] = $user['u_pic'];
		}
		
		$sql = "SELECT * FROM ".MYSQL_PREFIX."_news WHERE n_id='".$post->Int($newsId)."'";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		$links = array();
		while ($link = mysql_fetch_assoc($query)) {
			$link['u_name'] = $username[$link['u_id']];
			$link['u_pic'] = $userimage[$link['u_id']];
			$links[] = $link; 
		}
		if (empty($links)) $links = "NULL";
		return $links;
	}

	function NewsList() {
		require_once('post.php');
		$post = new Post();
		/* Get a list of user names */
		$sql = "SELECT `u_id`, `u_name` FROM `".MYSQL_PREFIX."_users` GROUP BY u_id ASC";
		$query = mysql_query($sql, CONNECT);
		while ($user = mysql_fetch_assoc($query)) $users[$user['u_id']] = $user['u_name'];
		
		/* Get how many page rows are allowed */
		$sql = "SELECT s_value FROM ".MYSQL_PREFIX."_config WHERE s_name = 'pagerowlimit' LIMIT 1";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		$row = mysql_fetch_array($query);
		
		/* work out paging information */
		if (!empty($_GET['page'])) { 
			$number = round($post->Int($_GET['page'])*$row['s_value']);
		} else {
			$number = '0';
			$_GET['page'] = 0;
		}
		
		
		$sql = "SELECT `n_id`, `n_title`, `n_text`, `u_id`, `n_date` FROM ".MYSQL_PREFIX."_news ORDER BY `n_date` DESC LIMIT ".$post->Int($number).", ".$row['s_value'];
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		while ($link = mysql_fetch_assoc($query)) {
			$link['u_name'] = $users[$link['u_id']];
			$links['news'][] = $link; 
		}
		
		/* work out total rows of data and how many pages there are */
		$sql = "SELECT n_id FROM ".MYSQL_PREFIX."_news";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		$links['page']['total'] = ceil(mysql_num_rows($query) / $row['s_value'])-1; // work out how many pages we have
		
		if (empty($links)) $links = 'NULL';
		return $links;
	}

	function Edit($newsId) {
		require_once('post.php');
		$post = new Post();
		$sql = "SELECT n_id, n_title, n_text FROM ".MYSQL_PREFIX."_news WHERE n_id ='".$post->Int($newsId)."'";
		$query = mysql_query($sql, CONNECT);
		$link = mysql_fetch_assoc($query); 
		return $link;
	}

	function Post($userid, $newsId='') {
		require_once('post.php');
		$post = new Post();
		if ($newsId =='') {
				if (!empty($_POST['title']) && !empty($_POST['newsbody'])) 
				{
					$sql = "INSERT into ".MYSQL_PREFIX."_news (n_title, n_text, u_id, n_date) VALUES ('".$post->Text($_POST['title'])."', '".$post->Text($_POST['newsbody'])."', '".$post->Int($userid)."', NOW())";
				}
		} else {
				if (!empty($_POST['title']) && !empty($_POST['newsbody'])) 
				{
					$sql = "UPDATE ".MYSQL_PREFIX."_news set n_title = '".$post->Text($_POST['title'])."', n_text = '".$post->Text($_POST['newsbody'])."' WHERE n_id='".$post->Int($newsId)."'";
				}
		}
		if (!empty($sql)) mysql_query($sql, CONNECT) or die(mysql_error());
	}

	function Delete($newsId) {
		require_once('post.php');
		if (isset($newsId)) {
			$sql = "DELETE FROM ".MYSQL_PREFIX."_news WHERE n_id = '".$post->Int($newsId)."'";
			mysql_query($sql, CONNECT) or die(mysql_error());
		}
	}
}
?>