<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_thread');?>
<?php $filter = array( 'common' => '�ѷ���', 'save' => '�ݸ���', 'close' => '�ѹر�', 'aduit' => '�����', 'ignored' => '�Ѻ���', 'recyclebin' => '����վ');
$_G[home_tpl_spacemenus][] = "<a href=\"home.php?mod=space&amp;uid=$space[uid]&amp;do=thread&amp;view=me\">TA ����������</a>";?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="��ҳ"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>"><?php echo $space['username'];?></a> <em>&rsaquo;</em>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=blog&amp;view=me">����</a>
</div>
</div>
<style id="diy_style" type="text/css"></style>
<div class="wp">
<!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
</div>
<div id="ct" class="ct_sp wp cl">
<?php if($diymode) { include template('home/space_menu'); ?><div class="bm">
<div class="bm_c cl">
<?php } ?>
<div class="mn">
<!--[diy=diycontenttop]--><div id="diycontenttop" class="area"></div><!--[/diy]-->
<?php if($_G['uid'] && empty($diymode)) { ?>
<ul class="tb tb_w cl">
<li<?php echo $actives['we'];?>><a href="home.php?mod=space&amp;do=thread&amp;view=we">���ѵ�����</a></li>
<li<?php echo $actives['me'];?>><a href="home.php?mod=space&amp;do=thread&amp;view=me">�ҵ�����</a></li>
</ul>
<?php } ?>
<div class="<?php if(empty($diymode)) { ?>bm <?php } ?>bml">
<div class="bm_c">

<?php if($diymode) { ?>
<div class="tbmu bw0">
<?php if($space['self']) { ?><a href="forum.php?mod=misc&amp;action=nav" onclick="showWindow('nav', this.href, 'get', 0)" class="y pn pnc"><strong>����</strong></a><?php } if($_GET['type'] == 'reply') { ?>
<a href="home.php?mod=space&amp;do=thread&amp;view=me&amp;type=thread&amp;uid=<?php echo $space['uid'];?>&amp;from=space">����</a><span class="pipe">|</span><strong>�ظ�</strong>
<?php } else { ?>
<strong>����</strong><span class="pipe">|</span><a href="home.php?mod=space&amp;do=thread&amp;view=me&amp;type=reply&amp;uid=<?php echo $space['uid'];?>&amp;from=space">�ظ�</a>
<?php } ?>
</div>
<?php } if(!$diymode && $space['self']) { if($_GET['view'] == 'me') { ?>
<p class="tbmu bw0">
<?php if($viewtype != 'postcomment') { ?>
<span class="y">
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=thread&amp;view=me&amp;type=<?php echo $viewtype;?>&amp;from=<?php echo $_GET['from'];?>&amp;filter=" <?php if(!$_GET['filter']) { ?>class="a"<?php } ?>>ȫ��</a><?php if(is_array($filter)) foreach($filter as $key => $name) { ?><span class="pipe">|</span><a href="home.php?mod=space&amp;do=thread&amp;view=me&amp;type=<?php echo $viewtype;?>&amp;from=<?php echo $_GET['from'];?>&amp;filter=<?php echo $key;?>" <?php if($key == $_GET['filter']) { ?>class="a"<?php } ?>><?php echo $name;?></a><?php } ?> &nbsp;
<select name="forumlist" id="forumlist" class="ps vm" onchange="viewforumthread(this.value);" style="width: 120px; word-wrap: normal;">
<option value="0">ѡ����</option>
<?php echo $forumlist;?>
</select>
</span>
<?php } ?>
<a href="home.php?mod=space&amp;do=thread&amp;view=me&amp;type=thread" <?php echo $orderactives['thread'];?>>����</a><span class="pipe">|</span>
<a href="home.php?mod=space&amp;do=thread&amp;view=me&amp;type=reply" <?php echo $orderactives['reply'];?>>�ظ�</a><span class="pipe">|</span>
<a href="home.php?mod=space&amp;do=thread&amp;view=me&amp;type=postcomment" <?php echo $orderactives['postcomment'];?>>����</a>
<?php if($viewtype != 'reply' && $viewtype != 'postcomment') { ?>&nbsp; <input type="text" id="searchmypost" class="px vm" size="15" /> <button class="pn vm" onclick="searchpostbyusername($('searchmypost').value, '<?php echo $_G['username'];?>');"><em>����</em></button><?php } ?>
</p>
<?php } elseif($_GET['view'] == 'all') { ?>
<p class="tbmu bw0">
<a href="home.php?mod=space&amp;do=thread&amp;view=all&amp;order=dateline" <?php echo $orderactives['dateline'];?>>��������</a><span class="pipe">|</span>
<a href="home.php?mod=space&amp;do=thread&amp;view=all&amp;order=hot" <?php echo $orderactives['hot'];?>>��������</a>
</p>
<?php } } if($userlist) { ?>
<p class="tbmu bw0">
�����Ѳ鿴
<select name="fuidsel" onchange="fuidgoto(this.value);" class="ps">
<option value="">ȫ������</option><?php if(is_array($userlist)) foreach($userlist as $value) { ?><option value="<?php echo $value['fuid'];?>"<?php echo $fuid_actives[$value['fuid']];?>><?php echo $value['fusername'];?></option>
<?php } ?>
</select>
</p>
<?php } ?>

