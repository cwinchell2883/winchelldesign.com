<?php
/**
*
* @package phpBB3 FAQ Manager
* @copyright (c) 2007 EXreaction, Lithium Studios
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

// Stuff required to work with phpBB3
define('IN_PHPBB', true);
$phpbb_root_path = ((isset($phpbb_root_path)) ? $phpbb_root_path : './');
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup('mods/faq_manager');

if ($user->data['user_type'] != USER_FOUNDER)
{
	trigger_error('You must be a board founder to access this page.');
}

// ACP Modules ----------------------------------
$sql = 'SELECT * FROM ' . MODULES_TABLE . " WHERE module_langname = 'ACP_CAT_DOT_MODS'";
$result = $db->sql_query($sql);
$row = $db->sql_fetchrow($result);
$db->sql_freeresult($result);

$sql_ary = array(
	'module_enabled'	=> 1,
	'module_display'	=> 1,
	'module_basename'	=> '',
	'module_class'		=> 'acp',
	'parent_id'			=> $row['module_id'],
	'left_id'			=> $row['right_id'],
	'right_id'			=> $row['right_id'] + 3,
	'module_langname'	=> 'ACP_FAQ_MANAGER',
	'module_mode'		=> 'default',
	'module_auth'		=> 'acl_a_language',
);

$sql = 'INSERT INTO ' . MODULES_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ary);
$db->sql_query($sql);
$module_id = $db->sql_nextid();

$sql = 'UPDATE ' . MODULES_TABLE . "
SET left_id = left_id + 4, right_id = right_id + 4
WHERE left_id >= {$sql_ary['left_id']} AND module_id != $module_id";
$db->sql_query($sql);
					
$sql = 'UPDATE ' . MODULES_TABLE . "
SET right_id = right_id + 4
WHERE left_id < {$sql_ary['left_id']} AND right_id >= {$sql_ary['left_id']} AND module_id != $module_id";
$db->sql_query($sql);

$sql_ary = array(
	'module_enabled'	=> 1,
	'module_display'	=> 1,
	'module_basename'	=> 'faq_manager',
	'module_class'		=> 'acp',
	'parent_id'			=> $module_id,
	'left_id'			=> $row['right_id'] + 1,
	'right_id'			=> $row['right_id'] + 2,
	'module_langname'	=> 'ACP_FAQ_MANAGER',
	'module_mode'		=> 'default',
	'module_auth'		=> 'acl_a_language',
);

$sql = 'INSERT INTO ' . MODULES_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ary);
$db->sql_query($sql);

$cache->purge();

trigger_error('Done')
?>