<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_album_pic');
0
|| checktplrefresh('./template/tqun/home/space_album_pic.htm', './template/default/common/seccheck.htm', 1380695230, 'diy', './data/template/13_diy_home_space_album_pic.tpl.php', './template/tqun', 'home/space_album_pic')
|| checktplrefresh('./template/tqun/home/space_album_pic.htm', './template/tqun/common/footer.htm', 1380695230, 'diy', './data/template/13_diy_home_space_album_pic.tpl.php', './template/tqun', 'home/space_album_pic')
;?>
<?php $_G['home_tpl_titles'] = array(getstr($pic['title'], 60, 0, 0, 0, -1), $album['albumname'], '相册');?><?php $friendsname = array(1 => '仅好友可见',2 => '指定好友可见',3 => '仅自己可见',4 => '凭密码可见');?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>"><?php echo $space['username'];?></a> <em>&rsaquo;</em>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=blog&amp;view=me">相册</a>
</div>
</div>
<style id="diy_style" type="text/css"></style>
<div class="wp">
<!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
</div>
<div id="ct" class="ct_sp wp cl"><?php include template('home/space_menu'); ?><div class="bm">
<div class="bm_c cl">

<div class="mn">
<!--[diy=diycontenttop]--><div id="diycontenttop" class="area"></div><!--[/diy]-->
<div class="bml">
<div class="bm_c">

<div class="tbmu bw0" id="pic_block">
<div class="y">
<?php if($space['self'] && helper_access::check_module('album')) { ?><a href="home.php?mod=spacecp&amp;ac=upload" class="y pn pnc"><strong>上传图片</strong></a><span class="pipe y">|</span><?php } ?>
<a href="javascript:;" onclick="imageRotate('pic', 1)"><img class="vm" src="<?php echo STATICURL;?>image/common/rleft.gif" /></a>
<a href="javascript:;" onclick="imageRotate('pic', 2)"><img class="vm" src="<?php echo STATICURL;?>image/common/rright.gif" /></a><span class="pipe">|</span>
<a href="home.php?mod=space&amp;uid=<?php echo $pic['uid'];?>&amp;do=<?php echo $do;?>&amp;picid=<?php echo $upid;?>&amp;goto=up#pic_block">上一张</a><span class="pipe">|</span>
<a href="home.php?mod=space&amp;uid=<?php echo $pic['uid'];?>&amp;do=<?php echo $do;?>&amp;picid=<?php echo $nextid;?>&amp;goto=down#pic_block" id="nextlink">下一张</a><span class="pipe">|</span>
<?php if($_GET['play']) { ?>
<a href="javascript:;" id="playid" class="osld" onclick="playNextPic(false);">停止播放</a>
<?php } else { ?>
<a href="javascript:;" id="playid" class="osld" onclick="playNextPic(true);">幻灯播放</a>
<?php } ?><span id="displayNum"></span>
</div>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=album&amp;id=<?php echo $pic['albumid'];?>">&laquo; 返回图片列表</a>
<?php if($album['picnum']) { ?><span class="pipe">|</span>当前第 <?php echo $sequence;?> 张<span class="pipe">|</span>共 <?php echo $album['picnum'];?> 张图片<?php } ?>&nbsp;
<?php if($album['friend']) { ?>
<span class="xg1"> &nbsp; <?php echo $friendsname[$value['friend']];?></span>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['space_album_pic_top'])) echo $_G['setting']['pluginhooks']['space_album_pic_top'];?>
</div>

<div class="vw pic">

