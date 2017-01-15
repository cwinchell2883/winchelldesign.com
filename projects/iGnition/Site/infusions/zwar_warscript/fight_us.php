<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: fight_us.php
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

if (isset($_GET['lang']) && !file_exists(INFUSIONS."zwar_warscript/locale/".$_GET['lang'].".php")) { redirect( BASEDIR.'index.php' ); }
$lang = isset($_GET['lang']) ? $_GET['lang'] : "";

include LOCALE.LOCALESET."messages.php";
if (file_exists(INFUSIONS."zwar_warscript/locale/".$lang.".php")) {
	include INFUSIONS."zwar_warscript/locale/".$lang.".php";
}
add_to_title("&nbsp;-&nbsp;".$locale['zwar_0515']);

if (isset($_POST['send'])) {
	require_once INCLUDES."flood_include.php";
	$msg_settings = dbarray(dbquery("SELECT * FROM ".DB_MESSAGES_OPTIONS." WHERE user_id='0'"));
	$error=""; $errorcount=1;
	$challenge_info=stripinput($_POST['challenge_info']);
	$challenge_date_add=time();
	$daterror=false;
	foreach ($_POST['challenge_date'] as $datewert) {
		if (!isNum($datewert)) {
			$daterror=true;
	}}
	$challenge_date=($daterror ? "" : mktime($_POST['challenge_date']['hours'], $_POST['challenge_date']['minutes'], 0,$_POST['challenge_date']['mon'], $_POST['challenge_date']['mday'], $_POST['challenge_date']['year']));
	$challenge_country=stripinput($_POST['challenge_country']);
	$challenge_contact1=stripinput($_POST['challenge_contact1']);
	if (!$challenge_contact1) { $error.=$errorcount++.$locale['zwar_0501']."<br/>";}
	$challenge_contact2=($_POST['challenge_contact2_type'] != "" ? stripinput($_POST['challenge_contact2_type']).": " : "").stripinput($_POST['challenge_contact2']);
	$challenge_contact3=($_POST['challenge_contact3_type'] != "" ? stripinput($_POST['challenge_contact3_type']).": " : "").stripinput($_POST['challenge_contact3']);
	$challenge_contact4=stripinput($_POST['challenge_contact4']);
	$challenge_server_name=stripinput($_POST['challenge_server_name']);
	$challenge_server_ip=stripinput($_POST['challenge_server_ip']);
	$challenge_server_pass=stripinput($_POST['challenge_server_pass']);
	$challenge_hp=stripinput($_POST['challenge_hp']);
	if ($challenge_hp=="") {
		$error.=$errorcount++.$locale['zwar_0503']."<br/>";
	} else if (substr($challenge_hp,0,7) != "http://" AND substr($challenge_hp,0,6) != "ftp://")	{
		$challenge_hp = "http://" . $challenge_hp;
	}
	$challenge_clan_name=stripinput($_POST['challenge_clan_name']);
	$challenge_clantag=stripinput($_POST['challenge_clantag']);
	if (!$challenge_clantag) $error.=$errorcount++.$locale['zwar_0506']."<br/>";
	if (!$challenge_clan_name) $challenge_clan_name = $challenge_clantag;
	$challenge_maps=(isset($_POST['challenge_map_id']) && isNum($_POST['challenge_map_id']) ? $_POST['challenge_map_id'] : "");
	$challenge_maps.=($challenge_maps != "" ? "." : "").(isset($_POST['challenge_map_id2']) && isNum($_POST['challenge_map_id2']) ? $_POST['challenge_map_id2'] : "");
	$challenge_game_id=(isNum($_POST['challenge_game_id']) ? $_POST['challenge_game_id'] : 0);
	if (!$challenge_game_id) $error.=$errorcount++.$locale['zwar_0507']."<br/>";
	$challenge_teamsize=(isNum($_POST['challenge_teamsize']) ? $_POST['challenge_teamsize'] : "");
	if (!check_captcha($_POST['captcha_encode'], $_POST['captcha_code'])) {
	  $error.=$errorcount++.". ".$locale['zwar_0542']."<br/>";
	}
	if ($error!="") {
		if (!flood_control("challenge_date_add", DB_ZWAR_CHALLENGES, "challenge_userip='".USER_IP."'")) {
			$result = dbquery("INSERT INTO ".DB_ZWAR_CHALLENGES." (challenge_info, challenge_date_add, challenge_date, challenge_contact1, challenge_contact2, challenge_contact3, challenge_hp, challenge_clan_name, challenge_clantag, challenge_maps, challenge_game_id, challenge_teamsize, challenge_userip, challenge_contact4, challenge_server_name, challenge_server_ip, challenge_server_pass, challenge_country) VALUES('$challenge_info', '$challenge_date_add', '$challenge_date', '$challenge_contact1', '$challenge_contact2', '$challenge_contact3', '$challenge_hp', '$challenge_clan_name', '$challenge_clantag', '$challenge_maps', '$challenge_game_id', '$challenge_teamsize', '".USER_IP."', '$challenge_contact4', '$challenge_server_name', '$challenge_server_ip', '$challenge_server_pass', '$challenge_country')");
			$challenge_id = mysql_insert_id();

			require_once INCLUDES."sendmail_include.php";
			$result = dbquery("SELECT u.user_id, u.user_name, u.user_email, u.user_rights, mo.pm_email_notify FROM ((".DB_USERS." AS u LEFT JOIN ".DB_MESSAGES_OPTIONS." AS mo USING(user_id)) LEFT JOIN ".DB_ZWAR_SQUADS_PLAYERS." AS zsp ON u.user_id=zsp.player_member_id) LEFT JOIN ".DB_ZWAR_SQUADS." AS zs ON zsp.player_squad=zs.group_id WHERE u.user_rights REGEXP('^{ZWAR}$|^{ZWAR}\\\.|\\\.{ZWAR}\\\.|\\\.{ZWAR}$') OR (zsp.player_level>='11' AND zs.group_games REGEXP('^\\\.{$challenge_game_id}$|\\\.{$challenge_game_id}\\\.|\\\.{$challenge_game_id}$') )");
			while ($data = dbarray($result)) {
				if (in_array("ZWAR", explode(".", $data['user_rights']))) {
					$challenge_link = "<a href=\"".BASEDIR."infusions/zwar_warscript/zwar_admin_panel.php".$aidlink."&amp;pagefile=editwars&amp;action=add&amp;challenge_id=".$challenge_id."\">".$locale['zwar_0543']."</a>";
				} else {
					$challenge_link = "<a href=\"".BASEDIR."infusions/zwar_admin_panel.php?aid=0&amp;pagefile=editwars&amp;action=add&amp;challenge_id=".$challenge_id."\">".$locale['zwar_0543']."</a>";
				}
				$result2 = dbquery("INSERT INTO ".DB_MESSAGES." (message_to, message_from, message_subject, message_message, message_smileys, message_read, message_datestamp, message_folder) VALUES ('".$data['user_id']."','','".$locale['zwar_0535']."','".sprintf($locale['zwar_0536'], $challenge_link).$challenge_info."','y','0','".time()."','0')");
				$send_email = isset($data['pm_email_notify']) ? $data['pm_email_notify'] : $msg_settings['pm_email_notify'];
				if ($send_email == "1") sendemail($data['user_name'],$data['user_email'],$settings['siteusername'],$settings['siteemail'],$locale['625'],$data['user_name'].$locale['626']);
			}
			opentable($locale['zwar_0510']);
			render_zwar_message($locale['zwar_0509']."<br/><br/><a href='".BASEDIR."index.php'>".$locale['zwar_0054']." >></a>");
			closetable();
		} else {
			redirect( BASEDIR.'index.php' );
		}
	} else {
		opentable($locale['zwar_0053']);
		render_zwar_message($error."<br/><br/><a href='javascript:history.back()'>&lt;&lt; ".$locale['zwar_0001']."</a>");
		closetable();
	}
} else {
	$challenge_contact1=(isset($_POST['challenge_contact1']) ? stripinput($_POST['challenge_contact1']) : "");
	$challenge_contact2=(isset($_POST['challenge_contact2']) ? stripinput($_POST['challenge_contact2']) : "");
	$challenge_contact3=(isset($_POST['challenge_contact3']) ? stripinput($_POST['challenge_contact3']) : "");
	$challenge_contact4=(isset($_POST['challenge_contact4']) ? stripinput($_POST['challenge_contact4']) : "");
	$challenge_hp=(isset($_POST['challenge_hp']) ? stripinput($_POST['challenge_hp']) : "");
	$challenge_clan_name=(isset($_POST['challenge_clan_name']) ? stripinput($_POST['challenge_clan_name']) : "");
	$challenge_clantag=(isset($_POST['challenge_clantag']) ? stripinput($_POST['challenge_clantag']) : "");
	$challenge_map_id=(isset($_POST['challenge_map_id']) && isnum($_POST['challenge_map_id']) ? $_POST['challenge_map_id'] : 0);
	$challenge_map_id2=(isset($_POST['challenge_map_id2']) && isnum($_POST['challenge_map_id2']) ? $_POST['challenge_map_id2'] : 0);
	$challenge_game_id=(isset($_POST['challenge_game_id']) && isnum($_POST['challenge_game_id']) ? $_POST['challenge_game_id'] : 0);
	$challenge_teamsize=(isset($_POST['challenge_teamsize']) && isnum($_POST['challenge_teamsize']) ? $_POST['challenge_teamsize'] : "");
	$challenge_contact2_type=(isset($_POST['challenge_contact2_type']) ? stripinput($_POST['challenge_contact2_type']) : "");
	$challenge_contact3_type=(isset($_POST['challenge_contact3_type']) ? stripinput($_POST['challenge_contact3_type']) : "");
	$challenge_date="";
	if (isset($_POST['challenge_date']) && is_array($_POST['challenge_date']) && count($_POST['challenge_date'])) {
		foreach ($_POST['challenge_date'] as $datekey => $datewert) {
			if (isNum($datewert)) { $challenge_date[$datekey] = $datewert; } else { $challenge_date[$datekey] = ""; }
		}
	}
	$challenge_info=(isset($_POST['challenge_info']) ? stripinput($_POST['challenge_info']) : "");
	$challenge_server_ip=(isset($_POST['challenge_server_ip']) ? stripinput($_POST['challenge_server_ip']) : "");
	$challenge_server_pass=(isset($_POST['challenge_server_pass']) ? stripinput($_POST['challenge_server_pass']) : "");
	$challenge_server_name=(isset($_POST['challenge_server_name']) ? stripinput($_POST['challenge_server_name']) : "");
	$challenge_country=(isset($_POST['challenge_country']) ? stripinput($_POST['challenge_country']) : "");
	
	$gamelist = ""; $sel = "";
	$zwar_games = get_zwar_games();
	while(list($key, $zwar_game) = each($zwar_games)){
		if ($challenge_game_id != "") { $sel = ($challenge_game_id == $zwar_game['game_id'] ? " selected" : ""); }
		$gamelist .= "<option value='".$zwar_game['game_id']."'$sel>".$zwar_game['game_name']."</option>\n";
	}
	$loclist = ""; $sel = ""; $map_pic = "";
	$result = dbquery("SELECT * FROM ".DB_ZWAR_LOCS." WHERE location_game_id='".$challenge_game_id."' ORDER BY location_name");
	if (dbrows($result)) {
		while ($data = dbarray($result)) {
			if ($challenge_map_id != "" && $challenge_map_id == $data['location_id']) {
				$sel = " selected";
				$map_pic = "<img src='".INFUSIONS."zwar_warscript/images/locs/".$data['location_pic']."' />";
			} else {
				$sel = "";
			}
			$loclist .= "<option value='".$data['location_id']."'$sel>".$data['location_name']."</option>\n";
			
	}}
	$loclist2 = ""; $sel2 = ""; $map_pic2 = "";
	$result2 = dbquery("SELECT * FROM ".DB_ZWAR_LOCS." WHERE location_game_id='".$challenge_game_id."' ORDER BY location_name");
	if (dbrows($result2)) {
		while ($data2 = dbarray($result2)) {
			if ($challenge_map_id2 != "" && $challenge_map_id2 == $data2['location_id']) {
				$sel2 = " selected";
				$map_pic2 .= "<img src='".INFUSIONS."zwar_warscript/images/locs/".$data2['location_pic']."' />";
			} else {
				$sel2 = "";
			}			
			$loclist2 .= "<option value='".$data2['location_id']."'$sel2>".$data2['location_name']."</option>\n";
	}}
	$mess_type_list = "";
	$mess_type_array = explode(",", $zwar_settings_array['zwar_messenger_types']);
	if (is_array($mess_type_array) && count($mess_type_array)) {
		foreach ($mess_type_array as $mess_type_string) {
			if ($mess_type_string != "") {
				$sel = trim($mess_type_string) == $challenge_contact2_type ? " selected='selected'" : "";
				$mess_type_list .= "<option value='".trim($mess_type_string)."'".$sel.">".$mess_type_string."</option>";
			}
		}
	}
	$voice_type_list = "";
	$voice_type_array = explode(",", $zwar_settings_array['zwar_voice_types']);
	if (is_array($voice_type_array) && count($voice_type_array)) {
		foreach ($voice_type_array as $voice_type_string) {
			if ($voice_type_string != "") {
				$sel = $voice_type_string == $challenge_contact3_type ? " selected='selected'" : "";
				$voice_type_list .= "<option value='".trim($voice_type_string)."'".$sel.">".$voice_type_string."</option>";
			}
		}
	}
	require_once INFUSIONS."zwar_warscript/locale/ccodes.php";
	$chall_cflag_files = makefilelist(INFUSIONS."zwar_warscript/locale/flags/", ".|..|index.php|Unknown.gif", true);
	$chall_cflag_list = "";
	$sel="";
	for ($i = 0; $i < count($chall_cflag_files); $i++) {
		$ccode = preg_replace("/\.gif$/","",$chall_cflag_files[$i]);
		$cflag_sortarray[$i]['file'] = $chall_cflag_files[$i];
		$cflag_sortarray[$i]['name'] = isset($zwar_countrycodes_array[strtoupper($ccode)]) ? $zwar_countrycodes_array[strtoupper($ccode)] : $ccode;
	}
	usort($cflag_sortarray, 'sort_cflagarray');
	for ($i = 0; $i < count($cflag_sortarray); $i++) {
		$sel = ($challenge_country == $cflag_sortarray[$i]['file'] ? " selected='selected'" : "");
		$chall_cflag_list .= "<option value='".$cflag_sortarray[$i]['file']."'$sel>".$cflag_sortarray[$i]['name']."</option>\n";
	}
		
	opentable($locale['zwar_0515']);
	echo "<div class='zwar-body'>";
	zwar_FormOpen(FUSION_SELF."?page=fight_us".($lang!="" ? "&amp;lang=".$lang : ""));
	zwar_FormCaption("<div style='float:right;'>".zwar_foloswitch()."</div><div style='float:left;'>".$locale['zwar_0516']."</div>");
	zwar_FormLeft($locale['zwar_0517'], "<input type='text' name='challenge_clan_name' value='$challenge_clan_name' maxlength='100' class='textbox' style='width:90%;' />"); 
	zwar_FormRight($locale['zwar_0518']."&nbsp;<font style='color:#FF0000;'>*</font>", "<input type='text' name='challenge_clantag' value='$challenge_clantag' maxlength='20' class='textbox' style='width:90%;' />"); 
	zwar_FormLeft($locale['zwar_0519']."&nbsp;<font style='color:#FF0000;'>*</font>", "<input type='text' name='challenge_hp' value='$challenge_hp' maxlength='100' class='textbox' style='width:90%;' />");
	zwar_FormRight($locale['zwar_0085'],"<select name='challenge_country' class='textbox' style='width:80%;' onchange='submit()'><option value=''>".$locale['zwar_0526']."</option>".$chall_cflag_list."</select>&nbsp;&nbsp;".display_zwar_flag($challenge_country)."");
	zwar_FormCaption($locale['zwar_0520']);
	zwar_FormLeft($locale['zwar_0521']."&nbsp;<font style='color:#FF0000;'>*</font>", "<input type='text' name='challenge_contact1' value='$challenge_contact1' maxlength='100' class='textbox' style='width:90%;' />"); 
	zwar_FormRight($locale['zwar_0522'], "<input type='text' name='challenge_contact2' value='$challenge_contact2' maxlength='100' class='textbox' style='width:60%;' /><select name='challenge_contact2_type' class='textbox' style='width:30%;'>".$mess_type_list."</select>"); 
	zwar_FormLeft($locale['zwar_0523'], "<input type='text' name='challenge_contact3' value='$challenge_contact3' maxlength='100' class='textbox' style='width:60%;' /><select name='challenge_contact3_type' class='textbox' style='width:30%;'>".$voice_type_list."</select>"); 
	zwar_FormRight($locale['zwar_0537'], "<input type='text' name='challenge_contact4' value='$challenge_contact4' maxlength='100' class='textbox' style='width:90%;' />"); 
	zwar_FormCaption($locale['zwar_0538']);
	zwar_FormLeft($locale['zwar_0539'], "<input type='text' name='challenge_server_name' value='$challenge_server_name' maxlength='100' class='textbox' style='width:90%;' />"); 
	zwar_FormRight($locale['zwar_0540'], "<input type='text' name='challenge_server_ip' value='$challenge_server_ip' maxlength='25' class='textbox' style='width:90%;' />");
	zwar_FormLeft($locale['zwar_0541'], "<input type='text' name='challenge_server_pass' value='$challenge_server_pass' maxlength='20' class='textbox' style='width:90%;' />");
	zwar_FormRight("","");
	zwar_FormCaption($locale['zwar_0524']);
	zwar_FormLeft($locale['zwar_0525']."&nbsp;<font style='color:#FF0000;'>*</font>", "<select name='challenge_game_id' class='textbox' style='width:90%;' onchange='submit();'><option value='0'>".$locale['zwar_0526']."</option>$gamelist</select>"); 
	zwar_FormRight($locale['zwar_0531'], "<input type='text' name='challenge_teamsize' value='$challenge_teamsize' maxlength='2' class='textbox' style='width:20px;' />"); 
	zwar_FormLeft($locale['zwar_0527'], "<select name='challenge_map_id' class='textbox' style='width:90%;' onchange='submit()'><option value='0'>".$locale['zwar_0526']."</option>$loclist</select>");
	zwar_FormRight($locale['zwar_0527'], "<select name='challenge_map_id2' class='textbox' style='width:90%;' onchange='submit()'><option value='0'>".$locale['zwar_0526']."</option>$loclist2</select>"); 
	if ($map_pic || $map_pic2) { zwar_FormLeft("<center>".$map_pic."</center>", ""); zwar_FormRight("<center>".$map_pic2."</center>", ""); }
	zwar_FormBoth($locale['zwar_0528']."&nbsp;<font style='color:#FF0000;'>*</font>", zwar_FormDate("challenge_date", $challenge_date));
	zwar_FormBoth($locale['zwar_0532'], "<textarea name='challenge_info' style='width:95%;' cols='40' rows='6' class='textbox'>$challenge_info</textarea>");
	zwar_FormClose();
	echo "</div>";
	closetable();
}
?>
