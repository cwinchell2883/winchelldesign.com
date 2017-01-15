<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/
class User
{
	var $m_user_rank; 			// Users rank... lower the better
	var $m_user_rank_sort;		// maybe same as above... i can't remember (<-- fix this comment)
	var $m_user_id; 			// Id of the user
	var $m_user_name;		 // Users name
	var $m_user_access; // Array of users access rights.
	var $m_user_prefs; // Array of user preferences (show site chat, etc)
	
	function Login($login, $password, $usingCookie) {
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
					
		if (!empty($proxy)) {
			 	$ip = $proxy;
		}
					
					
		require_once('post.php');
		$post = new Post();
		if (!empty($login) && !empty($password)) {
			if ($post->LoginFilter($login) && $post->LoginFilter($password)) {
				/* Check to make sure that the login doesnt contain nasty break in characters */
				/* AUTH PART OF THE FORM USED WHEN FORM IS SUBMITTED */

				$sql = "SELECT `u_id` FROM ".MYSQL_PREFIX."_users WHERE u_name = '".$login."' AND u_password = '".md5($password)."'";
				$query = mysql_query($sql, CONNECT) or die(mysql_error());
				$rows = mysql_num_rows($query);
				
				/* IF ROWS = 0 THEN THE USERNAME AND PASSWORD DONT MATCH */
				if (!empty($rows)) {					
					$rows = mysql_fetch_assoc($query);			
					/* MUST SET EITHER COOKIES OR SESSIONS */
					if (!empty($usingCookie)) {		
									/* GET HOW MANY DAYS THE ADMIN WANTS THE COOKIE TO STAY */
									$sql = "SELECT `s_value` FROM ".MYSQL_PREFIX."_config WHERE `s_name`='cookielength'";
									$query = mysql_query($sql, CONNECT);
									$row = mysql_fetch_assoc($query);
									
			
									/* IF EQUALS 0 THEN COOKIE LASTS FOREVER */
									if (empty($row['s_value'])) {
										setcookie("auth", $rows['u_id']."-".$ip);
									} else {
										$time = $row['s_value'] * 86400; // 86400 == 1 day
										setcookie("auth", $rows['u_id']."-".$ip,time()+$time);
									}
					} else {
								/* SESSIONS */
								$_SESSION['auth'] = $rows['u_id']."-".$ip;
					}
								// add login successful page and define the reload page to go to the user panel
								$sql = "DELETE FROM ".MYSQL_PREFIX."_visitors WHERE `v_ip`='".$post->Text($ip)."'";
								mysql_query($sql) or die(mysql_error());
		
								$sql = "INSERT INTO ".MYSQL_PREFIX."_visitors (`v_ip`,`u_id`,`v_date`) VALUES ('".$post->Text($ip)."','".$post->Int($rows['u_id'])."', NOW())";
								mysql_query($sql) or die(mysql_error());	
								return true;
				} else {
								return false;
				}
			} else {
								/* ELSE THE FORM CONTAINS EVIL CHARACTERS SUCH AS ^&$Ã¯Â¿Â½"! */
								return false;
			}
		}
	
		
	}

	function Logout()
	{
		if (!empty($_SESSION['auth'])) {
			$_SESSION['auth'] = "";
		}
		if (!empty($_COOKIE['auth'])) {
			setcookie("auth", "", time()-60*999999);
		}
	}