<div id="photo_pic" class="c<?php if($pic['magicframe']) { ?> magicframe magicframe<?php echo $pic['magicframe'];?><?php } ?>">
<?php if($pic['magicframe']) { ?>
<div class="pic_lb1">
<table cellpadding="0" cellspacing="0" class="">
<tr>
<td class="frame_jiao frame_top_left"></td>
<td class="frame_x frame_top_middle"></td>
<td class="frame_jiao frame_top_right"></td>
</tr>
<tr>
<td class="frame_y frame_middle_left"></td>
<td class="frame_middle_middle">
<?php } ?><a href="home.php?mod=space&amp;uid=<?php echo $pic['uid'];?>&amp;do=<?php echo $do;?>&amp;picid=<?php echo $nextid;?>&amp;goto=down#pic_block"><img src="<?php echo $pic['pic'];?>" id="pic" alt="" /></a>
<script type="text/javascript">
function createElem(e){
var obj = document.createElement(e);
obj.style.position = 'absolute';
obj.style.zIndex = '1';
obj.style.cursor = 'pointer';
obj.onmouseout = function(){ this.style.background = 'none';}
return obj;
}
function viewPhoto(){
var pager = createElem('div');
var pre = createElem('div');
var next = createElem('div');
var cont = $('photo_pic');
var tar = $('pic');
var space = 0;
var w = tar.width/2;
if(!!window.ActiveXObject && !window.XMLHttpRequest){
space = -(cont.offsetWidth - tar.width)/2;
}
var objpos = fetchOffset(tar);

pager.style.position = 'absolute';
pager.style.top = '0';
pager.style.left = objpos['left'] + 'px';
pager.style.top = objpos['top'] + 'px';
pager.style.width = tar.width + 'px';
pager.style.height = tar.height + 'px';
pre.style.left = 0;
next.style.right = 0;
pre.style.width = next.style.width = w + 'px';
pre.style.height = next.style.height = tar.height + 'px';
pre.innerHTML = next.innerHTML = '<img src="<?php echo IMGDIR;?>/emp.gif" width="' + w + '" height="' + tar.height + '" />';

pre.onmouseover = function(){ this.style.background = 'url(<?php echo IMGDIR;?>/pic-prev.png) no-repeat 0 100px'; }
pre.onclick = function(){ window.location = 'home.php?mod=space&uid=<?php echo $pic['uid'];?>&do=<?php echo $do;?>&picid=<?php echo $upid;?>&goto=up#pic_block'; }

next.onmouseover = function(){ this.style.background = 'url(<?php echo IMGDIR;?>/pic-next.png) no-repeat 100% 100px'; }
next.onclick = function(){ window.location = 'home.php?mod=space&uid=<?php echo $pic['uid'];?>&do=<?php echo $do;?>&picid=<?php echo $nextid;?>&goto=down#pic_block'; }

//cont.style.position = 'relative';
cont.appendChild(pager);
pager.appendChild(pre);
pager.appendChild(next);
}
$('pic').onload = function(){
viewPhoto();
}
</script>
<?php if($pic['magicframe']) { ?>
</td>
<td class="frame_y frame_middle_right"></td>
</tr>
<tr>
<td class="frame_jiao frame_bottom_left"></td>
<td class="frame_x frame_bottom_middle"></td>
<td class="frame_jiao frame_bottom_right"></td>
</tr>
</table>
</div>
<?php } ?>
</div>

