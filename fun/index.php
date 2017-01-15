<?php
// Compress if available
if(substr_count($_SERVER['HTTP_ACCEPT_ENCODING'],'gzip')){ob_start("ob_gzhandler");}else{ob_start();}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Welcome Home Ninja...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name='robots' content='noindex,nofollow' />
<link rel="stylesheet" href="./style.css">
</head>
<body>
<div id="search"><h1>&nbps;</h1>
<form name="searchform" class="form" action="http://www.google.com/search" method="get">
	<p>
		<label>Search<br />
		<input type="text" name="q" id="searchbox" class="input" value="" size="20" tabindex="10" /></label>
	</p>
	<p>
		<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="Search" tabindex="100" />
	</p>
</form>
<p id="rules"></p>
</div>
<div id="linkbar">
<a href="http://journal.winchelldesign.com/" title="My Personal Journal">Journal</a>
<a href="http://www.gmail.com/" title="My Google Mail">Gmail</a>
<a href="http://www.thehackernews.com/" title="The Hacker News">THN</a>
<a href="http://www.wellsfargo.com/" title="Wells Fargo Bank">WF Bank</a>
<a href="http://www.hsbccreditcard.com/" title="HSBC Credit">HSBC</a>
<a href="http://www.discovercard.com/" title="Discover Card">Discover</a>
<a href="http://panel.dreamhost.com/" title="DH Panel">DH Panel</a>
</div>
<div id="lbtoggle"><img id="toggler" onclick="javascript:toggle();" src="./plus.gif" /></div>
<p id="support">
. o .
. . o
o o <a href="javascript:;" onclick="go();" title="">o</a>
</p>
<script type="text/javascript">
function wp_attempt_focus(){ setTimeout( function(){ try{ d = document.getElementById('searchbox');d.focus();d.select(); } catch(e){} }, 200); }
wp_attempt_focus();
if(typeof wpOnload=='function')wpOnload();
function toggle() {
	var imgpath = 'http://www.winchelldesign.com/fun/';
	var lb = document.getElementById('linkbar');
	var tab = document.getElementById('toggler');
	var lbtggl = document.getElementById('lbtoggle');
	if(lb.style.display == 'block'){
		lb.style.display = 'none';
		tab.src = imgpath+'plus.gif';
	}
	else {
		lb.style.display = 'block';
		lbtggl.style.borderLeft = 'none';
		tab.src = imgpath+'minus.gif';
	}
}
</script>
<script type="text/javascript">
if(window.addEventListener){
	var keys = [];
	konami = "38,38,40,40,37,39,37,39,66,65";
	loveu = "77,69,71,65,78,32,83,84,82,79,85,68"
	
	window.addEventListener("keydown", function(e){
		keys.push(e.keyCode);
		if(keys.toString().indexOf(konami) >= 0){
			window.location = "http://en.wikipedia.org/wiki/Konami_Code";
			keys = [];
		}
		else if(keys.toString().indexOf(loveu) >= 0){
			alert('Love you beautiful!');
			keys = [];
		}
	}, true);
}
function go(){location.href="http://en.wikipedia.org/wiki/Hacker_Emblem";}
</script>
</body>
</html>