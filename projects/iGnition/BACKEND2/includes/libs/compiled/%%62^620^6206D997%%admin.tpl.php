<?php /* Smarty version 2.6.14, created on 2010-07-16 11:14:17
         compiled from admin.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'admin.tpl', 20, false),array('modifier', 'truncate', 'admin.tpl', 42, false),)), $this); ?>


<?php if (! empty ( $this->_tpl_vars['m_admin_options'] ) && $this->_tpl_vars['g_user']->m_user_access['ADMIN'] > 0): ?>

	<p style="width: 500px !important; width:616px; padding-left: 40px; padding-right:40px;"><?php echo $this->_tpl_vars['g_lang_admin_warning']; ?>
</p>

	<div style="width:556px !important; width:616px; padding-left: 40px; padding-right: 40px;"><fieldset><legend style="color: #ffffff;">Date &amp; time display</legend>
		<div style="text-align:center; padding-left: 20px;">
			<?php echo $this->_tpl_vars['g_lang_admin_current_time']; ?>
 <?php echo ((is_array($_tmp=time()+$this->_tpl_vars['g_site_config']['timezone']*60*60)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%H:%M:%S") : smarty_modifier_date_format($_tmp, "%H:%M:%S")); ?>
<br />
			<?php echo $this->_tpl_vars['g_lang_admin_display_date']; ?>
 <?php echo ((is_array($_tmp=time()+$this->_tpl_vars['g_site_config']['timezone']*60*60)) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['g_site_config']['dateformat']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['g_site_config']['dateformat'])); ?>

		</div>
	</fieldset></div>

	<div style="width:556px !important; width:616px;  padding-left:40px; padding-right:40px;"><fieldset><legend style="color: #ffffff;"><?php echo $this->_tpl_vars['g_lang_admin_site_options']; ?>
</legend>
		<div style="text-align:center; padding-left:20px;">
			<div style="width:200px; float:left; height: 20px;"><?php echo $this->_tpl_vars['g_lang_misc_name']; ?>
</div><div style="float:left;width:250px;height: 20px;"><?php echo $this->_tpl_vars['g_lang_misc_value']; ?>
</div>
				<?php $_from = $this->_tpl_vars['m_admin_options']['config']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['config']):
?>
					<?php if ($this->_tpl_vars['config']['s_name'] == $_GET['configedit']): ?>
						<div style="height:20px; width: 525px;"><form action="admin.php" method="post" id="edit"><input type="hidden" name="editconfig" value="<?php echo $this->_tpl_vars['config']['s_name']; ?>
" /><div style="height: 20px; width:200px; float:left; background: #657d70;"><?php echo $this->_tpl_vars['config']['s_name']; ?>
</div><div style="float:left; height: 20px; width:250px; background: #657d70;"><input type="text" name="value" value="<?php echo $this->_tpl_vars['config']['s_value']; ?>
" maxlength="255" class="login" style="width:180px; color:#000000;" /></div><div style="float:left; background:#657d70; height: 20px; width:40px;"><input type="submit" value="<?php echo $this->_tpl_vars['g_lang_misc_edit']; ?>
" class="login" style="width: auto; height: auto; color:#000000;" /></div></form></div>
				<?php else: ?>
						<div style="height: 17px; width:200px; float:left; background: #657d70;"><?php echo $this->_tpl_vars['config']['s_name']; ?>
</div><div style="float:left; height: 17px; width:250px; background: #657d70;"><?php echo $this->_tpl_vars['config']['s_value']; ?>
</div><div style="float:left; background:#657d70; width:40px;"><a href="admin.php?configedit=<?php echo $this->_tpl_vars['config']['s_name']; ?>
#edit" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/edit.png" alt="<?php echo $this->_tpl_vars['g_lang_misc_edit']; ?>
" border="0" /></a><a href="admin.php?configedit=<?php echo $this->_tpl_vars['config']['s_name']; ?>
#edit" class="link"><?php echo $this->_tpl_vars['g_lang_misc_edit']; ?>
</a></div>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
		</div>
		
	</fieldset></div>
	<div style="width:556px !important; width:616px;  padding-left:40px; padding-right:40px;"><fieldset><legend style="color: #ffffff;"><?php echo $this->_tpl_vars['g_lang_admin_email_options']; ?>
</legend>
		<div style="text-align:center; padding-left:20px;">
			<div style="width:200px; float:left; height: 20px;"><?php echo $this->_tpl_vars['g_lang_misc_name']; ?>
</div><div style="float:left;width:250px;height: 20px;"><?php echo $this->_tpl_vars['g_lang_misc_value']; ?>
</div>
				<?php $_from = $this->_tpl_vars['m_admin_options']['email']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['config']):
?>
					<div style="height: 17px; width:200px; float:left; background: #657d70;"><?php echo ((is_array($_tmp=$this->_tpl_vars['config']['m_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 20, "...", true) : smarty_modifier_truncate($_tmp, 20, "...", true)); ?>
</div><div style="float:left; height: 17px; width:250px; background: #657d70;"><?php echo ((is_array($_tmp=$this->_tpl_vars['config']['m_text'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 38, "...", true) : smarty_modifier_truncate($_tmp, 38, "...", true)); ?>
</div><div style="float:left; background:#657d70; width:40px;"><a href="admin.php?emailedit=<?php echo $this->_tpl_vars['config']['m_id']; ?>
" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/edit.png" alt="<?php echo $this->_tpl_vars['g_lang_misc_edit']; ?>
" border="0" /></a><a href="admin.php?emailedit=<?php echo $this->_tpl_vars['config']['m_id']; ?>
" class="link"><?php echo $this->_tpl_vars['g_lang_misc_edit']; ?>
</a></div>
				<?php endforeach; endif; unset($_from); ?>
		</div>
		
	</fieldset></div>

	<form action="admin.php?edit=style" name="styleform" method="post">
	<div style="width:556px !important; width:616px;  padding-left:40px; padding-right:40px;"><fieldset><legend style="color: #ffffff;"><?php echo $this->_tpl_vars['g_lang_admin_style_options']; ?>
</legend>
		<div style="text-align:center; padding-left:20px;">
			<div style="width:200px; float:left; height: 20px;"><?php echo $this->_tpl_vars['g_lang_admin_default_style']; ?>
</div><div style="float:left;width:250px;height: 20px;">
				<select name="style" class="login" style="color:#000000; height: auto;"><?php $_from = $this->_tpl_vars['m_admin_options']['themes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['config']):
?>
					<option value="<?php echo $this->_tpl_vars['config']['s_id']; ?>
" onclick="document.styleform.submit();" <?php if ($this->_tpl_vars['config']['s_used'] > 0): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['config']['s_name']; ?>
</option>
				<?php endforeach; endif; unset($_from); ?>
				</select></div>
				
		</div>
		<?php if (! empty ( $this->_tpl_vars['m_admin_options']['newstyle'] )): ?>
				<br /><br /><div style="float:left; width:525px;"><fieldset><legend style="color: #ffffff;"><?php echo $this->_tpl_vars['g_lang_admin_install_style']; ?>
</legend>
				<div style="text-align:center; padding-left:9px; background: #657d70;">
					<?php $_from = $this->_tpl_vars['m_admin_options']['newstyle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['config']):
?>
						<div style="height: 26px; width:150px !important; width: 157px; float:left; background: #657d70;"><?php echo $this->_tpl_vars['config']['s_name']; ?>
</div><div style="float:left; height: 26px; width:300px; background: #657d70;"><?php echo $this->_tpl_vars['config']['s_desc']; ?>
</div><div style="float:left; height: 26px; background:#657d70; width:40px;"><a href="admin.php?addstyle=<?php echo $this->_tpl_vars['config']['s_dir']; ?>
" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/add.png" alt="<?php echo $this->_tpl_vars['g_lang_misc_add']; ?>
" border="0" /></a><a href="admin.php?addstyle=<?php echo $this->_tpl_vars['config']['s_dir']; ?>
" class="link"><?php echo $this->_tpl_vars['g_lang_misc_add']; ?>
</a></div>
					<?php endforeach; endif; unset($_from); ?>
				</div>
				</fieldset>
			</div>
		<?php endif; ?>
	</fieldset></div>
	</form>

	<?php if (! empty ( $this->_tpl_vars['m_admin_options']['menu'] )): ?>
		<div style="width:556px !important; width:616px;  padding-right:40px; padding-left:40px;"><fieldset><legend style="color: #ffffff;"><?php echo $this->_tpl_vars['g_lang_admin_menu_options']; ?>
</legend>
			<div style="float:right; padding-right:25px !important; padding-right: 14px; height: 15px;"><a href="admin.php?add=menu" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/add.png" alt="<?php echo $this->_tpl_vars['g_lang_misc_add']; ?>
" border="0" /></a><a href="admin.php?add=menu" class="link"><?php echo $this->_tpl_vars['g_lang_misc_add']; ?>
</a></div>
			<br /><br />
			<div style="text-align:center; padding-left:20px;">
					<div style="float:left; height: 17px; width: 120px;"><?php echo $this->_tpl_vars['g_lang_misc_name']; ?>
</div>
					<div style="float:left; height: 17px; width: 120px;"><?php echo $this->_tpl_vars['g_lang_misc_link']; ?>
</div>
					<div style="float:left; height: 17px; width: 70px;"><?php echo $this->_tpl_vars['g_lang_admin_menu_type']; ?>
</div>
					<div style="float:left; height: 17px; width: 80px;"><?php echo $this->_tpl_vars['g_lang_panel_modules']; ?>

</div>
					<div style="float:left; height: 17px; width: 60px;"><?php echo $this->_tpl_vars['g_lang_misc_status']; ?>

</div>
					<div style="float:left; height: 17px; width: 40px;">&nbsp;</div>			
			</div>
			<?php $_from = $this->_tpl_vars['m_admin_options']['menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['config']):
?>
				<div style="width: 500px !important; width: 530px; text-align:center; padding-left:20px;">
					<?php if (! empty ( $this->_tpl_vars['m_admin_edit_menu'] ) && $this->_tpl_vars['config']['l_id'] == $this->_tpl_vars['m_admin_edit_menu']['l_id']): ?>
						<form action="admin.php" method="post" id="edit"><input type="hidden" name="editmenu" value="<?php echo $this->_tpl_vars['config']['l_id']; ?>
" />
							<div style="float:left; height: 21px; width: 120px; background: #657d70;"><input type="text" name="name" style="width: 100px;color: #000000;" maxlength="255" class="login" value="<?php echo $this->_tpl_vars['config']['l_name']; ?>
" /></div>
							<div style="float:left; height: 21px; width: 110px; background: #657d70;"><input type="text" name="link" style="width:100px; color: #000000;" maxlength="255" class="login" value="<?php echo $this->_tpl_vars['config']['l_link']; ?>
" /></div>
							<div style="float:left; height: 21px;  width: 120px; background: #657d70;"><select name="type" class="login" style="color: #000000;">	
																	<option <?php if ($this->_tpl_vars['config']['l_type'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo $this->_tpl_vars['g_lang_misc_private']; ?>
</option>
																	<option <?php if ($this->_tpl_vars['config']['l_type'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo $this->_tpl_vars['g_lang_misc_public']; ?>
</option>
																	<option <?php if ($this->_tpl_vars['config']['l_type'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo $this->_tpl_vars['g_lang_email_hidden']; ?>
</option>
																	<option value="4"><?php echo $this->_tpl_vars['g_lang_misc_delete']; ?>
</option>						
								</select>
							</div>
							<div style="float:left; height: 21px; width: 130px !important; width: 140px; padding-right: 10px; background: #657d70;"><input type="submit" value="<?php echo $this->_tpl_vars['g_lang_misc_edit']; ?>
" class="login" style="width:auto; color: #000000; float: right;"/></div>
						</form>
					<?php else: ?>
						<div style="float:left; height: 17px; width: 120px; background: #657d70;"><?php echo $this->_tpl_vars['config']['l_name']; ?>
</div>
						<div style="float:left; height: 17px; width: 120px; background: #657d70;"><?php echo ((is_array($_tmp=$this->_tpl_vars['config']['l_link'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 12, "...", true) : smarty_modifier_truncate($_tmp, 12, "...", true)); ?>
</div>
						<div style="float:left; height: 17px; width: 70px; background: #657d70;"><?php if ($this->_tpl_vars['config']['l_type'] == 1):  echo $this->_tpl_vars['g_lang_misc_private'];  else:  if ($this->_tpl_vars['config']['l_type'] == 2):  echo $this->_tpl_vars['g_lang_misc_public'];  else:  echo $this->_tpl_vars['g_lang_email_hidden'];  endif;  endif; ?></div>
						<div style="float:left; height: 17px; width: 80px; background: #657d70;"><?php if (! empty ( $this->_tpl_vars['config']['m_id'] )):  echo ((is_array($_tmp=$this->_tpl_vars['m_admin_options']['modules'][$this->_tpl_vars['config']['m_id']]['m_name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 9, "...", true) : smarty_modifier_truncate($_tmp, 9, "...", true));  else: ?>-<?php endif; ?>
</div>
						<div style="float:left; height: 17px; width: 60px; background: #657d70;"><?php if (! empty ( $this->_tpl_vars['config']['m_id'] )):  if ($this->_tpl_vars['m_admin_options']['modules'][$this->_tpl_vars['config']['m_id']]['m_status'] > 0):  echo $this->_tpl_vars['g_lang_misc_enabled'];  else:  echo $this->_tpl_vars['g_lang_misc_disabled'];  endif;  else: ?>-<?php endif; ?>
</div>
						<div style="float:left; height: 17px; width: 40px; background: #657d70;"><a href="admin.php?menuedit=<?php echo $this->_tpl_vars['config']['l_id']; ?>
#edit" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/edit.png" border="0" alt="<?php echo $this->_tpl_vars['g_lang_misc_edit']; ?>
" /></a><a href="admin.php?menuedit=<?php echo $this->_tpl_vars['config']['l_id']; ?>
#edit" class="link"><?php echo $this->_tpl_vars['g_lang_misc_edit']; ?>
</a></div>			
					<?php endif; ?>
				</div>
			<?php endforeach; endif; unset($_from); ?>
				<?php if ($_GET['add'] == 'menu'): ?>
					<div style="width:auto; text-align:center; padding-left:20px; padding-right:0px; background: #657d70;">
						<form action="admin.php" method="post"><input type="hidden" name="addmenu" value="1" />
							<div style="float:left; height: 20px; width: 120px; background: #657d70;"><input type="text" name="name" style="color: #000000;" maxlength="255" class="login"  /></div>
							<div style="float:left; height: 20px; width: 110px; background: #657d70;"><input type="text" name="link" style="color: #000000;" maxlength="255" class="login" /></div>
							<div style="float:left; height: 20px; width: 120px; background: #657d70;"><select name="type" class="login" style="color: #000000;"><option value="1"><?php echo $this->_tpl_vars['g_lang_misc_private']; ?>
</option><option value="2"><?php echo $this->_tpl_vars['g_lang_misc_public']; ?>
</option></select></div>
							<div style="float:left; height: 20px; width: 130px !important; width: 140px; padding-right: 10px; background: #657d70;"><input type="submit" value="<?php echo $this->_tpl_vars['g_lang_misc_add']; ?>
" class="login" style="width:auto; color: #000000;float: right;"/></div>
						</form>
					</div>
				<?php endif; ?>
		</fieldset></div><br /><br />
	<?php endif; ?>
<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['m_admin_edit_email'] )): ?>
	<br /><br />
	<form action="admin.php" method="post">
		<div style="width:616px; text-align:center;padding-left:40px; padding-right:40px;">
			<input type="hidden" name="editemail" value="<?php echo $_GET['emailedit']; ?>
" />
			<input type="text" name="subject" value="<?php echo $this->_tpl_vars['m_admin_edit_email']['m_subject']; ?>
" class="login" style="color: #000000; width:400px;" maxlength="255" /><br />
			<textarea class="textbox" name="text" style="width:400px; height:250px;" rows="50" cols="100"><?php echo $this->_tpl_vars['m_admin_edit_email']['m_text']; ?>
</textarea><br />
			<input type="submit" class="login" value="<?php echo $this->_tpl_vars['g_lang_misc_edit']; ?>
" style="color: #000000;"/>
		</div>	
		</form>
<?php endif; ?>