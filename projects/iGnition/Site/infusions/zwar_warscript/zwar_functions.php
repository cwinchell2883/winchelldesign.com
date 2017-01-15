<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: zwar_functions.php
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
//Just to keep somebody from thinking i publish work from others as my own, here some comments:
//several methods from php-suion were adapted for zWar, to keep the fusion standard a little :)
//please see comments below for more information
if (!defined("IN_FUSION")) { die("Access Denied"); }

include INFUSIONS."zwar_warscript/infusion_db.php";
include INFUSIONS."zwar_warscript/output/output_functions_include.php";
define("iZWAR_CLANMEMBER", iMEMBER && isset($userdata['member_clanstatus']) && $userdata['member_clanstatus'] ? 1 : 0);
add_to_head("<script type='text/javascript' src='".INFUSIONS."zwar_warscript/js/zwar_js.js'></script>");
$zwar_games_cache="";

//function for getting system_images (from system_images.php) adapted by zezoar for zWar) - will use fusion funtcions in coming version
function zwar_images($name, $title="", $path=false, $dim=false) {
	$images = array(
		"del" => "delete.png",
		"edit" => "edit.png",
		"cmark" => "tick.png",
		"view" => "view.png",
		"nocmark" => "notick.png",
		"clock" => "clock.png",
		"up" => "up.png",
		"down" => "down.png",
		"qmark" => "qmark.png"
	);
	$img_width = "";
	$pathname = INFUSIONS."zwar_warscript/images/";
	if ($dim) {
		$img_width = " width='".$dim."' height='".$dim."'";
	}

	if (isset($images[$name])) {
		$return = $path ? "" :  "<img src='";
		$return .= $pathname.$images[$name];
		$return .= $path ? "" : "' alt='".($title!= "" ? $title : "zwar-image")."'".($title != "" ?  " title='".$title."'" : "")."style='border:0;vertical-align:middle;' class='zwoptimg'".$img_width."/>";
		return $return;
	}
}

function zwar_display_matchdate($date) {
	global $locale, $settings;

	$mdate = $date + ($settings['timeoffset']*3600);
	if (mktime(0, 0, 0, date("m")  , date("d"), date("Y")) == mktime(0, 0, 0, date("m", $mdate)  , date("d", $mdate), date("Y", $mdate))) { 	$date = "<b>".$locale['zwar_0081']."</b>";
	} elseif (mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")) == mktime(0, 0, 0, date("m", $mdate)  , date("d", $mdate), date("Y", $mdate))) { $date =  "<b>".$locale['zwar_0080']."</b>";
	} else { $date = date("d.m.Y",$mdate); }
	
	return $date;
}

function display_zwar_selectbar($gid, $sid, $action) {

	$gameaction = $gid ? "&amp;gameid=".$gid : "";
	$squadaction = $action.$gameaction;
	$squadlist = ""; $sel = "";
	$result = dbquery("SELECT * FROM ".DB_ZWAR_SQUADS." WHERE group_wars='1' ORDER BY group_name");
	if (dbrows($result)) {
		while ($data = dbarray($result)) {
			if (!$gid || in_array($gid, explode(".", $data['group_games']))) {
				if ($sid == $data['group_id']) { $sel = " selected='selected'"; } else { $sel = ""; }
				$squadlist .= "<option value='".$data['group_id']."'$sel>".$data['group_name']."</option>\n";
			}
	}}
	$gamelist = ""; $sel = "";
	$result = dbquery("SELECT * FROM ".DB_ZWAR_GAMES." ORDER BY game_name");
	if (dbrows($result)) {
		while ($data = dbarray($result)) {
			$sel = ($gid == $data['game_id'] ? " selected='selected'" : "");
			$gamelist .= "<option value='".$data['game_id']."'$sel>".$data['game_name']."</option>\n";
	}}
	render_zwar_selectbar($squadlist, $gamelist, $squadaction, $action);
}

function get_zwar_stats($squadid="", $gameid="") {
	$info['total']=0; $info['won']=0; $info['lost']=0; $info['draw']=0;
	$where = "";
	$where = $gameid ? " AND war_game_id='".$gameid."'" : $where;
	$where = $squadid ? " AND war_squad='".$squadid."'" : $where;
	$result = dbquery("SELECT * FROM ".DB_ZWAR_WARS." WHERE war_date<".time()." AND war_finished='1'$where");
	if (dbrows($result)) {
		while ($data=dbarray($result)) {
			$info['total']++;
			$result2 = dbquery("SELECT * FROM ".DB_ZWAR_SCORES." WHERE score_war_id='".$data['war_id']."'");
			if (dbrows($result2)) {
				$ownscorecount=0;
				$oppscorecount=0;
				while ($scoredata = dbarray($result2)) {
					$ownscorecount=$ownscorecount+$scoredata['score_ownscore'];
					$oppscorecount=$oppscorecount+$scoredata['score_oppscore'];
				}
				if ($ownscorecount>$oppscorecount) $info['won']++;
				if ($ownscorecount==$oppscorecount) $info['draw']++;
				if ($ownscorecount<$oppscorecount) $info['lost']++;
			}
		}
	}
	return $info;
}

