INSERT INTO `asterisk`.`pares_sip` (`id` ,`name` ,`host` ,`nat` ,`type` ,
`callerid`,`context`,`defaultip` ,`dtmfmode` ,`fromuser` ,`fromdomain` ,
`insecure` ,`mailbox`,`md5secret` ,`deny` ,`permit` ,`qualify` ,`secret` ,
`disallow` ,`allow` ,`port` ,`regserver` ,`regseconds` ,`lastms` ,
`username` ,`defaultuser` ,`subscribecontext` ,`useragent` ,`useradmin`)
VALUES (NULL , 'proveedorip', 'home-asterisk.local', 'no', 'friend', NULL , 
'entrantes', NULL , NULL , 'ucaautos', NULL , 'invite', NULL , NULL,NULL, 
NULL , 'yes', '12345678', 'all', 'g729;ilbc;gsm;ulaw;alaw', '35060', NULL , 
'0', '0', '', 'ucaautos', NULL , NULL , '0');

INSERT INTO `asterisk`.`pares_sip` (`id`, `name`, `host`, `nat`, `type`, 
`callerid`, `context`, `defaultip`, `dtmfmode`, `fromuser`, `fromdomain`, 
`insecure`, `mailbox`, `md5secret`, `deny`, `permit`, `qualify`, `secret`, 
`disallow`, `allow`, `port`, `regserver`, `regseconds`, `lastms`, 
`username`, `defaultuser`, `subscribecontext`, `useragent`, `useradmin`) 
VALUES (NULL, '21', 'dynamic', 'no', 'friend', NULL, manager', NULL,
'rfc2833', NULL, NULL, NULL, '21@default', 
'5dbe664c6d998967ad9bfe4ea37521a1', 
NULL, NULL, 'yes', '', 'all', 'g729;ilbc;gsm;ulaw;alaw', '0', NULL, '0', 
'0', '', '', NULL, NULL, '0');

INSERT INTO `asterisk`.`pares_sip` (`id`, `name`, `host`, `nat`, `type`, 
`callerid`, `context`, `defaultip`, `dtmfmode`, `fromuser`, `fromdomain`, 
`insecure`, `mailbox`, `md5secret`, `deny`, `permit`, `qualify`, `secret`, 
`disallow`, `allow`, `port`, `regserver`, `regseconds`, `lastms`, 
`username`, `defaultuser`, `subscribecontext`, `useragent`, `useradmin`) 
VALUES (NULL, '54', 'dynamic', 'no', 'friend', NULL, 'resto', NULL, 
'rfc2833', NULL, NULL, NULL, '54@default', 
'037f3c092ae05f73054d2d2dd0e7d5dc', 
NULL, NULL, 'yes', '', 'all', 'g729;ilbc;gsm;ulaw;alaw', '0', NULL, '0', 
'0', '', '', NULL, NULL, '1');
