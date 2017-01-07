{*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*}
<div class="title">
	{$g_lang_news}
</div>
		{* FRONT NEWS PAGE IS BELOW HERE *}
		{if not empty($m_news_headline) and ($m_news_headline != 'NULL' and $m_news_headline != NULL)}<div style="height:5px;">&nbsp;</div>
					{foreach item=newsitem from=$m_news_headline} 
							{strip}
								 <div class="content_box_top"></div>
								 <div class="content_box"> 
											<h3>{$newsitem.n_title}</h3>
										<hr style="border-style: dotted;" />
											{$newsitem.n_text|nl2br}
										<hr style="border-style: dotted;" />
											<div style="float:left; width: 55px; height: 50px;"><a href="users.php?user={$newsitem.u_id}" class="link"><img src="{$newsitem.u_pic}" style="height: 50px; width:50px; border:0px;" alt="" /></a></div>
											<div style="width:auto; height: 35px; padding-top: 10px;">{$g_lang_postedby}: <a href="users.php?user={$newsitem.u_id}" class="link"> {$newsitem.u_name}</a><br />{$g_lang_misc_date}: {$newsitem.n_date|date_format:$g_site_config.dateformat}</div>
								 </div>
								 <div class="content_box_bottom"></div>
							{/strip}
					{/foreach}
		{/if}
					
		{* THE NEWS ARCHIEVES HTML IS BELOW HERE *}
					{if not empty($m_news_list)}
							<br />
							<div style="width: auto !important; width: 616px; padding-right:30px; padding-left: 30px;">
									{if $g_user->m_user_access.NEWSADD > 0}
										<div style="text-align:right; height: 17px;">
											<a href="news.php?news=add" class="link"><img src="theme/{$g_theme_dir}/gfx/add.png" border="0" alt="add" /></a><a href="news.php?news=add" class="link">{$g_lang_news_add}</a> <br /><br />
										</div>
									{/if}
									{if $m_news_list != 'NULL' and $m_news_list != NULL}
										<div style="height:20px;">
											<div style="float: left; width: 220px !important; width: 220px;">{$g_lang_misc_name}</div>
											<div style="float: left; width: 140px;">{$g_lang_misc_date}</div>
											<div style="float: left; width: 80px;">{$g_lang_postedby}</div>
										</div>
										{foreach item=newsitem from=$m_news_list.news} 
											{strip}
											<div style="height:17px; width: 600px !important; width:550px;">
												<div style="height:17px; float: left; width: 220px;"><a href="news.php?news={$newsitem.n_id}" class="link">{$newsitem.n_title|truncate:30:"...":true}</a></div>
												<div style="height:17px; float: left; width: 140px;">{$newsitem.n_date|date_format:$g_site_config.dateformat}</div>
												<div style="height:17px; float: left; width: 80px;"><a href="users.php?user={$newsitem.u_id}" class="link">{$newsitem.u_name}</a></div>
											{if $g_user->m_user_access.NEWSEDIT > 0}
												<div style="float: left; width:10%; height: 17px;"><a href="news.php?edit={$newsitem.n_id}" class="link"><img src="theme/{$g_theme_dir}/gfx/edit.png" border="0" alt="edit" /></a><a href="news.php?edit={$newsitem.n_id}" class="link">{$g_lang_misc_edit}</a></div>
											{/if}
											{if $g_user->m_user_access.NEWSDEL > 0}
												<div style="float: left; width:10%; height: 17px;"><a href="news.php?delete={$newsitem.n_id}" class="link"><img src="theme/{$g_theme_dir}/gfx/delete.png" border="0" alt="delete" /></a><a href="news.php?delete={$newsitem.n_id}" class="link">{$g_lang_misc_delete}</a></div>
											{/if}
											</div>
											{/strip}
										{/foreach}
										
									
									{/if}
							</div>
									{* PAGING NEWS LIST *}
						{if $m_news_list.page.total > 0}
										{if not empty($smarty.get.page)}
											<div class="pager"><a href="news.php?page={$smarty.get.page-1}" class="link" style="color:#4448fa;">{$g_lang_misc_previous_page}</a></div>
										{/if}
											
											{if $smarty.get.page > 4}{assign var="start" value="4"}{else}{assign var="start" value=$smarty.get.page}{/if}
											{if $m_news_list.page.total > $smarty.get.page+4}{assign var="end" value=$smarty.get.page+4}{else}{assign var="end" value=$m_news_list.page.total}{/if}
											
											{if $smarty.get.page > 4}
												<div class="pager"><a href="news.php?page=0" class="link" style="color:#4448fa;">{$g_lang_misc_first} [0]</a></div>
											{/if}
										
											{section name=page start=$smarty.get.page-$start loop=$smarty.get.page step=1}
 												{if $smarty.section.page.index >= 0 and $smarty.section.page.index < $smarty.get.page}
													<div class="pager"><a href="news.php?page={$smarty.section.page.index}" class="link" style="color:#4448fa;">{$smarty.section.page.index}</a></div>
												{/if}
											{/section}
											
											<div class="pager_active">{$smarty.get.page}</div>
											
											{section name=page start=$smarty.get.page+1 loop=$end+1 step=1}
 												{if $smarty.section.page.index > $smarty.get.page and $smarty.section.page.index <= $m_news_list.page.total}
													<div class="pager"><a href="news.php?page={$smarty.section.page.index}" class="link" style="color:#4448fa;">{$smarty.section.page.index}</a></div>
												{/if}
											{/section}
											
											{if $end != $m_news_list.page.total}
													<div class="pager"><a href="news.php?page={$m_news_list.page.total}" class="link" style="color:#4448fa;">{$g_lang_misc_last} [{$m_news_list.page.total}]</a></div>
											{/if}
											
										{if $smarty.get.page != $m_news_list.page.total}
											<div class="pager"><a href="news.php?page={$smarty.get.page+1}" class="link" style="color:#4448fa;">{$g_lang_misc_next_page}</a></div>
										{/if}
						{/if}<br /><br />
					{/if}
					
					
					
			{* ARCHIVE NEWS PAGE, FOR WHEN A POST IS CLICKED ON *}
					{if not empty($m_news_archive)}
						{foreach item=newsitem from=$m_news_archive} 
							{strip}
							<div class="content_box_top"></div>
								 <div class="content_box"> 
											{$newsitem.n_title}
										<hr style="border-style: dotted;" />
											{$newsitem.n_text|nl2br}
										<hr style="border-style: dotted;" />
											<div style="float:left; width: 55px; height: 50px;"><a href="users.php?user={$newsitem.u_id}" class="link"><img src="{$newsitem.u_pic}" style="height: 50px; width:50px; border:0px;" alt="" /></a></div>
											<div style="width:auto; height: 35px; padding-top: 10px;">{$g_lang_postedby}: <a href="users.php?user={$newsitem.u_id}" class="link"> {$newsitem.u_name}</a><br />{$g_lang_misc_date}: {$newsitem.n_date|date_format:$g_site_config.dateformat}</div>
								 </div><div class="content_box_bottom"></div><div style="height:5px;">&nbsp;</div>
							{/strip}
						{/foreach}
					{/if}
					
			
			{* ADDING A NEW NEWS POST *}
			{if not empty($m_news_add)}
				<br />
				<div style="margin-left:60px;">
					<form action="news.php" method="post"><input type="hidden" name="add" value="1" />
						<div>{$g_lang_misc_subject}: <input type="text" class="login" style="color:#000000; width:300px;" maxlength="255" name="title" /></div>
						<div><textarea name="newsbody" class="textbox" style="color: #000000; width:450px; height:250px;" rows="50" cols="100"></textarea></div>
						<div style="padding-left:300px;"><input type="submit" value="{$g_lang_news_add}" class="login" style="color:#000000;" /></div>
					</form>
				</div>
			{/if}
			
			{* EDITING A NEWS POST *}
			{if not empty($m_news_edit)}
				<form action="news.php" name="news" method="post"><input type="hidden" name="edit" value="{$m_news_edit.n_id}" />
				<br /><div style="width: auto; padding-left: 40px; padding-right:40px;">
						<div>{$g_lang_misc_subject}: <input name="title" style="width:300px; color:#000000;" class="login" type="text" value="{$m_news_edit.n_title}"  maxlength="255" /></div>
						<div><textarea name="newsbody" class="textbox" style="color: #000000; width:450px; height:250px;" wrap=virtual>{$m_news_edit.n_text}</textarea></div>
						<div style="padding-left: 300px;"><input type="submit" value="{$g_lang_news_edit}" class="login" style="color:#000000;" /></div>
				</div></form>
			{/if}
		
