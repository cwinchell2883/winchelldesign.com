<?php

echo "Hello World!"

// Compress Website
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))
{
	ob_start("ob_gzhandler");
}
else
{
	ob_start();
}

// Define Caller ID
define('CALLER_ID', true);

// Set some variables
$script_root_path = (defined('SCRIPT_ROOT_PATH')) ? SCRIPT_ROOT_PATH : './';
$script_inc_path = (defined('SCRIPT_INC_PATH')) ? SCRIPT_INC_PATH : $script_root_path . 'includes/';
$script_tpl_path = (defined('SCRIPT_TPL_PATH')) ? SCRIPT_TPL_PATH : $script_root_path . 'templates/';
$Ex = '.' . substr(strrchr(__FILE__, '.'), 1);
$PHP_SELF = 'index' . $Ex;
$pagefile = array
(
	'main'		=> '1',
	'about'		=> '1',
	'contact'	=> '1',
	'proj'		=> '1',
	'admin'		=> '1',
);

// Do some includes
require_once($script_root_path . 'common' . $Ex);
require_once($script_inc_path . 'functions' . $Ex);
require_once($script_tpl_path . $config_tpl . $Ex);

echoheader();

if($p == '')
{
	require($script_inc_path . 'main' . $Ex);
}
elseif($pagefile[$p] == '1')
{
	if($p == 'admin')
	{
		@header('Location:'.$script_root_path.'acp_'.$config_acp.'/index.php');
#		require($script_root_path . 'acp_' . $config_acp . '/index' . $Ex);
	}
	else
	{
		require($script_inc_path . $p . $Ex);
	}
}
elseif($pagefile[$p] == '0')
{
	require($script_inc_path . 'error' . $Ex);
}
else
{
	require($script_inc_path . '404' . $Ex);
}

echofooter();
?>
