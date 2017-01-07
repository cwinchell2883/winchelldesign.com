<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: infusion.php
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

include INFUSIONS."zwar_warscript/infusion_db.php";
if (file_exists(INFUSIONS."zwar_warscript/locale/".$settings['locale'].".php")) {
	include INFUSIONS."zwar_warscript/locale/".$settings['locale'].".php";
} else {
	include INFUSIONS."zwar_warscript/locale/German.php";
}

$inf_title = $locale['zwar_0281'];
$inf_description = $locale['zwar_0282'];
$inf_version = "2.00";
$inf_developer = "Zezoar";
$inf_email = "zezoar@zoffclan.de";
$inf_weburl = "http://www.zoffclan.de";

$inf_folder = "zwar_warscript";

$inf_newtable[1] = DB_ZWAR_WARS." (
  war_id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  war_info text NOT NULL default '',
  war_comment text NOT NULL default '',
  war_added_by smallint(5) NOT NULL default '0',
  war_date int(11) NOT NULL default '0',
  war_date_add int(11) NOT NULL default '0',
  war_teamsize tinyint(2) NOT NULL default '0',
  war_finished tinyint(1) NOT NULL default '0',
  war_opp_id smallint(5) NOT NULL default '0',
  war_server_id smallint(5) NOT NULL default '0',
  war_game_id smallint(5) NOT NULL default '0',
  war_matchtype_id smallint(5) NOT NULL default '0',
  war_gametype_id smallint(5) NOT NULL default '0',
  war_password varchar(20) NOT NULL default '',
  war_own_players text NOT NULL default '',
  war_opp_players text NOT NULL default '',
  war_squad smallint(5) NOT NULL default '0',
  PRIMARY KEY  (war_id)
) TYPE=MyISAM;";


$inf_newtable[2] = DB_ZWAR_LOCS." (
  location_id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  location_name varchar(100) NOT NULL default '',
  location_pic varchar(100) NOT NULL default '',
  location_game_id smallint(5) NOT NULL default '0',
  PRIMARY KEY  (location_id)
) TYPE=MyISAM;";

$inf_newtable[3] = DB_ZWAR_GAMES." (
  game_id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  game_name varchar(100) NOT NULL default '',
  game_name_short varchar(10) NOT NULL default '',
  game_icon varchar(100) NOT NULL default '',
  game_order tinyint(3) NOT NULL default '0',
  PRIMARY KEY  (game_id)
) TYPE=MyISAM;";

$inf_newtable[4] = DB_ZWAR_MATCHTYPES." (
  matchtype_id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  matchtype_name varchar(100) NOT NULL default '',
  PRIMARY KEY  (matchtype_id)
) TYPE=MyISAM;";

$inf_newtable[5] = DB_ZWAR_SERVERS." (
  server_id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  server_name varchar(100) NOT NULL default '',
  server_ip varchar(25) NOT NULL default '',
  PRIMARY KEY  (server_id)
) TYPE=MyISAM;";

$inf_newtable[6] = DB_ZWAR_SCORES." (
  score_id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  score_war_id smallint(5) NOT NULL default '0',
  score_location_id smallint(5) NOT NULL default '0',
  score_oppscore bigint(5) NOT NULL default '0',
  score_ownscore bigint(5) NOT NULL default '0',
  PRIMARY KEY  (score_id)
) TYPE=MyISAM;";

$inf_newtable[7] = DB_ZWAR_GAMETYPES." (
  gametype_id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  gametype_name varchar(100) NOT NULL default '',
  PRIMARY KEY  (gametype_id)
) TYPE=MyISAM;";

$inf_newtable[8] = DB_ZWAR_OPPONENTS." (
  opp_id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  opp_name varchar(100) NOT NULL default '',
  opp_name_short varchar(20) NOT NULL default '',
  opp_hp varchar(100) NOT NULL default '',
  opp_contact1 varchar(100) NOT NULL default '',
  opp_contact2 varchar(100) NOT NULL default '',
  opp_contact3 varchar(100) NOT NULL default '',
  opp_contact4 varchar(100) NOT NULL default '',
  opp_country varchar(20) NOT NULL default '',
  PRIMARY KEY  (opp_id)
) TYPE=MyISAM;";

