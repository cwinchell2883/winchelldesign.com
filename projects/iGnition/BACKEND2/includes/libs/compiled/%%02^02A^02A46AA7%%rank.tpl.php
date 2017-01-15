<?php /* Smarty version 2.6.14, created on 2010-07-16 11:14:47
         compiled from rank.tpl */ ?>
<div class="title"><?php echo $this->_tpl_vars['g_lang_ranks']; ?>
</div>

<?php if (! empty ( $this->_tpl_vars['m_rank_list'] )): ?>
	<br />
	<?php if ($this->_tpl_vars['g_user']->m_user_access['RANKADD'] > 0): ?>
		<div style="text-align:right; padding-right:30px;">
				<br /><a href="ranks.php?add=rank" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/add.png" border="0" alt="<?php echo $this->_tpl_vars['g_lang_rank_add']; ?>
" /></a><a href="ranks.php?add=rank" class="link"><?php echo $this->_tpl_vars['g_lang_rank_add']; ?>
</a>
		</div>
	<?php endif; ?>
	<div style="padding-left: 110px; height: 25px;">
		<div style="float: left; width: 25px;">&nbsp;&nbsp;&nbsp;</div>
		<div style="float: left; width: 200px;; padding-left:5px;"><?php echo $this->_tpl_vars['g_lang_misc_name']; ?>
</div>
		<div style="float: left; width: 100px;"><?php echo $this->_tpl_vars['g_lang_rank_total_users']; ?>
</div>
	</div>
	<?php $_from = $this->_tpl_vars['m_rank_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ranklist'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ranklist']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ranks']):
        $this->_foreach['ranklist']['iteration']++;
?> 
		<div style="padding-left: 110px; height: 25px;">
			<div style="float: left; width: 25px;"><?php if (! empty ( $this->_tpl_vars['ranks']['r_img'] ) || $this->_tpl_vars['ranks']['r_img'] != NULL): ?><img src="<?php echo $this->_tpl_vars['ranks']['r_img']; ?>
" alt="" style="width:25px; height:25px;" /><?php else: ?>&nbsp;&nbsp;&nbsp;<?php endif; ?></div>
			<div style="float: left; width: 200px; padding-left: 5px;"><?php echo $this->_tpl_vars['ranks']['r_name']; ?>
</div>
			<div style="float: left; width: 100px;"><?php echo $this->_tpl_vars['ranks']['totalusers']; ?>
</div>
			<?php if ($this->_tpl_vars['g_user']->m_user_access['RANKEDIT'] > 0): ?>
				<div style="float: left; width:50px;"><a href="ranks.php?edit=<?php echo $this->_tpl_vars['ranks']['r_id']; ?>
" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/edit.png" alt="<?php echo $this->_tpl_vars['g_lang_misc_edit']; ?>
" border="0" /></a><a href="ranks.php?edit=<?php echo $this->_tpl_vars['ranks']['r_id']; ?>
" class="link"><?php echo $this->_tpl_vars['g_lang_misc_edit']; ?>
</a></div>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['g_user']->m_user_access['RANKDEL'] > 0): ?>
				<div style="float: left; width:60px;"><a href="ranks.php?delete=<?php echo $this->_tpl_vars['ranks']['r_id']; ?>
" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/delete.png" alt="<?php echo $this->_tpl_vars['g_lang_misc_delete']; ?>
" border="0" /></a><a href="ranks.php?delete=<?php echo $this->_tpl_vars['ranks']['r_id']; ?>
" class="link"><?php echo $this->_tpl_vars['g_lang_misc_delete']; ?>
</a></div>
			<?php endif; ?>
		</div>
	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['m_rank_add'] ) && $this->_tpl_vars['g_user']->m_user_access['RANKADD'] > 0 || ! empty ( $this->_tpl_vars['m_rank_edit'] ) && $this->_tpl_vars['g_user']->m_user_access['RANKEDIT'] > 0): ?>
	<div style="width:516px; text-align:center;">
	<form enctype="multipart/form-data" action="ranks.php" method="post">
		<br /><?php if (! empty ( $this->_tpl_vars['m_rank_edit'] )): ?><input type="hidden" name="edit" value="<?php echo $_GET['edit']; ?>
" /><?php else: ?><input type="hidden" name="add" value="1" /><?php endif; ?>
		<div style="padding-left:100px; width:400px; height: 40px; text-align:left;">
			<div style="float: left; width: 200px;"> <?php echo $this->_tpl_vars['g_lang_misc_name']; ?>
  </div><div style="float:left; width:200px;"><input type="text" name="name" class="login" style="width:150px; color:#000000;" maxlength="255" <?php if (! empty ( $this->_tpl_vars['m_rank_edit'] )): ?>value="<?php echo $this->_tpl_vars['m_rank_edit']['r_name']; ?>
