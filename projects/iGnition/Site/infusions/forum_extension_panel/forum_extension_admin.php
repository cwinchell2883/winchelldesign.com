<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: forum_extension_admin.php
| Author: Max "Matonor" Toball
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/
require_once "../../maincore.php";
require_once THEMES."templates/admin_header.php";

include INFUSIONS."forum_extension_panel/forum_extension_core.php";

//if (!checkrights("FEXP") || !defined("iAUTH") || $_GET['aid'] != iAUTH) { redirect("../index.php"); }

if (file_exists($dir."locale/".$settings['locale'].".php")) {
	include $dir."locale/".$settings['locale'].".php";
} else {
	include $dir."locale/English.php";
}

if(isset($_POST['save_changes'])){
	$new_values = array();
	foreach($options as $key=>$value){
		if(isset($_POST[$key]) && $_POST[$key] == "1")
			$new_values[$key] = "1";
		else
			$new_values[$key] = "0";
	}
	dbquery("UPDATE ".DB_FORUM_EXT_PANEL." SET options='".implode("|", $new_values)."'");
	redirect(FUSION_SELF);
}

opentable($locale['forum_ext_title_admin']);
echo "<form action='".FUSION_SELF."' method='post'>
<strong> <input type='checkbox' value='1' name='forum_panel' ".($options['forum_panel'] ? "checked" : "")."/> ".$locale['forum_ext_title_forum']."</strong><br/>
<input type='checkbox' value='1' name='forum_stats' ".($options['forum_stats'] ? "checked" : "")."/> ".$locale['forum_ext_user_stats']."<br/>
<input type='checkbox' value='1' name='top_posters' ".($options['top_posters'] ? "checked" : "")."/> ".$locale['forum_ext_topposter']."<br/>
<input type='checkbox' value='1' name='user_stats' ".($options['user_stats'] ? "checked" : "")."/> ".$locale['forum_ext_general_stats']."<br/>
<br/>
<strong> <input type='checkbox' value='1' name='profile_panel' ".($options['profile_panel'] ? "checked" : "")."/> ".$locale['forum_ext_title_profile']."</strong><br/><br/>
<strong> <input type='checkbox' value='1' name='similar_threads' ".($options['similar_threads'] ? "checked" : "")."/> ".$locale['forum_ext_title_thread']."</strong><br/><br/>
<strong> <input type='checkbox' value='1' name='thread_preview' ".($options['thread_preview'] ? "checked" : "")."/> ".$locale['forum_ext_title_reply']."</strong><br/><br/>
<strong> <input type='checkbox' value='1' name='forum_observer' ".($options['forum_observer'] ? "checked" : "")."/> ".$locale['forum_ext_forum_observer']."</strong><br/><br/>
<strong> <input type='checkbox' value='1' name='skip_postify' ".($options['skip_postify'] ? "checked" : "")."/> ".$locale['forum_ext_skip_postify']."</strong><br/>
<input type='submit' name='save_changes' value='".$locale['forum_ext_submit']."' class='button' />
</form>";
closetable();

require_once THEMES."templates/footer.php";
?>