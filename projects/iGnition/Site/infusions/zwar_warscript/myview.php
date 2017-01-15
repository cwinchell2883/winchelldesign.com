<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: myview.php
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

if(iZWAR_CLANMEMBER || (iMEMBER && $zwar_settings_array['zwar_nomem_visible'])) {
	if (isset($_GET['status']) && !isset($message)) {
		if ($_GET['status'] == "msu") {
			$message = "<b>".$locale['zwar_2401']."</b>";
		} elseif ($_GET['status'] == "del") {
			$message = "<b>".$locale['zwar_2402']."</b>";
		}
		if ($message) {	echo "<div class='admin-message'>".$message."</div>\n"; }
	}
	$warorg_teams = zwar_getForLevel(11, "teams");
	$leader_teams = zwar_getForLevel(22, "teams");
	$warorg_games = zwar_getForLevel(11, "games");
	$teamwhere = checkrights("ZWAR") ? "" : "INNER JOIN ".DB_ZWAR_SQUADS_PLAYERS." AS zsp ON zsp.player_squad=zs.group_id WHERE zsp.player_member_id='".$userdata['user_id']."'";
	$gamewhere = checkrights("ZWAR") ? "" : "AND war_game_id IN()";
	
	opentable($locale['zwar_2403']." - ".$userdata['user_name']);
	echo "<div class='zwar-body'>";
	add_to_title("&nbsp;-&nbsp;".$locale['zwar_2403']." (".$userdata['user_name'].")");
	$result = dbquery("SELECT * FROM ".DB_ZWAR_SQUADS." AS zs $teamwhere ORDER BY zs.group_name");
	if (dbrows($result)) {	
		while ($data = dbarray($result)) {
			$team_array['teamoptions'] = "";
			if (checkrights("ZWAR")) {$zwar_aidlink = $aidlink;} else {$zwar_aidlink = "?aid=0";}
			if (checkrights("ZWAR") || in_array($data['group_id'], $warorg_teams)) {
				$team_array['teamoptions'] .= ($team_array['teamoptions'] != "" ? "&nbsp;|&nbsp;" : "")."<a href='".INFUSIONS."zwar_warscript/zwar_admin_panel.php".$zwar_aidlink."&amp;pagefile=editwars&amp;action=add&amp;teamid=".$data['group_id']."'>".$locale['zwar_2404']."</a>";
			}
			if (checkrights("ZWAR") || in_array($data['group_id'], $leader_teams)) {
				$team_array['teamoptions'] .= ($team_array['teamoptions'] != "" ? "&nbsp;|&nbsp;" : "")."<a href='".INFUSIONS."zwar_warscript/zwar_admin_panel.php".$zwar_aidlink."&amp;pagefile=squads&amp;action=edit&amp;group_id=".$data['group_id']."'>".$locale['zwar_2405']."</a>";
			}
			$team_array['teamoptions'] .= ($team_array['teamoptions'] != "" ? "&nbsp;|&nbsp;" : "")."<a href='".FUSION_SELF."?page=members&amp;teamid=".$data['group_id']."'>".$locale['zwar_2406']." >></a>";
			$team_array['team_logo'] = $data['group_logo'];
			$team_array['team_name'] = $data['group_name'];
			$team_array['group_id'] = $data['group_id'];
			echo "<table cellpadding='0' cellspacing='1' width='100%' class='tbl-border center'>
			<tr>";
			if ($team_array['team_logo'] != "") {
				echo "<td class='tbl2' valign='top' width='1%' rowspan='2'><img src='".INFUSIONS."zwar_warscript/images/squadlogos/".$team_array['team_logo']."' alt='".$data['group_logo']."' width='35' height='35' style='float:left;'/></td>";
			}
			echo "<td class='tbl2' align='left' valign='top'>
			<strong>".THEME_BULLET."&nbsp;".$team_array['team_name']."</strong>
			</td>
			</tr><tr>
			<td class='tbl2' align='left' valign='bottom'>".$team_array['teamoptions']."</td></tr></table>
			<table cellpadding='0' cellspacing='1' width='100%' class='tbl-border center'>";
			$result2 = dbquery("SELECT * FROM ((".DB_ZWAR_WARS." AS zw LEFT JOIN ".DB_ZWAR_OPPONENTS." AS zop ON zw.war_opp_id=zop.opp_id) LEFT JOIN ".DB_ZWAR_GAMETYPES." AS zgt ON zw.war_gametype_id=zgt.gametype_id) LEFT JOIN ".DB_ZWAR_MATCHTYPES." AS zmt ON zw.war_matchtype_id=zmt.matchtype_id WHERE (zw.war_finished='0' OR zw.war_date>'".time()."') AND zw.war_squad='".$team_array['group_id']."' ORDER BY zw.war_date DESC");
			if (dbrows($result2)) {
				while ($data2 = dbarray($result2)) {
					$status_open = time()<$data2['war_date'];
					if ($status_open || checkrights("ZWAR") || in_array($data2['war_squad'], $warorg_teams)) {
						$match_array['matchoptions'] = "";
						if (checkrights("ZWAR") || in_array($data2['war_squad'], $warorg_teams)) {
							if (!$status_open) {
								$match_array['matchoptions'] .= "<a href='".INFUSIONS."zwar_warscript/zwar_admin_panel.php".$zwar_aidlink."&pagefile=finishwar&action=finish&warid=".$data2['war_id']."' title='".$locale['zwar_2407']."' class='zwarblink'>".zwar_images("cmark",$locale['zwar_2407'])."</a>\n";
							}
							$match_array['matchoptions'] .= "<a href='".INFUSIONS."zwar_warscript/zwar_admin_panel.php".$zwar_aidlink."&pagefile=editwars&action=modify&warid=".$data2['war_id']."' title='".$locale['zwar_0003']."'>".zwar_images("edit",$locale['zwar_0003'])."</a>
							<a href='".INFUSIONS."zwar_warscript/zwar_admin_panel.php".$zwar_aidlink."&pagefile=editwars&action=delete&warid=".$data2['war_id']."' title='".$locale['zwar_0051']."' onclick=\"return askifdel();\">".zwar_images("del",$locale['zwar_0051'])."</a>&nbsp;\n";
						}
						$match_array['matchoptions'] .= "<a href='".FUSION_SELF."?page=war_details&amp;warid=".$data2['war_id']."' title='".$locale['zwar_2410']."'>".zwar_images("view",$locale['zwar_2410'])."</a>";
						$match_array['war_info'] = $data2['gametype_name'];
						$match_array['war_info'] .= $data2['matchtype_name'] != "" ? "&nbsp;(".$data2['matchtype_name'].")" : "";
						$match_array['match_date'] = zwar_display_matchdate($data2['war_date']).date(" - H:i",$data2['war_date']);
						$match_array['gameicon'] = display_zwar_games($data2['war_game_id'], true, false);
						render_zwar_myviewdata($match_array);
					}
				}
			} else { echo "<tr><td class='tbl1' align='center'>".$locale['zwar_2408']."</td></tr>"; }
			echo "</table>";
			render_zwar_break(5);
		}
	}
	echo "<table cellpadding='0' cellspacing='1' width='100%' class='tbl-border center'>
	<tr><td class='tbl2' align='left'>
	<strong>".$locale['zwar_2409']."</strong>
	</td></tr>
	</table><table cellpadding='0' cellspacing='1' width='100%' class='tbl-border center'>";
	$result = dbquery("SELECT * FROM ((".DB_ZWAR_WARS." AS zw LEFT JOIN ".DB_ZWAR_OPPONENTS." AS zop ON zw.war_opp_id=zop.opp_id) LEFT JOIN ".DB_ZWAR_GAMETYPES." AS zgt ON zw.war_gametype_id=zgt.gametype_id) LEFT JOIN ".DB_ZWAR_MATCHTYPES." AS zmt ON zw.war_matchtype_id=zmt.matchtype_id WHERE (zw.war_finished='0' OR zw.war_date>'".time()."') AND zw.war_squad='' ORDER BY zw.war_date DESC");
	if (dbrows($result)) {
		if (checkrights("ZWAR")) {$zwar_aidlink = $aidlink;} else {$zwar_aidlink = "?aid=0";}
		while ($data = dbarray($result)) {
			$status_open = time()<$data['war_date'];
			if ($status_open || checkrights("ZWAR") || in_array($data2['war_game_id'], $warorg_games)) {
				$match_array['matchoptions'] = "";
				if (checkrights("ZWAR") || in_array($data['war_game_id'], $warorg_games)) {
					if (!$status_open) {
						$match_array['matchoptions'] .= "<a href='".INFUSIONS."zwar_warscript/zwar_admin_panel.php".$zwar_aidlink."&pagefile=finishwar&action=finish&warid=".$data['war_id']."' title='".$locale['zwar_2407']."' class='zwarblink'>".zwar_images("cmark","Ergebnis eintragen")."</a>\n";
					}
					$match_array['matchoptions'] .= "<a href='".INFUSIONS."zwar_warscript/zwar_admin_panel.php".$zwar_aidlink."&pagefile=editwars&action=modify&warid=".$data['war_id']."' title='".$locale['zwar_0003']."'>".zwar_images("edit",$locale['zwar_0003'])."</a>
					<a href='".INFUSIONS."zwar_warscript/zwar_admin_panel.php".$zwar_aidlink."&pagefile=editwars&action=delete&warid=".$data['war_id']."' title='".$locale['zwar_0051']."' onclick=\"return askifdel();\">".zwar_images("del",$locale['zwar_0051'])."</a>&nbsp;\n";
				}
				$match_array['matchoptions'] .= "<a href='".FUSION_SELF."?page=war_details&amp;warid=".$data['war_id']."' title='".$locale['zwar_2410']."'>".zwar_images("view",$locale['zwar_2410'])."</a>";
				$match_array['war_info'] = $data['gametype_name'];
				$match_array['war_info'] .= $data['matchtype_name'] != "" ? "&nbsp;(".$data['matchtype_name'].")" : "";
				$match_array['match_date'] = zwar_display_matchdate($data['war_date']).date(" - H:i",$data['war_date']);
				$match_array['gameicon'] = display_zwar_games($data['war_game_id'], true, false);
				render_zwar_myviewdata($match_array);
			}
		}
	} else { echo "<tr><td class='tbl1' align='center'>".$locale['zwar_2411']."</td></tr>"; }
	echo "</table>";
	render_zwar_break(5);
} else {
	opentable($locale['zwar_2403']);
	echo "<div class='zwar-body'>";
	render_zwar_message($locale['zwar_2412']);
}
echo "</div>
<script type='text/javascript'>
function askifdel() {
	return confirm('".$locale['zwar_2413']."');
}\n
</script>";
closetable();
?>