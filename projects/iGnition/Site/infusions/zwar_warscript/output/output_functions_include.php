<?php
function render_zwar_selectbar($squad_list, $game_list, $action_squad, $action_game) {
	global $locale;

	echo "<div class='tbl-border center tbl2'>
	<form name='squadselectform' action='".$action_squad."' method='post'>
	<div style='float:left;'>
	&nbsp;<b>".$locale['zwar_2201'].":</b>&nbsp;
	<b><select name='teamid' style='width:150px;' onchange='submit()' class='textbox'>
	<option value='0'>".$locale['zwar_2202']."</option>
	".$squad_list."
	</select></b>
	</div>
	</form>
	<form name='gameselectform' action='".$action_game."' method='post'>
	<div style='float:right;'>
	&nbsp;<b>".$locale['zwar_2203'].":</b>&nbsp;
	<b><select name='gameid' style='width:150px;' onchange='submit()' class='textbox'>
	<option value='0'>".$locale['zwar_2202']."</option>
	".$game_list."
	</select></b>
	</div>
	</form>
	<div style='clear:both;'></div>
	</div>";
	render_zwar_break(5);
}

function render_zwar_warappform($action_form, $title, $option_list, $comment) {
	global $locale;
	
	echo "<form name='zinputform' method='post' action='".$action_form."'>
	<table align='center' cellpadding='0' cellspacing='0' width='100%' class='tbl-border center'><tr>
	<td class='tbl2' colspan='2'><strong>".$title."</strong></td>
	</tr><tr>
	<td class='tbl1' width='1%'>
	<select name='part_status' class='textbox' style='width:150px'>
	".$option_list."
	</select>
	</td><td class='tbl1'>
	<textarea name='part_comment' rows='1' class='textbox' style='width:100%'>$comment</textarea>
	</td>
	</tr><tr>
	<td class=''tbl2' align='center' colspan='2'>".displaysmileys("part_comment", "zinputform")."</td>
	</tr><tr>
	<td class=''tbl2' colspan='2' align='center'>
	<input type='submit' name='save' value='".$locale['zwar_0004']."' class='button'>
	<input type='submit' name='cancel' value='".$locale['zwar_0006']."' class='button'>
	</td>
	</tr></table></form>";
}

function render_zwar_message($content) {
	echo "<div align='center' style='padding:10px;'>".$content."</div>";
}

function render_zwar_break($number) {
	echo "<div style='height:".$number."px;'></div>";
}

function render_zwar_memberlist_break() {
	echo "<hr/>";
}

function render_zwar_tablefoot($left="", $right="") {
	if ($right != "" || $left != "") {
		echo "<div class='tbl'>
		<div style='float:left;'>".$left."</div>
		<div style='float:right;'>".$right."</div>
		<div style='clear:both;'></div>
		</div>";
	}
}

function render_zwar_pagefoot($left="", $right="") {
	echo "<div class='tbl-border tbl2' style='height:15px;'>
	<div style='float:left;'>".$left."</div>
	<div style='float:right;'>".$right."</div>
	<div style='clear:both;'></div>
	</div></div>";
}

function render_zwar_teaminfo($info) {
	global $locale;

	if ($info['logo'] != "" || $info['info'] != "") {
		echo "<table cellpadding='0' cellspacing='0' width='100%' class='tbl-border center'><tr>";
		if ($info['logo'] != "") {
			echo "<td class='tbl2' align='left' width='1%' rowspan='2' valign='top'>
			<img src='".INFUSIONS."zwar_warscript/images/squadlogos/".$info['logo']."' alt='".$info['logo']."' width='100' height='100'/>
			</td>";
		}
		echo "<td class='tbl2' align='left' height='1%'><b>".$locale['zwar_1125'].":</b></td></tr><tr>
		<td class='tbl1' align='left' valign='top'>".$info['info']."</td>
		</tr></table>";
	}
}

