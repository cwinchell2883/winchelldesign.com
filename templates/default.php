<?PHP
// Die if not called by index.php
if(!defined('CALLER_ID'))
{
	echo "This file cannot be called upon directly.";
	exit;
}

// ********************************************************************************
// Skin PROJECTS
// ********************************************************************************

$tpl_proj = <<<HTML
<ul>
	<li><!--a href="$PHP_SELF?p=proj&num=2"--><img src="./templates/images/pic1.jpg" alt="pic2" width="48" height="43" border="0" title="pic2" /></li>
	<li><!--a href="$PHP_SELF?p=proj&num=3"--><img src="./templates/images/pic5.jpg" alt="pic5" width="48" height="43" border="0" title="pic5" /></li>
	<li><!--a href="$PHP_SELF?p=proj&num=4"--><img src="./templates/images/pic3.jpg" alt="pic3" width="48" height="43" border="0" title="pic3" /></li>
	<!--li><a href="$PHP_SELF?p=proj&num=5"><img src="./templates/images/pic5.jpg" alt="pic5" width="48" height="43" border="0" title="pic5" /></a></li-->
</ul>
HTML;

// ********************************************************************************
// Skin MENU
// ********************************************************************************

$tpl_menu = <<<HTML
<ul>
	<li><a href="$PHP_SELF?p=main">Home</a>|</li>
	<li><a href="$PHP_SELF?p=about">About Us</a>|</li>
	<li><a href="$PHP_SELF?p=contact">Contact</a></li>
</ul>
HTML;

// ********************************************************************************
// Skin HEADER
// ********************************************************************************
$tpl_header = <<<HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>$config_title</title>
<link href="{stylesheet}" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="mainPan">
	<div id="headerPan">
		<div id="leftPan"></div>
		<div id="middlePan"><!-- SWF FILE HERE --></div>
		<div id="rightPan"></div>
	</div>
	<div id="body1">
		<div id="leftBody"></div>
		<div id="middleBody">
HTML;

// ********************************************************************************
// Skin FOOTER
// ********************************************************************************
$tpl_footer = <<<HTML
		</div>
		<div id="rightBody"></div>
	</div>
</div>
<div id="project">
	<h2>projects</h2>
	{projects}
</div>
<div id="footer">
	{menu}
	<p>2008, 2009 &copy; Winchell Design. All right reserved.</p>
</div>
</body>
</html>
HTML;

?>