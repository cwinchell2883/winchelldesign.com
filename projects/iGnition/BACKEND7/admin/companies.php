<?php

error_reporting(E_ALL ^ E_NOTICE);

switch ($_REQUEST['do'])
{
	case 'View Matrix':
		$refresh = "rcm_matrix.php?do=viewmatrix&type=companies&id=" . $_REQUEST[id];
		break;
	case 'add_confirm':
		$refresh = "companies.php";
		break;
	case 'edit_confirm':
		$refresh = "companies.php";
		break;
}

include "global.php";
include "../sources/admin/companies.class.php";

$cp->header();

$module = new Module;

$module->header();

switch($_REQUEST['do'])
{
	case 'add_company':
		$module->add();
		break;

	case 'add_confirm':
		$module->add_confirm();
		break;

	case 'Delete Company':
		$module->delete();
		break;

	case 'Edit Company':
		$module->edit();
		break;

	case 'edit_confirm':
		$module->save();
		break;

	case 'View Matrix':
		$module->view_matrix();
		break;

	default:
		$module->main();
		break;
}

$cp->footer();

?>