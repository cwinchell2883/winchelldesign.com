{*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*}


{if not empty($m_user_list)}
		{if $g_user->m_user_access.USERADD}
			<br /><br />
			<div style="width:560px !important; width: 636px; text-align:right; padding-left: 40px; padding-right: 40px;"><a href="users.php?add=1"><img src="theme/{$g_theme_dir}/gfx/add.png" alt="{$g_lang_user_add}" border="0" /></a><a href="users.php?add=1" class="link">{$g_lang_user_add}</a></div>
		{/if}
{foreach item=user from=$m_user_list} 
	 	{if $user.r_name neq $r_name2}
	 			<br />
				<div style="width:586px !important; width: 616px; padding-left: 20px; padding-right: 20px; padding-top: 10px;">
						<fieldset><div style="float:left; padding-top:18px; padding-left: 240px; padding-bottom:18px;">{$user.r_name}</div>{if not empty($user.r_img) || $user.r_img != NULL}<div style="float:right;"><img src="{$user.r_img}" alt="" style="width:50px; height:50px;" /></div>{/if}</fieldset>
				</div>
				<div style="text-align:center; width:586px !important; width: 616px; padding-left: 20px; padding-right: 20px;">
					<div style="float: left; width: 20%; padding-left:40px;">
							<b>{$g_lang_misc_name}</b>
					</div>
					<div style="float: left; width: 15%;">
							<b>{$g_lang_misc_location}</b>
					</div>
					<div style="float: left; width: 25%;">
							<b>{$g_lang_misc_joindate}</b>
					</div>
					<div style="float: left; width: 10%;">
							<b>{$g_lang_misc_status}</b>
					</div>
				</div><br />
				{assign var="r_name2" value=$user.r_name}
		{/if}
						<div style="text-align:center; width:586px !important; width: 616px; padding-left: 20px; padding-right: 20px; height: 17px;">
								<div style="float: left; width: 20%; padding-left:40px; height: 17px;">
											<a href="users.php?user={$user.u_id}" class="link">{$user.u_name|truncate:18:"...":true}</a>
								</div>
								<div style="float: left; width: 15%; height: 17px;">
											&nbsp;{$user.u_location}
								</div>
								<div style="float: left; width: 25%; height: 17px;">
											{$user.u_join|date_format:$g_site_config.dateformat}
								</div>
								<div style="float: left; width: 10%; height: 17px;">
											{if $user.u_logtime > $smarty.now|date_format:"%Y-%m-%d %H:%m:%S"}
												{$g_lang_misc_online}
											{else}
												{$g_lang_misc_offline}
											{/if}
								</div>
								{if $g_user->m_user_access.USEREDIT && $g_user->m_user_rank_sort < $user.r_sort}
									<div style="float: left; width: 7%;height: 17px;">
										<a href="users.php?edit={$user.u_id}"><img src="theme/{$g_theme_dir}/gfx/edit.png" alt="edit" border="0" /></a><a href="users.php?edit={$user.u_id}" class="link">{$g_lang_misc_edit}</a>
									</div>
								{/if}
								{if $g_user->m_user_access.USERDEL && $g_user->m_user_rank_sort < $user.r_sort}
									<div style="float: left; width: 10%; height: 17px;">
										<a href="users.php?delete={$user.u_id}"><img src="theme/{$g_theme_dir}/gfx/delete.png" alt="edit" border="0" /></a><a href="users.php?delete={$user.u_id}" class="link">{$g_lang_misc_delete}</a>
									</div>
								{/if}	
						</div>
	{/foreach}<br /><br />
{/if}

