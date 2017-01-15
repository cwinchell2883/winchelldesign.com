<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: memberlist.php
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

if (isset($_GET['item_id']) && !isNum($_GET['item_id'])) { redirect(FUSION_SELF.$aidlink."&pagefile=memberlist"); }
if (isset($_GET['item_id'])) {
  $item_id = $_GET['item_id'];	
} else {
  unset($item_id);
}

$itemtypes_array = array (
	1 => $locale['zwar_1201'],
	2 => $locale['zwar_1202'],
	3 => $locale['zwar_1203']
);

if (isset($_GET['status']) && !isset($message)) {
	if ($_GET['status'] == "su" || $_GET['status'] == "sn") {
		$message = "<b>".$locale['zwar_1204']."</b>";
	} elseif ($_GET['status'] == "del") {
		$message = "<b>".$locale['zwar_1204']."</b>";
	}
	if ($message) {	echo "<div class='admin-message'>".$message."</div>\n"; }
}

if (isset($_POST['clear'])) {
	redirect(FUSION_SELF.$aidlink."&pagefile=memberlist");
} elseif (isset($_POST['save'])) {
	$error="";
	$list_item_type = isset($_POST['list_item_type']) && isnum($_POST['list_item_type']) ? $_POST['list_item_type'] : 0;
	if ($list_item_type == 0) { $error.="kein Typ gewählt<br/>\n"; }
	$list_item = isset($_POST['list_item']) && isnum($_POST['list_item']) ? $_POST['list_item'] : 0;
	if ($list_item == 0 && $list_item_type != 3) { $error.=$locale['zwar_1206']."<br/>\n"; }
	$list_item_image = "";
	$list_item_image = isset($_POST['list_item_image']) && file_exists(INFUSIONS."zwar_warscript/images/groups/".$_POST['list_item_image']) ? $_POST['list_item_image'] : "";
	$list_item_order = isset($_POST['list_item_order']) && isnum($_POST['list_item_order']) ? $_POST['list_item_order'] : "";
	$list_item_open = isset($_POST['list_item_open']) && isnum($_POST['list_item_open']) ? $_POST['list_item_open'] : 1;
	$list_teambanner_align = isset($_POST['list_teambanner_align']) && isnum($_POST['list_teambanner_align']) ? $_POST['list_teambanner_align'] : 1;
	$list_teambanner_showinfo = isset($_POST['list_teambanner_showinfo']) && isnum($_POST['list_teambanner_showinfo']) ? $_POST['list_teambanner_showinfo'] : 1;
	$list_teambanner_infoalign = isset($_POST['list_teambanner_infoalign']) && isnum($_POST['list_teambanner_infoalign']) ? $_POST['list_teambanner_infoalign'] : 1;
	
	if ($error=="") {
		if (isset($_GET['action']) && $_GET['action'] == "edit" && isset($item_id)) {
			$old_list_item_order = dbresult(dbquery("SELECT list_item_order FROM ".DB_ZWAR_MEMBER_LIST." WHERE list_item_id='$item_id'"), 0);
			if ($list_item_order > $old_list_item_order) {
				$result = dbquery("UPDATE ".DB_ZWAR_MEMBER_LIST." SET list_item_order=list_item_order-1 WHERE list_item_order>'$old_list_item_order' AND list_item_order<='$list_item_order'");
			} elseif ($list_item_order < $old_list_item_order) {
				$result = dbquery("UPDATE ".DB_ZWAR_MEMBER_LIST." SET list_item_order=list_item_order+1 WHERE list_item_order<'$old_list_item_order' AND list_item_order>='$list_item_order'");
			}
			$result = dbquery("UPDATE ".DB_ZWAR_MEMBER_LIST." SET list_item_type='$list_item_type', list_item='$list_item', list_item_image='$list_item_image', list_item_order='$list_item_order', list_item_open='$list_item_open', list_teambanner_align='$list_teambanner_align', list_teambanner_showinfo='$list_teambanner_showinfo', list_teambanner_infoalign='$list_teambanner_infoalign' WHERE list_item_id='$item_id'");
			redirect(FUSION_SELF.$aidlink."&pagefile=memberlist&status=su");
		} else {
			if(!$list_item_order) { $list_item_order=dbresult(dbquery("SELECT MAX(list_item_order) FROM ".DB_ZWAR_MEMBER_LIST),0)+1; }
			$result = dbquery("UPDATE ".DB_ZWAR_MEMBER_LIST." SET list_item_order=list_item_order+1 WHERE list_item_order>='$list_item_order'");	
			$result = dbquery("INSERT INTO ".DB_ZWAR_MEMBER_LIST." (list_item_type, list_item, list_item_image, list_item_order, list_item_open, list_teambanner_align, list_teambanner_showinfo, list_teambanner_infoalign) VALUES ('$list_item_type', '$list_item' , '$list_item_image', '$list_item_order', '$list_item_open', '$list_teambanner_align', '$list_teambanner_showinfo', '$list_teambanner_infoalign')");
			redirect(FUSION_SELF.$aidlink."&pagefile=memberlist&status=sn");
		}
	} else {
		opentable($locale['zwar_0053']);
		echo "<center><br/>".$error."<br/><br/><a href='javascript:history.back()'><< ".$locale['zwar_0001']."</a></center>";
		closetable();
	}
} elseif (isset($_GET['action']) && $_GET['action'] == "del" && isset($item_id)) {
	$data = dbarray(dbquery("SELECT * FROM ".DB_ZWAR_MEMBER_LIST." WHERE list_item_id='$item_id'"));
	$result = dbquery("UPDATE ".DB_ZWAR_MEMBER_LIST." SET list_item_order=list_item_order-1 WHERE list_item_order>'".$data['list_item_order']."'");
	$result = dbquery("DELETE FROM ".DB_ZWAR_MEMBER_LIST." WHERE list_item_id='$item_id'");
	redirect(FUSION_SELF.$aidlink."&pagefile=memberlist&status=del");
} else {
	opentable($locale['zwar_1207']);
	$i=0;
	$result = dbquery("(SELECT cml.*, cmg.group_name FROM ".DB_ZWAR_MEMBER_LIST." AS cml INNER JOIN ".DB_ZWAR_SQUADS." AS cmg ON (cml.list_item_type='2' AND cml.list_item=cmg.group_id)) UNION (SELECT cml.*, ug.group_name FROM ".DB_ZWAR_MEMBER_LIST." AS cml INNER JOIN ".DB_USER_GROUPS." AS ug ON (cml.list_item_type='1' AND cml.list_item=ug.group_id)) UNION (SELECT cml.*, '' AS group_name FROM ".DB_ZWAR_MEMBER_LIST." AS cml WHERE cml.list_item_type='3') ORDER BY list_item_order");
	if (dbrows($result)) {
		echo "<table cellpadding='0' cellspacing='1' class='tbl-border center' width='500'><tr>
			<td class='tbl2'><strong>".$locale['zwar_1208']."</strong></td>
			<td class='tbl2'><strong>".$locale['zwar_1209']."</strong></td>
			<td class='tbl2'><strong>".$locale['zwar_1210']."</strong></td>
			<td class='tbl2'><strong>".$locale['zwar_1211']."</strong></td>
			<td width='1%' style='white-space:nowrap;' class='tbl2'></td>
			</tr>";
		while($data=dbarray($result)) {
			$row_color = ($i % 2 == 0 ? "tbl1" : "tbl2"); $i++;
			echo "<tr>
			<td class='$row_color'>".$data['group_name']."</td>
			<td class='$row_color'>".$itemtypes_array[$data['list_item_type']]."</td>
			<td class='$row_color'>".$data['list_item_order']."</td>
			<td class='$row_color'>".($data['list_item_open'] == 0 ? $locale['zwar_0050'] : $locale['zwar_0049'])."</td>
			<td width='1%' style='white-space:nowrap;' class='$row_color'>
			<a href='".FUSION_SELF.$aidlink."&amp;pagefile=memberlist&amp;action=del&amp;item_id=".$data['list_item_id']."'>".zwar_images("del",$locale['zwar_0051'])."</a>
			<a href='".FUSION_SELF.$aidlink."&amp;pagefile=memberlist&amp;action=edit&amp;item_id=".$data['list_item_id']."'>".zwar_images("edit",$locale['zwar_0003'])."</a>
			</td>
			</tr>";
		}
		echo "</table><br/>";
	}
	closetable();
	
	if (isset($_GET['action']) && $_GET['action'] == "edit" && isset($item_id)) {
		$result = dbquery("SELECT * FROM ".DB_ZWAR_MEMBER_LIST." WHERE list_item_id='$item_id'");
		if (dbrows($result)) {
			$data = dbarray($result);
			$list_item_type = isset($_POST['list_item_type']) && isnum($_POST['list_item_type']) ? $_POST['list_item_type'] : $data['list_item_type'];
			$list_item = isset($_POST['list_item']) && isnum($_POST['list_item']) ? $_POST['list_item'] : $data['list_item'];
			$list_item_image = isset($_POST['list_item_image']) ? stripinput($_POST['list_item_image']) : $data['list_item_image'];
			$list_item_order = isset($_POST['list_item_order']) && isnum($_POST['list_item_order']) ? $_POST['list_item_order'] : $data['list_item_order'];
			$list_item_open = isset($_POST['list_item_open']) && isnum($_POST['list_item_open']) ? $_POST['list_item_open'] : $data['list_item_open'];
			$list_teambanner_align = isset($_POST['list_teambanner_align']) && isnum($_POST['list_teambanner_align']) ? $_POST['list_teambanner_align'] : $data['list_teambanner_align'];
			$list_teambanner_showinfo = isset($_POST['list_teambanner_showinfo']) && isnum($_POST['list_teambanner_showinfo']) ? $_POST['list_teambanner_showinfo'] : $data['list_teambanner_showinfo'];
			$list_teambanner_infoalign = isset($_POST['list_teambanner_infoalign']) && isnum($_POST['list_teambanner_infoalign']) ? $_POST['list_teambanner_infoalign'] : $data['list_teambanner_infoalign'];
			$input_title = sprintf($locale['zwar_1212'], $list_item_order);
			$action="&amp;action=edit&amp;item_id=$item_id";
			$cancelbtn = " | <input type='submit' name='clear' value='".$locale['zwar_0006']."' class='button'>";
		} else {
			redirect(FUSION_SELF.$aidlink."&amp;pagefile=memberlist");
		}
	} else {
		$list_item_type = isset($_POST['list_item_type']) && isnum($_POST['list_item_type']) ? $_POST['list_item_type'] : 1;
		$list_item = isset($_POST['list_item']) && isnum($_POST['list_item']) ? $_POST['list_item'] : 0;
		$list_item_image = isset($_POST['list_item_image']) ? stripinput($_POST['list_item_image']) : "";
		$list_item_order = isset($_POST['list_item_order']) && isnum($_POST['list_item_order']) ? $_POST['list_item_order'] : 0;
		$list_item_open = isset($_POST['list_item_open']) && isnum($_POST['list_item_open'])? $_POST['list_item_open'] : 1;
		$list_teambanner_align = isset($_POST['list_teambanner_align']) && isnum($_POST['list_teambanner_align']) ? $_POST['list_teambanner_align'] : 1;
		$list_teambanner_showinfo = isset($_POST['list_teambanner_showinfo']) && isnum($_POST['list_teambanner_showinfo']) ? $_POST['list_teambanner_showinfo'] : 1;
		$list_teambanner_infoalign = isset($_POST['list_teambanner_infoalign']) && isnum($_POST['list_teambanner_infoalign']) ? $_POST['list_teambanner_infoalign'] : 3;
		$input_title = $locale['zwar_1213'];
		$action="";
		$cancelbtn = "";
	}
	
	$itemlist = ""; $prev_itemname = ""; $prev_itemgames = "";
	if ($list_item_type==1) {
		$display_grlist = true; $display_opensel = true; $display_imagesel = true; $display_tb = true;
		if (!$groups_cache) { cache_groups(); }
		if (is_array($groups_cache) && count($groups_cache)) {
			while(list($key, $user_group) = each($groups_cache)){
				$sel = "";
				if ($list_item == $user_group['group_id']) {
					$sel = " selected='selected'";
					$prev_itemname = $user_group['group_name'];
				}
				$itemlist .= "<option value='".$user_group['group_id']."'$sel>".$user_group['group_name']."</option>\n";
			}
		} else {
			$itemlist = "<option value='0'>".$locale['zwar_1214']."</option>\n";
		}
	} else if ($list_item_type==2) {
		$display_grlist = true; $display_opensel = true; $display_imagesel = false; $display_tb = false;
		$result = dbquery("SELECT group_id, group_name, group_games FROM ".DB_ZWAR_SQUADS);
		if (dbrows($result)) {
			while($data=dbarray($result)) {
				$sel = "";
				if ($list_item == $data['group_id']) {
					$sel = " selected='selected'";
				}
				$itemlist .= "<option value='".$data['group_id']."' $sel>".$data['group_name']."</option>\n";
			}
		}
	} else {
		$display_grlist = false; $display_opensel = false; $display_imagesel = false; $display_tb = false;
		$itemlist = "<option value='0'>".$locale['zwar_1214']."</option>\n";
	}
	$pic_files = makefilelist(INFUSIONS."zwar_warscript/images/groups/", ".|..|index.php|repeat.jpg|Thumbs.db", true);	

	opentable($input_title);
	echo "<form name='inputform' method='post' action='".FUSION_SELF.$aidlink."&amp;pagefile=memberlist$action'>
	<table cellpadding='0' cellspacing='0' class='center'><tr>
	<td width='100' class='tbl' align='right'>".$locale['zwar_1209'].":</td>
	<td width='70%' class='tbl'>
	<b><select name='list_item_type' class='textbox' onchange='submit()' style='width:200px;'>
	<option value='1' ".($list_item_type==1 ? "selected" : "").">".$itemtypes_array[1]."</option>
	<option value='2' ".($list_item_type==2 ? "selected" : "").">".$itemtypes_array[2]."</option>
	<option value='3' ".($list_item_type==3 ? "selected" : "").">".$itemtypes_array[3]."</option>
	</select></b>
	</td>
	</tr>";
	if ($display_grlist) {
		echo "<tr>
		<td width='200' class='tbl' align='right'>".$locale['zwar_1215'].":</td>
		<td width='70%' class='tbl'>
		<b><select name='list_item' class='textbox' style='width:200px;'>$itemlist</select></b>
		</td>
		</tr>";
	}
	echo "<tr>
	<td width='200' class='tbl' align='right'>".$locale['zwar_1210'].":</td>
	<td width='70%' class='tbl'>
	<input type='text' name='list_item_order' value='$list_item_order' class='textbox' style='width:40px;'>
	</td>
	</tr>";
	if ($display_opensel) {
		echo "<tr>
		<td width='200' class='tbl' align='right' valign='top'>".$locale['zwar_1211']."? :</td>
		<td width='70%' class='tbl'>
		<input type='radio' name='list_item_open' value='0' ".($list_item_open==0 ? "checked" : "")."> ".$locale['zwar_0050']."
		<input type='radio' name='list_item_open' value='1' ".($list_item_open==1 ? "checked" : "")."> ".$locale['zwar_0049']."
		</td>
		</tr>";
	}
	if ($display_imagesel) {
		echo "<tr>
		<td width='200' class='tbl' align='right'>".$locale['zwar_1216'].":</td>
		<td width='70%' class='tbl'>
		<select name='list_item_image' class='textbox' style='width:200px;' onchange='submit()'>
		<option value=''>---</option>".makefileopts($pic_files, $list_item_image)."
		</select>&nbsp;".$locale['zwar_1217']."&nbsp;
		<select name='list_teambanner_align' class='textbox' style='width:60px;' onchange='submit()'>
		<option value='1' ".($list_teambanner_align == 1 ? "selected='selected'" : "").">".$locale['zwar_0089']."</option>
		<option value='2' ".($list_teambanner_align == 2 ? "selected='selected'" : "").">".$locale['zwar_0090']."</option>
		<option value='3' ".($list_teambanner_align == 3 ? "selected='selected'" : "").">".$locale['zwar_0091']."</option>
		</select>
		</td>
		</tr>";
	}
	if ($display_tb) {
		echo "<tr>
		<td width='200' class='tbl' align='right'>".$locale['zwar_1218'].":</td>
		<td width='70%' class='tbl'>
		<input type='radio' name='list_teambanner_showinfo' value='0' ".($list_teambanner_showinfo==0 ? "checked" : "")." onchange='submit()'> ".$locale['zwar_0050']."
		<input type='radio' name='list_teambanner_showinfo' value='1' ".($list_teambanner_showinfo==1 ? "checked" : "")." onchange='submit()'> ".$locale['zwar_0049']."
		&nbsp;".$locale['zwar_1217']."&nbsp;
		<select name='list_teambanner_infoalign' class='textbox' style='width:60px;' onchange='submit()'>
		<option value='1' ".($list_teambanner_infoalign == 1 ? "selected='selected'" : "").">".$locale['zwar_0089']."</option>
		<option value='3' ".($list_teambanner_infoalign == 3 ? "selected='selected'" : "").">".$locale['zwar_0091']."</option>
		</select>
		</td>
		</tr>";
		if (isset($_GET['action']) && $_GET['action'] == "edit" && isset($item_id)) {
			$banner_info = array(
				"image" => ($list_item_image != "" ? INFUSIONS."zwar_warscript/images/groups/".$list_item_image : ""),
				"name" => $prev_itemname,
				"team_gameicons" => display_zwar_games($prev_itemgames),
				"membercount" => "X ".$locale['zwar_0027'],
				"id" => 1,
				"updown_img" => zwar_images("up", "", true),
				"repeatimage" => INFUSIONS."zwar_warscript/images/groups/repeat.jpg",
				"banner_align" => $list_teambanner_align,
				"banner_showinfo" => $list_teambanner_showinfo,
				"banner_infoalign" => $list_teambanner_infoalign
			);
			echo "<tr><td class='tbl' colspan='2' align='center'><b>".$locale['zwar_0092']."</b><br/>";
			render_zwar_teambanner($banner_info);
			echo "</td></tr>";
		}
	}
	echo "<tr>
	<td class='tbl' colspan='2' align='center'>
	<input type='submit' name='save' value='".$locale['zwar_0005']."' class='button'>".$cancelbtn."	
	</td>
	</tr>
	</table></form><br/>";
	
	closetable();
}
?>