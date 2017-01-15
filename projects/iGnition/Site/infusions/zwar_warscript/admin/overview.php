<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: overview.php
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

if (isset($_POST['savequickwar'])) {
	$error=""; $errorcount=1;
	$war_game_id=(isNum($_POST['war_game_id']) ? $_POST['war_game_id'] : 0);
	if (!$war_game_id) { $error.=$errorcount++.": ".$locale['zwar_1017']."<br/>"; }
	$war_squad_id=(isset($_POST['war_squad_id']) && isNum($_POST['war_squad_id']) ? $_POST['war_squad_id'] : "");

	$daterror=false;
	foreach ($_POST['war_date'] as $datewert) {
		if (!isNum($datewert)) { $daterror=true; }
	}
	if ($daterror) {
		$error.=$errorcount++.": ".$locale['zwar_1014']."<br/>";
		$war_date="";
	} else {
		$war_date=mktime($_POST['war_date']['hours'], $_POST['war_date']['minutes'], 0,$_POST['war_date']['mon'], $_POST['war_date']['mday'], $_POST['war_date']['year']);
	}
	
	if ($error!="") {
		opentable($locale['zwar_0053']);
		echo "<center><br/>".$error."<br/><br/><a href='javascript:history.back()'><< ".$locale['zwar_0001']."</a></center>";
		closetable();
	} else {
		$result = dbquery("INSERT INTO ".DB_ZWAR_WARS." (war_info, war_added_by, war_date, war_date_add, war_teamsize, war_opp_id, war_server_id, war_game_id, war_matchtype_id, war_gametype_id, war_password, war_squad) VALUES ('', '".$userdata['user_id']."', '".$war_date."', '".time()."', '', '', '', '".$war_game_id."', '', '', '', '".$war_squad_id."')");
	}
}

opentable($locale['zwar_1001']);
echo "<center><img src='".INFUSIONS."zwar_warscript/images/zwar-logo.jpg' alt='zwar'/><br/><b>".$locale['zwar_1002']."</b><br/><br/>";

if ($zwar_version = file_get_contents("http://www.zoffclan.de/zoffdev/update/index.php")) {
	if (version_compare($zwar_version, $zwar_settings_array['zwar_version'], ">")) {
		echo "<b><div style='color:#DD0000; border:1px solid #000000; backgorund-color:#ffffff; padding:4px; margin:5px; width:350px; white-space:nowrap; overflow:auto;'>
		".$locale['zwar_1003']."</div></b>
		<b>".$locale['zwar_1024']."</b> ".$zwar_version."<br/>".$locale['zwar_1025'];
	} else {
		echo "<b><div style='color:#00BB00; border:1px solid #000000; backgorund-color:#ffffff; padding:4px; margin:5px; width:350px; white-space:nowrap; overflow:auto;'>
		".$locale['zwar_1004']."</div></b>
		<b>".$locale['zwar_1024']."</b> ".$zwar_settings_array['zwar_version']."<br/>".$locale['zwar_1026'];
	}
} else {
	echo $locale['zwar_1027'];
}

$challengecount = dbcount("(*)", DB_ZWAR_CHALLENGES);
echo "<br/><hr><br/>";
if ($challengecount) {
	echo $challengecount == 1 ? sprintf($locale['zwar_1022'], "<a href='".FUSION_SELF.$aidlink."&pagefile=joinus'><b>".$challengecount."</b></a>") : sprintf($locale['zwar_1023'], "<a href='".FUSION_SELF.$aidlink."&pagefile=challenge'><b>".$challengecount."</b></a>");
} else {
	echo $locale['zwar_1021'];
}
echo "<br/><br/>";
$appcount = dbcount("(*)", DB_ZWAR_JOINUS);
if ($appcount) {
	echo $appcount == 1 ? sprintf($locale['zwar_1019'], "<a href='".FUSION_SELF.$aidlink."&pagefile=joinus'><b>".$appcount."</b></a>") : sprintf($locale['zwar_1020'], "<a href='".FUSION_SELF.$aidlink."&pagefile=joinus'><b>".$appcount."</b></a>");
} else {
	echo $locale['zwar_1018'];
}
echo "</center>";

	$war_game_id = isset($_POST['war_game_id']) && isnum($_POST['war_game_id']) ? $_POST['war_game_id'] : 0;
		
	$sel = ""; $war_game_selectname = "";
	$gamelist = "<option value='0'$sel>".$locale['zwar_0052']."</option>\n";
	$result = dbquery("SELECT * FROM ".DB_ZWAR_GAMES." ORDER BY game_name");
	if (dbrows($result)) {
		while ($data = dbarray($result)) {
			if ($war_game_id == $data['game_id']) {
				$sel = " selected";
				$war_game_selectname = $data['game_name_short'];
			} else {
				$sel = "";
			}
			$gamelist .= "<option value='".$data['game_id']."'$sel>".$data['game_name']."</option>\n";
	}}

	$sel = "";
	$result = dbquery("SELECT * FROM ".DB_ZWAR_SQUADS." WHERE group_wars='1' AND group_games REGEXP('^\\\.{$war_game_id}$|\\\.{$war_game_id}\\\.|\\\.{$war_game_id}$') ORDER BY group_name");
	$squadlist = "<option value=''>".sprintf($locale['zwar_1015'], $war_game_selectname)."</option>";
	if (dbrows($result)) {
		while ($data = dbarray($result)) {
			$squadlist .= "<option value='".$data['group_id']."'>".$data['group_name']."</option>\n";
	}}

