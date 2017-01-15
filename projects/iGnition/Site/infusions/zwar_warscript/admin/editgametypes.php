<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: editgametypes.php
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
if (isset($_GET['gametype_id']) && !isNum($_GET['gametype_id'])) { redirect(FUSION_SELF.$aidlink."&pagefile=editgametypes"); }
if (isset($_POST['gametype_id']) && !isNum($_POST['gametype_id'])) { redirect(FUSION_SELF.$aidlink."&pagefile=editgametypes"); }
if (isset($_GET['gametype_id']) || isset($_POST['gametype_id'])) {
  $gametype_id = (isset($_POST['gametype_id']) ? $_POST['gametype_id'] : $_GET['gametype_id']);	
} else {
  unset($gametype_id);
}

if (isset($_GET['status']) && !isset($message)) {
	if ($_GET['status'] == "su") {
		$message = "<b>".$locale['zwar_1902']."</b>";
	} elseif ($_GET['status'] == "sn") {
		$message = "<b>".$locale['zwar_1904']."</b>";
	} elseif ($_GET['status'] == "del") {
		$message = "<b>".$locale['zwar_1906']."</b>";
	} elseif ($_GET['status'] == "used") {
		$message = "<b>".$locale['zwar_1908']."</b>";
	}
	if ($message) {	echo "<div class='admin-message'>".$message."</div>\n"; }
}

if (isset($_POST['save'])) {
	$error="";
	$gametype_name=stripinput(trim($_POST['gametype_name']));
	if ($gametype_name=="") {$error.=$locale['zwar_1909']."<br/>\n";
	}
	if ($error=="") {
		if (isset($gametype_id)) {
			$result = dbquery("UPDATE ".DB_ZWAR_GAMETYPES." SET gametype_name='$gametype_name' WHERE gametype_id='$gametype_id'");
			redirect(FUSION_SELF.$aidlink."&pagefile=editgametypes&status=su");
		} else {
			$result = dbquery("INSERT INTO ".DB_ZWAR_GAMETYPES." (gametype_name) VALUES ('$gametype_name')");
			redirect(FUSION_SELF.$aidlink."&pagefile=editgametypes&status=sn");
		}
	} else {
		opentable($locale['zwar_1911']);
		echo "<center><br/>".$error."<br/><br/><a href='javascript:history.back()'><< ".$locale['zwar_1912']."</a></center>";
		closetable();
	}
} else if (isset($_POST['delete'])) {
	$usecount = dbcount("(*)", DB_ZWAR_WARS, "war_gametype_id='$gametype_id'");
	if (!$usecount) {
		$result = dbquery("DELETE FROM ".DB_ZWAR_GAMETYPES." WHERE gametype_id='$gametype_id'");
		redirect(FUSION_SELF.$aidlink."&pagefile=editgametypes&status=del");
	} else {
		redirect(FUSION_SELF.$aidlink."&pagefile=editgametypes&gametype_id=".$gametype_id."&status=used");
	}	
} else if(isset($_POST['clear'])) {
	redirect(FUSION_SELF.$aidlink."&pagefile=editgametypes");
} else {
	
	$editlist = ""; $sel = "";
	$result = dbquery("SELECT * FROM ".DB_ZWAR_GAMETYPES." ORDER BY gametype_name");
	if (dbrows($result)) {
		while ($data = dbarray($result)) {
			if (isset($gametype_id)) $sel = ($gametype_id == $data['gametype_id'] ? " selected" : "");
			$editlist .= "<option value='".$data['gametype_id']."'$sel>".$data['gametype_name']."</option>\n";
		}
	}
	opentable($locale['zwar_1913']);
	echo "<form name='selectform' method='post' action='".FUSION_SELF.$aidlink."&amp;pagefile=editgametypes'>
	<center>
	<select name='gametype_id' class='textbox' style='width:250px'>
	".$editlist."</select>
	<input type='submit' name='edit' value='".$locale['zwar_1914']."' class='button'>
	<input type='submit' name='delete' value='".$locale['zwar_1915']."' onclick='return Deleteconfirm();' class='button'>
	</center>
	</form>\n";
	closetable();
		
	if (isset($gametype_id)) {
		$result = dbquery("SELECT * FROM ".DB_ZWAR_GAMETYPES." WHERE gametype_id='$gametype_id'");
		if (dbrows($result)) {
			$data = dbarray($result);
			$gametype_name=(isset($_POST['gametype_name']) ? stripinput($_POST['gametype_name']) : $data['gametype_name']);
			$action = FUSION_SELF.$aidlink."&amp;pagefile=editgametypes&amp;gametype_id=".$gametype_id;
			$cancelbtn = " | <input type='submit' name='clear' class='button' value='".$locale['zwar_1919']."'>";
			opentable($locale['zwar_1916']);
		}
	} else {
		$gametype_name=(isset($_POST['gametype_name']) ? stripinput($_POST['gametype_name']) : "");
		$action = FUSION_SELF.$aidlink."&amp;pagefile=editgametypes";
		opentable($locale['zwar_1917']);
		$cancelbtn = "";
	}

	echo "<form name='inputform' method='post' action='".$action."'>
	<table cellpadding='0' cellspacing='0' class='center'>
	<tr>
	<td width='120' class='tbl'>".$locale['zwar_1918']."<font style='color:#ff0000;'> *</font></td>
	<td width='75%' class='tbl'>
		<input type='text' name='gametype_name' value='".$gametype_name."' maxlength='100' class='textbox' style='width:250px;'>
	</td>
	</tr><tr><td align='center' colspan='2' class='tbl'>
	<input type='submit' name='save' class='button' value='".$locale['zwar_1920']."'>".$cancelbtn."
	</td></tr>";
	if (isset($gametype_id)) {	
		$uselist="";
		$useresult = dbquery("SELECT * FROM ".DB_ZWAR_WARS." WHERE war_gametype_id='$gametype_id'");
		if (dbrows($useresult)) {
			$usetitle=$locale['zwar_1921'];
			while ($usedata = dbarray($useresult)) {
				$war_date=strftime('%A, %d.%m.%Y', $usedata['war_date']);
				$uselist.="<a href='".FUSION_SELF.$aidlink."&pagefile=editwars&action=modify&warid=".$usedata['war_id']."'>War am <b>".$war_date."</b></a><br/>";
			}
		} else {
			$usetitle=$locale['zwar_1922'];
		}
		echo "<td class='tbl2' colspan='2'>".$usetitle."</td></tr><tr>
		<td class='tbl1' colspan='2' align='center'>".$uselist."</td>
	</tr>
	";
	}
	echo "</table></form><br/>";
	
	closetable();
	echo "<script type='text/javascript'>
	function Deleteconfirm() {
		return confirm('".$locale['zwar_1923']."');
	}
	</script>\n";
}
?>