<div class="tl">
<form method="post" autocomplete="off" name="delform" id="delform" action="home.php?mod=space&amp;do=thread&amp;view=all&amp;order=dateline" onsubmit="showDialog('ȷ��Ҫɾ��ѡ�е�������', 'confirm', '', '$(\'delform\').submit();'); return false;">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="delthread" value="true" />

<table cellspacing="0" cellpadding="0">
<?php if($list) { if(is_array($list)) foreach($list as $stid => $thread) { ?><tbody>
<tr>
<td class="avt">
<a href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>" target="_blank"><?php echo avatar($thread[authorid],small);?></a>
</td>
<?php if($_GET['view'] == 'all' && $pruneperm && !$_GET['archiveid']) { ?>
<td class="o">
<?php if($thread['digest'] == 0) { if($thread['displayorder'] == 0) { ?>
<input type="checkbox" name="moderate[]" value="<?php echo $thread['tid'];?>" class="pc" />
<?php } else { ?>
<input type="checkbox" class="pc" disabled="disabled" />
<?php } } else { ?>
<input type="checkbox" class="pc" disabled="disabled" />
<?php } ?>
</td>
<?php } ?>
<th>
<span class="xst">
<?php if($viewtype == 'reply' || $viewtype == 'postcomment') { ?>
<a href="forum.php?mod=redirect&amp;goto=findpost&amp;ptid=<?php echo $thread['tid'];?>&amp;pid=<?php echo $thread['pid'];?>" target="_blank"><?php echo $thread['subject'];?></a>
<?php } else { ?>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" target="_blank" <?php if($thread['displayorder'] == -1) { ?>class="recy"<?php } ?>><?php echo $thread['subject'];?></a>
<?php } ?>
</span>

<?php if($thread['folder'] == 'lock') { ?>
<img src="<?php echo IMGDIR;?>/folder_lock.gif" align="absmiddle" />
<?php } elseif($thread['special'] == 1) { ?>
<img src="<?php echo IMGDIR;?>/pollsmall.gif" alt="ͶƱ" align="absmiddle" />
<?php } elseif($thread['special'] == 2) { ?>
<img src="<?php echo IMGDIR;?>/tradesmall.gif" alt="��Ʒ" align="absmiddle" />
<?php } elseif($thread['special'] == 3) { ?>
<img src="<?php echo IMGDIR;?>/rewardsmall.gif" alt="����" align="absmiddle" />
<?php } elseif($thread['special'] == 4) { ?>
<img src="<?php echo IMGDIR;?>/activitysmall.gif" alt="�" align="absmiddle" />
<?php } elseif($thread['special'] == 5) { ?>
<img src="<?php echo IMGDIR;?>/debatesmall.gif" alt="����" align="absmiddle" />
<?php } elseif(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?>
<img src="<?php echo IMGDIR;?>/pin_<?php echo $thread['displayorder'];?>.gif" alt="<?php echo $_G['setting']['threadsticky'][3-$thread['displayorder']];?>" align="absmiddle" />
<?php } if($thread['digest'] > 0) { ?>
<img src="<?php echo IMGDIR;?>/digest_<?php echo $thread['digest'];?>.gif" alt="���� <?php echo $thread['digest'];?>" align="absmiddle" />
<?php } if($thread['attachment'] == 2) { ?>
<img src="<?php echo STATICURL;?>image/filetype/image_s.gif" alt="ͼƬ����" align="absmiddle" />
<?php } elseif($thread['attachment'] == 1) { ?>
<img src="<?php echo STATICURL;?>image/filetype/common.gif" alt="����" align="absmiddle" />
<?php } if($thread['multipage']) { ?><span class="tps"><?php echo $thread['multipage'];?></span><?php } if(!$_GET['filter']) { if($thread[$statusfield] == -1) { ?><span class="xg1"><?php echo $filter['recyclebin'];?></span>
<?php } elseif($thread[$statusfield] == -2) { ?><span class="xg1"><?php echo $filter['aduit'];?></span>
<?php } elseif($thread[$statusfield] == -3 && $thread['displayorder'] != -4) { ?><span class="xg1"><?php echo $filter['ignored'];?></span>
<?php } elseif($thread['displayorder'] == -4) { ?><span class="xg1"><?php echo $filter['save'];?></span>
<?php } elseif($thread['closed'] == 1) { ?><span class="xg1"><?php echo $filter['close'];?></span>
<?php } } if($actives['me'] && $viewtype=='reply') { if(is_array($tids[$stid])) foreach($tids[$stid] as $pid) { ?><?php $post = $posts[$pid];?><?php if($post['message']) { ?><p class="mtn xg1">&nbsp;<img src="<?php echo IMGDIR;?>/icon_quote_m_s.gif" class="vm" /> <a href="forum.php?mod=redirect&amp;goto=findpost&amp;ptid=<?php echo $thread['tid'];?>&amp;pid=<?php echo $pid;?>" target="_blank"><?php echo $post['message'];?></a> <img src="<?php echo IMGDIR;?>/icon_quote_m_e.gif" class="vm" /></p><?php } } } if($actives['me'] && $viewtype=='postcomment') { ?>
<p class="mtn xg1"><?php echo $thread['comment'];?></p>
<?php } if($viewtype != 'postcomment') { ?>
<p class="mtn xg1">
<a href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>" target="_blank"><?php echo $thread['author'];?></a><?php echo ' &nbsp; ��'; ?>: <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $thread['fid'];?>" target="_blank"><?php echo $forums[$thread['fid']];?></a><?php echo ' &nbsp; ������'; ?>: <?php echo $thread['dateline'];?><?php echo ' &nbsp; �鿴'; ?>: <?php echo $thread['views'];?><?php echo ' &nbsp; �ظ�'; ?>: <a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" class="xi2" target="_blank"><?php echo $thread['replies'];?></a>
</p>
<?php } ?>
</th>
<?php if($viewtype != 'postcomment' && $actives['me']) { ?>
<td class="by">
<cite class="mbm"><a href="home.php?mod=space&amp;username=<?php echo $thread['lastposterenc'];?>" target="_blank"><?php echo $thread['lastposter'];?></a></cite>
<em><a href="forum.php?mod=redirect&amp;tid=<?php echo $thread['tid'];?>&amp;goto=lastpost#lastpost" target="_blank"><?php echo $thread['lastpost'];?></a></em>
</td>
<?php } ?>
</tr>
</tbody>
<?php } } else { ?>
<tbody>
<tr>
<td><p class="emp">��û����ص�����</p></td>
</tr>
</tbody>
<?php } ?>
</table>

