{*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*}
<div class="title">
{$g_lang_module}
</div>


{if not empty($m_module_list) && $g_user->m_user_access.ADMIN  > 0}
	<div style="width:616px; padding-left: 10px; padding-right:10px;"><fieldset><legend style="color: #ffffff;">{$g_lang_module_settings}</legend>
		<div style="padding-left: 100px; height: 19px;">
			<div style="float:left; width: 150px;">{$g_lang_misc_name}</div>
			<div style="float:left; width: 150px;">{$g_lang_misc_version}</div>
		</div>
		{foreach name=list item=module from=$m_module_list.modules} 
		<div style="height: 19px; background: #657d70;">
			<div style="float:left; width: 150px !important; width:250px; text-align:right; padding-right:110px;">{$module.m_name}</div>
			<div style="float:left; width: 130px;">{$module.m_version}</div>
			<div style="float:left; width: 70px;">{if $module.m_id > 4}{if $module.m_status > 0}<a href="modules.php?disable={$module.m_id}" class="link"><img src="theme/{$g_theme_dir}/gfx/edit.png" alt="{$g_lang_misc_disable}" border="0" /></a><a href="modules.php?disable={$module.m_id}" class="link">{$g_lang_misc_disable}</a>{else}<a href="modules.php?enable={$module.m_id}" class="link"><img src="theme/{$g_theme_dir}/gfx/edit.png" alt="{$g_lang_misc_enable}" border="0" /></a><a href="modules.php?enable={$module.m_id}" class="link">{$g_lang_misc_enable}</a>{/if}{/if}</div>
			<div style="float:left; width: 70px;">{if $module.m_id > 10}<a href="modules.php?uninstall={$module.m_id}" class="link"><img src="theme/{$g_theme_dir}/gfx/delete.png" alt="{$g_lang_misc_uninstall}" border="0" /></a><a href="modules.php?uninstall={$module.m_id}" class="link">{$g_lang_misc_uninstall}</a>{/if}</div>
		</div>
		{/foreach}
	</fieldset></div>

	{if not empty($m_module_list.newmodules)}
		<div style="width:616px; padding-left: 10px; padding-right:10px;"><fieldset><legend style="color: #ffffff;">{$g_lang_module_install}</legend>
		<div style="padding-left: 20px; height: 19px;">
			<div style="float:left; width: 100px;">{$g_lang_misc_name}</div>
			<div style="float:left; width: 200px;">{$g_lang_misc_description}</div>
			<div style="float:left; width: 70px;">{$g_lang_misc_version}</div>
			<div style="float:left; width: 150px;">{$g_lang_misc_author}</div>
			
		</div>
		{foreach name=list item=module from=$m_module_list.newmodules} 
		<div style=" height: 26px; background: #657d70;">
			<div style="float:left; width: 100px; padding-left:10px;">{$module.m_name}</div>
			<div style="float:left; width: 200px !important; width: 220px; padding-left:10px; background: #657d70;">{$module.m_desc}</div>
			<div style="float:left; width: 30px !important; width: 50px; padding-left:10px;">{$module.m_version}</div>
			<div style="float:left; width: 150px !important; width: 140px; padding-left:10px;">{$module.m_author}</div>
			<div style="float:left; width: 60px; padding-left:10px;"><a href="modules.php?add={$module.m_dir}" class="link"><img src="theme/{$g_theme_dir}/gfx/add.png" border="0" alt="{$g_lang_misc_install}" /></a><a href="modules.php?add={$module.m_dir}" class="link">{$g_lang_misc_install}</a></div>
		</div>
		{/foreach}
		</fieldset></div>
	{/if}
{/if}