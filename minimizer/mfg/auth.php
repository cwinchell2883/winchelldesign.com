<?php
##########################################################################################################
##### auth.php
##### 

session_start();

if(isset($_SESSION['username']))
{
	$rdir = $_GET['r'];
	switch($rdir)
	{
		case "a":
			if($_SESSION['userlevel'] >= 200)
			{
				header('location:admin.php?r=a');
				break;
			}
			else
			{
				header('location:admin.php?r=s');
				break;
			}
		case "s":
			header('location:admin.php?r=s');
			break;
		case "f":
			header('location:form.php');
			break;
		case "l":
			session_destroy();
			header('location:index.php');
			break;
		default:
			header('location:index.php');
			break;
	}
	
}
if(isset($_POST['submit']))
{
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$rdir = $_POST['redirect'];
	
	# Do Some Auth here....
	if($user&&$pass)
	{
		include('conn.php');
		conn(open);
		$query = mysql_query("SELECT * FROM members WHERE username='$user'");
		$numrows = mysql_num_rows($query);
		
		if($numrows!=0)
		{
			while($row = mysql_fetch_assoc($query))
			{
				$dbusername = $row['username'];
				$dbpassword = $row['password'];
				$dbname = $row['name'];
				$dbuserlevel = $row['userlevel'];
			}
			if($user==$dbusername&&$pass==$dbpassword)
			{
				$_SESSION['username']=$dbusername;
				$_SESSION['userlevel']=$dbuserlevel;
				$_SESSION['name']=$dbname;
				switch($rdir)
				{
					case "a":
						if($_SESSION['userlevel'] >= 200)
						{
							header('location:admin.php?r=a');
							break;
						}
						else
						{
							header('location:admin.php?r=s');
							break;
						}
					case "s":
						header('location:admin.php?r=s');
						break;
					case "f":
						header('location:form.php');
						break;
					case "l":
						session_destroy();
						header('location:index.php');
						break;
					default:
						header('location:index.php');
						break;
				}
			}
			else { die("Incorrect Password!"); }
		}
		else { die("The user doesn't exist!"); }
	}
	else { die("You must enter a username and password."); }
	conn(close);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Form</title>
</head>

<body>
<form name="login" method="post" action="auth.php">
Username: <input type="text" name="username" />
<br />
Password: <input type="password" name="password" />
<br /><br />
<input type="hidden" value="<?php echo $_GET['r']; ?>" name="redirect" />
<input type="submit" value="Submit" name="submit" />
</form>
</body>
</html>