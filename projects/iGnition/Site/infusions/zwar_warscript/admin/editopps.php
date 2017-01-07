<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: editopps.php
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
if (isset($_GET['opp_id']) && !isNum($_GET['opp_id'])) { redirect(FUSION_SELF.$aidlink."&pagefile=editmatchtypes"); }
if (isset($_POST['opp_id']) && !isNum($_POST['opp_id'])) { redirect(FUSION_SELF.$aidlink."&pagefile=editmatchtypes"); }
if (isset($_GET['opp_id']) || isset($_POST['opp_id'])) {
  $opp_id = (isset($_POST['opp_id']) ? $_POST['opp_id'] : $_GET['opp_id']);	
} else {
  unset($opp_id);
}

if (isset($_GET['status']) && !isset($message)) {
	if ($_GET['status'] == "su") {
		$message = "<b>".$locale['zwar_1602']."</b>";
	} elseif ($_GET['status'] == "sn") {
		$message = "<b>".$locale['zwar_1604']."</b>";
	} elseif ($_GET['status'] == "del") {
		$message = "<b>".$locale['zwar_1606']."</b>";
	} elseif ($_GET['status'] == "used") {
		$message = "<b>".$locale['zwar_1608']."</b>";
	}
	if ($message) {	echo "<div class='admin-message'>".$message."</div>\n"; }
}

