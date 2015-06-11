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
require_once libfile('function/discuzcode');
if(!$_G['uid']) {
	return '';
}
$config = $_G['cache']['plugin']['evinm_chat'];
$lang = lang('plugin/evinm_chat');

//查询数据
$messages = DB::query("SELECT uid,chatmessage,username,posttime,id
		FROM ".DB::table("evinm_chat_message")."
		where posttime > $_GET[time]
		ORDER BY id DESC limit 5000;
		");
//是否有新记录
if(DB::num_rows($messages) == 0){ 
		$status_code = 2;
}else{
		$status_code = 1;
}

//就否显示系统消息
$formhash = $_G[formhash];
$cache_name = 'cformhash_'.$_G['uid'];
loadcache($cache_name);
$cformhash = $_G['cache'][$cache_name];
if($cformhash['hash'] != $formhash && $config['welcome'] != ""){
	$wels = explode("\n",$config['welcome']);
	$wels = array_filter($wels);
	$list_wels = array();
	foreach($wels as $welcome){
		$wec['chatmessage'] = $welcome;
		$wec['username'] = '<span style="color:red;">'.$lang['xtxx'].'</span>';
		$wec['id'] = "";
		$wec['sex'] = "";
		$wec['posttime'] = $_G['timestamp'];
		$list_wels[] = $wec;
	}		

	$chatc = array();
	$chatc['hash'] = $formhash;	
	save_syscache($cache_name,$chatc);
}


//返回xml数据结构

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<response>\n";
echo "\t<status>$status_code</status>\n";
echo "\t<time>".time()."</time>\n";
if($status_code == 1){ //如果有记录
	$lists = array();
	while($message = DB::fetch($messages)){
		//$message['chatmessage'] = htmlspecialchars(stripslashes($message['chatmessage'])); 此为php5.4以下的使用
		$msg[chatmessage] = dhtmlspecialchars(stripslashes($message['chatmessage']));
		$msg[username] = $message[username];
		$msg[id] = $message[id];
		$msg[sex] = DB::result_first("select gender from ".DB::table('common_member_profile')." where `uid` = ".intval($message[uid])); 
		$msg[posttime] = $message[posttime];
		$lists[] = $msg;
	}
	$lists = _multi_array_sort($lists, 'id');
	
	if($cformhash['hash'] != $formhash && $config['welcome'] != ""){
		$lists = array_merge($lists,$list_wels);
	}

	foreach($lists as $msg){
		echo "\t<message>\n";
		echo "\t\t<author>$msg[username]</author>\n";
		echo "\t\t<text>$msg[chatmessage]</text>\n";
		echo "\t\t<sex>$msg[sex]</sex>\n";
		echo "\t</message>\n";
	}

}
echo "</response>";

function _multi_array_sort($multi_array, $sort_key, $sort = SORT_ASC) {
	if (is_array($multi_array)) {
		foreach ($multi_array as $row_array) {
			if (is_array($row_array)) {
			$key_array[] = $row_array[$sort_key];
			} else {
			return FALSE;
			}
		}
	} else {
		return FALSE;
	}
	array_multisort($key_array, $sort, $multi_array);
	return $multi_array;
}

?>


