{*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*}

{* ADMIN SCREEN *}

{if not empty($m_admin_options) && $g_user->m_user_access.ADMIN  > 0}

	<p style="width: 500px !important; width:616px; padding-left: 40px; padding-right:40px;">{$g_lang_admin_warning}</p>

	<div style="width:556px !important; width:616px; padding-left: 40px; padding-right: 40px;"><fieldset><legend style="color: #ffffff;">Date &amp; time display</legend>
		<div style="text-align:center; padding-left: 20px;">
			{$g_lang_admin_current_time} {$smarty.now+$g_site_config.timezone*60*60|date_format:"%H:%M:%S"}<br />
			{$g_lang_admin_display_date} {$smarty.now+$g_site_config.timezone*60*60|date_format:$g_site_config.dateformat}
		</div>
	</fieldset></div>

	<div style="width:556px !important; width:616px;  padding-left:40px; padding-right:40px;"><fieldset><legend style="color: #ffffff;">{$g_lang_admin_site_options}</legend>
		<div style="text-align:center; padding-left:20px;">
			<div style="width:200px; float:left; height: 20px;">{$g_lang_misc_name}</div><div style="float:left;width:250px;height: 20px;">{$g_lang_misc_value}</div>
				{foreach item=config from=$m_admin_options.config}
					{if $config.s_name == $smarty.get.configedit}
						<div style="height:20px; width: 525px;"><form action="admin.php" method="post" id="edit"><input type="hidden" name="editconfig" value="{$config.s_name}" /><div style="height: 20px; width:200px; float:left; background: #657d70;">{$config.s_name}</div><div style="float:left; height: 20px; width:250px; background: #657d70;"><input type="text" name="value" value="{$config.s_value}" maxlength="255" class="login" style="width:180px; color:#000000;" /></div><div style="float:left; background:#657d70; height: 20px; width:40px;"><input type="submit" value="{$g_lang_misc_edit}" class="login" style="width: auto; height: auto; color:#000000;" /></div></form></div>
				{else}
						<div style="height: 17px; width:200px; float:left; background: #657d70;">{$config.s_name}</div><div style="float:left; height: 17px; width:250px; background: #657d70;">{$config.s_value}</div><div style="float:left; background:#657d70; width:40px;"><a href="admin.php?configedit={$config.s_name}#edit" class="link"><img src="theme/{$g_theme_dir}/gfx/edit.png" alt="{$g_lang_misc_edit}" border="0" /></a><a href="admin.php?configedit={$config.s_name}#edit" class="link">{$g_lang_misc_edit}</a></div>
					{/if}
				{/foreach}
		</div>
		
	</fieldset></div>
	<div style="width:556px !important; width:616px;  padding-left:40px; padding-right:40px;"><fieldset><legend style="color: #ffffff;">{$g_lang_admin_email_options}</legend>
		<div style="text-align:center; padding-left:20px;">
			<div style="width:200px; float:left; height: 20px;">{$g_lang_misc_name}</div><div style="float:left;width:250px;height: 20px;">{$g_lang_misc_value}</div>
				{foreach item=config from=$m_admin_options.email}
					<div style="height: 17px; width:200px; float:left; background: #657d70;">{$config.m_subject|truncate:20:"...":true}</div><div style="float:left; height: 17px; width:250px; background: #657d70;">{$config.m_text|truncate:38:"...":true}</div><div style="float:left; background:#657d70; width:40px;"><a href="admin.php?emailedit={$config.m_id}" class="link"><img src="theme/{$g_theme_dir}/gfx/edit.png" alt="{$g_lang_misc_edit}" border="0" /></a><a href="admin.php?emailedit={$config.m_id}" class="link">{$g_lang_misc_edit}</a></div>
				{/foreach}
		</div>
		
	</fieldset></div>

	<form action="admin.php?edit=style" name="styleform" method="post">
	<div style="width:556px !important; width:616px;  padding-left:40px; padding-right:40px;"><fieldset><legend style="color: #ffffff;">{$g_lang_admin_style_options}</legend>
		<div style="text-align:center; padding-left:20px;">
			<div style="width:200px; float:left; height: 20px;">{$g_lang_admin_default_style}</div><div style="float:left;width:250px;height: 20px;">
				<select name="style" class="login" style="color:#000000; height: auto;">{foreach item=config from=$m_admin_options.themes}
					<option value="{$config.s_id}" onclick="document.styleform.submit();" {if $config.s_used > 0}selected="selected"{/if}>{$config.s_name}</option>
				{/foreach}
				</select></div>
				
		</div>
		{if not empty($m_admin_options.newstyle)}
				<br /><br /><div style="float:left; width:525px;"><fieldset><legend style="color: #ffffff;">{$g_lang_admin_install_style}</legend>
				<div style="text-align:center; padding-left:9px; background: #657d70;">
					{foreach item=config from=$m_admin_options.newstyle}
						<div style="height: 26px; width:150px !important; width: 157px; float:left; background: #657d70;">{$config.s_name}</div><div style="float:left; height: 26px; width:300px; background: #657d70;">{$config.s_desc}</div><div style="float:left; height: 26px; background:#657d70; width:40px;"><a href="admin.php?addstyle={$config.s_dir}" class="link"><img src="theme/{$g_theme_dir}/gfx/add.png" alt="{$g_lang_misc_add}" border="0" /></a><a href="admin.php?addstyle={$config.s_dir}" class="link">{$g_lang_misc_add}</a></div>
					{/foreach}
				</div>
				</fieldset>
			</div>
		{/if}
	</fieldset></div>
	</form>

	{if not empty($m_admin_options.menu)}
		<div style="width:556px !important; width:616px;  padding-right:40px; padding-left:40px;"><fieldset><legend style="color: #ffffff;">{$g_lang_admin_menu_options}</legend>
			<div style="float:right; padding-right:25px !important; padding-right: 14px; height: 15px;"><a href="admin.php?add=menu" class="link"><img src="theme/{$g_theme_dir}/gfx/add.png" alt="{$g_lang_misc_add}" border="0" /></a><a href="admin.php?add=menu" class="link">{$g_lang_misc_add}</a></div>
			<br /><br />
			<div style="text-align:center; padding-left:20px;">
					<div style="float:left; height: 17px; width: 120px;">{$g_lang_misc_name}</div>
					<div style="float:left; height: 17px; width: 120px;">{$g_lang_misc_link}</div>
					<div style="float:left; height: 17px; width: 70px;">{$g_lang_admin_menu_type}</div>
					<div style="float:left; height: 17px; width: 80px;">{$g_lang_panel_modules}
