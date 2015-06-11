<?php


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_xdep_boardbackground {
	function plugin_xdep_boardbackground(){
		}
	function global_header(){
		global $_G;
		$fid=intval($_G['fid']);
		$bg_setting = C::t('#xdep_boardbackground#bg_setting')->fetch_by_value($fid);
		if(empty($bg_setting)){
			$upfid=intval($_G['cache']['forums'][$_G['forum']['fup']]['fid']);
			$bg_setting = C::t('#xdep_boardbackground#bg_setting')->fetch_by_value($upfid);
			}
		if(empty($bg_setting)){
			$gid=intval($_G['grouptypeid']);
			$bg_setting = C::t('#xdep_boardbackground#gbg_setting')->fetch_by_value($gid);
			}
		if(empty($bg_setting)){
			$upgid=intval($_G['cache']['grouptype']['second'][$_G['grouptypeid']]['fup']);
			$bg_setting = C::t('#xdep_boardbackground#gbg_setting')->fetch_by_value($upgid);
			}
		if(empty($bg_setting)){
			return;
			}
		if(!$bg_setting['posts']){
			if($_G['tid']){
				return;
				}
			}
		include template('xdep_boardbackground:header');
		return $moe_theader;
		}
	function global_footerlink(){
		global $_G;
		if($_G['cache']['plugin']['xdep_boardbackground']['link']){
			return '<a href="http://www.moeac.com" target="_blank">moeac</a>';
			}else{
				return '';
				}
		}
}

?>