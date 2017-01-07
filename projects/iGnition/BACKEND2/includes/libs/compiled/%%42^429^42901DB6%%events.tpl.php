<?php /* Smarty version 2.6.14, created on 2010-07-16 11:13:11
         compiled from events.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'events.tpl', 32, false),array('modifier', 'date_format', 'events.tpl', 33, false),array('modifier', 'nl2br', 'events.tpl', 57, false),)), $this); ?>
<div class="title">
	<?php echo $this->_tpl_vars['g_lang_events']; ?>

</div>

<?php if (! empty ( $this->_tpl_vars['m_events_list'] )): ?>
	<?php if ($this->_tpl_vars['g_user']->m_user_access['EVENTADD'] > 0): ?>
		<br />
		<div style="width: 130px;float:right;"><a href="events.php?add=event" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/add.png" alt="<?php echo $this->_tpl_vars['g_lang_events_add']; ?>
" border="0" /></a><a href="events.php?add=event" class="link"><?php echo $this->_tpl_vars['g_lang_events_add']; ?>
</a></div>
	<?php endif; ?>
	<br /><br />
	<div style="width:616px !important; width: 650px; padding-left:30px; padding-right:30px; height: 17px;">
		<div style="float:left; width:180px;"><?php echo $this->_tpl_vars['g_lang_misc_name']; ?>
</div>
		<div style="float:left; width:190px;"><?php echo $this->_tpl_vars['g_lang_misc_description']; ?>
</div>
		<div style="float: left; width:115px;"><?php echo $this->_tpl_vars['g_lang_events_start_date']; ?>
</div>
	</div>
	<?php if ($this->_tpl_vars['m_events_list'] != NULL && $this->_tpl_vars['m_events_list'] != 'NULL'): ?>
		<?php $_from = $this->_tpl_vars['m_events_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['eventlist']):
?> 
			<?php echo '<div style="width:616px !important; width: 650px; padding-left:30px; height:17px;"><div style="float:left; width:180px;"><a href="events.php?event=';  echo $this->_tpl_vars['eventlist']['e_id'];  echo '" class="link">';  echo $this->_tpl_vars['eventlist']['e_name'];  echo '</a></div><div style="float:left; width:190px;">';  echo ((is_array($_tmp=$this->_tpl_vars['eventlist']['e_desc'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30, "...", true) : smarty_modifier_truncate($_tmp, 30, "...", true));  echo '</div><div style="float: left; width:115px;">';  echo ((is_array($_tmp=$this->_tpl_vars['eventlist']['e_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['g_site_config']['dateformat']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['g_site_config']['dateformat']));  echo '</div>';  if ($this->_tpl_vars['g_user']->m_user_access['EVENTEDIT'] > 0):  echo '<div style="float: left; width:auto; padding-left: 10px;"><a href="events.php?edit=';  echo $this->_tpl_vars['eventlist']['e_id'];  echo '" class="link"><img src="theme/';  echo $this->_tpl_vars['g_theme_dir'];  echo '/gfx/edit.png" border="0" alt="';  echo $this->_tpl_vars['g_lang_misc_edit'];  echo '" /></a><a href="events.php?edit=';  echo $this->_tpl_vars['eventlist']['e_id'];  echo '" class="link">';  echo $this->_tpl_vars['g_lang_misc_edit'];  echo '</a></div>';  endif;  echo '';  if ($this->_tpl_vars['g_user']->m_user_access['EVENTDEL'] > 0):  echo '<div style="float: left; width:auto; padding-left: 10px;"><a href="events.php?delete=';  echo $this->_tpl_vars['eventlist']['e_id'];  echo '" class="link"><img src="theme/';  echo $this->_tpl_vars['g_theme_dir'];  echo '/gfx/delete.png" border="0" alt="';  echo $this->_tpl_vars['g_lang_misc_delete'];  echo '" /></a><a href="events.php?delete=';  echo $this->_tpl_vars['eventlist']['e_id'];  echo '" class="link">';  echo $this->_tpl_vars['g_lang_misc_delete'];  echo '</a></div>';  endif;  echo '</div>'; ?>

		<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>
<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['m_events_display'] )): ?>
	<div style="width:616px; padding-left:10px; padding-right:10px;">
		<div style="float:left; width:100px; height:100px; padding-right: 20px;"><fieldset style="height:auto; width:100px;"><legend style="color: #ffffff;"><?php echo $this->_tpl_vars['g_lang_misc_picture']; ?>
</legend>
			<a href="<?php echo $this->_tpl_vars['m_events_display']['e_img']; ?>
" class="link"><img src="<?php echo $this->_tpl_vars['m_events_display']['e_img']; ?>
" alt="<?php echo $this->_tpl_vars['m_events_display']['e_name']; ?>
" border="0" style="width:100px; height:100px;" /></a>
		</fieldset></div>
		<div style="width:auto; height: auto; margin-right:10px;"><fieldset><legend style="color: #ffffff;"><?php echo $this->_tpl_vars['g_lang_misc_details']; ?>
</legend>
			<div style="float: left; width: 100px; padding-left:30px;"><?php echo $this->_tpl_vars['g_lang_misc_name']; ?>
</div><div style="width: auto; padding-left: 10px;"><?php echo $this->_tpl_vars['m_events_display']['e_name']; ?>
</div>
			<div style="float: left; width: 100px; padding-left:30px;"><?php echo $this->_tpl_vars['g_lang_events_start_date']; ?>
</div><div style="width: auto; padding-left: 10px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['m_events_display']['e_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['g_site_config']['dateformat']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['g_site_config']['dateformat'])); ?>
</div>
		</fieldset></div>
		<div style="width: auto; height: auto;margin-right:10px;"><fieldset><legend style="color: #ffffff;"><?php echo $this->_tpl_vars['g_lang_misc_description']; ?>
</legend>
			<?php echo ((is_array($_tmp=$this->_tpl_vars['m_events_display']['e_desc'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

		</fieldset></div>
		<?php if (! empty ( $this->_tpl_vars['m_events_display']['e_report'] )): ?>
		<div style="width:486px !important; width: 586px; height: auto; padding-left: 120px !important; padding-left: 135px;"><fieldset><legend style="color: #ffffff;"><?php echo $this->_tpl_vars['g_lang_misc_report']; ?>
</legend>
			<?php echo ((is_array($_tmp=$this->_tpl_vars['m_events_display']['e_report'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

		</fieldset></div>
		<?php endif; ?>
	</div>


<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['m_events_add'] ) || ! empty ( $this->_tpl_vars['m_events_edit'] )): ?>
	<form name="event" enctype="multipart/form-data" action="events.php" method="post"><?php if (empty ( $this->_tpl_vars['m_events_add'] )): ?><input type="hidden" name="edit" value="<?php echo $_GET['edit']; ?>
" /><?php else: ?><input type="hidden" name="add" value="1" /><?php endif; ?>
	<div style="width:450px; margin: 0 auto; padding-left: 10px !important; padding-left:100px; padding-right:10px;"><fieldset style="height: <?php if (empty ( $this->_tpl_vars['m_events_edit'] )): ?>320<?php else: ?>470<?php endif; ?>px; width:450px;"><legend style="color:#ffffff;"> <?php if (empty ( $this->_tpl_vars['m_events_add'] )):  echo $this->_tpl_vars['g_lang_events_edit'];  else:  echo $this->_tpl_vars['g_lang_events_add'];  endif; ?></legend>
		
		<div style="height: 19px; padding-left: 40px; padding-top: 20px;">
			<div style="float:left;height: 19px; width: 200px;"><?php echo $this->_tpl_vars['g_lang_misc_name']; ?>
</div><div style="float:left; width:100px;"><input type="text" name="name" class="login" maxlength="255" style="color: #000000;" <?php if (! empty ( $this->_tpl_vars['m_events_edit'] )): ?>value="<?php echo $this->_tpl_vars['m_events_edit']['e_name']; ?>
"<?php endif; ?> /></div>
		</div><div style="height: 23px;  padding-left: 40px;">
			<div style="float:left;height: 19px; width: 200px;"><?php echo $this->_tpl_vars['g_lang_events_start_date']; ?>
</div><div style="width: 100px;">
			<?php echo '<script language="JavaScript" type="text/javascript">
					<!--		
						var GC_SET_0 = {
							\'appearance\': GC_APPEARANCE,
							\'dataArea\':\'startdate\',
							\'dateFormat\' : \'d-m-Y\'
						}
						new gCalendar(GC_SET_0);
						document.forms[\'event\'].elements[\'startdate\'].value = \'';  if (! empty ( $this->_tpl_vars['m_events_edit'] )):  echo ((is_array($_tmp=$this->_tpl_vars['m_events_edit']['e_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%m-%Y") : smarty_modifier_date_format($_tmp, "%d-%m-%Y"));  else:  echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%m-%Y") : smarty_modifier_date_format($_tmp, "%d-%m-%Y"));  endif;  echo '\';
					//-->
					</script>'; ?>
</div>
		</div><div style="height: 19px; padding-left: 40px;">
			<div style="float:left;height: 19px; width: 200px;"><?php echo $this->_tpl_vars['g_lang_misc_make_public']; ?>
</div><div style="float:left; width:100px;"><input type="checkbox" name="public" value="1" <?php if ($this->_tpl_vars['m_events_edit']['e_public'] > 0): ?>checked="checked"<?php endif; ?> /></div>
		</div><div style="height: 23px; padding-left: 40px;">
			<div style="float:left;height: 19px; width: 200px;"><?php echo $this->_tpl_vars['g_lang_image_upload']; ?>
</div><div style="float:left; width:100px;"><input type="file" name="image" class="login" style="color: #000000;" /></div>
		</div><div style="height: 23px; padding-left: 40px;">
			<div style="float:left;height: 19px; width: 200px;"><?php echo $this->_tpl_vars['g_lang_user_url_image']; ?>
</div><div style="float:left; width:100px;"><input type="text" name="weblink" class="login" style="color: #000000;" value="<?php echo $this->_tpl_vars['m_events_edit']['e_img']; ?>
" maxlength="255" /></div>
		</div><div style="height: 23px; padding-left: 40px;">
			<div style="float:left; height: 19px; width: 200px !important; width: 198px;"><?php echo $this->_tpl_vars['g_lang_misc_description']; ?>
</div><div style="float:left; width:200px;"><textarea name="description" class="textbox" style="color: #000000; width:200px; height:150px;" rows="50" cols="100"><?php echo $this->_tpl_vars['m_events_edit']['e_desc']; ?>
</textarea>
		</div>
		<?php if (! empty ( $this->_tpl_vars['m_events_edit'] )): ?>
			<div style="float:left;height: 19px; width: 200px !important; width: 198px;"><?php echo $this->_tpl_vars['g_lang_misc_report']; ?>
</div><div style="float:left; width:200px;"><textarea name="report" class="textbox" style="color: #000000; width:200px; height:150px;" rows="50" cols="100"><?php echo $this->_tpl_vars['m_events_edit']['e_report']; ?>
</textarea></div>
		<?php endif; ?>
			<div style="float:right;height: 19px; width: 200px;"><input type="submit" value="<?php if (! empty ( $this->_tpl_vars['m_events_add'] )):  echo $this->_tpl_vars['g_lang_misc_add'];  else:  echo $this->_tpl_vars['g_lang_misc_edit'];  endif; ?>" class="login" style="width:auto; color: #000000;" /></div>
		</div>
	</fieldset></div>
		</form><br />
<?php endif; ?>