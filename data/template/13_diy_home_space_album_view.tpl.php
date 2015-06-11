<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_album_view');?>
<?php $_G['home_tpl_titles'] = array($album['albumname'], '相册');?><?php $friendsname = array(1 => '仅好友可见',2 => '指定好友可见',3 => '仅自己可见',4 => '凭密码可见');?><?php include template('common/header'); ?><div id="pt" class="bm cl">
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

<div class="tbmu bw0 cl">
<?php if($space['self'] && helper_access::check_module('album')) { ?><a href="home.php?mod=spacecp&amp;ac=upload" class="y pn pnc"><strong>上传图片</strong></a><span class="pipe y">|</span><?php } ?>
<div class="y">
<?php if(!empty($_G['setting']['pluginhooks']['space_album_op_extra'])) echo $_G['setting']['pluginhooks']['space_album_op_extra'];?>
<?php if($space['self']) { ?><a href="<?php if($album['albumid'] > 0) { ?>home.php?mod=spacecp&ac=album&op=edit&albumid=<?php echo $album['albumid'];?><?php } else { ?>home.php?mod=spacecp&ac=album&op=editpic&albumid=0<?php } ?>">编辑</a><?php } if(($_G['uid'] == $album['uid'] || checkperm('managealbum')) && $album['albumid'] > 0) { ?>
<span class="pipe">|</span><a href="home.php?mod=spacecp&amp;ac=album&amp;op=delete&amp;albumid=<?php echo $album['albumid'];?>&amp;uid=<?php echo $album['uid'];?>&amp;handlekey=delalbumhk_<?php echo $album['albumid'];?>" id="album_delete_<?php echo $album['albumid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">删除</a>
<?php } if($_G['uid'] != $album['uid']) { ?>
<span class="pipe">|</span><a href="javascript:;" onclick="showWindow('miscreport<?php echo $album['albumid'];?>', 'misc.php?mod=report&rtype=album&uid=<?php echo $album['uid'];?>&rid=<?php echo $album['albumid'];?>', 'get', -1);return false;">举报</a>
<?php } if(!$space['self'] && $album['albumid']>0) { ?>
<span class="pipe">|</span><a href="home.php?mod=spacecp&amp;ac=favorite&amp;type=album&amp;id=<?php echo $album['albumid'];?>&amp;spaceuid=<?php echo $space['uid'];?>&amp;handlekey=sharealbumhk_<?php echo $album['albumid'];?>" id="a_favorite" onclick="showWindow(this.id, this.href, 'get', 0);">收藏</a>
<?php if(helper_access::check_module('share')) { ?><span class="pipe">|</span><a href="home.php?mod=spacecp&amp;ac=share&amp;type=album&amp;id=<?php echo $album['albumid'];?>&amp;handlekey=sharealbumhk_<?php echo $album['albumid'];?>" id="a_share" onclick="showWindow(this.id, this.href, 'get', 0);">分享</a><?php } } ?>
</div>
<?php echo $_G['home_tpl_titles']['0'];?> 
<?php if($album['catname']) { ?>
<span class="xg1">系统分类</span><a href="home.php?mod=space&amp;do=album&amp;catid=<?php echo $album['catid'];?>&amp;view=all"><?php echo $album['catname'];?></a><span class="pipe">|</span>
<?php } if($album['picnum']) { ?>共 <?php echo $album['picnum'];?> 张图片<?php } if($album['friend']) { ?>
<span class="xg1"> &nbsp; <?php echo $friendsname[$value['friend']];?></span>
<?php } ?>
</div>

