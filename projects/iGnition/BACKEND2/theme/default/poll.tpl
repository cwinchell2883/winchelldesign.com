{*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*}
{* BELOW IS USED TO VIEW THE LIST OF POLLS *}
{if not empty($m_poll_list)}
			{if $g_user->m_user_access.POLLADD > 0}
				<div style="width: 616px;text-align:right; padding-right:30px;">
					<br />
						<a href="poll.php?add=1" class="link"><img src="theme/{$g_theme_dir}/gfx/add.png" alt="add poll" border="0" /></a>
						<a href="poll.php?add=1" class="link">{$g_lang_poll_add}</a>		
				</div>
				<br />
			{/if}
				<div style="width:626px;">
					<div style="float: left; width: 240px; padding-left: 20px;">
						{$g_lang_misc_name}
					</div>
					<div style="float: left; width: 120px;">
						{$g_lang_misc_start_date}
					</div>
					<div style="float: left; width: 110px;">
						{$g_lang_misc_end_date}
					</div>
					<div style="float: left; width: 20px;">
						{$g_lang_misc_votes}
					</div>
				</div>
			{if $m_poll_list.polls != "NULL"}
				{foreach item=poll from=$m_poll_list.polls} 
				{strip}
							<div style="width:626px; height:17px;">
										<div style="float: left; width: 240px; padding-left: 20px;">
											{if not empty($poll.p_end) && ($smarty.now+$g_site_config.timezone*3600|date_format:"%Y-%m-%d %H:%M:%S") > ($poll.p_end|date_format:"%Y-%m-%d %H:%M:%S")}
												<img src="theme/{$g_theme_dir}/gfx/warning.png" alt="" style="height:15px;" />*{$g_lang_poll_closed}* <a href="poll.php?view={$poll.p_id}" class="link">{$poll.p_name|truncate:25:"...":true}</a>
											{else}
												{if ($smarty.now+$g_site_config.timezone*3600|date_format:"%Y-%m-%d %H:%M:%S") < ($poll.p_start|date_format:"%Y-%m-%d %H:%M:%S")}
													<img src="theme/{$g_theme_dir}/gfx/warning.png" alt="" style="height:15px;" />*{$g_lang_poll_not_started}* {$poll.p_name|truncate:15:"...":true}
												{else}
													<a href="poll.php?poll={$poll.p_id}" class="link">{$poll.p_name|truncate:38:"...":true}</a>
												{/if}
											{/if}
										</div>
										<div style="float: left; width: 120px;">
											{if empty($poll.p_start)}
													{$g_lang_poll_no_time}
											{else}
													{$poll.p_start|date_format:$g_site_config.dateformat}
											{/if}
										</div>
										<div style="float: left; width: 120px;">
											{if empty($poll.p_end)}
													{$g_lang_poll_no_time}
											{else}
													{$poll.p_end|date_format:$g_site_config.dateformat}
											{/if}
										</div>
										<div style="float: left; width: 20px;">
											{$poll.p_num_votes}
										</div>
										{if $g_user->m_user_access.POLLDEL > 0}
											<div style="float:left; width:100px; height: 17px;">
												<a href="poll.php?delete={$poll.p_id}" class="link"><img src="theme/{$g_theme_dir}/gfx/delete.png" border="0" alt="delete poll" /></a><a href="poll.php?delete={$poll.p_id}" class="link">{$g_lang_misc_delete}</a>
											</div>
										{/if}
							</div>
				{/strip}
				{/foreach}
				{* PAGING POLL LIST *}
						{if $m_poll_list.page.total > 0}
										{if not empty($smarty.get.page)}
											<div class="pager"><a href="poll.php?page={$smarty.get.page-1}" class="link" style="color:#4448fa;">{$g_lang_misc_previous_page}</a></div>
										{/if}
											
											{if $smarty.get.page > 4}{assign var="start" value="4"}{else}{assign var="start" value=$smarty.get.page}{/if}
											{if $m_poll_list.page.total > $smarty.get.page+4}{assign var="end" value=$smarty.get.page+4}{else}{assign var="end" value=$m_poll_list.page.total}{/if}
											
											{if $smarty.get.page > 4}
												<div class="pager"><a href="poll.php?page=0" class="link" style="color:#4448fa;">{$g_lang_misc_first} [0]</a></div>
											{/if}
										
											{section name=page start=$smarty.get.page-$start loop=$smarty.get.page step=1}
 												{if $smarty.section.page.index >= 0 and $smarty.section.page.index < $smarty.get.page}
													<div class="pager"><a href="poll.php?page={$smarty.section.page.index}" class="link" style="color:#4448fa;">{$smarty.section.page.index}</a></div>
												{/if}
											{/section}
											
											<div class="pager_active">{$smarty.get.page}</div>
											
											{section name=page start=$smarty.get.page+1 loop=$end+1 step=1}
 												{if $smarty.section.page.index > $smarty.get.page and $smarty.section.page.index <= $m_poll_list.page.total}
													<div class="pager"><a href="poll.php?page={$smarty.section.page.index}" class="link" style="color:#4448fa;">{$smarty.section.page.index}</a></div>
												{/if}
											{/section}
											
											{if $end != $m_poll_list.page.total}
													<div class="pager"><a href="poll.php?page={$m_poll_list.page.total}" class="link" style="color:#4448fa;">{$g_lang_misc_last} [{$m_poll_list.page.total}]</a></div>
											{/if}
											
											{if $smarty.get.page != $m_news_list.page.total}
												<div class="pager"><a href="poll.php?page={$smarty.get.page+1}" class="link" style="color:#4448fa;">{$g_lang_misc_next_page}</a></div>
											{/if}
						{/if}<br /><br />
			{/if}
			
