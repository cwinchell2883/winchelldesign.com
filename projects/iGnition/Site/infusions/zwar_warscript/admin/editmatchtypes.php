<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: editmatchtypes.php
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
if (isset($_GET['matchtype_id']) && !isNum($_GET['matchtype_id'])) { redirect(FUSION_SELF.$aidlink."&pagefile=editmatchtypes"); }
if (isset($_POST['matchtype_id']) && !isNum($_POST['matchtype_id'])) { redirect(FUSION_SELF.$aidlink."&pagefile=editmatchtypes"); }
if (isset($_GET['matchtype_id']) || isset($_POST['matchtype_id'])) {
  $matchtype_id = (isset($_POST['matchtype_id']) ? $_POST['matchtype_id'] : $_GET['matchtype_id']);	
} else {
  unset($matchtype_id);
}

if (isset($_GET['status']) && !isset($message)) {
	if ($_GET['status'] == "su") {
		$message = "<b>".$locale['zwar_1702']."</b>";
	} elseif ($_GET['status'] == "sn") {
		$message = "<b>".$locale['zwar_1704']."</b>";
	} elseif ($_GET['status'] == "del") {
		$message = "<b>".$locale['zwar_1706']."</b>";
	} elseif ($_GET['status'] == "used") {
		$message = "<b>".$locale['zwar_1708']."</b>";
	}
	if ($message) {	echo "<div class='admin-message'>".$message."</div>\n"; }
}

if (isset($_POST['save'])) {
	$error="";
	$matchtype_name=stripinput($_POST['matchtype_name']);
	if ($matchtype_name=="") {$error.=$locale['zwar_1709']."<br/>\n";
	}
	if ($error=="") {
		if (isset($matchtype_id)) {
			$result = dbquery("UPDATE ".DB_ZWAR_MATCHTYPES." SET matchtype_name='$matchtype_name' WHERE matchtype_id='$matchtype_id'");
			redirect(FUSION_SELF.$aidlink."&pagefile=editmatchtypes&status=su");
		} else {
			$result = dbquery("INSERT INTO ".DB_ZWAR_MATCHTYPES." (matchtype_name) VALUES ('$matchtype_name')");
			redirect(FUSION_SELF.$aidlink."&pagefile=editmatchtypes&status=sn");
		}
	} else {
		opentable($locale['zwar_1711']);
		echo "<center><br/>".$error."<br/><br/><a href='javascript:history.back()'><< ".$locale['zwar_1712']."</a></center>";
		closetable();
	}
} else if (isset($_POST['delete'])) {
	$usecount = dbcount("(*)", DB_ZWAR_WARS, "war_matchtype_id='$matchtype_id'");
	if (!$usecount) {
		$result = dbquery("DELETE FROM ".DB_ZWAR_MATCHTYPES." WHERE matchtype_id='$matchtype_id'");
		redirect(FUSION_SELF.$aidlink."&pagefile=editmatchtypes&status=del");
	} else {
		redirect(FUSION_SELF.$aidlink."&pagefile=editmatchtypes&matchtype_id=$matchtype_id&status=used");
	}	
} else if(isset($_POST['clear'])) {
	redirect(FUSION_SELF.$aidlink."&pagefile=editmatchtypes");
} else {
	
	$editlist = ""; $sel = "";
	$result = dbquery("SELECT * FROM ".DB_ZWAR_MATCHTYPES." ORDER BY matchtype_name");
	if (dbrows($result)) {
		while ($data = dbarray($result)) {
			if (isset($matchtype_id)) $sel = ($matchtype_id == $data['matchtype_id'] ? " selected" : "");
			$editlist .= "<option value='".$data['matchtype_id']."'$sel>".$data['matchtype_name']."</option>\n";
		}
	}
	opentable($locale['zwar_1713']);
	echo "<form name='selectform' method='post' action='".FUSION_SELF.$aidlink."&amp;pagefile=editmatchtypes'>
	<center>
	<select name='matchtype_id' class='textbox' style='width:250px'>
	$editlist</select>
	<input type='submit' name='edit' value='".$locale['zwar_1714']."' class='button'>
	<input type='submit' name='delete' value='".$locale['zwar_1715']."' onclick='return Deleteconfirm();' class='button'>
	</center>
	</form>\n";
	closetable();
	
	if (isset($matchtype_id)) {
		$result = dbquery("SELECT * FROM ".DB_ZWAR_MATCHTYPES." WHERE matchtype_id='$matchtype_id'");
		if (dbrows($result)) {
			$data = dbarray($result);
			$matchtype_name=(isset($_POST['matchtype_name']) ? stripinput($_POST['matchtype_name']) : $data['matchtype_name']);
			$action = FUSION_SELF.$aidlink."&amp;pagefile=editmatchtypes&amp;matchtype_id=$matchtype_id";
			$cancelbtn = " | <input type='submit' name='clear' class='button' value='".$locale['zwar_1719']."'>";
			opentable($locale['zwar_1716']);
		} else {
			redirect(FUSION_SELF);
		}
	} else {
		$matchtype_name=(isset($_POST['matchtype_name']) ? stripinput($_POST['matchtype_name']) : "");
		$action = FUSION_SELF.$aidlink."&amp;pagefile=editmatchtypes";
		$cancelbtn = "";
		opentable($locale['zwar_1717']);
	}

	echo "<form name='inputform' method='post' action='$action'>
	<table cellpadding='0' cellspacing='0' class='center'>
	<tr>
	<td width='120' class='tbl'>".$locale['zwar_1718']."<font style='color:#ff0000;'> *</font></td>
	<td width='75%' class='tbl'>
		<input type='text' name='matchtype_name' value='$matchtype_name' maxlength='100' class='textbox' style='width:250px;'>
	</td>
	</tr><tr><td align='center' colspan='2' class='tbl'>
	<input type='submit' name='save' class='button' value='".$locale['zwar_1720']."'>".$cancelbtn."
	</td></tr>";
	if (isset($matchtype_id)) {	
		$uselist="";
		$useresult = dbquery("SELECT * FROM ".DB_ZWAR_WARS." WHERE war_matchtype_id='$matchtype_id'");
		if (dbrows($useresult)) {
			$usetitle=$locale['zwar_1721'];
			while ($usedata = dbarray($useresult)) {
				$war_date=strftime('%A, %d.%m.%Y', $usedata['war_date']);
				$uselist.="<a href='".FUSION_SELF.$aidlink."&pagefile=editwars&action=modify&warid=".$usedata['war_id']."'>War am <b>$war_date</b></a><br/>";
			}
		} else {
			$usetitle=$locale['zwar_1722'];
		}
		echo "<td class='tbl2' colspan='2'>$usetitle</td></tr><tr>
		<td class='tbl1' colspan='2' align='center'>$uselist</td>
	</tr>
	";
	}
	echo "</table></form><br/>";
	
	closetable();
	echo "<script type='text/javascript'>
	function Deleteconfirm() {
		return confirm('".$locale['zwar_1723']."');
	}
	</script>\n";
}
?>