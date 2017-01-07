{*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*}
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<title>{$g_site_config.sitename}
</title>
				<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
				<link href="theme/{$g_theme_dir}/stylesheet.css" type="text/css" rel="stylesheet" />	
				<link href="theme/{$g_theme_dir}/javascript/calendar.css" type="text/css" rel="stylesheet" />			
				{* CALENDAR JAVASCRIPT THERE IS LANGUAGE IN HERE THAT GOES INTO THE LANGUAGE PACKS *}
				{* YOU CAN CHANGE THE LOOK OF THE CALENDAR BY GOING TO THE CALENDAR CSS FILE *}
				{literal}<script language="JavaScript" type="text/javascript">
			var GC_APPEARANCE = {{/literal}
				'weekdays':  ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'], 
				'longmonth' : ['{$g_lang_date_month1}','{$g_lang_date_month2}','{$g_lang_date_month3}','{$g_lang_date_month4}','{$g_lang_date_month5}','{$g_lang_date_month6}','{$g_lang_date_month7}','{$g_lang_date_month8}','{$g_lang_date_month9}','{$g_lang_date_month10}','{$g_lang_date_month11}','{$g_lang_date_month12}'],
				{literal}'messages' : {{/literal}
							'Warning' : 'Warning: the date entered does not meet preset date format',
							'AltPrevYear' : 'to previos year',
							'AltNextYear' : 'to next year',
							'AltPrevMonth' : 'to previos month',
							'AltNextMonth' : 'to next month'
				{literal}},{/literal}
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
				'PrevYear':'theme/{$g_theme_dir}/gfx/calendar/prev_year.png',
				'PrevMonth':'theme/{$g_theme_dir}/gfx/calendar/prev_month.png',
				'NextYear':'theme/{$g_theme_dir}/gfx/calendar/next_year.png',
				'NextMonth':'theme/{$g_theme_dir}/gfx/calendar/next_month.png',
				'IcoCalUnVis': 'theme/{$g_theme_dir}/gfx/calendar/dpr_unvis.png',
				'IcoCalVis': 'theme/{$g_theme_dir}/gfx/calendar/dpr_vis.png'
				{literal}};
				</script>{/literal}
				<script language="JavaScript" type="text/javascript" src="theme/{$g_theme_dir}/javascript/GurtCalendar.js"></script>
				
	</head>
	<body>
		<div class="page">
			<div class="main">
				<div class="leftNav">
					<div class="leftBox nav">
							<!-- Menu area start -->
							<img src="theme/{$g_theme_dir}/gfx/navigation.png" class="leftImage" alt="Site menu" />
							<img src="theme/{$g_theme_dir}/gfx/break.png" alt="break" />
							<!-- Public menu start -->
							{foreach item=link from=$g_menu_public} 
							{strip}
								<a href="{$link.link}">{$link.name}</a><br />
							{/strip}
							{/foreach}
					
							<!-- Public menu end -->
					</div>
					<div class="leftBox nav">
							<img src="theme/{$g_theme_dir}/gfx/login.png" class="leftImage" alt="User menu" />
							<img src="theme/{$g_theme_dir}/gfx/break.png" alt="break" />
							<!-- Private menu start -->
							{if empty($g_user->m_user_id)}
							<!-- This code just makes the login form and put the graphical bits on the end of the text areas -->
										{strip}
											<div style="text-align:center;">	
														<form action="login.php" method="post">
														
														<div style="height:18px; width:121px;"><img src="theme/{$g_theme_dir}/gfx/text_start.png" class="loginimg" alt="" style="width:8px; height:15px;" /><input type="text" name="login" maxlength="100" class="login" value="User" style="width:100px;border:0px;" /><img src="theme/{$g_theme_dir}/gfx/text_end.png" class="loginimg" style="width:3px;" alt="" />
														</div><div style="height:25px; width:121px;">
														<img src="theme/{$g_theme_dir}/gfx/text_start.png" class="loginimg" style="width:8px; height:15px;" alt="" />
														<input type="password" name="password" maxlength="100" class="login" style="width:100px; border:0px;" value="" />
														<img src="theme/{$g_theme_dir}/gfx/text_end.png" class="loginimg" style="width:3px;" alt="" />
														</div><div style="height:18px; width:60px !important; width:50px; float:right;">
														<input type="image" src="theme/{$g_theme_dir}/gfx/button_login.png" value="submit" />
														</div>
														</form>
											</div>	
										{/strip}
								{else}
								{foreach item=link from=$g_menu_private} 
										<a href="{$link.link}">{$link.name}</a><br />
								{/foreach}
								{/if}
							<!-- Private menu end -->
					</div>
					<div class="leftBox nav">
								<img src="theme/{$g_theme_dir}/gfx/affiliates.png" class="leftImage" alt="Affiliates" />
								<img src="theme/{$g_theme_dir}/gfx/break.png" alt="break" />
								
								<!--<p>
									<a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0!" height="31" width="88" border="0" /></a>
								</p>-->	
					</div>
					<div class="leftBox nav">{if $g_modules[10].m_status > 0}
									<form action="chat.php" method="post"><div style="padding-left: 3px; width: 120px;"><input type="hidden" name="chat" value="{$SCRIPT_NAME}" />
										<textarea style="font-size: 10px; font-weight: bold; font-family:Verdana, Arial, Helvetica, sans-serif; width: 120px; height: 100px;" rows="7" cols="10">{strip}
										{foreach item="chat" from=$g_site_chat}{if $g_user->m_user_prefs.showtime > 0}{$chat.c_date|date_format:"%H:%M"} - {/if}{if not empty($chat.u_id)}{$chat.u_name}{else}{$g_lang_misc_guest}{$chat.u_ip|truncate:2:false}{/if} - {$chat.c_text } {php}echo "\n";{/php}{/foreach}
									{/strip}</textarea>
								</div>
								<div style="padding-left: 3px; padding-top:2px; width: 130px;">
									<div style="float:left; height:18px; padding-top:0px; ">
										<img src="theme/{$g_theme_dir}/gfx/text_start.png" class="loginimg" style="margin:0px; width:8px; height:15px;" alt="" />
										</div><div style="float:left; height:18px;">
										<input type="text" name="text" maxlength="255" class="login" style="vertical-align:top; margin:0px; border:0px; width: 80px;" />
										</div><div style="float:left; height:18px; padding-top:0px;">
										<input type="submit" value="{$g_lang_misc_talk}" class="login" style="margin:0px; border:0px; width:auto;" />
										</div><div style="float:left; height:18px; margin:0px; padding-top:0px;">
										<img src="theme/{$g_theme_dir}/gfx/text_end.png" class="loginimg" style="margin:0px;" alt="" />
									</div>								
								</div></form>
								{/if}								
					</div>
				</div>
				<!-- Menu area end -->
				<div class="content">
						<img src="theme/{$g_theme_dir}/gfx/your_logo.png" alt="Site logo" />
					
						<!-- Main content area start -->
						{if not empty($g_error)}
									<div align="center" style="background: #95915f; color: #000000; vertical-align: top;">
											<img src="theme/{$g_theme_dir}/gfx/warning.png">
											&nbsp;
											<b>{$g_error}</b><br />
									</div>
						{/if}
						{$g_content_area}
				
						<!-- Main content area end -->
				</div>
				<div class="foot" style="background: url(theme/{$g_theme_dir}/gfx/footer.png); height: 31px; width: 800px;">
								<!-- YOU WILL NOT RECIEVE ANY SUPPORT BY TAKING OUT THIS LINK -->
								<div class="poweredby"><a href="http://www.proclanmanager.com">Powered by Pro Clan Manager</a></div>
								<!-- YOU WILL NOT RECIEVE ANY SUPPORT BY TAKING OUT THIS LINK -->
				</div>
			</div>
		</div>
	</body>
</html>
