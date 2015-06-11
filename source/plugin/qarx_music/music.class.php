<?php

/**
 *      [Discuz! X] (C)2001-2010 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: soso.class.php 4835 2010-11-08 05:31:13Z yexinhao $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_qarx_music {
	function  plugin_qarx_music() {
		global $_G;
		
		$this->on=$_G['forum']['allowmediacode'] && $_G['group']['allowmediacode'];
		$this->auto = intval($_G['cache']['plugin']['qarx_music']['autoplay']);
		$this->playerbs = intval($_G['cache']['plugin']['qarx_music']['playerbs']);
		$this->playerwidth = intval($_G['cache']['plugin']['qarx_music']['playerwidth']) ? intval($_G['cache']['plugin']['qarx_music']['playerwidth']) : 380 ;
		$this->mainColor = $_G['cache']['plugin']['qarx_music']['mainColor'];
		$this->backColor = $_G['cache']['plugin']['qarx_music']['backColor'];
		$this->fidnumber = intval($_G['cache']['plugin']['qarx_music']['fidnumber']);	
		$this->disname = intval($_G['cache']['plugin']['qarx_music']['dispsname']);	
	}
	
	
}

class plugin_qarx_music_forum extends plugin_qarx_music{
	
	 function post_bottom_output() {
		 
		if($this->on){
		
			return '<link type="text/css" rel="stylesheet" href="source/plugin/qarx_music/images/music331.css?'.VERHASH.'"><script type="text/javascript">var xmusic_big='.$this->playerbs.',xmusic_auto='.$this->auto.',xmusic_width='.$this->playerwidth.',xmusic_mc="'.($this->mainColor ? ltrim($this->mainColor,"#") : 'FF8719').'",xmusic_bc="'.($this->backColor ? ltrim($this->backColor,"#") : '494949').'",xmusic_dg='.($this->fidnumber == 0 ? '0' : '1').',xmusic_disname='.$this->disname.';</script><script type="text/javascript" charset="gbk" src="source/plugin/qarx_music/js/qxiami_music.js?'.VERHASH.'"></script>'; 		   
		} 
	 }
	
}