$inf_newtable[9] = DB_ZWAR_CHALLENGES." (
  challenge_id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  challenge_info text NOT NULL default '',
  challenge_date_add int(11) NOT NULL default '0',
  challenge_date int(11) NOT NULL default '0',
  challenge_contact1 varchar(100) NOT NULL default '',
  challenge_contact2 varchar(100) NOT NULL default '',
  challenge_contact3 varchar(100) NOT NULL default '',
  challenge_hp varchar(100) NOT NULL default '',
  challenge_clan_name varchar(100) NOT NULL default '',
  challenge_clantag varchar(20) NOT NULL default '',
  challenge_maps varchar(5) NOT NULL default '',
  challenge_game_id int(11) UNSIGNED NOT NULL default '0',
  challenge_teamsize tinyint(2) NOT NULL default '0',
  challenge_userip varchar(20) NOT NULL default '',
  challenge_contact4 varchar(100) NOT NULL default '',
  challenge_server_name varchar(100) NOT NULL default '',
  challenge_server_ip varchar(25) NOT NULL default '',
  challenge_server_pass varchar(20) NOT NULL default '',
  challenge_country varchar(20) NOT NULL default '',
  PRIMARY KEY  (challenge_id)
) TYPE=MyISAM;";

$inf_newtable[10] = DB_ZWAR_PARTS." (
  part_id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  part_user_id smallint(5) UNSIGNED NOT NULL default '0',
  part_war_id int(11) UNSIGNED NOT NULL default '0',
  part_status smallint(1) NOT NULL default '0',
  part_comment text NOT NULL default '',
  part_date	int(11) NOT NULL default '0',
  PRIMARY KEY  (part_id)
) TYPE=MyISAM;";

$inf_newtable[11] = DB_ZWAR_SETTINGS." (
  zwar_closetime int(11) NOT NULL default '86400',
  zwar_fightus_floodtime smallint(5) NOT NULL default '300',
  zwar_vwar_imported tinyint(1) NOT NULL default '0',
  zwar_clantag varchar(20) NOT NULL default '=Clantag=',
  zwar_clan_name varchar(50) NOT NULL default 'clan-name',
  zwar_group_warmember smallint(5) NOT NULL default '101',
  zwar_group_warinfo smallint(5) NOT NULL default '0',
  zwar_group_war_comments smallint(5) NOT NULL default '0',
  zwar_colorwon varchar(6) NOT NULL default '000000',
  zwar_colorlost varchar(6) NOT NULL default '000000',
  zwar_colordraw varchar(6) NOT NULL default '000000',
  zwar_coloractive varchar(6) NOT NULL default '000000',
  zwar_colorinactive varchar(6) NOT NULL default '000000',
  zwar_membermap_center varchar(50) NOT NULL default '(50.62507306341437, 13.82080078125)',
  zwar_membermap_type tinyint(1) UNSiGNED NOT NULL default '1',
  zwar_membermap_gkey varchar(100) NOT NULL default '',
  zwar_membermap_zoom tinyint(2) UNSiGNED NOT NULL default '5',
  zwar_default_page varchar(50) NOT NULL default '',
  zwar_joinus_public tinyint(1) UNSIGNED NOT NULL default '0',
  zwar_nomem_visible tinyint(1) UNSIGNED NOT NULL default '1', 
  zwar_mappics_width smallint(5) UNSIGNED NOT NULL default '100',
  zwar_mappics_height smallint(5) UNSIGNED NOT NULL default '100',
  zwar_memberpics_width smallint(5) UNSIGNED NOT NULL default '30',
  zwar_memberpics_height smallint(5) UNSIGNED NOT NULL default '40',
  zwar_version varchar(10) NOT NULL default '2.00',
  zwar_uploadtypes varchar(150) NOT NULL default '.gif,.jpg,.png,.zip,.rar,.tar',
  zwar_uploadmax int(12) UNSIGNED NOT NULL default '150000',
  zwar_uploadlimit tinyint(2) UNSIGNED NOT NULL default '5',
  zwar_uploadlimit_type tinyint(1) UNSIGNED NOT NULL default '1',
  zwar_show_warsshort tinyint(2) UNSIGNED NOT NULL default '5',
  zwar_show_warslong tinyint(2) UNSIGNED NOT NULL default '15',
  zwar_show_membercount tinyint(2) UNSIGNED NOT NULL default '8',
  zwar_squadinfo_open tinyint(1) UNSIGNED NOT NULL default '1',
  zwar_messenger_types varchar(200) NOT NULL default 'ICQ,MSN,XFire,IRC',
  zwar_voice_types varchar(200) NOT NULL default 'TS,Vent',
  PRIMARY KEY  (zwar_closetime)
) TYPE=MyISAM;";

