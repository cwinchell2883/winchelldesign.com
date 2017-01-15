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
	<div class="half">
		<?php
		if($_POST['del'])
		{
			$id = $_POST['id'];
			mysql_query("DELETE FROM bcs_diplomacy WHERE id=$id")  or die(mysql_error());
			echo "<meta http-equiv='refresh' content='0;URL=?edit_page=diplomacy'>";
		}
		if($_POST['submit'])
		{
			$id = $_POST['id'];
			$clan = $_POST['clan'];
			$channel = $_POST['channel'];
			$status = $_POST['status'];
			if(strlen($id) > 0)
			{
				mysql_query("UPDATE bcs_diplomacy SET clan='$clan', channel='$channel', status='$status' WHERE id=$id") or die(mysql_error()); 
			}
			else
			{
				mysql_query("INSERT INTO bcs_diplomacy (id,clan,channel,status) VALUES ('NULL', '$clan', '$channel', '$status')") or die(mysql_error()); 
			}
			echo "<p>The following rank was submitted successfully</p>";
			echo "<p><b>Clan Name:</b> $clan <br />";
			echo "<b>Channel:</b> $channel <br />";
			echo "<b>Status:</b> $status </p>";
		}
		elseif($_POST['edit'])
		{
			$id = $_POST['id'];
			$result = mysql_query("SELECT * FROM bcs_diplomacy WHERE id=$id")  or die(mysql_error());
			while($r=mysql_fetch_array($result))
			{
				$id = $r['id'];
				$clan = $r['clan'];
				$channel = $r['channel'];
				$status = $r['status'];
			}?>
			<h2>Edit Diplomacy</h2>
			<form action="?edit_page=diplomacy" method="post">
			<p>
				Clan Name: <input type="text" name="clan" value="<?php echo $clan; ?>"/><br /><br />
				Channel: <input type="text" name="channel" value="<?php echo $channel; ?>"/><br /><br />
				Status: <select name="status">
					<option value="Ally">Ally</option>
					<option value="Neutral">Neutral</option>
					<option value="Enemy">Enemy</option>
				</select>
				<br /><br />
				<input type="hidden" name="id" value="<?php echo $id; ?>"/>
				<input type="submit" name="submit" value="Submit" />&nbsp;&nbsp;<input type="reset" />
			</p>
			</form>
		<?php
		}
		else
		{ ?>
			<h2>Add Diplomacy</h2>
			<form action="?edit_page=diplomacy" method="post">
			<p>
				Clan Name: <input type="text" name="clan" /><br /><br />
				Channel: <input type="text" name="channel" /><br /><br />
				Status: <select name="status">
					<option value="Ally">Ally</option>
					<option value="Neutral">Neutral</option>
					<option value="Enemy">Enemy</option>
				</select>
				<br /><br />
				<input type="submit" name="submit" value="Submit" />&nbsp;&nbsp;<input type="reset" />
			</p>
			</form>
		<?php
		} // close else statement
		?>
	</div>
	<div class="half">
		<h2>Current Diplomacy</h2>
		<?php
		$result = mysql_query("SELECT * FROM bcs_diplomacy")  or die(mysql_error());
		while($r=mysql_fetch_array($result))
		{	
			$id=$r["id"];
			$clan=$r["clan"];
			$channel=$r["channel"];
			$status=$r["status"];
			
			echo "<p>" . $status . " - " . $clan . "&nbsp;";
			echo '<form action="?edit_page=diplomacy" method="post">';
			echo '<input type="submit" value="Del" name="del" />';
			echo '<input type="submit" value="Edit" name="edit" />';
			echo '<input type="hidden" name="id" value="'.$id.'" />';
			echo '</form></p>';
		}
		?>
	</div>
</div>
<div id="footer"><?php echo $release; ?></div>
<?php
} // end session else
?>
