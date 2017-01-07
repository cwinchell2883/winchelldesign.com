<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

class Poll {

	function isPublic($PollId) {
			require_once('post.php');
			$post = new Post();
			$sql="SELECT p_public FROM ".MYSQL_PREFIX."_poll WHERE p_id=".$post->Int($PollId);
			$query = mysql_query($sql, CONNECT);
			$link = mysql_fetch_assoc($query);
			if ($link['p_public'] == 0) return false;
			return true;
	}
	
	function hasEnded($PollId) {
		require_once('post.php');
		$post = new Post();
		$sql = "SELECT p_id FROM ".MYSQL_PREFIX."_poll WHERE p_id=".$post->Int($PollId)." AND (p_end > NOW() OR p_end IS NULL)";
		$query = mysql_query($sql, CONNECT);
		return mysql_num_rows($query) or die(mysql_error());
	}

	function PollView($PollId, $user) {
		require_once('post.php');
		$post = new Post();
		$list = array();
		if (!empty($user->m_user_id) && $user->m_user_access['POLLVIEW']) {
			$sql="SELECT `p_id` FROM ".MYSQL_PREFIX."_poll_votes WHERE `p_id`='".$post->Int($PollId)."'";
		} else {
			$sql="SELECT `p_id` FROM ".MYSQL_PREFIX."_poll WHERE `p_id` = '".$post->Int($PollId)."' AND `p_public`='1'";
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			if (mysql_num_rows($query) > 0) {
				$sql="SELECT `p_id` FROM ".MYSQL_PREFIX."_poll_votes WHERE `p_id`='".$post->Int($PollId)."'";
			} else {
				return false;
			}
		}
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		$total_votes = mysql_num_rows($query);
		/* Get the name and end time of the poll */
		if (!empty($user->m_user_id) && $user->m_user_access['POLLVIEW']) {
			$sql = "SELECT ".MYSQL_PREFIX."_poll.p_name, ".MYSQL_PREFIX."_poll.p_end, ".MYSQL_PREFIX."_poll.u_id, ".MYSQL_PREFIX."_poll_options.o_id, ".MYSQL_PREFIX."_poll_options.o_name FROM ".MYSQL_PREFIX."_poll LEFT JOIN ".MYSQL_PREFIX."_poll_options ON ".MYSQL_PREFIX."_poll.p_id = ".MYSQL_PREFIX."_poll_options.p_id WHERE ".MYSQL_PREFIX."_poll.p_id='".$post->Int($PollId)."' ORDER BY ".MYSQL_PREFIX."_poll_options.o_id ASC";
		} else {
			$sql = "SELECT ".MYSQL_PREFIX."_poll.p_name, ".MYSQL_PREFIX."_poll.p_end, ".MYSQL_PREFIX."_poll.u_id, ".MYSQL_PREFIX."_poll_options.o_id, ".MYSQL_PREFIX."_poll_options.o_name FROM ".MYSQL_PREFIX."_poll LEFT JOIN ".MYSQL_PREFIX."_poll_options ON ".MYSQL_PREFIX."_poll.p_id = ".MYSQL_PREFIX."_poll_options.p_id WHERE ".MYSQL_PREFIX."_poll.p_public='1' AND ".MYSQL_PREFIX."_poll.p_id='".$post->Int($PollId)."' ORDER BY ".MYSQL_PREFIX."_poll_options.o_id ASC";
		}
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		while ($link = mysql_fetch_assoc($query)) {
				$sql2 = "SELECT u_id FROM ".MYSQL_PREFIX."_poll_votes WHERE o_id=".$link['o_id']." AND p_id =".$post->Int($PollId);
				$query2 = mysql_query($sql2, CONNECT);
				/* get the number of votes */
				$link['o_votes'] = mysql_num_rows($query2);
				$link['total_votes'] = $total_votes;
				$list[] = $link;		
		}					
		return $list;		
	}

