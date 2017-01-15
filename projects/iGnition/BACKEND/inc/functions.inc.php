<?php
$smileydir = 'images/smileys/';
$smiley_array = array(':smile:', ':-)', ':)', '=)', '=-)', ':wink:', ';)', ';-)', ':tongue:', ':p', ':-p', ':P', ':-P', ':sad:', ':(', ':-(', ':sick:', ':-s', ':S', ':-S', ':biggrin:', ':D', ':-D', ':cry:', ":'(", 
	':shocked:', ':o', ':-o', ':-O', ':O', ':cool:', '8)', '8-)', ':dead:', ':sleep:', 'z)', 'zzz', 'Z)', ':angry:', ':mad:', '>:)', ':none:', ':-|', ':|', ':rolleyes:', ':shy:');
$smiley_file_array = array('smile.gif', 'smile.gif', 'smile.gif', 'smile.gif', 'smile.gif', 'wink.gif', 'wink.gif', 'wink.gif', 'tongue.gif', 'tongue.gif', 'tongue.gif', 'tongue.gif', 'tongue.gif', 
	'sad.gif', 'sad.gif', 'sad.gif', 'sick.gif', 'sick.gif', 'sick.gif', 'sick.gif', 'biggrin.gif', 'biggrin.gif', 'biggrin.gif', 'cry.gif', 'cry.gif', 'shocked.gif', 'shocked.gif', 'shocked.gif', 'shocked.gif', 'shocked.gif',
	'cool.gif', 'cool.gif', 'cool.gif', 'dead.gif', 'sleep.gif', 'sleep.gif', 'sleep.gif', 'sleep.gif', 'mad.gif', 'mad.gif', 'mad.gif', 'none.gif', 'none.gif', 'none.gif', 'roll.gif', 'shy.gif');

