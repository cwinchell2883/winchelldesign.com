<?php 
####
## Manufacturing Database
## (c) http://winchelldesign.com
## Developed By: Chris Winchell
##
## 
## File: index.php
## Created: 9-17-2010
## Updated: --
## Version: v1.1a
####

	require_once("inc/inc.config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $websiteName; ?></title>
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
            <h1>Welcome</h1>
            
            <p>Copyright (c) <?php echo date("Y"); ?> <a href="http://winchelldesign.com">Chris Winchell</a></p>
            
            <p>The goal of this website is to provide a easy to navigate front end
            interface to the Manufacturing Database. This database holds all
            information pretaining to machine settings and variables. With success of
            data logging and tracking we can ultimately find the proper settings for
            the machines to produce a perfect part each hour of every day. The
            settings tracked vary from inside and outside weather conditions to the
            element temperatures and timings.</p>
            
            <div class="clear"></div>
        </div>

   </div>
</div>
</body>
</html>