<?php if($_GET['view'] == 'all' && $pruneperm && !$_GET['archiveid'] && $list) { ?>
<p class="mtm pns">
<label for="chkall" onclick="checkall(this.form, 'moderate')"><input type="checkbox" name="chkall" id="chkall" class="pc vm" />ȫѡ</label>
<button type="submit" name="delsubmit" value="true" class="pn vm"><em>ɾ��ѡ������</em></button>
</p>
<?php } ?>
</form>

<?php if($hiddennum) { ?>
<p class="mtm">��ҳ�� <?php echo $hiddennum;?> ƪ��������˽���������</p>
<?php } ?>
</div>
<?php if($multi) { ?><div class="pgs cl mtm"><?php echo $multi;?></div><?php } ?>

<script type="text/javascript">
function fuidgoto(fuid) {
window.location.href = 'home.php?mod=space&do=thread&view=we&fuid='+fuid;
}
function viewforumthread(fid) {
window.location.href = '<?php echo $forumurl;?>&fid='+fid;
}
</script>

<?php if(!$_G['setting']['homepagestyle']) { ?><!--[diy=diycontentbottom]--><div id="diycontentbottom" class="area"></div><!--[/diy]--><?php } ?>

</div>
</div>
</div>
<?php if($diymode) { ?>
</div>
</div>
<?php } ?>
</div>

<?php if(!$_G['setting']['homepagestyle']) { ?>
<div class="wp mtn">
<!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
</div>
<?php } include template('common/footer'); ?>