function showAdminNav() {
	echo '<h2>Navigation</h2>'
		. '<a href="?edit_page=index">Home</a><br />'
		. '<a href="?edit_page=news">News</a><br />'
		. '<a href="?edit_page=members">Roster</a><br />'
		. '<a href="?edit_page=ranks">Matches</a><br />'
		. '<a href="?edit_page=medals">Files</a><br />'
		. '<a href="?edit_page=diplomacy">Sponsors</a><br />'
		. '<a href="?edit_page=history">About Us</a><br />'
		. '<a href="?edit_page=rules">Support</a><br />'
		. '<a href="?edit_page=userinfo">Debug</a><br />';
}
function showNav() {
	echo '<h2>Navigation</h2>'
		. '<div id="nav">'
		. '<ul class="navlist">'
		. '<li><a href="?page=news">Home</a></li>'
		. '<li><a href="?page=board">Forums</a></li>'
		. '<li><a href="?page=members">Roster</a></li>'
		. '<li><a href="?page=ranks">Matches</a></li>'
		. '<li><a href="?page=medals">Files</a></li>'
		. '<li><a href="?page=diplomacy">Sponsors</a></li>'
		. '<li><a href="?page=history">About Us</a></li>'
		. '<li><a href="?page=rules">Support</a></li>'
		. '</ul>'
		. '<br/><h2>Members Only</h2>';
	if (isLogin()) {
		echo '<ul class="navlist"><li><a href="?page=settings">Settings</a></li>';
		if (isAdmin()) {
			echo '<li><a href="admin.php?edit_page=index">Administration</a></li>';
		}
			echo '<li><a href="?page=logout">Logout</a></li></ul>';
	} else {
		showLogin();
	}
	echo '</div>';
}
function isLogin()
{
	if (!session_is_registered('username'))  {
		return false;
	} else {
		return true;
	}
}
function isAdmin()
{
	include 'settings.inc.php';
	$link = mysql_connect($mysql_host, $mysql_user, $mysql_pass);
	mysql_select_db($mysql_db, $link);
	$result = mysql_query("SELECT * FROM bcs_members WHERE id='" . $_SESSION['id'] . "'", $link); 
	$login_check = mysql_num_rows($result);
	if($login_check > 0) { 
		while($row = mysql_fetch_array($result)) { 
			foreach( $row AS $key => $val ) { 
				$$key = stripslashes( $val ); 
			}
			if ($rank <= 1) {
				return true;
			} else {
				return false;
			}
		} 
	}
}
function showLogin() {
	echo '<form name="login" method="post" action=" ?page=login">'
		. '<p><label for="user">Username</label>:<input type="text" name="user" title="Please Enter Your Username"/></p>'
		. '<p><label for="pass">Password</label>:<input type="password" name="pass" title="Please Enter Your Password"/></p>'
		. '<p><a href="?page=resetpass">Forgot Password?</a></p>'
		. '<p><input type="submit" name="login" value="Login"/></p>'
		. '</form>';
}
function parse($data) {
	$data = htmlentities($data);
	$data = parse_smilies($data);
	$data = parse_bbcodes($data);
	$data = bbcode_quote ($data);
	$data = nl2br($data);
	echo $data;
}
function parse_bbcodes($data) {
	$search = array('/\[b\](.*?)\[\/b\]/is', '/\[i\](.*?)\[\/i\]/is', '/\[u\](.*?)\[\/u\]/is', '/\[s\](.*?)\[\/s\]/is', '/\[url\=(.*?)\](.*?)\[\/url\]/is', '/\[url\](.*?)\[\/url\]/is', '/\[align\=(left|center|right)\](.*?)\[\/align\]/is',
	'/\[img\](.*?)\[\/img\]/is', '/\[mail\=(.*?)\](.*?)\[\/mail\]/is', '/\[mail\](.*?)\[\/mail\]/is', '/\[font\=(.*?)\](.*?)\[\/font\]/is', '/\[size\=(.*?)\](.*?)\[\/size\]/is', '/\[color\=(.*?)\](.*?)\[\/color\]/is');
	$replace = array('<b>$1</b>', '<i>$1</i>', '<u>$1</u>', '<s>$1</s>', '<a href="$1">$2</a>', '<a href="$1">$1</a>', '<div style="text-align: $1;">$2</div>', '<img src="$1" />',
	'<a href="mailto:$1">$2</a>', '<a href="mailto:$1">$1</a>', '<span style="font-family: $1;">$2</span>', '<span style="font-size: $1;">$2</span>',
	'<span style="color: $1;">$2</span>');
	$data = preg_replace ($search, $replace, $data); 
	return $data; 
}
function parse_smilies($data) {
	global $smiley_array, $smiley_file_array, $smileydir;
	$i = 0;
	while($i < count($smiley_array)) {
		$data = str_replace($smiley_array[$i], '<img src="' . $smileydir . $smiley_file_array[$i] . '" alt="'. $smiley_array[$i] . '" />', $data);
		$i ++;
	}
	return $data;
}
function bbcode_quote ($data) { 
    $open = '<blockquote>'; 
    $close = '</blockquote>'; 
    preg_match_all ('/\[quote\]/i', $data, $matches); 
    $opentags = count($matches['0']); 
    preg_match_all ('/\[\/quote\]/i', $data, $matches); 
    $closetags = count($matches['0']); 
    $unclosed = $opentags - $closetags; 
    for ($i = 0; $i < $unclosed; $i++) { 
        $data.= '</blockquote>'; 
    } 
    $data = str_replace ('[' . 'QUOTE]', $open, $data); 
	$data = str_replace ('[' . 'quote]', $open, $data); 
    $data = str_replace ('[/' . 'QUOTE]', $close, $data); 
    $data = str_replace ('[/' . 'quote]', $close, $data); 
    return $data; 
}
function displaySmileys() {
	global $smiley_array, $smiley_file_array, $smileydir;
	$i=0;
	$previous_smiley_file = '';
	foreach($smiley_array as $smiley) {
		if ($smiley_file_array[$i] != $previous_smiley_file) {
			echo '<img src="' . $smileydir . $smiley_file_array[$i] . '" alt="' . $smiley . '" onclick="return addSmiley(\''.str_replace("'", "\'", $smiley).'\')" /> ';
			$previous_smiley_file = $smiley_file_array[$i];
		}
		$i++;
	}
}
function getNumberOfPosts($thread_id) {
	$results = mysql_query("SELECT count(*) AS c FROM bcs_posts WHERE thread = $thread_id") or die('Could not display thread count: ' . mysql_error());
	$found = mysql_fetch_array($results);
	$count = $found['c'];
	return $count;
}
function escape_string ($string) {
	if(version_compare(phpversion(),"4.3.0")=="-1") {
		return mysql_escape_string($string);
	} else {
		return mysql_real_escape_string($string);
	}
}
?>