<?php

/**
 * 
 * @author arlonzou
 *
 */
require_once 'json.class.php';
class IwenwenApi{
	
	var $discuzid;
	var $appkey;
	var $secretkey;
	var $last_ret; // 上次post接口调用返回的内容。
	function IwenwenApi() {
		global $_G;
		$this->discuzid = $_G['setting']['my_siteid'];
		$this->appkey = $_G['setting']['iwenwen_appkey'];
		$this->secretkey = $_G['setting']['iwenwen_secretkey'];
	}
	
	function getLastReturn(){
		return $this->last_ret;
	}
	
	function checkIwenwenStatus(){
		global $_G;
		$url = 'http://open.wenwen.soso.com/z/openapi/discuz/getStatus?discuzid='.$this->discuzid;
		return $this->post($url);
	}
	
	function setStatus($status = array()){
		$param = $this->generateSiteSignParam();
		$url = 'http://open.wenwen.soso.com/z/openapi/discuz/updateStatus?'.$param;
		return $this->post($url,$status);
	}
	
	/**
	 * 检查输入的appkey，secretkey是否正确
	 * @param unknown_type $appkey
	 * @param unknown_type $secretkey
	 * @return Ambigous <boolean, NULL, number, multitype:, mixed, stdClass, string, multitype:Ambigous <mixed, boolean, NULL, number, string, multitype:, stdClass> >
	 */
	function checkAppSecret($appkey,$secretkey){
		$this->appkey = $appkey;
		$this->secretkey = $secretkey;
		$param = $this->generateSiteSignParam(array('discuzid'=>$this->discuzid));
		$url = 'http://open.wenwen.soso.com/z/openapi/discuz/verifykey?'.$param;
		return $this->post($url);
	}
	
	/**
	* 被删除的回流数据，上报给开放平台
	*/
	function deletewenwen($qid,$answerid=0){
		$param = $this->generateSiteSignParam();
		$url = 'http://open.wenwen.soso.com/z/openapi/discuz/dzdel?'.$param;
		$posts = array('qid' => $qid,'answerId' => $answerid);
		return $this->post($url,$posts);
	}
	
	/**
	 * 回帖问题
	 */
	function sendPostAccount(){
		$curr_date = date('Ymd',strtotime('-1 day'));
		$coutinfo = $hasone = DB::fetch_first("select * from ".DB::table('iwenwen_answers')." where `date`='".$curr_date."'",null,true);
		if(!empty($coutinfo)){
			$param = $this->generateSiteSignParam();
			$url = 'http://open.wenwen.soso.com/z/openapi/discuz/ancount?'.$param;
			return $this->post($url,array('date'=> date('Y-m-d',strtotime('-1 day')),'count'=> $coutinfo['post_num']));
		}
		return false;
	}
	
	function  getIwenwenForums(){
		global $_G;
		// 加载Forum缓存
		require_once libfile('function/forumlist');		
		if(!isset($_G['cache']['forums'])) {
			loadcache('forums');
		}
		$forumcache = &$_G['cache']['forums'];		
						
		$selectedfid = explode(',',$_G['setting']['iwenwen_question_forums']);	
		$selectedfid = array_filter($selectedfid);	
		
		$keywords = unserialize($_G['setting']['iwenwen_question_forums_keyword']);
		if(!is_array($keywords)){
			$keywords = array();	
		}		
		
		$iwenwen_forums = array();
		foreach($forumcache as $forum){
			if(!$forum['status']){
				continue;
			}
			
			if(empty($selectedfid) || in_array($forum['fid'],$selectedfid)){
				$keywords[$forum['fid']]['keyword'] = array_filter($keywords[$forum['fid']]['keyword']);
				$iwenwen_forums[] = array(
					'id' => intval($forum['fid']),
					'name' => $forum['name'],
					'status' => 1,
					'keyword' => implode('#',$keywords[$forum['fid']]['keyword'])
				);
			}
			else{
				$iwenwen_forums[] = array('id'=>intval($forum['fid']),'name'=>$forum['name'],'status'=>0,'keyword' => '');
			}
		}
		return $iwenwen_forums;
	}
	
