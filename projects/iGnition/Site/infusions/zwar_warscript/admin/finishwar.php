<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: finishwar.php
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
if (isset($_GET['warid']) && !isNum($_GET['warid'])) { redirect(FUSION_SELF.$aidlink."&amp;pagefiles=warlist"); }
if (isset($_GET['warid'])) { $warid=$_GET['warid']; } else { unset($warid); }

if (isset($_GET['action']) && $_GET['action']=="unfinish" && isset($warid)) {
	$result = dbquery("UPDATE ".DB_ZWAR_WARS." SET war_finished='0' WHERE war_id='$warid'");
	if (checkrights("ZWAR")) {
		redirect(FUSION_SELF.$aidlink."&amp;pagefile=warlist");
	} else {
		redirect(BASEDIR."zwar.php?page=myview");
	}
} else if (isset($_POST['cancel'])) {
	if (checkrights("ZWAR")) {
		redirect(FUSION_SELF.$aidlink."&amp;pagefile=warlist");
	} else {
		redirect(BASEDIR."zwar.php?page=war_details&amp;warid=".$warid);
	}
} else if (isset($_POST['finish'])) {
	$error="";
	$war_comment=stripinput(trim($_POST['war_comment']));
	$score_array=isset($_POST['scores']) ? $_POST['scores'] : array();
	$score_error=false;
	foreach ($score_array as $wert) {
		if (!isNum($wert['ownscore']) || !isNum($wert['oppscore']) || !isNum($wert['score_id'])) $score_error=true;
	}
	if ($score_error) $error.=$locale['zwar_1301'];
	
	$war_own_players="";
	if (isset($_POST['war_own_players']) && is_array($_POST['war_own_players'])) {
		foreach ($_POST['war_own_players'] as $own_player_id) {
			if (isnum($own_player_id) && $own_player_id > 0) { $war_own_players .= ($war_own_players != "" ? "." : "").$own_player_id; }
		}
	}
	$war_opp_players = isset($_POST['war_opp_players']) ? stripinput(trim($_POST['war_opp_players'])) : "";
	
	if ($error=="") {
		if (is_array($score_array) && count($score_array)) {
			foreach ($score_array as $wert) {
				$result = dbquery("UPDATE ".DB_ZWAR_SCORES." SET score_ownscore='".$wert['ownscore']."', score_oppscore='".$wert['oppscore']."' WHERE score_id='".$wert['score_id']."'");
			}
		}
		$result = dbquery("UPDATE ".DB_ZWAR_WARS." SET war_finished='1', war_comment='$war_comment', war_own_players='$war_own_players', war_opp_players='$war_opp_players' WHERE war_id='$warid'");
		opentable($locale['zwar_1302']);
		if (checkrights("ZWAR")) {
			$link = FUSION_SELF.$aidlink."&pagefile=warlist";
		} else {
			$link = BASEDIR."zwar.php?page=war_details&amp;warid=".$warid;
		}
		echo "<center>".$locale['zwar_1303']."<br/><br/><a href='".$link."'>".$locale['zwar_0054']." >></a></center>";
		closetable();
	} else {
		opentable($locale['zwar_1304']);
		echo "<center><br/>".$error."<br/><br/><a href='javascript:history.back()'><< ".$locale['zwar_1305']."</a></center>";
		closetable();
	}
} else {
	if (isset($_GET['action']) && $_GET['action']=="finish" && isset($warid)) {
		$action = FUSION_SELF.$aidlink."&amp;pagefile=finishwar&amp;action=finish&amp;warid=$warid";
		
		opentable($locale['zwar_1306']);
		$result = dbquery("SELECT * FROM ".DB_ZWAR_WARS." AS zw LEFT JOIN ".DB_ZWAR_OPPONENTS." AS zop ON zw.war_opp_id = zop.opp_id WHERE war_id='$warid'");
		if (dbrows($result)) {
			$wardata = dbarray($result);
			$war_date=date($locale['zwar_1307'],$wardata['war_date']);
			$war_comment = isset($_POST['war_comment']) ? stripinput(trim($_POST['war_comment'])) : $wardata['war_comment'];
			$war_opp_players = isset($_POST['war_opp_players']) ? stripinput(trim($_POST['war_opp_players'])) : $wardata['war_opp_players'];
			$war_own_players = isset($_POST['war_own_players']) && is_array($_POST['war_own_players']) && preg_match("/^[0-9\.]+$/i", implode(".", $_POST['war_own_players'])) ? $_POST['war_own_players'] : explode(".", $wardata['war_own_players']);
			$eventtitle = $locale['zwar_1308'].$wardata['opp_name'].$locale['zwar_1316'].$war_date;
			$loctitle = $locale['zwar_1319'].":";
			echo "<table cellpadding='0' cellspacing='' class='center'>
			<tr><td width='100%' class='tbl2' align='center'>".$eventtitle."</td>
			</tr></table><br/>";
		} else {
			redirect(ADMIN.'index.php'.$aidlink);
		}
		$result = dbquery("SELECT * FROM ((".DB_ZWAR_SCORES." AS zsc LEFT JOIN ".DB_ZWAR_LOCS." AS zlo ON zsc.score_location_id = zlo.location_id) LEFT JOIN ".DB_ZWAR_WARS." AS zw ON zw.war_id = zsc.score_war_id) LEFT JOIN ".DB_ZWAR_OPPONENTS." AS zop ON zw.war_opp_id = zop.opp_id WHERE zsc.score_war_id='$warid'");
		if (dbrows($result)) {
			require_once INCLUDES."bbcode_include.php";
			echo "<form name='inputform' method='post' action='$action' onSubmit='return saveGroup();'>
			<table cellpadding='0' cellspacing='0' class='center'>
			<tr>
			<td width='25%' class='tbl2'><b>".$locale['zwar_1309']."</b></font></td>
			<td width='75%' class='tbl2'><b>".$locale['zwar_1310']."</b></td>
			</tr>";
			while ($data = dbarray($result)) {
				$ownscore = isset($_POST['scores'][$data['score_id']]['ownscore']) && isnum($_POST['scores'][$data['score_id']]['ownscore']) ? $_POST['scores'][$data['score_id']]['ownscore'] : $data['score_ownscore'];
				$oppscore = isset($_POST['scores'][$data['score_id']]['oppscore']) && isnum($_POST['scores'][$data['score_id']]['oppscore']) ? $_POST['scores'][$data['score_id']]['oppscore'] : $data['score_oppscore'];
				echo "<tr><td width='25%' class='tbl'>
				<center><b><u>".$data['location_name']."</u></b>";
				if ($data['location_pic']!="") echo "<br/><img src='".INFUSIONS."zwar_warscript/images/locs/".$data['location_pic']."' alt='".$data['location_name']."'>";
				echo "</center></td>
				<td width='75%' class='tbl'>
				<table cellpadding='0' cellspacing='0' class='center'>
				<tr>
				<td width='50%' class='tbl' align='center'> ".$zwar_settings_array['zwar_clantag']." </td>
				<td width='50%' class='tbl' align='center'> ".$data['opp_name']." </td>
				</tr><tr>
				<td width='50%' class='tbl' align='center'>
				<input type='text' name='scores[".$data['score_id']."][ownscore]' value='".$ownscore."' maxlength='5' class='textbox' style='width:50px;'>
				</td>
				<td width='50%' class='tbl' align='center'>
				<input type='text' name='scores[".$data['score_id']."][oppscore]' value='".$oppscore."' maxlength='5' class='textbox' style='width:50px;'>
				</td>
				</tr></table>
				<input type='hidden' name='scores[".$data['score_id']."][score_id]' value='".$data['score_id']."' maxlength='5' class='textbox' style='width:50px;'>
				</td>";
				echo "</tr>";
			}
			echo "<tr>
			<td width='100%' align='center' class='tbl2' colspan='2'><b>".$locale['zwar_1321'].":<b></td>
			</tr><tr>
			<td width='100%' class='tbl' colspan='2' align='center'>
			<textarea name='war_comment' cols='100' rows='8' class='textbox'>$war_comment</textarea>
			<br/>".display_bbcodes("300px", "war_comment")."</td>
			</tr><tr>
			<td width='100%' class='tbl2' colspan='2' align='center'><b>".$locale['zwar_1317']."</b></font></td>
			</tr>
			<tr valign='middle'>
			<td width='100%' align='center' class='tbl' colspan='2'>
			<table cellpadding='0' cellspacing='0' class='center'><tr>";
			$own_players_used = array();
			$i = 0;
			if (is_array($war_own_players) && count($war_own_players)) {
				foreach ($war_own_players as $own_player_key => $own_player_id) {
					if (isnum($own_player_key) && isnum($own_player_id) && $own_player_id > 0) {
						$own_players_list = ""; $own_player_img = "anonym.jpg"; $own_player_name = "unknown";
						$result = dbquery("SELECT * FROM ".DB_USERS."");
						if (dbrows($result)) {
							while ($data = dbarray($result)) {
								if (!in_array($data['user_id'], $own_players_used)) {
									if ($own_player_id == $data['user_id']) {
										$sel = " selected='selected'";
										if ($data['member_image'] != "") { $own_player_img = $data['member_image']; }
										$own_player_name = $data['user_name'];
										$own_players_used[] = $data['user_id'];
									} else {
										$sel = "";
									}
									$own_players_list .= "<option value='".$data['user_id']."'$sel>".$data['user_name']."</option>\n";
								}
							}
						}
						echo "<td class='tbl'>
						<select name='war_own_players[]' class='textbox' style='width:100px;' onchange='submit();'>
						<option value='0'>".$locale['zwar_0067']."</option>
						".$own_players_list."
						</select><br>
						<img src='".INFUSIONS."zwar_warscript/images/members/".$own_player_img."' alt='".$own_player_name."' width='100' height='132'/>
						</td>";
						$i++;
						if ($i % 4 == 0) { echo "</tr><tr>"; }
					}
				}
			}
			$own_players_list = ""; $own_player_img = "anonym.jpg";
			$result = dbquery("SELECT * FROM ".DB_USERS."");
			if (dbrows($result)) {
				while ($data = dbarray($result)) {
					if (!in_array($data['user_id'], $own_players_used)) {
						$own_players_list .= "<option value='".$data['user_id']."'>".$data['user_name']."</option>\n";
					}
				}
			}
			echo "<td class='tbl'>
			<select name='war_own_players[]' class='textbox' style='width:100px;' onchange='submit();'>
			<option value='0'>".$locale['zwar_0084']."</option>
			".$own_players_list."
			</select>
			</td>
			</tr></table>
			</td>			
			</tr><tr>
			<td width='100%' class='tbl2' colspan='2' align='center'><b>".$locale['zwar_1318']."</b></font></td>
			</tr><tr valign='middle'>
			<td width='100%' align='center' class='tbl' colspan='2'>
			<textarea name='war_opp_players' class='textbox' cols='70' rows='1'>".$war_opp_players."</textarea>
			</td>			
			</tr>
			<tr><td align='center' colspan='2' class='tbl'>
			<input type='submit' name='finish' class='button' value='".$locale['zwar_1313']."'>
			 | <input type='submit' name='cancel' class='button' value='".$locale['zwar_1312']."'>
			</td>
			</tr>
			</table></form><br/>";
		} else {
			echo "<center>".$locale['zwar_1314']."<br/><br/><a href='javascript:history.back()'><< ".$locale['zwar_1315']."</a></center>";
		}
	} else {
		redirect(FUSION_SELF.$aidlink."&pagefile=warlist");
	}
	closetable();
}
?>