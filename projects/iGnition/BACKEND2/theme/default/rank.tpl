{*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*}
<div class="title">{$g_lang_ranks}</div>

{* THE RANK LIST *}
{if not empty($m_rank_list)}
	<br />
	{if $g_user->m_user_access.RANKADD > 0}
		<div style="text-align:right; padding-right:30px;">
				<br /><a href="ranks.php?add=rank" class="link"><img src="theme/{$g_theme_dir}/gfx/add.png" border="0" alt="{$g_lang_rank_add}" /></a><a href="ranks.php?add=rank" class="link">{$g_lang_rank_add}</a>
		</div>
	{/if}
	<div style="padding-left: 110px; height: 25px;">
		<div style="float: left; width: 25px;">&nbsp;&nbsp;&nbsp;</div>
		<div style="float: left; width: 200px;; padding-left:5px;">{$g_lang_misc_name}</div>
		<div style="float: left; width: 100px;">{$g_lang_rank_total_users}</div>
	</div>
	{foreach name=ranklist item=ranks from=$m_rank_list} 
		<div style="padding-left: 110px; height: 25px;">
			<div style="float: left; width: 25px;">{if not empty($ranks.r_img) || $ranks.r_img != NULL}<img src="{$ranks.r_img}" alt="" style="width:25px; height:25px;" />{else}&nbsp;&nbsp;&nbsp;{/if}</div>
			<div style="float: left; width: 200px; padding-left: 5px;">{$ranks.r_name}</div>
			<div style="float: left; width: 100px;">{$ranks.totalusers}</div>
			{if $g_user->m_user_access.RANKEDIT > 0}
				<div style="float: left; width:50px;"><a href="ranks.php?edit={$ranks.r_id}" class="link"><img src="theme/{$g_theme_dir}/gfx/edit.png" alt="{$g_lang_misc_edit}" border="0" /></a><a href="ranks.php?edit={$ranks.r_id}" class="link">{$g_lang_misc_edit}</a></div>
			{/if}
			{if $g_user->m_user_access.RANKDEL > 0}
				<div style="float: left; width:60px;"><a href="ranks.php?delete={$ranks.r_id}" class="link"><img src="theme/{$g_theme_dir}/gfx/delete.png" alt="{$g_lang_misc_delete}" border="0" /></a><a href="ranks.php?delete={$ranks.r_id}" class="link">{$g_lang_misc_delete}</a></div>
			{/if}
		</div>
	{/foreach}
{/if}

{* ADD AND EDIT RANK *}
{if not empty($m_rank_add) && $g_user->m_user_access.RANKADD > 0 || not empty($m_rank_edit) && $g_user->m_user_access.RANKEDIT > 0}
	<div style="width:516px; text-align:center;">
	<form enctype="multipart/form-data" action="ranks.php" method="post">
		<br />{if not empty($m_rank_edit)}<input type="hidden" name="edit" value="{$smarty.get.edit}" />{else}<input type="hidden" name="add" value="1" />{/if}
		<div style="padding-left:100px; width:400px; height: 40px; text-align:left;">
			<div style="float: left; width: 200px;"> {$g_lang_misc_name}  </div><div style="float:left; width:200px;"><input type="text" name="name" class="login" style="width:150px; color:#000000;" maxlength="255" {if not empty($m_rank_edit)}value="{$m_rank_edit.r_name}"{/if} /></div>	
			<div style="float:left; width:200px;"> {$g_lang_image_upload} </div><div style="float:left; width:200px;"><input type="file" name="image" class="login" style="width:150px; color:#000000;" /></div>
			<div style="float:left; width:200px;"> {$g_lang_user_url_image}</div><div style="float:left;width:200px;">{if not empty($m_rank_add)}http://{/if}<input type="text" name="weblink" class="login" style="width:150px; color:#000000;" maxlength="255" value="{$m_rank_edit.r_img}" /></div>
		</div>
		<div style="padding-top: 50px !important; padding-top:20px; padding-left:100px; width:400px !important; width:500px;"><fieldset><legend style="color: #ffffff;">{$g_lang_rank_select}</legend><br />
			<div style="height: 15px;">
				<div style="float:left; width:150px;">{$g_lang_rank_module_name}</div>
				<div style="float:left; width:30px;">{$g_lang_misc_view}</div>
				<div style="float:left; width:30px;">{$g_lang_misc_add}</div>
				<div style="float:left; width:30px;">{$g_lang_misc_edit}</div>
				<div style="float:left; width:30px;">{$g_lang_misc_delete}</div>
				<div style="float:left; padding-left: 30px; width: 50px;">{$g_lang_misc_status}</div>
			</div><br />{strip}
			{foreach name=modulelist item=module from=$m_rank_vars}
				{if $moduleId != $module.m_id}
					{* END THE OLD LINES DIV *}
					{if not empty($moduleId)}
							{section name=skip start=$varType loop=4-$varType step=1}
								<div style="float:left; width:30px;">&nbsp;</div>
							{/section}
							<div style="float:left; padding-left: 30px; width: 50px;">{if $lastmodule.m_status > 0}{$g_lang_misc_enabled}{else}{$g_lang_misc_disabled}{/if}</div>
						</div><br />{*End old line*}
					{/if}
					
					{* NEW LINE OF A MODULE *}
					{assign var="moduleId" value=$module.m_id}
					{assign var="varType" value=0}
					<div style="height: 6px;"> {* start new line *}
						<div style="float:left; width: 150px;">{$module.m_name}</div>
				{/if}
					{if $module.v_type != $varType}
						{section name=skip start=$varType loop=$module.v_type step=1}
							<div style="float:left; width:30px;">&nbsp;</div>
						{/section}
					{/if}
						<div style="float:left; width:30px;"><input type="checkbox" name="module[{$module.v_id}]" value="1" {if not empty($m_rank_edit) && $m_rank_edit.vars[$module.v_id].r_value > 0}checked="checked"{/if} /></div>
					
					{assign var="varType" value=$module.v_type+1}	
					{assign var="lastmodule" value=$module}							
			{/foreach}
			{/strip}				
				<div style="float:left; padding-left: 30px; width: 50px;">{if $lastmodule.m_status > 0}{$g_lang_misc_enabled}{else}{$g_lang_misc_disabled}{/if}</div>
				</div> {*End old line*}
				<br /><br />
		</fieldset></div>
		<br />
		<div style="width: 500px; text-align:center;"><input type="submit" class="login" style="color:#000000;" value="{if not empty($m_rank_add)}{$g_lang_rank_add}{else}{$g_lang_rank_edit}{/if}" /></div>
	</form>
	</div><br /><br />
{/if}