{* VIEWING A USERS INFORMATION PAGE *}
{if not empty($m_user_bio)}
			<div style="float: left; width: 131px; height: 131px; text-align:center;"><fieldset><legend style="color:#ffffff;">{$g_lang_misc_user_pic}</legend>
				<img src="{$m_user_bio.u_pic}" border="0" alt="{$g_lang_misc_user_pic}" style="width:100px; height:100px;" />
			</fieldset>
			</div>

			<div style="float: left; width: 400px; height: 131px; padding-left: 20px;"><fieldset><legend style="color:#ffffff;">{$g_lang_misc_details}</legend>
				<div style="float: left; width: 150px;">{$g_lang_misc_alias}</div>
				<div style="float: left; width: 200px;">{$m_user_bio.u_name}</div>
	
				<div style="float: left; width: 150px;">{$g_lang_misc_joined}</div>
				<div style="float: left; width: 200px;">{$m_user_bio.u_join|date_format:$g_site_config.dateformat}</div>
				
				<div style="float: left; width: 150px;">{$g_lang_misc_email}</div>
				<div style="float: left; width: 200px;">

						{* We must first see if the user wants his email seen by the public *}
						{if $m_user_bio.u_showemail == 1 and empty($g_user->m_user_id)}
							{* Doesn't want the email seen *}
							{$g_lang_email_hidden}
						{else}
							{mailto address=$m_user_bio.u_email encode="hex" extra='class="link"'}
						{/if}
				</div>
				
				{if not empty($m_user_bio.u_location)}
					<div style="float: left; width: 150px;">{$g_lang_misc_location}</div>
					<div style="float: left; width: 200px;">{$m_user_bio.u_location}</div>
				{/if}

				{if not empty($m_user_bio.u_website)}
					<div style="float: left; width: 150px;">{$g_lang_misc_fav_site}</div>
					<div style="float: left; width: 200px;"><a href="http://{$m_user_bio.u_website}" target="_blank" class="link">{$m_user_bio.u_website}</a></div>
				{/if}
				{if not empty($m_user_bio.u_xfire)}
					<div style="float: left; width: 150px;"><a href="http://www.xfire.com" target="_blank" class="link">Xfire</a></div>
					<div style="float: left; width: 200px;">{$m_user_bio.u_xfire}</div>
				{/if}
				{if not empty($m_user_bio.u_msn)}
					<div style="float: left; width: 150px;">MSN</div>
					<div style="float: left; width: 200px;">{mailto address=$m_user_bio.u_msn encode="hex" extra='class="link"'}</div>
				{/if}
				</fieldset></div>
				{if not empty($m_user_bio.u_interests)}
					<div style="text-align:center; padding-top: 20px; width: 500px;">{$g_lang_misc_interests}</div>
					<div style="padding-left: 40px;padding-bottom: 50px; width: 500px; padding-right:20px;">{$m_user_bio.u_interests|nl2br}</div>
				{/if}
			
 {/if}


{* ADD A USER *}
{if not empty($m_user_add)}
		<br /><div style="width: 516px; padding-left:40px;"><p>{$g_lang_user_add_desc}</p></div><br /><br />
		<form action="users.php" method="post"><input type="hidden" name="add" value="1" />
		<div style="width:300px !important; width:500px; padding-left: 180px; padding-right: 30px; height: 140px;">
					<div style="float:left; width:100px;">{$g_lang_misc_name}</div><div style="float:left; width:200px;"><input type="text" name="name" size="25" maxlength="255" class="login" style="color:#000000; width:150px;" /></div>
					<div style="float:left; width:100px; height: 20px;">{$g_lang_misc_email}</div><div style="float:left; height: 20px; width:200px;"><input type="text" name="email" size="25" maxlength="255" class="login" style="color:#000000; width:150px;" /></div>
					<div style="float:left; text-align:right; width:100px;"><input type="checkbox" name="send" value="1" /></div><div style="float:left; width:200px;">{$g_lang_pass_email}</div>
					<div style="float:left; width:300px; text-align:center;"><input type="submit" value="{$g_lang_misc_add}" class="login" style="color:#000000;" /></div>
		</div>			
		</form>
{/if}


{* EDIT A USER *}
{if not empty($m_user_edit)}<br /><br />
	<div style="padding-left:40px; padding-right:30px; float: left;">{$g_lang_misc_name}: {$m_user_edit.u_name}<br />
		{$g_lang_misc_joindate}: {$m_user_edit.u_join|date_format:"%d/%m/%Y"}<br />
		{$g_lang_misc_email}: {$m_user_edit.u_email}<br />
		{$g_lang_misc_last_online}: {$m_user_edit.u_logtime|date_format:"%d/%m/%Y"}<br />
	</div>{strip}
	<div style="width:550px !important; width: 350px;"><fieldset style="width: 300px;"><legend style="color:#ffffff;">{$g_lang_misc_options}</legend>
		{* New password form *}
			<form action="users.php" method="post"><input type="hidden" name="newpass" value="{$smarty.get.edit}" />
				<div style="float:left; width: 200px;"><input type="checkbox" name="email" value="1" /> {$g_lang_pass_email}</div>
				<div style="width: 300px !important; width: 100px;"><input type="submit" value="{$g_lang_user_newpass}" style="color:#000000;" class="login" /></div>
			</form>
		{* Change Rank Form *}
			<form action="users.php" method="post"><input type="hidden" name="changerank" value="{$smarty.get.edit}"  />
			
				<div style="float: left; width:200px;">
					<select name="rank" class="login" style="color:#000000;">
						{foreach item=rank from=$m_user_edit_rank}
							{if not empty($rank.r_name) && not empty($rank.r_id)}
								<option value="{$rank.r_id}" >{$rank.r_name}</option>
							{/if}
						{/foreach} 
					</select>
				</div>
				<div style="width: 300px !important; width: 100px;">
					<input type="submit" value="{$g_lang_rank_change}" style="color:#000000;"  class="login" />
				</div>	
			</form>
			
	</fieldset>
	</div>{/strip}
{/if}



{* USER	EDIT BIO *}
{if $m_panel_select == 'userbio'}
	<form action="users.php" method="post" name="userbio" enctype="multipart/form-data"><input type="hidden" name="userbio" value="change" />
	<div style="width:616px; padding-left: 10px; padding-right:10px;"><fieldset><legend style="color:#ffffff;">{$g_lang_user_bio_details}</legend>
		<div style="float:left; width: 200px;">{$g_lang_user_dob}</div><div style="width:300px !important; width:350px;">{literal}
					<script language="JavaScript" type="text/javascript">
					<!--		
						var GC_SET_0 = {
							'appearance': GC_APPEARANCE,
							'dataArea':'birthdate',
							'dateFormat' : 'd-m-Y' 
						}
						new gCalendar(GC_SET_0);
						document.forms['userbio'].elements['birthdate'].value = '{/literal}{if empty($m_user.u_dob)}{$smarty.now|date_format:"%d-%m-%Y"}{else}{$m_user.u_dob|date_format:"%d-%m-%Y"}{/if}{literal}'; 
					//-->
					</script>{/literal}
		</div>
		<div style="float:left; width:200px;">{$g_lang_misc_email}</div><div style="width:400px !important; width:350px;"><input type="text" name="email"  class="login" style="color: #000000; width: 200px;" maxlength="255" value="{$m_user.u_email}" /></div>
		<div style="float:left; width:200px;">{$g_lang_misc_location}</div><div style="width:400px !important; width:350px;"><input type="text" name="location" class="login" style="color: #000000; width: 200px;" maxlength="255" value="{$m_user.u_location}" /></div>
		<div style="float:left; width:200px;">{$g_lang_user_website}</div><div style="width:400px !important; width:350px;"><input type="text" name="website"  class="login" style="color: #000000; width: 200px;" maxlength="255" value="{$m_user.u_website}" /></div>
		<div style="float:left; width:200px;"><a href="http://www.xfire.com" target="_blank" class="link">Xfire</a></div><div style="width:400px !important; width:350px;"><input type="text" name="xfire"  class="login" style="color: #000000; width: 200px;" maxlength="255" value="{$m_user.u_xfire}" /></div>
		<div style="float:left; width:200px;">MSN</div><div style="width:400px !important; width:350px;"><input type="text" name="msn"  class="login" style="color: #000000; width: 200px;" maxlength="255" value="{$m_user.u_msn}" /></div>
		<div style="float:left; width:200px;">{$g_lang_user_hidemail}</div><div style="width:400px !important; width:350px;">{$g_lang_misc_yes} <input type="radio" name="hideemail" value="1" {if $m_user.u_showemail=='1'}checked="checked"{/if} /> {$g_lang_misc_no} <input type="radio" name="hideemail" value="0" {if $m_user.u_showemail == 0}checked="checked"{/if} /></div>
		<br /><div style="float:left; width:200px;">{$g_lang_user_sitechat}</div><div style="width:400px !important; width:350px;">{$g_lang_misc_yes} <input type="radio" name="hidetime" value="1" {if $m_user.u_showtime=='1'}checked="checked"{/if} /> {$g_lang_misc_no} <input type="radio" name="hidetime" value="0" {if $m_user.u_showtime == 0}checked="checked"{/if} /></div>
		<div style="float:left; width:200px;">{$g_lang_user_description}</div><div style="float:left;width:200px !important; width:350px;"><textarea name="interests" class="textbox" style="color: #000000; width:300px; height: 200px;" rows="50" cols="100" >{$m_user.u_interests}</textarea></div>
	</fieldset></div>
	<div style="width:616px; padding-left: 10px; padding-right:10px;"><fieldset>
<legend style="color:#ffffff;">{$g_lang_user_picture}</legend>
		<div style="float:left; width:300px;">{$g_lang_user_choosepic}</div><div style="float:left; width:200px;"><select name="picgal" class="login" style="height:auto; color: #000000;">{strip}
												{foreach item=file from=$m_user.files}		
													<option {if $m_user.u_galpic == $file}selected="selected"{/if} value="{$file}" onclick="document.forms['userbio'].elements['picurl'].value = '';">{$file}</option>
												{/foreach}
												</select>{/strip}</div>
		<div style="width:300px; float:left;">{$g_lang_user_url_image}</div><div style="float:left; width:200px; "><input type="text" class="login" style="color: #000000; width: 150px;" maxlength="255" name="picurl" {if empty($m_user.u_galpic)}value="{$m_user.u_pic}"{/if} /></div>
		<div style="width:300px; float:left;">{$g_lang_user_upload}
</div><div style="float:left; width:200px;"><input type="file" name="picupload" class="login" style="color:#000000; width:200px;" /></div>
	</fieldset></div>
	<div style="padding-top: 10px; padding-left: 500px;"><input type="submit" name="submit" value="{$g_lang_misc_update}" class="login" style="color:#000000;" /><br /><br /></div>
	</form>
{/if}


{* EDIT USER PASSWORD *}
{if $m_panel_select == 'userpass'}
	<form action="users.php" method="post">
<input type="hidden" name="changepass" value="1" />
	<p style="padding: 10px;">{$g_lang_pass_description}</p>
	<br />
	<div style="width:400px; padding-left: 10px; padding-right:10px;">
		<div style="float:left; width:200px !important; width: 190px;">{$g_lang_user_oldpass}</div><div style="float:left; width:200px;"><input type="password" name="oldpass" maxlength="50" class="login" style="width:200px; color:#000000;" /></div>
		<div style="float:left; width:200px !important; width: 190px;">{$g_lang_user_newpass}</div><div style="float:left; width:200px;"><input type="password" name="newpass" maxlength="50" class="login" style="width:200px; color:#000000;" /></div>
		
		<div style="float:left; width:200px !important; width: 190px;">{$g_lang_user_confirmpass}</div><div style="float:left; width:200px;"><input type="password" name="newpass2" maxlength="50" class="login" style="width:200px; color:#000000;" /></div>
		<div style="padding-left: 200px; padding-top: 50px;"><input type="submit" value="{$g_lang_user_changepass}" class="login" style="width:auto; color:#000000;" /></div>
	</div>
	</form>
{/if}