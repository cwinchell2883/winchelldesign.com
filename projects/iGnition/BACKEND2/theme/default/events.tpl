{*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*}
<div class="title">
	{$g_lang_events}
</div>

{* LIST ALL THE EVENTS ON THE MAIN PAGE *}
{if not empty($m_events_list)}
	{if $g_user->m_user_access.EVENTADD > 0}
		<br />
		<div style="width: 130px;float:right;"><a href="events.php?add=event" class="link"><img src="theme/{$g_theme_dir}/gfx/add.png" alt="{$g_lang_events_add}" border="0" /></a><a href="events.php?add=event" class="link">{$g_lang_events_add}</a></div>
	{/if}
	<br /><br />
	<div style="width:616px !important; width: 650px; padding-left:30px; padding-right:30px; height: 17px;">
		<div style="float:left; width:180px;">{$g_lang_misc_name}</div>
		<div style="float:left; width:190px;">{$g_lang_misc_description}</div>
		<div style="float: left; width:115px;">{$g_lang_events_start_date}</div>
	</div>
	{if $m_events_list != NULL and $m_events_list != 'NULL'}
		{foreach item=eventlist from=$m_events_list} 
			{strip}
				<div style="width:616px !important; width: 650px; padding-left:30px; height:17px;">
					<div style="float:left; width:180px;"><a href="events.php?event={$eventlist.e_id}" class="link">{$eventlist.e_name}</a></div>
					<div style="float:left; width:190px;">{$eventlist.e_desc|truncate:30:"...":true}</div>
					<div style="float: left; width:115px;">{$eventlist.e_date|date_format:$g_site_config.dateformat}</div>
					{if $g_user->m_user_access.EVENTEDIT > 0}
						<div style="float: left; width:auto; padding-left: 10px;"><a href="events.php?edit={$eventlist.e_id}" class="link"><img src="theme/{$g_theme_dir}/gfx/edit.png" border="0" alt="{$g_lang_misc_edit}" /></a><a href="events.php?edit={$eventlist.e_id}" class="link">{$g_lang_misc_edit}</a></div>
					{/if}
					{if $g_user->m_user_access.EVENTDEL > 0}
						<div style="float: left; width:auto; padding-left: 10px;"><a href="events.php?delete={$eventlist.e_id}" class="link"><img src="theme/{$g_theme_dir}/gfx/delete.png" border="0" alt="{$g_lang_misc_delete}" /></a><a href="events.php?delete={$eventlist.e_id}" class="link">{$g_lang_misc_delete}</a></div>
					{/if}
				</div>
			{/strip}
		{/foreach}
	{/if}
{/if}

{* DISPLAY AN EVENT TO THE SCREEN *}
{if not empty($m_events_display)}
	<div style="width:616px; padding-left:10px; padding-right:10px;">
		<div style="float:left; width:100px; height:100px; padding-right: 20px;"><fieldset style="height:auto; width:100px;"><legend style="color: #ffffff;">{$g_lang_misc_picture}</legend>
			<a href="{$m_events_display.e_img}" class="link"><img src="{$m_events_display.e_img}" alt="{$m_events_display.e_name}" border="0" style="width:100px; height:100px;" /></a>
		</fieldset></div>
		<div style="width:auto; height: auto; margin-right:10px;"><fieldset><legend style="color: #ffffff;">{$g_lang_misc_details}</legend>
			<div style="float: left; width: 100px; padding-left:30px;">{$g_lang_misc_name}</div><div style="width: auto; padding-left: 10px;">{$m_events_display.e_name}</div>
			<div style="float: left; width: 100px; padding-left:30px;">{$g_lang_events_start_date}</div><div style="width: auto; padding-left: 10px;">{$m_events_display.e_date|date_format:$g_site_config.dateformat}</div>
		</fieldset></div>
		<div style="width: auto; height: auto;margin-right:10px;"><fieldset><legend style="color: #ffffff;">{$g_lang_misc_description}</legend>
			{$m_events_display.e_desc|nl2br}
		</fieldset></div>
		{if not empty($m_events_display.e_report)}
		<div style="width:486px !important; width: 586px; height: auto; padding-left: 120px !important; padding-left: 135px;"><fieldset><legend style="color: #ffffff;">{$g_lang_misc_report}</legend>
			{$m_events_display.e_report|nl2br}
		</fieldset></div>
		{/if}
	</div>


