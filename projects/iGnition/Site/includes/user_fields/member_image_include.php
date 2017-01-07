<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: member_image_include.php
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

if (file_exists(INFUSIONS."zwar_warscript/locale/".$settings['locale'].".php")) {
	include_once INFUSIONS."zwar_warscript/locale/".$settings['locale'].".php";
} else {
	include_once INFUSIONS."zwar_warscript/locale/German.php";
}

if ($profile_method == "input") {
	if (iMEMBER && isset($user_data['member_image']) && $user_data['member_image']=="") {
		echo "<tr>
		<td class='tbl' valign='top'>".$locale['zwar_4021'].":</td>
		<td class='tbl'>
		<input type='file' name='member_image' class='textbox' style='width:200px;'><br>
		<span class='small2'>".$locale['u011']."</span><br>
		<span class='small2'>".sprintf($locale['u012'], parsebytesize(1024000), 600, 800)."<br>".$locale['zwar_4022']."</span>
		</td></tr>";
	} else if (iMEMBER && isset($user_data['member_image'])) {
		echo "<tr><td class='tbl' valign='top'>".$locale['zwar_4021'].":</td>
		<td class='tbl'>
		<img src='".INFUSIONS."zwar_warscript/images/members/TN".(isset($user_data['member_image']) ? $user_data['member_image'] : "")."' alt='".$locale['zwar_4021']."'><br>
		<input type='checkbox' name='del_member_image' value='y'> ".$locale['u013']."
		<input type='hidden' name='member_image' value='".$user_data['member_image']."'>\n
		</td></tr>";
	}
} elseif ($profile_method == "display" && $user_data['member_image'] != "" && file_exists(INFUSIONS."zwar_warscript/images/members/".$user_data['member_image'])) {
	echo "<tr>\n";
	echo "<td width='1%' class='tbl1' style='white-space:nowrap' valign='top'>".$locale['zwar_4021']."</td>\n";
	echo "<td align='right' class='tbl1'><img style='vertical-align:middle;border:none' src='".INFUSIONS."zwar_warscript/images/members/TN".$user_data['member_image']."' alt='".$user_data['user_name']."'width='60' height='80'/></td>\n";
	echo "</tr>\n";
} elseif ($profile_method == "validate_insert") {
	$newimage = isset($_FILES['member_image']) ? $_FILES['member_image'] : "";
	if (isset($user_data) && $user_data['member_image'] == "" && !empty($newimage['name']) && is_uploaded_file($newimage['tmp_name'])) {
		$imageext = strrchr($newimage['name'],".");
		$imagename = substr($newimage['name'], 0, strrpos($newimage['name'], "."));
		if (preg_match("/^[-0-9A-Z_\[\]]+$/i", $imagename) && preg_match("/(\.gif|\.GIF|\.jpg|\.JPG|\.png|\.PNG)$/", $imageext) && $newimage['size'] <= 1024000) {
			$imagename = $imagename."[".$user_data['user_id']."]".$imageext;
			$db_fields .= ", member_image";
			$db_values .= ", '".$imagename."'";
			move_uploaded_file($newimage['tmp_name'], INFUSIONS."zwar_warscript/images/members/".$imagename);
			chmod(INFUSIONS."zwar_warscript/images/members/".$imagename,0644);
			if ($size = @getimagesize(INFUSIONS."zwar_warscript/images/members/".$imagename)) {
				// thumbNAILS
				if($size[2]==1) {
				// GIF
				$originalimage = imagecreatefromgif(INFUSIONS."zwar_warscript/images/members/".$imagename);
				$thumbimage = imagecreatetruecolor(150,200);
				 imageCopyResized($thumbimage,$originalimage,0,0,0,0,150,200,$size['0'],$size['1']);
				 imageGIF($thumbimage,INFUSIONS."zwar_warscript/images/members/"."TN".$imagename);
				}
				if($size[2]==2) {
				// JPG
				$originalimage = imagecreatefromJPEG(INFUSIONS."zwar_warscript/images/members/".$imagename);
				$thumbimage = imagecreatetruecolor(150,200);
				 imageCopyResized($thumbimage,$originalimage,0,0,0,0,150,200,$size['0'],$size['1']);
				 imageJPEG($thumbimage,INFUSIONS."zwar_warscript/images/members/"."TN".$imagename);
				}
				
				if($size[2]==3) {
				// PNG
				$originalimage = imagecreatefromPNG(INFUSIONS."zwar_warscript/images/members/".$imagename);
				$thumbimage = imagecreatetruecolor(150,200);
				 imageCopyResized($thumbimage,$originalimage,0,0,0,0,150,200,$size['0'],$size['1']);
				 imagePNG($thumbimage,INFUSIONS."zwar_warscript/images/members/"."TN".$imagename);
				}
				//thumbNails end		
				if ($size['0'] > 600 || $size['1'] > 800) {
					unlink(INFUSIONS."zwar_warscript/images/members/".$imagename);
					unlink(INFUSIONS."zwar_warscript/images/members/TN".$imagename);
				} elseif (!verify_image(INFUSIONS."zwar_warscript/images/members/".$imagename)) {
					unlink(INFUSIONS."zwar_warscript/images/members/".$imagename);
					unlink(INFUSIONS."zwar_warscript/images/members/TN".$imagename);
				}
			} else {
				unlink(INFUSIONS."zwar_warscript/images/members/".$imagename);
				unlink(INFUSIONS."zwar_warscript/images/members/TN".$imagename);
			}
		}
	}
	if (isset($_POST['del_member_image'])) {
		$db_fields .= ", member_image";
		$db_values .= ", ''";
		unlink(INFUSIONS."zwar_warscript/images/members/".$user_data['member_image']);
		unlink(INFUSIONS."zwar_warscript/images/members/TN".$user_data['member_image']);
	}
} elseif ($profile_method == "validate_update") {
	$newimage = isset($_FILES['member_image']) ? $_FILES['member_image'] : "";
	if (isset($user_data) && $user_data['member_image'] == "" && !empty($newimage['name']) && is_uploaded_file($newimage['tmp_name'])) {
		$imageext = strrchr($newimage['name'],".");
		$imagename = substr($newimage['name'], 0, strrpos($newimage['name'], "."));
		if (preg_match("/^[-0-9A-Z_\[\]]+$/i", $imagename) && preg_match("/(\.gif|\.GIF|\.jpg|\.JPG|\.png|\.PNG)$/", $imageext) && $newimage['size'] <= 1024000) {
			$imagename = $imagename."[".$user_data['user_id']."]".$imageext;
			$db_values .= ", member_image='".$imagename."'";
			move_uploaded_file($newimage['tmp_name'], INFUSIONS."zwar_warscript/images/members/".$imagename);
			chmod(INFUSIONS."zwar_warscript/images/members/".$imagename,0644);
			if ($size = @getimagesize(INFUSIONS."zwar_warscript/images/members/".$imagename)) {
				// thumbNAILS
				if($size[2]==1) {
				// GIF
				$originalimage = imagecreatefromgif(INFUSIONS."zwar_warscript/images/members/".$imagename);
				$thumbimage = imagecreatetruecolor(150,200);
				 imageCopyResized($thumbimage,$originalimage,0,0,0,0,150,200,$size['0'],$size['1']);
				 imageGIF($thumbimage,INFUSIONS."zwar_warscript/images/members/"."TN".$imagename);
				}
				if($size[2]==2) {
				// JPG
				$originalimage = imagecreatefromJPEG(INFUSIONS."zwar_warscript/images/members/".$imagename);
				$thumbimage = imagecreatetruecolor(150,200);
				 imageCopyResized($thumbimage,$originalimage,0,0,0,0,150,200,$size['0'],$size['1']);
				 imageJPEG($thumbimage,INFUSIONS."zwar_warscript/images/members/"."TN".$imagename);
				}
				
				if($size[2]==3) {
				// PNG
				$originalimage = imagecreatefromPNG(INFUSIONS."zwar_warscript/images/members/".$imagename);
				$thumbimage = imagecreatetruecolor(150,200);
				 imageCopyResized($thumbimage,$originalimage,0,0,0,0,150,200,$size['0'],$size['1']);
				 imagePNG($thumbimage,INFUSIONS."zwar_warscript/images/members/"."TN".$imagename);
				}
				//thumbNails end		
				if ($size['0'] > 600 || $size['1'] > 800) {
					unlink(INFUSIONS."zwar_warscript/images/members/".$imagename);
					unlink(INFUSIONS."zwar_warscript/images/members/TN".$imagename);
				} elseif (!verify_image(INFUSIONS."zwar_warscript/images/members/".$imagename)) {
					unlink(INFUSIONS."zwar_warscript/images/members/".$imagename);
					unlink(INFUSIONS."zwar_warscript/images/members/TN".$imagename);
				}
			} else {
				unlink(INFUSIONS."zwar_warscript/images/members/".$imagename);
				unlink(INFUSIONS."zwar_warscript/images/members/TN".$imagename);
			}
		}
	}
	if (isset($_POST['del_member_image'])) {
		$db_values .= ", member_image=''";
		unlink(INFUSIONS."zwar_warscript/images/members/".$user_data['member_image']);
		unlink(INFUSIONS."zwar_warscript/images/members/TN".$user_data['member_image']);
	}
}
?>