	/**
	 * 若版面发生变化(新增或删除了版面)，将版面信息推送至问问开放平台
	 * @param $forse 是否强制同步，false时，默认24小时传一次版面，时间间隔未到时，忽略调用
	 */
	function updateCategory($forse=false){
		global $_G;
		
		if(!$forse && TIMESTAMP-$_G['setting']['iwenwen_last_sync'] < 43200)
		{
			return true; // not in time interval ,skip.
		}
		$iwenwen_forums = $this->getIwenwenForums();
		$forums = CJSON::encode($iwenwen_forums);
		// send to wenwen whether change or not
		DB::query("REPLACE INTO ".DB::table('common_setting')." (`skey`, `svalue`) VALUES ('iwenwen_last_sync','".TIMESTAMP."')");
		require_once libfile('function/cache');
		updatecache(array('setting'));
		
		$param = $this->generateSiteSignParam();
		$url = 'http://open.wenwen.soso.com/z/openapi/discuz/updateCategory?'.$param;
		return $this->post($url,array('type'=> 1,'categorys'=> $forums));
	}
	
	/**
	 * 请求指定url的内容
	 * 无法获取内容时，重试3次
	 * @param string $url
	 * @param array $posts 数组，自动追加参数discuzid
	 */
	function post($url,$posts=array()){
        //print_r($posts);
    $i=0;
    do{
				if(is_array($posts) && !empty($posts)){
					$posts['discuzid'] = $this->discuzid;
					$posts = $this->httpBuildQuery($posts);
					$result = dfsockopen($url, 0, $posts,'',false,'',15,true,'URLENCODE',false);		
				}
				else{
					$result = dfsockopen($url);
				}
				$i++;
    }while(empty($result) && $i<3);
    $this->last_ret = $result;
		//file_put_contents(DISCUZ_ROOT.'/data/posts.log',"\npost:$url\n$result\n",FILE_APPEND);
 		//echo $url;var_dump($result); 
		return CJSON::decode($result);
	}
	
	/**
	* 生成校验的get参数
	*/
	function generateSiteSignParam($params = array(), $isCamelCase = false) {
		
		if(!is_array($params)) {
			$params = array();
		}
		//$params['discuzid'] = $this->discuzid;		
		$params['appkey'] = $this->appkey;
		$params['timestamp'] = time().'000';		
		unset($params['sign']);
		ksort($params);
	
		$str = $this->httpBuildQuery($params, '', '&');
		$sign = md5(sprintf('%s%s', $str, $this->secretkey));
				
		$params['sign'] = $sign;	
		$url = $this->httpBuildQuery($params, '', '&');
		return $url;
	}
	
	function httpBuildQuery($data, $numeric_prefix='', $arg_separator='', $prefix='') {
	
		$render = array();
		if (empty($arg_separator)) {
			$arg_separator = @ini_get('arg_separator.output');
			empty($arg_separator) && $arg_separator = '&';
		}
		foreach ((array) $data as $key => $val) {
			if (is_array($val) || is_object($val)) {
				$_key = empty($prefix) ? "{$key}[%s]" : sprintf($prefix, $key) . "[%s]";
				$_render = $this->httpBuildQuery($val, '', $arg_separator, $_key);
				if (!empty($_render)) {
					$render[] = $_render;
				}
			} else {
				if (is_numeric($key) && empty($prefix)) {
					$render[] = urlencode("{$numeric_prefix}{$key}") . "=" . urlencode($val);
				} else {
					if (!empty($prefix)) {
						$_key = sprintf($prefix, $key);
						$render[] = urlencode($_key) . "=" . urlencode($val);
					} else {
						$render[] = urlencode($key) . "=" . urlencode($val);
					}
				}
			}
		}
		$render = implode($arg_separator, $render);
		if (empty($render)) {
			$render = '';
		}
	
		return $render;
	}
}
