<?PHP

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

cpheader();

/* check table exists */
$tablepre = $_G['config']['db'][1]['tablepre'];
$dbcharset = $_G['config']['db'][1]['dbcharset'];
$hastable = DB::fetch_first("show tables like '".$tablepre."iwenwen_backflow'");
if(empty($hastable)){	
	include_once dirname(__FILE__).'/class/util.class.php';
	$util = new IwenwenUtil();
	if(!$util->createTable($sql)){
		showtableheader();
		showtitle($installlang['table_create_failed']);
		showtablerow('','',createtable($sql, $dbcharset));
		showtablefooter();
		exit;
	}
}


include_once dirname(__FILE__).'/class/api.class.php';
$api = new IwenwenApi();

if(empty($_REQUEST['operate']) || $_REQUEST['operate']=='setting'){
	if(empty($_POST)){
		
		include_once DISCUZ_ROOT.'./source/discuz_version.php';
		if(version_compare(DISCUZ_VERSION, "X1.5.1", "<") && file_exists($langfile = DISCUZ_ROOT.'./data/plugindata/'.$plugin['identifier'].'.lang.php')){
				@include $langfile;
				$templatelang = $templatelang['iwenwen'];
		}
		else{
			loadcache('pluginlanguage_template');
			$templatelang = $_G['cache']['pluginlanguage_template']['iwenwen'];
		}
		$templatelang['question_sync_tips'] = str_replace('{discuzid}',$_G['setting']['my_siteid'],$templatelang['question_sync_tips']);
		$templatelang['question_backflow_tips'] = str_replace('{discuzid}',$_G['setting']['my_siteid'],$templatelang['question_backflow_tips']);
		$templatelang['answer_backflow_tips'] = str_replace('{discuzid}',$_G['setting']['my_siteid'],$templatelang['answer_backflow_tips']);
		
		$_G['lang']['admincp'] = array_merge($_G['lang']['admincp'],$templatelang);
		$disable_answer_flag = $disable_question_flag = false;

		$status = $api->checkIwenwenStatus();
		//print_r($status);
		//$status = array("code"=>0,'open' => 'true',"ask"=>1,"answer"=> 1,"afs"=> 1,"afc"=> 1);
		
		if(empty($status)){
			cpmsg($templatelang['cloud_connect_error'].'<BR/>'.$api->getLastReturn(), "action=plugins&operation=config&do=$pluginid&identifier=iwenwen&pmod=admin");
		}
		if(!$status['open'] && $status['status']!=1){
			$infotext = '';
			if($status['status']==2){ //待审核
				$infotext = $templatelang['open_iwenwen_need_audit'];
				echo '<div class="infobox" style="padding:5px;"><h4 class="infotitle3">'.$infotext.'</h4></div>';
			}
			elseif($status['status']==3 || $status['status']==4){ // 审核未通过或被管理员关闭
				$infotext = $templatelang['open_iwenwen_failed'];
				echo '<div class="infobox" style="padding:5px;"><h4 class="infotitle3">'.$infotext.'</h4></div>';
			}
			elseif($status['status']==5){ //站长自己关闭了iwenwen
				include_once dirname(__FILE__).'/class/util.class.php';
				$util = new IwenwenUtil();
				$iwenwenurl = $util->getIwenwenUrl();
				echo '<div class="infobox" style="padding:5px;"><a href="'.$iwenwenurl.'"><h4 class="infotitle3">'.$templatelang['iwenwen_closed'].'</h4></a></div>';
			}
		}
		else
		{
			if($status['ask']===3){ //3表示 开放平台强制关闭
				$disable_question_flag = 'readonly';
				if($_G['setting']['iwenwen_question_flag']){
					DB::query("REPLACE INTO ".DB::table('common_setting')." (`skey`, `svalue`) VALUES ('iwenwen_question_flag','0')");
				}
				$_G['setting']['iwenwen_question_flag'] = 0;
				$templatelang['question_backflow_msg'] = $templatelang['force_closed'];
			}
			else{

				// 站点状态与问问开放平台记录的状态不一致时，已开放平台记录的状态为准。
				if($status['ask']===2){  //站长关闭
					if($_G['setting']['iwenwen_question_flag']==1){
						DB::query("REPLACE INTO ".DB::table('common_setting')." (`skey`, `svalue`) VALUES ('iwenwen_question_flag','0')");
					}
					$_G['setting']['iwenwen_question_flag']=0;
				}
				elseif($status['ask']===1){  //开启
					if($_G['setting']['iwenwen_question_flag']==0){
						DB::query("REPLACE INTO ".DB::table('common_setting')." (`skey`, `svalue`) VALUES ('iwenwen_question_flag','1')");
					}
					$_G['setting']['iwenwen_question_flag']=1;
				}
			}
				
			if($status['answer']===3){ //3表示 开放平台强制关闭
				$disable_answer_flag = 'readonly';
				if($_G['setting']['iwenwen_answer_flag']){
					DB::query("REPLACE INTO ".DB::table('common_setting')." (`skey`, `svalue`) VALUES ('iwenwen_answer_flag','0')");
				}
				$_G['setting']['iwenwen_answer_flag'] = 0;
				$templatelang['answer_backflow_msg'] = $templatelang['force_closed'];
			}
			else{
				// 站点状态与问问开放平台记录的状态不一致时，已开放平台记录的状态为准。
				if($status['answer']===2){  //站长关闭
					if($_G['setting']['iwenwen_answer_flag']==1){
						DB::query("REPLACE INTO ".DB::table('common_setting')." (`skey`, `svalue`) VALUES ('iwenwen_answer_flag','0')");
					}
					$_G['setting']['iwenwen_answer_flag']=0;
				}
				elseif($status['answer']===1){  //开启
					if($_G['setting']['iwenwen_answer_flag']==0){
						DB::query("REPLACE INTO ".DB::table('common_setting')." (`skey`, `svalue`) VALUES ('iwenwen_answer_flag','1')");
					}
					$_G['setting']['iwenwen_answer_flag']=1;
				}
			}	
		}	
		show_iwenwen_tips($templatelang['question_sync_tips'],'sync_tips',true,$templatelang['question_sync']);
		
		show_iwenwen_tips($templatelang['question_backflow_tips'],'ques_tips',true,$templatelang['question_backflow']);
		showformheader("plugins&operation=config&do=$pluginid&identifier=iwenwen&pmod=admin", "",'iwenwenform','post');
		showtableheader();
		
		if($status['ask']===3){
			showsetting('question_backflow', 'varsnew[iwenwen_question_flag]', $_G['setting']['iwenwen_question_flag'], 'radio',$disable_question_flag,0,$templatelang['question_backflow_msg'],'','',true);
		}
		else{
			showsetting('question_backflow', 'varsnew[iwenwen_question_flag]', $_G['setting']['iwenwen_question_flag'], 'radio',$disable_question_flag,1,'','','',true);
			include_once dirname(__FILE__).'/class/util.class.php';
			$util = new IwenwenUtil();
			$forums = explode(',',$_G['setting']['iwenwen_question_forums']);
			$forum_keywords = unserialize($_G['setting']['iwenwen_question_forums_keyword']);
			$formhtml = $util->getIwenwenForums(false,$forums,$forum_keywords);
			showtablerow('','colspan="2"',$formhtml);			
			showtagfooter('tbody');
		}
		
		show_iwenwen_tips($templatelang['answer_backflow_tips'],'answ_tips',true,$templatelang['answer_backflow']);
		showtableheader();
		showsetting('answer_backflow', 'varsnew[iwenwen_answer_flag]', $_G['setting']['iwenwen_answer_flag'], 'radio',$disable_answer_flag,0,$templatelang['answer_backflow_msg'],'','',true);
		
		
		
		//showtips('iwenwen_ad_tips','tips',true,$templatelang['iwenwen_ad']);
		//showtableheader();
		//showsetting('afs_flag', 'varsnew[iwenwen_afs_flag]', $_REQUEST['iwenwen_appkey'], 'radio','',0,'','','',true);
		//showsetting('afc_flag', 'varsnew[iwenwen_afc_flag]', $_REQUEST['iwenwen_appkey'], 'radio','',0,'','','',true);
		
		showsubmit('iwenwensubmit');
		showtablefooter();
		showformfooter();
		exit;
	}
	else{
		$status = array('ask'=>2,'answer'=>2); //,'afs'=>2,'afc'=>2
		if($_POST['varsnew']['iwenwen_answer_flag']){
			$status['answer'] =1;
		}
		if($_POST['varsnew']['iwenwen_question_flag']){
			$status['ask'] =1;
		}		
		
		$result = $api->setStatus($status);
		$result['code'] = 0;
		if(isset($result['code']) && $result['code']==0){
			if(is_array($_POST['varsnew']) && !empty($_POST['varsnew'])) {
				$boards = array();
				foreach($_POST['board'] as &$board){
					if($board['id']){
						$boards[] = $board['id'];
					}
					foreach($board['keyword'] as &$k){
						$k = cutstr(trim($k), 12,'');
					}
				}
				$_G['setting']['iwenwen_question_forums'] = $_POST['varsnew']['iwenwen_question_forums'] = implode(',',$boards);
				$_POST['varsnew']['iwenwen_question_forums_keyword'] = serialize($_POST['board']);
				
				if(class_exists('C')){
					C::t('common_setting')->update_batch($_POST['varsnew']);
				}
				else{
					$vsql = $subfix = '';
					foreach($_POST['varsnew'] as $variable => $value) {
						$vsql .= "$subfix('$variable','".addcslashes($value, "\n\r\\'\"\032")."')";
						$subfix = ',';
					}
					DB::query("REPLACE INTO ".DB::table('common_setting')." (`skey`, `svalue`) VALUES $vsql");
				}
			}
			$api->updateCategory(true);
			updatecache(array('setting'));
			cpmsg('plugins_setting_succeed', "action=plugins&operation=config&do=$pluginid&identifier=iwenwen&pmod=admin" );
		}
		else{
			DB::query("REPLACE INTO ".DB::table('common_setting')." (`skey`, `svalue`) VALUES ('iwenwen_question_forums_keyword','".addcslashes(serialize($_POST['board']), "\n\r\\'\"\032")."')");
			cpmsg('plugins_setting_error', "action=plugins&operation=config&do=$pluginid&identifier=iwenwen&pmod=admin" );		
		}
	}
}
elseif($_REQUEST['operate']=='setting'){
	
}
elseif($_REQUEST['operate']=='edit_appkey'){
	
	loadcache('pluginlanguage_install');
	$installlang = $_G['cache']['pluginlanguage_install']['iwenwen'];
	
	if(empty($_POST)){
		cpheader();
		$_G['lang']['admincp']['iwenwen_check_tips'] = $installlang['iwenwen_check_tips'];
		$_G['lang']['admincp']['iwenwen_appkey'] = $installlang['iwenwen_appkey'];
		$_G['lang']['admincp']['iwenwen_secretkey'] = $installlang['iwenwen_secretkey'];
		
		if(empty($_REQUEST['iwenwen_appkey'])){
			$_REQUEST['iwenwen_appkey'] = $_G['setting']['iwenwen_appkey'];
		}
		if(empty($_REQUEST['iwenwen_secretkey'])){
			$_REQUEST['iwenwen_secretkey'] = $_G['setting']['iwenwen_secretkey'];
		}
		show_iwenwen_tips($installlang['iwenwen_check_tips'],'ic_tips',true,$installlang['iwenwen_check_tips_title']);
		showformheader("plugins&operation=import&dir=iwenwen&installtype=".$_GET['installtype'], "onSubmit=\"if($('iwenwen_appkey').value=='' || $('iwenwen_secretkey').value=='' ){alert('".$installlang['appkey_and_secretkey_not_be_null']."');if($('iwenwen_appkey').value==''){ $('iwenwen_appkey').focus();}else{ $('iwenwen_secretkey').focus();}return false;} else {return true;}\"",'iwenwenform','post');
		showtableheader();
		//function showsetting($setname, $varname, $value, $type = 'radio', $disabled = '', $hidden = 0, $comment = '', $extra = '', $setid = '', $nofaq = false)
		showsetting('iwenwen_appkey', 'iwenwen_appkey', $_REQUEST['iwenwen_appkey'], 'text','',0,'','id="iwenwen_appkey"','',true);
		showsetting('iwenwen_secretkey', 'iwenwen_secretkey', $_REQUEST['iwenwen_secretkey'], 'password','',0,'','id="iwenwen_secretkey"','',true);
		showsubmit('iwenwensubmit');
		showtablefooter();
		showformfooter();
	}
	else{
		$status = $api->checkAppSecret($_POST['iwenwen_appkey'], $_POST['iwenwen_secretkey']);
		if(isset($status['success']) && $status['success']=='true'){
			if(class_exists('C')){
				C::t('common_setting')->update_batch(array('iwenwen_appkey' => $_POST['iwenwen_appkey'], 'iwenwen_secretkey' => $_POST['iwenwen_secretkey']));
			}
			else{
				DB::query("REPLACE INTO ".DB::table('common_setting')." (`skey`, `svalue`) VALUES ('iwenwen_appkey','".addcslashes($_POST['iwenwen_appkey'], "\n\r\\'\"\032")."'),('iwenwen_secretkey',".addcslashes($_POST['iwenwen_secretkey'], "\n\r\\'\"\032").")");
			}
		}
		else{
			cpmsg($installlang['appkey_secret_error'], "action=plugins&operation=import&dir=iwenwen&installtype=".$_GET['installtype'].'&iwenwen_appkey='.urlencode($_POST['iwenwen_appkey']).'&iwenwen_secretkey='.urlencode($_POST['iwenwen_secretkey']) );
		}
	}
}

