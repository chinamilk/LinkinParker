<?php
/**
 *	[ÓïÒô·¢Ìû(sound.{modulename})] (C)2012-2099 Powered by .
 *	Version: 1.0
 *	Date: 2012-12-20 16:48
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class plugin_tsound {
	public function global_header() {
    return'<link href="source/plugin/tsound/template/images/style.css" rel="stylesheet" type="text/css" />';
  }
	public function discuzcode() {
    global $tsound,$_G;
    require_once DISCUZ_ROOT . './source/plugin/tsound/include/function.inc.php';
    $_G['discuzcodemessage']=preg_replace("/\[tsound\]http\:\/\/([^\[]+)\.mp3\[\/tsound\]/ies", "tsound_parse('http://\\1.mp3')", $_G['discuzcodemessage']);
  }
}

class plugin_tsound_forum extends plugin_tsound {
	function post_editorctrl_left() {
    global $tsound,$_G;
    require_once DISCUZ_ROOT . './source/plugin/tsound/include/function.inc.php';
    $groups=(array)@unserialize($tsound['groups']);
    if(!in_array($_G['groupid'],$groups))return;
    $forums=(array)@unserialize($tsound['forums']);
    if(!in_array($_G['fid'],$forums))return;
    return '<a id="e_tsound" title="'.lang('plugin/tsound','addsound1').'" onmousedown="showWindow(\'tsound\', \'plugin.php?id=tsound&action=insert\')" href="javascript:;">'.lang('plugin/tsound','addsound2').'</a>';
  }
}
?>