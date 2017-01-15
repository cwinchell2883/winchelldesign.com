<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: squads.php
| Author: Zezoar
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

if (isset($_GET['group_id']) && !isNum($_GET['group_id'])) { redirect(BASEDIR."index.php"); }
if (isset($_GET['group_id'])) { $group_id=$_GET['group_id']; }
if (isset($_GET['del_player']) && !isNum($_GET['del_player'])) { redirect(BASEDIR."index.php"); }
if (isset($_GET['del_player'])) { $del_player=$_GET['del_player']; }
if (isset($_GET['pos']) && !isNum($_GET['pos'])) { redirect(BASEDIR."index.php"); }
if (isset($_GET['pos'])) { $pos=$_GET['pos']; }
if (isset($_GET['group_game']) && !isNum($_GET['group_game'])) { redirect(BASEDIR."index.php"); }
if (isset($_GET['group_game'])) { $group_game=$_GET['group_game']; }
$action = isset($_GET['action']) ? $_GET['action'] : "";

if (isset($_GET['status']) && !isset($message)) {
	if ($_GET['status'] == "erd") {
		$message = "<b>".$locale['zwar_0746']."</b>";
	} elseif ($_GET['status'] == "ed") {
		$message = "<b>".$locale['zwar_0745']."</b>";
	} elseif ($_GET['status'] == "del") {
		$message = "<b>".$locale['zwar_0744']."</b>";
	}
	if ($message) {	echo "<div class='admin-message'>".$message."</div>\n"; }
}