if (isset($_POST['save'])) {
	$error="";
	$opp_name=stripinput($_POST['opp_name']);
	if ($opp_name=="") { $error.=$locale['zwar_1609']."<br/>\n";
	}
	$opp_name_short=stripinput($_POST['opp_name_short']);
	if ($opp_name_short=="") { $error.=$locale['zwar_1610']."<br/>\n";
	}
	$opp_hp=stripinput($_POST['opp_hp']);
	if (substr($opp_hp,0,7) != "http://" AND substr($opp_hp,0,6) != "ftp://")	{
		$opp_hp = "http://" . $opp_hp;
	}
	$opp_contact1=stripinput($_POST['opp_contact1']);
	$opp_contact2=(isset($_POST['opp_contact2_type']) && $_POST['opp_contact2_type'] != "" ? stripinput($_POST['opp_contact2_type']).": " : "").stripinput($_POST['opp_contact2']);
	$opp_contact3=(isset($_POST['opp_contact3_type']) && $_POST['opp_contact3_type'] != "" ? stripinput($_POST['opp_contact3_type']).": " : "").stripinput($_POST['opp_contact3']);
	$opp_contact4=stripinput($_POST['opp_contact4']);
	$opp_country=stripinput($_POST['opp_country']);

	if ($error=="") {
		if (isset($opp_id)) {
			$result = dbquery("UPDATE ".DB_ZWAR_OPPONENTS." SET opp_name='$opp_name', opp_name_short='$opp_name_short', opp_hp='$opp_hp', opp_contact1='$opp_contact1', opp_contact2='$opp_contact2', opp_contact3='$opp_contact3', opp_contact4='$opp_contact4', opp_country='$opp_country' WHERE opp_id='$opp_id'");
			redirect(FUSION_SELF.$aidlink."&pagefile=editopps&status=su");
		} else {
			$result = dbquery("INSERT INTO ".DB_ZWAR_OPPONENTS." (opp_name, opp_name_short, opp_hp, opp_contact1, opp_contact2, opp_contact3, opp_contact4, opp_country) VALUES ('$opp_name', '$opp_name_short' , '$opp_hp', '$opp_contact1', '$opp_contact2', '$opp_contact3', '$opp_contact4', '$opp_country')");
			redirect(FUSION_SELF.$aidlink."&pagefile=editopps&status=sn");
		}
	} else {
		opentable($locale['zwar_1611']);
		echo "<center><br/>".$error."<br/><br/><a href='javascript:history.back()'><< ".$locale['zwar_1612']."</a></center>";
		closetable();
	}
} else if (isset($_POST['delete'])) {
	$usecount = dbcount("(*)", "zwar_wars", "war_opp_id='$opp_id'");
	if (!$usecount) {
	$result = dbquery("DELETE FROM ".DB_ZWAR_OPPONENTS." WHERE opp_id='$opp_id'");
	redirect(FUSION_SELF.$aidlink."&pagefile=editopps&status=del");
	} else {
		redirect(FUSION_SELF.$aidlink."&pagefile=editopps&opp_id=$opp_id&status=used");
	}	
} else if(isset($_POST['clear'])) {
	redirect(FUSION_SELF.$aidlink."&pagefile=editopps");
} else {
	$editlist = ""; $sel = "";
	$result = dbquery("SELECT * FROM ".DB_ZWAR_OPPONENTS." ORDER BY opp_name");
	if (dbrows($result)) {
		while ($data = dbarray($result)) {
			if (isset($opp_id)) $sel = ($opp_id == $data['opp_id'] ? " selected" : "");
			$editlist .= "<option value='".$data['opp_id']."'$sel>".$data['opp_name']."</option>\n";
		}
	}
	opentable($locale['zwar_1613']);
	echo "<form name='selectform' method='post' action='".FUSION_SELF.$aidlink."&amp;pagefile=editopps'>
	<center>
	<select name='opp_id' class='textbox' style='width:250px'>
	$editlist</select>
	<input type='submit' name='edit' value='".$locale['zwar_1614']."' class='button'>
	<input type='submit' name='delete' value='".$locale['zwar_1615']."' onclick='return Deleteconfirm();' class='button'>
	</center>
	</form>\n";
	closetable();
		
	if (isset($opp_id)) {
		$result = dbquery("SELECT * FROM ".DB_ZWAR_OPPONENTS." WHERE opp_id='$opp_id'");
		if (dbrows($result)) {
			$data = dbarray($result);
			$opp_name=(isset($_POST['opp_name']) ? stripinput($_POST['opp_name']) : $data['opp_name']);
			$opp_name_short=(isset($_POST['opp_name_short']) ? stripinput($_POST['opp_name_short']) : $data['opp_name_short']);
			$opp_hp=(isset($_POST['opp_hp']) ? stripinput($_POST['opp_hp']) : $data['opp_hp']);
			$opp_contact1=(isset($_POST['opp_contact1']) ? stripinput($_POST['opp_contact1']) : $data['opp_contact1']);
			$opp_contact2=(isset($_POST['opp_contact2']) ? stripinput($_POST['opp_contact2']) : $data['opp_contact2']);
			$opp_contact3=(isset($_POST['opp_contact3']) ? stripinput($_POST['opp_contact3']) : $data['opp_contact3']);
			$opp_contact4=(isset($_POST['opp_contact4']) ? stripinput($_POST['opp_contact4']) : $data['opp_contact4']);
			$opp_country=(isset($_POST['opp_country']) ? stripinput($_POST['opp_country']) : $data['opp_country']);
			$action = FUSION_SELF.$aidlink."&amp;pagefile=editopps&amp;opp_id=$opp_id";
			$cancelbtn = " | <input type='submit' name='clear' class='button' value='".$locale['zwar_1623']."'>";
			opentable($locale['zwar_1601']);
		}
	} else {
		$opp_name=(isset($_POST['opp_name']) ? stripinput($_POST['opp_name']) : "");
		$opp_name_short=(isset($_POST['opp_name_short']) ? stripinput($_POST['opp_name_short']) : "");
		$opp_hp=(isset($_POST['opp_hp']) ? stripinput($_POST['opp_hp']) : "");
		$opp_contact1=(isset($_POST['opp_contact1']) ? stripinput($_POST['opp_contact1']) : "");
		$opp_contact2=(isset($_POST['opp_contact2']) ? stripinput($_POST['opp_contact2']) : "");
		$opp_contact3=(isset($_POST['opp_contact3']) ? stripinput($_POST['opp_contact3']) : "");
		$opp_contact4=(isset($_POST['opp_contact4']) ? stripinput($_POST['opp_contact4']) : "");
		$opp_country=(isset($_POST['opp_country']) ? stripinput($_POST['opp_country']) : "");
		$action = FUSION_SELF.$aidlink."&amp;pagefile=editopps";
		$cancelbtn = "";
		opentable($locale['zwar_1603']);
	}
	require_once INFUSIONS."zwar_warscript/locale/ccodes.php";
	$opp_cflag_files = makefilelist(INFUSIONS."zwar_warscript/locale/flags/", ".|..|index.php|Unknown.gif", true);
	$opp_cflag_list = "";
	$sel="";
	for ($i = 0; $i < count($opp_cflag_files); $i++) {
		$ccode = preg_replace("/\.gif$/","",$opp_cflag_files[$i]);
		$cflag_sortarray[$i]['file'] = $opp_cflag_files[$i];
		$cflag_sortarray[$i]['name'] = isset($zwar_countrycodes_array[strtoupper($ccode)]) ? $zwar_countrycodes_array[strtoupper($ccode)] : $ccode;
	}
	usort($cflag_sortarray, 'sort_cflagarray');
	for ($i = 0; $i < count($cflag_sortarray); $i++) {
		$sel = ($opp_country == $cflag_sortarray[$i]['file'] ? " selected='selected'" : "");
		$opp_cflag_list .= "<option value='".$cflag_sortarray[$i]['file']."'$sel>".$cflag_sortarray[$i]['name']."</option>\n";
	}
	$mess_type_list = "";
	$mess_type_array = explode(",", $zwar_settings_array['zwar_messenger_types']);
	if (is_array($mess_type_array) && count($mess_type_array)) {
		foreach ($mess_type_array as $mess_type_string) {
			if ($mess_type_string != "") {
				$mess_type_list .= "<option value='".trim($mess_type_string)."'>".$mess_type_string."</option>";
			}
		}
	}
	$voice_type_list = "";
	$voice_type_array = explode(",", $zwar_settings_array['zwar_voice_types']);
	if (is_array($voice_type_array) && count($voice_type_array)) {
		foreach ($voice_type_array as $voice_type_string) {
			if ($voice_type_string != "") {
				$voice_type_list .= "<option value='".trim($voice_type_string)."'>".$voice_type_string."</option>";
			}
		}
	}
	echo "<form name='inputform' method='post' action='$action'>
	<table cellpadding='0' cellspacing='0' class='center'>
	<tr>
	<td width='120' class='tbl'>".$locale['zwar_1616']."<font style='color:#ff0000;'> *</font></td>
	<td width='75%' class='tbl'>
		<input type='text' name='opp_name' value='$opp_name' maxlength='100' class='textbox' style='width:250px;'>
	</td>
	</tr><tr>
	<td width='120' class='tbl'>".$locale['zwar_1617']."<font style='color:#ff0000;'> *</font></td>
	<td width='75%' class='tbl'>
		<input type='text' name='opp_name_short' value='$opp_name_short' maxlength='20' class='textbox' style='width:250px;'>
	</td>
	</tr><tr>
	<td width='120' class='tbl'>".$locale['zwar_0085']."<font style='color:#ff0000;'> *</font></td>
	<td width='75%' class='tbl'>
		<select name='opp_country' class='textbox' style='width:150px;'>
		<option value=''>---</option>
		".$opp_cflag_list."
		</select>
	</td>
	</tr><tr>
	<td width='120' class='tbl'>".$locale['zwar_1618']."</td>
	<td width='75%' class='tbl'>
		<input type='text' name='opp_hp' value='$opp_hp' maxlength='100' class='textbox' style='width:250px;'>
	</td>
	</tr><tr>
	<td width='120' class='tbl'>".$locale['zwar_1619']."</td>
	<td width='75%' class='tbl'>
		<input type='text' name='opp_contact1' value='$opp_contact1' maxlength='100' class='textbox' style='width:250px;'>
	</td>
	</tr><tr>
	<td width='120' class='tbl'>".$locale['zwar_1620']."</td>
	<td width='75%' class='tbl'>
		<input type='text' name='opp_contact2' value='$opp_contact2' maxlength='100' class='textbox' style='width:250px;'>
		".(!isset($opp_id) ? "<select name='opp_contact2_type' class='textbox' style='width:100px;'>".$mess_type_list."</select>" : "")."
	</td>
	</tr><tr>
	<td width='120' class='tbl'>".$locale['zwar_1621']."</td>
	<td width='75%' class='tbl'>
		<input type='text' name='opp_contact3' value='$opp_contact3' maxlength='100' class='textbox' style='width:250px;'>
		".(!isset($opp_id) ? "<select name='opp_contact3_type' class='textbox' style='width:100px;'>".$voice_type_list."</select>" : "")."
	</td>
	</tr><tr>
	<td width='120' class='tbl'>".$locale['zwar_1622']."</td>
	<td width='75%' class='tbl'>
		<input type='text' name='opp_contact4' value='$opp_contact4' maxlength='100' class='textbox' style='width:250px;'>
	</td>
	</tr><tr><td align='center' colspan='2' class='tbl'>
	<input type='submit' name='save' class='button' value='".$locale['zwar_1624']."'>".$cancelbtn."
	</td></tr>
	<tr>";
	if (isset($opp_id)) {	
		$uselist="";
		$useresult = dbquery("SELECT * FROM ".DB_ZWAR_WARS." WHERE war_opp_id='$opp_id'");
		if (dbrows($useresult)) {
			$usetitle=$locale['zwar_1627'];
			while ($usedata = dbarray($useresult)) {
				$war_date=strftime('%A, %d.%m.%Y', $usedata['war_date']);
				$uselist.="<a href='".FUSION_SELF.$aidlink."&pagefile=editwars&action=modify&warid=".$usedata['war_id']."'>".$locale['zwar_1625']."<b>$war_date</b></a><br/>";
			}
		} else {
			$usetitle=$locale['zwar_1626'];
		}
		echo "<td class='tbl2' colspan='2'>$usetitle</td></tr><tr>
		<td class='tbl' colspan='2' align='center'>$uselist</td>
	</tr>
	";
	}
	echo "</table></form><br/>";
	closetable();
	echo "<script type='text/javascript'>
	function Deleteconfirm() {
		return confirm('".$locale['zwar_1628']."');
	}
	</script>\n";
}
?>