<div class="pns mlnv vm mtm cl">
<a href="home.php?mod=space&amp;uid=<?php echo $pic['uid'];?>&amp;do=<?php echo $do;?>&amp;picid=<?php echo $upid;?>&amp;goto=up#pic_block" class="btn" title="上一张"><img src="<?php echo STATICURL;?>image/common/pic_nv_prev.gif" alt="上一张"/></a><?php if(is_array($piclist)) foreach($piclist as $value) { ?><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=album&amp;picid=<?php echo $value['picid'];?>#pic_block"><img alt="" src="<?php echo $value['pic'];?>"<?php if($value['picid']==$picid) { ?> class="a"<?php } ?> /></a><?php } ?><a href="home.php?mod=space&amp;uid=<?php echo $pic['uid'];?>&amp;do=<?php echo $do;?>&amp;picid=<?php echo $nextid;?>&amp;goto=down#pic_block" class="btn" title="下一张"><img src="<?php echo STATICURL;?>image/common/pic_nv_next.gif" alt="下一张"/></a>
</div>

<div class="d">
<p id="a_set_title"><?php if($pic['title']) { ?><?php echo $pic['title'];?><?php } else { ?><?php echo substr($pic['filename'], 0, strrpos($pic['filename'], '.'));?><?php } if($pic['status'] == 1) { ?><b>(待审核)</b><?php } ?></p>
<p class="xg1 xs1">
<?php if($pic['hot']) { ?><span class="hot">热度 <em><?php echo $pic['hot'];?></em></span><?php } if($do=='event') { ?><a href="home.php?mod=space&amp;uid=<?php echo $pic['uid'];?>" target="_blank"><?php echo $pic['username'];?></a><?php } ?>
上传于 <?php echo dgmdate($pic[dateline]);?> (<?php echo $pic['size'];?>)
</p>
<?php if(isset($_GET['exif'])) { if($exifs) { if(is_array($exifs)) foreach($exifs as $key => $value) { if($value) { ?><p><?php echo $key;?> : <?php echo $value;?></p><?php } } } else { ?>
<p>无 EXIF 信息</p>
<?php } } ?>

<!--[diy=diyclicktop]--><div id="diyclicktop" class="area"></div><!--[/diy]-->
<?php if($album['friend'] != 3) { ?>
<div id="click_div"><?php include template('home/space_click'); ?></div>
<?php } ?>

<div class="o cl xs1 pbn">
<?php if(!empty($_G['setting']['pluginhooks']['space_album_pic_op_extra'])) echo $_G['setting']['pluginhooks']['space_album_pic_op_extra'];?>
<?php if($pic['uid'] == $_G['uid'] && $_G['magic']['frame']) { ?>
<img src="<?php echo STATICURL;?>image/magic/frame.small.gif" alt="frame" class="vm" />
<?php if($pic['magicframe']) { ?>
<a id="a_magic_frame" href="home.php?mod=spacecp&amp;ac=magic&amp;op=cancelframe&amp;idtype=picid&amp;id=<?php echo $pic['picid'];?>" onclick="ajaxmenu(event,this.id)">取消相框</a>
<?php } else { ?>
<a id="a_magic_frame" href="home.php?mod=magic&amp;mid=frame&amp;idtype=picid&amp;id=<?php echo $pic['picid'];?>" onclick="ajaxmenu(event,this.id, 1)">加相框</a>
<?php } ?>
<span class="pipe">|</span>
<?php } if($_G['uid'] == $pic['uid'] || checkperm('managealbum')) { ?>
<a href="home.php?mod=spacecp&amp;ac=album&amp;op=editpic&amp;albumid=<?php echo $pic['albumid'];?>&amp;picid=<?php echo $pic['picid'];?>">管理图片</a><span class="pipe">|</span>
<a href="home.php?mod=spacecp&amp;ac=album&amp;op=edittitle&amp;albumid=<?php echo $pic['albumid'];?>&amp;picid=<?php echo $pic['picid'];?>&amp;handlekey=edittitlehk_<?php echo $pic['picid'];?>" id="a_set_title" onclick="showWindow(this.id, this.href, 'get', 0);">编辑说明</a><span class="pipe">|</span>
<?php } if(checkperm('managealbum')) { ?>
IP: <?php echo $pic['postip'];?><span class="pipe">|</span>
<a href="home.php?mod=spacecp&amp;ac=album&amp;picid=<?php echo $pic['picid'];?>&amp;op=edithot&amp;handlekey=picedithothk_<?php echo $pic['picid'];?>" id="a_hot_<?php echo $pic['picid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">热度</a><span class="pipe">|</span>
<?php } ?>
<!--a href="home.php?mod=spacecp&amp;ac=common&amp;op=report&amp;idtype=picid&amp;id=<?php echo $pic['picid'];?>&amp;handlekey=reportpichk_<?php echo $pic['picid'];?>" id="a_report" onclick="showWindow(this.id, this.href, 'get', 0);">举报</a-->
<?php if(helper_access::check_module('share')) { ?>
<a href="home.php?mod=spacecp&amp;ac=share&amp;type=pic&amp;id=<?php echo $pic['picid'];?>&amp;handlekey=sharealbumhk_<?php echo $pic['picid'];?>" id="a_share_<?php echo $pic['picid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">分享</a>
<?php } ?>

<span class="z">
<a href="<?php echo $pic['pic'];?>" target="_blank">查看原图</a>
<?php if(!isset($_GET['exif'])) { ?>
<span class="pipe">|</span><a href="<?php echo $theurl;?>&exif=1">查看 EXIF 信息</a>
<?php } if($_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 5)) { ?>
<span class="pipe">|</span><a href="portal.php?mod=portalcp&amp;ac=portalblock&amp;op=recommend&amp;idtype=picid&amp;id=<?php echo $pic['picid'];?>" onclick="showWindow('recommend', this.href, 'get', 0)">模块推送</a>
<?php } if($pic['uid'] != $_G['uid']) { ?>
<span class="pipe">|</span><a href="javascript:;" onclick="showWindow('miscreport<?php echo $pic['picid'];?>', 'misc.php?mod=report&rtype=pic&uid=<?php echo $pic['uid'];?>&rid=<?php echo $pic['picid'];?>', 'get', -1);return false;">举报</a>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['space_album_pic_bottom'])) echo $_G['setting']['pluginhooks']['space_album_pic_bottom'];?>
</span>
</div>
</div>

