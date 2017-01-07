<?php 
####
## Manufacturing Database
## (c) http://winchelldesign.com
## Developed By: Chris Winchell
##
## 
## File: admin.php
## Created: 9-17-2010
## Updated: --
####

	require_once("inc/inc.config.php");

	// Prevent the user visiting the logged in page if not logged in
	if(!isUserLoggedIn()) { header("Location: login.php"); die(); }

	// Prevent the user visiting the page if inproper access level
	// List group levels that DO NOT have access
	if($loggedInUser->isGroupMember(1) || $loggedInUser->isGroupMember(2)) { header("Location: account.php"); die(); }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome <?php echo $loggedInUser->display_username; ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
	<div id="content">
    
        <div id="left-nav">
        <?php include("inc/nav.php"); ?>
            <div class="clear"></div>
        </div>
        
        <div id="main">
            <h1>Admin Settings</h1>
            
            <ul style="list-style:none;">
                <li style="display:inline;float:left;margin:0 0.15em 0 0.15em"><a href="manageUsers.php">Manage Users</a></li>
                <li style="display:inline;float:left;margin:0 0.15em 0 0.15em">|</li>
                <li style="display:inline;float:left;margin:0 0.15em 0 0.15em"><a href="newUsers.php">Create Users</a></li>
            </ul>
            
            <div class="clear"></div>
        </div>

   </div>
</div>
</body>
</html>