CREATE TABLE IF NOT EXISTS `pcm_chat` (
  `c_text` varchar(255) NOT NULL,
  `u_id` int(11) default NULL,
  `u_ip` varchar(255) default NULL,
  `c_date` datetime NOT NULL
) TYPE=MyISAM;



CREATE TABLE IF NOT EXISTS `pcm_config` (
  `s_name` varchar(255) NOT NULL default '',
  `s_value` varchar(255) NOT NULL default '',
  UNIQUE KEY `s_name` (`s_name`)
) TYPE=MyISAM;


INSERT IGNORE INTO `pcm_config` VALUES ('sitename', 'Pro Clan Manager 0.4.2');
INSERT IGNORE INTO `pcm_config` VALUES ('cookielength', '6');
INSERT IGNORE INTO `pcm_config` VALUES ('chatlength', '3');
INSERT IGNORE INTO `pcm_config` VALUES ('newsposts', '10');
INSERT IGNORE INTO `pcm_config` VALUES ('picmaxsize', '400');
INSERT IGNORE INTO `pcm_config` VALUES ('dateformat', '%e %B %Y');
INSERT IGNORE INTO `pcm_config` VALUES ('timezone', '0');
INSERT IGNORE INTO `pcm_config` VALUES ('language', 'lang[language]');
INSERT IGNORE INTO `pcm_config` VALUES ('photodefault', 'images/default.jpg');
INSERT IGNORE INTO `pcm_config` VALUES ('photodirectory', 'images/');
INSERT IGNORE INTO `pcm_config` VALUES ('filedirectory', 'files/');
INSERT IGNORE INTO `pcm_config` VALUES ('pagerowlimit', '15');


CREATE TABLE IF NOT EXISTS `pcm_download` (
  `d_id` int(11) NOT NULL auto_increment,
  `d_name` varchar(255) NOT NULL default '',
  `d_desc` text NOT NULL,
  `d_pos` int(11) NOT NULL default '0',
  `d_public` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`d_id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `pcm_download_files` (
  `f_id` int(11) NOT NULL auto_increment,
  `d_id` int(11) default NULL,
  `f_name` varchar(255) NOT NULL default '',
  `f_img` varchar(255) default NULL,
  `f_loc` varchar(255) NOT NULL default '',
  `f_desc` text NOT NULL,
  `f_down` int(11) NOT NULL default '0',
  `u_id` int(11) NOT NULL default '0',
  `f_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `f_size` int(11) NOT NULL default '0',
  `f_public` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`f_id`)
) TYPE=MyISAM PACK_KEYS=0 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `pcm_email` (
  `m_id` int(11) NOT NULL default '0',
  `m_subject` varchar(255) NOT NULL default '',
  `m_text` text NOT NULL,
  PRIMARY KEY  (`m_id`)
) TYPE=MyISAM;

INSERT IGNORE INTO `pcm_email` VALUES (1, 'lang[install_email_1_subject]', 'lang[install_email_1_text]');
INSERT IGNORE INTO `pcm_email` VALUES (2, 'lang[install_email_2_subject]', 'lang[install_email_2_text]');

