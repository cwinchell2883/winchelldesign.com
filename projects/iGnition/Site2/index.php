<?php
#iGnition CMS System
#(c)2010 by Chris Winchell (winchell.design@gmail.com)
#This project is ongoing...
#
#This program is not distributed under the terms of the GNU General
#Public License and will not be published or distributed without
#prior written consent of its owner. If leaked, the fradulent user
#accepts upon themselves all responsabilities of their actions and
#may be persued by leagal action.
#
#ATTN: Chris Winchell, 919 41st ST NW, Rochester, Minnesota 55901-4268, USA


// Minimizer All Errors
error_reporting(E_ALL);

// Calculate Script Start Variables
$time_start = microtime();
$memory_start = (function_exists('memory_get_usage')?memory_get_usage():0);

// Check for possible XSS attacks via $_GET
foreach ($_GET as $check_url) {
	if (!is_array($check_url)) {
		$check_url = str_replace("\"", "", $check_url);
		if ((preg_match("/<[^>]*script*\"?[^>]*>/i", $check_url)) || (preg_match("/<[^>]*object*\"?[^>]*>/i", $check_url)) ||
			(preg_match("/<[^>]*iframe*\"?[^>]*>/i", $check_url)) || (preg_match("/<[^>]*applet*\"?[^>]*>/i", $check_url)) ||
			(preg_match("/<[^>]*meta*\"?[^>]*>/i", $check_url)) || (preg_match("/<[^>]*style*\"?[^>]*>/i", $check_url)) ||
			(preg_match("/<[^>]*form*\"?[^>]*>/i", $check_url)) || (preg_match("/\([^>]*\"?[^)]*\)/i", $check_url)) ||
			(preg_match("/\"/i", $check_url))) {
		die ();
		}
	}
}
unset($check_url);

// Start Output Buffering
ob_start("ob_gzhandler");
ob_start();

// Locate config.php and set the basedir path
$folder_level = ""; $i = 0;
while (!file_exists($folder_level."config.inc.php")) {
	$folder_level .= "../"; $i++;
	if ($i == 5) { die("Config file not found"); }
}
require_once $folder_level."config.inc.php";

// If config.php is corrupt display error
if (!isset($db_name)) { die("There appears to be a problem with the config file, please check file for integrity"); }

// Common definitions
define("BASEDIR", $folder_level);
define("IN_SITE", true);
define("USER_IP", $_SERVER['REMOTE_ADDR']);

// Database definitions
define("DB_SETTINGS", DB_PREFIX."settings");

// Path definitions
define("ADMIN", BASEDIR."admin/");
define("IMG", BASEDIR."images/");
define("INC", BASEDIR."includes/");
define("FORUM", BASEDIR."forums/");
define("THEMES", BASEDIR."themes/");

// Included functions file
require_once INC."functions.inc.php";

// Establish SQL Connection
$link = dbconnect($db_host, $db_user, $db_pass, $db_name);

// Fetch Site Settings from the DB and store in $settings variable
$settings = dbarray(dbquery("SELECT * FROM ".DB_SETTINGS));

echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
echo "<head>\n";
echo "<title>".$settings['sitename']."</title>\n";
echo "<link rel='stylesheet' type='text/css' href='".INC."styles.css' />\n";
include INC."user_header.php";
echo "</head>\n";

include INC."theme.php";

$time_end = microtime();
$memory_end = (function_exists('memory_get_usage')?memory_get_usage():0);
$memory_end = $memory_end - $memory_start;
$memory_end = (function_exists('memory_convert')?memory_convert($memory_end):0);
$memory_peak = (function_exists('memory_get_peak_usage')?memory_get_peak_usage():0);
$memory_peak = (function_exists('memory_convert')?memory_convert($memory_peak):0);

echo "<!-- page loaded in ".microtime_diff($time_start,$time_end)." seconds / query count: ".(isset($db->query_count)?$db->query_count:'0')." / used memory: {$memory_end} / peak memory: {$memory_peak} -->\n";
?>