<?php
// Die if not called by index.php
if(!defined('CALLER_ID'))
{
	echo "This file cannot be called upon directly.";
	exit;
}

// Database Variables
$dbms = 'mysql';
$dbhost = 'mysql.winchelldesign.com';
$dbname = 'main';
$dbuser = 'cwinchell';
$dbpasswd = 'ky0t1c';
$table_prefix = 'phpbb_';
$acm_type = 'file';

// Configuration File
$config_tpl = 'default';
$config_acp = 'kjhs4523';
$config_version = 'v1.0.0';
$config_build = '';
$config_title = 'Winchell Design';

// @define('DEBUG', true);
// @define('DEBUG_EXTRA', true);
?>