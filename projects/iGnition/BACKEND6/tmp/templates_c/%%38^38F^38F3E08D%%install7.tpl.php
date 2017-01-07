<?php /* Smarty version 2.6.25, created on 2010-07-16 15:16:31
         compiled from install7.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_install', 'install7.tpl', 8, false),)), $this); ?>
<?php $this->_cache_serials['/home/cwinchell/winchelldesign.com/iGnition/BACKEND6/tmp/templates_c/%%38^38F^38F3E08D%%install7.tpl.inc'] = 'e576042823e4f63f45161272b2390503'; ?><?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
<div class="error"><?php echo $this->_tpl_vars['error']; ?>
</div>
<?php endforeach; endif; unset($_from); ?>

<?php if (empty ( $this->_tpl_vars['errors'] )): ?>
  <div class="success">
  <?php if (isset ( $this->_tpl_vars['tables_notinstalled'] )): ?>
    <?php if ($this->caching && !$this->_cache_including): echo '{nocache:e576042823e4f63f45161272b2390503#0}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('e576042823e4f63f45161272b2390503','0');echo smarty_lang(array('a' => 'install_admin_tablesnotcreated'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:e576042823e4f63f45161272b2390503#0}'; endif;?>
 <?php echo $this->_tpl_vars['site_link']; ?>

  <?php else: ?>
    <?php if ($this->caching && !$this->_cache_including): echo '{nocache:e576042823e4f63f45161272b2390503#1}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('e576042823e4f63f45161272b2390503','1');echo smarty_lang(array('a' => 'install_admin_congratulations'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:e576042823e4f63f45161272b2390503#1}'; endif;?>
 <?php echo $this->_tpl_vars['site_link']; ?>

  <?php endif; ?>
  </div>
<?php endif; ?>

<div class="continue">
<form action="<?php echo $this->_tpl_vars['base_url']; ?>
/admin/login.php" method="post" name="page7form" id="page7form">
	<input type="submit" value="<?php if ($this->caching && !$this->_cache_including): echo '{nocache:e576042823e4f63f45161272b2390503#2}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('e576042823e4f63f45161272b2390503','2');echo smarty_lang(array('a' => 'go_to_admin'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:e576042823e4f63f45161272b2390503#2}'; endif;?>
" />
	<input type="hidden" name="username" value="<?php echo $this->_tpl_vars['values']['admininfo']['username']; ?>
" />
	<input type="hidden" name="password" value="<?php echo $this->_tpl_vars['values']['admininfo']['password']; ?>
" />
	<input type="hidden" name="loginsubmit" value="1" />
	<input type="hidden" name="redirect_url" value="<?php echo $this->_tpl_vars['base_url']; ?>
/admin/" />
</form>
</div>
