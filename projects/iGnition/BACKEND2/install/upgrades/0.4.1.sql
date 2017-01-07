CREATE TABLE IF NOT EXISTS `pcm_visitors` (
  `v_ip` char(255) NOT NULL default '',
  `u_id` int(11) NOT NULL default '0',
  `v_date` datetime NOT NULL default '0000-00-00 00:00:00',
  UNIQUE KEY `v_ip` (`v_ip`)
) TYPE=MyISAM;