</div>

<!--[diy=diycommenttop]--><div id="diycommenttop" class="area"></div><!--[/diy]-->
<div id="pic_comment" class="bm bw0 mtm mbm">
<div id="comment">
<?php if($cid) { ?>
<div class="i">
当前只显示与您操作相关的单个评论，<a href="<?php echo $theurl;?>#comment">点击此处查看全部评论</a>
</div>
<?php } ?>

<div id="comment_ul" class="xld xlda xltda"><?php if(is_array($list)) foreach($list as $value) { include template('home/space_comment_li'); } ?>
</div>
</div>
<?php if($multi) { ?><div class="pgs cl mtm"><?php echo $multi;?></div><?php } ?>
</div>
<?php if(helper_access::check_module('album')) { ?>
<form id="quickcommentform_<?php echo $picid;?>" name="quickcommentform_<?php echo $picid;?>" action="home.php?mod=spacecp&amp;ac=comment&amp;handlekey=qcpic_<?php echo $picid;?>" method="post" autocomplete="off" onsubmit="ajaxpost('quickcommentform_<?php echo $picid;?>', 'return_qcpic_<?php echo $picid;?>');doane(event);" class="xld xlda xltda">
<dl>
<?php if($_G['uid']) { ?>
<dd>
<span id="comment_face" onclick="showFace(this.id, 'comment_message');return false;" class="cur1"><img src="<?php echo IMGDIR;?>/facelist.gif" alt="facelist" class="vm" /></span>
<?php if(!empty($_G['setting']['pluginhooks']['space_album_pic_face_extra'])) echo $_G['setting']['pluginhooks']['space_album_pic_face_extra'];?>
<?php if($_G['setting']['magicstatus'] && !empty($_G['setting']['magics']['doodle'])) { ?>
<a id="a_magic_doodle" href="home.php?mod=magic&amp;mid=doodle&amp;showid=comment_doodle&amp;target=comment_message" onclick="showWindow(this.id, this.href, 'get', 0)"><img src="<?php echo STATICURL;?>image/magic/doodle.small.gif" alt="doodle" class="vm" /> <?php echo $_G['setting']['magics']['doodle'];?></a>
<?php } ?>
</dd>
<?php } ?>
<dd class="tedt">
<div class="area">
<?php if($_G['uid']) { ?>
<textarea id="comment_message" onkeydown="ctrlEnter(event, 'commentsubmit_btn');" name="message" rows="3" class="pt"></textarea>
<?php } else { ?>
<div class="pt hm">您需要登录后才可以评论 <a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href)" class="xi2">登录</a> | <a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" class="xi2"><?php echo $_G['setting']['reglinkname'];?></a></div>
<?php } ?>
</div>
</dd>
<?php if(checkperm('seccode') && ($secqaacheck || $seccodecheck)) { ?><?php
$sectpl = <<<EOF
<sec> <span id="sec<hash>" onclick="showMenu(this.id);"><sec></span><div id="sec<hash>_menu" class="p_pop p_opt" style="display:none"><sec></div>
EOF;
?>
<dd class="mtm mbm sec"><?php $_G['sechashi'] = !empty($_G['cookie']['sechashi']) ? $_G['sechash'] + 1 : 0;
$sechash = 'S'.($_G['inajax'] ? 'A' : '').$_G['sid'].$_G['sechashi'];
$sectpl = !empty($sectpl) ? explode("<sec>", $sectpl) : array('<br />',': ','<br />','');
$sectpldefault = $sectpl;
$sectplqaa = str_replace('<hash>', 'qaa'.$sechash, $sectpldefault);
$sectplcode = str_replace('<hash>', 'code'.$sechash, $sectpldefault);
$secshow = !isset($secshow) ? 1 : $secshow;
$sectabindex = !isset($sectabindex) ? 1 : $sectabindex;?><?php
$__STATICURL = STATICURL;$seccheckhtml = <<<EOF

<input name="sechash" type="hidden" value="{$sechash}" />

EOF;
 if($sectpl) { if($secqaacheck) { 
$seccheckhtml .= <<<EOF

{$sectplqaa['0']}验证问答{$sectplqaa['1']}<input name="secanswer" id="secqaaverify_{$sechash}" type="text" autocomplete="off" style="width:100px" class="txt px vm" onblur="checksec('qaa', '{$sechash}')" tabindex="{$sectabindex}" />
<a href="javascript:;" onclick="updatesecqaa('{$sechash}');doane(event);" class="xi2">换一个</a>
<span id="checksecqaaverify_{$sechash}"><img src="{$__STATICURL}image/common/none.gif" width="16" height="16" class="vm" /></span>
{$sectplqaa['2']}<span id="secqaa_{$sechash}"></span>

EOF;
 if($secshow) { 
$seccheckhtml .= <<<EOF
<script type="text/javascript" reload="1">updatesecqaa('{$sechash}');</script>
EOF;
 } 
$seccheckhtml .= <<<EOF

{$sectplqaa['3']}

EOF;
 } if($seccodecheck) { 
$seccheckhtml .= <<<EOF

{$sectplcode['0']}验证码{$sectplcode['1']}<input name="seccodeverify" id="seccodeverify_{$sechash}" type="text" autocomplete="off" style="
EOF;
 if($_G['setting']['seccodedata']['type'] != 1) { 
$seccheckhtml .= <<<EOF
ime-mode:disabled;
EOF;
 } 
$seccheckhtml .= <<<EOF
width:100px" class="txt px vm" onblur="checksec('code', '{$sechash}')" tabindex="{$sectabindex}" />
<a href="javascript:;" onclick="updateseccode('{$sechash}');doane(event);" class="xi2">换一个</a>
<span id="checkseccodeverify_{$sechash}"><img src="{$__STATICURL}image/common/none.gif" width="16" height="16" class="vm" /></span>
{$sectplcode['2']}<span id="seccode_{$sechash}"></span>

EOF;
 if($secshow) { 
$seccheckhtml .= <<<EOF
<script type="text/javascript" reload="1">updateseccode('{$sechash}');</script>
EOF;
 } 
$seccheckhtml .= <<<EOF

{$sectplcode['3']}

EOF;
 } } 
$seccheckhtml .= <<<EOF


EOF;
?><?php unset($secshow);?><?php if(empty($secreturn)) { ?><?php echo $seccheckhtml;?><?php } ?></dd>
<?php } ?>
<dd>
<input type="hidden" name="refer" value="<?php echo $theurl;?>" />
<input type="hidden" name="id" value="<?php echo $picid;?>" />
<input type="hidden" name="idtype" value="picid" />
<input type="hidden" name="commentsubmit" value="true" />
<input type="hidden" name="quickcomment" value="true" />
<button type="submit" name="commentsubmit_btn" value="true" id="commentsubmit_btn" class="pn pnc"<?php if(!$_G['uid']) { ?> onclick="showWindow(this.id, this.form.action);return false;"<?php } ?>><strong>评论</strong></button>
<span id="__quickcommentform_<?php echo $picid;?>"></span>
<span id="return_qcpic_<?php echo $picid;?>"></span>
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
</dd>
</dl>
</form>
<?php } ?>
</div>
</div>
<script type="text/javascript">
function succeedhandle_qcpic_<?php echo $picid;?>(url, msg, values) {
if(values['cid']) {
comment_add(values['cid']);
} else {
$('return_qcpic_<?php echo $picid;?>').innerHTML = msg;
}
<?php if(checkperm('seccode') && $sechash) { if($secqaacheck) { ?>
updatesecqaa('<?php echo $sechash;?>');
<?php } if($seccodecheck) { ?>
updateseccode('<?php echo $sechash;?>');
<?php } } ?>
}
</script>