//functions for cahing smileys (from maincore.php) adapted by zezoar to cache games for zWar
function cache_zwar_games() {
	global $zwar_games_cache;
	$result = dbquery("SELECT * FROM ".DB_ZWAR_GAMES." ORDER BY game_name ASC");
	if (dbrows($result)) {
		$zwar_games_cache = array();
		while ($data = dbarray($result)) {
			$zwar_games_cache[] = $data;
		}
	} else {
		$zwar_games_cache = array();
	}
}
//functions for cahing smileys (from maincore.php) adapted by zezoar to cache games for zWar
function get_zwar_games() {
	global $zwar_games_cache;
	if (!$zwar_games_cache) { cache_zwar_games(); }
	return $zwar_games_cache;
}

function display_zwar_games($gamestring, $icons=true, $link=true, $target="members") {
	global $zwar_games_cache;
	$return=""; $gc=0;
	$member_games = explode(".", $gamestring);
	if (!$zwar_games_cache) { cache_zwar_games(); }
	if (is_array($zwar_games_cache) && count($zwar_games_cache)) {
		foreach ($zwar_games_cache as $game) {
			if (in_array($game['game_id'],$member_games)) {
				$return .= $gc ? ($icons ? "&nbsp;" : "&nbsp;|&nbsp;") : "";
				$return .= $link ? "<a href='".BASEDIR."zwar.php?page=".$target."&amp;gameid=".$game['game_id']."'>" : "";
				$return .= $icons ? "<img src='".INFUSIONS."zwar_warscript/images/games/".$game['game_icon']."' title='".$game['game_name']."' alt='".$game['game_name_short']."' style='border:0; margin:0;vertical-align:middle;' />" : $game['game_name_short'];
				$return .= $link ? "</a>" : "";
				$gc++;
			}
		}
	}
	return $return;
}
//functions for checking group access (from maincore.php) adapted by zezoar to check gameaccess for zWar
function zwar_gameaccess($field, $games) {
	if ($games != "") { 
		$res = "($field='".str_replace(".", "' OR $field='", $games)."')";
		return $res;
	} else { 
		return "1 = 1";
	}
}

function get_opparray ($oppid) {
	$result = dbquery("SELECT * FROM ".DB_ZWAR_OPPONENTS." WHERE opp_id='".$oppid."'");
	$opparray = "";
	if (dbrows($result)) {
		$data=dbarray($result);
		$opparray['opp_name']=$data['opp_name'];
		$opparray['opp_name_short']=$data['opp_name_short'];
		$opparray['opp_contact1']=$data['opp_contact1'];
		$opparray['opp_contact2']=$data['opp_contact2'];
		$opparray['opp_contact3']=$data['opp_contact3'];
		$opparray['opp_contact4']=$data['opp_contact4'];
		$opparray['opp_country']=$data['opp_country'];
		$opparray['opp_hp']=$data['opp_hp'];
	}
	return $opparray;
}

function get_serverarray ($serverid) {
	$result = dbquery("SELECT * FROM ".DB_ZWAR_SERVERS." WHERE server_id='".$serverid."'");
	$server_array = "";
	if (dbrows($result)) {
		$data=dbarray($result);
		$server_array['server_name']=$data['server_name'];
		$server_array['server_ip']=$data['server_ip'];
	}
	return $server_array;
}
function zwar_foloswitch() {
	$display = "";
	$lang_files = makefilelist(INFUSIONS."zwar_warscript/locale/", ".|..|index.php|ccodes.php", true);
	$flags_array = array( "German" => "de", "Swedish" => "se", "English" => "gb" );
	for ($i=0;$i < count($lang_files);$i++) {
		$lang = str_replace(".php","",$lang_files[$i]);
		if (file_exists(INFUSIONS."zwar_warscript/locale/".$lang_files[$i])) {
			$display .= "<a href='javascript:zwar_setlang(\"".$lang."\");'><img src='".INFUSIONS."zwar_warscript/locale/flags/".$flags_array[$lang].".gif' title='".$lang."' alt='".$lang."' style='border:0;'/></a>&nbsp;\n"; 
		}
	}
	return $display;
}

