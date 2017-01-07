<?php

error_reporting(E_ALL ^ E_NOTICE);

include "global.php";
include "../sources/admin/content.class.php";

$cp->header();

$module = new Module;
$module->header();

switch($_REQUEST['do'])
{
    case 'import_game':
        $module->import_game();
        break;
    default:
        $module->main();
        break;
}

$cp->footer();

?>

