<?php
####
## Manufacturing Database
## (c) http://winchelldesign.com
## Developed By: Chris Winchell
##
## 
## File: config.php
## Created: 9-17-2010
## Updated: --
####

	require_once("settings.php");

	// Dbal Support - Thanks phpBB ; )
	require_once("db/".$dbtype.".php");
	
	// Construct a db instance
	$db = new $sql_db();
	if(is_array($db->sql_connect(
							$db_host, 
							$db_user,
							$db_pass,
							$db_name, 
							$db_port,
							false, 
							false
	))) {
		die("Unable to connect to the database");
	}
	
	if(!isset($language)) $language = "en";
	require_once("lang/".$language.".php");
	
	require_once("class.user.php");
	require_once("class.mail.php");
	require_once("func.user.php");
	require_once("func.form.php");
	require_once("func.general.php");
	require_once("class.newuser.php");

	session_start();
	
	// Global User Object Var
	if(isset($_SESSION["privUser"]) && is_object($_SESSION["privUser"]))
	{
		$loggedInUser = $_SESSION["privUser"];
	}
?>