function zwar_FormDate($name, $values) {
	global $locale;
	$zwarDate = '<select name="'.$name.'[hours]" class="textbox">';
	$selbool = false;
	for ($i=0;$i<=23;$i++) { 
		$sel = "";
		if (isset($values['hours']) && $values['hours'] == $i) { $sel = " selected='selected'"; $selbool = true; }
		$zwarDate .= "<option".$sel." value='".$i."'>".($i<10 ? "0".$i : $i)."</option>";
	}
	$zwarDate .= '<option value=""'.(!$selbool ? " selected='selected'" : "").'>'.$locale['zwar_0055'].'</option>';
	
	$zwarDate .= '</select> : <select name="'.$name.'[minutes]" class="textbox">';
	$selbool = false;
	for ($i=0;$i<=59;$i++) {
		$sel = "";
		if (isset($values['minutes']) && $values['minutes'] == $i) { $sel = " selected='selected'"; $selbool = true; }
		$zwarDate .= "<option".$sel." value='".$i."'>".($i<10 ? "0".$i : $i)."</option>";
	}
	$zwarDate .= '<option value=""'.(!$selbool ? " selected='selected'" : "").'>'.$locale['zwar_0056'].'</option>';
	
	$zwarDate .= '</select>&nbsp; - &nbsp;<select name="'.$name.'[mday]" class="textbox">';
	$selbool = false;
	for ($i=1;$i<=31;$i++) {
		$sel = "";
		if (isset($values['mday']) && $values['mday'] == $i) { $sel = " selected='selected'"; $selbool = true; }
		$zwarDate .= "<option".$sel." value='".$i."'>".($i<10 ? "0".$i : $i)."</option>";
	}
	$zwarDate .= '<option value=""'.(!$selbool ? " selected='selected'" : "").'>'.$locale['zwar_0059'].'</option>';
		
	$zwarDate .= '</select> / <select name="'.$name.'[mon]" class="textbox">';
	$selbool = false;
	for ($i=1;$i<=12;$i++) {
		$sel = "";
		if (isset($values['mon']) && $values['mon'] == $i) { $sel = " selected='selected'"; $selbool = true; }
		$zwarDate .= "<option".$sel." value='".$i."'>".($i<10 ? "0".$i : $i)."</option>";
	}
	$zwarDate .= '<option value=""'.(!$selbool ? " selected='selected'" : "").'>'.$locale['zwar_0058'].'</option>';
		
	$zwarDate .= '</select> / <select name="'.$name.'[year]" class="textbox">';
	$selbool = false;
	for ($i=date("Y");$i<=date("Y")+2;$i++) {
		$sel = "";
		if (isset($values['year']) && $values['year'] == $i) { $sel = " selected='selected'"; $selbool = true; }
		$zwarDate .= "<option".$sel." value='".$i."'>$i</option>";
	}
	$zwarDate .= '<option value=""'.(!$selbool ? " selected='selected'" : "").'>'.$locale['zwar_0057'].'</option>';
	$zwarDate .= '</select>';
	return $zwarDate;
}

function zwar_CheckAccess($adminpage) {
	global $userdata, $aidlink, $zwar_settings_array;

	if (checkrights("ZWAR") && defined("iAUTH") && $_GET['aid'] == iAUTH) { 
		return true;
	} elseif (iZWAR_CLANMEMBER || (iMEMBER && $zwar_settings_array['zwar_nomem_visible'])) {
		if ($adminpage=="editwars") {
			if (isset($_GET['action']) && ($_GET['action']=="modify" || $_GET['action']=="delete") && isset($_GET['warid']) && isnum($_GET['warid'])) {
				$result = dbquery("SELECT war_squad, war_game_id FROM ".DB_ZWAR_WARS." WHERE war_id='".$_GET['warid']."'");
				if (dbrows($result)) {
					$data = dbarray($result);
					if ($data['war_squad'] != 0) {
						if (in_array($data['war_squad'], zwar_getForLevel(11, "teams"))) { $aidlink="?aid=0";	return true; }
					} else {
						if (in_array($data['war_game_id'], zwar_getForLevel(11, "games"))) { $aidlink="?aid=0";	return true; }
					}
				} else { return false; }
			} elseif (isset($_GET['action']) && ($_GET['action']=="add" && zwar_getForLevel(11, "bool"))) { $aidlink="?aid=0";	return true;	
			} else { return false; }
		} elseif ($adminpage=="squads") {
			if (isset($_GET['action']) && $_GET['action']=="edit" && isset($_GET['group_id']) && isnum($_GET['group_id']) && in_array($_GET['group_id'], zwar_getForLevel(22, "teams"))) {
				$aidlink="?aid=0";
				return true;
			} else { return false; }
		} elseif ($adminpage=="finishwar") {
			if (isset($_GET['warid']) && isnum($_GET['warid'])) {
				$result = dbquery("SELECT war_squad, war_game_id FROM ".DB_ZWAR_WARS." WHERE war_id='".$_GET['warid']."'");
				if (dbrows($result)) {
					$data = dbarray($result);
					if ($data['war_squad'] != 0) {
						if (in_array($data['war_squad'], zwar_getForLevel(11, "teams"))) { $aidlink="?aid=0";	return true; }
					} else {
						if (in_array($data['war_game_id'], zwar_getForLevel(11, "games"))) { $aidlink="?aid=0";	return true; }
					}
				} else { return false; }
			} else { return false; }
		} else { return false; }
	} else { return false; }
}

