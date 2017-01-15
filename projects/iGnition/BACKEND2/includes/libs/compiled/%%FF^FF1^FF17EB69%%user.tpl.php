<?php /* Smarty version 2.6.14, created on 2010-07-16 11:13:07
         compiled from user.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'user.tpl', 42, false),array('modifier', 'date_format', 'user.tpl', 48, false),array('modifier', 'nl2br', 'user.tpl', 117, false),array('function', 'mailto', 'user.tpl', 93, false),)), $this); ?>


<?php if (! empty ( $this->_tpl_vars['m_user_list'] )): ?>
		<?php if ($this->_tpl_vars['g_user']->m_user_access['USERADD']): ?>
			<br /><br />
			<div style="width:560px !important; width: 636px; text-align:right; padding-left: 40px; padding-right: 40px;"><a href="users.php?add=1"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/add.png" alt="<?php echo $this->_tpl_vars['g_lang_user_add']; ?>
" border="0" /></a><a href="users.php?add=1" class="link"><?php echo $this->_tpl_vars['g_lang_user_add']; ?>
</a></div>
		<?php endif; ?>
<?php $_from = $this->_tpl_vars['m_user_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user']):
?> 
	 	<?php if ($this->_tpl_vars['user']['r_name'] != $this->_tpl_vars['r_name2']): ?>
	 			<br />
				<div style="width:586px !important; width: 616px; padding-left: 20px; padding-right: 20px; padding-top: 10px;">
						<fieldset><div style="float:left; padding-top:18px; padding-left: 240px; padding-bottom:18px;"><?php echo $this->_tpl_vars['user']['r_name']; ?>
</div><?php if (! empty ( $this->_tpl_vars['user']['r_img'] ) || $this->_tpl_vars['user']['r_img'] != NULL): ?><div style="float:right;"><img src="<?php echo $this->_tpl_vars['user']['r_img']; ?>
" alt="" style="width:50px; height:50px;" /></div><?php endif; ?></fieldset>
				</div>
				<div style="text-align:center; width:586px !important; width: 616px; padding-left: 20px; padding-right: 20px;">
					<div style="float: left; width: 20%; padding-left:40px;">
							<b><?php echo $this->_tpl_vars['g_lang_misc_name']; ?>
</b>
					</div>
					<div style="float: left; width: 15%;">
							<b><?php echo $this->_tpl_vars['g_lang_misc_location']; ?>
</b>
					</div>
					<div style="float: left; width: 25%;">
							<b><?php echo $this->_tpl_vars['g_lang_misc_joindate']; ?>
</b>
					</div>
					<div style="float: left; width: 10%;">
							<b><?php echo $this->_tpl_vars['g_lang_misc_status']; ?>
</b>
					</div>
				</div><br />
				<?php $this->assign('r_name2', $this->_tpl_vars['user']['r_name']); ?>
		<?php endif; ?>
						<div style="text-align:center; width:586px !important; width: 616px; padding-left: 20px; padding-right: 20px; height: 17px;">
								<div style="float: left; width: 20%; padding-left:40px; height: 17px;">
											<a href="users.php?user=<?php echo $this->_tpl_vars['user']['u_id']; ?>
" class="link"><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['u_name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 18, "...", true) : smarty_modifier_truncate($_tmp, 18, "...", true)); ?>
</a>
								</div>
								<div style="float: left; width: 15%; height: 17px;">
											&nbsp;<?php echo $this->_tpl_vars['user']['u_location']; ?>

								</div>
								<div style="float: left; width: 25%; height: 17px;">
											<?php echo ((is_array($_tmp=$this->_tpl_vars['user']['u_join'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['g_site_config']['dateformat']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['g_site_config']['dateformat'])); ?>

								</div>
								<div style="float: left; width: 10%; height: 17px;">
											<?php if ($this->_tpl_vars['user']['u_logtime'] > ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%m:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%m:%S"))): ?>
												<?php echo $this->_tpl_vars['g_lang_misc_online']; ?>

											<?php else: ?>
												<?php echo $this->_tpl_vars['g_lang_misc_offline']; ?>

											<?php endif; ?>
								</div>
								<?php if ($this->_tpl_vars['g_user']->m_user_access['USEREDIT'] && $this->_tpl_vars['g_user']->m_user_rank_sort < $this->_tpl_vars['user']['r_sort']): ?>
									<div style="float: left; width: 7%;height: 17px;">
										<a href="users.php?edit=<?php echo $this->_tpl_vars['user']['u_id']; ?>
"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/edit.png" alt="edit" border="0" /></a><a href="users.php?edit=<?php echo $this->_tpl_vars['user']['u_id']; ?>
" class="link"><?php echo $this->_tpl_vars['g_lang_misc_edit']; ?>
</a>
									</div>
								<?php endif; ?>
								<?php if ($this->_tpl_vars['g_user']->m_user_access['USERDEL'] && $this->_tpl_vars['g_user']->m_user_rank_sort < $this->_tpl_vars['user']['r_sort']): ?>
									<div style="float: left; width: 10%; height: 17px;">
										<a href="users.php?delete=<?php echo $this->_tpl_vars['user']['u_id']; ?>
"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/delete.png" alt="edit" border="0" /></a><a href="users.php?delete=<?php echo $this->_tpl_vars['user']['u_id']; ?>
" class="link"><?php echo $this->_tpl_vars['g_lang_misc_delete']; ?>
</a>
									</div>
								<?php endif; ?>	
						</div>
	<?php endforeach; endif; unset($_from); ?><br /><br />
<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['m_user_bio'] )): ?>
			<div style="float: left; width: 131px; height: 131px; text-align:center;"><fieldset><legend style="color:#ffffff;"><?php echo $this->_tpl_vars['g_lang_misc_user_pic']; ?>
</legend>
				<img src="<?php echo $this->_tpl_vars['m_user_bio']['u_pic']; ?>
" border="0" alt="<?php echo $this->_tpl_vars['g_lang_misc_user_pic']; ?>
" style="width:100px; height:100px;" />
			</fieldset>
			</div>

			<div style="float: left; width: 400px; height: 131px; padding-left: 20px;"><fieldset><legend style="color:#ffffff;"><?php echo $this->_tpl_vars['g_lang_misc_details']; ?>
</legend>
				<div style="float: left; width: 150px;"><?php echo $this->_tpl_vars['g_lang_misc_alias']; ?>
</div>
				<div style="float: left; width: 200px;"><?php echo $this->_tpl_vars['m_user_bio']['u_name']; ?>
</div>
	
				<div style="float: left; width: 150px;"><?php echo $this->_tpl_vars['g_lang_misc_joined']; ?>
</div>
				<div style="float: left; width: 200px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['m_user_bio']['u_join'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['g_site_config']['dateformat']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['g_site_config']['dateformat'])); ?>
</div>
				
				<div style="float: left; width: 150px;"><?php echo $this->_tpl_vars['g_lang_misc_email']; ?>
</div>
				<div style="float: left; width: 200px;">

												<?php if ($this->_tpl_vars['m_user_bio']['u_showemail'] == 1 && empty ( $this->_tpl_vars['g_user']->m_user_id )): ?>
														<?php echo $this->_tpl_vars['g_lang_email_hidden']; ?>

						<?php else: ?>
							<?php echo smarty_function_mailto(array('address' => $this->_tpl_vars['m_user_bio']['u_email'],'encode' => 'hex','extra' => 'class="link"'), $this);?>

						<?php endif; ?>
				</div>
				
				<?php if (! empty ( $this->_tpl_vars['m_user_bio']['u_location'] )): ?>
					<div style="float: left; width: 150px;"><?php echo $this->_tpl_vars['g_lang_misc_location']; ?>
</div>
					<div style="float: left; width: 200px;"><?php echo $this->_tpl_vars['m_user_bio']['u_location']; ?>
</div>
				<?php endif; ?>

				<?php if (! empty ( $this->_tpl_vars['m_user_bio']['u_website'] )): ?>
					<div style="float: left; width: 150px;"><?php echo $this->_tpl_vars['g_lang_misc_fav_site']; ?>
</div>
					<div style="float: left; width: 200px;"><a href="http://<?php echo $this->_tpl_vars['m_user_bio']['u_website']; ?>
" target="_blank" class="link"><?php echo $this->_tpl_vars['m_user_bio']['u_website']; ?>
</a></div>
				<?php endif; ?>
				<?php if (! empty ( $this->_tpl_vars['m_user_bio']['u_xfire'] )): ?>
					<div style="float: left; width: 150px;"><a href="http://www.xfire.com" target="_blank" class="link">Xfire</a></div>
					<div style="float: left; width: 200px;"><?php echo $this->_tpl_vars['m_user_bio']['u_xfire']; ?>
</div>
				<?php endif; ?>
				<?php if (! empty ( $this->_tpl_vars['m_user_bio']['u_msn'] )): ?>
					<div style="float: left; width: 150px;">MSN</div>
					<div style="float: left; width: 200px;"><?php echo smarty_function_mailto(array('address' => $this->_tpl_vars['m_user_bio']['u_msn'],'encode' => 'hex','extra' => 'class="link"'), $this);?>
</div>
				<?php endif; ?>
				</fieldset></div>
				<?php if (! empty ( $this->_tpl_vars['m_user_bio']['u_interests'] )): ?>
					<div style="text-align:center; padding-top: 20px; width: 500px;"><?php echo $this->_tpl_vars['g_lang_misc_interests']; ?>
</div>
					<div style="padding-left: 40px;padding-bottom: 50px; width: 500px; padding-right:20px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['m_user_bio']['u_interests'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</div>
				<?php endif; ?>
			
 <?php endif; ?>


<?php if (! empty ( $this->_tpl_vars['m_user_add'] )): ?>
		<br /><div style="width: 516px; padding-left:40px;"><p><?php echo $this->_tpl_vars['g_lang_user_add_desc']; ?>
</p></div><br /><br />
		<form action="users.php" method="post"><input type="hidden" name="add" value="1" />
		<div style="width:300px !important; width:500px; padding-left: 180px; padding-right: 30px; height: 140px;">
					<div style="float:left; width:100px;"><?php echo $this->_tpl_vars['g_lang_misc_name']; ?>
</div><div style="float:left; width:200px;"><input type="text" name="name" size="25" maxlength="255" class="login" style="color:#000000; width:150px;" /></div>
					<div style="float:left; width:100px; height: 20px;"><?php echo $this->_tpl_vars['g_lang_misc_email']; ?>
</div><div style="float:left; height: 20px; width:200px;"><input type="text" name="email" size="25" maxlength="255" class="login" style="color:#000000; width:150px;" /></div>
					<div style="float:left; text-align:right; width:100px;"><input type="checkbox" name="send" value="1" /></div><div style="float:left; width:200px;"><?php echo $this->_tpl_vars['g_lang_pass_email']; ?>
</div>
					<div style="float:left; width:300px; text-align:center;"><input type="submit" value="<?php echo $this->_tpl_vars['g_lang_misc_add']; ?>
" class="login" style="color:#000000;" /></div>
		</div>			
		</form>
<?php endif; ?>


<?php if (! empty ( $this->_tpl_vars['m_user_edit'] )): ?><br /><br />
	<div style="padding-left:40px; padding-right:30px; float: left;"><?php echo $this->_tpl_vars['g_lang_misc_name']; ?>
: <?php echo $this->_tpl_vars['m_user_edit']['u_name']; ?>
<br />
		<?php echo $this->_tpl_vars['g_lang_misc_joindate']; ?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['m_user_edit']['u_join'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
<br />
		<?php echo $this->_tpl_vars['g_lang_misc_email']; ?>
: <?php echo $this->_tpl_vars['m_user_edit']['u_email']; ?>
<br />
		<?php echo $this->_tpl_vars['g_lang_misc_last_online']; ?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['m_user_edit']['u_logtime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
<br />
	</div><?php echo '<div style="width:550px !important; width: 350px;"><fieldset style="width: 300px;"><legend style="color:#ffffff;">';  echo $this->_tpl_vars['g_lang_misc_options'];  echo '</legend>';  echo '<form action="users.php" method="post"><input type="hidden" name="newpass" value="';  echo $_GET['edit'];  echo '" /><div style="float:left; width: 200px;"><input type="checkbox" name="email" value="1" /> ';  echo $this->_tpl_vars['g_lang_pass_email'];  echo '</div><div style="width: 300px !important; width: 100px;"><input type="submit" value="';  echo $this->_tpl_vars['g_lang_user_newpass'];  echo '" style="color:#000000;" class="login" /></div></form>';  echo '<form action="users.php" method="post"><input type="hidden" name="changerank" value="';  echo $_GET['edit'];  echo '"  /><div style="float: left; width:200px;"><select name="rank" class="login" style="color:#000000;">';  $_from = $this->_tpl_vars['m_user_edit_rank']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['rank']):
 echo '';  if (! empty ( $this->_tpl_vars['rank']['r_name'] ) && ! empty ( $this->_tpl_vars['rank']['r_id'] )):  echo '<option value="';  echo $this->_tpl_vars['rank']['r_id'];  echo '" >';  echo $this->_tpl_vars['rank']['r_name'];  echo '</option>';  endif;  echo '';  endforeach; endif; unset($_from);  echo '</select></div><div style="width: 300px !important; width: 100px;"><input type="submit" value="';  echo $this->_tpl_vars['g_lang_rank_change'];  echo '" style="color:#000000;"  class="login" /></div></form></fieldset></div>'; ?>

<?php endif; ?>



<?php if ($this->_tpl_vars['m_panel_select'] == 'userbio'): ?>
	<form action="users.php" method="post" name="userbio" enctype="multipart/form-data"><input type="hidden" name="userbio" value="change" />
	<div style="width:616px; padding-left: 10px; padding-right:10px;"><fieldset><legend style="color:#ffffff;"><?php echo $this->_tpl_vars['g_lang_user_bio_details']; ?>
</legend>
		<div style="float:left; width: 200px;"><?php echo $this->_tpl_vars['g_lang_user_dob']; ?>
</div><div style="width:300px !important; width:350px;"><?php echo '
					<script language="JavaScript" type="text/javascript">
					<!--		
						var GC_SET_0 = {
							\'appearance\': GC_APPEARANCE,
							\'dataArea\':\'birthdate\',
							\'dateFormat\' : \'d-m-Y\' 
						}
						new gCalendar(GC_SET_0);
						document.forms[\'userbio\'].elements[\'birthdate\'].value = \'';  if (empty ( $this->_tpl_vars['m_user']['u_dob'] )):  echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%m-%Y") : smarty_modifier_date_format($_tmp, "%d-%m-%Y"));  else:  echo ((is_array($_tmp=$this->_tpl_vars['m_user']['u_dob'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%m-%Y") : smarty_modifier_date_format($_tmp, "%d-%m-%Y"));  endif;  echo '\'; 
					//-->
					</script>'; ?>

		</div>
		<div style="float:left; width:200px;"><?php echo $this->_tpl_vars['g_lang_misc_email']; ?>
</div><div style="width:400px !important; width:350px;"><input type="text" name="email"  class="login" style="color: #000000; width: 200px;" maxlength="255" value="<?php echo $this->_tpl_vars['m_user']['u_email']; ?>
" /></div>
		<div style="float:left; width:200px;"><?php echo $this->_tpl_vars['g_lang_misc_location']; ?>
</div><div style="width:400px !important; width:350px;"><input type="text" name="location" class="login" style="color: #000000; width: 200px;" maxlength="255" value="<?php echo $this->_tpl_vars['m_user']['u_location']; ?>
" /></div>
		<div style="float:left; width:200px;"><?php echo $this->_tpl_vars['g_lang_user_website']; ?>
</div><div style="width:400px !important; width:350px;"><input type="text" name="website"  class="login" style="color: #000000; width: 200px;" maxlength="255" value="<?php echo $this->_tpl_vars['m_user']['u_website']; ?>
" /></div>
		<div style="float:left; width:200px;"><a href="http://www.xfire.com" target="_blank" class="link">Xfire</a></div><div style="width:400px !important; width:350px;"><input type="text" name="xfire"  class="login" style="color: #000000; width: 200px;" maxlength="255" value="<?php echo $this->_tpl_vars['m_user']['u_xfire']; ?>
" /></div>
		<div style="float:left; width:200px;">MSN</div><div style="width:400px !important; width:350px;"><input type="text" name="msn"  class="login" style="color: #000000; width: 200px;" maxlength="255" value="<?php echo $this->_tpl_vars['m_user']['u_msn']; ?>
" /></div>
		<div style="float:left; width:200px;"><?php echo $this->_tpl_vars['g_lang_user_hidemail']; ?>
</div><div style="width:400px !important; width:350px;"><?php echo $this->_tpl_vars['g_lang_misc_yes']; ?>
 <input type="radio" name="hideemail" value="1" <?php if ($this->_tpl_vars['m_user']['u_showemail'] == '1'): ?>checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['g_lang_misc_no']; ?>
 <input type="radio" name="hideemail" value="0" <?php if ($this->_tpl_vars['m_user']['u_showemail'] == 0): ?>checked="checked"<?php endif; ?> /></div>
		<br /><div style="float:left; width:200px;"><?php echo $this->_tpl_vars['g_lang_user_sitechat']; ?>
</div><div style="width:400px !important; width:350px;"><?php echo $this->_tpl_vars['g_lang_misc_yes']; ?>
 <input type="radio" name="hidetime" value="1" <?php if ($this->_tpl_vars['m_user']['u_showtime'] == '1'): ?>checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['g_lang_misc_no']; ?>
 <input type="radio" name="hidetime" value="0" <?php if ($this->_tpl_vars['m_user']['u_showtime'] == 0): ?>checked="checked"<?php endif; ?> /></div>
		<div style="float:left; width:200px;"><?php echo $this->_tpl_vars['g_lang_user_description']; ?>
</div><div style="float:left;width:200px !important; width:350px;"><textarea name="interests" class="textbox" style="color: #000000; width:300px; height: 200px;" rows="50" cols="100" ><?php echo $this->_tpl_vars['m_user']['u_interests']; ?>
</textarea></div>
	</fieldset></div>
	<div style="width:616px; padding-left: 10px; padding-right:10px;"><fieldset>
<legend style="color:#ffffff;"><?php echo $this->_tpl_vars['g_lang_user_picture']; ?>
</legend>
		<div style="float:left; width:300px;"><?php echo $this->_tpl_vars['g_lang_user_choosepic']; ?>
</div><div style="float:left; width:200px;"><select name="picgal" class="login" style="height:auto; color: #000000;"><?php echo '';  $_from = $this->_tpl_vars['m_user']['files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['file']):
 echo '<option ';  if ($this->_tpl_vars['m_user']['u_galpic'] == $this->_tpl_vars['file']):  echo 'selected="selected"';  endif;  echo ' value="';  echo $this->_tpl_vars['file'];  echo '" onclick="document.forms[\'userbio\'].elements[\'picurl\'].value = \'\';">';  echo $this->_tpl_vars['file'];  echo '</option>';  endforeach; endif; unset($_from);  echo '</select>'; ?>
</div>
		<div style="width:300px; float:left;"><?php echo $this->_tpl_vars['g_lang_user_url_image']; ?>
</div><div style="float:left; width:200px; "><input type="text" class="login" style="color: #000000; width: 150px;" maxlength="255" name="picurl" <?php if (empty ( $this->_tpl_vars['m_user']['u_galpic'] )): ?>value="<?php echo $this->_tpl_vars['m_user']['u_pic']; ?>
"<?php endif; ?> /></div>
		<div style="width:300px; float:left;"><?php echo $this->_tpl_vars['g_lang_user_upload']; ?>

</div><div style="float:left; width:200px;"><input type="file" name="picupload" class="login" style="color:#000000; width:200px;" /></div>
	</fieldset></div>
	<div style="padding-top: 10px; padding-left: 500px;"><input type="submit" name="submit" value="<?php echo $this->_tpl_vars['g_lang_misc_update']; ?>
" class="login" style="color:#000000;" /><br /><br /></div>
	</form>
<?php endif; ?>


<?php if ($this->_tpl_vars['m_panel_select'] == 'userpass'): ?>
	<form action="users.php" method="post">
<input type="hidden" name="changepass" value="1" />
	<p style="padding: 10px;"><?php echo $this->_tpl_vars['g_lang_pass_description']; ?>
</p>
	<br />
	<div style="width:400px; padding-left: 10px; padding-right:10px;">
		<div style="float:left; width:200px !important; width: 190px;"><?php echo $this->_tpl_vars['g_lang_user_oldpass']; ?>
</div><div style="float:left; width:200px;"><input type="password" name="oldpass" maxlength="50" class="login" style="width:200px; color:#000000;" /></div>
		<div style="float:left; width:200px !important; width: 190px;"><?php echo $this->_tpl_vars['g_lang_user_newpass']; ?>
</div><div style="float:left; width:200px;"><input type="password" name="newpass" maxlength="50" class="login" style="width:200px; color:#000000;" /></div>
		
		<div style="float:left; width:200px !important; width: 190px;"><?php echo $this->_tpl_vars['g_lang_user_confirmpass']; ?>
</div><div style="float:left; width:200px;"><input type="password" name="newpass2" maxlength="50" class="login" style="width:200px; color:#000000;" /></div>
		<div style="padding-left: 200px; padding-top: 50px;"><input type="submit" value="<?php echo $this->_tpl_vars['g_lang_user_changepass']; ?>
" class="login" style="width:auto; color:#000000;" /></div>
	</div>
	</form>
<?php endif; ?>