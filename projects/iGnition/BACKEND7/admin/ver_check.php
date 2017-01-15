<?php

/***
* iGaming CMS
* Copyright 2004-2006 Josh Kimbrel
***/

/*** Set error reporting level ***/
error_reporting(E_ALL ^ E_NOTICE);

/*** Include Necessary Files ***/
require_once( 'global.php' );
require_once( '../sources/version.inc.php' );

/*** Output Header HTML ***/
$cp->header();

do_module_header('iGaming CMS Updates','Download updates and addons for iGaming CMS');
/*** URL to updates page ***/
$url = 'http://forums.igamingcms.com/forumdisplay.php?f=5';

echo '<b>Current Version: ' . $patchid . '</b>';

?>
<iframe width='100%' height='400' style="border: 1px solid #404040;" src='<?= $url; ?>'></iframe>


<?php
$cp->footer();
?>
