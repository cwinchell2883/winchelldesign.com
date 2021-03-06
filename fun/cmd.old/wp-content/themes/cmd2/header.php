<?php 
/*
	WordPress CLI theme
	R. McFarland 2006

	This is the basic HTML of the page. Javascript handles appending to the #display div.
*/

session_start();
$_SESSION['sessions_work'] = 'fish';

require_once(get_template_directory().'/functions.php'); // basically to make sure options exist
cli_init_opts();

require_once(get_template_directory().'/cli.conf.php'); 

function e($str){ 
	echo $str;
}
header('Content-Type: text/html; charset=utf-8');
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Command Prompt</title>
<meta http-equiv="Content-Type" content="text/html;charset=<?php get_option('blog_charset') ?>" >
<style type="text/css" media="screen">
	@import url( <?php bloginfo('stylesheet_directory'); ?>/usr/share/style.css.php );
</style>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/lib/keycodes.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/lib/cli.js.php"></script>
<?php if (file_exists(get_bloginfo('template_directory').'/header.inc.php')){
	include(get_bloginfo('template_directory').'/header.inc.php');
} ?>
</head>
<body onload="document.getElementById('welcome').style.visibility='visible';initializeCLI();scroller();" onkeydown="handleKeyEvent(event);" onkeyup="handleKeyEvent(event);">
	<div id="pagealert"> --More-- </div>
	<div id="indicators"><span id="ALTindicator">Alt-</span><span id="CTRLindicator">Ctrl-</span> <span id="SCRLOCKindicator">SCR LOCK</span></div>
	<div id="spinnerdiv" style="display:none;font-weight:900;">-</div>
	<form onsubmit="inputArea.focus();" action="<?php bloginfo('home'); ?>"><div id="cform"><input name="preInputArea" type="text" class="stealth"><textarea name="inputArea" rows="5" cols="10" class="stealth" taborder="0"></textarea><input name="postInputArea" type="text" class="stealth"></div></form>
<div id="scr" onclick="scroller();inputArea.focus();">
	<div id="d_and_c">
		<div id="display">
<?php include(get_template_directory().'/lib/start-display.inc.php'); ?>
		</div>
		<div id="bottomline"><span id="prompt"></span><span id="lcommand"></span><a id="undercsr" href="<?php echo get_bloginfo('siteurl').'?yoohoo' ?>">&nbsp;</a><span id="rcommand"></span></div>
	</div>
</div>
</body>
</html>
