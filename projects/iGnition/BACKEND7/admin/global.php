<?php

error_reporting(E_ALL ^ E_NOTICE);

include "../config.php";
include "../sources/auth/auth.inc.php";
include "../sources/db/adodb.inc.php";
include "../sources/admin/functions.php";
include "../sources/admin_templates/controlpanel.class.php";

$db = NewADOConnection('mysql');
$db->Connect($db_host,$db_user,$db_pass,$db_name);

// Please don't touch this. Its for your own good!
$version = "b1p5";

global $pwzid, $pwzlogin, $version;

if ($_SESSION['pwzid'] == $superadministrator)
{
   define('SUPERADMIN_MODE','1');
}

// Cache configuration data
$spconfig = array();
$sp_configuration = $db->Execute("SELECT sp_configuration.key, sp_configuration.value FROM sp_configuration");
while ($row = $sp_configuration->FetchNextObject())
{
	$spconfig["$row->KEY"] = stripslashes($row->VALUE);
}

$cp = new AdminCP;
?>