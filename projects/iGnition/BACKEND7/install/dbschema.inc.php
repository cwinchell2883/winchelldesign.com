<?php

$db->Execute("DROP TABLE IF EXISTS `sp_announcements`") or die($db->ErrorMsg());

$db->Execute("
CREATE TABLE `sp_announcements` (
  `id` int(11) NOT NULL auto_increment,
  `user` varchar(200) NOT NULL default '',
  `date` varchar(200) NOT NULL default '',
  `title` text NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;") or die($db->ErrorMsg());

$db->Execute("INSERT INTO `sp_announcements`
	VALUES ('1', 'admin', '2005-10-09', 'iGamingCMS.com',
	'Welcome to iGaming CMS!<BR>This is a sample announcement.')") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_cheats`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_cheats` (
	  `id` int(11) NOT NULL auto_increment,
	  `gameid` int(11) NOT NULL default '0',
	  `title` text NOT NULL,
	  `cheat` text NOT NULL,
	  PRIMARY KEY  (`id`)
	) TYPE=MyISAM AUTO_INCREMENT=1 ;") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_companies`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_companies` (
	  `id` int(11) NOT NULL auto_increment,
	  `title` varchar(250) NOT NULL default '',
	  `description` text NOT NULL,
	  `homepage` varchar(250) NOT NULL default '',
	  `logo` varchar(250) NOT NULL default '',
	  PRIMARY KEY  (`id`)
	) TYPE=MyISAM AUTO_INCREMENT=1 ;") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_configuration`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_configuration` (
	  `id` int(11) NOT NULL auto_increment,
	  `key` varchar(250) NOT NULL default '',
	  `value` text NOT NULL,
	  PRIMARY KEY  (`id`)
	) TYPE=MyISAM AUTO_INCREMENT=1 ;") or die($db->ErrorMsg());

$db->Execute("INSERT INTO `sp_configuration` VALUES (1, 'site_title', 'iGaming CMS');") or die($db->ErrorMsg());

$db->Execute("INSERT INTO `sp_configuration` VALUES (2, 'meta_description', 'iGaming CMS - Gaming Content Management System');") or die($db->ErrorMsg());

$db->Execute("INSERT INTO `sp_configuration` VALUES (3, 'meta_keywords', 'igaming cms, igaming, gaming, cms, content management');") or die($db->ErrorMsg());

$db->Execute("INSERT INTO `sp_configuration` VALUES (4, 'date_format', 'Y.m.d');") or die($db->ErrorMsg());

$db->Execute("INSERT INTO `sp_configuration` VALUES (5, 'true_refresh', '1');") or die($db->ErrorMsg());

$db->Execute("INSERT INTO `sp_configuration` VALUES (7, 'game_tools', '1');") or die($db->ErrorMsg());

