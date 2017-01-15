<?php /* Smarty version 2.6.25, created on 2010-07-16 18:42:45
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/home/.mueller/cwinchell/winchelldesign.com/iGnition/BACKEND6/tmp/templates_c/ef84ceef1ad1cd2f338860b1cb092e52^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '2d4a839581f945ed53edc4ceb522c1fc';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_2d4a839581f945ed53edc4ceb522c1fc_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('2d4a839581f945ed53edc4ceb522c1fc','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_2d4a839581f945ed53edc4ceb522c1fc_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('2d4a839581f945ed53edc4ceb522c1fc','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_2d4a839581f945ed53edc4ceb522c1fc_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('2d4a839581f945ed53edc4ceb522c1fc','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
