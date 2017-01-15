<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>iGaming CMS Installation</title>
<style type="text/css">
<!--
body,td,p,div {
	font-size: 10pt;
	font-family: arial, verdana, sans-serif;
	color: #000000;
	}
h1 {
    font-size: 12pt;
    font-family: arial, verdana, sans-serif;
    color: #0054a6;
   }

.whitebutton {
	background-color: #ffffff;
	border-style: none;
	font-size: 10pt;
	font-family: arial, verdana, sans-serif;
	font-weight: bold;
	color: blue;
	}
-->
</style>
</head>
<body>

<div align="center">
	<img src="install_header.jpg" alt="iGaming CMS Installation" width="754" height="100"/>
</div>

<table border="0" cellspacing="0" cellpadding="10" width="754" align="center">
	<tr>
		<td>

<?php

if (isset($_REQUEST["step"]))
{
	$step = $_REQUEST["step"];
} else {
	$step = "1";
}

switch($step)
{
	case '1':
		igaming_install::step1();
		break;
	case '2':
		igaming_install::step2();
		break;
	case '3':
		igaming_install::step3();
		break;
	case '4':
		igaming_install::step4();
		break;
	case '5':
		igaming_install::step5();
		break;
	default:
		igaming_install::step1();
		break;
}

class igaming_install
{
	function step1()
	{

		if (file_exists("../config.php"))
		{
			$icon1 = "<img src=\"pass.png\" />";
		} else {
			$icon1 = "<img src=\"fail.png\" />";
		}

		if (is_writable("../config.php"))
		{
			$icon2 = "<img src=\"pass.png\" />";
		} else {
			$icon2 = "<img src=\"fail.png\" />";
		}

		if (file_exists("../sources/db/adodb.inc.php"))
		{
			$icon3 = "<img src=\"pass.png\" />";
		} else {
			$icon3 = "<img src=\"fail.png\" />";
		}

		?>
		<h1>Pre-Installation Check List</h1>

		<table border="0" cellspacing="0" cellpadding="5">

		<tr>
		<td><?php echo $icon1; ?></td>
		<td>Configuration file exists</td>
		</tr>

		<tr>
		<td><?php echo $icon2; ?></td>
		<td>Configuration file is writeable</td>
		</tr>

		<tr>
		<td><?php echo $icon3; ?></td>
		<td>Database libraries found</td>
		</tr>

		</table><br />

		<b>Step 1 of 5 | <a href="index.php?step=2">Next Step</a></b>
		<?php
	}

	function step2()
	{
		?>
		<h1>Database Settings</h1>
		<table border="0" cellspacing="0" cellpadding="5">
		<form method="post" action="index.php">
		<tr>
			<td width="150">Engine:</td>
			<td><select name="db_engine">
				<option value="mysql">Mysql</option>
				<option value="postgres">PostgreSQL</option>
				</select>
			</td>
		</tr>
		<tr>
			<td width="150">Hostname:</td>
			<td><input type="text" name="db_host" size="30" value="localhost"></td>
		</tr>
		<tr>
			<td width="150">Username:</td>
			<td><input type="text" name="db_user" size="30"></td>
		</tr>
		<tr>
			<td width="150">Password:</td>
			<td><input type="text" name="db_pass" size="30"></td>
		</tr>
		<tr>
			<td width="150">Database Name:</td>
			<td><input type="text" name="db_name" size="30"></td>
		</tr>
		</table>
		<h1>Install Location</h1>
		<table border="0" cellspacing="0" cellpadding="5">
		<tr>
			<td width="150">URL:</td>
			<td><input type="text" name="igaming_url" size="30" value="http://"></td>
			<td>Full URL to iGaming CMS, no trailing slash</td>
		</tr>
		</table><br />
		<b>Step 2 of 5 | <input type="submit" name="submit" value="Next Step" class="whitebutton">
		<input type="hidden" name="step" value="3">
		</form>
		<?php
	}

	function step3()
	{
		?>
		<h1>Writing Configuration File</h1>
		<?php
		$string = "<?php\n"
				."\$db_engine = '".$_REQUEST["db_engine"]."';\n"
				."\$db_user = '".$_REQUEST["db_user"]."';\n"
				."\$db_pass = '".$_REQUEST["db_pass"]."';\n"
				."\$db_name = '".$_REQUEST["db_name"]."';\n"
				."\$db_host = '".$_REQUEST["db_host"]."';\n\n"
				."\$sp_url = '".$_REQUEST["igaming_url"]."';\n"
				."\$superadministrator = '1';\n"
				."?>";
		if (is_writable('../config.php'))
		{
			$fp = fopen('../config.php', 'w+');

			$write = fputs($fp, $string);
			fclose($fp);
			?>
			<table border="0" cellspacing="0" cellpadding="5">
			<tr>
			<td><img src="pass.png" /></td>
			<td>Configuration files written successfully</td>
			</tr>
			</table><br />
			<?php
		} else {
			?>
			<table border="0" cellspacing="0" cellpadding="5">
			<tr>
			<td><img src="fail.png"></td><td>Error writing config.php</td>
			</tr>
			<tr><td></td><td><b>Please edit config.php manually before continuing the installation.</b></td></tr>
			<tr><td></td><td><textarea rows="5" cols="50"><?php echo $string; ?></textarea></td></tr>
			</table><br />

			<?php
		}

		print "<b>Step 3 of 5 | <a href=\"index.php?step=4\">Next Step</a></b>";
	}

	function step4()
	{
		require_once("../config.php");
		require_once("../sources/db/adodb.inc.php");
		$db = NewADOConnection($db_engine);
		$db->Connect($db_host,$db_user,$db_pass,$db_name);
		// $db->debug=true;
		?>
		<h1>Creating Database Tables</h1>
		The following log will let you know if there were any errors in populating the database.<br /><br />
		<table border="0" cellspacing="0" cellpadding="5">
		<textarea rows="10" cols="70">
		<?php require_once("dbschema.inc.php"); ?>
		</textarea><br /><br />
		<b>Step 4 of 5 | <a href="index.php?step=5">Next Step</a></b>
		</table>
		<?php
		$db->debug=false;
	}

	function step5()
	{
		?>
		<h1>Installation Completed Successfully</h1>
		<div style="line-height: 150%;">
         iGaming CMS has been successfully installed! Please read the following instructions on getting started
         with your new site.

         <br /><br />

         <ul>
         	<li>Remove or rename the 'install' directory from your site for security reasons.
         	<li>You can log into your administration control panel by going to the /admin directory and using the following login information:<br /><br />
         		Username: admin<br />
         		Password: admin<br /><br />

				&raquo; <a href="../admin/index.php">Control Panel</a><br />
				&raquo; <a href="../index.php">Front Page</a></li>

         </ul>
         </div>
		<?php
	}


}

?>

		</td>
	</tr>
</table>

</body>
</html>