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
$lang = lang('plugin/evinm_chat');
$iszhankai = addslashes($_GET['acszt']);
$showsexy = addslashes($_GET['sexy']);
$showavat = addslashes($_GET['showavat']);
$rows_sql = DB::query("select * from ".DB::table('evinm_chat_userset')." where `uid` = ".intval($_G['uid']));
if(DB::num_rows($rows_sql) > '0'){
	DB::update('evinm_chat_userset',array('iszhankai'=>addslashes($iszhankai),'showsexy'=>$showsexy,'showavat'=>$showavat)," `uid`=".intval($_G['uid']));
}else{
	DB::insert('evinm_chat_userset',array('iszhankai'=>addslashes($iszhankai),'showsexy'=>$showsexy,'showavat'=>$showavat,'uid'=>intval($_G['uid'])));
} 

showmessage ( "�����ɹ���", '', '', array (	'closetime' => 3,	'alert' => 'right') );

?>