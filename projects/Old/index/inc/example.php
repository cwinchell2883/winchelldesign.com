<?php

// Start the phpbb 3 session
define( 'IN_PHPBB', true );
$phpbb_root_path = '../forum/'; // change in your own root path.
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

$user->session_begin();
$auth->acl( $user->data );
$user->setup();

// Include the needed files
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
include($phpbb_root_path . 'includes/bbcode.' . $phpEx);
include($phpbb_root_path . 'includes/news.' . $phpEx);

// Instance the needed classes
$bbcode	= new bbcode();
$news		= new news();

// Is the rss feed called?
$rss = request_var ('view', 'news'); // $_GET['view']
if( strtolower($rss) === 'rss' )
{
	// Build the rss page
	$news->build_rss ();
}
else
{
	// Get the array with news data
	$news_data = $data = $news->get_news();
	
	/*
	echo'<pre>';
	print_r($news_data);
	echo'</pre>';
	*/
}
?>