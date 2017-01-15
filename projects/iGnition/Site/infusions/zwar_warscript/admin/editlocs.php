<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: editlocs.php
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
if (isset($_GET['loc_id']) && !isNum($_GET['loc_id'])) { redirect(FUSION_SELF.$aidlink."&pagefile=editlocs"); }
if (isset($_POST['loc_id']) && !isNum($_POST['loc_id'])) { redirect(FUSION_SELF.$aidlink."&pagefile=editlocs"); }
if (isset($_GET['loc_id']) || isset($_POST['loc_id'])) {
  $loc_id = (isset($_POST['loc_id']) ? $_POST['loc_id'] : $_GET['loc_id']);	
} else {
  unset($loc_id);
}

if (isset($_GET['status']) && !isset($message)) {
	if ($_GET['status'] == "su") {
		$message = "<b>".$locale['zwar_1802']."</b>";
	} elseif ($_GET['status'] == "sn") {
		$message = "<b>".$locale['zwar_1804']."</b>";
	} elseif ($_GET['status'] == "del") {
		$message = "<b>".$locale['zwar_1806']."</b>";
	} elseif ($_GET['status'] == "used") {
		$message = "<b>".$locale['zwar_1808']."</b>";
	}
	if ($message) {	echo "<div class='admin-message'>".$message."</div>\n"; }
}

