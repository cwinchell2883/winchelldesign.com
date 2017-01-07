<?php

require_once( 'global.php' );
require_once( '../sources/admin/configuration.class.php' );
$module = new Module;

$cp->header();
$module->printHeader();

switch($_REQUEST['setting'])
{
	default:
		break;
	case 'global':
		$module->editGlobal();
		break;
}

switch($_REQUEST['do'])
{
	default:
		break;
	case 'global_save':
		$module->saveGlobal();
		break;
}

$cp->footer();
?>