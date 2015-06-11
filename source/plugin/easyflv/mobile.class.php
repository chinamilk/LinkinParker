<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class mobileplugin_easyflv {

	var $groupon = false;
	var $forumon = false;

	function mobileplugin_easyflv() {
		global $_G;
		//note 后台设置允许的版块
		$forums = (array)unserialize($_G['cache']['plugin']['easyflv']['forums']);
		//note 当前版块判断
		$this->forumon = in_array('', $forums) ? TRUE : (in_array($_G['fid'], $forums) ? TRUE : FALSE);
		if(!$forums[0]&&count($forums)<=1){
			$this->forumon = TRUE;
		}
	}
}

class mobileplugin_easyflv_forum extends mobileplugin_easyflv {
	function post_easyflv() {
		global $_G;
		if(!$this->forumon){return;}
		if($_G['gp_replysubmit']&&!$_G['cache']['plugin']['easyflv']['replyon']){return;}
		if($_SERVER['REQUEST_METHOD']=='POST'&&$_G['gp_message']){
			$exp = array(
				"/(\[url[^\]]*?\]|)http:\/\/v\.youku\.com\/v_show\/id_([^\.]+)\.html(\?f=[\d]+|@[\w]*?|)(\[\/url\]|)/",
				"/(\[url[^\]]*?\]|)http:\/\/www\.56\.com\/[^\r\n\s]+(vid-|v_)([^\.]+)\.html(\?f=[\d]+|)(\[\/url\]|)/",
				"/(\[url[^\]]*?\]|)http:\/\/www\.tudou\.com\/(listplay|albumplay)\/([^\/]+)\/([\w]+).html(\[\/url\]|)/",
				"/(\[url[^\]]*?\]|)http:\/\/www\.tudou\.com\/programs\/view\/([^\?\/\s]+)\/(\?[^\r\n]+|)(\[\/url\]|)/i",
				"/(\[url[^\]]*?\]|)http:\/\/v\.ku6\.com\/([\w]+\/|)show([_\d]*?)\/([^\/]+)\.html(\[\/url\]|)/i",
				"/(\[url[^\]]*?\]|)http:\/\/v\.ifeng\.com\/([\w\/]+)\/([\d-]*?)\/([^\/]+)\.shtml(\[\/url\]|)/i",
				"/(\[url[^\]]*?\]|\[flash[^\]]*?\]|\[media[^\]]*?\]|)(http:\/\/[^\r\n\s]+\.swf)(\?vid=[^&\r\n\s]+&auto=1|[\?&]autoplay=[\w]+&xuid=[\d]*?|\?[\d&\.]+|)(\[\/url\]|\[\/flash\]|\[\/media\]|)/i",
			);
			$rep =array(
				'[flash]http://player.youku.com/player.php/sid/\\2/v.swf[/flash]',
				'[flash]http://player.56.com/v_\\3.swf[/flash]',
				'[flash]http://www.tudou.com/v/\\4/v.swf[/flash]',
				'[flash]http://www.tudou.com/v/\\2/v.swf[/flash]',
				'[flash]http://player.ku6.com/refer/\\4/v.swf[/flash]',
				'[flash]http://v.ifeng.com/include/exterior.swf?AutoPlay=false&guid=\\4[/flash]',
				'[flash]\\2\\3[/flash]',
			);
			if($ver<2.5){
				$_G['gp_message'] = preg_replace($exp,$rep,$_G['gp_message']);
			}else{
				$_GET['message'] = preg_replace($exp,$rep,$_GET['message']);
			}
		}
	}
}
?>

