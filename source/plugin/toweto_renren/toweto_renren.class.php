<?php


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}



class plugin_toweto_renren {
	function global_footer() {
		global $_G;
		$set= $_G['cache']['plugin']['toweto_renren'];
		$return = '';
		$staticurl = STATICURL;
		$ollist = $this->_getOnlineFriend();
		$olnum = $ollist[0];
		$olliststr = $ollist[1];
		$pmnew = $_G['member']['newpm'] ? 'new' : '';
		$notenew = $_G['member']['newprompt'] ? 'new' : '';

		include 'template/toweto_renren.htm';
		return $return;
	}

	function _getOnlineNum() {
		global $_G;
		
		$olnum = 0;
		$user = array();
		space_merge($user, 'field_home');
			
		if($_G['uid'] > 0 && $user['feedfriend']) {
			$olnum = DB::result(DB::query("SELECT COUNT(*) FROM ".DB::table('common_session')." WHERE uid IN ({$user['feedfriend']})"), 0);
			$olnum = $olnum ? $olnum : 0;
		}
		return $olnum;
	}
	
	function _getOnlineFriend() {
		global $_G;
		$staticurl = STATICURL;
		$olnum = 0;
		$list = array();
		$liststr = '';
		$user = array();
		space_merge($user, 'field_home');
			
		if($_G['uid'] > 0 && $user['feedfriend']) {
			$olnum = DB::result(DB::query("SELECT COUNT(*) FROM ".DB::table('common_session')." WHERE uid IN ({$user['feedfriend']})"), 0);
			$olnum = $olnum ? $olnum : 0;
		}
		if($olnum && $user['feedfriend']) {
			$query = DB::query("SELECT uid,username,invisible FROM ".DB::table("common_session")." WHERE uid IN ({$user['feedfriend']}) AND invisible='0' ORDER BY lastactivity DESC LIMIT 20");
			while($value = DB::fetch($query)) {
				$liststr .= <<<EOT
				<li><img class="lnp_olicon" src="{$staticurl}image/common/ol.gif" /><a title="ºÍ {$value['username']} ÁÄÌì" href="home.php?mod=space&amp;uid={$value['uid']}" onclick="showWindow('showMsgBox{$value['uid']}', 'home.php?mod=spacecp&ac=pm&op=showmsg&handlekey=showmsg_{$value['uid']}&touid={$value['uid']}&pmid=0&daterange=2', 'get', 0)" ><img alt="{$value['username']}" src="{$staticurl}image/common/user_online.gif">{$value['username']}</a>
            
          </li>
EOT;
				
			}
		}
		return array($olnum,$liststr);
	}
}