	function CheckUser() {
		require_once('post.php');
		$post = new Post();
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
				
		if (!empty($proxy)) {
			 	$ip = $proxy;
		}
		
				
		$auth = '';
		if (!empty($_SESSION['auth'])) {	
			/* User is using sessions to login take the info out the session */
			$s = $_SESSION['auth']; 
			/* expload the session data */
			$auth = explode("-", $s);
			/* Clear the session data because it has an array in it? */
			unset($_SESSION['auth']);
			/* reset the session again */
			$_SESSION['auth'] = $s;
		} 

		if (!empty($_COOKIE['auth'])) {
			/* User is using cookies to login take the info out the cookie  */
			$auth = explode("-", $_COOKIE['auth']);			
		}

		if (!empty($auth[0])) {
			$sql = "SELECT * FROM ".MYSQL_PREFIX."_visitors WHERE `v_ip`='".$post->Text($ip)."' AND `u_id`='".$post->Int($auth[0])."'";
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			$rows = mysql_num_rows($query);
			if ($rows > 0) {
				$sql = "SELECT ".MYSQL_PREFIX."_users.u_name, ".MYSQL_PREFIX."_users.r_id, ".MYSQL_PREFIX."_users.u_showtime, ".MYSQL_PREFIX."_rank.r_sort FROM ".MYSQL_PREFIX."_users LEFT JOIN ".MYSQL_PREFIX."_rank ON ".MYSQL_PREFIX."_users.r_id=".MYSQL_PREFIX."_rank.r_id WHERE u_id = '".$post->Int($auth[0])."'";
				$query = mysql_query($sql, CONNECT) or die(mysql_error());
				$row = mysql_fetch_array($query);	
				/* User exists pull out their rank and assign it */
				$this->m_user_rank = $row['r_id'];
				/* User Rank sort.. THIS SHOULD BE USED TO SEE WHICH USE IS HIGHER NOT $this->m_user_rank */
				$this->m_user_rank_sort = $row['r_sort'];
				/* See if this user wants the time displayed in the sites chat */
				$this->m_user_prefs['showtime'] = $row['u_showtime'];				
				/* now the user id */
				$this->m_user_id = $auth[0];
				/* now the user name */
				$this->m_user_name = $row['u_name'];
				$sql = "UPDATE ".MYSQL_PREFIX."_users SET u_logtime=NOW() WHERE u_id='".$this->m_user_id."'";
				mysql_query($sql, CONNECT) or die(mysql_error());

				/* GET INFOMATION ON WHAT THE USER IS ALLOWED TO ACCESS */

				$sql = "SELECT ".MYSQL_PREFIX."_rank_list.r_value, ".MYSQL_PREFIX."_rank_var.v_name  FROM ".MYSQL_PREFIX."_rank_list LEFT JOIN ".MYSQL_PREFIX."_rank_var ON ".MYSQL_PREFIX."_rank_list.v_id=".MYSQL_PREFIX."_rank_var.v_id WHERE r_id = '".$this->m_user_rank."'";
				$query = mysql_query($sql);
				while ($row = mysql_fetch_array($query)) {
					$this->m_user_access[$row['v_name']] = $row['r_value'];
				}
			}
		}
		$sql = "DELETE FROM ".MYSQL_PREFIX."_visitors WHERE `v_ip`='".$post->Text($ip)."' OR DATE_ADD(`v_date`, INTERVAL '10' MINUTE) < NOW()";
		mysql_query($sql) or die(mysql_error());
		
		$sql = "INSERT INTO ".MYSQL_PREFIX."_visitors (`v_ip`,`u_id`,`v_date`) VALUES ('".$post->Text($ip)."','".$post->Int($this->m_user_id)."', NOW())";
		mysql_query($sql) or die(mysql_error());		
	}

	function ListUsers()
	{
			$sql = "SELECT ".MYSQL_PREFIX."_users.u_id, ".MYSQL_PREFIX."_users.u_name, DATE_ADD(".MYSQL_PREFIX."_users.u_logtime, INTERVAL '10' MINUTE) AS u_logtime, ".MYSQL_PREFIX."_users.u_join, ".MYSQL_PREFIX."_users.u_location, ".MYSQL_PREFIX."_rank.r_name, ".MYSQL_PREFIX."_rank.r_sort, ".MYSQL_PREFIX."_rank.r_img FROM ".MYSQL_PREFIX."_users LEFT JOIN ".MYSQL_PREFIX."_rank ON ".MYSQL_PREFIX."_users.r_id=".MYSQL_PREFIX."_rank.r_id ORDER BY ".MYSQL_PREFIX."_rank.r_sort ASC";
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			$list = array();
			while ($link = mysql_fetch_assoc($query)) $list[] = $link; 
			return $list;
	}	