$db->Execute("INSERT INTO `sp_configuration` VALUES (8, 'game_tools_popups', '1');") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_customfields`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_customfields` (
	  `id` int(11) NOT NULL auto_increment,
	  `title` varchar(255) NOT NULL default '',
	  `module` varchar(255) NOT NULL default '',
	  `type` varchar(255) NOT NULL default '',
	  PRIMARY KEY  (`id`)
	) TYPE=MyISAM AUTO_INCREMENT=1 ;") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_downloads`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_downloads` (
  `id` int(11) NOT NULL auto_increment,
  `gameid` int(11) NOT NULL default '0',
  `title` text NOT NULL,
  `download` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_games`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_games` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(250) NOT NULL default '',
  `section` varchar(250) NOT NULL default '0',
  `description` text NOT NULL,
  `developer` varchar(250) NOT NULL default '0',
  `publisher` varchar(250) NOT NULL default '0',
  `genre` text NOT NULL,
  `release_date` text NOT NULL,
  `multiplayer` text NOT NULL,
  `boxshot` text NOT NULL,
  `views` int(11) NOT NULL default '0',
  `esrb` varchar(255) NOT NULL default '',
  `coop` varchar(255) NOT NULL default '',
  `req_system` varchar(255) NOT NULL default '',
  `req_ram` varchar(255) NOT NULL default '',
  `req_video` varchar(255) NOT NULL default '',
  `req_space` varchar(255) NOT NULL default '',
  `req_mouse` varchar(255) NOT NULL default '',
  `req_directx` varchar(255) NOT NULL default '',
  `req_sound` varchar(255) NOT NULL default '',
  `published` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_games_customdata`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_games_customdata` (
  `id` int(11) NOT NULL auto_increment,
  `fieldid` int(11) NOT NULL default '0',
  `gameid` int(11) NOT NULL default '0',
  `value` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_games_sections`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_games_sections` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(250) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_links`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_links` (
  `id` int(11) NOT NULL auto_increment,
  `url` text NOT NULL,
  `title` text NOT NULL,
  `section` int(11) NOT NULL default '0',
  `gameid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_links_sections`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_links_sections` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(250) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_mailbag`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_mailbag` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(250) NOT NULL default '',
  `message` text NOT NULL,
  `reply` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_matrix`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_matrix` (
  `id` int(11) NOT NULL auto_increment,
  `ctype` varchar(250) NOT NULL default '',
  `cid` varchar(250) NOT NULL default '',
  `reltype` varchar(250) NOT NULL default '',
  `relid` varchar(250) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_members`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_members` (
  `ID` smallint(6) NOT NULL auto_increment,
  `PSEUDO` tinytext NOT NULL,
  `PASS` varchar(32) NOT NULL default '',
  `EMAIL` tinytext NOT NULL,
  `NOM` tinytext NOT NULL,
  `PRIV` tinyint(2) NOT NULL default '0',
  `ACTIF` tinyint(1) NOT NULL default '1',
  `LASTLOG` datetime NOT NULL default '0000-00-00 00:00:00',
  `EXPIRE` datetime NOT NULL default '0000-00-00 00:00:00',
  `fname` varchar(255) NOT NULL default '',
  `lname` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `ID` (`ID`)
) TYPE=MyISAM PACK_KEYS=1 AUTO_INCREMENT=2 ;") or die($db->ErrorMsg());

$db->Execute("INSERT INTO `sp_members` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'you@yoursite.com', 'Administrator', 0, 1, '2005-10-09 23:21:25', '0000-00-00 00:00:00', '', '');") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_menu_items`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_menu_items` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(250) NOT NULL default '',
  `url` varchar(250) NOT NULL default '',
  `active` int(11) NOT NULL default '0',
  `location` varchar(250) NOT NULL default '',
  `ordering` int(11) NOT NULL default '0',
  `target` varchar(250) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=9 ;") or die($db->ErrorMsg());

$db->Execute("INSERT INTO `sp_menu_items` VALUES (1, 'Home', 'index.php', 1, 'left', 1, NULL);") or die($db->ErrorMsg());

$db->Execute("INSERT INTO `sp_menu_items` VALUES (2, 'Home', 'index.php', 1, 'top', 1, NULL);") or die($db->ErrorMsg());

$db->Execute("INSERT INTO `sp_menu_items` VALUES (3, 'Games', 'games.php', 1, 'top', 2, NULL);") or die($db->ErrorMsg());

$db->Execute("INSERT INTO `sp_menu_items` VALUES (4, 'Games', 'games.php', 1, 'left', 2, NULL);") or die($db->ErrorMsg());

$db->Execute("INSERT INTO `sp_menu_items` VALUES (5, 'Companies', 'companies.php', 1, 'left', 3, NULL);") or die($db->ErrorMsg());

$db->Execute("INSERT INTO `sp_menu_items` VALUES (6, 'Reviews', 'reviews.php', 1, 'left', 4, NULL);") or die($db->ErrorMsg());

$db->Execute("INSERT INTO `sp_menu_items` VALUES (7, 'Previews', 'previews.php', 1, 'left', 5, NULL);") or die($db->ErrorMsg());

$db->Execute("INSERT INTO `sp_menu_items` VALUES (8, 'iGamingCMS.com', 'http://www.igamingcms.com/', 1, 'left', 6, '_blank');") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_modules`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_modules` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `active` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=18 ;") or die($db->ErrorMsg());

$db->Execute("INSERT INTO `sp_modules` VALUES (1, 'Cheat Manager', 'cheats.php', 1);") or die($db->ErrorMsg());
$db->Execute("INSERT INTO `sp_modules` VALUES (2, 'Company Manager', 'companies.php', 1);") or die($db->ErrorMsg());
$db->Execute("INSERT INTO `sp_modules` VALUES (3, 'Game Manager', 'games.php', 1);") or die($db->ErrorMsg());
$db->Execute("INSERT INTO `sp_modules` VALUES (4, 'Link Manager', 'links.php', 0);") or die($db->ErrorMsg());
$db->Execute("INSERT INTO `sp_modules` VALUES (5, 'Mailbag', 'mailbag.php', 1);") or die($db->ErrorMsg());
$db->Execute("INSERT INTO `sp_modules` VALUES (6, 'News Manager', 'news.php', 1);") or die($db->ErrorMsg());
$db->Execute("INSERT INTO `sp_modules` VALUES (7, 'Static Page Manager', 'pages.php', 1);") or die($db->ErrorMsg());
$db->Execute("INSERT INTO `sp_modules` VALUES (8, 'Plugin Manager', 'plugins.php', 1);") or die($db->ErrorMsg());
$db->Execute("INSERT INTO `sp_modules` VALUES (9, 'Preview Manager', 'previews.php', 1);") or die($db->ErrorMsg());
$db->Execute("INSERT INTO `sp_modules` VALUES (10, 'Review Manager', 'reviews.php', 1);") or die($db->ErrorMsg());
$db->Execute("INSERT INTO `sp_modules` VALUES (11, 'Relational Content Manager', 'rcm_matrix.php', 1);") or die($db->ErrorMsg());
$db->Execute("INSERT INTO `sp_modules` VALUES (12, 'Screenshot Manager', 'screenshots.php', 1);") or die($db->ErrorMsg());
$db->Execute("INSERT INTO `sp_modules` VALUES (13, 'Poll Manager', 'polls.php', 1);") or die($db->ErrorMsg());
$db->Execute("INSERT INTO `sp_modules` VALUES (14, 'Content Download System', 'content.php', 1);") or die($db->ErrorMsg());
$db->Execute("INSERT INTO `sp_modules` VALUES (15, 'Download Manager', 'downloads.php', 1);") or die($db->ErrorMsg());
$db->Execute("INSERT INTO `sp_modules` VALUES (16, 'Custom Field Manager', 'customfields.php', 1);") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_news`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_news` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(250) NOT NULL default '',
  `author` varchar(255) NOT NULL default '',
  `section` text NOT NULL,
  `intro` text NOT NULL,
  `text` text NOT NULL,
  `date` varchar(250) NOT NULL default '',
  `published` int(11) NOT NULL default '0',
  `newsimage` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;") or die($db->ErrorMsg());

$db->Execute("
INSERT INTO `sp_news` VALUES (1, 'Welcome to iGaming CMS', 'Welcome to iGaming CMS', '1', 'Welcome to iGaming CMS, your website is now ready to be customized. ', '', '2005-10-09', 0, '');
") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_news_sections`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_news_sections` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(250) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;") or die($db->ErrorMsg());

$db->Execute("INSERT INTO `sp_news_sections` VALUES (1, 'Website News');") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_pages`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_pages` (
  `id` int(11) NOT NULL auto_increment,
  `title` text NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_polls`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_polls` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;") or die($db->ErrorMsg());

$db->Execute("INSERT INTO `sp_polls` VALUES (1, 'Do you like videogames?');") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_polls_iplog`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_polls_iplog` (
  `id` int(11) NOT NULL auto_increment,
  `pollid` int(11) NOT NULL default '0',
  `ip` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_polls_options`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_polls_options` (
  `id` int(11) NOT NULL auto_increment,
  `poll_id` int(11) NOT NULL default '0',
  `text` text NOT NULL,
  `count` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=3 ;") or die($db->ErrorMsg());

$db->Execute("INSERT INTO `sp_polls_options` VALUES (1, 1, 'Yes', 0);") or die($db->ErrorMsg());
$db->Execute("INSERT INTO `sp_polls_options` VALUES (2, 1, 'No', 0);") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_previews`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_previews` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(250) NOT NULL default '',
  `section` text NOT NULL,
  `intro` text NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_previews_sections`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_previews_sections` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(250) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_reviews`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_reviews` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(250) NOT NULL default '',
  `section` text NOT NULL,
  `intro` text NOT NULL,
  `text` text NOT NULL,
  `gameplay` int(11) NOT NULL default '0',
  `graphics` int(11) NOT NULL default '0',
  `sound` int(11) NOT NULL default '0',
  `value` int(11) NOT NULL default '0',
  `tilt` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_reviews_sections`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_reviews_sections` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(250) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_screenshots`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_screenshots` (
  `id` int(11) NOT NULL auto_increment,
  `title` text NOT NULL,
  `section` int(11) NOT NULL default '0',
  `thumb` text NOT NULL,
  `screen` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;") or die($db->ErrorMsg());

$db->Execute("DROP TABLE IF EXISTS `sp_screenshots_sections`") or die($db->ErrorMsg());

$db->Execute("CREATE TABLE `sp_screenshots_sections` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(250) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;") or die($db->ErrorMsg());

print "The operation completed successfully.";

?>
