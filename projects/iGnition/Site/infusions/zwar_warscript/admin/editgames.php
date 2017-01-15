<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: editgames.php
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
if (isset($_GET['game_id']) && !isNum($_GET['game_id'])) { redirect(FUSION_SELF); }
if (isset($_GET['game_id']) && !isNum($_GET['game_id'])) { redirect(FUSION_SELF.$aidlink."&pagefile=editgames"); }
if (isset($_POST['game_id']) && !isNum($_POST['game_id'])) { redirect(FUSION_SELF.$aidlink."&pagefile=editgames"); }
if (isset($_GET['game_id']) || isset($_POST['game_id'])) {
  $game_id = (isset($_POST['game_id']) ? $_POST['game_id'] : $_GET['game_id']);	
} else {
  unset($game_id);
}

if (isset($_GET['status'])) {
	if ($_GET['status'] == "su") {
		$message = "<b>".$locale['zwar_2002']."</b>";
	} elseif ($_GET['status'] == "sn") {
		$message = "<b>".$locale['zwar_2004']."</b>";
	} elseif ($_GET['status'] == "del") {
		$message = "<b>".$locale['zwar_2006']."</b>";
	}
	if ($message) {	echo "<div class='admin-message'>".$message."</div>\n"; }
}

if (isset($_POST['save'])) {
	$error = "";
	$game_name = stripinput($_POST['game_name']);
	if ($game_name == "") { $error.=$locale['zwar_2007']."<br/>\n"; }
	
	$game_name_short = stripinput($_POST['game_name_short']);
	if ($game_name_short == "") { $error.=$locale['zwar_2009']."<br/>\n";	}
	
	$game_icon = stripinput($_POST['game_icon']);

	if ($error=="") {
		if (isset($game_id)) {
			$result = dbquery("UPDATE ".DB_ZWAR_GAMES." SET game_name='$game_name', game_name_short='$game_name_short', game_icon='$game_icon' WHERE game_id='$game_id'");
			redirect(FUSION_SELF.$aidlink."&pagefile=editgames&status=su");
		} else {
			$result = dbquery("INSERT INTO ".DB_ZWAR_GAMES." (game_name, game_name_short, game_icon) VALUES ('$game_name', '$game_name_short', '$game_icon')");
			redirect(FUSION_SELF.$aidlink."&pagefile=editgames&status=sn");
		}
	} else {
		opentable($locale['zwar_2011']);
		echo "<center><br/>".$error."<br/><br/><a href='javascript:history.back()'><< ".$locale['zwar_2012']."</a></center>";
		closetable();
	}
} else if (isset($_POST['delete'])) {
	$result = dbquery("DELETE FROM ".DB_ZWAR_GAMES." WHERE game_id='$game_id'");
	redirect(FUSION_SELF.$aidlink."&pagefile=editgames&status=del");
} else if(isset($_POST['clear'])) {
	redirect(FUSION_SELF.$aidlink."&pagefile=editgames");
} else {
	
	$editlist = ""; $sel = "";
	$result = dbquery("SELECT * FROM ".DB_ZWAR_GAMES." ORDER BY game_name");
	if (dbrows($result)) {
		while ($data = dbarray($result)) {
			if (isset($game_id)) $sel = ($game_id == $data['game_id'] ? " selected" : "");
			$editlist .= "<option value='".$data['game_id']."'$sel>[".$data['game_id']."]".$data['game_name']."</option>\n";
		}
	}
	opentable($locale['zwar_2013']);
	echo "<form name='selectform' method='post' action='".FUSION_SELF.$aidlink."&amp;pagefile=editgames'>
	<center>
	<select name='game_id' class='textbox' style='width:250px'>
	$editlist</select>
	<input type='submit' name='edit' value='".$locale['zwar_2014']."' class='button'>
	<input type='submit' name='delete' value='".$locale['zwar_2015']."' onclick='return Deleteconfirm();' class='button'>
	</center>
	</form>\n";
	closetable();
		
	if (isset($game_id)) {
	    $result = dbquery("SELECT * FROM ".DB_ZWAR_GAMES." WHERE game_id='$game_id'");
		if (dbrows($result)) {
			$data = dbarray($result);
			$game_name=(isset($_POST['game_name']) ? stripinput($_POST['game_name']) : $data['game_name']);
			$game_icon=(isset($_POST['game_icon']) ? stripinput($_POST['game_icon']) : $data['game_icon']);
			$game_name_short=(isset($_POST['game_name_short']) ? stripinput($_POST['game_name_short']) : $data['game_name_short']);
			$action = FUSION_SELF.$aidlink."&amp;pagefile=editgames&amp;game_id=$game_id";
			$cancelbtn = " | <input type='submit' name='clear' value='".$locale['zwar_2019']."' class='button'>";
			opentable($locale['zwar_2001']);
		}
	} else {
		$game_name=(isset($_POST['game_name']) ? stripinput($_POST['game_name']) : "");
		$game_icon=(isset($_POST['game_icon']) ? stripinput($_POST['game_icon']) : "");
		$game_name_short=(isset($_POST['game_name_short']) ? stripinput($_POST['game_name_short']) : "");
		$action = FUSION_SELF.$aidlink."&amp;pagefile=editgames";
		$cancelbtn = "";
		opentable($locale['zwar_2003']);
	}

	$pic_files = makefilelist(INFUSIONS."zwar_warscript/images/games/", ".|..|index.php", true);
	
	echo "<form name='inputform' method='post' action='".$action."'>
	<table cellpadding='0' cellspacing='1' class='center'>
	<tr>
	<td width='100' class='tbl'>".$locale['zwar_2016']."<font style='color:#ff0000;'> *</font></td>
	<td width='80%' class='tbl'>
		<input type='text' name='game_name' value='$game_name' maxlength='100' class='textbox' style='width:250px;'>
	</td>
	</tr><tr>
	<td width='100' class='tbl'>".$locale['zwar_2017']."<font style='color:#ff0000;'> *</font></td>
	<td width='80%' class='tbl'>
		<input type='text' name='game_name_short' value='$game_name_short' maxlength='100' class='textbox' style='width:250px;'>
	</td>
	</tr>";
	echo "<tr>
	<td width='100' class='tbl' valign='top'>".$locale['zwar_2018']."</td>
	<td width='80%' class='tbl'><b><select name='game_icon' class='textbox' onchange='submit()' style='width:250px;'>
		<option value=''>---</option>".makefileopts($pic_files, $game_icon)."</select>";
	if ($game_icon!="") {
		echo "<br/><br/>\n<img src='".INFUSIONS."zwar_warscript/images/games/".$game_icon."' alt='".$game_name."'><br/><br/>\n";
	}
	echo "</td></tr><tr><td align='center' colspan='2' class='tbl'>
	<input type='submit' name='save' class='button' value='".$locale['zwar_2020']."'>".$cancelbtn."
	</td></tr>
	</table></form><br/>";
	
	closetable();
	echo "<script type='text/javascript'>
	function Deleteconfirm() {
		return confirm('".$locale['zwar_2021']."');
	}
	</script>\n";
}
?>