{/if}

{* BELOW IS USED TO VIEW THE POLL IN A GRAPH FORM *}
{if not empty($m_poll_view)}
		{if $m_poll_view[0].total_votes > 0}
			{assign var='m_poll_graph_width' value='400'}
			<div style="width: 516px; padding-bottom: 5px; padding-top: 10px; padding-left: 50px;"><fieldset><legend style="color:#ffffff;">{$m_poll_view[0].p_name}</legend><br />
			{foreach item=poll from=$m_poll_view} 			
								{strip}
								
										<div style="width: 300px; padding-left: 0px;">
													{$poll.o_name}
										</div>
										{if $poll.o_votes > 0}
											<div style="padding-left: 0px; width: {math equation="((x*(100/y)))*(z/100)" x=$poll.o_votes y=$poll.total_votes z=$m_poll_graph_width}px; background: url('theme/{$g_theme_dir}/gfx/poll/{cycle values="1,2,3"}.png');">
												&nbsp;
											</div>
											<div style="float: right;">{math equation="x*(100/y)" x=$poll.o_votes y=$poll.total_votes format="%.1f"}0%</div><br />
										{else}
											<div>&nbsp;</div>
										{/if}
								{/strip}
			{/foreach}</fieldset></div>
		{else}
		<br /><br /><br />
		{/if}
			<div style="padding-left: 275px;"><a href="poll.php" class="link">{$g_lang_poll_listing}</a></div>
{/if}

{* USED WHEN VOTING ON A POLL *}
{if not empty($m_poll_vote)}
					<div class="title">
						{$m_poll_vote[0].p_name} {* doesn't matter which number you use*}
					</div>
					<form action="poll.php" method="post"><input type="hidden" name="poll" value="{$smarty.get.poll}" />
					<br />
							{foreach item=poll from=$m_poll_vote} 	
							{strip}
										<div style="padding-left:40px;">
											<input type="radio" name="vote" value="{$poll.o_id}" />
											{$poll.o_name}
										</div>
							{/strip}
							{/foreach}
							
					<br />
					<div style="width: 616px;text-align:center;">
					<input type="submit" value="vote" class="login" style="color:#000000;"/>
					</div>
</form>
					<div style="width: 616px;text-align:center;">
					<a href="poll.php?view={$smarty.get.poll}" class="link">{$g_lang_poll_viewresults}</a> -
					<a href="poll.php" class="link">{$g_lang_poll_listing}</a>
					</div>
{/if}


{*	ADD NEW POLL CODE	*}
{if not empty($m_poll_add)}
	<br /><br />
	<form action="poll.php" name="newpoll" method="post">
	<input type="hidden" name="add" value="1" />
	<div style="padding-left:60px;">
	<div style="float: left; width: 100px;">{$g_lang_poll_name} </div><div><input type="text" name="polltitle" class="login" style="width:200px; color: #000000;" maxlength="255" /></div>
	<div style="float: left; width: 100px;">{$g_lang_misc_start_date}</div><div><script type="text/javascript">
					<!--		
						{literal}var GC_SET_0 = {
							'appearance': GC_APPEARANCE,
							'dataArea':'startdate',
							'dateFormat' : 'd-m-Y' 
						}{/literal}
						new gCalendar(GC_SET_0); 
					//-->
					</script></div>
		<div style="float: left; width: 100px;">{$g_lang_misc_end_date}</div><div>
				<script type="text/javascript">
					<!--		
						{literal}var GC_SET_1 = {
							'appearance': GC_APPEARANCE,
							'dataArea':'enddate',
							'dateFormat' : 'd-m-Y' 
						}{/literal}
						new gCalendar(GC_SET_1); 
					//-->
					</script></div>
		<div style="float: left; width:100px;">{$g_lang_misc_make_public}</div><div><input type="checkbox" name="public" value="1" /></div>
		<div style="width: 450px; "><fieldset><legend style="color:#ffffff;">{$g_lang_poll_options}</legend><div style="padding-left:140px;">
			1 <input type="text" name="option[0]" class="login" style="width: 200px; color:#000000;" maxlength="200" /><br />
			2 <input type="text" name="option[1]" class="login" style="width: 200px; color:#000000;" maxlength="200" /><br />
			3 <input type="text" name="option[2]" class="login" style="width: 200px; color:#000000;" maxlength="200" /><br />
			4 <input type="text" name="option[3]" class="login" style="width: 200px; color:#000000;" maxlength="200" /><br />
			5 <input type="text" name="option[4]" class="login" style="width: 200px; color:#000000;" maxlength="200" /><br />
			6 <input type="text" name="option[5]" class="login" style="width: 200px; color:#000000;" maxlength="200" /><br />
		</div></fieldset></div><br /><div style="text-align:center;"><input type="submit" value="{$g_lang_poll_add}" class="login" style="color:#000000;" /></div>
		</div>		
	</form>
{/if}