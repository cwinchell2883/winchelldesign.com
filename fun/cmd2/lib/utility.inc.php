<?php

/** UTILITY FUNCTIONS **/

function stringThatDoesNotOccurIn($str){
	$c='';
	do{
		$c.=chr(rand(64,90)); //boring, yes, but I want to avoid any characters that might have special meaning
	}while(strpos($str,$c)>0);
	return $c;
}

if(!function_exists('e')){ // We override this in header. Long story.
	function e($str,$ec=false){ /*use this instead of echo*/
		global $html;
		if($ec){
			echo($str);
		}else{
			$html.=$str;
		}
	}
}

function err($str){
	global $html;
	if(get_option('cli_debug')){
		$html.='<span style="color:red">'.$str.'</span>';
	}
}

function defaultprompt(){
	global $user,$username,$wpdb;
	
	if(!isset($_SESSION['path'])){
		$_SESSION['path']='/';
	}
	$sign='$';
	if($user->allcaps['administrator'])$sign='#';
	$prompt=
		$username
		.'@'
		.strtolower(str_replace(' ','-',get_bloginfo('name')))
		.':'
		.$_SESSION['path']
		.$sign.'&nbsp;';
	return $prompt;
}

function switchval($s){
	global $switches;
	if(isset($switches[$s])) return $switches[$s];
	return false;
}

function unpackquotes($s,$map){
	global $stdnoi;
	preg_match_all('/'.$stdnoi.'([0-9a-f]{32})/',$s,$m);
	if(isset($m[1])){
		foreach($m[1] as $match){
			if(isset($map[$match])){
				$s=str_replace($stdnoi.$match, $map[$match], $s);
			}
		}
	}
	$s=str_replace(array("'",'"'),array('',''),$s);
	return $s;
}

/* backslash-escaped characters */

function safe_escape($str){
	return str_replace(
		array('\\','"',"'",' '),
		array('\\\\','\\"',"\\'",'\\ '),
		$str
	);
}

function do_escape($str){
	return preg_replace('/\\\\(.)/e',"'\\#'.dechex(ord(stripslashes('$1'))).''",$str);		
}

function un_escape($str){
	$s=preg_replace('/\\\\#([0-9a-f]{2})/e',
	"chr(hexdec('$1'))",$str);		
	return $s;
}	

function possible_posts(){
	global $user;

	$wc="WHERE (`post_status`='publish'  OR `post_status`='static' ";
	if($user){
		if($user->has_cap('read_post')){
		}
	}
	$wc.=")";
        return $wc;
}


?>