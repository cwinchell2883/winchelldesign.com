<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: war_details.php
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
//methods for uploading attachments from forum-include.php adapted by zezoar for zWar
if (!defined("IN_FUSION")) { die("Access Denied"); }

if (!isset($_GET['warid']) || !isnum($_GET['warid'])) { redirect(FUSION_SELF."?page=wars"); }
if (isset($_GET['mdel']) && !isnum($_GET['mdel'])) { redirect(FUSION_SELF."?page=war_details&amp;warid=".$_GET['warid']); }
if (isset($_GET['medit']) && !isnum($_GET['medit'])) { redirect(FUSION_SELF."?page=war_details&amp;warid=".$_GET['warid']); }
$delpart = !isset($_GET['delpart']) || !isnum($_GET['delpart']) ? 0 : $_GET['delpart'];
$editpart = !isset($_GET['editpart']) || !isnum($_GET['editpart']) ? 0 : $_GET['editpart'];
if (!$_GET['warid']) { redirect(FUSION_SELF.'?page=wars'); }

$date_now=time();

if (isset($_POST['save'])) {
	if ($editpart && (!iADMIN || !checkrights('ZWAR'))) { redirect(FUSION_SELF."?page=wars"); }
	$part_user_id = $editpart ? $editpart : $userdata['user_id'];
	if (!isNum($_POST['part_status'])) { redirect(FUSION_SELF.'?page=war_details&amp;warid='.$_GET['warid']); }
	$part_status = $_POST['part_status'];
	$part_comment=stripinput($_POST['part_comment']);
	if (!dbcount("(*)", DB_ZWAR_PARTS, "part_user_id='$part_user_id' AND part_war_id='".$_GET['warid']."'") && !$editpart) {
		$result = dbquery("INSERT INTO ".DB_ZWAR_PARTS." (part_user_id, part_war_id, part_status, part_comment, part_date) VALUES ('$part_user_id', '".$_GET['warid']."', '$part_status', '$part_comment', '$date_now')");
	} else {
		$result = dbquery("UPDATE ".DB_ZWAR_PARTS." SET part_status='$part_status', part_comment='$part_comment', part_date='$date_now' WHERE part_user_id='$part_user_id' AND part_war_id='".$_GET['warid']."'");
	}
	redirect(FUSION_SELF."?page=war_details&amp;warid=".$_GET['warid']);
} else if (isset($_POST['edit_upload'])) {
	$upload_name = stripinput($_POST['upload_name']);
	if (isnum($_POST['upload_id']) && (checkrights("ZWAR") || (iMEMBER && $userdata['user_id'] == dbresult(dbquery("SELECT upload_user_id FROM ".DB_ZWAR_MATCH_UPLOADS." WHERE upload_id='".$_POST['upload_id']."'"),0)))) {
		$result=dbquery("UPDATE ".DB_ZWAR_MATCH_UPLOADS." SET upload_name='$upload_name' WHERE upload_id='".$_POST['upload_id']."'");
	}
	redirect(FUSION_SELF."?page=war_details&amp;warid=".$_GET['warid']);
} else if (isset($_POST['go_zmupload'])) {
	if (checkrights('ZWAR') || ($data['war_squad'] && in_array($data['war_squad'], zwar_getForLevel(0, "teams"))) || (!$data['war_squad'] && in_array($data['war_game_id'], zwar_getForLevel(0, "games")))) {
		$limit = get_zmuploadlimit($_GET['warid']);
		$statusmsg = "";
		if ($limit > 0) {
			require_once INCLUDES."flood_include.php";
			if (!flood_control("upload_datestamp", DB_ZWAR_MATCH_UPLOADS, "upload_user_id='".$userdata['user_id']."' AND upload_war_id='".$_GET['warid']."'")) {
				$imagetypes = array(".bmp", ".gif", ".iff",	".jpg", ".jpeg", ".png", ".psd", ".tiff", ".wbmp");
				$i = 0; $errorcount = 1;
				$zmupload_file = $_FILES['zmediafile'];
				while (isset($zmupload_file['name'][$i]) && $zmupload_file['name'][$i] != "" && !empty($zmupload_file['name'][$i]) && isset($zmupload_file['tmp_name'][$i]) && is_uploaded_file($zmupload_file['tmp_name'][$i]) && $limit>=$i) {
					$zmupload_filename = substr($zmupload_file['name'][$i], 0, strrpos($zmupload_file['name'][$i], "."));
					$zmupload_fileext = strtolower(strrchr($zmupload_file['name'][$i],"."));
					if (preg_match("/^[-0-9A-Z_\[\]]+$/i", $zmupload_filename)) {
						if ($zmupload_file['size'][$i] <= $zwar_settings_array['zwar_uploadmax']) {
							$zmupload_filetypes = explode(",", $zwar_settings_array['zwar_uploadtypes']);
							if (in_array($zmupload_fileext, $zmupload_filetypes)) {
								$zmupload_filename = zmupload_exists(strtolower($zmupload_file['name'][$i]));
								$zmupload_title=stripinput($_POST['zmname'][$i]);
								$error = false;
								move_uploaded_file($zmupload_file['tmp_name'][$i], INFUSIONS."zwar_warscript/uploads/".$zmupload_filename);
								chmod(INFUSIONS."zwar_warscript/uploads/".$zmupload_filename,0644);
								if ((in_array($zmupload_fileext, $imagetypes) && (!@getimagesize(INFUSIONS."zwar_warscript/uploads/".$zmupload_filename) || !@verify_image(INFUSIONS."zwar_warscript/uploads/".$zmupload_filename))) || $zmupload_title == "") {
									unlink(INFUSIONS."zwar_warscript/uploads/".$zmupload_filename);
									$error = true;
								}
								if (!$error) { $result = dbquery("INSERT INTO ".DB_ZWAR_MATCH_UPLOADS." (upload_war_id, upload_user_id, upload_name, upload_file, upload_ext, upload_datestamp) VALUES ('".$_GET['warid']."', '".$userdata['user_id']."', '".$zmupload_title."', '".$zmupload_filename."', '".$zmupload_fileext."', '".$date_now."')"); 
								}
								if ($zmupload_title == "") { $statusmsg .= "<b>".$errorcount.".</b> ".sprintf($locale['zwar_0237'],$zmupload_file['name'][$i])."<br/>"; $errorcount++; }
							} else {
								@unlink($zmupload_file['tmp_name'][$i]);
								$statusmsg .= "<b>".$errorcount.".</b> ".sprintf($locale['zwar_0238'],$zmupload_file['name'][$i])."<br/>";
							 	$errorcount++;
							}
						} else {
							@unlink($zmupload_file['tmp_name'][$i]);
							$statusmsg .= "<b>".$errorcount.".</b> ".sprintf($locale['zwar_0239'],$zmupload_file['name'][$i])."<br/>";
							$errorcount++;
						}
					} else {
						@unlink($zmupload_file['tmp_name'][$i]);
						$statusmsg .= "<b>".$errorcount.".</b> ".sprintf($locale['zwar_0240'],$zmupload_file['name'][$i])."<br/>";
						$errorcount++;
					}
					$i++;
				}
				if ($errorcount > 1) {
					opentable($locale['zwar_0236']);
					render_zwar_message($statusmsg."<br/><a href='".FUSION_SELF."?page=war_details&amp;warid=".$_GET['warid']."'>&lt;&lt;".$locale['zwar_0001']."</a>");
					closetable();
				} else {
					redirect(FUSION_SELF."?page=war_details&amp;warid=".$_GET['warid']);
				}
			} else {
				redirect(FUSION_SELF."?page=war_details&amp;warid=".$_GET['warid']);
			}
		} else {
			redirect(FUSION_SELF."?page=war_details&amp;warid=".$_GET['warid']);
		}
	}
} else if (isset($_POST['cancel'])) {
	redirect(FUSION_SELF."?page=war_details&amp;warid=".$_GET['warid']);
} else if (isset($_POST['go_zwar_option'])) {
	$teamid = isnum($_POST['zwar_option_squad']) ? $_POST['zwar_option_squad'] : 0;
	if (isset($_POST['zwar_options']) && $_POST['zwar_options']=='finish') {
		if (checkrights("ZWAR")) {$zwar_aidlink = $aidlink;} else {$zwar_aidlink = "?aid=0";}
		redirect(INFUSIONS."zwar_warscript/zwar_admin_panel.php".$zwar_aidlink."&pagefile=finishwar&action=finish&warid=".$_GET['warid']);
	} elseif (isset($_POST['zwar_options']) && $_POST['zwar_options']=='unfinish') {
		if (checkrights("ZWAR")) {$zwar_aidlink = $aidlink;} else {$zwar_aidlink = "?aid=0";}
		redirect(INFUSIONS."zwar_warscript/zwar_admin_panel.php".$zwar_aidlink."&pagefile=finishwar&action=unfinish&warid=".$_GET['warid']);
	} elseif (isset($_POST['zwar_options']) && $_POST['zwar_options']=='edit') {
		if (checkrights("ZWAR")) {$zwar_aidlink = $aidlink;} else {$zwar_aidlink = "?aid=0";}
		redirect(INFUSIONS."zwar_warscript/zwar_admin_panel.php".$zwar_aidlink."&pagefile=editwars&action=modify&warid=".$_GET['warid']);
	} elseif (isset($_POST['zwar_options']) && $_POST['zwar_options']=='delete') {
		if (checkrights("ZWAR")) {$zwar_aidlink = $aidlink;} else {$zwar_aidlink = "?aid=0";}
		redirect(INFUSIONS."zwar_warscript/zwar_admin_panel.php".$zwar_aidlink."&pagefile=editwars&action=delete&warid=".$_GET['warid']);
	} elseif (isset($_POST['zwar_options']) && $_POST['zwar_options']=='mupload') {
		if (checkrights('ZWAR') || ($data['war_squad'] && in_array($data['war_squad'], zwar_getForLevel(0, "teams"))) || (!$data['war_squad'] && in_array($data['war_game_id'], zwar_getForLevel(0, "games")))) {
			$result = dbquery("SELECT * FROM (((((((".DB_ZWAR_WARS." AS zw LEFT JOIN ".DB_ZWAR_OPPONENTS." AS zop ON zw.war_opp_id=zop.opp_id) LEFT JOIN ".DB_ZWAR_SERVERS." AS zse ON zw.war_server_id=zse.server_id) LEFT JOIN ".DB_ZWAR_GAMES." AS zga ON zw.war_game_id=zga.game_id) LEFT JOIN ".DB_ZWAR_GAMETYPES." AS zgt ON zw.war_gametype_id=zgt.gametype_id) LEFT JOIN ".DB_ZWAR_MATCHTYPES." AS zmt ON zw.war_matchtype_id=zmt.matchtype_id) LEFT JOIN ".DB_USERS." AS u ON zw.war_added_by=u.user_id) LEFT JOIN ".DB_ZWAR_SQUADS." AS cmg ON zw.war_squad=cmg.group_id) WHERE zw.war_id='".$_GET['warid']."'");
			if (dbrows($result)) {
				$data = dbarray($result);
				$war_date = showdate("%A, %d.%m.%Y", $data['war_date']);
				opentable($locale['zwar_0241']);
				$limit = get_zmuploadlimit($_GET['warid']);
				echo "<div class='tbl-border tbl2'><strong>".$war_date." | ".display_zwar_games($data['war_game_id'], true, false)." ".$locale['zwar_0228'] ." ".$data['opp_name']."</strong></div>";
				if ($limit > 0) {
					echo "<form name='zwar_uploadform' method='post' action='".FUSION_SELF."?page=war_details&amp;warid=".$_GET['warid']."' enctype='multipart/form-data'>
					<div id='zwar_muploads'><div id='zmfirst'>
					<table cellpadding='0' cellspacing='1' width='100%' class='tbl-border center'><tr>
					<td align='right' class='tbl2' width='1%' style='white-space:nowrap;'>
					".$locale['zwar_0229']."</td><td class='tbl1'><input type='text' name='zmname[]' class='textbox' /></td>
					<td align='right' class='tbl2'>
					".$locale['zwar_0230']."</td><td class='tbl1'><input type='file' name='zmediafile[]' class='textbox' style='width:200px;' /></td>
					</tr></table>
					</div></div>
					<div align='right'>
					<span class='small'>(".sprintf($locale['zwar_0231'], parsebytesize($zwar_settings_array['zwar_uploadmax']), str_replace(',', ' ', $zwar_settings_array['zwar_uploadtypes'])).")</span><br/>
					<a href='javascript:void(0);' onclick=\"javascript:zwar_add_muploads('".$limit."');\" id='zmuplink'>[".$locale['zwar_0232']."]</a>
					<span id='zmuplimit' style='display:none;'>[".$locale['zwar_0233']."]</span>
					<input type='submit' name='go_zmupload' value='".$locale['zwar_0234']."' class='button'/>
					<input type='submit' name='cancel' class='button' value='".$locale['zwar_0006']."'>
					</div>
					</form>";
				} else {
					render_zwar_message($locale['zwar_0235']."<br/><br/> <a href='".FUSION_SELF."?page=war_details&amp;warid=".$_GET['warid']."'>&lt;&lt;".$locale['zwar_0001']."</a>");
				}
				closetable();
			} else {
				redirect(FUSION_SELF."?page=wars");
			}
		}
	}
} else if ($delpart) {
	if (checkrights("ZWAR")) {
		$result = dbquery("DELETE FROM ".DB_ZWAR_PARTS." WHERE part_id='".$delpart."'");
		redirect(FUSION_SELF."?page=war_details&amp;warid=".$_GET['warid']);
	}
} else {
	if (isset($_GET['mdel'])) {
		$result = dbquery("SELECT upload_id, upload_file, upload_user_id FROM ".DB_ZWAR_MATCH_UPLOADS." WHERE upload_id='".$_GET['mdel']."'");
		if (dbrows($result)) {
			$data = dbarray($result);
			if (checkrights("ZWAR") || (iMEMBER && $userdata['user_id'] == $data['upload_user_id'])) {
				$result2 = dbquery("DELETE FROM ".DB_ZWAR_MATCH_UPLOADS." WHERE upload_id='".$data['upload_id']."'");
				if (file_exists(INFUSIONS."zwar_warscript/uploads/".$data['upload_file'])) {
					unlink(INFUSIONS."zwar_warscript/uploads/".$data['upload_file']);
				}
				echo "<div class='admin-message'>File: \"".$data['upload_file']."\" has been deleted</div>";
			}
		}
	} else if(isset($_GET['medit'])) {
		$result = dbquery("SELECT upload_id, upload_name, upload_file, upload_user_id FROM ".DB_ZWAR_MATCH_UPLOADS." WHERE upload_id='".$_GET['medit']."'");
		if (dbrows($result)) {
			$data = dbarray($result);
			if (checkrights("ZWAR") || (iMEMBER && $userdata['user_id'] == $data['upload_user_id'])) {
				opentable("Edit");
				echo "<form name='meditform' action='".FUSION_SELF."?page=war_details&amp;warid=".$_GET['warid']."' method='post'>
				<table cellpadding='0' cellspacing='1' width='100%' class='tbl-border center'><tr>
				<td align='left' class='tbl2' width='1%' style='white-space:nowrap;'><b>Title for</b> \"".$data['upload_file']."\"</td>
				<td align='left' class='tbl1'><input type='text' name='upload_name' maxlength='50' style='width:200px;' class='textbox' value='".$data['upload_name']."'/>
				<input type='hidden' name='upload_id' value='".$data['upload_id']."' /></td>
				<td align='right' class='tbl1'><input type='submit' name='edit_upload' class='button' value='".$locale['zwar_0234']."'/>
				<input type='submit' name='cancel' class='button' value='".$locale['zwar_0006']."'></td>
				</tr></table>
				</form>";
				closetable();
			}
		}
	} else if ((isset($_POST['apply']) && iMEMBER && checkgroup($zwar_settings_array['zwar_group_warmember'])) || $editpart && checkrights('ZWAR')) {
		echo "<div class='zwar-body'>";
		add_to_title("&nbsp;-&nbsp;".($editpart ? $locale['zwar_0003'] : $locale['zwar_0004']));
		$formaction = FUSION_SELF."?page=war_details&amp;warid=".$_GET['warid'].($editpart ? "&amp;editpart=".$editpart : "");
		$part_user_id = $editpart ? $editpart : $userdata['user_id'];
		$result = dbquery("SELECT * FROM ".DB_ZWAR_PARTS." AS zpa LEFT JOIN ".DB_USERS." AS u ON zpa.part_user_id=u.user_id WHERE part_user_id='$part_user_id' AND part_war_id='".$_GET['warid']."' LIMIT 1");
		if (dbrows($result)) {
			$data = dbarray($result);
			$part_comment = $data['part_comment'];
			$part_status = $data['part_status'];
		} else {
			$part_comment = "";
			$part_status = "";
		}
		$options_list = "<option value='1' ".($part_status==1 ? "selected" : "").">".$locale['zwar_0203']."</option>
		<option value='0' ".($part_status==0 ? "selected" : "").">".$locale['zwar_0204']."</option>
		<option value='2' ".($part_status==2 ? "selected" : "").">".$locale['zwar_0205']."</option>";
		$title = ($editpart ? $data['user_name'] : $userdata['user_name']);

		opentable($editpart ? $locale['zwar_0003'] : $locale['zwar_0004']);
		render_zwar_warappform($formaction, $title, $options_list, $part_comment);
		closetable();
	}
	$result = dbquery("SELECT * FROM (((((((".DB_ZWAR_WARS." AS zw LEFT JOIN ".DB_ZWAR_OPPONENTS." AS zop ON zw.war_opp_id=zop.opp_id) LEFT JOIN ".DB_ZWAR_SERVERS." AS zse ON zw.war_server_id=zse.server_id) LEFT JOIN ".DB_ZWAR_GAMES." AS zga ON zw.war_game_id=zga.game_id) LEFT JOIN ".DB_ZWAR_GAMETYPES." AS zgt ON zw.war_gametype_id=zgt.gametype_id) LEFT JOIN ".DB_ZWAR_MATCHTYPES." AS zmt ON zw.war_matchtype_id=zmt.matchtype_id) LEFT JOIN ".DB_USERS." AS u ON zw.war_added_by=u.user_id) LEFT JOIN ".DB_ZWAR_SQUADS." AS cmg ON zw.war_squad=cmg.group_id) WHERE zw.war_id='".$_GET['warid']."'");
	if (dbrows($result)) {
		$data = dbarray($result);
		$war_array['status_open'] = $date_now<$data['war_date'];
		$war_array['status_finished'] = $data['war_finished'];
		$war_array['status_title'] = ($war_array['status_open'] ? $locale['zwar_0202'] : ($war_array['status_finished'] ? $locale['zwar_0206'] : $locale['zwar_0207']));
		$war_array['gameicon'] = display_zwar_games($data['war_game_id'], true, false);
		$war_array['war_date'] = showdate("%A, %d.%m.%Y", $data['war_date']);
		$war_array['war_time'] = showdate("%R",$data['war_date']);
		$war_array['war_closetime'] = showdate("%d.%m.'%y %R",$data['war_date']-$zwar_settings_array['zwar_closetime']);
		$war_array['available_players'] = dbcount("(*)", DB_ZWAR_PARTS, "part_war_id='".$data['war_id']."' AND part_status='1'");
		$war_array['game_name'] = $data['game_name'];
		$war_array['gametype'] = $data['gametype_name'];
		$war_array['matchtype'] = $data['matchtype_name'];
		$war_array['team'] = $data['war_squad'] ? "<a href='".FUSION_SELF."?page=members&amp;teamid=".$data['war_squad']."'>".$data['group_name']."</a>" : sprintf($zwar_settings_array['zwar_clantag']." %s", $data['game_name_short'] ? $data['game_name_short'] : $data['game_name']);
		$war_array['team_logo'] = $data['group_logo'];
		$war_array['server_name'] = $data['server_name'];
		$war_array['server_ip'] = $data['server_ip'];
		$war_array['server_pass'] = checkgroup($zwar_settings_array['zwar_group_warmember']) ? ($data['war_password']!="" ? $data['war_password'] : "-----") : "&bull;&bull;&bull;&bull;&bull;&bull;";
		$war_array['teamsize'] = $data['war_teamsize'] ? $data['war_teamsize'] : "--";
		$war_array['info'] = (checkgroup($zwar_settings_array['zwar_group_warinfo']) ? ($data['war_info'] ? nl2br(parseubb(parsesmileys($data['war_info']))) : $locale['zwar_0209']) : $locale['zwar_0210']);
		$war_array['added_by'] = "<a href='".BASEDIR."profile.php?lookup=".$data['war_added_by']."'>".$data['user_name']."</a>";
		$war_array['opponent'] = $data['opp_id'] ? "<a href='".FUSION_SELF."?page=opp_info&amp;oppid=".$data['opp_id']."'>".$data['opp_name']."</a>" : $locale['zwar_0007'];
		$war_array['opponent_tag'] = $data['opp_id'] ? "<a href='".FUSION_SELF."?page=opp_info&amp;oppid=".$data['opp_id']."'>".$data['opp_name_short']."</a>" : "";
		$war_array['opp_country'] = $data['opp_country'];
		$war_array['war_comment'] = $data['war_comment'] ? nl2br(parseubb(parsesmileys($data['war_comment']))) : $locale['zwar_0225'];
		$war_array['own_players'] = $data['war_own_players'];
		$war_array['opp_players'] = $data['war_opp_players'];
		$war_array['ownscore']=0;
		$war_array['oppscore']=0;
		$war_array['maps'] = "";
		$war_array['loc_count'] = 0;
		$result2 = dbquery("SELECT * FROM ".DB_ZWAR_SCORES." AS zsc LEFT JOIN ".DB_ZWAR_LOCS." AS zlo ON zsc.score_location_id = zlo.location_id WHERE score_war_id='".$data['war_id']."'");
		if (dbrows($result2)) {
			while ($data2 = dbarray($result2)) {
				if ($mapsclass = $war_array['loc_count'] && $war_array['loc_count'] % 2 == 0) { $war_array['maps'] .= "</tr><tr>"; }
				$war_array['loc_count']++;
				$war_array['ownscore']=$war_array['ownscore']+$data2['score_ownscore'];
				$war_array['oppscore']=$war_array['oppscore']+$data2['score_oppscore'];
				$sc_color = $data2['score_ownscore'] > $data2['score_oppscore'] ? $zwar_settings_array['zwar_colorwon'] : ($data2['score_ownscore'] < $data2['score_oppscore'] ? $zwar_settings_array['zwar_colorlost'] : $zwar_settings_array['zwar_colordraw']);
				$war_array['maps'] .= "<td class='tbl2' width='1%' style='white-space:nowrap;' align='center'>
				<img src='".INFUSIONS."zwar_warscript/images/locs/".$data2['location_pic']."' title='".$data2['location_name']."' alt='".$data2['location_name']."' width='".$zwar_settings_array['zwar_mappics_width']."' height='".$zwar_settings_array['zwar_mappics_height']."'/><br/>
				".$data2['location_name']."
				".(!$war_array['status_open'] && $war_array['status_finished'] ? "<br/><center><font style='color:#".$sc_color.";'>".$data2['score_ownscore']."&nbsp;:&nbsp;".$data2['score_oppscore']."</font></center>" : "")."</td>";				
			}
			$war_array['result_title'] = $war_array['ownscore'] > $war_array['oppscore'] ? $locale['zwar_0008'] : ($war_array['ownscore'] < $war_array['oppscore'] ? $locale['zwar_0009'] : $locale['zwar_0010']);
			$war_array['result_color'] = $war_array['ownscore'] > $war_array['oppscore'] ? $zwar_settings_array['zwar_colorwon'] : ($war_array['ownscore'] < $war_array['oppscore'] ? $zwar_settings_array['zwar_colorlost'] : $zwar_settings_array['zwar_colordraw']);
		}
		$war_array['war_files'] = "<table cellpadding='0' cellspacing='0' width='100%' class='center'><tr>";
		if (checkgroup($zwar_settings_array['zwar_group_warinfo'])) {
			$result2 = dbquery("SELECT * FROM ".DB_ZWAR_MATCH_UPLOADS." WHERE upload_war_id='".$data['war_id']."'");
			if (dbrows($result2)) {
				$i = 0;
				while ($data2 = dbarray($result2)) {
					$imagetypes = array(".bmp", ".gif", ".iff",	".jpg", ".jpeg", ".png", ".psd", ".tiff", ".wbmp");
					$cellclass = $i % 2 == 0 ? "tbl1" : "tbl1";
					$war_array['war_files'] .= ($i != 0 ? "</tr><tr>" : "")."<td class='$cellclass' width='1%' style='white-space:nowrap;'>";
					$file_img = file_exists(INFUSIONS."zwar_warscript/images/filetypes/".(str_replace(".","",$data2['upload_ext'])).".png") ? str_replace(".","",$data2['upload_ext']) : "file";
					$war_array['war_files'] .= "<img src='".INFUSIONS."zwar_warscript/images/filetypes/".$file_img.".png' alt='".$file_img."' width='12' height='12'/></td>";
					if (file_exists(INFUSIONS."zwar_warscript/uploads/".$data2['upload_file'])) {
						$mupload_size = filesize(INFUSIONS."zwar_warscript/uploads/".$data2['upload_file']);
						$war_array['war_files'] .= "<td class='$cellclass' width='1%' style='white-space:nowrap;'>
						<a href='".INFUSIONS."zwar_warscript/uploads/".$data2['upload_file']."' target='_blank'";
						$pic_div = "";
						if (in_array($data2['upload_ext'], $imagetypes)) {
							$war_array['war_files'] .= " onmouseover=\"return overlay(this,'zwar_pic".$data2['upload_id']."', 'bottomright')\" onmouseout=\"return overlayclose('zwar_pic".$data2['upload_id']."')\"";
							$pic_div = "<div id='zwar_pic".$data2['upload_id']."' style='position:absolute; display:none; margin-top:10px; padding:2px;' class='$cellclass'>
							<div class='tbl2'><span class='small'><b>".$locale['zwar_0244']."</b></span></div>
							<div class='tbl1'><img src='".INFUSIONS."zwar_warscript/uploads/".$data2['upload_file']."' alt='".$data2['upload_name']."' width='150' height='150'/></div></div>";
						}
						$war_array['war_files'] .= ">".($data2['upload_name'] != "" ? $data2['upload_name'] : $data2['upload_file'])."</a>".$pic_div."</td>
						<td class='$cellclass' width='1%' style='white-space:nowrap;'><span class='small'>(".parsebytesize($mupload_size,0).")</span>";						
					} else {
						$war_array['war_files'] .= "<td class='$cellclass' width='1%' style='white-space:nowrap;'>
						".($data2['upload_name'] != "" ? $data2['upload_name'] : $data2['upload_file'])."</td>
						<td class='$cellclass' width='1%' style='white-space:nowrap;'><span class='small'>(".$locale['zwar_0245'].")</span>";
					}
					if (checkrights('ZWAR') || (iMEMBER && $userdata['user_id'] == $data2['upload_user_id'])) {
						$war_array['war_files'] .= "&nbsp;
						<a href='".FUSION_SELF."?page=war_details&amp;warid=".$data['war_id']."&amp;medit=".$data2['upload_id']."'>".zwar_images("edit", $locale['zwar_0003'], false, "12")."</a>
						<a href='".FUSION_SELF."?page=war_details&amp;warid=".$data['war_id']."&amp;mdel=".$data2['upload_id']."' onclick=\"return askifdelfile();\">".zwar_images("del", $locale['zwar_0067'], false, "12")."</a>";
					}
					$war_array['war_files'] .= "</td>";
					$i++;
				}
				$war_array['war_files'] .= "</tr></table>";
			} else {
				$war_array['war_files'] = "";
			}
		} else {
			$war_array['war_files'] .= "<td class='tbl1'>".$locale['zwar_0242']."</td></tr></table>";
		}
		if (iMEMBER &&  checkgroup($zwar_settings_array['zwar_group_warmember'])) {
			if ($war_array['status_open']) {
				if (($data['war_squad'] != 0 && in_array($data['war_squad'], zwar_getForLevel(0, "teams"))) || $data['war_squad'] == 0) {
					$part_user_id=$userdata['user_id'];
					$applied = dbcount("(part_id)", DB_ZWAR_PARTS, "part_user_id='$part_user_id' AND part_war_id='".$data['war_id']."'");
					$war_array['applylink'] = "<input type='submit' name='apply' class='button' value='".($applied ? $locale['zwar_0002'] : $locale['zwar_0004'])."' />";
				} else {
					$war_array['applylink'] = "";
				}
			} else {
				$war_array['applylink'] = "";
			}
		} else {
			$war_array['applylink'] = $locale['zwar_0212'];
		}
		opentable($locale['zwar_0213']);
		echo "<div class='zwar-body'>";
		add_to_title("&nbsp;-&nbsp;".$locale['zwar_0213']);
		echo "<form name='inputform' method='post' action='".FUSION_SELF."?page=war_details&amp;warid=".$data['war_id']."'>";
		render_zwar_details($war_array);
		if (iMEMBER && ($war_array['status_open'] || !$war_array['status_finished'])) {
			get_war_parts($_GET['warid']);
		}
		echo "</form>";
		render_zwar_break(10);
		$zwar_options = "";
		if (!$war_array['status_open'] && $war_array['status_finished'] && (checkrights('ZWAR') || ($data['war_squad'] && in_array($data['war_squad'], zwar_getForLevel(0, "teams"))) || (!$data['war_squad'] && in_array($data['war_game_id'], zwar_getForLevel(0, "games"))))) {
			$zwar_options .= "<option value='mupload'>".$locale['zwar_0236']."</option>";
		}
		if (checkrights('ZWAR') || ($data['war_squad'] && in_array($data['war_squad'], zwar_getForLevel(11, "teams"))) || (!$data['war_squad'] && in_array($data['war_game_id'], zwar_getForLevel(11, "games")))) {
			$zwar_options .= "<option value='edit'>".$locale['zwar_0220']."</option>";
			if (!$war_array['status_open']) {
				$zwar_options .= "<option value='finish'>".$locale['zwar_0221']."</option>";
				if ($war_array['status_finished']) {$zwar_options .= "<option value='unfinish'>".$locale['zwar_0226'] ."</option>";}
				
			}
			$zwar_options .= "<option value='delete'>".$locale['zwar_0222']."</option>";
		}
		echo "<form name='zwar_optform' method='post' action='".FUSION_SELF."?page=war_details&amp;warid=".$data['war_id']."' onsubmit=\"return askifdelmatch();\">";
		render_zwar_matchoptions($zwar_options, $data['war_squad']);
		echo "</form></div>";
		closetable();
		if (checkgroup($zwar_settings_array['zwar_group_war_comments'])) {
			include INCLUDES."comments_include.php";
			showcomments("Z",DB_ZWAR_WARS,"war_id",$data['war_id'],FUSION_SELF."?page=war_details&amp;warid=".$data['war_id']);
		}
	} else {
		redirect(FUSION_SELF."?page=wars");
	}
	echo "<script type='text/javascript'>
	function askifdelmatch() {
	if (document.zwar_optform.zwar_options.value=='delete') {
	return confirm('".$locale['zwar_0224']."');
	} else {
	return true;
	}
	}\n
	function askifdelfile() {
		return confirm('".$locale['zwar_0243']."');
	}\n
	</script>";
}
?>