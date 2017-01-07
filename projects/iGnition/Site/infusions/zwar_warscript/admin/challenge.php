<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: challenge.php
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
if (isset($_GET['challenge_id']) && !isnum($_GET['challenge_id'])) { redirect(FUSION_SELF); }

if (isset($_GET['action']) && $_GET['action']=="delete") {
	$result = dbquery("DELETE FROM ".DB_ZWAR_CHALLENGES." WHERE challenge_id='".$_GET['challenge_id']."'");
	redirect(FUSION_SELF.$aidlink."&pagefile=challenge&status=del");
} else {
	opentable($locale['zwar_2103']);
	$result = dbquery("SELECT * FROM ".DB_ZWAR_CHALLENGES." ORDER BY challenge_date_add");
	if (dbrows($result)) {
		echo "<table cellpadding='0' cellspacing='0' width='500' class='tbl-border center'><tr>
			<td class='tbl2'><strong>".$locale['zwar_2104']."</strong></td>
			<td class='tbl2'><strong>".$locale['zwar_2105']."</strong></td>
			<td class='tbl2'>&nbsp;</td></tr>";
		while ($data = dbarray($result)) {
			$cell_color = "tbl";
			$challenge_date_add=date("d.m.'y - H:i",$data['challenge_date_add']);
			$challenge_date=($data['challenge_date']!=0 ? date("d.m.'y - H:i",$data['challenge_date']) : $locale['zwar_0060']);
			echo "<tr><td class='$cell_color' style='white-space:nowrap;' width='1%'>".$challenge_date."</td>
			<td class='$cell_color'>
				".$locale['zwar_2107']."".$challenge_date_add."".($data['challenge_contact1']=="" ? $locale['zwar_2108'] : $locale['zwar_2109']."<b>".$data['challenge_contact1']."</b>")."
			</td>
			<td class='$cell_color' style='white-space:nowrap;' align='right' width='1%'>
				<a href='".FUSION_SELF.$aidlink."&amp;pagefile=editwars&amp;action=add&amp;challenge_id=".$data['challenge_id']."'>".zwar_images("view",$locale['zwar_0061'])."</a>
				<a href='".FUSION_SELF.$aidlink."&amp;pagefile=challenge&amp;action=delete&amp;challenge_id=".$data['challenge_id']."' onclick='return Deleteconfirm();'>".zwar_images("del",$locale['zwar_0051'])."</a>
			</td></tr>";
		}
		echo "</table><br/>";
	} else {
		echo "<br/><br/><center><b>".$locale['zwar_2112']."</b></center><br/><br/>";
	}
	closetable();

	echo "<script type='text/javascript'>
	function Deleteconfirm() {
		return confirm('".$locale['zwar_2113']."');
	}
	</script>\n";
}
?>