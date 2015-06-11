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

$navtitle = "酷狗音乐电台"; 
$metakeywords = "酷狗音乐电台";


include template('app/kuguofm');//调用单页模版文件


?>