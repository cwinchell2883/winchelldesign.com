<?php
// Die if not called by index.php
if(!defined('CALLER_ID'))
{
	echo "This file cannot be called upon directly.";
	exit;
}

// Report all errors, except notices
#error_reporting(E_ALL ^ E_NOTICE);
// For testing purposes, report all errors
error_reporting(E_ALL ^ E_NOTICE);

if (!file_exists($script_inc_path . 'config' . $Ex))
{
	die("<p>The config.$Ex file could not be found.</p>");
}

// Include files
require($script_inc_path . 'config' . $Ex);
?>