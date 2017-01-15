<?php
##########################################################################################################
##### index.php
##### 

session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $system['organization'].' - Machining Tracker'; ?></title>
<style>
body {
	padding: 10px 10px 10px 10px;
	margin: 0;
}
.title {
	font-weight: bold;
}

</style>
</head>

<body>
<div id="wrapper">
	<div id="head">
    	<div class="title">Clock</div>
        <div class="title">Date</div>
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
    	<div class="title">Weather</div>
        <div>Get Data From here: http://rss.wunderground.com/auto/rss_full/MN/Blooming_Prairie.xml?units=english</div>
        <div class="title">Daily Progress</div>
        <table>
        	<tr>
            	<td>&nbsp;</td>
            </tr>
        </table>
    </div>
	<div id="foot">&nbsp;</div>
</div>
</body>
</html>