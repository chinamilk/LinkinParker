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

global $_G;
$config = $_G['cache']['plugin']['evinm_chat'];
$sql = DB::query("select * from ".DB::table('evinm_chat_userset')." where `uid` = ".intval($_G['uid']));
$nums = DB::num_rows($sql);
if($nums > '0'){
	$userset = DB::fetch($sql);
	$userset['stat'] = '1';
}else{
	$userset['stat'] = 'none';
	$userset['iszhankai'] = '-1';
	$userset['showsexy'] = '-1';
}
include template('evinm_chat:userset');
?>