echo "<br/><hr><br/><form action='".FUSION_SELF.$aidlink."' method='post' name='zwarquickadd'>
    <table cellpadding='0' cellspacing='0' class='center'><tr>
	<td class='tbl' colspan='2' align='center'>&nbsp;<b><u>".$locale['zwar_1016']."</u></b></td>
	</tr><tr>
	<td class='tbl'><b>".$locale['zwar_1006']."</b></td>
	<td class='tbl'>
	<select name='war_game_id' style='width:250px;' class='textbox' onchange='submit();'>
		".$gamelist."</select>
	</td>
	</tr>";
	if ($war_game_id) {
		echo "<tr>
		<td class='tbl'><b>".$locale['zwar_1007']."</b></td>
		<td class='tbl'>
		<select name='war_squad_id' style='width:250px;' class='textbox'>
			".$squadlist."</select>
		</td>
		</tr>";
	}
	echo "<tr>
	<td class='tbl' valign='top'><b>".$locale['zwar_1013']."</b></td>
		<td class='tbl'><table cellpadding='0' cellspacing='0'><tr>";
	echo '<td class="tbl">'.$locale["zwar_1008"].'</td><td class="tbl">
		<select name="war_date[hours]" class="textbox">\n';
		for ($i=0;$i<=23;$i++) echo "<option".($i==20 ? " selected" : "").">".($i<10 ? "0".$i : $i)."</option>\n";
		echo '</select> : <select name="war_date[minutes]" class="textbox">\n';
		for ($i=0;$i<=59;$i++) echo "<option".($i==0 ? " selected" : "").">".($i<10 ? "0".$i : $i)."</option>\n";
		echo '</select> </td></tr><tr><td class="tbl"> '.$locale['zwar_0011'].': </td><td class="tbl">
		<select name="war_date[mday]" class="textbox">\n<option selected>'.$locale['zwar_1009'].'</option>\n';
		for ($i=1;$i<=31;$i++) echo "<option>".($i<10 ? "0".$i : $i)."</option>\n";
		echo '</select> / <select name="war_date[mon]" class="textbox">\n<option selected>'.$locale['zwar_1010'].'</option>\n';
		for ($i=1;$i<=12;$i++) echo "<option>".($i<10 ? "0".$i : $i)."</option>\n";
		echo '</select> / <select name="war_date[year]" class="textbox">\n<option selected>'.$locale['zwar_1011'].'</option>\n';
		for ($i=2008;$i<=2040;$i++) echo "<option>$i</option>\n";
		echo "</select></td>
		</tr></table>
	</td>
	</tr><tr>
	<td class='tbl' align='center' colspan='2'>
	<input type='submit' name='savequickwar' value='".$locale['zwar_1012']."' class='button'>
	</td>
	</tr>
	</table></form>
	<br/><hr><br/><center>
	<form action='' method='post' name='zwar_linkform'>
	<input type='button' class='button' value='".$locale['zwar_0071']."' onclick=\"zwar_setlink('zwar_linkbox','zwar.php?page=wars');return false;\"/>&nbsp;|&nbsp;
	<input type='button' class='button' value='".$locale['zwar_0072']."' onclick=\"zwar_setlink('zwar_linkbox','zwar.php?page=wars&view=1');return false;\"/>&nbsp;|&nbsp;
	<input type='button' class='button' value='".$locale['zwar_0073']."' onclick=\"zwar_setlink('zwar_linkbox','zwar.php?page=wars&view=2');return false;\"/>&nbsp;|&nbsp;
	<input type='button' class='button' value='".$locale['zwar_0074']."' onclick=\"zwar_setlink('zwar_linkbox','zwar.php?page=members');return false;\"/>&nbsp;|&nbsp;
	<input type='button' class='button' value='".$locale['zwar_0075']."' onclick=\"zwar_setlink('zwar_linkbox','zwar.php?page=members&teamid=0');return false;\"/><br/>
	<input type='button' class='button' value='".$locale['zwar_0076']."' onclick=\"zwar_setlink('zwar_linkbox','zwar.php?page=member_map');return false;\"/>&nbsp;|&nbsp;
	<input type='button' class='button' value='".$locale['zwar_0077']."' onclick=\"zwar_setlink('zwar_linkbox','zwar.php?page=myview');return false;\"/>&nbsp;|&nbsp;
	<input type='button' class='button' value='".$locale['zwar_0078']."' onclick=\"zwar_setlink('zwar_linkbox','zwar.php?page=join_us');return false;\"/>&nbsp;|&nbsp;
	<input type='button' class='button' value='".$locale['zwar_0079']."' onclick=\"zwar_setlink('zwar_linkbox','zwar.php?page=fight_us');return false;\"/>
	<input type='hidden' name='zwar_baseurl' value='".BASEDIR."'>
	<br/><br/>
	<input type='text' name='zwar_linkbox' class='textbox' style='width:250px;' value=''/>
	&nbsp;<a href='javascript:void(0);' onclick=\"zwar_golink();return false;\">>></a>
	</center>
	</form>";
closetable();
?>