function render_zwar_teamoptions($options, $team_id, $pivis) {
	global $locale;

	echo "<div class='tbl-border tbl2'>
	<div style='float:left;'><b>".$locale['zwar_0405']."</b></div>
	<div style='float:right;'>
	<input type='text' name='zpassinput' value='".$locale['zwar_0406']."' maxlength='20' class='textbox' style='width:100px;".$pivis."' onClick=\"this.value='';\" />&nbsp;&nbsp;
	<select name='zwar_options' class='textbox' onchange=\"zwar_showpi();\">
	".$options."
	</select>&nbsp;&nbsp;
	<input type='submit' name='go_zwar_option' value='".$locale['zwar_0062']."' class='button' />
	<input type='hidden' name='teamid' value='".$team_id."'/>
	</div><div style='clear:both;'></div></div>";
}

function render_zwar_matchoptions ($options, $team_id) {
	global $locale;
	
	echo "<div class='tbl-border tbl2'><div style='float:left;'><a href='".BASEDIR."zwar.php?page=wars'>&lt;&lt; ".$locale['zwar_0223']."</a></div>
	<div style='float:right;'>";
	if ($options != "") {
		echo "<select name='zwar_options' class='textbox'>
		".$options."
		</select>
		<input type='submit' name='go_zwar_option' value='".$locale['zwar_0062']."' class='button'>
		<input type='hidden' name='zwar_option_squad' value='".$team_id."' />";
	}
	echo "</div>
	<div style='clear:both;'></div></div>";
}