$inf_newtable[12] = DB_ZWAR_SQUADS." (
  group_id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  group_name varchar(100) NOT NULL default '',
  group_wars tinyint(3) UNSIGNED NOT NULL default '0',
  group_games varchar(100) NOT NULL default '',
  group_info text NOT NULL default '',
  group_logo varchar(100) NOT NULL default '',
  group_listimage varchar(100) NOT NULL default '',
  group_joinpass varchar(32) NOT NULL default '',
  group_banner_align tinyint(1) UNSIGNED NOT NULL default '1',
  group_banner_showinfo tinyint(1) UNSIGNED NOT NULL default '1',
  group_banner_infoalign tinyint(1) UNSIGNED NOT NULL default '3',
  PRIMARY KEY  (group_id)
) TYPE=MyISAM;";

$inf_newtable[13] = DB_ZWAR_SQUADS_PLAYERS." (
  player_id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  player_member_id int(11) UNSIGNED NOT NULL default '0',
  player_squad smallint(5) UNSIGNED NOT NULL default '0',
  player_info varchar(100) NOT NULL default '',
  player_order tinyint(3) NOT NULL default '0',
  player_level tinyint(2) UNSIGNED NOT NULL default '0',
  PRIMARY KEY  (player_id)
) TYPE=MyISAM;";

$inf_newtable[14] = DB_ZWAR_MEMBER_LIST." (
  list_item_id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  list_item_type tinyint(3) UNSIGNED NOT NULL default '1',
  list_item int(11) UNSIGNED NOT NULL default '0',
  list_item_order tinyint(3) NOT NULL default '0',
  list_item_image varchar(100) NOT NULL default '',
  list_item_open tinyint(1) UNSIGNED NOT NULL default '1',
  list_teambanner_align tinyint(1) UNSIGNED NOT NULL default '1',
  list_teambanner_showinfo tinyint(1) UNSIGNED NOT NULL default '1',
  list_teambanner_infoalign tinyint(1) UNSIGNED NOT NULL default '3',
  PRIMARY KEY  (list_item_id)
) TYPE=MyISAM;";

$inf_newtable[15] = DB_ZWAR_JOINUS." (
  app_id mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  app_user_id mediumint(8) NOT NULL default '0',
  app_userip varchar(20) NOT NULL default '',
  app_nickname varchar(30) NOT NULL default '',
  app_name varchar(100) NOT NULL default '',
  app_games varchar(100) NOT NULL default '',
  app_reason text NOT NULL default '',
  app_contact1 varchar(100) NOT NULL default '',
  app_contact2 varchar(100) NOT NULL default '',
  app_datestamp int(10) UNSIGNED NOT NULL default '0',
  PRIMARY KEY  (app_id)
) TYPE=MyISAM;";

$inf_newtable[16] = DB_ZWAR_MATCH_UPLOADS." (
  upload_id mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  upload_war_id int(11) UNSIGNED NOT NULL default '0',
  upload_user_id mediumint(8) NOT NULL default '0',
  upload_name varchar(50) NOT NULL default '',
  upload_file varchar(100) NOT NULL default '',
  upload_ext varchar(10) NOT NULL default '',
  upload_datestamp int(10) UNSIGNED NOT NULL default '0',
  PRIMARY KEY  (upload_id)
) TYPE=MyISAM;";

////////////////////
$inf_insertdbrow[1] = DB_ZWAR_SETTINGS." VALUES ('86400', '300', '0', '=your Clantag=', 'your Claname', '101', '0', '0', '11AA11', 'AA1111', '666611', '22AA22', 'AA2222', '(50.62507306341437, 13.82080078125)', '1', '', '5', '', '0', '1', '100', '100', '30', '40', '2.00', '.gif,.jpg,.png,.zip,.rar,.tar', '150000', '5', '1', '5', '15', '8', '1', 'ICQ, MSN, XFire', 'TS, Vent')";

