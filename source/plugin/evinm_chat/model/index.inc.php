<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

define('PLUGIN_ID', 'evinm_chat'); //定义插件id

function ploadmodel($model) {
    $filename = DISCUZ_ROOT . './source/plugin/' . PLUGIN_ID . '/model/' . $model .
        '.class.php';
    if (file_exists($filename)) {
        include $filename;
    } else {
        dexit('Cannot find model named ' . $model);
    }
}

global $_G;

// 判断状态
function is_login(){
    global $_G;
    $uid = $_G[uid];
    if($uid == "") {
        showmessage('需要登录', '', array(), array('login' => true));
    }
    if (!isset($_G['cache']['plugin'])) {
        loadcache('plugin');
    }
    $isopen = $_G['cache']['plugin']['evinm_chat']['isopen'];

    if ($isopen == 1) {
        $config = $_G['cache']['plugin']['evinm_chat'];
    } else if($isopen == 0) {       
        dexit();
    }
    
}

// 配置
function _config() {
	global $_G;
    if (!isset($_G['cache']['plugin'])) {
        loadcache('plugin');
    }
    $config = $_G['cache']['plugin']['evinm_chat'];
	return $config;		
}


class Excel {
	var $inEncode; //一般是页面编码
 
	var $outEncode; //一般是Excel文件的编码
 
	public function __construct(){
 
	}
	/**
	*设置编码
	*/
	public function setEncode($incode,$outcode){
		$this->inEncode=$incode;
 
		$this->outEncode=$outcode;
	}
	/**
	*设置Excel的标题栏
	*/
	public function setTitle($titlearr){
		$title="";
		foreach($titlearr as $v){
			if($this->inEncode!=$this->outEncode){
				$title.=iconv($this->inEncode,$this->outEncode,$v)."\t";
			}
			else{
				$title.=$v."\t";
			}
		}
		$title.="\n";
		return $title;
	}
	/**
	*设置Excel内容
	*/
	public function setRow($array){
		$content="";
		foreach($array as $k => $v){
			foreach($v as $vs){
				if($this->inEncode!=$this->outEncode){
					$content.=iconv($this->inEncode,$this->outEncode,$vs)."\t";
				}
				else{
					$content.=$vs."\t";
				}
			}
			$content.="\n";

		}
		return $content;
	}

	
	public function getExcel($titlearr,$array,$filename=''){
		if($filename==''){
			$filename=date("Y-m-d");
		}
		$title=$this->setTitle($titlearr);
		$content=$this->setRow($array);
		header("Content-type:application/vnd.ms-excel");
		header("Content-Disposition:filename=".$filename.".xls");
		echo $title;
		echo $content;
	}
}


function uid2name($uid){ 
	if(!$uid){ 
		$uname = ''; 
	}else{ 
		$uname=DB::result_first("SELECT username FROM ".DB::table('common_member')." WHERE uid=".$uid); 
		$uname = $uname ?$uname : ''; 
	}
	return $uname;
}

?>
