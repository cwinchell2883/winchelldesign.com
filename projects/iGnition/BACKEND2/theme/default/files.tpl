{*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*}
<div class="title">{$g_lang_files}</div>

{* THE FILE LIST *}
{if not empty($m_file_list)}
	<br />
	<div style="width:616px;">
	{if $g_user->m_user_access.FILEADD > 0}
			<div style="float:right; padding-right:30px;">
				<a href="download.php?add=folder&amp;fo={$smarty.get.fo}" class="link"><img src="theme/{$g_theme_dir}/gfx/add.png" border="0" alt="{$g_lang_folder_add}" /></a><a href="download.php?add=folder&amp;fo={$smarty.get.fo}" class="link">{$g_lang_folder_add}</a>&nbsp;<a href="download.php?add=file&amp;fo={$smarty.get.fo}" class="link"><img src="theme/{$g_theme_dir}/gfx/add.png" border="0" alt="{$g_lang_file_add}" /></a><a href="download.php?add=file&amp;fo={$smarty.get.fo}" class="link">{$g_lang_file_add}</a>
			</div>
	{/if}
	{if not empty($m_folder_list)}
		<div style="width: 616px; padding-left: 80px;">
		<a href="download.php" class="link"><img src="theme/{$g_theme_dir}/gfx/folder.png" border="0" style="height: 13px;" alt="{$g_lang_misc_root}" /></a><a href="download.php" class="link">{$g_lang_misc_root}</a> > 
		{foreach name=list item=folder from=$m_folder_list} 
			{if not empty($folder)}
				{if $smarty.foreach.list.last}
				<a href="download.php?fo={$folder.id}" class="link"><img src="theme/{$g_theme_dir}/gfx/folder.png" border="0" style="height: 13px;" alt="{$folder.name}" /></a><a href="download.php?fo={$folder.id}" class="link">{$folder.name}</a> 
				{else}
				<a href="download.php?fo={$folder.id}" class="link"><img src="theme/{$g_theme_dir}/gfx/folder.png" border="0" style="height: 13px;" alt="{$folder.name}" /></a><a href="download.php?fo={$folder.id}" class="link">{$folder.name}</a> >
				{/if}
			{/if}
		{/foreach}
		</div>
	{/if}
	</div><br /><br />
	<div style="width:590px !important; width:616px; padding-left: 60px;">
		<div style="float: left; width: 5px;">&nbsp;</div>
		<div style="float: left; width: 58%;">{$g_lang_misc_name}</div>
		<div style="float: left; width: 11%;">{$g_lang_misc_size}</div>
		<div style="float: left; width: 5%;">{$g_lang_misc_views}</div>
	</div><br />
	{foreach item=fileitem from=$m_file_list}
		{if isset($fileitem.d_id) and empty($fileitem.f_id)} {* THIS IS THE FOLDER HTML *}
			<div style="width: 618px; padding-left: 40px; height: 19px;">
				<div style="float: left; width: 25px;%;"><a href="download.php?fo={$fileitem.d_id}"><img src="theme/{$g_theme_dir}/gfx/folder.png" border="0" alt="{$fileitem.d_name}" /></a></div>
				<div style="float: left; width: 56%;"><a href="download.php?fo={$fileitem.d_id}" class="link">{$fileitem.d_name|truncate:48:"...":true}</a></div>
				<div style="float: left; width: 11%;">&nbsp;</div>
				<div style="float: left; width: 5%;">&nbsp;</div>
				{if $g_user->m_user_access.FILEEDIT > 0}
					<div style="float: left; padding-left: 10px; padding-right: 10px;"><a href="download.php?fo={$smarty.get.fo}&amp;edit=folder&amp;id={$fileitem.d_id}" class="link"><img src="theme/{$g_theme_dir}/gfx/edit.png" border="0" alt="{$g_lang_misc_edit}" /></a><a href="download.php?fo={$smarty.get.fo}&amp;edit=folder&amp;id={$fileitem.d_id}" class="link">{$g_lang_misc_edit}</a></div>				
				{/if}
				{if $g_user->m_user_access.FILEDEL > 0}
					<div style="padding-left: 10px;"><a href="download.php?fo={$smarty.get.fo}&amp;delete=folder&amp;id={$fileitem.d_id}" class="link"><img src="theme/{$g_theme_dir}/gfx/delete.png" border="0" alt="{$g_lang_misc_delete}" /></a><a href="download.php?fo={$smarty.get.fo}&amp;delete=folder&amp;id={$fileitem.d_id}" class="link">{$g_lang_misc_delete}</a></div>				
				{else}
					<br /><br /> {* my nasty html fix *}
				{/if}
			</div>
		{else}	
			{if isset($fileitem.f_id)}												{* THIS IS THE FILE HTML *}
			<div style="width: 618px; padding-left: 40px; height: 23px;">
				<div style="float: left; width: 25px;"><a href="download.php?d={$fileitem.f_id}"><img src="theme/{$g_theme_dir}/gfx/file.png" border="0" alt="{$fileitem.f_name}" /></a></div>
				<div style="float: left; width: 56%;"><a href="download.php?d={$fileitem.f_id}" class="link">{$fileitem.f_name|truncate:48:"...":true}</a></div>
				<div style="float: left; width: 11%;">
				{* Measure the size of the file and decide if to print out in MB or KB *}
				{if $fileitem.f_size > 1024}
					{if $fileitem.f_size > 512000}
						{math|string_format:"%.2f" equation="x/1024000" x=$fileitem.f_size} GB
					{else}					
						{math|string_format:"%.2f" equation="x/1024" x=$fileitem.f_size} MB
					{/if}				
				{else}
					{$fileitem.f_size|string_format:"%.0f"} KB
				{/if}	</div>
				
				<div style="float: left; width: 5%;">{$fileitem.f_down}</div>
				{if $g_user->m_user_access.FILEEDIT > 0}
					<div style="float:left; padding-left: 10px; padding-right: 10px;"><a href="download.php?fo={$smarty.get.fo}&amp;edit=file&amp;id={$fileitem.f_id}" class="link"><img src="theme/{$g_theme_dir}/gfx/edit.png" border="0" alt="{$g_lang_misc_edit}" /></a><a href="download.php?fo={$smarty.get.fo}&amp;edit=file&amp;id={$fileitem.f_id}" class="link">{$g_lang_misc_edit}</a></div>				
				{/if}
				{if $g_user->m_user_access.FILEDEL > 0}
					<div style="padding-left: 10px;"><a href="download.php?fo={$smarty.get.fo}&amp;delete=file&amp;id={$fileitem.f_id}" class="link"><img src="theme/{$g_theme_dir}/gfx/delete.png" border="0" alt="{$g_lang_misc_delete}" /></a><a href="download.php?fo={$smarty.get.fo}&amp;delete=file&amp;id={$fileitem.f_id}" class="link">{$g_lang_misc_delete}</a></div>				
				{/if}
			</div>
			{/if}
		{/if}
	{/foreach}
{/if}

