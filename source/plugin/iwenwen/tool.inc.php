<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$action = $_REQUEST['action'];

include_once dirname(__FILE__).'/class/util.class.php';
$util = new IwenwenUtil();

include_once dirname(__FILE__).'/class/api.class.php';
$api = new IwenwenApi();
include DISCUZ_ROOT.'source/discuz_version.php';

require_once libfile('function/forum');
require_once libfile('function/post');
require_once libfile('function/plugin');

function array_to_table($array){
	if(!is_array($array) || empty($array)){
		return '';
	}
	$HTML = "<table class=\"table\">";
	foreach($array as $key=> $value){
		if(is_array($value)){
			$HTML .= "<tr><td>$key</td><td class=\"make_table_td\">".array_to_table($value)."</td></tr>";
		}
		else{
			$HTML .= "<tr><td>$key</td><td class=\"make_table_td\">$value</td></tr>";
		}
	}
	$HTML .= "</table><hr/>";
	return $HTML;
}

if(!$util->checkTable()){ /* 若表格不存在，尝试创建表格，并返回错误。*/
	$util->createTable($sql);
}

$sid = $_G['setting']['my_siteid'];

if($action == 'status'){
	echo 'DISCUZ_VERSION:'.DISCUZ_VERSION.'<BR/>';
	echo 'DISCUZ_RELEASE:'.DISCUZ_RELEASE.'<BR/>';
	echo 'last_forum_sync:'.$_G['setting']['iwenwen_last_sync'].' '.date('Y-m-d H:i:s',$_G['setting']['iwenwen_last_sync']).'<br/>';
	echo 'install_time:'.$_G['setting']['iwenwen_install_time'].' '.date('Y-m-d H:i:s',$_G['setting']['iwenwen_install_time']).'<br/>';
	echo 'question_forums:'.$_G['setting']['iwenwen_question_forums'].'<br/>';
	echo 'question_flag:'.$_G['setting']['iwenwen_question_flag'].'<br/>';
	echo 'answer_flag:'.$_G['setting']['iwenwen_answer_flag'].'<br/>';
	echo 'afc_flag:'.$_G['setting']['iwenwen_afc_flag'].'<br/>';
	echo 'afs_flag:'.$_G['setting']['iwenwen_afs_flag'].'<br/>';
	echo 'afcall_flag:'.$_G['setting']['iwenwen_afcall_flag'].'<br/>';
	echo 'afsall_flag:'.$_G['setting']['iwenwen_afsall_flag'].'<br/>';
	echo array_to_table(@unserialize($_G['setting']['iwenwen_question_forums_keyword']));

		
	$sql = 'select * from '.DB::table('iwenwen_backflow').' limit 1';
 	$result = DB::fetch_first($sql);
 	echo array_to_table($result);
	exit;
}
elseif($action == 'checkSecret'){
	$status = $api->checkAppSecret($_G['setting']['iwenwen_appkey'], $_G['setting']['iwenwen_secretkey']);
	echo array_to_table($status);
}
elseif($action == 'updateCategory'){
	$result = $api->updateCategory(true);	
	echo array_to_table($result);
	$forums = $api->getIwenwenForums();
	echo array_to_table($forums);
	echo 'json:'.CJSON::encode($forums).'<hr/>';
	
	// 加载Forum缓存
		require_once libfile('function/forumlist');		
		if(!isset($_G['cache']['forums'])) {
			loadcache('forums');
		}
		$forumcache = &$_G['cache']['forums'];	
		foreach($forumcache as $forum){
			echo 'id:'.$forum['fid'].',status:'.$forum['status'].'<br/>';
		}
}
elseif($action == 'sendPostAccount'){
	$result = $api->sendPostAccount();
	echo array_to_table($result);
}
elseif($action == 'checktable'){
	$sql = 'select * from '.DB::table('iwenwen_backflow').' order by tid desc,pid desc limit 1';
 	$result = DB::fetch_first($sql);
 	echo array_to_table($result);
 	if($_GET['date']){
 		$sql = 'select * from '.DB::table('iwenwen_answers').' where `date`=\''.intval($_GET['date']).'\'';
 	}
 	else{
 		$sql = 'select * from '.DB::table('iwenwen_answers').' order by `date` desc limit 1';
 	}
 	$result = DB::fetch_first($sql);
 	echo array_to_table($result);
}
elseif($action == 'createtable'){
	echo $util->createTable($sql);
}
else{
	echo 'hello world.';
}