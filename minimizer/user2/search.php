<?php 
####
## Manufacturing Database
## (c) http://winchelldesign.com
## Developed By: Chris Winchell
##
## 
## File: search.php
## Created: 10-5-2010
## Updated: --
####

	require_once("inc/inc.config.php");
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
        <h1>Search</h1>
        
        <p>Do some searching here..</p>
        </div>
        
	</div>
</div>
</body>
</html>