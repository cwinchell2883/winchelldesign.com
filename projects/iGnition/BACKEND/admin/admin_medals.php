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
			$path = $_POST['path'];
			mysql_query("DELETE FROM bcs_medals WHERE id=$id")  or die("Database Entry Could Not Be Deleted\n" . mysql_error());
			unlink($path) or die("File Could Not Be Deleted\n");
			echo "<meta http-equiv='refresh' content='0;URL=?edit_page=medals'>";
		}
		if($_POST['submit'])
		{
			$id = $_POST['id'];
			$name = $_POST['name'];
			$path = "images/medals/" . $_FILES['path']['name'];
			$desc = $_POST['desc'];
			if(strlen($id) > 0)
			{
				mysql_query("UPDATE bcs_medals SET name='$name', description='$desc' WHERE id=$id") or die(mysql_error());
			}
			else
			{
				if(is_uploaded_file($_FILES['path']['tmp_name']))
				{
					move_uploaded_file($_FILES['path']['tmp_name'], "images/medals/" . $_FILES['path']['name']);
					mysql_query("INSERT INTO bcs_medals (id,name,path,description) VALUES ('NULL', '$name', '$path', '$desc')") or die(mysql_error());
					
				}
			}
			echo "<p>The following medal was submitted successfully</p>";
			echo "<p><b>Name:</b> $name<br />";
			echo "<p><b>Image Path:</b> <i>$path</i><br />";
			echo "<p><b>Description:</b> $desc</p>";
		}
		elseif($_POST['edit'])
		{
			$id = $_POST['id'];
			$result = mysql_query("SELECT * FROM bcs_medals WHERE id = " . $id)  or die(mysql_error());
			while($r=mysql_fetch_array($result))
			{
				$id=$r["id"];
				$name=$r["name"];
				$path=$r["path"];
				$desc=$r["description"];
			}
			?>
			<h2>Edit Medal</h2>
			<form action="?edit_page=medals" enctype="multipart/form-data" method="post">
			<p>
				Medal Name: <input type="text" name="name" value="<?php echo $name; ?>" /><br /><br />
				Image: <input disabled type="text" name="path" value="Cannot change Image" /><br /><br />
				Description: <input type="text" name="desc" value="<?php echo $desc?>" /><br /><br />
				<input type="hidden" name="id" value="<?php echo $id; ?>"/>
				<input type="hidden" name="path" value="<?php echo $path; ?>" /> 
				<input type="submit" name="submit" value="Submit" />&nbsp;&nbsp;<input type="reset" />
			</p>
			</form>
		<?php
		}
		else
		{ ?>
			<h2>Add Medal</h2>
			<form action="?edit_page=medals" enctype="multipart/form-data" method="post">
			<p>
				Medal Name: <input type="text" name="name" /><br /><br />
				Image: <input type="file" name="path" /><br /><br />
				Description: <input type="text" name="desc" /><br /><br /> 
				<input type="submit" name="submit" value="Submit" />&nbsp;&nbsp;<input type="reset" />
			</p>
			</form>
		<?php
		} //close else statement
		?>
	</div>
	<div class="half">
		<h2>Current Medals</h2>
		<?php
		$result = mysql_query("SELECT * FROM bcs_medals")  or die(mysql_error());
		while($r=mysql_fetch_array($result))
		{	
			$id=$r["id"];
			$name=$r["name"];
			$path=$r["path"];
			$desc=$r["description"];
			
			echo '<p><img src="'.$path.'" alt="'.$name . '" /><br/>';
			echo $desc;
			echo '<form action="?edit_page=medals" method="post">';
			echo '<input type="submit" value="Del" name="del" />';
			echo '<input type="submit" value="Edit" name="edit" />';
			echo '<input type="hidden" name="id" value="'.$id.'" />';
			echo '<input type="hidden" name="path" value="'.$path.'" />';
			echo '</form></p>';
		}
		?>
	</div>
</div>
<div id="footer"><?php echo $release; ?></div>
<?php
} // end session else
?>