function display_zwar_war_list($matchresult, $type) {
	global $zwar_settings_array, $locale;
	
	if (dbrows($matchresult)) {
		$i = 0;
		if ($type=="next") {
			echo "<div class='forum-caption'>".$locale['zwar_2204']."</div>
			<table cellpadding='0' cellspacing='1' width='100%' class='tbl-border center'><tr>
			<td class='tbl2' width='1%'>&nbsp;</td>
			<td class='tbl2' align='left' width='15%'><strong>".$locale['zwar_2205']."</strong></td>
			<td class='tbl2' align='left'><strong>".$locale['zwar_2206']."</strong></td>
			<td class='tbl2' align='left'><strong>".$locale['zwar_0311']."</strong></td>
			<td class='tbl2' align='right' width='1%'><strong>".$locale['zwar_2207']."</strong></td>
			<td class='tbl2' width='1%'>&nbsp;</td>
			</tr>";
			while ($matchdata = dbarray($matchresult)) {
				$zwar_classname = ($i%2 == 0 ? "tbl1" : "tbl2"); $i++;
				$match_gameicon = display_zwar_games($matchdata['war_game_id'], true, true, "wars");
				$match_col2 = zwar_display_matchdate($matchdata['war_date'])."&nbsp;";
				$match_col2 .= "<span>-".showdate("%R",$matchdata['war_date'])."-</span>";
				$match_col3 = isset($matchdata['gametype_name']) ? $matchdata['gametype_name'] : "";
				$match_col3 .= isset($matchdata['matchtype_name']) ? " (".$matchdata['matchtype_name'].") " : "";
				$match_col4 = "<span style='white-space:nowrap;'><a href='".FUSION_SELF."?page=opp_info&amp;oppid=".$matchdata['war_opp_id']."'>".$matchdata['opp_name_short']."</a></span>";
				$match_col6 = $matchdata['war_squad'] ? "<a href='".FUSION_SELF."?page=members&amp;teamid=".$matchdata['war_squad']."'>".$matchdata['group_name']."</a>" : sprintf($zwar_settings_array['zwar_clantag']." %s",($matchdata['game_name_short'] ? " ".$matchdata['game_name_short'] : $matchdata['game_name']));
				echo "<tr>
				<td class='tbl2' align='center'>".$match_gameicon."</td>
				<td class='tbl1' align='left'>".$match_col2."</td>
				<td class='tbl1' align='left'>".$match_col3."</td>
				<td class='tbl1' align='left'>".$match_col4."</td>
				<td class='tbl1' align='right' style='white-space:nowrap;'>".$match_col6."</td>
				<td class='tbl2' align='right' style='white-space:nowrap;'>
				<a href='".FUSION_SELF."?page=war_details&amp;warid=".$matchdata['war_id']."'>
				<img src='".INFUSIONS."zwar_warscript/images/view.png' alt='Details' title='Details' style='border:0;'/>
				</a>
				</td>
				</tr>";
			}
			echo "</table>";
		} elseif ($type="last") {
			echo "<div class='forum-caption'>".$locale['zwar_2212']."</div>
			<table cellpadding='0' cellspacing='1' width='100%' class='tbl-border center'><tr>
			<td class='tbl2' align='left' width='1%'>&nbsp;</td>
			<td class='tbl2' align='left' width='1%'><strong>".$locale['zwar_2213']."</strong></td>
			<td class='tbl2' align='left'><strong>".$locale['zwar_2214']."</strong></td>
			<td class='tbl2' align='left'><strong>".$locale['zwar_0311']."</strong></td>
			<td class='tbl2' align='left' width='1%'><strong>".$locale['zwar_2215']."</strong></td>
			<td class='tbl2' align='left' width='1%'>&nbsp;</td>
			</tr>";
			while ($matchdata = dbarray($matchresult)) {
				$match_date = showdate("%d.%m.%Y",$matchdata['war_date']);
				$match_gametype = isset($matchdata['gametype_name']) ? $matchdata['gametype_name'] : "";
				$match_matchtype = isset($matchdata['matchtype_name']) ? " (".$matchdata['matchtype_name'].") " : "";
				$match_gameicon = display_zwar_games($matchdata['war_game_id'], true, true, "wars");
				$match_col4 = " <a href='".FUSION_SELF."?page=opp_info&amp;oppid=".$matchdata['war_opp_id']."'>".$matchdata['opp_name_short']."</a>";
				$result2 = dbquery("SELECT * FROM ".DB_ZWAR_SCORES." WHERE score_war_id='".$matchdata['war_id']."'");
				if (dbrows($result2)) {
					$ownscorecount=0;
					$oppscorecount=0;
					while ($scoredata = dbarray($result2)) {
						$ownscorecount=$ownscorecount+$scoredata['score_ownscore'];
						$oppscorecount=$oppscorecount+$scoredata['score_oppscore'];
					}
					$scorecolor ="#".($ownscorecount==$oppscorecount ? $zwar_settings_array['zwar_colordraw'] : ($ownscorecount>$oppscorecount ? $zwar_settings_array['zwar_colorwon'] : $zwar_settings_array['zwar_colorlost']));
					$match_score = "<font style='color:".$scorecolor."'>".$ownscorecount." : ".$oppscorecount."</font>";
				} else {
					$match_score = "-----";
				}
				echo "<tr>
				<td class='tbl2'>".$match_gameicon."</td>
				<td class='tbl1' align='left'>".$match_date."</td>
				<td class='tbl1' align='left'>".$match_gametype.$match_matchtype."</td>
				<td class='tbl1' align='left' style='white-space:nowrap;'>".$match_col4."</td>
				<td class='tbl1' align='right' style='white-space:nowrap;'>".$match_score."</td>
				<td class='tbl2' align='right' style='white-space:nowrap;'>
				<a href='".FUSION_SELF."?page=war_details&amp;warid=".$matchdata['war_id']."'><img src='".INFUSIONS."zwar_warscript/images/view.png' alt='details' title='details' style='border:0; vertical-align:middle;'/></a>
				</td>
				</tr>";
			}
			echo "</table>";
		}
	} else {
		if ($type=="next") {
			$title = $locale['zwar_2204'];
			$message = $locale['zwar_2216'];
		} elseif ($type="last") {
			$title = $locale['zwar_2212'];
			$message = $locale['zwar_2217'];
		}
		echo "<div class='tbl-border forum-caption'>".$title."</div>
		<table cellpadding='0' cellspacing='1' width='100%' class='tbl-border center'><tr>
		<td class='tbl1' align='center' colspan='5'>".$message."</td>
		</tr></table>";
	}
}