"<?php endif; ?> /></div>	
			<div style="float:left; width:200px;"> <?php echo $this->_tpl_vars['g_lang_image_upload']; ?>
 </div><div style="float:left; width:200px;"><input type="file" name="image" class="login" style="width:150px; color:#000000;" /></div>
			<div style="float:left; width:200px;"> <?php echo $this->_tpl_vars['g_lang_user_url_image']; ?>
</div><div style="float:left;width:200px;"><?php if (! empty ( $this->_tpl_vars['m_rank_add'] )): ?>http://<?php endif; ?><input type="text" name="weblink" class="login" style="width:150px; color:#000000;" maxlength="255" value="<?php echo $this->_tpl_vars['m_rank_edit']['r_img']; ?>
" /></div>
		</div>
		<div style="padding-top: 50px !important; padding-top:20px; padding-left:100px; width:400px !important; width:500px;"><fieldset><legend style="color: #ffffff;"><?php echo $this->_tpl_vars['g_lang_rank_select']; ?>
</legend><br />
			<div style="height: 15px;">
				<div style="float:left; width:150px;"><?php echo $this->_tpl_vars['g_lang_rank_module_name']; ?>
</div>
				<div style="float:left; width:30px;"><?php echo $this->_tpl_vars['g_lang_misc_view']; ?>
</div>
				<div style="float:left; width:30px;"><?php echo $this->_tpl_vars['g_lang_misc_add']; ?>
</div>
				<div style="float:left; width:30px;"><?php echo $this->_tpl_vars['g_lang_misc_edit']; ?>
</div>
				<div style="float:left; width:30px;"><?php echo $this->_tpl_vars['g_lang_misc_delete']; ?>
</div>
				<div style="float:left; padding-left: 30px; width: 50px;"><?php echo $this->_tpl_vars['g_lang_misc_status']; ?>
</div>
			</div><br /><?php echo '';  $_from = $this->_tpl_vars['m_rank_vars']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['modulelist'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['modulelist']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['module']):
        $this->_foreach['modulelist']['iteration']++;
 echo '';  if ($this->_tpl_vars['moduleId'] != $this->_tpl_vars['module']['m_id']):  echo '';  echo '';  if (! empty ( $this->_tpl_vars['moduleId'] )):  echo '';  unset($this->_sections['skip']);