	function PollList($user) {
		$list = array();
		require_once('post.php');
		$post = new Post();
		/* Get how many page rows are allowed */
		$sql = "SELECT `s_value` FROM ".MYSQL_PREFIX."_config WHERE s_name = 'pagerowlimit' LIMIT 1";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		$row = mysql_fetch_array($query);
		
		
		/* work out paging information */
		if (!empty($_GET['page'])) { 
			$number = round($post->Int($_GET['page'])*$row['s_value']);
		} else {
			$number = '0';
			$_GET['page'] = 0;
		}
		
		/* query the database to see if there are any polls */
		if (!empty($user->m_user_id) && $user->m_user_access['POLLVIEW'] > 0) {	
			$sql = "SELECT `p_id`, `p_name`, `u_id`, `p_start`, `p_end` FROM ".MYSQL_PREFIX."_poll WHERE (p_start < NOW()) GROUP BY p_id DESC LIMIT ".$post->Int($number).", ".$row['s_value'];
		} else {
			$sql = "SELECT `p_id`, `p_name`, `u_id`, `p_start`, `p_end` FROM ".MYSQL_PREFIX."_poll WHERE `p_public` = '1' AND (p_start < NOW()) GROUP BY p_id DESC LIMIT ".$post->Int($number).", ".$row['s_value'];
		}
		
		if (!empty($user->m_user_id) && ($user->m_user_access['POLLADD'] > 0 || $user->m_user_access['POLLDEL'] > 0)) {
			$sql = "SELECT `p_id`, `p_name`, `u_id`, `p_start`, `p_end` FROM ".MYSQL_PREFIX."_poll GROUP BY p_id DESC LIMIT ".$post->Int($number).", ".$row['s_value'];
		}
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		while ($link = mysql_fetch_assoc($query)) {
				/* See how many votes are for this poll */
				$sql2 = "SELECT `p_id` FROM ".MYSQL_PREFIX."_poll_votes WHERE p_id=".$link['p_id'];
				$query2 = mysql_query($sql2, CONNECT) or die(mysql_error());
				$link['p_num_votes'] = mysql_num_rows($query2);
				$list['polls'][] = $link;
		}
		/* work out total rows of data and how many pages there are */
		$sql = "SELECT p_id FROM ".MYSQL_PREFIX."_poll";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		$list['page']['total'] = ceil(mysql_num_rows($query) / $row['s_value'])-1; // work out how many pages we have
		
		
		if (empty($list)) $list = "NULL";
			return $list;
	}

	function PollAddVote($pollId, $user) {
		require_once('post.php');
		$post = new Post();
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
		
		// check if poll has started
		$sql = "SELECT `p_id` FROM ".MYSQL_PREFIX."_poll WHERE `p_start` < NOW() AND `p_id` ='".$post->Int($pollId)."'";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		$rows = mysql_num_rows($query);
		if (empty($rows)) return false; // Kill the function because the poll hasn't started.
			
		if ($user->m_user_access['POLLVIEW'] > 0 || ($this->isPublic($pollId) && !empty($user->m_user_id))) {
			$sql = "SELECT `u_id` FROM ".MYSQL_PREFIX."_poll_votes WHERE `p_id`='".$post->Int($pollId)."' AND `u_id`='".$post->Int($user->m_user_id)."'";
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			$rows = mysql_num_rows($query);

			if ($rows==0) {
				/* User hasnt voted */
				if ($this->hasEnded($pollId) > 0) { 
					$sql = "INSERT INTO ".MYSQL_PREFIX."_poll_votes (`p_id`, `u_id`, `o_id`) VALUES ('".$post->Int($pollId)."', '".$post->Int($user->m_user_id)."', '".$post->Int($_POST['vote'])."')";
					$query = mysql_query($sql, CONNECT) or die(mysql_error());	
					return true;
				}
			}
			return false;
		} else {
			if ($this->isPublic($_POST['poll'])) {
				// is a public poll so let people vote.							
					$sql = "SELECT `u_ip` FROM ".MYSQL_PREFIX."_poll_votes WHERE `p_id`='".$post->Int($_POST['poll'])."' AND `u_ip`='".$ip."'";
					$query = mysql_query($sql, CONNECT) or die(mysql_error());
					$rows = mysql_num_rows($query);
		
					if ($rows==0) {
						if ($this->hasEnded($_POST['poll']) > 0) {
							$sql = "INSERT INTO ".MYSQL_PREFIX."_poll_votes (`p_id`, `u_ip`, `o_id`) VALUES ('".$post->Int($_POST['poll'])."', '".$ip."', '".$post->Int($_POST['vote'])."')";
							$query = mysql_query($sql, CONNECT);	
							return true;
						}
					}
			} else {	
				return false;
			}
		}
	}