	function PromoteUser($userId, $rankId) {
		require_once('post.php');
		$post = new Post();
		
		if ($this->m_user_access['USEREDIT']) {
			$sql = "SELECT r_sort FROM ".MYSQL_PREFIX."_rank WHERE r_id ='".$post->Int($rankId)."'";
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			$row = mysql_fetch_assoc($query);
			
			if ($row['r_sort'] >= $this->m_user_rank_sort) {
				$sql = "SELECT ".MYSQL_PREFIX."_users.r_id, ".MYSQL_PREFIX."_rank.r_sort FROM ".MYSQL_PREFIX."_users RIGHT JOIN ".MYSQL_PREFIX."_rank ON (".MYSQL_PREFIX."_users.r_id = ".MYSQL_PREFIX."_rank.r_id) WHERE ".MYSQL_PREFIX."_users.u_id ='".$post->Int($userId)."'";
				$query = mysql_query($sql, CONNECT) or die(mysql_error());
				$row = mysql_fetch_assoc($query);
				if ($row['r_sort'] > $this->m_user_rank_sort) {
					$sql = "UPDATE ".MYSQL_PREFIX."_users SET r_id = '".$post->Int($rankId)."' WHERE u_id ='".$post->Int($userId)."'";
					mysql_query($sql, CONNECT) or die(mysql_error());					
				} else {			
					return 'toolow';			
				}
			} else {
				return 'toohigh';
			}
		}
	}

	function AddUser() {
					
			if ($this->m_user_access['USERADD'] > 0) {

			
			if (!empty($_POST['name'])) {
				require_once('post.php');
				$post = new Post();
				/* Generate a password */
				if ($post->LoginFilter($_POST['name'])) {			
						// check that the username doesn't already exist
						$sql = "SELECT `u_id` FROM ".MYSQL_PREFIX."_users WHERE `u_name`='".$_POST['name']."'";
						$query = mysql_query($sql, CONNECT) or die(mysql_error());
						if (mysql_num_rows($query) < 1) {			
								$password = substr(md5(rand(10000, 99999)), 5, 8);
								
								$sql = "SELECT `s_value` FROM ".MYSQL_PREFIX."_config WHERE `s_name` ='photodefault'";
								$query = mysql_query($sql, CONNECT) or die(mysql_error());
								$row = mysql_fetch_assoc($query);
								$defaultphoto = $row['s_value'];
								/* find lowest rank */
								$sql = "SELECT r_id FROM ".MYSQL_PREFIX."_rank GROUP BY r_sort DESC LIMIT 1";
								$query = mysql_query($sql, CONNECT) or die(mysql_error());
								$row = mysql_fetch_assoc($query);
								
								$sql = "INSERT INTO ".MYSQL_PREFIX."_users (`u_name`, `u_password`, `r_id`, `u_email`, `u_join`, `u_pic`) VALUES ('".$post->Text($_POST['name'])."', '".md5($password)."', '".$row['r_id']."', '".$post->Text($_POST['email'])."', NOW(),'".$defaultphoto."')";
								mysql_query($sql, CONNECT) or die(mysql_error());
								
								if (!empty($_POST['send'])) {
									if (eregi("^"."[a-z0-9]+([_\\.-][a-z0-9]+)*"."@"."([a-z0-9]+([\.-][a-z0-9]+)*)+"."\\.[a-z]{2,}"."$", $_POST['email'])) {
										
										/* Get Email info*/
										$sql = "SELECT m_subject, m_text FROM ".MYSQL_PREFIX."_email WHERE m_id = '1'";
										$query = mysql_query($sql, CONNECT);
										$row = mysql_fetch_array($query);
					
										$row['m_text'] = str_replace('[username]', $_POST['newuser'], $row['m_text']);
										$row['m_text'] = str_replace('[password]', $password, $row['m_text']);
										
										if (mail ($_POST['email'], $row['m_subject'], $row['m_text'], "\r\nContent-Type: text/html")) {					
											
											$sql = "UPDATE ".MYSQL_PREFIX."_users SET u_email = '".$post->Text($_POST['email'])."' WHERE u_id = '".$post->Int($userId)."'";
											mysql_query($sql, CONNECT) or die(mysql_error());
										} else {
											$sql = "UPDATE ".MYSQL_PREFIX."_users SET u_email = '".$post->Text($_POST['email'])."' WHERE u_id = '".$post->Int($userId)."'";
											mysql_query($sql, CONNECT) or die(mysql_error());
											return 'mailerr';
										}
									} else {
										return 'mailsyn';
									}
								} else {
									return $password;
								}
						} else {
							return 'exists';
						}
					} else {
						return 'invalid';
					}
				} else {
					return 'empty';
				}
			}
	}

