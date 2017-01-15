<?php

error_reporting(E_ALL ^ E_NOTICE);
require_once( 'global.php' );
require_once( '../sources/admin/dbtools.class.php' );

$cp->header();

$links = '<a href="dbtools.php?do=query">Query Tool</a> | ';
$links .= '<a href="dbtools.php?do=stats">Database Statistics</a>';

do_module_header("Database Tools",$links);

$module = new Module;

switch($_REQUEST['do'])
{
	case 'query':
		$module->sql_query();
		break;
	case 'run_query':
		$module->run_query();
		break;
	case 'stats':
		$module->viewStatistics();
		break;
}

$cp->footer();

?>