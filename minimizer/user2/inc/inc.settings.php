<?php
####
## Manufacturing Database
## (c) http://winchelldesign.com
## Developed By: Chris Winchell
##
## 
## File: inc.settings.php
## Created: 9-17-2010
## Updated: 10-5-2010
####

	// General Settings
	//--------------------------------------------------------------------------
	
	// Database Information
	$dbtype = "mysql"; 
	$db_host = "mysql.winchelldesign.com";
	$db_user = "cwinchell";
	$db_pass = "ky0t1c";
	$db_name = "minimizer";
	$db_port = "";
	$db_table_prefix = "";

	// Generic website variables
	$websiteName = "Manufacturing Database";
	$websiteUrl = "http://www.winchelldesign.com/minimizer/user2/"; // Must include trailing slash
	
	// Do you want to send out emails for confirmation of registration?
	$emailRegistration = true;

	// Tagged onto our outgoing emails
	$emailAddress = "noreply@iLoveCake.com";
	
	// Date format used on email's
	$emailDate = date("l \\t\h\e jS");
	
	// Directory where txt files are stored for the email templates.
	$mail_templates_dir = "inc/mail/";
	
	$default_hooks = array("#WEBSITENAME#","#WEBSITEURL#","#DATE#");
	$default_replace = array($websiteName,$websiteUrl,$emailDate);
	
	// Site version number
	$version = "1.1a";
	
	// Display explicit error messages?
	$debug_mode = false;
	
	//---------------------------------------------------------------------------
?>