<?php
	/*
		Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
		Copyright (C) 2002 Andrew Fenn
	
		This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
	
		This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
	
		You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
	*/
	session_start();
  	ob_start();
	
	if (!empty($_GET['lang'])) { 
		$_SESSION['language'] = $_GET['lang'];
		header('Location: index.php?step=0'); // work around for some websites.
		exit;
	}
	if (!empty($_SESSION['language'])) require_once('lang/'.$_SESSION['language'].'/lang.php');
	echo '<?xml version="1.0" encoding="utf-8"?>';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="Andrew Fenn - http://www.proclanmanager.com" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen, print" />
<title><?php if (!empty($lang['title'])) { echo $lang['title']; } else { ?>Pro Clan Manager - Installer 0.4.1 <?php } ?></title>
<script type="text/javascript" src="img/hintbox.js"></script>


</head>
<body>
<div id="centerColumn">
  <div id="header"><div style="float:left;"><img src="img/logo.png" alt="logo" /></div><div><h1>Version 0.4.2</h1></div></div>
	<?php require('install.php'); ?>
</div>
<!--//end #centerColumn//-->
</body>
</html>
