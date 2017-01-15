<?php /* Smarty version 2.6.14, created on 2010-07-16 11:15:09
         compiled from modules.tpl */ ?>
<div class="title">
<?php echo $this->_tpl_vars['g_lang_module']; ?>

</div>


<?php if (! empty ( $this->_tpl_vars['m_module_list'] ) && $this->_tpl_vars['g_user']->m_user_access['ADMIN'] > 0): ?>
	<div style="width:616px; padding-left: 10px; padding-right:10px;"><fieldset><legend style="color: #ffffff;"><?php echo $this->_tpl_vars['g_lang_module_settings']; ?>
</legend>
		<div style="padding-left: 100px; height: 19px;">
			<div style="float:left; width: 150px;"><?php echo $this->_tpl_vars['g_lang_misc_name']; ?>
</div>
			<div style="float:left; width: 150px;"><?php echo $this->_tpl_vars['g_lang_misc_version']; ?>
</div>
		</div>
		<?php $_from = $this->_tpl_vars['m_module_list']['modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['module']):
        $this->_foreach['list']['iteration']++;
?> 
		<div style="height: 19px; background: #657d70;">
			<div style="float:left; width: 150px !important; width:250px; text-align:right; padding-right:110px;"><?php echo $this->_tpl_vars['module']['m_name']; ?>
</div>
			<div style="float:left; width: 130px;"><?php echo $this->_tpl_vars['module']['m_version']; ?>
</div>
			<div style="float:left; width: 70px;"><?php if ($this->_tpl_vars['module']['m_id'] > 4):  if ($this->_tpl_vars['module']['m_status'] > 0): ?><a href="modules.php?disable=<?php echo $this->_tpl_vars['module']['m_id']; ?>
" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/edit.png" alt="<?php echo $this->_tpl_vars['g_lang_misc_disable']; ?>
" border="0" /></a><a href="modules.php?disable=<?php echo $this->_tpl_vars['module']['m_id']; ?>
" class="link"><?php echo $this->_tpl_vars['g_lang_misc_disable']; ?>
</a><?php else: ?><a href="modules.php?enable=<?php echo $this->_tpl_vars['module']['m_id']; ?>
" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/edit.png" alt="<?php echo $this->_tpl_vars['g_lang_misc_enable']; ?>
" border="0" /></a><a href="modules.php?enable=<?php echo $this->_tpl_vars['module']['m_id']; ?>
" class="link"><?php echo $this->_tpl_vars['g_lang_misc_enable']; ?>
</a><?php endif;  endif; ?></div>
			<div style="float:left; width: 70px;"><?php if ($this->_tpl_vars['module']['m_id'] > 10): ?><a href="modules.php?uninstall=<?php echo $this->_tpl_vars['module']['m_id']; ?>
" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/delete.png" alt="<?php echo $this->_tpl_vars['g_lang_misc_uninstall']; ?>
" border="0" /></a><a href="modules.php?uninstall=<?php echo $this->_tpl_vars['module']['m_id']; ?>
" class="link"><?php echo $this->_tpl_vars['g_lang_misc_uninstall']; ?>
</a><?php endif; ?></div>
		</div>
		<?php endforeach; endif; unset($_from); ?>
	</fieldset></div>

	<?php if (! empty ( $this->_tpl_vars['m_module_list']['newmodules'] )): ?>
		<div style="width:616px; padding-left: 10px; padding-right:10px;"><fieldset><legend style="color: #ffffff;"><?php echo $this->_tpl_vars['g_lang_module_install']; ?>
</legend>
		<div style="padding-left: 20px; height: 19px;">
			<div style="float:left; width: 100px;"><?php echo $this->_tpl_vars['g_lang_misc_name']; ?>
</div>
			<div style="float:left; width: 200px;"><?php echo $this->_tpl_vars['g_lang_misc_description']; ?>
</div>
			<div style="float:left; width: 70px;"><?php echo $this->_tpl_vars['g_lang_misc_version']; ?>
</div>
			<div style="float:left; width: 150px;"><?php echo $this->_tpl_vars['g_lang_misc_author']; ?>
</div>
			
		</div>
		<?php $_from = $this->_tpl_vars['m_module_list']['newmodules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['module']):
        $this->_foreach['list']['iteration']++;
?> 
		<div style=" height: 26px; background: #657d70;">
			<div style="float:left; width: 100px; padding-left:10px;"><?php echo $this->_tpl_vars['module']['m_name']; ?>
</div>
			<div style="float:left; width: 200px !important; width: 220px; padding-left:10px; background: #657d70;"><?php echo $this->_tpl_vars['module']['m_desc']; ?>
</div>
			<div style="float:left; width: 30px !important; width: 50px; padding-left:10px;"><?php echo $this->_tpl_vars['module']['m_version']; ?>
</div>
			<div style="float:left; width: 150px !important; width: 140px; padding-left:10px;"><?php echo $this->_tpl_vars['module']['m_author']; ?>
</div>
			<div style="float:left; width: 60px; padding-left:10px;"><a href="modules.php?add=<?php echo $this->_tpl_vars['module']['m_dir']; ?>
" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/add.png" border="0" alt="<?php echo $this->_tpl_vars['g_lang_misc_install']; ?>
" /></a><a href="modules.php?add=<?php echo $this->_tpl_vars['module']['m_dir']; ?>
" class="link"><?php echo $this->_tpl_vars['g_lang_misc_install']; ?>
</a></div>
		</div>
		<?php endforeach; endif; unset($_from); ?>
		</fieldset></div>
	<?php endif; ?>
<?php endif; ?>