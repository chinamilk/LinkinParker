<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
require_once DISCUZ_ROOT . './source/plugin/tsound/include/function.inc.php';
$action=$_G['onez_action'];
if($action=='insert'){
  $flash=tsound_insertflash('source/plugin/tsound/template/MicRecord.swf',$flashvars,470,250,'tsound_insert');
  include template('tsound:insert');
}elseif($action=='upload'){
  set_time_limit(0);
  $url=tsound_upload();
  exit($url);
}
?>