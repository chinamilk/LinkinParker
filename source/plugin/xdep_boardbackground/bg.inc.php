<?php


if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$pmod=$_GET['pmod'];
$formAction = 'plugins&operation=config&do=' . $pluginid . '&identifier=' . $plugin['identifier'] . '&pmod=' . $pmod;


if (!submitcheck('bgsubmit')) {
	$setting = array();
	$r= C::t('#xdep_boardbackground#bg_setting')->fetch_by_all();
	foreach($r as $s){
		$XR=$s['xrepeat']?'checked':"";
		$YR=$s['yrepeat']?'checked':"";
		$XC=$s['xcenter']?'checked':"";
		$posts=$s['posts']?'checked':"";
		$fixed=$s['fixed']?'checked':"";
		$basicfunction.=showtablerow('',array('class="td25"','class="td24"','class="td24"','class="td26"'),array(
		'<input type="checkbox" class="checkbox" name="delete[]" value="'.$s['id'].'"/>',
		'<input type="text" class="txt" name="tion['.$s['id'].'][fid]" value="'.$s['fid'].'"/>',
		'<input type="text" class="txt" name="tion['.$s['id'].'][color]" value="'.$s['color'].'"/>',
		'<input type="text" class="txt" size="200" name="tion['.$s['id'].'][imgurl]" value="'.$s['imgurl'].'"/>',
		'<input type="checkbox" class="" name="tion['.$s['id'].'][xrepeat]" value="1" '.$XR.'/>',
		'<input type="checkbox" class="" name="tion['.$s['id'].'][yrepeat]" value="1" '.$YR.'/>',
		'<input type="checkbox" class="" name="tion['.$s['id'].'][xcenter]" value="1" '.$XC.'/>',
		'<input type="checkbox" class="" name="tion['.$s['id'].'][posts]" value="1" '.$posts.'/>',
		'<input type="checkbox" class="" name="tion['.$s['id'].'][fixed]" value="1" '.$fixed.'/>'
		),true);
		}
	
	echo <<<EOT
	<script type="text/JavaScript">
	var rowtypedata = [
		[
			[1,'', 'td25'],
			[1,'<input type="text" class="txt" size="12" name="tionnewadd[fid][]">'],
			[1,'<input type="text" class="txt" size="12" name="tionnewadd[color][]">'],
			[1,'<input type="text" class="txt" size="200" name="tionnewadd[imgurl][]">', 'td26'],
			[1,'<input type="checkbox" class="" size="" name="tionnewadd[xrepeat][]">'],
			[1,'<input type="checkbox" class="" size="" name="tionnewadd[yrepeat][]">'],
			[1,'<input type="checkbox" class="" size="" name="tionnewadd[xcenter][]">'],
			[1,'<input type="checkbox" class="" size="" name="tionnewadd[posts][]">'],
			[1,'<input type="checkbox" class="" size="" name="tionnewadd[fixed][]">']
		]
	];
EOT;
	echo '</script>';
	showformheader($formAction);
	showtips(lang('plugin/xdep_boardbackground', 'Setting_conf').lang('plugin/xdep_boardbackground', 'Setting_con'));
	showtableheader(lang('plugin/xdep_boardbackground', 'Setting_titlef'));
	showsubtitle(array('', lang('plugin/xdep_boardbackground', 'Setting_fid'), lang('plugin/xdep_boardbackground', 'Setting_bgcolor'),lang('plugin/xdep_boardbackground', 'Setting_imgurl'),lang('plugin/xdep_boardbackground', 'Setting_xr'),lang('plugin/xdep_boardbackground', 'Setting_yr'),lang('plugin/xdep_boardbackground', 'Setting_xc'),lang('plugin/xdep_boardbackground', 'Setting_posts'),lang('plugin/xdep_boardbackground', 'Setting_fixed')));
	
	echo $basicfunction;
	echo '<tr><td>&nbsp;</td><td><div><a href="###" onclick="addrow(this, 0)" class="addtr">' . lang('plugin/xdep_boardbackground', 'Setting_add_new') . '</a></div></td></tr>';
	showtablefooter();
	showsubmit('bgsubmit',lang('plugin/xdep_boardbackground', 'OK'),'del');
	showformfooter();
	}else{
		$tionnewadd=daddslashes($_POST['tionnewadd']);
		$tion=daddslashes($_POST['tion']);
		$delete=daddslashes($_POST['delete']);
		for($i=0;$i<count($tionnewadd['fid']);$i++){
			if(!empty($tionnewadd['fid'][$i])){
				C::t('#xdep_boardbackground#bg_setting')->insert($tionnewadd['fid'][$i],$tionnewadd['color'][$i],$tionnewadd['imgurl'][$i],$tionnewadd['xrepeat'][$i],$tionnewadd['yrepeat'][$i],$tionnewadd['xcenter'][$i],$tionnewadd['posts'][$i],$tionnewadd['fixed'][$i]);
				}
			}
		$t=array_keys($tion);
		foreach($t as $i){
			C::t('#xdep_boardbackground#bg_setting')->update_by_value($i,$tion[$i]['fid'],$tion[$i]['color'],$tion[$i]['imgurl'],$tion[$i]['xrepeat'],$tion[$i]['yrepeat'],$tion[$i]['xcenter'],$tion[$i]['posts'],$tion[$i]['fixed']);
			}
		foreach($delete as $d){
			C::t('#xdep_boardbackground#bg_setting')->delete_by_id($d);
			}
		cpmsg(lang('plugin/xdep_boardbackground', 'Setting_success'),'action='.$formAction,'succeed');
}?>