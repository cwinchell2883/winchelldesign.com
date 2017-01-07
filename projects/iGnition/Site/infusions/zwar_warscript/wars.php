<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: wars.php
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
$teamid = isset($_POST['teamid']) ? $_POST['teamid'] : (isset($_GET['teamid']) ? $_GET['teamid'] : 0);
$gameid = isset($_POST['gameid']) ? $_POST['gameid'] : (isset($_GET['gameid']) ? $_GET['gameid'] : 0);
$viewcom = !isset($_GET['viewcom']) || !isnum($_GET['viewcom']) ? 0 : $_GET['viewcom'];
$rowstart = !isset($_GET['rowstart']) || !isnum($_GET['rowstart']) ? 0 : $_GET['rowstart'];
$view = !isset($_GET['view']) || !isnum($_GET['view']) ? 0 : $_GET['view'];

if (!isNum($gameid)) { redirect(BASEDIR.'index.php'); }
if (!isNum($teamid)) { redirect(BASEDIR.'index.php'); }

$show_short = 5; $show_long = 15; $where = ""; $action = ""; $viewaction = "";
$team_games = $teamid ? dbresult(dbquery("SELECT group_games FROM ".DB_ZWAR_SQUADS." WHERE group_id='$teamid'"),0) : "";
$where = $gameid ? "AND war_game_id='".$gameid."'" : $where;
$action = $gameid ? "&amp;gameid=".$gameid : $action;
$where = $teamid ? "AND (war_squad='".$teamid."' OR (war_squad='' AND ".zwar_gameaccess("war_game_id", $team_games)."))" : $where;
$action = $teamid ? "&amp;teamid=".$teamid : $action;
if ($view) { $viewaction .= "&amp;view=".$view; }

opentable($locale['zwar_0304']);
echo "<div class='zwar-body'>";
add_to_title("&nbsp;-&nbsp;".$locale['zwar_0304']);
display_zwar_selectbar($gameid, $teamid, FUSION_SELF."?page=wars".$viewaction);
$left=""; $right="";
if ((!$view) || $view==1) {
	$limit = $view ? $show_long : $show_short;
	$rows = dbcount("(war_id)", DB_ZWAR_WARS, "war_date>='".(time())."' $where");
	if (!$view) { $rowstart = ($rows-$show_short<0 ? 0 : $rows-$show_short); }
	$nextmatchresult = dbquery("SELECT * FROM (((((((".DB_ZWAR_WARS." AS zw LEFT JOIN ".DB_ZWAR_OPPONENTS." AS zop ON zw.war_opp_id=zop.opp_id) LEFT JOIN ".DB_ZWAR_SERVERS." AS zse ON zw.war_server_id=zse.server_id) LEFT JOIN ".DB_ZWAR_GAMES." AS zga ON zw.war_game_id=zga.game_id) LEFT JOIN ".DB_ZWAR_GAMETYPES." AS zgt ON zw.war_gametype_id=zgt.gametype_id) LEFT JOIN ".DB_ZWAR_MATCHTYPES." AS zmt ON zw.war_matchtype_id=zmt.matchtype_id) LEFT JOIN ".DB_USERS." AS u ON zw.war_added_by=u.user_id) LEFT JOIN ".DB_ZWAR_SQUADS." AS cmg ON zw.war_squad=cmg.group_id) WHERE zw.war_date>='".(time())."' $where ORDER BY zw.war_date DESC LIMIT ".$rowstart.",".$limit."");
	display_zwar_war_list($nextmatchresult, "next");
	if ($rows && $rows > $show_short && !$view) {
		$right = "<a href='".FUSION_SELF."?page=wars&amp;view=1$action'>".$locale['zwar_0301']." >></a>";
	}
	if ($view) { $left = "<a href='".FUSION_SELF."?page=wars$action'>&lt;&lt; ".$locale['zwar_0303']."</a>"; }
}
if (!$view) { render_zwar_break(5); }
if (!$view || $view==2) {
	$limit = $view ? $show_long : $show_short;
	$rows = dbcount("(war_id)", DB_ZWAR_WARS, "war_date<'".time()."' AND war_finished='1' $where");
	if (!$view) { $rowstart = 0; }
	$lastmatchresult = dbquery("SELECT * FROM (((((((".DB_ZWAR_WARS." AS zw LEFT JOIN ".DB_ZWAR_OPPONENTS." AS zop ON zw.war_opp_id=zop.opp_id) LEFT JOIN ".DB_ZWAR_SERVERS." AS zse ON zw.war_server_id=zse.server_id) LEFT JOIN ".DB_ZWAR_GAMES." AS zga ON zw.war_game_id=zga.game_id) LEFT JOIN ".DB_ZWAR_GAMETYPES." AS zgt ON zw.war_gametype_id=zgt.gametype_id) LEFT JOIN ".DB_ZWAR_MATCHTYPES." AS zmt ON zw.war_matchtype_id=zmt.matchtype_id) LEFT JOIN ".DB_USERS." AS u ON zw.war_added_by=u.user_id) LEFT JOIN ".DB_ZWAR_SQUADS." AS cmg ON zw.war_squad=cmg.group_id) WHERE zw.war_date<'".time()."' AND zw.war_finished='1' $where ORDER BY zw.war_date DESC LIMIT ".$rowstart.",".$limit."");
	display_zwar_war_list($lastmatchresult, "last");
	if ($rows && $rows > $show_short && !$view) { 
		$right = "<a href='".FUSION_SELF."?page=wars&amp;view=2$action'>".$locale['zwar_0301']." >></a>";
	}
	if ($view) { $left = "<a href='".FUSION_SELF."?page=wars$action'>&lt;&lt; ".$locale['zwar_0303']."</a>"; }
}
if ($rows > $show_long && $view) $right = makePageNav($rowstart,15,$rows,3,FUSION_SELF."?page=wars".$action."&amp;view=".$view."&amp;");

render_zwar_tablefoot($left, $right);
render_zwar_stats($teamid, $gameid);
echo "</div>";
closetable();
?>