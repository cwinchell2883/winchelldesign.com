<?php

error_reporting(E_ALL ^ E_NOTICE);

switch ($_REQUEST['do'])
{
	case 'add_download_confirm': case 'edit_download_confirm':
		$refresh = "downloads.php?do=manage&id={$_REQUEST['gameid']}";
		break;
	case 'delete':
		$refresh = "downloads.php?do=manage&id={$_REQUEST['gameid']}";
		break;
}

include "global.php";
include "../sources/admin/downloads.class.php";

$cp->header();

$module = new Module;
$module->header();

switch($_REQUEST['do'])
{
	case 'add':
		$module->add();
		break;
	case 'add_download_confirm':
		$module->add_confirm();
		break;
	case 'delete':
		$module->delete();
		break;
	case 'edit':
		$module->edit();
		break;
	case 'edit_download_confirm':
		$module->edit_confirm();
		break;
	case 'manage':
		$module->manage();
		break;
	default:
		$module->main();
		break;
}

$cp->footer();
?>