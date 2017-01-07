<?php /* Smarty version 2.6.14, created on 2010-07-16 11:12:54
         compiled from main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'main.tpl', 119, false),array('modifier', 'truncate', 'main.tpl', 119, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<title><?php echo $this->_tpl_vars['g_site_config']['sitename']; ?>

</title>
				<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
				<link href="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/stylesheet.css" type="text/css" rel="stylesheet" />	
				<link href="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/javascript/calendar.css" type="text/css" rel="stylesheet" />			
												<?php echo '<script language="JavaScript" type="text/javascript">
			var GC_APPEARANCE = {'; ?>

				'weekdays':  ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'], 
				'longmonth' : ['<?php echo $this->_tpl_vars['g_lang_date_month1']; ?>
','<?php echo $this->_tpl_vars['g_lang_date_month2']; ?>
','<?php echo $this->_tpl_vars['g_lang_date_month3']; ?>
','<?php echo $this->_tpl_vars['g_lang_date_month4']; ?>
','<?php echo $this->_tpl_vars['g_lang_date_month5']; ?>
','<?php echo $this->_tpl_vars['g_lang_date_month6']; ?>
','<?php echo $this->_tpl_vars['g_lang_date_month7']; ?>
','<?php echo $this->_tpl_vars['g_lang_date_month8']; ?>
','<?php echo $this->_tpl_vars['g_lang_date_month9']; ?>
','<?php echo $this->_tpl_vars['g_lang_date_month10']; ?>
','<?php echo $this->_tpl_vars['g_lang_date_month11']; ?>
','<?php echo $this->_tpl_vars['g_lang_date_month12']; ?>
'],
				<?php echo '\'messages\' : {'; ?>

							'Warning' : 'Warning: the date entered does not meet preset date format',
							'AltPrevYear' : 'to previos year',
							'AltNextYear' : 'to next year',
							'AltPrevMonth' : 'to previos month',
							'AltNextMonth' : 'to next month'
				<?php echo '},'; ?>

				'CalDiv' : 'clsCalDiv',
				'OuterFrame' : 'clsOuterFrame',
				'InnerFrame' : 'clsInnerFrame',
				'TopPartNavpanel' : 'clsTopPartNavpanel',
				'BottomPartNavpanel' : 'clsBottomPartNavpanel',
				'MidRow' : 'clsMidRow',
				'DateGrid':'clsDateGrid',
				'WeekDay':'clsWeekDay',
				'WorkDayCell': 'clsWorkDayCell',
				'HoliDayCell': 'clsHoliDayCell',
				'OtherMonthDayCell': 'clsOtherMonthDayCell',
				'SelectedDayCell': 'clsSelectedDayCell',
				'CurrentMonthDay': 'clsCurrentMonthDay',
				'OtherMonthDay': 'clsOtherMonthDay',
				'SelectedDay': 'clsSelectedDay',
				'InfoTitle':'clsInfoTitle',
				'DataArea':'clsDataArea',
				'PrevYear':'theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/calendar/prev_year.png',
				'PrevMonth':'theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/calendar/prev_month.png',
				'NextYear':'theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/calendar/next_year.png',
				'NextMonth':'theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/calendar/next_month.png',
				'IcoCalUnVis': 'theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/calendar/dpr_unvis.png',
				'IcoCalVis': 'theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/calendar/dpr_vis.png'
				<?php echo '};
				</script>'; ?>

				<script language="JavaScript" type="text/javascript" src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/javascript/GurtCalendar.js"></script>
				
	</head>
	<body>
		<div class="page">
			<div class="main">
				<div class="leftNav">
					<div class="leftBox nav">
							<!-- Menu area start -->
							<img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/navigation.png" class="leftImage" alt="Site menu" />
							<img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/break.png" alt="break" />
							<!-- Public menu start -->
							<?php $_from = $this->_tpl_vars['g_menu_public']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?> 
							<?php echo '<a href="';  echo $this->_tpl_vars['link']['link'];  echo '">';  echo $this->_tpl_vars['link']['name'];  echo '</a><br />'; ?>

							<?php endforeach; endif; unset($_from); ?>
					
							<!-- Public menu end -->
					</div>
					<div class="leftBox nav">
							<img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/login.png" class="leftImage" alt="User menu" />
							<img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/break.png" alt="break" />
							<!-- Private menu start -->
							<?php if (empty ( $this->_tpl_vars['g_user']->m_user_id )): ?>
							<!-- This code just makes the login form and put the graphical bits on the end of the text areas -->
										<?php echo '<div style="text-align:center;"><form action="login.php" method="post"><div style="height:18px; width:121px;"><img src="theme/';  echo $this->_tpl_vars['g_theme_dir'];  echo '/gfx/text_start.png" class="loginimg" alt="" style="width:8px; height:15px;" /><input type="text" name="login" maxlength="100" class="login" value="User" style="width:100px;border:0px;" /><img src="theme/';  echo $this->_tpl_vars['g_theme_dir'];  echo '/gfx/text_end.png" class="loginimg" style="width:3px;" alt="" /></div><div style="height:25px; width:121px;"><img src="theme/';  echo $this->_tpl_vars['g_theme_dir'];  echo '/gfx/text_start.png" class="loginimg" style="width:8px; height:15px;" alt="" /><input type="password" name="password" maxlength="100" class="login" style="width:100px; border:0px;" value="" /><img src="theme/';  echo $this->_tpl_vars['g_theme_dir'];  echo '/gfx/text_end.png" class="loginimg" style="width:3px;" alt="" /></div><div style="height:18px; width:60px !important; width:50px; float:right;"><input type="image" src="theme/';  echo $this->_tpl_vars['g_theme_dir'];  echo '/gfx/button_login.png" value="submit" /></div></form></div>'; ?>

								<?php else: ?>
								<?php $_from = $this->_tpl_vars['g_menu_private']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?> 
										<a href="<?php echo $this->_tpl_vars['link']['link']; ?>
"><?php echo $this->_tpl_vars['link']['name']; ?>
</a><br />
								<?php endforeach; endif; unset($_from); ?>
								<?php endif; ?>
							<!-- Private menu end -->
					</div>
					<div class="leftBox nav">
								<img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/affiliates.png" class="leftImage" alt="Affiliates" />
								<img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/break.png" alt="break" />
								
								<!--<p>
									<a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0!" height="31" width="88" border="0" /></a>
								</p>-->	
					</div>
					<div class="leftBox nav"><?php if ($this->_tpl_vars['g_modules'][10]['m_status'] > 0): ?>
									<form action="chat.php" method="post"><div style="padding-left: 3px; width: 120px;"><input type="hidden" name="chat" value="<?php echo $this->_tpl_vars['SCRIPT_NAME']; ?>
" />
										<textarea style="font-size: 10px; font-weight: bold; font-family:Verdana, Arial, Helvetica, sans-serif; width: 120px; height: 100px;" rows="7" cols="10"><?php echo '';  $_from = $this->_tpl_vars['g_site_chat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['chat']):
 echo '';  if ($this->_tpl_vars['g_user']->m_user_prefs['showtime'] > 0):  echo '';  echo ((is_array($_tmp=$this->_tpl_vars['chat']['c_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%H:%M") : smarty_modifier_date_format($_tmp, "%H:%M"));  echo ' - ';  endif;  echo '';  if (! empty ( $this->_tpl_vars['chat']['u_id'] )):  echo '';  echo $this->_tpl_vars['chat']['u_name'];  echo '';  else:  echo '';  echo $this->_tpl_vars['g_lang_misc_guest'];  echo '';  echo ((is_array($_tmp=$this->_tpl_vars['chat']['u_ip'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 2, false) : smarty_modifier_truncate($_tmp, 2, false));  echo '';  endif;  echo ' - ';  echo $this->_tpl_vars['chat']['c_text'];  echo ' ';  echo "\n";  echo '';  endforeach; endif; unset($_from);  echo ''; ?>
</textarea>
								</div>
								<div style="padding-left: 3px; padding-top:2px; width: 130px;">
									<div style="float:left; height:18px; padding-top:0px; ">
										<img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/text_start.png" class="loginimg" style="margin:0px; width:8px; height:15px;" alt="" />
										</div><div style="float:left; height:18px;">
										<input type="text" name="text" maxlength="255" class="login" style="vertical-align:top; margin:0px; border:0px; width: 80px;" />
										</div><div style="float:left; height:18px; padding-top:0px;">
										<input type="submit" value="<?php echo $this->_tpl_vars['g_lang_misc_talk']; ?>
" class="login" style="margin:0px; border:0px; width:auto;" />
										</div><div style="float:left; height:18px; margin:0px; padding-top:0px;">
										<img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/text_end.png" class="loginimg" style="margin:0px;" alt="" />
									</div>								
								</div></form>
								<?php endif; ?>								
					</div>
				</div>
				<!-- Menu area end -->
				<div class="content">
						<img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/your_logo.png" alt="Site logo" />
					
						<!-- Main content area start -->
						<?php if (! empty ( $this->_tpl_vars['g_error'] )): ?>
									<div align="center" style="background: #95915f; color: #000000; vertical-align: top;">
											<img src="theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/warning.png">
											&nbsp;
											<b><?php echo $this->_tpl_vars['g_error']; ?>
</b><br />
									</div>
						<?php endif; ?>
						<?php echo $this->_tpl_vars['g_content_area']; ?>

				
						<!-- Main content area end -->
				</div>
				<div class="foot" style="background: url(theme/<?php echo $this->_tpl_vars['g_theme_dir']; ?>
/gfx/footer.png); height: 31px; width: 800px;">
								<!-- YOU WILL NOT RECIEVE ANY SUPPORT BY TAKING OUT THIS LINK -->
								<div class="poweredby"><a href="http://www.proclanmanager.com">Powered by Pro Clan Manager</a></div>
								<!-- YOU WILL NOT RECIEVE ANY SUPPORT BY TAKING OUT THIS LINK -->
				</div>
			</div>
		</div>
	</body>
</html>