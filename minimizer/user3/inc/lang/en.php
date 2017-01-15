<?php
####
## Manufacturing Database
## (c) http://winchelldesign.com
## Developed By: Chris Winchell
##
## 
## File: ($language).php
## Created: 9-17-2010
## Updated: --
####

	
	/*
		%m1% - Dymamic markers which are replaced at run time by the relevant index.
	*/

	$lang = array();
	
	//Account
	$lang = array_merge($lang,array(
		"ACCOUNT_SPECIFY_USERNAME" 				=> "Please enter your username",
		"ACCOUNT_SPECIFY_PASSWORD" 				=> "Please enter your password",
		"ACCOUNT_SPECIFY_EMAIL"					=> "Please enter your email address",
		"ACCOUNT_INVALID_EMAIL"					=> "Invalid email address",
		"ACCOUNT_INVALID_USERNAME"				=> "Invalid username",
		"ACCOUNT_USER_OR_EMAIL_INVALID"			=> "Username or email address is invalid",
		"ACCOUNT_USER_OR_PASS_INVALID"			=> "Username or password is invalid",
		"ACCOUNT_ALREADY_ACTIVE"				=> "Your account is already activatived",
		"ACCOUNT_INACTIVE"						=> "Your account is in-active. Check your emails / spam folder for account activation instructions",
		"ACCOUNT_USER_CHAR_LIMIT"				=> "Your username must be no fewer than %m1% characters or greater than %m2%",
		"ACCOUNT_PASS_CHAR_LIMIT"				=> "Your password must be no fewer than %m1% characters or greater than %m2%",
		"ACCOUNT_PASS_MISMATCH"					=> "Passwords must match",
		"ACCOUNT_USERNAME_IN_USE"				=> "Username %m1% is already in use",
		"ACCOUNT_EMAIL_IN_USE"					=> "Email %m1% is already in use",
		"ACCOUNT_LINK_ALREADY_SENT"				=> "An activation email has already been sent to this email address in the last %m1% hour(s)",
		"ACCOUNT_NEW_ACTIVATION_SENT"			=> "We have emailed you a new activation link, please check your email",
		"ACCOUNT_NOW_ACTIVE"					=> "Your account is now active",
		"ACCOUNT_SPECIFY_NEW_PASSWORD"			=> "Please enter your new password",	
		"ACCOUNT_NEW_PASSWORD_LENGTH"			=> "New password must be no fewer than %m1% characters or greater than %m2%",	
		"ACCOUNT_PASSWORD_INVALID"				=> "Current password doesn't match the one we have one record",	
		"ACCOUNT_EMAIL_TAKEN"					=> "This email address is already taken by another user",
		"ACCOUNT_DETAILS_UPDATED"				=> "Account details updated",
		"ACTIVATION_MESSAGE"					=> "Your account has been activated. Please log in to the Manufacturing Portal at the below url: \n\n %m1%login.php",							
		"ACCOUNT_REGISTRATION_COMPLETE"			=> "You have successfully registered the account.",
	));
	
	//Miscellaneous
	$lang = array_merge($lang,array(
		"CONFIRM"								=> "Confirm",
		"DENY"									=> "Deny",
		"SUCCESS"								=> "Success",
		"ERROR"									=> "Error",
		"NOTHING_TO_UPDATE"						=> "Nothing to update",
		"SQL_ERROR"								=> "Fatal SQL error",
		"MAIL_ERROR"							=> "Fatal error attempting mail, contact your server administrator",
		"MAIL_TEMPLATE_BUILD_ERROR"				=> "Error building email template",
		"MAIL_TEMPLATE_DIRECTORY_ERROR"			=> "Unable to open mail-templates directory. Perhaps try setting the mail directory to %m1%",
		"MAIL_TEMPLATE_FILE_EMPTY"				=> "Template file is empty... nothing to send",
		"FEATURE_DISABLED"						=> "This feature is currently disabled",
	));
?>