<?php if($list) { if($album['depict']) { ?><p class="tbmu bw0"><?php echo $album['depict'];?></p><?php } ?>
<ul class="ptw ml mlp cl"><?php if(is_array($list)) foreach($list as $key => $value) { ?><li>
<a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=<?php echo $do;?>&amp;picid=<?php echo $value['picid'];?>"><?php if($value['pic']) { ?><img src="<?php echo $value['pic'];?>" alt="" /><?php } ?></a><?php if($value['status'] == 1) { ?><b>(待审核)</b><?php } ?>
</li>
<?php } ?>
</ul>
<?php if($pricount) { ?><p>本页有 <?php echo $pricount;?> 张图片因作者的隐私设置或未通过而隐藏</p><?php } if($multi) { ?><div class="pgs cl mtm"><?php echo $multi;?></div><?php } } else { if(!$pricount) { ?><p class="emp">该相册下还没有图片</p><?php } if($pricount) { ?><p>本页有 <?php echo $pricount;?> 张图片因作者的隐私设置或未通过而隐藏</p><?php } } if($albumlist) { ?>
<div class="bm mtm bw0">
<div class="bm_h cl" style="padding-top: 0; background-color: #F8F8F8;">
<?php if($albumlist) { ?>
<div class="y mtn">
<a href="javascript:;" id="sabup" onclick="switchAlbum(0);this.blur();return false;" title="上一组"><img src="<?php echo STATICURL;?>image/common/pic_nv_prev.gif" alt="上一组"/></a> 
<a href="javascript:;" id="sabdown" onclick="switchAlbum(1);this.blur();return false;" title="下一组"><img src="<?php echo STATICURL;?>image/common/pic_nv_next.gif" alt="下一组"/></a>
</div>
<?php } ?>
<h2>其它相册</h2>
</div>
<div class="bm_c">
<div id="pnv" class="bn pns cl">
<?php if($albumlist) { if(is_array($albumlist)) foreach($albumlist as $key => $albums) { ?><ul id="albumbox_<?php echo $key;?>" class="ml waterfall cl" <?php if(!isset($albums[$id]) && !($key==0 && $id<0)) { ?> style="display: none;"<?php } else { ?><?php $nowalbum=$key;?><?php } ?>><?php if(is_array($albums)) foreach($albums as $akey => $value) { ?><?php $pwdkey = 'view_pwd_album_'.$value['albumid'];?><li style="margin: 0 18px; width: 142px;">
<div class="c">
<a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=album&amp;id=<?php echo $value['albumid'];?>" title="<?php echo $value['albumname'];?>" <?php if($value['uid']!=$_G['uid'] && $_G['adminid'] != 1 && $value['friend']=='4' && $value['password'] && empty($_G['cookie'][$pwdkey])) { ?> onclick="showWindow('right_album_<?php echo $value['albumid'];?>', this.href, 'get', 0);"<?php } ?>><?php if($value['pic']) { ?><img src="<?php echo $value['pic'];?>" alt="<?php echo $value['albumname'];?>" width="120" height="120" /><?php } ?></a>
</div>
<div class="auth"><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=album&amp;id=<?php echo $value['albumid'];?>" title="<?php echo $value['albumname'];?>" <?php if($value['uid']!=$_G['uid'] && $_G['adminid'] != 1 && $value['friend']=='4' && $value['password'] && empty($_G['cookie'][$pwdkey])) { ?> onclick="showWindow('right_album_<?php echo $value['albumid'];?>', this.href, 'get', 0);"<?php } ?>><?php echo $value['albumname'];?></a></div>
</li>
<?php } ?>
</ul>
<?php } ?>
<script type="text/javascript">
var nowAlbum = <?php echo $nowalbum;?>;
var maxAlbum = <?php echo $maxalbum;?>;
function switchAlbum(down) {
if(down) {
if(nowAlbum + 1 < maxAlbum) {
$('albumbox_'+nowAlbum).style.display = 'none';
nowAlbum++;
$('albumbox_'+nowAlbum).style.display = '';
}
} else {
if(nowAlbum - 1 >= 0) {
$('albumbox_'+nowAlbum).style.display = 'none';
nowAlbum--;
$('albumbox_'+nowAlbum).style.display = '';
}
}
initSwitchButton();
}
function initSwitchButton(){
$('sabdown').style.display = maxAlbum-nowAlbum == 1 ? 'none' : '';
$('sabup').style.display = nowAlbum ? '' : 'none';
}
_attachEvent(window, "load", function () {
initSwitchButton();
});
</script>
<?php } ?>
</div>
</div>
</div>
<?php } if(!$_G['setting']['homepagestyle']) { ?><!--[diy=diycontentbottom]--><div id="diycontentbottom" class="area"></div><!--[/diy]--><?php } ?>
</div>
</div>
</div>
</div>
</div>
</div>

<?php if(!$_G['setting']['homepagestyle']) { ?>
<div class="wp mtn">
<!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
</div>
<?php } include template('common/footer'); ?>