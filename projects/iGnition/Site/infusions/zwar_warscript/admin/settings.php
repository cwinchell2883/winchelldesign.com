<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: settings.php
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

if (isset($_POST['save'])) {
	$error="";
	$zwar_closetime=(isnum($_POST['zwar_closetime']) ? $_POST['zwar_closetime']*3600 : 0);
	$zwar_clantag=stripinput($_POST['zwar_clantag']);
	$zwar_clan_name=stripinput($_POST['zwar_clan_name']);
	$zwar_group_warmember=(isnum($_POST['zwar_group_warmember']) ? $_POST['zwar_group_warmember'] : 101);
	$zwar_group_warinfo=(isnum($_POST['zwar_group_warinfo']) ? $_POST['zwar_group_warinfo'] : 0);
	$zwar_group_war_comments=(isnum($_POST['zwar_group_war_comments']) ? $_POST['zwar_group_war_comments'] : 102);
	$zwar_membermap_center=(!preg_match("/^\(\-?[0-9]+\.[0-9]+\,\s\-?[0-9]+\.[0-9]+\)$/", $_POST['zwar_membermap_center']) ? "(50.62507306341437, 13.82080078125)" : stripinput($_POST['zwar_membermap_center']));
	$zwar_membermap_type=(isnum($_POST['zwar_membermap_type']) ? $_POST['zwar_membermap_type'] : 1 );
	$zwar_membermap_gkey=stripinput($_POST['zwar_membermap_gkey']);
	$zwar_membermap_zoom=(isnum($_POST['zwar_membermap_zoom']) ? $_POST['zwar_membermap_zoom'] : 2 );
	$zwar_default_page=stripinput(trim($_POST['zwar_default_page']));
	$zwar_joinus_public=(isnum($_POST['zwar_joinus_public']) ? $_POST['zwar_joinus_public'] : 0);
	$zwar_nomem_visible=(isnum($_POST['zwar_nomem_visible']) ? $_POST['zwar_nomem_visible'] : 1);
	$zwar_colorwon=(preg_match("/^[0-9A-Z]+$/i", $_POST['zwar_colorwon']) ? $_POST['zwar_colorwon'] : "000000");
	$zwar_colorlost=(preg_match("/^[0-9A-Z]+$/i", $_POST['zwar_colorlost']) ? $_POST['zwar_colorlost'] : "000000");
	$zwar_colordraw=(preg_match("/^[0-9A-Z]+$/i", $_POST['zwar_colordraw']) ? $_POST['zwar_colordraw'] : "000000");
	$zwar_coloractive=(preg_match("/^[0-9A-Z]+$/i", $_POST['zwar_coloractive']) ? $_POST['zwar_coloractive'] : "000000");
	$zwar_colorinactive=(preg_match("/^[0-9A-Z]+$/i", $_POST['zwar_colorinactive']) ? $_POST['zwar_colorinactive'] : "000000");
	$zwar_mappics_width=(isnum($_POST['zwar_mappics_width']) ? $_POST['zwar_mappics_width'] : 100);
	$zwar_mappics_height=(isnum($_POST['zwar_mappics_height']) ? $_POST['zwar_mappics_height'] : 100);
	$zwar_memberpics_width=(isnum($_POST['zwar_memberpics_width']) ? $_POST['zwar_memberpics_width'] : 100);
	$zwar_memberpics_height=(isnum($_POST['zwar_memberpics_height']) ? $_POST['zwar_memberpics_height'] : 100);
	$zwar_uploadtypes=$_POST['zwar_uploadtypes'];
	$zwar_uploadmax=isnum($_POST['zwar_uploadmax']) ? $_POST['zwar_uploadmax'] : 150000;
	$zwar_uploadlimit=isnum($_POST['zwar_uploadlimit']) ? $_POST['zwar_uploadlimit'] : 5;
	$zwar_uploadlimit_type=isnum($_POST['zwar_uploadlimit_type']) ? $_POST['zwar_uploadlimit_type'] : 1;
	$zwar_show_warsshort=(isnum($_POST['zwar_show_warsshort']) ? $_POST['zwar_show_warsshort'] : 5);
	$zwar_show_warslong=(isnum($_POST['zwar_show_warslong']) ? $_POST['zwar_show_warslong'] : 15);
	$zwar_show_membercount=(isnum($_POST['zwar_show_membercount']) ? $_POST['zwar_show_membercount'] : 8);
	$zwar_squadinfo_open=(isnum($_POST['zwar_squadinfo_open']) ? $_POST['zwar_squadinfo_open'] : 8);
	$zwar_messenger_types=stripinput($_POST['zwar_messenger_types']);
	$zwar_voice_types=stripinput($_POST['zwar_voice_types']);

	$result = dbquery("UPDATE ".DB_ZWAR_SETTINGS." SET zwar_closetime='$zwar_closetime', zwar_clantag='$zwar_clantag', zwar_clan_name='$zwar_clan_name', zwar_default_page='$zwar_default_page', zwar_group_warmember='$zwar_group_warmember', zwar_group_warinfo='$zwar_group_warinfo', zwar_group_war_comments='$zwar_group_war_comments', zwar_colorwon='$zwar_colorwon', zwar_colorlost='$zwar_colorlost', zwar_colordraw='$zwar_colordraw', zwar_coloractive='$zwar_coloractive', zwar_colorinactive='$zwar_colorinactive', zwar_membermap_gkey='$zwar_membermap_gkey', zwar_membermap_zoom='$zwar_membermap_zoom', zwar_membermap_center='$zwar_membermap_center', zwar_membermap_type='$zwar_membermap_type', zwar_joinus_public='$zwar_joinus_public', zwar_nomem_visible='$zwar_nomem_visible', zwar_mappics_width='$zwar_mappics_width', zwar_mappics_height='$zwar_mappics_height', zwar_memberpics_width='$zwar_memberpics_width', zwar_memberpics_height='$zwar_memberpics_height', zwar_uploadtypes='$zwar_uploadtypes', zwar_uploadmax='$zwar_uploadmax', zwar_uploadlimit='$zwar_uploadlimit', zwar_uploadlimit_type='$zwar_uploadlimit_type', zwar_show_warsshort='$zwar_show_warsshort', zwar_show_warslong='$zwar_show_warslong', zwar_show_membercount='$zwar_show_membercount', zwar_squadinfo_open='$zwar_squadinfo_open', zwar_messenger_types='$zwar_messenger_types', zwar_voice_types='$zwar_voice_types'");
	redirect(FUSION_SELF.$aidlink."&pagefile=settings&status=su");
} else if(isset($_POST['clear'])) {
	redirect(FUSION_SELF.$aidlink);
} else {
	add_to_head("<style type=\"text/css\">\n
	<!--\n
	.infopopup {background-color:#FFCC00; position:absolute; display:none; padding:2px; padding-left:5px; padding-right:5px; border:1px solid #BBBBBB; font-weight:bold; font-family:Verdana, Arial, Times New Roman;}
	-->\n
	</style>");
	$result = dbquery("SELECT * FROM ".DB_ZWAR_SETTINGS."");
	if (dbrows($result)) {
		$data=dbarray($result);
		$zwar_closetime=$data['zwar_closetime']/3600;
		$zwar_clantag=$data['zwar_clantag'];
		$zwar_clan_name=$data['zwar_clan_name'];
		$zwar_group_warmember=$data['zwar_group_warmember'];
		$zwar_group_warinfo=$data['zwar_group_warinfo'];
		$zwar_group_war_comments=$data['zwar_group_war_comments'];
		$zwar_membermap_center=$data['zwar_membermap_center'];
		$zwar_membermap_type=$data['zwar_membermap_type'];
		$zwar_membermap_gkey=$data['zwar_membermap_gkey'];
		$zwar_membermap_zoom=$data['zwar_membermap_zoom'];
		$zwar_default_page=$data['zwar_default_page'];
		$zwar_joinus_public=$data['zwar_joinus_public'];
		$zwar_colorwon=$data['zwar_colorwon'];
		$zwar_colorlost=$data['zwar_colorlost'];
		$zwar_colordraw=$data['zwar_colordraw'];
		$zwar_coloractive=$data['zwar_coloractive'];
		$zwar_colorinactive=$data['zwar_colorinactive'];
		$zwar_nomem_visible=$data['zwar_nomem_visible'];
		$zwar_mappics_width=$data['zwar_mappics_width'];
		$zwar_mappics_height=$data['zwar_mappics_height'];
		$zwar_memberpics_width=$data['zwar_memberpics_width'];
		$zwar_memberpics_height=$data['zwar_memberpics_height'];
		$zwar_uploadtypes=$data['zwar_uploadtypes'];
		$zwar_uploadmax=$data['zwar_uploadmax'];
		$zwar_uploadlimit=$data['zwar_uploadlimit'];
		$zwar_uploadlimit_type=$data['zwar_uploadlimit_type'];
		$zwar_show_warsshort=$data['zwar_show_warsshort'];
		$zwar_show_warslong=$data['zwar_show_warslong'];
		$zwar_show_membercount=$data['zwar_show_membercount'];
		$zwar_squadinfo_open=$data['zwar_squadinfo_open'];
		$zwar_messenger_types=$data['zwar_messenger_types'];
		$zwar_voice_types=$data['zwar_voice_types'];
	}
	
	$user_groups = getusergroups();
	$visibility_warmember = ""; $sel = "";
	while(list($key, $user_group) = each($user_groups)){
		if($user_group['0']) {
			$sel = ($zwar_group_warmember == $user_group['0'] ? " selected" : "");
			$visibility_warmember .= "<option value='".$user_group['0']."'$sel>".$user_group['1']."</option>\n";
		}
	}
	$user_groups = getusergroups();
	$visibility_warinfo = ""; $sel = "";
	while(list($key, $user_group) = each($user_groups)){
		$sel = ($zwar_group_warinfo == $user_group['0'] ? " selected" : "");
		$visibility_warinfo .= "<option value='".$user_group['0']."'$sel>".$user_group['1']."</option>\n";
	}
	$user_groups = getusergroups();
	$visibility_war_comments = ""; $sel = "";
	while(list($key, $user_group) = each($user_groups)){
		$sel = ($zwar_group_war_comments == $user_group['0'] ? " selected" : "");
		$visibility_war_comments .= "<option value='".$user_group['0']."'$sel>".$user_group['1']."</option>\n";
	}
	
	opentable($locale['zwar_0801']);

	echo "<form name='inputform' method='post' action='".FUSION_SELF.$aidlink."&amp;pagefile=settings'>
	<table cellpadding='0' cellspacing='0' class='center'>
	<tr>
	<td class='tbl2' colspan='2' align='center'><b>".$locale['zwar_0809']."</b></td>
	</tr><tr>
	<td width='200' class='tbl' align='right'>".$locale['zwar_0802']."</td>
	<td width='70%' class='tbl'>
		<input type='text' name='zwar_clantag' value='$zwar_clantag' maxlength='20' class='textbox' style='width:150px;'>
	</td>
	</tr><tr>
	<td width='200' class='tbl' align='right'>".$locale['zwar_0811']."</td>
	<td width='70%' class='tbl'>
		<input type='text' name='zwar_clan_name' value='$zwar_clan_name' maxlength='50' class='textbox' style='width:150px;'>
	</td>
	</tr><tr>
	<td width='200' class='tbl' align='right'>".$locale['zwar_0823']."</td>
	<td width='70%' class='tbl'>
		<input type='text' name='zwar_default_page' value='$zwar_default_page' maxlength='50' class='textbox' style='width:150px;'>
	</td>
	</tr><tr>
	<td width='200' class='tbl' align='right'>".$locale['zwar_0822']."</td>
	<td width='70%' class='tbl'>
		<input type='radio' name='zwar_joinus_public' value='0'".($zwar_joinus_public==0 ? " checked='checked'" : "")." />".$locale['zwar_0049']." | 
		<input type='radio' name='zwar_joinus_public' value='1'".($zwar_joinus_public==1 ? " checked='checked'" : "")." />".$locale['zwar_0050']."
	</td>
	</tr><tr>
	<td width='200' class='tbl' align='right'>".$locale['zwar_0804']."</td>
	<td width='70%' class='tbl'>
		<input type='radio' name='zwar_nomem_visible' value='1'".($zwar_nomem_visible==1 ? " checked='checked'" : "")." />".$locale['zwar_0049']." | 
		<input type='radio' name='zwar_nomem_visible' value='0'".($zwar_nomem_visible==0 ? " checked='checked'" : "")." />".$locale['zwar_0050']."
	</td>
	</tr><tr>
	<td width='200' class='tbl' align='right' valign='top'>".$locale['zwar_0813'].":</td>
	<td width='70%' class='tbl'>
		#<input type='text' name='zwar_colorwon' value='$zwar_colorwon' maxlength='6' class='textbox' style='width:50px; border-right:solid 15px; border-color:#$zwar_colorwon; margin-bottom:2px;' onkeyup=\"zwar_showcolor(this)\"> ".$locale['zwar_0008']."<br/>
		#<input type='text' name='zwar_colorlost' value='$zwar_colorlost' maxlength='6' class='textbox' style='width:50px; border-right:solid 15px; border-color:#$zwar_colorlost; margin-bottom:2px;' onkeyup=\"zwar_showcolor(this)\"> ".$locale['zwar_0009']."<br/>
		#<input type='text' name='zwar_colordraw' value='$zwar_colordraw' maxlength='6' class='textbox' style='width:50px; border-right:solid 15px; border-color:#$zwar_colordraw; margin-bottom:2px;' onkeyup=\"zwar_showcolor(this)\"> ".$locale['zwar_0010']."<br/>
		#<input type='text' name='zwar_coloractive' value='$zwar_coloractive' maxlength='6' class='textbox' style='width:50px; border-right:solid 15px; border-color:#$zwar_coloractive; margin-bottom:2px;' onkeyup=\"zwar_showcolor(this)\"> ".$locale['zwar_0069']."<br/>
		#<input type='text' name='zwar_colorinactive' value='$zwar_colorinactive' maxlength='6' class='textbox' style='width:50px; border-right:solid 15px; border-color:#$zwar_colorinactive; margin-bottom:2px;' onkeyup=\"zwar_showcolor(this)\"> ".$locale['zwar_0070']."<br/>
	</td>
	</tr><tr>
	<td width='200' class='tbl' align='right'>".$locale['zwar_0839']."</td>
	<td width='70%' class='tbl'>
		<input type='radio' name='zwar_squadinfo_open' value='1'".($zwar_squadinfo_open==1 ? " checked='checked'" : "")." />".$locale['zwar_0049']." | 
		<input type='radio' name='zwar_squadinfo_open' value='0'".($zwar_squadinfo_open==0 ? " checked='checked'" : "")." />".$locale['zwar_0050']."
	</td>
	</tr><tr>
	<td class='tbl2' colspan='2' align='center'><b>".$locale['zwar_0810']."</b></td>
	</tr><tr>
	<td width='200' class='tbl' align='right'>".$locale['zwar_0803']."<br/>".$locale['zwar_0805']."</td>
	<td width='70%' class='tbl'>
		<input type='text' name='zwar_closetime' value='$zwar_closetime' maxlength='2' class='textbox' style='width:50px;'>
	</td>
	</tr><tr>
	<td width='200' class='tbl' align='right'>".$locale['zwar_0835']."</td>
	<td width='70%' class='tbl'>
		".$locale['zwar_0836']." <input type='text' name='zwar_show_warsshort' value='$zwar_show_warsshort' maxlength='2' class='textbox' style='width:30px;'>
		".$locale['zwar_0837']." <input type='text' name='zwar_show_warslong' value='$zwar_show_warslong' maxlength='2' class='textbox' style='width:30px;'>
	</td>
	</tr><tr>
	<td width='200' class='tbl' align='right'>".$locale['zwar_0834']."</td>
	<td width='70%' class='tbl'>
		<input type='text' name='zwar_show_membercount' value='$zwar_show_membercount' maxlength='2' class='textbox' style='width:30px;'>
	</td>
	</tr><tr>
	<td width='200' class='tbl' align='right'>".$locale['zwar_0825']."</td>
	<td width='70%' class='tbl'>
		".$locale['zwar_0082'].": <input type='text' name='zwar_mappics_width' value='$zwar_mappics_width' maxlength='4' class='textbox' style='width:80px;'>&nbsp;x&nbsp;
		".$locale['zwar_0083'].": <input type='text' name='zwar_mappics_height' value='$zwar_mappics_height' maxlength='4' class='textbox' style='width:80px;'>
	</td>
	</tr><tr>
	<td width='200' class='tbl' align='right'>".$locale['zwar_0826']."</td>
	<td width='70%' class='tbl'>
		".$locale['zwar_0082'].": <input type='text' name='zwar_memberpics_width' value='$zwar_memberpics_width' maxlength='4' class='textbox' style='width:80px;'>&nbsp;x&nbsp;
		".$locale['zwar_0083'].": <input type='text' name='zwar_memberpics_height' value='$zwar_memberpics_height' maxlength='4' class='textbox' style='width:80px;'>
	</td>
	</tr><tr>
	<td width='200' class='tbl' align='right'>".$locale['zwar_0807']."</td>
	<td width='70%' class='tbl'><b><select name='zwar_group_warmember' class='textbox'>$visibility_warmember</select></b>
	</td>
	</tr><tr>
	<td width='200' class='tbl' align='right'>".$locale['zwar_0808']."</td>
	<td width='70%' class='tbl'><b><select name='zwar_group_warinfo' class='textbox'>$visibility_warinfo</select></b>
	</td>
	</tr><tr>
	<td width='200' class='tbl' align='right'>".$locale['zwar_0812']."</td>
	<td width='70%' class='tbl'><b><select name='zwar_group_war_comments' class='textbox'>$visibility_war_comments</select></b></td>
	</tr><tr>
	<td class='tbl2' colspan='2' align='center'><b>".$locale['zwar_0838']."</b></td>
	</tr><tr>
	<td width='200' class='tbl' align='right'>".$locale['zwar_0827']."<br/><span class='small'>".$locale['zwar_0828']."</span></td>
	<td width='70%' class='tbl'><input type='text' name='zwar_uploadtypes' value='".$zwar_uploadtypes."' maxlength='150' class='textbox' style='width:200px;' /></td>
	</tr><tr>
	<td width='200' class='tbl' align='right'>".$locale['zwar_0829']."</td>
	<td width='70%' class='tbl'><input type='text' name='zwar_uploadmax' value='".$zwar_uploadmax."' maxlength='150' class='textbox' style='width:100px;' /> ".$locale['zwar_0830']."</td>
	</tr><tr>
	<td width='200' class='tbl' align='right'>".$locale['zwar_0831']."</td>
	<td width='70%' class='tbl'>
	<input type='text' name='zwar_uploadlimit' value='".$zwar_uploadlimit."' maxlength='2' style='width:40px;' class='textbox'/>
	<input type='radio' value='1' name='zwar_uploadlimit_type' ".($zwar_uploadlimit_type==1 ? "checked='checked'" : "")."/> ".$locale['zwar_0832']."
	<input type='radio' value='2' name='zwar_uploadlimit_type' ".($zwar_uploadlimit_type==2 ? "checked='checked'" : "")."/> ".$locale['zwar_0833']."
	</td>
	</tr><tr>
	<td class='tbl2' colspan='2' align='center'><b>".$locale['zwar_0840']."</b></td>
	</tr><tr>
	<td width='200' class='tbl' align='right' valign='top'>".$locale['zwar_0841']."<br/><span class='small'>".$locale['zwar_0828']."</span></td>
	<td width='70%' class='tbl'><input type='text' name='zwar_messenger_types' class='textbox' value='$zwar_messenger_types' style='width:400px;' />
	</td>
	</tr><tr>
	<td width='200' class='tbl' align='right' valign='top'>".$locale['zwar_0842']."<br/><span class='small'>".$locale['zwar_0828']."</span></td>
	<td width='70%' class='tbl'><input type='text' name='zwar_voice_types' class='textbox' value='$zwar_voice_types' style='width:400px;' />
	</td>
	</tr><tr>
	<td class='tbl2' colspan='2' align='center'><b>".$locale['zwar_0814']."</b></td>
	</tr><tr>
	<td width='200' class='tbl' align='right' valign='top'>".$locale['zwar_0815'].":</td>
	<td width='70%' class='tbl'><input type='text' name='zwar_membermap_gkey' class='textbox' value='$zwar_membermap_gkey' style='width:400px;' /><br/>
	<a href='http://code.google.com/apis/maps/signup.html' target='blank'>".$locale['zwar_0843']."</a>
	</td>
	</tr><tr>
	<td width='200' class='tbl' align='right'>".$locale['zwar_0816'].":</td>
	<td width='70%' class='tbl'><select name='zwar_membermap_type' class='textbox' value='$zwar_membermap_type'>
	<option value='1' ".($zwar_membermap_type==1 ? "selected" : "").">".$locale['zwar_0817']."</option>
	<option value='2' ".($zwar_membermap_type==2 ? "selected" : "").">".$locale['zwar_0818']."</option>
	<option value='3' ".($zwar_membermap_type==3 ? "selected" : "").">".$locale['zwar_0819']."</option>
	</select>
	</td>
	</tr><tr>
	<td width='200' class='tbl' align='right'>".$locale['zwar_0824'].":</td>
	<td width='70%' class='tbl'><input type='text' name='zwar_membermap_zoom' class='textbox' value='$zwar_membermap_zoom' style='width:50px;' />
	</td>";
	if ($zwar_membermap_gkey != "") {
		add_to_head("<script src=\"http://www.google.com/jsapi?key=".$zwar_membermap_gkey."\" type=\"text/javascript\"></script>");
		echo "<tr>
		<td width='200' class='tbl' align='right' valign='top'>".$locale['zwar_0820'].":</td>
		<td width='70%' class='tbl'><input type='hidden' name='zwar_membermap_center' class='textbox' value='$zwar_membermap_center' />
		<div id='zwar_gmmap' style='width:400px; height:300px; overflow:auto;'>
		</div>
		</td>
		</tr>";
		$replacestring = "<script type=\"text/javascript\">
		google.load(\"maps\", \"2.x\");
		if(document.getElementById && document.createTextNode) {
		window.onload=function(){
		if (GBrowserIsCompatible()) {
		var gmmap = new GMap2(document.getElementById(\"zwar_gmmap\"));
		if (!gmmap.doubleClickZoomEnabled()) {gmmap.enableDoubleClickZoom();}
		if (!gmmap.continuousZoomEnabled()) {gmmap.enableContinuousZoom();}
		gmmap.setCenter(new GLatLng".$zwar_membermap_center.", ".$zwar_membermap_zoom.");
		gmmap.setMapType(G_DEFAULT_MAP_TYPES[".($zwar_membermap_type-1)."]);
		GEvent.addListener(gmmap, \"dragend\", function() {
			var pos = gmmap.getCenter();
	 		document.inputform.zwar_membermap_center.value = pos;
		});
		GEvent.addListener(gmmap, \"zoomend\", function() {
			var zoom = gmmap.getZoom();
			document.inputform.zwar_membermap_zoom.value = zoom;
		});
		}}}
		</script>";
		replace_in_output("</body>", "</body>\n".$replacestring."\n");
	} else {
		echo "<tr>
		<td width='200' class='tbl' align='right' valign='top'>".$locale['zwar_0820'].":</td>
		<td width='70%' class='tbl'><input type='hidden' name='zwar_membermap_center' class='textbox' value='$zwar_membermap_center' />
		".$locale['zwar_0821']."
		</div>
		</td>
		</tr>";
	}
	echo "<tr>
	<td align='center' colspan='2' class='tbl'>
	<input type='submit' name='save' class='button' value='".$locale['zwar_0005']."'>
	| <input type='submit' name='clear' class='button' value='".$locale['zwar_0006']."'>
	</td>
	</tr>
	</table></form><br/>";
	
	closetable();
}
?>