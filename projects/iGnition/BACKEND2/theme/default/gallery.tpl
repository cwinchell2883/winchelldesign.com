{*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*}
<div class="title">
{$g_lang_gallery}
</div>

{* DISPLAY THE SCREENSHOT *}
{if not empty($m_gallery_display)}
	<br />
	<div style="width: 616px; text-align: center;"><img src="{$m_gallery_display[0].p_loc}" alt="{$m_gallery_display[0].p_loc}" style="width:400px; height:300px;" /></div>
{/if}


{if not empty($m_gallery_list)}
{strip}	
	<br />
	<div style="width:616px; height: 40px;">
	{if not empty($m_folder_list)}
		<div style="padding-left: 40px; float: left;"><a href="gallery.php" class="link"><img src="theme/{$g_theme_dir}/gfx/folder.png" border="0" style="height: 13px;" alt="{$g_lang_misc_root}" /></a><a href="gallery.php" class="link">{$g_lang_misc_root}</a> > 
			{foreach name=list item=folder from=$m_folder_list} 
				{if not empty($folder)}
					{if $smarty.foreach.list.last}
					<a href="gallery.php?fo={$folder.id}" class="link"><img src="theme/{$g_theme_dir}/gfx/folder.png" border="0" style="height: 13px;" alt="{$folder.name}" /></a><a href="gallery.php?fo={$folder.id}" class="link">{$folder.name}</a> 
					{else}
					<a href="gallery.php?fo={$folder.id}" class="link"><img src="theme/{$g_theme_dir}/gfx/folder.png" border="0" style="height: 13px;" alt="{$folder.name}" /></a><a href="gallery.php?fo={$folder.id}" class="link">{$folder.name}</a> >
					{/if}
				{/if}
			{/foreach}
			</div>
	{/if}
	{if $g_user->m_user_access.SCRNADD > 0}
		<div style="float: right; padding-right: 20px;"><a href="gallery.php?add=folder&amp;fo={$smarty.get.fo}" class="link"><img src="theme/{$g_theme_dir}/gfx/add.png" border="0" alt="{$g_lang_folder_add}" /></a><a href="gallery.php?add=folder&amp;fo={$smarty.get.fo}" class="link">{$g_lang_folder_add}</a>&nbsp;<a href="gallery.php?add=photo&amp;fo={$smarty.get.fo}" class="link"><img src="theme/{$g_theme_dir}/gfx/add.png" border="0" alt="{$g_lang_image_add}" /></a><a href="gallery.php?add=photo&amp;fo={$smarty.get.fo}" class="link">{$g_lang_image_add}</a></div>
	{/if}
	</div>
	<div style="width:616px; padding-left: 60px; height: 25px;">
		<div style="float: left; width: 5px;">&nbsp;</div>
		<div style="float: left; width: 58%;">{$g_lang_misc_name}</div>
		<div style="float: left; width: 14%;">{$g_lang_misc_date}</div>
		<div style="float: left; width: 5%;">{$g_lang_misc_views}</div>
	</div>
	{if $m_gallery_list != 'NULL'}
		{foreach item=photoitem from=$m_gallery_list}
			{if not empty($photoitem.g_id) && empty($photoitem.p_id)}
				<div style="width:616px; padding-left: 40px; height: 19px;">
					<div style="float: left; width: 5px;"><a href="gallery.php?fo={$photoitem.g_id}"><img src="theme/{$g_theme_dir}/gfx/folder.png" border="0" alt="{$photoitem.g_name}" /></a></div>
					<div style="float: left; width: 48%; padding-left: 20px;"><a href="gallery.php?fo={$photoitem.g_id}" class="link">{$photoitem.g_name}</a></div>
					<div style="float: left; width: 23%;">&nbsp;</div>
					<div style="float: left; width: 7%;">&nbsp;</div>
					{if $g_user->m_user_access.SCRNDEL > 0}
					<div style="float: left; width: 60px;"><a href="gallery.php?fo={$smarty.get.fo}&amp;delete=folder&amp;id={$photoitem.g_id}" class="link"><img src="theme/{$g_theme_dir}/gfx/delete.png" border="0" alt="{$g_lang_misc_delete}" /></a><a href="gallery.php?fo={$smarty.get.fo}&amp;delete=folder&amp;id={$photoitem.g_id}" class="link">{$g_lang_misc_delete}</a></div>
					{/if}
				</div>
			{else}
				<div style="width:616px; padding-left: 40px; height: 23px;">
					<div style="float: left; width: 5px;"><a href="gallery.php?p={$photoitem.p_id}" class="link"><img src="theme/{$g_theme_dir}/gfx/file.png" border="0" alt="{$photoitem.p_name}" /></a></div>
					<div style="float: left; width: 48%; padding-left: 20px;"><a href="gallery.php?p={$photoitem.p_id}" class="link">{$photoitem.p_name}</a></div>
					<div style="float: left; width: 23%;">{$photoitem.p_date|date_format:$g_site_config.dateformat}</div>
					<div style="float: left; width: 7%;">{$photoitem.p_view}</div>
					{if $g_user->m_user_access.SCRNDEL > 0}
						<div style="float: left; width: 60px;"><a href="gallery.php?fo={$smarty.get.fo}&amp;delete=photo&amp;id={$photoitem.p_id}" class="link"><img src="theme/{$g_theme_dir}/gfx/delete.png" border="0" alt="{$g_lang_misc_delete}" /></a><a href="gallery.php?fo={$smarty.get.fo}&amp;delete=photo&amp;id={$photoitem.p_id}" class="link">{$g_lang_misc_delete}</a></div>
					{/if}
				</div>
			{/if}
		{/foreach} 
	{/if}
{/strip}
{/if}