function render_zwar_teambanner($item) {
	$inforight = $item['team_gameicons']."&nbsp;".$item['membercount']."&nbsp;|&nbsp;<img id='zwarl_".$item['id']."' src='".$item['updown_img']."' alt='".$item['name']."' ".($item['banner_align'] == 1 && $item['image'] != "" ? "style='margin-right:5px;'" : "")."/>";
	$infoleft = "<img id='zwarl_".$item['id']."' src='".$item['updown_img']."' alt='".$item['name']."' ".($item['banner_align'] == 3 && $item['image'] != "" ? "style='margin-left:5px;'" : "")."/>&nbsp;".$item['membercount']."&nbsp;|&nbsp;".$item['team_gameicons'];
	$class = $item['image'] != "" ? "" : " class='forum-caption'";
	$bg_img = $item['image'] != "" ? " background-image:url(".$item['repeatimage'].")" : "";

	$left = $item['banner_align'] == 1 ? "<img src='".$item['image']."' alt='".$item['name']."' />" : ($item['banner_infoalign'] == 1 && $item['banner_showinfo'] ? $infoleft : false);
	$left2 = $item['banner_infoalign'] == 1 && $item['banner_showinfo'] && ($item['banner_align'] == 1 || $item['banner_align'] == 2)? $infoleft : "";
	$right = $item['banner_align'] == 3 ? "<img src='".$item['image']."' alt='".$item['name']."' />" : ($item['banner_infoalign'] == 3 && $item['banner_showinfo'] ? $inforight : false);
	$right2 = $item['banner_infoalign'] == 3 && $item['banner_showinfo'] && ($item['banner_align'] == 3 || $item['banner_align'] == 2)? $inforight : "";
	echo "<table cellpadding='0' cellspacing='0' width='100%' class='tbl-border center' onclick=\"zwar_show_hide(".$item['id'].");\" style='cursor:pointer;".$bg_img."'><tr>";
	if ( $item['banner_align'] == 2) {
		echo "<td align='center' colspan='2' $class>".($item['image'] != "" ? "<img src='".$item['image']."' alt='".$item['name']."' />" : $item['name'])."</td>";
	} else {
		echo "<td align='left' $class>".$left."</td><td align='right' $class>".$right."</td>";
	}
	if ($left2 || $right2) {
		echo "</tr><tr><td align='left' class='tbl2'>".$left2."</td><td align='right' class='tbl2'>".$right2."</td>";
	}
	echo "</tr></table>";
}

