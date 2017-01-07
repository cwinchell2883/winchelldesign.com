<?php
/*
cd
@@
Displays the name of or changes the current directory.

CHDIR [/D] [drive:]{path]
CHDIR [..]
CD [/D] [drive:][path]
CD [..]

	.. Specifies that you want to change to the parent directory.
	
Type CD drive: to display the current directory in the specidied drive.
Type CD without parameters to display the current drive and directory.

Use the /D switch to change current drive in addition to changing current
directory for a drive.

If Command Extensions are enabled CHDIR changes as follows:

The current directory string is converted to use the same case as
the on disk names. So CD C:\TEMP would actually set the current
directory to C:\Temp if that is the case on disk.

CHDIR command does not treat spaces as delimiters, so it is possible to
CD into a subdirectory name that contains a space without surrounding
the name with quotes.  For example:

	cd \winnt\profiles\username\programs\start menu

is the same as:
	
	cd "\winnt\profiles\username\programs\start menu"
	
which is what you would have to type if extensions were disabled.
@@
*/
require_once(CLI_DIR.'/lib/filesystem.inc.php');

if(!isset($tokens[1]) || $tokens[1]=='~'){
	//change to home, or...
	$maybe_homedir='/authors/'.$username;
	if(path_exists($maybe_homedir)){
		$_SESSION['path']=$maybe_homedir;
	}else{	
		$_SESSION['path']='/';
	}
}else{
	$p=path_expand($tokens[1]);
	if(path_exists($p)){
		$_SESSION['path']=$p;
		$prompt=defaultprompt();
	}else{
//		err($p);
		e("<p>bash: cd: $tokens[1]: No such file or directory</p>");
	}
}

$_SESSION['path']=str_replace('//','/',$_SESSION['path']);
?>
