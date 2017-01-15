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
   <h2>Update History</h2>
    <?php
	if($_POST['submit'])
	{
		$history = $_POST['history'];
		mysql_query("UPDATE bcs_history SET history='$history' WHERE id=1") or die(mysql_error()); 
		echo "<p>The following history was saved successfully</p>";
		echo "<p>".$history."</p>";
		echo 'Click <a href="admin.php?edit_page=history">here</a> to reload page.';
    }
	else
	{
		$result = mysql_query("SELECT * FROM bcs_history WHERE id=1")  or die(mysql_error());
		while($r=mysql_fetch_array($result))
		{
			$history=$r["history"];
		}  
		?>
		<script type="text/javascript" src="inc/messageboard.inc.js"></script>
		<form action="?edit_page=history" method="post">
		<p>
			History:<br/>
			<script type="text/javascript">var bb = new BBCode();</script>
			<p>
				<input type="button" onclick="bb.insertCode('B', 'bold');" value="B" title="Bold text" />
				<input type="button" onclick="bb.insertCode('I', 'italic');" value="I" title="Italic text" />
				<input type="button" onclick="bb.insertCode('U', 'underline');" value="U" title="Underlined text" />
				<input type="button" onclick="bb.insertCode('QUOTE', 'quote');" value="Quote" title="Insert a quote" />
				<input type="button" onclick="bb.insertImage();" value="Image" title="Inset an image" />
				<input type="button" onclick="bb.insertLink();" value="Link" title="Insert a link" /><br /> 
			</p>
			<textarea name="history" id="history" rows="10" cols="60"><?php echo $history; ?></textarea><br /><br />
			<script type="text/javascript">bb.init('history');</script> 
			<input type="submit" name="submit" value="Update History" />&nbsp;&nbsp;<input type="reset" />
		</p>
		</form>
	<?php
	}
    ?>
    </form>
</div>
<div id="footer"><?php echo $release; ?></div>
<?php
} // end session else
?>
