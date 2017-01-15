<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: joinus.php
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
if (isset($_GET['app_id']) && !isnum($_GET['app_id'])) { redirect(BASEDIR."index.php"); }

function zwar_pwgenerator($number) {
	$zeichen = "qwertzupasdfghkyxcvbnm";
	$zeichen .= "123456789";
	$zeichen .= "WERTZUPLKJHGFDSAYXCVBNM";
	$password = "";
	srand((double)microtime()*1000000); 
	for($i = 0; $i < $number; $i++)	{
	  $password .= substr($zeichen,(rand()%(strlen ($zeichen))), 1);
	}
	return $password;
}

if (isset($_GET['status']) && !isset($message)) {
	if ($_GET['status'] == "del") {
		$message = "<b>".$locale['zwar_2153']."</b>";
	}
	if ($message) {	echo "<div class='admin-message'>".$message."</div>\n"; }
}

if ((isset($_POST['go_zwar_option']) && $_POST['zwar_options']=="delete") || (isset($_GET['action']) && $_GET['action']=="delete")) {
	$check_count = 0; $app_ids = "";
	if (isset($_POST['go_zwar_option']) && isset($_POST['act_check_mark'])) {
		if (is_array($_POST['act_check_mark']) && count($_POST['act_check_mark']) > 1) {
			foreach ($_POST['act_check_mark'] as $thisnum) {
				if (isnum($thisnum)) { 
					$app_ids .= ($app_ids ? "," : "").$thisnum; 
					$check_count++;
				}
			}
		} else {
			if (isnum($_POST['act_check_mark'][0])) { 
				$app_ids = $_POST['act_check_mark'][0];
				$check_count = 1;
			}
		}
	} elseif (isset($_GET['action']) && isset($_GET['app_id'])) {
		$app_ids = $_GET['app_id'];
		$check_count = 1;
	}
	if ($check_count > 0) {
		$result = dbquery("SELECT app_id FROM ".DB_ZWAR_JOINUS." WHERE app_id IN($app_ids)");
		while ($data = dbarray($result)) {
			$result2 = dbquery("DELETE FROM ".DB_ZWAR_JOINUS." WHERE app_id='".$data['app_id']."'");
		}
		redirect(FUSION_SELF.$aidlink."&amp;pagefile=joinus&status=del");
	} else {
		redirect(FUSION_SELF.$aidlink."&amp;pagefile=joinus");
	}
} elseif ((isset($_POST['go_zwar_option']) && $_POST['zwar_options']=="add") || (isset($_GET['action']) && $_GET['action']=="add")) {
	$check_count = 0; $app_ids = "";
	if (isset($_POST['go_zwar_option']) && isset($_POST['act_check_mark'])) {
		if (is_array($_POST['act_check_mark']) && count($_POST['act_check_mark']) > 1) {
			foreach ($_POST['act_check_mark'] as $thisnum) {
				if (isnum($thisnum)) { 
					$app_ids .= ($app_ids ? "," : "").$thisnum; 
					$check_count++;
				}
			}
		} else {
			if (isnum($_POST['act_check_mark'][0])) { 
				$app_ids = $_POST['act_check_mark'][0];
				$check_count = 1;
			}
		}
	} elseif (isset($_GET['action']) && isset($_GET['app_id'])) {
		$app_ids = $_GET['app_id'];
		$check_count = 1;
	}
	if ($check_count > 0) {
		$result = dbquery("SELECT * FROM ".DB_ZWAR_JOINUS." WHERE app_id IN($app_ids)");
		while ($data = dbarray($result)) {
			if($data['app_user_id']) {
				$result2 = dbquery("UPDATE ".DB_USERS." SET member_clanstatus='1' WHERE user_id='".$data['app_user_id']."'");
				$result2 = dbquery("DELETE FROM ".DB_ZWAR_JOINUS." WHERE app_id='".$data['app_id']."'");
			} else {
				require_once INCLUDES."sendmail_include.php";
				$user_status = $settings['admin_activation'] == "1" ? "2" : "0";
				$password = zwar_pwgenerator(8);
				if (sendemail($data['app_nickname'],$data['app_contact1'],$settings['siteusername'],$settings['siteemail'],$locale['zwar_2158'],$data['user_name'].sprintf($locale['zwar_2159'], $data['app_nickname'], $password))) {
					$result2 = dbquery("INSERT INTO ".DB_USERS." (user_name, user_password, user_admin_password, user_email, user_hide_email, user_offset, user_avatar, user_posts, user_threads, user_joined, user_lastvisit, user_ip, user_rights, user_groups, user_level, user_status, member_clanstatus, member_games, member_status, member_realname) VALUES('".$data['app_nickname']."', '".md5(md5($password))."', '', '".$data['app_contact1']."', '1', '0', '', '0', '0', '".time()."', '0', '".$data['app_userip']."', '', '', '101', '$user_status', '1', '".$data['app_games']."', '1', '".$data['app_name']."')");
					$result2 = dbquery("DELETE FROM ".DB_ZWAR_JOINUS." WHERE app_id='".$data['app_id']."'");
				} else {
					opentable($locale['zwar_0053']);
					echo "<div style='text-align:center'><br/>\n".$locale['zwar_0066']."<br/><br/>\n</div>\n";
					closetable();
				}
			}
		}
		redirect(FUSION_SELF.$aidlink."&amp;pagefile=members");
	} else {
		redirect(FUSION_SELF.$aidlink."&amp;pagefile=joinus");
	}
} else {
	opentable($locale['zwar_2154']);
	$result = dbquery("SELECT * FROM ".DB_ZWAR_JOINUS." ORDER BY app_datestamp");
	if (dbrows($result)) {
		$i = 0;
		echo "<form name='app_selectform' method='post' action='".FUSION_SELF.$aidlink."&amp;pagefile=joinus'>
		<table cellpadding='0' cellspacing='0' width='600' class='tbl-border center'>";
		while ($data = dbarray($result)) {
			$cell_color = ($i % 2 == 0 ? "tbl1" : "tbl2"); $i++;
			$app_datestamp = date("d.m.'y - H:i",$data['app_datestamp']);
			$app_registered = $data['app_user_id'] ? $locale['zwar_0049'] : $locale['zwar_0050'];
			echo "<tr><td class='tbl2'>
			<input type='checkbox' name='act_check_mark[]' value='".$data['app_id']."' />
			<strong>".$data['app_nickname']."</strong>
			</td>
			<td class='tbl2' align='right' style='white-space:nowrap;'>
			<a href='".FUSION_SELF.$aidlink."&amp;pagefile=joinus&amp;action=add&amp;app_id=".$data['app_id']."'>".$locale['zwar_2155']."</a>
			&nbsp;|&nbsp;
			<a href='".FUSION_SELF.$aidlink."&amp;pagefile=joinus&amp;action=delete&amp;app_id=".$data['app_id']."' onclick='return Deleteconfirm();'>".$locale['zwar_0051']."</a>
			</td>
			</tr><tr>
			<td class='$cell_color'>".$locale['zwar_0011'].":</td>
			<td width='400' class='$cell_color' style='white-space:nowrap;'>".$app_datestamp."</td>
			</tr>
			<tr>
			<td class='$cell_color'>".$locale['zwar_2156'].":</td>
			<td width='400' class='$cell_color' style='white-space:nowrap;'>".$app_registered."</td>
			</tr><tr>
			<td class='$cell_color'>".$locale['zwar_2157'].":</td>
			<td width='400' class='$cell_color' style='white-space:nowrap;'>".nl2br($data['app_reason'])."</td>
			</tr>";
		}
		echo "<tr><td class='tbl2' colspan='2'><div style='float:left;'>
		<a href='#' onclick=\"javascript:setChecked('app_selectform','act_check_mark[]',1);return false;\">".$locale['zwar_0064']."</a> | 
		<a href='#' onclick=\"javascript:setChecked('app_selectform','act_check_mark[]',0);return false;\">".$locale['zwar_0065']."</a>
		</div><div style='float:right;'>
		<select name='zwar_options' class='textbox'>
		<option value='add'>".$locale['zwar_2155']."</option>
		<option value='delete'>".$locale['zwar_0051']."</option>
		</select>
		<input type='submit' name='go_zwar_option' value='".$locale['zwar_0062']."' class='button' onclick='return askifdel();'>
		</div></td></tr>
		</table></form>";
	} else {
		echo "<br/><br/><center><b>".$locale['zwar_2151']."</b></center><br/><br/>";
	}
	closetable();

	echo "<script type='text/javascript'>
	function Deleteconfirm() {"."\n"."return confirm('".$locale['zwar_2152']."');"."\n"."}"."\n
	function setChecked(frmName,chkName,val) {"."\n
	dml=document.forms[frmName];"."\n"."len=dml.elements.length;"."\n"."for(i=0;i < len;i++) {"."\n
	if(dml.elements[i].name == chkName) {"."\n"."dml.elements[i].checked = val;"."\n
	}\n}\n}\n
	function askifdel() {"."\n"."if (document.app_selectform.zwar_options.value=='delete') {"."\n
	return confirm('".$locale['zwar_2152']."');"."\n"."} else {"."\n"."return true;"."\n
	}\n}\n</script>\n";
}
?>