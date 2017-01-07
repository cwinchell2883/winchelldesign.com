<?php
session_start();
header("Cache-control: private");
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
switch($_GET['edit_page'])
{
	case 'index':
        include 'admin/admin_index.php';
        break;
    case 'news':
        include 'admin/admin_news.php';
        break;
    case 'board':
        include 'admin/admin_messageboard.php';
        break;
    case 'members':
        include 'admin/admin_members.php';
        break;
    case 'ranks':
        include 'admin/admin_ranks.php';
        break;
    case 'medals':
        include 'admin/admin_medals.php';
        break;
    case 'diplomacy':
        include 'admin/admin_diplomacy.php';
        break;
    case 'rules':
        include 'admin/admin_rules.php';
        break;
    case 'history':
        include 'admin/admin_history.php';
        break;
    case 'userinfo':
        include 'admin/admin_userinfo.php';
        break;
    default:
		include 'admin/admin_index.php';
		break;
} // end switch
?>
</body>
</html>