{* FILE DISPLAY *}
{if not empty($m_file_display)}
	<div style="padding-left: 30px; width:110px; float:left;">
		<div style="width:100px; height:100px;"><img src="{$m_file_display.f_img}" style="height:100px; width:100px;" alt="{$m_file_display.f_name}" /></div>
	</div>
	<div style="width: 400px !important; width:410px; padding-left: 0px !important; padding-left: 10px; float:left; padding-bottom: 40px;">	
		<div style="width:200px; float:left;">{$g_lang_misc_name}:</div><div style="width: 200px; float:left;">{$m_file_display.f_name}</div>
		<div style="width:200px; float:left;">{$g_lang_file_size}:</div><div style="width: 200px; float:left;">
					{* Measure the size of the file and decide if to print out in MB or KB *}				
					{if $m_file_display.f_size > 1024}
						{if $m_file_display.f_size > 512000}
							{math|string_format:"%.2f" equation="x/1024000" x=$m_file_display.f_size} GB
						{else}					
							{math|string_format:"%.2f" equation="x/1024" x=$m_file_display.f_size} MB
						{/if}				
					{else}
						{$m_file_display.f_size|string_format:"%.0f"} KB
					{/if}</div>
		<div style="width:200px; float:left;">{$g_lang_misc_date}:</div><div style="width:200px; float:left;">{$m_file_display.f_date|date_format:$g_site_config.dateformat}</div>
		<div style="width:200px; float:left;">{$g_lang_file_uploaded}:</div><div style="width:200px; float:left;"><a href="users.php?user={$m_file_display.u_id}" class="link">{$m_file_display.u_name}</a></div>
		<div style="width:200px; float:left;">{$g_lang_file_downloads}:</div><div style="width:200px; float:left;">{$m_file_display.f_down}</div>
		<div style="width:200px; float:left; padding-top: 15px;">
					{if $m_file_display.f_loc == "#"}
						{$g_lang_file_login}
					{else}
						<a href="download.php?f={$m_file_display.f_id}">{$g_lang_download_file}</a>
					{/if}
		</div>
	</div>
	<div style="padding-left: 40px; width:500px;">{$m_file_display.f_desc|nl2br}</div>
{/if}

