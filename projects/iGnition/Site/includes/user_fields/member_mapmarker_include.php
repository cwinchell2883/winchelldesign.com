<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: member_mapmarker_include.php
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
require_once INFUSIONS."zwar_warscript/infusion_db.php";
if ($zwar_settings_array['zwar_membermap_gkey'] != "") {

if (file_exists(INFUSIONS."zwar_warscript/locale/".$settings['locale'].".php")) {
	include_once INFUSIONS."zwar_warscript/locale/".$settings['locale'].".php";
} else {
	include_once INFUSIONS."zwar_warscript/locale/German.php";
}

if ($profile_method == "input") {
	add_to_head("<script src=\"http://www.google.com/jsapi?key=".$zwar_settings_array['zwar_membermap_gkey']."\" type=\"text/javascript\"></script>");
	$member_pos = isset($user_data['member_mapmarker']) ? $user_data['member_mapmarker'] : "";
	$gmmapcenter=($member_pos != "" ? $member_pos : $zwar_settings_array['zwar_membermap_center']);
	echo "<tr>\n";
	echo "<td class='tbl' valign='top'>".$locale['zwar_4061'].":</td>\n";
	echo "<td class='tbl'>".$locale['zwar_4062']."
	<div id='zwar_gmmap' style='width:100%; height:300px; overflow:auto;'></div><input name='member_mapmarker' type='hidden' value='".$member_pos."'/></td>\n";
	echo "</tr>\n";
	$replacestring = "<script type=\"text/javascript\">
	google.load(\"maps\", \"2.x\");
	if(document.getElementById && document.createTextNode) {
	window.onload=function(){
	if (GBrowserIsCompatible()) {
	var gmmap = new GMap2(document.getElementById(\"zwar_gmmap\"));
	if (!gmmap.doubleClickZoomEnabled()) {gmmap.enableDoubleClickZoom();}
	if (!gmmap.continuousZoomEnabled()) {gmmap.enableContinuousZoom();}
	gmmap.setCenter(new GLatLng".$gmmapcenter.", 5);
	gmmap.addControl(new GMapTypeControl());
	gmmap.addControl(new GLargeMapControl());
	gmmap.setMapType(G_DEFAULT_MAP_TYPES[".($zwar_settings_array['zwar_membermap_type']-1)."]);
	var dragmarker = new GMarker(new GLatLng".$gmmapcenter.", {draggable: true});
	gmmap.addOverlay(dragmarker);
	GEvent.addListener(dragmarker, \"dragend\", function() {
	  var pos = dragmarker.getPoint();
	  document.inputform.member_mapmarker.value = pos;
	});
	GEvent.addListener(gmmap, \"click\", function() {});
	}}}
	</script>";
	replace_in_output("</body>", "</body>\n".$replacestring."\n");
} elseif ($profile_method == "display") {
	//not used
} elseif ($profile_method == "validate_insert") {
	$db_fields .= ", member_mapmarker";
	$db_values .= ", '".(isset($_POST['member_mapmarker']) ? stripinput(trim($_POST['member_mapmarker'])) : "")."'";
} elseif ($profile_method == "validate_update") {
	$db_values .= ", member_mapmarker='".(isset($_POST['member_mapmarker']) ? stripinput(trim($_POST['member_mapmarker'])) : "")."'";
}

}
?>