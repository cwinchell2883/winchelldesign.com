<?php /* Smarty version 2.6.14, created on 2010-07-16 11:13:10
         compiled from gallery.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'gallery.tpl', 65, false),)), $this); ?>
<div class="title">
<?php echo $this->_tpl_vars['g_lang_gallery']; ?>

</div>

<?php if (! empty ( $this->_tpl_vars['m_gallery_display'] )): ?>
	<br />
	<div style="width: 616px; text-align: center;"><img src="<?php echo $this->_tpl_vars['m_gallery_display'][0]['p_loc']; ?>
" alt="<?php echo $this->_tpl_vars['m_gallery_display'][0]['p_loc']; ?>
" style="width:400px; height:300px;" /></div>
<?php endif; ?>


<?php if (! empty ( $this->_tpl_vars['m_gallery_list'] )): ?>
<?php echo '<br /><div style="width:616px; height: 40px;">';  if (! empty ( $this->_tpl_vars['m_folder_list'] )):  echo '<div style="padding-left: 40px; float: left;"><a href="gallery.php" class="link"><img src="theme/';  echo $this->_tpl_vars['g_theme_dir'];  echo '/gfx/folder.png" border="0" style="height: 13px;" alt="';  echo $this->_tpl_vars['g_lang_misc_root'];  echo '" /></a><a href="gallery.php" class="link">';  echo $this->_tpl_vars['g_lang_misc_root'];  echo '</a> >';  $_from = $this->_tpl_vars['m_folder_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['folder']):
        $this->_foreach['list']['iteration']++;
 echo '';  if (! empty ( $this->_tpl_vars['folder'] )):  echo '';  if (($this->_foreach['list']['iteration'] == $this->_foreach['list']['total'])):  echo '<a href="gallery.php?fo=';  echo $this->_tpl_vars['folder']['id'];  echo '" class="link"><img src="theme/';  echo $this->_tpl_vars['g_theme_dir'];  echo '/gfx/folder.png" border="0" style="height: 13px;" alt="';  echo $this->_tpl_vars['folder']['name'];  echo '" /></a><a href="gallery.php?fo=';  echo $this->_tpl_vars['folder']['id'];  echo '" class="link">';  echo $this->_tpl_vars['folder']['name'];  echo '</a>';  else:  echo '<a href="gallery.php?fo=';  echo $this->_tpl_vars['folder']['id'];  echo '" class="link"><img src="theme/';  echo $this->_tpl_vars['g_theme_dir'];  echo '/gfx/folder.png" border="0" style="height: 13px;" alt="';  echo $this->_tpl_vars['folder']['name'];  echo '" /></a><a href="gallery.php?fo=';  echo $this->_tpl_vars['folder']['id'];  echo '" class="link">';  echo $this->_tpl_vars['folder']['name'];  echo '</a> >';  endif;  echo '';  endif;  echo '';  endforeach; endif; unset($_from);  echo '</div>';  endif;  echo '';  if ($this->_tpl_vars['g_user']->m_user_access['SCRNADD'] > 0):  echo '<div style="float: right; padding-right: 20px;"><a href="gallery.php?add=folder&amp;fo=';  echo $_GET['fo'];  echo '" class="link"><img src="theme/';  echo $this->_tpl_vars['g_theme_dir'];  echo '/gfx/add.png" border="0" alt="';  echo $this->_tpl_vars['g_lang_folder_add'];  echo '" /></a><a href="gallery.php?add=folder&amp;fo=';  echo $_GET['fo'];  echo '" class="link">';  echo $this->_tpl_vars['g_lang_folder_add'];  echo '</a>&nbsp;<a href="gallery.php?add=photo&amp;fo=';  echo $_GET['fo'];  echo '" class="link"><img src="theme/';  echo $this->_tpl_vars['g_theme_dir'];  echo '/gfx/add.png" border="0" alt="';  echo $this->_tpl_vars['g_lang_image_add'];  echo '" /></a><a href="gallery.php?add=photo&amp;fo=';  echo $_GET['fo'];  echo '" class="link">';  echo $this->_tpl_vars['g_lang_image_add'];  echo '</a></div>';  endif;  echo '</div><div style="width:616px; padding-left: 60px; height: 25px;"><div style="float: left; width: 5px;">&nbsp;</div><div style="float: left; width: 58%;">';  echo $this->_tpl_vars['g_lang_misc_name'];  echo '</div><div style="float: left; width: 14%;">';  echo $this->_tpl_vars['g_lang_misc_date'];  echo '</div><div style="float: left; width: 5%;">';  echo $this->_tpl_vars['g_lang_misc_views'];  echo '</div></div>';  if ($this->_tpl_vars['m_gallery_list'] != 'NULL'):  echo '';  $_from = $this->_tpl_vars['m_gallery_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['photoitem']):
 echo '';  if (! empty ( $this->_tpl_vars['photoitem']['g_id'] ) && empty ( $this->_tpl_vars['photoitem']['p_id'] )):  echo '<div style="width:616px; padding-left: 40px; height: 19px;"><div style="float: left; width: 5px;"><a href="gallery.php?fo=';  echo $this->_tpl_vars['photoitem']['g_id'];  echo '"><img src="theme/';  echo $this->_tpl_vars['g_theme_dir'];  echo '/gfx/folder.png" border="0" alt="';  echo $this->_tpl_vars['photoitem']['g_name'];  echo '" /></a></div><div style="float: left; width: 48%; padding-left: 20px;"><a href="gallery.php?fo=';  echo $this->_tpl_vars['photoitem']['g_id'];  echo '" class="link">';  echo $this->_tpl_vars['photoitem']['g_name'];  echo '</a></div><div style="float: left; width: 23%;">&nbsp;</div><div style="float: left; width: 7%;">&nbsp;</div>';  if ($this->_tpl_vars['g_user']->m_user_access['SCRNDEL'] > 0):  echo '<div style="float: left; width: 60px;"><a href="gallery.php?fo=';  echo $_GET['fo'];  echo '&amp;delete=folder&amp;id=';  echo $this->_tpl_vars['photoitem']['g_id'];  echo '" class="link"><img src="theme/';  echo $this->_tpl_vars['g_theme_dir'];  echo '/gfx/delete.png" border="0" alt="';  echo $this->_tpl_vars['g_lang_misc_delete'];  echo '" /></a><a href="gallery.php?fo=';  echo $_GET['fo'];  echo '&amp;delete=folder&amp;id=';  echo $this->_tpl_vars['photoitem']['g_id'];  echo '" class="link">';  echo $this->_tpl_vars['g_lang_misc_delete'];  echo '</a></div>';  endif;  echo '</div>';  else:  echo '<div style="width:616px; padding-left: 40px; height: 23px;"><div style="float: left; width: 5px;"><a href="gallery.php?p=';  echo $this->_tpl_vars['photoitem']['p_id'];  echo '" class="link"><img src="theme/';  echo $this->_tpl_vars['g_theme_dir'];  echo '/gfx/file.png" border="0" alt="';  echo $this->_tpl_vars['photoitem']['p_name'];  echo '" /></a></div><div style="float: left; width: 48%; padding-left: 20px;"><a href="gallery.php?p=';  echo $this->_tpl_vars['photoitem']['p_id'];  echo '" class="link">';  echo $this->_tpl_vars['photoitem']['p_name'];  echo '</a></div><div style="float: left; width: 23%;">';  echo ((is_array($_tmp=$this->_tpl_vars['photoitem']['p_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['g_site_config']['dateformat']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['g_site_config']['dateformat']));  echo '</div><div style="float: left; width: 7%;">';  echo $this->_tpl_vars['photoitem']['p_view'];  echo '</div>';  if ($this->_tpl_vars['g_user']->m_user_access['SCRNDEL'] > 0):  echo '<div style="float: left; width: 60px;"><a href="gallery.php?fo=';  echo $_GET['fo'];  echo '&amp;delete=photo&amp;id=';  echo $this->_tpl_vars['photoitem']['p_id'];  echo '" class="link"><img src="theme/';  echo $this->_tpl_vars['g_theme_dir'];  echo '/gfx/delete.png" border="0" alt="';  echo $this->_tpl_vars['g_lang_misc_delete'];  echo '" /></a><a href="gallery.php?fo=';  echo $_GET['fo'];  echo '&amp;delete=photo&amp;id=';  echo $this->_tpl_vars['photoitem']['p_id'];  echo '" class="link">';  echo $this->_tpl_vars['g_lang_misc_delete'];  echo '</a></div>';  endif;  echo '</div>';  endif;  echo '';  endforeach; endif; unset($_from);  echo '';  endif;  echo ''; ?>

<?php endif; ?>

 
<?php if (! empty ( $this->_tpl_vars['m_folder_add'] ) || ! empty ( $this->_tpl_vars['m_folder_edit'] )): ?>
		<br />
		<form action="gallery.php?fo=<?php echo $_GET['fo']; ?>
" method="post"><input type="hidden" name="<?php if (! empty ( $this->_tpl_vars['m_folder_add'] )): ?>add<?php else: ?>edit<?php endif; ?>" value="folder" /><?php if (! empty ( $this->_tpl_vars['m_folder_edit'] )): ?><input type="hidden" name="id" value="<?php echo $this->_tpl_vars['m_folder_edit']['d_id']; ?>
" /><?php else: ?><input type="hidden" name="folder" value="<?php echo $_GET['fo']; ?>
" /><?php endif; ?>
	<div style="width: 200px !important; width:400px; padding-left: 200px;">
		<div style=" float:left; width: 100px;"><?php echo $this->_tpl_vars['g_lang_misc_name']; ?>
</div><div style="float:left; width:100px;"><input type="text" name="name" class="login" style="color: #000000;" maxlength="255" <?php if (! empty ( $this->_tpl_vars['m_folder_edit'] )): ?>value="<?php echo $this->_tpl_vars['m_folder_edit']['d_name']; ?>
"<?php endif; ?> /></div>
		<div style="float:left;width:100px;"><?php echo $this->_tpl_vars['g_lang_misc_make_public']; ?>
</div><div style="float:left; width:100px;"><input type="checkbox" name="public" value="1"<?php if (! empty ( $this->_tpl_vars['m_folder_edit'] ) && $this->_tpl_vars['m_folder_edit']['d_public'] > 0): ?> checked<?php endif; ?> /></div>
		<div style=""><?php echo $this->_tpl_vars['g_lang_misc_description']; ?>
</div>
		<div><textarea name="description"  class="textbox" style="color: #000000; width: 213px; height: 100px;" rows="50" cols="100"><?php if (! empty ( $this->_tpl_vars['m_folder_edit'] )):  echo $this->_tpl_vars['m_folder_edit']['d_desc'];  endif; ?></textarea></div>
		<div style=""><input type="submit" class="login" style="color: #000000;" value="<?php if (! empty ( $this->_tpl_vars['m_folder_add'] )):  echo $this->_tpl_vars['g_lang_folder_add'];  else:  echo $this->_tpl_vars['g_lang_folder_edit'];  endif; ?>" /></div>
	</div>
	</form>
<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['m_photo_add'] ) || ! empty ( $this->_tpl_vars['m_photo_edit'] )): ?>
		<br />
		<div style="width:616px;padding-left: 10px; padding-right:10px;"><fieldset><legend style="color: #ffffff;"><?php echo $this->_tpl_vars['g_lang_image_add']; ?>
</legend>
			<form action="gallery.php?fo=<?php echo $_GET['fo']; ?>
" enctype="multipart/form-data" method="post"><input type="hidden" name="<?php if (! empty ( $this->_tpl_vars['m_photo_add'] )): ?>add<?php else: ?>edit<?php endif; ?>" value="photo" /><?php if (! empty ( $this->_tpl_vars['m_photo_edit'] )): ?><input type="hidden" name="id" value="<?php echo $this->_tpl_vars['m_photo_edit']['g_id']; ?>
" /><?php else: ?><input type="hidden" name="folder" value="<?php echo $_GET['fo']; ?>
" /><?php endif; ?>
			
			<div style="padding-left: 100px;">	
				<div style="width: 150px; float:left;"><?php echo $this->_tpl_vars['g_lang_misc_name']; ?>
</div><div style="width: 300px;"><input type="text" maxlength="255" name="name" class="login" style="color: #000000; width: 150px;" /></div>
				<div style="width: 150px; float:left;"><?php echo $this->_tpl_vars['g_lang_misc_make_public']; ?>
</div><div style="width:300px;"><input type="checkbox" name="public" value="1" /></div>
				<div style="width: 150px; float:left; "><?php echo $this->_tpl_vars['g_lang_image_upload']; ?>
</div><div style="width: 300px;"><input type="file" class="login" style="color: #000000; width:150px;" name="image" /></div>
				<div style="width: 150px; float:left;"><?php echo $this->_tpl_vars['g_lang_user_url_image']; ?>
</div><div style="width:400px !important; width:300px; height: 30px;">http://<input type="text" name="weblink" class="login" maxlength="255" style="color: #000000; width: 150px;"/></div>
				<div style="width: 150px; float:left;"><?php echo $this->_tpl_vars['g_lang_misc_description']; ?>
</div><div style="width:400px !important; width:300px;"><textarea name="description" class="textbox" style="color: #000000; width: 213px; height: 100px;" rows="50" cols="100"></textarea></div>
				<div><input type="submit" value="<?php echo $this->_tpl_vars['g_lang_image_add']; ?>
" class="login" style="color: #000000;" /></div>
			</div>
			</form>
		</fieldset></div>
<?php endif; ?>