</div>
					<div style="float:left; height: 17px; width: 60px;">{$g_lang_misc_status}
</div>
					<div style="float:left; height: 17px; width: 40px;">&nbsp;</div>			
			</div>
			{foreach item=config from=$m_admin_options.menu}
				<div style="width: 500px !important; width: 530px; text-align:center; padding-left:20px;">
					{if not empty($m_admin_edit_menu) and $config.l_id == $m_admin_edit_menu.l_id}
						<form action="admin.php" method="post" id="edit"><input type="hidden" name="editmenu" value="{$config.l_id}" />
							<div style="float:left; height: 21px; width: 120px; background: #657d70;"><input type="text" name="name" style="width: 100px;color: #000000;" maxlength="255" class="login" value="{$config.l_name}" /></div>
							<div style="float:left; height: 21px; width: 110px; background: #657d70;"><input type="text" name="link" style="width:100px; color: #000000;" maxlength="255" class="login" value="{$config.l_link}" /></div>
							<div style="float:left; height: 21px;  width: 120px; background: #657d70;"><select name="type" class="login" style="color: #000000;">	
																	<option {if $config.l_type == 1}selected="selected"{/if} value="1">{$g_lang_misc_private}</option>
																	<option {if $config.l_type == 2}selected="selected"{/if} value="2">{$g_lang_misc_public}</option>
																	<option {if $config.l_type == 3}selected="selected"{/if} value="3">{$g_lang_email_hidden}</option>
																	<option value="4">{$g_lang_misc_delete}</option>						
								</select>
							</div>
							<div style="float:left; height: 21px; width: 130px !important; width: 140px; padding-right: 10px; background: #657d70;"><input type="submit" value="{$g_lang_misc_edit}" class="login" style="width:auto; color: #000000; float: right;"/></div>
						</form>
					{else}
						<div style="float:left; height: 17px; width: 120px; background: #657d70;">{$config.l_name}</div>
						<div style="float:left; height: 17px; width: 120px; background: #657d70;">{$config.l_link|truncate:12:"...":true}</div>
						<div style="float:left; height: 17px; width: 70px; background: #657d70;">{if $config.l_type == 1}{$g_lang_misc_private}{else}{if $config.l_type == 2}{$g_lang_misc_public}{else}{$g_lang_email_hidden}{/if}{/if}</div>
						<div style="float:left; height: 17px; width: 80px; background: #657d70;">{if not empty($config.m_id)}{$m_admin_options.modules[$config.m_id].m_name|truncate:9:"...":true}{else}-{/if}
