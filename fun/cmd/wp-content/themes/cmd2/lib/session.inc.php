<?php
// Ghetto-style session handling, just for php 5.2 (or servers with sessions disabled.
// Assumes $_SESSION is superglobal even if sessions are disabled. We'll see...

function session_pack($sid){
	if(rand(1,100) == 1){
		$d = SESSIONS_DIR;
		$dir = opendir($d);
		while($file = readdir($dir)){
			if(filemtime($d.'/'.$file) < date('U' - 3600)){
				unlink($d.'/'.$file);
			}
		}
	}
	$path = CLI_DIR.'/var/sessions/'.$sid.'.session';
	$fh = fopen($path, 'w');
	if(!$fh){
		err('<p>'.$path.' not writeable, please chmod 777 '.SESSIONS_DIR.'</p>');
	}else{
		fwrite($fh, serialize($_SESSION));
		fclose($fh);
	}
}

function session_unpack($sid){
	$path = SESSIONS_DIR.'/'.$sid.'.session';
	if(file_exists($path)){
		$fh = fopen($path, 'r');
		$ser = fread($fh, filesize($path));
		$_SESSION = unserialize($ser);
	}else{
		$_SESSION = array();
	}	
}
?>
