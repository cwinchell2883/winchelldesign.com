<?php
/*
##############################################################
 iGaming CMS Content Management System
 Copyright (C) 2004  Joshua Kimbrel

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
##############################################################
*/

error_reporting(E_ALL & ~E_NOTICE);
@set_magic_quotes_runtime(0);

include "config.php";
include "sources/db/adodb.inc.php";
include "sources/functions.php";
include "sources/functions_menu.php";

$db = NewADOConnection('mysql');
$db->Connect($db_host,$db_user,$db_pass,$db_name);


$spconfig = array();
$sp_configuration = $db->Execute("SELECT * FROM `sp_configuration`");
while ($cfgdata = $sp_configuration->FetchNextObject()) { $spconfig["$cfgdata->KEY"] = stripslashes($cfgdata->VALUE); }
$title = $spconfig['site_title'];

/* Sets whether or not user's browser actually fetches fresh content */
setCache(clean($spconfig['true_refresh']));

function do_header()
{
	include('templates/global_header.inc.php');
}

function do_footer()
{
	include('templates/global_footer.inc.php');
}

// $top = '<font id="menutitle">'.$spconfig['topmenu_title'].'</font>';

$fetch_top = $db->Execute("SELECT * FROM `sp_menu_items` WHERE `location` = 'top' AND `active` = '1' ORDER BY `ordering`");
$total_top = $fetch_top->RecordCount();
while ($row = $fetch_top->FetchNextObject())
{
	$counter++;
	if ($row->TARGET == '_blank')
	{
		$special = 'target="_blank"';
	}

	$top .= ' <a href="' . $row->URL . '">' . $row->TITLE . '</a> ';

	if ($counter < $total_top)
	{
		$top .= " | ";
	}

	$special = '';

}

$counter = 0;

// $bottom = '<font id="menutitle">'.$spconfig['bottommenu_title'].'</font>';
$fetch_bottom = $db->Execute("SELECT * FROM `sp_menu_items` WHERE `location` = 'bottom' AND `active` = '1' ORDER BY `ordering`");
$total_bottom = $fetch_bottom->RecordCount();
while ($row = $fetch_bottom->FetchNextObject())
{
	$counter++;
	if ($row->TARGET == '_blank')
	{
		$special = "target=\"_blank\"";
	}

	$bottom .= ' <a href="' . $row->URL . '">' . stripslashes($row->TITLE) . '</a> ';

	if ($counter < $total_top)
	{
		$bottom .= " | ";
	}

	$special = '';
   }

// LATEST POLL

$PollResult = $db->Execute("SELECT * FROM `sp_polls` ORDER BY `id` DESC LIMIT 1");
$latest_poll = "<b>" . $PollResult->fields['title'] . "</b><br />";

$PollOptions = $db->Execute("SELECT * FROM `sp_polls_options` WHERE `poll_id` = '".$PollResult->fields['id']."' ORDER BY `id`");
while ($row = $PollOptions->FetchNextObject())
{
	$latest_poll .= "<input type='radio' name='id' value='$row->ID'>" . stripslashes($row->TEXT) . "<br />";
}

$latest_poll .= "<a href=\"viewpoll.php?id=".$PollResult->fields['id']."\">View Results</a><br />";

?>