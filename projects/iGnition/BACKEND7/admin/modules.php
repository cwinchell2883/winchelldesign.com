<?php

require("global.php");
$cp->header();
$links = '<a href="modules.php?do=install">Install Module</a>';

do_module_header('Module Manager',$links);

if (!isset($_REQUEST['do']))
{
	$result = $db->Execute("SELECT *
							FROM sp_modules
							ORDER BY `title`;");
	do_table_header('Modules');

	while ($row = $result->FetchNextObject())
	{
		echo '<tr><td class="formlabel">';

		if ($row->ACTIVE == '1')
		{
			echo '<a href="modules.php?do=unpublish&id='.$row->ID.'">';
			echo '<img src="../images/admin/published.jpg" border="0"></a><b>';
		} else {
			echo '<a href="modules.php?do=publish&id='.$row->ID.'">';
			echo '<img src="../images/admin/unpublished.jpg" border="0"></a>';
		}

		echo ' ' . stripslashes($row->TITLE);
		echo '</td></tr>';
	}

	do_table_footer();
}

if ($_REQUEST['do'] == 'unpublish')
{
	if (empty($_REQUEST['id']))
	{
		echo 'Error: invalid module id number';
	} else {
		$record["active"] = '0';
		$db->AutoExecute("sp_modules",$record,'UPDATE',"`id` = '{$_REQUEST['id']}'");
		SPMessage('Success | Module has been disabled','modules.php');
	}
}

if ($_REQUEST['do'] == 'publish')
{
	if (empty($_REQUEST['id']))
	{
		echo 'Error: invalid module id number';
	} else {
		$record["active"] = '1';
		$db->AutoExecute("sp_modules",$record,'UPDATE',"`id` = '{$_REQUEST['id']}'");
		SPMessage('Success | Module has been enabled','modules.php');
	}
}

if ($_REQUEST['do'] == 'install')
{
	do_form_header('modules.php');
	do_table_header('Install Module');
	do_text_row('Title','title');
	do_text_row('Filename','filename');
	do_submit_row('Install');
	do_table_footer();
	echo '<input type="hidden" name="do" value="install2">';
	do_form_footer();
}

if ($_REQUEST['do'] == 'install2')
{
	$record["title"] = $_REQUEST['title'];
	$record["url"] = $_REQUEST['filename'];
	$db->AutoExecute("sp_modules",$record,'INSERT');
	SPMessage('Success | Module has been added to control panel','modules.php');
}

$cp->footer();

?>