{/if}

{* ADD OR EDIT AN EVENT*}
{if not empty($m_events_add) || not empty($m_events_edit)}
	<form name="event" enctype="multipart/form-data" action="events.php" method="post">{if empty($m_events_add)}<input type="hidden" name="edit" value="{$smarty.get.edit}" />{else}<input type="hidden" name="add" value="1" />{/if}
	<div style="width:450px; margin: 0 auto; padding-left: 10px !important; padding-left:100px; padding-right:10px;"><fieldset style="height: {if empty($m_events_edit)}320{else}470{/if}px; width:450px;"><legend style="color:#ffffff;"> {if empty($m_events_add)}{$g_lang_events_edit}{else}{$g_lang_events_add}{/if}</legend>
		
		<div style="height: 19px; padding-left: 40px; padding-top: 20px;">
			<div style="float:left;height: 19px; width: 200px;">{$g_lang_misc_name}</div><div style="float:left; width:100px;"><input type="text" name="name" class="login" maxlength="255" style="color: #000000;" {if not empty($m_events_edit)}value="{$m_events_edit.e_name}"{/if} /></div>
		</div><div style="height: 23px;  padding-left: 40px;">
			<div style="float:left;height: 19px; width: 200px;">{$g_lang_events_start_date}</div><div style="width: 100px;">
			{literal}<script language="JavaScript" type="text/javascript">
					<!--		
						var GC_SET_0 = {
							'appearance': GC_APPEARANCE,
							'dataArea':'startdate',
							'dateFormat' : 'd-m-Y'
						}
						new gCalendar(GC_SET_0);
						document.forms['event'].elements['startdate'].value = '{/literal}{if not empty($m_events_edit)}{$m_events_edit.e_date|date_format:"%d-%m-%Y"}{else}{$smarty.now|date_format:"%d-%m-%Y"}{/if}{literal}';
					//-->
					</script>{/literal}</div>
		</div><div style="height: 19px; padding-left: 40px;">
			<div style="float:left;height: 19px; width: 200px;">{$g_lang_misc_make_public}</div><div style="float:left; width:100px;"><input type="checkbox" name="public" value="1" {if $m_events_edit.e_public > 0}checked="checked"{/if} /></div>
		</div><div style="height: 23px; padding-left: 40px;">
			<div style="float:left;height: 19px; width: 200px;">{$g_lang_image_upload}</div><div style="float:left; width:100px;"><input type="file" name="image" class="login" style="color: #000000;" /></div>
		</div><div style="height: 23px; padding-left: 40px;">
			<div style="float:left;height: 19px; width: 200px;">{$g_lang_user_url_image}</div><div style="float:left; width:100px;"><input type="text" name="weblink" class="login" style="color: #000000;" value="{$m_events_edit.e_img}" maxlength="255" /></div>
		</div><div style="height: 23px; padding-left: 40px;">
			<div style="float:left; height: 19px; width: 200px !important; width: 198px;">{$g_lang_misc_description}</div><div style="float:left; width:200px;"><textarea name="description" class="textbox" style="color: #000000; width:200px; height:150px;" rows="50" cols="100">{$m_events_edit.e_desc}</textarea>
		</div>
		{if not empty($m_events_edit)}
			<div style="float:left;height: 19px; width: 200px !important; width: 198px;">{$g_lang_misc_report}</div><div style="float:left; width:200px;"><textarea name="report" class="textbox" style="color: #000000; width:200px; height:150px;" rows="50" cols="100">{$m_events_edit.e_report}</textarea></div>
		{/if}
			<div style="float:right;height: 19px; width: 200px;"><input type="submit" value="{if not empty($m_events_add)}{$g_lang_misc_add}{else}{$g_lang_misc_edit}{/if}" class="login" style="width:auto; color: #000000;" /></div>
		</div>
	</fieldset></div>
		</form><br />
{/if}