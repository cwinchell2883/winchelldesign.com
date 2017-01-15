<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: zwar_member_map.php
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
if ($zwar_settings_array['zwar_membermap_gkey'] == "") { redirect(FUSION_SELF); }
if (!isset($_GET['mopt'])) { $_GET['mopt']="all"; }

if (isset($_GET['mopt']) && $_GET['mopt']=="all")	{
	$mapwhere="";
} else {
	$mapwhere=" AND member_clanstatus='1'";
}

add_to_head("<script src=\"http://www.google.com/jsapi?key=".$zwar_settings_array['zwar_membermap_gkey']."\" type=\"text/javascript\"></script>");

opentable($locale['zwar_0380']);
echo "<div class='zwar-body'>";
add_to_title("&nbsp;-&nbsp;".$locale['zwar_0380']);

$result = dbquery("SELECT * FROM ".DB_USERS." WHERE member_mapmarker != ''$mapwhere");
$rows = dbrows($result);
echo '<div class="tbl-border tbl2" align="center" style="margin-bottom:3px;">
<div style="float:left;">
'.(isset($_GET['mopt']) && $_GET['mopt']=="members" ? "<b>" : "<a href='".FUSION_SELF."?page=member_map&amp;mopt=members'>").'
['.$locale['zwar_0381'].']
'.(isset($_GET['mopt']) && $_GET['mopt']=="members" ? "</b>" : "</a>").'
'.(isset($_GET['mopt']) && $_GET['mopt']=="all" ? "<b>" : "<a href='".FUSION_SELF."?page=member_map&amp;mopt=all'>").'
['.$locale['zwar_0382'].']
'.(isset($_GET['mopt']) && $_GET['mopt']=="all" ? "</b>" : "</a>").'
</div>
<div style="float:right;"><strong>'.$locale['zwar_0383'].': '.$rows.'</strong></div><div style="clear:both;"></div></div>
<div id="zwar_gmmap" style="width:100%; height:700px;"></div></div>';

closetable();

$replacestring = "<script type=\"text/javascript\">
<!--
google.load(\"maps\", \"2.x\");
if(document.getElementById && document.createTextNode) {
window.onload=function(){
if (GBrowserIsCompatible()) {
var gmmap = new GMap2(document.getElementById(\"zwar_gmmap\"));
gmmap.setCenter(new GLatLng".$zwar_settings_array['zwar_membermap_center'].", ".$zwar_settings_array['zwar_membermap_zoom'].");
gmmap.addControl(new GMapTypeControl());
gmmap.addControl(new GLargeMapControl());
gmmap.setMapType(G_DEFAULT_MAP_TYPES[".($zwar_settings_array['zwar_membermap_type']-1)."]);";
$result = dbquery("SELECT user_name, member_image, member_mapmarker FROM ".DB_USERS." WHERE member_mapmarker != '' $mapwhere");
if (dbrows($result)) {
	$i = 0;
	while ($data = dbarray($result)) {
		$i++;
		$replacestring .= "gmmgr = new GMarkerManager(gmmap);
		marker".$i." = new GMarker(new GLatLng".$data['member_mapmarker'].");
		gmmgr.addMarker(marker".$i.", 1);
		GEvent.addListener(marker".$i.", \"mouseover\", function() {marker".$i.".openInfoWindowHtml(\"<font style=\'color:#000000;\'><center><b>".$data['user_name']."</b><br/><img src=\'".INFUSIONS."zwar_warscript/images/members/".($data['member_image']=="" || !file_exists(INFUSIONS."zwar_warscript/images/members/".$data['member_image']) ? "anonym.jpg" : $data['member_image'])."\' alt=\'Member-Foto\' width=\'60\' height=\'80\'><br/>(".$locale['zwar_0384'].")</center></font>\");});
		GEvent.addListener(marker".$i.", \"mouseout\", function() {gmmap.closeInfoWindow();});
		GEvent.addListener(marker".$i.", \"click\", function() {zoom = (gmmap.getZoom()+2);
		if (zoom < 18) gmmap.setCenter(new GLatLng".$data['member_mapmarker'].", zoom);});";
	}
}
$replacestring .= "}}}\n--></script>";
replace_in_output("</body>", "\n".$replacestring."\n</body>");
?>