<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

class Rank {
	
	function ListRanks() {
		$links = array();
		$sql = "SELECT `r_id`,`r_name`,`r_img` FROM ".MYSQL_PREFIX."_rank GROUP BY r_sort ASC";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		while($row = mysql_fetch_assoc($query)) {
			$sql2 = "SELECT u_id FROM ".MYSQL_PREFIX."_users WHERE r_id ='".$row['r_id']."'";
			$query2 = mysql_query($sql2, CONNECT) or die(mysql_error());
			$totalusers = mysql_num_rows($query2); // Get total number of users in this rank
			$row['totalusers'] = $totalusers;
			$links[] = $row;
		}
		return $links;
	}
	
	function PostRank($id='') {
		require_once('post.php');
		$post = new Post();
		$location = '';
		
		$sql = "SELECT `r_id` FROM ".MYSQL_PREFIX."_rank";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		$sort = mysql_num_rows($query);
		$sort++;
		
		if (empty($id)) {
			$location = $post->Image($_FILES['image'], 'ranks/', $sort);
		} else {
			$location = $post->Image($_FILES['image'], 'ranks/', $post->Int($id));
		}
		
		if (strstr($location, 'error:') && $location != 'error:empty') { 
			return $location;
		} else {		
			$location = "'".$post->Text($location)."'";		
		}
		if (!empty($_POST['weblink']) && strstr($location, 'error')) {
				/* File is a weblink */
				if (strstr($_POST['weblink'], 'http://')) {
					$location = "'".$post->Text($_POST['weblink'])."'";
				} else {
					$location = "'http://".$post->Text($_POST['weblink'])."'";
				}
		}
		
		if (empty($_POST['weblink']) && strstr($location, 'error')) $location = 'NULL';
		
		
		
		
		
		if (!empty($id)) {
			$rank = array();
			$sql = "UPDATE ".MYSQL_PREFIX."_rank SET `r_name`='".$post->Text($_POST['name'])."', `r_img`=".$location/* post checking done above */." WHERE `r_id`='".$post->Int($id)."'";
			mysql_query($sql, CONNECT) or die(mysql_error());
			
			$sql = "DELETE FROM ".MYSQL_PREFIX."_rank_list WHERE `r_id`='".$post->Int($id)."'";
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			
						
			foreach ($_POST['module'] as $key => $value) {
					$sql = "INSERT INTO ".MYSQL_PREFIX."_rank_list (`r_id`, `v_id`, `r_value`) VALUES ('".$post->Int($id)."', '".$post->Int($key)."', '".$post->Int($value)."')";
					mysql_query($sql, CONNECT) or die(mysql_error());
			}
			
			$sql = "OPTIMIZE TABLE `".MYSQL_PREFIX."_rank_list`";
			mysql_query($sql, CONNECT) or die(mysql_error());
		} else {
			if (!empty($_POST['name'])) {
				
				$sql = "INSERT INTO ".MYSQL_PREFIX."_rank (`r_id`, `r_name`, `r_img`, `r_sort`) VALUES (NULL,'".$post->Text($_POST['name'])."', ".$post->Text($location).", '".$post->Int($sort)."')";
				$query = mysql_query($sql, CONNECT) or die(mysql_error());
				
				$sql = "SELECT r_id FROM ".MYSQL_PREFIX."_rank ORDER BY r_id DESC LIMIT 1";
				$query = mysql_query($sql, CONNECT) or die(mysql_error());
				$row = mysql_fetch_assoc($query);
				
				foreach ($_POST['module'] as $key => $value) {
					$sql = "INSERT INTO ".MYSQL_PREFIX."_rank_list (`r_id`, `v_id`, `r_value`) VALUES ('".$row['r_id']."', '".$post->Int($key)."', '".$post->Int($value)."')";
					mysql_query($sql, CONNECT) or die(mysql_error());
				}
			}
		}
	}
	
	
	function Delete($id) {
		require_once('post.php');
		$post = new Post();
		$sql = "SELECT u_id FROM ".MYSQL_PREFIX."_users WHERE r_id='".$post->Int($id)."'";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		if (mysql_num_rows($query) == 0) {
			$sql = "DELETE FROM ".MYSQL_PREFIX."_rank WHERE r_id ='".$post->Int($id)."'";	
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			
			$sql = "DELETE FROM ".MYSQL_PREFIX."_rank_list WHERE r_id ='".$post->Int($id)."'";
			mysql_query($sql, CONNECT) or die(mysql_error());
		}
		$this->OptimizeTables();
	}
	
	function ListRankVars() {
		$links = array();
		$sql = "SELECT ".MYSQL_PREFIX."_rank_var.v_id, ".MYSQL_PREFIX."_rank_var.v_name , ".MYSQL_PREFIX."_rank_var.m_id , ".MYSQL_PREFIX."_rank_var.v_type, ".MYSQL_PREFIX."_modules.m_name, ".MYSQL_PREFIX."_modules.m_status FROM `".MYSQL_PREFIX."_rank_var` RIGHT JOIN `".MYSQL_PREFIX."_modules` ON ".MYSQL_PREFIX."_rank_var.m_id = ".MYSQL_PREFIX."_modules.m_id WHERE ".MYSQL_PREFIX."_rank_var.v_id !='' ORDER BY ".MYSQL_PREFIX."_rank_var.m_id, ".MYSQL_PREFIX."_rank_var.v_type";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		while($link = mysql_fetch_assoc($query)) $links[] = $link;
		return $links;
	}
	
	function getRankVars($id) {
		require_once('post.php');
		$post = new Post();
		
		$links = array();
		$sql = "SELECT `r_name`, `r_img` FROM ".MYSQL_PREFIX."_rank WHERE r_id='".$post->Int($id)."'";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		
		$sql = "SELECT ".MYSQL_PREFIX."_rank_list.r_value, ".MYSQL_PREFIX."_rank_var.v_id, ".MYSQL_PREFIX."_rank_var.v_name, ".MYSQL_PREFIX."_rank_var.m_id FROM `".MYSQL_PREFIX."_rank_list` RIGHT JOIN `".MYSQL_PREFIX."_rank_var` ON ".MYSQL_PREFIX."_rank_list.v_id = ".MYSQL_PREFIX."_rank_var.v_id WHERE ".MYSQL_PREFIX."_rank_list.r_id ='".$post->Int($id)."' ORDER BY ".MYSQL_PREFIX."_rank_var.m_id, ".MYSQL_PREFIX."_rank_var.v_type";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		while ($link = mysql_fetch_assoc($query)) $links[$link['v_id']] = $link;
		
		$link['r_name'] = $row['r_name'];
		$link['r_img'] = $row['r_img'];
		$row['rank'] = $link;
		$row['vars'] = $links;
		return $row;
	}

	function OptimizeTables() {
			$sql = "OPTIMIZE TABLE `pcm_rank_list`";
			mysql_query($sql, CONNECT) or die(mysql_error());
			$sql = "OPTIMIZE TABLE `pcm_rank`";
			mysql_query($sql, CONNECT) or die(mysql_error());		
	}
}


?>