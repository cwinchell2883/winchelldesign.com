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
			mysql_query("DELETE FROM bcs_ranks WHERE id=$id")  or die(mysql_error());
			echo "<meta http-equiv='refresh' content='0;URL=?edit_page=ranks'>";
		}
		if($_POST['submit'])
		{
			$id = $_POST['id'];
			$order = $_POST['order'];
			$name = $_POST['name'];
			if(strlen($id) > 0)
			{
				mysql_query("UPDATE bcs_ranks SET `order`='$order', name='$name' WHERE id=$id") or die(mysql_error());
			}
			else
			{
				mysql_query("INSERT INTO bcs_ranks (id,`order`,name) VALUES ('NULL', '$order', '$name')") or die(mysql_error()); 
			}
			
			echo "<p>The following rank was added successfully</p>";
			echo "<p><b>Rank:</b> $name</p>";
		}
		elseif($_POST['edit'])
		{
			$id = $_POST['id'];
			$result = mysql_query("SELECT * FROM bcs_ranks WHERE id = " . $id)  or die(mysql_error());
			while($r=mysql_fetch_array($result))
			{
				$id=$r["id"];
				$order=$r["order"];
				$name=$r["name"];
			}
			?>
			<h2>Edit Rank</h2>
			<form action="?edit_page=ranks" method="post">
			<p>
				Rank Order: <input type="text" name="order" value="<?php echo $order; ?>"/><br /><br />
				Rank Name: <input type="text" name="name" value="<?php echo $name; ?>"/><br /><br />
				<input type="hidden" name="id" value="<?php echo $id; ?>" />
				<input type="submit" name="submit" value="Update Rank" />&nbsp;&nbsp;<input type="reset" />
			</p>
			</form>
		<?php
		}
		else
		{ ?>
			<h2>Add Rank</h2>
			<form action="?edit_page=ranks" method="post">
			<p>
				Rank Order: <input type="text" name="order" /><br /><br />
				Rank Name: <input type="text" name="name" /><br /><br />
				<input type="submit" name="submit" value="Add Rank" />&nbsp;&nbsp;<input type="reset" />
			</p>
			</form>
		<?php
		} //close else statement
		?>
	</div>
	<div class="half">
		<h2>Current Ranks</h2>
		<?php
		$result = mysql_query("SELECT * FROM bcs_ranks ORDER BY `order`")  or die(mysql_error());
		
		while($r=mysql_fetch_array($result))
		{
			$id=$r["id"];
			$order=$r["order"];
			$name=$r["name"];
			if($id == '1')
			{
				echo $order . ". " . $name . "<br/>";
			}
			else
			{
				echo $order . ". " . $name;
				echo '<form action="?edit_page=ranks" method="post">';
				echo '<input type="submit" value="Del" name="del" />';
				echo '<input type="submit" value="Edit" name="edit" />';
				echo '<input type="hidden" name="id" value="'.$id.'" />';
				echo '</form><br/>';
			}
		}
		?>
	</div>
</div>
<div id="footer"><?php echo $release; ?></div>
</body>
</html>
<?php
} // end session else
?>