{* FILE ADD AND EDIT *}
{if not empty($m_file_add) || not empty($m_file_edit)}
	<br />
	<form enctype="multipart/form-data" action="download.php?fo={$smarty.get.fo}" method="post"><input type="hidden" name="{if not empty($m_file_add)}add{else}edit{/if}" value="file" />
		<div style="width: 616px; text-align:center; padding-left:10px; padding-right:10px;"><fieldset><legend style="color:#ffffff;">{$g_lang_misc_description}</legend>
			<div style="text-align:left; padding-left: 100px;">
				{$g_lang_misc_name} <input type="text" name="name" {if not empty($m_file_edit)}value="{$m_file_edit.f_name}"{/if} maxlength="255" style="width: 200px; color:#000000;" class="login"/><br />
				<input type="checkbox" name="public" value="1"{if not empty($m_file_edit) && $m_file_edit.f_public > 0} checked="checked"{/if} /> {$g_lang_misc_make_public}<br />
				<textarea name="description" style="width:400px; height:200px; color:#000000;" class="textbox" rows="50" cols="100">{if not empty($m_file_edit)}{$m_file_edit.f_desc}{/if}</textarea>
			</div>
			</fieldset>
		</div>
		<div style="width: 616px; padding-left:10px; padding-right:10px;"><fieldset><legend style="color:#ffffff;">{$g_lang_file_options}</legend>
				
				
				<div style="float:right; padding-right: 0px; width:210px;"><fieldset><legend style="color:#ffffff;">{$g_lang_file_preview_image}</legend>
						<div style="text-align:center"><img src="{if not empty($m_file_edit)}{$m_file_edit.f_img}{else}{$g_site_config.photodefault}{/if}" style="width:100px; height: 100px;" alt="{$g_lang_file_change_preview_image}" /></div>
						<div>{$g_lang_file_change_preview_image}</div>
						<div><input type="file" name="preview" class="login" style="color:#000000; width:185px;" /></div>
						<div>{$g_lang_user_url_image}</div>
						<div><input type="text" name="previewlink" class="login" style="color:#000000; width:185px;" /></div>
				</fieldset></div>
				
				
				<div style="width:370px;padding-left:10px;"><fieldset><legend style="color:#ffffff;">{$g_lang_misc_upload}</legend>
				{if not empty($m_file_add)}
					{$g_lang_misc_upload} <input type="file" name="upload" class="login" style="width: 200px; color: #000000;" /><br />
					{$g_lang_file_link_to}&nbsp; http://<input type="text" name="weblink" class="login" style="color: #000000;width:125px;" maxlength="200" /><br />{/if}
					{$g_lang_file_link_to_size} <input type="text" name="websize" maxlength="255" class="login" style="color: #000000; width: 50px;" value="{$m_file_edit.f_size}" />
				</fieldset></div>
				
				
				<div style="width:370px; padding-left: 10px;"><fieldset><legend style="color:#ffffff;">{$g_lang_file_directory}</legend>&nbsp;
				{if not empty($m_file_edit)}<input type="hidden" name="id" value="{$m_file_edit.f_id}" />{else}<input type="hidden" name="folder" value="{$smarty.get.fo}" />{/if}
				{if not empty($m_folder_list)}
					<a href="download.php?{if not empty($m_file_add)}add=file{/if}" class="link"><img src="theme/{$g_theme_dir}/gfx/folder.png" border="0" style="height: 13px;" /></a><a href="download.php?{if not empty($m_file_add)}add=file{/if}" class="link">{$g_lang_misc_root}</a> > 
					{foreach name=list item=folder from=$m_folder_list} 
						{if not empty($folder)}
							{if $smarty.foreach.list.last}
								<a href="download.php?{if not empty($m_file_add)}add=file&amp;{/if}fo={$folder.id}" class="link"><img src="theme/{$g_theme_dir}/gfx/folder.png" border="0" style="height:13px;" /></a><a href="download.php?{if not empty($m_file_add)}add=file&amp;{/if}fo={$folder.id}" class="link">{$folder.name}</a>
							{else}
								<a href="download.php?{if not empty($m_file_add)}add=file&amp;{/if}fo={$folder.id}" class="link"><img src="theme/{$g_theme_dir}/gfx/folder.png" border="0" style="height:13px;" /><a href="download.php?{if not empty($m_file_add)}add=file&amp;{/if}fo={$folder.id}" class="link">{$folder.name}</a> >
							{/if}
						{/if}
					{/foreach}
				{/if}
				</fieldset></div>
				
		</fieldset>
		</div>
		
		<div style="padding-left: 500px;"><input type="submit" class="login" style="color:#000000;" value="{if not empty($m_file_edit)}{$g_lang_file_edit}{else}{$g_lang_file_add}{/if}" /></div>
	</form><br /><br />
{/if}

