<?php
/**
 *		作者：evin - 康盛产品工程师
 *		专注于Discuz产品，为站长提供优质的专业服务
 *
 *		版权所有：好团队 & evin
 *		QQ:414285898
 *		网站：http://www.wuzhuo.net
 *		申明：此插件非开源软件，您不得对插件源代码进行任何形式任何目的的再发布。
 *		====================================================================================
 *			  承接discuz插件、模板仿制定制业务，价格便宜交期快QQ414285898 || 电话13632811904/18688786880
 *		====================================================================================
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$installsql = <<<SQL
CREATE TABLE pre_evinm_chat_message (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `chatmessage` text NOT NULL,
  `uid` int(8) NOT NULL,
  `posttime` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

CREATE TABLE pre_evinm_chat_userset (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `iszhankai` int(11) DEFAULT NULL,
  `showsexy` int(11) DEFAULT NULL COMMENT '1显示0不显示',
  `showavat` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM;

SQL;

?>
