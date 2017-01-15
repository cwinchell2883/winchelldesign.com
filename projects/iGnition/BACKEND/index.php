<?php 
session_start();
include 'inc/settings.inc.php';
include 'inc/functions.inc.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $site_name ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="<?php echo 'themes/'.$theme; ?>" />
</head>
<body>
<?php
switch($_GET['page'])
{
	case 'news':
		include 'news.php';
		$_SESSION['prevpage'] = $_GET['page'];
		break;
	case 'board':
		include 'messageboard.php';
		break;
	case 'members':
		include 'members.php';
		break;
	case 'ranks':
		include 'ranks.php';
		break;
	case 'medals':
		include 'medals.php';
		break;
	case 'diplomacy':
		include 'diplomacy.php';
		break;
	case 'rules':
		include 'rules.php';
		break;
	case 'history':
		include 'history.php';
		break;
	case 'downloads':
		include 'downloads.php';
		break;
	case 'settings':
		include 'settings.php';
		break;
	case 'login':
		include 'login.php';
		break;
	case 'logout':
		include 'logout.php';
		break;
	case 'resetpass':
		include 'reset_password.php';
		break;
	default:
		include 'news.php';
		break;
}
?> 
</body>
</html>
