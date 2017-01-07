<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: warlist.php
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

if (isset($_GET['status']) && !isset($message)) {
	if ($_GET['status'] == "sn") {
		$message = "<b>".$locale['zwar_0617']."</b>";
	} elseif ($_GET['status'] == "del") {
		$message = "<b>".$locale['zwar_0618']."</b>";
	}
	if ($message) {	echo "<div class='admin-message'>".$message."</div>\n"; }
}

opentable($locale['zwar_0601']);
	echo"<table align='center' cellpadding='0' cellspacing='0' class='center'>
	<tr>
	<td width='150' class='tbl2'><b>".$locale['zwar_0602']."</b></td>
	<td width='70%' class='tbl2'><b>".$locale['zwar_0603']."</b></td>
	<td width='120' class='tbl2'>&nbsp;</td></tr>";
	$result = dbquery("SELECT * FROM ".DB_ZWAR_WARS."");
	$rows = dbrows($result);
	$date_now=time();
	$dateline=false;
	if (!isset($_GET['rowstart']) || !isNum($_GET['rowstart'])) $_GET['rowstart'] = 0;
	if ($rows) {
		$result = dbquery("SELECT * FROM ((((((".DB_ZWAR_WARS." AS zw LEFT JOIN ".DB_ZWAR_OPPONENTS." AS zop ON zw.war_opp_id=zop.opp_id) LEFT JOIN ".DB_ZWAR_SERVERS." AS zse ON zw.war_server_id=zse.server_id) LEFT JOIN ".DB_ZWAR_GAMES." AS zga ON zw.war_game_id=zga.game_id) LEFT JOIN ".DB_ZWAR_GAMETYPES." AS zgt ON zw.war_gametype_id=zgt.gametype_id) LEFT JOIN ".DB_ZWAR_MATCHTYPES." AS zmt ON zw.war_matchtype_id=zmt.matchtype_id) LEFT JOIN ".DB_USERS." AS u ON zw.war_added_by=u.user_id) ORDER BY war_date DESC LIMIT ".$_GET['rowstart'].",7");
		while ($war_data = dbarray($result)) {
			$cell_color = "tbl";
			if ($war_data['war_date']<$date_now) {
				if ($war_data['war_finished']!="1") {
					$menu_color = "tbl' style='background-color:#EE0000;";
				} else {
					$menu_color = "tbl' style='background-color:#00EE00;";
				}
			} else {
				$menu_color = $cell_color;
			}
			$today=date($locale['zwar_0604'],$date_now);
			if ($war_data['war_date']<$date_now && $dateline==false && $_GET['rowstart'] == 0) {
				$dateline=true;
				echo "<tr><td width='150' style='background-color:#444444; color:#FFFFFF;' colspan='3' align='center'>".$locale['zwar_0616']." - $today</td></tr>";
			} else {
				echo "<tr><td colspan='3'><hr></td></tr>";
			}
			$war_date=date($locale['zwar_0604'],$war_data['war_date']);
			$war_date_add=date($locale['zwar_0604'],$war_data['war_date_add']);
			echo "<tr>
				<td width='1%' class='$cell_color' style='white-space:nowrap;'>";
				if ($war_data['war_finished']=="1") { echo "<img src='".INFUSIONS."zwar_warscript/images/check.gif' style='vertical-align:middle;' alt='".$locale['zwar_0605']."'>&nbsp;"; }
				echo $war_date."
				</td>
				<td width='70%' class='$cell_color'>";
					$result2 = dbquery("SELECT * FROM ".DB_ZWAR_SCORES." AS zsc LEFT JOIN ".DB_ZWAR_LOCS." AS zlo ON zsc.score_location_id = zlo.location_id WHERE score_war_id='".$war_data['war_id']."'");
					$ownscorecount=0;
					$oppscorecount=0;
					$locnames = array();
					if (dbrows($result2)) {
						while ($scoredata = dbarray($result2)) {
							$ownscorecount=$ownscorecount+$scoredata['score_ownscore'];
							$oppscorecount=$oppscorecount+$scoredata['score_oppscore'];
							$locnames[]=$scoredata['location_name'];
						}
						$scorecolor=($ownscorecount>$oppscorecount ? $zwar_settings_array['zwar_colorwon'] : $zwar_settings_array['zwar_colorlost']);
					}
					if ($ownscorecount==$oppscorecount) $scorecolor=$zwar_settings_array['zwar_colordraw'];
					
					echo $war_data['game_name']." ".(isset($war_data['gametype_name']) ? "- ".$war_data['gametype_name'] : "").(isset($war_data['matchtype_name']) ? " (".$war_data['matchtype_name'].") " : "");
					echo $locale['zwar_0619']." <b>".$war_data['opp_name_short']."</b>";	
					if ($war_data['war_finished']=="1" && $war_data['war_date']<$date_now) { echo "&nbsp;&nbsp;(".$locale['zwar_0606']."<font style='color:$scorecolor'>".$ownscorecount." : ".$oppscorecount."</font>)"; }
				echo "</td>
				<td width='1%' class='$cell_color' align='right' rowspan='2' style='white-space:nowrap;'>
					<a class='small' href='".FUSION_SELF.$aidlink."&pagefile=editwars&action=modify&warid=".$war_data['war_id']."'>".zwar_images("edit",$locale['zwar_0609'])."</a>&nbsp;
					<a class='small' href='".FUSION_SELF.$aidlink."&pagefile=editwars&action=delete&warid=".$war_data['war_id']."' onclick='return Deleteconfirm();'>".zwar_images("del",$locale['zwar_0610'])."</a>&nbsp;";
					if ($war_data['war_date']<$date_now) {
						if ($war_data['war_finished']!="1") {
							echo "<a class='small' style='color:#000000;' href='".FUSION_SELF.$aidlink."&pagefile=finishwar&action=finish&warid=".$war_data['war_id']."'>".zwar_images("cmark",$locale['zwar_0611'])."</a>&nbsp;";
						} else {
							echo "<a class='small' style='color:#000000;' href='".FUSION_SELF.$aidlink."&pagefile=finishwar&action=finish&warid=".$war_data['war_id']."'>".zwar_images("cmark",$locale['zwar_0612'])."</a>&nbsp;";
							echo "<a class='small' style='color:#000000;' href='".FUSION_SELF.$aidlink."&pagefile=finishwar&action=unfinish&warid=".$war_data['war_id']."'>".zwar_images("nocmark",$locale['zwar_0613'])."</a>";
						}
					}
				echo "</td></tr>
				<tr><td class='$cell_color' align='left' colspan='2'>".$locale['zwar_0607']."<b>".$war_data['user_name']."</b>".$locale['zwar_0608'].$war_date_add."</td></tr>";
		}
	} else {
		echo "<tr><td colspan='3' align='center' class='tbl'>".$locale['zwar_0614']."</td></tr>";
	}
	echo '</table><br/>';
	
	closetable();
if ($rows > 7) echo "<div align='center' style='margin-top:5px;'>".makePageNav($_GET['rowstart'],7,$rows,3,FUSION_SELF.$aidlink."&pagefile=warlist&amp;")."\n</div>\n";

	echo "<script type='text/javascript'>
	function Deleteconfirm() {
		return confirm('".$locale['zwar_0615']."');
	}
	</script>\n";

?>