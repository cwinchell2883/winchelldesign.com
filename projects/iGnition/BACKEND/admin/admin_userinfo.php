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
<div id="header"><h1><?php echo $site_name ?></h1></div>
<div id="gutter"></div>
<div id="col1">
	<?php showAdminNav(); ?>
</div>
<div id="col2">
	<div>
    	<h2>Site Variables</h2>
		<p style="font-size:9px;font-family:arial, Gadget, sans-serif;padding:0px;margin:0px;">
        <?php
		foreach($_SESSION as $key=>$value) 
		{ 
			print '<b>'.$key.': </b><i>'.$value.'</i><br />'; 
		}
		?>
        </p>
		<p style="font-size:9px;font-family:arial, Gadget, sans-serif;padding:0px;margin:0px;">
        <?php
		foreach($_POST as $key=>$value) 
		{ 
			print '<b>'.$key.': </b><i>'.$value.'</i><br />'; 
		}
		?>
        </p>
		<p style="font-size:9px;font-family:arial, Gadget, sans-serif;padding:0px;margin:0px;">
        <?php
		foreach($_GET as $key=>$value) 
		{ 
			print '<b>'.$key.': </b><i>'.$value.'</i><br />'; 
		}
		?>
        </p>
    </div>
	<?php
	if ($_POST['submit']) {
		echo 'There has been some sort of error.';
	} else {
		$id = $_SESSION['id'];
		$sql = 'SELECT *, bcs_ranks.name AS rank, bcs_members.name AS name FROM bcs_members, bcs_ranks WHERE bcs_members.rank = bcs_ranks.id AND bcs_members.id = ' . $id . ' ORDER BY `order`';
		$result = mysql_query($sql) or die(mysql_error());
		while($r=mysql_fetch_array($result))
		{
			$id=$r["id"];
			$name=$r["name"];
			$rank=$r["rank"];
			$email=$r["email"];
			$recruit=$r["recruit"];
			$date=$r["date"];
			$fname=$r["fname"];
			$lname=$r["lname"];
			$birthday=$r["birthday"];
			$location=$r["location"];
			$hashed=$r["password"];
		}
	}
	?>
	<div>
		<h2>User Settings</h2>
		<p style="font-size:9px;font-family:arial, Gadget, sans-serif;padding:0px;margin:0px;">
			<b>Member Name: </b><i><?php echo $name; ?></i><br />
			<b>First Name: </b><i><?php echo $fname; ?></i><br />
			<b>Last Name: </b><i><?php echo $lname; ?></i><br />
			<b>Email: </b><i><?php echo $email; ?></i><br />
			<b>Location: </b><i><?php echo $location; ?></i><br />
			<b>Birthday: </b><i><?php echo $birthday; ?></i><br />
			<b>Hashed: </b><i><?php echo $hashed; ?></i><br />
			<b>ID: </b><i><?php echo $id; ?></i><br />
			<b>Rank: </b><i><?php echo $rank; ?></i><br />
			<b>Date Joined: </b><i><?php echo $date; ?></i><br />
			<b>Recruited By: </b><i><?php echo $recruit; ?></i><br />
            <b>Access Level: </b><i><?php echo $accesslvl[$_GET['edit_page']]; ?></i><br />
		</p>
	</div>
</div>
<div id="footer"><?php echo $release; ?></div>
<?php
} // end session else
?> 