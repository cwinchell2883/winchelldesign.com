<?php
##########################################################################################################
##### admin.php
##### 

session_start();
$section = $_GET['r'];

include('conn.php');

// Page Building...
function disp_page($lvl, $pg)
{
	$disp_page = array();
	// Check if account is disabled
	if($lvl == 0 || $lvl == NULL)
	{
		die('This user account has been disabled.<br />');
	}
	// Get Page Heading
	switch($pg)
	{
		case "s":
			$disp_page['header'] = '<h1>User Settings Page</h1>';
			break;
		case "a":
			$disp_page['header'] = '<h1>Admin Settings Page</h1>';
			break;
		default:
			$disp_page['header'] = 'Welcome ' . $_SESSION['name'];
			break;
	}
		
	// Settings Page
	if($pg == "s")
	{
		// Page Heading
		echo $disp_page['header'] . "<br />\n";
		
		// Display User Settings
		conn(open);
		$query = mysql_query("SELECT * FROM members WHERE username='$_SESSION[username]'");
		echo "<form>";
		while($row = mysql_fetch_array($query))
		{
			echo "<input type=hidden id=".$row['id']." value=".$row['id']." />\n<br />\n";
			echo "<input type=text id=".$row['name']." value=".$row['name']." />\n<br />\n";
			echo "<input type=text id=".$row['username']." value=".$row['username']." />\n<br />\n";
			echo "<input type=password id=".$row['password']." value=".$row['password']." />\n<br />\n";
			echo "<select>\n";
			echo "<option id=userlevel value=100>100</option><br />\n";
			echo "<option id=userlevel value=200>200</option><br />\n";
			echo "<option id=userlevel value=300>300</option><br />\n";
			echo "</select>\n<br />\n";
			echo "<input type=submit value=Submit id=submit />\n";
		}
		echo "</form>";
		conn(close);
	}
	elseif($pg == "a")
	{
		// Page Heading
		echo $disp_page['header'] . "<br />\n";
		
		// Display Users List
	}
	else
	{
		echo $disp_page['header'] . "<br />\n";
		echo 'Go <a href="javascript:history.go(-1)">Back</a>';
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
</head>

<body>
<div id="wrapper">
	<div id="head">
		<div>Admin.php</div>
		<div>&nbsp;</div>
    </div>
	<div id="menu" style="display:inline;">
	<ul>
<?php
if(isset($_SESSION['username']))
{
	echo '		<li><a href="auth.php?r=l">Log Out</a></li>';
}
else
{
	echo '		<li><a href="auth.php">Login</a></li>';
}
?>
		<li><a href="search.php">Search</a></li>
		<li><a href="auth.php?r=a">Admin</a></li>
		<li><a href="auth.php?r=f">Add Info</a></li>
		<li><a href="auth.php?r=s">Settings</a></li>
	</ul>
    </div>
    <div id="content">
    <?php disp_page($_SESSION['userlevel'], $_GET['r']); ?>
	</div>
	<div id="foot">&nbsp;
    <?php 
		echo $_SESSION['userlevel']."<br />\n";
		echo $_SESSION['username']."<br />\n";
		echo $_SESSION['name']."<br />\n";
	?>
    </div>
</div>
</body>
</html>