$this->_sections['skip']['name'] = 'skip';
$this->_sections['skip']['start'] = (int)$this->_tpl_vars['varType'];
$this->_sections['skip']['loop'] = is_array($_loop="4-".($this->_tpl_vars['varType'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['skip']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['skip']['show'] = true;
$this->_sections['skip']['max'] = $this->_sections['skip']['loop'];
if ($this->_sections['skip']['start'] < 0)
    $this->_sections['skip']['start'] = max($this->_sections['skip']['step'] > 0 ? 0 : -1, $this->_sections['skip']['loop'] + $this->_sections['skip']['start']);
else
    $this->_sections['skip']['start'] = min($this->_sections['skip']['start'], $this->_sections['skip']['step'] > 0 ? $this->_sections['skip']['loop'] : $this->_sections['skip']['loop']-1);
if ($this->_sections['skip']['show']) {
    $this->_sections['skip']['total'] = min(ceil(($this->_sections['skip']['step'] > 0 ? $this->_sections['skip']['loop'] - $this->_sections['skip']['start'] : $this->_sections['skip']['start']+1)/abs($this->_sections['skip']['step'])), $this->_sections['skip']['max']);
    if ($this->_sections['skip']['total'] == 0)
        $this->_sections['skip']['show'] = false;
} else
    $this->_sections['skip']['total'] = 0;
if ($this->_sections['skip']['show']):

            for ($this->_sections['skip']['index'] = $this->_sections['skip']['start'], $this->_sections['skip']['iteration'] = 1;
                 $this->_sections['skip']['iteration'] <= $this->_sections['skip']['total'];
                 $this->_sections['skip']['index'] += $this->_sections['skip']['step'], $this->_sections['skip']['iteration']++):
$this->_sections['skip']['rownum'] = $this->_sections['skip']['iteration'];
$this->_sections['skip']['index_prev'] = $this->_sections['skip']['index'] - $this->_sections['skip']['step'];
$this->_sections['skip']['index_next'] = $this->_sections['skip']['index'] + $this->_sections['skip']['step'];
$this->_sections['skip']['first']      = ($this->_sections['skip']['iteration'] == 1);
$this->_sections['skip']['last']       = ($this->_sections['skip']['iteration'] == $this->_sections['skip']['total']);
 echo '<div style="float:left; width:30px;">&nbsp;</div>';  endfor; endif;  echo '<div style="float:left; padding-left: 30px; width: 50px;">';  if ($this->_tpl_vars['lastmodule']['m_status'] > 0):  echo '';  echo $this->_tpl_vars['g_lang_misc_enabled'];  echo '';  else:  echo '';  echo $this->_tpl_vars['g_lang_misc_disabled'];  echo '';  endif;  echo '</div></div><br />';  echo '';  endif;  echo '';  echo '';  $this->assign('moduleId', $this->_tpl_vars['module']['m_id']);  echo '';  $this->assign('varType', 0);  echo '<div style="height: 6px;"> ';  echo '<div style="float:left; width: 150px;">';  echo $this->_tpl_vars['module']['m_name'];  echo '</div>';  endif;  echo '';  if ($this->_tpl_vars['module']['v_type'] != $this->_tpl_vars['varType']):  echo '';  unset($this->_sections['skip']);
$this->_sections['skip']['name'] = 'skip';
$this->_sections['skip']['start'] = (int)$this->_tpl_vars['varType'];
$this->_sections['skip']['loop'] = is_array($_loop=$this->_tpl_vars['module']['v_type']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['skip']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['skip']['show'] = true;
$this->_sections['skip']['max'] = $this->_sections['skip']['loop'];
if ($this->_sections['skip']['start'] < 0)
    $this->_sections['skip']['start'] = max($this->_sections['skip']['step'] > 0 ? 0 : -1, $this->_sections['skip']['loop'] + $this->_sections['skip']['start']);
else
    $this->_sections['skip']['start'] = min($this->_sections['skip']['start'], $this->_sections['skip']['step'] > 0 ? $this->_sections['skip']['loop'] : $this->_sections['skip']['loop']-1);
if ($this->_sections['skip']['show']) {
    $this->_sections['skip']['total'] = min(ceil(($this->_sections['skip']['step'] > 0 ? $this->_sections['skip']['loop'] - $this->_sections['skip']['start'] : $this->_sections['skip']['start']+1)/abs($this->_sections['skip']['step'])), $this->_sections['skip']['max']);
    if ($this->_sections['skip']['total'] == 0)
        $this->_sections['skip']['show'] = false;
} else
    $this->_sections['skip']['total'] = 0;
if ($this->_sections['skip']['show']):

            for ($this->_sections['skip']['index'] = $this->_sections['skip']['start'], $this->_sections['skip']['iteration'] = 1;
                 $this->_sections['skip']['iteration'] <= $this->_sections['skip']['total'];
                 $this->_sections['skip']['index'] += $this->_sections['skip']['step'], $this->_sections['skip']['iteration']++):
$this->_sections['skip']['rownum'] = $this->_sections['skip']['iteration'];
$this->_sections['skip']['index_prev'] = $this->_sections['skip']['index'] - $this->_sections['skip']['step'];
$this->_sections['skip']['index_next'] = $this->_sections['skip']['index'] + $this->_sections['skip']['step'];
$this->_sections['skip']['first']      = ($this->_sections['skip']['iteration'] == 1);
$this->_sections['skip']['last']       = ($this->_sections['skip']['iteration'] == $this->_sections['skip']['total']);
 echo '<div style="float:left; width:30px;">&nbsp;</div>';  endfor; endif;  echo '';  endif;  echo '<div style="float:left; width:30px;"><input type="checkbox" name="module[';  echo $this->_tpl_vars['module']['v_id'];  echo ']" value="1" ';  if (! empty ( $this->_tpl_vars['m_rank_edit'] ) && $this->_tpl_vars['m_rank_edit']['vars'][$this->_tpl_vars['module']['v_id']]['r_value'] > 0):  echo 'checked="checked"';  endif;  echo ' /></div>';  $this->assign('varType', $this->_tpl_vars['module']['v_type']+1);  echo '';  $this->assign('lastmodule', $this->_tpl_vars['module']);  echo '';  endforeach; endif; unset($_from);  echo ''; ?>
				
				<div style="float:left; padding-left: 30px; width: 50px;"><?php if ($this->_tpl_vars['lastmodule']['m_status'] > 0):  echo $this->_tpl_vars['g_lang_misc_enabled'];  else:  echo $this->_tpl_vars['g_lang_misc_disabled'];  endif; ?></div>
				</div> 				<br /><br />
		</fieldset></div>
		<br />
		<div style="width: 500px; text-align:center;"><input type="submit" class="login" style="color:#000000;" value="<?php if (! empty ( $this->_tpl_vars['m_rank_add'] )):  echo $this->_tpl_vars['g_lang_rank_add'];  else:  echo $this->_tpl_vars['g_lang_rank_edit'];  endif; ?>" /></div>
	</form>
	</div><br /><br />
<?php endif; ?>