<script type="text/javascript">
var interval = 5000;
var timerId = -1;
var derId = -1;
var replay = false;
var num = 0;
var endPlay = false;
function forward() {
window.location.href = 'home.php?mod=space&uid=<?php echo $pic['uid'];?>&do=<?php echo $do;?>&picid=<?php echo $nextid;?>&goto=down&play=1#pic_block';
}
function derivativeNum() {
num++;
$('displayNum').innerHTML = '[' + (interval/1000 - num) + ']';
}
function playNextPic(stat) {
if(stat || replay) {
derId = window.setInterval('derivativeNum();', 1000);
$('displayNum').innerHTML = '[' + (interval/1000 - num) + ']';
$('playid').onclick = function (){replay = false;playNextPic(false);};
$('playid').innerHTML = '停止播放';
timerId = window.setInterval('forward();', interval);
} else {
replay = true;
num = 0;
if(endPlay) {
$('playid').innerHTML = '重新播放';
} else {
$('playid').innerHTML = '幻灯播放';
}
$('playid').onclick = function (){playNextPic(true);};
$('displayNum').innerHTML = '';
window.clearInterval(timerId);
window.clearInterval(derId);
}
}
<?php if($_GET['play']) { if($sequence && $album['picnum']) { ?>
if(<?php echo $sequence;?> == <?php echo $album['picnum'];?>) {
endPlay = true;
playNextPic(false);
} else {
playNextPic(true);
}
<?php } else { ?>
playNextPic(true);
<?php } } ?>

