<?php
// Die if not called by index.php
if(!defined('CALLER_ID'))
{
	echo "This file cannot be called upon directly.";
	exit;
}

// Report all errors, except notices
#error_reporting(E_ALL ^ E_NOTICE);
// For testing purposes, report all errors
error_reporting(E_ALL ^ E_NOTICE);

// Remove variables created by register_globals from the global scope
// Thanks to Matt Kavanagh
function deregister_globals()
{
	$not_unset = array(
		'GLOBALS'	=> true,
		'_GET'		=> true,
		'_POST'		=> true,
		'_COOKIE'	=> true,
		'_REQUEST'	=> true,
		'_SERVER'	=> true,
		'_SESSION'	=> true,
		'_ENV'		=> true,
		'_FILES'	=> true,
		'Ex'		=> true,
		'script_root_path'	=> true
	);

	// Not only will array_merge and array_keys give a warning if
	// a parameter is not an array, array_merge will actually fail.
	// So we check if _SESSION has been initialised.
	if (!isset($_SESSION) || !is_array($_SESSION))
	{
		$_SESSION = array();
	}

	// Merge all into one extremely huge array; unset this later
	$input = array_merge(
		array_keys($_GET),
		array_keys($_POST),
		array_keys($_COOKIE),
		array_keys($_SERVER),
		array_keys($_SESSION),
		array_keys($_ENV),
		array_keys($_FILES)
	);

	foreach ($input as $varname)
	{
		if (isset($not_unset[$varname]))
		{
			// Hacking attempt. No point in continuing unless it's a COOKIE
			if ($varname !== 'GLOBALS' || isset($_GET['GLOBALS']) || isset($_POST['GLOBALS']) || isset($_SERVER['GLOBALS']) || isset($_SESSION['GLOBALS']) || isset($_ENV['GLOBALS']) || isset($_FILES['GLOBALS']))
			{
				exit;
			}
			else
			{
				$cookie = &$_COOKIE;
				while (isset($cookie['GLOBALS']))
				{
					foreach ($cookie['GLOBALS'] as $registered_var => $value)
					{
						if (!isset($not_unset[$registered_var]))
						{
							unset($GLOBALS[$registered_var]);
						}
					}
					$cookie = &$cookie['GLOBALS'];
				}
			}
		}

		unset($GLOBALS[$varname]);
	}

	unset($input);
}

if (!file_exists($script_inc_path . 'config' . $Ex))
{
	die("<p>The config.$Ex file could not be found.</p>");
}

// Include files
require($script_inc_path . 'config' . $Ex);
require($script_inc_path . 'db/' . $dbms . $Ex);

// Instantiate basic class
$db	= new $sql_db();

// Connect to DB
$db->sql_connect($dbhost, $dbuser, $dbpasswd, $dbname, $dbport, false, defined('SCRIPT_DB_NEW_LINK') ? SCRIPT_DB_NEW_LINK : false);

// We do not need this any longer, unset for safety purposes
unset($dbpasswd);
?>