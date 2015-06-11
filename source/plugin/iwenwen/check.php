<?php
/** 防止非法引用 */
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$discuzid = $_G['setting']['my_siteid'];

include_once dirname(__FILE__).'/class/api.class.php';
$api = new IwenwenApi();
include_once dirname(__FILE__).'/class/util.class.php';
$util = new IwenwenUtil();

include_once DISCUZ_ROOT.'./source/discuz_version.php';
if(version_compare(DISCUZ_VERSION, "X1.5.1", "<")){
	$installlang = $installlang['iwenwen'];
}

if($operation=='import'){
	/* 查询是否安装并开启纵横搜索插件 */
	
 	if(empty($discuzid)){
 		cpmsg($installlang['open_cloud'], 'action=cloud&operation=open');
 	}
 	if(empty($_G['setting']['my_search_status'])){
 		$sql = 'select * from '.DB::table('common_plugin').' where `identifier`=\'cloudsearch\'';
 		$result = DB::fetch_first($sql);
 		if( empty($result) || empty($result['available']) ){
 			cpmsg($installlang['open_cloudsearch'], 'action=cloud&operation=applist');
 		}
 	} 	
	
	$table_created = $util->createTable(); /* 尝试创建表格 */
	
	if(empty($_POST['iwenwen_appkey']) || empty($_POST['iwenwen_secretkey'])){
		$check_iwenwen = true;
		if(!empty($_SERVER['HTTP_REFERER'])){
			$referer_info = parse_url($_SERVER['HTTP_REFERER']);
			if($referer_info['host']=='cp.discuz.qq.com'){
				$check_iwenwen = false; // 当来源页为cp.discuz.qq.com时，不检测iwenwen。视为已开通待审核态。
			}
		}
		if($check_iwenwen ){
			/* 获取iwenwen状态，检查“是否开启iwenwen” */
			$status = $api->checkIwenwenStatus();
			if(empty($status)){
				cpmsg($installlang['connect_iwenwen_server_failed'].'<BR/>'.$api->getLastReturn(), '');
			}
			if(!$status['open'] && !in_array($status['status'],array(1,2))){
				$iwenwenurl = $util->getIwenwenUrl();
				//header('Location:'.$iwenwenurl);exit;
				cpmsg($installlang['open_iwenwen'],$iwenwenurl);
			}
		}
		
		cpheader();
		$_G['lang']['admincp']['iwenwen_check_tips'] = stripslashes($installlang['iwenwen_check_tips']);
		$_G['lang']['admincp']['iwenwen_appkey'] = $installlang['iwenwen_appkey'];
		$_G['lang']['admincp']['iwenwen_secretkey'] = $installlang['iwenwen_secretkey'];
		
		if(empty($_REQUEST['iwenwen_appkey'])){
			$_REQUEST['iwenwen_appkey'] = $_G['setting']['iwenwen_appkey'];
		}
		if(empty($_REQUEST['iwenwen_secretkey'])){
			$_REQUEST['iwenwen_secretkey'] = $_G['setting']['iwenwen_secretkey'];
		}
		if(version_compare(DISCUZ_VERSION, "X2", "<")){
			$_G['lang']['admincp']['tips'] = $installlang['iwenwen_check_tips_title'];
			showtips('iwenwen_check_tips','tips',true);
		}
		else{
			showtips('iwenwen_check_tips','tips',true,$installlang['iwenwen_check_tips_title']);
		}
		showformheader("plugins&operation=import&dir=iwenwen&ignoreversion=1&installtype=".$_GET['installtype'], "onSubmit=\"if($('iwenwen_appkey').value=='' || $('iwenwen_secretkey').value=='' ){alert('".$installlang['appkey_and_secretkey_not_be_null']."');if($('iwenwen_appkey').value==''){ $('iwenwen_appkey').focus();}else{ $('iwenwen_secretkey').focus();}return false;} else {return true;}\"",'iwenwenform','post');
		showtableheader();
		//function showsetting($setname, $varname, $value, $type = 'radio', $disabled = '', $hidden = 0, $comment = '', $extra = '', $setid = '', $nofaq = false)
		showsetting('iwenwen_appkey', 'iwenwen_appkey', $_REQUEST['iwenwen_appkey'], 'text','',0,'','id="iwenwen_appkey"','',true);
		showsetting('iwenwen_secretkey', 'iwenwen_secretkey', $_REQUEST['iwenwen_secretkey'], 'password','',0,'','id="iwenwen_secretkey"','',true);
		showsubmit('iwenwensubmit');
		showtablefooter();
		showformfooter();
		exit;
	}
	else{
		$_POST['iwenwen_appkey'] = trim($_POST['iwenwen_appkey']);
		$_POST['iwenwen_secretkey'] = trim($_POST['iwenwen_secretkey']);
		$status = $api->checkAppSecret($_POST['iwenwen_appkey'], $_POST['iwenwen_secretkey']);
		//$status['success']='true';//set status to true,for test.
		if($status['success']){
			if(class_exists('C')){
				C::t('common_setting')->update_batch(array('iwenwen_appkey' => $_POST['iwenwen_appkey'], 'iwenwen_secretkey' => $_POST['iwenwen_secretkey']));
			}
			else{
				DB::query("REPLACE INTO ".DB::table('common_setting')." (`skey`, `svalue`) VALUES ('iwenwen_appkey','".addcslashes($_POST['iwenwen_appkey'], "\n\r\\'\"\032")."'),('iwenwen_secretkey','".addcslashes($_POST['iwenwen_secretkey'], "\n\r\\'\"\032")."')");
			}
			
			//iwenwen_skip_fnames '站务，版务、版主，广告、外链、链接'
			DB::query("REPLACE INTO ".DB::table('common_setting')." (`skey`, `svalue`) VALUES ('iwenwen_skip_fnames','".addcslashes($installlang['iwenwen_skip_fnames'], "\n\r\\'\"\032")."')");
			
			updatecache(array('setting'));
		}
		else{
			$installlang['appkey_secret_error'] = stripslashes($installlang['appkey_secret_error']).'<br/>'.$status['code'].' '.$status['message'];
			cpmsg($installlang['appkey_secret_error'], "action=plugins&operation=import&dir=iwenwen&installtype=".$_GET['installtype'].'&iwenwen_appkey='.urlencode($_POST['iwenwen_appkey']).'&iwenwen_secretkey='.urlencode($_POST['iwenwen_secretkey']) );
		}

		/**
		 * 设置插件回流状态，广告状态
		 * 广告状态均以问问开放平台的状态为准
		 */

		/* insert data into common_pluginvar */
		if($table_created){
			$status = array('answer' =>1,'ask' =>1,'afs' =>1,'afc' =>1);
			$result = $api->setStatus($status);		
			DB::query("REPLACE INTO ".DB::table('common_setting')." (`skey`, `svalue`) VALUES ('iwenwen_install_time','".time()."'),('iwenwen_question_flag','1'),('iwenwen_answer_flag','1'),('iwenwen_afc_flag','1'),('iwenwen_afs_flag','1'),('iwenwen_afcall_flag','0'),('iwenwen_afsall_flag','0')");
		}
		else{
			$status = array('answer' =>0,'ask' =>0,'afs' =>0,'afc' =>0);
			$result = $api->setStatus($status);
			DB::query("REPLACE INTO ".DB::table('common_setting')." (`skey`, `svalue`) VALUES ('iwenwen_install_time','".time()."'),('iwenwen_question_flag','2'),('iwenwen_answer_flag','2'),('iwenwen_afc_flag','0'),('iwenwen_afs_flag','0'),('iwenwen_afcall_flag','0'),('iwenwen_afsall_flag','0')");
		}
		
		/* 同步版面到问问开放平台，默认所有版面 ，若已经安装过配置了回流版本则沿用之前配置的项*/
		if(empty($_G['setting']['iwenwen_question_forums'])){
			$forums = $util->getiwenwenForums(true);
			$selectedfid = array_keys($forums);
			$_G['setting']['iwenwen_question_forums'] = implode(',',$selectedfid);
		}
		$api->updateCategory(true);
		
		/* 获取广告代码  */

	}
}
elseif($operation=='delete'){
	// 卸载。
	
}