</div>
						<div style="float:left; height: 17px; width: 60px; background: #657d70;">{if not empty($config.m_id)}{if $m_admin_options.modules[$config.m_id].m_status > 0}{$g_lang_misc_enabled}{else}{$g_lang_misc_disabled}{/if}{else}-{/if}
</div>
						<div style="float:left; height: 17px; width: 40px; background: #657d70;"><a href="admin.php?menuedit={$config.l_id}#edit" class="link"><img src="theme/{$g_theme_dir}/gfx/edit.png" border="0" alt="{$g_lang_misc_edit}" /></a><a href="admin.php?menuedit={$config.l_id}#edit" class="link">{$g_lang_misc_edit}</a></div>			
					{/if}
				</div>
			{/foreach}
				{if $smarty.get.add == 'menu'}
					<div style="width:auto; text-align:center; padding-left:20px; padding-right:0px; background: #657d70;">
						<form action="admin.php" method="post"><input type="hidden" name="addmenu" value="1" />
							<div style="float:left; height: 20px; width: 120px; background: #657d70;"><input type="text" name="name" style="color: #000000;" maxlength="255" class="login"  /></div>
							<div style="float:left; height: 20px; width: 110px; background: #657d70;"><input type="text" name="link" style="color: #000000;" maxlength="255" class="login" /></div>
							<div style="float:left; height: 20px; width: 120px; background: #657d70;"><select name="type" class="login" style="color: #000000;"><option value="1">{$g_lang_misc_private}</option><option value="2">{$g_lang_misc_public}</option></select></div>
							<div style="float:left; height: 20px; width: 130px !important; width: 140px; padding-right: 10px; background: #657d70;"><input type="submit" value="{$g_lang_misc_add}" class="login" style="width:auto; color: #000000;float: right;"/></div>
						</form>
					</div>
				{/if}
		</fieldset></div><br /><br />
	{/if}
{/if}

{if not empty($m_admin_edit_email)}
	<br /><br />
	<form action="admin.php" method="post">
		<div style="width:616px; text-align:center;padding-left:40px; padding-right:40px;">
			<input type="hidden" name="editemail" value="{$smarty.get.emailedit}" />
			<input type="text" name="subject" value="{$m_admin_edit_email.m_subject}" class="login" style="color: #000000; width:400px;" maxlength="255" /><br />
			<textarea class="textbox" name="text" style="width:400px; height:250px;" rows="50" cols="100">{$m_admin_edit_email.m_text}</textarea><br />
			<input type="submit" class="login" value="{$g_lang_misc_edit}" style="color: #000000;"/>
		</div>	
		</form>
{/if}