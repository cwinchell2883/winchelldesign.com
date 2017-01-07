<?php
/*-------------------------------------------------------+
| PHP-Fusion 6 Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: members.php
| Author: ZEZoar
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/
if (!defined("IN_FUSION")) { die("Access Denied"); }
$teamid = isset($_POST['teamid']) ? $_POST['teamid'] : (isset($_GET['teamid']) ? $_GET['teamid'] : null);
$gameid = isset($_POST['gameid']) ? $_POST['gameid'] : (isset($_GET['gameid']) ? $_GET['gameid'] : null);

if (isset($gameid) && !isNum($gameid)) { redirect(BASEDIR.'index.php'); }
if (isset($teamid) && !isNum($teamid)) { redirect(BASEDIR.'index.php'); }

require_once INFUSIONS."zwar_warscript/locale/ccodes.php";

if (isset($_POST['go_zwar_option']) && isset($teamid) && $teamid) {
	if (isset($_POST['zwar_options']) && $_POST['zwar_options']=='join') {
		$password = stripinput($_POST['zpassinput']);
		$team_password = dbresult(dbquery("SELECT group_joinpass FROM ".DB_ZWAR_SQUADS." WHERE group_id='".$teamid."'"),0);
		if ($team_password != "" && $password == $team_password) {
			opentable($locale['zwar_0420']);
			$player_order = dbresult(dbquery("SELECT MAX(player_order) FROM ".DB_ZWAR_SQUADS_PLAYERS." WHERE player_squad='".$teamid."'"),0);
			if (!dbcount("(player_id)", DB_ZWAR_SQUADS_PLAYERS, "player_member_id='".$userdata['user_id']."' AND player_squad='".$teamid."'")) {
				$result = dbquery("INSERT INTO ".DB_ZWAR_SQUADS_PLAYERS." (player_member_id, player_squad, player_order) VALUES ('".$userdata['user_id']."', '".$teamid."', '$player_order')");
			}
			$message = $locale['zwar_0410']."<br/><br/><a href='".FUSION_SELF."?page=members&amp;teamid=".$teamid."'>".$locale['zwar_0054']." >></a>";
		} else {
			opentable($locale['zwar_0053']);
			$message = $locale['zwar_0411']."<br/><br/><a href='".FUSION_SELF."?page=members&amp;teamid=".$teamid."'>".$locale['zwar_0054']." >></a>";
		}
		render_zwar_message($message);
		closetable();
	} elseif (isset($_POST['zwar_options']) && $_POST['zwar_options']=='leave') {
		$result = dbquery("DELETE FROM ".DB_ZWAR_SQUADS_PLAYERS." WHERE player_member_id='".$userdata['user_id']."' AND player_squad='".$teamid."'");
		redirect(FUSION_SELF."?page=members&amp;teamid=".$teamid);
	} elseif (isset($_POST['zwar_options']) && $_POST['zwar_options']=='edit') {
		if (checkrights("ZWAR")) {$zwar_aidlink = $aidlink;} else {$zwar_aidlink = "?aid=0";}
		redirect(INFUSIONS."zwar_warscript/zwar_admin_panel.php".$zwar_aidlink."&amp;pagefile=squads&amp;action=edit&amp;group_id=".$teamid);
	} elseif (isset($_POST['zwar_options']) && $_POST['zwar_options']=='addwar') {
		if (checkrights("ZWAR")) {$zwar_aidlink = $aidlink;} else {$zwar_aidlink = "?aid=0";}
		redirect(INFUSIONS."zwar_warscript/zwar_admin_panel.php".$zwar_aidlink."&amp;pagefile=editwars&amp;action=add");
	}
} elseif (isset($gameid) || isset($teamid)) {
	$where = "";
	$where = isset($gameid) && $gameid ? "WHERE group_games REGEXP('^\\\.{$gameid}$|\\\.{$gameid}\\\.|\\\.{$gameid}$')" : $where;
	$where = isset($teamid) && $teamid ? "WHERE group_id='".$teamid."'" : $where;
	opentable($locale['zwar_0418']);
	echo "<div class='zwar-body'>";
	
	add_to_title("&nbsp;-&nbsp;".$locale['zwar_0418']);
	
	display_zwar_selectbar((isset($gameid) && $gameid ? $gameid : ""), (isset($teamid) && $teamid ? $teamid : ""), FUSION_SELF."?page=members");
	
	$result = dbquery("SELECT * FROM ".DB_ZWAR_SQUADS." $where ORDER BY group_name");
	if (dbrows($result)) {
		while ($data = dbarray($result)) {
			$list_item['id'] = $data['group_id'];
			$list_item['games'] = $data['group_games'];
			$list_item['team_gameicons'] = display_zwar_games($list_item['games'], true, false);
			$list_item['type'] = "2";
			$list_item['image'] = $data['group_listimage'] != "" ? INFUSIONS."zwar_warscript/images/groups/".$data['group_listimage'] : "";
			$list_item['repeatimage'] = INFUSIONS."zwar_warscript/images/groups/repeat.jpg";
			$list_item['name'] = $data['group_name'];
			$list_item['info'] = nl2br(parseubb(parsesmileys($data['group_info'])));
			$list_item['logo'] = $data['group_logo'];
			$list_item['display'] = isset($teamid) && $teamid && !$zwar_settings_array['zwar_squadinfo_open'] ? "display:none;" : "";
			$list_item['updown_img'] = zwar_images($list_item['display'] ? "up" : "down", "", true);
			$memberwhere = $zwar_settings_array['zwar_nomem_visible'] ? "" : " AND member_clanstatus='1'";
			$memberresult = dbquery("SELECT * FROM ".DB_ZWAR_SQUADS_PLAYERS." AS zsp LEFT JOIN ".DB_USERS." AS u ON zsp.player_member_id=u.user_id WHERE player_squad='".$list_item['id']."'$memberwhere ORDER BY player_order, user_name");
			$itemcount = dbrows($memberresult);
			$list_item['membercount'] = $itemcount == 1 ? $itemcount." ".$locale['zwar_0026'] : $itemcount." ".$locale['zwar_0027'];
			$list_item['links'] = isset($teamid) && $teamid ? "" : "<a href='".BASEDIR."zwar.php?page=members&amp;teamid=".$list_item['id']."'>".$locale['zwar_0401']." >></a>";
			$list_item['stats'] = get_zwar_stats($list_item['id']);
			$list_item['showstats'] = false;
			$item_games = explode(".", $list_item['games']);
			$list_item['showstats'] = true;
			$list_item['join_enabled'] = $data['group_joinpass'] != "" ? true : false;
			$list_item['banner_showinfo'] = $data['group_banner_showinfo'] == 1 ? true : false;
			$list_item['banner_align'] = $data['group_banner_align'];
			$list_item['banner_infoalign'] = $data['group_banner_infoalign'];
			render_zwar_teambanner($list_item);
			display_zwar_memberlist_item($memberresult, $list_item);
		}
		if (isset($teamid) && $teamid) {
			render_zwar_break(5);
			render_zwar_teaminfo($list_item);
			
			render_zwar_break(7);
			$nextmatchresult = dbquery("SELECT * FROM (((((((".DB_ZWAR_WARS." AS zw LEFT JOIN ".DB_ZWAR_OPPONENTS." AS zop ON zw.war_opp_id=zop.opp_id) LEFT JOIN ".DB_ZWAR_SERVERS." AS zse ON zw.war_server_id=zse.server_id) LEFT JOIN ".DB_ZWAR_GAMES." AS zga ON zw.war_game_id=zga.game_id) LEFT JOIN ".DB_ZWAR_GAMETYPES." AS zgt ON zw.war_gametype_id=zgt.gametype_id) LEFT JOIN ".DB_ZWAR_MATCHTYPES." AS zmt ON zw.war_matchtype_id=zmt.matchtype_id) LEFT JOIN ".DB_USERS." AS u ON zw.war_added_by=u.user_id) LEFT JOIN ".DB_ZWAR_SQUADS." AS cmg ON zw.war_squad=cmg.group_id) WHERE (zw.war_squad='".$teamid."' OR (zw.war_squad='' AND ".zwar_gameaccess("zw.war_game_id", $list_item['games']).")) AND zw.war_date>='".(time()-(3600*2))."' ORDER BY zw.war_date LIMIT 0,3");
			display_zwar_war_list($nextmatchresult, "next");
			
			render_zwar_break(7);
			$lastmatchresult = dbquery("SELECT * FROM (((((((".DB_ZWAR_WARS." AS zw LEFT JOIN ".DB_ZWAR_OPPONENTS." AS zop ON zw.war_opp_id=zop.opp_id) LEFT JOIN ".DB_ZWAR_SERVERS." AS zse ON zw.war_server_id=zse.server_id) LEFT JOIN ".DB_ZWAR_GAMES." AS zga ON zw.war_game_id=zga.game_id) LEFT JOIN ".DB_ZWAR_GAMETYPES." AS zgt ON zw.war_gametype_id=zgt.gametype_id) LEFT JOIN ".DB_ZWAR_MATCHTYPES." AS zmt ON zw.war_matchtype_id=zmt.matchtype_id) LEFT JOIN ".DB_USERS." AS u ON zw.war_added_by=u.user_id) LEFT JOIN ".DB_ZWAR_SQUADS." AS cmg ON zw.war_squad=cmg.group_id) WHERE (zw.war_squad='".$teamid."' OR (zw.war_squad='' AND ".zwar_gameaccess("zw.war_game_id", $list_item['games']).")) AND zw.war_date<'".time()."' AND zw.war_finished='1' ORDER BY zw.war_date DESC LIMIT 0,3");
			display_zwar_war_list($lastmatchresult, "last");
			
			render_zwar_break(7);
			$zwar_optionselect = "";
			$vis = " display:none";
			if (iMEMBER && !dbcount("(player_id)", DB_ZWAR_SQUADS_PLAYERS, "player_member_id='".$userdata['user_id']."' AND player_squad='".$teamid."'") && ($list_item['join_enabled'] && (iZWAR_CLANMEMBER || $zwar_settings_array['zwar_nomem_visible']))) { 
				$zwar_optionselect .= "<option value='join' selected='selected'>".$locale['zwar_0407']."</option>\n";
				$vis = "";
			}
			if (checkrights("ZWAR") || in_array($teamid, zwar_getForLevel(22, "teams"))) {
				$zwar_optionselect .= "<option value='edit'>".$locale['zwar_0003']."</option>\n";
				$zwar_optionselect .= "<option value='addwar'>".$locale['zwar_0417']."</option>\n";
			}
			if (iMEMBER && dbcount("(player_id)", DB_ZWAR_SQUADS_PLAYERS, "player_member_id='".$userdata['user_id']."' AND player_squad='".$teamid."'")) { 
				$zwar_optionselect .= "<option value='leave'>".$locale['zwar_0415']."</option>\n"; 
			}
			if ($zwar_optionselect != "") {
				echo "<form name='zwar_optform' method='post' action='".FUSION_SELF."?page=members' onsubmit=\"return askifleave();\">";
				render_zwar_teamoptions($zwar_optionselect, $teamid, $vis);
				echo "</form>";
			}
			render_zwar_break(10);
		}
	} else {
		render_zwar_message($locale['zwar_0402']);
	}
	render_zwar_pagefoot("<a href='".FUSION_SELF."?page=members'>&lt;&lt; ".$locale['zwar_0403']."</a>", "<a href='".FUSION_SELF."?page=wars".($teamid ? "&amp;teamid=".$teamid : ($gameid ? "&amp;gameid=".$gameid : ""))."'>".$locale['zwar_0404']." >></a>");
	closetable();
} else {
	$result = dbquery("(SELECT zml.*, zsq.group_name, zsq.group_logo, zsq.group_games, zsq.group_listimage, zsq.group_joinpass, zsq.group_banner_align, zsq.group_banner_showinfo,  zsq.group_banner_infoalign FROM ".DB_ZWAR_MEMBER_LIST." AS zml INNER JOIN ".DB_ZWAR_SQUADS." AS zsq ON (zml.list_item_type='2' AND zml.list_item=zsq.group_id)) UNION (SELECT zml.*, ug.group_name, '' AS gorup_logo, '' AS group_games, '' AS group_listimage, '' AS group_joinpass, '' AS group_banner_align, '' AS group_banner_showinfo, '' AS group_banner_infoalign FROM ".DB_ZWAR_MEMBER_LIST." AS zml INNER JOIN ".DB_USER_GROUPS." AS ug ON (zml.list_item_type='1' AND zml.list_item=ug.group_id)) UNION (SELECT zml.*, '' AS group_name, '' AS group_logo, '' AS group_games, '' AS group_listimage, '' AS group_joinpass, '' AS group_banner_align, '' AS group_banner_showinfo, '' AS group_banner_infoalign FROM ".DB_ZWAR_MEMBER_LIST." AS zml WHERE zml.list_item_type='3') ORDER BY list_item_order");
	if (dbrows($result)) {
		opentable($locale['zwar_0419']);
		echo "<div class='zwar-body'>";
		add_to_title("&nbsp;-&nbsp;".$locale['zwar_0419']);
		while ($data = dbarray($result)) {
			$list_item['id'] = $data['list_item_id'];
			$list_item['type'] = $data['list_item_type'];
			$list_item['itemid'] = $data['list_item'];
			$list_item['repeatimage'] = INFUSIONS."zwar_warscript/images/groups/repeat.jpg";
			$list_item['name'] = $data['group_name'];
			$list_item['open'] = $data['list_item_open'];
			$list_item['display'] = $list_item['open'] ? "" : " display:none;";
			$list_item['updown_img'] = zwar_images($list_item['display'] ? "up" : "down", "", true);
			$memberresult = "";
			if ($list_item['type'] == 1) {
				$itemid = $list_item['itemid'];
				$memberresult = dbquery("SELECT * FROM ".DB_USERS." WHERE member_groupsshow REGEXP('^\\\.{$itemid}$|\\\.{$itemid}\\\.|\\\.{$itemid}$') AND member_clanstatus='1' ORDER BY user_name");
				$itemcount = dbrows($memberresult);
				$list_item['membercount'] = $itemcount == 1 ? $itemcount." ".$locale['zwar_0026'] : $itemcount." ".$locale['zwar_0027'];
				$list_item['links'] = ""; 
				$list_item['stats'] = ""; 
				$list_item['logo'] = "";
				$list_item['image'] = $data['list_item_image'] != "" ? INFUSIONS."zwar_warscript/images/groups/".$data['list_item_image'] : "";
				$list_item['team_gameicons'] = "";
				$list_item['showstats'] = false;
				$list_item['join_enabled'] = false;
				$list_item['banner_showinfo'] = $data['list_teambanner_showinfo'] == 1 ? true : false;
				$list_item['banner_align'] = $data['list_teambanner_align'];
				$list_item['banner_infoalign'] = $data['list_teambanner_infoalign'];
			} elseif ($list_item['type'] == 2) {
				$memberwhere = $zwar_settings_array['zwar_nomem_visible'] ? "" : " AND member_clanstatus='1'";
				$memberresult = dbquery("SELECT * FROM ".DB_ZWAR_SQUADS_PLAYERS." AS zsp LEFT JOIN ".DB_USERS." AS u ON zsp.player_member_id=u.user_id WHERE player_squad='".$list_item['itemid']."'$memberwhere ORDER BY player_order, user_name");
				$itemcount = dbrows($memberresult);
				$list_item['membercount'] = $itemcount == 1 ? $itemcount." ".$locale['zwar_0026'] : $itemcount." ".$locale['zwar_0027'];
				$list_item['links'] = "<a href='".BASEDIR."zwar.php?page=members&amp;teamid=".$list_item['itemid']."'>".$locale['zwar_0401']." >></a>";
				$list_item['stats'] = get_zwar_stats($list_item['itemid']);
				$list_item['showstats'] = false;
				$list_item['games'] = $data['group_games'];
				$item_games = explode(".", $list_item['games']);
				$list_item['showstats'] = true;
				$list_item['join_enabled'] = $data['group_joinpass'] != "" ? true : false;
				$list_item['logo'] = $data['group_logo'];
				$list_item['image'] = $data['group_listimage'] != "" ? INFUSIONS."zwar_warscript/images/groups/".$data['group_listimage'] : "";
				$list_item['team_gameicons'] = display_zwar_games($data['group_games'], true, false);
				$list_item['banner_showinfo'] = $data['group_banner_showinfo'] == 1 ? true : false;
				$list_item['banner_align'] = $data['group_banner_align'];
				$list_item['banner_infoalign'] = $data['group_banner_infoalign'];
			}
			
			if ($list_item['type'] != 3) {
				render_zwar_teambanner($list_item);
				display_zwar_memberlist_item($memberresult, $list_item);
			} else {
				render_zwar_memberlist_break();
			}
		}
		echo "</div>";
		closetable();
	}
}
echo "<script type='text/javascript'>
function askifleave() {
if (document.zwar_optform.zwar_options.value=='leave') {
return confirm('".$locale['zwar_0416']."');
} else {
return true;
}
}\n</script>";
?>
