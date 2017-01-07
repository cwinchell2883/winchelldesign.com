<?php
//===================
// site info
//===================
$site_name = "MyClan";
$site_email = "me@my.com";	// email that you want people to contact about the site

//===================
// site access
//===================
$accesslvl = array (
	Page 	=> Level,
	index 	=> 2,
	news 	=> 2,
	board 	=> 2,
	members	=> 2,
	ranks	=> 2,
	medals	=> 2,
	diplomacy => 2,
	rules	=> 2,
	history	=> 2,
	userinfo => 1
	);	

//===================
// mysql database info
//===================
$mysql_db = 'cs_ignition';
$mysql_host = 'mysql.winchelldesign.com';
$mysql_user = 'cwinchell';
$mysql_pass = 'ky0t1c';



// do not change settings below this point
//==========================
include 'admin/themes.php';
$release = 'Copyright &copy; 2010';
?>