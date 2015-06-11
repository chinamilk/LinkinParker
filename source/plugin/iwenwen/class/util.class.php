<?php
/**
 * 
 * @author arlonzou
 *
 */
if(!function_exists('getimgthumbname')){
	function getimgthumbname($fileStr, $extend='.thumb.jpg', $holdOldExt=true) {
		if(empty($fileStr)) {
			return '';
		}
		if(!$holdOldExt) {
			$fileStr = substr($fileStr, 0, strrpos($fileStr, '.'));
		}
		$extend = strstr($extend, '.') ? $extend : '.'.$extend;
		return $fileStr.$extend;
	}
}

class IwenwenUtil{
	
	var $aids = array();
	/**
	 * 发新主贴
	 * @param array $posts
	 * @return multitype:number string unknown |multitype:number string
	 */
	function newthread($posts){
		global $_G;
		$haspost = DB::fetch_first('select * from '.DB::table('iwenwen_backflow').' where `status`=1 and qid = '.$posts['qid'].' and answerid=0');
		if($haspost){
			return array('tid'=>$haspost['tid'],'pid'=>$haspost['pid'],'code'=>0,'msg'=>'already posts.get success.');
		}
		$posts = $this->convert($posts);
		$newstatus = 0;
		$publishdate = time();
		$newthread = array(
				'fid' => $posts['fid'],
				'posttableid' => 0,
				'readperm' => 0,
				'price' => 0,
				'typeid' => 0,
				'sortid' => 0,
				'author' => $posts['authorName'],
				'authorid' => 0,
				'subject' => $posts['title'],
				'dateline' => $publishdate,
				'lastpost' => $publishdate,
				'lastposter' => $posts['authorName'],
				'displayorder' => 0,
				'digest' => 0,
				'special' => 0,
				'attachment' => 0,
				'moderated' => 0,
				'status' => $newstatus,
				'isgroup' => 0,
				'closed' => 0
		);
		
		if(class_exists('C')){
			$tid = C::t('forum_thread')->insert($newthread, true);
		}
		else{
			DB::query("INSERT INTO ".DB::table('forum_thread')." (fid, posttableid, readperm, price, typeid, sortid, author, authorid, subject, dateline, lastpost, lastposter, displayorder, digest, special, attachment, moderated, status, isgroup, closed)
			VALUES ('".$posts['fid']."', '0', '0', '0', '0', '0', '".$posts['authorName']."', '0', '".$posts['title']."', '$_G[timestamp]', '$_G[timestamp]', '".$posts['authorName']."', '0', '0', '0', '0', '0', '$newstatus', '0', '0')");
			$tid = DB::insert_id();
		}
		$posts['content'] = $this->convertContent($posts['content'],$posts,$tid);
		if(empty($posts['content'])){
			DB::query("delete from ".DB::table('forum_thread')." where tid='".$tid."'"); // when get img failed,delete the thread. return error.
			return array('code'=>9,'msg'=>'get img failed,please retry.');
		}
		
		$pid = insertpost(array(
				'fid' => $posts['fid'],
				'tid' => $tid,
				'first' => '1',
				'author' => $posts['authorName'],
				'authorid' => 0,
				'subject' => $posts['title'],
				'dateline' => $publishdate,
				'message' => $posts['content'],
				'useip' => '',
				'invisible' => 0,
				'anonymous' => 1,
				'usesig' => 0, //使用签名
				'htmlon' => 0,
				'bbcodeoff' => 0,
				'smileyoff' => 1,
				'parseurloff' => 1,
				'attachment' => '0',
				'tags' => '',
				'status' => $newstatus
		));
		
		if(!empty($this->aids)){
			if(function_exists('getattachtablebytid')){
				foreach($this->aids as $aid){
					if(class_exists('C')){
						C::t('forum_attachment')->update($aid, array('tid' => $tid, 'pid' => $pid, 'tableid' => getattachtableid($tid)));
					}
					else{
						DB::update('forum_attachment', array('tid' => $tid, 'pid' => $pid, 'tableid' => getattachtableid($tid)), "aid='$aid'");
					}
					DB::update(getattachtablebytid($tid), array('pid' => $pid), "aid='$aid'");
				}
			}
			else{
				DB::query("UPDATE ".DB::table('forum_attachment')." SET tid='".$tid."', pid='$pid' WHERE aid in (".implode(',',$this->aids).")");
			}
			if(class_exists('C')){
				
				C::t('forum_post')->update('tid:'.$tid, $pid, array('attachment' => 2), true);
			}
			else{
				$posttable = getposttablebytid($tid);
				DB::query("UPDATE ".DB::table($posttable)." SET attachment='2' WHERE pid='$pid'", 'UNBUFFERED');
			}
		}
		
		$posts['title'] = str_replace("\t", ' ', $posts['title']);
		$lastpost = "$tid\t".$posts['title']."\t$publishdate\t".$posts['authorName'];
		if(class_exists('C')){
			C::t('forum_forum')->update($posts['fid'], array('lastpost' => $lastpost));
			C::t('forum_forum')->update_forum_counter($posts['fid'], 1, 1, 1);
		}
		else{		
			DB::query("UPDATE ".DB::table('forum_forum')." SET lastpost='$lastpost', threads=threads+1, posts=posts+1, todayposts=todayposts+1 WHERE fid='".$posts['fid']."'", 'UNBUFFERED');
			if($_G['forum']['type'] == 'sub') {
				DB::query("UPDATE ".DB::table('forum_forum')." SET lastpost='$lastpost' WHERE fid='".$_G['forum'][fup]."'", 'UNBUFFERED');
			}
		}			
		$this->insertBackflow($tid, $pid, 1, $posts['qid'], 0);
		return array('tid'=>$tid,'pid'=>$pid,'code'=>0,'msg'=>'success.');
	}
	
	/**
	 * 发新回帖
	 * @param array $posts
	 */
	function newpost($posts){
		global $_G;
		
		$haspost = DB::fetch_first('select * from '.DB::table('iwenwen_backflow').' where `status`=0 and qid = '.$posts['qid'].' and answerid=\''.$posts['answerId']."'");
		if($haspost){
			return array('tid'=>$haspost['tid'],'pid'=>$haspost['pid'],'code'=>0,'msg'=>'already posts. get success.');
		}
		
		$tid = $posts['tid'];
		
		$posts = $this->convert($posts);
		$posts['content'] = $this->convertContent($posts['content'],$posts,$tid);
		if(empty($posts['content'])){
			return array('code'=>9,'msg'=>'get img failed,please retry.');
		}
		
		$newstatus = 0;
		$publishdate = time();
		
		$thread = DB::fetch_first('select * from '.DB::table('forum_thread').' where tid = '.$tid);
		if(empty($thread) || $thread['displayorder']=='-1'){
				return array('tid'=> $tid,'pid'=> 0,'code'=> -1,'msg'=>'tid not exists in site. may has been deleted.');
		}
		$pid = insertpost(array(
				'fid' => $thread['fid'],
				'tid' => $tid,
				'first' => '0',
				'author' => $posts['authorName'],
				'authorid' => 0,
				'subject' => '',
				'dateline' => $publishdate,
				'message' => $posts['content'],
				'useip' => '',
				'invisible' => 0,
				'anonymous' => 1,
				'usesig' => 0,
				'htmlon' => 0,
				'bbcodeoff' => 0,
				'smileyoff' => 1,
				'parseurloff' => 1,
				'attachment' => '0',
				'status' => $newstatus,
		));
		if(!empty($this->aids)){
			if(function_exists('getattachtablebytid')){
				foreach($this->aids as $aid){
					if(class_exists('C')){
						C::t('forum_attachment')->update($aid, array('tid' => $tid, 'pid' => $pid, 'tableid' => getattachtableid($tid)));
					}
					else{
						DB::update('forum_attachment', array('tid' => $tid, 'pid' => $pid, 'tableid' => getattachtableid($tid)), "aid='$aid'");
					}
					DB::update(getattachtablebytid($tid), array('pid' => $pid), "aid='$aid'");
				}				
			}
			else{
				DB::query("UPDATE ".DB::table('forum_attachment')." SET tid='".$tid."', pid='$pid' WHERE aid in (".implode(',',$this->aids).")");
				
			}
			if(class_exists('C')){
				C::t('forum_post')->update('tid:'.$tid, $pid, array('attachment' => 2), true);
			}
			else{
				$posttable = getposttablebytid($tid);
				DB::query("UPDATE ".DB::table($posttable)." SET attachment='2' WHERE pid='$pid'", 'UNBUFFERED');
			}
		}
		
		if(class_exists('C')){
			$updatethreaddata = array();
			$postionid = C::t('forum_post')->fetch_maxposition_by_tid($thread['posttableid'], $posts['tid']);
			$updatethreaddata[] = DB::field('maxposition', $postionid);
		
			$fieldarr = array(
					'lastposter' => array($posts['authorName']),
					'replies' => 1
			);
            $fieldarr['lastpost'] = array($_G['timestamp']);
			
			$updatethreaddata = array_merge($updatethreaddata, C::t('forum_thread')->increase($posts['tid'], $fieldarr, false, 0, true));
			C::t('forum_thread')->update($posts['tid'], $updatethreaddata, false, false, 0, true);
			
            
            $lastpost = "$thread[tid]\t$thread[subject]\t$_G[timestamp]\t".$posts['authorName'];
            C::t('forum_forum')->update($thread['fid'], array('lastpost' => $lastpost));
            C::t('forum_forum')->update_forum_counter($thread['fid'], 0, 1, 1);
		}
		else{
			$cacheposition = getstatus($thread['status'], 1);
			if($pid && $cacheposition) {
				savepostposition($posts['tid'], $pid);
			}
			
			DB::query("UPDATE ".DB::table('forum_thread')." SET lastposter='$author', lastpost='$publishdate', replies=replies+1 WHERE tid='$posts[tid]'", 'UNBUFFERED');
            
            $lastpost = "$thread[tid]\t".addslashes($thread['subject'])."\t$_G[timestamp]\t".$posts['authorName'];
            DB::query("UPDATE ".DB::table('forum_forum')." SET lastpost='$lastpost', posts=posts+1, todayposts=todayposts+1 WHERE fid='$thread[fid]'", 'UNBUFFERED');
                                    

		}
		$this->insertBackflow($posts['tid'], $pid, 0, $posts['qid'], $posts['answerId']);
		return array('tid'=>$posts['tid'],'pid'=>$pid,'code'=>0,'msg'=>'success.');
	}
	
	/**
	 * 帖子设置匿名
	 * @param unknown_type $posts
	 * @return multitype:number string |multitype:number string unknown
	 */
	function setanonymous($posts){
		$tid = $posts['tid'];$pid=$posts['pid'];

		$posts = $this->convert($posts);
		if(class_exists('C')){
			$orig = C::t('forum_post')->fetch('tid:'.$tid, $pid, false);//true
		}
		else{
			$posttable = getposttablebytid($tid);
			$orig = DB::fetch_first("SELECT p.first, p.message, p.dateline, p.anonymous, p.invisible, p.htmlon FROM ".DB::table($posttable)." p
			WHERE pid='$pid' AND tid='$tid'");
		}
		if(empty($orig)){
			return array('code'=>2,'msg'=>'thread or posts not exists.');
		}
		//$reg = '/'.str_replace('-','\-',lang('plugin/iwenwen','iwenwen_source')).'(.+?)'.'\[\/url\]/';
		//$orig['message'] = preg_replace($reg,lang('plugin/iwenwen','iwenwen_source_anony').'[/url]',$orig['message']);
		
		$isfirstpost = $orig['first'] ? 1 : 0;
		if($isfirstpost){
			$threadupdatearr = array();
			$threadupdatearr['author'] = $posts['authorName'];
			if(class_exists('C')){
				C::t('forum_thread')->update($tid, $threadupdatearr, true);
			}
			else{
				DB::query("UPDATE ".DB::table('forum_thread')." SET author='".$posts['authorName']."' WHERE tid='$tid'", 'UNBUFFERED');
			}
		}
		if(class_exists('C')){
			$setarr = array(
					'author' => $posts['authorName'],
					//'message' => $orig['message'],
					'anonymous' => 1,
			);
			C::t('forum_post')->update('tid:'.$tid, $pid, $setarr);
		}
		else{
			DB::query("UPDATE ".DB::table($posttable)." SET author='".$posts['authorName']."'
			  WHERE pid='$pid'"); 
		}
		
		return array('tid'=> $tid,'pid'=> $pid,'code'=>0,'msg'=>'set anonymous success.');
	}
	
	/**
	 * 编辑帖子
	 * @param unknown_type $posts
	 */
	function editpost($posts){
		$tid = $posts['tid'];$pid=$posts['pid'];

		$posts = $this->convert($posts);
		$posts['content'] = $this->convertContent($posts['content'],$posts,$tid,$pid);		
		if(empty($posts['content'])){
			return array('code'=>9,'msg'=>'get img failed,please retry.');
		}
		if(class_exists('C')){
			$orig = C::t('forum_post')->fetch('tid:'.$tid, $pid, false);
		}
		else{
			$posttable = getposttablebytid($tid);
			$orig = DB::fetch_first("SELECT  p.first, p.authorid, p.author, p.dateline, p.anonymous, p.invisible, p.htmlon FROM ".DB::table($posttable)." p
			WHERE pid='$pid' AND tid='$tid'");
		}
		if(empty($orig)){
			return array('code'=>2,'msg'=>'thread or posts not exists.');
		}

		$isfirstpost = $orig['first'] ? 1 : 0;
		
		$publishdate = time();
		if($isfirstpost){
			$threadupdatearr = array();
			$threadupdatearr['author'] = $posts['authorName'];
			$threadupdatearr['subject'] = $posts['title'];
			if(class_exists('C')){
				C::t('forum_thread')->update($tid, $threadupdatearr, true);
			}
			else{
				DB::query("UPDATE ".DB::table('forum_thread')." SET subject='".$posts['title']."',author='".$posts['authorName']."' WHERE tid='$tid'", 'UNBUFFERED');
			}
		}
		
		if(class_exists('C')){
			$setarr = array(
					'message' => $posts['content'],
					'author' => $posts['authorName'],
					'usesig' => '',
					'htmlon' => 0,
					'bbcodeoff' => 0,
					'parseurloff' => 1,
					'smileyoff' => 1,
					'subject' => $posts['title'],
					'dateline' => $publishdate,
					'tags' => '',
					'anonymous' => 1,
					'invisible'=>0,
			);
			C::t('forum_post')->update('tid:'.$tid, $pid, $setarr);
		}
		else{
		
			DB::query("UPDATE ".DB::table($posttable)." SET message='".$posts['content']."',author='".$posts['authorName']."'
				 WHERE pid='$pid'");
		}
		
		if(!empty($this->aids)){
			if(function_exists('getattachtablebytid')){
				foreach($this->aids as $aid){
					DB::update(getattachtablebytid($posts['tid']), array('pid' => $pid), "aid='$aid'");
				}
			}
			else{
				DB::query("UPDATE ".DB::table('forum_attachment')." SET tid='".$posts['tid']."', pid='$pid' WHERE aid in (".implode(',',$this->aids).")");
			}
			if(class_exists('C')){
				C::t('forum_post')->update('tid:'.$posts['tid'], $pid, array('attachment' => 2), true);
			}
			else{
				$posttable = getposttablebytid($posts['tid']);
				DB::query("UPDATE ".DB::table($posttable)." SET attachment='2' WHERE pid='$pid'", 'UNBUFFERED');
			}
		}
		
		return array('tid'=> $tid,'pid'=> $pid,'code'=>0,'msg'=>'edit success.');
	}
	
	/**
	 * 获取可供选择的回流版面
	 * @param boolean $arrayformat true时返回数组，false时返回html
	 * @param array $selectfids
	 * @param array $formkeywords
	 * @return Ambigous <string, multitype:>
	 */
	function getIwenwenForums($arrayformat=false,$selectfids=array(),$formkeywords=array()){
		global $_G,$templatelang;
		$selectfids = array_filter($selectfids);

		$evalue = FALSE; $special = 0;
		$skip_fnames = explode(',',$_G['setting']['iwenwen_skip_fnames']);
		
		if(!isset($_G['cache']['forums'])) {
			loadcache('forums');
		}
		$forumcache = &$_G['cache']['forums'];
		
		$forumlist = $arrayformat ? array() : '
		<style>
		input::-webkit-input-placeholder{color:#999;}
		input:-moz-placeholder{color: #999;}
		input:-ms-input-placeholder{color:#999;}
		</style>
		<table>';
		foreach($forumcache as $forum) {
			//$forum = C::t('forum_forumfield')->fetch($fid);
			if(!$forum['status']) {
				continue;
			}
			$skip = false;
			//跳过带有指定字符的版面，如版务、版主等
			foreach($skip_fnames as $w){
				if(function_exists('mb_strpos')){
					if(mb_strpos($forum['name'], $w,0,CHARSET)!==false){
						$skip = true;
						break;
					}
				}
				elseif(strpos($forum['name'], $w)!==false){
					$skip = true;
					break;
				}
			}
			if($skip){
				continue;
			}
			if(!is_array($formkeywords[$forum['fid']]['keyword'])){
				$formkeywords[$forum['fid']]['keyword'] = explode('#',$formkeywords[$forum['fid']]['keyword']);
			}
			if($forum['type'] == 'group') {
				if($arrayformat) {
					$visible[$forum['fid']] = true;
					continue;
				}
				if($forum['status']==1){
					$visible[$forum['fid']] = true;
					$forumlist .= '<tr><td class="td25"></td><td><div class="parentboard">'.$forum['name'].'</div></td><td></td></tr>';
				}
				else{
					continue;
				}
			}
			elseif($forum['type'] == 'forum' && empty($forum['password']) && isset($visible[$forum['fup']]) && (!$forum['viewperm'] || ($forum['viewperm'] && forumperm($forum['viewperm'])) || strstr($forum['users'], "\t$_G[uid]\t")) && (!$special || (substr($forum['allowpostspecial'], -$special, 1)))) {
				if($arrayformat) {
					$forumlist[$forum['fid']] = $forum['name'];
				} else {
					$forumlist .= '<tr><td class="td25"><input name="board['.$forum['fid'].'][id]" class="txt" value="'.$forum['fid'].'"  type="checkbox" '.(empty($selectfids) || in_array($forum['fid'],$selectfids)?' checked="checked" ':'').'></td><td><div class="board"> '.$forum['name'].'</div></td><td>';
					for($i=0;$i<5;$i++){
						$forumlist .= '<input name="board['.$forum['fid'].'][keyword][]" value="'.$formkeywords[$forum['fid']]['keyword'][$i].'" placeholder="'.$templatelang['keyword_placeholder'].'" size="10" type="text"> ';
					}
					$forumlist .= '</td></tr>';
					
				}
				$visible[$forum['fid']] = true;
			} elseif($forum['type'] == 'sub' && empty($forum['password']) && isset($visible[$forum['fup']]) && (!$forum['viewperm'] || ($forum['viewperm'] && forumperm($forum['viewperm'])) || strstr($forum['users'], "\t$_G[uid]\t")) && (!$special || substr($forum['allowpostspecial'], -$special, 1))) {
				if($arrayformat) {
					$forumlist[$forum['fid']] = $forum['name'];
				} else {
					$forumlist .= '<tr><td class="td25"><input name="board['.$forum['fid'].'][id]" class="txt" value="'.$forum['fid'].'"  type="checkbox" '.(empty($selectfids) || in_array($forum['fid'],$selectfids)?' checked="checked" ':'').'></td><td><div class="childboard">'.$forum['name'].'</div></td><td>';
					for($i=0;$i<5;$i++){
						$forumlist .= '<input name="board['.$forum['fid'].'][keyword][]" value="'.$formkeywords[$forum['fid']]['keyword'][$i].'" placeholder="'.$templatelang['keyword_placeholder'].'" size="10" type="text"> ';
					}
					$forumlist .= '</td></tr>';
					//$forumlist .= '<option value="'.($evalue ? 'fid_' : '').$forum['fid'].'"'.$selected.'>&nbsp; &nbsp; &nbsp; '.$forum['name'].'</option>';
				}
			}
		}
		
		if(!$arrayformat) {
			$forumlist .= '</table>';
			//$forumlist = str_replace('<optgroup label="&nbsp;"></optgroup>', '', $forumlist);
		}
		return $forumlist;
	}
	
	/**
	 * 向backflow表中插入一条回流记录
	 * @param int $tid
	 * @param int $pid
	 * @param int $status
	 * @param int $qid
	 * @param int $answerid
	 */
	
	function insertBackflow($tid,$pid,$status,$qid,$answerid){
		return DB::query('insert into '.DB::table('iwenwen_backflow')." (tid,pid,status,qid,answerid,sync_time) value('$tid','$pid','$status','$qid','$answerid','".TIMESTAMP."')");
	}
	/**
	 * 检查表格是否存在
	 * @return boolean
	 */
	function checkTable(){
		global $_G;
		$tablepre = $_G['config']['db'][1]['tablepre'];
		$hastable = DB::fetch_first("show tables like '".$tablepre."iwenwen_backflow'");
		if(empty($hastable)){
			return false;
		}
		else{
			$hastable = DB::fetch_first("show tables like '".$tablepre."iwenwen_answers'");
			if(empty($hastable)){
				return false;
			}
			return true;
		}
	}
	/**
	 * 创建表格
	 * @param unknown_type $sql
	 * @return boolean
	 */
	function createTable(&$sql){
		global $_G;
		$sql = <<<EOF
CREATE TABLE IF NOT EXISTS `pre_iwenwen_backflow` (
`tid` INT NOT NULL ,
`pid` INT NOT NULL ,
`status` TINYINT( 1 ) NOT NULL ,
`qid` INT UNSIGNED NOT NULL ,
`answerid` INT UNSIGNED NOT NULL ,
`sync_time` INT NOT NULL,
PRIMARY KEY ( `tid` , `pid` ) ,
INDEX ( `qid` , `answerid` )
) ENGINE = MYISAM ;
CREATE TABLE IF NOT EXISTS `pre_iwenwen_answers` (
`date` CHAR( 8 ) NOT NULL ,
`post_num` INT( 11 ) NOT NULL default 0,
PRIMARY KEY (  `date` )
) ENGINE = MYISAM ;	
EOF;
		$tablepre = $_G['config']['db'][1]['tablepre'];
		$i = 5; //建表语句若不成功，重试5次，
		do{
			runquery($sql);
			$i--;
			$hastable = DB::fetch_first("show tables like '".$tablepre."iwenwen_backflow'");
			if($hastable){
				$hastable = DB::fetch_first("show tables like '".$tablepre."iwenwen_answers'");
			}
		}while(empty($hastable) && $i>0);
		if(!empty($hastable)){
			return true;
		}
		else{
			return false;
		}
	}
		
	function getIwenwenUrl(){
				$cloudlib = libfile('function/cloud');
				if(file_exists($cloudlib)){
					require_once $cloudlib;
				}
				$cloudDomain = 'http://cp.discuz.qq.com';
				if(function_exists('generateSiteSignUrl')){ // 1.5,2.0
					$signUrl = generateSiteSignUrl(array('iwenwen'=>1,'dir'=>'iwenwen','installtype'=>$_GET['installtype']));
					$iwenwenurl = $cloudDomain.'/search/setting?'.$signUrl;
				}
				else{
					$utilService = Cloud::loadClass('Service_Util');
					$cp_version = $_G['setting']['my_search_data']['cp_version'];
					$anchor = 'iwenwen';
					$params = array('link_url' => ADMINSCRIPT . '?action=cloud&operation=search&anchor=iwenwen','dir'=>'iwenwen','cp_version' => $cp_version, 'anchor' => $anchor);			
					$signUrl = $utilService->generateSiteSignUrl($params);			
					$iwenwenurl = $cloudDomain . '/search/' . $anchor . '/?' . $signUrl;
				}
				return $iwenwenurl;
	}
	
	/**
	* 检查校验sig是否正确，若错误时不允许回流
	* @param $params 为array,包含sign,time
	* @param $new_sign 引用返回本地计算出的sign值
	*/
	function checksig($params,&$new_sign){
		global $_G;
		$sign = $params['sign'];
		if(empty($sign)){
			return false;
		}
		$new_sign = md5($params['time'].$_G['setting']['iwenwen_secretkey']);
		
		if($sign==$new_sign){
			return true;
		}
		else{
			return false;
		}
	}
	
	/**
	 * 获取网址的内容
	 * 同dfsockopen，增加了referer与useragent
	 */
	function getImageContent($url){
		global $_G;
		$timeout = 10;
		if(function_exists('curl_init') && function_exists('curl_exec')){
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_REFERER, 'http://wenwen.soso.com');
			curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; rv:14.0) Gecko/20100101 Firefox/14.0.1');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
			$data = curl_exec($ch);
			$status = curl_getinfo($ch);
			$errno = curl_errno($ch);
			curl_close($ch);
			if($errno || $status['http_code'] != 200) {
				return;
			} else {
				return $data;
			}
		}
		else{
			$matches = parse_url($url);
			$scheme = $matches['scheme'];
			$host = $matches['host'];
			$path = $matches['path'] ? $matches['path'].($matches['query'] ? '?'.$matches['query'] : '') : '/';
			$port = !empty($matches['port']) ? $matches['port'] : 80;
			
			$out = "GET $path HTTP/1.0\r\n";
			$header = "Accept: */*\r\n";
			$header .= "Accept-Language: zh-cn\r\n";
			$header .= "User-Agent: ".$_G['iwenwen']['pic_useragent']."\r\n";
			$header .= "Referer: ".$_G['iwenwen']['pic_referer']."\r\n";
			$header .= "Host: $host:$port\r\n";
			$header .= "Connection: Close\r\n";
			$out .= $header;
			
			$fpflag = 0;
			if(!$fp = @fsocketopen(($ip ? $ip : $host), $port, $errno, $errstr, $timeout)) {
				$context = array(
						'http' => array(
								'method' => $post ? 'POST' : 'GET',
								'header' => $header,
								'content' => $post,
								'timeout' => $timeout,
						),
				);
				$context = stream_context_create($context);
				$fp = @fopen($scheme.'://'.($ip ? $ip : $host).':'.$port.$path, 'b', false, $context);
				$fpflag = 1;
			}
			
			if(!$fp) {
				return '';
			} else {
				stream_set_blocking($fp, $block);
				stream_set_timeout($fp, $timeout);
				@fwrite($fp, $out);
				$status = stream_get_meta_data($fp);
				if(!$status['timed_out']) {
					while (!feof($fp) && !$fpflag) {
						if(($header = @fgets($fp)) && ($header == "\r\n" ||  $header == "\n")) {
							break;
						}
					}
					$return = stream_get_contents($fp);					
				}
				@fclose($fp);
				return $return;
			}
		}
	}
	
	/**
	 * 保存提问内容中的图片,若传入了$tid，$pid图片会保存为对应帖子或回帖的附件
	 * @param string $content
	 * @param int $tid
	 * @param int $pid
	 * @return unknown|boolean|mixed
	 */
	function saveImage($content,$tid,$pid=0){
		global $_G;
		preg_match_all("/<img[^>]*src\s*=\s*([\"|'])([^>]+)\\1/isU", $content, $imagearray); // src引号内的图片地址
        $imagearray = array_unique($imagearray[2]);
        
        //preg_match_all("/<img[^>]*src\s*=\s*([^>\s\"']+)/isU", $content, $imagearray1);	//不规则的html，src地址无引号
        //$imagearray = array_merge($imagearray,array_unique($imagearray1[1]));
		if(empty($imagearray)){
			return $content;
		}
        
        require_once libfile('class/image');
        $image = new image();
        
        if(empty($imgfolder)){
        	$imgfolder=date('Ym');
        }
		//return false;//return false for test img get failed.
        
        foreach ($imagearray as $value) {
        	$value = str_replace(array('"',"'"), array('',''), $value);
        	$originimgurl = $value = trim($value);
        	$imageurl = $value;
        	$imageurl =str_replace('&amp;', '&', $imageurl);
        	
        	$newimageurl = str_replace(array('=','?','&',':'),'_',$imageurl);
        	$newimageurl = str_replace(array('%2F','%'),array('/','.'),$newimageurl);//去掉文件名中的符号
        	$basename = substr(basename($newimageurl),0,200); // 截取最后的200位
        	$target = getimgthumbname($imgfolder.'/iwenwen_'.$basename,'.jpg');
        		
        		
        	dmkdir(dirname($_G['setting']['attachdir'].'forum/'.$target));
        		
        		
        	if(!file_exists($_G['setting']['attachdir'].'forum/'.$target)){ //已存在的图片不重复抓取。        
				$i = 0;
				do
				{
					$i++; 
					//file_put_contents('post.log',"\ntry get img $imageurl $i times.\n",FILE_APPEND);
        			$data = $this->getImageContent($imageurl); //try 3 times,when get img error.
				}while(empty($data) && $i<3);
				
        		if(!empty($data)){
        			$return = file_put_contents($_G['setting']['attachdir'].'forum/'.$target,$data);
        			$image->Thumb($_G['setting']['attachdir'].'forum/'.$target,'forum/'.$target,800,800);	//抓取的图片宽高最大设为800
        		}
        		else{
        			return false;
        		}
        	}
        	else{
        		$return = true;
        	}
        	list($width) = @getimagesize($_G['setting']['attachdir'].'forum/'.$target);
        	$filesize = filesize($_G['setting']['attachdir'].'forum/'.$target);
        	if(function_exists('getattachtablebytid')){
        		$aid = getattachnewaid($this->uid);
        		$update = array(
        			'tid' => $tid,
        			'pid' => $pid,
        			'aid' => $aid,
        			'dateline' => $_G['timestamp'],
        			'readperm' => 0,
        			'price'=> 0,
        			'filename' => basename($target),
        			'filesize' => $filesize,
        			'attachment' => $target,
        			'isimage' => 1,
        			'uid' => 0,
        			'thumb' => 0,
        			'remote'=> 0,
        			'width'=> $width,
        		);
        		DB::insert(getattachtablebytid($tid), $update, false, true);
        		//DB::query("UPDATE ".DB::table('forum_thread')." SET attachment='2' WHERE tid='$tid'", 'UNBUFFERED'); 		
        	}
        	else{
	        	DB::query("INSERT INTO ".DB::table('forum_attachment')." (tid, pid, dateline, readperm, price, filename, filetype, filesize, attachment, downloads, isimage, uid, thumb, remote, width)
				VALUES ('$tid', '$pid', '$_G[timestamp]', '0', '0', '".basename($target)."', 'application/octet-stream', '".$filesize."', '".$target."', '0', '1', '0', '0', '0', '$width')");
				$aid = DB::insert_id();				
				//DB::query("UPDATE ".DB::table('forum_thread')." SET attachment='2' WHERE tid='$tid'", 'UNBUFFERED');
			}
			DB::query("UPDATE ".DB::table('forum_thread')." SET attachment='2' WHERE tid='$tid'", 'UNBUFFERED');
			
			$this->aids[] = $aid;
        		
        	if ($return) { //保存成功时，替换地址
        		$imageurl = $_G['setting']['attachurl'].$target;
        		$regurl = str_replace(array('/','.','-'),array('\/','\.','\-'),$originimgurl);
        		$content = preg_replace("/<img[^>]*src\s*=\s*([\"|'])".$regurl."\\1[^>]*>/isU", '[attach]'.$aid.'[/attach]', $content);
        	}
        	else{ // 保存失败时，替换为原文博客的图片全址
        		// $content = str_replace($originimgurl, $imageurl, $content);
        		return false;
        	}
        }        
        $content = str_replace('</img>','',$content);
        return $content;
	}
	
	/**
	 * 编码转换，接收内容均为utf-8编码，根据discuz的版本转换到对应的编码
	 * @param unknown_type $data
	 * @return string
	 */
	function convert($data){
        //file_put_contents(DISCUZ_ROOT.'/data/convert.log',"\nBefore convert.\n".var_export($data,true),FILE_APPEND);
        if(!defined('IN_MOBILE')){ //为mobile 会自动转换编码，无需转换
			global $_G;
			if(strtolower(CHARSET)!='utf-8'){
				if(!class_exists('C')){
					$data = dstripslashes($data);
				}
				$data = $this->_convert($data); //非utf-8编码,先去除slashes,再转换,转换完成后,再加上slashes
				if(!class_exists('C')){
					$data = daddslashes($data);
				}
			}
		}
        //file_put_contents(DISCUZ_ROOT.'/data/convert.log',"\nafter convert.\n".var_export($data,true),FILE_APPEND);

		if(isset($data['title'])){
			$data['title'] = cutstr($data['title'], 80,'');
			$data['title'] = htmlspecialchars($data['title']); // fix title中包含html代码时的影响，如<td>...</td> 
		}
        $data['authorName'] = htmlspecialchars(trim($data['authorName']));
		if(!empty($data['authorName']) && $data['isAnonymous']=='false'){
			$data['authorName'] = cutstr($data['authorName'], 12,'...');
		}
		else{
			// $data['authorName'] = $_G['setting']['anonymoustext'];// 匿名
			$data['authorName'] = lang('plugin/iwenwen','iwenwen_user'); // 显示匿名（修改语言包的值可改变）搜搜问问网友
		}

        //file_put_contents(DISCUZ_ROOT.'/data/convert.log',"\nafter cut:\n".var_export($data,true),FILE_APPEND);
		return $data;
	}

	/**
	 * 转换编码
	 * @param unknown_type $data
	 * @return string|unknown
	 */
	function _convert($data){
		$in_charset = 'UTF-8';
		if(is_array($data)){
			foreach($data as $key => $val){
				//$newkey = $this->_convert($key); //key,val 同时转码
				//if($newkey!=$key){
				//	unset($data[$key]);
				//}
				$data[$key] = $this->_convert($val);					
			}
		}
		else{
			return diconv($data,$in_charset,CHARSET);
		}
		return $data;
	}
	/**
	* $content,内容；$url 来源链接；tid，帖子id，用于关联保存图片附件
	*/
	function convertContent($content,$posts,$tid=0,$pid=0){
		$url = $posts['url'];
		$content = strip_tags ($content, '<a><b><img><br><strong>');
		$content = str_replace('\"','"',$content);
		$content = str_replace(array('<strong>','</strong>','&nbsp;'),array('<b>','</b>',' '),$content);
		if($tid){
			$content = $this->saveImage($content,$tid,$pid);
		}
		else{
			$content = strip_tags ($content, '<img>');
		}
        //file_put_contents(DISCUZ_ROOT.'/data/convert.log',"\n--------\nafter save img:\n".$content,FILE_APPEND);
		if($content === false){
			return false;
		}
		if($this->mstrlen($content) >= 5000){
			$content = $this->subHtml($content, 5000,'...[url='.$url.']'.lang('plugin/iwenwen','readmore').'[/url]');
		}
		include_once libfile('class/bbcode');
		$bbcode = bbcode::instance();
		$content = $bbcode->html2bbcode($content);	
		
		//if(isset($url)){
		//	$content .= "\n[url=".$url."]".lang('plugin/iwenwen','iwenwen_source_anony')."[/url]";
		//}
		return $content;
	}
	
	/**
	 * 截取HTML,并自动补全闭合
	 * @param $html
	 * @param $length
	 * @param $end
	 */
	function subHtml($html,$length,$appendcontent = '') {
		$result = '';
		$tagStack = array();
		$len = 0;
	
		$contents = preg_split("~(<[^>]+?>)~si",$html, -1,PREG_SPLIT_NO_EMPTY| PREG_SPLIT_DELIM_CAPTURE);
		
		$notclosetag = array('br','input','img');
		foreach($contents as $tag)
		{
			if (trim($tag)=="")  continue;
			if(preg_match("~<([A-Za-z0-9]+)[^/>]*?/>~si",$tag)){ // 自结束标记，<br/>,<img/>
				$result .= $tag;
			}else if(preg_match("~</([A-Za-z0-9]+)[^/>]*?>~si",$tag,$match)){ // 结束标记
				$lasttag = $tagStack[count($tagStack)-1];
				
				if($lasttag != $match[1] && in_array(strtolower($lasttag),$notclosetag)){
					$result .= '</'.array_pop($tagStack).'>';//一个标签结束时，当前应结束标签与这个标签不同时。表示次数有标签未正常闭合。闭合应结束的标签。		
					$lasttag = $tagStack[count($tagStack)-1];	
				}
				
				if($lasttag == $match[1]){ //最后一个标签与当前标签相同时，出栈。栈内只记录未结束标签
					array_pop($tagStack);
					$result .= $tag;
				}
			}else if(preg_match("~<([A-Za-z0-9]+)[^/>]*?>~si",$tag,$match)){ // 开始标记
				if(!in_array(strtolower($match[1]),$notclosetag)){
					array_push($tagStack,$match[1]);
				}
				$result .= $tag;
			}else if(preg_match("~<!--.*?-->~si",$tag)){
				$result .= $tag;
			}else{
				if($len + $this->mstrlen($tag) < $length){
					$result .= $tag;
					$len += $this->mstrlen($tag);
				}else {
					$str = cutstr($tag,$length-$len+1);
					$result .= $str;
					break;
				}
			}
		}
		
		$result .= $appendcontent;
		
		while(!empty($tagStack)){
			$result .= '</'.array_pop($tagStack).'>';
		}
		return  $result;
	}
	
	
	/**
	 * 取得字符串的长度，包括中英文。
	 */
	function mstrlen($str,$charset = 'UTF-8'){
		if (function_exists('mb_substr')) {
			$length=mb_strlen($str,$charset);
		} elseif (function_exists('iconv_strlen')) {
			$length=iconv_strlen($str,$charset);
		} else {
			preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $text, $ar);
			$length=count($ar[0]);
		}
		return $length;
	}
	
}
