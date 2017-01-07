<?php

error_reporting(E_ALL ^ E_NOTICE);

include "../config.php";
include "../sources/auth/auth.inc.php";
include "../sources/db/adodb.inc.php";
include "../sources/admin/functions.php";
include "../sources/admin_templates/controlpanel.class.php";

$db = NewADOConnection('mysql');
$db->Connect($db_host,$db_user,$db_pass,$db_name);

if (empty($_REQUEST['title']))
{
	$statusmessage = "Status: Idle";
} else {
	$statusmessage = "<b>Status:</b> Content received, checking integrity...<br />";
	$result = $db->Execute("SELECT id,title FROM sp_games_sections WHERE title = '$_REQUEST[platform]'");
	if ($result->RecordCount() >= 1)
	{
		$record['section'] = $result->fields['id'];
		$statusmessage .= "<b>Status:</b> USING PLATFORM ID " . $result->fields['id'] . "<br />";

	} else {

		$db->Execute("INSERT INTO sp_games_sections (title) VALUES ('$_REQUEST[platform]')");
		$result = $db->Execute("SELECT id,title FROM sp_games_sections WHERE title = '$_REQUEST[platform]'");
		$record['section'] = $result->fields['id'];
		$statusmessage .= "<b>Status:</b> CREATING PLATFORM<br />";
	}

	$record['title'] = $_REQUEST['title'];
	$record['published'] = '1';

	$db->AutoExecute('sp_games',$record,'INSERT');

	$statusmessage .= "<b>Status:</b> ADDING GAME COMPLETE";
}



?>
<html>
<head>
	<style type="text/css">
	body {
		margin: 3px;
		font-family: Verdana;
		font-size: 11px; }
	</style>
</head>

<body>

<?php echo $statusmessage; ?>

</body>
</html>