function display_zwar_memberlist_item($memberresult, $item) {
	global $zwar_settings_array, $locale, $zwar_countrycodes_array;
	
	if (dbrows($memberresult)) {
		echo "<div id='listitem_".$item['id']."' style='".$item['display']."'>
		<table cellpadding='0' cellspacing='1' width='100%' class='tbl-border center'>
		<tr>
		<td class='tbl2' width='1%'>&nbsp;</td>
		<td class='tbl2' width='15%'><strong>".$locale['zwar_1118']."</strong></td>
		<td class='tbl2' width='20%'><strong>".$locale['zwar_1119']."</strong></td>
		<td class='tbl2' width='15%'><strong>".$locale['zwar_1120']."</strong></td>
		<td class='tbl2'><strong>".$locale['zwar_1121']."</strong></td>
		<td class='tbl2' width='1%' align='center'><strong>".$locale['zwar_1122']."</strong></td>
		</tr>\n";
		while ($memberdata = dbarray($memberresult)) {
			$member_array['member_cflag'] = $memberdata['member_cflag'] != "" ? $memberdata['member_cflag'] : "Unknown.gif";
			$ccode = preg_replace("/\.gif$/","",$member_array['member_cflag']);
			$member_array['country'] = isset($zwar_countrycodes_array[strtoupper($ccode)]) ? $zwar_countrycodes_array[strtoupper($ccode)] : $ccode;
			$member_array['nickname'] = $memberdata['user_name'];
			$member_array['name'] = $memberdata['member_realname']!="" ? $memberdata['member_realname'] : "-----";
			$member_array['joined'] = showdate("shortdate", $memberdata['user_joined']);
			$member_array['games'] = display_zwar_games($memberdata['member_games'], false);
			if ($item['type'] == 1) {
				$member_array['usertitle'] = $memberdata['member_position'] ? $memberdata['member_position'] : "-----";
				$member_array['member_id'] = $memberdata['user_id'];
			} elseif ($item['type'] == 2) {
				$member_array['usertitle'] = $memberdata['player_info'] ? $memberdata['player_info'] : ($memberdata['member_clanstatus'] ? $locale['zwar_0412'] : $locale['zwar_0413']);
				$member_array['member_id'] = $memberdata['player_member_id'];
			}
			$member_array['status'] = $memberdata['member_clanstatus'] ? ($memberdata['member_status'] ? "<font style='color:#".$zwar_settings_array['zwar_coloractive'].";'>".$locale['zwar_1123']."</font>" : "<font style='color:#".$zwar_settings_array['zwar_colorinactive'].";'>".$locale['zwar_1124']."</font>") : $locale['zwar_0414'];
			echo "<tr>
			<td class='tbl2'>
			<img src='".INFUSIONS."zwar_warscript/locale/flags/".$member_array['member_cflag']."' alt='".$member_array['country']."' title='".$member_array['country']."'/>
			</td>
			<td class='tbl1' style='white-space:nowrap;'>
			<a href='profile.php?lookup=".$member_array['member_id']."'>".$member_array['nickname']."</a></td>
			<td class='tbl1' style='white-space:nowrap;'>".$member_array['name']."</td>
			<td class='tbl1'>".$member_array['usertitle']."</td>
			<td class='tbl1' style='white-space:nowrap;'>".$member_array['games']."</td>
			<td class='tbl2' align='center'>".$member_array['status']."</td>
			</tr>\n";
		}
		echo "</table>";
		if ($item['showstats']) {
			$left = "<b>Matches:</b>
			<b>".$item['stats']['won']."</b> ".($item['stats']['won'] == 1 ? $locale['zwar_0305'] : $locale['zwar_0306'])."
			<b>".$item['stats']['draw']."</b> ".($item['stats']['draw'] == 1 ? $locale['zwar_0309'] : $locale['zwar_0310'])."
			<b>".$item['stats']['lost']."</b> ".($item['stats']['lost'] == 1 ? $locale['zwar_0307'] : $locale['zwar_0308']);
		} else {
			$left = "";
		}
		render_zwar_tablefoot($left, $item['links']);
		echo "</div>";
	}
	render_zwar_break(5);
}

function render_opp_info($data) {
	global $locale;
	
	echo "<table align='center' cellpadding='0' cellspacing='1' width='96%' class='tbl-border'>
	<tr>
	<td width='100%' class='forum-caption' colspan='2' align='center'>
	".display_zwar_flag($data['opp_country'])." ".$data['opp_name_short']." - ".$data['opp_name']."
	</td>
	</tr>";
	echo "<tr>
	<td width='120' class='tbl2' align='right'>".$locale['zwar_0352']."&nbsp;</td>
	<td width='80%' class='tbl1' align='left'>&nbsp;<a target='_blank' href='".$data['opp_hp']."'>".$data['opp_hp']."</a></td>
	</tr>";
	echo "<tr>
	<td width='120' class='tbl2' align='right'>".$locale['zwar_0353']."&nbsp;</td>
	<td width='80%' class='tbl1' align='left'>&nbsp;".$data['opp_contact1']."</td>
	</tr>";
	echo "<tr>
	<td width='120' class='tbl2' align='right'>".$locale['zwar_0354']."&nbsp;</td>
	<td width='80%' class='tbl1' align='left'>&nbsp;".$data['opp_contact2']."</td>
	</tr>";
	echo "<tr>
	<td width='120' class='tbl2' align='right'>".$locale['zwar_0355']."&nbsp;</td>
	<td width='80%' class='tbl1' align='left'>&nbsp;".$data['opp_contact3']."</td>
	</tr>";
	echo "<tr>
	<td width='120' class='tbl2' align='right'>".$locale['zwar_0356']."&nbsp;</td>
	<td width='80%' class='tbl1' align='left'>&nbsp;".$data['opp_contact4']."</td>
	</tr>";
	echo "</table><br/>";
}

