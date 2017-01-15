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
			mysql_query("DELETE FROM bcs_members WHERE id=$id")  or die(mysql_error());
			echo "<meta http-equiv='refresh' content='0;URL=?edit_page=members'>";
		}
		if($_POST['delmedal'])
		{
			$id = $_POST['id'];
			mysql_query("DELETE FROM bcs_medal_list WHERE id=$id")  or die(mysql_error());
			echo "<meta http-equiv='refresh' content='0;URL=?edit_page=members'>";
		}
		if($_POST['addmedal'])
		{
			$member_name = $_POST['name'];
			echo "<h2>" . $member_name . "'s Medals</h2>";
			$member_id = $_POST['id'];
			$sql = 'SELECT `bcs_medals` . `path` , `bcs_medals` . `name` , `bcs_medals` . `description` , `bcs_medal_list` . `id` '
				. ' FROM `bcs_medals` , `bcs_members` , `bcs_medal_list` '
				. ' WHERE `bcs_members` . `id` = ' . $member_id
				. ' AND `bcs_medal_list` . `mem_id` = `bcs_members` . `id` '
				. ' AND `bcs_medal_list` . `medal` = `bcs_medals` . `id` ';
			$result = mysql_query($sql)  or die(mysql_error());
			while($r=mysql_fetch_array($result))
			{
				$id=$r["id"];
				$path=$r["path"];
				$name=$r["name"];
				$desc=$r["description"];
				echo '<p><img src="'.$path.'" alt="'.$name . '" />';
				echo '<form action="?edit_page=members" method="post">';
				echo '<input type="submit" value="Del" name="delmedal" /><br/>';
				echo '<input type="hidden" name="id" value="'.$id.'" />';
				echo '</form>';
				echo $desc . '</p>';
			}
			?>
			<h3>Add Medal</h3>
			<form action="?edit_page=members" method="post">
			<p>
				<select name="medal">
				<?php
				$result = mysql_query("SELECT * FROM bcs_medals")  or die(mysql_error());
				while($r=mysql_fetch_array($result))
				{
					echo '<option value="' . $r["id"] . '">' .  $r["name"] . '</option>';
				} ?>
				</select>
				<input type="hidden" name="member_id" value="<?php echo $member_id; ?>" />
				<input type="submit" name="insertmedal" value="Add Medal" />
			</p>
			</form>
		<?php
		}
		elseif($_POST['insertmedal'])
		{
			$medal = $_POST['medal'];
			$member_id = $_POST['member_id'];
			mysql_query("INSERT INTO bcs_medal_list (id,mem_id,medal) VALUES ('NULL', '$member_id', '$medal')") or die(mysql_error());
			echo "<p>Medal successfully added.</p>";
		}
		elseif($_POST['submit'])
		{
			$id = $_POST['id'];
			$name = $_POST['name'];
			$rank = $_POST['rank'];
			$email = $_POST['email'];
			$recruit = $_POST['recruit'];
			$date = $_POST['date'];
			if(strlen($id) > 0)
			{
				if(strlen($_POST['password']) > 0) {
					$password = md5($_POST['password']);
					mysql_query("UPDATE bcs_members SET name='$name', rank='$rank', email='$email', recruit='$recruit', date='$date', password='$password' WHERE id=$id") or die(mysql_error());
				} else {
					mysql_query("UPDATE bcs_members SET name='$name', rank='$rank', email='$email', recruit='$recruit', date='$date' WHERE id=$id") or die(mysql_error());
				}
			}
			else
			{
				$password = md5($_POST['password']);
				mysql_query("INSERT INTO bcs_members (id,name,rank,email,recruit,date,password) VALUES ('NULL', '$name', '$rank', '$email', '$recruit', '$date', '$password')") or die(mysql_error());
			}
			echo "<p>The following member was submitted successfully</p>";
			echo "<p><b>Name:</b> $name <br />";
			echo "<b>Rank:</b> $rank <br />";
			echo "<b>Email:</b> $email <br />";
			echo "<b>Recruited by:</b> $recruit <br />";
			echo "<b>Date Joined:</b> $date</p>";
		}
		elseif($_POST['edit'])
		{
			$id = $_POST['id'];
			$sql = 'SELECT bcs_members.id, bcs_members.name, bcs_members.email, bcs_members.recruit, bcs_members.date, bcs_ranks.name AS rank , bcs_ranks.id AS rankid, password '
				. ' FROM bcs_members, bcs_ranks WHERE bcs_members.rank = bcs_ranks.id AND bcs_members.id = ' . $id;
			$result = mysql_query($sql)  or die(mysql_error());
			while($r=mysql_fetch_array($result))
			{
				$id=$r["id"];
				$name=$r["name"];
				$rank=$r["rank"];
				$email=$r["email"];
				$recruit=$r["recruit"];
				$date=$r["date"];
				$rankid=$r["rankid"];
				$password=$r["password"];
			}
			?>
			<h2>Edit Members</h2>
			<form action="?edit_page=members" method="post">
			<p>
				ID: <input disabled type="text" name="idshow" value="<?php echo $id; ?>" /><br /><br />
				<input type="hidden" name="id" value="<?php echo $id; ?>" />
				Member Name: <input type="text" name="name" value="<?php echo $name; ?>" /><br /><br />
				Rank: <select name="rank">
				<option value="<?php echo $rankid; ?>"><?php echo $rank; ?></option>
				<?php
				$result = mysql_query("SELECT * FROM bcs_ranks")  or die(mysql_error());
				while($r=mysql_fetch_array($result))
				{
					if($r['name'] !== $rank)
					{
						echo '<option value="' . $r["id"] . '">' .  $r["name"] . '</option>';
					}
				} ?>
				</select><br/><br/>
				Email: <input type="text" name="email" value="<?php echo $email; ?>" /><br /><br />
				Date Joined: <input type="text" name="date" value="<?php echo $date; ?>" /><br /><br />
				Recruited By: <select name="recruit">
				<?php
				if(empty($recruit)) {
					echo '<option value="">n/a</option>';
				}
				$result = mysql_query("SELECT * FROM bcs_members")  or die(mysql_error());
				while($r=mysql_fetch_array($result))
				{
					if($r['id'] !== $recruit) {
						echo '<option value="' . $r["id"] . '">' .  $r["name"] . '</option>';
					} else {
						echo '<option selected="selected" value="' . $r["id"] . '">' .  $r["name"] . '</option>';
					}
				} ?>
				</select><br /><br />
				Password: <input type="password" name="password" /><br />Leave Blank if you do not wish to change.<br /><br/>
				<input type="submit" name="submit" value="Submit" />&nbsp;&nbsp;<input type="reset" />
			</p>
			</form>			
		<?php
		}
		else
		{ ?>
			<h2>Add Members</h2>
			<form action="?edit_page=members" method="post">
			<p>
				Member Name: <input type="text" name="name" /><br /><br />
				Rank: <select name="rank">
				<?php
				$result = mysql_query("SELECT * FROM bcs_ranks")  or die(mysql_error());
				while($r=mysql_fetch_array($result))
				{
					echo '<option value="' . $r["id"] . '">' .  $r["name"] . '</option>';
				}
				?>
				</select><br/><br/>
				Email: <input type="text" name="email" /><br /><br />
				Date Joined: <input disabled type="text" name="dateshow" value='<?php echo date("F d, Y"); ?>' /><br /><br />
				Recruited By: <select name="recruit">
				<option selected="selected" value="">n/a</option>
				<?php
				$result = mysql_query("SELECT * FROM bcs_members")  or die(mysql_error());
				while($r=mysql_fetch_array($result))
				{
					echo '<option value="' . $r["id"] . '">' .  $r["name"] . '</option>';
				}
				?>
				</select><br /><br />
				Password: <input type="password" name="password" /><br />Leave Blank if you do not wish to change.<br /><br/>
				<input type="hidden" name="date" value='<?php echo date("Y-m-d"); ?>' />
				<input type="submit" name="submit" value="Add Member" />&nbsp;&nbsp;<input type="reset" />
			</p>
			</form>
		<?php
		} //close else statement
		?>
	</div>
	<div class="half">
		<h2>Current Members</h2>
		<?php
		$sql = 'SELECT `bcs_members` . `id` , `bcs_members` . `name` , `bcs_members` . `email` , `bcs_members` . `recruit` , `bcs_members` . `date` , `bcs_ranks` . `order` , `bcs_ranks` . `name` AS `rank` '
			. ' FROM `bcs_members` , `bcs_ranks` '
			. ' WHERE `bcs_members` . `rank` = `bcs_ranks` . `id` '
			. ' ORDER BY `order`, `id`';
		$result = mysql_query($sql)  or die(mysql_error());
		while($r=mysql_fetch_array($result))
		{	
			$id=$r["id"];
			$name=$r["name"];
			$rank=$r["rank"];
			echo "[" . $rank . "] " . $name . "&nbsp;";
			echo '<form action="?edit_page=members" method="post">';
			echo '<input type="submit" value="Del" name="del" />';
			echo '<input type="submit" value="Edit" name="edit" />';
			echo '<input type="submit" value="Add/Edit Medals" name="addmedal" />';
			echo '<input type="hidden" name="id" value="'.$id.'" />';
			echo '<input type="hidden" name="name" value="'.$name.'" />';
			echo '</form><br/>';
		}
		?>
	</div>
</div>
<div id="footer"><?php echo $release; ?></div>
<?php
} // end session else
?>