if (isset($_POST['save'])) {
	$error="";
	$location_name=stripinput($_POST['location_name']);
	if ($location_name=="") {$error.=$locale['zwar_1809']."<br/>\n";
	}
	
	$location_game_id=(isset($_POST['location_game_id']) && isNum($_POST['location_game_id']) ? $_POST['location_game_id'] : 0);
	if (!$location_game_id) $error.=$locale['zwar_1811']."<br/>\n";

	$location_pic=stripinput($_POST['location_pic']);

	if ($error=="") {
		if (isset($loc_id)) {
			$result = dbquery("UPDATE ".DB_ZWAR_LOCS." SET location_name='$location_name', location_game_id='$location_game_id', location_pic='$location_pic' WHERE location_id='$loc_id'");
			redirect(FUSION_SELF.$aidlink."&pagefile=editlocs&status=su");
		} else {
			$result = dbquery("INSERT INTO ".DB_ZWAR_LOCS." (location_name, location_game_id, location_pic) VALUES ('$location_name', '$location_game_id', '$location_pic')");
			redirect(FUSION_SELF.$aidlink."&pagefile=editlocs&status=sn");
		}
	} else {
		opentable($locale['zwar_1812']);
		echo "<center><br/>".$error."<br/><br/><a href='javascript:history.back()'><< ".$locale['zwar_1813']."</a></center>";
		closetable();
	}
} else if (isset($_POST['delete'])) {
	$usecount = dbcount("(*)", DB_ZWAR_SCORES, "score_location_id='$loc_id'");
	if (!$usecount) {
		$result = dbquery("DELETE FROM ".DB_ZWAR_LOCS." WHERE location_id='$loc_id'");
		redirect(FUSION_SELF.$aidlink."&pagefile=editlocs&status=del");
	} else {
		redirect(FUSION_SELF.$aidlink."&pagefile=editlocs&loc_id=$loc_id&status=used");
	}	
} else if(isset($_POST['clear'])) {
	redirect(FUSION_SELF.$aidlink."&pagefile=editlocs");
} else {
	
	$editlist = ""; $sel = "";
	$result = dbquery("SELECT * FROM ".DB_ZWAR_LOCS." AS zl LEFT JOIN ".DB_ZWAR_GAMES." AS zg ON zl.location_game_id = zg.game_id ORDER BY location_name");
	if (dbrows($result)) {
		while ($data = dbarray($result)) {
			if (isset($loc_id)) $sel = ($loc_id == $data['location_id'] ? " selected" : "");
			$editlist .= "<option value='".$data['location_id']."'$sel>".$data['location_name']." (".$data['game_name'].") </option>\n";
		}
	}
	opentable($locale['zwar_1814']);
	echo "<form name='selectform' method='post' action='".FUSION_SELF.$aidlink."&amp;pagefile=editlocs'>
	<center>
	<select name='loc_id' class='textbox' style='width:250px'>
	$editlist</select>
	<input type='submit' name='edit' value='".$locale['zwar_1815']."' class='button'>
	<input type='submit' name='delete' value='".$locale['zwar_1816']."' onclick='return Deleteconfirm();' class='button'>
	</center>
	</form>\n";
	closetable();
		
	if (isset($loc_id)) {
		$result = dbquery("SELECT * FROM ".DB_ZWAR_LOCS." WHERE location_id='$loc_id'");
		if (dbrows($result)) {
			$data = dbarray($result);
			$location_game_id=(isset($_POST['location_game_id']) && isnum($_POST['location_game_id']) ? $_POST['location_game_id'] : $data['location_game_id']);
			$location_name=(isset($_POST['location_name']) ? stripinput($_POST['location_name']) : $data['location_name']);
			$location_pic=(isset($_POST['location_pic']) ? stripinput($_POST['location_pic']) : $data['location_pic']);
			$action = FUSION_SELF.$aidlink."&amp;pagefile=editlocs&amp;loc_id=$loc_id";
			$cancelbtn=" | <input type='submit' name='clear' class='button' value='".$locale['zwar_1820']."'>";
			opentable('Map bearbeiten');
		}
	} else {
		$location_game_id=(isset($_POST['location_game_id']) && isnum($_POST['location_game_id']) ? $_POST['location_game_id'] : "");
		$location_name=(isset($_POST['location_name']) ? stripinput($_POST['location_name']) : "");
		$location_pic=(isset($_POST['location_pic']) ? stripinput($_POST['location_pic']) : "");
		$action = FUSION_SELF.$aidlink."&amp;pagefile=editlocs";
		$cancelbtn="";
		opentable($locale['zwar_1803']);
	}

	$gamelist = ""; $sel = "";
	$result = dbquery("SELECT * FROM ".DB_ZWAR_GAMES."");
	if (dbrows($result)) {
		while ($data = dbarray($result)) {
			if ($location_game_id != "") $sel = ($location_game_id == $data['game_id'] ? " selected" : "");
			$gamelist .= "<option value='".$data['game_id']."'$sel>".$data['game_name']."</option>\n";
	}}
	$pic_files = makefilelist(INFUSIONS."zwar_warscript/images/locs/", ".|..|index.php", true);

	
	echo "<form name='inputform' method='post' action='$action'>
	<table cellpadding='0' cellspacing='1' class='center'>
	<tr>
	<td width='100' class='tbl'>".$locale['zwar_1817']."<font style='color:#ff0000;'> *</font></td>
	<td width='80%' class='tbl'>
		<input type='text' name='location_name' value='$location_name' maxlength='100' class='textbox' style='width:250px;'>
	</td>
	</tr><tr>
	<td width='100' class='tbl'>".$locale['zwar_1818']."<font style='color:#ff0000;'> *</font></td>
	<td width='80%' class='tbl'><b><select name='location_game_id' class='textbox' style='width:250px;'>
	<option value=''>---</option>
	$gamelist</select></b>
	</td>
	</tr><tr>
	<td width='100' class='tbl' valign='top'>".$locale['zwar_1819']."</td>
	<td width='80%' class='tbl'><b><select name='location_pic' class='textbox' onchange='submit()' style='width:250px;'>
		<option value=''>---</option>".makefileopts($pic_files, $location_pic)."</select>";
	if ($location_pic!="") {
		echo "<br/><br/>\n<img src='".INFUSIONS."zwar_warscript/images/locs/".$location_pic."' alt='".$location_name."'><br/><br/>\n";
	}
	echo "</td></tr><tr><td align='center' colspan='2' class='tbl1'>
	<input type='submit' name='save' class='button' value='".$locale['zwar_1821']."'>".$cancelbtn."
	</td></tr>";
	if (isset($loc_id)) {	
		$usecount = dbcount("(*)", DB_ZWAR_SCORES, "score_location_id='$loc_id'");
		if (!$usecount) {
			echo "<td class='tbl2' colspan='2'>".$locale['zwar_1822']."</td></tr>";
		} else {
			echo "<td class='tbl2' colspan='2'>$usecount ".$locale['zwar_1823']."</td></tr>";
		}
	}
	echo "</table></form><br/>";
	
	closetable();
	echo "<script type='text/javascript'>
	function Deleteconfirm() {
		return confirm('".$locale['zwar_1824']."');
	}
	</script>\n";
}
?>