	function PostPoll($userid, $id='') {
		require_once('post.php');
		$post = new Post();
		
		if (empty($id)) {
			/* add a new poll */
			/* Check all the data has been filled in */
			if (!empty($_POST['polltitle']) && !empty($_POST['option']))	{
				
				/* sort out the options so that there all in order.. */
				foreach ($_POST['option'] as $value) {
					if (!empty($value)) $option[] = $value;	
				}
				
				
				
				if (empty($_POST['startdate'])) {
					$start = 'NOW()';
				} else {
					$date = explode("-", $_POST['startdate']);
					$start = "'".$post->Int($date[2])."-".$post->Int($date[1])."-".$post->Int($date[0])." 00:00:00'";
					
				}
				if (empty($_POST['enddate'])) {
					$end = 'NULL';
				} else {
					$date = explode('-', $_POST['enddate']);
					$end = "'".$post->Int($date[2])."-".$post->Int($date[1])."-".$post->Int($date[0])." 23:59:59'";
				}
				
				if (empty($_POST['public'])) $_POST['public'] = 0;
				
				
				if (!empty($option[0]) && !empty($option[1])) {
					require_once('post.php');
					$post = new Post();
					
					$sql = "SHOW TABLE STATUS LIKE '".MYSQL_PREFIX."_poll'";
					$query = mysql_query($sql, CONNECT) or die(mysql_error());
					$row = mysql_fetch_assoc($query);
					$pollId = $row['Auto_increment']; // Get this poll id before its created
					
					/* Insert the data for the main poll */
					$sql = "INSERT INTO ".MYSQL_PREFIX."_poll (`p_name`, `u_id`, `p_start`, `p_end`, `p_public`) VALUES ('".$post->Text($_POST['polltitle'])."', '".$post->Int($userid)."', ".$start.", ".$end.", ".$post->Int($_POST['public']).")";
					mysql_query($sql, CONNECT) or die(mysql_error());
	
					/* Insert our options */
					foreach($option as $value) {
							/* if one has not been filled in leave it */	
							$sql = "INSERT INTO ".MYSQL_PREFIX."_poll_options (`p_id`, `o_name`) VALUES ('".$post->Int($pollId)."', '".$post->Text($value)."')";
							mysql_query($sql, CONNECT) or die(mysql_error());
					}
				}
			}
		}
		else
		{
			/* Place holder for updating polls */
			/* Editing polls ^^^ which you can't do. */
			/* Editing polls could be considered tainting the results unless you wiped the results after the update */
			/* But if you're going to wipe the results you might as well delete and make a new poll.. */
		}
	}

	function DeletePoll($id) {
			require_once('post.php');
			$post = new Post();
			/* Delete the poll */
			$sql = "DELETE from ".MYSQL_PREFIX."_poll WHERE p_id = '".$post->Int($id)."'";
			mysql_query($sql, CONNECT) or die(mysql_error());
			/* Delete the options */
			$sql = "DELETE from ".MYSQL_PREFIX."_poll_options WHERE p_id = '".$post->Int($id)."'";
			mysql_query($sql, CONNECT) or die(mysql_error());
			/* Delete the votes */
			$sql = "DELETE from ".MYSQL_PREFIX."_poll_votes WHERE p_id = '".$post->Int($id)."'";
			mysql_query($sql, CONNECT) or die(mysql_error());
			$this->OptimizeTables();
	}

	function OptimizeTables() {
		$sql = "OPTIMIZE TABLE `".MYSQL_PREFIX."_poll_options`";
		mysql_query($sql, CONNECT) or die(mysql_error());
		$sql = "OPTIMIZE TABLE `".MYSQL_PREFIX."_poll`";
		mysql_query($sql, CONNECT) or die(mysql_error());
		$sql = "OPTIMIZE TABLE `".MYSQL_PREFIX."_poll_votes`";
		mysql_query($sql, CONNECT) or die(mysql_error());
	}
}
?>