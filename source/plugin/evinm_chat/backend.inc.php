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
require_once libfile('function/discuzcode');
if(!$_G['uid']) {
	return '';
}
$config = $_G['cache']['plugin']['evinm_chat'];
$lang = lang('plugin/evinm_chat');

//��ѯ����
$messages = DB::query("SELECT uid,chatmessage,username,posttime,id
		FROM ".DB::table("evinm_chat_message")."
		where posttime > $_GET[time]
		ORDER BY id DESC limit 5000;
		");
//�Ƿ����¼�¼
if(DB::num_rows($messages) == 0){ 
		$status_code = 2;
}else{
		$status_code = 1;
}

//�ͷ���ʾϵͳ��Ϣ
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


//����xml���ݽṹ

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<response>\n";
echo "\t<status>$status_code</status>\n";
echo "\t<time>".time()."</time>\n";
if($status_code == 1){ //����м�¼
	$lists = array();
	while($message = DB::fetch($messages)){
		//$message['chatmessage'] = htmlspecialchars(stripslashes($message['chatmessage'])); ��Ϊphp5.4���µ�ʹ��
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


