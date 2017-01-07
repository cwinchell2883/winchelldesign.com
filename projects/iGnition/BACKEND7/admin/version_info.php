<?php

/**
*	iGaming CMS
*	Copyright 2004-2005 Josh Kimbrel
**/

error_reporting(E_ALL ^ E_NOTICE);
require_once( 'global.php' );
$cp->header();

do_module_header('iGaming Packager Service','Download updates and addons for iGaming CMS');

include("../patches/version.inc.php");

include("../patches/adodb_version.inc.php");
include("../patches/cheats_version.inc.php");
include("../patches/companies_version.inc.php");
include("../patches/content_version.inc.php");
include("../patches/customfields_version.inc.php");
include("../patches/download_version.inc.php");
include("../patches/game_version.inc.php");
include("../patches/gui_version.inc.php");
include("../patches/mailbag_version.inc.php");
include("../patches/news_version.inc.php");
include("../patches/pkgr_version.inc.php");
include("../patches/plugins_version.inc.php");
include("../patches/poll_version.inc.php");
include("../patches/preview_version.inc.php");
include("../patches/rcm_version.inc.php");
include("../patches/review_version.inc.php");
include("../patches/screenshot_version.inc.php");
include("../patches/static_version.inc.php");


do_form_header('ver_check.php');
do_table_header('iGaming CMS Version Info');

echo '<tr><td class="formlabel">iGaming Core: <strong>' . $patchid . '</strong></td></tr>';
echo '<tr><td class="formlabel">ADOdb Version: <strong>' . $adodb_version . '</strong></td></tr>';
echo '<tr><td class="formlabel">Cheat Manager Version: <strong>' . $cheats_version . '</strong></td></tr>';
echo '<tr><td class="formlabel">Companies Manager Version: <strong>' . $companies_version . '</strong></td></tr>';
echo '<tr><td class="formlabel">Content Download System Version: <strong>' . $content_version . '</strong></td></tr>';
echo '<tr><td class="formlabel">Custom Field Manager: <strong>' . $customfields_version . '</strong></td></tr>';
echo '<tr><td class="formlabel">Download Manager Version: <strong>' . $download_version . '</strong></td></tr>';
echo '<tr><td class="formlabel">Game Manager Version: <strong>' . $game_version . '</strong></td></tr>';
echo '<tr><td class="formlabel">GUI Version: <strong>' . $gui_version . '</strong></td></tr>';
echo '<tr><td class="formlabel">Mailbag Version: <strong>' . $mailbag_version . '</strong></td></tr>';
echo '<tr><td class="formlabel">News Manager Version: <strong>' . $news_version . '</strong></td></tr>';
echo '<tr><td class="formlabel">Packager Service: <strong>' . $packager_version . '</strong></td></tr>';
echo '<tr><td class="formlabel">Plugin Manager Version: <strong>' . $plugins_version . '</strong></td></tr>';
echo '<tr><td class="formlabel">Poll Manager Version: <strong>'.$poll_version.'</strong></td></tr>';
echo '<tr><td class="formlabel">Preview Manager Version: <strong>' . $preview_version . '</strong></td></tr>';
echo '<tr><td class="formlabel">Relational Content Manager Version: <strong>' . $rcm_version . '</strong></td></tr>';
echo '<tr><td class="formlabel">Screenshot Manager Version: <strong>' . $screenshot_version . '</strong></td></tr>';
echo '<tr><td class="formlabel">Static Page Manager Version: <strong>' . $static_version . '</strong></td></tr>';

do_submit_row('Return to Package Center');
do_table_footer();
do_form_footer();

$cp->footer();

?>