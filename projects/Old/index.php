<?php

// Compress if available
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))
{
	ob_start("ob_gzhandler");
}
else
{
	ob_start();
}

define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './index/forum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();

// Assign index specific vars
$template->assign_vars(array(
	'S_LOGIN_ACTION'		=> append_sid("{$phpbb_root_path}ucp.$phpEx", 'mode=login'),
	'X_SITE_PATH'				=> "http://www.winchelldesign.com/index/",
	'X_SITE_IMG'				=> "http://www.winchelldesign.com/index/img/",
	'X_SITE_INC'				=> "http://www.winchelldesign.com/index/inc/",
	'X_SITE_CSS'				=> "http://www.winchelldesign.com/index/css/"
));


page_header('Title Here');

$template->set_filenames(array(
    'body' => 'index_body.html',
));

make_jumpbox(append_sid("{$phpbb_root_path}viewforum.$phpEx"));
page_footer();
?>