CREATE TABLE IF NOT EXISTS `pcm_events` (
  `e_id` int(11) NOT NULL auto_increment,
  `e_name` varchar(255) NOT NULL default '',
  `e_desc` text NOT NULL,
  `e_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `e_img` varchar(255) default NULL,
  `u_id` int(11) NOT NULL default '0',
  `e_report` text,
  `e_public` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`e_id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `pcm_gallery` (
  `g_id` int(11) NOT NULL auto_increment,
  `g_name` varchar(255) NOT NULL default '',
  `g_desc` text NOT NULL,
  `g_pos` int(11) default NULL,
  `g_public` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`g_id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `pcm_gallery_photos` (
  `p_id` int(11) NOT NULL auto_increment,
  `g_id` int(11) default NULL,
  `p_name` varchar(255) NOT NULL default '',
  `p_desc` text NOT NULL,
  `p_date` datetime default NULL,
  `u_id` int(11) NOT NULL default '0',
  `p_loc` varchar(255) NOT NULL default '',
  `p_view` int(11) NOT NULL default '0',
  `p_public` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`p_id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `pcm_menu` (
  `l_id` int(11) NOT NULL auto_increment,
  `l_name` varchar(255) NOT NULL default '',
  `l_link` varchar(255) NOT NULL default '',
  `l_type` int(1) NOT NULL default '0',
  `m_id` int(11) default NULL,
  PRIMARY KEY  (`l_id`)
) TYPE=MyISAM AUTO_INCREMENT=0 ;

-- 
-- Dumping data for table `pcm_menu`
-- 

INSERT IGNORE INTO `pcm_menu` VALUES (1, 'lang[install_menu_1]', 'userarea.php?page=editpic', 1, 2);
INSERT IGNORE INTO `pcm_menu` VALUES (2, 'lang[install_menu_2]', 'userarea.php?page=editpass', 1, 2);
INSERT IGNORE INTO `pcm_menu` VALUES (3, 'lang[install_menu_3]', 'userarea.php', 1, 2);
INSERT IGNORE INTO `pcm_menu` VALUES (4, 'lang[install_menu_4]', 'userarea.php?action=logout', 1, 2);
INSERT IGNORE INTO `pcm_menu` VALUES (5, 'lang[install_menu_5]', 'index.php', 2, 5);
INSERT IGNORE INTO `pcm_menu` VALUES (6, 'lang[install_menu_6]', 'news.php', 2, 5);
INSERT IGNORE INTO `pcm_menu` VALUES (7, 'lang[install_menu_7]', 'users.php', 2, 3);
INSERT IGNORE INTO `pcm_menu` VALUES (8, 'lang[install_menu_8]', 'poll.php', 2, 6);
INSERT IGNORE INTO `pcm_menu` VALUES (9, 'lang[install_menu_9]', 'download.php', 2, 7);
INSERT IGNORE INTO `pcm_menu` VALUES (10, 'lang[install_menu_10]', 'gallery.php', 2, 8);
INSERT IGNORE INTO `pcm_menu` VALUES (11, 'lang[install_menu_11]', 'events.php', 2, 9);


CREATE TABLE IF NOT EXISTS `pcm_modules` (
  `m_id` int(11) NOT NULL auto_increment,
  `m_name` varchar(255) NOT NULL default '',
  `m_version` varchar(255) NOT NULL default '0',
  `m_dir` varchar(255) default NULL,
  `m_status` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`m_id`)
) TYPE=MyISAM AUTO_INCREMENT=0 ;

-- 
-- Dumping data for table `pcm_modules`
-- 

INSERT IGNORE INTO `pcm_modules` VALUES (1, 'lang[install_module1]', '--', NULL, 1);
INSERT IGNORE INTO `pcm_modules` VALUES (2, 'lang[install_module2]', '--', NULL, 1);
INSERT IGNORE INTO `pcm_modules` VALUES (3, 'lang[install_module8]', '--', NULL, 1);
INSERT IGNORE INTO `pcm_modules` VALUES (4, 'lang[install_module5]', '--', NULL, 1);
INSERT IGNORE INTO `pcm_modules` VALUES (5, 'lang[install_module3]', '--', NULL, 1);
INSERT IGNORE INTO `pcm_modules` VALUES (6, 'lang[install_module4]', '--', NULL, 1);
INSERT IGNORE INTO `pcm_modules` VALUES (7, 'lang[install_module6]', '--', NULL, 1);
INSERT IGNORE INTO `pcm_modules` VALUES (8, 'lang[install_module7]', '--', NULL, 1);
INSERT IGNORE INTO `pcm_modules` VALUES (9, 'lang[install_module9]', '--', NULL, 1);
INSERT IGNORE INTO `pcm_modules` VALUES (10,'lang[install_module10]', '--', NULL, 1);


CREATE TABLE IF NOT EXISTS `pcm_news` (
  `n_id` int(11) NOT NULL auto_increment,
  `n_title` varchar(255) NOT NULL default '',
  `n_pic` varchar(255) default NULL,
  `n_text` text NOT NULL,
  `u_id` int(11) NOT NULL default '0',
  `n_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `n_veiw` int(11) NOT NULL default '0',
  PRIMARY KEY  (`n_id`)
) TYPE=MyISAM PACK_KEYS=0 AUTO_INCREMENT=0;


CREATE TABLE IF NOT EXISTS `pcm_poll` (
  `p_id` int(11) NOT NULL auto_increment,
  `p_name` varchar(255) NOT NULL default 'A Poll',
  `u_id` int(11) NOT NULL default '0',
  `p_start` datetime default NULL,
  `p_end` datetime default NULL,
  `p_public` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`p_id`)
) TYPE=MyISAM PACK_KEYS=1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `pcm_poll_options` (
  `o_id` int(11) NOT NULL auto_increment,
  `p_id` int(11) NOT NULL default '0',
  `o_name` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`o_id`)
) TYPE=MyISAM PACK_KEYS=1 AUTO_INCREMENT=0 ;

CREATE TABLE IF NOT EXISTS `pcm_poll_votes` (
  `p_id` int(11) NOT NULL default '0',
  `u_id` int(11) default NULL,
  `u_ip` varchar(255) default NULL,
  `o_id` int(11) NOT NULL default '0'
) TYPE=MyISAM;

CREATE TABLE IF NOT EXISTS `pcm_rank` (
  `r_id` int(11) NOT NULL auto_increment,
  `r_name` varchar(255) NOT NULL default '',
  `r_img` varchar(255) default NULL,
  `r_sort` int(11) NOT NULL default '0',
  PRIMARY KEY  (`r_id`)
) TYPE=MyISAM AUTO_INCREMENT=0 ;


INSERT IGNORE INTO `pcm_rank` VALUES (1, 'lang[install_rank1]', '', 1);
INSERT IGNORE INTO `pcm_rank` VALUES (2, 'lang[install_rank2]', '', 2);


CREATE TABLE IF NOT EXISTS `pcm_rank_list` (
  `r_id` int(11) NOT NULL default '0',
  `v_id` int(11) NOT NULL default '0',
  `r_value` int(11) NOT NULL default '0'
) TYPE=MyISAM;


INSERT IGNORE INTO `pcm_rank_list` VALUES (1, 23, '1');
INSERT IGNORE INTO `pcm_rank_list` VALUES (1, 22, '1');
INSERT IGNORE INTO `pcm_rank_list` VALUES (1, 21, '1');
INSERT IGNORE INTO `pcm_rank_list` VALUES (1, 20, '1');
INSERT IGNORE INTO `pcm_rank_list` VALUES (2, 20, '1');
INSERT IGNORE INTO `pcm_rank_list` VALUES (2, 6, '1');
INSERT IGNORE INTO `pcm_rank_list` VALUES (2, 2, '1');
INSERT IGNORE INTO `pcm_rank_list` VALUES (1, 16, '1');
INSERT IGNORE INTO `pcm_rank_list` VALUES (1, 15, '1');
INSERT IGNORE INTO `pcm_rank_list` VALUES (1, 14, '1');
INSERT IGNORE INTO `pcm_rank_list` VALUES (1, 13, '1');
INSERT IGNORE INTO `pcm_rank_list` VALUES (1, 12, '1');
INSERT IGNORE INTO `pcm_rank_list` VALUES (1, 8, '1');
INSERT IGNORE INTO `pcm_rank_list` VALUES (1, 7, '1');
INSERT IGNORE INTO `pcm_rank_list` VALUES (1, 6, '1');
INSERT IGNORE INTO `pcm_rank_list` VALUES (1, 5, '1');
INSERT IGNORE INTO `pcm_rank_list` VALUES (1, 4, '1');
INSERT IGNORE INTO `pcm_rank_list` VALUES (1, 3, '1');
INSERT IGNORE INTO `pcm_rank_list` VALUES (1, 11, '1');
INSERT IGNORE INTO `pcm_rank_list` VALUES (1, 10, '1');
INSERT IGNORE INTO `pcm_rank_list` VALUES (1, 9, '1');
INSERT IGNORE INTO `pcm_rank_list` VALUES (1, 19, '1');
INSERT IGNORE INTO `pcm_rank_list` VALUES (1, 18, '1');
INSERT IGNORE INTO `pcm_rank_list` VALUES (1, 17, '1');
INSERT IGNORE INTO `pcm_rank_list` VALUES (1, 2, '1');
INSERT IGNORE INTO `pcm_rank_list` VALUES (1, 1, '1');


CREATE TABLE IF NOT EXISTS `pcm_rank_var` (
  `v_id` int(11) NOT NULL auto_increment,
  `v_name` varchar(255) NOT NULL default '',
  `m_id` int(11) NOT NULL default '0',
  `v_type` int(1) NOT NULL default '0',
  PRIMARY KEY  (`v_id`),
  UNIQUE KEY `v_name` (`v_name`)
) TYPE=MyISAM AUTO_INCREMENT=24 ;

-- 
-- Dumping data for table `pcm_rank_var`
-- 

INSERT IGNORE INTO `pcm_rank_var` VALUES (1, 'ADMIN', 1, 0);
INSERT IGNORE INTO `pcm_rank_var` VALUES (2, 'USERAREA', 2, 0);
INSERT IGNORE INTO `pcm_rank_var` VALUES (3, 'NEWSADD', 5, 1);
INSERT IGNORE INTO `pcm_rank_var` VALUES (4, 'NEWSEDIT', 5, 2);
INSERT IGNORE INTO `pcm_rank_var` VALUES (5, 'NEWSDEL', 5, 3);
INSERT IGNORE INTO `pcm_rank_var` VALUES (6, 'POLLVIEW', 6, 0);
INSERT IGNORE INTO `pcm_rank_var` VALUES (7, 'POLLADD', 6, 1);
INSERT IGNORE INTO `pcm_rank_var` VALUES (8, 'POLLDEL', 6, 3);
INSERT IGNORE INTO `pcm_rank_var` VALUES (9, 'RANKADD', 4, 1);
INSERT IGNORE INTO `pcm_rank_var` VALUES (10, 'RANKEDIT', 4, 2);
INSERT IGNORE INTO `pcm_rank_var` VALUES (11, 'RANKDEL', 4, 3);
INSERT IGNORE INTO `pcm_rank_var` VALUES (12, 'FILEADD', 7, 1);
INSERT IGNORE INTO `pcm_rank_var` VALUES (13, 'FILEEDIT', 7, 2);
INSERT IGNORE INTO `pcm_rank_var` VALUES (14, 'FILEDEL', 7, 3);
INSERT IGNORE INTO `pcm_rank_var` VALUES (15, 'SCRNADD', 8, 1);
INSERT IGNORE INTO `pcm_rank_var` VALUES (16, 'SCRNDEL', 8, 3);
INSERT IGNORE INTO `pcm_rank_var` VALUES (17, 'USERADD', 3, 1);
INSERT IGNORE INTO `pcm_rank_var` VALUES (18, 'USEREDIT', 3, 2);
INSERT IGNORE INTO `pcm_rank_var` VALUES (19, 'USERDEL', 3, 3);
INSERT IGNORE INTO `pcm_rank_var` VALUES (20, 'EVENTVIEW', 9, 0);
INSERT IGNORE INTO `pcm_rank_var` VALUES (21, 'EVENTADD', 9, 1);
INSERT IGNORE INTO `pcm_rank_var` VALUES (22, 'EVENTEDIT', 9, 2);
INSERT IGNORE INTO `pcm_rank_var` VALUES (23, 'EVENTDEL', 9, 3);


CREATE TABLE IF NOT EXISTS `pcm_style` (
  `s_id` int(11) NOT NULL auto_increment,
  `s_name` varchar(255) NOT NULL default '',
  `s_dir` varchar(255) NOT NULL default '',
  `s_used` int(11) NOT NULL default '0',
  PRIMARY KEY  (`s_id`),
  UNIQUE KEY `s_dir` (`s_dir`),
  UNIQUE KEY `s_name` (`s_name`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;


INSERT IGNORE INTO `pcm_style` VALUES (1, 'Default', 'default', 1);


CREATE TABLE IF NOT EXISTS `pcm_users` (
  `u_id` int(11) NOT NULL auto_increment,
  `u_name` varchar(255) NOT NULL default '',
  `u_password` varchar(255) NOT NULL default '',
  `r_id` int(11) NOT NULL default '0',
  `u_logtime` datetime NOT NULL default '0000-00-00 00:00:00',
  `u_email` varchar(255) NOT NULL default '',
  `u_join` datetime default NULL,
  `u_pic` varchar(255) default NULL,
  `u_dob` datetime default NULL,
  `u_location` varchar(255) default NULL,
  `u_website` varchar(255) default NULL,
  `u_xfire` varchar(255) default NULL,
  `u_msn` varchar(255) default NULL,
  `u_showemail` int(1) NOT NULL default '0',
  `u_showtime` int(1) NOT NULL default '1',
  `u_interests` text,
  PRIMARY KEY  (`u_id`),
  UNIQUE KEY `u_name` (`u_name`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `pcm_visitors` (
  `v_ip` char(255) NOT NULL default '',
  `u_id` int(11) NOT NULL default '0',
  `v_date` datetime NOT NULL default '0000-00-00 00:00:00',
  UNIQUE KEY `v_ip` (`v_ip`)
) TYPE=MyISAM;