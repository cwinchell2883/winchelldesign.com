<?php
if (!defined("IN_FUSION")) { die("Access Denied"); }
require_once THEME."theme_functions_include.php";
define("THEME_BULLET", "<img src='".THEME."images/bullet.gif' alt='>' />");

// theme settings
$theme_width = "910"; //Only fixed pixel values will work without modifications

function render_page($license=false) {
	
  global $theme_width, $aidlink, $locale, $settings, $main_style;

// Header:	
	echo "
	<div class='borderl' style='width: ".$theme_width."px !important; width: ".($theme_width + 108)."px; text-align:left;'>
		<div class='borderr'>
			
			<div class='full-header'>
				<img src='".THEME."images/logo.jpg' alt='ClanName' />
			</div>
			<div class='sub-header'>
			".showsublinks("","sublink")."
			</div>
			<div class='soldier'>
				<img src='".THEME."images/soldier.png' alt='Counter Terrorist' />
			</div>
			<table cellpadding='0' cellspacing='0' width='100%' id='maintable'>\n<tr>\n<td>\n";
      
// Content
  echo "<table cellpadding='0' cellspacing='0' width='100%' class='$main_style'>\n<tr>\n";
  echo "".(LEFT ? "<td class='side-border-left' valign='top'>".LEFT."</td>" : "")." ";
	echo "<td class='main-bg' valign='top'>".U_CENTER.CONTENT.L_CENTER."</td>";
	echo "".(RIGHT ? "<td class='side-border-right' valign='top' width='180'>".RIGHT."</td>" : "")." ";
	echo "</tr>\n</table>\n";

// Footer:
		echo "</td>\n</tr>\n</table>\n
    </div>
		<div class='footer' style='width: 100%'>
		<div style='float:left;'>
			<a href='http://php-fusion.co.uk' target='_blank'><img src='".THEME."images/fusion.gif' alt='Powered by PHP-Fusion' /></a>
		</div>
		<div style='float:right;'>
			<a href='http://themes.php-fusion.co.uk/profile.php?lookup=1' target='_blank'><img src='".THEME."images/matonor.gif' alt='Designed by Matonor.com' /></a>
		</div>
		<div style='text-align:center;'>".
			stripslashes($settings['footer'])."<br />
	  </div>
    </div>
	</div>
      <div style='text-align:center; color:#a2a2a2;'>";
		if (!$license) { echo showcopyright()."<br />"; }
		echo sprintf($locale['global_172'], substr((get_microtime() - START_TIME),0,4))." | ".showcounter()."<br />
		</div>";
}

function render_news($subject, $news, $info) {
	
	global $locale;

	opentable("<div style='float:left;'>".$subject."</div>".newsposter($info, "", ""));
	echo $news."
	<br style='clear:both;' />
	<div class='news-footer'>".
		newsopts($info,"","newsbutton").itemoptions("N",$info['news_id'])."
	</div><br style='clear:both;' />";
	closetable();

}

function render_article($subject, $article, $info) {
	
	opentable("<div style='float:left;'>".$subject."</div>".articleposter($info, " ", ""));
	echo ($info['article_breaks'] == "y" ? nl2br($article) : $article)."
	<br style='clear:both;' />
	<div class='news-footer'>".
		articleopts($info,"","newsbutton").itemoptions("A",$info['article_id'])."
	</div><br style='clear:both;' />";
	closetable();

}

function opentable($title) {

	echo "<div class='capmain'>$title</div>
	<div class='main-body'>\n";

}

function closetable() {

	echo "</div>\n";

}

$panel_collapse = true;
function openside($title, $collapse = false, $state = "on") {
	
	static $box_id = 0; $box_id++;
	global $panel_collapse, $p_data; $panel_collapse = $collapse;

  opentable($title.($collapse ? "<br /><div style='float:right; margin-top: -14px;'>".panelbutton($state,$box_id)."</div>" : ""));
	echo ($collapse ? panelstate($state, $box_id) : "");

}

function closeside() {

	global $panel_collapse, $p_data;
	
	echo ($panel_collapse ? "</div>" : "");
	closetable();

}
?>