<?php

require_once( 'global.php' );
require_once( '../sources/admin/customfields.class.php' );

$links = '<a href="customfields.php?do=add">Add Field</a>';

$cp->header();
do_module_header("Custom Field Manager",$links);

$module = new Module;

switch($_REQUEST['do'])
{
	case 'add':
		$module->add();
		break;
	case 'add_confirm':
		$module->add_confirm();
		break;
	case 'Delete Field':
		$module->delete();
		break;
	case 'Edit Field':
		$module->edit();
		break;
	case 'edit_confirm':
		$module->edit_confirm();
		break;
	default:
		$module->main();
		break;
}

$cp->footer();

?>