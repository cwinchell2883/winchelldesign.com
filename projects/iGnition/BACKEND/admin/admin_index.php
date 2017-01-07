<?php
session_start();
if (!isset($_SESSION['username']))
{
	echo '<div id="header"><h1>' . $site_name . '</h1></div><div id="gutter"></div><div id="col1">';
	showNav();
	echo '</div><div id="col2"><h1>Access Denied! You must login.</h1>';
	include 'inc/login_form.inc.php';
	echo '</div><div id="footer">' . $release . '</div>';
	exit();
}
if (isset($_SESSION['username']) & ($_SESSION['rank'] > $accesslvl[$_GET['edit_page']]))
{
	echo '<div id="header"><h1>' . $site_name . '</h1></div><div id="gutter"></div><div id="col1">';
	header('refresh:2;url=/iGnition/index.php?page=news');
	echo '</div><div id="col2"><h1>Access Denied! You do not have permission to view this page.</h1>';
	echo '<p>You will be redirected to the home page.</p>';
	echo '</div><div id="footer">' . $release . '</div>';
	exit();
}
else
	mysql_connect($mysql_host, $mysql_user, $mysql_pass) or die(mysql_error());
	mysql_select_db($mysql_db) or die(mysql_error()); 
{
?>
<div id="menu">[&nbsp;<a href="index.php">user mode</a>&nbsp;]&nbsp;&nbsp;[&nbsp;<a href="index.php?page=logout">logout</a>&nbsp;]</div>
<div id="header"><h1>Administration</h1></div>
<div id="gutter"></div>
<div id="col1">
	<?php showAdminNav(); ?>
</div>
<div id="col2">
	<h2>Admin Index</h2>
	<p>
		Welcome to the Administration section.  Use the navigation on the left to administer each section.
	</p>
	<p>&nbsp;</p>
	<h2>Themes</h2>
	<p>Choose the theme you wish to use for the entire site from the drop down list below.</p>
	<?php
	if($_POST['change'])
	{
		$newtheme = $_POST['picktheme'];
		$file = fopen('admin/themes.php', 'w+');
		$str = "<?php \$theme = '".$newtheme."'; ?>";
		fwrite($file, $str);
		fclose($file);
		echo "<meta http-equiv='refresh' content='0;URL=?edit_page=index'>";
	}
	else
	{ ?>
  	<form action="?edit_page=index" method="post">
    Pick a theme: <select name="picktheme">
	<?php
	$dir = "themes/";
	if (is_dir($dir))
	{
		if ($dh = opendir($dir))
		{
			while (($file = readdir($dh)) !== false)
			{
				if (filetype($dir . $file) !== "dir")
				{
					echo '<option value="'.$file.'">'.$file.'</option>';
				}
			}
			closedir($dh);
		}
	} ?>
	</select>
	<br /><input type="submit" name="change" value="Change Theme" />
	</form>
	<?php
	} //end final else
	?>
</div>
<div id="footer"><?php echo $release; ?></div>
<?php
} // end session else
?>