function show_iwenwen_tips($tips, $id = 'tips', $display = TRUE, $title = '') {
	//$tips = cplang($tips);
// 	$tips = preg_replace('#</li>\s*<li>#i', '</li><li>', $tips);
// 	$tmp = explode('</li><li>', substr($tips, 4, -5));
// 	if(count($tmp) > 4) {
// 		$tips = '<li>'.$tmp[0].'</li><li>'.$tmp[1].'</li><li id="'.$id.'_more" style="border: none; background: none; margin-bottom: 6px;"><a href="###" onclick="var tiplis = $(\''.$id.'lis\').getElementsByTagName(\'li\');for(var i = 0; i < tiplis.length; i++){tiplis[i].style.display=\'\'}$(\''.$id.'_more\').style.display=\'none\';">'.cplang('tips_all').'...</a></li>';
// 		foreach($tmp AS $k => $v) {
// 			if($k > 1) {
// 				$tips .= '<li style="display: none">'.$v.'</li>';
// 			}
// 		}
// 	}
// 	unset($tmp);
	$title = $title ? $title : 'tips';
	showtableheader($title, '', 'id="'.$id.'"'.(!$display ? ' style="display: none;"' : ''), 0);
	showtablerow('', 'class="tipsblock" s="1"', '<ul id="'.$id.'lis">'.$tips.'</ul>');
	showtablefooter();
}