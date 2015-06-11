<?php
/**
 * [DISCUZ X1.5,X2,X2.5]	:在线直播网络电视
 * Author		:bbs.weixiaoduo.com
 * Copyright	:www.weixiaoduo.com
 * Web 			:http://bbs.weixiaoduo.com/
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

include DISCUZ_ROOT.'./forumdata/cache/plugin_'.$identifier.'.php';
include template('webtv:webtv');

?>