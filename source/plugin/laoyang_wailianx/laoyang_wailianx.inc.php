<?php
/**
 *	[�ⲿ������ʾ������(laoyang_wailianx.{modulename})] (C)2012-2099 Powered by ������(www.jitashe.net).
 *	Version: 1.0
 *	Date: 2012-11-22 13:47
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$url=$_GET['url'];
global $_G;
$wailian_config = $_G['cache']['plugin']['laoyang_wailianx'];
include template('laoyang_wailianx:index');

?>