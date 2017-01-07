<?php
// Die if not called by index.php
if(!defined('CALLER_ID'))
{
	echo "This file cannot be called upon directly.";
	exit;
}

// bad practice, i know
if ($_GET)
{
	extract($_GET, EXTR_SKIP);
}

// Returns header information
function echoheader()
{
	global $PHP_SELF, $config_tpl, $tpl_header, $tpl_stylesheet, $tpl_menu;

	get_style($config_tpl);
	$tpl_header = preg_replace('/{stylesheet}/', $tpl_stylesheet, $tpl_header);
    echo $tpl_header;
}

// Returns footer information
function echofooter()
{
	global $PHP_SELF, $config_tpl, $tpl_footer, $tpl_menu, $tpl_proj, $tpl_copy;

	$tpl_footer = preg_replace('/{menu}/', $tpl_menu, $tpl_footer);
	$tpl_footer = preg_replace('/{projects}/', $tpl_proj, $tpl_footer);
	$tpl_footer = preg_replace('/{copyright}/', $tpl_copy, $tpl_footer);
    echo $tpl_footer;

}

function get_style($tpl_style)
{
	global $PHP_SELF, $config_tpl, $tpl_stylesheet, $script_tpl_path;
	
	if(file_exists($script_tpl_path . $tpl_style . '.css'))
	{
		$tpl_stylesheet = ($script_tpl_path . $tpl_style . '.css');
	}
	else
	{
		$tpl_stylesheet = $script_tpl_path . ('default.css');
	}
	return $tpl_stylesheet;
}
?>