function render_zwar_details($war_array) {
	global $locale, $zwar_settings_array;
	
	$own_players_array = explode(".", $war_array['own_players']);
	$own_players_display = ""; $i = 0;
	if (is_array($own_players_array) && count($own_players_array)>1) {
		$own_players_display .= "<table cellpadding='1' cellspacing='0' align='left' class='center'><tr>";
		foreach($own_players_array as $player_id) {
			$player_img = "";
			$player_result = dbquery("SELECT member_image, user_name, user_id FROM ".DB_USERS." WHERE user_id='".$player_id."'");
			if (dbrows($player_result)) {
				$playerdata = dbarray($player_result);
				$own_player_image = $playerdata['member_image'] != "" ? $playerdata['member_image'] : "anonym.jpg";
				$own_players_display .= "<td valign='top' width='".$zwar_settings_array['zwar_memberpics_width']."' align='center' style='white-space:nowrap; padding-right:10px;'><img src='".INFUSIONS."zwar_warscript/images/members/".$own_player_image."' alt='".$playerdata['user_name']."' width='".$zwar_settings_array['zwar_memberpics_width']."' height='".$zwar_settings_array['zwar_memberpics_height']."'/><br/><a href='".BASEDIR."profile.php?lookup=".$playerdata['user_id']."'>".$playerdata['user_name']."</a></td>";
				$i++;
				if ($i % 5 == 0) { $own_players_display .= "</tr><tr>"; }
			}
		}
		$own_players_display .= "</tr></table>";
	}	
	echo "<div class='tbl-border tbl2' align='center'>
	<table cellpadding='0' cellspacing='0' border='0' class='center'><tr>
	<td style='white-space:nowrap;' align='right'>".$war_array['gameicon']."&nbsp;<strong>".$war_array['team']."</strong></td>
	<td align='center'>&nbsp;vs.&nbsp;</td>
	<td style='white-space:nowrap;'><strong>".$war_array['opponent']."</strong>&nbsp;".display_zwar_flag($war_array['opp_country'])."</td>
	</tr>";
	if (!$war_array['status_open'] && $war_array['status_finished']) {
		echo "<tr>
		<td align='right'>".$war_array['ownscore']."</td><td align='center'>:</td><td>".$war_array['oppscore']."</td>
		</tr>";
	}
	echo "</table>
	</div>";
	render_zwar_break(5);
	echo "<table cellpadding='0' cellspacing='1' width='100%' class='tbl-border center'><tr>
	<td class='tbl2' width='1%' style='white-space:nowrap;'><span class='small'><b>".$locale['zwar_0011'].": </b></span></td>
	<td class='tbl1'>".$war_array['war_date']." - ".sprintf($locale['zwar_0214'], $war_array['war_time'])."</td>
	<td class='tbl2' width='1%' style='white-space:nowrap;'><span class='small'><b>".$locale['zwar_0201'].": </b></span></td>
	<td class='tbl1'>".$war_array['status_title']."</td>
	</tr><tr>
	<td class='tbl2' width='1%'><span class='small'><b>".$locale['zwar_0088'].": </b></span></td>
	<td class='tbl1'>".$war_array['gametype']." ".$war_array['matchtype']."</td>
	<td class='tbl2' width='1%'><span class='small'><b>".$locale['zwar_0047'].": </b></span></td>
	<td class='tbl1'>".$war_array['game_name']."</td>
	</tr><tr>
	<td class='tbl2' width='1%' valign='top'><span class='small'><b>".$locale['zwar_0017'].":</b></span></td>
	<td class='tbl1'>".$war_array['teamsize']."</td>
	<td class='tbl2' width='1%' valign='top'><span class='small'><b>".$locale['zwar_0018'].":</b></span></td>
	<td class='tbl1'>".$war_array['added_by']."</td>
	</tr><tr>
	<td class='tbl2' width='1%' style='white-space:nowrap;'><span class='small'><b>".$locale['zwar_0217'].":</b></span></td>
	<td class='tbl1' align='left'>".$war_array['server_name'].($war_array['server_name'] && $war_array['server_ip'] ? " - " : "").$war_array['server_ip']."</td>
	<td class='tbl2' width='1%' style='white-space:nowrap;'><span class='small'><b>".$locale['zwar_0022'].":</b></span></td>
	<td class='tbl1' align='left'>".$war_array['server_pass']."</td>
	</tr></table>";
	render_zwar_break(5);
	echo "<table cellpadding='0' cellspacing='1' width='100%' class='tbl-border center'><tr>
	<td width='1%' class='tbl2'>
	<span class='small'><b>".$locale['zwar_0215']."</b></span>
	</td><td class='tbl2'>
	<span class='small'><b>".(!$war_array['status_open'] && $war_array['status_finished'] ? $locale['zwar_0216'] : $locale['zwar_0023'])."</b></span>
	</td>";
	if (!$war_array['status_open'] && $war_array['status_finished'] && $war_array['war_files']!="") {
		echo "<td class='tbl2' width='1%'>
		<span class='small'><b>".$locale['zwar_0241']."</b></span>
		</td>";
	}
	echo "</tr><tr>
	<td align='left'>";
	if ($war_array['loc_count']) {
		echo "<table cellpadding='0' cellspacing='1' width='100%' class='center'><tr>
		".$war_array['maps']."
		</tr></table>";
	}
	echo "</td>
	<td class='tbl1' valign='top' align='center'>";
	if (!$war_array['status_open'] && $war_array['status_finished']) {
		echo "<span class='small'><b>".$locale['zwar_0246'].":</b></span> <font style='color:#".$war_array['result_color']."'>".$war_array['result_title']."</font><br/><br/>";
	}
	echo (!$war_array['status_open'] && $war_array['status_finished'] ? $war_array['war_comment'] : $war_array['info'])."</td>";
	if (!$war_array['status_open'] && $war_array['status_finished'] && $war_array['war_files']!="") {
		echo "<td valign='top' class='tbl1' style='padding:0;'>".$war_array['war_files']."</td>";
	}
	echo "</tr></table>";
	render_zwar_break(5);
	if ($war_array['own_players'] != "" || $war_array['opp_players'] != "") {
		echo "<table cellpadding='0' cellspacing='1' width='100%' class='tbl-border center'>";
		if ($war_array['own_players'] != "") {
			echo "<tr>
			<td class='tbl2' align='left'>
			<span class='small'><b>".$zwar_settings_array['zwar_clantag']." ".$locale['zwar_0227'].":</b></span>
			</td>
			</tr><tr>
			<td class='tbl1'>".$own_players_display."</td>
			</tr>";
		}
		if ($war_array['opp_players'] != "") {
			echo "<tr>
			<td class='tbl2' align='left'>
			<span class='small'><b>".$war_array['opponent_tag']." ".$locale['zwar_0227'].":</b></span>
			</td>
			</tr><tr>
			<td class='tbl1'>".$war_array['opp_players']."</td>
			</tr>";
		}
		echo "</table>";
		render_zwar_break(5);
	}
	if (($war_array['status_open'] || !$war_array['status_finished']) && iMEMBER) {
		echo "<div class='tbl-border tbl2'>
		<div style='float:left'><strong>".$locale['zwar_0218'].": (".$war_array['available_players']."/".$war_array['teamsize'].")</strong></div>
		<div style='float:right'>".$war_array['applylink']."</div>
		<div style='clear:both;'></div></div>";
	}
}