if ($action == "delete" && checkrights("ZWAR")) {
	$data = dbarray(dbquery("SELECT * FROM ".DB_ZWAR_SQUADS." WHERE group_order='$pos' AND group_game='$group_game'"));
	$result = dbquery("UPDATE ".DB_ZWAR_SQUADS." SET group_order=group_order-1 WHERE group_order>'".$data['group_order']."' AND group_game='$group_game'");
	$result = dbquery("DELETE FROM ".DB_ZWAR_SQUADS." WHERE group_id='$group_id'");
	$result = dbquery("DELETE FROM ".DB_ZWAR_SQUADS_PLAYERS." WHERE player_squad='$group_id'");
	redirect(FUSION_SELF.$aidlink."&amp;pagefile=squads&status=del");
} else {
	if (checkrights("ZWAR")) {
		opentable($locale['zwar_0740']);
		echo "<table align='center' cellpadding='0' cellspacing='1' class='tbl-border'><tr>";
		$result = dbquery("SELECT * FROM ".DB_USERS." WHERE user_status='0' AND member_clanstatus='1' ORDER BY user_name");
		if (dbrows($result)) {
			$pli=1;
			while ($data = dbarray($result)) {
				$plcount = dbcount("(player_member_id)",DB_ZWAR_SQUADS_PLAYERS,"player_member_id='".$data['user_id']."'");
				if (!$plcount) {
					echo "<td class='tbl1' align='center'><b>".$data['user_name']."</b></td>".($pli % 10 == 0 ? "<tr></tr>" : "")."";
					$pli++;
				}
			}
		}
		echo "</tr></table>";
		closetable();
		
		opentable($locale['zwar_0717']);
		echo "<table align='center' cellpadding='0' cellspacing='0' class='tbl-border center'>
		<tr>
		<td class='tbl2'><b>".$locale['zwar_0729']."</b></td>
		<td class='tbl2'><b>".$locale['zwar_0730']."</b></td>
		<td class='tbl2'><b>".$locale['zwar_0731']."</b></td>
		<td class='tbl2' colspan='2'><b>".$locale['zwar_0732']."</b></td>
		</tr>";
		$result=dbquery("SELECT * FROM ".DB_ZWAR_SQUADS." ORDER BY group_name");
		if (dbrows($result)) {
			$k = 1;
			while ($data=dbarray($result)) {
				echo "<tr>
				<td class='tbl1'>".$data['group_name']."</td>
				<td class='tbl1'>".display_zwar_games($data['group_games'], true)."</td>
				<td class='tbl1'>".($data['group_wars'] ? $locale['zwar_0049'] : $locale['zwar_0050'])."</td>
				<td class='tbl1' align='right'>
				<a href='".FUSION_SELF.$aidlink."&amp;pagefile=squads&amp;action=edit&amp;group_id=".$data['group_id']."'>".zwar_images("edit",$locale['zwar_0718'])."</a>
				<a href='".FUSION_SELF.$aidlink."&amp;pagefile=squads&amp;action=delete&amp;group_id=".$data['group_id']."'>".zwar_images("del",$locale['zwar_0051'])."</a>			
				</td></tr>";
			}
		} else {
			echo "<tr><td class='tbl1' colspan='5'>".$locale['zwar_0720']."</td></tr>";
		}
		echo "</table><br/><center>[<a href='".FUSION_SELF.$aidlink."&amp;pagefile=squads&amp;action=refresh'>".$locale['zwar_0721']."</a>]</center>";
		closetable();
	}

	if (isset($_POST['clear'])) {
		if (checkrights("ZWAR")) {
			redirect(FUSION_SELF.$aidlink."&amp;pagefile=squads");
		} else {
			redirect(BASEDIR."zwar.php?page=members&amp;teamid=$group_id");
		}
	} elseif (isset($_POST['save'])) {
		$error="";
		$group_name=stripinput($_POST['group_name']);
		if (!$group_name) {
			$error.=$locale['zwar_0728']."<br/>\n";
		}
		$group_wars=isnum($_POST['group_wars']) ? $_POST['group_wars'] : "1";
		
		$group_games = "";
		if (isset($_POST['sqg_array']) && is_array($_POST['sqg_array']) && count($_POST['sqg_array'])) {
			foreach ($_POST['sqg_array'] as $arraynum) {
				if (isnum($arraynum)) { $group_games .= ".".$arraynum; }
			}
		}
		$group_info=stripinput($_POST['group_info']);
		$group_logo=stripinput($_POST['group_logo']);
		$group_listimage=stripinput($_POST['group_listimage']);
		$group_joinpass=stripinput($_POST['group_joinpass']);
		$group_banner_align=isnum($_POST['group_banner_align']) ? $_POST['group_banner_align'] : 1;
		$group_banner_showinfo=isnum($_POST['group_banner_showinfo']) ? $_POST['group_banner_showinfo'] : 1;
		$group_banner_infoalign=isnum($_POST['group_banner_infoalign']) ? $_POST['group_banner_infoalign'] : 3;
		if (!$error) {
			if ($action=="edit" && isset($group_id)) {
				$player_array=$_POST['player_array'];
				$result=dbquery("SELECT group_id FROM ".DB_ZWAR_SQUADS." WHERE group_id='$group_id'");
				if (dbrows($result)) {
					$result2=dbquery("UPDATE ".DB_ZWAR_SQUADS." SET group_name='$group_name', group_wars='$group_wars', group_games='$group_games', group_info='$group_info', group_logo='$group_logo', group_listimage='$group_listimage', group_joinpass='$group_joinpass', group_banner_align='$group_banner_align', group_banner_showinfo='$group_banner_showinfo', group_banner_infoalign='$group_banner_infoalign' WHERE group_id='$group_id'");
					if (is_array($player_array) && count($player_array)) {
						$mylevel = dbresult(dbquery("SELECT player_level FROM ".DB_ZWAR_SQUADS_PLAYERS." WHERE player_squad='$group_id' AND player_member_id='".$userdata['user_id']."'"),0);
						foreach ($player_array as $pid => $pid_value) {
							$old_playerlevel = dbresult(dbquery("SELECT player_level FROM ".DB_ZWAR_SQUADS_PLAYERS." WHERE player_id='$pid'"),0);
							if (checkrights("ZWAR") || $mylevel > $old_playerlevel) {
								$player_info = stripinput($pid_value['player_info']);
								$player_order = isnum($pid_value['player_order']) ? $pid_value['player_order'] : 0;
								$player_level = isnum($pid_value['player_level']) ? $pid_value['player_level'] : 0;
								$result2=dbquery("UPDATE ".DB_ZWAR_SQUADS_PLAYERS." SET player_info='$player_info', player_order='$player_order', player_level='$player_level' WHERE player_id='$pid'");
							}
						}
					}
				} else {redirect(BASEDIR."index.php");}
			} elseif (checkrights("ZWAR")) {
				$result = dbquery("INSERT INTO ".DB_ZWAR_SQUADS." (group_name, group_wars, group_games, group_info, group_logo, group_banner_align, group_banner_showinfo) VALUES ('$group_name', '$group_wars', '$group_games', '$group_info', '$group_logo', '$group_banner_align', '$group_banner_showinfo')");
			}
			if (checkrights("ZWAR")) {
				redirect(FUSION_SELF.$aidlink."&amp;pagefile=squads");
			} else {
				redirect(BASEDIR."zwar.php?page=members&amp;teamid=$group_id");
			}
		} else {
			opentable($locale['zwar_0725']);
			echo "<center><br/>".$error."<br/><br/><a href='javascript:history.back()'><< ".$locale['zwar_0726']."</a></center>";
			closetable();
		}
	}
	if ($action=="edit" && isset($group_id)) {
		$result = dbquery("SELECT * FROM ".DB_ZWAR_SQUADS." WHERE group_id='$group_id'");
		if (dbrows($result)) {
			$data = dbarray($result);
			$group_name=(isset($_POST['group_name']) ? stripinput($_POST['group_name']) : $data['group_name']);
			$group_games=(isset($_POST['sqg_array']) && preg_match("/^[0-9\.]+$/i", implode('.',$_POST['sqg_array'])) ? implode('.',$_POST['sqg_array']) : $data['group_games']);
			$group_wars=(isset($_POST['group_wars']) && isnum($_POST['group_wars']) ? $_POST['group_wars'] : $data['group_wars']);
			$group_info=(isset($_POST['group_info']) ? stripinput($_POST['group_info']) : stripslashes($data['group_info']));
			$group_logo=(isset($_POST['group_logo']) ? stripinput($_POST['group_logo']) : $data['group_logo']);
			$group_listimage=(isset($_POST['group_listimage']) ? stripinput($_POST['group_listimage']) : $data['group_listimage']);
			$group_joinpass=(isset($_POST['group_joinpass']) ? stripinput($_POST['group_joinpass']) : $data['group_joinpass']);
			$group_banner_align=(isset($_POST['group_banner_align']) && isnum($_POST['group_banner_align']) ? $_POST['group_banner_align'] : $data['group_banner_align']);
			$group_banner_showinfo=(isset($_POST['group_banner_showinfo']) && isnum($_POST['group_banner_showinfo']) ? $_POST['group_banner_showinfo'] : $data['group_banner_showinfo']);
			$group_banner_infoalign=(isset($_POST['group_banner_infoalign']) && isnum($_POST['group_banner_infoalign']) ? $_POST['group_banner_infoalign'] : $data['group_banner_infoalign']);
			if (isset($_POST['add_player'])) {
				if ($_POST['player_member_id']) {	
					$player_member_id=isnum($_POST['player_member_id']) ? $_POST['player_member_id'] : 0;
					$player_order=isnum($_POST['player_order']) ? $_POST['player_order'] : 0;
					if(!$player_order || !isNum($player_order)) $player_order=1;
					$plresult=dbquery("INSERT INTO ".DB_ZWAR_SQUADS_PLAYERS." (player_member_id, player_squad, player_order) VALUES ('$player_member_id', '$group_id', '$player_order')");
				} else {
					echo "<div class='admin-message'>".$locale['zwar_0723']."</div>\n";
				}
			} elseif (isset($del_player)) {
				if (checkrights("ZWAR")) {
					$dplresult = dbquery("DELETE FROM ".DB_ZWAR_SQUADS_PLAYERS." WHERE player_id='$del_player'");
				} else {
					$my_player_level = zwar_Mylevel($group_id);
					$checkresult = dbquery("SELECT player_level, player_member_id FROM ".DB_ZWAR_SQUADS_PLAYERS." WHERE player_id='$del_player'");
					if (dbrows($checkresult)) {
						$checkdata = dbarray($checkresult);
					} else {
						$checkdata = 0;
					}
					if ($checkdata && ($my_player_level > $checkdata['player_level'] || $checkdata['player_member_id']==$userdata['user_id'])) {
						$dplresult = dbquery("DELETE FROM ".DB_ZWAR_SQUADS_PLAYERS." WHERE player_id='$del_player'");
					} else {
						redirect(FUSION_SELF.$aidlink."&amp;pagefile=squads&amp;action=edit&amp;group_id=".$_GET['group_id']."&amp;status=ed");
					}
				}
			}
			$statuswhere = $zwar_settings_array['zwar_nomem_visible'] ? "" : " AND member_clanstatus='1'";
			$result = dbquery("SELECT * FROM ".DB_USERS." WHERE user_status='0'$statuswhere ORDER BY user_name");
			$playerlist = "";
			if (dbrows($result)) {
				while ($data = dbarray($result)) {
					$plcount = dbcount("(player_id)",DB_ZWAR_SQUADS_PLAYERS,"player_member_id='".$data['user_id']."' AND player_squad='$group_id'");
					if ($plcount==0) $playerlist .= "<option value='".$data['user_id']."'>".$data['user_name']."</option>\n";
				}
			}
			$action = FUSION_SELF.$aidlink."&amp;pagefile=squads&amp;action=edit&amp;group_id=$group_id";
			$cancelbtn = "<input type='submit' name='clear' class='button' value='".$locale['zwar_0710']."'>";
			opentable($locale['zwar_0733']);
		}
	} else {
		$group_name=(isset($_POST['group_name']) ? stripinput($_POST['group_name']) : "");
		$group_games=(isset($_POST['sqg_array']) && preg_match("/^[0-9\.]+$/i", implode('.',$_POST['sqg_array'])) ? implode('.',$_POST['sqg_array']) : "");
		$group_wars=(isset($_POST['group_wars']) && isnum($_POST['group_wars']) ? $_POST['group_wars'] : 1);
		$group_info=(isset($_POST['group_info']) ? stripinput($_POST['group_info']) : "");
		$group_logo=(isset($_POST['group_logo']) ? stripinput($_POST['group_logo']) : "");
		$group_listimage=(isset($_POST['group_listimage']) ? stripinput($_POST['group_listimage']) : "");
		$group_joinpass=(isset($_POST['group_joinpass']) ? stripinput($_POST['group_joinpass']) : "");
		$group_banner_align=(isset($_POST['group_banner_align']) && isnum($_POST['group_banner_align']) ? $_POST['group_banner_align'] : 1);
		$group_banner_showinfo=(isset($_POST['group_banner_showinfo']) && isnum($_POST['group_banner_showinfo']) ? $_POST['group_banner_showinfo'] : 1);
		$group_banner_infoalign=(isset($_POST['group_banner_infoalign']) && isnum($_POST['group_banner_infoalign']) ? $_POST['group_banner_infoalign'] : 3);
		$action = FUSION_SELF.$aidlink."&amp;pagefile=squads";
		$cancelbtn = "";
		opentable($locale['zwar_0734']);
	}
	$gamelist = ""; $glc = 0;
	$zwar_games = get_zwar_games();
	while(list($key, $zwar_game) = each($zwar_games)){
		$checked = (in_array($zwar_game['game_id'], explode(".",$group_games)) ? " checked" : "");
		if ($glc && $glc % 3 == 0) { $gamelist .= "<br/>"; }
		$gamelist .= "<input type='checkbox' name='sqg_array[]' value='".$zwar_game['game_id']."'".$checked.">".$zwar_game['game_name']."\n";
		$glc++;
	}
	$logo_files = makefilelist(INFUSIONS."zwar_warscript/images/squadlogos/", ".|..|index.php", true);
	$listimage_files = makefilelist(INFUSIONS."zwar_warscript/images/groups/", ".|..|index.php", true);
	require_once INCLUDES."bbcode_include.php";
		
	echo "<a name='zwform' />
	<form name='inputform' method='post' action='$action#zwform'>
	<table align='center' cellpadding='0' cellspacing='0' class='center'>
	<tr>
	<td width='120' class='tbl'>".$locale['zwar_0701']."<font style='color:#ff0000;'> *</font></td>
	<td width='80%' class='tbl'>
		<input type='text' name='group_name' value='$group_name' maxlength='100' class='textbox' style='width:250px;'>
	</td>
	</tr><tr>
	<td width='120' class='tbl'>".$locale['zwar_0702']."</td>
	<td width='80%' class='tbl'>
		<textarea name='group_info' class='textbox' cols='80' rows='4' style='height:100px;'>$group_info</textarea>
		".display_bbcodes("430px", "group_info")."
	</td>
	</tr><tr>
	<td width='120' class='tbl' valign='top'>".$locale['zwar_0704']."</td>
	<td width='80%' class='tbl'><b><select name='group_logo' class='textbox' style='width:250px;' onchange='submit()'>
		<option value=''>---</option>".makefileopts($logo_files, $group_logo)."</select></b><br/>
		".($group_logo != "" ? "<img src='".INFUSIONS."zwar_warscript/images/squadlogos/".$group_logo."' alt='".$group_name."' width='70' height='70'>" : "")."
	</td>
	</tr><tr>
	<td width='120' class='tbl' valign='top'>".$locale['zwar_0735'].":</td>
	<td width='80%' class='tbl'><b><select name='group_listimage' class='textbox' style='width:250px;' onchange='submit()'>
		<option value=''>---</option>".makefileopts($listimage_files, $group_listimage)."</select></b>
		".$locale['zwar_1217'].":&nbsp;<select name='group_banner_align' class='textbox' style='width:60px;' onchange='submit()'>
		<option value='1' ".($group_banner_align == 1 ? "selected='selected'" : "").">".$locale['zwar_0089']."</option>
		<option value='2' ".($group_banner_align == 2 ? "selected='selected'" : "").">".$locale['zwar_0090']."</option>
		<option value='3' ".($group_banner_align == 3 ? "selected='selected'" : "").">".$locale['zwar_0091']."</option>
		</select>";
	echo "</td>
	</tr><tr>
	<td width='120' class='tbl'>".$locale['zwar_1218'].":</td>
	<td width='80%' class='tbl'>
		<input type='radio' name='group_banner_showinfo' value='0' ".($group_banner_showinfo==0 ? "checked" : "")." onchange='submit()'> ".$locale['zwar_0050']."
		<input type='radio' name='group_banner_showinfo' value='1' ".($group_banner_showinfo==1 ? "checked" : "")." onchange='submit()'> ".$locale['zwar_0049']."
		".$locale['zwar_1217'].":&nbsp;<select name='group_banner_infoalign' class='textbox' style='width:60px;' onchange='submit()'>
		<option value='1' ".($group_banner_infoalign == 1 ? "selected='selected'" : "").">".$locale['zwar_0089']."</option>
		<option value='3' ".($group_banner_infoalign == 3 ? "selected='selected'" : "").">".$locale['zwar_0091']."</option>
		</select>
	</td>
	</tr>";
	if (isset($_GET['action']) && $_GET['action']=="edit" && isset($group_id)) {
		echo "<tr>
		<td width='120' class='tbl' valign='top'>".$locale['zwar_0092']."</td>
		<td width='80%' class='tbl'>";
		$banner_info = array(
			"image" => ($group_listimage != "" ? INFUSIONS."zwar_warscript/images/groups/".$group_listimage : ""),
			"name" => $group_name,
			"team_gameicons" => display_zwar_games($group_games),
			"membercount" => "X ".$locale['zwar_0027'],
			"id" => 1,
			"updown_img" => zwar_images("up", "", true),
			"repeatimage" => INFUSIONS."zwar_warscript/images/groups/repeat.jpg",
			"banner_align" => $group_banner_align,
			"banner_showinfo" => $group_banner_showinfo,
			"banner_infoalign" => $group_banner_infoalign
		);
		render_zwar_teambanner($banner_info);
	}
	echo "</td>
	</tr><tr>
	<td width='120' class='tbl' valign='top'>".$locale['zwar_0705']."<font style='color:#ff0000;'> *</font></td>
	<td width='80%' class='tbl'>".$gamelist."
	</td>
	</tr><tr>
	<td width='120' class='tbl'>".$locale['zwar_0706']."</td>
	<td width='80%' class='tbl'>
		<input type='radio' name='group_wars' value='1' ".($group_wars==1 ? "checked" : "").">".$locale['zwar_0707']."<br/>
		<input type='radio' name='group_wars' value='0' ".($group_wars==0 ? "checked" : "").">".$locale['zwar_0708']."
	</td>
	</tr><tr>
	<td width='120' class='tbl' valign='top'>".$locale['zwar_0739']."</td>
	<td width='80%' class='tbl'>
		<input type='text' name='group_joinpass' value='$group_joinpass' maxlength='20' class='textbox' style='width:150px;' onkeyup=\"zwar_squadjoinstatus(this)\">
		<span id='zwarjstat'>".($group_joinpass != "" ? $locale['zwar_0737'] : $locale['zwar_0738'])."</span><br/><br/>".$locale['zwar_0715']."
	</td>
	</tr>
	</table>";
	if ($action="edit" && isset($group_id)) {
		echo "<br/><table align='center' cellpadding='0' cellspacing='1' class='tbl-border'><tr>
		<td align='left' width='120' class='tbl2'><b>".$locale['zwar_0736'].":</b></td>
		<td align='left' class='tbl2'>
			<b><select name='player_member_id' class='textbox' style='width:250px;'>
			<option value='0'>---</option>$playerlist</select></b>
		</td><td align='left' class='tbl2'>
			<input type='text' name='player_order' value='1' maxlength='3' class='textbox' style='width:30px;'>
		</td><td align='left' class='tbl2' colspan='2'>
			<input type='submit' name='add_player' class='button' value='".$locale['zwar_0727']."'>
		</td>
		</tr><tr>
		<td width='120' class='tbl'><b>".$locale['zwar_0713']."</b></td>
		<td width='40%' class='tbl'><b>".$locale['zwar_0714']."</b></td>
		<td width='30' class='tbl'><b>".$locale['zwar_0709']."</b></td>
		<td width='30' class='tbl'><b>".$locale['zwar_0742']."</b></td>
		<td class='tbl1'>&nbsp;</b></td>
		</tr>";
		$playerresult=dbquery("SELECT * FROM ".DB_ZWAR_SQUADS_PLAYERS." AS cmgp INNER JOIN ".DB_USERS." AS u ON cmgp.player_member_id=u.user_id WHERE player_squad='$group_id' ORDER BY player_order, user_name");
		if (dbrows($playerresult)) {
			while ($playerdata=dbarray($playerresult)) {
				$player_info=(isset($_POST['player_array'][$playerdata['player_id']]['player_info']) ? stripinput($_POST['player_array'][$playerdata['player_id']]['player_info']) : $playerdata['player_info']);
				$player_order=(isset($_POST['player_array'][$playerdata['player_id']]['player_order']) && isnum($_POST['player_array'][$playerdata['player_id']]['player_order']) ? $_POST['player_array'][$playerdata['player_id']]['player_order'] : $playerdata['player_order']);
				$player_level=(isset($_POST['player_array'][$playerdata['player_id']]['player_level']) && isnum($_POST['player_array'][$playerdata['player_id']]['player_level']) ? $_POST['player_array'][$playerdata['player_id']]['player_level'] : $playerdata['player_level']);
				echo "<tr>
				<td width='120' class='tbl'><b>".$playerdata['user_name']."</b> 
				".($playerdata['member_clanstatus']==0 ? "<span style='cursor:pointer;' onmouseover=\"return overlay(this, 'zw_msg_nomem', 'bottomleft');\" onmouseout=\"overlayclose('zw_msg_nomem');\">(<font style='color:#FF0000;'><b>*</b></font>)" : "")."</span></td>
				<td width='40%' class='tbl'>
					<input type='text' name='player_array[".$playerdata['player_id']."][player_info]' value='$player_info' maxlength='100' class='textbox' style='width:250px;'>
				</td>
				<td width='30' class='tbl'>
					<input type='text' name='player_array[".$playerdata['player_id']."][player_order]' value='$player_order' maxlength='3' class='textbox' style='width:30px;'>
				</td>
				<td width='30' class='tbl'>
					<select name='player_array[".$playerdata['player_id']."][player_level]' class='textbox' style='width:80px;'>
					<option value='22'".($player_level==22 ? " selected" : "").">".$locale['zwar_0743']."</option>
					<option value='11'".($player_level==11 ? " selected" : "").">War-Org</option>
					<option value='0'".($player_level==0 ? " selected" : "").">----</option>
					</select>
				</td>
				<td class='tbl' align='right'>
					<a href='".FUSION_SELF.$aidlink."&amp;pagefile=squads&amp;action=edit&amp;group_id=$group_id&amp;del_player=".$playerdata['player_id']."'>".zwar_images("del",$locale['zwar_0719'])."</a>
				</td>
				</tr>";
			}
		} else {
			echo "<tr><td class='tbl2' colspan='4'>".$locale['zwar_0716']."</td></tr>";
		}
		echo "</table>
		<div id='zw_msg_nomem' style='display:none;position:absolute;' class='admin-message'>".$locale['zwar_0741']."</div>";
	}
	echo "<table align='center' cellpadding='0' cellspacing='0' class='center'>
	<tr>
	<td align='center' colspan='2' class='tbl1'>
		<input type='submit' name='save' class='button' value='".$locale['zwar_0711']."'>
		".$cancelbtn."
	</td>
	</tr></table>
	</form><br/>";
	closetable();
	
	echo "<script type='text/javascript'>
	function Deleteconfirm() {
		return confirm('".$locale['zwar_0722']."');
	}
	function zwar_squadjoinstatus(input) {
		if (input.value == '') {
			document.getElementById('zwarjstat').innerHTML = '".$locale['zwar_0738']."';
		} else {
			document.getElementById('zwarjstat').innerHTML = '".$locale['zwar_0737']."';
		}
	}
	</script>\n";
}
?>