	function ListRanks() {
			/* Select ranks */
			$sql = "SELECT r_id, r_name FROM ".MYSQL_PREFIX."_rank";
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			while($link = mysql_fetch_array($query)) $links[] = $link; 
			return $links;
	}
	
	function UserInfo($userId) {
		require_once('post.php');
		$post = new Post();
		$sql = "SELECT `u_id`, `u_name`, `r_id`, `u_logtime`, `u_email`, `u_join`, `u_pic`, `u_dob`, `u_location`, `u_website`, `u_xfire`, `u_msn`, `u_showemail`, `u_showtime`, `u_interests` FROM ".MYSQL_PREFIX."_users WHERE `u_id`='".$post->Int($userId)."' LIMIT 1";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		return mysql_fetch_assoc($query);  
	}

	function GeneratePassword($userId) {
		require_once('post.php');
		$post = new Post();
		
		if ($this->m_user_access['USEREDIT'] > 0) {
			$password = substr(md5(rand(10000, 99999)), 5, 8);
			$sql = "UPDATE ".MYSQL_PREFIX."_users SET u_password = '".md5($password)."' WHERE u_id ='".$post->Int($userId)."'";
			mysql_query($sql, CONNECT) or die(mysql_error());
			if (!empty($_POST['email'])) {
				$sql = "SELECT `u_name`, `u_email` from ".MYSQL_PREFIX."_users WHERE u_id = '".$post->Int($userId)."'";
				$query = mysql_query($sql, CONNECT) or die(mysql_error());
				$row = mysql_fetch_assoc($query);
				if (eregi("^"."[a-z0-9]+([_\\.-][a-z0-9]+)*"."@"."([a-z0-9]+([\.-][a-z0-9]+)*)+"."\\.[a-z]{2,}"."$", $row['u_email'])) {
					$email = $row['u_email'];
					$username = $row['u_name'];
					/* Get Email info*/
					$sql = "SELECT m_subject, m_text FROM ".MYSQL_PREFIX."_email WHERE m_id = '2'";
					$query = mysql_query($sql, CONNECT);
					$row = mysql_fetch_assoc($query);
		
					$row['m_text'] = str_replace('[username]', $username, $row['m_text']);
					$row['m_text'] = str_replace('[password]', $password, $row['m_text']);
					if (!mail ($email, $post->Text($row['m_subject']), $post->Text($row['m_text']), "\r\nContent-Type: text/html")) {					
						return 'mailerr';
					}
				} else {
					return 'mailsyn';
				}
			} else {
				return $password;
			}
		}
	}
	
	function EditPassword() {
		require_once('post.php');
		$post = new Post();
		
		if (!empty($this->m_user_id)) {
			$sql = "SELECT `u_id` FROM ".MYSQL_PREFIX."_users WHERE `u_password` = '".md5($_POST['oldpass'])."' AND `u_id` = '".$post->Int($this->m_user_id)."'";
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			$rows = mysql_num_rows($query);
			if ($rows > 0) {
				if ($_POST['newpass'] == $_POST['newpass2']) {
					$password = $_POST['newpass'];
					if ($post->LoginFilter($password)) {
						$sql = "UPDATE ".MYSQL_PREFIX."_users SET `u_password` = '".md5($password)."' WHERE `u_id` = '".$post->Int($this->m_user_id)."'";
						mysql_query($sql, CONNECT) or die(mysql_error());
					} else {
						return 3;
					}
				} else {
					return 2;
				}
			} else {
				return 1;
			}
		}
	}

	function DeleteUser($userId) {
		require_once('post.php');
		$post = new Post();
		if ($userId != $this->m_user_id) {
			if ($this->m_user_access['USERDEL'] > 0) {
				$sql = "SELECT ".MYSQL_PREFIX."_rank.r_sort FROM ".MYSQL_PREFIX."_rank RIGHT JOIN ".MYSQL_PREFIX."_users ON (".MYSQL_PREFIX."_rank.r_id =".MYSQL_PREFIX."_users.r_id) WHERE u_id = '".$post->Int($userId)."'";
				$query = mysql_query($sql, CONNECT) or die(mysql_error());
				$row = mysql_fetch_assoc($query);
				if ($row['r_sort'] > $this->m_user_rank_sort) { // Lower the better!
					$sql = "DELETE FROM ".MYSQL_PREFIX."_users WHERE u_id = '".$post->Int($userId)."'";
					mysql_query($sql, CONNECT) or die(mysql_error());
					
				}
			}
		}
	}