if (isset($_POST['infuse']) && isset($_POST['infusion']) && $_POST['infusion']=='zwar_warscript') {
	if (!dbcount("(*)", DB_USER_FIELDS, "field_name='member_games'")) {
		$zw_field_order = dbresult(dbquery("SELECT MAX(field_order) FROM ".DB_USER_FIELDS." WHERE field_group='2'"), 0) + 1;
		$zw_result = dbquery("ALTER TABLE ".DB_USERS." ADD member_games VARCHAR(100) NOT NULL DEFAULT ''");
		$inf_insertdbrow[2] = DB_USER_FIELDS." (field_name, field_group, field_order) VALUES ('member_games', '2', '$zw_field_order')";
	}
	if (!dbcount("(*)", DB_USER_FIELDS, "field_name='member_groupsshow'")) {
		$zw_field_order = dbresult(dbquery("SELECT MAX(field_order) FROM ".DB_USER_FIELDS." WHERE field_group='2'"), 0) + 1;
		$zw_result = dbquery("ALTER TABLE ".DB_USERS." ADD member_groupsshow VARCHAR(100) NOT NULL DEFAULT ''");
		$inf_insertdbrow[3] = DB_USER_FIELDS." (field_name, field_group, field_order) VALUES ('member_groupsshow', '2', '$zw_field_order')";
	}
	if (!dbcount("(*)", DB_USER_FIELDS, "field_name='member_image'")) {
		$zw_field_order = dbresult(dbquery("SELECT MAX(field_order) FROM ".DB_USER_FIELDS." WHERE field_group='2'"), 0) + 1;
		$zw_result = dbquery("ALTER TABLE ".DB_USERS." ADD member_image VARCHAR(100) NOT NULL DEFAULT ''");
		$inf_insertdbrow[4] = DB_USER_FIELDS." (field_name, field_group, field_order) VALUES ('member_image', '2', '$zw_field_order')";
	}
	if (!dbcount("(*)", DB_USER_FIELDS, "field_name='member_mapmarker'")) {
		$zw_field_order = dbresult(dbquery("SELECT MAX(field_order) FROM ".DB_USER_FIELDS." WHERE field_group='2'"), 0) + 1;
		$zw_result = dbquery("ALTER TABLE ".DB_USERS." ADD member_mapmarker VARCHAR(50) NOT NULL DEFAULT ''");
		$inf_insertdbrow[5] = DB_USER_FIELDS." (field_name, field_group, field_order) VALUES ('member_mapmarker', '2', '$zw_field_order')";
	}
	if (!dbcount("(*)", DB_USER_FIELDS, "field_name='member_position'")) {
		$zw_field_order = dbresult(dbquery("SELECT MAX(field_order) FROM ".DB_USER_FIELDS." WHERE field_group='2'"), 0) + 1;
		$zw_result = dbquery("ALTER TABLE ".DB_USERS." ADD member_position VARCHAR(50) NOT NULL DEFAULT ''");
		$inf_insertdbrow[6] = DB_USER_FIELDS." (field_name, field_group, field_order) VALUES ('member_position', '2', '$zw_field_order')";
	}
	if (!dbcount("(*)", DB_USER_FIELDS, "field_name='member_realname'")) {
		$zw_field_order = dbresult(dbquery("SELECT MAX(field_order) FROM ".DB_USER_FIELDS." WHERE field_group='2'"), 0) + 1;
		$zw_result = dbquery("ALTER TABLE ".DB_USERS." ADD member_realname VARCHAR(100) NOT NULL DEFAULT ''");
		$inf_insertdbrow[7] = DB_USER_FIELDS." (field_name, field_group, field_order) VALUES ('member_realname', '2', '$zw_field_order')";
	}
	if (!dbcount("(*)", DB_USER_FIELDS, "field_name='member_status'")) {
		$zw_field_order = dbresult(dbquery("SELECT MAX(field_order) FROM ".DB_USER_FIELDS." WHERE field_group='2'"), 0) + 1;
		$zw_result = dbquery("ALTER TABLE ".DB_USERS." ADD member_status tinyint(1) NOT NULL default '1'");
		$inf_insertdbrow[8] = DB_USER_FIELDS." (field_name, field_group, field_order) VALUES ('member_status', '2', '$zw_field_order')";
	}
	if (!dbcount("(*)", DB_USER_FIELDS, "field_name='member_clanstatus'")) {
		$zw_field_order = dbresult(dbquery("SELECT MAX(field_order) FROM ".DB_USER_FIELDS." WHERE field_group='2'"), 0) + 1;
		$zw_result = dbquery("ALTER TABLE ".DB_USERS." ADD member_clanstatus tinyint(1) NOT NULL default '0'");
		$inf_insertdbrow[9] = DB_USER_FIELDS." (field_name, field_group, field_order) VALUES ('member_clanstatus', '2', '$zw_field_order')";
	}
	if (!dbcount("(*)", DB_USER_FIELDS, "field_name='member_cflag'")) {
		$zw_field_order = dbresult(dbquery("SELECT MAX(field_order) FROM ".DB_USER_FIELDS." WHERE field_group='2'"), 0) + 1;
		$zw_result = dbquery("ALTER TABLE ".DB_USERS." ADD member_cflag varchar(20) NOT NULL default ''");
		$inf_insertdbrow[10] = DB_USER_FIELDS." (field_name, field_group, field_order) VALUES ('member_cflag', '2', '$zw_field_order')";
	}
} else if (isset($_GET['defuse']) && isnum($_GET['defuse'])) {
	$zw_result = dbquery("SELECT * FROM ".DB_INFUSIONS." WHERE inf_id='".$_GET['defuse']."'");
	$zw_data = dbarray($zw_result);
	if ($zw_data['inf_folder']=="zwar_warscript") {
		$zw_result2 = dbquery("SELECT * FROM ".DB_USER_FIELDS." WHERE field_name='member_games'");
		if (dbrows($zw_result2)) {
			$zw_data2 = dbarray($zw_result2);
			$zw_result3 = dbquery("UPDATE ".DB_USER_FIELDS." SET field_order=field_order-1 WHERE field_group='2' AND field_order>'".$zw_data2['field_order']."'");
			$zw_result3 = dbquery("DELETE FROM ".DB_USER_FIELDS." WHERE field_id='".$zw_data2['field_id']."'");
		}
		$zw_result2 = dbquery("ALTER TABLE ".DB_USERS." DROP member_games");
		$zw_result2 = dbquery("SELECT * FROM ".DB_USER_FIELDS." WHERE field_name='member_groupsshow'");
		if (dbrows($zw_result2)) {
			$zw_data2 = dbarray($zw_result2);
			$zw_result3 = dbquery("UPDATE ".DB_USER_FIELDS." SET field_order=field_order-1 WHERE field_group='2' AND field_order>'".$zw_data2['field_order']."'");
			$zw_result3 = dbquery("DELETE FROM ".DB_USER_FIELDS." WHERE field_id='".$zw_data2['field_id']."'");
		}
		$zw_result2 = dbquery("ALTER TABLE ".DB_USERS." DROP member_groupsshow");
		$zw_result2 = dbquery("SELECT * FROM ".DB_USER_FIELDS." WHERE field_name='member_image'");
		if (dbrows($zw_result2)) {
			$zw_data2 = dbarray($zw_result2);
			$zw_result3 = dbquery("UPDATE ".DB_USER_FIELDS." SET field_order=field_order-1 WHERE field_group='2' AND field_order>'".$zw_data2['field_order']."'");
			$zw_result3 = dbquery("DELETE FROM ".DB_USER_FIELDS." WHERE field_id='".$zw_data2['field_id']."'");
		}
		$zw_result2 = dbquery("ALTER TABLE ".DB_USERS." DROP member_image");
		$zw_result2 = dbquery("SELECT * FROM ".DB_USER_FIELDS." WHERE field_name='member_mapmarker'");
		if (dbrows($zw_result2)) {
			$zw_data2 = dbarray($zw_result2);
			$zw_result3 = dbquery("UPDATE ".DB_USER_FIELDS." SET field_order=field_order-1 WHERE field_group='2' AND field_order>'".$zw_data2['field_order']."'");
			$zw_result3 = dbquery("DELETE FROM ".DB_USER_FIELDS." WHERE field_id='".$zw_data2['field_id']."'");
		}
		$zw_result2 = dbquery("ALTER TABLE ".DB_USERS." DROP member_mapmarker");
		$zw_result2 = dbquery("SELECT * FROM ".DB_USER_FIELDS." WHERE field_name='member_position'");
		if (dbrows($zw_result2)) {
			$zw_data2 = dbarray($zw_result2);
			$zw_result3 = dbquery("UPDATE ".DB_USER_FIELDS." SET field_order=field_order-1 WHERE field_group='2' AND field_order>'".$zw_data2['field_order']."'");
			$zw_result3 = dbquery("DELETE FROM ".DB_USER_FIELDS." WHERE field_id='".$zw_data2['field_id']."'");
		}
		$zw_result2 = dbquery("ALTER TABLE ".DB_USERS." DROP member_position");
		$zw_result2 = dbquery("SELECT * FROM ".DB_USER_FIELDS." WHERE field_name='member_realname'");
		if (dbrows($zw_result2)) {
			$zw_data2 = dbarray($zw_result2);
			$zw_result3 = dbquery("UPDATE ".DB_USER_FIELDS." SET field_order=field_order-1 WHERE field_group='2' AND field_order>'".$zw_data2['field_order']."'");
			$zw_result3 = dbquery("DELETE FROM ".DB_USER_FIELDS." WHERE field_id='".$zw_data2['field_id']."'");
		}
		$zw_result2 = dbquery("ALTER TABLE ".DB_USERS." DROP member_realname");
		$zw_result2 = dbquery("SELECT * FROM ".DB_USER_FIELDS." WHERE field_name='member_status'");
		if (dbrows($zw_result2)) {
			$zw_data2 = dbarray($zw_result2);
			$zw_result3 = dbquery("UPDATE ".DB_USER_FIELDS." SET field_order=field_order-1 WHERE field_group='2' AND field_order>'".$zw_data2['field_order']."'");
			$zw_result3 = dbquery("DELETE FROM ".DB_USER_FIELDS." WHERE field_id='".$zw_data2['field_id']."'");
		}
		$zw_result2 = dbquery("ALTER TABLE ".DB_USERS." DROP member_status");
		$zw_result2 = dbquery("SELECT * FROM ".DB_USER_FIELDS." WHERE field_name='member_clanstatus'");
		if (dbrows($zw_result2)) {
			$zw_data2 = dbarray($zw_result2);
			$zw_result3 = dbquery("UPDATE ".DB_USER_FIELDS." SET field_order=field_order-1 WHERE field_group='2' AND field_order>'".$zw_data2['field_order']."'");
			$zw_result3 = dbquery("DELETE FROM ".DB_USER_FIELDS." WHERE field_id='".$zw_data2['field_id']."'");
		}
		$zw_result2 = dbquery("ALTER TABLE ".DB_USERS." DROP member_clanstatus");
		$zw_result2 = dbquery("SELECT * FROM ".DB_USER_FIELDS." WHERE field_name='member_cflag'");
		if (dbrows($zw_result2)) {
			$zw_data2 = dbarray($zw_result2);
			$zw_result3 = dbquery("UPDATE ".DB_USER_FIELDS." SET field_order=field_order-1 WHERE field_group='2' AND field_order>'".$zw_data2['field_order']."'");
			$zw_result3 = dbquery("DELETE FROM ".DB_USER_FIELDS." WHERE field_id='".$zw_data2['field_id']."'");
		}
		$zw_result2 = dbquery("ALTER TABLE ".DB_USERS." DROP member_cflag");
	}
}
/////////////
$inf_droptable[1] = DB_ZWAR_WARS;
$inf_droptable[2] = DB_ZWAR_LOCS;
$inf_droptable[3] = DB_ZWAR_GAMES;
$inf_droptable[4] = DB_ZWAR_MATCHTYPES;
$inf_droptable[5] = DB_ZWAR_SERVERS;
$inf_droptable[6] = DB_ZWAR_SCORES;
$inf_droptable[7] = DB_ZWAR_GAMETYPES;
$inf_droptable[8] = DB_ZWAR_OPPONENTS;
$inf_droptable[9] = DB_ZWAR_CHALLENGES;
$inf_droptable[10] = DB_ZWAR_PARTS;
$inf_droptable[11] = DB_ZWAR_SETTINGS;
$inf_droptable[12] = DB_ZWAR_SQUADS;
$inf_droptable[13] = DB_ZWAR_SQUADS_PLAYERS;
$inf_droptable[14] = DB_ZWAR_MEMBER_LIST;
$inf_droptable[15] = DB_ZWAR_JOINUS;
$inf_droptable[16] = DB_ZWAR_MATCH_UPLOADS;
/////////////
$inf_adminpanel[1] = array(
	"title" => "zWAR",
	"image" => "zwar_admin.gif",
	"panel" => "zwar_admin_panel.php",
	"rights" => "ZWAR"
);
?>