{* ADD AND EDIT FOLDERS *} 
{* NOTE: YOU CAN'T INFACT EDIT FOLDERS OR PHOTOS YET BUT PUT THIS IN ANYWAY FOR THE FUTURE *}
{if not empty($m_folder_add) || not empty($m_folder_edit)}
		<br />
		<form action="gallery.php?fo={$smarty.get.fo}" method="post"><input type="hidden" name="{if not empty($m_folder_add)}add{else}edit{/if}" value="folder" />{if not empty($m_folder_edit)}<input type="hidden" name="id" value="{$m_folder_edit.d_id}" />{else}<input type="hidden" name="folder" value="{$smarty.get.fo}" />{/if}
	<div style="width: 200px !important; width:400px; padding-left: 200px;">
		<div style=" float:left; width: 100px;">{$g_lang_misc_name}</div><div style="float:left; width:100px;"><input type="text" name="name" class="login" style="color: #000000;" maxlength="255" {if not empty($m_folder_edit)}value="{$m_folder_edit.d_name}"{/if} /></div>
		<div style="float:left;width:100px;">{$g_lang_misc_make_public}</div><div style="float:left; width:100px;"><input type="checkbox" name="public" value="1"{if not empty($m_folder_edit) && $m_folder_edit.d_public > 0} checked{/if} /></div>
		<div style="">{$g_lang_misc_description}</div>
		<div><textarea name="description"  class="textbox" style="color: #000000; width: 213px; height: 100px;" rows="50" cols="100">{if not empty($m_folder_edit)}{$m_folder_edit.d_desc}{/if}</textarea></div>
		<div style=""><input type="submit" class="login" style="color: #000000;" value="{if not empty($m_folder_add)}{$g_lang_folder_add}{else}{$g_lang_folder_edit}{/if}" /></div>
	</div>
	</form>
{/if}

{* ADD AND EDIT PHOTOS *}
{if not empty($m_photo_add) || not empty($m_photo_edit)}
		<br />
		<div style="width:616px;padding-left: 10px; padding-right:10px;"><fieldset><legend style="color: #ffffff;">{$g_lang_image_add}</legend>
			<form action="gallery.php?fo={$smarty.get.fo}" enctype="multipart/form-data" method="post"><input type="hidden" name="{if not empty($m_photo_add)}add{else}edit{/if}" value="photo" />{if not empty($m_photo_edit)}<input type="hidden" name="id" value="{$m_photo_edit.g_id}" />{else}<input type="hidden" name="folder" value="{$smarty.get.fo}" />{/if}
			
			<div style="padding-left: 100px;">	
				<div style="width: 150px; float:left;">{$g_lang_misc_name}</div><div style="width: 300px;"><input type="text" maxlength="255" name="name" class="login" style="color: #000000; width: 150px;" /></div>
				<div style="width: 150px; float:left;">{$g_lang_misc_make_public}</div><div style="width:300px;"><input type="checkbox" name="public" value="1" /></div>
				<div style="width: 150px; float:left; ">{$g_lang_image_upload}</div><div style="width: 300px;"><input type="file" class="login" style="color: #000000; width:150px;" name="image" /></div>
				<div style="width: 150px; float:left;">{$g_lang_user_url_image}</div><div style="width:400px !important; width:300px; height: 30px;">http://<input type="text" name="weblink" class="login" maxlength="255" style="color: #000000; width: 150px;"/></div>
				<div style="width: 150px; float:left;">{$g_lang_misc_description}</div><div style="width:400px !important; width:300px;"><textarea name="description" class="textbox" style="color: #000000; width: 213px; height: 100px;" rows="50" cols="100"></textarea></div>
				<div><input type="submit" value="{$g_lang_image_add}" class="login" style="color: #000000;" /></div>
			</div>
			</form>
		</fieldset></div>
{/if}