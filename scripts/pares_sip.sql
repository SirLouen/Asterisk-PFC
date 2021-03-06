CREATE TABLE `pares_sip` (
`id` int(11) NOT NULL auto_increment,
`name` varchar(80) NOT NULL default '',
`host` varchar(31) NOT NULL default '',
`nat` varchar(5) NOT NULL default 'no',
`type` enum('user','peer','friend') NOT NULL default 'friend',
`callerid` varchar(80) default NULL,
`context` varchar(80) default NULL,
`defaultip` varchar(15) default NULL,
`dtmfmode` varchar(7) default NULL,
`fromuser` varchar(80) default NULL,
`fromdomain` varchar(80) default NULL,
`insecure` varchar(20) default NULL,
`mailbox` varchar(50) default NULL,
`md5secret` varchar(80) default NULL,
`deny` varchar(95) default NULL,
`permit` varchar(95) default NULL,
`qualify` char(3) default NULL,
`secret` varchar(80) default NULL,
`disallow` varchar(100) default 'all',
`allow` varchar(100) default 'alaw;ulaw;gsm',
`port` smallint(5) unsigned NOT NULL default '0',
`regserver` varchar(100) default NULL,
`regseconds` int(11) NOT NULL default '0',
`lastms` int(11) NOT NULL default '0',
`username` varchar(80) NOT NULL default '',
`defaultuser` varchar(80) NOT NULL default '',
`subscribecontext` varchar(80) default NULL,
`useragent` varchar(20) default NULL,
`useradmin`  int(1) NOT NULL DEFAULT '0',
PRIMARY KEY (`id`),
UNIQUE KEY `name` (`name`),
KEY `name_2` (`name`)
) ENGINE=MyISAM ROW_FORMAT=DYNAMIC;
