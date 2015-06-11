<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$action = $_REQUEST['action'];

include_once dirname(__FILE__).'/class/util.class.php';
$util = new IwenwenUtil();

require_once libfile('function/forum');
require_once libfile('function/post');

$sid = $_G['setting']['my_siteid'];
$result = array('code'=>2,'msg'=>'error params.');
ob_start();

//file_put_contents(DISCUZ_ROOT.'/data/post.log',"\nrequest:\n".var_export($_REQUEST,true),FILE_APPEND);
//file_put_contents(DISCUZ_ROOT.'/data/post.log',"\npost:\n".var_export($_POST,true),FILE_APPEND);
//file_put_contents(DISCUZ_ROOT.'/data/post.log',"\n==IN_MOBILE:==(".defined('IN_MOBILE').")============\n",FILE_APPEND);
if(!$util->checksig($_REQUEST,$new_sign)){
	unset($_REQUEST['title'],$_REQUEST['content'],$_REQUEST['authorName']);
	$result = array(
		'code'=> 1,
		'msg'=> "error sig.\n".var_export($_REQUEST,true)."\nsite sign:\n".$new_sign."\nappkey:".$_G['setting']['iwenwen_appkey']."\n",
	);
}
elseif(!$util->checkTable()){ /* 若表格不存在，尝试创建表格，并返回错误。*/
	$util->createTable($sql);
	$result = array(
		'code'=> 1,
		'msg'=> "error install table not exists,plugin is trying to create it.please try it again.\n",
	);
}
else
{
	$posts = $_POST;
	if($action == 'pushQuestion' || $action == 'pushAnswer'){
		$memory_exists = false;
		if(function_exists('memory') && memory('check')){
			$memory_exists = true;
			$lastpostlog = memory('get','iwenwen_last_post_log');
		}
		else{
			$lastpostlog = @include DISCUZ_ROOT.'/data/cache/iwenwen_lastpost.php';
		}
		
		if(empty($lastpostlog))	$lastpostlog = array();
		$time_interval = 30;//30秒内阻止重复qid,answerId提交.php执行时间set_time_limit一般是30s。30s后，进入发帖逻辑中排重
		foreach($lastpostlog as $hpk => $lastpostinfo){
			if($lastpostinfo['qid']==$posts['qid']&& $lastpostinfo['answerId']==$posts['answerId']){
				if(TIMESTAMP - $lastpostinfo['time'] < $time_interval){ 
					trans_api_result(array('discuzid' => intval($sid),'code'=>9,'msg'=>'call api two fast,last same qid is on the way.'));
					exit;
				}
			}
			if(TIMESTAMP - $lastpostinfo['time'] >= $time_interval){
				unset($lastpostlog[$hpk]);
			}
		}
		// 最后一次提交的信息加入到数组中
		$lastpostlog[] = array('time'=>TIMESTAMP,'qid'=>$posts['qid'],'answerId'=>$posts['answerId']);
		if($memory_exists){
			memory('set','iwenwen_last_post_log',$lastpostlog);
		}
		else{
			$content = "<?\nreturn ".var_export($lastpostlog,true).";\n?>";
			//file_put_contents(DISCUZ_ROOT.'/data/cache/iwenwen_lastpost.php', $content,LOCK_EX);
			if($fp = fopen(DISCUZ_ROOT.'/data/cache/iwenwen_lastpost.php', 'w')) {
				flock($fp, 2); // LOCK_EX
				fwrite($fp, $content);
				fclose($fp);
			}
		}
	}
	
	if($action == 'pushAnswer' || $action == 'editQuestion'){
		if(empty($posts['pid']) && !empty($posts['tid'])){
			$result = $util->newpost($posts);
		}
		elseif(!empty($posts['pid']) && !empty($posts['tid'])){
			$result = $util->editpost($posts);
		}
		else{
			$result = array('code'=> 2 ,'msg'=>'error params.need tid.');
		}
		$tid = $result['tid'] = intval($result['tid']);
		$pid = $result['pid'] = intval($result['pid']);
		// tid,pid供其它插件使用$GLOBALS[tid],$GLOBALS[pid]调用
	}
	elseif($action == 'anonymousQuestion'){
		if(!empty($posts['pid']) && !empty($posts['tid'])){
			$result = $util->setanonymous($posts); 
		}
		else{
			$result = array('code'=> 2 ,'msg'=>'error params.need tid.');
		}	
	}
	elseif($action == 'pushQuestion'){
        if(empty($_G['setting']['iwenwen_question_forums'])){
             $forums = $util->getiwenwenForums(true);
             $selectedfid = array_keys($forums);
        }
        else{
            $selectedfid = explode(',',$_G['setting']['iwenwen_question_forums']);
            $selectedfid = array_filter($selectedfid);
        }
        if(!empty($selectedfid) && !in_array($posts['fid'],$selectedfid)){
            $result = array('code'=> 2 ,'msg'=>'error params.fid error.');
            /* 当选择的版面错误时，主动推送一次版面信息 */
            include_once dirname(__FILE__).'/class/api.class.php';
			$api = new IwenwenApi();
			$api->updateCategory(true); 
        }
		else{
			$result = $util->newthread($posts);
        }
        $tid = $result['tid'] = intval($result['tid']);
		$pid = $result['pid'] = intval($result['pid']);
		// tid,pid供其它插件使用$GLOBALS[tid],$GLOBALS[pid]调用
	}
	elseif($action == 'deleteQuestion'){
		if(empty($_POST['tid']) || empty($_POST['pid'])){
			$result = array('code'=> 2 ,'msg'=>'error params.need tid,pid.');
		}
		else{
			if(class_exists('C')){
				$orig = C::t('forum_post')->fetch('tid:'.$_POST['tid'], $_POST['pid'], false);
			}
			else{
				$posttable = getposttablebytid($_POST['tid']);
				$orig = DB::fetch_first("SELECT p.first, p.authorid, p.author, p.dateline, p.anonymous, p.invisible, p.htmlon FROM ".DB::table($posttable)." p
				WHERE pid='$pid' AND tid='$_G[tid]' AND fid='$_G[fid]'");
			}
			
			$isfirstpost = $orig['first'] ? 1 : 0;
			
			DB::query("delete from ".DB::table('iwenwen_backflow')." where tid='".intval($_POST['tid'])."' and pid ='".intval($_POST['pid'])."'");
			
			require_once libfile('function/delete');
			if(version_compare(DISCUZ_VERSION, "X2", "<")){ // X1.5函数参数不一样。
				if($isfirstpost){
					deletethread("`tid`='".$_POST['tid']."'", true);
				}
				else{
					deletepost("`pid`='".$_POST['pid']."'", true);
				}
			}
			else{
				if($isfirstpost){
					deletethread($_POST['tid'], false, false);
				}
				else{
					deletepost($_POST['pid'], 'pid', false);
				}
			}
			$result = array('code'=>0,'msg'=>'delete sucess.','tid'=> intval($_POST['tid']),'pid'=> intval($_POST['pid']));
		}
	}
	elseif($action == 'adstatus'){ // 后台管理员修改状态时，同步到插件. 及时同步广告k状态
		
		$status = array();
		$status['iwenwen_afcall_flag'] = $_POST['afcallstatus'] == 1 ? 1:0;
		$status['iwenwen_afsall_flag'] = $_POST['afsallstatus'] == 1 ? 1:0;
		
		$status['iwenwen_afc_flag'] = $_POST['afcstatus'] == 1 ? 1:0;
		$status['iwenwen_afs_flag'] = $_POST['afsstatus'] == 1 ? 1:0;
	
		$vsql = $subfix = '';
		foreach($status as $variable => $value) {
			$vsql .= "$subfix('$variable','".addcslashes($value, "\n\r\\'\"\032")."')";
			$subfix = ',';
		}
		DB::query("REPLACE INTO ".DB::table('common_setting')." (`skey`, `svalue`) VALUES $vsql");
		require_once libfile('function/cache');
		updatecache(array('setting'));
		$result = array('code'=>0,'msg'=>'set adstatus success.');
	}
	
	/**
	 * delete last post info,when post over. success or not.
	 */
	if($action == 'pushQuestion' || $action == 'pushAnswer'){
		$memory_exists = false;
		if(function_exists('memory') && memory('check')){
			$memory_exists = true;
			$lastpostlog = memory('get','iwenwen_last_post_log');
		}
		else{
			$lastpostlog = @include DISCUZ_ROOT.'/data/cache/iwenwen_lastpost.php';
		}
	
		if(empty($lastpostlog))	$lastpostlog = array();
		foreach($lastpostlog as $hpk => $lastpostinfo){
			if($lastpostinfo['qid']==$posts['qid']&& $lastpostinfo['answerId']==$posts['answerId']){
				unset($lastpostlog[$hpk]);
			}
		}
		if($memory_exists){
			memory('set','iwenwen_last_post_log',$lastpostlog);
		}
		else{
			$content = "<?\nreturn ".var_export($lastpostlog,true).";\n?>";
			//file_put_contents(DISCUZ_ROOT.'/data/cache/iwenwen_lastpost.php', $content,LOCK_EX);
			if($fp = fopen(DISCUZ_ROOT.'/data/cache/iwenwen_lastpost.php', 'w')) {
				flock($fp, 2); // LOCK_EX
				fwrite($fp, $content);
				fclose($fp);
			}
		}
	}
}
$result['discuzid'] = intval($sid);


trans_api_result($result);

function trans_api_result($result = array()){
	if(function_exists('json_encode')) {
		$returnstr = json_encode($result);
	}
	else{
		include_once dirname(__FILE__).'/class/json.class.php';
		$returnstr = CJSON::encode($result);
	}
	ob_get_clean(); // delete current output buffer. exclude the impact of other plugins.
	echo $returnstr;
    //file_put_contents(DISCUZ_ROOT.'/data/post.log',$returnstr."\n\n",FILE_APPEND);
    //return $returnstr;
}

exit; // make sure exit right here.