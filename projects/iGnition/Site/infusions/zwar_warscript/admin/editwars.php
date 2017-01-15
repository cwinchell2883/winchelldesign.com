<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: editwars.php
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
if (isset($_GET['challenge_id']) && !isNum($_GET['challenge_id'])) { redirect(FUSION_SELF.$aidlink."&pagefile=editwars"); }
if (isset($_GET['challenge_id'])) { $challenge_id=$_GET['challenge_id']; } else { unset($challenge_id); }
if (isset($_GET['warid']) && !isNum($_GET['warid'])) { redirect(FUSION_SELF.$aidlink."&pagefile=editwars"); }
if (isset($_GET['warid'])) { $war_id=$_GET['warid']; } else { unset($war_id); }
if (isset($_GET['deletelocation']) && !isNum($_GET['deletelocation'])) { redirect(FUSION_SELF.$aidlink."&pagefile=editwars"); }

if (isset($_GET['action']) && $_GET['action']=="delete" && isset($war_id)) {
	$result = dbquery("DELETE FROM ".DB_ZWAR_WARS." WHERE war_id='".$war_id."'");
	$result = dbquery("DELETE FROM ".DB_ZWAR_SCORES." WHERE score_war_id='".$war_id."'");
	$result = dbquery("DELETE FROM ".DB_ZWAR_PARTS." WHERE part_war_id='".$war_id."'");
	$result = dbquery("SELECT * FROM ".DB_ZWAR_MATCH_UPLOADS." WHERE upload_war_id='".$war_id."'");
	if (dbrows($result)) {
		while ($data=dbarray($result)) {
			unlink(INFUSIONS."zwar_warscript/uploads/".$data['upload_file']);
			$result2 = dbquery("DELETE FROM ".DB_ZWAR_MATCH_UPLOADS." WHERE upload_id='".$data['upload_id']."'");
		}
	}
	if (checkrights("ZWAR")) {
		redirect(FUSION_SELF.$aidlink."&amp;pagefile=warlist&status=del");
	} else {
		redirect(BASEDIR."zwar.php?page=wars&status=del");
	}
} else if (isset($_POST['cancel'])) {
	if (checkrights("ZWAR")) {
		redirect(FUSION_SELF.$aidlink."&amp;pagefile=warlist");
	} else {
		if ($action == "modify" && isset($war_id)) {
			redirect(BASEDIR."zwar.php?page=war_details&amp;warid=".$war_id);
		} else {
			redirect(BASEDIR."zwar.php?page=myview");
		}
	}
} else if (isset($_POST['save'])) {
	$error=""; $errorcount=1;
	$war_info=stripinput($_POST['war_info']);
	$daterror=false;
	foreach ($_POST['war_date'] as $datewert) {
		if (!isNum($datewert)) {
			$daterror=true;
		}
	}
	if ($daterror) {
		$error.=$errorcount++.$locale['zwar_1403']."<br/>";
		$war_date="";
	} else {
		$war_date=mktime($_POST['war_date']['hours'], $_POST['war_date']['minutes'], 0,$_POST['war_date']['mon'], $_POST['war_date']['mday'], $_POST['war_date']['year']);
	}
	$war_gametype_id=(isnum($_POST['war_gametype_id']) ? $_POST['war_gametype_id'] : 0);
	$war_matchtype_id=(isnum($_POST['war_matchtype_id']) ? $_POST['war_matchtype_id'] : 0);
	$war_game_id=(isnum($_POST['war_game_id']) ? $_POST['war_game_id'] : 0);
	if (!$war_game_id) $error.=$errorcount++.$locale['zwar_1404']."<br/>";
	$war_teamsize=(isnum($_POST['war_teamsize']) ? $_POST['war_teamsize'] : "");
	$war_password=stripinput($_POST['war_password']);
	$war_opp_id=(isnum($_POST['war_opp_id']) ? $_POST['war_opp_id'] : "");
	$war_opparray['opp_name']=stripinput($_POST['war_opparray']['opp_name']);
	$war_opparray['opp_name_short']=stripinput(trim($_POST['war_opparray']['opp_name_short']));
	$war_opparray['opp_hp']=stripinput(trim($_POST['war_opparray']['opp_hp']));
	if (substr($war_opparray['opp_hp'],0,7) != "http://" AND substr($war_opparray['opp_hp'],0,6) != "ftp://")	{
		$war_opparray['opp_hp'] = "http://" . $war_opparray['opp_hp'];
	}
	$war_opparray['opp_contact1']=stripinput($_POST['war_opparray']['opp_contact1']);
	$war_opparray['opp_contact2']=(isset($_POST['war_opparray']['opp_contact2_type']) && $_POST['war_opparray']['opp_contact2_type'] != "" ? stripinput($_POST['war_opparray']['opp_contact2_type']).": " : "").stripinput($_POST['war_opparray']['opp_contact2']);
	$war_opparray['opp_contact3']=(isset($_POST['war_opparray']['opp_contact3_type']) && $_POST['war_opparray']['opp_contact3_type'] != "" ? stripinput($_POST['war_opparray']['opp_contact3_type']).": " : "").stripinput($_POST['war_opparray']['opp_contact3']);
	$war_opparray['opp_contact4']=stripinput($_POST['war_opparray']['opp_contact4']);
	$war_opparray['opp_country']=stripinput($_POST['war_opparray']['opp_country']);
	$war_server_id=(isnum($_POST['war_server_id']) ? $_POST['war_server_id'] : 0);
	$war_server_array['server_name']=stripinput($_POST['war_server_array']['server_name']);
	$war_server_array['server_ip']=stripinput($_POST['war_server_array']['server_ip']);
	$war_location_array=(is_array($_POST['war_location_array']) ? $_POST['war_location_array'] : "");
	$war_squad_id=(isnum($_POST['war_squad_id']) ? $_POST['war_squad_id'] : 0);

	if ($error != "") {
		opentable($locale['zwar_1407']);
		echo "<center><br/>".$error."<br/><br/><a href='javascript:history.back()'><< ".$locale['zwar_1408']."</a></center>";
	} else {
		if (!checkrights("ZWAR") && (!in_array($war_game_id, explode(".", zwar_getForLevel(11, "games"))) || !in_array($war_squad_id, explode(".", zwar_getForLevel(11, "teams"))))) { redirect(BASEDIR."index.php"); }
		
		if($war_opp_id=="" && $war_opparray['opp_name_short']!="") {
			if ($war_opparray['opp_name']=="") { $war_opparray['opp_name']=$war_opparray['opp_name_short']; }
			$result = dbquery("INSERT INTO ".DB_ZWAR_OPPONENTS." (opp_name, opp_name_short, opp_hp, opp_contact1, opp_contact2, opp_contact3, opp_contact4, opp_country) VALUES ('".$war_opparray['opp_name']."', '".$war_opparray['opp_name_short']."','".$war_opparray['opp_hp']."','".$war_opparray['opp_contact1']."', '".$war_opparray['opp_contact2']."', '".$war_opparray['opp_contact3']."', '".$war_opparray['opp_contact4']."', '".$war_opparray['opp_country']."')");
			$war_opp_id=mysql_insert_id();	
		}
		
		if($war_server_id=="" && $war_server_array['server_name']!="") {
			$result = dbquery("INSERT INTO ".DB_ZWAR_SERVERS." (server_name, server_ip) VALUES ('".$war_server_array['server_name']."', '".$war_server_array['server_ip']."')");
			$war_server_id=mysql_insert_id();
		}
		
		if(isset($war_id)) {
			$result = dbquery("SELECT * FROM ".DB_ZWAR_WARS." WHERE war_id='".$war_id."'");
			if (dbrows($result)) {
				$data = dbarray($result);
				$result = dbquery("UPDATE ".DB_ZWAR_WARS." SET war_info='".$war_info."', war_added_by='".$data['war_added_by']."', war_date='".$war_date."', war_date_add='".$data['war_date_add']."', war_teamsize='".$war_teamsize."', war_opp_id='".$war_opp_id."', war_server_id='".$war_server_id."', war_game_id='".$war_game_id."', war_matchtype_id='".$war_matchtype_id."', war_gametype_id='".$war_gametype_id."', war_password='".$war_password."', war_squad='".$war_squad_id."' WHERE war_id='".$war_id."'");
			} else {
				redirect(ADMIN.'index.php'.$aidlink);
			}
		} else {
			$result = dbquery("INSERT INTO ".DB_ZWAR_WARS." (war_info, war_added_by, war_date, war_date_add, war_teamsize, war_opp_id, war_server_id, war_game_id, war_matchtype_id, war_gametype_id, war_password, war_squad) VALUES ('".$war_info."', '".$userdata['user_id']."', '".$war_date."', '".time()."', '".$war_teamsize."', '".$war_opp_id."', '".$war_server_id."', '".$war_game_id."', '".$war_matchtype_id."', '".$war_gametype_id."', '".$war_password."', '".$war_squad_id."')");
			$war_id=mysql_insert_id();
			if (isset($challenge_id)) {
				$result = dbquery("DELETE FROM ".DB_ZWAR_CHALLENGES." WHERE challenge_id='".$challenge_id."'");
			}
		}
		
		if (is_array($war_location_array) && count($war_location_array)) {
			if ($_GET['action']=='add') {
				foreach ($war_location_array as $locidvalue) {
					if ($locidvalue!='deleted' && isnum($locidvalue)) $result = dbquery("INSERT INTO ".DB_ZWAR_SCORES." (score_war_id, score_location_id) VALUES ('".$war_id."', '".$locidvalue."')");
				}
			} else if ($_GET['action']=='modify') {	
				foreach ($war_location_array as $scoreidvalue => $locidvalue) {
					if ($locidvalue=='deleted') {
						$result = dbquery("DELETE FROM ".DB_ZWAR_SCORES." WHERE score_id='".$scoreidvalue."' AND score_war_id='".$war_id."'");
					} elseif (isnum($scoreidvalue) && isnum($locidvalue)) {
						$result = dbquery("SELECT * FROM ".DB_ZWAR_SCORES." WHERE score_id='".$scoreidvalue."' AND score_war_id='".$war_id."'");
						if(dbrows($result)) {
							$result = dbquery("UPDATE ".DB_ZWAR_SCORES." SET score_location_id='".$locidvalue."' WHERE score_id='".$scoreidvalue."'");
						} else {
							$result = dbquery("INSERT INTO ".DB_ZWAR_SCORES." (score_war_id, score_location_id) VALUES ('".$war_id."', '".$locidvalue."')");
						}
					}
				}
			}
		} else if ($war_location_array=="") {
			$result = dbquery("DELETE FROM ".DB_ZWAR_SCORES." WHERE score_war_id='".$war_id."'");
		}
		if (checkrights("ZWAR")) {
			redirect(FUSION_SELF.$aidlink."&amp;pagefile=warlist&amp;status=sn");
		} else {
			redirect(BASEDIR."zwar.php?page=war_details&amp;warid=".$war_id);
		}
	}
} else {
	echo '<a name="zwar_form"></a>';
	if (isset($_GET['action']) && $_GET['action']=="modify" && isset($war_id)) {
		$former_locs="";
		$result = dbquery("SELECT * FROM ".DB_ZWAR_SCORES." WHERE score_war_id='".$war_id."'");
		if (dbrows($result)) {
			while ($data = dbarray($result)) {
				$former_locs[$data['score_id']]=$data['score_location_id'];
			}
		}
		$result = dbquery("SELECT * FROM ".DB_ZWAR_WARS." WHERE war_id='".$war_id."'");
		if (dbrows($result)) {
			$data = dbarray($result);
			$war_info=(isset($_POST['war_info']) ? stripinput($_POST['war_info']) : $data['war_info']);
			$war_date=(isset($_POST['war_date']) && is_array($_POST['war_date']) ? $_POST['war_date'] : getdate($data['war_date']));
			$war_gametype_id=(isset($_POST['war_gametype_id']) && isnum($_POST['war_gametype_id']) ? $_POST['war_gametype_id'] : $data['war_gametype_id']);
			$war_matchtype_id=(isset($_POST['war_matchtype_id']) && isnum($_POST['war_matchtype_id']) ? $_POST['war_matchtype_id'] : $data['war_matchtype_id']);
			$war_game_id=(isset($_POST['war_game_id']) && isnum($_POST['war_game_id']) ? $_POST['war_game_id'] : $data['war_game_id']);
			$allowresetloc = $war_game_id != $data['war_game_id'] ? false : true;
			$war_teamsize=(isset($_POST['war_teamsize']) && isnum($_POST['war_teamsize']) ? $_POST['war_teamsize'] : $data['war_teamsize']);
			$war_password=(isset($_POST['war_password']) ? stripinput($_POST['war_password']) : $data['war_password']);
			$war_opp_id=(isset($_POST['war_opp_id']) && isnum($_POST['war_opp_id']) ? $_POST['war_opp_id'] : $data['war_opp_id']);
			$war_opparray=(isset($_POST['war_opparray']) && is_array($_POST['war_opparray']) ? $_POST['war_opparray'] : get_opparray($data['war_opp_id']));
			$war_server_id=(isset($_POST['war_server_id']) && isnum($_POST['war_server_id']) ? $_POST['war_server_id'] : $data['war_server_id']);
			$war_server_array=(isset($_POST['war_server_array']) && is_array($_POST['war_server_array']) ? $_POST['war_server_array'] : get_serverarray($data['war_server_id']));
			$war_squad_id=(isset($_POST['war_squad_id']) && isnum($_POST['war_squad_id']) ? $_POST['war_squad_id'] : $data['war_squad']);
			$war_location_id="";
			$old_locs=(isset($_POST['oldlocations']) && !isset($_POST['clearloc']) && !isset($_POST['nolocs']) ? true : false);
			$war_location_array=(isset($_POST['war_location_array']) && !isset($_POST['resetlocations']) ? $_POST['war_location_array'] : $former_locs);
			$old_game_id=(isset($_POST['old_game_id']) ? $_POST['old_game_id'] : $data['war_game_id']);
			$old_opp_id=(isset($_POST['old_opp_id']) ? $_POST['old_opp_id'] : "");
			$old_server_id=(isset($_POST['old_server_id']) ? $_POST['old_server_id'] : "");
			$formaction="modify&amp;warid=".$war_id;
			$cancelbtn=' | <input type="submit" name="cancel" value="'.$locale['zwar_1440'].'" class="button">';
			$title = $locale['zwar_1411'];
		} else {
			redirect(ADMIN.'index.php'.$aidlink);
		}
	} else if (isset($_GET['action']) && $_GET['action']=="add") {
		$war_id="";
		if (isset($challenge_id)) {
			$result = dbquery("SELECT * FROM ".DB_ZWAR_CHALLENGES." WHERE challenge_id='".$challenge_id."'");
			if (dbrows($result)) {
				$data=dbarray($result);
				$challenge_opparray['opp_name']=$data['challenge_clan_name'];
				$challenge_opparray['opp_name_short']=$data['challenge_clantag'];
				$challenge_opparray['opp_contact1']=$data['challenge_contact1'];
				$challenge_opparray['opp_contact2']=$data['challenge_contact2'];
				$challenge_opparray['opp_contact3']=$data['challenge_contact3'];
				$challenge_opparray['opp_contact4']=$data['challenge_contact4'];
				$challenge_opparray['opp_country']=$data['challenge_country'];
				$challenge_opparray['opp_hp']=$data['challenge_hp'];
				$challenge_server_array['server_name']=$data['challenge_server_name'];
				$challenge_server_array['server_ip']=$data['challenge_server_ip'];
				if ($data['challenge_maps']!="") { $challenge_maps = explode(".", $data['challenge_maps']); }
				if (isset($challenge_maps[0]) && $challenge_maps[0]!="") { $challenge_locarray[1]=$challenge_maps[0]; }
				if (isset($challenge_maps[1]) && $challenge_maps[1]!="") { $challenge_locarray[2]=$challenge_maps[1]; }
				$challenge_action="&amp;challenge_id=$challenge_id";
			}
		}
		$war_info=(isset($_POST['war_info']) ? stripinput($_POST['war_info']) : (isset($data['challenge_info']) ? $data['challenge_info'] : ""));
		$war_date=(isset($_POST['war_date']) && is_array($_POST['war_date']) ? $_POST['war_date'] : (isset($data['challenge_date']) ? getdate($data['challenge_date']) : ""));
		$war_gametype_id=(isset($_POST['war_gametype_id']) && isnum($_POST['war_gametype_id']) ? $_POST['war_gametype_id'] : "");
		$war_matchtype_id=(isset($_POST['war_matchtype_id']) && isnum($_POST['war_matchtype_id']) ? $_POST['war_matchtype_id'] : "");
		$war_game_id=(isset($_POST['war_game_id']) && isnum($_POST['war_game_id']) ? $_POST['war_game_id'] : (isset($data['challenge_game_id']) ? $data['challenge_game_id'] : ""));
		$war_teamsize=(isset($_POST['war_teamsize']) && isnum($_POST['war_teamsize']) ? $_POST['war_teamsize'] : (isset($data['challenge_teamsize']) ? $data['challenge_teamsize'] : ""));
		$war_password=(isset($_POST['war_password']) ? stripinput($_POST['war_password']) : (isset($data['challenge_server_pass']) ? $data['challenge_server_pass'] : ""));
		$war_opp_id=(isset($_POST['war_opp_id']) && isnum($_POST['war_opp_id']) ? $_POST['war_opp_id'] : "");
		$war_opparray=(isset($_POST['war_opparray']) && is_array($_POST['war_opparray']) ? $_POST['war_opparray'] : (isset($challenge_opparray) ? $challenge_opparray : ""));
		$war_server_id=(isset($_POST['war_server_id']) && isnum($_POST['war_server_id']) ? $_POST['war_server_id'] : "");
		$war_server_array=(isset($_POST['war_server_array']) && is_array($_POST['war_server_array']) ? $_POST['war_server_array'] : (isset($challenge_server_array) ? $challenge_server_array : ""));
		$war_squad_id=(isset($_POST['war_squad_id']) && isnum($_POST['war_squad_id']) ? $_POST['war_squad_id'] : "");
		$war_location_id="";
		$war_location_array=(isset($_POST['war_location_array']) && is_array($_POST['war_location_array']) ? $_POST['war_location_array'] : (isset($challenge_locarray) ? $challenge_locarray : ""));
		$old_game_id=(isset($_POST['old_game_id']) ? $_POST['old_game_id'] : (isset($data['challenge_game_id']) ? $data['challenge_game_id'] : ""));
		$old_opp_id=(isset($_POST['old_opp_id']) ? $_POST['old_opp_id'] : "");
		$formaction="add".(isset($challenge_action) ? $challenge_action : "");
		$old_server_id=(isset($_POST['old_server_id']) ? $_POST['old_server_id'] : "");
		$title = $locale['zwar_1412'];
		$cancelbtn=' | <input type="submit" name="cancel" value="'.$locale['zwar_1440'].'" class="button">';
	} else {
		redirect(ADMIN.'index.php'.$aidlink);
	}
	$opp_contact2_type=(isset($_POST['war_opparray']['opp_contact2_type']) ? stripinput($_POST['war_opparray']['opp_contact2_type']) : "");
	$opp_contact3_type=(isset($_POST['war_opparray']['opp_contact3_type']) ? stripinput($_POST['war_opparray']['opp_contact3_type']) : "");
	$select_games = ""; $select_teams = "";
	if (!checkrights("ZWAR")) {	
		$select_games = "WHERE game_id IN(".implode(",", zwar_getForlevel(11, "games")).")";
		$select_teams = "AND group_id IN(".implode(",", zwar_getForlevel(11, "teams")).")";
		$cancelbtn=' | <input type="submit" name="cancel" value="'.$locale['zwar_1440'].'" class="button">';
	}
	opentable($title);
	if (isset($_POST['addlocation']) && $_POST['war_location_id']!="") {
		$war_location_array[]=$_POST['war_location_id'];
	} else if (isset($_GET['deletelocation'])) {
		$war_location_array[$_GET['deletelocation']]='deleted';
	}
	
	if ($old_game_id!=$war_game_id) {unset($war_location_array);}

	if ($war_opp_id!=$old_opp_id) {
		$result = dbquery("SELECT * FROM ".DB_ZWAR_OPPONENTS." WHERE opp_id='".$war_opp_id."'");
		if (dbrows($result)) {
			$data = dbarray($result);
			foreach ($data as $oppkey => $oppvalue) {
				if ($oppkey!="opp_id" && isset($war_opparray[$oppkey])) {
					if ($oppvalue != $war_opparray[$oppkey]) $war_opparray[$oppkey]=$data[$oppkey];
		}}} else {$war_opp_id="";};
		if ($war_opp_id=="") $war_opparray="";
	}	

	if ($war_server_id!=$old_server_id) {
		$result = dbquery("SELECT * FROM ".DB_ZWAR_SERVERS." WHERE server_id='".$war_server_id."'");
		if (dbrows($result)) {
			$data = dbarray($result);
			foreach ($data as $serkey => $servalue) {
				if ($serkey!="server_id" && isset($war_server_array[$serkey])) {
					if ($servalue != $war_server_array[$serkey]) $war_server_array[$serkey]=$data[$serkey];
		}}} else {$war_server_id="";};
		if ($war_server_id=="") $war_server_array="";
	}	

	$gametypelist = ""; $sel = "";
	$result = dbquery("SELECT * FROM ".DB_ZWAR_GAMETYPES." ORDER BY gametype_name");
	if (dbrows($result)) {
		while ($data = dbarray($result)) {
			if ($war_gametype_id != "") $sel = ($war_gametype_id == $data['gametype_id'] ? " selected" : "");
			$gametypelist .= "<option value='".$data['gametype_id']."'$sel>".$data['gametype_name']."</option>\n";
	}}
	$matchtypelist = ""; $sel = "";
	$result = dbquery("SELECT * FROM ".DB_ZWAR_MATCHTYPES." ORDER BY matchtype_name");
	if (dbrows($result)) {
		while ($data = dbarray($result)) {
			if ($war_matchtype_id != "") $sel = ($war_matchtype_id == $data['matchtype_id'] ? " selected" : "");
			$matchtypelist .= "<option value='".$data['matchtype_id']."'$sel>".$data['matchtype_name']."</option>\n";
	}}
	$gamelist = ""; $sel = ""; $war_game_selectname = ""; $firstid=0; $gselcount=0;
	$result = dbquery("SELECT * FROM ".DB_ZWAR_GAMES." $select_games ORDER BY game_name");
	if (dbrows($result)) {
		while ($data = dbarray($result)) {
			if (checkrights("ZWAR") || $select_games!="") {
				if (!$firstid) { 
					$firstid = $data['game_id'];
					$war_game_selectname = $data['game_name_short'];
				}
				if ($war_game_id == $data['game_id']) {
					$sel = " selected";
					$war_game_selectname = $data['game_name_short'];
					$gselcount++;
				} else {
					$sel = "";
				}
				$gamelist .= "<option value='".$data['game_id']."'$sel>".$data['game_name']."</option>\n";
			}
	}}
	if (!$gselcount && $firstid) { $war_game_id = $firstid; }
	if (!$firstid) { $gamelist = "<option value='0'>".$locale['zwar_1416']."</option>"; }
	$opplist = ""; $sel = "";
	$result = dbquery("SELECT * FROM ".DB_ZWAR_OPPONENTS." ORDER BY opp_name");
	if (dbrows($result)) {
		while ($data = dbarray($result)) {
			if ($war_opp_id != "") $sel = ($war_opp_id == $data['opp_id'] ? " selected='selected'" : "");
			$opplist .= "<option value='".$data['opp_id']."'$sel>".$data['opp_name']."</option>\n";
	}}
	$serverlist = ""; $sel = "";
	$result = dbquery("SELECT * FROM ".DB_ZWAR_SERVERS." ORDER BY server_name");
	if (dbrows($result)) {
		while ($data = dbarray($result)) {
			if ($war_server_id != "") $sel = ($war_server_id == $data['server_id'] ? " selected='selected'" : "");
			$serverlist .= "<option value='".$data['server_id']."'$sel>".$data['server_name']."</option>\n";
	}}
	$loclist = ""; $sel = "";
	$result = dbquery("SELECT * FROM ".DB_ZWAR_LOCS." WHERE location_game_id='".$war_game_id."' ORDER BY location_name");
	if (dbrows($result)) {
		while ($data = dbarray($result)) {
			if ($war_location_id != "") $sel = ($war_location_id == $data['location_id'] ? " selected='selected'" : "");
			$loclist .= "<option value='".$data['location_id']."'$sel>".$data['location_name']."</option>\n";
	}}
	$sel = ""; $squadlist = "";
	$result = dbquery("SELECT * FROM ".DB_ZWAR_SQUADS." WHERE group_wars='1' AND group_games REGEXP('^\\\.{$war_game_id}$|\\\.{$war_game_id}\\\.|\\\.{$war_game_id}$') $select_teams ORDER BY group_name");
	if (dbrows($result)) {
		while ($data = dbarray($result)) {
			if ($war_squad_id != 0) $sel = ($war_squad_id == $data['group_id'] ? " selected='selected'" : "");
			$squadlist .= "<option value='".$data['group_id']."'$sel>".$data['group_name']."</option>\n";
	}}
	$squadlist .= "<option value='0' ".($war_squad_id == 0 ? " selected='selected'" : "").">".sprintf($locale['zwar_1446'],$war_game_selectname)."</option>";  
	require_once INFUSIONS."zwar_warscript/locale/ccodes.php";
	$opp_cflag_files = makefilelist(INFUSIONS."zwar_warscript/locale/flags/", ".|..|index.php|Unknown.gif", true);
	$opp_cflag_list = "";
	$sel="";
	for ($i = 0; $i < count($opp_cflag_files); $i++) {
		$ccode = preg_replace("/\.gif$/","",$opp_cflag_files[$i]);
		$cflag_sortarray[$i]['file'] = $opp_cflag_files[$i];
		$cflag_sortarray[$i]['name'] = isset($zwar_countrycodes_array[strtoupper($ccode)]) ? $zwar_countrycodes_array[strtoupper($ccode)] : $ccode;
	}
	$mess_type_list = "";
	$mess_type_array = explode(",", $zwar_settings_array['zwar_messenger_types']);
	if (is_array($mess_type_array) && count($mess_type_array)) {
		foreach ($mess_type_array as $mess_type_string) {
			if ($mess_type_string != "") {
				$sel = $mess_type_string == $opp_contact2_type ? " selected='selected'" : "";
				$mess_type_list .= "<option value='".trim($mess_type_string)."'".$sel.">".$mess_type_string."</option>";
			}
		}
	}
	$voice_type_list = "";
	$voice_type_array = explode(",", $zwar_settings_array['zwar_voice_types']);
	if (is_array($voice_type_array) && count($voice_type_array)) {
		foreach ($voice_type_array as $voice_type_string) {
			if ($voice_type_string != "") {
				$sel = $voice_type_string == $opp_contact3_type ? " selected='selected'" : "";
				$voice_type_list .= "<option value='".trim($voice_type_string)."'".$sel.">".$voice_type_string."</option>";
			}
		}
	}
	usort($cflag_sortarray, 'sort_cflagarray');
	for ($i = 0; $i < count($cflag_sortarray); $i++) {
		$sel = (isset($war_opparray['opp_country']) && $war_opparray['opp_country'] == $cflag_sortarray[$i]['file'] ? ' selected="selected"' : "");
		$opp_cflag_list .= '<option value="'.$cflag_sortarray[$i]['file'].'"'.$sel.'>'.$cflag_sortarray[$i]['name'].'</option>'."\n";
	}
	require_once INCLUDES."bbcode_include.php";
	echo'<form action="'.FUSION_SELF.$aidlink.'&pagefile=editwars&action='.$formaction.'#zwar_form" method="post" name="inputform">
	<table cellpadding="0" cellspacing="0" class="center">
	<tr>	
		<td width="100" class="tbl">'.$locale['zwar_1413'].'<font style="color:#ff0000;"> *</font></td>
		<td width="75%" class="tbl"><b><select name="war_game_id" style="width:250px;" onchange="submit()" class="textbox">
		'.$gamelist.'</select></b><input type="hidden" name="old_game_id" value="'.$war_game_id.'"></td>
	</tr><tr>	
		<td width="100" class="tbl">'.$locale['zwar_1414'].'</td>
		<td width="75%" class="tbl"><select name="war_gametype_id" style="width:250px;" class="textbox">
		<option value="">'.$locale['zwar_1416'].'</option>
		'.$gametypelist.'</select></td>
	</tr><tr>	
		<td width="100" class="tbl">'.$locale['zwar_1415'].'</td>
		<td width="75%" class="tbl"><select name="war_matchtype_id" style="width:250px;" class="textbox">
		<option value="">'.$locale['zwar_1416'].'</option>
		'.$matchtypelist.'</select></td>
	</tr><tr>	
		<td width="100" class="tbl">'.$locale["zwar_1444"].'</td>
		<td width="75%" class="tbl"><select name="war_squad_id" style="width:250px;" class="textbox">
		'.$squadlist.'</select></td>
	</tr>
	</table><br/>
	<table cellpadding="0" cellspacing="0" class="center">
	<tr>
		<td width="50%" class="tbl" valign="top">';
			$writeopt=($war_opp_id!="" ? "readonly class='textbox'" : "class='textbox'"); 
			echo '<table cellpadding="0" cellspacing="0" class="center">
			<tr>
				<td width="100" class="tbl2">'.$locale['zwar_1417'].'</td>
				<td width="75%" class="tbl2"><b><select name="war_opp_id" style="width:200px;" onchange="submit()" class="textbox">
				<option value="">'.$locale['zwar_1418'].'</option>
				'.$opplist.'</select></b><input type="hidden" name="old_opp_id" value="'.$war_opp_id.'"></td>				
			</tr><tr>
				<td width="100" class="tbl">'.$locale['zwar_1419'].'</td>
				<td width="75%" class="tbl">
					<input type="text" maxlength="100" name="war_opparray[opp_name]" style="width:200px;" value="'.(isset($war_opparray['opp_name']) ? $war_opparray['opp_name'] : "").'" '.$writeopt.'></td>
			</tr><tr>
				<td width="100" class="tbl">'.$locale['zwar_1420'].'<font style="color:#ff0000;"> *</font></td>
				<td width="75%" class="tbl">
					<input type="text" maxlength="20" name="war_opparray[opp_name_short]" style="width:200px;" value="'.(isset($war_opparray['opp_name_short']) ? $war_opparray['opp_name_short'] : "").'" '.$writeopt.'></td>
			</tr><tr>
				<td width="100" class="tbl">'.$locale['zwar_0085'].'</td>
				<td width="75%" class="tbl">
					<select name="war_opparray[opp_country]" class="textbox" style="width:180px;">
					<option value="">---</option>
					'.$opp_cflag_list.'
					</select>
					'.display_zwar_flag(isset($war_opparray['opp_country']) ? $war_opparray['opp_country'] : "").'
				</td>
				</tr><tr>
				<td width="100" class="tbl">'.$locale['zwar_1421'].'</td>
				<td width="75%" class="tbl">
					<input type="text" maxlength="100" name="war_opparray[opp_hp]" style="width:200px;" value="'.(isset($war_opparray['opp_hp']) ? $war_opparray['opp_hp'] : "").'" '.$writeopt.'></td>
			</tr><tr>
				<td width="100" class="tbl">'.$locale['zwar_1422'].'</td>
				<td width="75%" class="tbl">
					<input type="text" maxlength="100" name="war_opparray[opp_contact1]" style="width:200px;" value="'.(isset($war_opparray['opp_contact1']) ? $war_opparray['opp_contact1'] : "").'" '.$writeopt.'></td>
			</tr><tr>
				<td width="100" class="tbl">'.$locale['zwar_1423'].'</td>
				<td width="75%" class="tbl">
					<input type="text" maxlength="100" name="war_opparray[opp_contact2]" style="width:'.($war_opp_id=="" ? 130 : 200).'px;" value="'.(isset($war_opparray['opp_contact2']) ? $war_opparray['opp_contact2'] : "").'" '.$writeopt.'>'.($war_opp_id=="" ? "<select name='war_opparray[opp_contact2_type]' class='textbox' style='width:70px;'>".$mess_type_list."</select>" : "").'</td>
			</tr><tr>
				<td width="100" class="tbl">'.$locale['zwar_1424'].'</td>
				<td width="75%" class="tbl">
					<input type="text" maxlength="100" name="war_opparray[opp_contact3]" style="width:'.($war_opp_id=="" ? 130 : 200).'px;" value="'.(isset($war_opparray['opp_contact3']) ? $war_opparray['opp_contact3'] : "").'" '.$writeopt.'>'.($war_opp_id=="" ? "<select name='war_opparray[opp_contact3_type]' class='textbox' style='width:70px;'>".$voice_type_list."</select>" : "").'</td>
			</tr><tr>
				<td width="100" class="tbl">'.$locale['zwar_1425'].'</td>
				<td width="75%" class="tbl">
					<input type="text" maxlength="100" name="war_opparray[opp_contact4]" style="width:200px;" value="'.(isset($war_opparray['opp_contact4']) ? $war_opparray['opp_contact4'] : "").'" '.$writeopt.'></td>
			</tr>
			</table>
		</td>
		<td width="50%" class="tbl" valign="top">';
			$writeopt=($war_server_id!="" ? 'readonly class="textbox"' : "class='textbox'"); 
			echo '<table cellpadding="0" cellspacing="0" class="center">
			<tr>
				<td width="100" class="tbl2">'.$locale['zwar_1426'].'</td>
				<td width="75%" class="tbl2"><b><select name="war_server_id" style="width:200px;" onchange="submit()" class="textbox">
				<option value="">'.$locale['zwar_1427'].'</option>
				'.$serverlist.'</select></b><input type="hidden" name="old_server_id" value="'.$war_server_id.'"></td>				
			</tr><tr>
				<td width="100" class="tbl1">'.$locale['zwar_1428'].'<font style="color:#ff0000;"> *</font></td>
				<td width="75%" class="tbl1">
					<input type="text" maxlength="100" name="war_server_array[server_name]" style="width:200px;" value="'.(isset($war_server_array['server_name']) ? $war_server_array['server_name'] : "").'" '.$writeopt.'></td>
			</tr><tr>
				<td width="100" class="tbl1">'.$locale['zwar_1429'].'</td>
				<td width="75%" class="tbl1">
					<input type="text" maxlength="25" name="war_server_array[server_ip]" style="width:200px;" value="'.(isset($war_server_array['server_ip']) ? $war_server_array['server_ip'] : "").'" '.$writeopt.'></td>
			</tr><tr>
				<td width="100" class="tbl1">'.$locale['zwar_1430'].'</td>
				<td width="75%" class="tbl1">
					<input type="text" maxlength="10" name="war_password" style="width:200px;" value="'.$war_password.'" class="textbox"></td>
			</tr></table><br/>
			<table cellpadding="0" cellspacing="0" class="center">
			<tr>
				<td width="100" class="tbl">'.$locale['zwar_1431'].'</td>
				<td width="75%" class="tbl">
					<input type="text" maxlength="2" name="war_teamsize" style="width:40px;" value="'.$war_teamsize.'" class="textbox"></td>
			</tr></table>
		</td>
	</tr></table><br/>
	<table cellpadding="0" cellspacing="0" class="center">
	<tr>
		<td width="100" class="tbl" valign="top">'.$locale['zwar_1432'].'</td>
		<td width="75%" class="tbl">';
		if ($war_game_id!="") {
			echo '<table cellpadding="0" cellspacing="0">
			<tr><td><b><select name="war_location_id" style="width:150px;" class="textbox">
			<option value="">'.$locale['zwar_1416'].'</option>
			'.$loclist.'</select></b>&nbsp;<input type="submit" name="addlocation" value="'.$locale['zwar_1433'].'" class="button">';
			if (isset($_GET['action']) && $_GET['action']=="modify" && $allowresetloc) {
				echo '&nbsp;<input type="submit" name="resetlocations" value="'.$locale['zwar_1434'].'" class="button">';
			}
			echo '<br/><br/></td></tr>
			<tr><td><table cellpadding="0" cellspacing="2"><tr>';
			if (isset($war_location_array) && is_array($war_location_array)) {
				foreach ($war_location_array as $addedscoreid => $addedlocid) {
					if ($addedlocid == 'deleted') {
						echo "<input type='hidden' name='war_location_array[".$addedscoreid."]' value='deleted'>";
					} elseif (isnum($addedscoreid) && isnum($addedlocid)) {
						$loclist = ""; $sel = "";
						$result = dbquery("SELECT * FROM ".DB_ZWAR_LOCS." WHERE location_game_id='".$war_game_id."' ORDER BY location_name");
						if (dbrows($result)) {
							while ($data = dbarray($result)) {
								$sel = ($addedlocid == $data['location_id'] ? " selected" : "");
								$loclist .= "<option value='".$data['location_id']."'$sel>".$data['location_name']."</option>\n";
						}}
						$result = dbquery("SELECT * FROM ".DB_ZWAR_LOCS." WHERE location_id='".$addedlocid."'");
						if (dbrows($result)) {
							$data = dbarray($result);
							echo "<td><select name='war_location_array[".$addedscoreid."]' onchange='submit()' class='textbox' style='width:150px;'>
							$loclist</select>";
							if ($data['location_pic']!="") echo "<br/><img src='".INFUSIONS."zwar_warscript/images/locs/".$data['location_pic']."' alt='".$data['location_name']."' width='150' height='150'>";
							echo "<br/><a href='javascript:deleteloc(".$addedscoreid.");' class='button' style='padding:1 6 1 6px; text-decoration:none;'>".$locale['zwar_0067']."</a>";
							$result = dbquery("SELECT * FROM ".DB_ZWAR_SCORES." WHERE score_id='".$addedscoreid."' AND score_war_id='".$war_id."'");
							if (dbrows($result)) {
								$data = dbarray($result);
								echo "&nbsp;&nbsp;".$data['score_ownscore']." : ".$data['score_oppscore'];
							}
							echo "</td>";
						}
					}
				}
			}
			echo "</tr></table></td></tr></table>";
		} else {
			echo $locale['zwar_1435'];
		}
		
		echo '</td></tr><tr>
		<td width="100" class="tbl1" valign="top">'.$locale['zwar_1436'].'<font style="color:#ff0000;"> *</font></td>';
		echo '<td width="75%" class="tbl1">'.zwar_FormDate("war_date", $war_date).'</td>
	</tr><tr>
		<td width="100" class="tbl1" valign="top">'.$locale['zwar_1438'].'</td>
		<td width="75%" class="tbl1"><textarea name="war_info" cols="50" rows="6" class="textbox" style="width:300px;">'.$war_info.'</textarea>
		<br/><div align="center" style="width:300px;">'.display_bbcodes("300px", "war_info").'</div></td>
	</tr><tr>
		<td colspan="2" class="tbl1" align="center">
			<input type="submit" name="save" value="'.($_GET['action']=="modify" ? $locale['zwar_1441'] : $locale['zwar_1442']).'" class="button">'.$cancelbtn.'
		</td>
	</tr></table></form><br/>';
}

echo '<script type="text/javascript">
function deleteloc(locid) {
	if (confirm("'.$locale['zwar_1443'].'")) {
		action = document.inputform.action;
		action = action.replace(/#zwar_form/, "&deletelocation=" + locid + "#zwar_form");
		document.inputform.action = action;
		document.inputform.submit();
	}
}
</script>';

closetable();
?>