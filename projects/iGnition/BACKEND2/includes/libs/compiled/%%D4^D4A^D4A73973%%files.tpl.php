<?php /* Smarty version 2.6.14, created on 2010-07-16 11:13:09
         compiled from files.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'files.tpl', 47, false),array('modifier', 'string_format', 'files.tpl', 68, false),array('modifier', 'date_format', 'files.tpl', 107, false),array('modifier', 'nl2br', 'files.tpl', 118, false),array('function', 'math', 'files.tpl', 68, false),)), $this); ?>
<div class="title"><?php echo $this->_tpl_vars['g_lang_files']; ?>
</div>

<?php if (! empty ( $this->_tpl_vars['m_file_list'] )): ?>
	<br />
	<div style="width:616px;">
	<?php if ($this->_tpl_vars['g_user']->m_user_access['FILEADD'] > 0): ?>
			<div style="float:right; padding-right:30px;">
				<a href="download.php?add=folder&amp;fo=<?php echo $_GET['fo']; ?>
" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/add.png" border="0" alt="<?php echo $this->_tpl_vars['g_lang_folder_add']; ?>
" /></a><a href="download.php?add=folder&amp;fo=<?php echo $_GET['fo']; ?>
" class="link"><?php echo $this->_tpl_vars['g_lang_folder_add']; ?>
</a>&nbsp;<a href="download.php?add=file&amp;fo=<?php echo $_GET['fo']; ?>
" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/add.png" border="0" alt="<?php echo $this->_tpl_vars['g_lang_file_add']; ?>
" /></a><a href="download.php?add=file&amp;fo=<?php echo $_GET['fo']; ?>
" class="link"><?php echo $this->_tpl_vars['g_lang_file_add']; ?>
</a>
			</div>
	<?php endif; ?>
	<?php if (! empty ( $this->_tpl_vars['m_folder_list'] )): ?>
		<div style="width: 616px; padding-left: 80px;">
		<a href="download.php" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/folder.png" border="0" style="height: 13px;" alt="<?php echo $this->_tpl_vars['g_lang_misc_root']; ?>
" /></a><a href="download.php" class="link"><?php echo $this->_tpl_vars['g_lang_misc_root']; ?>
</a> > 
		<?php $_from = $this->_tpl_vars['m_folder_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['folder']):
        $this->_foreach['list']['iteration']++;
?> 
			<?php if (! empty ( $this->_tpl_vars['folder'] )): ?>
				<?php if (($this->_foreach['list']['iteration'] == $this->_foreach['list']['total'])): ?>
				<a href="download.php?fo=<?php echo $this->_tpl_vars['folder']['id']; ?>
" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/folder.png" border="0" style="height: 13px;" alt="<?php echo $this->_tpl_vars['folder']['name']; ?>
" /></a><a href="download.php?fo=<?php echo $this->_tpl_vars['folder']['id']; ?>
" class="link"><?php echo $this->_tpl_vars['folder']['name']; ?>
</a> 
				<?php else: ?>
				<a href="download.php?fo=<?php echo $this->_tpl_vars['folder']['id']; ?>
" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/folder.png" border="0" style="height: 13px;" alt="<?php echo $this->_tpl_vars['folder']['name']; ?>
" /></a><a href="download.php?fo=<?php echo $this->_tpl_vars['folder']['id']; ?>
" class="link"><?php echo $this->_tpl_vars['folder']['name']; ?>
</a> >
				<?php endif; ?>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
		</div>
	<?php endif; ?>
	</div><br /><br />
	<div style="width:590px !important; width:616px; padding-left: 60px;">
		<div style="float: left; width: 5px;">&nbsp;</div>
		<div style="float: left; width: 58%;"><?php echo $this->_tpl_vars['g_lang_misc_name']; ?>
</div>
		<div style="float: left; width: 11%;"><?php echo $this->_tpl_vars['g_lang_misc_size']; ?>
</div>
		<div style="float: left; width: 5%;"><?php echo $this->_tpl_vars['g_lang_misc_views']; ?>
</div>
	</div><br />
	<?php $_from = $this->_tpl_vars['m_file_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['fileitem']):
?>
		<?php if (isset ( $this->_tpl_vars['fileitem']['d_id'] ) && empty ( $this->_tpl_vars['fileitem']['f_id'] )): ?> 			<div style="width: 618px; padding-left: 40px; height: 19px;">
				<div style="float: left; width: 25px;%;"><a href="download.php?fo=<?php echo $this->_tpl_vars['fileitem']['d_id']; ?>
"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/folder.png" border="0" alt="<?php echo $this->_tpl_vars['fileitem']['d_name']; ?>
" /></a></div>
				<div style="float: left; width: 56%;"><a href="download.php?fo=<?php echo $this->_tpl_vars['fileitem']['d_id']; ?>
" class="link"><?php echo ((is_array($_tmp=$this->_tpl_vars['fileitem']['d_name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 48, "...", true) : smarty_modifier_truncate($_tmp, 48, "...", true)); ?>
</a></div>
				<div style="float: left; width: 11%;">&nbsp;</div>
				<div style="float: left; width: 5%;">&nbsp;</div>
				<?php if ($this->_tpl_vars['g_user']->m_user_access['FILEEDIT'] > 0): ?>
					<div style="float: left; padding-left: 10px; padding-right: 10px;"><a href="download.php?fo=<?php echo $_GET['fo']; ?>
&amp;edit=folder&amp;id=<?php echo $this->_tpl_vars['fileitem']['d_id']; ?>
" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/edit.png" border="0" alt="<?php echo $this->_tpl_vars['g_lang_misc_edit']; ?>
" /></a><a href="download.php?fo=<?php echo $_GET['fo']; ?>
&amp;edit=folder&amp;id=<?php echo $this->_tpl_vars['fileitem']['d_id']; ?>
" class="link"><?php echo $this->_tpl_vars['g_lang_misc_edit']; ?>
</a></div>				
				<?php endif; ?>
				<?php if ($this->_tpl_vars['g_user']->m_user_access['FILEDEL'] > 0): ?>
					<div style="padding-left: 10px;"><a href="download.php?fo=<?php echo $_GET['fo']; ?>
&amp;delete=folder&amp;id=<?php echo $this->_tpl_vars['fileitem']['d_id']; ?>
" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/delete.png" border="0" alt="<?php echo $this->_tpl_vars['g_lang_misc_delete']; ?>
" /></a><a href="download.php?fo=<?php echo $_GET['fo']; ?>
&amp;delete=folder&amp;id=<?php echo $this->_tpl_vars['fileitem']['d_id']; ?>
" class="link"><?php echo $this->_tpl_vars['g_lang_misc_delete']; ?>
</a></div>				
				<?php else: ?>
					<br /><br /> 				<?php endif; ?>
			</div>
		<?php else: ?>	
			<?php if (isset ( $this->_tpl_vars['fileitem']['f_id'] )): ?>															<div style="width: 618px; padding-left: 40px; height: 23px;">
				<div style="float: left; width: 25px;"><a href="download.php?d=<?php echo $this->_tpl_vars['fileitem']['f_id']; ?>
"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/file.png" border="0" alt="<?php echo $this->_tpl_vars['fileitem']['f_name']; ?>
" /></a></div>
				<div style="float: left; width: 56%;"><a href="download.php?d=<?php echo $this->_tpl_vars['fileitem']['f_id']; ?>
" class="link"><?php echo ((is_array($_tmp=$this->_tpl_vars['fileitem']['f_name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 48, "...", true) : smarty_modifier_truncate($_tmp, 48, "...", true)); ?>
</a></div>
				<div style="float: left; width: 11%;">
								<?php if ($this->_tpl_vars['fileitem']['f_size'] > 1024): ?>
					<?php if ($this->_tpl_vars['fileitem']['f_size'] > 512000): ?>
						<?php echo ((is_array($_tmp=smarty_function_math(array('equation' => "x/1024000",'x' => $this->_tpl_vars['fileitem']['f_size']), $this))) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"));?>
 GB
					<?php else: ?>					
						<?php echo ((is_array($_tmp=smarty_function_math(array('equation' => "x/1024",'x' => $this->_tpl_vars['fileitem']['f_size']), $this))) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"));?>
 MB
					<?php endif; ?>				
				<?php else: ?>
					<?php echo ((is_array($_tmp=$this->_tpl_vars['fileitem']['f_size'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.0f") : smarty_modifier_string_format($_tmp, "%.0f")); ?>
 KB
				<?php endif; ?>	</div>
				
				<div style="float: left; width: 5%;"><?php echo $this->_tpl_vars['fileitem']['f_down']; ?>
</div>
				<?php if ($this->_tpl_vars['g_user']->m_user_access['FILEEDIT'] > 0): ?>
					<div style="float:left; padding-left: 10px; padding-right: 10px;"><a href="download.php?fo=<?php echo $_GET['fo']; ?>
&amp;edit=file&amp;id=<?php echo $this->_tpl_vars['fileitem']['f_id']; ?>
" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/edit.png" border="0" alt="<?php echo $this->_tpl_vars['g_lang_misc_edit']; ?>
" /></a><a href="download.php?fo=<?php echo $_GET['fo']; ?>
&amp;edit=file&amp;id=<?php echo $this->_tpl_vars['fileitem']['f_id']; ?>
" class="link"><?php echo $this->_tpl_vars['g_lang_misc_edit']; ?>
</a></div>				
				<?php endif; ?>
				<?php if ($this->_tpl_vars['g_user']->m_user_access['FILEDEL'] > 0): ?>
					<div style="padding-left: 10px;"><a href="download.php?fo=<?php echo $_GET['fo']; ?>
&amp;delete=file&amp;id=<?php echo $this->_tpl_vars['fileitem']['f_id']; ?>
" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/delete.png" border="0" alt="<?php echo $this->_tpl_vars['g_lang_misc_delete']; ?>
" /></a><a href="download.php?fo=<?php echo $_GET['fo']; ?>
&amp;delete=file&amp;id=<?php echo $this->_tpl_vars['fileitem']['f_id']; ?>
" class="link"><?php echo $this->_tpl_vars['g_lang_misc_delete']; ?>
</a></div>				
				<?php endif; ?>
			</div>
			<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['m_file_display'] )): ?>
	<div style="padding-left: 30px; width:110px; float:left;">
		<div style="width:100px; height:100px;"><img src="<?php echo $this->_tpl_vars['m_file_display']['f_img']; ?>
" style="height:100px; width:100px;" alt="<?php echo $this->_tpl_vars['m_file_display']['f_name']; ?>
" /></div>
	</div>
	<div style="width: 400px !important; width:410px; padding-left: 0px !important; padding-left: 10px; float:left; padding-bottom: 40px;">	
		<div style="width:200px; float:left;"><?php echo $this->_tpl_vars['g_lang_misc_name']; ?>
:</div><div style="width: 200px; float:left;"><?php echo $this->_tpl_vars['m_file_display']['f_name']; ?>
</div>
		<div style="width:200px; float:left;"><?php echo $this->_tpl_vars['g_lang_file_size']; ?>
:</div><div style="width: 200px; float:left;">
									
					<?php if ($this->_tpl_vars['m_file_display']['f_size'] > 1024): ?>
						<?php if ($this->_tpl_vars['m_file_display']['f_size'] > 512000): ?>
							<?php echo ((is_array($_tmp=smarty_function_math(array('equation' => "x/1024000",'x' => $this->_tpl_vars['m_file_display']['f_size']), $this))) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"));?>
 GB
						<?php else: ?>					
							<?php echo ((is_array($_tmp=smarty_function_math(array('equation' => "x/1024",'x' => $this->_tpl_vars['m_file_display']['f_size']), $this))) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"));?>
 MB
						<?php endif; ?>				
					<?php else: ?>
						<?php echo ((is_array($_tmp=$this->_tpl_vars['m_file_display']['f_size'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.0f") : smarty_modifier_string_format($_tmp, "%.0f")); ?>
 KB
					<?php endif; ?></div>
		<div style="width:200px; float:left;"><?php echo $this->_tpl_vars['g_lang_misc_date']; ?>
:</div><div style="width:200px; float:left;"><?php echo ((is_array($_tmp=$this->_tpl_vars['m_file_display']['f_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['g_site_config']['dateformat']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['g_site_config']['dateformat'])); ?>
</div>
		<div style="width:200px; float:left;"><?php echo $this->_tpl_vars['g_lang_file_uploaded']; ?>
:</div><div style="width:200px; float:left;"><a href="users.php?user=<?php echo $this->_tpl_vars['m_file_display']['u_id']; ?>
" class="link"><?php echo $this->_tpl_vars['m_file_display']['u_name']; ?>
</a></div>
		<div style="width:200px; float:left;"><?php echo $this->_tpl_vars['g_lang_file_downloads']; ?>
:</div><div style="width:200px; float:left;"><?php echo $this->_tpl_vars['m_file_display']['f_down']; ?>
</div>
		<div style="width:200px; float:left; padding-top: 15px;">
					<?php if ($this->_tpl_vars['m_file_display']['f_loc'] == "#"): ?>
						<?php echo $this->_tpl_vars['g_lang_file_login']; ?>

					<?php else: ?>
						<a href="download.php?f=<?php echo $this->_tpl_vars['m_file_display']['f_id']; ?>
"><?php echo $this->_tpl_vars['g_lang_download_file']; ?>
</a>
					<?php endif; ?>
		</div>
	</div>
	<div style="padding-left: 40px; width:500px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['m_file_display']['f_desc'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</div>
<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['m_file_add'] ) || ! empty ( $this->_tpl_vars['m_file_edit'] )): ?>
	<br />
	<form enctype="multipart/form-data" action="download.php?fo=<?php echo $_GET['fo']; ?>
" method="post"><input type="hidden" name="<?php if (! empty ( $this->_tpl_vars['m_file_add'] )): ?>add<?php else: ?>edit<?php endif; ?>" value="file" />
		<div style="width: 616px; text-align:center; padding-left:10px; padding-right:10px;"><fieldset><legend style="color:#ffffff;"><?php echo $this->_tpl_vars['g_lang_misc_description']; ?>
</legend>
			<div style="text-align:left; padding-left: 100px;">
				<?php echo $this->_tpl_vars['g_lang_misc_name']; ?>
 <input type="text" name="name" <?php if (! empty ( $this->_tpl_vars['m_file_edit'] )): ?>value="<?php echo $this->_tpl_vars['m_file_edit']['f_name']; ?>
"<?php endif; ?> maxlength="255" style="width: 200px; color:#000000;" class="login"/><br />
				<input type="checkbox" name="public" value="1"<?php if (! empty ( $this->_tpl_vars['m_file_edit'] ) && $this->_tpl_vars['m_file_edit']['f_public'] > 0): ?> checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['g_lang_misc_make_public']; ?>
<br />
				<textarea name="description" style="width:400px; height:200px; color:#000000;" class="textbox" rows="50" cols="100"><?php if (! empty ( $this->_tpl_vars['m_file_edit'] )):  echo $this->_tpl_vars['m_file_edit']['f_desc'];  endif; ?></textarea>
			</div>
			</fieldset>
		</div>
		<div style="width: 616px; padding-left:10px; padding-right:10px;"><fieldset><legend style="color:#ffffff;"><?php echo $this->_tpl_vars['g_lang_file_options']; ?>
</legend>
				
				
				<div style="float:right; padding-right: 0px; width:210px;"><fieldset><legend style="color:#ffffff;"><?php echo $this->_tpl_vars['g_lang_file_preview_image']; ?>
</legend>
						<div style="text-align:center"><img src="<?php if (! empty ( $this->_tpl_vars['m_file_edit'] )):  echo $this->_tpl_vars['m_file_edit']['f_img'];  else:  echo $this->_tpl_vars['g_site_config']['photodefault'];  endif; ?>" style="width:100px; height: 100px;" alt="<?php echo $this->_tpl_vars['g_lang_file_change_preview_image']; ?>
" /></div>
						<div><?php echo $this->_tpl_vars['g_lang_file_change_preview_image']; ?>
</div>
						<div><input type="file" name="preview" class="login" style="color:#000000; width:185px;" /></div>
						<div><?php echo $this->_tpl_vars['g_lang_user_url_image']; ?>
</div>
						<div><input type="text" name="previewlink" class="login" style="color:#000000; width:185px;" /></div>
				</fieldset></div>
				
				
				<div style="width:370px;padding-left:10px;"><fieldset><legend style="color:#ffffff;"><?php echo $this->_tpl_vars['g_lang_misc_upload']; ?>
</legend>
				<?php if (! empty ( $this->_tpl_vars['m_file_add'] )): ?>
					<?php echo $this->_tpl_vars['g_lang_misc_upload']; ?>
 <input type="file" name="upload" class="login" style="width: 200px; color: #000000;" /><br />
					<?php echo $this->_tpl_vars['g_lang_file_link_to']; ?>
&nbsp; http://<input type="text" name="weblink" class="login" style="color: #000000;width:125px;" maxlength="200" /><br /><?php endif; ?>
					<?php echo $this->_tpl_vars['g_lang_file_link_to_size']; ?>
 <input type="text" name="websize" maxlength="255" class="login" style="color: #000000; width: 50px;" value="<?php echo $this->_tpl_vars['m_file_edit']['f_size']; ?>
" />
				</fieldset></div>
				
				
				<div style="width:370px; padding-left: 10px;"><fieldset><legend style="color:#ffffff;"><?php echo $this->_tpl_vars['g_lang_file_directory']; ?>
</legend>&nbsp;
				<?php if (! empty ( $this->_tpl_vars['m_file_edit'] )): ?><input type="hidden" name="id" value="<?php echo $this->_tpl_vars['m_file_edit']['f_id']; ?>
" /><?php else: ?><input type="hidden" name="folder" value="<?php echo $_GET['fo']; ?>
" /><?php endif; ?>
				<?php if (! empty ( $this->_tpl_vars['m_folder_list'] )): ?>
					<a href="download.php?<?php if (! empty ( $this->_tpl_vars['m_file_add'] )): ?>add=file<?php endif; ?>" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/folder.png" border="0" style="height: 13px;" /></a><a href="download.php?<?php if (! empty ( $this->_tpl_vars['m_file_add'] )): ?>add=file<?php endif; ?>" class="link"><?php echo $this->_tpl_vars['g_lang_misc_root']; ?>
</a> > 
					<?php $_from = $this->_tpl_vars['m_folder_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['folder']):
        $this->_foreach['list']['iteration']++;
?> 
						<?php if (! empty ( $this->_tpl_vars['folder'] )): ?>
							<?php if (($this->_foreach['list']['iteration'] == $this->_foreach['list']['total'])): ?>
								<a href="download.php?<?php if (! empty ( $this->_tpl_vars['m_file_add'] )): ?>add=file&amp;<?php endif; ?>fo=<?php echo $this->_tpl_vars['folder']['id']; ?>
" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/folder.png" border="0" style="height:13px;" /></a><a href="download.php?<?php if (! empty ( $this->_tpl_vars['m_file_add'] )): ?>add=file&amp;<?php endif; ?>fo=<?php echo $this->_tpl_vars['folder']['id']; ?>
" class="link"><?php echo $this->_tpl_vars['folder']['name']; ?>
</a>
							<?php else: ?>
								<a href="download.php?<?php if (! empty ( $this->_tpl_vars['m_file_add'] )): ?>add=file&amp;<?php endif; ?>fo=<?php echo $this->_tpl_vars['folder']['id']; ?>
" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/folder.png" border="0" style="height:13px;" /><a href="download.php?<?php if (! empty ( $this->_tpl_vars['m_file_add'] )): ?>add=file&amp;<?php endif; ?>fo=<?php echo $this->_tpl_vars['folder']['id']; ?>
" class="link"><?php echo $this->_tpl_vars['folder']['name']; ?>
</a> >
							<?php endif; ?>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
				<?php endif; ?>
				</fieldset></div>
				
		</fieldset>
		</div>
		
		<div style="padding-left: 500px;"><input type="submit" class="login" style="color:#000000;" value="<?php if (! empty ( $this->_tpl_vars['m_file_edit'] )):  echo $this->_tpl_vars['g_lang_file_edit'];  else:  echo $this->_tpl_vars['g_lang_file_add'];  endif; ?>" /></div>
	</form><br /><br />
<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['m_folder_add'] ) || ! empty ( $this->_tpl_vars['m_folder_edit'] )): ?><br /><br />
	<div style="padding-left:200px; width: 200px !important; width: 400px;">
		<form action="download.php?fo=<?php echo $_GET['fo']; ?>
" method="post"><input type="hidden" name="<?php if (! empty ( $this->_tpl_vars['m_folder_add'] )): ?>add<?php else: ?>edit<?php endif; ?>" value="folder" /><?php if (! empty ( $this->_tpl_vars['m_folder_edit'] )): ?><input type="hidden" name="id" value="<?php echo $this->_tpl_vars['m_folder_edit']['d_id']; ?>
" /><?php else: ?><input type="hidden" name="folder" value="<?php echo $_GET['fo']; ?>
" /><?php endif; ?>
			<div style="width: 100px; float:left;"><?php echo $this->_tpl_vars['g_lang_misc_name']; ?>
</div><div style="float:left; width:100px;"><input type="text" name="name" maxlength="255" <?php if (! empty ( $this->_tpl_vars['m_folder_edit'] )): ?>value="<?php echo $this->_tpl_vars['m_folder_edit']['d_name']; ?>
"<?php endif; ?> class="login" style="color:#000000;"/></div>
			<div style="width: 100px; float:left;"><?php echo $this->_tpl_vars['g_lang_misc_make_public']; ?>
</div><div style="float:left; width:50px;"><input type="checkbox" name="public" value="1"<?php if (! empty ( $this->_tpl_vars['m_folder_edit'] ) && $this->_tpl_vars['m_folder_edit']['d_public'] > 0): ?> checked="checked"<?php endif; ?> /></div>
			<div style="width: 200px;"><?php echo $this->_tpl_vars['g_lang_misc_description']; ?>
</div>
			<div><textarea name="description" class="textbox" style="color:#000000; width: 213px; height: 100px;" rows="50" cols="100"><?php if (! empty ( $this->_tpl_vars['m_folder_edit'] )):  echo $this->_tpl_vars['m_folder_edit']['d_desc'];  endif; ?></textarea></div>
			<div style=""><input type="submit" value="<?php if (! empty ( $this->_tpl_vars['m_folder_add'] )):  echo $this->_tpl_vars['g_lang_folder_add'];  else:  echo $this->_tpl_vars['g_lang_folder_edit'];  endif; ?>" class="login" style="color: #000000;"/></div>
		</form>
	</div>
<?php endif; ?> 