function update_title() {
$('title_form').style.display='';
}

var elems = selector('dd[class~=magicflicker]');
for(var i=0; i<elems.length; i++){
magicColor(elems[i]);
}
</script>

<?php if(!$_G['setting']['homepagestyle']) { ?><!--[diy=diycontentbottom]--><div id="diycontentbottom" class="area"></div><!--[/diy]--><?php } ?>
</div>
</div>
</div>
</div>

<?php if(!$_G['setting']['homepagestyle']) { ?>
<div class="wp mtn">
<!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
</div>
<?php } ?>	</div>
<?php if(empty($topic) || ($topic['usefooter'])) { ?><?php $focusid = getfocus_rand($_G[basescript]);?><?php if($focusid !== null) { ?><?php $focus = $_G['cache']['focus']['data'][$focusid];?><?php $focusnum = count($_G['setting']['focus'][$_G[basescript]]);?><div class="focus" id="sitefocus">
<div class="bm">
<div class="bm_h cl">
<a href="javascript:;" onclick="setcookie('nofocus_<?php echo $_G['basescript'];?>', 1, <?php echo $_G['cache']['focus']['cookie'];?>*3600);$('sitefocus').style.display='none'" class="y" title="关闭">关闭</a>
<h2>
<?php if($_G['cache']['focus']['title']) { ?><?php echo $_G['cache']['focus']['title'];?><?php } else { ?>站长推荐<?php } ?>
<span id="focus_ctrl" class="fctrl"><img src="<?php echo IMGDIR;?>/pic_nv_prev.gif" alt="上一条" title="上一条" id="focusprev" class="cur1" onclick="showfocus('prev');" /> <em><span id="focuscur"></span>/<?php echo $focusnum;?></em> <img src="<?php echo IMGDIR;?>/pic_nv_next.gif" alt="下一条" title="下一条" id="focusnext" class="cur1" onclick="showfocus('next')" /></span>
</h2>
</div>
<div class="bm_c" id="focus_con">
</div>
</div>
</div><?php $focusi = 0;?><?php if(is_array($_G['setting']['focus'][$_G['basescript']])) foreach($_G['setting']['focus'][$_G['basescript']] as $id) { ?><div class="bm_c" style="display: none" id="focus_<?php echo $focusi;?>">
<dl class="xld cl bbda">
<dt><a href="<?php echo $_G['cache']['focus']['data'][$id]['url'];?>" class="xi2" target="_blank"><?php echo $_G['cache']['focus']['data'][$id]['subject'];?></a></dt>
<?php if($_G['cache']['focus']['data'][$id]['image']) { ?>
<dd class="m"><a href="<?php echo $_G['cache']['focus']['data'][$id]['url'];?>" target="_blank"><img src="<?php echo $_G['cache']['focus']['data'][$id]['image'];?>" alt="<?php echo $_G['cache']['focus']['data'][$id]['subject'];?>" /></a></dd>
<?php } ?>
<dd><?php echo $_G['cache']['focus']['data'][$id]['summary'];?></dd>
</dl>
<p class="ptn cl"><a href="<?php echo $_G['cache']['focus']['data'][$id]['url'];?>" class="xi2 y" target="_blank">查看 &raquo;</a></p>
</div><?php $focusi ++;?><?php } ?>
<script type="text/javascript">
var focusnum = <?php echo $focusnum;?>;
if(focusnum < 2) {
$('focus_ctrl').style.display = 'none';
}
if(!$('focuscur').innerHTML) {
var randomnum = parseInt(Math.round(Math.random() * focusnum));
$('focuscur').innerHTML = Math.max(1, randomnum);
}
showfocus();
var focusautoshow = window.setInterval('showfocus(\'next\', 1);', 5000);
</script>
<?php } if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && $_G['setting']['showpatchnotice'] == 1) { ?>
<div class="focus patch" id="patch_notice"></div>
<?php } ?><?php echo adshow("footerbanner/wp a_f/1");?><?php echo adshow("footerbanner/wp a_f/2");?><?php echo adshow("footerbanner/wp a_f/3");?><?php echo adshow("float/a_fl/1");?><?php echo adshow("float/a_fr/2");?><?php echo adshow("couplebanner/a_fl a_cb/1");?><?php echo adshow("couplebanner/a_fr a_cb/2");?><?php echo adshow("cornerbanner/a_cn");?><?php if(!empty($_G['setting']['pluginhooks']['global_footer'])) echo $_G['setting']['pluginhooks']['global_footer'];?>
        </div>
