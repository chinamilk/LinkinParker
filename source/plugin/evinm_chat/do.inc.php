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