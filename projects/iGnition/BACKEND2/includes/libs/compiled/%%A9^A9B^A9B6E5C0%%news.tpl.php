<?php /* Smarty version 2.6.14, created on 2010-07-16 11:12:54
         compiled from news.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nl2br', 'news.tpl', 22, false),array('modifier', 'date_format', 'news.tpl', 25, false),array('modifier', 'truncate', 'news.tpl', 50, false),)), $this); ?>
<div class="title">
	<?php echo $this->_tpl_vars['g_lang_news']; ?>

</div>
				<?php if (! empty ( $this->_tpl_vars['m_news_headline'] ) && ( $this->_tpl_vars['m_news_headline'] != 'NULL' && $this->_tpl_vars['m_news_headline'] != NULL )): ?><div style="height:5px;">&nbsp;</div>
					<?php $_from = $this->_tpl_vars['m_news_headline']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['newsitem']):
?> 
							<?php echo '<div class="content_box_top"></div><div class="content_box"><h3>';  echo $this->_tpl_vars['newsitem']['n_title'];  echo '</h3><hr style="border-style: dotted;" />';  echo ((is_array($_tmp=$this->_tpl_vars['newsitem']['n_text'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp));  echo '<hr style="border-style: dotted;" /><div style="float:left; width: 55px; height: 50px;"><a href="users.php?user=';  echo $this->_tpl_vars['newsitem']['u_id'];  echo '" class="link"><img src="';  echo $this->_tpl_vars['newsitem']['u_pic'];  echo '" style="height: 50px; width:50px; border:0px;" alt="" /></a></div><div style="width:auto; height: 35px; padding-top: 10px;">';  echo $this->_tpl_vars['g_lang_postedby'];  echo ': <a href="users.php?user=';  echo $this->_tpl_vars['newsitem']['u_id'];  echo '" class="link"> ';  echo $this->_tpl_vars['newsitem']['u_name'];  echo '</a><br />';  echo $this->_tpl_vars['g_lang_misc_date'];  echo ': ';  echo ((is_array($_tmp=$this->_tpl_vars['newsitem']['n_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['g_site_config']['dateformat']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['g_site_config']['dateformat']));  echo '</div></div><div class="content_box_bottom"></div>'; ?>

					<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
					
							<?php if (! empty ( $this->_tpl_vars['m_news_list'] )): ?>
							<br />
							<div style="width: auto !important; width: 616px; padding-right:30px; padding-left: 30px;">
									<?php if ($this->_tpl_vars['g_user']->m_user_access['NEWSADD'] > 0): ?>
										<div style="text-align:right; height: 17px;">
											<a href="news.php?news=add" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/add.png" border="0" alt="add" /></a><a href="news.php?news=add" class="link"><?php echo $this->_tpl_vars['g_lang_news_add']; ?>
</a> <br /><br />
										</div>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['m_news_list'] != 'NULL' && $this->_tpl_vars['m_news_list'] != NULL): ?>
										<div style="height:20px;">
											<div style="float: left; width: 220px !important; width: 220px;"><?php echo $this->_tpl_vars['g_lang_misc_name']; ?>
</div>
											<div style="float: left; width: 140px;"><?php echo $this->_tpl_vars['g_lang_misc_date']; ?>
</div>
											<div style="float: left; width: 80px;"><?php echo $this->_tpl_vars['g_lang_postedby']; ?>
</div>
										</div>
										<?php $_from = $this->_tpl_vars['m_news_list']['news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['newsitem']):
?> 
											<?php echo '<div style="height:17px; width: 600px !important; width:550px;"><div style="height:17px; float: left; width: 220px;"><a href="news.php?news=';  echo $this->_tpl_vars['newsitem']['n_id'];  echo '" class="link">';  echo ((is_array($_tmp=$this->_tpl_vars['newsitem']['n_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30, "...", true) : smarty_modifier_truncate($_tmp, 30, "...", true));  echo '</a></div><div style="height:17px; float: left; width: 140px;">';  echo ((is_array($_tmp=$this->_tpl_vars['newsitem']['n_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['g_site_config']['dateformat']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['g_site_config']['dateformat']));  echo '</div><div style="height:17px; float: left; width: 80px;"><a href="users.php?user=';  echo $this->_tpl_vars['newsitem']['u_id'];  echo '" class="link">';  echo $this->_tpl_vars['newsitem']['u_name'];  echo '</a></div>';  if ($this->_tpl_vars['g_user']->m_user_access['NEWSEDIT'] > 0):  echo '<div style="float: left; width:10%; height: 17px;"><a href="news.php?edit=';  echo $this->_tpl_vars['newsitem']['n_id'];  echo '" class="link"><img src="theme/';  echo $this->_tpl_vars['g_theme_dir'];  echo '/gfx/edit.png" border="0" alt="edit" /></a><a href="news.php?edit=';  echo $this->_tpl_vars['newsitem']['n_id'];  echo '" class="link">';  echo $this->_tpl_vars['g_lang_misc_edit'];  echo '</a></div>';  endif;  echo '';  if ($this->_tpl_vars['g_user']->m_user_access['NEWSDEL'] > 0):  echo '<div style="float: left; width:10%; height: 17px;"><a href="news.php?delete=';  echo $this->_tpl_vars['newsitem']['n_id'];  echo '" class="link"><img src="theme/';  echo $this->_tpl_vars['g_theme_dir'];  echo '/gfx/delete.png" border="0" alt="delete" /></a><a href="news.php?delete=';  echo $this->_tpl_vars['newsitem']['n_id'];  echo '" class="link">';  echo $this->_tpl_vars['g_lang_misc_delete'];  echo '</a></div>';  endif;  echo '</div>'; ?>

										<?php endforeach; endif; unset($_from); ?>
										
									
									<?php endif; ?>
							</div>
															<?php if ($this->_tpl_vars['m_news_list']['page']['total'] > 0): ?>
										<?php if (! empty ( $_GET['page'] )): ?>
											<div class="pager"><a href="news.php?page=<?php echo $_GET['page']-1; ?>
" class="link" style="color:#4448fa;"><?php echo $this->_tpl_vars['g_lang_misc_previous_page']; ?>
</a></div>
										<?php endif; ?>
											
											<?php if ($_GET['page'] > 4):  $this->assign('start', '4');  else:  $this->assign('start', $_GET['page']);  endif; ?>
											<?php if ($this->_tpl_vars['m_news_list']['page']['total'] > $_GET['page']+4):  $this->assign('end', $_GET['page']+4);  else:  $this->assign('end', $this->_tpl_vars['m_news_list']['page']['total']);  endif; ?>
											
											<?php if ($_GET['page'] > 4): ?>
												<div class="pager"><a href="news.php?page=0" class="link" style="color:#4448fa;"><?php echo $this->_tpl_vars['g_lang_misc_first']; ?>
 [0]</a></div>
											<?php endif; ?>
										
											<?php unset($this->_sections['page']);
$this->_sections['page']['name'] = 'page';
$this->_sections['page']['start'] = (int)$_GET['page']-$this->_tpl_vars['start'];
$this->_sections['page']['loop'] = is_array($_loop=$_GET['page']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['page']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['page']['show'] = true;
$this->_sections['page']['max'] = $this->_sections['page']['loop'];
if ($this->_sections['page']['start'] < 0)
    $this->_sections['page']['start'] = max($this->_sections['page']['step'] > 0 ? 0 : -1, $this->_sections['page']['loop'] + $this->_sections['page']['start']);
else
    $this->_sections['page']['start'] = min($this->_sections['page']['start'], $this->_sections['page']['step'] > 0 ? $this->_sections['page']['loop'] : $this->_sections['page']['loop']-1);
if ($this->_sections['page']['show']) {
    $this->_sections['page']['total'] = min(ceil(($this->_sections['page']['step'] > 0 ? $this->_sections['page']['loop'] - $this->_sections['page']['start'] : $this->_sections['page']['start']+1)/abs($this->_sections['page']['step'])), $this->_sections['page']['max']);
    if ($this->_sections['page']['total'] == 0)
        $this->_sections['page']['show'] = false;
} else
    $this->_sections['page']['total'] = 0;
if ($this->_sections['page']['show']):

            for ($this->_sections['page']['index'] = $this->_sections['page']['start'], $this->_sections['page']['iteration'] = 1;
                 $this->_sections['page']['iteration'] <= $this->_sections['page']['total'];
                 $this->_sections['page']['index'] += $this->_sections['page']['step'], $this->_sections['page']['iteration']++):
$this->_sections['page']['rownum'] = $this->_sections['page']['iteration'];
$this->_sections['page']['index_prev'] = $this->_sections['page']['index'] - $this->_sections['page']['step'];
$this->_sections['page']['index_next'] = $this->_sections['page']['index'] + $this->_sections['page']['step'];
$this->_sections['page']['first']      = ($this->_sections['page']['iteration'] == 1);
$this->_sections['page']['last']       = ($this->_sections['page']['iteration'] == $this->_sections['page']['total']);
?>
 												<?php if ($this->_sections['page']['index'] >= 0 && $this->_sections['page']['index'] < $_GET['page']): ?>
													<div class="pager"><a href="news.php?page=<?php echo $this->_sections['page']['index']; ?>
" class="link" style="color:#4448fa;"><?php echo $this->_sections['page']['index']; ?>
</a></div>
												<?php endif; ?>
											<?php endfor; endif; ?>
											
											<div class="pager_active"><?php echo $_GET['page']; ?>
</div>
											
											<?php unset($this->_sections['page']);
$this->_sections['page']['name'] = 'page';
$this->_sections['page']['start'] = (int)$_GET['page']+1;
$this->_sections['page']['loop'] = is_array($_loop=$this->_tpl_vars['end']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['page']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['page']['show'] = true;
$this->_sections['page']['max'] = $this->_sections['page']['loop'];
if ($this->_sections['page']['start'] < 0)
    $this->_sections['page']['start'] = max($this->_sections['page']['step'] > 0 ? 0 : -1, $this->_sections['page']['loop'] + $this->_sections['page']['start']);
else
    $this->_sections['page']['start'] = min($this->_sections['page']['start'], $this->_sections['page']['step'] > 0 ? $this->_sections['page']['loop'] : $this->_sections['page']['loop']-1);
if ($this->_sections['page']['show']) {
    $this->_sections['page']['total'] = min(ceil(($this->_sections['page']['step'] > 0 ? $this->_sections['page']['loop'] - $this->_sections['page']['start'] : $this->_sections['page']['start']+1)/abs($this->_sections['page']['step'])), $this->_sections['page']['max']);
    if ($this->_sections['page']['total'] == 0)
        $this->_sections['page']['show'] = false;
} else
    $this->_sections['page']['total'] = 0;
if ($this->_sections['page']['show']):

            for ($this->_sections['page']['index'] = $this->_sections['page']['start'], $this->_sections['page']['iteration'] = 1;
                 $this->_sections['page']['iteration'] <= $this->_sections['page']['total'];
                 $this->_sections['page']['index'] += $this->_sections['page']['step'], $this->_sections['page']['iteration']++):
$this->_sections['page']['rownum'] = $this->_sections['page']['iteration'];
$this->_sections['page']['index_prev'] = $this->_sections['page']['index'] - $this->_sections['page']['step'];
$this->_sections['page']['index_next'] = $this->_sections['page']['index'] + $this->_sections['page']['step'];
$this->_sections['page']['first']      = ($this->_sections['page']['iteration'] == 1);
$this->_sections['page']['last']       = ($this->_sections['page']['iteration'] == $this->_sections['page']['total']);
?>
 												<?php if ($this->_sections['page']['index'] > $_GET['page'] && $this->_sections['page']['index'] <= $this->_tpl_vars['m_news_list']['page']['total']): ?>
													<div class="pager"><a href="news.php?page=<?php echo $this->_sections['page']['index']; ?>
" class="link" style="color:#4448fa;"><?php echo $this->_sections['page']['index']; ?>
</a></div>
												<?php endif; ?>
											<?php endfor; endif; ?>
											
											<?php if ($this->_tpl_vars['end'] != $this->_tpl_vars['m_news_list']['page']['total']): ?>
													<div class="pager"><a href="news.php?page=<?php echo $this->_tpl_vars['m_news_list']['page']['total']; ?>
" class="link" style="color:#4448fa;"><?php echo $this->_tpl_vars['g_lang_misc_last']; ?>
 [<?php echo $this->_tpl_vars['m_news_list']['page']['total']; ?>
]</a></div>
											<?php endif; ?>
											
										<?php if ($_GET['page'] != $this->_tpl_vars['m_news_list']['page']['total']): ?>
											<div class="pager"><a href="news.php?page=<?php echo $_GET['page']+1; ?>
" class="link" style="color:#4448fa;"><?php echo $this->_tpl_vars['g_lang_misc_next_page']; ?>
</a></div>
										<?php endif; ?>
						<?php endif; ?><br /><br />
					<?php endif; ?>
					
					
					
								<?php if (! empty ( $this->_tpl_vars['m_news_archive'] )): ?>
						<?php $_from = $this->_tpl_vars['m_news_archive']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['newsitem']):
?> 
							<?php echo '<div class="content_box_top"></div><div class="content_box">';  echo $this->_tpl_vars['newsitem']['n_title'];  echo '<hr style="border-style: dotted;" />';  echo ((is_array($_tmp=$this->_tpl_vars['newsitem']['n_text'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp));  echo '<hr style="border-style: dotted;" /><div style="float:left; width: 55px; height: 50px;"><a href="users.php?user=';  echo $this->_tpl_vars['newsitem']['u_id'];  echo '" class="link"><img src="';  echo $this->_tpl_vars['newsitem']['u_pic'];  echo '" style="height: 50px; width:50px; border:0px;" alt="" /></a></div><div style="width:auto; height: 35px; padding-top: 10px;">';  echo $this->_tpl_vars['g_lang_postedby'];  echo ': <a href="users.php?user=';  echo $this->_tpl_vars['newsitem']['u_id'];  echo '" class="link"> ';  echo $this->_tpl_vars['newsitem']['u_name'];  echo '</a><br />';  echo $this->_tpl_vars['g_lang_misc_date'];  echo ': ';  echo ((is_array($_tmp=$this->_tpl_vars['newsitem']['n_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['g_site_config']['dateformat']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['g_site_config']['dateformat']));  echo '</div></div><div class="content_box_bottom"></div><div style="height:5px;">&nbsp;</div>'; ?>

						<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
					
			
						<?php if (! empty ( $this->_tpl_vars['m_news_add'] )): ?>
				<br />
				<div style="margin-left:60px;">
					<form action="news.php" method="post"><input type="hidden" name="add" value="1" />
						<div><?php echo $this->_tpl_vars['g_lang_misc_subject']; ?>
: <input type="text" class="login" style="color:#000000; width:300px;" maxlength="255" name="title" /></div>
						<div><textarea name="newsbody" class="textbox" style="color: #000000; width:450px; height:250px;" rows="50" cols="100"></textarea></div>
						<div style="padding-left:300px;"><input type="submit" value="<?php echo $this->_tpl_vars['g_lang_news_add']; ?>
" class="login" style="color:#000000;" /></div>
					</form>
				</div>
			<?php endif; ?>
			
						<?php if (! empty ( $this->_tpl_vars['m_news_edit'] )): ?>
				<form action="news.php" name="news" method="post"><input type="hidden" name="edit" value="<?php echo $this->_tpl_vars['m_news_edit']['n_id']; ?>
" />
				<br /><div style="width: auto; padding-left: 40px; padding-right:40px;">
						<div><?php echo $this->_tpl_vars['g_lang_misc_subject']; ?>
: <input name="title" style="width:300px; color:#000000;" class="login" type="text" value="<?php echo $this->_tpl_vars['m_news_edit']['n_title']; ?>
"  maxlength="255" /></div>
						<div><textarea name="newsbody" class="textbox" style="color: #000000; width:450px; height:250px;" wrap=virtual><?php echo $this->_tpl_vars['m_news_edit']['n_text']; ?>
</textarea></div>
						<div style="padding-left: 300px;"><input type="submit" value="<?php echo $this->_tpl_vars['g_lang_news_edit']; ?>
" class="login" style="color:#000000;" /></div>
				</div></form>
			<?php endif; ?>
		