function zwar_getForLevel($minlevel, $what, $uid=false) {
	global $userdata, $zwar_settings_array;

	$info = array();
	if (!$uid && iMEMBER) { $uid = $userdata['user_id']; }
	if(iZWAR_CLANMEMBER || (iMEMBER && $zwar_settings_array['zwar_nomem_visible'])) {
		if ($what=="teams") {
			$result = dbquery("SELECT player_squad FROM ".DB_ZWAR_SQUADS_PLAYERS." WHERE player_member_id='".$uid."' AND player_level>='".$minlevel."'");
			if (dbrows($result)) {
				while ($data = dbarray($result)) {
					$info[] = $data['player_squad'];
				}
			}
		} elseif ($what=="games") {
			$avail_games = get_zwar_games();
			if (is_array($avail_games) && count($avail_games)) {
				foreach ($avail_games as $game) {
					$war_game_id = $game['game_id'];
					if (dbcount("(player_id)", DB_ZWAR_SQUADS_PLAYERS." AS zsp INNER JOIN ".DB_ZWAR_SQUADS." AS zs ON zsp.player_squad=zs.group_id", "player_member_id='".$uid."' AND player_level>='".$minlevel."' AND group_games REGEXP('^\\\.{$war_game_id}$|\\\.{$war_game_id}\\\.|\\\.{$war_game_id}$')")) {
						$info[] = $war_game_id;
					}
				}
			}
		} elseif ($what=="bool") {
			$info = false;
			if (dbcount("(player_id)", DB_ZWAR_SQUADS_PLAYERS, "player_member_id='".$uid."' AND player_level>='".$minlevel."'")) { $info = true; }
		}
	}
	return $info;
}

function check_copy($out) {
	if (!preg_match("/\<a href\=\'http\:\/\/www\.zoffclan\.de\/zoffdev\/\' target\=\'\_blank\'>ZWar\<\/a\> - &copy; 2008 by ZEZoar/", $out)) { die("<center>ZWAR-copyright reading failed!</center>"); }
	return $out;
}

function get_zmuploadlimit($warid) {
	global $zwar_settings_array;
	
	if ($zwar_settings_array['zwar_uploadlimit_type'] == 1) {
		$zmuploaded = dbcount("(upload_id)", DB_ZWAR_MATCH_UPLOADS, "upload_war_id='".$warid."'");
		return $zwar_settings_array['zwar_uploadlimit'] - $zmuploaded;
	} else {
		$mapcount = dbcount("(score_id)", DB_ZWAR_SCORES, "score_war_id='".$warid."'");
		$zmuploaded = dbcount("(upload_id)", DB_ZWAR_MATCH_UPLOADS, "upload_war_id='".$warid."'");
		return ($mapcount * $zwar_settings_array['zwar_uploadlimit']) - $zmuploaded;
	}
}

//function for getting right filename of attachments (from froum_include.php) adapted by zezoar for zWar
function zmupload_exists($file) {
	$dir = INFUSIONS."zwar_warscript/uploads/";
	$i = 1;
	$file_name = substr($file, 0, strrpos($file, "."));
	$file_ext = strrchr($file, ".");
	while (file_exists($dir.$file)) {
		$file = $file_name."_".$i.$file_ext;
		$i++;
	}
	return $file;
}

function display_zwar_flag($flag) {
	require INFUSIONS."zwar_warscript/locale/ccodes.php";
	$country = $flag != "" ? $flag : "Unknown.gif";
	$ccode = preg_replace("/\.gif$/","",$flag);
	$countryname = isset($zwar_countrycodes_array[strtoupper($ccode)]) ? $zwar_countrycodes_array[strtoupper($ccode)] : $ccode;
	return "<img src='".INFUSIONS."zwar_warscript/locale/flags/".$country."' alt='".$countryname."' title='".$countryname."' style='border:0; margin:0;vertical-align:middle;'/>";
}

function sort_cflagarray($val1, $val2) {
	$a = $val1['name'];
	$b = $val2['name'];
	if ($a == $b) {
		return 0;
	}
	return ($a < $b) ? -1 : +1;
}
?>