{*FOLDER ADD AND EDIT*}
{if not empty($m_folder_add) || not empty($m_folder_edit)}<br /><br />
	<div style="padding-left:200px; width: 200px !important; width: 400px;">
		<form action="download.php?fo={$smarty.get.fo}" method="post"><input type="hidden" name="{if not empty($m_folder_add)}add{else}edit{/if}" value="folder" />{if not empty($m_folder_edit)}<input type="hidden" name="id" value="{$m_folder_edit.d_id}" />{else}<input type="hidden" name="folder" value="{$smarty.get.fo}" />{/if}
			<div style="width: 100px; float:left;">{$g_lang_misc_name}</div><div style="float:left; width:100px;"><input type="text" name="name" maxlength="255" {if not empty($m_folder_edit)}value="{$m_folder_edit.d_name}"{/if} class="login" style="color:#000000;"/></div>
			<div style="width: 100px; float:left;">{$g_lang_misc_make_public}</div><div style="float:left; width:50px;"><input type="checkbox" name="public" value="1"{if not empty($m_folder_edit) && $m_folder_edit.d_public > 0} checked="checked"{/if} /></div>
			<div style="width: 200px;">{$g_lang_misc_description}</div>
			<div><textarea name="description" class="textbox" style="color:#000000; width: 213px; height: 100px;" rows="50" cols="100">{if not empty($m_folder_edit)}{$m_folder_edit.d_desc}{/if}</textarea></div>
			<div style=""><input type="submit" value="{if not empty($m_folder_add)}{$g_lang_folder_add}{else}{$g_lang_folder_edit}{/if}" class="login" style="color: #000000;"/></div>
		</form>
	</div>
{/if} 