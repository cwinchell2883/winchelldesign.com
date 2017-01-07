<?php
####
## Manufacturing Database
## (c) http://winchelldesign.com
## Developed By: Chris Winchell
##
## 
## File: func.user.php
## Created: 9-17-2010
## Updated: --
####
	
	// Checks if the username exists in the database
	function usernameExists($username)
	{
		global $db,$db_table_prefix;
		
		$sql = "SELECT Active
				FROM ".$db_table_prefix."Users
				WHERE
				Username_Clean = '".$db->sql_escape(sanitize($username))."'
				LIMIT 1";
	
		if(returns_result($sql) > 0)
			return true;
		else
			return false;
	}
	
	// Checks if the email exists in the database
	function emailExists($email)
	{
		global $db,$db_table_prefix;
	
		$sql = "SELECT Active FROM ".$db_table_prefix."Users
				WHERE
				Email = '".$db->sql_escape(sanitize($email))."'
				LIMIT 1";
	
		if(returns_result($sql) > 0)
			return true;
		else
			return false;	
	}
	
	// Get user details
	function fetchUserDetails($username=NULL)
	{
		global $db,$db_table_prefix; 
		
		if($username!=NULL) 
		{  
			$sql = "SELECT * FROM ".$db_table_prefix."Users
					WHERE
					Username_Clean = '".$db->sql_escape(sanitize($username))."'
					LIMIT
					1";
		}
		else
		{
			$sql = "SELECT * FROM ".$db_table_prefix."Users
					WHERE 
					ActivationToken = '".$db->sql_escape(sanitize($token))."'
					LIMIT 1";
		}
		 
		$result = $db->sql_query($sql);
		
		$row = $db->sql_fetchrow($result);
		
		return ($row);
	}
	
	// Set to activate lost password request
	function flagLostPasswordRequest($username,$value)
	{
		global $db,$db_table_prefix;
		
		$sql = "UPDATE ".$db_table_prefix."Users
				SET LostPasswordRequest = '".$value."'
				WHERE
				Username_Clean ='".$db->sql_escape(sanitize($username))."'
				LIMIT 1
				";
		
		return ($db->sql_query($sql));
	}
	
	// Verify if the email is linked to the username
	function emailUsernameLinked($email,$username)
	{
		global $db,$db_table_prefix;
		
		$sql = "SELECT Username,
				Email FROM ".$db_table_prefix."Users
				WHERE Username_Clean = '".$db->sql_escape(sanitize($username))."'
				AND
				Email = '".$db->sql_escape(sanitize($email))."'
				LIMIT 1
				";
		
		if(returns_result($sql) > 0)
			return true;
		else
			return false;
	}
	
	// Tells if the user is logged in or not
	// TRUE = User is logged in
	function isUserLoggedIn()
	{
		global $loggedInUser,$db,$db_table_prefix;
		
		$sql = "SELECT User_ID,
				Password
				FROM ".$db_table_prefix."Users
				WHERE
				User_ID = '".$db->sql_escape($loggedInUser->user_id)."'
				AND 
				Password = '".$db->sql_escape($loggedInUser->hash_pw)."' 
				AND
				Active = 1
				LIMIT 1";
		
		if($loggedInUser == NULL)
		{
			return false;
		}
		else
		{
			// Query the database to ensure they haven't been removed or disabled
			if(returns_result($sql) > 0)
			{
					return true;
			}
			else
			{
				// No result returned kill the user session, user removed or disabled
				$loggedInUser->userLogOut();
			
				return false;
			}
		}
	}
	
	// This function should be used like num_rows, since the PHPBB Dbal doesn't support num rows we'll create a workaround
	function returns_result($sql)
	{
		global $db;
		
		$count = 0;
		$result = $db->sql_query($sql);
		
		while ($row = $db->sql_fetchrow($result))
		{
		  $count++;
		}
		
		$db->sql_freeresult($result);
		
		return ($count);
	}
?>