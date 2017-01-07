<?php
if (!defined("IN_FUSION")) { die("Access Denied"); }
require_once INCLUDES."theme_functions_include.php";
define("THEME_BULLET", " ");

function render_page($license=false)
{
	global $locale, $settings, $main_style, $userdata, $aidlink;

// Header:	
	// Define Page Size
	echo "<div id='wrapper' style='width:1042px;margin:0 auto'>";
	echo "<div class='container'>\n";
		
	// User Bar
	echo "<table border='0' cellspacing='0' cellpadding='0'>\n<tr>\n<td class='top'>\n";
	if (iMEMBER){
		// If Admin then...
		if (iADMIN && (iUSER_RIGHTS != "" || iUSER_RIGHTS != "C")) {
			// Link System Settings
			echo "<a href='".ADMIN."index.php".$aidlink."' class='side'>\n";
			echo "<img src='".THEME."images/adminn.png' alt='Admin Settings' width='20' height='20' />\n";
			echo "</a>\n";
		}
		// Link Profile Settings
		echo "<a href='".BASEDIR."edit_profile.php' class='side'>\n";
		echo "<img src='".THEME."images/settingss.png' alt='Profile Settings' width='20' height='20' />\n";
		echo "</a>\n";
		// Get Message Count
		$msg_count = dbcount("(message_id)", DB_MESSAGES, "message_to='".$userdata['user_id']."' AND message_read='0' AND message_folder='0'");
		// If Message Count > 0, Display New Mail Icon
		if ($msg_count) {
			// Link Messages
			echo "<a href='".BASEDIR."messages.php' class='side'>\n";
			echo "<img src='".THEME."images/mailn.png' alt='New Message' width='20' height='20' />\n";
			echo "</a>\n";
		} else {
			echo "<a href='".BASEDIR."messages.php' class='side'>\n";
			echo "<img src='".THEME."images/mail.png' alt='Mailbox' width='20' height='20' />\n";
			echo "</a>\n";
		}
		// Link Logout
		echo "<a href='".BASEDIR."setuser.php?logout=yes' class='side'>\n";
		echo "<img src='".THEME."images/logout.png' alt='Log Out' width='20' height='20' />\n";
		echo "</a>\n";
	} else {
		echo "<form name='loginform' method='post' action='".FUSION_SELF."'>\n";
		echo "<input type='text' name='user_name' class='textbox' style='width:100px' /> ";
		echo "<input type='password' name='user_pass' class='textbox' style='width:100px' /> ";
		echo "<input type='submit' name='login' value='Login' />\n";
		echo "</form>\n";
	}
	echo "</td>\n</tr>\n</table>\n\n";
	
	// Banners
	echo showbanners();
	
// Menu Bar:
	echo "<div class='csmenu'>";
	echo "<img src='".THEME."images/left.jpg' width='56' height='33' alt='' />";
	echo "<a href='".BASEDIR."index.php' onmouseout='MM_swapImgRestore()' onmouseover=\"MM_swapImage('Image30','','".THEME."images/homehover.jpg',1)\"><img src='".THEME."images/home.jpg' width='83' height='33' name='Image30' id='Image30' alt='' /></a>";
	echo "<a href='".BASEDIR."forum/index.php' onmouseout='MM_swapImgRestore()' onmouseover=\"MM_swapImage('Image31','','".THEME."images/forumhover.jpg',1)\"><img src='".THEME."images/forum.jpg' width='108' height='33' name='Image31' id='Image31' alt='' /></a>";
	echo "<a href='".BASEDIR."#' onmouseout='MM_swapImgRestore()' onmouseover=\"MM_swapImage('Image32','','".THEME."images/rosterhover.jpg',1)\"><img src='".THEME."images/roster.jpg' width='93' height='33' name='Image32' id='Image32' alt='' /></a>";
	echo "<a href='".BASEDIR."#' onmouseout='MM_swapImgRestore()' onmouseover=\"MM_swapImage('Image33','','".THEME."images/matcheshover.jpg',1)\"><img src='".THEME."images/matches.jpg' width='114' height='33' name='Image33' id='Image33' alt='' /></a>";
	echo "<a href='".BASEDIR."downloads.php' onmouseout='MM_swapImgRestore()' onmouseover=\"MM_swapImage('Image34','','".THEME."images/downloadshover.jpg',1)\"><img src='".THEME."images/downloads.jpg' width='116' height='33' name='Image34' id='Image34' alt='' /></a>";
	echo "<a href='".BASEDIR."articles.php' onmouseout='MM_swapImgRestore()' onmouseover=\"MM_swapImage('Image35','','".THEME."images/mediahover.jpg',1)\"><img src='".THEME."images/media.jpg' width='102' height='33' name='Image35' id='Image35' alt='' /></a>";
	echo "<a href='".BASEDIR."#' onmouseout='MM_swapImgRestore()' onmouseover=\"MM_swapImage('Image36','','".THEME."images/galleryhover.jpg',1)\"><img src='".THEME."images/gallery.jpg' width='102' height='33' name='Image36' id='Image36' alt='' /></a>";
	echo "<a href='".BASEDIR."#' onmouseout='MM_swapImgRestore()' onmouseover=\"MM_swapImage('Image37','','".THEME."images/sponsorshover.jpg',1)\"><img src='".THEME."images/sponsors.jpg' width='114' height='33' name='Image37' id='Image37' alt='' /></a>";
	echo "<a href='".BASEDIR."weblinks.php' onmouseout='MM_swapImgRestore()' onmouseover=\"MM_swapImage('Image38','','".THEME."images/linkagehover.jpg',1)\"><img src='".THEME."images/linkage.jpg' width='102' height='33' name='Image38' id='Image38' alt='' /></a>";
	echo "<img src='".THEME."images/right.jpg' width='52' height='33' alt='' />";
	echo "</div>\n";
	echo "<div class='divider'></div>\n\n";

// Content
  	echo "<table cellpadding='0' cellspacing='0' class='$main_style'>\n<tr>\n";
  	echo (LEFT ? "<td class='side-border-left' valign='top'>\n".LEFT."\n</td>\n" : "");
	echo "<td class='main-bg' valign='top'>\n".U_CENTER.CONTENT.L_CENTER."\n</td>\n";
	echo (RIGHT ? "<td class='side-border-right' valign='top'>\n".RIGHT."\n</td>\n" : "");
	echo "</tr>\n</table>\n";
	
// Footer:
	echo "<div class='spacer'></div>";
	echo "<table>\n<tr>\n";
	echo "<td class='valign3 footer'><font class='copy'>".stripslashes($settings['footer'])."</font>".sprintf($locale['global_172'], substr((get_microtime() - START_TIME),0,4)).", ".showcounter()."</td>\n";
	echo "</tr>\n</table>\n</div></div>\n";
}