	function EditUserBio() {
	$links = array();
	$files = array();
		/* Call up the users information */
		$sql = "SELECT `u_email`, `u_dob`,`u_location`,`u_website`,`u_xfire`,`u_msn`,`u_showemail`,`u_showtime`,`u_interests`,`u_pic` FROM ".MYSQL_PREFIX."_users WHERE `u_id`='".$this->m_user_id."'";
		$query = mysql_query($sql, CONNECT) or die(mysql_error());
		while ($link = mysql_fetch_assoc($query)) {
			
			
			/* Ping the list of files in the gallery default folder */
			$dir = opendir("images/users/");	
			while ($file = readdir($dir))  {
				if (substr($file,0,1)!=".") { // get rid of .. and . directories
					if (strstr($file, ".")) { // get rid of normal directories
						if (!strstr($file, "Thumbs.db")) { // get rid of windows files
							$files[] = $file;			// FIXME: Needs to be some real checking for images here.
							if ("images/users/".$file == $link['u_pic']) {
								$link['u_galpic'] = $file;
							}
						}
					}
				}
			}
			$link['files'] = $files; 
			return $link;
		}
	}


	function EditProfile() {
		require_once('post.php');
		$post = new Post();
		if (empty($_POST['birthdate'])) $_POST['birthdate'] = '0-0-0';
		if (empty($_POST['hideemail'])) $_POST['hideemail'] = 0;
		if (empty($_POST['hidetime'])) $_POST['hidetime'] = 0;
		$date = explode("-",$_POST['birthdate']);
		$sql = "UPDATE ".MYSQL_PREFIX."_users SET `u_email`='".$post->Text($_POST['email'])."', `u_dob`='".$post->Int($date[2])."-".$post->Int($date[1])."-".$post->Int($date[0])." 12:00:00', `u_location`='".$post->Text($_POST['location'])."', `u_website`='".$post->Text($_POST['website'])."',`u_xfire`='".$post->Text($_POST['xfire'])."',`u_msn`='".$post->Text($_POST['msn'])."',`u_showemail`='".$post->Int($_POST['hideemail'])."',`u_showtime`='".$post->Int($_POST['hidetime'])."',`u_interests`='".$post->Text($_POST['interests'])."' WHERE `u_id`='".$post->Int($this->m_user_id)."'";
		mysql_query($sql, CONNECT) or die(mysql_error());
		
		
		if (!empty($_POST['picurl'])) {
			$sql = "UPDATE ".MYSQL_PREFIX."_users SET u_pic = '".$post->Text($_POST['picurl'])."' WHERE u_id = '".$post->Int($this->m_user_id)."'";
			mysql_query($sql, CONNECT) or die(mysql_error());
		} else {
			$sql = "SELECT `s_value` FROM ".MYSQL_PREFIX."_config WHERE `s_name`='photodirectory'";
			$query = mysql_query($sql, CONNECT) or die(mysql_error());
			$row = mysql_fetch_assoc($query);
			
			$sql = "UPDATE ".MYSQL_PREFIX."_users SET u_pic='".$row['s_value']."users/".$post->Text($_POST['picgal'])."' WHERE u_id='".$post->Int($this->m_user_id)."'";
			mysql_query($sql, CONNECT) or die(mysql_error());
		}
		
		
		$image = $post->Image($_FILES['picupload'], 'users/upload/', $post->Int($this->m_user_id));
		if(strstr($image, 'error')) {
			return $image;
		} else {
			$sql = "UPDATE ".MYSQL_PREFIX."_users SET u_pic = '".$image."' WHERE u_id = '".$post->Int($this->m_user_id)."'";								
			mysql_query($sql, CONNECT) or die(mysql_error());
		}
		
		
	}	
}
?>