<div id="ft">
            <div class="wp cl">
                <div class="wp">
<div id="flk" class="y">
<p>
                            

</p>
<p class="xs0">
格林尼治时间 GMT<?php echo $_G['timenow']['offset'];?>, <?php echo $_G['timenow']['time'];?></br>
<span id="debuginfo">
         All rigths reserved,Copyright☆2013_ <strong>by Pro_Niki.</strong>			
</span>
</p>
</div>
<div id="frt">
<p>Welcome To <strong>LPer社区!</strong></p>
</div><?php updatesession();?><?php if($_G['uid'] && $_G['group']['allowinvisible']) { ?>
<script type="text/javascript">
var invisiblestatus = '<?php if($_G['session']['invisible']) { ?>隐身<?php } else { ?>在线<?php } ?>';
var loginstatusobj = $('loginstatusid');
if(loginstatusobj != undefined && loginstatusobj != null) loginstatusobj.innerHTML = invisiblestatus;
</script>
<?php } ?>
        </div>
        </div>
</div>

<?php if($upgradecredit !== false) { ?>
<div id="g_upmine_menu" class="tip tip_3" style="display:none;">
<div class="tip_c">
积分 <?php echo $_G['member']['credits'];?>, 距离下一级还需 <?php echo $upgradecredit;?> 积分
</div>
<div class="tip_horn"></div>
</div>
<?php } } if(!$_G['setting']['bbclosed']) { if($_G['uid'] && !isset($_G['cookie']['checkpm'])) { ?>
<script src="home.php?mod=spacecp&ac=pm&op=checknewpm&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } if($_G['uid'] && helper_access::check_module('follow') && !isset($_G['cookie']['checkfollow'])) { ?>
<script src="home.php?mod=spacecp&ac=follow&op=checkfeed&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } if(!isset($_G['cookie']['sendmail'])) { ?>
<script src="home.php?mod=misc&ac=sendmail&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && !isset($_G['cookie']['checkpatch'])) { ?>
<script src="misc.php?mod=patch&action=checkpatch&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } } if($_GET['diy'] == 'yes') { if(check_diy_perm($topic) && (empty($do) || $do != 'index')) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>common_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script src="<?php echo $_G['setting']['jspath'];?>portal_diy<?php if(!check_diy_perm($topic, 'layout')) { ?>_data<?php } ?>.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } if($space['self'] && CURMODULE == 'space' && $do == 'index') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>common_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script src="<?php echo $_G['setting']['jspath'];?>space_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } } if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && $_G['setting']['showpatchnotice'] == 1) { ?>
<script type="text/javascript">patchNotice();</script>
<?php } if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && empty($_G['cookie']['pluginnotice'])) { ?>
<div class="focus plugin" id="plugin_notice"></div>
<script type="text/javascript">pluginNotice();</script>
<?php } if($_G['member']['newprompt'] && (empty($_G['cookie']['promptstate_'.$_G['uid']]) || $_G['cookie']['promptstate_'.$_G['uid']] != $_G['member']['newprompt']) && $_GET['do'] != 'notice') { ?>
<script type="text/javascript">noticeTitle();</script>
<?php } ?><?php userappprompt();?><?php if($_G['basescript'] != 'userapp') { ?>
<span id="scrolltop" onclick="window.scrollTo('0','0')">回顶部</span>
<script type="text/javascript">_attachEvent(window, 'scroll', function(){showTopLink();});</script>
<?php } ?>
<!--<?php output();?><script src="http://s20.cnzz.com/stat.php?id=5214937&web_id=5214937&show=pic1" type="text/javascript" language="JavaScript"></script>-->
</body>
</html>
