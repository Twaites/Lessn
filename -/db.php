<?php
// no need to edit this file, see config.php

error_reporting(0);

// connect (and install if necessary)

// Added the '`short_link` char(10) unsigned NOT NULL, '.  line - T
mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
mysql_select_db(DB_NAME);
mysql_query('CREATE TABLE IF NOT EXISTS `'.DB_PREFIX.'urls` ( '.
	'`id` int(11) unsigned NOT NULL auto_increment, '.
	'`short_link` char(10) NOT NULL, '. 
	'`url` text character set utf8 collate utf8_unicode_ci NOT NULL, '.
	'`checksum` int(10) unsigned NOT NULL, '.
	'`visits` INT UNSIGNED NOT NULL DEFAULT  "0", '.
	'PRIMARY KEY  (`id`), '.
	'KEY `checksum` (`checksum`) '.
	') ENGINE=MyISAM DEFAULT CHARSET=utf8;');
mysql_query('CREATE TABLE IF NOT EXISTS `'.DB_PREFIX.'log` ( '.
	'`id` int(11) unsigned NOT NULL auto_increment, '.
	'`short_link` char(10) NULL, '. 
	'`ip` varchar(16) NOT NULL, '.
	'`referrer` varchar(64) NOT NULL, '.
	'`useragent` varchar(256) NOT NULL, '.
	'`datetime` datetime NOT NULL, '.
	'PRIMARY KEY  (`id`) '.
	') ENGINE=MyISAM DEFAULT CHARSET=utf8;');