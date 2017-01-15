<?php /* Smarty version 2.6.14, created on 2010-07-16 11:13:08
         compiled from poll.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'poll.tpl', 40, false),array('modifier', 'truncate', 'poll.tpl', 41, false),array('function', 'math', 'poll.tpl', 126, false),array('function', 'cycle', 'poll.tpl', 126, false),)), $this); ?>
<?php if (! empty ( $this->_tpl_vars['m_poll_list'] )): ?>
			<?php if ($this->_tpl_vars['g_user']->m_user_access['POLLADD'] > 0): ?>
				<div style="width: 616px;text-align:right; padding-right:30px;">
					<br />
						<a href="poll.php?add=1" class="link"><img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/add.png" alt="add poll" border="0" /></a>
						<a href="poll.php?add=1" class="link"><?php echo $this->_tpl_vars['g_lang_poll_add']; ?>
</a>		
				</div>
				<br />
			<?php endif; ?>
				<div style="width:626px;">
					<div style="float: left; width: 240px; padding-left: 20px;">
						<?php echo $this->_tpl_vars['g_lang_misc_name']; ?>

					</div>
					<div style="float: left; width: 120px;">
						<?php echo $this->_tpl_vars['g_lang_misc_start_date']; ?>

					</div>
					<div style="float: left; width: 110px;">
						<?php echo $this->_tpl_vars['g_lang_misc_end_date']; ?>

					</div>
					<div style="float: left; width: 20px;">
						<?php echo $this->_tpl_vars['g_lang_misc_votes']; ?>

					</div>
				</div>
			<?php if ($this->_tpl_vars['m_poll_list']['polls'] != 'NULL'): ?>
				<?php $_from = $this->_tpl_vars['m_poll_list']['polls']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['poll']):
?> 
				<?php echo '<div style="width:626px; height:17px;"><div style="float: left; width: 240px; padding-left: 20px;">';  if (! empty ( $this->_tpl_vars['poll']['p_end'] ) && ( ((is_array($_tmp=time()+$this->_tpl_vars['g_site_config']['timezone']*3600)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M:%S")) ) > ( ((is_array($_tmp=$this->_tpl_vars['poll']['p_end'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M:%S")) )):  echo '<img src="theme/';  echo $this->_tpl_vars['g_theme_dir'];  echo '/gfx/warning.png" alt="" style="height:15px;" />*';  echo $this->_tpl_vars['g_lang_poll_closed'];  echo '* <a href="poll.php?view=';  echo $this->_tpl_vars['poll']['p_id'];  echo '" class="link">';  echo ((is_array($_tmp=$this->_tpl_vars['poll']['p_name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 25, "...", true) : smarty_modifier_truncate($_tmp, 25, "...", true));  echo '</a>';  else:  echo '';  if (( ((is_array($_tmp=time()+$this->_tpl_vars['g_site_config']['timezone']*3600)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M:%S")) ) < ( ((is_array($_tmp=$this->_tpl_vars['poll']['p_start'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M:%S")) )):  echo '<img src="theme/';  echo $this->_tpl_vars['g_theme_dir'];  echo '/gfx/warning.png" alt="" style="height:15px;" />*';  echo $this->_tpl_vars['g_lang_poll_not_started'];  echo '* ';  echo ((is_array($_tmp=$this->_tpl_vars['poll']['p_name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 15, "...", true) : smarty_modifier_truncate($_tmp, 15, "...", true));  echo '';  else:  echo '<a href="poll.php?poll=';  echo $this->_tpl_vars['poll']['p_id'];  echo '" class="link">';  echo ((is_array($_tmp=$this->_tpl_vars['poll']['p_name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 38, "...", true) : smarty_modifier_truncate($_tmp, 38, "...", true));  echo '</a>';  endif;  echo '';  endif;  echo '</div><div style="float: left; width: 120px;">';  if (empty ( $this->_tpl_vars['poll']['p_start'] )):  echo '';  echo $this->_tpl_vars['g_lang_poll_no_time'];  echo '';  else:  echo '';  echo ((is_array($_tmp=$this->_tpl_vars['poll']['p_start'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['g_site_config']['dateformat']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['g_site_config']['dateformat']));  echo '';  endif;  echo '</div><div style="float: left; width: 120px;">';  if (empty ( $this->_tpl_vars['poll']['p_end'] )):  echo '';  echo $this->_tpl_vars['g_lang_poll_no_time'];  echo '';  else:  echo '';  echo ((is_array($_tmp=$this->_tpl_vars['poll']['p_end'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['g_site_config']['dateformat']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['g_site_config']['dateformat']));  echo '';  endif;  echo '</div><div style="float: left; width: 20px;">';  echo $this->_tpl_vars['poll']['p_num_votes'];  echo '</div>';  if ($this->_tpl_vars['g_user']->m_user_access['POLLDEL'] > 0):  echo '<div style="float:left; width:100px; height: 17px;"><a href="poll.php?delete=';  echo $this->_tpl_vars['poll']['p_id'];  echo '" class="link"><img src="theme/';  echo $this->_tpl_vars['g_theme_dir'];  echo '/gfx/delete.png" border="0" alt="delete poll" /></a><a href="poll.php?delete=';  echo $this->_tpl_vars['poll']['p_id'];  echo '" class="link">';  echo $this->_tpl_vars['g_lang_misc_delete'];  echo '</a></div>';  endif;  echo '</div>'; ?>

				<?php endforeach; endif; unset($_from); ?>
										<?php if ($this->_tpl_vars['m_poll_list']['page']['total'] > 0): ?>
										<?php if (! empty ( $_GET['page'] )): ?>
											<div class="pager"><a href="poll.php?page=<?php echo $_GET['page']-1; ?>
" class="link" style="color:#4448fa;"><?php echo $this->_tpl_vars['g_lang_misc_previous_page']; ?>
</a></div>
										<?php endif; ?>
											
											<?php if ($_GET['page'] > 4):  $this->assign('start', '4');  else:  $this->assign('start', $_GET['page']);  endif; ?>
											<?php if ($this->_tpl_vars['m_poll_list']['page']['total'] > $_GET['page']+4):  $this->assign('end', $_GET['page']+4);  else:  $this->assign('end', $this->_tpl_vars['m_poll_list']['page']['total']);  endif; ?>
											
											<?php if ($_GET['page'] > 4): ?>
												<div class="pager"><a href="poll.php?page=0" class="link" style="color:#4448fa;"><?php echo $this->_tpl_vars['g_lang_misc_first']; ?>
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
													<div class="pager"><a href="poll.php?page=<?php echo $this->_sections['page']['index']; ?>
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
 												<?php if ($this->_sections['page']['index'] > $_GET['page'] && $this->_sections['page']['index'] <= $this->_tpl_vars['m_poll_list']['page']['total']): ?>
													<div class="pager"><a href="poll.php?page=<?php echo $this->_sections['page']['index']; ?>
" class="link" style="color:#4448fa;"><?php echo $this->_sections['page']['index']; ?>
</a></div>
												<?php endif; ?>
											<?php endfor; endif; ?>
											
											<?php if ($this->_tpl_vars['end'] != $this->_tpl_vars['m_poll_list']['page']['total']): ?>
													<div class="pager"><a href="poll.php?page=<?php echo $this->_tpl_vars['m_poll_list']['page']['total']; ?>
" class="link" style="color:#4448fa;"><?php echo $this->_tpl_vars['g_lang_misc_last']; ?>
 [<?php echo $this->_tpl_vars['m_poll_list']['page']['total']; ?>
]</a></div>
											<?php endif; ?>
											
											<?php if ($_GET['page'] != $this->_tpl_vars['m_news_list']['page']['total']): ?>
												<div class="pager"><a href="poll.php?page=<?php echo $_GET['page']+1; ?>
" class="link" style="color:#4448fa;"><?php echo $this->_tpl_vars['g_lang_misc_next_page']; ?>
</a></div>
											<?php endif; ?>
						<?php endif; ?><br /><br />
			<?php endif; ?>
			
<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['m_poll_view'] )): ?>
		<?php if ($this->_tpl_vars['m_poll_view'][0]['total_votes'] > 0): ?>
			<?php $this->assign('m_poll_graph_width', '400'); ?>
			<div style="width: 516px; padding-bottom: 5px; padding-top: 10px; padding-left: 50px;"><fieldset><legend style="color:#ffffff;"><?php echo $this->_tpl_vars['m_poll_view'][0]['p_name']; ?>
</legend><br />
			<?php $_from = $this->_tpl_vars['m_poll_view']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['poll']):
?> 			
								<?php echo '<div style="width: 300px; padding-left: 0px;">';  echo $this->_tpl_vars['poll']['o_name'];  echo '</div>';  if ($this->_tpl_vars['poll']['o_votes'] > 0):  echo '<div style="padding-left: 0px; width: ';  echo smarty_function_math(array('equation' => "((x*(100/y)))*(z/100)",'x' => $this->_tpl_vars['poll']['o_votes'],'y' => $this->_tpl_vars['poll']['total_votes'],'z' => $this->_tpl_vars['m_poll_graph_width']), $this); echo 'px; background: url(\'theme/';  echo $this->_tpl_vars['g_theme_dir'];  echo '/gfx/poll/';  echo smarty_function_cycle(array('values' => "1,2,3"), $this); echo '.png\');">&nbsp;</div><div style="float: right;">';  echo smarty_function_math(array('equation' => "x*(100/y)",'x' => $this->_tpl_vars['poll']['o_votes'],'y' => $this->_tpl_vars['poll']['total_votes'],'format' => "%.1f"), $this); echo '0%</div><br />';  else:  echo '<div>&nbsp;</div>';  endif;  echo ''; ?>

			<?php endforeach; endif; unset($_from); ?></fieldset></div>
		<?php else: ?>
		<br /><br /><br />
		<?php endif; ?>
			<div style="padding-left: 275px;"><a href="poll.php" class="link"><?php echo $this->_tpl_vars['g_lang_poll_listing']; ?>
</a></div>
<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['m_poll_vote'] )): ?>
					<div class="title">
						<?php echo $this->_tpl_vars['m_poll_vote'][0]['p_name']; ?>
 					</div>
					<form action="poll.php" method="post"><input type="hidden" name="poll" value="<?php echo $_GET['poll']; ?>
" />
					<br />
							<?php $_from = $this->_tpl_vars['m_poll_vote']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['poll']):
?> 	
							<?php echo '<div style="padding-left:40px;"><input type="radio" name="vote" value="';  echo $this->_tpl_vars['poll']['o_id'];  echo '" />';  echo $this->_tpl_vars['poll']['o_name'];  echo '</div>'; ?>

							<?php endforeach; endif; unset($_from); ?>
							
					<br />
					<div style="width: 616px;text-align:center;">
					<input type="submit" value="vote" class="login" style="color:#000000;"/>
					</div>
</form>
					<div style="width: 616px;text-align:center;">
					<a href="poll.php?view=<?php echo $_GET['poll']; ?>
" class="link"><?php echo $this->_tpl_vars['g_lang_poll_viewresults']; ?>
</a> -
					<a href="poll.php" class="link"><?php echo $this->_tpl_vars['g_lang_poll_listing']; ?>
</a>
					</div>
<?php endif; ?>


<?php if (! empty ( $this->_tpl_vars['m_poll_add'] )): ?>
	<br /><br />
	<form action="poll.php" name="newpoll" method="post">
	<input type="hidden" name="add" value="1" />
	<div style="padding-left:60px;">
	<div style="float: left; width: 100px;"><?php echo $this->_tpl_vars['g_lang_poll_name']; ?>
 </div><div><input type="text" name="polltitle" class="login" style="width:200px; color: #000000;" maxlength="255" /></div>
	<div style="float: left; width: 100px;"><?php echo $this->_tpl_vars['g_lang_misc_start_date']; ?>
</div><div><script type="text/javascript">
					<!--		
						<?php echo 'var GC_SET_0 = {
							\'appearance\': GC_APPEARANCE,
							\'dataArea\':\'startdate\',
							\'dateFormat\' : \'d-m-Y\' 
						}'; ?>

						new gCalendar(GC_SET_0); 
					//-->
					</script></div>
		<div style="float: left; width: 100px;"><?php echo $this->_tpl_vars['g_lang_misc_end_date']; ?>
</div><div>
				<script type="text/javascript">
					<!--		
						<?php echo 'var GC_SET_1 = {
							\'appearance\': GC_APPEARANCE,
							\'dataArea\':\'enddate\',
							\'dateFormat\' : \'d-m-Y\' 
						}'; ?>

						new gCalendar(GC_SET_1); 
					//-->
					</script></div>
		<div style="float: left; width:100px;"><?php echo $this->_tpl_vars['g_lang_misc_make_public']; ?>
</div><div><input type="checkbox" name="public" value="1" /></div>
		<div style="width: 450px; "><fieldset><legend style="color:#ffffff;"><?php echo $this->_tpl_vars['g_lang_poll_options']; ?>
</legend><div style="padding-left:140px;">
			1 <input type="text" name="option[0]" class="login" style="width: 200px; color:#000000;" maxlength="200" /><br />
			2 <input type="text" name="option[1]" class="login" style="width: 200px; color:#000000;" maxlength="200" /><br />
			3 <input type="text" name="option[2]" class="login" style="width: 200px; color:#000000;" maxlength="200" /><br />
			4 <input type="text" name="option[3]" class="login" style="width: 200px; color:#000000;" maxlength="200" /><br />
			5 <input type="text" name="option[4]" class="login" style="width: 200px; color:#000000;" maxlength="200" /><br />
			6 <input type="text" name="option[5]" class="login" style="width: 200px; color:#000000;" maxlength="200" /><br />
		</div></fieldset></div><br /><div style="text-align:center;"><input type="submit" value="<?php echo $this->_tpl_vars['g_lang_poll_add']; ?>
" class="login" style="color:#000000;" /></div>
		</div>		
	</form>
<?php endif; ?>