<?php
/** 防止非法引用 */
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}


class plugin_iwenwen {
	
	var $interval = 43200;
	
	function plugin_iwenwen(){
		include_once DISCUZ_ROOT.'./source/discuz_version.php';
		if(strcmp(DISCUZ_VERSION,'X2.5')<0){
			define('USE_DB_SQL',true);
		}
	}
	function init() {
		
	}
	
	function common(){
		global $_G;
		/**
		 * 每24小时同步一次版面信息,发送昨天的回流问题回帖量
		 */
		if(time()-$_G['setting']['iwenwen_last_sync']>$this->interval){
			include_once dirname(__FILE__).'/class/api.class.php';
			$api = new IwenwenApi();
			$api->updateCategory(); 
			$api->sendPostAccount();
		}

	}
	
	/**
	 * 删回贴，sql使用silent方式，即使表格不存在也不引入错误
	 * @param unknown_type $params
	 */
	public function deletepost($params) {
		$pids = $params['param'][0];
		$idtype = $params['param'][1];
		$step = $params['step'];

		if($step == 'delete' && $idtype == 'pid' && is_array($pids)) {
			include_once dirname(__FILE__).'/class/api.class.php';
			$api = new IwenwenApi();
			if(class_exists('C')){
				$query = DB::query("select * from ".DB::table('iwenwen_backflow')." where pid in (".implode(',',$pids).")",null,'SILENT');
				while($row = DB::fetch($query)) {
					$api->deletewenwen($row['qid'],$row['answerid']);
				}
				DB::query("delete from ".DB::table('iwenwen_backflow')." where pid in (".implode(',',$pids).")",null,'SILENT');
			}
			else{
				$query = DB::query("select * from ".DB::table('iwenwen_backflow')." where pid in (".implode(',',$pids).")",'SILENT');
				while($row = DB::fetch($query)) {
					$api->deletewenwen($row['qid'],$row['answerid']);
				}
				DB::query("delete from ".DB::table('iwenwen_backflow')." where pid in (".implode(',',$pids).")",'SILENT');
			}
		}
	}
	
	/**
	 * 删主贴，sql使用silent方式，即使表格不存在也不引入错误
	 * @param unknown_type $params
	 */
	public function deletethread($params) {
		$tids = $params['param'][0];
		$step = $params['step'];

		if($step == 'delete' && is_array($tids)) {
			include_once dirname(__FILE__).'/class/api.class.php';
			$api = new IwenwenApi();
			if(class_exists('C')){
				$query = DB::query("select * from ".DB::table('iwenwen_backflow')." where answerid=0 and tid in (".implode(',',$tids).")",null,true);
				while($row = DB::fetch($query)) {
					$api->deletewenwen($row['qid']);
				}
				DB::query("delete from ".DB::table('iwenwen_backflow')." where answerid=0 and tid in (".implode(',',$tids).")",null,true);
			}
			else{
				$query = DB::query("select * from ".DB::table('iwenwen_backflow')." where answerid=0 and tid in (".implode(',',$tids).")",'SILENT');
				while($row = DB::fetch($query)) {
					$api->deletewenwen($row['qid']);
				}
				DB::query("delete from ".DB::table('iwenwen_backflow')." where answerid=0 and tid in (".implode(',',$tids).")",'SILENT');
			}
			
		}
	}
	
}

class plugin_iwenwen_forum extends plugin_iwenwen {
	
	var $adnums = array();
	
	function plugin_iwenwen_forum(){
		
	}
	/**
	 * ad_thread显示帖子内广告
	 */
	/*
	function ad_thread($param){
		global $_G;
		//array('params' => $params, 'content' => $adcontent)  
		// Array ( [params] => Array ( [0] => thread [1] => a_pr [2] => 3 [3] => 3 ) [content] => ) 
		$adcontent = '';
		if(in_array($param['params'][3],$this->adnums)){
			if($param['params'][1]=='a_pt'){ //[ad thread/a_pt/2/1]
					$adcontent =  '<div class="a_pt"><a style="font-size: 15px" target="_blank" href="http://www.baidu.com"><font color="#FF0000">test top</font></a></div>';
			}
			elseif($param['params'][1]=='a_pb'){
				//[ad thread/a_pb/1/1]	
				$adcontent =  '<div class="a_pb"><a style="font-size: 15px" target="_blank" href="http://www.baidu.com"><font color="#FF0000">test bottom</font></a></div>';
			}
		}
		
		if(!empty($_G['setting']['pluginhooks']['ad_thread'])){
			$adcontent .= $_G['setting']['pluginhooks']['ad_thread'];
			$_G['setting']['pluginhooks']['ad_thread'] = '';
		}
		return $adcontent.$param['content'];
	}
	*/
	/**
	 * 在页码逻辑后，处理$postlist变量，iwenwen回流的帖子设置头像，不显示ip
	 */
	function viewthread_bottom_output() {
		global $_G,$postlist, $page;
		$pids = array();
		$i = 0;
		$tid = '';
		foreach($postlist as $pid => $post){
			if(empty($tid)){
				$tid = $post['tid'];
			}
			//if($post['anonymous'] && getstatus($post['status'], 5)) {
			if($post['anonymous']) {
				$pids[$pid] = $i;
			}
			$i++; //记录每个帖子的顺序1-10，在广告代码时作为判断
		}
		/**
		* 发帖时，状态不记为5，此处查找所有贴子，将出现在iwenwen_backflow中的帖子状态设为5。不影响qqconnect插件的执行
		*/
		if(!empty($pids)){
			if(class_exists('C')){
				$query = DB::query("select * from ".DB::table('iwenwen_backflow')." where tid=$tid and pid in (".implode(',',array_keys($pids)).")",null,true);
			}
			else{
				$query = DB::query("select * from ".DB::table('iwenwen_backflow')." where tid=$tid and pid in (".implode(',',array_keys($pids)).")",'SILENT');
			}
			while($row = DB::fetch($query)) {
				$pid = $row['pid'];				
				$postlist[$pid]['useip'] = '';
				$postlist[$pid]['status'] = setstatus(5,1,$postlist[$pid]['status']);
				$postlist[$pid]['avatar'] = '<img src="source/plugin/iwenwen/template/avatar.jpg"/>';
				$this->adnums[] = $pids[$pid];
			}
		}
	}
	
	/**
	 * 统计回流问题的回答数
	 * 在iwenwen插件中，不会调用showmessage方法，不会触发此函数。回答的答案不会进入此流程
	 * @param unknown_type $params
	 */
	public function post_message($params) {
		
		//post_newthread_succeed 新帖
		//post_reply_succeed回帖
		if(isset($params['param'])) $params = $params['param'];
		
		if($params[0]=='post_reply_succeed'){
			$tid = $params[2]['tid'];$pid=$params[2]['pid'];
			// 判断主贴是否来源iwenwen回流
			$isbackflow = DB::fetch_first("select * from ".DB::table('iwenwen_backflow')." where `tid`='".$tid."' and `answerid`=0",null,true);
			if(!empty($isbackflow)){
				$curr_date = date('Ymd');
				$hasone = DB::fetch_first("select * from ".DB::table('iwenwen_answers')." where `date`='".$curr_date."'",null,true);
				if(!empty($hasone)){
					DB::query("update ".DB::table('iwenwen_answers')." set post_num=post_num+1 where `date`='".$curr_date."'",null,true);
				}
				else{
					DB::query("insert into ".DB::table('iwenwen_answers')." (`date`,`post_num`) values('".$curr_date."',1)",null,true);
				}
			}
		}
	}
}
