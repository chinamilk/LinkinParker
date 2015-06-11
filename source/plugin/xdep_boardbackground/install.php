<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF
DROP TABLE IF EXISTS `cdb_bg_setting`;
CREATE TABLE `cdb_bg_setting` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `fid` int(6) NOT NULL,
  `imgurl` varchar(255) DEFAULT NULL,
  `color` varchar(7) DEFAULT NULL,
  `xrepeat` smallint(1) NOT NULL DEFAULT '0',
  `yrepeat` smallint(1) NOT NULL DEFAULT '0',
  `xcenter` smallint(1) NOT NULL DEFAULT '0',
  `posts` smallint(1) NOT NULL DEFAULT '0',
  `fixed` smallint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `cdb_gbg_setting`;
CREATE TABLE `cdb_gbg_setting` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `fid` int(6) NOT NULL,
  `imgurl` varchar(255) DEFAULT NULL,
  `color` varchar(7) DEFAULT NULL,
  `xrepeat` smallint(1) NOT NULL DEFAULT '0',
  `yrepeat` smallint(1) NOT NULL DEFAULT '0',
  `xcenter` smallint(1) NOT NULL DEFAULT '0',
  `posts` smallint(1) NOT NULL DEFAULT '0',
  `fixed` smallint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

EOF;

runquery($sql);

$finish = TRUE;
?>