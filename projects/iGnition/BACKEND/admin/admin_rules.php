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
			mysql_query("DELETE FROM bcs_rules WHERE id=$id")  or die(mysql_error());
			echo "<meta http-equiv='refresh' content='0;URL=?edit_page=rules'>";
		}
		if($_POST['submit'])
		{
			$id = $_POST['id'];
			$num = $_POST['num'];
			$rule = $_POST['rule'];
			if(strlen($id) > 0)
			{
				mysql_query("UPDATE bcs_rules SET num='$num', rule='$rule' WHERE id=$id") or die(mysql_error());
			}
			else
			{
				mysql_query("INSERT INTO bcs_rules (id,num,rule) VALUES ('NULL', '$num', '$rule')") or die(mysql_error()); 
			}
			echo "<p>The following rule was submitted successfully</p>";
			echo "<p><b># $num </b><br />";
			echo "<b>Rule:</b> $rule</p>";
		}
		elseif($_POST['edit'])
		{
			$id = $_POST['id'];
			$result = mysql_query("SELECT * FROM bcs_rules WHERE id = " . $id)  or die(mysql_error());
			while($r=mysql_fetch_array($result))
			{
				$id=$r["id"];
				$num=$r["num"];
				$rule=$r["rule"];
			}
			?>
			<h2>Edit Rules</h2>
			<form action="?edit_page=rules" method="post">
			<p>
				Number: <input type="text" name="num" value="<?php echo $num; ?>" /><br /><br />
				Rule: <input type="text" name="rule" value="<?php echo $rule; ?>" /><br /><br />
				<input type="hidden" name="id" value="<?php echo $id; ?>" />
				<input type="submit" name="submit" value="Update Rules" />&nbsp;&nbsp;<input type="reset" />
			</p>
			</form>
      <?php
		}
		else
		{ ?>
			<h2>Add Rules</h2>
			<form action="?edit_page=rules" method="post">
			<p>
				Number: <input type="text" name="num" /><br /><br />
				Rule: <input type="text" name="rule" /><br /><br />
				<input type="submit" name="submit" value="Submit" />&nbsp;&nbsp;<input type="reset" />
			</p>
			</form>
		<?php
		} //close else statement
		?>
	</div>
	<div class="half">
		<h2>Current Rules</h2>
		<?php
		$result = mysql_query("SELECT num, rule, id FROM bcs_rules ORDER BY num + 0")  or die(mysql_error());
		while($r=mysql_fetch_array($result))
		{	
			$id=$r["id"];
			$num=$r["num"];
			$rule=$r["rule"];
			echo "<p><b>Rule #$num</b><br />$rule";
			echo '<form action="?edit_page=rules" method="post">';
			echo '<input type="submit" value="Del" name="del" />';
			echo '<input type="submit" value="Edit" name="edit" /><br />';
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