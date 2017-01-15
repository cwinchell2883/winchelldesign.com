<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: join_us.php
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

if (isset($_GET['lang']) && !preg_match("/^[a-z]+$/i",$_GET['lang'])) { redirect( BASEDIR.'index.php' ); }
$lang = isset($_GET['lang']) ? $_GET['lang'] : "";

include LOCALE.LOCALESET."messages.php";
if (file_exists(INFUSIONS."zwar_warscript/locale/".$lang.".php")) {
	include INFUSIONS."zwar_warscript/locale/".$lang.".php";
}
add_to_title("&nbsp;-&nbsp;".$locale['zwar_0458']);

if (isset($_POST['send'])) {
	if (!iMEMBER && !$zwar_settings_array['zwar_joinus_public']) { redirect( BASEDIR.'index.php' ); }
	require_once INCLUDES."flood_include.php";
	$error=""; $errorcount=1;
	
	$app_user_id = iMEMBER ? $userdata['user_id'] : 0;
	$app_nickname = stripinput(trim($_POST['app_nickname']));
	if ($app_nickname == "") { $error.=$errorcount++.". ".$locale['zwar_0451']."<br/>"; }
	$app_name = stripinput(trim($_POST['app_name']));
	$app_games = isset($_POST['app_games_array']) ? implode('.',$_POST['app_games_array']) : "";
	if (!preg_match("/^[0-9\.]+$/i", $app_games)) { $app_games=""; }
	$app_reason = stripinput(trim($_POST['app_reason']));
	if ($app_reason == "") { $error.=$errorcount++.". ".$locale['zwar_0452']."<br/>"; }
	$app_contact1 = stripinput(trim($_POST['app_contact1']));
	if (!preg_match("/^[-0-9A-Z_\.]{1,50}@([-0-9A-Z_\.]+\.){1,50}([0-9A-Z]){2,4}$/i", $app_contact1) || $app_contact1 == "") {
		$error.=$errorcount++.". ".$locale['zwar_0453']."<br/>";
	} 
	$app_contact2 = stripinput(trim($_POST['app_contact2']));
	if ($zwar_settings_array['zwar_joinus_public'] && !iMEMBER) {
		$nameerror=false;  $cont1error=false;
		$result = dbquery("SELECT user_name, user_email FROM ".DB_USERS);
		while ($page_users = dbarray($result)) {
			if ($app_contact1 != "" && $page_users['user_email'] == $app_contact1) { $error.=$errorcount++.". ".sprintf($locale['zwar_0468'], $app_contact1)."<br/>"; $nameerror=true;}
			if ($app_nickname != "" && $page_users['user_name'] == $app_nickname) { $error.=$errorcount++.". ".sprintf($locale['zwar_0469'], $app_nickname)."<br/>"; $cont1error=true; break; }
		}
		$result = dbquery("SELECT app_nickname, app_contact1 FROM ".DB_ZWAR_JOINUS);
		while ($new_apps = dbarray($result)) {
			if ($app_contact1 != "" && !$cont1error && $new_apps['app_contact1'] == $app_contact1) { $error.=$errorcount++.". ".sprintf($locale['zwar_0468'], $app_contact1)."<br/>"; }
			if ($app_nickname != "" && !$nameerror && $new_apps['app_nickname'] == $app_nickname) { $error.=$errorcount++.". ".sprintf($locale['zwar_0469'], $app_nickname)."<br/>"; break; }
		}
	}
	if (!check_captcha($_POST['captcha_encode'], $_POST['captcha_code'])) {
	  $error.=$errorcount++.". ".$locale['zwar_0454']."<br/>";
 	}
	if ($error=="") {
		if (!flood_control("app_datestamp", DB_ZWAR_JOINUS, "app_user_id='$app_user_id' AND app_userip='".USER_IP."'")) {
			$result = dbquery("INSERT INTO ".DB_ZWAR_JOINUS." (app_user_id, app_userip, app_nickname, app_name, app_games, app_reason, app_contact1, app_contact2, app_datestamp) VALUES ('$app_user_id', '".USER_IP."', '$app_nickname', '$app_name', '$app_games', '$app_reason', '$app_contact1', '$app_contact2', '".time()."')");
			require_once INCLUDES."sendmail_include.php";
			$result = dbquery("SELECT u.user_id, u.user_name, u.user_email, mo.pm_email_notify FROM ".DB_USERS." AS u LEFT JOIN ".DB_MESSAGES_OPTIONS." AS mo USING(user_id) WHERE user_rights REGEXP('^\\\.{ZWAR}$|\\\.{ZWAR}\\\.|\\\.{ZWAR}$')");
			while ($data = dbarray($result)) {
				$result2 = dbquery("INSERT INTO ".DB_MESSAGES." (message_to, message_from, message_subject, message_message, message_smileys, message_read, message_datestamp, message_folder) VALUES ('".$data['user_id']."','','".$locale['zwar_0455']."','".$locale['zwar_0456']."<br/>".$app_reason."','y','0','".time()."','0')");
				$send_email = isset($data['pm_email_notify']) ? $data['pm_email_notify'] : $msg_settings['pm_email_notify'];
				if ($send_email == "1") sendemail($data['user_name'],$data['user_email'],$settings['siteusername'],$settings['siteemail'],$locale['625'],$data['user_name'].$locale['626']);
			}
			opentable($locale['zwar_0458']);
			render_zwar_message($locale['zwar_0457']);
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
	opentable($locale['zwar_0458']);
	echo "<div class='zwar-body'>";
	if (iMEMBER && $userdata['member_clanstatus'] == 1) {
		render_zwar_message($locale['zwar_0459']);
	} elseif (!iMEMBER && !$zwar_settings_array['zwar_joinus_public']) {
		render_zwar_message($locale['zwar_0460']);
	} else {
		if (iMEMBER) {
			$app_nickname = $userdata['user_name'];
			$app_name = $userdata['member_realname'];
			$app_games = $userdata['member_games'];
			$app_reason = "";
			$app_contact1 = $userdata['user_email'];
			$app_contact2 = $userdata['user_icq'];
			$disabled = " disabled";
			$readonly = " readonly";
		} else {
			$app_nickname = "";
			$app_name = "";
			$app_games = "";
			$app_reason = "";
			$app_contact1 = "";
			$app_contact2 = "";
			$disabled = "";
			$readonly = "";
		}
		
		$gamelist = "";
		$zwar_games = get_zwar_games();
		while(list($key, $zwar_game) = each($zwar_games)){
			$checked = (in_array($zwar_game['game_id'], explode(".",$app_games)) ? " checked" : "");
			$gamelist .= ($gamelist!="" ? ", ":"")."<label><input type='checkbox' name='app_games_array[]' value='".$zwar_game['game_id']."'".$checked."$disabled />".$zwar_game['game_name']."</label>\n";
		}
		
		zwar_FormOpen(FUSION_SELF."?page=join_us");
		zwar_FormCaption("<div style='float:right;'>".zwar_foloswitch()."</div><div style='float:left;'>".$locale['zwar_0461'].":</div>");
		zwar_FormLeft($locale['zwar_0462'].":"."&nbsp;<font style='color:#FF0000;'>*</font>", "<input type='text' name='app_nickname' value='$app_nickname' maxlength='30' class='textbox' style='width:90%;'$readonly />");
		zwar_FormRight($locale['zwar_0463'].":", "<input type='text' name='app_name' value='$app_name' maxlength='100' class='textbox' style='width:90%;'$readonly />");
		zwar_FormLeft($locale['zwar_0464'].":"."&nbsp;<font style='color:#FF0000;'>*</font>", "<input type='text' name='app_contact1' value='$app_contact1' maxlength='100' class='textbox' style='width:90%;'$readonly />");
		zwar_FormRight($locale['zwar_0465'].":", "<input type='text' name='app_contact2' value='$app_contact2' maxlength='100' class='textbox' style='width:90%;'$readonly />");
		zwar_FormBoth($locale['zwar_0466'].":", $gamelist);
		zwar_FormBoth(sprintf($locale['zwar_0467'], $zwar_settings_array['zwar_clantag'])."&nbsp;<font style='color:#FF0000;'>*</font>", "<textarea name='app_reason' style='width:95%;' cols='40' rows='6' class='textbox'>$app_reason</textarea>");
		zwar_Formclose();
	}
	echo "</div>";
	closetable();
}
?>
