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
 **/

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}


$url = 'http://wuzhuo.net/plugindev/index.php?charset='.CHARSET.'&identifier='.$plugin['identifier'];
$cont =  dfsockopen($url);
header("content-Type: text/html; charset=".CHARSET);
echo iconv ("GBK",CHARSET,$cont);


?>