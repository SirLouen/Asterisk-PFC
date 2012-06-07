connect meetme;

CREATE TABLE `booking` (
  `bookId` int(10) unsigned NOT NULL auto_increment,
  `clientId` int(10) unsigned default '0',
  `confno` varchar(30) default '0',
  `pin` varchar(30) NOT NULL default '0',
  `adminpin` varchar(30) NOT NULL default '0',
  `starttime` datetime NOT NULL default '0000-00-00 00:00:00',
  `endtime` datetime NOT NULL default '0000-00-00 00:00:00',
  `dateReq` datetime NOT NULL default '0000-00-00 00:00:00',
  `dateMod` datetime NOT NULL default '0000-00-00 00:00:00',
  `maxUser` varchar(30) NOT NULL default '10',
  `status` varchar(30) NOT NULL default 'A',
  `confOwner` varchar(30) NOT NULL default '',
  `confDesc` varchar(100) NOT NULL default '',
  `adminopts` varchar(10) NOT NULL default '',
  `opts` varchar(10) NOT NULL default '',
  `sequenceNo` int(10) unsigned default '0',
  `recurInterval` int(10) unsigned default '0',
  `recordingfilename` varchar(128) default NULL,
  PRIMARY KEY  (`bookId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=145 ;

CREATE TABLE `cdr` (
  `bookId` int(11) default NULL,
  `duration` varchar(12) default NULL,
  `CIDnum` varchar(32) default NULL,
  `CIDname` varchar(32) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL default '0',
  `book_id` int(11) NOT NULL default '0',
  `ntype` char(10) default NULL,
  `ndate` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `participants` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL default '0',
  `book_id` int(10) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=782 ;

CREATE TABLE `user` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(100) NOT NULL default '',
  `password` varchar(25) default NULL,
  `first_name` varchar(50) default NULL,
  `last_name` varchar(50) default NULL,
  `telephone` varchar(15) default NULL,
  `admin` varchar(5) NOT NULL default 'User',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;
