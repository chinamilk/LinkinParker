<?php


/*
 *      本程序由迁安热线开发,版权所有，违者必究
 *      若要二次开发或用于商业用途的，需要经过迁安热线同意。
 *
 */
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$var = $_G['cache']['plugin']['qarx_music'];
$qxiamiad=$var['ad'];
$xmusicpara='<script type="text/javascript">var xmusic_mc="'.( $var['mainColor'] ? ltrim($var['mainColor'],"#") : 'FF8719').'",xmusic_bc="'.( $var['backColor'] ? ltrim($var['backColor'],"#") : '494949').'";</script>';
$mid= intval($_GET['mid']);
$mkey=diconv(urldecode(trim($_GET['mkey'])),'UTF-8');
if(!empty($_GET['typeoption']) && is_array($_GET['typeoption'])) {
if($_GET['formhash'] != FORMHASH) {
		showmessage('undefined_action', NULL);
	}
if(!$_G['uid']) {
	showmessage('to_login', null, array(), array('showmsg' => true, 'login' => 1));
	}
	
if(DB::result_first("SELECT COUNT(*) FROM ".DB::table('forum_forum')." WHERE fid='{$var['fidnumber']}' AND type<>'group'") != 1) {
			showmessage(lang('plugin/qarx_music', 'diangeorr'), dreferer());
		}
	if(in_array($_G['groupid'], unserialize($var['bangroup']))){
	showmessage(lang('plugin/qarx_music', 'bangrouptip'), dreferer());	
    }
foreach($_G['setting']['extcredits'] as $key => $value){
								$ext = 'extcredits'.$key;
								getuserprofile($ext);
								$person['extcredits'][$key]['title'] = $value['title'];
								$person['extcredits'][$key]['value'] = $_G['member'][$ext];
				}
	if($var['kextcredit'] && $var['kpercredit']<0){				
			if($person['extcredits'][$var['kextcredit']]['value'] < abs($var[kpercredit])){
$mess=$person['extcredits'][$var['kextcredit']]['title'].lang('plugin/qarx_music', 'creditnotenough', array('jifen' => abs($var[kpercredit]))); showmessage($mess, "plugin.php?id=qarx_music:diange");
			}
	}
	
	require_once libfile('function/post');
    require_once libfile('function/forum');
	
	$xiamisongname=dhtmlspecialchars(censor(trim($_GET['typeoption']['songname'])));
	$xiamitaname=dhtmlspecialchars(censor(strip_tags(trim($_GET['typeoption']['taname']))));
	$xiamizhufutext=dhtmlspecialchars(censor(strip_tags(trim($_GET['typeoption']['zhufutext']))));
	$xiamiyourname=dhtmlspecialchars(censor(strip_tags(trim($_GET['typeoption']['yourname']))));
	$xiamisongid=dhtmlspecialchars(censor(trim($_GET['typeoption']['xiamisongid'])));
	  
 	$subject=cutstr(dhtmlspecialchars($xiamiyourname.lang('plugin/qarx_music', 'dianbowei').$xiamitaname.lang('plugin/qarx_music', 'dianpomusic').$xiamisongname),80);
	$message="[table=98%][tr][td=50%][flash=380,118]http://www.xiami.com/widget/8663058_{$xiamisongid},_380_140_".( $var['mainColor'] ? ltrim($var['mainColor'],"#") : 'FF8719')."_".( $var['backColor'] ? ltrim($var['backColor'],"#") : '494949')."_1/multiPlayer.swf[/flash]\n[url=plugin.php?id=qarx_music:diange&mid={$xiamisongid}&mkey=".urlencode(diconv($xiamisongname,CHARSET,'UTF-8'))."]".lang('plugin/qarx_music', 'dianbocige')."[/url][/td][td=50%][align=left]TO:{$xiamitaname}[/align][hr]{$xiamizhufutext}[hr][align=right]From:{$xiamiyourname}[/align][/td][/tr][/table]";
DB::query("INSERT INTO ".DB::table('forum_thread')." (fid, posttableid, readperm, price, typeid, sortid, author, authorid, subject, dateline, lastpost, lastposter, displayorder, digest, special, attachment, moderated, highlight, closed, status, isgroup) VALUES ('$var[fidnumber]', '0', '0', '0', '$var[dgtypeid]', '0', '$_G[username]', '$_G[uid]', '$subject', '$_G[timestamp]', '$_G[timestamp]', '$_G[username]', '0', '0', '0', '0', '0', '0', '0', '0', '0')");
$tid = DB::insert_id();
$pid = insertpost(array('fid' => $var['fidnumber'],'tid' => $tid,'first' => '1','author' => $_G['username'],'authorid' => $_G['uid'],'subject' => $subject,'dateline' => $_G['timestamp'],'message' => $message,'useip' => $_G['clientip'],'invisible' => '0','anonymous' => '0','usesig' => '0','htmlon' => '0','bbcodeoff' => '0','smileyoff' => '0','parseurloff' => '0','attachment' => '0',));
$lastpost = "$tid\t".addslashes($subject)."\t$_G[timestamp]\t$_G[username]";
DB::query("UPDATE ".DB::table('forum_forum')." SET lastpost='$lastpost', threads=threads+1, posts=posts+1, todayposts=todayposts+1 WHERE fid='$var[fidnumber]'", 'UNBUFFERED');
if($var['kextcredit'] && $var['kpercredit']){
				updatemembercount($_G['uid'], array($var['kextcredit'] => $var['kpercredit']));
			} else {
				updatepostcredits('+', $_G['uid'], 'post', $var['fidnumber']);	
			}
			if(!empty($xiamitaname)) {
							$xiamitauid = DB::result_first("SELECT uid FROM ".DB::table("common_member")." WHERE username='$xiamitaname'");
							if($xiamitauid) {
							notification_add($xiamitauid, 'system', 'system_notice', array('subject' => $subject, 'message' =>'<a href="forum.php?mod=viewthread&tid='.$tid.'">'.$xiamisongname.'</a>'), 1);
							}
			}
		showmessage(lang('plugin/qarx_music', 'dianboOk'), "forum.php?mod=viewthread&tid=$tid");

}
$navtitle= lang('plugin/qarx_music', 'navtitle');
include template("qarx_music:diange");


?>