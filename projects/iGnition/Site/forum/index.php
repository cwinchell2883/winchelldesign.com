<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2009 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: index.php
| Author: Nick Jones (Digitanium)
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/
require_once "../maincore.php";
require_once THEMES."templates/header.php";
include LOCALE.LOCALESET."forum/main.php";

if (!isset($lastvisited) || !isnum($lastvisited)) { $lastvisited = time(); }

add_to_title($locale['global_200'].$locale['400']);

opentable($locale['400']);
echo "<!--pre_forum_idx--><table cellpadding='0' cellspacing='1' width='100%' class='tbl-border forum_idx_table'>\n<tr>\n";
echo "<td colspan='2' class='tbl2'>".$locale['401']."</td>\n";
echo "<td align='center' width='1%' class='tbl2' style='white-space:nowrap'>".$locale['402']."</td>\n";
echo "<td align='center' width='1%' class='tbl2' style='white-space:nowrap'>".$locale['403']."</td>\n";
echo "<td width='1%' class='tbl2' style='white-space:nowrap'>".$locale['404']."</td>\n";
echo "</tr>\n";

$forum_list = ""; $current_cat = "";
$result = dbquery(
	"SELECT f.*, f2.forum_name AS forum_cat_name, u.user_id, u.user_name
	FROM ".DB_FORUMS." f
	LEFT JOIN ".DB_FORUMS." f2 ON f.forum_cat = f2.forum_id
	LEFT JOIN ".DB_USERS." u ON f.forum_lastuser = u.user_id
	WHERE ".groupaccess('f.forum_access')." AND f.forum_cat!='0' AND f.forum_parent='0' GROUP BY forum_id ORDER BY f2.forum_order ASC, f.forum_order ASC"
);
if (dbrows($result) != 0) {
	while ($data = dbarray($result)) {
		if ($data['forum_cat_name'] != $current_cat) {
			$current_cat = $data['forum_cat_name'];
			echo "<tr>\n<td colspan='5' class='forum-caption forum_cat_name'><!--forum_cat_name-->".$data['forum_cat_name']."</td>\n</tr>\n";
		}
		$moderators = "";
		if ($data['forum_moderators']) {
			$mod_groups = explode(".", $data['forum_moderators']);
			foreach ($mod_groups as $mod_group) {
				if ($moderators) $moderators .= ", ";
				$moderators .= $mod_group<101 ? "<a href='".BASEDIR."profile.php?group_id=".$mod_group."'>".getgroupname($mod_group)."</a>" : getgroupname($mod_group);
			}
		}
		$last_data = dbarray(dbquery("SELECT forum_id, forum_lastpost FROM ".DB_FORUMS." WHERE forum_id = '".$data['forum_id']."' OR forum_parent='".$data['forum_id']."' GROUP BY forum_lastpost DESC"));
	    $forum_match = "\|".$last_data['forum_lastpost']."\|".$last_data['forum_id'];
	   if ($last_data['forum_lastpost'] > $lastvisited) {
			if (iMEMBER && preg_match("({$forum_match}\.|{$forum_match}$)", $userdata['user_threads'])) {
				$fim = "<img src='".get_image("folder")."' alt='".$locale['561']."' />";
			} else {
				$fim = "<img src='".get_image("foldernew")."' alt='".$locale['560']."' />";
			}
		} else {
			$fim = "<img src='".get_image("folder")."' alt='".$locale['561']."' />";
		}
		echo "<tr>\n";
		echo "<td align='center' width='1%' class='tbl2' style='white-space:nowrap'>$fim</td>\n";
		echo "<td class='tbl1 forum_name'><!--forum_name--><a href='viewforum.php?forum_id=".$data['forum_id']."'>".$data['forum_name']."</a><br />\n";
		if ($data['forum_description'] || $moderators) {
			echo "<span class='small'>".$data['forum_description'].($data['forum_description'] && $moderators ? "<br />\n" : "");
			echo ($moderators ? "<strong>".$locale['411']."</strong>".$moderators."</span>\n" : "</span>\n")."<br />\n";
		}
		$threadcount = dbresult(dbquery("SELECT SUM(forum_threadcount) FROM ".DB_FORUMS." WHERE forum_parent='".$data['forum_id']."' OR forum_id='".$data['forum_id']."'"),0);
		$postcount = dbresult(dbquery("SELECT SUM(forum_postcount) FROM ".DB_FORUMS." WHERE forum_parent='".$data['forum_id']."' OR forum_id='".$data['forum_id']."'"),0);		
		$parent_result = dbquery("SELECT forum_id, forum_name, forum_parent FROM ".DB_FORUMS." WHERE ".groupaccess('forum_access')." AND forum_parent='".$data['forum_id']."'  ORDER BY forum_order");
		$i = dbrows($parent_result);
		$subforums = ($i > 0) ? "<span class='small'><strong>".$locale['412']."</strong> : " : "";
		echo $subforums;
		while($parent_data = dbarray($parent_result)){
			$i--;
			if ($parent_data['forum_id'] != $data['forum_id']) {
			
			echo "<a href='".FORUM."viewforum.php?forum_id=".$parent_data['forum_id']."'>".$parent_data['forum_name']."</a>";
			if($i > 0) echo " , ";
			}
		}	
		echo "</td>\n";
		$threadcount = ($threadcount == 0) ? "0" : $threadcount;
		$postcount = ($postcount == 0) ? "0" : $postcount;
		echo "<td align='center' width='1%' class='tbl2' style='white-space:nowrap'>".$threadcount."</td>\n";
		echo "<td align='center' width='1%' class='tbl1' style='white-space:nowrap'>".$postcount."</td>\n";
		echo "<td width='1%' class='tbl2' style='white-space:nowrap'>";
		$post = dbarray(dbquery("SELECT max(forum_lastpost) as lastpost FROM ".DB_FORUMS." WHERE forum_parent='".$data['forum_id']."'"));
		$condition = ($data['forum_lastpost'] > $post['lastpost']) ? $data['forum_lastpost'] : $post['lastpost'];
		$post_data = dbarray(dbquery("SELECT forum_lastpost, forum_lastuser, user_name FROM ".DB_FORUMS." LEFT JOIN ".DB_USERS." ON forum_lastuser=user_id WHERE forum_lastpost='".$condition."'"));
		    if ($post_data['forum_lastpost'] == 0) {
			    echo $locale['405']."</td>\n</tr>\n";
		    } else {
			    echo showdate("forumdate", $post_data['forum_lastpost'])."<br />\n";
	            echo "<span class='small'>".$locale['406']."<a href='".BASEDIR."profile.php?lookup=".$post_data['forum_lastuser']."'>".$post_data['user_name']."</a></span></td>\n";		   
			    echo "</tr>\n";
		    }
		
	}
} else {
	echo "<tr>\n<td colspan='5' class='tbl1'>".$locale['407']."</td>\n</tr>\n";
}
echo "</table><!--sub_forum_idx_table-->\n<table cellpadding='0' cellspacing='0' width='100%'>\n<tr>\n";
echo "<td class='forum'><br />\n";
echo "<img src='".get_image("foldernew")."' alt='".$locale['560']."' style='vertical-align:middle;' /> - ".$locale['409']."<br />\n";
echo "<img src='".get_image("folder")."' alt='".$locale['561']."' style='vertical-align:middle;' /> - ".$locale['410']."\n";
echo "</td><td align='right' valign='bottom' class='forum'>\n";
echo "<form name='searchform' method='get' action='".BASEDIR."search.php?stype=forums'>\n";
echo "<input type='hidden' name='stype' value='forums' />\n";
echo "<input type='text' name='stext' class='textbox' style='width:150px' />\n";
echo "<input type='submit' name='search' value='".$locale['550']."' class='button' />\n";
echo "</form>\n</td>\n</tr>\n</table><!--sub_forum_idx-->\n";
closetable();

require_once THEMES."templates/footer.php";
?>