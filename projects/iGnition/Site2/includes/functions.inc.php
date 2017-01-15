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


// Caller ID
if (!defined("IN_SITE")) { die("Access Denied"); }

// Figures difference between two microtime()
function microtime_diff($a, $b) {
	list($a_dec, $a_sec) = explode(" ", $a);
	list($b_dec, $b_sec) = explode(" ", $b);
	return $b_sec - $a_sec + $b_dec - $a_dec;
}

// MySQL database functions
function dbquery($query) {
	$result = @mysql_query($query);
	if (!$result) {
		echo mysql_error();
		return false;
	} else {
		return $result;
	}
}

function dbcount($field, $table, $conditions = "") {
	$cond = ($conditions ? " WHERE ".$conditions : "");
	$result = @mysql_query("SELECT Count".$field." FROM ".$table.$cond);
	if (!$result) {
		echo mysql_error();
		return false;
	} else {
		$rows = mysql_result($result, 0);
		return $rows;
	}
}

function dbresult($query, $row) {
	$result = @mysql_result($query, $row);
	if (!$result) {
		echo mysql_error();
		return false;
	} else {
		return $result;
	}
}

function dbrows($query) {
	$result = @mysql_num_rows($query);
	return $result;
}

function dbarray($query) {
	$result = @mysql_fetch_assoc($query);
	if (!$result) {
		echo mysql_error();
		return false;
	} else {
		return $result;
	}
}

function dbarraynum($query) {
	$result = @mysql_fetch_row($query);
	if (!$result) {
		echo mysql_error();
		return false;
	} else {
		return $result;
	}
}

function dbconnect($db_host, $db_user, $db_pass, $db_name) {
	$db_connect = @mysql_connect($db_host, $db_user, $db_pass);
	$db_select = @mysql_select_db($db_name);
	if (!$db_connect) {
		die("<div style='font-family:Verdana;font-size:11px;text-align:center;'><b>Unable to establish connection to MySQL</b><br />".mysql_errno()." : ".mysql_error()."</div>");
	} elseif (!$db_select) {
		die("<div style='font-family:Verdana;font-size:11px;text-align:center;'><b>Unable to select MySQL database</b><br />".mysql_errno()." : ".mysql_error()."</div>");
	}
}

// Check that site theme exists
function theme_exists($theme) {
	if (!file_exists(THEMES) || !is_dir(THEMES)) {
		return false;	
	} else if (file_exists(THEMES.$theme."/theme.php") && file_exists(THEMES.$theme."/styles.css")) {
		define("THEME", THEMES.$theme."/");
		define("THEME_NAME", $theme);
		return true;
	} else {
		$dh = opendir(THEMES);
		while (false !== ($entry = readdir($dh))) {
			if ($entry != "." && $entry != ".." && is_dir(THEMES.$entry)) {
				if (file_exists(THEMES.$entry."/theme.php") && file_exists(THEMES.$entry."/styles.css")) {
					define("THEME", THEMES.$entry."/");
					return true;
					exit;
				}
			}
		}
		closedir($dh);
		if (!defined("THEME")) {
			return false;
		}
	}
}

?>