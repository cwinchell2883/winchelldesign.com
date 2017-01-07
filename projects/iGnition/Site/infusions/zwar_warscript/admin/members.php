<?php
/*-------------------------------------------------------+
| PHP-Fusion 6 Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: members.php
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
// original file was user_groups.php in fusion/administration by digitanium

if (!defined("IN_FUSION")) { die("Access Denied"); }
include LOCALE.LOCALESET."admin/user_groups.php";

if (isset($_GET['status']) && !isset($message)) {
	if ($_GET['status'] == "su") {
		$message = "<b>".$locale['zwar_1101']."</b>";
	} elseif ($_GET['status'] == "addsel") {
		$message = "<b>".$locale['zwar_1102']."</b>";
	} elseif ($_GET['status'] == "remsel") {
		$message = "<b>".$locale['zwar_1103']."</b>";
	}
	if ($message) {	echo "<div class='admin-message'>".$message."</div>\n"; }
}

if (isset($_POST['cancel'])) {
	redirect(FUSION_SELF.$aidlink."&amp;pagefile=members");
} elseif (isset($_POST['save_members'])) {
	if (isset($_POST['member_edit_array'])) {
		if (is_array($_POST['member_edit_array']) && count($_POST['member_edit_array'])) {
			foreach ($_POST['member_edit_array'] as $memberid => $memberarray ) {
				$member_status = isnum($memberarray[1]) ? $memberarray[1] : 1;
				$member_position = stripinput($memberarray[2]);
				$member_groups = "";
				if (isset($memberarray[3]) && is_array($memberarray[3]) && count($memberarray[3])) {
					foreach ($memberarray[3] as $arraynum) {
						if (isnum($arraynum)) { $member_groups .= ".".$arraynum; }
					}
				}
				$member_groupsshow = "";
				if (isset($memberarray[4]) && is_array($memberarray[4]) && count($memberarray[4])) {
					foreach ($memberarray[4] as $arraynum) {
						if (isnum($arraynum)) { $member_groupsshow .= ".".$arraynum; }
					}
				}
				$member_games = "";
				if (isset($memberarray[5]) && is_array($memberarray[5]) && count($memberarray[5])) {
					foreach ($memberarray[5] as $arraynum) {
						if (isnum($arraynum)) { $member_games .= ".".$arraynum; }
					}
				}
				$member_cflag = stripinput($memberarray[6]);;
				if (isnum($memberid)) { $result = dbquery("UPDATE ".DB_USERS." SET user_groups='$member_groups', member_status='$member_status', member_position='$member_position', member_groupsshow='$member_groupsshow', member_games='$member_games', member_cflag='$member_cflag' WHERE user_id='".$memberid."'"); }
			}
			redirect(FUSION_SELF.$aidlink."&amp;pagefile=members&amp;status=su");
		}
	}	
} elseif (isset($_POST['edit_sel'])) {
	$check_count = 0; $user_ids="";
	require_once INFUSIONS."zwar_warscript/locale/ccodes.php";
	$zwar_games=get_zwar_games();
	$member_cflag_files = makefilelist(INFUSIONS."zwar_warscript/locale/flags/", ".|..|index.php|Unknown.gif", true);
	
	if (isset($_POST['edit_check_mark'])) {
		if (is_array($_POST['edit_check_mark']) && count($_POST['edit_check_mark']) > 1) {
			foreach ($_POST['edit_check_mark'] as $thisnum) {
				if (isnum($thisnum)) { $user_ids .= ($user_ids ? "," : "").$thisnum; $check_count++; }
			}
		} else {
			if (isnum($_POST['edit_check_mark'][0])) { $user_ids = $_POST['edit_check_mark'][0]; $check_count = 1; }
		}
	}
	if ($check_count > 0) {
		$memberlistresult=dbquery("SELECT list_item FROM ".DB_ZWAR_MEMBER_LIST." WHERE list_item_type='1'");
		$member_list_groups = array();
		if (dbrows($memberlistresult)) {
			while ($memberlistdata=dbarray($memberlistresult)) {
				$member_list_groups[] = $memberlistdata['list_item'];
			}
		}
		opentable($locale['zwar_1104']);
		echo "<form name='searchform' method='post' action='".FUSION_SELF.$aidlink."&amp;pagefile=members'>
		<table cellpadding='0' cellspacing='0' width='600' class='center'>";
		$result = dbquery("SELECT user_id, user_name, user_groups, member_clanstatus, member_status, member_position, member_groupsshow, member_games, member_cflag FROM ".DB_USERS." WHERE user_id IN($user_ids) AND member_clanstatus='1'");
		if (!$groups_cache) { cache_groups(); }
		while ($data = dbarray($result)) {
			$usergroupboxes = "";
			if (is_array($groups_cache) && count($groups_cache)) {
				reset($groups_cache);
				$usergroupboxes.="<table cellpadding='0' cellspacing='0'><tr>
				<td class='tbl'>".$locale['zwar_1105']."</td>
				<td class='tbl'>".$locale['zwar_1106']."</td>
				</tr><tr>";
				while(list($key, $user_group) = each($groups_cache)){
					$checked=(preg_match("(^".$user_group['group_id']."$|^".$user_group['group_id']."\.|\.".$user_group['group_id']."\.|\.".$user_group['group_id']."$)", $data['user_groups']) ? "checked" : "");
					$usergroupboxes.="<td><input type='checkbox' name='member_edit_array[".$data['user_id']."][3][]' value='".$user_group['group_id']."' $checked />".$user_group['group_name']."</td>";
					if (in_array($user_group['group_id'],$member_list_groups)) {
						$checked=(preg_match("(^".$user_group['group_id']."$|^".$user_group['group_id']."\.|\.".$user_group['group_id']."\.|\.".$user_group['group_id']."$)", $data['member_groupsshow']) ? "checked" : "");
						$usergroupboxes.="<td><input type='checkbox' name='member_edit_array[".$data['user_id']."][4][]' value='".$user_group['group_id']."' $checked />".$user_group['group_name']."</td>";
					} else {
						$usergroupboxes.="<td></td>";
					}
					$usergroupboxes.="</tr><tr>";
				}
				$usergroupboxes.="</tr></table>";
			}
			$membergameboxes = "";
			$i=0;
			if (is_array($zwar_games) && count($zwar_games)) {
				foreach ($zwar_games as $game) {
					$i++;
					$checked=(preg_match("(^".$game['game_id']."$|^".$game['game_id']."\.|\.".$game['game_id']."\.|\.".$game['game_id']."$)", $data['member_games']) ? "checked" : "");
					$membergameboxes .= "<input type='checkbox' name='member_edit_array[".$data['user_id']."][5][]' value='".$game['game_id']."' $checked />".display_zwar_games($game['game_id'], true, false).($i!= 0 && $i % 3 == 0 ? "<br/>" : "");
				}
			}
			$member_cflag_list = "";
			$sel="";
			for ($i = 0; $i < count($member_cflag_files); $i++) {
				$ccode = preg_replace("/\.gif$/","",$member_cflag_files[$i]);
				$cflag_sortarray[$i]['file'] = $member_cflag_files[$i];
				$cflag_sortarray[$i]['name'] = isset($zwar_countrycodes_array[strtoupper($ccode)]) ? $zwar_countrycodes_array[strtoupper($ccode)] : $ccode;
			}
			usort($cflag_sortarray, 'sort_cflagarray');
			for ($i = 0; $i < count($cflag_sortarray); $i++) {
				$sel = ($data['member_cflag'] == $cflag_sortarray[$i]['file'] ? " selected='selected'" : "");
				$member_cflag_list .= "<option value='".$cflag_sortarray[$i]['file']."'$sel>".$cflag_sortarray[$i]['name']."</option>\n";
			}	
			echo "<tr>
			<td class='tbl2'><strong>".$data['user_name']."</strong></td>
			<td class='tbl2' colspan='2'></td>
			</tr><tr>
			<td class='tbl'></td>
			<td class='tbl' align'right'>".$locale['zwar_1107'].":</td>
			<td class='tbl' width='1%' style='white-space:nowrap'>
			<input type='radio' name='member_edit_array[".$data['user_id']."][1]' value='1'".($data['member_status'] == "1" ? " checked" : "")." />".$locale['zwar_1108']."
			<input type='radio' name='member_edit_array[".$data['user_id']."][1]' value='0'".($data['member_status'] == "0" ? " checked" : "")." />".$locale['zwar_1109']."
			</td>
			</tr><tr>
			<td class='tbl'></td>
			<td class='tbl' align'right'>".$locale['zwar_1110'].":</td>
			<td class='tbl' width='1%' style='white-space:nowrap'>
			<input type='text' name='member_edit_array[".$data['user_id']."][2]' value='".$data['member_position']."' />
			</td>
			</tr><tr>
			<td class='tbl'></td>
			<td class='tbl' align'right' valign='top'>".$locale['zwar_1111'].":</td>
			<td class='tbl' width='1%' style='white-space:nowrap'>".$usergroupboxes."</td>
			</tr><tr>
			<td class='tbl'></td>
			<td class='tbl' align'right' valign='top'>".$locale['zwar_0048']."</td>
			<td class='tbl' width='1%' style='white-space:nowrap'>".$membergameboxes."</td>
			</tr><tr>
			<td class='tbl'></td>
			<td class='tbl' align'right' valign='top'>".$locale['zwar_0085']."</td>
			<td class='tbl' width='1%' style='white-space:nowrap'>
			<select name='member_edit_array[".$data['user_id']."][6]' class='textbox' style='width:150px;'>".$member_cflag_list."</select>
			".display_zwar_flag($data['member_cflag'])."</td>
			</tr>";			
		}
		echo "<tr>
		<td class='tbl' colspan='3' align='center'>
		<input type='submit' name='save_members' value='".$locale['zwar_0005']."' class='button' />
		<input type='submit' name='cancel' value='".$locale['zwar_0006']."' class='button' />
		</td>
		</tr></table>";
		closetable();
	} else {
		redirect(FUSION_SELF.$aidlink."&amp;pagefile=members");
	}
} elseif (isset($_POST['add_sel'])) {
	$check_count = 0; $user_ids = "";
	if (isset($_POST['add_check_mark'])) {
		if (is_array($_POST['add_check_mark']) && count($_POST['add_check_mark']) > 1) {
			foreach ($_POST['add_check_mark'] as $thisnum) {
				if (isnum($thisnum)) {
					$user_ids .= ($user_ids ? "," : "").$thisnum;
					$check_count++;
				}
			}
		} else {
			if (isnum($_POST['add_check_mark'][0])) {
				$user_ids = $_POST['add_check_mark'][0];
				$check_count = 1;
			}
		}
		
	}
	if ($check_count > 0) {
		$result = dbquery("SELECT user_id, member_clanstatus FROM ".DB_USERS." WHERE user_id IN($user_ids)");
		while ($data = dbarray($result)) {
	 		if (!$data['member_clanstatus']) {
				$result2 = dbquery("UPDATE ".DB_USERS." SET member_clanstatus='1' WHERE user_id='".$data['user_id']."'");
			}
		}
		redirect(FUSION_SELF.$aidlink."&amp;pagefile=members&status=addsel");
	} else {
		redirect(FUSION_SELF.$aidlink."&amp;pagefile=members");
	}
} elseif (isset($_POST['remove_sel'])) {
	$check_count = 0; $user_ids = "";
	if (isset($_POST['edit_check_mark'])) {
		if (is_array($_POST['edit_check_mark']) && count($_POST['edit_check_mark']) > 1) {
			foreach ($_POST['edit_check_mark'] as $thisnum) {
				if (isnum($thisnum)) { $user_ids .= ($user_ids ? "," : "").$thisnum; $check_count++; }
			}
		} else {
			if (isnum($_POST['edit_check_mark'][0])) { $user_ids = $_POST['edit_check_mark'][0]; $check_count = 1; }
		}
	}
	if ($check_count > 0) {
		$result = dbquery("SELECT user_id, member_clanstatus FROM ".DB_USERS." WHERE user_id IN($user_ids) AND member_clanstatus='1'");
		while ($data = dbarray($result)) {
			if ($data['member_clanstatus']) {
				$result2 = dbquery("UPDATE ".DB_USERS." SET member_clanstatus='0' WHERE user_id='".$data['user_id']."'");
			}
		}
		redirect(FUSION_SELF.$aidlink."&amp;pagefile=members&status=remsel");
	} else {
		redirect(FUSION_SELF.$aidlink."&amp;pagefile=members");
	}
} else {
	opentable($locale['zwar_1112']);
	if (!isset($_POST['search_users'])) {
		echo "<form name='searchform' method='post' action='".FUSION_SELF.$aidlink."&amp;pagefile=members'>\n";
		echo "<table cellpadding='0' cellspacing='0' width='450' class='center'>\n";
		echo "<tr>\n<td align='center' class='tbl'>".$locale['zwar_1113']."<br/>".$locale['442']."<br/><br/>\n";
		echo "<input type='text' name='search_criteria' class='textbox' style='width:300px' />\n</td>\n";
		echo "</tr>\n<tr>\n<td align='center' class='tbl'>\n";
		echo "<input type='radio' name='search_type' value='user_name' checked='checked' />".$locale['444']."\n";
		echo "<input type='radio' name='search_type' value='user_id' />".$locale['443']."</td>\n";
		echo "</tr>\n<tr>\n<td align='center' class='tbl'><input type='submit' name='search_users' value='".$locale['445']."' class='button' /></td>\n";
		echo "</tr>\n</table>\n</form>\n";
	}
	if (isset($_POST['search_users']) && isset($_POST['search_criteria'])) {
		$search_items = explode(",", $_POST['search_criteria']);
		$search_ids = ""; $search_names = ""; $mysql_search = ""; 
		foreach ($search_items as $item) {
			if ($_POST['search_type'] == "user_id" && isnum($item)) {
				$search_ids .= ($search_ids != "" ? "," : "").$item;
			} elseif ($_POST['search_type'] == "user_name" && preg_match("/^[-0-9A-Z_@\s]+$/i", $item)) {
				$search_names .= ($search_names != "" ? " OR user_name LIKE '" : "'").$item."%'";
			}
		}
		if ($_POST['search_type'] == "user_id" && $search_ids) {
			$mysql_search .= "user_id IN($search_ids) ";
		} elseif ($_POST['search_type'] == "user_name" && $search_names) {
			$mysql_search .= "user_name LIKE $search_names ";
		}
		if ($search_ids || $search_names) {
			$result = dbquery("SELECT user_id,user_name,user_level, member_clanstatus FROM ".DB_USERS." WHERE ".$mysql_search." ORDER BY user_level DESC, user_name");
		}
		if (isset($result) && dbrows($result)) {
			echo "<form name='add_users_form' method='post' action='".FUSION_SELF.$aidlink."&amp;pagefile=members'>\n";
			echo "<table cellpadding='0' cellspacing='1' width='450' class='tbl-border center'>\n";
			$i = 0; $users = "";
			while ($data = dbarray($result)) {
				if (!$data['member_clanstatus']) {
					$row_color = ($i % 2 == 0 ? "tbl1" : "tbl2"); $i++;
					$users .= "<tr>
					<td class='$row_color'>
					<input type='checkbox' name='add_check_mark[]' value='".$data['user_id']."' /> ".$data['user_name']."
					</td>
					<td align='right' width='1%' class='$row_color' style='white-space:nowrap'>
					".getuserlevel($data['user_level'])."</td>
					</tr>";
				}
			}
			if ($i > 0) {
				echo "<tr>\n<td class='tbl2'><strong>".$locale['446']."</strong></td>\n";
				echo "<td align='right' width='1%' class='tbl2' style='white-space:nowrap'><strong>".$locale['447']."</strong></td>\n</tr>\n";
				echo $users."<tr>\n<td colspan='2' class='tbl1'>\n";
				echo "<a href='#' onclick=\"javascript:setChecked('add_users_form','add_check_mark[]',1);return false;\">".$locale['448']."</a> |\n";
				echo "<a href='#' onclick=\"javascript:setChecked('add_users_form','add_check_mark[]',0);return false;\">".$locale['449']."</a>\n";
				echo "</td>\n</tr>\n<tr>\n<td align='center' colspan='2' class='tbl'>\n";
				echo "<input type='submit' name='add_sel' value='".$locale['450']."' class='button' />\n";
				echo "<input type='submit' name='cancel' value='".$locale['zwar_0006']."' class='button' />";
				echo "</td>\n</tr>\n";
			} else {
				echo "<tr>\n<td align='center' colspan='2' class='tbl'>".$locale['451']."<br/><br/>\n";
				echo "<a href='".FUSION_SELF.$aidlink."&amp;pagefile=members'>".$locale['452']."</a>\n</td>\n</tr>\n";
			}
			echo "</table>\n</form>\n";
		} else {
			echo "<div style='text-align:center'><br/>\n".$locale['451']."<br/>\n";
			echo "<a href='".FUSION_SELF.$aidlink."&amp;pagefile=members'>".$locale['452']."</a><br/>\n</div>\n";
		}
	}
	closetable();
	opentable($locale['zwar_1114']);
	echo "<form name='edit_users_form' method='post' action='".FUSION_SELF.$aidlink."&amp;pagefile=members'>\n";
	echo "<table cellpadding='0' cellspacing='1' width='600' class='tbl-border center'>\n";
	$rows = dbcount("(user_id)", DB_USERS, "member_clanstatus='1'");
	if (!isset($_GET['rowstart']) || !isnum($_GET['rowstart'])) { $_GET['rowstart'] = 0; }
	if ($rows) {
		$i = 0;
		$member_list_groups = array();
		$memberlistresult=dbquery("SELECT list_item FROM ".DB_ZWAR_MEMBER_LIST." WHERE list_item_type='1'");
		if (dbrows($memberlistresult)) {
			while ($memberlistdata=dbarray($memberlistresult)) {
				$member_list_groups[] = $memberlistdata['list_item'];
			}
		}
		$result = dbquery("SELECT *,user_id,user_name,user_level, member_status, member_position, member_groupsshow FROM ".DB_USERS." WHERE member_clanstatus='1' ORDER BY user_level DESC, user_name LIMIT {$_GET['rowstart']},20");
		echo "<tr>\n<td class='tbl2'><strong>".$locale['446']."</strong></td>
		<td class='tbl2'><strong>".$locale['zwar_1107']."</strong></td>
		<td class='tbl2'><strong>".$locale['zwar_1115']."</strong></td>
		<td class='tbl2'><strong>".$locale['zwar_1116']."</strong></td>
		<td align='right' width='1%' class='tbl2' style='white-space:nowrap'><strong>".$locale['447']."</strong></td>
		</tr>";
		if (!$groups_cache) { cache_groups(); }
		while ($data = dbarray($result)) {
			$row_color = ($i % 2 == 0 ? "tbl1" : "tbl2"); $i++;
			$member_usergroups = "";
			if (is_array($groups_cache) && count($groups_cache)) {
				reset($groups_cache);
				while(list($key, $user_group) = each($groups_cache)){
					if (in_array($user_group['group_id'],$member_list_groups)) {
						$shown = in_array($user_group['group_id'],explode(".",$data['member_groupsshow'])) ? true : false;
						$member_usergroups .= ($member_usergroups ? ", " : "").($shown ? "<b>" : "<span class='small'>").$user_group['group_name'].($shown ? "</b>" : "</span>");
					}
				}
			}
			echo "<tr>
			<td class='$row_color' style='white-space:nowrap;'>
			<input type='checkbox' name='edit_check_mark[]' value='".$data['user_id']."' /> ".$data['user_name']."
			</td>
			<td class='$row_color'>
			".($data['member_status'] ? $locale['zwar_1108'] : $locale['zwar_1109'])."
			</td>
			<td class='$row_color'>
			".$data['member_position']."
			</td>
			<td class='$row_color'>
			".$member_usergroups."
			</td>
			<td align='right' width='1%' class='$row_color' style='white-space:nowrap'>
			".getuserlevel($data['user_level'])."
			</td>
			</tr>";
		}
		echo "<tr>\n<td colspan='5' class='tbl1'>\n";
		echo "<a href='#' onclick=\"javascript:setChecked('edit_users_form','edit_check_mark[]',1);return false;\">".$locale['448']."</a> |\n";
		echo "<a href='#' onclick=\"javascript:setChecked('edit_users_form','edit_check_mark[]',0);return false;\">".$locale['449']."</a>\n";
		echo "</td>\n</tr>\n<tr>\n<td align='center' colspan='5' class='tbl'>\n";
		echo "<input type='submit' name='edit_sel' value='".$locale['zwar_1104']."' class='button' />\n";
		echo "<input type='submit' name='remove_sel' value='".$locale['461']."' class='button' />\n";
		echo "</td>\n</tr>\n";
	} else {
		echo "<tr>\n<td align='center' class='tbl1'>".$locale['zwar_1117']."</td>\n</tr>\n";
	}
	echo "</table>\n</form>\n";
	if ($rows > 20) { echo "<div align='center' style='margin-top:5px;'>\n".makePageNav($_GET['rowstart'],20,$rows,3,FUSION_SELF.$aidlink."&amp;pagefile=members&amp;")."\n</div>\n"; }
	closetable();
	echo "<script type='text/javascript'>"."\n"."function setChecked(frmName,chkName,val) {"."\n";
	echo "dml=document.forms[frmName];"."\n"."len=dml.elements.length;"."\n"."for(i=0;i < len;i++) {"."\n";
	echo "if(dml.elements[i].name == chkName) {"."\n"."dml.elements[i].checked = val;"."\n";
	echo "}\n}\n}\n</script>\n";
}

?>