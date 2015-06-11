<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_wall');?>
<?php $_G['home_tpl_titles'] = array('留言板');?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>"><?php echo $space['username'];?></a> <em>&rsaquo;</em>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=wall&amp;from=space">留言板</a>
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

<div id="div_main_content" class="mbm">
<div id="comment">
<?php if($cid) { ?>
<div class="i">
当前只显示与您操作相关的单个留言,<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=wall">点击此处查看全部留言</a>
</div>
<?php } ?>
<div id="comment_ul" class="xld xlda xltda"><?php if(is_array($list)) foreach($list as $value) { include template('home/space_comment_li'); } ?>
</div>
</div>
<div class="pgs cl mtm"><?php echo $multi;?></div>
</div>
<script type="text/javascript">
var elems = selector('dd[class~=magicflicker]');
for(var i=0; i<elems.length; i++){
magicColor(elems[i]);
}
function succeedhandle_qcwall_<?php echo $space['uid'];?>(url, msg, values) {
wall_add(values['cid']);
}
</script>

<?php if(helper_access::check_module('wall')) { ?>
<form id="quickcommentform_<?php echo $space['uid'];?>" action="home.php?mod=spacecp&amp;ac=comment" method="post" autocomplete="off" onsubmit="ajaxpost('quickcommentform_<?php echo $space['uid'];?>', 'return_qcwall_<?php echo $space['uid'];?>');doane(event);" class="xld xlda xltda">
<dl>
<dd>
<span id="comment_face" title="插入表情" onclick="showFace(this.id, 'comment_message');return false;" class="cur1"><img src="<?php echo IMGDIR;?>/facelist.gif" alt="facelist" class="vm" /></span>
<?php if(!empty($_G['setting']['pluginhooks']['space_wall_face_extra'])) echo $_G['setting']['pluginhooks']['space_wall_face_extra'];?>
<?php if($_G['setting']['magicstatus'] && $_G['setting']['magics']['doodle']) { ?>
<a id="a_magic_doodle" href="home.php?mod=magic&amp;mid=doodle&amp;showid=comment_doodle&amp;target=comment_message" onclick="showWindow(this.id, this.href, 'get', '0')"><img src="<?php echo STATICURL;?>image/magic/doodle.small.gif" alt="doodle" class="vm" /><?php echo $_G['setting']['magics']['doodle'];?></a>
<?php } ?>
</dd>
<dd class="tedt">
<div class="area">
<?php if($_G['uid']) { ?>
<textarea id="comment_message" onkeydown="ctrlEnter(event, 'commentsubmit_btn');" name="message" rows="3" class="pt"></textarea>
<?php } elseif($_G['connectguest']) { ?>
<div class="pt hm">您需要<a href="member.php?mod=connect" class="xi2">完善帐号信息</a> 或 <a href="member.php?mod=connect&amp;ac=bind" class="xi2">绑定已有帐号</a> 后才可以留言</div>
<?php } else { ?>
<div class="pt hm">您需要登录后才可以留言 <a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href)" class="xi2">登录</a> | <a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" class="xi2"><?php echo $_G['setting']['reglinkname'];?></a></div>
<?php } ?>
</div>
</dd>
<dd>
<input type="hidden" name="referer" value="home.php?mod=space&amp;uid=<?php echo $wall['uid'];?>&amp;do=wall" />
<input type="hidden" name="id" value="<?php echo $space['uid'];?>" />
<input type="hidden" name="idtype" value="uid" />
<input type="hidden" name="handlekey" value="qcwall_<?php echo $space['uid'];?>" />
<input type="hidden" name="commentsubmit" value="true" />
<input type="hidden" name="quickcomment" value="true" />
<button type="submit" name="commentsubmit_btn"value="true" id="commentsubmit_btn" class="pn pnc"><strong>留言</strong></button>
<span id="return_qcwall_<?php echo $space['uid'];?>"></span>
</dd>
</dl>
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
</form>
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