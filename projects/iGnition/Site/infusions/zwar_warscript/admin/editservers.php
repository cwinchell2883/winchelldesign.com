<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: editservers.php
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
if (isset($_GET['server_id']) && !isNum($_GET['server_id'])) { redirect(FUSION_SELF.$aidlink."&pagefile=editmatchtypes"); }
if (isset($_POST['server_id']) && !isNum($_POST['server_id'])) { redirect(FUSION_SELF.$aidlink."&pagefile=editmatchtypes"); }
if (isset($_GET['server_id']) || isset($_POST['server_id'])) {
  $server_id = (isset($_POST['server_id']) ? $_POST['server_id'] : $_GET['server_id']);	
} else {
  unset($server_id);
}

if (isset($_GET['status']) && !isset($message)) {
	if ($_GET['status'] == "su") {
		$message = "<b>".$locale['zwar_1502']."</b>";
	} elseif ($_GET['status'] == "sn") {
		$message = "<b>".$locale['zwar_1504']."</b>";
	} elseif ($_GET['status'] == "del") {
		$message = "<b>".$locale['zwar_1506']."</b>";
	} elseif ($_GET['status'] == "used") {
		$message = "<b>".$locale['zwar_1508']."</b>";
	}
	if ($message) {	echo "<div class='admin-message'>".$message."</div>\n"; }
}

if (isset($_POST['save'])) {
	$error="";
	$server_name=stripinput($_POST['server_name']);
	if ($server_name=="") {$error.=$locale['zwar_1509']."<br/>\n";
	}
	$server_ip=stripinput($_POST['server_ip']);
	if ($server_ip=="") {$error.=$locale['zwar_1510']."<br/>\n";
	}
	
	if ($error=="") {
		if (isset($server_id)) {
			$result = dbquery("UPDATE ".DB_ZWAR_SERVERS." SET server_name='$server_name', server_ip='$server_ip' WHERE server_id='$server_id'");
			redirect(FUSION_SELF.$aidlink."&pagefile=editservers&status=su");
		} else {
			$result = dbquery("INSERT INTO ".DB_ZWAR_SERVERS." (server_name, server_ip) VALUES ('$server_name', '$server_ip')");
			redirect(FUSION_SELF.$aidlink."&pagefile=editservers&status=sn");
		}
	} else {
		opentable($locale['zwar_1511']);
		echo "<center><br/>".$error."<br/><br/><a href='javascript:history.back()'><< ".$locale['zwar_1512']."</a></center>";
		closetable();
	}
} else if (isset($_POST['delete'])) {
	$usecount = dbcount("(*)", DB_ZWAR_WARS, "war_server_id='$server_id'");
	if (!$usecount) {
		$result = dbquery("DELETE FROM ".DB_ZWAR_SERVERS." WHERE server_id='$server_id'");
		redirect(FUSION_SELF.$aidlink."&pagefile=editservers&status=del");
	} else {
		redirect(FUSION_SELF.$aidlink."&pagefile=editservers&server_id=$server_id&status=used");
	}	
} else if(isset($_POST['clear'])) {
	redirect(FUSION_SELF.$aidlink."&pagefile=editservers");
} else {
	$editlist = ""; $sel = "";
	$result = dbquery("SELECT * FROM ".DB_ZWAR_SERVERS." ORDER BY server_name");
	if (dbrows($result)) {
		while ($data = dbarray($result)) {
			if (isset($server_id)) $sel = ($server_id == $data['server_id'] ? " selected" : "");
			$editlist .= "<option value='".$data['server_id']."'$sel>".$data['server_name']."</option>\n";
		}
	}
	opentable($locale['zwar_1513']);
	echo "<form name='selectform' method='post' action='".FUSION_SELF.$aidlink."&amp;pagefile=editservers'>
	<center>
	<select name='server_id' class='textbox' style='width:250px'>
	$editlist</select>
	<input type='submit' name='edit' value='".$locale['zwar_1514']."' class='button'>
	<input type='submit' name='delete' value='".$locale['zwar_1515']."' onclick='return Deleteconfirm();' class='button'>
	</center>
	</form>\n";
	closetable();
		
	if (isset($server_id)) {
		$result = dbquery("SELECT * FROM ".DB_ZWAR_SERVERS." WHERE server_id='$server_id'");
		if (dbrows($result)) {
			$data = dbarray($result);
			$server_name=(isset($_POST['server_name']) ? stripinput($_POST['server_name']) : $data['server_name']);
			$server_ip=(isset($_POST['server_ip']) ? stripinput($_POST['server_ip']) : $data['server_ip']);
			$action = FUSION_SELF.$aidlink."&amp;pagefile=editservers&amp;server_id=$server_id";
			$cancelbtn = " | <input type='submit' name='clear' class='button' value='".$locale['zwar_1523']."'>";
			opentable($locale['zwar_1501']);
		}
	} else {
		$server_name=(isset($_POST['server_name']) ? stripinput($_POST['server_name']) : "");
		$server_ip=(isset($_POST['server_ip']) ? stripinput($_POST['server_ip']) : "");
		$action = FUSION_SELF.$aidlink."&amp;pagefile=editservers";
		$cancelbtn = "";
		opentable($locale['zwar_1502']);
	}

	echo "<form name='inputform' method='post' action='$action'>
	<table cellpadding='0' cellspacing='0' class='center'>
	<tr>
	<td width='120' class='tbl'>".$locale['zwar_1516']."<font style='color:#ff0000;'> *</font></td>
	<td width='75%' class='tbl'>
		<input type='text' name='server_name' value='$server_name' maxlength='100' class='textbox' style='width:250px;'>
	</td>
	</tr><tr>
	<td width='120' class='tbl'>".$locale['zwar_1517']."<font style='color:#ff0000;'> *</font></td>
	<td width='75%' class='tbl'>
		<input type='text' name='server_ip' value='$server_ip' maxlength='100' class='textbox' style='width:250px;'>
	</td>
	</tr><tr><td align='center' colspan='2' class='tbl1'>
	<input type='submit' name='save' class='button' value='".$locale['zwar_1524']."'>".$cancelbtn."
	</td></tr>";
	if (isset($server_id)) {	
		$uselist="";
		$useresult = dbquery("SELECT * FROM ".DB_ZWAR_WARS." WHERE war_server_id='$server_id'");
		if (dbrows($useresult)) {
			$usetitle=$locale['zwar_1527'];
			while ($usedata = dbarray($useresult)) {
				$war_date=strftime('%A, %d.%m.%Y', $usedata['war_date']);
				$uselist.="<a href='".FUSION_SELF.$aidlink."&pagefile=editwars&action=modify&warid=".$usedata['war_id']."'>".$locale['zwar_1525']."<b>$war_date</b></a><br/>";
			}
		} else {
			$usetitle=$locale['zwar_1526'];
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
		return confirm('".$locale['zwar_1528']."');
	}
	</script>\n";
}
?>