<?php
####
## Manufacturing Database
## (c) http://winchelldesign.com
## Developed By: Chris Winchell
##
## 
## File: settings.php
## Created: 9-17-2010
## Updated: --
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
	$websiteUrl = "http://www.winchelldesign.com/minimizer/user3/"; // Must include trailing slash
	
	// Select Language File (Babble Fish to Translate?)
	$language = "en";

	// Do you want to send out emails for confirmation of registration?
	// False = instant activation
	$emailActivation = true;

	// In hours, how long before we allow a user to request another account activation email
	// Set to 0 to remove threshold
	$resend_activation_threshold = 0;
	
	// Tagged onto our outgoing emails
	$emailAddress = "noreply@iLoveCake.com";
	
	// Date format used on email's
	$emailDate = date("l \\t\h\e jS");
	
	// Directory where txt files are stored for the email templates.
	$mail_templates_dir = "inc/mail-templates/";
	
	$default_hooks = array("#WEBSITENAME#","#WEBSITEURL#","#DATE#");
	$default_replace = array($websiteName,$websiteUrl,$emailDate);
	
	// Site version number
	$version = "1.0a";
	
	// Display explicit error messages?
	$debug_mode = false;
	
	//---------------------------------------------------------------------------
?>