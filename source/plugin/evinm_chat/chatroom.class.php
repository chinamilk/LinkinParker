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

class plugin_evinm_chat {
	var $lang = array();
	var $config = array();
	var $threaduid = '';
	
	/**
	 * 初始化载入
	 */
	function plugin_evinm_chat() {
		global $_G;
		if (!isset($_G['cache']['plugin'])) {
			loadcache('plugin');
		}
		//print_r($_G);
		$this->lang = lang('plugin/evinm_chat');
		$this->config = $_G['cache']['plugin']['evinm_chat'];
		
		if($this->config['zdqc'] > '0'){
			loadcache('autoclearchat');
			$autoclearchat = $_G['cache']['autoclearchat'];
			if($_G['timestamp'] - $autoclearchat['time'] > (3600 * 24)) {
				$this->autoclearchatlist($this->config['zdqc']);
			}
		}
	
		$sql = DB::query("select * from ".DB::table('evinm_chat_userset')." where `uid` = ".intval($_G['uid']));
		$nums = DB::num_rows($sql);
		if($nums > '0'){
			$this->userset = DB::fetch($sql);
			$this->userset['stat'] = '1';
		}else{
			$this->userset['stat'] = 'none';
			$this->userset['iszhankai'] = '-1';
			$this->userset['showsexy'] = '-1';
		}
	
	}		

	function autoclearchatlist($days) {
		global $_G;
		if($days > 0){
			$daystsec = $days * 3600 * 24;
			$needcleartime = $_G['timestamp'] - $daystsec;
			DB::delete('evinm_chat_message',"`posttime` < ".$needcleartime);
			$autoclearchat['time'] = $_G['timestamp'];
			save_syscache('autoclearchat',$autoclearchat);
		}
	}
	
	function uid2name($uid){
		if(!$uid){
		}else{
			$username = DB::result_first("select username from ".DB::table('common_member')." where `uid` = ".intval($uid));
			$username = $username ?$username : '';
		}
		return $username;
	}
	
	function chatroom() {
		global $_G, $detailstatus;
		$config = $this->config;
		$userset = $this->userset;

		if(!empty($config['firend_ad'])){
			$firend_ad_row = explode("|",$config['firend_ad']);
		}		
		if(!empty($config['online_ad'])){
			$online_ad_row = explode("|",$config['online_ad']);
		}
		
		$myinfo['avatar'] = avatar($_G['uid'], small);
		
		if(($count = C::app()->session->count(1))) {
			$onlinedata = C::app()->session->fetch_member(1, 2, $start, $perpage);
		}
		$count = count($onlinedata);
		
		//取在线会员列表
		$whosonline = array();
		$_G['setting']['maxonlinelist'] = $_G['setting']['maxonlinelist'] ? $_G['setting']['maxonlinelist'] : 500;
		foreach(C::app()->session->fetch_member(1, 0, $_G['setting']['maxonlinelist']) as $online){
			$membercount ++;
			if($online['invisible']) {
				$invisiblecount++;
				continue;
			} else {
				$online['icon'] = !empty($_G['cache']['onlinelist'][$online['groupid']]) ? $_G['cache']['onlinelist'][$online['groupid']] : $_G['cache']['onlinelist'][0];
			}
			$online['username'] = $this->uid2name($online['uid']);
			$online['lastactivity'] = dgmdate($online['lastactivity'], 't');
			$whosonline[] = $online;
		}	

		//在线好友列表
		$space = getuserbyuid($_G['uid']);
		space_merge($space, 'field_home');
		if(!empty($space['feedfriend'])) {
			//$onlinefriends = C::app()->session->fetch_all_by_uid(explode(',', $space['feedfriend']), $start, $perpage);
			foreach(C::app()->session->fetch_all_by_uid(explode(',', $space['feedfriend']), $start, $perpage) as $value) {
				$onlinefs['uid'] = $value['uid'];
				$onlinefs['username'] = $value['username'];
				$onlinefs['groupid'] = $value['groupid'];
				$onlinefs['icon'] = !empty($_G['cache']['onlinelist'][$value['groupid']]) ? $_G['cache']['onlinelist'][$value['groupid']] : $_G['cache']['onlinelist'][0];
				$onlinefriends[] = $onlinefs;
			}
		}		
		$count_friendonline = count($onlinefriends);
		
		//取公告
		if($config['systips'] != "") {
			$gglb = explode("\n",$config['systips']);
			$gglb = array_filter($gglb);
			$gglists = array();
			foreach($gglb as $gg){
				if(intval($gg) != ""){
					$threadrows = $this->getthreadinfobytid($gg);
					$gonggao['subject'] = $threadrows['subject'];
					$gonggao['type'] = 'thread';
					$gonggao['url'] = "forum.php?mod=viewthread&tid=".$threadrows['tid'];
				}else{
					$ggarray = explode('|',$gg);
					
					if($ggarray['1'] != '') {
						$gonggao['type'] = 'link';
						$gonggao['subject'] = $ggarray['0'];
						
						$gonggao['url'] = $ggarray['1'];
					}else{
						$gonggao['type'] = 'text';
						$gonggao['subject'] = $ggarray['0'];

						$gonggao['url'] = "";
					}
				}			
				
				$gglists[] = $gonggao;
			}
			
		}
		
		if($_G['uid'] == '0' || $this->config['isopen'] == '0') {
			return '';
		}else{
			include template('evinm_chat:chat');
			return $return;
		}	
		
	}
		
	function global_footer() {
		global $_G;
		if(!$_G['uid']) {
			return '';
		}
		if($this->config['isglobal'] == 1){
			$return = $this->chatroom();
			return $return;
		}
	}
	
	function getthreadinfobytid($tid) {
		if($tid > '0') {
			$rows = DB::fetch(DB::query("select * from ".DB::table('forum_thread')." where `tid` = ".intval($tid)));
			return $rows;
		}
	}
}

/**
 * 脚本嵌入点类
 */

class plugin_evinm_chat_forum extends plugin_evinm_chat {
		
	function global_footer() {
		global $_G;
		if($this->config['isglobal'] == 2){
			$return = $this->chatroom();
			return $return;
		}
	}
	
	function index_bottom() {
		if($this->config['isglobal'] == 3){
			$return = $this->chatroom();
			return $return;
		}
	}
} 

?>