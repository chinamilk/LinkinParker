<?php

/** 防止非法引用 */
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}


$sql = <<<EOF


EOF;

/** 实现 SQL ddl 语句 */
runquery($sql);

/** 注意这里, 必须把 $finish 设为 TRUE , 提示系统说安装已经结束, 否则会出现白屏!! */
$finish = TRUE;

