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
$ac = $_GET['ac'];
$config = $_G['cache']['plugin']['evinm_chat'];
$lang = lang('plugin/evinm_chat');
require_once libfile('function/discuzcode');
if(!$_G['uid']) {
	return '';
}

$chatmessage = iconv("utf-8",CHARSET,$_GET['chatmessage']);
$chatmessage = discuzcode($chatmessage);
$chatmessage = str_replace("[em:",' <img src="static/image/smiley/comcom/',$chatmessage);
$chatmessage = str_replace(":]",'.gif" class="vm"> ',$chatmessage);
$chatmessage = str_replace("<br />",'',$chatmessage);

if($chatmessage == "" || $chatmessage == $chat_old || $chatmessage == $lang['tishi']){
	return '';
}

DB::insert('evinm_chat_message',array('chatmessage'=>addslashes($chatmessage),'uid'=>$_G['uid'],'posttime'=>$_G['timestamp'],'username'=>$_G['username']));
$chat_old = $chatmessage;

?>