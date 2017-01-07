{*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*}
{* THE CONTROL PANEL HTML *}
{if empty($m_panel_select)}
		
			<br /><br />
	
		<div style="width:500px !important; width: 600px; padding-left:80px; padding-top:50px;">
			
			<div style="width:120px; height:80px; float:left;">
							<div style="height:50px; width:100px; text-align:center;"><a href="userarea.php?page=editpic"><img src="theme/{$g_theme_dir}/gfx/userprefs.png" border="0" alt="{$g_lang_panel_user}" /></a></div>
							<div style="width:100px; height:10px; text-align:center;"><a href="userarea.php?page=editpic" class="link">{$g_lang_panel_user}</a></div>
			</div>
			<div style="width:120px; height:80px; float:left;">
							<div style="height:50px; width:100px; text-align:center;"><a href="userarea.php?page=editpass"><img src="theme/{$g_theme_dir}/gfx/userpass.png" border="0" alt="{$g_lang_panel_usrpass}" /></a></div>
							<div style="width:100px; height:10px; text-align:center;"><a href="userarea.php?page=editpass" class="link">{$g_lang_panel_usrpass}</a></div>
			</div>
			
		
			
			{if ($g_user->m_user_access.NEWSEDIT > 0 or $g_user->m_user_access.NEWSVIEW > 0 or $g_user->m_user_access.NEWSADD > 0) and $g_modules[5].m_status > 0}
				<div style="width:120px; height:80px; float:left;">
						<div style="height:50px; width:100px; text-align:center;"><a href="news.php"><img src="theme/{$g_theme_dir}/gfx/news.png" border="0" alt="{$g_lang_panel_news}" /></a></div>
						<div style="width:100px; height:10px; text-align:center;"><a href="news.php" class="link">{$g_lang_panel_news}</a></div>
				</div>
			{/if}
			{if $g_user->m_user_access.ADMIN  > 0}
				<div style="width:120px; height:80px; float:left;">
						<div style="height:50px; width:100px; text-align:center;"><a href="admin.php"><img src="theme/{$g_theme_dir}/gfx/admin.png" border="0" alt="{$g_lang_panel_admin}" /></a></div>
						<div style="width:100px; height:10px; text-align:center;"><a href="admin.php" class="link">{$g_lang_panel_admin}</a></div>
				</div>
			{/if}
			{if ($g_user->m_user_access.POLLDEL > 0 or $g_user->m_user_access.POLLVIEW > 0 or $g_user->m_user_access.POLLADD > 0) and $g_modules[6].m_status > 0}
				<div style="width:120px; height:80px; float:left;">
						<div style="height:50px; width:100px; text-align:center;"><a href="poll.php"><img src="theme/{$g_theme_dir}/gfx/polls.png" border="0" alt="{$g_lang_panel_poll}" /></a></div>
						<div style="width:100px; height:10px; text-align:center;"><a href="poll.php" class="link">{$g_lang_panel_poll}</a></div>
				</div>
			{/if}
			{if $g_user->m_user_access.RANKEDIT > 0 or $g_user->m_user_access.RANKDEL > 0 or $g_user->m_user_access.RANKADD > 0}
				<div style="width:120px; height:80px; float:left;">
						<div style="height:50px; width:100px; text-align:center;"><a href="ranks.php"><img src="theme/{$g_theme_dir}/gfx/ranks.png" border="0" alt="{$g_lang_panel_rank}" /></a></div>
						<div style="width:100px; height:10px; text-align:center;"><a href="ranks.php" class="link">{$g_lang_panel_rank}</a></div>
				</div>
			{/if}
			{if ($g_user->m_user_access.FILEEDIT > 0 or $g_user->m_user_access.FILEDEL > 0 or $g_user->m_user_access.FILEADD > 0) and $g_modules[7].m_status > 0}
				<div style="width:120px; height:80px; float:left;">
						<div style="height:50px; width:100px; text-align:center;"><a href="download.php"><img src="theme/{$g_theme_dir}/gfx/files.png" border="0" alt="{$g_lang_panel_file}" /></a></div>
						<div style="width:100px; height:10px; text-align:center;"><a href="download.php" class="link">{$g_lang_panel_file}</a></div>
				</div>	
			{/if}
			{if ($g_user->m_user_access.SCRNADD > 0 or $g_user->m_user_access.SCRNDEL > 0) and $g_modules[8].m_status > 0}
				<div style="width:120px; height:80px; float:left;">
						<div style="height:50px; width:110px; text-align:center;"><a href="gallery.php"><img src="theme/{$g_theme_dir}/gfx/gallery.png" border="0" alt="{$g_lang_panel_gallery}" /></a></div>
						<div style="width:110px; height:10px; text-align:center;"><a href="gallery.php" class="link">{$g_lang_panel_gallery}</a></div>
				</div>	
			{/if}
			{if $g_user->m_user_access.USEREDIT > 0 or $g_user->m_user_access.USERDEL > 0 or $g_user->m_user_access.USERADD > 0}
				<div style="width:120px; height:80px; float:left;">
						<div style="height:50px; width:100px; text-align:center;"><a href="users.php"><img src="theme/{$g_theme_dir}/gfx/editusers.png" border="0" alt="{$g_lang_panel_edituser}" /></a></div>
						<div style="width:100px; height:10px; text-align:center;"><a href="users.php" class="link">{$g_lang_panel_edituser}</a></div>
				</div>	
			{/if}
			{if ($g_user->m_user_access.EVENTEDIT > 0 or $g_user->m_user_access.EVENTDEL > 0 or $g_user->m_user_access.EVENTADD > 0 or $g_user->m_user_access.EVENTVIEW > 0) and $g_modules[9].m_status > 0}
				<div style="width:120px; height:80px; float:left;">
						<div style="height:50px; width:100px; text-align:center;"><a href="events.php"><img src="theme/{$g_theme_dir}/gfx/events.png" border="0" alt="{$g_lang_panel_events}" /></a></div>
						<div style="width:100px; height:10px; text-align:center;"><a href="events.php" class="link">{$g_lang_panel_events}</a></div>
				</div>	
			{/if}
			{if $g_user->m_user_access.ADMIN  > 0}
				<div style="width:120px; height:80px; float:left;">
						<div style="height:50px; width:100px; text-align:center;"><a href="modules.php"><img src="theme/{$g_theme_dir}/gfx/modules.png" border="0" alt="{$g_lang_panel_modules}" /></a></div>
						<div style="width:100px; height:10px; text-align:center;"><a href="modules.php" class="link">{$g_lang_panel_modules}</a></div>
				</div>	
			{/if}
			
			<div style="width:120px; height:80px; float:left;">
							<div style="height:50px; width:100px; text-align:center;"><a href="userarea.php?action=logout"><img src="theme/{$g_theme_dir}/gfx/logout.png" border="0" alt="{$g_lang_panel_logout}" /></a></div>
							<div style="width:100px; height:10px; text-align:center;"><a href="userarea.php?action=logout" class="link">{$g_lang_panel_logout}</a></div>
			</div>
	</div>
{/if}