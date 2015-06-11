<?php

/**
 *  Author: Feng 
 *	Web:bbs.weixiaoduo.com
 *  QQ:529048212
 */

require './source/class/class_core.php';//引入系统核心文件

$discuz = & discuz_core::instance();//以下代码为创建及初始化对象

$discuz->cachelist = $cachelist;

$discuz->init();

$navtitle = "公交站点路线查询"; 
$metakeywords = "公交站点路线查询";


include template('app/gongjiao');//调用单页模版文件


?>