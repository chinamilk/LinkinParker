<?php
/**
 *		���ߣ�evin - ��ʢ��Ʒ����ʦ
 *		רע��Discuz��Ʒ��Ϊվ���ṩ���ʵ�רҵ����
 *
 *		��Ȩ���У����Ŷ� & evin
 *		QQ:414285898
 *		��վ��http://www.wuzhuo.net
 *		�������˲���ǿ�Դ����������öԲ��Դ��������κ���ʽ�κ�Ŀ�ĵ��ٷ�����
 *		====================================================================================
 *			  �н�discuz�����ģ����ƶ���ҵ�񣬼۸���˽��ڿ�QQ414285898 || �绰13632811904/18688786880
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
  `showsexy` int(11) DEFAULT NULL COMMENT '1��ʾ0����ʾ',
  `showavat` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM;

SQL;

?>