function get_war_parts ($warid) {
	global $locale, $zwar_settings_array;

	if (iMEMBER && checkgroup($zwar_settings_array['zwar_group_warmember'])) {
		$result = dbquery("SELECT * FROM ".DB_ZWAR_PARTS." AS zpa LEFT JOIN ".DB_USERS." AS u ON zpa.part_user_id=u.user_id WHERE part_war_id='".$warid."' ORDER BY u.user_name");
		if (dbrows($result)) {
			echo "<table cellpadding='0' cellspacing='1' class='tbl-border center' width='100%'><tr>
			<td class='tbl2' width='1%' align='left'>
			<strong>".$locale['zwar_2218']."</strong>
			</td>
			<td class='tbl2' align='left' colspan='2'>
			<strong>".$locale['zwar_2219']."</strong>
			</td>
			</tr>";
			while ($data = dbarray($result)) {
				$avail_image = $data['part_status']==1 ? "available.gif" : ($data['part_status']==2 ? "unsure.gif" : "notavailable.gif");
				$comment = parsesmileys($data['part_comment'])." (".showdate("%d.%m.%Y - %R",$data['part_date']).")";
				echo "<tr>
				<td class='tbl2' align='left' style='white-space:nowrap;'>
				<img src='".INFUSIONS."zwar_warscript/images/".$avail_image."' />&nbsp;&nbsp;<a href='".BASEDIR."profile.php?lookup=".$data['user_id']."'>".$data['user_name']."</a></td>
				<td class='tbl1'>".$comment."</td>
				<td class='tbl1' width='1%' style='white-space:nowrap;'>";
				if (iADMIN && checkrights("ZWAR")) { echo "<a href='".FUSION_SELF."?page=war_details&amp;warid=".$warid."&amp;editpart=".$data['part_user_id']."'>".zwar_images("edit",$locale['zwar_0003'])."</a><a href='".FUSION_SELF."?page=war_details&amp;warid=".$warid."&amp;delpart=".$data['part_id']."'>".zwar_images("del",$locale['zwar_0051'])."</a>"; }
				echo "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "<table cellpadding='0' cellspacing='0' class='tbl-border center' width='100%'><tr>
			<td class='tbl1' align='center'>
			".$locale['zwar_2220']."
			</td>
			</tr></table>";
		}
	}
}

function render_zwar_myviewdata($match_array) {
	echo "<tr>
	<td class='tbl2' width='1%' align='center'>".$match_array['gameicon']."</td>
	<td class='tbl1' width='1%' style='white-space:nowrap;'>".$match_array['match_date']."</td>
	<td class='tbl1'>".$match_array['war_info']."</td>
	<td class='tbl2' width='1%' align='right' style='white-space:nowrap;'>".$match_array['matchoptions']."</td>
	</tr>";
}

function render_zwar_stats ($teamid, $gameid) {
	global $locale;
	
	$zwar_stats = get_zwar_stats($teamid, $gameid);
	render_zwar_break(5);
	echo "<div align='center' class='tbl-border tbl2'>
	<b>".$zwar_stats['total']."</b> ".$locale['zwar_0302']." | <b>".$zwar_stats['won']."</b> ".($zwar_stats['won'] == 1 ? $locale['zwar_0305'] : $locale['zwar_0306'])."
	 | <b>".$zwar_stats['draw']."</b> ".($zwar_stats['draw'] == 1 ? $locale['zwar_0309'] : $locale['zwar_0310'])." | <b>".$zwar_stats['lost']."</b> ".($zwar_stats['lost'] == 1 ? $locale['zwar_0307'] : $locale['zwar_0308'])."
	</div>";
}

function zwar_FormOpen($action) {
	echo "<form name='inputform' method='post' action='$action'>
	<table cellpadding='0' cellspacing='1' width='100%' class='tbl-border center'>";
}
function zwar_FormCaption($title) {	
	echo "<tr><td class='tbl2' colspan='2'><strong>".$title."</strong></td></tr>\n";
}
function zwar_FormRight($title, $content) {
	echo "<td class='tbl1' style='white-space:nowrap; width:50%;'>".$title."<br/>&nbsp;".$content."</td></tr>\n";
}
function zwar_FormLeft($title, $content) {
	echo "<tr><td class='tbl1' style='white-space:nowrap; width:50%;'>".$title."<br/>&nbsp;".$content."</td>\n";
}
function zwar_FormBoth($title, $content) {
	echo "<tr><td class='tbl1' style='white-space:nowrap;' colspan='2'>".$title."<br/>&nbsp;".$content."</td></tr>\n";
}
function zwar_FormClose($captcha=true) {
	global $locale;
	
	echo "<tr><td class='tbl1' colspan='2' align='center'>";
	if ($captcha) { 
		echo make_Captcha()."<br/>
		<input type='text' name='captcha_code' class='textbox' style='width:100px' />&nbsp;|&nbsp;";
	}
	echo "<input type='submit' name='send' style='margin-top:5px;' value='".$locale['zwar_0534']."' class='button' />
	</td></tr></table>
	</form>";
}
?>