function render_news($subject, $news, $info) {
	
	echo "<table cellpadding='0' cellspacing='0' width='100%'>\n<tr>\n";
	echo "<td class='capmain-left'></td>\n";
	echo "<td class='capmain'>".$subject."</td>\n";
	echo "<td class='capmain-right'></td>\n";
	echo "</tr>\n</table>\n";
	echo "<table width='100%' cellpadding='0' cellspacing='0' class='spacer'>\n<tr>\n";
	echo "<td class='main-body middle-border'>".$news."</td>\n";
	echo "</tr>\n<tr>\n";
	echo "<td align='center' class='news-footer middle-border'>\n";
	echo newsposter($info," &middot;").newsopts($info,"&middot;").itemoptions("N",$info['news_id']);
	echo "</td>\n";
	echo "</tr>\n</table>\n";

}

function render_article($subject, $article, $info) {
	
	echo "<table width='100%' cellpadding='0' cellspacing='0'>\n<tr>\n";
	echo "<td class='capmain-left'></td>\n";
	echo "<td class='capmain'>".$subject."</td>\n";
	echo "<td class='capmain-right'></td>\n";
	echo "</tr>\n</table>\n";
	echo "<table width='100%' cellpadding='0' cellspacing='0' class='spacer'>\n<tr>\n";
	echo "<td class='main-body middle-border'>".($info['article_breaks'] == "y" ? nl2br($article) : $article)."</td>\n";
	echo "</tr>\n<tr>\n";
	echo "<td align='center' class='news-footer'>\n";
	echo articleposter($info," &middot;").articleopts($info,"&middot;").itemoptions("A",$info['article_id']);
	echo "</td>\n</tr>\n</table>\n";

}

function opentable($title) {

	echo "<table cellpadding='0' cellspacing='0' width='100%'>\n<tr>\n";
	echo "<td class='capmain-left'></td>\n";
	echo "<td class='capmain'>".$title."</td>\n";
	echo "<td class='capmain-right'></td>\n";
	echo "</tr>\n</table>\n";
	echo "<table cellpadding='0' cellspacing='0' width='100%' class='spacer'>\n<tr>\n";
	echo "<td class='main-body'>\n";

}

function closetable() {

	echo "</td>\n";
	echo "</tr>\n</table>\n";

}

function openside($title, $collapse = false, $state = "on") {
	
	global $panel_collapse; $panel_collapse = $collapse;
	
	echo "<table cellpadding='0' cellspacing='0' width='100%'>\n<tr>\n";
	echo "<td class='scapmain-left'></td>\n";
	echo "<td class='scapmain'>$title</td>\n";
	if ($collapse == true) {
		$boxname = str_replace(" ", "", $title);
		echo "<td class='scapmain' align='right'>".panelbutton($state, $boxname)."</td>\n";
	}
	echo "<td class='scapmain-right'></td>\n";
	echo "</tr>\n</table>\n";
	echo "<table cellpadding='0' cellspacing='0' width='100%' class='spacer'>\n<tr>\n";
	echo "<td class='side-body'>\n";	
	if ($collapse == true) { echo panelstate($state, $boxname); }

}

function closeside() {

	global $panel_collapse;

	if ($panel_collapse == true) { echo "</div>\n"; }	
	echo "</td>\n</tr>\n</table>\n";

}
?>